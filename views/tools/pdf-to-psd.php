<?php
// SEO and Page Metadata
$page_title = "PDF to PSD Converter - Convert PDF to Photoshop Online Free"; // You may Change the Title here
$page_description = "Convert PDF to PSD online for free. Transform PDF files into editable Photoshop PSD format. Preserve layers and design elements. Instant, free conversion."; // Put your Description here
$page_keywords = "pdf to psd, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
                    <h1 class="h2">PDF to Image Converter <i class="fas fa-file-image text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Convert PDF pages to high-quality images (PNG/JPEG) for editing or further use. <br class="d-md-block d-none">
                    <small class="text-warning"><em>Note: Direct PSD conversion is a complex, server-side process. This tool extracts pages as images.</em></small>
                    </p>
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

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Conversion Options</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="pageRange" class="form-label">Page Range (e.g., 1-3,5)</label>
                                <input type="text" id="pageRange" class="form-control" placeholder="All pages (leave blank)">
                                <small class="text-muted">Specify pages to convert (e.g., 1-5, 8, 10-12).</small>
                            </div>
                            <div class="col-md-6">
                                <label for="resolution" class="form-label">Resolution (DPI)</label>
                                <input type="number" id="resolution" class="form-control" value="150" min="72" max="600" step="10">
                                <small class="text-muted">Higher DPI means better quality, larger file size.</small>
                            </div>
                            <div class="col-md-6">
                                <label for="outputFormat" class="form-label">Output Image Format</label>
                                <select id="outputFormat" class="form-select">
                                    <option value="png" selected>PNG (Lossless)</option>
                                    <option value="jpeg">JPEG (Compressed)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="jpegQuality" class="form-label d-none" id="jpegQualityLabel">JPEG Quality (1-100)</label>
                                <input type="range" id="jpegQuality" class="form-range d-none" min="1" max="100" value="90">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="convertBtn" disabled>
                        <i class="fas fa-exchange-alt me-2"></i> Convert Pages to Images
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                    <button class="btn btn-success btn-md px-2" id="downloadBtn" disabled>
                        <i class="fas fa-download me-2"></i> Download Images (ZIP)
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="preview-area card mt-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-image me-2"></i>Image Preview</h5>
                        <span class="badge bg-info" id="imageCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <div id="imagePreviewContainer" class="p-3 text-center text-muted">
                            Upload PDF to see image preview.
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
                <?php include '../../views/content/pdf-to-psd-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.5.0/jszip.min.js"></script>
<script>
// Configure PDF.js worker source
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

let pdfFile = null;
let convertedImages = []; // Stores Data URLs of generated images
let conversionHistory = JSON.parse(localStorage.getItem('pdfToImageConversionHistory')) || [];

// Initialize elements
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const imagePreviewContainer = document.getElementById('imagePreviewContainer');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const pageRangeInput = document.getElementById('pageRange');
const resolutionInput = document.getElementById('resolution');
const outputFormatSelect = document.getElementById('outputFormat');
const jpegQualityLabel = document.getElementById('jpegQualityLabel');
const jpegQualityInput = document.getElementById('jpegQuality');
const imageCountSpan = document.getElementById('imageCount');

// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertPdfToImages);
downloadBtn.addEventListener('click', downloadImagesAsZip);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
outputFormatSelect.addEventListener('change', toggleJpegQuality);

// Initialize history display
displayHistory();
toggleJpegQuality(); // Set initial state for JPEG quality slider

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PDF to Image Converter',
        html: `Follow these steps to convert your PDFs to images:<br><br>
        <ol class="text-start">
            <li>Upload a PDF file by clicking "Select PDF File" or dragging it into the drop zone.</li>
            <li>Specify a page range (optional), resolution (DPI), and output image format (PNG/JPEG).</li>
            <li>Click "Convert Pages to Images" to generate the image preview.</li>
            <li>Download your converted images as a ZIP file.</li>
        </ol>
        <p class="text-warning mt-3"><em>Note: Direct PSD conversion is not supported client-side due to format complexity.</em></p>
        `,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    pdfFile = null;
    convertedImages = [];
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    imagePreviewContainer.innerHTML = 'Upload PDF to see image preview.';
    imageCountSpan.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset options
    pageRangeInput.value = '';
    resolutionInput.value = '150';
    outputFormatSelect.value = 'png';
    jpegQualityInput.value = '90';
    toggleJpegQuality(); // Hide/show JPEG quality
}

