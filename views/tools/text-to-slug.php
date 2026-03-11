<?php
// SEO and Page Metadata
$page_title = "Text to Slug Converter"; // You may Change the Title here
$page_description = "Text to Slug Converter online."; // Put your Description here
$page_keywords = "text to slug, slug converter, URL slug, SEO slug, friendly URL, slug generator, online tool";

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
                    <h1 class="h2">Text to Slug Converter <i class="fas fa-link text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Easily convert your text into clean, SEO-friendly slugs.</p>
                </header>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-cogs me-2"></i>Slug Settings</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="inputText" class="form-label">Enter your text here</label>
                            <textarea class="form-control" id="inputText" rows="5" placeholder="Type or paste text to convert..."></textarea>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="convertToLowercase" checked>
                                    <label class="form-check-label" for="convertToLowercase">
                                        Convert to Lowercase
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="replaceSpacesWithHyphens" checked>
                                    <label class="form-check-label" for="replaceSpacesWithHyphens">
                                        Replace Spaces with Hyphens (-)
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="removeSpecialCharacters" checked>
                                    <label class="form-check-label" for="removeSpecialCharacters">
                                        Remove Special Characters (Keep only A-Z, a-z, 0-9, hyphens)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="convertBtn">
                        <i class="fas fa-exchange-alt me-2"></i> Convert
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                    <button class="btn btn-success btn-md px-2" id="copyBtn" disabled>
                        <i class="fas fa-copy me-2"></i> Copy Slug
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="preview-area card mt-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>Generated Slug</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="m-0 p-3 bg-light" id="outputSlug" style="min-height: 100px; max-height: 200px; overflow: auto; word-wrap: break-word;">
                            <div class="text-center text-muted">Your generated slug will appear here</div>
                        </div>
                    </div>
                </div>

                <div class="history-area card mt-4" id="historyContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Conversion History (Last 10)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="historyTable">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th>Original Text</th>
                                        <th>Generated Slug</th>
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
                <?php include '../../views/content/text-to-slug-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
let slugHistory = JSON.parse(localStorage.getItem('slugHistory')) || [];

