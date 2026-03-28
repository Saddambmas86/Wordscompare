<?php
// SEO and Page Metadata
$page_title = "Merge PDF Online Free - Combine PDF Files into One"; // You may Change the Title here
$page_description = "Merge PDF files online for free. Combine multiple PDF documents into one file instantly. Reorder pages, merge unlimited files — fast, secure, no sign-up."; // Put your Description here
$page_keywords = "merge pdf, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
                    <h1 class="h2">PDF Merger <i class="fas fa-file-invoice text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Effortlessly combine multiple PDF documents into one single file.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop PDF Files Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="pdfUpload" accept=".pdf" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('pdfUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select PDF Files
                    </button>
                    <div id="fileInfo" class="mt-3 small text-muted">No files selected.</div>
                </div>

                <div class="preview-area card mb-4" id="pdfListContainer" style="display:none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>Selected PDFs (Drag to reorder)</h5>
                    </div>
                    <ul class="list-group list-group-flush" id="pdfList">
                        </ul>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="mergeBtn" disabled>
                        <i class="fas fa-compress-arrows-alt me-2"></i> Merge PDFs
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                    <button class="btn btn-success btn-md px-2" id="downloadBtn" disabled>
                        <i class="fas fa-download me-2"></i> Download Merged PDF
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="history-area card mt-4" id="historyContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Merge History (Last 10 Files)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="historyTable">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th>File Name</th>
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

<!-- Content -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 border shadow-sm">
            <article>
                <header class="mb-5 text-center">
                    <h2 class="display-5"><?php echo $page_title; ?></h2>
                    <p class="lead"><?php echo $page_description; ?></p>
                </header>
                <?php include '../../views/content/merge-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
<script src="https://unpkg.com/sortablejs@1.14.0/Sortable.min.js"></script>
<script>
// JavaScript for PDF Merger
const { PDFDocument } = PDFLib;

let pdfFiles = []; // Stores file objects
let mergeHistory = JSON.parse(localStorage.getItem('pdfMergeHistory')) || [];

// Initialize elements
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const mergeBtn = document.getElementById('mergeBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');
const pdfListContainer = document.getElementById('pdfListContainer');
const pdfList = document.getElementById('pdfList');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
mergeBtn.addEventListener('click', mergePdfs);
downloadBtn.addEventListener('click', downloadMergedPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize Sortable.js for reordering
let sortable = new Sortable(pdfList, {
    animation: 150,
    ghostClass: 'bg-danger-subtle',
    onEnd: function (evt) {
        // Update pdfFiles array to reflect new order
        const [removed] = pdfFiles.splice(evt.oldIndex, 1);
        pdfFiles.splice(evt.newIndex, 0, removed);
        updateFileInfo();
    }
});


// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PDF Merger',
        html: `Follow these steps to combine your PDFs:<br><br>
        <ol class="text-start">
            <li>Upload multiple PDFs by clicking "Select PDF Files" or dragging them into the drop zone.</li>
            <li>(Optional) Reorder the PDFs in the list by dragging them to set the merge sequence.</li>
            <li>Click "Merge PDFs" to combine them into one file.</li>
            <li>Download your newly created merged PDF.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    pdfFiles = [];
    pdfUpload.value = '';
    fileInfo.textContent = 'No files selected.';
    pdfList.innerHTML = '';
    pdfListContainer.style.display = 'none';
    statusArea.textContent = '';
    mergeBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset Sortable if needed, though it usually handles empty lists fine
    if (sortable) {
        sortable.destroy();
    }
    sortable = new Sortable(pdfList, { // Re-initialize
        animation: 150,
        ghostClass: 'bg-danger-subtle',
        onEnd: function (evt) {
            const [removed] = pdfFiles.splice(evt.oldIndex, 1);
            pdfFiles.splice(evt.newIndex, 0, removed);
            updateFileInfo();
        }
    });
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
    addFiles(event.dataTransfer.files);
}

// File Selection Handler
function handleFileSelect(event) {
    addFiles(event.target.files);
}

function addFiles(selectedFiles) {
    if (selectedFiles.length === 0) return;

    let validFilesAdded = false;
    Array.from(selectedFiles).forEach(file => {
        if (file.type === 'application/pdf' || file.name.endsWith('.pdf')) {
            if (!pdfFiles.some(f => f.name === file.name && f.size === file.size)) { // Prevent duplicates
                pdfFiles.push(file);
                validFilesAdded = true;
            }
        } else {
            showError(`Skipped non-PDF file: ${file.name}`);
        }
    });

    if (validFilesAdded) {
        updatePdfList();
        updateFileInfo();
        mergeBtn.disabled = pdfFiles.length < 2; // Enable only if 2 or more files
        downloadBtn.disabled = true; // Disable download until merged
        showStatus('PDFs ready for merging. Drag to reorder.', 'info');
        Swal.fire({
            title: 'Files Added',
            text: `${validFilesAdded ? 'Some' : 'No'} new PDF files added.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    } else if (pdfFiles.length === 0) {
        showError('Please upload valid PDF files.');
    }
}

function updatePdfList() {
    pdfList.innerHTML = '';
    if (pdfFiles.length > 0) {
        pdfListContainer.style.display = 'block';
        pdfFiles.forEach((file, index) => {
            const listItem = document.createElement('li');
            listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
            listItem.innerHTML = `
                <i class="fas fa-file-pdf text-danger me-2"></i>
                <span class="flex-grow-1">${file.name}</span>
                <button class="btn btn-sm btn-outline-danger remove-file-btn" data-index="${index}" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            `;
            pdfList.appendChild(listItem);
        });

        document.querySelectorAll('.remove-file-btn').forEach(button => {
            button.addEventListener('click', (event) => {
                const indexToRemove = parseInt(event.currentTarget.getAttribute('data-index'));
                removeFile(indexToRemove);
            });
        });
    } else {
        pdfListContainer.style.display = 'none';
    }
}

