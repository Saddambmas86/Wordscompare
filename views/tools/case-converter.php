<?php
// SEO and Page Metadata
$page_title = "Text Case Converter"; // You may Change the Title here
$page_description = "Text Case Converter online."; // Put your Description here
$page_keywords = "case converter, text case, uppercase, lowercase, title case, sentence case, toggle case, inverse case, online tool, text converter";

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
                    <h1 class="h2">Text Case Converter <i class="fas fa-text-width text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Effortlessly convert your text to various letter cases.</p>
                </header>

                <div class="input-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-keyboard me-2"></i>Enter Your Text</h5>
                    </div>
                    <div class="card-body">
                        <textarea class="form-control" id="inputText" rows="8" placeholder="Type or paste your text here..."></textarea>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <small class="text-muted" id="charCount">Characters: 0</small>
                            <small class="text-muted" id="wordCount">Words: 0</small>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="uppercaseBtn">
                        <i class="fas fa-arrow-alt-circle-up me-2"></i> UPPERCASE
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="lowercaseBtn">
                        <i class="fas fa-arrow-alt-circle-down me-2"></i> lowercase
                    </button>
                    <button class="btn btn-success btn-md px-4" id="titlecaseBtn">
                        <i class="fas fa-font me-2"></i> Title Case
                    </button>
                    <button class="btn btn-info btn-md px-4" id="sentencecaseBtn">
                        <i class="fas fa-paragraph me-2"></i> Sentence case
                    </button>
                    <button class="btn btn-warning btn-md px-4 text-white" id="togglecaseBtn">
                        <i class="fas fa-retweet me-2"></i> tOGGLE cASE
                    </button>
                    <button class="btn btn-dark btn-md px-4" id="inversecaseBtn">
                        <i class="fas fa-exchange-alt me-2"></i> iNVERSE cASE
                    </button>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-outline-secondary btn-md px-4" id="copyBtn" disabled>
                        <i class="fas fa-copy me-2"></i> Copy Output
                    </button>
                    <button class="btn btn-outline-dark btn-md px-4" id="clearBtn">
                        <i class="fas fa-eraser me-2"></i> Clear Text
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="output-area card mt-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-clipboard-check me-2"></i>Converted Text</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="m-0 p-3 bg-light" id="outputTextBox" style="min-height: 150px; max-height: 400px; overflow: auto; white-space: pre-wrap; word-wrap: break-word;">
                            <div class="text-center text-muted">Your converted text will appear here</div>
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
                <?php include '../../views/content/case-converter-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Text Case Converter
const inputText = document.getElementById('inputText');
const outputTextBox = document.getElementById('outputTextBox');
const charCount = document.getElementById('charCount');
const wordCount = document.getElementById('wordCount');
const copyBtn = document.getElementById('copyBtn');
const clearBtn = document.getElementById('clearBtn');
const statusArea = document.getElementById('statusArea');

// Event Listeners for buttons
document.getElementById('uppercaseBtn').addEventListener('click', () => convertCase('uppercase'));
document.getElementById('lowercaseBtn').addEventListener('click', () => convertCase('lowercase'));
document.getElementById('titlecaseBtn').addEventListener('click', () => convertCase('titlecase'));
document.getElementById('sentencecaseBtn').addEventListener('click', () => convertCase('sentencecase'));
document.getElementById('togglecaseBtn').addEventListener('click', () => convertCase('togglecase'));
document.getElementById('inversecaseBtn').addEventListener('click', () => convertCase('inversecase'));

copyBtn.addEventListener('click', copyOutput);
clearBtn.addEventListener('click', clearText);
inputText.addEventListener('input', updateCountsAndResetOutput);

// Initial count update
updateCountsAndResetOutput();

function convertCase(type) {
    let text = inputText.value;
    let convertedText = '';

    if (text.trim() === '') {
        showError('Please enter some text to convert.');
        Swal.fire({
            title: 'No Text Entered',
            text: 'Please enter some text to convert.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    switch (type) {
        case 'uppercase':
            convertedText = text.toUpperCase();
            break;
        case 'lowercase':
            convertedText = text.toLowerCase();
            break;
        case 'titlecase':
            convertedText = text.replace(/\w\S*/g, function(txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            });
            break;
        case 'sentencecase':
            // Simple sentence case: capitalize first letter of each sentence
            convertedText = text.toLowerCase().replace(/(^\s*\w|[.?!]\s*\w)/g, function(c) {
                return c.toUpperCase();
            });
            break;
        case 'togglecase':
            convertedText = text.split('').map(char => {
                if (char === char.toUpperCase()) {
                    return char.toLowerCase();
                }
                return char.toUpperCase();
            }).join('');
            break;
        case 'inversecase': // For simplicity, this will be same as togglecase for now
            convertedText = text.split('').map(char => {
                if (char === char.toUpperCase()) {
                    return char.toLowerCase();
                }
                return char.toUpperCase();
            }).join('');
            break;
        default:
            convertedText = text;
    }

    outputTextBox.textContent = convertedText;
    copyBtn.disabled = false;
    showStatus(`Text converted to ${type.replace('case', ' Case')}.`, 'success');
    
    Swal.fire({
        title: 'Conversion Complete!',
        text: `Your text has been converted to ${type.replace('case', ' Case')}.`,
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

function copyOutput() {
    let textToCopy = outputTextBox.textContent;
    if (textToCopy.trim() === '' || textToCopy.trim() === 'Your converted text will appear here') {
        showError('No converted text to copy.');
        Swal.fire({
            title: 'No Text',
            text: 'No converted text to copy.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    const textarea = document.createElement('textarea');
    textarea.value = textToCopy;
    textarea.style.position = 'fixed'; // Avoid scrolling to bottom
    document.body.appendChild(textarea);
    textarea.select();
    
    try {
        document.execCommand('copy');
        showStatus('Converted text copied to clipboard!', 'success');
        Swal.fire({
            title: 'Copied!',
            text: 'Converted text has been copied to your clipboard.',
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    } catch (err) {
        console.error('Failed to copy text: ', err);
        showError('Failed to copy text. Please copy manually.');
        Swal.fire({
            title: 'Copy Failed',
            text: 'Could not copy text automatically. Please select and copy manually.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    } finally {
        document.body.removeChild(textarea);
    }
}

function clearText() {
    inputText.value = '';
    outputTextBox.innerHTML = '<div class="text-center text-muted">Your converted text will appear here</div>';
    copyBtn.disabled = true;
    statusArea.textContent = '';
    updateCountsAndResetOutput();
    Swal.fire({
        title: 'Cleared!',
        text: 'All text fields have been reset.',
        icon: 'info',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

function updateCountsAndResetOutput() {
    const text = inputText.value;
    charCount.textContent = `Characters: ${text.length}`;
    wordCount.textContent = `Words: ${text.trim().split(/\s+/).filter(word => word.length > 0).length}`;
    
    // Reset output when input changes
    if (outputTextBox.textContent.trim() !== '' && outputTextBox.textContent.trim() !== 'Your converted text will appear here') {
        outputTextBox.innerHTML = '<div class="text-center text-muted">Your converted text will appear here</div>';
        copyBtn.disabled = true;
        statusArea.textContent = '';
    }
}

function showStatus(message, type) {
    statusArea.textContent = message;
    statusArea.className = `text-center text-${type}`;
}

function showError(message) {
    showStatus(message, 'danger');
}
</script>

<?php include '../../includes/footer.php'; ?>