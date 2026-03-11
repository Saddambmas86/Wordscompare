<?php
// SEO and Page Metadata
$page_title = "PDF to PNG Converter - Convert PDF Pages to PNG Online Free"; // You may Change the Title here
$page_description = "Convert PDF to PNG online for free. Transform PDF pages into high-quality PNG images. Transparent background support. Fast, secure, no software required."; // Put your Description here
$page_keywords = "PDF to PNG, convert PDF to PNG, PDF to image, extract PDF pages as images, free PDF converter, online PDF tool";

// Include common header
include '../../includes/header.php';
?>

<!-- TOOL -->
<div class="container">
    <div class="row justify-content-center">
        
        <!-- Mobile Toggle Button (Visible only on mobile) -->
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


        <!-- Sidebar Column (Visible on all screens) -->
        <div class="col-lg-2">
            <div class="collapse d-lg-block h-100" id="toolsSidebar">
                <div class="card h-100">
                    <div class="card-body p-2">
                        <!-- Search Box -->
                        <input type="text" id="searchTools" class="form-control border-danger mb-3" placeholder="Search tools...">
                        
                        <!-- Tools List -->
                        <div class="list-group list-group-flush overflow-auto" style="max-height: calc(200vh - 150px);">
                            <div id="toolsList"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-7 border shadow-sm">
            <div class="tool-container rounded-3 p-4 p-md-5">
                <header class="text-center mb-4">
                    <h1 class="h2">PDF to PNG Converter <i class="fas fa-file-image text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Convert PDF pages into high-quality PNG images.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop PDF File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="pdfUpload" accept=".pdf,application/pdf" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('pdfUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select PDF Files
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
                                <label for="pageRange" class="form-label">Page Range</label>
                                <input type="text" id="pageRange" class="form-control" placeholder="e.g. 1-3,5" value="1-">
                            </div>
                            <div class="col-md-6">
                                <label for="imageQuality" class="form-label">Image Quality</label>
                                <select id="imageQuality" class="form-select">
                                    <option value="1">High (100%)</option>
                                    <option value="0.75">Medium (75%)</option>
                                    <option value="0.5" selected>Low (50%)</option>
                                    <option value="0.25">Very Low (25%)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="outputFormat" class="form-label">Output Format</label>
                                <select id="outputFormat" class="form-select">
                                    <option value="jpg">JPG</option>
                                    <option value="png" selected>PNG</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="resolution" class="form-label">Resolution (DPI)</label>
                                <select id="resolution" class="form-select">
                                    <option value="72">72 DPI (Screen)</option>
                                    <option value="150">150 DPI</option>
                                    <option value="300" selected>300 DPI (Print)</option>
                                    <option value="600">600 DPI (High Quality)</option>
                                </select>
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
                        <h5 class="mb-0"><i class="fas fa-images me-2"></i>Image Preview</h5>
                        <span class="badge bg-info" id="pageCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <div class="row row-cols-1 row-cols-md-2 g-3 p-3" id="imagePreview">
                            <div class="col-12 text-center text-muted p-4">
                                <i class="fas fa-image fa-3x mb-3"></i>
                                <p>Preview will appear here after conversion.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="history-area card mt-4" id="historyContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Conversion History (Last 5 Files)</h5>
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
                <?php include '../../views/content/pdf-to-png-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
// JavaScript for PDF to PNG Converter
let files = [];
let imageData = [];
let conversionHistory = JSON.parse(localStorage.getItem('pdfToImageHistory')) || [];

// Initialize PDF.js
pdfjsLib = window['pdfjs-dist/build/pdf'];
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

// Initialize elements
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const imagePreview = document.getElementById('imagePreview');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertPDFToImages);
downloadBtn.addEventListener('click', downloadImages);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PDF to PNG Converter',
        html: `Follow these steps to convert your PDFs:<br><br>
        <ol class="text-start">
            <li>Upload PDFs by clicking "Select PDF Files" or dragging them into the drop zone.</li>
            <li>Set your preferred image quality, format (PNG recommended), and resolution.</li>
            <li>Click "Convert" to transform PDF pages into PNG images.</li>
            <li>Preview the converted images.</li>
            <li>Download individual images or all as a ZIP archive.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    // Reset file-related variables
    files = [];
    imageData = [];
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    imagePreview.innerHTML = '<div class="col-12 text-center text-muted p-4"><i class="fas fa-image fa-3x mb-3"></i><p>Preview will appear here after conversion.</p></div>';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('pageRange').value = '1-';
    document.getElementById('imageQuality').value = '0.5';
    document.getElementById('outputFormat').value = 'png';
    document.getElementById('resolution').value = '300';
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
        if (file.size > 50 * 1024 * 1024) {
            showError('Each file must be less than 50MB.');
            return false;
        }
        return true;
    });

    if (files.length > 0) {
        fileInfo.textContent = `${files.length} file(s) selected: ${files.map(f => f.name).join(', ')}`;
        convertBtn.disabled = false;
        showStatus('Files ready for conversion.', 'success');
        
        // Show success message
        Swal.fire({
            title: 'Files Added',
            text: `${files.length} PDF file(s) have been selected for conversion.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }
}

