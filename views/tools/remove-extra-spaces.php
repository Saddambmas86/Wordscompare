<?php
// SEO and Page Metadata
$page_title = "Remove Extra Spaces from Text Online Free - WordsCompare"; // You may Change the Title here
$page_description = "Free online tool to remove extra spaces from text. Trim leading, trailing, and multiple spaces between words instantly. Clean and format text effortlessly."; // Put your Description here
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
                    <h1 class="h2">Remove Extra Spaces <i class="fas fa-text-width text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Clean up your text by removing unnecessary spaces, tabs, and line breaks.</p>
                </header>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-sliders-h me-2"></i>Cleaning Options</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="removeLeadingTrailing" checked>
                                    <label class="form-check-label" for="removeLeadingTrailing">
                                        Remove leading/trailing spaces
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="removeMultipleSpaces" checked>
                                    <label class="form-check-label" for="removeMultipleSpaces">
                                        Replace multiple spaces with single space
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="removeTabs">
                                    <label class="form-check-label" for="removeTabs">
                                        Replace tabs with single spaces
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="removeExtraLineBreaks">
                                    <label class="form-check-label" for="removeExtraLineBreaks">
                                        Replace multiple line breaks with single line break
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="removeAllLineBreaks">
                                    <label class="form-check-label" for="removeAllLineBreaks">
                                        Remove all line breaks (make text single line)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputText" class="form-label">Input Text</label>
                    <textarea class="form-control" id="inputText" rows="8" placeholder="Enter your text here..."></textarea>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="cleanBtn">
                        <i class="fas fa-eraser me-2"></i> Clean Text
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
                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>Cleaned Text Output</h5>
                        <span class="badge bg-info" id="outputLengthBadge">Length: 0</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="m-0 p-3 bg-light" id="outputText" style="min-height: 150px; max-height: 400px; overflow: auto; white-space: pre-wrap; word-wrap: break-word;">
                            <div class="text-center text-muted">Your cleaned text will appear here</div>
                        </div>
                    </div>
                </div>

                <div class="history-area card mt-4" id="historyContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Cleaning History (Last 10)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="historyTable">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th>Original Text (Excerpt)</th>
                                        <th>Cleaned Text (Excerpt)</th>
                                        <th>Date</th>
                                        <th width="15%" class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="historyList"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Sticky sidebar -->
    <div class="col-lg-2 border shadow-sm sticky-top vh-100 p-3">
        
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
                <?php include '../../views/content/remove-extra-spaces-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Remove Extra Spaces Tool
let cleaningHistory = JSON.parse(localStorage.getItem('cleaningHistory')) || [];
let cleanedTextOutput = '';

