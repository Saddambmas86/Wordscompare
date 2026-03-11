<?php
// SEO and Page Metadata
$page_title = "PDF to SVG Converter - Convert PDF to Vector Graphics Online"; // You may Change the Title here
$page_description = "Convert PDF to SVG online for free. Transform PDF files into scalable vector graphics. Perfect for web use, printing, and design workflows. No sign-up needed."; // Put your Description here
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
                    <h1 class="h2">PDF to SVG Converter <i class="fas fa-file-image text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Transform your PDF documents into versatile and scalable SVG images.</p>
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
                        <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Conversion Options</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="pageRange" class="form-label">Page Range (e.g., 1-3,5)</label>
                                <input type="text" id="pageRange" class="form-control" placeholder="All pages (leave blank)">
                            </div>
                            <div class="col-md-6">
                                <label for="scale" class="form-label">Scale (Higher = Better Quality)</label>
                                <input type="number" id="scale" class="form-control" value="1.5" min="0.5" step="0.1">
                                <small class="text-muted">Higher scale means larger SVG and more detail.</small>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="combinePages" checked>
                                    <label class="form-check-label" for="combinePages">
                                        Combine all pages into a single SVG file (as multiple <image> elements)
                                    </label>
                                </div>
                                <small class="text-muted">If unchecked, each page will be a separate SVG file.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="convertBtn" disabled>
                        <i class="fas fa-exchange-alt me-2"></i> Convert
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

                <div class="preview-area card mt-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-eye me-2"></i>SVG Preview</h5>
                        <span class="badge bg-info" id="pageCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <div id="svgPreviewContainer" class="text-center p-3" style="max-height: 500px; overflow: auto;">
                            <p class="text-muted p-4">Upload PDF to see preview.</p>
                        </div>
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
                <?php include '../../views/content/pdf-to-svg-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script>
// Set the workerSrc for PDF.js
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

let files = [];
let pdfDoc = null;
let conversionHistory = JSON.parse(localStorage.getItem('svgConversionHistory')) || [];
let convertedSvgs = []; // Store generated SVG strings or data URIs

// Initialize elements
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const svgPreviewContainer = document.getElementById('svgPreviewContainer');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const pageRangeInput = document.getElementById('pageRange');
const scaleInput = document.getElementById('scale');
const combinePagesCheckbox = document.getElementById('combinePages');
const pageCountSpan = document.getElementById('pageCount');

// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertPdfToSvg);
downloadBtn.addEventListener('click', downloadSvg);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PDF to SVG Converter',
        html: `Follow these steps to convert your PDFs:<br><br>
        <ol class="text-start">
            <li>Upload a PDF file by clicking "Select PDF File" or dragging it into the drop zone.</li>
            <li>Specify a page range (optional) and set the output scale.</li>
            <li>Click "Convert" to generate the SVG preview.</li>
            <li>Download your newly created SVG file(s).</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#dc3545' // Bootstrap danger color
    });
}

// Reset Button
function resetAll() {
    files = [];
    pdfDoc = null;
    convertedSvgs = [];
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    svgPreviewContainer.innerHTML = '<p class="text-muted p-4">Upload PDF to see preview.</p>';
    pageCountSpan.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;
    pageRangeInput.value = '';
    scaleInput.value = '1.5';
    combinePagesCheckbox.checked = true;
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
        fileInfo.textContent = `${files[0].name} selected.`;
        loadPdf(files[0]);
        showStatus('File ready for conversion. Loading PDF...', 'info');
        Swal.fire({
            title: 'File Added',
            text: `${files[0].name} has been selected for conversion.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }
}

async function loadPdf(file) {
    const reader = new FileReader();
    reader.onload = async (event) => {
        const loadingTask = pdfjsLib.getDocument({ data: new Uint8Array(event.target.result) });
        try {
            pdfDoc = await loadingTask.promise;
            pageCountSpan.textContent = `Pages: ${pdfDoc.numPages}`;
            convertBtn.disabled = false;
            showStatus('PDF loaded. Click Convert to create SVG.', 'success');
        } catch (error) {
            showError(`Error loading PDF: ${error.message}`);
            Swal.fire({
                title: 'Error Loading PDF',
                text: error.message,
                icon: 'error',
                confirmButtonText: 'OK'
            });
            pdfDoc = null;
            convertBtn.disabled = true;
        }
    };
    reader.onerror = (error) => {
        showError(`Error reading file: ${error.message}`);
        Swal.fire({
            title: 'File Read Error',
            text: error.message,
            icon: 'error',
            confirmButtonText: 'OK'
        });
        convertBtn.disabled = true;
    };
    reader.readAsArrayBuffer(file);
}

