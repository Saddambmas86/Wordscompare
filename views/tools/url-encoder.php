<?php
$page_title = "URL Encoder/Decoder - Encode Decode URLs Online Free";
$page_description = "Free online URL encoder and decoder. Encode special characters in URLs or decode encoded URLs. Essential tool for web developers.";
$page_keywords = "url encoder, url decoder, encode url, decode url, developer tools, web tools";
include '../../includes/header.php';
?>

<div class="container" style="max-width: 1200px; margin-top: 30px;">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card" style="background: rgba(255,255,255,0.85); backdrop-filter: blur(12px); border-radius: 28px; padding: 30px; box-shadow: 0 30px 60px -20px rgba(0,30,40,0.3);">
                <h1 class="text-center mb-4"><i class="fas fa-link" style="color: #1f7a7a;"></i> URL Encoder / Decoder</h1>
                <div class="toolbar text-center mb-4" style="display: flex; gap: 10px; margin-bottom: 20px; flex-wrap: wrap; justify-content: center;">
                    <button class="btn btn-primary" onclick="encode()" style="padding: 10px 20px; border: none; border-radius: 30px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: #1b6f7a; color: white;"><i class="fas fa-arrow-up"></i> Encode</button>
                    <button class="btn btn-success" onclick="decode()" style="padding: 10px 20px; border: none; border-radius: 30px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: #1f8a6b; color: white;"><i class="fas fa-arrow-down"></i> Decode</button>
                    <button class="btn btn-secondary" onclick="clearAll()" style="padding: 10px 20px; border: none; border-radius: 30px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.6); color: #1b3f4e;"><i class="fas fa-eraser"></i> Clear</button>
                    <button class="btn btn-secondary" onclick="copyResult()" style="padding: 10px 20px; border: none; border-radius: 30px; font-weight: 500; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.6); color: #1b3f4e;"><i class="fas fa-copy"></i> Copy Result</button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="label" style="font-weight: 600; color: #3c6b7a; margin-bottom: 8px; display: block;"><i class="fas fa-edit"></i> Input</label>
                        <textarea id="urlInput" placeholder="Enter URL or encoded string..." style="width: 100%; min-height: 200px; padding: 15px; border: 1px solid rgba(200,215,225,0.3); border-radius: 16px; font-family: 'SF Mono', monospace; font-size: 14px; background: rgba(255,255,255,0.5); backdrop-filter: blur(4px); resize: vertical; outline: none;"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="label" style="font-weight: 600; color: #3c6b7a; margin-bottom: 8px; display: block;"><i class="fas fa-result"></i> Output</label>
                        <textarea id="urlOutput" placeholder="Result will appear here..." readonly style="width: 100%; min-height: 200px; padding: 15px; border: 1px solid rgba(200,215,225,0.3); border-radius: 16px; font-family: 'SF Mono', monospace; font-size: 14px; background: rgba(255,255,255,0.5); backdrop-filter: blur(4px); resize: vertical; outline: none;"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function encode() {
        const input = document.getElementById('urlInput').value;
        document.getElementById('urlOutput').value = encodeURIComponent(input);
    }
    function decode() {
        const input = document.getElementById('urlInput').value;
        try {
            document.getElementById('urlOutput').value = decodeURIComponent(input);
        } catch(e) {
            document.getElementById('urlOutput').value = 'Error: Invalid URL encoding';
        }
    }
    function clearAll() {
        document.getElementById('urlInput').value = '';
        document.getElementById('urlOutput').value = '';
    }
    function copyResult() {
        const output = document.getElementById('urlOutput');
        navigator.clipboard.writeText(output.value).then(() => {
            alert('Copied to clipboard!');
        });
    }
</script>

<?php include '../../includes/toolsfooter.php'; ?>