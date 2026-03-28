<?php
// SEO and Page Metadata
$page_title = "PDF Metadata Editor - Edit PDF Properties Online Free"; // You may Change the Title here
$page_description = "Free PDF metadata editor online. View and edit PDF title, author, subject, keywords, and creation date. Update document properties without Adobe Acrobat."; // Put your Description here
$page_keywords = "pdf metadata editor, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
                    <h1 class="h2">PDF Metadata Editor <i class="fas fa-edit text-danger ms-2"></i></h1>
                    <p class="lead text-muted">View, edit, and update the metadata of your PDF documents securely.</p>
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

                <div class="options-card card mb-4" id="metadataEditArea" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Edit PDF Metadata</h5>
                    </div>
                    <div class="card-body">
                        <form id="metadataForm">
                            <div class="mb-3">
                                <label for="pdfTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" id="pdfTitle">
                            </div>
                            <div class="mb-3">
                                <label for="pdfAuthor" class="form-label">Author</label>
                                <input type="text" class="form-control" id="pdfAuthor">
                            </div>
                            <div class="mb-3">
                                <label for="pdfSubject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="pdfSubject">
                            </div>
                            <div class="mb-3">
                                <label for="pdfKeywords" class="form-label">Keywords (comma-separated)</label>
                                <input type="text" class="form-control" id="pdfKeywords">
                            </div>
                            <div class="mb-3">
                                <label for="pdfCreator" class="form-label">Creator</label>
                                <input type="text" class="form-control" id="pdfCreator">
                            </div>
                            <div class="mb-3">
                                <label for="pdfProducer" class="form-label">Producer</label>
                                <input type="text" class="form-control" id="pdfProducer">
                            </div>
                            <div class="mb-3">
                                <label for="pdfCreationDate" class="form-label">Creation Date</label>
                                <input type="text" class="form-control" id="pdfCreationDate" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="pdfModificationDate" class="form-label">Modification Date</label>
                                <input type="text" class="form-control" id="pdfModificationDate" disabled>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="applyBtn" disabled>
                        <i class="fas fa-check-circle me-2"></i> Apply Changes
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
                
                <div class="alert alert-info mt-4 text-center" role="alert">
                    <i class="fas fa-lock me-2"></i>
                    <strong>Privacy Guaranteed:</strong> Your files are processed entirely within your browser. No data is ever uploaded to our servers, ensuring your information remains 100% private and secure.
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
                <?php include '../../views/content/pdf-metadata-editor-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
<script>
// JavaScript for PDF Metadata Editor
const { PDFDocument, rgb, StandardFonts } = PDFLib;

let pdfDoc = null;
let originalBytes = null;
let fileName = '';

