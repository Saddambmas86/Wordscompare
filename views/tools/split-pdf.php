<?php
// SEO and Page Metadata
$page_title = "Split PDF"; // You may Change the Title here
$page_description = "Split PDF online."; // Put your Description here
$page_keywords = "split PDF, PDF splitter, extract PDF pages, separate PDF, PDF page extraction, free PDF tool, online PDF splitter";

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
                    <h1 class="h2">PDF Splitter <i class="fas fa-cut text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Divide your PDF document into multiple files or extract specific pages.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop PDF File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="pdfUpload" accept="application/pdf" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('pdfUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select PDF File
                    </button>
                    <div id="fileInfo" class="mt-3 small text-muted">No file selected.</div>
                </div>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Splitting Options</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="splitMethod" class="form-label">How to Split?</label>
                                <select id="splitMethod" class="form-select">
                                    <option value="range" selected>Extract Pages by Range</option>
                                    <option value="individual">Split All Pages Individually</option>
                                </select>
                            </div>
                            <div class="col-12" id="pageRangeInputGroup">
                                <label for="pageRange" class="form-label">Page Range (e.g., 1-5, 8, 10-12)</label>
                                <input type="text" id="pageRange" class="form-control" placeholder="Enter page numbers or ranges">
                                <small class="form-text text-muted">Total pages: <span id="totalPages">0</span></small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="splitBtn" disabled>
                        <i class="fas fa-cut me-2"></i> Split PDF
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

                <div class="preview-area card mt-4" id="previewArea" style="display:none;">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-file-pdf me-2"></i>Output Files Preview</h5>
                        <span class="badge bg-info" id="outputFileCount"></span>
                    </div>
                    <div class="card-body">
                        <ul id="outputFileList" class="list-group list-group-flush">
                            </ul>
                    </div>
                </div>

                <div class="history-area card mt-4" id="historyContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Conversion History (Last 10 Files)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="historyTable">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th>File Name</th>
                                        <th>Date</th>
                                        <th>Action</th>
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
                <?php include '../../views/content/split-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
    // Set worker source for PDF.js
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';
</script>
<script>
// JavaScript for PDF Splitter
let originalPdfFile = null;
let pdfDocument = null; // Stored PDF.js document for processing
let totalPdfPages = 0;
let splitOutputFiles = []; // Array to store { name: "filename.pdf", blob: Blob }

// Initialize elements
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const splitBtn = document.getElementById('splitBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');
const totalPagesSpan = document.getElementById('totalPages');
const pageRangeInputGroup = document.getElementById('pageRangeInputGroup');
const pageRangeInput = document.getElementById('pageRange');
const splitMethodSelect = document.getElementById('splitMethod');
const previewArea = document.getElementById('previewArea');
const outputFileList = document.getElementById('outputFileList');
const outputFileCountSpan = document.getElementById('outputFileCount');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

let conversionHistory = JSON.parse(localStorage.getItem('pdfSplitHistory')) || [];

// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
splitBtn.addEventListener('click', handlePdfSplitting);
downloadBtn.addEventListener('click', downloadSplitFiles);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
splitMethodSelect.addEventListener('change', togglePageRangeVisibility);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PDF Splitter',
        html: `Follow these steps to split your PDFs:<br><br>
        <ol class="text-start">
            <li>Upload a PDF by clicking "Select PDF File" or dragging it into the drop zone.</li>
            <li>Choose your splitting method: "Extract Pages by Range" (e.g., 1-5, 8) or "Split All Pages Individually".</li>
            <li>Click "Split PDF" to generate the new PDF(s).</li>
            <li>Download your newly created PDF(s).</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    originalPdfFile = null;
    pdfDocument = null;
    totalPdfPages = 0;
    splitOutputFiles = [];
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    totalPagesSpan.textContent = '0';
    pageRangeInput.value = '';
    splitMethodSelect.value = 'range';
    pageRangeInputGroup.classList.remove('d-none');
    
    statusArea.textContent = '';
    splitBtn.disabled = true;
    downloadBtn.disabled = true;
    
    previewArea.style.display = 'none';
    outputFileList.innerHTML = '';
    outputFileCountSpan.textContent = '';
}

// Toggle Page Range Input Visibility
function togglePageRangeVisibility() {
    pageRangeInputGroup.classList.toggle('d-none', splitMethodSelect.value === 'individual');
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

async function handleFiles(selectedFiles) {
    if (selectedFiles.length === 0) return;

    const file = selectedFiles[0];
    if (file.type !== 'application/pdf') {
        showError('Please upload only PDF files.');
        return;
    }
    if (file.size > 50 * 1024 * 1024) { // Max 50MB for PDF
        showError('File must be less than 50MB.');
        return;
    }

    originalPdfFile = file;
    fileInfo.textContent = `${file.name} selected.`;
    showStatus('Loading PDF...', 'info');
    splitBtn.disabled = true;
    downloadBtn.disabled = true;

    const fileReader = new FileReader();
    fileReader.onload = async function() {
        const typedarray = new Uint8Array(this.result);
        try {
            pdfDocument = await pdfjsLib.getDocument({ data: typedarray }).promise;
            totalPdfPages = pdfDocument.numPages;
            totalPagesSpan.textContent = totalPdfPages;
            splitBtn.disabled = false;
            showStatus('PDF loaded. Ready to split.', 'success');
            Swal.fire({
                title: 'PDF Loaded',
                text: `${originalPdfFile.name} (${totalPdfPages} pages) is ready.`,
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 1500,
                timerProgressBar: true
            });
        } catch (error) {
            showError(`Error loading PDF: ${error.message}`);
            Swal.fire({
                title: 'PDF Loading Error',
                text: `Could not load PDF: ${error.message}`,
                icon: 'error',
                confirmButtonText: 'OK'
            });
            resetAll();
        }
    };
    fileReader.readAsArrayBuffer(file);
}

// Parse Page Ranges
function parsePageRanges(rangeString, totalPages) {
    const pages = new Set(); // Use a Set to avoid duplicate pages
    const parts = rangeString.split(',').map(part => part.trim());

    for (const part of parts) {
        if (!part) continue;

        if (part.includes('-')) {
            const [startStr, endStr] = part.split('-').map(Number);
            const start = Math.max(1, startStr);
            const end = Math.min(totalPages, endStr);
            if (isNaN(start) || isNaN(end) || start > end) {
                throw new Error(`Invalid range: ${part}`);
            }
            for (let i = start; i <= end; i++) {
                pages.add(i);
            }
        } else {
            const pageNum = Number(part);
            if (isNaN(pageNum) || pageNum < 1 || pageNum > totalPages) {
                throw new Error(`Page number out of bounds or invalid: ${part}`);
            }
            pages.add(pageNum);
        }
    }
    return Array.from(pages).sort((a, b) => a - b);
}

// Handle PDF Splitting
async function handlePdfSplitting() {
    if (!pdfDocument || totalPdfPages === 0) {
        showError('No PDF loaded. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No PDF loaded. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    splitBtn.disabled = true;
    downloadBtn.disabled = true;
    showStatus('Splitting PDF...', 'info');
    splitOutputFiles = [];
    outputFileList.innerHTML = '';
    outputFileCountSpan.textContent = '';
    previewArea.style.display = 'none';

    const swalInstance = Swal.fire({
        title: 'Splitting PDF',
        html: 'Please wait while your PDF is being split...',
        allowOutsideClick: false,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const splitMethod = splitMethodSelect.value;
        let pagesToProcess = [];

        if (splitMethod === 'range') {
            const rangeString = pageRangeInput.value.trim();
            if (!rangeString) {
                throw new Error('Please enter page numbers or ranges to extract.');
            }
            pagesToProcess = parsePageRanges(rangeString, totalPdfPages);
            if (pagesToProcess.length === 0) {
                throw new Error('No valid pages found in the entered range.');
            }
            // For range method, we create one PDF containing all specified pages
            await createPdfFromPages(pagesToProcess, originalPdfFile.name, swalInstance);
        } else if (splitMethod === 'individual') {
            // For individual method, create a PDF for each page
            for (let i = 1; i <= totalPdfPages; i++) {
                await createPdfFromPages([i], originalPdfFile.name, swalInstance, `_page_${i}`);
            }
        }

        if (splitOutputFiles.length > 0) {
            displayOutputFiles();
            downloadBtn.disabled = false;
            showStatus('PDF split successfully!', 'success');
            swalInstance.close();
            Swal.fire({
                title: 'Success!',
                text: `${splitOutputFiles.length} PDF(s) generated.`,
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 1500,
                timerProgressBar: true
            });
        } else {
            throw new Error('No output files were generated. Please check your settings.');
        }

    } catch (error) {
        showError(`Error splitting PDF: ${error.message}`);
        swalInstance.close();
        Swal.fire({
            title: 'Splitting Error',
            text: error.message,
            icon: 'error',
            confirmButtonText: 'OK'
        });
        resetAll(); // Reset state on error
    } finally {
        splitBtn.disabled = false;
    }
}

async function createPdfFromPages(pageNumbers, originalFileName, swalInstance, suffix = '') {
    const { jsPDF } = window.jspdf;
    let newDoc = new jsPDF('p', 'pt', 'a4'); // Default A4 portrait
    let firstPageAdded = false;

    for (const pageNum of pageNumbers) {
        if (pageNum < 1 || pageNum > totalPdfPages) {
            console.warn(`Skipping invalid page number: ${pageNum}`);
            continue;
        }

        const page = await pdfDocument.getPage(pageNum);
        const viewport = page.getViewport({ scale: 1 });
        
        // Adjust PDF document size to match page for single page exports or first page of multi-page
        if (!firstPageAdded) {
            newDoc = new jsPDF({
                orientation: viewport.width > viewport.height ? 'landscape' : 'portrait',
                unit: 'pt',
                format: [viewport.width, viewport.height]
            });
            firstPageAdded = true;
        } else {
            newDoc.addPage([viewport.width, viewport.height], viewport.width > viewport.height ? 'landscape' : 'portrait');
        }

        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');
        canvas.width = viewport.width;
        canvas.height = viewport.height;

        await page.render({ canvasContext: context, viewport: viewport }).promise;

        const imgData = canvas.toDataURL('image/jpeg', 0.9); // Quality 0.9

        newDoc.addImage(imgData, 'JPEG', 0, 0, viewport.width, viewport.height);

        // Update progress in Swal
        if (swalInstance && swalInstance.isOpen()) {
            const total = splitMethodSelect.value === 'individual' ? totalPdfPages : pageNumbers.length;
            const current = splitMethodSelect.value === 'individual' ? pageNum : pageNumbers.indexOf(pageNum) + 1;
            swalInstance.update({
                html: `Processing page ${current} of ${total}...`,
                didOpen: () => Swal.showLoading()
            });
        }
    }

    const baseName = originalFileName.replace(/\.pdf$/i, '');
    let outputFileName;
    if (splitMethodSelect.value === 'individual') {
        outputFileName = `${baseName}${suffix}.pdf`;
    } else {
        outputFileName = `${baseName}_split${suffix}.pdf`;
        if (pageNumbers.length === 1) {
             outputFileName = `${baseName}_page_${pageNumbers[0]}.pdf`;
        } else if (pageNumbers.length > 1) {
            outputFileName = `${baseName}_pages_${pageNumbers[0]}-${pageNumbers[pageNumbers.length - 1]}.pdf`;
        }
    }

    const pdfBlob = newDoc.output('blob');
    splitOutputFiles.push({
        name: outputFileName,
        blob: pdfBlob
    });
}


// Display Output Files in Preview Area
function displayOutputFiles() {
    outputFileList.innerHTML = '';
    outputFileCountSpan.textContent = `Files: ${splitOutputFiles.length}`;
    previewArea.style.display = 'block';

    splitOutputFiles.forEach((file, index) => {
        const listItem = document.createElement('li');
        listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
        listItem.innerHTML = `
            <span><i class="fas fa-file-pdf me-2 text-danger"></i>${file.name}</span>
            <div>
                <button class="btn btn-sm btn-outline-primary download-single-file me-2" data-index="${index}" title="Download this file">
                    <i class="fas fa-download"></i>
                </button>
                <button class="btn btn-sm btn-outline-secondary preview-single-file" data-index="${index}" title="Preview in new tab">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        `;
        outputFileList.appendChild(listItem);
    });

    document.querySelectorAll('.download-single-file').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const index = parseInt(e.currentTarget.getAttribute('data-index'));
            saveFile(splitOutputFiles[index].blob, splitOutputFiles[index].name);
        });
    });

    document.querySelectorAll('.preview-single-file').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const index = parseInt(e.currentTarget.getAttribute('data-index'));
            previewFile(splitOutputFiles[index].blob);
        });
    });

    // Add to history
    addToHistory({
        fileName: originalPdfFile.name,
        date: new Date().toLocaleString(),
        outputFiles: splitOutputFiles.map(f => ({ name: f.name, blob: f.blob })) // Store blobs for history
    });
}

// Download All Split Files (if multiple) or single file (if one)
function downloadSplitFiles() {
    if (splitOutputFiles.length === 0) {
        showError('No files to download.');
        Swal.fire({
            title: 'Error',
            text: 'No files to download. Please split a PDF first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (splitOutputFiles.length === 1) {
        saveFile(splitOutputFiles[0].blob, splitOutputFiles[0].name);
        showStatus('File downloaded!', 'success');
        Swal.fire({
            title: 'Download Complete',
            text: `Your file '${splitOutputFiles[0].name}' has been downloaded.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1500,
            timerProgressBar: true
        });
    } else {
        // Option to download all as a zip, or prompt for individual downloads
        // For simplicity, let's offer individual downloads from the list,
        // and if this button is clicked, offer to download the first one, or instruct.
        // A "Download All as ZIP" would require another library (JSZip).
        // For now, prompt the user to download from the list.
        Swal.fire({
            title: 'Download Multiple Files',
            html: 'Your PDF was split into multiple files. Please use the download buttons next to each file in the "Output Files Preview" section to download them individually.',
            icon: 'info',
            confirmButtonText: 'Got it!'
        });
    }
}

