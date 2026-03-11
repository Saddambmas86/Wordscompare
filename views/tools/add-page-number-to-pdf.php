<?php
// SEO and Page Metadata
$page_title = "Add Page Numbers to PDF Online Free - WordsCompare"; // You may Change the Title here
$page_description = "Add page numbers to PDF online for free. Customize position, font, size, and style. No sign-up needed — fast, secure, and works in your browser."; // Put your Description here
$page_keywords = "add page numbers to pdf, add, page, numbers, pdf, free online tools, pdf tools";

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
                    <h1 class="h2">Add Page Numbers to PDF <i class="fas fa-file-invoice text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Effortlessly add professional page numbering to your PDF documents.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-file-upload fa-3x text-muted mb-3"></i>
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
                        <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Page Numbering Options</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="position" class="form-label">Position</label>
                                <select id="position" class="form-select">
                                    <option value="bottom-right" selected>Bottom Right</option>
                                    <option value="bottom-center">Bottom Center</option>
                                    <option value="bottom-left">Bottom Left</option>
                                    <option value="top-right">Top Right</option>
                                    <option value="top-center">Top Center</option>
                                    <option value="top-left">Top Left</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="format" class="form-label">Format</label>
                                <select id="format" class="form-select">
                                    <option value="{n}" selected>1, 2, 3...</option>
                                    <option value="Page {n}">Page 1, Page 2...</option>
                                    <option value="{n} of {total}">{n} of {total}</option>
                                    <option value="Page {n} of {total}">Page 1 of 10</option>
                                    <option value="- {n} -">- 1 -</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="startPage" class="form-label">Start Page Numbering From</label>
                                <input type="number" id="startPage" class="form-control" value="1" min="1">
                                <small class="text-muted">Enter the actual page number where numbering should begin in the PDF (e.g., 5 to start numbering from page 5 of your document).</small>
                            </div>
                            <div class="col-md-6">
                                <label for="font-size" class="form-label">Font Size (pt)</label>
                                <input type="number" id="font-size" class="form-control" value="10" min="6" max="24">
                            </div>
                            <div class="col-md-6">
                                <label for="font-color" class="form-label">Font Color</label>
                                <input type="color" id="font-color" class="form-control form-control-color" value="#000000">
                            </div>
                            <div class="col-md-6">
                                <label for="margin" class="form-label">Margin from Edge (pt)</label>
                                <input type="number" id="margin" class="form-control" value="30" min="5">
                                <small class="text-muted">Distance from the selected edge of the page.</small>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="startIndexCheck" checked>
                                    <label class="form-check-label" for="startIndexCheck">
                                        Use current document's first page as "1"
                                    </label>
                                    <small class="d-block text-muted">If unchecked, numbering will start from the number entered above for "Start Page Numbering From".</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="addNumbersBtn" disabled>
                        <i class="fas fa-plus-square me-2"></i> Add Page Numbers
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
                
                <div class="preview-area card mt-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-file-pdf me-2"></i>PDF Preview (First Page)</h5>
                    </div>
                    <div class="card-body p-0 d-flex justify-content-center align-items-center" style="min-height: 200px;">
                        <canvas id="pdfPreviewCanvas" class="border rounded-3" style="max-width: 100%; height: auto;"></canvas>
                        <p id="noPreviewText" class="text-muted">Upload a PDF to see preview.</p>
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
                                        <th>Format</th>
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
                <?php include '../../views/content/add-page-number-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfjs-dist/2.16.105/build/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfjs-dist/2.16.105/build/pdf.worker.min.js"></script>
<script>
// JavaScript for Add Page Numbers to PDF Converter
let currentPdfBytes = null;
let currentFileName = '';
let conversionHistory = JSON.parse(localStorage.getItem('pdfPageNumberHistory')) || [];

// Initialize elements
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const addNumbersBtn = document.getElementById('addNumbersBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');
const pdfPreviewCanvas = document.getElementById('pdfPreviewCanvas');
const noPreviewText = document.getElementById('noPreviewText');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

