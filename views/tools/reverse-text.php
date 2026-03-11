<?php
// SEO and Page Metadata
$page_title = "Reverse Text"; // You may Change the Title here
$page_description = "Reverse Text online."; // Put your Description here
$page_keywords = "reverse text, text reversal, flip text, online text tool, text utility, string reverse";

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
                    <h1 class="h2">Reverse Text <i class="fas fa-text-width text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Flip your text backward instantly.</p>
                </header>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-cogs me-2"></i>Text Reversal Options</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="inputText" class="form-label">Input Text</label>
                            <textarea class="form-control" id="inputText" rows="8" placeholder="Enter text here to reverse..."></textarea>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="reverseType" id="reverseChars" value="chars" checked>
                                    <label class="form-check-label" for="reverseChars">
                                        Reverse Characters (e.g., "hello" becomes "olleh")
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="reverseType" id="reverseWords" value="words">
                                    <label class="form-check-label" for="reverseWords">
                                        Reverse Words (e.g., "hello world" becomes "world hello")
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="reverseBtn">
                        <i class="fas fa-sync-alt me-2"></i> Reverse
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
                        <h5 class="mb-0"><i class="fas fa-eraser me-2"></i>Reversed Text</h5>
                        <span class="badge bg-info" id="outputInfoBadge"></span>
                    </div>
                    <div class="card-body p-0">
                        <div class="m-0 p-3 bg-light" id="outputArea" style="min-height: 150px; max-height: 400px; overflow: auto;">
                            <div class="text-center text-muted">Your reversed text will appear here</div>
                        </div>
                    </div>
                </div>

                <div class="history-area card mt-4" id="historyContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Reversal History (Last 10)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="historyTable">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th>Original Text (Truncated)</th>
                                        <th>Reversed Text (Truncated)</th>
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
                <?php include '../../views/content/reverse-text-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Reverse Text Tool
let reversalHistory = JSON.parse(localStorage.getItem('reversalHistory')) || [];

// Initialize elements
const inputText = document.getElementById('inputText');
const reverseBtn = document.getElementById('reverseBtn');
const copyBtn = document.getElementById('copyBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const outputArea = document.getElementById('outputArea');
const statusArea = document.getElementById('statusArea');
const outputInfoBadge = document.getElementById('outputInfoBadge');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

// Event Listeners
reverseBtn.addEventListener('click', reverseText);
copyBtn.addEventListener('click', copyOutput);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Handle input changes to enable/disable buttons
inputText.addEventListener('input', () => {
    copyBtn.disabled = outputArea.textContent.trim() === 'Your reversed text will appear here' || outputArea.textContent.trim() === '';
});

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to Reverse Text Tool',
        html: `Follow these steps to reverse your text:<br><br>
        <ol class="text-start">
            <li>Type or paste your text into the "Input Text" box.</li>
            <li>Select your desired reversal type: "Reverse Characters" or "Reverse Words".</li>
            <li>Click the "Reverse" button.</li>
            <li>Your reversed text will appear in the "Reversed Text" box below.</li>
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
    outputArea.innerHTML = '<div class="text-center text-muted">Your reversed text will appear here</div>';
    document.getElementById('reverseChars').checked = true; // Default to character reversal
    statusArea.textContent = '';
    copyBtn.disabled = true;
    outputInfoBadge.textContent = '';
    showStatus('Input and output cleared.', 'info');
}

// Reverse Text Functionality
function reverseText() {
    const text = inputText.value.trim();
    const reverseType = document.querySelector('input[name="reverseType"]:checked').value;
    let reversedText = '';

    if (!text) {
        showError('Please enter some text to reverse.');
        Swal.fire({
            title: 'Error',
            text: 'Please enter some text to reverse.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (reverseType === 'chars') {
        reversedText = text.split('').reverse().join('');
        outputInfoBadge.textContent = 'Characters Reversed';
    } else { // reverseType === 'words'
        reversedText = text.split(/\s+/).reverse().join(' ');
        outputInfoBadge.textContent = 'Words Reversed';
    }

    outputArea.textContent = reversedText;
    copyBtn.disabled = false;
    showStatus('Text reversed successfully!', 'success');
    
    addToHistory(text, reversedText);

    Swal.fire({
        title: 'Text Reversed!',
        text: 'Your text has been successfully reversed.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// Copy Output to Clipboard
function copyOutput() {
    const textToCopy = outputArea.textContent.trim();

    if (!textToCopy || textToCopy === 'Your reversed text will appear here') {
        showError('No reversed text to copy. Please reverse text first.');
        Swal.fire({
            title: 'No Text',
            text: 'No reversed text to copy. Please reverse text first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    copyToClipboard(textToCopy);
    showStatus('Reversed text copied to clipboard!', 'success');
    
    Swal.fire({
        title: 'Copied!',
        text: 'Reversed text has been copied to your clipboard.',
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

// History Functions
function addToHistory(originalText, reversedText) {
    const historyItem = {
        id: Date.now(),
        original: originalText,
        reversed: reversedText,
        date: new Date().toLocaleString()
    };

    reversalHistory.unshift(historyItem);
    if (reversalHistory.length > 10) {
        reversalHistory.pop();
    }

    localStorage.setItem('reversalHistory', JSON.stringify(reversalHistory));
    displayHistory();
}

function displayHistory() {
    if (reversalHistory.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    historyList.innerHTML = '';
    reversalHistory.forEach(item => {
        const tr = document.createElement('tr');
        const originalDisplay = item.original.length > 50 ? item.original.substring(0, 47) + '...' : item.original;
        const reversedDisplay = item.reversed.length > 50 ? item.reversed.substring(0, 47) + '...' : item.reversed;
        
        tr.innerHTML = `
            <td>
                <button class="btn btn-sm btn-outline-danger delete-history" data-id="${item.id}" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
            <td class="font-monospace">${escapeHtml(originalDisplay)}</td>
            <td class="font-monospace">${escapeHtml(reversedDisplay)}</td>
            <td>${item.date}</td>
            <td class="text-end">
                <button class="btn btn-sm btn-outline-secondary copy-history" data-text="${escapeHtml(item.reversed)}" title="Copy">
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
            const textToCopy = e.currentTarget.getAttribute('data-text');
            copyToClipboard(textToCopy);
            showStatus('History item copied to clipboard!', 'success');
            
            Swal.fire({
                title: 'Copied!',
                text: 'Reversed text from history has been copied to your clipboard.',
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 1000,
                timerProgressBar: true
            });
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
            reversalHistory = reversalHistory.filter(item => item.id !== id);
            localStorage.setItem('reversalHistory', JSON.stringify(reversalHistory));
            displayHistory();
        }
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

// Function to escape HTML for displaying user-entered text safely
function escapeHtml(text) {
    var map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };
    return text.replace(/[&<>"']/g, function(m) { return map[m]; });
}
</script>

<?php include '../../includes/footer.php'; ?>