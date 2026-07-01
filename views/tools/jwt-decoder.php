<?php
$page_title = "JWT Decoder - Debug & Validate JSON Web Tokens Online";
$page_description = "Free online JWT decoder and debugger. Decode, validate, and inspect JSON Web Tokens. View header, payload, and signature. Essential tool for developers.";
$page_keywords = "jwt decoder, json web token, jwt debugger, jwt validator, developer tools, authentication";
include '../../includes/header.php';
?>

<div class="container" style="max-width: 1200px; margin-top: 30px;">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card" style="background: rgba(255,255,255,0.85); backdrop-filter: blur(12px); border-radius: 28px; padding: 30px 35px 35px; box-shadow: 0 30px 60px -20px rgba(0,30,40,0.3); border: 1px solid rgba(255,255,255,0.6);">
                <!-- Header -->
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <h1 style="font-size: 28px; font-weight: 700; color: #0b232f; display: flex; align-items: center; gap: 12px;">
                        <i class="fas fa-key" style="color: #7c3aed; font-size: 30px;"></i>
                        JWT Decoder
                    </h1>
                    <div class="d-flex gap-2 flex-wrap">
                        <span class="badge" style="background: rgba(255,255,255,0.6); backdrop-filter: blur(4px); border: 1px solid rgba(200,215,225,0.3); padding: 6px 14px; border-radius: 40px; font-size: 12px; font-weight: 500; color: #1b3f4e; display: inline-flex; align-items: center; gap: 6px;"><i class="fas fa-shield-alt" style="color: #7c3aed; font-size: 13px;"></i> Debug</span>
                        <span class="badge" style="background: rgba(255,255,255,0.6); backdrop-filter: blur(4px); border: 1px solid rgba(200,215,225,0.3); padding: 6px 14px; border-radius: 40px; font-size: 12px; font-weight: 500; color: #1b3f4e; display: inline-flex; align-items: center; gap: 6px;"><i class="fas fa-code" style="color: #7c3aed; font-size: 13px;"></i> Base64</span>
                        <span class="badge" style="background: rgba(255,255,255,0.6); backdrop-filter: blur(4px); border: 1px solid rgba(200,215,225,0.3); padding: 6px 14px; border-radius: 40px; font-size: 12px; font-weight: 500; color: #1b3f4e; display: inline-flex; align-items: center; gap: 6px;"><i class="fas fa-check-circle" style="color: #7c3aed; font-size: 13px;"></i> Validate</span>
                    </div>
                </div>

                <!-- Input Section -->
                <div style="background: rgba(255,255,255,0.5); backdrop-filter: blur(6px); border-radius: 16px; padding: 18px 20px 20px; border: 1px solid rgba(255,255,255,0.5); margin-bottom: 20px;">
                    <label for="jwtInput" style="font-weight: 600; color: #3c6b7a; display: block; margin-bottom: 8px; font-size: 14px;"><i class="fas fa-edit"></i> Paste JWT Token</label>
                    <textarea id="jwtInput" placeholder="Paste your JWT token here...&#10;Example: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c" style="width: 100%; min-height: 100px; padding: 12px; border: 1px solid rgba(200,215,225,0.3); border-radius: 12px; font-family: 'SF Mono', 'Fira Code', 'Menlo', monospace; font-size: 13px; line-height: 1.6; background: rgba(255,255,255,0.4); backdrop-filter: blur(4px); resize: vertical; outline: none; color: #0b232f; transition: border-color 0.2s;"></textarea>
                    
                    <div class="d-flex flex-wrap gap-2 mt-2 mb-2">
                        <span style="font-size: 12px; color: #5f7e8a; display: flex; align-items: center;">Examples:</span>
                        <button class="btn-sm" onclick="loadExample(1)" style="padding: 4px 14px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e;">Basic</button>
                        <button class="btn-sm" onclick="loadExample(2)" style="padding: 4px 14px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e;">With User</button>
                        <button class="btn-sm" onclick="loadExample(3)" style="padding: 4px 14px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e;">Admin</button>
                    </div>
                    
                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <button class="btn btn-primary" onclick="decodeJWT()" style="padding: 8px 20px; border: none; border-radius: 30px; font-weight: 500; font-size: 13px; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: #7c3aed; border-color: #7c3aed; color: white;">
                            <i class="fas fa-unlock"></i> Decode & Validate
                        </button>
                        <button class="btn btn-success" onclick="decodeJWT()" style="padding: 8px 20px; border: none; border-radius: 30px; font-weight: 500; font-size: 13px; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: #1f8a6b; border-color: #1f8a6b; color: white;">
                            <i class="fas fa-sync"></i> Refresh
                        </button>
                        <button class="btn" onclick="clearAll()" style="padding: 8px 20px; border: none; border-radius: 30px; font-weight: 500; font-size: 13px; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.6); backdrop-filter: blur(4px); border: 1px solid rgba(200,215,225,0.25); color: #1b3f4e;">
                            <i class="fas fa-eraser"></i> Clear
                        </button>
                    </div>
                    
                    <div class="d-flex gap-2 mt-3">
                        <span class="token-part-dot" style="width: 12px; height: 12px; border-radius: 50%; display: inline-block; background: #7c3aed;"></span> Header
                        <span class="token-part-dot" style="width: 12px; height: 12px; border-radius: 50%; display: inline-block; background: #1f8a6b;"></span> Payload
                        <span class="token-part-dot" style="width: 12px; height: 12px; border-radius: 50%; display: inline-block; background: #d97706;"></span> Signature
                    </div>
                </div>

                <!-- Stats -->
                <div class="d-flex flex-wrap gap-4 py-2" style="border-top: 1px solid rgba(180,200,210,0.25); border-bottom: 1px solid rgba(180,200,210,0.25); margin: 20px 0 10px; font-size: 13px; color: #1f4c5a;">
                    <div class="d-flex align-items-center gap-2"><i class="fas fa-hashtag" style="color: #3f8590; width: 16px; font-size: 14px;"></i> Token Length: <span style="font-weight: 600; color: #0b2f3a;" id="tokenLength">0</span></div>
                    <div class="d-flex align-items-center gap-2"><i class="fas fa-layer-group" style="color: #3f8590; width: 16px; font-size: 14px;"></i> Parts: <span style="font-weight: 600; color: #0b2f3a;" id="tokenParts">0/3</span></div>
                    <div class="d-flex align-items-center gap-2"><i class="fas fa-shield-alt" style="color: #3f8590; width: 16px; font-size: 14px;"></i> Algorithm: <span style="font-weight: 600; color: #0b2f3a;" id="algorithm">-</span></div>
                    <div class="d-flex align-items-center gap-2"><i class="fas fa-clock" style="color: #3f8590; width: 16px; font-size: 14px;"></i> Expires: <span style="font-weight: 600; color: #0b2f3a;" id="expires">-</span></div>
                </div>

                <!-- JWT Parts -->
                <div class="row g-3 mt-2">
                    <!-- Header -->
                    <div class="col-md-4">
                        <div class="p-3" style="background: rgba(255,255,255,0.5); backdrop-filter: blur(4px); border-radius: 14px; padding: 16px 18px; border: 1px solid rgba(255,255,255,0.4); transition: all 0.2s;">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="d-flex align-items-center gap-2">
                                    <span style="font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #3c6b7a;"><i class="fas fa-code" style="color: #7c3aed;"></i> Header</span>
                                    <span class="badge" style="font-size: 10px; background: rgba(124,58,237,0.1); padding: 1px 10px; border-radius: 12px; font-weight: 500; color: #7c3aed;">Base64</span>
                                </div>
                            </div>
                            <div id="headerContent" style="font-family: 'SF Mono', 'Fira Code', 'Menlo', monospace; font-size: 12px; color: #0b232f; word-break: break-all; line-height: 1.6; padding: 10px 12px; background: rgba(255,255,255,0.3); border-radius: 8px; min-height: 80px; max-height: 200px; overflow: auto; white-space: pre-wrap;">
                                <span style="color: #a0bcc8; font-family: 'Inter', sans-serif; font-size: 13px;">Waiting for token...</span>
                            </div>
                            <div class="d-flex gap-2 mt-2">
                                <button class="btn-sm" onclick="copyPart('headerContent')" style="padding: 4px 12px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e; display: inline-flex; align-items: center; gap: 4px;"><i class="fas fa-copy" style="font-size: 11px; color: #7c3aed;"></i> Copy</button>
                                <button class="btn-sm" onclick="copyPart('headerContent', true)" style="padding: 4px 12px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e; display: inline-flex; align-items: center; gap: 4px;"><i class="fas fa-copy" style="font-size: 11px; color: #7c3aed;"></i> Raw</button>
                            </div>
                        </div>
                    </div>

                    <!-- Payload -->
                    <div class="col-md-4">
                        <div class="p-3" style="background: rgba(255,255,255,0.5); backdrop-filter: blur(4px); border-radius: 14px; padding: 16px 18px; border: 1px solid rgba(255,255,255,0.4); transition: all 0.2s;">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="d-flex align-items-center gap-2">
                                    <span style="font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #3c6b7a;"><i class="fas fa-database" style="color: #1f8a6b;"></i> Payload</span>
                                    <span class="badge" style="font-size: 10px; background: rgba(31,138,107,0.1); padding: 1px 10px; border-radius: 12px; font-weight: 500; color: #1f8a6b;">Data</span>
                                </div>
                            </div>
                            <div id="payloadContent" style="font-family: 'SF Mono', 'Fira Code', 'Menlo', monospace; font-size: 12px; color: #0b232f; word-break: break-all; line-height: 1.6; padding: 10px 12px; background: rgba(255,255,255,0.3); border-radius: 8px; min-height: 80px; max-height: 200px; overflow: auto; white-space: pre-wrap;">
                                <span style="color: #a0bcc8; font-family: 'Inter', sans-serif; font-size: 13px;">Waiting for token...</span>
                            </div>
                            <div class="d-flex gap-2 mt-2">
                                <button class="btn-sm" onclick="copyPart('payloadContent')" style="padding: 4px 12px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e; display: inline-flex; align-items: center; gap: 4px;"><i class="fas fa-copy" style="font-size: 11px; color: #7c3aed;"></i> Copy</button>
                                <button class="btn-sm" onclick="copyPart('payloadContent', true)" style="padding: 4px 12px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e; display: inline-flex; align-items: center; gap: 4px;"><i class="fas fa-copy" style="font-size: 11px; color: #7c3aed;"></i> Raw</button>
                            </div>
                        </div>
                    </div>

                    <!-- Signature -->
                    <div class="col-md-4">
                        <div class="p-3" style="background: rgba(255,255,255,0.5); backdrop-filter: blur(4px); border-radius: 14px; padding: 16px 18px; border: 1px solid rgba(255,255,255,0.4); transition: all 0.2s;">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="d-flex align-items-center gap-2">
                                    <span style="font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #3c6b7a;"><i class="fas fa-signature" style="color: #d97706;"></i> Signature</span>
                                    <span class="badge" style="font-size: 10px; background: rgba(217,119,6,0.1); padding: 1px 10px; border-radius: 12px; font-weight: 500; color: #d97706;">Hash</span>
                                </div>
                            </div>
                            <div id="signatureContent" style="font-family: 'SF Mono', 'Fira Code', 'Menlo', monospace; font-size: 12px; color: #0b232f; word-break: break-all; line-height: 1.6; padding: 10px 12px; background: rgba(255,255,255,0.3); border-radius: 8px; min-height: 80px; max-height: 200px; overflow: auto; white-space: pre-wrap;">
                                <span style="color: #a0bcc8; font-family: 'Inter', sans-serif; font-size: 13px;">Waiting for token...</span>
                            </div>
                            <div class="d-flex gap-2 mt-2">
                                <button class="btn-sm" onclick="copyPart('signatureContent')" style="padding: 4px 12px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e; display: inline-flex; align-items: center; gap: 4px;"><i class="fas fa-copy" style="font-size: 11px; color: #7c3aed;"></i> Copy</button>
                                <button class="btn-sm" onclick="copyPart('signatureContent', true)" style="padding: 4px 12px; font-size: 11px; border-radius: 20px; border: 1px solid rgba(200,215,225,0.3); background: rgba(255,255,255,0.4); cursor: pointer; transition: 0.2s; color: #1b3f4e; display: inline-flex; align-items: center; gap: 4px;"><i class="fas fa-copy" style="font-size: 11px; color: #7c3aed;"></i> Raw</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Validation Section -->
                <div class="p-3 mt-3" style="background: rgba(255,255,255,0.5); backdrop-filter: blur(4px); border-radius: 14px; border: 1px solid rgba(255,255,255,0.4);">
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <div class="d-flex align-items-center gap-2" id="validationStatus" style="font-weight: 500; font-size: 14px;">
                            <i class="fas fa-circle-info" style="font-size: 18px; color: #3f8590;"></i>
                            <span>Waiting for token validation...</span>
                        </div>
                        <div style="display: flex; gap: 15px; flex-wrap: wrap; margin-left: auto;">
                            <span style="font-size: 12px; color: #5f7e8a;"><i class="fas fa-clock"></i> <span id="currentTime"></span></span>
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div class="d-flex align-items-center gap-2 mt-3 pt-2" style="border-top: 1px solid rgba(180,200,210,0.2); font-size: 13px; color: #1f4c5a;">
                    <i class="fas fa-circle-check" style="font-size: 16px; color: #1f8a6b;"></i>
                    <span id="statusText">Ready to decode JWT tokens</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // ===== DOM Elements =====
    const jwtInput = document.getElementById('jwtInput');
    const statusText = document.getElementById('statusText');
    const statusIcon = document.querySelector('.fa-circle-check, .fa-circle-exclamation, .fa-circle-info');
    const currentTime = document.getElementById('currentTime');

    // ===== Helper Functions =====
    function updateTimestamp() {
        const now = new Date();
        currentTime.textContent = now.toLocaleString('en-US', { hour12: false });
    }
    setInterval(updateTimestamp, 1000);
    updateTimestamp();

    function setStatus(message, type = 'success') {
        statusText.textContent = message;
        const icon = document.querySelector('.fa-circle-check, .fa-circle-exclamation, .fa-circle-info');
        if (type === 'success') {
            icon.className = 'fas fa-circle-check';
            icon.style.color = '#1f8a6b';
        } else if (type === 'error') {
            icon.className = 'fas fa-circle-exclamation';
            icon.style.color = '#bf6a5a';
        } else if (type === 'warning') {
            icon.className = 'fas fa-triangle-exclamation';
            icon.style.color = '#d97706';
        } else {
            icon.className = 'fas fa-circle-info';
            icon.style.color = '#3f8590';
        }
    }

    function formatJSON(obj) {
        const json = JSON.stringify(obj, null, 2);
        return json.replace(/&/g, '&').replace(/</g, '<').replace(/>/g, '>')
            .replace(/"([^"]+)":/g, '<span style="color: #006b7a; font-weight: 600;">"$1"</span>:')
            .replace(/: "([^"]+)"/g, ': <span style="color: #156b3c;">"$1"</span>')
            .replace(/: (\d+)/g, ': <span style="color: #a55d2b;">$1</span>')
            .replace(/: (true|false)/g, ': <span style="color: #a53f6b; font-weight: 500;">$1</span>')
            .replace(/: (null)/g, ': <span style="color: #8a6e8a; font-weight: 500;">$1</span>');
    }

    function base64UrlDecode(str) {
        let base64 = str.replace(/-/g, '+').replace(/_/g, '/');
        while (base64.length % 4) {
            base64 += '=';
        }
        return atob(base64);
    }

    // ===== JWT Decoding =====
    function decodeJWT() {
        const token = jwtInput.value.trim();
        if (!token) {
            setStatus('Please paste a JWT token.', 'error');
            document.getElementById('headerContent').innerHTML = '<span style="color: #a0bcc8; font-family: \'Inter\', sans-serif; font-size: 13px;">No token provided</span>';
            document.getElementById('payloadContent').innerHTML = '<span style="color: #a0bcc8; font-family: \'Inter\', sans-serif; font-size: 13px;">No token provided</span>';
            document.getElementById('signatureContent').innerHTML = '<span style="color: #a0bcc8; font-family: \'Inter\', sans-serif; font-size: 13px;">No token provided</span>';
            document.getElementById('validationStatus').innerHTML = '<i class="fas fa-circle-info" style="font-size: 18px; color: #3f8590;"></i><span>Waiting for token...</span>';
            document.getElementById('tokenLength').textContent = '0';
            document.getElementById('tokenParts').textContent = '0/3';
            document.getElementById('algorithm').textContent = '-';
            document.getElementById('expires').textContent = '-';
            return;
        }

        try {
            const parts = token.split('.');
            if (parts.length !== 3) {
                throw new Error('Invalid JWT token. Expected 3 parts (header.payload.signature)');
            }

            const [headerBase64, payloadBase64, signatureBase64] = parts;

            const headerJson = base64UrlDecode(headerBase64);
            const header = JSON.parse(headerJson);

            const payloadJson = base64UrlDecode(payloadBase64);
            const payload = JSON.parse(payloadJson);

            document.getElementById('headerContent').innerHTML = formatJSON(header);
            document.getElementById('payloadContent').innerHTML = formatJSON(payload);
            document.getElementById('signatureContent').textContent = signatureBase64;

            document.getElementById('tokenLength').textContent = token.length;
            document.getElementById('tokenParts').textContent = '3/3';
            document.getElementById('algorithm').textContent = header.alg || 'Unknown';

            let expiresText = '-';
            if (payload.exp) {
                const expDate = new Date(payload.exp * 1000);
                const now = new Date();
                expiresText = expDate.toLocaleString('en-US', { hour12: false });
                if (payload.exp * 1000 < now.getTime()) {
                    expiresText += ' ⚠️ Expired';
                }
            }
            document.getElementById('expires').textContent = expiresText;

            const validationStatus = document.getElementById('validationStatus');
            let isValid = true;
            let messages = [];

            if (payload.exp) {
                const now = Math.floor(Date.now() / 1000);
                if (payload.exp < now) {
                    isValid = false;
                    messages.push('Token has expired');
                }
            }

            if (payload.nbf) {
                const now = Math.floor(Date.now() / 1000);
                if (payload.nbf > now) {
                    isValid = false;
                    messages.push('Token not yet valid (nbf)');
                }
            }

            if (payload.iss) {
                messages.push(`Issuer: ${payload.iss}`);
            }

            if (payload.aud) {
                messages.push(`Audience: ${payload.aud}`);
            }

            if (isValid) {
                validationStatus.className = 'd-flex align-items-center gap-2';
                validationStatus.style.fontWeight = '500';
                validationStatus.style.fontSize = '14px';
                validationStatus.style.color = '#1f8a6b';
                const msg = messages.length > 0 ? `✅ Valid JWT · ${messages.join(' · ')}` : '✅ Valid JWT Token';
                validationStatus.innerHTML = `<i class="fas fa-check-circle" style="font-size: 18px;"></i><span>${msg}</span>`;
                setStatus('✅ JWT token validated successfully!', 'success');
            } else {
                validationStatus.className = 'd-flex align-items-center gap-2';
                validationStatus.style.fontWeight = '500';
                validationStatus.style.fontSize = '14px';
                validationStatus.style.color = '#bf6a5a';
                validationStatus.innerHTML = `<i class="fas fa-times-circle" style="font-size: 18px;"></i><span>❌ Invalid: ${messages.join(' · ')}</span>`;
                setStatus('❌ JWT token validation failed.', 'error');
            }

        } catch (error) {
            document.getElementById('headerContent').innerHTML = `<span style="color: #bf6a5a;">Error: ${error.message}</span>`;
            document.getElementById('payloadContent').innerHTML = `<span style="color: #bf6a5a;">Error: ${error.message}</span>`;
            document.getElementById('signatureContent').innerHTML = `<span style="color: #bf6a5a;">Error: ${error.message}</span>`;
            
            const validationStatus = document.getElementById('validationStatus');
            validationStatus.className = 'd-flex align-items-center gap-2';
            validationStatus.style.fontWeight = '500';
            validationStatus.style.fontSize = '14px';
            validationStatus.style.color = '#bf6a5a';
            validationStatus.innerHTML = `<i class="fas fa-times-circle" style="font-size: 18px;"></i><span>❌ ${error.message}</span>`;
            
            document.getElementById('tokenLength').textContent = jwtInput.value.length;
            document.getElementById('tokenParts').textContent = 'Invalid';
            document.getElementById('algorithm').textContent = '-';
            document.getElementById('expires').textContent = '-';
            
            setStatus('❌ Error decoding JWT: ' + error.message, 'error');
        }
    }

    // ===== Copy Functions =====
    function copyPart(elementId, raw = false) {
        const element = document.getElementById(elementId);
        let text = element.textContent;
        if (!text || text.includes('Waiting') || text.includes('No token') || text.includes('Error')) {
            setStatus('❌ Nothing to copy.', 'error');
            return;
        }
        
        if (raw) {
            const parts = jwtInput.value.trim().split('.');
            if (parts.length === 3) {
                let partIndex = 0;
                if (elementId === 'headerContent') partIndex = 0;
                else if (elementId === 'payloadContent') partIndex = 1;
                else if (elementId === 'signatureContent') partIndex = 2;
                text = parts[partIndex] || '';
            }
        }
        
        navigator.clipboard.writeText(text).then(() => {
            setStatus('✅ Copied to clipboard!', 'success');
        }).catch(() => {
            const textArea = document.createElement('textarea');
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            setStatus('✅ Copied to clipboard!', 'success');
        });
    }

    // ===== Load Examples =====
    function loadExample(type) {
        const examples = {
            1: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c',
            2: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaGhuIERvZSIsImVtYWlsIjoiam9obkBleGFtcGxlLmNvbSIsImlhdCI6MTUxNjIzOTAyMiwiZXhwIjoyNTI0NjA4MDAwfQ.3mZxHZj50gpHkZnwLCQk6bEHG6K6DZfRJ1fV5qPF6LE',
            3: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJhZG1pbiIsIm5hbWUiOiJBZG1pbmlzdHJhdG9yIiwicm9sZSI6ImFkbWluIiwiaWF0IjoxNTE2MjM5MDIyLCJleHAiOjI1MjQ2MDgwMDB9.4BmRChsDkDgZ6JCcy3aLAv_GLT2H7uZ1jzVcK0pQlK4'
        };
        jwtInput.value = examples[type] || '';
        decodeJWT();
    }

    // ===== Clear All =====
    function clearAll() {
        jwtInput.value = '';
        document.getElementById('headerContent').innerHTML = '<span style="color: #a0bcc8; font-family: \'Inter\', sans-serif; font-size: 13px;">Waiting for token...</span>';
        document.getElementById('payloadContent').innerHTML = '<span style="color: #a0bcc8; font-family: \'Inter\', sans-serif; font-size: 13px;">Waiting for token...</span>';
        document.getElementById('signatureContent').innerHTML = '<span style="color: #a0bcc8; font-family: \'Inter\', sans-serif; font-size: 13px;">Waiting for token...</span>';
        document.getElementById('tokenLength').textContent = '0';
        document.getElementById('tokenParts').textContent = '0/3';
        document.getElementById('algorithm').textContent = '-';
        document.getElementById('expires').textContent = '-';
        document.getElementById('validationStatus').className = 'd-flex align-items-center gap-2';
        document.getElementById('validationStatus').style.fontWeight = '500';
        document.getElementById('validationStatus').style.fontSize = '14px';
        document.getElementById('validationStatus').style.color = '#3f8590';
        document.getElementById('validationStatus').innerHTML = '<i class="fas fa-circle-info" style="font-size: 18px;"></i><span>Waiting for token validation...</span>';
        setStatus('⏳ Cleared. Paste a token and decode.', 'info');
    }

    // ===== Keyboard Shortcuts =====
    jwtInput.addEventListener('keydown', function(e) {
        if (e.ctrlKey && e.key === 'Enter') {
            e.preventDefault();
            decodeJWT();
        }
    });

    // ===== Auto-decode on paste =====
    jwtInput.addEventListener('paste', function() {
        setTimeout(decodeJWT, 100);
    });

    // ===== Initialize =====
    if (jwtInput.value.trim()) {
        setTimeout(decodeJWT, 200);
    }
</script>

<?php include '../../includes/toolsfooter.php'; ?>