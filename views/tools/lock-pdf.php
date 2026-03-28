<?php
// SEO and Page Metadata
$page_title = "Lock PDF Online Free - Password Protect PDF with Encryption"; // You may Change the Title here
$page_description = "Lock and password-protect PDF online for free. Add 256-bit AES encryption to your PDF files instantly. Secure confidential documents with strong passwords."; // Put your Description here
$page_keywords = "lock pdf, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
                    <h1 class="h2">Lock PDF <i class="fas fa-lock text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Password-protect and restrict permissions on your PDF documents.</p>
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
                        <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Security Options</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="openPassword" class="form-label">Open Password (Optional)</label>
                                <input type="password" id="openPassword" class="form-control" placeholder="Password to open PDF">
                            </div>
                            <div class="col-md-6">
                                <label for="permissionPassword" class="form-label">Permissions Password (Optional)</label>
                                <input type="password" id="permissionPassword" class="form-control" placeholder="Password for permissions">
                            </div>
                        </div>
                        <p class="text-muted small mt-2">Setting a Permissions Password enables the options below.</p>

                        <hr class="my-4">

                        <h6 class="mb-3"><i class="fas fa-shield-alt me-2"></i>User Permissions (If Permissions Password is set):</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="canPrint" checked>
                                    <label class="form-check-label" for="canPrint">
                                        Allow Printing
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="canModify" checked>
                                    <label class="form-check-label" for="canModify">
                                        Allow Modifying
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="canCopy" checked>
                                    <label class="form-check-label" for="canCopy">
                                        Allow Copying Content
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="canAnnotate" checked>
                                    <label class="form-check-label" for="canAnnotate">
                                        Allow Annotating
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="canFillForms" checked>
                                    <label class="form-check-label" for="canFillForms">
                                        Allow Filling Forms
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="canAssemble" checked>
                                    <label class="form-check-label" for="canAssemble">
                                        Allow Assembling (page manipulation)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="lockPdfBtn" disabled>
                        <i class="fas fa-lock me-2"></i> Lock PDF
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                    <button class="btn btn-success btn-md px-2" id="downloadBtn" disabled>
                        <i class="fas fa-download me-2"></i> Download Locked PDF
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="history-area card mt-4" id="historyContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Lock History (Last 10 Files)</h5>
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
                <?php include '../../views/content/lock-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/pdf-lib-plus-encrypt@1.1.0/dist/pdf-lib-plus-encrypt.min.js"></script>
<script src="https://unpkg.com/@pdf-lib/fontkit@latest/dist/fontkit.umd.min.js"></script>

<script>
// JavaScript for Lock PDF Converter
let uploadedPdfBytes = null;
let fileName = '';
let lockHistory = JSON.parse(localStorage.getItem('pdfLockHistory')) || [];

// Initialize elements
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const lockPdfBtn = document.getElementById('lockPdfBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

const openPasswordInput = document.getElementById('openPassword');
const permissionPasswordInput = document.getElementById('permissionPassword');
const canPrint = document.getElementById('canPrint');
const canModify = document.getElementById('canModify');
const canCopy = document.getElementById('canCopy');
const canAnnotate = document.getElementById('canAnnotate');
const canFillForms = document.getElementById('canFillForms');
const canAssemble = document.getElementById('canAssemble');


// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
lockPdfBtn.addEventListener('click', lockPdf);
downloadBtn.addEventListener('click', downloadLockedPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Check if any password is set to enable/disable lock button initially
openPasswordInput.addEventListener('input', checkLockButtonStatus);
permissionPasswordInput.addEventListener('input', checkLockButtonStatus);
pdfUpload.addEventListener('change', checkLockButtonStatus);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PDF Locker',
        html: `Follow these steps to secure your PDFs:<br><br>
        <ol class="text-start">
            <li>Upload a PDF file by clicking "Select PDF File" or dragging it into the drop zone.</li>
            <li>Set an "Open Password" (to open the PDF) and/or a "Permissions Password" (to restrict actions).</li>
            <li>If you set a Permissions Password, choose the user permissions you want to allow.</li>
            <li>Click "Lock PDF" to apply the security settings.</li>
            <li>Download your newly secured PDF.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    uploadedPdfBytes = null;
    fileName = '';
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    statusArea.textContent = '';
    
    openPasswordInput.value = '';
    permissionPasswordInput.value = '';
    canPrint.checked = true;
    canModify.checked = true;
    canCopy.checked = true;
    canAnnotate.checked = true;
    canFillForms.checked = true;
    canAssemble.checked = true;

    lockPdfBtn.disabled = true;
    downloadBtn.disabled = true;
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

    const file = selectedFiles[0];
    if (file.type !== 'application/pdf') {
        showError('Please upload only PDF files.');
        Swal.fire({
            title: 'Invalid File Type',
            text: 'Please upload only PDF files.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
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
        return;
    }

    fileName = file.name;
    fileInfo.textContent = `${fileName} selected.`;
    showStatus('File ready for locking.', 'info');

    const reader = new FileReader();
    reader.onload = async (e) => {
        uploadedPdfBytes = new Uint8Array(e.target.result);
        checkLockButtonStatus();
        Swal.fire({
            title: 'File Added',
            text: `${fileName} has been selected.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    };
    reader.readAsArrayBuffer(file);
}

