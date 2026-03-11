<?php
/**
 * Test script to verify pdf2docx is properly installed
 */

header('Content-Type: text/plain');

echo "Testing PDF to Word conversion setup...\n\n";

// Test 1: Check PHP version
echo "1. PHP Version: " . phpversion() . "\n";

// Test 2: Check if shell_exec is enabled
echo "2. shell_exec function: " . (function_exists('shell_exec') ? 'Available' : 'Not Available') . "\n";

// Test 3: Find Python
echo "\n3. Looking for Python...\n";

$pythonCmd = null;
if (stripos(PHP_OS, 'WIN') === 0) {
    // Windows
    $commands = ['python', 'py'];
} else {
    $commands = ['python3', 'python'];
}

foreach ($commands as $cmd) {
    $output = shell_exec($cmd . ' --version 2>&1');
    echo "   Trying '$cmd': " . ($output ? trim($output) : 'Not found') . "\n";
    if ($output && strpos($output, 'Python') !== false) {
        $pythonCmd = $cmd;
        break;
    }
}

if (!$pythonCmd) {
    echo "\nERROR: Python not found!\n";
    exit;
}

echo "\n4. Using Python command: $pythonCmd\n";

// Test 4: Check if pdf2docx is installed
echo "\n5. Checking pdf2docx installation...\n";
$testScript = <<<'PYTHON'
import sys
try:
    from pdf2docx import Converter
    print('pdf2docx is installed')
except ImportError as e:
    print('ERROR: ' + str(e))
    sys.exit(1)
PYTHON;
$tempFile = sys_get_temp_dir() . '/test_pdf2docx_' . uniqid() . '.py';
file_put_contents($tempFile, $testScript);

$output = shell_exec($pythonCmd . ' ' . escapeshellarg($tempFile) . ' 2>&1');
echo "   " . trim($output) . "\n";

unlink($tempFile);

// Test 5: Check directory permissions
echo "\n6. Checking directory permissions...\n";
$tempDir = sys_get_temp_dir();
echo "   Temp directory: $tempDir\n";
echo "   Writable: " . (is_writable($tempDir) ? 'Yes' : 'No') . "\n";

$apiDir = dirname(__FILE__);
echo "   API directory: $apiDir\n";
echo "   Writable: " . (is_writable($apiDir) ? 'Yes' : 'No') . "\n";

echo "\n=== Test Complete ===\n";