// Initialize elements
const inputText = document.getElementById('inputText');
const cleanBtn = document.getElementById('cleanBtn');
const copyBtn = document.getElementById('copyBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const outputText = document.getElementById('outputText');
const statusArea = document.getElementById('statusArea');
const outputLengthBadge = document.getElementById('outputLengthBadge');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

const removeLeadingTrailing = document.getElementById('removeLeadingTrailing');
const removeMultipleSpaces = document.getElementById('removeMultipleSpaces');
const removeTabs = document.getElementById('removeTabs');
const removeExtraLineBreaks = document.getElementById('removeExtraLineBreaks');
const removeAllLineBreaks = document.getElementById('removeAllLineBreaks');


// Event Listeners
cleanBtn.addEventListener('click', cleanText);
copyBtn.addEventListener('click', copyOutput);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
inputText.addEventListener('input', updateOutputLength);

// Add event listener for "Remove all line breaks" checkbox to disable "Replace multiple line breaks"
removeAllLineBreaks.addEventListener('change', () => {
    if (removeAllLineBreaks.checked) {
        removeExtraLineBreaks.checked = false;
        removeExtraLineBreaks.disabled = true;
    } else {
        removeExtraLineBreaks.disabled = false;
    }
});


// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to Remove Extra Spaces Tool',
        html: `Follow these steps to clean your text:<br><br>
        <ol class="text-start">
            <li>Paste your text into the "Input Text" area.</li>
            <li>Select the desired cleaning options (e.g., remove leading/trailing spaces, replace multiple spaces).</li>
            <li>Click "Clean Text" to process.</li>
            <li>The cleaned text will appear in the "Cleaned Text Output" area.</li>
            <li>Click "Copy Output" to copy the result to your clipboard.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    inputText.value = '';
    outputText.innerHTML = '<div class="text-center text-muted">Your cleaned text will appear here</div>';
    statusArea.textContent = '';
    copyBtn.disabled = true;
    outputLengthBadge.textContent = 'Length: 0';

    // Reset checkboxes
    removeLeadingTrailing.checked = true;
    removeMultipleSpaces.checked = true;
    removeTabs.checked = false;
    removeExtraLineBreaks.checked = false;
    removeAllLineBreaks.checked = false;
    removeExtraLineBreaks.disabled = false; // Ensure it's re-enabled on reset
}

// Clean Text Function
function cleanText() {
    let text = inputText.value;
    const originalTextExcerpt = text.substring(0, 50) + (text.length > 50 ? '...' : '');

    if (!text.trim()) {
        showError('Please enter some text to clean.');
        Swal.fire({
            title: 'No Text',
            text: 'Please enter some text to clean.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (removeLeadingTrailing.checked) {
        text = text.trim();
    }
    if (removeMultipleSpaces.checked) {
        text = text.replace(/ {2,}/g, ' '); // Replace 2 or more spaces with a single space
    }
    if (removeTabs.checked) {
        text = text.replace(/\t+/g, ' '); // Replace 1 or more tabs with a single space
    }
    if (removeAllLineBreaks.checked) {
        text = text.replace(/(\r\n|\n|\r)/gm, ' '); // Replace all line breaks with a single space
        text = text.replace(/ {2,}/g, ' '); // Clean up any multiple spaces resulting from line break removal
    } else if (removeExtraLineBreaks.checked) {
        text = text.replace(/(\r\n|\n|\r){2,}/gm, '\n\n'); // Replace 2 or more line breaks with two line breaks (paragraph break)
        text = text.replace(/^(\r\n|\n|\r)+|(\r\n|\n|\r)+$/g, ''); // Trim leading/trailing line breaks
    }

    cleanedTextOutput = text;
    outputText.textContent = cleanedTextOutput;
    copyBtn.disabled = false;
    updateOutputLength();
    showStatus('Text cleaned successfully!', 'success');

    const cleanedTextExcerpt = cleanedTextOutput.substring(0, 50) + (cleanedTextOutput.length > 50 ? '...' : '');
    addToHistory(originalTextExcerpt, cleanedTextExcerpt, cleanedTextOutput);
    
    Swal.fire({
        title: 'Text Cleaned!',
        text: 'Your text has been processed and cleaned.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// Copy Output to Clipboard
function copyOutput() {
    if (!cleanedTextOutput) {
        showError('No cleaned text to copy. Please clean text first.');
        Swal.fire({
            title: 'No Output',
            text: 'No cleaned text to copy. Please clean text first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    copyToClipboard(cleanedTextOutput);
    showStatus('Cleaned text copied to clipboard!', 'success');
    
    Swal.fire({
        title: 'Copied!',
        text: 'Cleaned text has been copied to your clipboard.',
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
    textarea.style.position = 'fixed';
    document.body.appendChild(textarea);
    textarea.select();
    
    try {
        document.execCommand('copy');
    } catch (err) {
        console.error('Failed to copy text: ', err);
    }
    
    document.body.removeChild(textarea);
}

// Update output text length
function updateOutputLength() {
    outputLengthBadge.textContent = `Length: ${inputText.value.length}`;
}

// History Functions
function addToHistory(originalExcerpt, cleanedExcerpt, fullCleanedText) {
    const historyItem = {
        id: Date.now(),
        original: originalExcerpt,
        cleaned: cleanedExcerpt,
        fullCleanedText: fullCleanedText,
        date: new Date().toLocaleString()
    };

    cleaningHistory.unshift(historyItem);
    if (cleaningHistory.length > 10) {
        cleaningHistory.pop();
    }

    localStorage.setItem('cleaningHistory', JSON.stringify(cleaningHistory));
    displayHistory();
}

function displayHistory() {
    if (cleaningHistory.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    historyList.innerHTML = '';
    cleaningHistory.forEach(item => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>
                <button class="btn btn-sm btn-outline-danger delete-history" data-id="${item.id}" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
            <td class="font-monospace text-truncate" style="max-width: 150px;">${item.original}</td>
            <td class="font-monospace text-truncate" style="max-width: 150px;">${item.cleaned}</td>
            <td>${item.date}</td>
            <td class="text-end">
                <button class="btn btn-sm btn-outline-secondary copy-history" data-id="${item.id}" title="Copy Cleaned Text">
                    <i class="fas fa-copy"></i>
                </button>
            </td>
        `;
        historyList.appendChild(tr);
    });

    // Add event listeners for history actions
    document.querySelectorAll('.delete-history').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            deleteHistoryItem(id);
        });
    });

    document.querySelectorAll('.copy-history').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            copyHistoryItem(id);
        });
    });

    historyContainer.style.display = 'block';
}

function deleteHistoryItem(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to recover this history item!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            cleaningHistory = cleaningHistory.filter(item => item.id !== id);
            localStorage.setItem('cleaningHistory', JSON.stringify(cleaningHistory));
            displayHistory();
        }
    });
}

function copyHistoryItem(id) {
    const item = cleaningHistory.find(item => item.id === id);
    if (!item) return;

    copyToClipboard(item.fullCleanedText);
    showStatus('Cleaned text copied to clipboard!', 'success');
    
    Swal.fire({
        title: 'Copied!',
        text: 'Cleaned text has been copied to your clipboard.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// Helper Functions
function showStatus(message, type) {
    statusArea.textContent = message;
    statusArea.className = `text-center text-${type}`;
}

function showError(message) {
    showStatus(message, 'danger');
}
</script>

<?php include '../../includes/footer.php'; ?>