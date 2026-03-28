<?php
// SEO and Page Metadata
$page_title = "URL Encoder & Decoder - Free Online Tool";
$page_description = "Free online URL encode and decode tool. Safely encode URL components or decode them back to readable text. Fast and completely secure client-side processing.";
$page_keywords = "url encoder, url decoder, percent encoding, encode uri, decode uri, web safe url";

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
                    <h1 class="h2">URL Encoder / Decoder <i class="fas fa-link text-primary ms-2"></i></h1>
                    <p class="lead text-muted">Safely encode or decode URL components instantly.</p>
                </header>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-keyboard me-2"></i>Input</h5>
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="mode" id="modeEncode" value="encode" checked>
                            <label class="btn btn-outline-primary btn-sm" for="modeEncode">Encode</label>

                            <input type="radio" class="btn-check" name="mode" id="modeDecode" value="decode">
                            <label class="btn btn-outline-primary btn-sm" for="modeDecode">Decode</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="textInput" class="form-label">Enter string to convert</label>
                            <textarea class="form-control font-monospace" id="textInput" rows="6" placeholder="https://example.com/search?q=hello world"></textarea>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                           <div class="form-check form-switch mb-0">
                             <input class="form-check-input" type="checkbox" id="encodeType" checked>
                             <label class="form-check-label small" for="encodeType">encodeURIComponent (Full)</label>
                           </div>
                           <button class="btn btn-secondary btn-sm" id="clearBtn"><i class="fas fa-eraser me-1"></i> Clear</button>
                        </div>
                    </div>
                </div>

                <div id="statusArea" class="text-center mb-4"></div>

                <div class="preview-area card">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-clipboard-list me-2"></i>Output</h5>
                        <button class="btn btn-primary btn-sm" id="copyBtn" disabled>
                            <i class="fas fa-copy me-1"></i> Copy Result
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <textarea class="form-control font-monospace border-0 bg-light p-3" id="textOutput" rows="6" readonly placeholder="Result will appear here..."></textarea>
                    </div>
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
                <?php include '../../views/content/url-encoder-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const textInput = document.getElementById('textInput');
    const textOutput = document.getElementById('textOutput');
    const modeRadios = document.querySelectorAll('input[name="mode"]');
    const encodeType = document.getElementById('encodeType');
    const clearBtn = document.getElementById('clearBtn');
    const copyBtn = document.getElementById('copyBtn');
    const statusArea = document.getElementById('statusArea');

    function processText() {
        const input = textInput.value;
        const mode = document.querySelector('input[name="mode"]:checked').value;
        const useComponent = encodeType.checked;
        
        if (!input) {
            textOutput.value = '';
            copyBtn.disabled = true;
            statusArea.textContent = '';
            return;
        }

        try {
            if (mode === 'encode') {
                textOutput.value = useComponent ? encodeURIComponent(input) : encodeURI(input);
                statusArea.textContent = 'Successfully encoded to URL safe format!';
                statusArea.className = 'text-center text-success small fw-bold';
            } else {
                textOutput.value = useComponent ? decodeURIComponent(input) : decodeURI(input);
                statusArea.textContent = 'Successfully decoded from URL format!';
                statusArea.className = 'text-center text-success small fw-bold';
            }
            copyBtn.disabled = false;
        } catch (e) {
            textOutput.value = '';
            copyBtn.disabled = true;
            statusArea.textContent = 'Error: Malformed URI sequence';
            statusArea.className = 'text-center text-danger small fw-bold';
        }
    }

    textInput.addEventListener('input', processText);
    encodeType.addEventListener('change', processText);
    
    modeRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            if (textOutput.value && !statusArea.classList.contains('text-danger')) {
                textInput.value = textOutput.value;
            }
            processText();
        });
    });

    clearBtn.addEventListener('click', () => {
        textInput.value = '';
        processText();
    });

    copyBtn.addEventListener('click', () => {
        textOutput.select();
        document.execCommand('copy');
        
        const originalText = copyBtn.innerHTML;
        copyBtn.innerHTML = '<i class="fas fa-check me-1"></i> Copied!';
        setTimeout(() => {
            copyBtn.innerHTML = originalText;
        }, 2000);
    });
});
</script>

<?php include '../../includes/footer.php'; ?>
