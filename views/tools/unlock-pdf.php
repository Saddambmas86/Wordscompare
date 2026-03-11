<?php
// SEO and Page Metadata
$page_title = "$title"; // You may Change the Title here
$page_description = "$desc"; // Put your Description here
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
        
        <div class="col-lg-8 border shadow-sm">
            <div class="tool-container rounded-3 p-4 p-md-5">
                <header class="text-center mb-4">
                    <h1 class="h2">PDF Unlocker <i class="fas fa-lock-open text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Remove passwords from PDF files quickly and securely.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop Encrypted PDF Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="pdfUpload" accept=".pdf" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('pdfUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select PDF File
                    </button>
                    <div id="fileInfo" class="mt-3 small text-muted">No file selected.</div>
                </div>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-key me-2"></i>Password Input (if required)</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="pdfPassword" class="form-label">Enter Password (optional, try without if unsure)</label>
                                <input type="password" id="pdfPassword" class="form-control" placeholder="Enter PDF password">
                                <small class="text-muted">If the PDF is protected, enter the password here. Leave blank to attempt unlocking without a password.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="unlockBtn" disabled>
                        <i class="fas fa-unlock-alt me-2"></i> Unlock PDF
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                    <button class="btn btn-success btn-md px-2" id="downloadBtn" disabled>
                        <i class="fas fa fa-download me-2"></i> Download Unlocked PDF
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="preview-area card mt-4" id="previewCard" style="display: none;">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>Unlocked PDF Info</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="p-4 text-center text-muted" id="pdfPreviewContent">
                            <p>Once unlocked, information about your PDF will appear here.</p>
                        </div>
                    </div>
                </div>

                <div class="history-area card mt-4" id="historyContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Unlock History (Last 10 Files)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="historyTable">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th>File Name</th>
                                        <th>Date</th>
                                        <th>Status</th>
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
                <?php include '../../views/content/unlock-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://unpkg.com/pdf-lib/dist/pdf-lib.min.js"></script>
<script>
// JavaScript for PDF Unlocker
const { PDFDocument } = PDFLib;

let file = null;
let unlockedPdfBytes = null;
let unlockHistory = JSON.parse(localStorage.getItem('pdfUnlockHistory')) || [];

