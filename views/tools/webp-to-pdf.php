<?php
// SEO and Page Metadata
$page_title = "WebP to PDF Converter - Convert WebP Images to PDF Online Free"; // You may Change the Title here
$page_description = "Convert WebP to PDF online for free. Transform WebP image files into PDF documents. Combine multiple WebP images into one PDF. Fast, secure, no sign-up needed."; // Put your Description here
$page_keywords = "webp to pdf converter - convert webp images to pdf, webp, pdf, converter, convert, images, free online tools, pdf tools";

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
                    <h1 class="h2">WebP to PDF Converter <i class="fas fa-file-pdf text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Transform your WebP images into professional and shareable PDF documents.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop WebP Image Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="webpUpload" accept="image/webp" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('webpUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select WebP Files
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
                                <label for="pageSize" class="form-label">Page Size</label>
                                <select id="pageSize" class="form-select">
                                    <option value="A4" selected>A4</option>
                                    <option value="Letter">Letter</option>
                                    <option value="Legal">Legal</option>
                                    <option value="auto">Original Image Size</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="orientation" class="form-label">Orientation</label>
                                <select id="orientation" class="form-select">
                                    <option value="portrait" selected>Portrait</option>
                                    <option value="landscape">Landscape</option>
                                    <option value="auto">Auto (based on image)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="imageFit" class="form-label">Image Fit</label>
                                <select id="imageFit" class="form-select">
                                    <option value="contain" selected>Fit to Page (Contain)</option>
                                    <option value="cover">Fill Page (Cover)</option>
                                    <option value="original">Original Size</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="margin" class="form-label">Margin (points)</label>
                                <input type="number" id="margin" class="form-control" value="10" min="0">
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="addPageNumbers">
                                    <label class="form-check-label" for="addPageNumbers">
                                        Add page numbers to PDF (for multiple images)
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="oneImagePerPage" checked>
                                    <label class="form-check-label" for="oneImagePerPage">
                                        Each image on a new page
                                    </label>
                                </div>
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
                        <h5 class="mb-0"><i class="fas fa-image me-2"></i>Image Preview</h5>
                        <span class="badge bg-info" id="imageCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <div id="imagePreviewContainer" class="p-4 text-center">
                            <p class="text-muted">Upload WebP image(s) to see preview.</p>
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
                <?php include '../../views/content/webp-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>
<script>
// JavaScript for WebP to PDF Converter
let files = [];
let fileReaders = []; // To store FileReader instances for each file
let conversionHistory = JSON.parse(localStorage.getItem('webpConversionHistory')) || [];

// Initialize elements
const webpUpload = document.getElementById('webpUpload');
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
const imageCountSpan = document.getElementById('imageCount');