function removeFile(indexToRemove) {
    pdfFiles.splice(indexToRemove, 1);
    updatePdfList();
    updateFileInfo();
    mergeBtn.disabled = pdfFiles.length < 2;
    downloadBtn.disabled = true; // Reset download state
    showStatus('File removed. Update PDF list.', 'info');
}

function updateFileInfo() {
    if (pdfFiles.length > 0) {
        fileInfo.textContent = `${pdfFiles.length} file(s) selected.`;
    } else {
        fileInfo.textContent = 'No files selected.';
    }
}


// Merge PDFs
async function mergePdfs() {
    if (pdfFiles.length < 2) {
        showError('Please select at least two PDF files to merge.');
        Swal.fire({
            title: 'Not Enough Files',
            text: 'Please select at least two PDF files to merge.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Merging PDFs...', 'info');
    mergeBtn.disabled = true;
    downloadBtn.disabled = true;

    // Show loading alert
    const swalInstance = Swal.fire({
        title: 'Merging Documents',
        html: 'Please wait while we combine your PDF files...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const mergedPdf = await PDFDocument.create();

        for (const file of pdfFiles) {
            const arrayBuffer = await file.arrayBuffer();
            const pdf = await PDFDocument.load(arrayBuffer);
            const copiedPages = await mergedPdf.copyPages(pdf, pdf.getPageIndices());
            copiedPages.forEach((page) => mergedPdf.addPage(page));
        }

        const mergedPdfBytes = await mergedPdf.save();
        
        // Store merged PDF bytes in a global variable for download
        // NOTE: For very large PDFs, storing in memory might be an issue.
        // For this client-side tool, it's acceptable.
        window.mergedPdfBlob = new Blob([mergedPdfBytes], { type: 'application/pdf' });

        const outputFileName = `Merged_PDF_${Date.now()}.pdf`;

        // Add to history
        addToHistory({
            fileName: outputFileName,
            date: new Date().toLocaleString(),
            // No 'data' for history, as we regenerate on download/preview from actual files if needed,
            // or rely on `window.mergedPdfBlob` for current session.
            // For robust history, one might save the *list of original files* or their hashes/IDs.
            // For this simpler version, history will just record filename and allow download.
        });

        showStatus('PDFs merged successfully! Click Download.', 'success');
        mergeBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Merge Complete!',
            text: 'Your PDF files have been combined successfully.',
            icon: 'success',
            confirmButtonText: 'Awesome!',
            timer: 1000,
            timerProgressBar: true
        });

    } catch (error) {
        showError(`Error merging PDFs: ${error.message}`);
        mergeBtn.disabled = false;
        downloadBtn.disabled = true;
        
        swalInstance.close();
        Swal.fire({
            title: 'Merge Error',
            text: `Failed to merge PDFs: ${error.message}. Please try again.`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// Download Merged PDF
function downloadMergedPdf() {
    if (!window.mergedPdfBlob) {
        showError('No merged PDF to download. Please merge files first.');
        Swal.fire({
            title: 'No Merged PDF',
            text: 'No merged PDF to download. Please merge files first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing merged PDF for download...', 'info');
    
    // Show loading alert
    Swal.fire({
        title: 'Preparing Download',
        html: `Your merged PDF file is being prepared...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        const url = URL.createObjectURL(window.mergedPdfBlob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `Merged_PDF_${Date.now()}.pdf`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        
        showStatus('Merged PDF downloaded!', 'success');
        Swal.fire({
            title: 'Download Complete',
            text: 'Your merged PDF file has been downloaded.',
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
        // We do not store the actual blob in localStorage due to size limits.
        // For history download, the user would need to re-merge or confirm they have the file locally.
        // For this tool, we simply record the event.
    };

    mergeHistory.unshift(historyItem);
    if (mergeHistory.length > 10) {
        mergeHistory.pop();
    }

    localStorage.setItem('pdfMergeHistory', JSON.stringify(mergeHistory));
    displayHistory();
}

function displayHistory() {
    if (mergeHistory.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    historyList.innerHTML = '';
    mergeHistory.forEach(item => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>
                <button class="btn btn-sm btn-outline-danger delete-history" data-id="${item.id}" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
            <td>${item.fileName}</td>
            <td>${item.date}</td>
            <td class="text-end">
                <button class="btn btn-sm btn-outline-primary download-history" data-id="${item.id}" title="Download (Requires current session merged PDF)">
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

    // Note: The download history button for merged PDFs assumes the merged PDF blob is still in `window.mergedPdfBlob`.
    // A robust solution for history would involve server-side storage or re-merging original files.
    // For a simple client-side tool, this is a limitation.
    document.querySelectorAll('.download-history').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            // In a real application, you might use the `id` to retrieve the merged file
            // from a server or trigger a re-merge based on stored original file info.
            // Here, we'll just trigger the main download function if a merged PDF exists in the current session.
            downloadMergedPdf(); // This will download the *currently merged* PDF if available.
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
            mergeHistory = mergeHistory.filter(item => item.id !== id);
            localStorage.setItem('pdfMergeHistory', JSON.stringify(mergeHistory));
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
</script>

<?php include '../../includes/footer.php'; ?>