// Options
const positionSelect = document.getElementById('position');
const formatSelect = document.getElementById('format');
const startPageInput = document.getElementById('startPage');
const fontSizeInput = document.getElementById('font-size');
const fontColorInput = document.getElementById('font-color');
const marginInput = document.getElementById('margin');
const startIndexCheck = document.getElementById('startIndexCheck');


// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
addNumbersBtn.addEventListener('click', addPageNumbersToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
startIndexCheck.addEventListener('change', toggleStartPageInput);

// Set worker for PDF.js
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdfjs-dist/2.16.105/build/pdf.worker.min.js';

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Add Page Numbers to PDF',
        html: `Follow these steps:<br><br>
        <ol class="text-start">
            <li>Upload your PDF file by dragging it or clicking "Select PDF File".</li>
            <li>Adjust numbering options like position, format, font size, and color.</li>
            <li>Set the "Start Page Numbering From" to control where the sequence begins in your PDF (e.g., page 5 for document page 1).</li>
            <li>Click "Add Page Numbers".</li>
            <li>Download your new PDF with page numbers.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    currentPdfBytes = null;
    currentFileName = '';
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    statusArea.textContent = '';
    addNumbersBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset options
    positionSelect.value = 'bottom-right';
    formatSelect.value = '{n}';
    startPageInput.value = '1';
    fontSizeInput.value = '10';
    fontColorInput.value = '#000000';
    marginInput.value = '30';
    startIndexCheck.checked = true;
    startPageInput.disabled = false; // Ensure it's enabled if it was disabled by unchecked checkbox

    // Reset preview
    const ctx = pdfPreviewCanvas.getContext('2d');
    ctx.clearRect(0, 0, pdfPreviewCanvas.width, pdfPreviewCanvas.height);
    pdfPreviewCanvas.style.display = 'none';
    noPreviewText.style.display = 'block';
}

function toggleStartPageInput() {
    startPageInput.disabled = startIndexCheck.checked;
    if (startIndexCheck.checked) {
        startPageInput.value = '1'; // If checked, numbering starts from '1' based on PDF's first page
    }
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
    handleFiles(event.dataTransfer.files);
}

// File Selection Handler
async function handleFileSelect(event) {
    await handleFiles(event.target.files);
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

    currentFileName = file.name;
    fileInfo.textContent = `${currentFileName} selected.`;
    showStatus('File ready for processing. Generating preview...', 'info');
    addNumbersBtn.disabled = false;
    downloadBtn.disabled = true;

    // Show loading alert
    const swalInstance = Swal.fire({
        title: 'Loading PDF',
        html: 'Please wait while we load your PDF...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        currentPdfBytes = await file.arrayBuffer();
        await renderFirstPagePreview(currentPdfBytes);
        showStatus('PDF loaded. Configure options and add page numbers.', 'success');
        swalInstance.close();
        Swal.fire({
            title: 'File Loaded',
            text: `${currentFileName} loaded successfully.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    } catch (error) {
        showError(`Error loading PDF: ${error.message}`);
        currentPdfBytes = null;
        addNumbersBtn.disabled = true;
        swalInstance.close();
        Swal.fire({
            title: 'Loading Error',
            text: `Error loading PDF: ${error.message}`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

async function renderFirstPagePreview(pdfBytes) {
    try {
        const pdfDoc = await pdfjsLib.getDocument({ data: pdfBytes }).promise;
        const page = await pdfDoc.getPage(1); // Get the first page

        const viewport = page.getViewport({ scale: 1 });
        const canvas = pdfPreviewCanvas;
        const context = canvas.getContext('2d');

        // Set canvas dimensions
        const outputScale = 1; // You can adjust this for higher resolution preview
        canvas.width = Math.floor(viewport.width * outputScale);
        canvas.height = Math.floor(viewport.height * outputScale);

        const renderContext = {
            canvasContext: context,
            viewport: page.getViewport({ scale: outputScale }),
        };

        await page.render(renderContext).promise;
        pdfPreviewCanvas.style.display = 'block';
        noPreviewText.style.display = 'none';
    } catch (error) {
        console.error('Error rendering PDF preview:', error);
        pdfPreviewCanvas.style.display = 'none';
        noPreviewText.style.display = 'block';
        noPreviewText.textContent = 'Could not render PDF preview.';
    }
}

async function addPageNumbersToPdf() {
    if (!currentPdfBytes) {
        showError('Please upload a PDF file first.');
        Swal.fire({
            title: 'Error',
            text: 'Please upload a PDF file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Adding page numbers...', 'info');
    addNumbersBtn.disabled = true;
    downloadBtn.disabled = true;

    const swalInstance = Swal.fire({
        title: 'Processing PDF',
        html: 'Adding page numbers to your document. Please wait...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const { PDFDocument, rgb, StandardFonts } = PDFLib;
        const pdfDoc = await PDFDocument.load(currentPdfBytes);
        const pages = pdfDoc.getPages();

        const position = positionSelect.value;
        const format = formatSelect.value;
        let startPageNumber = parseInt(startPageInput.value);
        const fontSize = parseInt(fontSizeInput.value);
        const fontColor = hexToRgb(fontColorInput.value);
        const margin = parseInt(marginInput.value);
        const usePdfPageIndexAsOne = startIndexCheck.checked; // True if numbering starts from 1 for PDF's first page

        const font = await pdfDoc.embedFont(StandardFonts.Helvetica); // or Helvetica-Bold, Times-Roman, etc.

        for (let i = 0; i < pages.length; i++) {
            const page = pages[i];
            const { width, height } = page.getSize();
            
            // Calculate the actual page number to display
            let displayPageNumber;
            if (usePdfPageIndexAsOne) {
                // If checked, the first page of the PDF is treated as "1"
                displayPageNumber = i + 1;
            } else {
                // If unchecked, the numbering starts from startPageInput.value
                // For the 'i'-th page of the PDF, the displayed number is (startPageNumber + i)
                displayPageNumber = startPageNumber + i;
            }

            const totalPages = pages.length;
            let pageNumberText = format.replace('{n}', displayPageNumber).replace('{total}', totalPages);

            const textWidth = font.widthOfTextAtSize(pageNumberText, fontSize);
            const textHeight = font.heightAtSize(fontSize); // Approximated height, PDFLib uses descent for y calculation

            let x, y;

            // Determine X position
            if (position.includes('left')) {
                x = margin;
            } else if (position.includes('center')) {
                x = (width - textWidth) / 2;
            } else { // right
                x = width - textWidth - margin;
            }

            // Determine Y position
            if (position.includes('top')) {
                y = height - margin - textHeight; // Top margin from the top edge
            } else { // bottom
                y = margin; // Bottom margin from the bottom edge
            }

            page.drawText(pageNumberText, {
                x,
                y,
                font,
                size: fontSize,
                color: rgb(fontColor.r / 255, fontColor.g / 255, fontColor.b / 255),
            });
        }

        const modifiedPdfBytes = await pdfDoc.save();
        
        // Store modified PDF bytes (Base64 for history)
        // Use chunking to avoid "Maximum call stack size exceeded" error
        const uint8Array = new Uint8Array(modifiedPdfBytes);
        let binaryString = '';
        const chunkSize = 8192; // Process 8KB at a time to avoid stack overflow
        for (let i = 0; i < uint8Array.length; i += chunkSize) {
            const chunk = uint8Array.slice(i, i + chunkSize);
            binaryString += String.fromCharCode.apply(null, chunk);
        }
        const base64Pdf = btoa(binaryString);

        addToHistory({
            fileName: currentFileName.replace('.pdf', '_numbered.pdf'),
            date: new Date().toLocaleString(),
            format: 'pdf',
            pdfData: base64Pdf,
            options: { // Store options to display in preview (though not for regeneration)
                position: position,
                format: format,
                startPage: startPageNumber,
                fontSize: fontSize,
                fontColor: fontColorInput.value,
                margin: margin,
                startIndexCheck: usePdfPageIndexAsOne
            }
        });

        currentPdfBytes = modifiedPdfBytes; // Update currentPdfBytes to the numbered version
        
        showStatus('Page numbers added successfully! Click Download PDF.', 'success');
        addNumbersBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Success!',
            text: 'Page numbers have been added to your PDF.',
            icon: 'success',
            confirmButtonText: 'Great!',
            timer: 1000,
            timerProgressBar: true
        });

    } catch (error) {
        showError(`Error adding page numbers: ${error.message}`);
        addNumbersBtn.disabled = false;
        downloadBtn.disabled = true;
        
        swalInstance.close();
        Swal.fire({
            title: 'Processing Error',
            text: `Error: ${error.message}`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

function hexToRgb(hex) {
    const r = parseInt(hex.slice(1, 3), 16);
    const g = parseInt(hex.slice(3, 5), 16);
    const b = parseInt(hex.slice(5, 7), 16);
    return { r, g, b };
}


// Download PDF
function downloadPdf() {
    if (!currentPdfBytes) {
        showError('No PDF to download. Please process a file first.');
        Swal.fire({
            title: 'No PDF',
            text: 'No PDF to download. Please process a file first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing PDF for download...', 'info');
    
    Swal.fire({
        title: 'Preparing Download',
        html: `Preparing your PDF file...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        const blob = new Blob([currentPdfBytes], { type: 'application/pdf' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = currentFileName.replace('.pdf', '_numbered.pdf');
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
    const historyItem = {
        id: Date.now(),
        fileName: item.fileName,
        date: item.date,
        format: item.format,
        pdfData: item.pdfData, // Base64 string of the PDF
        options: item.options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('pdfPageNumberHistory', JSON.stringify(conversionHistory));
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
            <td>${item.format.toUpperCase()}</td>
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
            conversionHistory = conversionHistory.filter(item => item.id !== id);
            localStorage.setItem('pdfPageNumberHistory', JSON.stringify(conversionHistory));
            displayHistory();
        }
    });
}

function downloadHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.pdfData) {
        showError('File data not found for download.');
        Swal.fire({
            title: 'Error',
            text: 'File data not found for download.',
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
        const byteCharacters = atob(item.pdfData);
        const byteNumbers = new Array(byteCharacters.length);
        for (let i = 0; i < byteCharacters.length; i++) {
            byteNumbers[i] = byteCharacters.charCodeAt(i);
        }
        const byteArray = new Uint8Array(byteNumbers);
        const blob = new Blob([byteArray], { type: 'application/pdf' });
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

async function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.pdfData) {
        showError('No PDF data available for preview.');
        Swal.fire({
            title: 'Error',
            text: 'No PDF data available for preview.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus(`Previewing ${item.fileName}...`, 'info');
    Swal.fire({
        title: 'Generating Preview',
        html: `Loading preview for ${item.fileName}...`,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const byteCharacters = atob(item.pdfData);
        const byteNumbers = new Array(byteCharacters.length);
        for (let i = 0; i < byteCharacters.length; i++) {
            byteNumbers[i] = byteCharacters.charCodeAt(i);
        }
        const byteArray = new Uint8Array(byteNumbers);

        await renderFirstPagePreview(byteArray.buffer);
        showStatus(`Preview of ${item.fileName} loaded.`, 'info');
        Swal.close();
        pdfPreviewCanvas.scrollIntoView({ behavior: 'smooth' });
    } catch (error) {
        showError(`Error previewing PDF: ${error.message}`);
        Swal.fire({
            title: 'Preview Error',
            text: `Error: ${error.message}`,
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