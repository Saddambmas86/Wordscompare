<?php
// SEO and Page Metadata
$page_title = "JWT Decoder - Decode JSON Web Tokens Online";
$page_description = "Free online JWT Decoder. Easily parse, decode and inspect JSON Web Tokens (JWT). See the header, payload, and claims in a readable JSON format safely.";
$page_keywords = "jwt decoder, json web token decoder, decode jwt, jwt parser, check jwt claims, jwt read";

// Include common header
include '../../includes/header.php';
?>

<!-- TOOL -->
<div class="container">
    <div class="row justify-content-center">
        
        <div class="d-lg-none mb-3">
            <button class="btn btn-outline-danger w-100 d-flex justify-content-between align-items-center collapsed" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#toolsSidebar" 
                    aria-expanded="false">
                <span>Browse Tools</span>
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>

        <div class="col-lg-2">
            <div class="collapse d-lg-block h-100" id="toolsSidebar">
                <div class="card h-100">
                    <div class="card-body p-2">
                        <input type="text" id="searchTools" class="form-control border-danger mb-3" placeholder="Search tools...">
                        
                        <div class="list-group list-group-flush overflow-auto" style="max-height: calc(200vh - 150px);">
                            <div id="toolsList"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-7 border shadow-sm">
            <div class="tool-container rounded-3 p-4 p-md-5">
                <header class="text-center mb-4">
                    <h1 class="h2">JWT Decoder <i class="fas fa-key text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Decode and inspect JSON Web Tokens instantly.</p>
                </header>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-keyboard me-2"></i>Encoded JWT</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <textarea class="form-control font-monospace" id="tokenInput" rows="5" placeholder="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..."></textarea>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                           <span class="badge bg-secondary" id="tokenFormatBadge">Format: Unknown</span>
                           <button class="btn btn-secondary btn-sm" id="clearBtn"><i class="fas fa-eraser me-1"></i> Clear</button>
                        </div>
                    </div>
                </div>

                <div id="statusArea" class="text-center mb-4"></div>

                <div class="preview-area card mb-4">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0"><i class="fas fa-heading me-2"></i>Header <small class="text-white-50 ms-2">(Algorithm & Token Type)</small></h5>
                    </div>
                    <div class="card-body p-0">
                        <textarea class="form-control font-monospace border-0 bg-light p-3" id="headerOutput" rows="4" readonly placeholder="Decoded header JSON..."></textarea>
                    </div>
                </div>

                <div class="preview-area card mb-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="fas fa-database me-2"></i>Payload <small class="text-white-50 ms-2">(Data & Claims)</small></h5>
                    </div>
                    <div class="card-body p-0">
                        <textarea class="form-control font-monospace border-0 bg-light p-3" id="payloadOutput" rows="8" readonly placeholder="Decoded payload JSON..."></textarea>
                    </div>
                </div>

                <div class="alert alert-info mt-3 small">
                    <i class="fas fa-info-circle me-2"></i><strong>Note:</strong> This tool only decodes the token. It does not verify the signature. Do not paste tokens containing highly sensitive private information.
                </div>
            </div>
        </div>

    </div>
</div>

<?php include '../../includes/sharer.php'; ?>

<!-- Content -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 border shadow-sm">
            <article>
                <header class="mb-5 text-center">
                    <h2 class="display-5"><?php echo $page_title; ?></h2>
                    <p class="lead"><?php echo $page_description; ?></p>
                </header>
                <?php include '../../views/content/jwt-decoder-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const tokenInput = document.getElementById('tokenInput');
    const headerOutput = document.getElementById('headerOutput');
    const payloadOutput = document.getElementById('payloadOutput');
    const clearBtn = document.getElementById('clearBtn');
    const statusArea = document.getElementById('statusArea');
    const tokenFormatBadge = document.getElementById('tokenFormatBadge');

    function decodeJWT() {
        const token = tokenInput.value.trim();
        
        if (!token) {
            headerOutput.value = '';
            payloadOutput.value = '';
            tokenFormatBadge.textContent = 'Format: Unknown';
            tokenFormatBadge.className = 'badge bg-secondary';
            statusArea.textContent = '';
            return;
        }

        const parts = token.split('.');
        
        if (parts.length !== 3) {
            showError('Invalid JWT: A valid JWT must consist of 3 parts separated by dots.');
            tokenFormatBadge.textContent = 'Format: Invalid';
            tokenFormatBadge.className = 'badge bg-danger';
            headerOutput.value = '';
            payloadOutput.value = '';
            return;
        }

        tokenFormatBadge.textContent = 'Format: Valid JWT Format';
        tokenFormatBadge.className = 'badge bg-success';

        try {
            // Replace url-safe base64 characters
            const base64UrlToB64 = (str) => {
                let base64 = str.replace(/-/g, '+').replace(/_/g, '/');
                while (base64.length % 4) {
                    base64 += '=';
                }
                return base64;
            };

            const headerB64 = base64UrlToB64(parts[0]);
            const payloadB64 = base64UrlToB64(parts[1]);

            // Decode and parse
            const headerObj = JSON.parse(decodeURIComponent(escape(atob(headerB64))));
            const payloadObj = JSON.parse(decodeURIComponent(escape(atob(payloadB64))));

            headerOutput.value = JSON.stringify(headerObj, null, 4);
            payloadOutput.value = JSON.stringify(payloadObj, null, 4);
            
            showSuccess('Successfully decoded JWT header and payload!');
            
        } catch (e) {
            showError(`Error decoding token: ${e.message}`);
            headerOutput.value = 'Error decoding header.';
            payloadOutput.value = 'Error decoding payload.';
        }
    }

    function showSuccess(msg) {
        statusArea.textContent = msg;
        statusArea.className = 'text-center text-success small fw-bold';
    }

    function showError(msg) {
        statusArea.textContent = msg;
        statusArea.className = 'text-center text-danger small fw-bold';
    }

    tokenInput.addEventListener('input', decodeJWT);

    clearBtn.addEventListener('click', () => {
        tokenInput.value = '';
        decodeJWT();
    });
});
</script>

<?php include '../../includes/footer.php'; ?>
