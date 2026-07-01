<?php
$page_title = "Hash Generator - Generate MD5 SHA1 SHA256 SHA512 Online";
$page_description = "Free online hash generator. Generate MD5, SHA1, SHA256, SHA512, CRC32 and Base64 hashes. Secure, fast, and reliable hash generation tool.";
$page_keywords = "hash generator, md5 generator, sha1, sha256, sha512, crc32, base64, developer tools, cryptography";
include '../../includes/header.php';
?>

<div class="container" style="max-width: 1100px; margin-top: 30px;">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card" style="background: rgba(255,255,255,0.85); backdrop-filter: blur(12px); border-radius: 28px; padding: 30px 35px 35px; box-shadow: 0 30px 60px -20px rgba(0,30,40,0.3); border: 1px solid rgba(255,255,255,0.6);">
                <!-- Header -->
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <h1 style="font-size: 28px; font-weight: 700; color: #0b232f; display: flex; align-items: center; gap: 12px;">
                        <i class="fas fa-fingerprint" style="color: #1f7a7a; font-size: 30px;"></i>
                        Hash Generator
                    </h1>
                    <div class="d-flex gap-2 flex-wrap">
                        <span class="badge" style="background: rgba(255,255,255,0.6); backdrop-filter: blur(4px); border: 1px solid rgba(200,215,225,0.3); padding: 6px 14px; border-radius: 40px; font-size: 12px; font-weight: 500; color: #1b3f4e; display: inline-flex; align-items: center; gap: 6px;"><i class="fas fa-shield-alt" style="color: #2a7a7a; font-size: 13px;"></i> Secure</span>
                        <span class="badge" style="background: rgba(255,255,255,0.6); backdrop-filter: blur(4px); border: 1px solid rgba(200,215,225,0.3); padding: 6px 14px; border-radius: 40px; font-size: 12px; font-weight: 500; color: #1b3f4e; display: inline-flex; align-items: center; gap: 6px;"><i class="fas fa-bolt" style="color: #2a7a7a; font-size: 13px;"></i> Fast</span>
                        <span class="badge" style="background: rgba(255,255,255,0.6); backdrop-filter: blur(4px); border: 1px solid rgba(200,215,225,0.3); padding: 6px 14px; border-radius: 40px; font-size: 12px; font-weight: 500; color: #1b3f4e; display: inline-flex; align-items: center; gap: 6px;"><i class="fas fa-check-circle" style="color: #2a7a7a; font-size: 13px;"></i> Reliable</span>
                    </div>
                </div>

                <!-- Input Section -->
                <div style="background: rgba(255,255,255,0.5); backdrop-filter: blur(6px); border-radius: 16px; padding: 18px 20px 20px; border: 1px solid rgba(255,255,255,0.5); margin-bottom: 20px;">
                    <label for="hashInput" style="font-weight: 600; color: #3c6b7a; display: block; margin-bottom: 8px; font-size: 14px;"><i class="fas fa-edit"></i> Enter text or upload file</label>
                    <textarea id="hashInput" placeholder="Type or paste text to generate hash...&#10;Example: Hello World" style="width: 100%; min-height: 120px; padding: 12px; border: 1px solid rgba(200,215,225,0.3); border-radius: 12px; font-family: 'SF Mono', 'Fira Code', 'Menlo', monospace; font-size: 14px; line-height: 1.6; background: rgba(255,255,255,0.4); backdrop-filter: blur(4px); resize: vertical; outline: none; color: #0b232f; transition: border-color 0.2s;">Hello World</textarea>
                    
                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <button class="btn btn-primary" onclick="generateHashes()" style="padding: 8px 20px; border: none; border-radius: 30px; font-weight: 500; font-size: 13px; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: #1b6f7a; border-color: #1b6f7a; color: white;">
                            <i class="fas fa-calculator"></i> Generate Hashes
                        </button>
                        <button class="btn btn-success" onclick="generateHashes()" style="padding: 8px 20px; border: none; border-radius: 30px; font-weight: 500; font-size: 13px; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: #1f8a6b; border-color: #1f8a6b; color: white;">
                            <i class="fas fa-sync"></i> Refresh
                        </button>
                        <button class="btn" onclick="clearAll()" style="padding: 8px 20px; border: none; border-radius: 30px; font-weight: 500; font-size: 13px; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.6); backdrop-filter: blur(4px); border: 1px solid rgba(200,215,225,0.25); color: #1b3f4e;">
                            <i class="fas fa-eraser"></i> Clear
                        </button>
                        <div class="input-group" style="display: inline-flex; align-items: center; gap: 12px;">
                            <label for="fileInput" class="btn" style="padding: 8px 18px; background: rgba(255,255,255,0.6); border: 1px solid rgba(200,215,225,0.3); border-radius: 30px; cursor: pointer; font-size: 13px; font-weight: 500; color: #1b3f4e; display: inline-flex; align-items: center; gap: 8px; margin: 0;">
                                <i class="fas fa-file-upload" style="color: #2a6e7a;"></i> Upload File
                            </label>
                            <input type="file" id="fileInput" onchange="handleFileUpload(event)" style="display: none;" />
                            <span style="font-size: 13px; color: #5f7e8a;" id="fileName">No file selected</span>
                        </div>
                    </div>
                </div>

                <!-- Stats -->
                <div class="d-flex flex-wrap gap-4 py-2" style="border-top: 1px solid rgba(180,200,210,0.25); border-bottom: 1px solid rgba(180,200,210,0.25); margin: 20px 0 10px; font-size: 13px; color: #1f4c5a;">
                    <div class="d-flex align-items-center gap-2"><i class="fas fa-font" style="color: #3f8590; width: 16px; font-size: 14px;"></i> Input Length: <span style="font-weight: 600; color: #0b2f3a;" id="inputLength">11</span></div>
                    <div class="d-flex align-items-center gap-2"><i class="fas fa-weight-hanging" style="color: #3f8590; width: 16px; font-size: 14px;"></i> Input Size: <span style="font-weight: 600; color: #0b2f3a;" id="inputSize">11 B</span></div>
                    <div class="d-flex align-items-center gap-2"><i class="fas fa-hashtag" style="color: #3f8590; width: 16px; font-size: 14px;"></i> Hashes Generated: <span style="font-weight: 600; color: #0b2f3a;" id="hashCount">6</span></div>
                </div>

                <!-- Hash Results -->
                <div class="row g-3 mt-2">
                    <!-- MD5 -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: rgba(255,255,255,0.5); backdrop-filter: blur(4px); border-radius: 14px; padding: 16px 18px; border: 1px solid rgba(255,255,255,0.4); transition: all 0.2s;">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span style="font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #3c6b7a;"><i class="fas fa-hashtag"></i> MD5</span>
                                <span class="badge" style="font-size: 10px; background: rgba(60,107,122,0.1); padding: 1px 10px; border-radius: 12px; font-weight: 500; color: #3c6b7a;">128-bit</span>
                            </div>
                            <div id="md5Result" style="font-family: 'SF Mono', 'Fira Code', 'Menlo', monospace; font-size: 13px; color: #0b232f; word-break: break-all; line-height: 1.5; padding: 8px 10px; background: rgba(255,255,255,0.3); border-radius: 8px; min-height: 40px; display: flex; align-items: center;">
                                <span style="color: #a0bcc8; font-family: 'Segoe UI', sans-serif; font-size: 13px;">Click "Generate Hashes"</span>
                            </div>
                            <div class="d-flex gap-2 mt-2">
                                <button class="btn-sm" onclick="copyHash('md5Result')" style="padding: 4px 12px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e; display: inline-flex; align-items: center; gap: 4px;"><i class="fas fa-copy" style="font-size: 11px; color: #2a6e7a;"></i> Copy</button>
                                <button class="btn-sm" onclick="copyHash('md5Result', true)" style="padding: 4px 12px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e; display: inline-flex; align-items: center; gap: 4px;"><i class="fas fa-copy" style="font-size: 11px; color: #2a6e7a;"></i> Copy (Lowercase)</button>
                            </div>
                        </div>
                    </div>

                    <!-- SHA1 -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: rgba(255,255,255,0.5); backdrop-filter: blur(4px); border-radius: 14px; padding: 16px 18px; border: 1px solid rgba(255,255,255,0.4); transition: all 0.2s;">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span style="font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #3c6b7a;"><i class="fas fa-hashtag"></i> SHA1</span>
                                <span class="badge" style="font-size: 10px; background: rgba(60,107,122,0.1); padding: 1px 10px; border-radius: 12px; font-weight: 500; color: #3c6b7a;">160-bit</span>
                            </div>
                            <div id="sha1Result" style="font-family: 'SF Mono', 'Fira Code', 'Menlo', monospace; font-size: 13px; color: #0b232f; word-break: break-all; line-height: 1.5; padding: 8px 10px; background: rgba(255,255,255,0.3); border-radius: 8px; min-height: 40px; display: flex; align-items: center;">
                                <span style="color: #a0bcc8; font-family: 'Segoe UI', sans-serif; font-size: 13px;">Click "Generate Hashes"</span>
                            </div>
                            <div class="d-flex gap-2 mt-2">
                                <button class="btn-sm" onclick="copyHash('sha1Result')" style="padding: 4px 12px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e; display: inline-flex; align-items: center; gap: 4px;"><i class="fas fa-copy" style="font-size: 11px; color: #2a6e7a;"></i> Copy</button>
                                <button class="btn-sm" onclick="copyHash('sha1Result', true)" style="padding: 4px 12px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e; display: inline-flex; align-items: center; gap: 4px;"><i class="fas fa-copy" style="font-size: 11px; color: #2a6e7a;"></i> Copy (Lowercase)</button>
                            </div>
                        </div>
                    </div>

                    <!-- SHA256 -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: rgba(255,255,255,0.5); backdrop-filter: blur(4px); border-radius: 14px; padding: 16px 18px; border: 1px solid rgba(255,255,255,0.4); transition: all 0.2s;">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span style="font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #3c6b7a;"><i class="fas fa-hashtag"></i> SHA256</span>
                                <span class="badge" style="font-size: 10px; background: rgba(60,107,122,0.1); padding: 1px 10px; border-radius: 12px; font-weight: 500; color: #3c6b7a;">256-bit</span>
                            </div>
                            <div id="sha256Result" style="font-family: 'SF Mono', 'Fira Code', 'Menlo', monospace; font-size: 13px; color: #0b232f; word-break: break-all; line-height: 1.5; padding: 8px 10px; background: rgba(255,255,255,0.3); border-radius: 8px; min-height: 40px; display: flex; align-items: center;">
                                <span style="color: #a0bcc8; font-family: 'Segoe UI', sans-serif; font-size: 13px;">Click "Generate Hashes"</span>
                            </div>
                            <div class="d-flex gap-2 mt-2">
                                <button class="btn-sm" onclick="copyHash('sha256Result')" style="padding: 4px 12px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e; display: inline-flex; align-items: center; gap: 4px;"><i class="fas fa-copy" style="font-size: 11px; color: #2a6e7a;"></i> Copy</button>
                                <button class="btn-sm" onclick="copyHash('sha256Result', true)" style="padding: 4px 12px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e; display: inline-flex; align-items: center; gap: 4px;"><i class="fas fa-copy" style="font-size: 11px; color: #2a6e7a;"></i> Copy (Lowercase)</button>
                            </div>
                        </div>
                    </div>

                    <!-- SHA512 -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: rgba(255,255,255,0.5); backdrop-filter: blur(4px); border-radius: 14px; padding: 16px 18px; border: 1px solid rgba(255,255,255,0.4); transition: all 0.2s;">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span style="font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #3c6b7a;"><i class="fas fa-hashtag"></i> SHA512</span>
                                <span class="badge" style="font-size: 10px; background: rgba(60,107,122,0.1); padding: 1px 10px; border-radius: 12px; font-weight: 500; color: #3c6b7a;">512-bit</span>
                            </div>
                            <div id="sha512Result" style="font-family: 'SF Mono', 'Fira Code', 'Menlo', monospace; font-size: 13px; color: #0b232f; word-break: break-all; line-height: 1.5; padding: 8px 10px; background: rgba(255,255,255,0.3); border-radius: 8px; min-height: 40px; display: flex; align-items: center;">
                                <span style="color: #a0bcc8; font-family: 'Segoe UI', sans-serif; font-size: 13px;">Click "Generate Hashes"</span>
                            </div>
                            <div class="d-flex gap-2 mt-2">
                                <button class="btn-sm" onclick="copyHash('sha512Result')" style="padding: 4px 12px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e; display: inline-flex; align-items: center; gap: 4px;"><i class="fas fa-copy" style="font-size: 11px; color: #2a6e7a;"></i> Copy</button>
                                <button class="btn-sm" onclick="copyHash('sha512Result', true)" style="padding: 4px 12px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e; display: inline-flex; align-items: center; gap: 4px;"><i class="fas fa-copy" style="font-size: 11px; color: #2a6e7a;"></i> Copy (Lowercase)</button>
                            </div>
                        </div>
                    </div>

                    <!-- CRC32 -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: rgba(255,255,255,0.5); backdrop-filter: blur(4px); border-radius: 14px; padding: 16px 18px; border: 1px solid rgba(255,255,255,0.4); transition: all 0.2s;">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span style="font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #3c6b7a;"><i class="fas fa-hashtag"></i> CRC32</span>
                                <span class="badge" style="font-size: 10px; background: rgba(60,107,122,0.1); padding: 1px 10px; border-radius: 12px; font-weight: 500; color: #3c6b7a;">32-bit</span>
                            </div>
                            <div id="crc32Result" style="font-family: 'SF Mono', 'Fira Code', 'Menlo', monospace; font-size: 13px; color: #0b232f; word-break: break-all; line-height: 1.5; padding: 8px 10px; background: rgba(255,255,255,0.3); border-radius: 8px; min-height: 40px; display: flex; align-items: center;">
                                <span style="color: #a0bcc8; font-family: 'Segoe UI', sans-serif; font-size: 13px;">Click "Generate Hashes"</span>
                            </div>
                            <div class="d-flex gap-2 mt-2">
                                <button class="btn-sm" onclick="copyHash('crc32Result')" style="padding: 4px 12px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e; display: inline-flex; align-items: center; gap: 4px;"><i class="fas fa-copy" style="font-size: 11px; color: #2a6e7a;"></i> Copy</button>
                                <button class="btn-sm" onclick="copyHash('crc32Result', true)" style="padding: 4px 12px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e; display: inline-flex; align-items: center; gap: 4px;"><i class="fas fa-copy" style="font-size: 11px; color: #2a6e7a;"></i> Copy (Lowercase)</button>
                            </div>
                        </div>
                    </div>

                    <!-- Base64 -->
                    <div class="col-md-6">
                        <div class="p-3" style="background: rgba(255,255,255,0.5); backdrop-filter: blur(4px); border-radius: 14px; padding: 16px 18px; border: 1px solid rgba(255,255,255,0.4); transition: all 0.2s;">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span style="font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #3c6b7a;"><i class="fas fa-hashtag"></i> Base64</span>
                                <span class="badge" style="font-size: 10px; background: rgba(60,107,122,0.1); padding: 1px 10px; border-radius: 12px; font-weight: 500; color: #3c6b7a;">Encoding</span>
                            </div>
                            <div id="base64Result" style="font-family: 'SF Mono', 'Fira Code', 'Menlo', monospace; font-size: 13px; color: #0b232f; word-break: break-all; line-height: 1.5; padding: 8px 10px; background: rgba(255,255,255,0.3); border-radius: 8px; min-height: 40px; display: flex; align-items: center;">
                                <span style="color: #a0bcc8; font-family: 'Segoe UI', sans-serif; font-size: 13px;">Click "Generate Hashes"</span>
                            </div>
                            <div class="d-flex gap-2 mt-2">
                                <button class="btn-sm" onclick="copyHash('base64Result')" style="padding: 4px 12px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e; display: inline-flex; align-items: center; gap: 4px;"><i class="fas fa-copy" style="font-size: 11px; color: #2a6e7a;"></i> Copy</button>
                                <button class="btn-sm" onclick="copyHash('base64Result', true)" style="padding: 4px 12px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e; display: inline-flex; align-items: center; gap: 4px;"><i class="fas fa-copy" style="font-size: 11px; color: #2a6e7a;"></i> Copy (Lowercase)</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div class="d-flex align-items-center gap-2 mt-3 pt-2" style="border-top: 1px solid rgba(180,200,210,0.2); font-size: 13px; color: #1f4c5a;">
                    <i class="fas fa-circle-check" style="font-size: 16px; color: #1f8a6b;"></i>
                    <span id="statusText">Ready to generate hashes</span>
                    <span style="margin-left: auto; font-size: 12px; color: #8ba3ae;"><i class="fas fa-clock"></i> <span id="timestamp"></span></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<script>
    // ===== DOM Elements =====
    const inputText = document.getElementById('hashInput');
    const statusText = document.getElementById('statusText');
    const statusIcon = document.querySelector('.fa-circle-check, .fa-circle-exclamation, .fa-circle-info');
    const timestamp = document.getElementById('timestamp');

    // ===== Helper Functions =====
    function updateTimestamp() {
        const now = new Date();
        timestamp.textContent = now.toLocaleTimeString('en-US', { hour12: false });
    }
    setInterval(updateTimestamp, 1000);
    updateTimestamp();

    function updateStats(text) {
        const length = text.length;
        document.getElementById('inputLength').textContent = length;
        const bytes = new Blob([text]).size;
        if (bytes < 1024) {
            document.getElementById('inputSize').textContent = bytes + ' B';
        } else if (bytes < 1048576) {
            document.getElementById('inputSize').textContent = (bytes / 1024).toFixed(1) + ' KB';
        } else {
            document.getElementById('inputSize').textContent = (bytes / 1048576).toFixed(1) + ' MB';
        }
    }

    function setStatus(message, type = 'success') {
        statusText.textContent = message;
        const icon = document.querySelector('.fa-circle-check, .fa-circle-exclamation, .fa-circle-info');
        if (type === 'success') {
            icon.className = 'fas fa-circle-check';
            icon.style.color = '#1f8a6b';
        } else if (type === 'error') {
            icon.className = 'fas fa-circle-exclamation';
            icon.style.color = '#bf6a5a';
        } else {
            icon.className = 'fas fa-circle-info';
            icon.style.color = '#3f8590';
        }
    }

    // ===== Hash Generation =====
    function generateHashes() {
        const text = inputText.value;
        if (!text) {
            setStatus('Please enter some text or upload a file.', 'error');
            return;
        }

        try {
            // MD5
            const md5Hash = CryptoJS.MD5(text).toString();
            document.getElementById('md5Result').textContent = md5Hash;

            // SHA1
            const sha1Hash = CryptoJS.SHA1(text).toString();
            document.getElementById('sha1Result').textContent = sha1Hash;

            // SHA256
            const sha256Hash = CryptoJS.SHA256(text).toString();
            document.getElementById('sha256Result').textContent = sha256Hash;

            // SHA512
            const sha512Hash = CryptoJS.SHA512(text).toString();
            document.getElementById('sha512Result').textContent = sha512Hash;

            // CRC32
            const crc32 = calculateCRC32(text);
            document.getElementById('crc32Result').textContent = crc32;

            // Base64
            const base64 = btoa(unescape(encodeURIComponent(text)));
            document.getElementById('base64Result').textContent = base64;

            // Update stats
            updateStats(text);
            document.getElementById('hashCount').textContent = '6';
            setStatus('✅ Hashes generated successfully!', 'success');

        } catch (e) {
            setStatus('❌ Error generating hashes: ' + e.message, 'error');
        }
    }

    // ===== CRC32 Implementation =====
    function calculateCRC32(str) {
        let crc = 0xFFFFFFFF;
        for (let i = 0; i < str.length; i++) {
            const char = str.charCodeAt(i);
            crc = crc ^ char;
            for (let j = 0; j < 8; j++) {
                if (crc & 1) {
                    crc = (crc >>> 1) ^ 0xEDB88320;
                } else {
                    crc = crc >>> 1;
                }
            }
        }
        return (crc ^ 0xFFFFFFFF).toString(16).toUpperCase().padStart(8, '0');
    }

    // ===== File Upload Handler =====
    function handleFileUpload(event) {
        const file = event.target.files[0];
        if (!file) return;

        document.getElementById('fileName').textContent = file.name;

        const reader = new FileReader();
        reader.onload = function(e) {
            const content = e.target.result;
            inputText.value = content;
            updateStats(content);
            generateHashes();
            setStatus(`✅ File "${file.name}" loaded successfully!`, 'success');
        };
        reader.onerror = function() {
            setStatus('❌ Error reading file.', 'error');
        };
        reader.readAsText(file);
    }

    // ===== Copy Hash Function =====
    function copyHash(elementId, lowercase = false) {
        const element = document.getElementById(elementId);
        let text = element.textContent;
        if (!text || text.includes('Click "Generate Hashes"')) {
            setStatus('❌ No hash to copy. Generate hashes first.', 'error');
            return;
        }
        if (lowercase) {
            text = text.toLowerCase();
        }
        navigator.clipboard.writeText(text).then(() => {
            setStatus('✅ Hash copied to clipboard!', 'success');
        }).catch(() => {
            // Fallback for older browsers
            const textArea = document.createElement('textarea');
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            setStatus('✅ Hash copied to clipboard!', 'success');
        });
    }

    // ===== Clear All =====
    function clearAll() {
        inputText.value = '';
        const emptyMessage = '<span style="color: #a0bcc8; font-family: \'Segoe UI\', sans-serif; font-size: 13px;">Click "Generate Hashes"</span>';
        document.getElementById('md5Result').innerHTML = emptyMessage;
        document.getElementById('sha1Result').innerHTML = emptyMessage;
        document.getElementById('sha256Result').innerHTML = emptyMessage;
        document.getElementById('sha512Result').innerHTML = emptyMessage;
        document.getElementById('crc32Result').innerHTML = emptyMessage;
        document.getElementById('base64Result').innerHTML = emptyMessage;
        document.getElementById('inputLength').textContent = '0';
        document.getElementById('inputSize').textContent = '0 B';
        document.getElementById('hashCount').textContent = '0';
        document.getElementById('fileName').textContent = 'No file selected';
        document.getElementById('fileInput').value = '';
        setStatus('⏳ Cleared. Enter text and generate hashes.', 'info');
    }

    // ===== Keyboard Shortcuts =====
    inputText.addEventListener('keydown', function(e) {
        // Ctrl+Enter to generate
        if (e.ctrlKey && e.key === 'Enter') {
            e.preventDefault();
            generateHashes();
        }
    });

    // Auto-generate on input change with debounce
    let timer = null;
    inputText.addEventListener('input', function() {
        clearTimeout(timer);
        timer = setTimeout(() => {
            updateStats(this.value);
        }, 300);
    });

    // ===== Initialize =====
    // Auto-generate on load
    setTimeout(generateHashes, 100);

    // Update stats on load
    updateStats(inputText.value);
</script>

<?php include '../../includes/toolsfooter.php'; ?>