// Get elements
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const metadataEditArea = document.getElementById('metadataEditArea');
const pdfTitle = document.getElementById('pdfTitle');
const pdfAuthor = document.getElementById('pdfAuthor');
const pdfSubject = document.getElementById('pdfSubject');
const pdfKeywords = document.getElementById('pdfKeywords');
const pdfCreator = document.getElementById('pdfCreator');
const pdfProducer = document.getElementById('pdfProducer');
const pdfCreationDate = document.getElementById('pdfCreationDate');
const pdfModificationDate = document.getElementById('pdfModificationDate');
const applyBtn = document.getElementById('applyBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const downloadBtn = document.getElementById('downloadBtn');
const statusArea = document.getElementById('statusArea');

// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
applyBtn.addEventListener('click', applyMetadataChanges);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
downloadBtn.addEventListener('click', downloadPdf);

// Initialize state
resetAll();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'How to Use PDF Metadata Editor',
        html: `Follow these steps to edit your PDF's metadata:<br><br>
        <ol class="text-start">
            <li>Upload a PDF file by dragging it or clicking "Select PDF File".</li>
            <li>The current metadata will be displayed. Edit the fields you wish to change (Title, Author, Subject, Keywords, Creator, Producer). Dates are read-only.</li>
            <li>Click "Apply Changes" to embed your new metadata into the PDF.</li>
            <li>Click "Download PDF" to save the modified file to your device.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    pdfDoc = null;
    originalBytes = null;
    fileName = '';
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    metadataEditArea.style.display = 'none';
    
    // Clear form fields
    pdfTitle.value = '';
    pdfAuthor.value = '';
    pdfSubject.value = '';
    pdfKeywords.value = '';
    pdfCreator.value = '';
    pdfProducer.value = '';
    pdfCreationDate.value = '';
    pdfModificationDate.value = '';

    applyBtn.disabled = true;
    downloadBtn.disabled = true;
    showStatus('Upload a PDF file to start editing metadata.', 'info');
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

async function handleDrop(event) {
    event.preventDefault();
    event.stopPropagation();
    uploadArea.classList.remove('dragover');
    if (event.dataTransfer.files.length > 0) {
        await processFile(event.dataTransfer.files[0]);
    }
}

// File Selection Handler
async function handleFileSelect(event) {
    if (event.target.files.length > 0) {
        await processFile(event.target.files[0]);
    }
}

async function processFile(file) {
    resetAll(); // Reset previous state
    fileInfo.textContent = `${file.name} selected.`;
    fileName = file.name;

    if (file.type !== 'application/pdf') {
        showError('Please upload a PDF file.');
        Swal.fire({
            title: 'Invalid File Type',
            text: 'Please upload a PDF file (.pdf).',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (file.size > 50 * 1024 * 1024) { // Max 50MB
        showError('File size exceeds 50MB. Please upload a smaller PDF.');
        Swal.fire({
            title: 'File Too Large',
            text: 'File size exceeds 50MB. Please upload a smaller PDF.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Reading PDF file...', 'info');
    const reader = new FileReader();

    reader.onload = async (e) => {
        originalBytes = e.target.result;
        try {
            pdfDoc = await PDFDocument.load(originalBytes);
            displayMetadata();
            metadataEditArea.style.display = 'block';
            applyBtn.disabled = false;
            downloadBtn.disabled = false; // Enable download of original before changes
            showStatus('PDF loaded. Edit metadata and apply changes.', 'success');
             Swal.fire({
                title: 'PDF Loaded',
                text: `${fileName} is ready for metadata editing.`,
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 1000,
                timerProgressBar: true
            });
        } catch (error) {
            showError(`Error loading PDF: ${error.message}. It might be corrupted or encrypted.`);
            Swal.fire({
                title: 'PDF Loading Error',
                html: `Error loading PDF: ${error.message}. <br>The file might be corrupted or encrypted.`,
                icon: 'error',
                confirmButtonText: 'OK'
            });
            resetAll();
        }
    };

    reader.onerror = () => {
        showError('Failed to read file.');
        Swal.fire({
            title: 'File Read Error',
            text: 'Failed to read the PDF file.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        resetAll();
    };

    reader.readAsArrayBuffer(file);
}

// Display Metadata
async function displayMetadata() {
    if (!pdfDoc) return;

    const title = pdfDoc.getTitle();
    const author = pdfDoc.getAuthor();
    const subject = pdfDoc.getSubject();
    const keywords = pdfDoc.getKeywords();
    const creator = pdfDoc.getCreator();
    const producer = pdfDoc.getProducer();
    const creationDate = pdfDoc.getCreationDate();
    const modificationDate = pdfDoc.getModificationDate();

    pdfTitle.value = title || '';
    pdfAuthor.value = author || '';
    pdfSubject.value = subject || '';
    pdfKeywords.value = keywords ? keywords.join(', ') : ''; // Join array for keywords
    pdfCreator.value = creator || '';
    pdfProducer.value = producer || '';
    pdfCreationDate.value = creationDate ? creationDate.toLocaleString() : 'N/A';
    pdfModificationDate.value = modificationDate ? modificationDate.toLocaleString() : 'N/A';
}

// Apply Metadata Changes
async function applyMetadataChanges() {
    if (!pdfDoc) {
        showError('No PDF loaded. Please upload a file first.');
        Swal.fire({
            title: 'No PDF',
            text: 'No PDF loaded. Please upload a file first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Applying metadata changes...', 'info');
    applyBtn.disabled = true;
    downloadBtn.disabled = true;

    const swalInstance = Swal.fire({
        title: 'Applying Changes',
        html: 'Please wait while metadata is updated...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        },
        allowOutsideClick: false,
        allowEscapeKey: false
    });

    try {
        pdfDoc.setTitle(pdfTitle.value);
        pdfDoc.setAuthor(pdfAuthor.value);
        pdfDoc.setSubject(pdfSubject.value);
        // Split keywords by comma and trim whitespace
        const newKeywords = pdfKeywords.value.split(',').map(kw => kw.trim()).filter(kw => kw.length > 0);
        pdfDoc.setKeywords(newKeywords);
        pdfDoc.setCreator(pdfCreator.value);
        pdfDoc.setProducer(pdfProducer.value);
        // Set modification date to now (optional, but standard for modifications)
        pdfDoc.setModificationDate(new Date()); 
        pdfModificationDate.value = new Date().toLocaleString(); // Update display immediately

        originalBytes = await pdfDoc.save(); // Save the modified PDF back to bytes

        showStatus('Metadata updated successfully! You can now download the PDF.', 'success');
        applyBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Changes Applied!',
            text: 'PDF metadata updated successfully.',
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    } catch (error) {
        showError(`Error applying changes: ${error.message}`);
        applyBtn.disabled = false;
        downloadBtn.disabled = true;
        
        swalInstance.close();
        Swal.fire({
            title: 'Error Applying Changes',
            text: error.message,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// Download PDF
function downloadPdf() {
    if (!originalBytes) {
        showError('No PDF to download. Please upload and process a file first.');
        Swal.fire({
            title: 'No PDF',
            text: 'No PDF to download. Please upload and process a file first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing PDF for download...', 'info');

    // Show loading alert
    Swal.fire({
        title: 'Preparing Download',
        html: `Preparing ${fileName} for download...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        const blob = new Blob([originalBytes], { type: 'application/pdf' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = fileName;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        
        showStatus('PDF downloaded successfully!', 'success');
        Swal.fire({
            title: 'Download Complete',
            text: `Your modified PDF has been downloaded.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }, 1500); // Simulate some processing time for the user feedback
}

// Helper Functions for status messages
function showStatus(message, type) {
    statusArea.textContent = message;
    statusArea.className = `text-center text-${type}`;
}

function showError(message) {
    showStatus(message, 'danger');
}
</script>

<?php include '../../includes/footer.php'; ?>