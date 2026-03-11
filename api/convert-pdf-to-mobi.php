<?php
/**
 * PDF to MOBI Conversion API
 * Converts PDF files to MOBI format using Python with Calibre's ebook-convert
 */

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Error handling - log to file for debugging
$logFile = sys_get_temp_dir() . '/mobi_convert_errors.log';

set_error_handler(function($errno, $errstr, $errfile, $errline) use ($logFile) {
    $message = date('[Y-m-d H:i:s]') . " Error ($errno): $errstr in $errfile on line $errline\n";
    file_put_contents($logFile, $message, FILE_APPEND);
    http_response_code(500);
    echo "Error: $errstr (in $errfile:$errline)";
    exit;
});

set_exception_handler(function($e) use ($logFile) {
    $message = date('[Y-m-d H:i:s]') . " Exception: " . $e->getMessage() . "\n" . $e->getTraceAsString() . "\n";
    file_put_contents($logFile, $message, FILE_APPEND);
    http_response_code(500);
    echo "Error: " . $e->getMessage();
    exit;
});

// Check if file was uploaded
if (!isset($_FILES['pdfFile']) || $_FILES['pdfFile']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    echo "Error: No PDF file uploaded or upload failed";
    exit;
}

$uploadedFile = $_FILES['pdfFile'];
$pageRange = isset($_POST['pageRange']) ? $_POST['pageRange'] : '';

// Validate file type
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimeType = finfo_file($finfo, $uploadedFile['tmp_name']);
finfo_close($finfo);

if ($mimeType !== 'application/pdf' && !in_array($uploadedFile['type'], ['application/pdf', 'application/x-pdf'])) {
    http_response_code(400);
    echo "Error: Invalid file type. Please upload a PDF file.";
    exit;
}

// Create temporary directory
$tempDir = sys_get_temp_dir() . '/mobi_convert_' . uniqid();
if (!mkdir($tempDir, 0777, true)) {
    http_response_code(500);
    echo "Error: Failed to create temporary directory";
    exit;
}

