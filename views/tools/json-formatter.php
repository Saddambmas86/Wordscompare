<?php
// SEO and Page Metadata
$page_title = "JSON Formatter & Validator - Beautify JSON Online Free"; // You may Change the Title here
$page_description = "Free JSON formatter and validator online. Format, beautify, minify, and validate JSON data. Syntax highlighting and error detection for developers."; // Put your Description here
$page_keywords = "json formatter, text utilities, word counter, case converter, text tool, online text editor, formatting, wordscompare";

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
                    <h1 class="h2">JSON Formatter <i class="fas fa-code text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Format, validate, and beautify your JSON data instantly.</p>
                </header>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-file-code me-2"></i>JSON Input</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="jsonInput" class="form-label">Paste your JSON here</label>
                            <textarea class="form-control font-monospace" id="jsonInput" rows="10" placeholder='Enter your JSON data here. E.g., {"name": "John Doe", "age": 30, "isStudent": false}'></textarea>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="indentation" class="form-label">Indentation Level</label>
                                <select id="indentation" class="form-select">
                                    <option value="2">2 Spaces</option>
                                    <option value="4" selected>4 Spaces</option>
                                    <option value="\t">Tabs</option>
                                </select>
                            </div>
                            <div class="col-md-6 d-flex align-items-end">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="minifyJson">
                                    <label class="form-check-label" for="minifyJson">
                                        Minify JSON (No Whitespace)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="formatBtn">
                        <i class="fas fa-magic me-2"></i> Format JSON
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="clearBtn">
                        <i class="fas fa-eraser me-2"></i> Clear
                    </button>
                    <button class="btn btn-success btn-md px-2" id="copyBtn" disabled>
                        <i class="fas fa-copy me-2"></i> Copy Output
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="preview-area card mt-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-clipboard-list me-2"></i>Formatted JSON Output</h5>
                        <span class="badge bg-info" id="validationBadge">Status: Waiting for input</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="m-0 p-3 bg-light" id="jsonOutputContainer" style="min-height: 200px; max-height: 400px; overflow: auto;">
                            <pre class="font-monospace mb-0" id="jsonOutput"><div class="text-center text-muted">Your formatted JSON will appear here</div></pre>
                        </div>
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
                <?php include '../../views/content/json-formatter-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
// JavaScript for JSON Formatter
const jsonInput = document.getElementById('jsonInput');
const jsonOutput = document.getElementById('jsonOutput');
const formatBtn = document.getElementById('formatBtn');
const clearBtn = document.getElementById('clearBtn');
const copyBtn = document.getElementById('copyBtn');
const howToBtn = document.getElementById('howToBtn');
const statusArea = document.getElementById('statusArea');
const validationBadge = document.getElementById('validationBadge');
const indentationSelect = document.getElementById('indentation');
const minifyJsonCheckbox = document.getElementById('minifyJson');

// Event Listeners
formatBtn.addEventListener('click', formatAndValidateJson);
clearBtn.addEventListener('click', clearAll);
copyBtn.addEventListener('click', copyOutput);
howToBtn.addEventListener('click', showHowTo);

// Initial state
updateCopyButtonState();

function formatAndValidateJson() {
    const inputValue = jsonInput.value.trim();

    if (!inputValue) {
        showError('Please enter JSON data to format.', 'warning');
        updateValidationBadge('Status: Waiting for input', 'bg-info');
        jsonOutput.innerHTML = '<div class="text-center text-muted">Your formatted JSON will appear here</div>';
        updateCopyButtonState();
        Swal.fire({
            title: 'No Input',
            text: 'Please enter JSON data to format.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    try {
        const obj = JSON.parse(inputValue);
        let formattedJson;
        
        if (minifyJsonCheckbox.checked) {
            formattedJson = JSON.stringify(obj);
        } else {
            const indentation = indentationSelect.value === '\\t' ? '\t' : parseInt(indentationSelect.value);
            formattedJson = JSON.stringify(obj, null, indentation);
        }
        
        jsonOutput.textContent = formattedJson;
        showStatus('JSON formatted successfully!', 'success');
        updateValidationBadge('Status: Valid JSON', 'bg-success');
        updateCopyButtonState();

        Swal.fire({
            title: 'Formatted!',
            text: 'Your JSON has been formatted.',
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });

    } catch (e) {
        jsonOutput.textContent = `Error: Invalid JSON syntax.\n\n${e.message}`;
        showError(`Error: Invalid JSON syntax. ${e.message}`, 'danger');
        updateValidationBadge('Status: Invalid JSON', 'bg-danger');
        updateCopyButtonState();
        Swal.fire({
            title: 'Error',
            text: `Invalid JSON syntax: ${e.message}`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

function clearAll() {
    jsonInput.value = '';
    jsonOutput.innerHTML = '<div class="text-center text-muted">Your formatted JSON will appear here</div>';
    statusArea.textContent = '';
    updateValidationBadge('Status: Waiting for input', 'bg-info');
    indentationSelect.value = '4'; // Reset indentation to default
    minifyJsonCheckbox.checked = false; // Uncheck minify
    updateCopyButtonState();
}

function copyOutput() {
    if (jsonOutput.textContent.trim() === '' || jsonOutput.textContent.includes('Your formatted JSON will appear here')) {
        showError('No output to copy.', 'warning');
        Swal.fire({
            title: 'No Output',
            text: 'No formatted JSON to copy.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }
    
    const textToCopy = jsonOutput.textContent;
    copyToClipboard(textToCopy);
    showStatus('Formatted JSON copied to clipboard!', 'success');

    Swal.fire({
        title: 'Copied!',
        text: 'Formatted JSON has been copied to your clipboard.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// Helper function to copy text to clipboard
function copyToClipboard(text) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    textarea.style.position = 'fixed'; // Prevents scrolling to bottom
    textarea.style.opacity = 0; // Make it invisible
    document.body.appendChild(textarea);
    textarea.select();
    
    try {
        document.execCommand('copy');
    } catch (err) {
        console.error('Failed to copy text: ', err);
    }
    
    document.body.removeChild(textarea);
}

function showHowTo() {
    Swal.fire({
        title: 'How to Use JSON Formatter',
        html: `Follow these simple steps:<br><br>
        <ol class="text-start">
            <li>Paste your raw JSON into the "JSON Input" area.</li>
            <li>Select your desired indentation (2/4 spaces, or tabs) or choose to "Minify JSON".</li>
            <li>Click the "<i class='fas fa-magic me-1'></i> Format JSON" button.</li>
            <li>Your formatted or minified JSON will appear in the "Formatted JSON Output" area.</li>
            <li>Click "<i class='fas fa-copy me-1'></i> Copy Output" to copy it to your clipboard.</li>
        </ol>
        <p class="text-start mt-3">If you encounter an error, the tool will indicate where the JSON syntax might be incorrect.</p>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

function showStatus(message, type) {
    statusArea.textContent = message;
    statusArea.className = `text-center text-${type}`;
}

function showError(message, type) {
    statusArea.textContent = message;
    statusArea.className = `text-center text-${type}`;
}

function updateValidationBadge(text, className) {
    validationBadge.textContent = text;
    validationBadge.className = `badge ${className}`;
}

function updateCopyButtonState() {
    const outputIsEmpty = jsonOutput.textContent.trim() === '' || jsonOutput.textContent.includes('Your formatted JSON will appear here');
    copyBtn.disabled = outputIsEmpty;
}
</script>

<?php include '../../includes/footer.php'; ?>