// Toggle JPEG Quality Slider Visibility
function toggleJpegQuality() {
    if (outputFormatSelect.value === 'jpeg') {
        jpegQualityLabel.classList.remove('d-none');
        jpegQualityInput.classList.remove('d-none');
    } else {
        jpegQualityLabel.classList.add('d-none');
        jpegQualityInput.classList.add('d-none');
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
    if (file.size > 50 * 1024 * 1024) { // Max 50MB for PDF
        showError('File must be less than 50MB.');
        Swal.fire({
            title: 'File Too Large',
            text: 'The PDF file must be less than 50MB.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    pdfFile = file;
    fileInfo.textContent = `${pdfFile.name} selected.`;
    convertBtn.disabled = false;
    downloadBtn.disabled = true; // Disable download until conversion
    imagePreviewContainer.innerHTML = 'Upload PDF to see image preview.'; // Clear old preview
    imageCountSpan.textContent = '';
    showStatus('PDF file ready for conversion.', 'info');
    
    Swal.fire({
        title: 'File Added',
        text: `${pdfFile.name} has been selected for conversion.`,
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// Convert PDF to Images
async function convertPdfToImages() {
    if (!pdfFile) {
        showError('No PDF file selected. Please upload a file first.');
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
    convertedImages = [];
    imagePreviewContainer.innerHTML = '';
    imageCountSpan.textContent = '';

    const swalInstance = Swal.fire({
        title: 'Converting PDF',
        html: 'Please wait, this may take a moment depending on file size and page count...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        },
        allowOutsideClick: false,
        allowEscapeKey: false
    });

    try {
        const fileReader = new FileReader();
        fileReader.readAsArrayBuffer(pdfFile);

        fileReader.onload = async () => {
            const pdfData = new Uint8Array(fileReader.result);
            const loadingTask = pdfjsLib.getDocument({ data: pdfData });
            const pdf = await loadingTask.promise;

            const totalPages = pdf.numPages;
            const pageRange = pageRangeInput.value.trim();
            let pagesToConvert = [];

            if (pageRange) {
                // Parse page range (e.g., "1-3,5,7-9")
                const parts = pageRange.split(',').map(s => s.trim());
                for (const part of parts) {
                    if (part.includes('-')) {
                        let [start, end] = part.split('-').map(Number);
                        start = Math.max(1, start);
                        end = Math.min(totalPages, end);
                        for (let i = start; i <= end; i++) {
                            if (!pagesToConvert.includes(i)) pagesToConvert.push(i);
                        }
                    } else {
                        const pageNum = Number(part);
                        if (pageNum >= 1 && pageNum <= totalPages && !pagesToConvert.includes(pageNum)) {
                            pagesToConvert.push(pageNum);
                        }
                    }
                }
                pagesToConvert.sort((a, b) => a - b);
            } else {
                // Convert all pages if no range specified
                for (let i = 1; i <= totalPages; i++) {
                    pagesToConvert.push(i);
                }
            }

            if (pagesToConvert.length === 0) {
                throw new Error('No valid pages found in the specified range.');
            }

            const resolution = parseFloat(resolutionInput.value);
            const outputFormat = outputFormatSelect.value; // 'png' or 'jpeg'
            const jpegQuality = outputFormat === 'jpeg' ? parseInt(jpegQualityInput.value) / 100 : 1.0;

            for (const pageNum of pagesToConvert) {
                const page = await pdf.getPage(pageNum);
                const viewport = page.getViewport({ scale: resolution / 72 }); // 72 DPI is default PDF unit

                const canvas = document.createElement('canvas');
                const canvasContext = canvas.getContext('2d');
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                const renderContext = {
                    canvasContext,
                    viewport,
                };
                await page.render(renderContext).promise;

                const imageDataUrl = outputFormat === 'png' 
                    ? canvas.toDataURL('image/png') 
                    : canvas.toDataURL('image/jpeg', jpegQuality);
                
                convertedImages.push({
                    name: `${pdfFile.name.replace('.pdf', '')}_page${pageNum}.${outputFormat}`,
                    dataUrl: imageDataUrl,
                    format: outputFormat
                });
                displayImagePreview(imageDataUrl, pageNum);
                imageCountSpan.textContent = `Pages converted: ${convertedImages.length}/${pagesToConvert.length}`;
            }

            swalInstance.close();
            showStatus(`Conversion complete! ${convertedImages.length} images generated.`, 'success');
            convertBtn.disabled = false;
            downloadBtn.disabled = convertedImages.length === 0;

            Swal.fire({
                title: 'Conversion Complete!',
                html: `Your PDF has been successfully converted to ${convertedImages.length} images.`,
                icon: 'success',
                confirmButtonText: 'Great!',
                timer: 2000,
                timerProgressBar: true
            });

            // Add to history
            addToHistory({
                fileName: pdfFile.name,
                date: new Date().toLocaleString(),
                format: outputFormat,
                imageDataUrls: convertedImages.map(img => img.dataUrl), // Store data URLs
                options: {
                    pageRange: pageRangeInput.value,
                    resolution: resolutionInput.value,
                    outputFormat: outputFormatSelect.value,
                    jpegQuality: jpegQualityInput.value
                }
            });

        };
        fileReader.onerror = (e) => {
            throw new Error(`Error reading PDF file: ${e.target.error.name}`);
        };

    } catch (error) {
        swalInstance.close();
        showError(`Error during conversion: ${error.message}`);
        convertBtn.disabled = false;
        downloadBtn.disabled = true;
        Swal.fire({
            title: 'Conversion Error',
            text: error.message,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// Display Image Preview
function displayImagePreview(imageDataUrl, pageNum) {
    if (imagePreviewContainer.innerHTML === 'Upload PDF to see image preview.') {
        imagePreviewContainer.innerHTML = ''; // Clear initial message
    }
    const imgDiv = document.createElement('div');
    imgDiv.className = 'col-6 col-md-4 col-lg-3 p-1 d-inline-block align-top'; // Adjust column classes for responsiveness
    imgDiv.style.width = '150px'; // Fixed width for small previews
    imgDiv.style.height = 'auto';
    imgDiv.style.verticalAlign = 'top';
    imgDiv.style.border = '1px solid #eee';
    imgDiv.style.margin = '5px';
    imgDiv.style.overflow = 'hidden';
    imgDiv.style.display = 'inline-block';
    
    const img = document.createElement('img');
    img.src = imageDataUrl;
    img.alt = `Page ${pageNum} Preview`;
    img.style.width = '100%';
    img.style.height = 'auto';
    img.style.display = 'block';

    const pageLabel = document.createElement('div');
    pageLabel.textContent = `Page ${pageNum}`;
    pageLabel.className = 'text-center small text-muted mt-1';
    
    imgDiv.appendChild(img);
    imgDiv.appendChild(pageLabel);
    imagePreviewContainer.appendChild(imgDiv);
}


// Download Images as ZIP
async function downloadImagesAsZip() {
    if (convertedImages.length === 0) {
        showError('No images to download. Please convert PDF first.');
        Swal.fire({
            title: 'No Images',
            text: 'No images to download. Please convert PDF first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Creating ZIP file for download...', 'info');
    
    const swalInstance = Swal.fire({
        title: 'Zipping Images',
        html: 'Please wait while we prepare your image files for download...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        },
        allowOutsideClick: false,
        allowEscapeKey: false
    });

    try {
        const zip = new JSZip();
        for (const [index, image] of convertedImages.entries()) {
            const base64Data = image.dataUrl.split(',')[1];
            zip.file(image.name, base64Data, { base64: true });
        }

        const zipBlob = await zip.generateAsync({ type: 'blob' });
        const downloadFileName = pdfFile.name.replace('.pdf', '') + '_images.zip';

        const url = URL.createObjectURL(zipBlob);
        const a = document.createElement('a');
        a.href = url;
        a.download = downloadFileName;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);

        swalInstance.close();
        showStatus('ZIP file downloaded successfully!', 'success');
        Swal.fire({
            title: 'Download Complete',
            text: 'Your image ZIP file has been downloaded.',
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });

    } catch (error) {
        swalInstance.close();
        showError(`Error creating ZIP file: ${error.message}`);
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
        imageDataUrls: item.imageDataUrls,
        options: item.options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('pdfToImageConversionHistory', JSON.stringify(conversionHistory));
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
            <td>${item.format.toUpperCase()} (Images)</td>
            <td class="text-end">
                <button class="btn btn-sm btn-outline-primary download-history" data-id="${item.id}" title="Download ZIP">
                    <i class="fas fa-download"></i>
                </button>
                <button class="btn btn-sm btn-outline-secondary preview-history ms-1" data-id="${item.id}" title="Preview Pages">
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
            localStorage.setItem('pdfToImageConversionHistory', JSON.stringify(conversionHistory));
            displayHistory();
            Swal.fire(
                'Deleted!',
                'Your history item has been deleted.',
                'success'
            )
        }
    });
}

async function downloadHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.imageDataUrls || item.imageDataUrls.length === 0) {
        showError('No images to download for this history item.');
        Swal.fire('Error', 'No images to download for this history item.', 'error');
        return;
    }

    showStatus(`Downloading ${item.fileName} images...`, 'info');
    const swalInstance = Swal.fire({
        title: 'Zipping Images',
        html: `Preparing ${item.fileName} images for download...`,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        },
        allowOutsideClick: false,
        allowEscapeKey: false
    });

    try {
        const zip = new JSZip();
        for (const [index, dataUrl] of item.imageDataUrls.entries()) {
            const base64Data = dataUrl.split(',')[1];
            // Reconstruct file name based on history options
            const originalFileName = item.fileName.replace('.pdf', '');
            const outputFormat = item.options.outputFormat;
            zip.file(`${originalFileName}_page${index + 1}.${outputFormat}`, base64Data, { base64: true });
        }

        const zipBlob = await zip.generateAsync({ type: 'blob' });
        const downloadFileName = item.fileName.replace('.pdf', '') + '_images_history.zip';

        const url = URL.createObjectURL(zipBlob);
        const a = document.createElement('a');
        a.href = url;
        a.download = downloadFileName;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);

        swalInstance.close();
        showStatus('ZIP file downloaded successfully!', 'success');
        Swal.fire({
            title: 'Download Complete',
            text: 'Your image ZIP file has been downloaded.',
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });

    } catch (error) {
        swalInstance.close();
        showError(`Error creating ZIP file from history: ${error.message}`);
        Swal.fire({
            title: 'Download Error',
            text: error.message,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}


function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.imageDataUrls || item.imageDataUrls.length === 0) {
        showError('No images to preview for this history item.');
        Swal.fire('Error', 'No images to preview for this history item.', 'error');
        return;
    }

    imagePreviewContainer.innerHTML = ''; // Clear current preview
    imageCountSpan.textContent = `Pages converted: ${item.imageDataUrls.length}`;
    
    item.imageDataUrls.forEach((dataUrl, index) => {
        // Reconstruct page number if possible, or just use index + 1
        const pageNum = index + 1; // Simplistic, assumes sequential pages
        displayImagePreview(dataUrl, pageNum);
    });

    statusArea.textContent = `Previewing images from ${item.fileName}`;
    statusArea.className = 'text-center text-info';
    
    // Scroll to preview area
    imagePreviewContainer.scrollIntoView({ behavior: 'smooth' });
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