// Convert PDF to Images
async function convertPDFToImages() {
    if (files.length === 0) {
        showError('Please upload at least one PDF file.');
        Swal.fire({
            title: 'Error',
            text: 'Please upload at least one PDF file.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    const quality = parseFloat(document.getElementById('imageQuality').value);
    const outputFormat = document.getElementById('outputFormat').value;
    const dpi = parseInt(document.getElementById('resolution').value);
    const scale = dpi / 96; // 96 DPI is standard screen resolution
    const thumbnailScale = 0.2; // Scale for thumbnail storage

    showStatus('Converting PDF to images...', 'info');
    convertBtn.disabled = true;

    // Show loading alert
    let timerInterval;
    const swalInstance = Swal.fire({
        title: 'Converting PDF',
        html: 'Please wait while we process your file...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        },
        willClose: () => {
            clearInterval(timerInterval);
        }
    });

    try {
        // Clear previous data
        imageData = [];
        imagePreview.innerHTML = '';
        
        // Process each file
        for (const file of files) {
            const fileData = await readFileAsArrayBuffer(file);
            const pdf = await pdfjsLib.getDocument(fileData).promise;
            
            // Parse page range (e.g., "1-3,5" becomes [1,2,3,5])
            const pageRange = parsePageRange(document.getElementById('pageRange').value, pdf.numPages);
            
            // Store first page as thumbnail for history
            let thumbnailDataUrl = null;
            
            // Process each page in the range
            for (const pageNum of pageRange) {
                const page = await pdf.getPage(pageNum);
                const viewport = page.getViewport({ scale: scale });
                
                // Create canvas for rendering
                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');
                canvas.height = viewport.height;
                canvas.width = viewport.width;
                
                // Render PDF page to canvas
                await page.render({
                    canvasContext: context,
                    viewport: viewport
                }).promise;
                
                // Convert canvas to image data
                const imageDataUrl = canvas.toDataURL(`image/${outputFormat}`, quality);
                
                // Generate filename
                const pageName = pageRange.length > 1 ? 
                    `${file.name.replace('.pdf', '')}_page${pageNum}.${outputFormat}` :
                    `${file.name.replace('.pdf', '')}.${outputFormat}`;
                
                // Add to imageData array
                imageData.push({
                    name: pageName,
                    dataUrl: imageDataUrl,
                    format: outputFormat
                });
                
                // Create preview thumbnail
                createImagePreview(imageDataUrl, pageNum, file.name);
                
                // Store first page as thumbnail (reduced size)
                if (!thumbnailDataUrl) {
                    const thumbViewport = page.getViewport({ scale: thumbnailScale });
                    const thumbCanvas = document.createElement('canvas');
                    const thumbContext = thumbCanvas.getContext('2d');
                    thumbCanvas.height = thumbViewport.height;
                    thumbCanvas.width = thumbViewport.width;
                    
                    await page.render({
                        canvasContext: thumbContext,
                        viewport: thumbViewport
                    }).promise;
                    
                    thumbnailDataUrl = thumbCanvas.toDataURL(`image/${outputFormat}`, 0.5);
                }
            }
            
            // Add to history (only store thumbnail and metadata)
            addToHistory({
                fileName: files[0].name,
                date: new Date().toLocaleString(),
                format: outputFormat,
                thumbnail: thumbnailDataUrl,
                pageRange: document.getElementById('pageRange').value || '1-',
                outputName: pageRange.length > 1 ? 
                    `${file.name.replace('.pdf', '')}_cover.${outputFormat}` :
                    `${file.name.replace('.pdf', '')}.${outputFormat}`
            });
        }
        
        if (imageData.length === 0) {
            throw new Error('No pages were converted');
        }
        
        downloadBtn.disabled = false;
        showStatus('Conversion complete!', 'success');
        
        // Close loading alert and show success
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your PDF has been successfully converted to PNG images.',
            icon: 'success',
            confirmButtonText: 'Great!',
            timer: 1000,
            timerProgressBar: true
        });
        
    } catch (error) {
        showError(`Error during conversion: ${error.message}`);
        convertBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Error',
            text: error.message,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// Create image preview thumbnail
function createImagePreview(dataUrl, pageNum, fileName) {
    const col = document.createElement('div');
    col.className = 'col';
    
    const card = document.createElement('div');
    card.className = 'card h-100';
    
    const img = document.createElement('img');
    img.src = dataUrl;
    img.className = 'card-img-top img-thumbnail';
    img.alt = `Page ${pageNum} of ${fileName}`;
    img.style.cursor = 'pointer';
    img.style.maxHeight = '200px';
    img.style.objectFit = 'contain';
    
    img.addEventListener('click', () => {
        Swal.fire({
            imageUrl: dataUrl,
            imageAlt: `Page ${pageNum}`,
            showConfirmButton: false,
            background: 'transparent',
            backdrop: 'rgba(0,0,0,0.8)'
        });
    });
    
    const cardBody = document.createElement('div');
    cardBody.className = 'card-body text-center';
    
    const title = document.createElement('h6');
    title.className = 'card-title';
    title.textContent = `Page ${pageNum}`;
    
    const downloadBtn = document.createElement('button');
    downloadBtn.className = 'btn btn-sm btn-outline-primary mt-2';
    downloadBtn.innerHTML = '<i class="fas fa-download me-1"></i> Download';
    downloadBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        const a = document.createElement('a');
        a.href = dataUrl;
        a.download = `${fileName.replace('.pdf', '')}_page${pageNum}.png`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    });
    
    cardBody.appendChild(title);
    cardBody.appendChild(downloadBtn);
    card.appendChild(img);
    card.appendChild(cardBody);
    col.appendChild(card);
    
    imagePreview.appendChild(col);
}

// Download Images
async function downloadImages() {
    if (imageData.length === 0) {
        showError('No images to download. Please convert first.');
        Swal.fire({
            title: 'No Images',
            text: 'No images to download. Please convert first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    const outputFormat = document.getElementById('outputFormat').value;
    
    // Show loading alert
    Swal.fire({
        title: 'Preparing Download',
        html: `Preparing ${imageData.length} ${outputFormat.toUpperCase()} files...`,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        if (imageData.length === 1) {
            // Single image - download directly
            const a = document.createElement('a');
            a.href = imageData[0].dataUrl;
            a.download = imageData[0].name;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        } else {
            // Multiple images - create ZIP
            const zip = new JSZip();
            const imgFolder = zip.folder("mywebtools_images");
            
            imageData.forEach((img, index) => {
                const base64Data = img.dataUrl.split(',')[1];
                imgFolder.file(img.name, base64Data, { base64: true });
            });
            
            const content = await zip.generateAsync({ type: "blob" });
            const url = URL.createObjectURL(content);
            
            const a = document.createElement('a');
            a.href = url;
            a.download = 'mywebtools_images.zip';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            
            // Revoke the object URL to free memory
            setTimeout(() => URL.revokeObjectURL(url), 100);
        }
        
        showStatus('Download started!', 'success');
        
        Swal.fire({
            title: 'Download Complete',
            text: `Your ${outputFormat.toUpperCase()} file(s) have been downloaded.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
        
    } catch (error) {
        showError(`Error during download: ${error.message}`);
        Swal.fire({
            title: 'Download Error',
            text: error.message,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// Helper function to read file as ArrayBuffer
function readFileAsArrayBuffer(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.onload = () => resolve(reader.result);
        reader.onerror = reject;
        reader.readAsArrayBuffer(file);
    });
}

// Helper function to parse page range string (e.g., "1-3,5" becomes [1,2,3,5])
function parsePageRange(rangeStr, maxPages) {
    if (!rangeStr || rangeStr.trim() === '') return Array.from({length: maxPages}, (_, i) => i + 1);
    
    const pages = new Set();
    const parts = rangeStr.split(',');
    
    for (const part of parts) {
        if (part.includes('-')) {
            const [start, end] = part.split('-').map(Number);
            const realStart = start || 1;
            const realEnd = end || maxPages;
            
            for (let i = realStart; i <= Math.min(realEnd, maxPages); i++) {
                pages.add(i);
            }
        } else {
            const page = parseInt(part);
            if (!isNaN(page) && page <= maxPages) {
                pages.add(page);
            }
        }
    }
    
    return Array.from(pages).sort((a, b) => a - b);
}

// History Functions
function addToHistory(item) {
    const historyItem = {
        id: Date.now(),
        fileName: item.fileName,
        date: item.date,
        format: item.format,
        thumbnail: item.thumbnail,
        pageRange: item.pageRange,
        outputName: item.outputName
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    try {
        localStorage.setItem('pdfToImageHistory', JSON.stringify(conversionHistory));
    } catch (e) {
        // If storage is full, remove oldest items until it fits
        while (conversionHistory.length > 1) {
            conversionHistory.pop();
            try {
                localStorage.setItem('pdfToImageHistory', JSON.stringify(conversionHistory));
                break;
            } catch (e) {
                continue;
            }
        }
    }
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
            <td>${item.outputName}</td>
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

// Update the addToHistory function to ensure proper outputName
function addToHistory(item) {
    // Generate proper output name based on page range
    let outputName;
    if (item.pageRange === '1-' || item.pageRange === '1') {
        outputName = `${item.fileName.replace('.pdf', '')}.${item.format}`;
    } else if (item.pageRange.includes(',')) {
        // Multiple specific pages
        outputName = `${item.fileName.replace('.pdf', '')}_pages.${item.format}`;
    } else if (item.pageRange.includes('-')) {
        // Page range
        const range = item.pageRange.split('-');
        outputName = `${item.fileName.replace('.pdf', '')}_pages${range[0]}-${range[1] || 'end'}.${item.format}`;
    } else {
        // Single specific page
        outputName = `${item.fileName.replace('.pdf', '')}_page${item.pageRange}.${item.format}`;
    }

    const historyItem = {
        id: Date.now(),
        fileName: item.fileName,
        date: item.date,
        format: item.format,
        thumbnail: item.thumbnail,
        pageRange: item.pageRange,
        outputName: outputName
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    try {
        localStorage.setItem('pdfToImageHistory', JSON.stringify(conversionHistory));
    } catch (e) {
        // If storage is full, remove oldest items until it fits
        while (conversionHistory.length > 1) {
            conversionHistory.pop();
            try {
                localStorage.setItem('pdfToImageHistory', JSON.stringify(conversionHistory));
                break;
            } catch (e) {
                continue;
            }
        }
    }
    displayHistory();
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
            localStorage.setItem('pdfToImageHistory', JSON.stringify(conversionHistory));
            displayHistory();
        }
    });
}

function downloadHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    // Show message that original files aren't available
    Swal.fire({
        title: 'Download Original',
        text: 'The original converted files are no longer available. Please convert the PDF again to download.',
        icon: 'info',
        confirmButtonText: 'OK'
    });
}

function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    // Clear existing preview
    imagePreview.innerHTML = '';

    // Create preview card from thumbnail
    const col = document.createElement('div');
    col.className = 'col-12';
    
    const card = document.createElement('div');
    card.className = 'card';
    
    const img = document.createElement('img');
    img.src = item.thumbnail;
    img.className = 'card-img-top';
    img.alt = `Preview of ${item.fileName}`;
    img.style.maxHeight = '500px';
    img.style.objectFit = 'contain';
    
    const cardBody = document.createElement('div');
    cardBody.className = 'card-body text-center';
    
    const title = document.createElement('h5');
    title.className = 'card-title';
    title.textContent = item.fileName;
    
    const subtitle = document.createElement('p');
    subtitle.className = 'text-muted';
    subtitle.textContent = `Converted on ${item.date} | Pages: ${item.pageRange} | Format: ${item.format.toUpperCase()}`;
    
    cardBody.appendChild(title);
    cardBody.appendChild(subtitle);
    card.appendChild(img);
    card.appendChild(cardBody);
    col.appendChild(card);
    
    imagePreview.appendChild(col);

    showStatus(`Previewing ${item.fileName} (${item.pageRange})`, 'info');
    
    // Scroll to preview area
    imagePreview.scrollIntoView({ behavior: 'smooth' });
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

<!-- Include JSZip for ZIP file creation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>

<?php include '../../includes/footer.php'; ?>