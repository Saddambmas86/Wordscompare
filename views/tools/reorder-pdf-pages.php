<?php
// SEO and Page Metadata
$page_title = "Reorder PDF Pages"; // You may Change the Title here
$page_description = "Reorder PDF Pages online."; // Put your Description here
$page_keywords = "reorder PDF pages, rearrange PDF, change PDF page order, PDF organizer, free PDF tool, online PDF editor";

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
                    <h1 class="h2">PDF Page Reorderer <i class="fas fa-arrows-alt fa-rotate-90 text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Effortlessly rearrange pages in your PDF document with a simple drag-and-drop interface.</p>
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

                <div class="options-card card mb-4" id="reorderOptions" style="display:none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-sort me-2"></i>Reorder Pages</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Drag and drop the page thumbnails below to change their order.</p>
                        <div id="pageThumbnails" class="d-flex flex-wrap justify-content-center border p-3 rounded-3 bg-white" style="min-height: 100px;">
                            </div>
                        <div class="mt-3">
                            <label for="pageOrderInput" class="form-label">Or enter new page order (e.g., 3,1,2,4)</label>
                            <input type="text" id="pageOrderInput" class="form-control" placeholder="e.g., 3,1,2,4">
                            <small class="form-text text-muted">Enter page numbers separated by commas for the new sequence.</small>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="reorderBtn" disabled>
                        <i class="fas fa-sort me-2"></i> Reorder PDF
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
                <?php include '../../views/content/reorder-pdf-pages-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<style>
    .page-thumbnail {
        border: 1px solid #ddd;
        padding: 5px;
        margin: 5px;
        cursor: grab;
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #f9f9f9;
        transition: border-color 0.2s ease-in-out;
        user-select: none; /* Prevent text selection during drag */
    }
    .page-thumbnail:hover {
        border-color: #dc3545; /* Bootstrap danger color */
    }
    .page-thumbnail.dragging {
        opacity: 0.5;
        border: 2px dashed #dc3545;
    }
    .page-thumbnail canvas {
        box-shadow: 0 0 5px rgba(0,0,0,0.2);
    }
    .page-number {
        margin-top: 5px;
        font-weight: bold;
        color: #666;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
<script>
    // Set up PDF.js worker source
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.worker.min.js';

    let uploadedFile = null;
    let pdfDoc = null; // Stored PDFDocument object from pdf-lib
    let originalPdfBytes = null; // Store original PDF bytes for re-creation
    let currentPageOrder = []; // Array of page indices in their current display order
    let conversionHistory = JSON.parse(localStorage.getItem('pdfReorderHistory')) || [];

    // Initialize elements
    const pdfUpload = document.getElementById('pdfUpload');
    const uploadArea = document.getElementById('uploadArea');
    const fileInfo = document.getElementById('fileInfo');
    const reorderOptions = document.getElementById('reorderOptions');
    const pageThumbnailsContainer = document.getElementById('pageThumbnails');
    const pageOrderInput = document.getElementById('pageOrderInput');
    const reorderBtn = document.getElementById('reorderBtn');
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
    reorderBtn.addEventListener('click', reorderPdfPages);
    downloadBtn.addEventListener('click', downloadPdf);
    howToBtn.addEventListener('click', showHowTo);
    resetBtn.addEventListener('click', resetAll);
    pageOrderInput.addEventListener('input', updateThumbnailOrderFromInput);

    // Drag and Drop for thumbnails (Sortable-like logic)
    let draggedThumbnail = null;

    pageThumbnailsContainer.addEventListener('dragstart', (e) => {
        if (e.target.classList.contains('page-thumbnail')) {
            draggedThumbnail = e.target;
            e.dataTransfer.effectAllowed = 'move';
            e.target.classList.add('dragging');
        }
    });

    pageThumbnailsContainer.addEventListener('dragover', (e) => {
        e.preventDefault(); // Allows drop
        const target = e.target.closest('.page-thumbnail');
        if (draggedThumbnail && target && target !== draggedThumbnail) {
            const boundingBox = target.getBoundingClientRect();
            const offset = boundingBox.right - e.clientX; // Distance from right edge of target
            if (offset > boundingBox.width / 2) {
                // Dragging to the left half of the target, insert before
                pageThumbnailsContainer.insertBefore(draggedThumbnail, target);
            } else {
                // Dragging to the right half of the target, insert after
                pageThumbnailsContainer.insertBefore(draggedThumbnail, target.nextSibling);
            }
        }
    });

    pageThumbnailsContainer.addEventListener('dragend', (e) => {
        if (draggedThumbnail) {
            draggedThumbnail.classList.remove('dragging');
            draggedThumbnail = null;
            updatePageOrderArrayFromThumbnails();
        }
    });

    // Initialize history display
    displayHistory();

    // How To Button
    function showHowTo() {
        Swal.fire({
            title: 'Welcome to PDF Page Reorderer',
            html: `Follow these steps to rearrange your PDF pages:<br><br>
            <ol class="text-start">
                <li>Upload your PDF file by clicking "Select PDF File" or dragging it into the drop zone.</li>
                <li>Once uploaded, page thumbnails will appear. Drag and drop them to reorder, or type the new page sequence in the input box (e.g., 3,1,2,4).</li>
                <li>Click "Reorder PDF" to generate the new PDF.</li>
                <li>Download your reordered PDF.</li>
            </ol>`,
            icon: 'info',
            confirmButtonText: 'Got it!',
            confirmButtonColor: '#0d6efd'
        });
    }

    // Reset Button
    function resetAll() {
        uploadedFile = null;
        pdfDoc = null;
        originalPdfBytes = null;
        currentPageOrder = [];
        pdfUpload.value = '';
        fileInfo.textContent = 'No file selected.';
        reorderOptions.style.display = 'none';
        pageThumbnailsContainer.innerHTML = '';
        pageOrderInput.value = '';
        statusArea.textContent = '';
        reorderBtn.disabled = true;
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

    async function handleFiles(selectedFiles) {
        if (selectedFiles.length === 0) return;

        const file = selectedFiles[0]; // We only process one PDF at a time for reordering
        if (file.type !== 'application/pdf') {
            showError('Please upload only PDF files.');
            return;
        }
        if (file.size > 100 * 1024 * 1024) { // Max 100MB for PDF reordering
            showError('File must be less than 100MB.');
            return;
        }

        uploadedFile = file;
        fileInfo.textContent = `${uploadedFile.name} selected.`;
        showStatus('Loading PDF...', 'info');
        reorderBtn.disabled = true;
        downloadBtn.disabled = true;

        const swalInstance = Swal.fire({
            title: 'Loading PDF',
            html: 'Please wait while we prepare your PDF for reordering...',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        try {
            originalPdfBytes = await readFileAsArrayBuffer(uploadedFile);
            pdfDoc = await PDFLib.PDFDocument.load(originalPdfBytes, { ignoreEncryption: true });
            
            // Check for encryption and handle if necessary
            // In a real app, you'd prompt for password here if (pdfDoc.is };
            if (pdfDoc.is ) {
                 // You'd need to implement password handling here
                 showError('Encrypted PDFs are not supported without a password input. Please upload an unlocked PDF.');
                 resetAll();
                 swalInstance.close();
                 return;
            }

            const numPages = pdfDoc.getPageCount();
            currentPageOrder = Array.from({ length: numPages }, (_, i) => i); // [0, 1, 2, ...]

            await renderThumbnails(uploadedFile, numPages);
            reorderOptions.style.display = 'block';
            reorderBtn.disabled = false;
            showStatus('PDF loaded. Reorder pages by dragging thumbnails or typing sequence.', 'success');
            
            swalInstance.close();
            Swal.fire({
                title: 'PDF Loaded',
                text: `${uploadedFile.name} is ready for reordering.`,
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 1500,
                timerProgressBar: true
            });

        } catch (error) {
            console.error('Error loading PDF:', error);
            showError(`Failed to load PDF: ${error.message}. Make sure it's a valid, unencrypted PDF.`);
            resetAll();
            swalInstance.close();
            Swal.fire({
                title: 'PDF Load Error',
                text: `Failed to load PDF: ${error.message}. Make sure it's a valid, unencrypted PDF.`,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    }

    function readFileAsArrayBuffer(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = () => resolve(reader.result);
            reader.onerror = reject;
            reader.readAsArrayBuffer(file);
        });
    }

    async function renderThumbnails(file, numPages) {
        pageThumbnailsContainer.innerHTML = '';
        const pdf = await pdfjsLib.getDocument(await readFileAsArrayBuffer(file)).promise;

        for (let i = 0; i < numPages; i++) {
            const pageNum = i + 1;
            const page = await pdf.getPage(pageNum);
            const viewport = page.getViewport({ scale: 0.2 }); // Smaller scale for thumbnails
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            const renderContext = {
                canvasContext: context,
                viewport: viewport
            };
            await page.render(renderContext).promise;

            const thumbnailDiv = document.createElement('div');
            thumbnailDiv.classList.add('page-thumbnail');
            thumbnailDiv.setAttribute('draggable', 'true');
            thumbnailDiv.dataset.originalIndex = i; // Store original 0-based index

            const pageNumberSpan = document.createElement('span');
            pageNumberSpan.classList.add('page-number');
            pageNumberSpan.textContent = `Page ${pageNum}`;

            thumbnailDiv.appendChild(canvas);
            thumbnailDiv.appendChild(pageNumberSpan);
            pageThumbnailsContainer.appendChild(thumbnailDiv);
        }
        updatePageOrderInput(); // Initialize input field
    }

    function updatePageOrderArrayFromThumbnails() {
        currentPageOrder = Array.from(pageThumbnailsContainer.children).map(thumbnailDiv => 
            parseInt(thumbnailDiv.dataset.originalIndex)
        );
        updatePageOrderInput();
    }

    function updatePageOrderInput() {
        // Convert 0-based indices to 1-based page numbers for display
        pageOrderInput.value = currentPageOrder.map(index => index + 1).join(',');
    }

    function updateThumbnailOrderFromInput() {
        const inputVal = pageOrderInput.value.trim();
        const newOrder1Based = inputVal.split(',').map(s => parseInt(s.trim())).filter(n => !isNaN(n) && n > 0 && n <= pdfDoc.getPageCount());
        
        if (newOrder1Based.length !== pdfDoc.getPageCount() || new Set(newOrder1Based).size !== pdfDoc.getPageCount()) {
            // Invalid input (missing pages, duplicates, out of range)
            // Do not update thumbnails, just show warning if necessary
            return;
        }

        const newOrder0Based = newOrder1Based.map(n => n - 1); // Convert back to 0-based indices

        // Reorder the DOM elements
        const currentThumbnails = Array.from(pageThumbnailsContainer.children);
        const reorderedThumbnails = newOrder0Based.map(originalIndex => 
            currentThumbnails.find(thumb => parseInt(thumb.dataset.originalIndex) === originalIndex)
        );

        pageThumbnailsContainer.innerHTML = ''; // Clear current
        reorderedThumbnails.forEach(thumb => pageThumbnailsContainer.appendChild(thumb));

        currentPageOrder = newOrder0Based; // Update internal array
    }

    async function reorderPdfPages() {
        if (!pdfDoc || !originalPdfBytes || currentPageOrder.length === 0) {
            showError('No PDF loaded or pages to reorder.');
            Swal.fire({
                title: 'Error',
                text: 'No PDF loaded or pages to reorder.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        showStatus('Reordering PDF pages...', 'info');
        reorderBtn.disabled = true;
        downloadBtn.disabled = true;

        const swalInstance = Swal.fire({
            title: 'Reordering PDF',
            html: 'Please wait while we rearrange your document...',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        try {
            const newPdfDoc = await PDFLib.PDFDocument.create();
            const copiedPages = await newPdfDoc.copyPages(pdfDoc, currentPageOrder);
            copiedPages.forEach(page => newPdfDoc.addPage(page));

            const reorderedPdfBytes = await newPdfDoc.save();

            // Store the reordered PDF bytes (as base64 for simplicity in history)
            const fileName = uploadedFile.name.replace('.pdf', '_reordered.pdf');
            
            // Fix for Maximum call stack size exceeded on large PDFs
            let binary = '';
            const bytes = new Uint8Array(reorderedPdfBytes);
            const len = bytes.byteLength;
            for (let i = 0; i < len; i++) {
                binary += String.fromCharCode(bytes[i]);
            }
            const base64Pdf = btoa(binary);

            addToHistory({
                fileName: fileName,
                date: new Date().toLocaleString(),
                status: 'Completed',
                pdfData: base64Pdf // Store the base64 string of the PDF
            });

            showStatus('PDF pages reordered! Click Download.', 'success');
            reorderBtn.disabled = false;
            downloadBtn.disabled = false;
            
            swalInstance.close();
            Swal.fire({
                title: 'Reorder Complete!',
                text: 'Your PDF pages have been successfully rearranged.',
                icon: 'success',
                confirmButtonText: 'Great!',
                timer: 1500,
                timerProgressBar: true
            });

        } catch (error) {
            console.error('Error reordering PDF:', error);
            showError(`Failed to reorder PDF: ${error.message}`);
            reorderBtn.disabled = false;
            downloadBtn.disabled = true;
            
            swalInstance.close();
            Swal.fire({
                title: 'Reorder Error',
                text: `Failed to reorder PDF: ${error.message}`,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    }

    function downloadPdf() {
        const lastHistoryItem = conversionHistory[0]; // Get the most recently converted PDF
        if (!lastHistoryItem || !lastHistoryItem.pdfData) {
            showError('No PDF available for download. Please reorder a file first.');
            Swal.fire({
                title: 'No PDF',
                text: 'No PDF available for download. Please reorder a file first.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            return;
        }

        showStatus('Preparing PDF for download...', 'info');

        const swalInstance = Swal.fire({
            title: 'Preparing Download',
            html: `Preparing ${lastHistoryItem.fileName} for download...`,
            timer: 1500,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        setTimeout(() => {
            try {
                const pdfBytes = Uint8Array.from(atob(lastHistoryItem.pdfData), c => c.charCodeAt(0));
                const blob = new Blob([pdfBytes], { type: 'application/pdf' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = lastHistoryItem.fileName;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);

                showStatus('PDF file downloaded!', 'success');
                swalInstance.close();
                Swal.fire({
                    title: 'Download Complete',
                    text: `Your PDF file has been downloaded.`,
                    icon: 'success',
                    confirmButtonText: 'OK',
                    timer: 1000,
                    timerProgressBar: true
                });
            } catch (error) {
                console.error('Error downloading PDF from history:', error);
                showError('Failed to download PDF from history.');
                swalInstance.close();
                Swal.fire({
                    title: 'Download Error',
                    text: 'Failed to download PDF from history.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        }, 1500);
    }

    // History Functions
    function addToHistory(item) {
        const historyItem = {
            id: Date.now(),
            fileName: item.fileName,
            date: item.date,
            status: item.status,
            pdfData: item.pdfData // Base64 encoded PDF
        };

        conversionHistory.unshift(historyItem);
        if (conversionHistory.length > 10) {
            conversionHistory.pop();
        }

        localStorage.setItem('pdfReorderHistory', JSON.stringify(conversionHistory));
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
                <td><span class="badge bg-success">${item.status}</span></td>
                <td class="text-end">
                    <button class="btn btn-sm btn-outline-primary download-history" data-id="${item.id}" title="Download">
                        <i class="fas fa-download"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-secondary preview-history ms-1" data-id="${item.id}" title="Preview">
                        <i class="fas fa-eye"></i>
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
                conversionHistory = conversionHistory.filter(item => item.id !== id);
                localStorage.setItem('pdfReorderHistory', JSON.stringify(conversionHistory));
                displayHistory();
            }
        });
    }

    function downloadHistoryItemFromHistory(id) {
        const item = conversionHistory.find(item => item.id === id);
        if (!item || !item.pdfData) {
            showError('PDF data not available for download from history.');
            Swal.fire({
                title: 'Error',
                text: 'PDF data not available for download from history.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        showStatus(`Downloading ${item.fileName}...`, 'info');
        
        const swalInstance = Swal.fire({
            title: 'Preparing Download',
            html: `Preparing ${item.fileName} for download...`,
            timer: 1500,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        setTimeout(() => {
            try {
                const pdfBytes = Uint8Array.from(atob(item.pdfData), c => c.charCodeAt(0));
                const blob = new Blob([pdfBytes], { type: 'application/pdf' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = item.fileName;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
                
                showStatus(`${item.fileName} downloaded!`, 'success');
                swalInstance.close();
                Swal.fire({
                    title: 'Download Complete',
                    text: `Your PDF file has been downloaded.`,
                    icon: 'success',
                    confirmButtonText: 'OK',
                    timer: 1000,
                    timerProgressBar: true
                });
            } catch (error) {
                console.error('Error downloading historical PDF:', error);
                showError('Failed to download historical PDF.');
                swalInstance.close();
                Swal.fire({
                    title: 'Download Error',
                    text: 'Failed to download historical PDF.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        }, 1500);
    }

    async function previewHistoryItem(id) {
        const item = conversionHistory.find(item => item.id === id);
        if (!item || !item.pdfData) {
            showError('PDF data not available for preview from history.');
            Swal.fire({
                title: 'Error',
                text: 'PDF data not available for preview from history.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        showStatus(`Previewing ${item.fileName}...`, 'info');

        const swalInstance = Swal.fire({
            title: 'Generating Preview',
            html: `Please wait while we prepare a preview of ${item.fileName}...`,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        try {
            const pdfBytes = Uint8Array.from(atob(item.pdfData), c => c.charCodeAt(0));
            const blob = new Blob([pdfBytes], { type: 'application/pdf' });
            const url = URL.createObjectURL(blob);

            // Open in a new tab for preview
            window.open(url, '_blank');
            URL.revokeObjectURL(url); // Clean up the URL object

            showStatus('Preview opened in a new tab.', 'success');
            swalInstance.close();
            Swal.fire({
                title: 'Preview Ready',
                text: 'The PDF preview has been opened in a new tab.',
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 1000,
                timerProgressBar: true
            });
        } catch (error) {
            console.error('Error previewing historical PDF:', error);
            showError('Failed to preview historical PDF.');
            swalInstance.close();
            Swal.fire({
                title: 'Preview Error',
                text: 'Failed to preview historical PDF.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
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