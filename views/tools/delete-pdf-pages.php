<?php
// SEO and Page Metadata
$page_title = "Delete PDF Pages Online Free - Remove Pages from PDF"; // You may Change the Title here
$page_description = "Delete pages from PDF online for free. Remove single or multiple pages from any PDF quickly and securely. No sign-up required — instant results."; // Put your Description here
$page_keywords = "delete pdf pages, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
                    <h1 class="h2">Delete PDF Pages <i class="fas fa-eraser text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Effortlessly remove unwanted pages from your PDF documents.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop PDF File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="pdfUpload" accept="application/pdf" class="d-none">
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('pdfUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select PDF File
                    </button>
                    <div id="fileInfo" class="mt-3 small text-muted">No file selected.</div>
                    <div id="fileSizeLimit" class="mt-2 small text-danger">Max file size: 50 MB</div>
                </div>

                <div class="options-card card mb-4" id="optionsCard" style="display:none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Deletion Options</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="pagesToDelete" class="form-label">Pages to Delete (e.g., 1, 3-5, 8)</label>
                                <input type="text" id="pagesToDelete" class="form-control" placeholder="Enter page numbers or ranges to delete">
                                <small class="form-text text-muted">Separate page numbers or ranges with commas. Example: 1, 3-5, 8</small>
                            </div>
                            <div class="col-12">
                                <div id="pageCountInfo" class="alert alert-info text-center mt-3" style="display:none;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="deleteBtn" disabled>
                        <i class="fas fa-eraser me-2"></i> Delete Pages
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                    <button class="btn btn-success btn-md px-2" id="downloadBtn" disabled>
                        <i class="fas fa-download me-2"></i> Download PDF
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="preview-area card mt-4" id="pdfPreviewContainer" style="display:none;">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-file-pdf me-2"></i>PDF Preview (Original)</h5>
                        <span class="badge bg-info" id="previewPageInfo"></span>
                    </div>
                    <div class="card-body p-0 text-center">
                        <canvas id="pdfCanvas" style="width:100%; height:auto; border:1px solid #ddd;"></canvas>
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
                                        <th width="15%" class="text-end"></th>
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
                <?php include '../../views/content/delete-pdf-pages-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script>
// Set worker source for pdf.js
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

let originalPdfBytes = null;
let originalPdfDoc = null;
let originalFileName = '';
let totalPages = 0;
let deletedPdfBytes = null;
let conversionHistory = JSON.parse(localStorage.getItem('pdfDeleteHistory')) || [];

// Initialize elements
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const fileSizeLimit = document.getElementById('fileSizeLimit');
const optionsCard = document.getElementById('optionsCard');
const pageCountInfo = document.getElementById('pageCountInfo');
const pagesToDeleteInput = document.getElementById('pagesToDelete');
const deleteBtn = document.getElementById('deleteBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');
const pdfPreviewContainer = document.getElementById('pdfPreviewContainer');
const pdfCanvas = document.getElementById('pdfCanvas');
const previewPageInfo = document.getElementById('previewPageInfo');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

const MAX_FILE_SIZE = 50 * 1024 * 1024; // 50 MB

// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
deleteBtn.addEventListener('click', deletePagesFromPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'How to Delete PDF Pages',
        html: `Follow these steps to remove pages from your PDFs:<br><br>
        <ol class="text-start">
            <li>Upload a PDF by clicking "Select PDF File" or dragging it into the drop zone.</li>
            <li>In the "Pages to Delete" field, enter the numbers or ranges of pages you want to remove (e.g., "1, 3-5, 8").</li>
            <li>Click "Delete Pages" to process your PDF.</li>
            <li>Download your new PDF with the specified pages removed.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    originalPdfBytes = null;
    originalPdfDoc = null;
    originalFileName = '';
    totalPages = 0;
    deletedPdfBytes = null;

    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    fileSizeLimit.style.display = 'block';
    optionsCard.style.display = 'none';
    pageCountInfo.style.display = 'none';
    pagesToDeleteInput.value = '';
    deleteBtn.disabled = true;
    downloadBtn.disabled = true;
    statusArea.textContent = '';
    pdfPreviewContainer.style.display = 'none';
    pdfCanvas.getContext('2d').clearRect(0, 0, pdfCanvas.width, pdfCanvas.height);
    previewPageInfo.textContent = '';
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
        showError('Please upload a PDF file.');
        Swal.fire({
            title: 'Invalid File Type',
            text: 'Please upload a PDF file.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        resetAll();
        return;
    }

    if (file.size > MAX_FILE_SIZE) {
        showError(`File size exceeds limit (${MAX_FILE_SIZE / (1024 * 1024)} MB).`);
        Swal.fire({
            title: 'File Too Large',
            text: `File size exceeds limit (${MAX_FILE_SIZE / (1024 * 1024)} MB).`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
        resetAll();
        return;
    }

    originalFileName = file.name;
    fileInfo.textContent = `${originalFileName} selected.`;
    fileSizeLimit.style.display = 'none';
    deleteBtn.disabled = true;
    downloadBtn.disabled = true;
    optionsCard.style.display = 'block';
    showStatus('Loading PDF...', 'info');

    try {
        originalPdfBytes = await readFileAsArrayBuffer(file);
        const pdfDoc = await pdfjsLib.getDocument({ data: originalPdfBytes }).promise;
        originalPdfDoc = pdfDoc;
        totalPages = pdfDoc.numPages;
        pageCountInfo.textContent = `Total pages: ${totalPages}`;
        pageCountInfo.style.display = 'block';

        deleteBtn.disabled = false;
        showStatus('PDF loaded. Enter pages to delete and click "Delete Pages".', 'success');
        renderPdfPage(1); // Render first page of original PDF
        pdfPreviewContainer.style.display = 'block';

        Swal.fire({
            title: 'PDF Loaded',
            text: `${originalFileName} loaded successfully. Total pages: ${totalPages}`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });

    } catch (error) {
        showError(`Failed to load PDF: ${error.message}`);
        Swal.fire({
            title: 'PDF Loading Error',
            text: `Failed to load PDF: ${error.message}`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
        resetAll();
    }
}

function readFileAsArrayBuffer(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.onload = () => resolve(reader.result);
        reader.onerror = (error) => reject(error);
        reader.readAsArrayBuffer(file);
    });
}

async function renderPdfPage(pageNum) {
    if (!originalPdfDoc) return;

    try {
        const page = await originalPdfDoc.getPage(pageNum);
        const viewport = page.getViewport({ scale: 1.5 }); // Adjust scale as needed

        pdfCanvas.height = viewport.height;
        pdfCanvas.width = viewport.width;

        const renderContext = {
            canvasContext: pdfCanvas.getContext('2d'),
            viewport: viewport,
        };
        await page.render(renderContext).promise;
        previewPageInfo.textContent = `Page ${pageNum} of ${totalPages}`;
    } catch (error) {
        console.error('Error rendering PDF page:', error);
        previewPageInfo.textContent = 'Error rendering preview.';
    }
}

async function deletePagesFromPdf() {
    if (!originalPdfBytes) {
        showError('No PDF loaded. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No PDF loaded. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    const pagesToDeleteText = pagesToDeleteInput.value.trim();
    if (!pagesToDeleteText) {
        showError('Please specify pages to delete.');
        Swal.fire({
            title: 'Input Required',
            text: 'Please specify pages to delete (e.g., 1, 3-5).',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Deleting pages...', 'info');
    deleteBtn.disabled = true;
    downloadBtn.disabled = true;

    const swalInstance = Swal.fire({
        title: 'Processing PDF',
        html: 'Removing specified pages. This may take a moment...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        },
        allowOutsideClick: false
    });

    try {
        const { PDFDocument } = PDFLib;
        const pdfDoc = await PDFDocument.load(originalPdfBytes);
        
        const pagesToRemove = parsePageRanges(pagesToDeleteText, totalPages);
        
        // PDF-LIB removePage takes 0-indexed page numbers
        // We need to remove pages from the end to avoid index shifts
        const sortedPagesToRemove = Array.from(pagesToRemove).sort((a, b) => b - a);

        sortedPagesToRemove.forEach(pageIndex => {
            if (pageIndex >= 0 && pageIndex < pdfDoc.getPageCount()) {
                pdfDoc.removePage(pageIndex);
            }
        });

        deletedPdfBytes = await pdfDoc.save();

        const newFileName = originalFileName.replace('.pdf', '_edited.pdf');
        
        addToHistory({
            fileName: newFileName,
            originalFileName: originalFileName,
            date: new Date().toLocaleString(),
            pagesDeleted: pagesToDeleteText,
            deletedPdfBytes: deletedPdfBytes // Store the new PDF bytes
        });

        swalInstance.close();
        showStatus('Pages deleted successfully! Click Download PDF.', 'success');
        deleteBtn.disabled = false;
        downloadBtn.disabled = false;

        Swal.fire({
            title: 'Success!',
            text: 'Pages have been removed. You can now download the modified PDF.',
            icon: 'success',
            confirmButtonText: 'Download',
            showCancelButton: true,
            cancelButtonText: 'Later',
            confirmButtonColor: '#28a745',
            timer: 3000,
            timerProgressBar: true
        }).then((result) => {
            if (result.isConfirmed) {
                downloadPdf();
            }
        });

    } catch (error) {
        swalInstance.close();
        showError(`Error deleting pages: ${error.message}`);
        deleteBtn.disabled = false;
        downloadBtn.disabled = true;
        Swal.fire({
            title: 'Error',
            text: `Error deleting pages: ${error.message}. Please check your page numbers and try again.`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
        console.error("Error deleting pages:", error);
    }
}

// Parses page ranges like "1, 3-5, 8" into a set of 0-indexed page numbers
function parsePageRanges(rangeString, totalPages) {
    const pageSet = new Set();
    const parts = rangeString.split(',').map(s => s.trim()).filter(s => s);

    parts.forEach(part => {
        if (part.includes('-')) {
            const [start, end] = part.split('-').map(Number);
            if (isNaN(start) || isNaN(end) || start < 1 || end > totalPages || start > end) {
                throw new Error(`Invalid page range: ${part}. Please use valid numbers within 1-${totalPages}.`);
            }
            for (let i = start; i <= end; i++) {
                pageSet.add(i - 1); // 0-indexed
            }
        } else {
            const pageNum = Number(part);
            if (isNaN(pageNum) || pageNum < 1 || pageNum > totalPages) {
                throw new Error(`Invalid page number: ${part}. Please use a valid number within 1-${totalPages}.`);
            }
            pageSet.add(pageNum - 1); // 0-indexed
        }
    });
    return pageSet;
}

function downloadPdf() {
    if (!deletedPdfBytes) {
        showError('No modified PDF to download. Please delete pages first.');
        Swal.fire({
            title: 'No PDF Ready',
            text: 'No modified PDF to download. Please delete pages first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing download...', 'info');
    
    Swal.fire({
        title: 'Preparing Download',
        html: `Your PDF is ready for download...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        const blob = new Blob([deletedPdfBytes], { type: 'application/pdf' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = originalFileName.replace('.pdf', '_edited.pdf');
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        
        showStatus('PDF downloaded successfully!', 'success');
        Swal.fire({
            title: 'Download Complete',
            text: 'Your edited PDF file has been downloaded.',
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }, 1500);
}

// History Functions
function addToHistory(item) {
    const historyItem = {
        id: Date.now(),
        fileName: item.fileName,
        originalFileName: item.originalFileName,
        date: item.date,
        pagesDeleted: item.pagesDeleted,
        deletedPdfBytes: item.deletedPdfBytes // Store the actual byte array for re-download
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('pdfDeleteHistory', JSON.stringify(conversionHistory));
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
            <td>${item.fileName}</td>
            <td>${item.date}</td>
            <td>
                <span class="badge bg-secondary">${item.pagesDeleted}</span>
            </td>
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
            downloadHistoryItemFromHistory(id);
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
            conversionHistory = conversionHistory.filter(item => item.id !== id);
            localStorage.setItem('pdfDeleteHistory', JSON.stringify(conversionHistory));
            displayHistory();
        }
    });
}

function downloadHistoryItemFromHistory(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.deletedPdfBytes) {
        showError('No PDF data found for this history item.');
        Swal.fire({
            title: 'Error',
            text: 'No PDF data found for this history item.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus(`Downloading ${item.fileName}...`, 'info');
    
    Swal.fire({
        title: 'Preparing Download',
        html: `Preparing ${item.fileName} for download...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        const blob = new Blob([new Uint8Array(item.deletedPdfBytes)], { type: 'application/pdf' }); // Ensure it's a Uint8Array
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = item.fileName;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        
        showStatus(`${item.fileName} downloaded!`, 'success');
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