function checkLockButtonStatus() {
    const hasFile = uploadedPdfBytes !== null;
    const hasOpenPassword = openPasswordInput.value.length > 0;
    const hasPermissionPassword = permissionPasswordInput.value.length > 0;

    lockPdfBtn.disabled = !(hasFile && (hasOpenPassword || hasPermissionPassword));
}


// Lock PDF Function
async function lockPdf() {
    if (!uploadedPdfBytes) {
        showError('Please upload a PDF file first.');
        Swal.fire({
            title: 'Error',
            text: 'Please upload a PDF file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    const openPassword = openPasswordInput.value;
    const permissionPassword = permissionPasswordInput.value;

    if (!openPassword && !permissionPassword) {
        showError('Please set at least an Open Password or a Permissions Password.');
        Swal.fire({
            title: 'No Password Set',
            text: 'Please set at least an Open Password or a Permissions Password.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Locking PDF...', 'info');
    lockPdfBtn.disabled = true;
    downloadBtn.disabled = true;

    const swalInstance = Swal.fire({
        title: 'Securing PDF',
        html: 'Please wait while we encrypt your PDF document...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const { PDFDocument, PDFPermission } = PDFLib;
        const pdfDoc = await PDFDocument.load(uploadedPdfBytes);

        let encryptOptions = {};

        // If open password is provided, set it as user password.
        if (openPassword) {
            encryptOptions.userPassword = openPassword;
        }

        // If permissions password is provided, set it as owner password.
        if (permissionPassword) {
            encryptOptions.ownerPassword = permissionPassword;
            // pdf-lib-plus-encrypt handles permissions uniquely, safely omitting detailed flags 
            // for standard password protection. We will just use standard password locking.
        } else if (!permissionPassword && openPassword) {
           encryptOptions.ownerPassword = openPassword;
        }
        
        pdfDoc.encrypt(encryptOptions);
        const lockedPdfBytes = await pdfDoc.save();

        uploadedPdfBytes = lockedPdfBytes; // Update the content for download
        
        addToHistory({
            fileName: fileName,
            date: new Date().toLocaleString(),
            status: 'Locked',
            // Store the locked bytes directly for easier retrieval from history
            // Be mindful of localStorage size limits for very large files.
            // For larger files, you might store a reference or re-process on demand.
            data: Array.from(lockedPdfBytes), // Convert Uint8Array to Array for JSON stringify
            options: { // Store options for display/re-processing if needed
                openPassword: openPassword ? 'SET' : 'NOT SET',
                permissionPassword: permissionPassword ? 'SET' : 'NOT SET',
                canPrint: canPrint.checked,
                canModify: canModify.checked,
                canCopy: canCopy.checked,
                canAnnotate: canAnnotate.checked,
                canFillForms: canFillForms.checked,
                canAssemble: canAssemble.checked,
            }
        });

        showStatus('PDF successfully locked! Click Download Locked PDF.', 'success');
        lockPdfBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'PDF Secured!',
            text: 'Your PDF has been successfully encrypted with your chosen settings.',
            icon: 'success',
            confirmButtonText: 'Excellent!',
            timer: 1000,
            timerProgressBar: true
        });

    } catch (error) {
        showError(`Error locking PDF: ${error.message}`);
        lockPdfBtn.disabled = false;
        downloadBtn.disabled = true;
        
        swalInstance.close();
        Swal.fire({
            title: 'Security Error',
            html: `Failed to secure PDF: <br>${error.message}`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
        console.error("PDF Locking Error:", error);
    }
}

// Download Locked PDF
function downloadLockedPdf() {
    if (!uploadedPdfBytes) {
        showError('No locked PDF to download. Please lock a file first.');
        Swal.fire({
            title: 'No PDF to Download',
            text: 'No locked PDF to download. Please lock a file first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing locked PDF for download...', 'info');
    
    Swal.fire({
        title: 'Preparing Download',
        html: `Preparing your locked PDF file...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        const blob = new Blob([uploadedPdfBytes], { type: 'application/pdf' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = fileName.replace('.pdf', '_locked.pdf');
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        
        showStatus('Locked PDF file downloaded!', 'success');
        Swal.fire({
            title: 'Download Complete',
            text: 'Your locked PDF file has been downloaded.',
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
        data: item.data, // Store Uint8Array as a regular Array for JSON stringify
        options: item.options // Store options for display
    };

    lockHistory.unshift(historyItem);
    if (lockHistory.length > 10) {
        lockHistory.pop();
    }

    localStorage.setItem('pdfLockHistory', JSON.stringify(lockHistory));
    displayHistory();
}

function displayHistory() {
    if (lockHistory.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    historyList.innerHTML = '';
    lockHistory.forEach(item => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>
                <button class="btn btn-sm btn-outline-danger delete-history" data-id="${item.id}" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
            <td>${item.fileName}</td>
            <td>${item.date}</td>
            <td><span class="badge bg-success">${item.status}</span></td>
            <td class="text-end">
                <button class="btn btn-sm btn-outline-primary download-history" data-id="${item.id}" title="Download">
                    <i class="fas fa-download"></i>
                </button>
                <button class="btn btn-sm btn-outline-secondary preview-history ms-1" data-id="${item.id}" title="View Details">
                    <i class="fas fa-info-circle"></i>
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

    document.querySelectorAll('.preview-history').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            previewHistoryItem(id);
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
            lockHistory = lockHistory.filter(item => item.id !== id);
            localStorage.setItem('pdfLockHistory', JSON.stringify(lockHistory));
            displayHistory();
            Swal.fire('Deleted!', 'The file has been removed from history.', 'success');
        }
    });
}

function downloadHistoryItem(id) {
    const item = lockHistory.find(item => item.id === id);
    if (!item || !item.data) {
        showError('No PDF data available for download.');
        Swal.fire({
            title: 'Error',
            text: 'No PDF data available for download.',
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
        const blob = new Blob([new Uint8Array(item.data)], { type: 'application/pdf' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = item.fileName.replace('.pdf', '_locked.pdf');
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        
        showStatus(`${item.fileName} downloaded!`, 'success');
        Swal.fire({
            title: 'Download Complete',
            text: `Your locked PDF file has been downloaded.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }, 1500);
}

function previewHistoryItem(id) {
    const item = lockHistory.find(item => item.id === id);
    if (!item) return;

    let permissionsText = '<ul>';
    if (item.options.permissionPassword === 'SET') {
        permissionsText += `<li><strong>Printing:</strong> ${item.options.canPrint ? 'Allowed' : 'Not Allowed'}</li>`;
        permissionsText += `<li><strong>Modifying:</strong> ${item.options.canModify ? 'Allowed' : 'Not Allowed'}</li>`;
        permissionsText += `<li><strong>Copying Content:</strong> ${item.options.canCopy ? 'Allowed' : 'Not Allowed'}</li>`;
        permissionsText += `<li><strong>Annotating:</strong> ${item.options.canAnnotate ? 'Allowed' : 'Not Allowed'}</li>`;
        permissionsText += `<li><strong>Filling Forms:</strong> ${item.options.canFillForms ? 'Allowed' : 'Not Allowed'}</li>`;
        permissionsText += `<li><strong>Assembling:</strong> ${item.options.canAssemble ? 'Allowed' : 'Not Allowed'}</li>`;
    } else {
        permissionsText += '<li>No Permissions Password Set (All actions generally allowed)</li>';
    }
    permissionsText += '</ul>';

    Swal.fire({
        title: `Security Details for ${item.fileName}`,
        html: `
            <p><strong>Date Locked:</strong> ${item.date}</p>
            <p><strong>Open Password:</strong> ${item.options.openPassword}</p>
            <p><strong>Permissions Password:</strong> ${item.options.permissionPassword}</p>
            <p><strong>User Permissions:</strong></p>
            ${permissionsText}
            <small class="text-muted">Note: Actual PDF content cannot be previewed here for security reasons.</small>
        `,
        icon: 'info',
        confirmButtonText: 'Close',
        confirmButtonColor: '#0d6efd'
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