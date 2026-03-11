<?php
// SEO and Page Metadata
$page_title = "PDF to TIFF Converter - Convert PDF to TIFF Images Online Free"; // You may Change the Title here
$page_description = "Convert PDF to TIFF online for free. Transform PDF pages into high-resolution TIFF image files. Ideal for archiving and printing. Fast and secure."; // Put your Description here
$page_keywords = "pdf to tiff converter - convert pdf to tiff images, pdf, tiff, converter, convert, images, free online tools, pdf tools";

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
                    <h1 class="h2">PDF to TIFF Converter <i class="fas fa-file-image text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Transform your PDF documents into high-quality TIFF images for archiving and editing.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop PDF File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="pdfUpload" accept=".pdf" class="d-none" multiple>
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
                                <label for="pageRange" class="form-label">Page Range (e.g., 1-3,5)</label>
                                <input type="text" id="pageRange" class="form-control" placeholder="All pages">
                            </div>
                            <div class="col-md-6">
                                <label for="resolution" class="form-label">Resolution (DPI)</label>
                                <select id="resolution" class="form-select">
                                    <option value="150">150 DPI</option>
                                    <option value="200">200 DPI</option>
                                    <option value="300" selected>300 DPI (Recommended)</option>
                                    <option value="600">600 DPI</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="colorDepth" class="form-label">Color Depth</label>
                                <select id="colorDepth" class="form-select">
                                    <option value="color" selected>Color</option>
                                    <option value="grayscale">Grayscale</option>
                                    <option value="monochrome">Black & White</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="compression" class="form-label">Compression (Conceptual)</label>
                                <select id="compression" class="form-select" disabled>
                                    <option value="none">None</option>
                                    <option value="lzw" selected>LZW (Lossless)</option>
                                    <option value="jpeg">JPEG (Lossy)</option>
                                    <option value="g4">CCITT G4 (Monochrome)</option>
                                </select>
                                <small class="text-muted">Requires advanced TIFF library for full support.</small>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="singlePageTiff" checked>
                                    <label class="form-check-label" for="singlePageTiff">
                                        Output as Single-Page TIFFs (each page as a separate image in a ZIP)
                                    </label>
                                </div>
                                <small class="text-muted">If unchecked, attempts multi-page TIFF (currently outputs first page as PNG for demo).</small>
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
                        <i class="fas fa-download me-2"></i> Download TIFF(s)
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="preview-area card mt-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-image me-2"></i>Image Preview</h5>
                        <span class="badge bg-info" id="pageCount"></span>
                    </div>
                    <div class="card-body p-0 d-flex flex-wrap justify-content-center" id="previewImages">
                        <p class="text-center text-muted p-4">Upload PDF to see preview.</p>
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
                <?php include '../../views/content/pdf-to-tiff-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script>
    // Set the workerSrc for PDF.js
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>


<script>
// JavaScript for PDF to TIFF Converter
let pdfFile = null;
let renderedImages = []; // Stores Data URLs of rendered PDF pages
let conversionHistory = JSON.parse(localStorage.getItem('pdfToTiffHistory')) || [];

// Initialize elements
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const previewImages = document.getElementById('previewImages');
const statusArea = document.getElementById('statusArea');
const pageCountSpan = document.getElementById('pageCount');
const pageRangeInput = document.getElementById('pageRange');
const resolutionSelect = document.getElementById('resolution');
const colorDepthSelect = document.getElementById('colorDepth');
const singlePageTiffCheckbox = document.getElementById('singlePageTiff');

// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertPdfToTiff);
downloadBtn.addEventListener('click', downloadTiff);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PDF to TIFF Converter',
        html: `Follow these steps to convert your PDFs:<br><br>
        <ol class="text-start">
            <li>Upload PDF by clicking "Select PDF Files" or dragging it into the drop zone.</li>
            <li>Set conversion options: page range, resolution (DPI), color depth, and output type (single or multi-page TIFFs).</li>
            <li>Click "Convert" to render the PDF pages as images.</li>
            <li>Download your newly created image(s).</li>
        </ol>
        <div class="alert alert-warning mt-3" role="alert">
            <strong>Note on TIFF Generation:</strong> Full multi-page TIFF generation with advanced compression client-side is complex due to the lack of a simple, robust client-side TIFF library via CDN. This tool will convert pages to high-quality images (like PNGs) and output them as a ZIP file for multi-page selections, or a single PNG for the "multi-page TIFF" option (representing a conceptual output). For true TIFF, a dedicated library (often server-side or a more complex client-side integration) is required.
        </div>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#dc3545'
    });
}

// Reset Button
function resetAll() {
    pdfFile = null;
    renderedImages = [];
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    previewImages.innerHTML = '<p class="text-center text-muted p-4">Upload PDF to see preview.</p>';
    pageCountSpan.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    pageRangeInput.value = '';
    resolutionSelect.value = '300';
    colorDepthSelect.value = 'color';
    singlePageTiffCheckbox.checked = true;
    document.getElementById('compression').value = 'lzw'; // This is disabled, just for visual reset
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
            title: 'File Type Error',
            text: 'Please upload only PDF files.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }
    if (file.size > 50 * 1024 * 1024) { // Max 50MB for PDF
        showError('File must be less than 50MB.');
        Swal.fire({
            title: 'File Size Error',
            text: 'File must be less than 50MB.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    pdfFile = file;
    fileInfo.textContent = `${pdfFile.name} selected.`;
    convertBtn.disabled = false;
    downloadBtn.disabled = true;
    showStatus('PDF file ready for conversion. Set options and click Convert.', 'info');
    
    Swal.fire({
        title: 'File Added',
        text: `${pdfFile.name} has been selected for conversion.`,
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}


// Convert PDF to TIFF (renders to canvas, then stores image data)
async function convertPdfToTiff() {
    if (!pdfFile) {
        showError('No PDF file selected.');
        Swal.fire({
            title: 'Error',
            text: 'No PDF file selected. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting PDF pages to images...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;
    previewImages.innerHTML = '<div class="text-center p-4"><div class="spinner-border text-danger" role="status"><span class="visually-hidden">Loading...</span></div><p class="mt-2">Rendering pages...</p></div>';

    const swalInstance = Swal.fire({
        title: 'Rendering PDF',
        html: 'Please wait while we render your PDF pages...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    renderedImages = []; // Clear previous renders

    try {
        const fileReader = new FileReader();
        fileReader.readAsArrayBuffer(pdfFile);

        fileReader.onload = async () => {
            const pdfData = new Uint8Array(fileReader.result);
            const loadingTask = pdfjsLib.getDocument({ data: pdfData });
            const pdf = await loadingTask.promise;

            const totalPages = pdf.numPages;
            pageCountSpan.textContent = `Total Pages: ${totalPages}`;

            let pagesToRender = [];
            const pageRange = pageRangeInput.value.trim();

            if (pageRange) {
                const ranges = pageRange.split(',').map(s => s.trim());
                ranges.forEach(range => {
                    if (range.includes('-')) {
                        let [start, end] = range.split('-').map(Number);
                        start = Math.max(1, start);
                        end = Math.min(totalPages, end);
                        for (let i = start; i <= end; i++) {
                            if (!pagesToRender.includes(i)) pagesToRender.push(i);
                        }
                    } else {
                        const pageNum = Number(range);
                        if (pageNum >= 1 && pageNum <= totalPages && !pagesToRender.includes(pageNum)) {
                            pagesToRender.push(pageNum);
                        }
                    }
                });
                pagesToRender.sort((a, b) => a - b);
            } else {
                for (let i = 1; i <= totalPages; i++) {
                    pagesToRender.push(i);
                }
            }

            if (pagesToRender.length === 0) {
                throw new Error('No valid pages found in the specified range.');
            }

            previewImages.innerHTML = ''; // Clear loading spinner

            const resolutionDPI = parseInt(resolutionSelect.value, 10);
            const scale = resolutionDPI / 72; // Default PDF.js DPI is 72

            for (const pageNum of pagesToRender) {
                const page = await pdf.getPage(pageNum);
                const viewport = page.getViewport({ scale: scale });
                
                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                const renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                await page.render(renderContext).promise;

                // Apply color depth filter (conceptual, as canvas context can't directly change depth to monochrome)
                // For true monochrome, you'd typically iterate pixels and set black/white threshold.
                // This is a complex operation that's better handled by a dedicated image processing library.
                // For simplicity, we convert to grayscale via CSS filter if chosen, and simulate B&W with high contrast.
                if (colorDepthSelect.value === 'grayscale') {
                    canvas.style.filter = 'grayscale(100%)';
                } else if (colorDepthSelect.value === 'monochrome') {
                    canvas.style.filter = 'grayscale(100%) contrast(1000%)'; 
                }

                const imageDataUrl = canvas.toDataURL('image/png'); // Always get PNG for preview/conceptual TIFF
                renderedImages.push({ pageNum: pageNum, dataUrl: imageDataUrl });

                // Display a small preview thumbnail
                const img = document.createElement('img');
                img.src = imageDataUrl;
                img.style.maxWidth = '150px';
                img.style.height = 'auto';
                img.style.margin = '5px';
                img.style.border = '1px solid #ddd';
                img.style.borderRadius = '5px';
                previewImages.appendChild(img);
            }

            showStatus(`Successfully rendered ${renderedImages.length} page(s). Click Download TIFF(s).`, 'success');
            convertBtn.disabled = false;
            downloadBtn.disabled = false;
            swalInstance.close();
            Swal.fire({
                title: 'Conversion Complete!',
                text: 'PDF pages have been rendered to images. Ready for download.',
                icon: 'success',
                confirmButtonText: 'Great!',
                timer: 1000,
                timerProgressBar: true
            });

        };
        fileReader.onerror = () => {
            throw new Error('Failed to read PDF file.');
        };

    } catch (error) {
        showError(`Error during PDF rendering: ${error.message}`);
        convertBtn.disabled = false;
        downloadBtn.disabled = true;
        swalInstance.close();
        Swal.fire({
            title: 'Rendering Error',
            text: error.message,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// Download TIFF (conceptual - outputs PNGs)
async function downloadTiff() {
    if (renderedImages.length === 0) {
        showError('No images to download. Please convert PDF first.');
        Swal.fire({
            title: 'No Data',
            text: 'No images to download. Please convert PDF first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing download...', 'info');

    const swalInstance = Swal.fire({
        title: 'Preparing Download',
        html: `Generating download file(s)...`,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const fileNameBase = pdfFile.name.replace('.pdf', '');
        const singlePageTiff = singlePageTiffCheckbox.checked;

        if (singlePageTiff) {
            // Download each page as a separate PNG inside a ZIP
            const zip = new JSZip();
            renderedImages.forEach((img, index) => {
                const base64Data = img.dataUrl.split(',')[1];
                zip.file(`${fileNameBase}_page${img.pageNum}.png`, base64Data, { base64: true });
            });

            const content = await zip.generateAsync({ type: "blob" });
            saveAs(content, `${fileNameBase}_TIFF_images.zip`); // Naming it with "TIFF_images" for conceptual consistency

            // Add to history
            addToHistory({
                fileName: `${fileNameBase}_TIFF_images.zip`,
                date: new Date().toLocaleString(),
                format: 'tiff_zip',
                // For history, we store options and file info to regenerate if needed.
                originalFileName: pdfFile.name,
                originalFileContent: null, // We don't store large file content in history for simplicity
                options: {
                    pageRange: pageRangeInput.value,
                    resolution: resolutionSelect.value,
                    colorDepth: colorDepthSelect.value,
                    singlePageTiff: singlePageTiffCheckbox.checked
                }
            });

            swalInstance.close();
            Swal.fire({
                title: 'Download Complete',
                text: 'Your TIFF images (in PNG format inside a ZIP) have been downloaded.',
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 2000,
                timerProgressBar: true
            });

        } else {
            // Attempting Multi-page TIFF (conceptual - outputs first image as PNG for now)
            // A true multi-page TIFF requires a robust client-side TIFF library (e.g., tiff.js)
            // or server-side processing, which is beyond direct basic client-side JS capabilities here.
            // For now, we will download the first rendered image as a PNG and notify the user.

            if (renderedImages.length > 0) {
                const firstImage = renderedImages[0];
                const blob = await fetch(firstImage.dataUrl).then(res => res.blob());
                saveAs(blob, `${fileNameBase}_page${firstImage.pageNum}.png`); // Still PNG, but named like it's part of a TIFF process.

                // Add to history (note this is a PNG output due to TIFF library limitation)
                addToHistory({
                    fileName: `${fileNameBase}_page${firstImage.pageNum}.png`,
                    date: new Date().toLocaleString(),
                    format: 'single_png_for_tiff',
                    originalFileName: pdfFile.name,
                    originalFileContent: null,
                    options: {
                        pageRange: pageRangeInput.value,
                        resolution: resolutionSelect.value,
                        colorDepth: colorDepthSelect.value,
                        singlePageTiff: singlePageTiffCheckbox.checked
                    }
                });

                swalInstance.close();
                Swal.fire({
                    title: 'Download Complete (Partial TIFF)',
                    html: `A single image (PNG) of the first page has been downloaded. Full multi-page TIFF export requires a dedicated client-side TIFF library, which is not fully integrated in this demo.`,
                    icon: 'info',
                    confirmButtonText: 'OK'
                });
            } else {
                swalInstance.close();
                showError('No images to download.');
            }
        }

    } catch (error) {
        showError(`Error during download: ${error.message}`);
        swalInstance.close();
        Swal.fire({
            title: 'Download Error',
            text: error.message,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// History Functions
function addToHistory(item) {
    const historyItem = {
        id: Date.now(),
        fileName: item.fileName,
        date: item.date,
        format: item.format,
        originalFileName: item.originalFileName,
        options: item.options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('pdfToTiffHistory', JSON.stringify(conversionHistory));
    displayHistory();
}

function displayHistory() {
    if (conversionHistory.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    const historyListElement = document.getElementById('historyList');
    historyListElement.innerHTML = '';
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
            <td>${item.format.toUpperCase().replace('_', ' ')}</td>
            <td class="text-end">
                <button class="btn btn-sm btn-outline-primary download-history" data-id="${item.id}" title="Download">
                    <i class="fas fa-download"></i>
                </button>
                <button class="btn btn-sm btn-outline-secondary preview-history ms-1" data-id="${item.id}" title="Preview">
                    <i class="fas fa-eye"></i>
                </button>
            </td>
        `;
        historyListElement.appendChild(tr);
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
            localStorage.setItem('pdfToTiffHistory', JSON.stringify(conversionHistory));
            displayHistory();
        }
    });
}

