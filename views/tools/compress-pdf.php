<?php
// SEO and Page Metadata
$page_title = "Compress PDF Online Free - Reduce PDF File Size"; // You may Change the Title here
$page_description = "Compress PDF files online for free. Reduce PDF file size without quality loss. Fast, secure compression — no software needed, works in your browser."; // Put your Description here
$page_keywords = "$kw";

// Include common header
include '../../includes/header.php';
?>

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
                    <h1 class="h2">PDF Compressor <i class="fas fa-file-pdf text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Reduce the size of your PDF files without losing quality.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop PDF File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="pdfUpload" accept=".pdf" class="d-none">
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('pdfUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select PDF File
                    </button>
                    <div id="fileInfo" class="mt-3 small text-muted">No file selected.</div>
                </div>

                <div class="card mb-4" id="compressionOptions" style="display:none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Compression Options</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="compressionLevel" class="form-label">Compression Level:</label>
                            <select class="form-select border-danger" id="compressionLevel">
                                <option value="1">High (Smallest File Size)</option>
                                <option value="2" selected>Medium (Balanced)</option>
                                <option value="3">Low (Higher Quality)</option>
                            </select>
                        </div>
                        <p class="text-muted small">Higher compression levels result in smaller file sizes but may reduce image quality.</p>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="compressBtn" disabled>
                        <i class="fas fa-file-archive me-2"></i> Compress PDF
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                    <button class="btn btn-success btn-md px-2" id="downloadBtn" disabled>
                        <i class="fas fa-download me-2"></i> Download Compressed PDF
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="history-area card mt-4" id="historyContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Compression History (Last 10 Files)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="historyTable">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th>File Name</th>
                                        <th>Original Size</th>
                                        <th>Compressed Size</th>
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

    </div>
</div>

<?php include '../../includes/sharer.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 border shadow-sm">
            <article>
                <header class="mb-5 text-center">
                    <h2 class="display-5"><?php echo $page_title; ?></h2>
                    <p class="lead"><?php echo $page_description; ?></p>
                </header>
                <?php include '../../views/content/compress-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
<script>
// JavaScript for PDF Compressor
const { PDFDocument, rgb } = PDFLib;

let selectedPdfFile = null;
let compressedPdfBlob = null;
let compressionHistory = JSON.parse(localStorage.getItem('pdfCompressionHistory')) || [];

// Initialize elements
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const compressionLevel = document.getElementById('compressionLevel');
const compressionOptions = document.getElementById('compressionOptions');
const compressBtn = document.getElementById('compressBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
compressBtn.addEventListener('click', compressPdf);
downloadBtn.addEventListener('click', downloadCompressedPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PDF Compressor',
        html: `Follow these steps to compress your PDF:<br><br>
        <ol class="text-start">
            <li>Upload a PDF by clicking "Select PDF File" or dragging it into the drop zone.</li>
            <li>Choose your desired compression level.</li>
            <li>Click "Compress PDF" to reduce its file size.</li>
            <li>Download your newly compressed PDF.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    selectedPdfFile = null;
    compressedPdfBlob = null;
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    compressionOptions.style.display = 'none';
    statusArea.textContent = '';
    compressBtn.disabled = true;
    downloadBtn.disabled = true;
    compressionLevel.value = "2"; // Reset to default medium
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
    const files = event.dataTransfer.files;
    if (files.length > 0 && (files[0].type === 'application/pdf' || files[0].name.endsWith('.pdf'))) {
        selectedPdfFile = files[0];
        updateFileInfo();
    } else {
        showError('Please drop a valid PDF file.');
        Swal.fire({
            title: 'Invalid File Type',
            text: 'Please drop a valid PDF file.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// File Selection Handler
function handleFileSelect(event) {
    const files = event.target.files;
    if (files.length > 0 && (files[0].type === 'application/pdf' || files[0].name.endsWith('.pdf'))) {
        selectedPdfFile = files[0];
        updateFileInfo();
    } else {
        selectedPdfFile = null;
        updateFileInfo();
        showError('Please select a valid PDF file.');
        Swal.fire({
            title: 'Invalid File Type',
            text: 'Please select a valid PDF file.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

function updateFileInfo() {
    if (selectedPdfFile) {
        fileInfo.textContent = `Selected: ${selectedPdfFile.name} (${formatBytes(selectedPdfFile.size)})`;
        compressBtn.disabled = false;
        compressionOptions.style.display = 'block';
        downloadBtn.disabled = true; // Disable download until compressed
        showStatus('PDF ready for compression.', 'info');
        Swal.fire({
            title: 'File Selected',
            text: `${selectedPdfFile.name} is ready.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    } else {
        fileInfo.textContent = 'No file selected.';
        compressBtn.disabled = true;
        compressionOptions.style.display = 'none';
        downloadBtn.disabled = true;
        showStatus('', 'info');
    }
}

// Compress PDF
async function compressPdf() {
    if (!selectedPdfFile) {
        showError('Please select a PDF file to compress.');
        Swal.fire({
            title: 'No File Selected',
            text: 'Please select a PDF file to compress.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Compressing PDF...', 'info');
    compressBtn.disabled = true;
    downloadBtn.disabled = true;

    // Show loading alert
    const swalInstance = Swal.fire({
        title: 'Compressing Document',
        html: 'Please wait while we optimize your PDF file...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const arrayBuffer = await selectedPdfFile.arrayBuffer();
        const pdfDoc = await PDFDocument.load(arrayBuffer);

        const level = parseInt(compressionLevel.value);
        let compressionOptionsPDFLib = {};

        // These options are simplified and might not provide extreme compression
        // For advanced compression, server-side tools or more sophisticated client-side libraries are needed.
        if (level === 1) { // High compression
            compressionOptionsPDFLib = {
                subsetFonts: true,
                autoEncodeText: true,
                // imageCompression: PDFDocument.ImageCompression.Flate, // Not directly supported for output quality in save()
                // You can manually re-encode images for better compression if needed
            };
        } else if (level === 2) { // Medium compression (default for most tools)
            compressionOptionsPDFLib = {
                subsetFonts: true,
                autoEncodeText: true,
            };
        } else { // Low compression (higher quality)
            compressionOptionsPDFLib = {
                subsetFonts: false, // Keep full fonts
                autoEncodeText: false, // Less aggressive text encoding
            };
        }

        const compressedPdfBytes = await pdfDoc.save(compressionOptionsPDFLib);
        
        compressedPdfBlob = new Blob([compressedPdfBytes], { type: 'application/pdf' });

        const originalSize = selectedPdfFile.size;
        const compressedSize = compressedPdfBlob.size;
        const reduction = ((originalSize - compressedSize) / originalSize) * 100;

        const outputFileName = `Compressed_${selectedPdfFile.name}`;

        // Add to history
        addToHistory({
            fileName: outputFileName,
            date: new Date().toLocaleString(),
            originalSize: originalSize,
            compressedSize: compressedSize,
            // For robust history, one might save the *original file* or generate a hash.
            // For this simpler version, history will just record filename and allow download.
        });

        showStatus(`PDF compressed successfully! Reduced by ${reduction.toFixed(2)}%. Click Download.`, 'success');
        compressBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Compression Complete!',
            html: `Your PDF file has been compressed successfully.<br>Reduced by <strong>${reduction.toFixed(2)}%</strong>.`,
            icon: 'success',
            confirmButtonText: 'Awesome!',
            timer: 1500,
            timerProgressBar: true
        });

    } catch (error) {
        showError(`Error compressing PDF: ${error.message}`);
        compressBtn.disabled = false;
        downloadBtn.disabled = true;
        
        swalInstance.close();
        Swal.fire({
            title: 'Compression Error',
            text: `Failed to compress PDF: ${error.message}. Please try again.`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// Download Compressed PDF
function downloadCompressedPdf() {
    if (!compressedPdfBlob) {
        showError('No compressed PDF to download. Please compress a file first.');
        Swal.fire({
            title: 'No Compressed PDF',
            text: 'No compressed PDF to download. Please compress a file first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing compressed PDF for download...', 'info');
    
    // Show loading alert
    Swal.fire({
        title: 'Preparing Download',
        html: `Your compressed PDF file is being prepared...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        const url = URL.createObjectURL(compressedPdfBlob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `Compressed_${selectedPdfFile ? selectedPdfFile.name : `PDF_${Date.now()}.pdf`}`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        
        showStatus('Compressed PDF downloaded!', 'success');
        Swal.fire({
            title: 'Download Complete',
            text: 'Your compressed PDF file has been downloaded.',
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
        date: item.date,
        originalSize: item.originalSize,
        compressedSize: item.compressedSize,
    };

    compressionHistory.unshift(historyItem);
    if (compressionHistory.length > 10) {
        compressionHistory.pop();
    }

    localStorage.setItem('pdfCompressionHistory', JSON.stringify(compressionHistory));
    displayHistory();
}

function displayHistory() {
    if (compressionHistory.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    historyList.innerHTML = '';
    compressionHistory.forEach(item => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>
                <button class="btn btn-sm btn-outline-danger delete-history" data-id="${item.id}" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
            <td>${item.fileName}</td>
            <td>${formatBytes(item.originalSize)}</td>
            <td>${formatBytes(item.compressedSize)}</td>
            <td>${item.date}</td>
            <td class="text-end">
                <button class="btn btn-sm btn-outline-primary download-history" data-id="${item.id}" title="Download (Requires current session compressed PDF)">
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

    // Note: The download history button for compressed PDFs assumes the compressed PDF blob is still in `compressedPdfBlob`.
    // A robust solution for history would involve server-side storage or re-compressing original files.
    // For a simple client-side tool, this is a limitation.
    document.querySelectorAll('.download-history').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            // In a real application, you might use the `id` to retrieve the compressed file
            // from a server or trigger a re-compress based on stored original file info.
            // Here, we'll just trigger the main download function if a compressed PDF exists in the current session.
            downloadCompressedPdf(); // This will download the *currently compressed* PDF if available.
                                 // It won't re-create a historical one from scratch.
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
            compressionHistory = compressionHistory.filter(item => item.id !== id);
            localStorage.setItem('pdfCompressionHistory', JSON.stringify(compressionHistory));
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

function formatBytes(bytes, decimals = 2) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}
</script>

<?php include '../../includes/footer.php'; ?>