function saveFile(blob, filename) {
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = filename;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
}

function previewFile(blob) {
    const url = URL.createObjectURL(blob);
    window.open(url, '_blank');
    URL.revokeObjectURL(url); // Revoke after a short delay for browser to open
}


// History Functions
function addToHistory(item) {
    const historyItem = {
        id: Date.now(),
        fileName: item.fileName,
        date: item.date,
        // Store output files as base64 to save in localStorage, as Blobs can't be directly saved
        outputFiles: item.outputFiles.map(f => ({
            name: f.name,
            dataUrl: URL.createObjectURL(f.blob) // Temporary URL, convert to base64 if persistent storage is needed for actual file content
            // For true persistence of binary data in localStorage, needs to be base64.
            // For now, let's simplify and just store metadata and regenerate on preview/download if possible.
            // Or, for history, we might just store info, not the actual file content.
            // Given localStorage limits and the nature of large PDFs, storing actual file content (even base64) is impractical.
            // So, history will store metadata and give a warning if regenerating is not feasible.
        }))
    };

    // For the history, we will only store metadata, not the actual Blob content
    // as Blobs cannot be directly stored in localStorage and converting large PDFs to Base64
    // for localStorage is highly impractical and can exceed storage limits.
    const historyEntry = {
        id: Date.now(),
        originalFileName: item.fileName,
        date: item.date,
        outputFileNames: item.outputFiles.map(f => f.name), // Store only file names for display
        // We will NOT store the actual file content (blob) in localStorage due to size limits.
        // If a user clicks 'download' from history, they will be prompted to re-upload the original PDF
        // or a simpler placeholder. For now, history just shows metadata.
    };

    conversionHistory.unshift(historyEntry);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('pdfSplitHistory', JSON.stringify(conversionHistory));
    displayHistory();
}