// Initialize elements
const inputText = document.getElementById('inputText');
const convertBtn = document.getElementById('convertBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const copyBtn = document.getElementById('copyBtn');
const outputSlug = document.getElementById('outputSlug');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

// Conversion settings checkboxes
const convertToLowercase = document.getElementById('convertToLowercase');
const replaceSpacesWithHyphens = document.getElementById('replaceSpacesWithHyphens');
const removeSpecialCharacters = document.getElementById('removeSpecialCharacters');

// Event Listeners
convertBtn.addEventListener('click', generateSlug);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
copyBtn.addEventListener('click', copySlug);
inputText.addEventListener('input', generateSlug); // Live conversion as user types

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to Text to Slug Converter',
        html: `Follow these steps to create SEO-friendly slugs:<br><br>
        <ol class="text-start">
            <li>Type or paste the text you wish to convert into the input box.</li>
            <li>Adjust the conversion options (lowercase, hyphenate spaces, remove special characters).</li>
            <li>The slug will be generated automatically as you type, or click "Convert" if you prefer.</li>
            <li>Copy the generated slug to your clipboard and use it wherever needed.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    inputText.value = '';
    outputSlug.innerHTML = '<div class="text-center text-muted">Your generated slug will appear here</div>';
    statusArea.textContent = '';
    copyBtn.disabled = true;
    convertToLowercase.checked = true;
    replaceSpacesWithHyphens.checked = true;
    removeSpecialCharacters.checked = true;
}

// Generate Slug
function generateSlug() {
    const text = inputText.value.trim();
    let slug = text;

    if (convertToLowercase.checked) {
        slug = slug.toLowerCase();
    }

    if (replaceSpacesWithHyphens.checked) {
        slug = slug.replace(/\s+/g, '-'); // Replace one or more spaces with a single hyphen
    } else {
        slug = slug.replace(/\s+/g, ''); // If not replacing with hyphens, just remove spaces
    }

    if (removeSpecialCharacters.checked) {
        // Remove characters that are not alphanumeric or hyphens (if hyphens are kept)
        if (replaceSpacesWithHyphens.checked) {
            slug = slug.replace(/[^a-z0-9-]/g, ''); 
        } else {
            slug = slug.replace(/[^a-z0-9]/g, '');
        }
    }

    // Remove leading/trailing hyphens or any multiple hyphens
    slug = slug.replace(/^-+|-+$/g, '').replace(/-{2,}/g, '-');

    if (text === '') {
        outputSlug.innerHTML = '<div class="text-center text-muted">Your generated slug will appear here</div>';
        copyBtn.disabled = true;
        statusArea.textContent = '';
        return;
    }

    outputSlug.textContent = slug;
    copyBtn.disabled = false;
    showStatus('Slug generated!', 'success');

    // Add to history if text input is not empty
    if (text !== '') {
        addToHistory(text, slug);
    }
}

// Copy Slug to Clipboard
function copySlug() {
    const slugText = outputSlug.textContent;
    if (slugText === '' || slugText === 'Your generated slug will appear here') {
        showError('No slug to copy. Please enter text and convert first.');
        Swal.fire({
            title: 'No Slug',
            text: 'No slug to copy. Please enter text and convert first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    copyToClipboard(slugText);
    showStatus('Slug copied to clipboard!', 'success');
    
    Swal.fire({
        title: 'Copied!',
        text: 'The slug has been copied to your clipboard.',
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
    textarea.style.position = 'fixed'; // Prevents scrolling to the bottom
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
function addToHistory(originalText, generatedSlug) {
    const historyItem = {
        id: Date.now(),
        original: originalText,
        slug: generatedSlug,
        date: new Date().toLocaleString()
    };

    // Check if the last item is identical before adding
    const lastItem = slugHistory[0];
    if (lastItem && lastItem.original === originalText && lastItem.slug === generatedSlug) {
        return; // Don't add duplicate consecutive history items
    }

    slugHistory.unshift(historyItem);
    if (slugHistory.length > 10) {
        slugHistory.pop();
    }

    localStorage.setItem('slugHistory', JSON.stringify(slugHistory));
    displayHistory();
}

function displayHistory() {
    if (slugHistory.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    historyList.innerHTML = '';
    slugHistory.forEach(item => {
        const tr = document.createElement('tr');
        
        tr.innerHTML = `
            <td>
                <button class="btn btn-sm btn-outline-danger delete-history" data-id="${item.id}" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
            <td><div style="max-height: 50px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">${item.original}</div></td>
            <td class="font-monospace">${item.slug}</td>
            <td>${item.date}</td>
            <td class="text-end">
                <button class="btn btn-sm btn-outline-secondary copy-history" data-id="${item.id}" title="Copy Slug">
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
        text: "You won't be able to recover this history entry!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            slugHistory = slugHistory.filter(item => item.id !== id);
            localStorage.setItem('slugHistory', JSON.stringify(slugHistory));
            displayHistory();
            Swal.fire('Deleted!', 'The history entry has been deleted.', 'success');
        }
    });
}

function copyHistoryItem(id) {
    const item = slugHistory.find(item => item.id === id);
    if (!item) return;

    copyToClipboard(item.slug);
    showStatus('Slug copied to clipboard!', 'success');
    
    Swal.fire({
        title: 'Copied!',
        text: 'Slug has been copied to your clipboard.',
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

// Initial generation on page load if there's existing input (though not typically for an empty textarea)
// Or just ensure the output is initially clear
window.onload = () => {
    resetAll(); // Ensures initial state is clean and history is loaded
    generateSlug(); // In case of pre-filled text (though textarea is empty on load)
};

</script>

<?php include '../../includes/footer.php'; ?>