<?php
// config.php
$site_name = "WordsCompare";
$default_title_suffix = "Free PDF, Calculator & Text Tools"; // For homepage

// BASE URL ---------------------------------------
//$base_url = "http://localhost/mywebtools1.0.2/"; // Optional for absolute paths
// Detect protocol (http/https)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
// Get domain (e.g., localhost or example.com)
$domain = $_SERVER['HTTP_HOST'];
// Get the correct base path (project root, not current file location)
$script_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', dirname(__DIR__)));
$base_path = rtrim($script_path, '/') . '/';
$base_url = $protocol . $domain . $base_path;
?>