function displayHistory() {
    if (conversionHistory.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    historyList.innerHTML = '';
    conversionHistory.forEach(item => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>
                <button class="btn btn-sm btn-outline-danger delete-history" data-id="${item.id}" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
            <td>${item.originalFileName}</td>
            <td>${item.date}</td>
            <td>
                <span class="text-muted small">${item.outputFileNames.join(', ')}</span><br>
                <button class="btn btn-sm btn-outline-primary download-history mt-1" data-id="${item.id}" title="Download (Requires re-processing)">
                    <i class="fas fa-download me-1"></i>Download All
                </button>
            </td>
        `;
        historyList.appendChild(tr);
    });

    document.querySelectorAll('.delete-history').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            deleteHistoryItem(id);
        });
    });

    document.querySelectorAll('.download-history').forEach(btn => {
        btn.addEventListener('click', (e) => {
            Swal.fire({
                title: 'Cannot Download from History Directly',
                text: 'For privacy and performance reasons, split PDF file contents are not stored in history. Please re-upload your original PDF to split and download again.',
                icon: 'info',
                confirmButtonText: 'OK'
            });
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
            conversionHistory = conversionHistory.filter(item => item.id !== id);
            localStorage.setItem('pdfSplitHistory', JSON.stringify(conversionHistory));
            displayHistory();
            Swal.fire('Deleted!', 'The history entry has been removed.', 'success');
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
</script>

<?php include '../../includes/footer.php'; ?>