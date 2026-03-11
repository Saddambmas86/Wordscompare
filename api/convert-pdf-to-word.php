<?php
/**
 * PDF to Word Conversion API
 * Uses Python pdf2docx library for high-fidelity conversion
 */

header('Content-Type: application/json');

// Error handling
set_error_handler(function($errno, $errstr, $errfile, $errline) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $errstr]);
    exit;
});

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Check if file was uploaded
if (!isset($_FILES['pdfFile']) || $_FILES['pdfFile']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'No PDF file uploaded or upload error']);
    exit;
}

$uploadedFile = $_FILES['pdfFile'];
$pageRange = isset($_POST['pageRange']) ? $_POST['pageRange'] : '1-';
$outputFormat = isset($_POST['outputFormat']) ? $_POST['outputFormat'] : 'docx';

// Validate file type
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimeType = finfo_file($finfo, $uploadedFile['tmp_name']);
finfo_close($finfo);

if ($mimeType !== 'application/pdf') {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid file type. Only PDF files are allowed.']);
    exit;
}

// Create temporary directory
$tempDir = sys_get_temp_dir() . '/pdf2word_' . uniqid();
if (!mkdir($tempDir, 0777, true)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Failed to create temporary directory']);
    exit;
}

$inputPath = $tempDir . '/input.pdf';
$outputPath = $tempDir . '/output.docx';

// Move uploaded file
if (!move_uploaded_file($uploadedFile['tmp_name'], $inputPath)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Failed to save uploaded file']);
    cleanup($tempDir);
    exit;
}

// Check if Python is available
$pythonCmd = null;
if (stripos(PHP_OS, 'WIN') === 0) {
    // Windows - check for python or py
    $pythonCheck = shell_exec('python --version 2>&1');
    if (strpos($pythonCheck, 'Python') !== false) {
        $pythonCmd = 'python';
    } else {
        $pythonCheck = shell_exec('py --version 2>&1');
        if (strpos($pythonCheck, 'Python') !== false) {
            $pythonCmd = 'py';
        }
    }
} else {
    // Linux/Mac - check for python3 or python
    $pythonCheck = shell_exec('python3 --version 2>&1');
    if (strpos($pythonCheck, 'Python') !== false) {
        $pythonCmd = 'python3';
    } else {
        $pythonCheck = shell_exec('python --version 2>&1');
        if (strpos($pythonCheck, 'Python') !== false) {
            $pythonCmd = 'python';
        }
    }
}

if (!$pythonCmd) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Python is not available on the server']);
    cleanup($tempDir);
    exit;
}

// Create Python script for conversion
$pythonScript = <<<'PYTHON'
import sys
import os

try:
    from pdf2docx import Converter
except ImportError as e:
    sys.stderr.write("pdf2docx not installed: " + str(e) + "\n")
    sys.exit(1)

input_path = sys.argv[1]
output_path = sys.argv[2]
page_range = sys.argv[3] if len(sys.argv) > 3 else None

try:
    # Convert PDF to DOCX
    cv = Converter(input_path)
    
    # Parse page range if provided
    pages = None
    if page_range and page_range != '1-':
        try:
            if '-' in page_range:
                parts = page_range.split('-')
                start = int(parts[0]) if parts[0] else 1
                end = int(parts[1]) if parts[1] else None
                if end:
                    pages = list(range(start - 1, end))
                else:
                    pages = list(range(start - 1, 9999))
            else:
                # Single page or comma-separated
                pages = [int(p) - 1 for p in page_range.split(',')]
        except:
            pages = None
    
    # Perform conversion
    cv.convert(output_path, pages=pages)
    cv.close()
    
    print("Conversion successful")
    
except Exception as e:
    sys.stderr.write("Conversion error: " + str(e) + "\n")
    sys.exit(1)
PYTHON;

$scriptPath = $tempDir . '/convert.py';
file_put_contents($scriptPath, $pythonScript);

// Execute Python script
// On Windows, use quotes instead of escapeshellarg for better path handling
if (stripos(PHP_OS, 'WIN') === 0) {
    $command = '"' . $pythonCmd . '" "' . $scriptPath . '" "' . $inputPath . '" "' . $outputPath . '" "' . $pageRange . '" 2>&1';
} else {
    $command = sprintf(
        '%s %s %s %s %s 2>&1',
        escapeshellarg($pythonCmd),
        escapeshellarg($scriptPath),
        escapeshellarg($inputPath),
        escapeshellarg($outputPath),
        escapeshellarg($pageRange)
    );
}

$output = shell_exec($command);

// Check if conversion was successful
if (!file_exists($outputPath) || filesize($outputPath) === 0) {
    http_response_code(500);
    
    // Read the Python script for debugging
    $scriptContent = file_get_contents($scriptPath);
    
    echo json_encode([
        'success' => false, 
        'message' => 'Conversion failed. pdf2docx may not be installed. Run: pip install pdf2docx',
        'debug' => $output,
        'pythonCmd' => $pythonCmd,
        'pythonVersion' => shell_exec($pythonCmd . ' --version 2>&1'),
        'tempDir' => $tempDir,
        'scriptExists' => file_exists($scriptPath),
        'inputExists' => file_exists($inputPath),
        'inputSize' => file_exists($inputPath) ? filesize($inputPath) : 0
    ]);
    cleanup($tempDir);
    exit;
}

// Read the converted file
$docxContent = file_get_contents($outputPath);
if ($docxContent === false) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Failed to read converted file']);
    cleanup($tempDir);
    exit;
}

// Extract preview text from DOCX (first 1000 chars)
$previewText = extractTextFromDocx($outputPath);

// Return the converted file as base64
$response = [
    'success' => true,
    'message' => 'Conversion successful',
    'data' => base64_encode($docxContent),
    'mimeType' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'previewText' => $previewText
];

echo json_encode($response);

// Cleanup
cleanup($tempDir);

/**
 * Clean up temporary files
 */
function cleanup($dir) {
    if (!is_dir($dir)) return;
    
    $files = array_diff(scandir($dir), ['.', '..']);
    foreach ($files as $file) {
        $path = $dir . '/' . $file;
        if (is_dir($path)) {
            cleanup($path);
        } else {
            @unlink($path);
        }
    }
    @rmdir($dir);
}

/**
 * Extract text from DOCX file for preview
 */
function extractTextFromDocx($docxPath) {
    // Check if ZipArchive is available
    if (!class_exists('ZipArchive')) {
        return 'Preview not available (ZipArchive extension not enabled)';
    }
    
    $text = '';
    
    try {
        $zip = new ZipArchive();
        if ($zip->open($docxPath) === TRUE) {
            $xml = $zip->getFromName('word/document.xml');
            $zip->close();
            
            if ($xml) {
                // Simple XML text extraction
                $xmlObj = simplexml_load_string($xml);
                if ($xmlObj) {
                    $text = strip_tags($xml);
                    $text = preg_replace('/\s+/', ' ', $text);
                    $text = substr($text, 0, 1000);
                }
            }
        }
    } catch (Exception $e) {
        $text = 'Preview not available';
    }
    
    return $text;
}
