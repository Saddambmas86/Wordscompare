<?php
// SEO and Page Metadata
$page_title = "Hash Generator - MD5, SHA-1, SHA-256, SHA-512 Online";
$page_description = "Free online Hash Generator. Instantly generate secure cryptographic hashes including MD5, SHA-1, SHA-256, and SHA-512 from your text. Client-side processing.";
$page_keywords = "hash generator, md5 generator, sha1 generator, sha256 checksum, sha512 generator, cryptographic hash function";

// Include common header
include '../../includes/header.php';
?>

<!-- Include CryptoJS from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>

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
                    <h1 class="h2">Cryptographic Hash Generator <i class="fas fa-fingerprint text-info ms-2"></i></h1>
                    <p class="lead text-muted">Generate secure hashes instantly using various algorithms.</p>
                </header>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-keyboard me-2"></i>Input Text</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <textarea class="form-control font-monospace" id="textInput" rows="5" placeholder="Type or paste the string you want to hash..."></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                           <button class="btn btn-secondary btn-sm" id="clearBtn"><i class="fas fa-eraser me-1"></i> Clear</button>
                        </div>
                    </div>
                </div>

                <div class="preview-area card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-hashtag me-2"></i>Generated Hashes</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            
                            <!-- MD5 -->
                            <div class="col-12">
                                <label class="form-label fw-bold">MD5</label>
                                <div class="input-group">
                                    <input type="text" class="form-control font-monospace text-muted bg-light border-end-0" id="md5Output" readonly placeholder="MD5 hash">
                                    <button class="btn btn-outline-secondary border-start-0 copy-hash-btn" type="button" data-target="md5Output"><i class="fas fa-copy"></i></button>
                                </div>
                            </div>

                            <!-- SHA-1 -->
                            <div class="col-12">
                                <label class="form-label fw-bold">SHA-1</label>
                                <div class="input-group">
                                    <input type="text" class="form-control font-monospace text-muted bg-light border-end-0" id="sha1Output" readonly placeholder="SHA-1 hash">
                                    <button class="btn btn-outline-secondary border-start-0 copy-hash-btn" type="button" data-target="sha1Output"><i class="fas fa-copy"></i></button>
                                </div>
                            </div>

                            <!-- SHA-256 -->
                            <div class="col-12">
                                <label class="form-label fw-bold">SHA-256</label>
                                <div class="input-group">
                                    <input type="text" class="form-control font-monospace text-muted bg-light border-end-0" id="sha256Output" readonly placeholder="SHA-256 hash">
                                    <button class="btn btn-outline-secondary border-start-0 copy-hash-btn" type="button" data-target="sha256Output"><i class="fas fa-copy"></i></button>
                                </div>
                            </div>

                            <!-- SHA-512 -->
                            <div class="col-12">
                                <label class="form-label fw-bold">SHA-512</label>
                                <div class="input-group">
                                    <input type="text" class="form-control font-monospace text-muted bg-light border-end-0" id="sha512Output" readonly placeholder="SHA-512 hash">
                                    <button class="btn btn-outline-secondary border-start-0 copy-hash-btn" type="button" data-target="sha512Output"><i class="fas fa-copy"></i></button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div id="statusArea" class="text-center mt-3"></div>
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
                <?php include '../../views/content/hash-generator-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const textInput = document.getElementById('textInput');
    const md5Output = document.getElementById('md5Output');
    const sha1Output = document.getElementById('sha1Output');
    const sha256Output = document.getElementById('sha256Output');
    const sha512Output = document.getElementById('sha512Output');
    const clearBtn = document.getElementById('clearBtn');
    const statusArea = document.getElementById('statusArea');
    const copyBtns = document.querySelectorAll('.copy-hash-btn');

    function generateHashes() {
        const input = textInput.value;
        if (!input) {
            md5Output.value = '';
            sha1Output.value = '';
            sha256Output.value = '';
            sha512Output.value = '';
            return;
        }

        md5Output.value = CryptoJS.MD5(input).toString();
        sha1Output.value = CryptoJS.SHA1(input).toString();
        sha256Output.value = CryptoJS.SHA256(input).toString();
        sha512Output.value = CryptoJS.SHA512(input).toString();
    }

    textInput.addEventListener('input', generateHashes);

    clearBtn.addEventListener('click', () => {
        textInput.value = '';
        generateHashes();
    });

    copyBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const targetId = btn.getAttribute('data-target');
            const targetInput = document.getElementById(targetId);
            
            if (!targetInput.value) return;

            targetInput.select();
            document.execCommand('copy');
            
            const originalHtml = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-check text-success"></i>';
            btn.classList.add('border-success');
            
            statusArea.textContent = 'Hash copied to clipboard!';
            statusArea.className = 'text-center text-success small fw-bold';
            
            setTimeout(() => {
                btn.innerHTML = originalHtml;
                btn.classList.remove('border-success');
                statusArea.textContent = '';
            }, 2000);
        });
    });
});
</script>

<?php include '../../includes/footer.php'; ?>
