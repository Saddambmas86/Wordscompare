<?php
// SEO and Page Metadata
$page_title = "Repair PDF Online Free - Fix Corrupted PDF Files Instantly"; // You may Change the Title here
$page_description = "Repair corrupted PDF files online for free. Fix damaged, unreadable, or broken PDF documents and recover your content. Fast and secure browser-based repair."; // Put your Description here
$page_keywords = "repair pdf, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
        
        <div class="col-lg-8 border shadow-sm">
            <div class="tool-container rounded-3 p-4 p-md-5">
                <header class="text-center mb-4">
                    <h1 class="h2">PDF Repair & Optimizer <i class="fas fa-wrench text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Fix minor PDF issues, flatten forms, and optimize PDFs for smaller file sizes.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop PDF File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="pdfUpload" accept=".pdf" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('pdfUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select PDF File
                    </button>
                    <div id="fileInfo" class="mt-3 small text-muted">No file selected.</div>
                </div>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Repair Options</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="optimizePdf" checked>
                                    <label class="form-check-label" for="optimizePdf">
                                        Optimize PDF (Reduce file size by re-encoding and removing unused objects)
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flattenForms">
                                    <label class="form-check-label" for="flattenForms">
                                        Flatten Form Fields (Make interactive fields static)
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="removeMetadata">
                                    <label class="form-check-label" for="removeMetadata">
                                        Remove Metadata (Author, creation date, etc.)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="repairBtn" disabled>
                        <i class="fas fa-tools me-2"></i> Repair / Optimize
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                    <button class="btn btn-success btn-md px-2" id="downloadBtn" disabled>
                        <i class="fas fa-download me-2"></i> Download
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="history-area card mt-4" id="historyContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Repair History (Last 10 Files)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="historyTable">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th>File Name</th>
                                        <th>Date</th>
                                        <th>Size Before</th>
                                        <th>Size After</th>
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
                <?php include '../../views/content/repair-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://unpkg.com/pdf-lib/dist/pdf-lib.min.js"></script>
<script>
// JavaScript for PDF Repair & Optimizer
const { PDFDocument, PDFName, PDFString, PDFDict, PDFArray, PDFNumber, PDFBool } = PDFLib;

let files = [];
let repairedPdfBytes = null;
let repairHistory = JSON.parse(localStorage.getItem('pdfRepairHistory')) || [];

// Initialize elements
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const repairBtn = document.getElementById('repairBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const optimizePdfCheckbox = document.getElementById('optimizePdf');
const flattenFormsCheckbox = document.getElementById('flattenForms');
const removeMetadataCheckbox = document.getElementById('removeMetadata');


// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
repairBtn.addEventListener('click', repairPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PDF Repair & Optimizer',
        html: `Follow these steps to repair and optimize your PDFs:<br><br>
        <ol class="text-start">
            <li>Upload a PDF file by clicking "Select PDF File" or dragging it into the drop zone.</li>
            <li>Choose your desired repair/optimization options (e.g., Optimize, Flatten Forms, Remove Metadata).</li>
            <li>Click "Repair / Optimize" to process the PDF.</li>
            <li>Download your newly processed PDF.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    files = [];
    repairedPdfBytes = null;
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    statusArea.textContent = '';
    repairBtn.disabled = true;
    downloadBtn.disabled = true;
    
    // Reset options
    optimizePdfCheckbox.checked = true;
    flattenFormsCheckbox.checked = false;
    removeMetadataCheckbox.checked = false;
}

// Drag and Drop Handlers
function handleDragOver(event) {
    event.preventDefault();
    event.stopPropagation();
    uploadArea.classList.add('dragover');
}

function handleDragLeave(event) {
    event.preventDefault();
    event.stopPropagation();
    uploadArea.classList.remove('dragover');
}

function handleDrop(event) {
    event.preventDefault();
    event.stopPropagation();
    uploadArea.classList.remove('dragover');
    handleFiles(event.dataTransfer.files);
}

// File Selection Handler
function handleFileSelect(event) {
    handleFiles(event.target.files);
}

function handleFiles(selectedFiles) {
    if (selectedFiles.length === 0) return;

    files = Array.from(selectedFiles).filter(file => {
        if (file.type !== 'application/pdf') {
            showError('Please upload only PDF files.');
            return false;
        }
        if (file.size > 50 * 1024 * 1024) { // Max 50MB for PDF
            showError('File must be less than 50MB.');
            return false;
        }
        return true;
    });

    if (files.length > 0) {
        fileInfo.textContent = `${files[0].name} (${(files[0].size / 1024 / 1024).toFixed(2)} MB) selected.`;
        repairBtn.disabled = false;
        downloadBtn.disabled = true; // Disable download until repaired

        showStatus('File ready for processing.', 'info');
        Swal.fire({
            title: 'File Added',
            text: `${files[0].name} has been selected.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }
}


