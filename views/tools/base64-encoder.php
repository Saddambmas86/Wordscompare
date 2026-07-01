<?php
$page_title = "Base64 Encoder/Decoder - Encode Decode Base64 Online Free";
$page_description = "Free online Base64 encoder and decoder. Encode text to Base64 or decode Base64 strings. Simple, fast, and secure tool for developers.";
$page_keywords = "base64 encoder, base64 decoder, encode base64, decode base64, developer tools, text tools";
include '../../includes/header.php';
?>

<div class="container" style="max-width: 1200px; margin-top: 30px;">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card" style="background: rgba(255,255,255,0.85); backdrop-filter: blur(12px); border-radius: 28px; padding: 30px; box-shadow: 0 30px 60px -20px rgba(0,30,40,0.3);">
                <h1 class="text-center mb-4"><i class="fas fa-lock" style="color: #1f7a7a;"></i> Base64 Encoder / Decoder</h1>
                <div class="toolbar text-center mb-4" style="display: flex; gap: 10px; margin-bottom: 20px; flex-wrap: wrap; justify-content: center;">
                    <button class="btn btn-primary" onclick="encode()" style="padding: 10px 20px; border: none; border-radius: 30px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: #1b6f7a; color: white;"><i class="fas fa-arrow-up"></i> Encode</button>
                    <button class="btn btn-success" onclick="decode()" style="padding: 10px 20px; border: none; border-radius: 30px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: #1f8a6b; color: white;"><i class="fas fa-arrow-down"></i> Decode</button>
                    <button class="btn btn-secondary" onclick="clearAll()" style="padding: 10px 20px; border: none; border-radius: 30px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.6); color: #1b3f4e;"><i class="fas fa-eraser"></i> Clear</button>
                    <button class="btn btn-secondary" onclick="copyResult()" style="padding: 10px 20px; border: none; border-radius: 30px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.6); color: #1b3f4e;"><i class="fas fa-copy"></i> Copy Result</button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="label" style="font-weight: 600; color: #3c6b7a; margin-bottom: 8px; display: block;"><i class="fas fa-edit"></i> Input</label>
                        <textarea id="base64Input" placeholder="Enter text or Base64 string..." style="width: 100%; min-height: 200px; padding: 15px; border: 1px solid rgba(200,215,225,0.3); border-radius: 16px; font-family: 'SF Mono', monospace; font-size: 14px; background: rgba(255,255,255,0.5); backdrop-filter: blur(4px); resize: vertical; outline: none;"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="label" style="font-weight: 600; color: #3c6b7a; margin-bottom: 8px; display: block;"><i class="fas fa-result"></i> Output</label>
                        <textarea id="base64Output" placeholder="Result will appear here..." readonly style="width: 100%; min-height: 200px; padding: 15px; border: 1px solid rgba(200,215,225,0.3); border-radius: 16px; font-family: 'SF Mono', monospace; font-size: 14px; background: rgba(255,255,255,0.5); backdrop-filter: blur(4px); resize: vertical; outline: none;"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function encode() {
        const input = document.getElementById('base64Input').value;
        document.getElementById('base64Output').value = btoa(unescape(encodeURIComponent(input)));
    }
    function decode() {
        const input = document.getElementById('base64Input').value;
        try {
            document.getElementById('base64Output').value = decodeURIComponent(escape(atob(input)));
        } catch(e) {
            document.getElementById('base64Output').value = 'Error: Invalid Base64 string';
        }
    }
    function clearAll() {
        document.getElementById('base64Input').value = '';
        document.getElementById('base64Output').value = '';
    }
    function copyResult() {
        const output = document.getElementById('base64Output');
        navigator.clipboard.writeText(output.value).then(() => {
            alert('Copied to clipboard!');
        });
    }

         <!-- Contextual Navigation Block for SEO -->
        <div class="row mt-4 pt-4 border-top">
            <div class="col-12 text-center">
                <p class="text-muted small">
                    WordsCompare provides a comprehensive suite of free utilities.
                    Use our <a href="<?php echo $base_url; ?>pdf-to-word"
                        class="text-muted text-decoration-underline">PDF to Word Converter</a>,
                    <a href="<?php echo $base_url; ?>age-calculator" class="text-muted text-decoration-underline">Age
                        Calculator</a>,
                    <a href="<?php echo $base_url; ?>word-counter" class="text-muted text-decoration-underline">Word
                        Counter</a>,
                    <a href="<?php echo $base_url; ?>qr-code-generator" class="text-muted text-decoration-underline">QR
                        Code Generator</a>,
                    and <a href="<?php echo $base_url; ?>json-formatter"
                        class="text-muted text-decoration-underline">JSON Formatter</a>
                    to streamline your daily tasks.
                </p>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p class="mb-0">© <?= date('Y') ?> <a href="<?= $base_url ?>"
                    class="text-decoration-none"><?= htmlspecialchars($site_name) ?></a>. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-dark" href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><i class="fab fa-github"></i></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><i class="fab fa-discord"></i></a></li>
            </ul>
        </div>
</script>
<?php include '../../includes/toolsfooter.php'; ?>