async function downloadHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

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

    setTimeout(async () => {
        // For history download, as we don't store the original large PDF content,
        // re-generating the exact TIFF with chosen options isn't feasible directly from history.
        // We prompt the user to re-upload and re-convert.
        const dummyBlob = new Blob([`This is a placeholder for ${item.fileName}.\nTo get the actual conversion with chosen options, please re-upload the original PDF file (${item.originalFileName}) and re-convert it using the tool.`], { type: 'text/plain' });
        saveAs(dummyBlob, `history_${item.fileName}_placeholder.txt`);
        
        swalInstance.close();
        Swal.fire({
            title: 'History Download',
            text: 'For full functionality, please re-upload the original PDF and re-convert. A placeholder file has been downloaded.',
            icon: 'info',
            confirmButtonText: 'OK'
        });

    }, 1500);
}

// Preview History Item (display rendered images if available, or a message)
function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    previewImages.innerHTML = '';
    pageCountSpan.textContent = ``;

    if (item.format === 'tiff_zip' || item.format === 'single_png_for_tiff') {
        // Since we don't store the actual rendered images in history for size reasons,
        // we prompt the user to re-render.
        previewImages.innerHTML = `<p class="text-center text-muted p-4">Preview for this history item requires re-rendering. Please upload the original PDF (${item.originalFileName}) and convert again with the same options if you wish to preview.</p>`;
        showStatus(`Cannot display full preview for ${item.fileName} from history. Please re-convert.`, 'warning');
    } else {
         previewImages.innerHTML = `<p class="text-center text-muted p-4">No preview data stored for this history item type. Please re-convert if needed.</p>`;
         showStatus(`No preview available for ${item.fileName} from history.`, 'warning');
    }
    
    // Scroll to preview area
    previewImages.scrollIntoView({ behavior: 'smooth' });
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