try {
    $inputFile = $tempDir . '/input.pdf';
    $outputFile = $tempDir . '/output.mobi';
    
    // Move uploaded file
    if (!move_uploaded_file($uploadedFile['tmp_name'], $inputFile)) {
        throw new Exception("Failed to move uploaded file");
    }
    
    // Try using Calibre's ebook-convert first
    $ebookConvert = findCommand('ebook-convert');
    
    if ($ebookConvert) {
        // Use Calibre for conversion
        $cmd = escapeshellcmd($ebookConvert) . ' ' . 
               escapeshellarg($inputFile) . ' ' . 
               escapeshellarg($outputFile);
        
        // Add page range if specified
        if (!empty($pageRange)) {
            $cmd .= ' --page-range ' . escapeshellarg($pageRange);
        }
        
        $output = [];
        $returnCode = 0;
        exec($cmd . ' 2>&1', $output, $returnCode);
        
        if ($returnCode === 0 && file_exists($outputFile)) {
            // Send the file
            $filename = pathinfo($uploadedFile['name'], PATHINFO_FILENAME) . '.mobi';
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Content-Length: ' . filesize($outputFile));
            readfile($outputFile);
            cleanup($tempDir);
            exit;
        }
    }
    
    // Fallback: Try using Python with pdfminer and mobi library
    $pythonCmd = findCommand('python3') ?: findCommand('python');
    
    if ($pythonCmd) {
        $pythonScript = $tempDir . '/convert.py';
        
        $script = <<<'PYTHON'
import sys
import os
from pdfminer.high_level import extract_text

def create_mobi(text, output_path, title):
    # Create a simple MOBI file using PalmDOC format
    text_bytes = text.encode('utf-8', errors='replace')
    
    # Palm Database Header (78 bytes)
    import struct
    import time
    
    pdb_header = bytearray(78)
    
    # Database name (32 bytes)
    name = title[:31].encode('ascii', errors='replace')
    pdb_header[:len(name)] = name
    
    # Attributes (2 bytes)
    struct.pack_into('>H', pdb_header, 32, 0)
    
    # Version (2 bytes)
    struct.pack_into('>H', pdb_header, 34, 0)
    
    # Creation/Modification time (Palm OS time: seconds since Jan 1, 1904)
    palm_time = int(time.time()) + 2082844800
    struct.pack_into('>I', pdb_header, 36, palm_time)
    struct.pack_into('>I', pdb_header, 40, palm_time)
    struct.pack_into('>I', pdb_header, 44, 0)  # Backup time
    struct.pack_into('>I', pdb_header, 48, 0)  # Mod number
    struct.pack_into('>I', pdb_header, 52, 0)  # App info
    struct.pack_into('>I', pdb_header, 56, 0)  # Sort info
    struct.pack_into('>I', pdb_header, 60, 0x424F4F4B)  # Type 'BOOK'
    struct.pack_into('>I', pdb_header, 64, 0x4D4F4249)  # Creator 'MOBI'
    struct.pack_into('>I', pdb_header, 68, 0)  # Unique ID seed
    struct.pack_into('>I', pdb_header, 72, 0)  # Next record list
    struct.pack_into('>H', pdb_header, 76, 1)  # Number of records
    
    # Record info (8 bytes)
    record_info = bytearray(8)
    struct.pack_into('>I', record_info, 0, 78 + 8)  # Offset
    record_info[4] = 0
    record_info[5] = 0
    record_info[6] = 0
    record_info[7] = 0
    
    # PalmDOC Header (16 bytes)
    doc_header = bytearray(16)
    struct.pack_into('>H', doc_header, 0, 1)  # Compression (1 = none)
    struct.pack_into('>H', doc_header, 2, 0)  # Reserved
    struct.pack_into('>I', doc_header, 4, len(text_bytes))  # Text length
    struct.pack_into('>H', doc_header, 8, 1)  # Number of records
    struct.pack_into('>H', doc_header, 10, max(4096, len(text_bytes)))  # Record size
    struct.pack_into('>I', doc_header, 12, 0)  # Current position
    
    # Combine all parts
    mobi_file = pdb_header + record_info + doc_header + text_bytes
    
    with open(output_path, 'wb') as f:
        f.write(mobi_file)

def main():
    if len(sys.argv) < 4:
        print("Usage: convert.py <input_pdf> <output_mobi> <title>", file=sys.stderr)
        sys.exit(1)
    
    input_pdf = sys.argv[1]
    output_mobi = sys.argv[2]
    title = sys.argv[3]
    
    # Extract text from PDF
    text = extract_text(input_pdf)
    
    if not text.strip():
        print("Error: No text found in PDF", file=sys.stderr)
        sys.exit(1)
    
    # Format text
    formatted = title + '\n' + '=' * min(len(title), 40) + '\n\n'
    formatted += text
    
    # Create MOBI
    create_mobi(formatted, output_mobi, title)
    print("Conversion successful")

if __name__ == '__main__':
    main()
PYTHON;
        
        file_put_contents($pythonScript, $script);
        
        $title = pathinfo($uploadedFile['name'], PATHINFO_FILENAME);
        $cmd = escapeshellcmd($pythonCmd) . ' ' . 
               escapeshellarg($pythonScript) . ' ' .
               escapeshellarg($inputFile) . ' ' .
               escapeshellarg($outputFile) . ' ' .
               escapeshellarg($title);
        
        $output = [];
        $returnCode = 0;
        exec($cmd . ' 2>&1', $output, $returnCode);
        
        if ($returnCode === 0 && file_exists($outputFile)) {
            $filename = $title . '.mobi';
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Content-Length: ' . filesize($outputFile));
            readfile($outputFile);
            cleanup($tempDir);
            exit;
        }
    }
    
    // If all else fails, return error as JSON so client can handle it
    cleanup($tempDir);
    http_response_code(503); // Service Unavailable
    echo json_encode(['error' => 'Server conversion unavailable. Client-side fallback required.']);
    exit;
    
} catch (Exception $e) {
    cleanup($tempDir);
    http_response_code(503);
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}

function findCommand($command) {
    // On Windows, use 'where' command; on Unix, use 'which'
    $isWindows = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
    
    if ($isWindows) {
        // Windows-specific paths and checks
        $paths = [
            $command,
            $command . '.exe',
            'C:\\Program Files\\Calibre2\\' . $command . '.exe',
            'C:\\Program Files (x86)\\Calibre2\\' . $command . '.exe',
            'C:\\xampp\\python\\' . $command . '.exe',
        ];
        
        foreach ($paths as $path) {
            if (file_exists($path)) {
                return $path;
            }
        }
        
        // Try using 'where' command
        $output = [];
        $returnCode = 0;
        exec('where ' . escapeshellarg($command) . ' 2>nul', $output, $returnCode);
        if ($returnCode === 0 && !empty($output)) {
            return trim($output[0]);
        }
    } else {
        // Unix/Linux/Mac paths
        $paths = [
            $command,
            '/usr/bin/' . $command,
            '/usr/local/bin/' . $command,
            '/opt/local/bin/' . $command,
        ];
        
        foreach ($paths as $path) {
            if (file_exists($path)) {
                return $path;
            }
        }
        
        // Try using 'which' command
        $output = [];
        $returnCode = 0;
        exec('which ' . escapeshellarg($command) . ' 2>/dev/null', $output, $returnCode);
        if ($returnCode === 0 && !empty($output)) {
            return trim($output[0]);
        }
    }
    
    return null;
}

function cleanup($dir) {
    if (is_dir($dir)) {
        $files = glob($dir . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        rmdir($dir);
    }
}
