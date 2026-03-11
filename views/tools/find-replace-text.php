<?php
// SEO and Page Metadata
$page_title = "$title"; // You may Change the Title here
$page_description = "$desc"; // You may Change the Title here
$page_keywords = "$kw";

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
                    <h1 class="h2">Find and Replace Text <i class="fas fa-search-plus text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Efficiently find text and replace it with new content.</p>
                </header>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-cogs me-2"></i>Text Options</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="inputText" class="form-label">Input Text</label>
                            <textarea class="form-control" id="inputText" rows="8" placeholder="Enter your text here..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="findText" class="form-label">Find What</label>
                            <input type="text" class="form-control" id="findText" placeholder="Text to find">
                        </div>
                        <div class="mb-3">
                            <label for="replaceText" class="form-label">Replace With</label>
                            <input type="text" class="form-control" id="replaceText" placeholder="Replacement text (leave empty to delete)">
                        </div>

                        <div class="row g-2">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="caseSensitive">
                                    <label class="form-check-label" for="caseSensitive">
                                        Case Sensitive
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="wholeWord">
                                    <label class="form-check-label" for="wholeWord">
                                        Whole Word Only
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="useRegex">
                                    <label class="form-check-label" for="useRegex">
                                        Use Regular Expression
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="replaceBtn">
                        <i class="fas fa-sync-alt me-2"></i> Replace All
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                    <button class="btn btn-success btn-md px-2" id="copyBtn" disabled>
                        <i class="fas fa-copy me-2"></i> Copy Output
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="preview-area card mt-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>Output Text</h5>
                        <span class="badge bg-info" id="changesBadge">0 Changes</span>
                    </div>
                    <div class="card-body p-0">
                        <textarea class="form-control m-0 p-3 bg-light" id="outputText" rows="8" readonly style="min-height: 200px; max-height: 400px; overflow: auto;"></textarea>
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
                <?php include '../../views/content/find-replace-text-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Find and Replace Text
const inputText = document.getElementById('inputText');
const findText = document.getElementById('findText');
const replaceText = document.getElementById('replaceText');
const caseSensitive = document.getElementById('caseSensitive');
const wholeWord = document.getElementById('wholeWord');
const useRegex = document.getElementById('useRegex');
const replaceBtn = document.getElementById('replaceBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const copyBtn = document.getElementById('copyBtn');
const outputText = document.getElementById('outputText');
const statusArea = document.getElementById('statusArea');
const changesBadge = document.getElementById('changesBadge');

// Event Listeners
replaceBtn.addEventListener('click', performFindReplace);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
copyBtn.addEventListener('click', copyOutput);

// Initial state
updateCopyButtonState();
inputText.addEventListener('input', updateCopyButtonState);
outputText.addEventListener('input', updateCopyButtonState);


// How To Button
function showHowTo() {
    Swal.fire({
        title: 'How to Use Find and Replace Text',
        html: `Follow these steps to modify your text:<br><br>
        <ol class="text-start">
            <li>Paste or type your text into the "Input Text" area.</li>
            <li>Enter the text you want to find in the "Find What" field.</li>
            <li>Enter the text you want to replace it with in the "Replace With" field (leave empty to delete).</li>
            <li>Select options like "Case Sensitive", "Whole Word Only", or "Use Regular Expression".</li>
            <li>Click "Replace All" to see the modified text in the "Output Text" area.</li>
            <li>Use the "Copy Output" button to copy the result to your clipboard.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    inputText.value = '';
    findText.value = '';
    replaceText.value = '';
    caseSensitive.checked = false;
    wholeWord.checked = false;
    useRegex.checked = false;
    outputText.value = '';
    statusArea.textContent = '';
    changesBadge.textContent = '0 Changes';
    changesBadge.className = 'badge bg-info';
    updateCopyButtonState();

    Swal.fire({
        title: 'Reset Complete',
        text: 'All fields have been cleared.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// Perform Find and Replace
function performFindReplace() {
    const input = inputText.value;
    const find = findText.value;
    const replace = replaceText.value;
    const isCaseSensitive = caseSensitive.checked;
    const isWholeWord = wholeWord.checked;
    const isRegex = useRegex.checked;

    if (!input) {
        showError('Please enter text in the Input Text area.');
        return;
    }

    if (!find) {
        showError('Please enter text in the "Find What" field.');
        return;
    }

    let result = input;
    let changesCount = 0;
    
    try {
        if (isRegex) {
            let flags = 'g'; // Global replacement
            if (!isCaseSensitive) {
                flags += 'i'; // Case-insensitive
            }
            
            let pattern;
            if (isWholeWord) {
                // For regex whole word, need to escape find string and add word boundaries
                pattern = new RegExp('\\b' + find.replace(/[.*+?^${}()|[\]\\]/g, '\\$&') + '\\b', flags);
            } else {
                pattern = new RegExp(find, flags);
            }

            result = input.replace(pattern, (match) => {
                changesCount++;
                return replace;
            });

        } else {
            // Non-regex search
            let searchString = find;
            let replacementString = replace;
            let tempResult = '';
            let lastIndex = 0;
            let matchCount = 0;

            const regexFlags = isCaseSensitive ? 'g' : 'gi';
            let searchPattern;

            if (isWholeWord) {
                // Escape special characters in the find string for literal matching in regex
                const escapedFind = find.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
                searchPattern = new RegExp('\\b' + escapedFind + '\\b', regexFlags);
            } else {
                searchPattern = new RegExp(find.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'), regexFlags);
            }

            result = input.replace(searchPattern, (match) => {
                changesCount++;
                return replacementString;
            });
        }
        
        outputText.value = result;
        changesBadge.textContent = `${changesCount} Changes`;
        changesBadge.className = changesCount > 0 ? 'badge bg-success' : 'badge bg-info';
        showStatus(`Replacement complete. ${changesCount} instance(s) replaced.`, 'success');
        updateCopyButtonState();

        Swal.fire({
            title: 'Replacement Complete!',
            text: `${changesCount} instance(s) replaced.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });

    } catch (e) {
        showError(`Error in regular expression: ${e.message}`);
        Swal.fire({
            title: 'Error',
            text: `Error in regular expression: ${e.message}`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// Copy Output to Clipboard
function copyOutput() {
    if (!outputText.value) {
        showError('No output to copy. Please perform a find and replace operation first.');
        Swal.fire({
            title: 'No Output',
            text: 'No output to copy. Please perform a find and replace operation first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    copyToClipboard(outputText.value);
    showStatus('Output text copied to clipboard!', 'success');
    
    Swal.fire({
        title: 'Copied!',
        text: 'Output text has been copied to your clipboard.',
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
    textarea.style.position = 'fixed'; // Avoid scrolling to bottom
    document.body.appendChild(textarea);
    textarea.select();
    
    try {
        document.execCommand('copy');
    } catch (err) {
        console.error('Failed to copy text: ', err);
    }
    
    document.body.removeChild(textarea);
}

// Update Copy Button State
function updateCopyButtonState() {
    copyBtn.disabled = !outputText.value;
}

// Helper Functions for Status Messages
function showStatus(message, type) {
    statusArea.textContent = message;
    statusArea.className = `text-center text-${type}`;
}

function showError(message) {
    showStatus(message, 'danger');
}
</script>

<?php include '../../includes/footer.php'; ?>