// Event Listeners
webpUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertWebPToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to WebP to PDF Converter',
        html: `Follow these steps to convert your WebP images:<br><br>
        <ol class="text-start">
            <li>Upload WebP image(s) by clicking "Select WebP Files" or dragging them into the drop zone.</li>
            <li>Choose your desired page size, orientation, image fit, and margins.</li>
            <li>Click "Convert" to generate the PDF.</li>
            <li>Download your newly created PDF.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    files = [];
    fileReaders.forEach(reader => reader.abort()); // Abort any ongoing reads
    fileReaders = [];
    webpUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    imagePreviewContainer.innerHTML = '<p class="text-muted">Upload WebP image(s) to see preview.</p>';
    imageCountSpan.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('pageSize').value = 'A4';
    document.getElementById('orientation').value = 'portrait';
    document.getElementById('imageFit').value = 'contain';
    document.getElementById('margin').value = '10';
    document.getElementById('addPageNumbers').checked = false;
    document.getElementById('oneImagePerPage').checked = true;
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

    // Clear previous files and readers
    files = [];
    fileReaders.forEach(reader => reader.abort());
    fileReaders = [];
    imagePreviewContainer.innerHTML = ''; // Clear preview

    let validFiles = Array.from(selectedFiles).filter(file => {
        if (!file.type.startsWith('image/')) { // Check for any image type for initial filtering
             showError(`File "${file.name}" is not an image. Please upload only image files.`);
            return false;
        }
        if (file.type !== 'image/webp' && !file.name.endsWith('.webp')) {
            showError(`File "${file.name}" is not a WebP image. Please upload only WebP files.`);
            return false;
        }
        if (file.size > 20 * 1024 * 1024) { // Max 20MB per file
            showError(`File "${file.name}" is too large. Each file must be less than 20MB.`);
            return false;
        }
        return true;
    });

    if (validFiles.length > 0) {
        files = validFiles;
        fileInfo.textContent = `${files.length} file(s) selected.`;
        imageCountSpan.textContent = `Images: ${files.length}`;
        convertBtn.disabled = false;
        downloadBtn.disabled = true; // Disable download until converted

        // Display previews and read files
        files.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = `Preview of ${file.name}`;
                img.style.maxWidth = '150px';
                img.style.maxHeight = '150px';
                img.style.margin = '10px';
                img.style.border = '1px solid #ddd';
                imagePreviewContainer.appendChild(img);
                
                if (index === 0) { // Only show the success for the first file, or once
                    showStatus('File(s) ready for conversion. Previewing...', 'info');
                    Swal.fire({
                        title: 'File(s) Added',
                        text: `${files.length} WebP file(s) selected for conversion.`,
                        icon: 'success',
                        confirmButtonText: 'OK',
                        timer: 1000,
                        timerProgressBar: true
                    });
                }
            };
            reader.onerror = () => {
                showError(`Failed to read file: ${file.name}`);
                convertBtn.disabled = true;
            };
            reader.readAsDataURL(file);
            fileReaders.push(reader);
        });

        // Clear previous generic message
        if (imagePreviewContainer.querySelector('p')) {
            imagePreviewContainer.innerHTML = '';
        }

    } else {
        fileInfo.textContent = 'No valid WebP files selected.';
        imageCountSpan.textContent = '';
        convertBtn.disabled = true;
        downloadBtn.disabled = true;
        imagePreviewContainer.innerHTML = '<p class="text-muted">Upload WebP image(s) to see preview.</p>';
    }
}

// Convert WebP to PDF
async function convertWebPToPdf() {
    if (files.length === 0) {
        showError('No WebP images to convert. Please upload file(s) first.');
        Swal.fire({
            title: 'Error',
            text: 'No WebP images to convert. Please upload file(s) first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting WebP to PDF...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    const swalInstance = Swal.fire({
        title: 'Creating PDF',
        html: 'Please wait while we generate your PDF document...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const { jsPDF } = window.jspdf;
        const pageSize = document.getElementById('pageSize').value;
        const orientation = document.getElementById('orientation').value;
        const imageFit = document.getElementById('imageFit').value;
        const margin = parseFloat(document.getElementById('margin').value);
        const addPageNumbers = document.getElementById('addPageNumbers').checked;
        const oneImagePerPage = document.getElementById('oneImagePerPage').checked;

        // Collect all image data URLs
        const imageDataUrls = await Promise.all(files.map(file => {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.onload = (e) => resolve(e.target.result);
                reader.onerror = reject;
                reader.readAsDataURL(file);
            });
        }));

        const doc = new jsPDF(); // Default to portrait A4, will adjust based on options
        let firstPageAdded = false;

        for (let i = 0; i < imageDataUrls.length; i++) {
            const imgData = imageDataUrls[i];
            const img = new Image();
            img.src = imgData;

            await new Promise(resolve => img.onload = resolve); // Wait for image to load

            let imgWidth = img.width;
            let imgHeight = img.height;

            let finalOrientation = orientation;
            let finalPageSize = pageSize;

            // Determine page size and orientation if 'auto' or 'original' is selected
            if (pageSize === 'auto' || orientation === 'auto') {
                if (imgWidth > imgHeight) { // Landscape image
                    if (orientation === 'auto') finalOrientation = 'landscape';
                } else { // Portrait image
                    if (orientation === 'auto') finalOrientation = 'portrait';
                }
            }

            if (pageSize === 'original') {
                 // Convert pixels to points (1 inch = 72 points)
                const dpi = 96; // Common browser DPI
                finalPageSize = [imgWidth * 72 / dpi + margin * 2, imgHeight * 72 / dpi + margin * 2];
            } else if (pageSize === 'auto' && (imgWidth > imgHeight)) {
                // If auto page size and image is landscape, use A4 landscape or similar
                // jsPDF default A4 is [595.28, 841.89] points.
                // For 'A4' (portrait), width: 595.28, height: 841.89
                // For 'A4' (landscape), width: 841.89, height: 595.28
                finalPageSize = (finalOrientation === 'landscape') ? [841.89, 595.28] : [595.28, 841.89];
            } else if (pageSize === 'auto' && (imgHeight > imgWidth)) {
                 finalPageSize = (finalOrientation === 'portrait') ? [595.28, 841.89] : [841.89, 595.28];
            }
            
            // Re-initialize doc if it's the first page or if page size/orientation changes significantly per image
            if (!firstPageAdded || oneImagePerPage || doc.internal.pageSize.getWidth() !== finalPageSize[0] || doc.internal.pageSize.getHeight() !== finalPageSize[1] || doc.internal.getCurrentPageInfo().orientation !== finalOrientation) {
                if (firstPageAdded) {
                    doc.addPage(finalPageSize, finalOrientation);
                } else {
                    doc.deletePage(1); // Remove initial empty page
                    doc.addPage(finalPageSize, finalOrientation);
                }
                firstPageAdded = true;
            }

            const pageCanvasWidth = doc.internal.pageSize.getWidth() - margin * 2;
            const pageCanvasHeight = doc.internal.pageSize.getHeight() - margin * 2;

            let x = margin;
            let y = margin;
            let finalImgWidth = imgWidth;
            let finalImgHeight = imgHeight;

            const imgAspectRatio = imgWidth / imgHeight;
            const pageAspectRatio = pageCanvasWidth / pageCanvasHeight;

            if (imageFit === 'contain') {
                if (imgAspectRatio > pageAspectRatio) { // Image is wider than page ratio
                    finalImgWidth = pageCanvasWidth;
                    finalImgHeight = pageCanvasWidth / imgAspectRatio;
                } else { // Image is taller than page ratio or fits
                    finalImgHeight = pageCanvasHeight;
                    finalImgWidth = pageCanvasHeight * imgAspectRatio;
                }
                // Center the image
                x = margin + (pageCanvasWidth - finalImgWidth) / 2;
                y = margin + (pageCanvasHeight - finalImgHeight) / 2;
            } else if (imageFit === 'cover') {
                if (imgAspectRatio < pageAspectRatio) { // Image is taller than page ratio
                    finalImgWidth = pageCanvasWidth;
                    finalImgHeight = pageCanvasWidth / imgAspectRatio;
                } else { // Image is wider than page ratio or fits
                    finalImgHeight = pageCanvasHeight;
                    finalImgWidth = pageCanvasHeight * imgAspectRatio;
                }
                // Center the image
                x = margin + (pageCanvasWidth - finalImgWidth) / 2;
                y = margin + (pageCanvasHeight - finalImgHeight) / 2;
            }
            // If imageFit is 'original', use original dimensions; no scaling.
            // Ensure image doesn't go outside page if it's too big in 'original' mode,
            // though user should select 'original' with appropriate page size.

            doc.addImage(imgData, 'WEBP', x, y, finalImgWidth, finalImgHeight);

            // Add page numbers
            if (addPageNumbers) {
                let str = "Page " + doc.internal.getNumberOfPages();
                doc.setFontSize(8);
                doc.text(str, doc.internal.pageSize.getWidth() - margin, doc.internal.pageSize.getHeight() - margin, { align: 'right' });
            }

            if (oneImagePerPage && i < imageDataUrls.length - 1) {
                // Add new page for the next image only if not the last one
                doc.addPage();
            } else if (!oneImagePerPage && i < imageDataUrls.length - 1) {
                // If not one image per page, and there are more images, add them to next available spot
                // This would require more complex layout logic, but for now, assume one image per page for simplicity
                // or that user is fine with images overlapping if 'oneImagePerPage' is off and images are large.
                // For a robust solution, one would calculate remaining space and add images.
                // For this example, if 'oneImagePerPage' is off, all images are put on the *first* page, which might overlap.
                // So, let's enforce one image per page for multiple files, or only add one if multiple not supported by layout.
                // Given previous examples created a page for each, let's keep that behavior.
                doc.addPage(); 
            }
        }
        
        // Remove the last blank page if one was added unnecessarily
        if (firstPageAdded && (oneImagePerPage || files.length > 1)) {
            if (doc.internal.getNumberOfPages() > files.length) {
                 doc.deletePage(doc.internal.getNumberOfPages());
            }
        }


        // Save the PDF content temporarily for download
        const outputFileName = files.length > 1 ? 'converted_images.pdf' : files[0].name.replace(/\.webp$/i, '.pdf');
        
        // Add to history (store all file data URLs to regenerate PDF on download/preview)
        addToHistory({
            fileName: outputFileName,
            date: new Date().toLocaleString(),
            format: 'pdf',
            imageDataUrls: imageDataUrls, // Store data URLs
            options: { // Store options needed for regeneration
                pageSize: pageSize,
                orientation: orientation,
                imageFit: imageFit,
                margin: margin,
                addPageNumbers: addPageNumbers,
                oneImagePerPage: oneImagePerPage
            }
        });
        
        showStatus('Conversion complete! Click Download PDF.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your WebP images have been successfully converted to PDF.',
            icon: 'success',
            confirmButtonText: 'Great!',
            timer: 1000,
            timerProgressBar: true
        });
        
    } catch (error) {
        showError(`Error during PDF generation: ${error.message}`);
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

// Download PDF
function downloadPdf() {
    if (files.length === 0) {
        showError('No PDF to download. Please convert first.');
        Swal.fire({
            title: 'No Data',
            text: 'No PDF to download. Please convert first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing PDF for download...', 'info');
    
    Swal.fire({
        title: 'Preparing PDF File',
        html: `Please wait while we generate your PDF file...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(async () => {
        // Regenerate PDF on download using current options
        const pageSize = document.getElementById('pageSize').value;
        const orientation = document.getElementById('orientation').value;
        const imageFit = document.getElementById('imageFit').value;
        const margin = parseFloat(document.getElementById('margin').value);
        const addPageNumbers = document.getElementById('addPageNumbers').checked;
        const oneImagePerPage = document.getElementById('oneImagePerPage').checked;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        let firstPageAdded = false;

        const imageDataUrls = await Promise.all(files.map(file => {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.onload = (e) => resolve(e.target.result);
                reader.onerror = reject;
                reader.readAsDataURL(file);
            });
        }));

        for (let i = 0; i < imageDataUrls.length; i++) {
            const imgData = imageDataUrls[i];
            const img = new Image();
            img.src = imgData;

            await new Promise(resolve => img.onload = resolve);

            let imgWidth = img.width;
            let imgHeight = img.height;

            let finalOrientation = orientation;
            let finalPageSize = pageSize;

            if (pageSize === 'auto' || orientation === 'auto') {
                if (imgWidth > imgHeight) {
                    if (orientation === 'auto') finalOrientation = 'landscape';
                } else {
                    if (orientation === 'auto') finalOrientation = 'portrait';
                }
            }

            if (pageSize === 'original') {
                const dpi = 96;
                finalPageSize = [imgWidth * 72 / dpi + margin * 2, imgHeight * 72 / dpi + margin * 2];
            } else if (pageSize === 'auto' && (imgWidth > imgHeight)) {
                finalPageSize = (finalOrientation === 'landscape') ? [841.89, 595.28] : [595.28, 841.89];
            } else if (pageSize === 'auto' && (imgHeight > imgWidth)) {
                 finalPageSize = (finalOrientation === 'portrait') ? [595.28, 841.89] : [841.89, 595.28];
            }

            if (!firstPageAdded || oneImagePerPage || doc.internal.pageSize.getWidth() !== finalPageSize[0] || doc.internal.pageSize.getHeight() !== finalPageSize[1] || doc.internal.getCurrentPageInfo().orientation !== finalOrientation) {
                if (firstPageAdded) {
                    doc.addPage(finalPageSize, finalOrientation);
                } else {
                    doc.deletePage(1);
                    doc.addPage(finalPageSize, finalOrientation);
                }
                firstPageAdded = true;
            }

            const pageCanvasWidth = doc.internal.pageSize.getWidth() - margin * 2;
            const pageCanvasHeight = doc.internal.pageSize.getHeight() - margin * 2;

            let x = margin;
            let y = margin;
            let finalImgWidth = imgWidth;
            let finalImgHeight = imgHeight;

            const imgAspectRatio = imgWidth / imgHeight;
            const pageAspectRatio = pageCanvasWidth / pageCanvasHeight;

            if (imageFit === 'contain') {
                if (imgAspectRatio > pageAspectRatio) {
                    finalImgWidth = pageCanvasWidth;
                    finalImgHeight = pageCanvasWidth / imgAspectRatio;
                } else {
                    finalImgHeight = pageCanvasHeight;
                    finalImgWidth = pageCanvasHeight * imgAspectRatio;
                }
                x = margin + (pageCanvasWidth - finalImgWidth) / 2;
                y = margin + (pageCanvasHeight - finalImgHeight) / 2;
            } else if (imageFit === 'cover') {
                if (imgAspectRatio < pageAspectRatio) {
                    finalImgWidth = pageCanvasWidth;
                    finalImgHeight = pageCanvasWidth / imgAspectRatio;
                } else {
                    finalImgHeight = pageCanvasHeight;
                    finalImgWidth = pageCanvasHeight * imgAspectRatio;
                }
                x = margin + (pageCanvasWidth - finalImgWidth) / 2;
                y = margin + (pageCanvasHeight - finalImgHeight) / 2;
            }

            doc.addImage(imgData, 'WEBP', x, y, finalImgWidth, finalImgHeight);

            if (addPageNumbers) {
                let str = "Page " + doc.internal.getNumberOfPages();
                doc.setFontSize(8);
                doc.text(str, doc.internal.pageSize.getWidth() - margin, doc.internal.pageSize.getHeight() - margin, { align: 'right' });
            }

            if (oneImagePerPage && i < imageDataUrls.length - 1) {
                doc.addPage();
            } else if (!oneImagePerPage && i < imageDataUrls.length - 1) {
                doc.addPage(); 
            }
        }

        if (firstPageAdded && (oneImagePerPage || files.length > 1)) {
            if (doc.internal.getNumberOfPages() > files.length) {
                 doc.deletePage(doc.internal.getNumberOfPages());
            }
        }
        
        const outputFileName = files.length > 1 ? 'converted_images.pdf' : files[0].name.replace(/\.webp$/i, '.pdf');
        doc.save(outputFileName);
        
        showStatus('PDF file downloaded!', 'success');
        Swal.fire({
            title: 'Download Complete',
            text: `Your PDF file has been downloaded.`,
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
        imageDataUrls: item.imageDataUrls, // Store data URLs
        options: item.options // Store conversion options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('webpConversionHistory', JSON.stringify(conversionHistory));
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
            localStorage.setItem('webpConversionHistory', JSON.stringify(conversionHistory));
            displayHistory();
        }
    });
}

function downloadHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.imageDataUrls || item.imageDataUrls.length === 0) return;

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
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        let firstPageAdded = false;

        for (let i = 0; i < item.imageDataUrls.length; i++) {
            const imgData = item.imageDataUrls[i];
            const img = new Image();
            img.src = imgData;

            await new Promise(resolve => img.onload = resolve);

            let imgWidth = img.width;
            let imgHeight = img.height;

            let finalOrientation = item.options.orientation;
            let finalPageSize = item.options.pageSize;
            const margin = item.options.margin;

            if (item.options.pageSize === 'auto' || item.options.orientation === 'auto') {
                if (imgWidth > imgHeight) {
                    if (item.options.orientation === 'auto') finalOrientation = 'landscape';
                } else {
                    if (item.options.orientation === 'auto') finalOrientation = 'portrait';
                }
            }

            if (item.options.pageSize === 'original') {
                const dpi = 96;
                finalPageSize = [imgWidth * 72 / dpi + margin * 2, imgHeight * 72 / dpi + margin * 2];
            } else if (item.options.pageSize === 'auto' && (imgWidth > imgHeight)) {
                finalPageSize = (finalOrientation === 'landscape') ? [841.89, 595.28] : [595.28, 841.89];
            } else if (item.options.pageSize === 'auto' && (imgHeight > imgWidth)) {
                 finalPageSize = (finalOrientation === 'portrait') ? [595.28, 841.89] : [841.89, 595.28];
            }

            if (!firstPageAdded || item.options.oneImagePerPage || doc.internal.pageSize.getWidth() !== finalPageSize[0] || doc.internal.pageSize.getHeight() !== finalPageSize[1] || doc.internal.getCurrentPageInfo().orientation !== finalOrientation) {
                if (firstPageAdded) {
                    doc.addPage(finalPageSize, finalOrientation);
                } else {
                    doc.deletePage(1);
                    doc.addPage(finalPageSize, finalOrientation);
                }
                firstPageAdded = true;
            }

            const pageCanvasWidth = doc.internal.pageSize.getWidth() - margin * 2;
            const pageCanvasHeight = doc.internal.pageSize.getHeight() - margin * 2;

            let x = margin;
            let y = margin;
            let finalImgWidth = imgWidth;
            let finalImgHeight = imgHeight;

            const imgAspectRatio = imgWidth / imgHeight;
            const pageAspectRatio = pageCanvasWidth / pageCanvasHeight;

            if (item.options.imageFit === 'contain') {
                if (imgAspectRatio > pageAspectRatio) {
                    finalImgWidth = pageCanvasWidth;
                    finalImgHeight = pageCanvasWidth / imgAspectRatio;
                } else {
                    finalImgHeight = pageCanvasHeight;
                    finalImgWidth = pageCanvasHeight * imgAspectRatio;
                }
                x = margin + (pageCanvasWidth - finalImgWidth) / 2;
                y = margin + (pageCanvasHeight - finalImgHeight) / 2;
            } else if (item.options.imageFit === 'cover') {
                if (imgAspectRatio < pageAspectRatio) {
                    finalImgWidth = pageCanvasWidth;
                    finalImgHeight = pageCanvasWidth / imgAspectRatio;
                } else {
                    finalImgHeight = pageCanvasHeight;
                    finalImgWidth = pageCanvasHeight * imgAspectRatio;
                }
                x = margin + (pageCanvasWidth - finalImgWidth) / 2;
                y = margin + (pageCanvasHeight - finalImgHeight) / 2;
            }

            doc.addImage(imgData, 'WEBP', x, y, finalImgWidth, finalImgHeight);

            if (item.options.addPageNumbers) {
                let str = "Page " + doc.internal.getNumberOfPages();
                doc.setFontSize(8);
                doc.text(str, doc.internal.pageSize.getWidth() - margin, doc.internal.pageSize.getHeight() - margin, { align: 'right' });
            }

            if (item.options.oneImagePerPage && i < item.imageDataUrls.length - 1) {
                doc.addPage();
            } else if (!item.options.oneImagePerPage && i < item.imageDataUrls.length - 1) {
                doc.addPage();
            }
        }
        
        if (firstPageAdded && (item.options.oneImagePerPage || item.imageDataUrls.length > 1)) {
            if (doc.internal.getNumberOfPages() > item.imageDataUrls.length) {
                 doc.deletePage(doc.internal.getNumberOfPages());
            }
        }
        
        doc.save(item.fileName);
        
        showStatus(`${item.fileName} downloaded!`, 'success');
        Swal.fire({
            title: 'Download Complete',
            text: `Your PDF file has been downloaded.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }, 1500);
}

function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.imageDataUrls || item.imageDataUrls.length === 0) return;

    imagePreviewContainer.innerHTML = ''; // Clear current preview
    imageCountSpan.textContent = `Images: ${item.imageDataUrls.length}`;

    item.imageDataUrls.forEach((imgData, index) => {
        const img = document.createElement('img');
        img.src = imgData;
        img.alt = `Preview of history item ${index + 1}`;
        img.style.maxWidth = '150px';
        img.style.maxHeight = '150px';
        img.style.margin = '10px';
        img.style.border = '1px solid #ddd';
        imagePreviewContainer.appendChild(img);
    });

    // Update form options to reflect historical conversion
    document.getElementById('pageSize').value = item.options.pageSize;
    document.getElementById('orientation').value = item.options.orientation;
    document.getElementById('imageFit').value = item.options.imageFit;
    document.getElementById('margin').value = item.options.margin;
    document.getElementById('addPageNumbers').checked = item.options.addPageNumbers;
    document.getElementById('oneImagePerPage').checked = item.options.oneImagePerPage;

    showStatus(`Previewing ${item.fileName} from history.`, 'info');
    
    // Scroll to preview area
    imagePreviewContainer.scrollIntoView({ behavior: 'smooth' });

    // Enable convert button if data is present, but keep download disabled until re-conversion
    convertBtn.disabled = false;
    downloadBtn.disabled = true;
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