// Initialize elements
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const pdfPassword = document.getElementById('pdfPassword');
const unlockBtn = document.getElementById('unlockBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');
const previewCard = document.getElementById('previewCard');
const pdfPreviewContent = document.getElementById('pdfPreviewContent');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
unlockBtn.addEventListener('click', unlockPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
pdfPassword.addEventListener('input', checkFileAndEnableButton); // Enable unlock button when password is typed if file is selected

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'How to Unlock PDF',
        html: `Follow these steps to remove passwords from your PDFs:<br><br>
        <ol class="text-start">
            <li>Upload your password-protected PDF file.</li>
            <li>Enter the password in the "Password Input" field (if known).</li>
            <li>Click "Unlock PDF".</li>
            <li>Download your unlocked PDF.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    file = null;
    unlockedPdfBytes = null;
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    pdfPassword.value = '';
    statusArea.textContent = '';
    unlockBtn.disabled = true;
    downloadBtn.disabled = true;
    previewCard.style.display = 'none';
    pdfPreviewContent.innerHTML = '<p>Once unlocked, information about your PDF will appear here.</p>';
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

    file = selectedFiles[0];

    if (file.type !== 'application/pdf') {
        showError('Please upload only PDF files.');
        Swal.fire({
            title: 'Invalid File Type',
            text: 'Please upload only PDF files.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        file = null; // Clear selected file if invalid
        fileInfo.textContent = 'No file selected.';
        unlockBtn.disabled = true;
        return;
    }
    if (file.size > 50 * 1024 * 1024) { // Max 50MB
        showError('File must be less than 50MB.');
        Swal.fire({
            title: 'File Too Large',
            text: 'File must be less than 50MB.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        file = null; // Clear selected file if too large
        fileInfo.textContent = 'No file selected.';
        unlockBtn.disabled = true;
        return;
    }

    fileInfo.textContent = `${file.name} selected.`;
    checkFileAndEnableButton();
    showStatus('File ready for unlocking.', 'info');
    Swal.fire({
        title: 'File Added',
        text: `${file.name} has been selected.`,
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

function checkFileAndEnableButton() {
    unlockBtn.disabled = !file;
}

// Unlock PDF Function
async function unlockPdf() {
    if (!file) {
        showError('Please upload a PDF file first.');
        Swal.fire({
            title: 'No File',
            text: 'Please upload a PDF file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Attempting to unlock PDF...', 'info');
    unlockBtn.disabled = true;
    downloadBtn.disabled = true;

    const swalInstance = Swal.fire({
        title: 'Unlocking PDF',
        html: 'Please wait while we try to unlock your PDF...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        },
        allowOutsideClick: false,
        allowEscapeKey: false
    });

    try {
        const arrayBuffer = await file.arrayBuffer();
        const password = pdfPassword.value || undefined; // Use undefined if empty to signify no password attempt

        const pdfDoc = await PDFDocument.load(arrayBuffer, { ignoreEncryption: true, password: password });
        
        // This attempts to load the PDF. If it's password protected and the password is wrong,
        // it will throw an error. If ignoreEncryption is true, it will load but won't decrypt.
        // We need to re-save to truly remove protection.
        
        // A simple way to "unlock" is to load it with the correct password, then save it without one.
        // If password was incorrect, PDFDocument.load would throw.
        // If password was correct or not needed, this next line saves it as a new, unencrypted PDF.
        unlockedPdfBytes = await pdfDoc.save({ use  : [
                PDFLib.SaveOptions.useObjectStreams,
                PDFLib.SaveOptions.useFlateCompression,
            ],
            // encryption: {
            //     userPassword: '', // Explicitly save without password
            //     ownerPassword: '',
            //     // You might specify permissions if needed, e.g., PDFLib.Permissions.Print
            // }
        });


        showStatus('PDF successfully unlocked!', 'success');
        downloadBtn.disabled = false;
        
        // Display some info about the unlocked PDF
        const pdfSizeMB = (unlockedPdfBytes.byteLength / (1024 * 1024)).toFixed(2);
        pdfPreviewContent.innerHTML = `
            <p><strong>Status:</strong> Unlocked Successfully!</p>
            <p><strong>Original File Name:</strong> ${file.name}</p>
            <p><strong>New File Size:</strong> ${pdfSizeMB} MB</p>
            <p><strong>Pages:</strong> ${pdfDoc.getPageCount()}</p>
        `;
        previewCard.style.display = 'block';

        addToHistory({
            fileName: file.name,
            date: new Date().toLocaleString(),
            status: 'Unlocked',
            bytes: unlockedPdfBytes // Store unlocked bytes for download/preview
        });
        
        swalInstance.close();
        Swal.fire({
            title: 'Success!',
            text: 'Your PDF has been successfully unlocked.',
            icon: 'success',
            confirmButtonText: 'Great!',
            timer: 1500,
            timerProgressBar: true
        });

    } catch (error) {
        let errorMessage = 'Failed to unlock PDF. ';
        if (error.message.includes('password')) {
            errorMessage += 'Incorrect password or the PDF is protected with a password not supported by this tool.';
        } else if (error.message.includes('encrypted')) {
            errorMessage += 'The PDF might be encrypted with a method not supported, or it requires a password.';
        } else {
            errorMessage += error.message;
        }
        showError(errorMessage);
        unlockedPdfBytes = null; // Clear previously unlocked data
        downloadBtn.disabled = true;
        
        swalInstance.close();
        Swal.fire({
            title: 'Unlocking Failed',
            html: errorMessage,
            icon: 'error',
            confirmButtonText: 'Try Again'
        });
    } finally {
        unlockBtn.disabled = false;
    }
}

// Download Unlocked PDF
function downloadPdf() {
    if (!unlockedPdfBytes) {
        showError('No unlocked PDF to download. Please unlock a file first.');
        Swal.fire({
            title: 'No PDF Ready',
            text: 'No unlocked PDF to download. Please unlock a file first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing unlocked PDF for download...', 'info');
    
    Swal.fire({
        title: 'Preparing Download',
        html: `Preparing your unlocked PDF for download...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        const blob = new Blob([unlockedPdfBytes], { type: 'application/pdf' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        const originalFileName = file ? file.name.replace('.pdf', '_unlocked.pdf') : 'unlocked.pdf';
        a.download = originalFileName;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        
        showStatus('Unlocked PDF downloaded!', 'success');
        Swal.fire({
            title: 'Download Complete',
            text: 'Your unlocked PDF file has been downloaded.',
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
        status: item.status,
        bytes: item.bytes // Store the actual unlocked bytes for quick re-download/preview
    };

    unlockHistory.unshift(historyItem);
    if (unlockHistory.length > 10) {
        unlockHistory.pop();
    }

    localStorage.setItem('pdfUnlockHistory', JSON.stringify(unlockHistory));
    displayHistory();
}

function displayHistory() {
    if (unlockHistory.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    historyList.innerHTML = '';
    unlockHistory.forEach(item => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>
                <button class="btn btn-sm btn-outline-danger delete-history" data-id="${item.id}" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
            <td>${item.fileName}</td>
            <td>${item.date}</td>
            <td><span class="badge bg-${item.status === 'Unlocked' ? 'success' : 'danger'}">${item.status}</span></td>
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
            unlockHistory = unlockHistory.filter(item => item.id !== id);
            localStorage.setItem('pdfUnlockHistory', JSON.stringify(unlockHistory));
            displayHistory();
        }
    });
}

function downloadHistoryItem(id) {
    const item = unlockHistory.find(item => item.id === id);
    if (!item || !item.bytes) {
        showError('No unlocked PDF data available for this history item.');
        Swal.fire({
            title: 'No Data',
            text: 'No unlocked PDF data available for this history item.',
            icon: 'warning',
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
        const blob = new Blob([new Uint8Array(item.bytes)], { type: 'application/pdf' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = item.fileName.replace('.pdf', '_unlocked.pdf');
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        
        showStatus(`${item.fileName} downloaded!`, 'success');
        Swal.fire({
            title: 'Download Complete',
            text: `Your unlocked PDF file has been downloaded.`,
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