// Convert PDF to SVG
async function convertPdfToSvg() {
    if (!pdfDoc) {
        showError('No PDF loaded. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No PDF loaded. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting PDF to SVG...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;
    convertedSvgs = []; // Clear previous conversions

    const swalInstance = Swal.fire({
        title: 'Creating SVG(s)',
        html: 'Please wait while we generate your SVG document(s)...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const pageRange = parsePageRange(pageRangeInput.value, pdfDoc.numPages);
        const scale = parseFloat(scaleInput.value);
        const combinePages = combinePagesCheckbox.checked;

        let allPageSvgImages = [];
        let combinedWidth = 0;
        let combinedHeight = 0;
        let currentYOffset = 0;

        for (const pageNum of pageRange) {
            const page = await pdfDoc.getPage(pageNum);
            const viewport = page.getViewport({ scale: scale });

            // Create a canvas element
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // Render PDF page into canvas context
            await page.render({ canvasContext: context, viewport: viewport }).promise;

            // Get data URL of the canvas image
            const dataUrl = canvas.toDataURL('image/png'); // Using PNG for better quality

            if (combinePages) {
                allPageSvgImages.push({ dataUrl, width: viewport.width, height: viewport.height });
                combinedWidth = Math.max(combinedWidth, viewport.width);
                combinedHeight += viewport.height; // Stack vertically
            } else {
                // Generate SVG for individual page
                const svgContent = `
                    <svg width="${viewport.width}" height="${viewport.height}" viewBox="0 0 ${viewport.width} ${viewport.height}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <image href="${dataUrl}" x="0" y="0" width="${viewport.width}" height="${viewport.height}"/>
                    </svg>
                `;
                convertedSvgs.push({
                    fileName: files[0].name.replace('.pdf', `_page${pageNum}.svg`),
                    svg: svgContent
                });
            }
        }

        if (combinePages && allPageSvgImages.length > 0) {
            // Generate combined SVG
            let combinedSvg = `
                <svg width="${combinedWidth}" height="${combinedHeight}" viewBox="0 0 ${combinedWidth} ${combinedHeight}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            `;
            allPageSvgImages.forEach(pageImage => {
                combinedSvg += `<image href="${pageImage.dataUrl}" x="0" y="${currentYOffset}" width="${pageImage.width}" height="${pageImage.height}"/>`;
                currentYOffset += pageImage.height;
            });
            combinedSvg += `</svg>`;

            convertedSvgs.push({
                fileName: files[0].name.replace('.pdf', '_combined.svg'),
                svg: combinedSvg
            });
        }

        displaySvgPreview();
        addToHistory({
            fileName: files[0].name.replace('.pdf', '.svg'), // Use a generic name for history
            date: new Date().toLocaleString(),
            format: 'svg',
            // For history, store a reference, not the SVG content directly due to size.
            // On download/preview from history, we'll indicate re-conversion.
            // Or store key options to regenerate a simple preview.
            // For this version, let's just store the info and regenerate on download.
            options: {
                pageRange: pageRangeInput.value,
                scale: scaleInput.value,
                combinePages: combinePagesCheckbox.checked,
                originalFileName: files[0].name,
                originalFileContent: Array.from(new Uint8Array(await files[0].arrayBuffer())) // Store content
            }
        });

        showStatus('Conversion complete! Click Download SVG.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your PDF has been successfully converted to SVG.',
            icon: 'success',
            confirmButtonText: 'Great!',
            timer: 1000,
            timerProgressBar: true
        });

    } catch (error) {
        showError(`Error during SVG generation: ${error.message}`);
        convertBtn.disabled = false;
        downloadBtn.disabled = true;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Error',
            text: error.message,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

function parsePageRange(rangeStr, numPages) {
    if (!rangeStr) return Array.from({ length: numPages }, (_, i) => i + 1); // All pages

    const pages = new Set();
    rangeStr.split(',').forEach(part => {
        part = part.trim();
        if (part.includes('-')) {
            const [start, end] = part.split('-').map(Number);
            for (let i = start; i <= end; i++) {
                if (i >= 1 && i <= numPages) pages.add(i);
            }
        } else {
            const pageNum = Number(part);
            if (pageNum >= 1 && pageNum <= numPages) pages.add(pageNum);
        }
    });
    return Array.from(pages).sort((a, b) => a - b);
}

// Display SVG Preview
function displaySvgPreview() {
    svgPreviewContainer.innerHTML = '';
    if (convertedSvgs.length > 0) {
        if (combinePagesCheckbox.checked) {
            // Display the combined SVG directly
            const svgDataUrl = "data:image/svg+xml;base64," + btoa(convertedSvgs[0].svg);
            const img = document.createElement('img');
            img.src = svgDataUrl;
            img.style.maxWidth = '100%';
            img.style.height = 'auto';
            svgPreviewContainer.appendChild(img);
        } else {
            // Display each SVG as an image
            convertedSvgs.forEach((svgItem, index) => {
                const svgDataUrl = "data:image/svg+xml;base64," + btoa(svgItem.svg);
                const img = document.createElement('img');
                img.src = svgDataUrl;
                img.alt = `Page ${index + 1}`;
                img.title = svgItem.fileName;
                img.style.maxWidth = '100%';
                img.style.height = 'auto';
                img.style.border = '1px solid #eee';
                img.style.margin = '5px';
                svgPreviewContainer.appendChild(img);
            });
        }
    } else {
        svgPreviewContainer.innerHTML = '<p class="text-muted p-4">No SVG preview available.</p>';
    }
}


// Download SVG
async function downloadSvg() {
    if (convertedSvgs.length === 0) {
        showError('No SVG to download. Please convert first.');
        Swal.fire({
            title: 'No Data',
            text: 'No SVG to download. Please convert first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing SVG for download...', 'info');
    
    const swalInstance = Swal.fire({
        title: 'Preparing SVG File(s)',
        html: `Please wait while we prepare your SVG file(s)...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        convertedSvgs.forEach(svgItem => {
            const blob = new Blob([svgItem.svg], { type: 'image/svg+xml' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = svgItem.fileName;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        });
        
        showStatus('SVG file(s) downloaded!', 'success');
        Swal.fire({
            title: 'Download Complete',
            text: `Your SVG file(s) have been downloaded.`,
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
        options: item.options // Store options to regenerate
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('svgConversionHistory', JSON.stringify(conversionHistory));
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
            localStorage.setItem('svgConversionHistory', JSON.stringify(conversionHistory));
            displayHistory();
            Swal.fire('Deleted!', 'Your file has been deleted from history.', 'success');
        }
    });
}

async function downloadHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.options || !item.options.originalFileContent) {
        showError('Original file content not available to regenerate SVG.');
        Swal.fire({
            title: 'Download Failed',
            text: 'Original file content not found in history. Please re-upload and convert.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus(`Regenerating and downloading ${item.fileName}...`, 'info');
    
    const swalInstance = Swal.fire({
        title: 'Regenerating & Preparing Download',
        html: `Please wait while we recreate and prepare ${item.fileName} for download...`,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const loadingTask = pdfjsLib.getDocument({ data: new Uint8Array(item.options.originalFileContent) });
        const pdfDocToRegen = await loadingTask.promise;

        const pageRange = parsePageRange(item.options.pageRange, pdfDocToRegen.numPages);
        const scale = parseFloat(item.options.scale);
        const combinePages = item.options.combinePages;
        
        let regeneratedSvgs = [];
        let allPageSvgImages = [];
        let combinedWidth = 0;
        let combinedHeight = 0;
        let currentYOffset = 0;

        for (const pageNum of pageRange) {
            const page = await pdfDocToRegen.getPage(pageNum);
            const viewport = page.getViewport({ scale: scale });

            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            await page.render({ canvasContext: context, viewport: viewport }).promise;
            const dataUrl = canvas.toDataURL('image/png');

            if (combinePages) {
                allPageSvgImages.push({ dataUrl, width: viewport.width, height: viewport.height });
                combinedWidth = Math.max(combinedWidth, viewport.width);
                combinedHeight += viewport.height;
            } else {
                const svgContent = `
                    <svg width="${viewport.width}" height="${viewport.height}" viewBox="0 0 ${viewport.width} ${viewport.height}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <image href="${dataUrl}" x="0" y="0" width="${viewport.width}" height="${viewport.height}"/>
                    </svg>
                `;
                regeneratedSvgs.push({
                    fileName: item.options.originalFileName.replace('.pdf', `_page${pageNum}.svg`),
                    svg: svgContent
                });
            }
        }

        if (combinePages && allPageSvgImages.length > 0) {
            let combinedSvg = `
                <svg width="${combinedWidth}" height="${combinedHeight}" viewBox="0 0 ${combinedWidth} ${combinedHeight}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            `;
            allPageSvgImages.forEach(pageImage => {
                combinedSvg += `<image href="${pageImage.dataUrl}" x="0" y="${currentYOffset}" width="${pageImage.width}" height="${pageImage.height}"/>`;
                currentYOffset += pageImage.height;
            });
            combinedSvg += `</svg>`;

            regeneratedSvgs.push({
                fileName: item.options.originalFileName.replace('.pdf', '_combined.svg'),
                svg: combinedSvg
            });
        }

        regeneratedSvgs.forEach(svgItem => {
            const blob = new Blob([svgItem.svg], { type: 'image/svg+xml' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = svgItem.fileName;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        });
        
        swalInstance.close();
        showStatus(`${item.fileName} downloaded!`, 'success');
        Swal.fire({
            title: 'Download Complete',
            text: `Your SVG file(s) have been downloaded.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });

    } catch (error) {
        swalInstance.close();
        showError(`Error regenerating SVG for download: ${error.message}`);
        Swal.fire({
            title: 'Download Error',
            text: error.message,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

async function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.options || !item.options.originalFileContent) {
        showError('Original file content not available to preview SVG.');
        Swal.fire({
            title: 'Preview Failed',
            text: 'Original file content not found in history. Cannot preview.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus(`Regenerating and previewing ${item.fileName}...`, 'info');
    
    const swalInstance = Swal.fire({
        title: 'Regenerating & Preparing Preview',
        html: `Please wait while we recreate and prepare ${item.fileName} for preview...`,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const loadingTask = pdfjsLib.getDocument({ data: new Uint8Array(item.options.originalFileContent) });
        const pdfDocToRegen = await loadingTask.promise;

        const pageRange = parsePageRange(item.options.pageRange, pdfDocToRegen.numPages);
        const scale = parseFloat(item.options.scale);
        const combinePages = item.options.combinePages;
        
        let previewSvgs = [];
        let allPageSvgImages = [];
        let combinedWidth = 0;
        let combinedHeight = 0;
        let currentYOffset = 0;

        for (const pageNum of pageRange) {
            const page = await pdfDocToRegen.getPage(pageNum);
            const viewport = page.getViewport({ scale: scale });

            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            await page.render({ canvasContext: context, viewport: viewport }).promise;
            const dataUrl = canvas.toDataURL('image/png');

            if (combinePages) {
                allPageSvgImages.push({ dataUrl, width: viewport.width, height: viewport.height });
                combinedWidth = Math.max(combinedWidth, viewport.width);
                combinedHeight += viewport.height;
            } else {
                const svgContent = `
                    <svg width="${viewport.width}" height="${viewport.height}" viewBox="0 0 ${viewport.width} ${viewport.height}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <image href="${dataUrl}" x="0" y="0" width="${viewport.width}" height="${viewport.height}"/>
                    </svg>
                `;
                previewSvgs.push({
                    fileName: item.options.originalFileName.replace('.pdf', `_page${pageNum}.svg`),
                    svg: svgContent
                });
            }
        }

        if (combinePages && allPageSvgImages.length > 0) {
            let combinedSvg = `
                <svg width="${combinedWidth}" height="${combinedHeight}" viewBox="0 0 ${combinedWidth} ${combinedHeight}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            `;
            allPageSvgImages.forEach(pageImage => {
                combinedSvg += `<image href="${pageImage.dataUrl}" x="0" y="${currentYOffset}" width="${pageImage.width}" height="${pageImage.height}"/>`;
                currentYOffset += pageImage.height;
            });
            combinedSvg += `</svg>`;

            previewSvgs.push({
                fileName: item.options.originalFileName.replace('.pdf', '_combined.svg'),
                svg: combinedSvg
            });
        }
        
        // Display the regenerated SVGs in the preview area
        svgPreviewContainer.innerHTML = '';
        if (previewSvgs.length > 0) {
            if (combinePagesCheckbox.checked) {
                const svgDataUrl = "data:image/svg+xml;base64," + btoa(previewSvgs[0].svg);
                const img = document.createElement('img');
                img.src = svgDataUrl;
                img.style.maxWidth = '100%';
                img.style.height = 'auto';
                svgPreviewContainer.appendChild(img);
            } else {
                previewSvgs.forEach((svgItem, index) => {
                    const svgDataUrl = "data:image/svg+xml;base64," + btoa(svgItem.svg);
                    const img = document.createElement('img');
                    img.src = svgDataUrl;
                    img.alt = `Page ${index + 1}`;
                    img.title = svgItem.fileName;
                    img.style.maxWidth = '100%';
                    img.height = 'auto';
                    img.style.border = '1px solid #eee';
                    img.style.margin = '5px';
                    svgPreviewContainer.appendChild(img);
                });
            }
        } else {
            svgPreviewContainer.innerHTML = '<p class="text-muted p-4">No SVG preview available.</p>';
        }

        swalInstance.close();
        showStatus(`Previewing ${item.fileName}`, 'info');
        svgPreviewContainer.scrollIntoView({ behavior: 'smooth' });

    } catch (error) {
        swalInstance.close();
        showError(`Error regenerating SVG for preview: ${error.message}`);
        Swal.fire({
            title: 'Preview Error',
            text: error.message,
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