async function repairPdf() {
    if (files.length === 0) {
        showError('Please upload a PDF file first.');
        Swal.fire({
            title: 'Error',
            text: 'Please upload a PDF file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    const file = files[0];
    showStatus('Processing PDF...', 'info');
    repairBtn.disabled = true;
    downloadBtn.disabled = true;

    const swalInstance = Swal.fire({
        title: 'Processing PDF',
        html: 'Applying selected operations...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        },
        allowOutsideClick: false,
        allowEscapeKey: false
    });

    try {
        const arrayBuffer = await file.arrayBuffer();
        const pdfDoc = await PDFDocument.load(arrayBuffer, { ignoreEncryption: true });

        const optimize = optimizePdfCheckbox.checked;
        const flatten = flattenFormsCheckbox.checked;
        const removeMeta = removeMetadataCheckbox.checked;

        if (flatten) {
            // Flattening form fields
            const form = pdfDoc.getForm();
            form.flatten();
            showStatus('Form fields flattened.', 'info');
        }

        if (removeMeta) {
            // Remove metadata
            pdfDoc.removeInfoDict(); // Removes the Info dictionary
            showStatus('Metadata removed.', 'info');
        }

        // For optimization, simply reserializing the PDF with the latest PDF-LIB
        // version often results in some level of optimization (e.g., removing unused objects,
        // re-encoding streams if changes were made). More advanced optimization
        // like image compression requires manual work or external tools.
        if (optimize) {
            // PDF-LIB optimizes somewhat by default when saving, but we can try
            // to re-embed content to ensure fresh compression.
            // This is a simplified approach. True deep optimization is complex.
            // Just saving it will re-encode.
            showStatus('Optimizing PDF structure...', 'info');
        }

        repairedPdfBytes = await pdfDoc.save();

        const originalSize = file.size;
        const repairedSize = repairedPdfBytes.length;
        const sizeReduction = originalSize - repairedSize;
        const percentageReduction = (sizeReduction / originalSize * 100).toFixed(2);

        addToHistory({
            fileName: file.name,
            date: new Date().toLocaleString(),
            originalSize: originalSize,
            repairedSize: repairedSize,
            pdfBytes: repairedPdfBytes,
            options: {
                optimize: optimize,
                flatten: flatten,
                removeMeta: removeMeta
            }
        });

        showStatus(`PDF processed! Original: ${(originalSize / 1024).toFixed(2)} KB, New: ${(repairedSize / 1024).toFixed(2)} KB. Size reduction: ${percentageReduction}%`, 'success');
        repairBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Processing Complete!',
            html: `Your PDF has been processed.<br>Size reduction: <strong>${percentageReduction}%</strong>`,
            icon: 'success',
            confirmButtonText: 'Great!',
            timer: 2000,
            timerProgressBar: true
        });

    } catch (error) {
        showError(`Error processing PDF: ${error.message}`);
        repairBtn.disabled = false;
        downloadBtn.disabled = true;
        
        swalInstance.close();
        Swal.fire({
            title: 'Processing Error',
            text: error.message,
            icon: 'error',
            confirmButtonText: 'OK'
        });
        repairedPdfBytes = null; // Clear previous result on error
    }
}

// Download PDF
function downloadPdf() {
    if (!repairedPdfBytes) {
        showError('No PDF to download. Please process a file first.');
        Swal.fire({
            title: 'No Data',
            text: 'No PDF to download. Please process a file first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing PDF for download...', 'info');
    
    Swal.fire({
        title: 'Preparing PDF File',
        html: `Your PDF is ready for download...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        const blob = new Blob([repairedPdfBytes], { type: 'application/pdf' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        const originalFileName = files[0].name.replace('.pdf', '');
        a.download = `${originalFileName}_repaired.pdf`; // Append _repaired to file name
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        
        showStatus('PDF file downloaded!', 'success');
        Swal.fire({
            title: 'Download Complete',
            text: 'Your PDF file has been downloaded.',
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }, 1500);
}

// History Functions
function addToHistory(item) {
    // Don't store pdfBytes in localStorage to avoid quota exceeded error
    // Store only metadata
    const historyItem = {
        id: Date.now(),
        fileName: item.fileName,
        date: item.date,
        originalSize: item.originalSize,
        repairedSize: item.repairedSize,
        options: item.options
        // Note: pdfBytes is NOT stored in localStorage due to size limitations
    };

    repairHistory.unshift(historyItem);
    if (repairHistory.length > 10) {
        repairHistory.pop();
    }

    try {
        localStorage.setItem('pdfRepairHistory', JSON.stringify(repairHistory));
    } catch (e) {
        console.warn('Could not save to localStorage:', e);
        // If storage is full, remove oldest entries
        if (e.name === 'QuotaExceededError') {
            repairHistory = repairHistory.slice(0, 5); // Keep only 5 most recent
            try {
                localStorage.setItem('pdfRepairHistory', JSON.stringify(repairHistory));
            } catch (e2) {
                // If still failing, clear history
                repairHistory = [];
                localStorage.removeItem('pdfRepairHistory');
            }
        }
    }
    displayHistory();
}

function displayHistory() {
    if (repairHistory.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    historyList.innerHTML = '';
    repairHistory.forEach(item => {
        const sizeReduction = item.originalSize - item.repairedSize;
        const percentageReduction = (sizeReduction / item.originalSize * 100).toFixed(2);
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>
                <button class="btn btn-sm btn-outline-danger delete-history" data-id="${item.id}" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
            <td>${item.fileName}</td>
            <td>${item.date}</td>
            <td>${(item.originalSize / 1024).toFixed(2)} KB</td>
            <td>${(item.repairedSize / 1024).toFixed(2)} KB (${percentageReduction}%)</td>
            <td class="text-end">
                <button class="btn btn-sm btn-outline-primary download-history" data-id="${item.id}" title="Download">
                    <i class="fas fa-download"></i>
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

    document.querySelectorAll('.download-history').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            downloadHistoryItem(id);
        });
    });

    historyContainer.style.display = 'block';
}

function deleteHistoryItem(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            repairHistory = repairHistory.filter(item => item.id !== id);
            localStorage.setItem('pdfRepairHistory', JSON.stringify(repairHistory));
            displayHistory();
        }
    });
}

function downloadHistoryItem(id) {
    const item = repairHistory.find(item => item.id === id);
    if (!item) return;

    // Since we don't store PDF bytes in localStorage anymore,
    // show a message that the file needs to be reprocessed
    Swal.fire({
        title: 'File Not Available',
        html: `The repaired PDF file is no longer stored in browser history due to size limitations.<br><br>Please re-upload and process the file again to download it.`,
        icon: 'info',
        confirmButtonText: 'OK'
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