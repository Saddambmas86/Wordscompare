<?php
// SEO and Page Metadata
$page_title = "JPG to PDF Converter"; // You may Change the Title here
$page_description = "JPG to PDF Converter online."; // Put your Description here
$page_keywords = "JPG to PDF, convert JPG to PDF, image to PDF, free image converter, online PDF tool";

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
                    <h1 class="h2">JPG to PDF Converter <i class="fas fa-file-image text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Combine your JPG, PNG, BMP, or GIF images into a single, high-quality PDF document.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop Images Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="imageUpload" accept=".jpeg,.jpg,.png,.bmp,.gif" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('imageUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select Images
                    </button>
                    <div id="fileInfo" class="mt-3 small text-muted">No files selected.</div>
                </div>

                <div id="imagePreviewContainer" class="row mb-4" style="display: none;">
                    <div class="col-12">
                        <h5 class="mb-3"><i class="fas fa-images me-2"></i>Selected Images (Drag to reorder)</h5>
                        <div id="imagePreviewList" class="d-flex flex-wrap justify-content-center border p-3 rounded-3 bg-white">
                            </div>
                    </div>
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
                                    <option value="Fit">Fit to Image (Best Fit)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="orientation" class="form-label">Orientation</label>
                                <select id="orientation" class="form-select">
                                    <option value="portrait" selected>Portrait</option>
                                    <option value="landscape">Landscape</option>
                                    <option value="auto">Auto (Detect from Image)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="imageFit" class="form-label">Image Fit</label>
                                <select id="imageFit" class="form-select">
                                    <option value="contain" selected>Fit (Contain within page)</option>
                                    <option value="cover">Fill (Cover page area)</option>
                                    <option value="original">Original Size</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="margin" class="form-label">Margin (pt)</label>
                                <input type="number" id="margin" class="form-control" value="10" min="0" step="5">
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="addPageNumbers">
                                    <label class="form-check-label" for="addPageNumbers">
                                        Add page numbers to PDF
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
                <?php include '../../views/content/jpg-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<script>
// JavaScript for JPG to PDF Converter
let imageFiles = [];
let conversionHistory = JSON.parse(localStorage.getItem('imageConversionHistory')) || [];

// Initialize elements
const imageUpload = document.getElementById('imageUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const imagePreviewContainer = document.getElementById('imagePreviewContainer');
const imagePreviewList = document.getElementById('imagePreviewList');
const pageSizeSelect = document.getElementById('pageSize');
const orientationSelect = document.getElementById('orientation');
const imageFitSelect = document.getElementById('imageFit');
const marginInput = document.getElementById('margin');

// Event Listeners
imageUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertJpgToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
pageSizeSelect.addEventListener('change', toggleOrientationForFit);

// Initialize history display
displayHistory();

// Initialize SortableJS for image reordering
new Sortable(imagePreviewList, {
    animation: 150,
    ghostClass: 'blue-background-class', // Class for the ghost element
    onUpdate: function (evt) {
        // Reorder imageFiles array based on the new DOM order
        const reorderedFiles = [];
        imagePreviewList.querySelectorAll('.image-thumbnail').forEach(thumb => {
            const index = parseInt(thumb.dataset.index);
            reorderedFiles.push(imageFiles[index]);
        });
        imageFiles = reorderedFiles;
        // Update data-index attributes to reflect new positions for future reference
        imageFiles.forEach((file, index) => {
            document.querySelector(`[data-original-index="${file._originalIndex}"]`).dataset.index = index;
        });
    }
});

// Logic to toggle orientation if Page Size is "Fit to Image"
function toggleOrientationForFit() {
    if (pageSizeSelect.value === 'Fit') {
        orientationSelect.value = 'auto';
        orientationSelect.disabled = true;
    } else {
        orientationSelect.disabled = false;
    }
}

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to JPG to PDF Converter',
        html: `Follow these steps to combine your images into a PDF:<br><br>
        <ol class="text-start">
            <li>Upload images (JPG, PNG, BMP, GIF) by clicking "Select Images" or dragging them into the drop zone. You can select multiple.</li>
            <li>Reorder images by dragging their thumbnails in the preview area.</li>
            <li>Adjust conversion options like page size, orientation, image fit, and margins.</li>
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
    imageFiles = [];
    imageUpload.value = '';
    fileInfo.textContent = 'No files selected.';
    imagePreviewList.innerHTML = '';
    imagePreviewContainer.style.display = 'none';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('pageSize').value = 'A4';
    document.getElementById('orientation').value = 'portrait';
    document.getElementById('orientation').disabled = false; // Enable if disabled by "Fit"
    document.getElementById('imageFit').value = 'contain';
    document.getElementById('margin').value = '10';
    document.getElementById('addPageNumbers').checked = false;
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

    imageFiles = []; // Reset current files for new selection
    imagePreviewList.innerHTML = ''; // Clear existing previews

    const acceptedTypes = ['image/jpeg', 'image/png', 'image/bmp', 'image/gif'];
    let validFiles = [];

    Array.from(selectedFiles).forEach((file, originalIdx) => {
        if (acceptedTypes.includes(file.type)) {
            // Assign a temporary original index to track if needed later for reordering
            file._originalIndex = originalIdx; 
            validFiles.push(file);
        } else {
            showError(`Skipped "${file.name}": Only JPG, PNG, BMP, and GIF images are supported.`);
        }
    });

    if (validFiles.length === 0) {
        fileInfo.textContent = 'No valid image files selected.';
        convertBtn.disabled = true;
        downloadBtn.disabled = true;
        imagePreviewContainer.style.display = 'none';
        return;
    }

    imageFiles = validFiles; // Set the global imageFiles array
    fileInfo.textContent = `${imageFiles.length} file(s) selected.`;

    displayImagePreviews();
    convertBtn.disabled = false;
    downloadBtn.disabled = true; // Disable download until conversion
    showStatus('Images ready for conversion. Drag to reorder if needed.', 'info');
    
    Swal.fire({
        title: 'Files Added',
        text: `${imageFiles.length} image(s) selected for conversion.`,
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

function displayImagePreviews() {
    imagePreviewList.innerHTML = '';
    if (imageFiles.length > 0) {
        imagePreviewContainer.style.display = 'block';
        imageFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const thumbnailDiv = document.createElement('div');
                thumbnailDiv.classList.add('image-thumbnail', 'border', 'rounded', 'p-2', 'm-2', 'position-relative');
                thumbnailDiv.setAttribute('draggable', 'true');
                thumbnailDiv.dataset.index = index; // Current index for Sortable.js
                thumbnailDiv.dataset.originalIndex = file._originalIndex; // Original index to find in case of reorder

                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100px';
                img.style.maxHeight = '100px';
                img.classList.add('img-fluid');

                const fileNameSpan = document.createElement('small');
                fileNameSpan.textContent = file.name;
                fileNameSpan.classList.add('d-block', 'text-muted', 'text-truncate', 'mt-1');
                fileNameSpan.style.maxWidth = '100px';

                const deleteBtn = document.createElement('button');
                deleteBtn.classList.add('btn', 'btn-danger', 'btn-sm', 'position-absolute', 'top-0', 'end-0', 'rounded-circle', 'p-0', 'm-1');
                deleteBtn.style.width = '24px';
                deleteBtn.style.height = '24px';
                deleteBtn.style.lineHeight = '24px';
                deleteBtn.innerHTML = '<i class="fas fa-times" style="font-size: 0.7em;"></i>';
                deleteBtn.title = 'Remove image';
                deleteBtn.onclick = (event) => {
                    event.stopPropagation(); // Prevent drag event from firing
                    removeImage(parseInt(thumbnailDiv.dataset.index));
                };

                thumbnailDiv.appendChild(img);
                thumbnailDiv.appendChild(fileNameSpan);
                thumbnailDiv.appendChild(deleteBtn);
                imagePreviewList.appendChild(thumbnailDiv);
            };
            reader.readAsDataURL(file);
        });
    } else {
        imagePreviewContainer.style.display = 'none';
    }
}

function removeImage(indexToRemove) {
    imageFiles.splice(indexToRemove, 1);
    displayImagePreviews(); // Re-render previews to update indices
    fileInfo.textContent = `${imageFiles.length} file(s) selected.`;
    if (imageFiles.length === 0) {
        convertBtn.disabled = true;
        downloadBtn.disabled = true;
        statusArea.textContent = 'No files selected.';
        imagePreviewContainer.style.display = 'none';
    }
}

// Convert JPG to PDF
async function convertJpgToPdf() {
    if (imageFiles.length === 0) {
        showError('No images to convert. Please upload files first.');
        Swal.fire({
            title: 'Error',
            text: 'No images to convert. Please upload files first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting images to PDF...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    const swalInstance = Swal.fire({
        title: 'Creating PDF',
        html: 'Please wait while we combine your images into a PDF...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const { jsPDF } = window.jspdf;
        const pageSize = pageSizeSelect.value;
        let orientation = orientationSelect.value;
        const imageFit = imageFitSelect.value;
        const margin = parseFloat(marginInput.value);
        const addPageNumbers = document.getElementById('addPageNumbers').checked;

        // Create a temporary array to store image data URLs for jspdf
        const imageDataPromises = imageFiles.map(file => {
            return new Promise((resolve) => {
                const reader = new FileReader();
                reader.onload = (e) => resolve(e.target.result);
                reader.readAsDataURL(file);
            });
        });

        const imageDataUrls = await Promise.all(imageDataPromises);

        let doc;
        // Initialize doc with the first image's dimensions if "Fit" or "Auto" is selected
        // We'll re-initialize or add pages based on individual image properties
        if (pageSize === 'Fit' || orientation === 'auto') {
            doc = new jsPDF('portrait', 'pt', 'a4'); // Temporary initial doc
        } else {
            doc = new jsPDF(orientation, 'pt', pageSize);
        }

        for (let i = 0; i < imageDataUrls.length; i++) {
            const imgData = imageDataUrls[i];
            const img = new Image();
            img.src = imgData;

            await new Promise(resolve => {
                img.onload = resolve;
            });

            const imgWidth = img.width;
            const imgHeight = img.height;

            let currentPageWidth, currentPageHeight;
            let currentOrientation = orientation;

            if (pageSize === 'Fit') {
                // For "Fit" page size, determine page dimensions based on image and margins
                currentPageWidth = imgWidth + 2 * margin;
                currentPageHeight = imgHeight + 2 * margin;
                
                // If this is not the first page, add a new page with the determined size
                if (i > 0) {
                    doc.addPage([currentPageWidth, currentPageHeight], imgWidth > imgHeight ? 'landscape' : 'portrait');
                } else {
                    // For the first page, re-initialize doc if it was a temporary A4
                    doc = new jsPDF(imgWidth > imgHeight ? 'landscape' : 'portrait', 'pt', [currentPageWidth, currentPageHeight]);
                }
            } else {
                // For fixed page sizes (A4, Letter, Legal)
                const pageDimensions = doc.internal.pageSize;
                currentPageWidth = pageDimensions.getWidth();
                currentPageHeight = pageDimensions.getHeight();

                if (orientation === 'auto') {
                    // Determine orientation based on current image
                    currentOrientation = (imgWidth > imgHeight) ? 'landscape' : 'portrait';
                    // If current page orientation doesn't match, add new page with correct orientation
                    if ((doc.internal.pageSize.getWidth() < doc.internal.pageSize.getHeight() && currentOrientation === 'landscape') ||
                        (doc.internal.pageSize.getWidth() > doc.internal.pageSize.getHeight() && currentOrientation === 'portrait')) {
                        doc.addPage(); // Add a new page to adjust orientation
                    }
                } else if (i > 0) {
                    doc.addPage(); // Add a new page for subsequent images
                }
            }

            let x = margin;
            let y = margin;
            let width = currentPageWidth - 2 * margin;
            let height = currentPageHeight - 2 * margin;

            // Apply image fit logic
            if (imageFit === 'contain') {
                const ratio = Math.min(width / imgWidth, height / imgHeight);
                width = imgWidth * ratio;
                height = imgHeight * ratio;
                x = (currentPageWidth - width) / 2;
                y = (currentPageHeight - height) / 2;
            } else if (imageFit === 'cover') {
                const ratio = Math.max(width / imgWidth, height / imgHeight);
                width = imgWidth * ratio;
                height = imgHeight * ratio;
                x = (currentPageWidth - width) / 2;
                y = (currentPageHeight - height) / 2;
            }
            // If 'original', no scaling, just positioning based on margin

            doc.addImage(imgData, 'JPEG', x, y, width, height);

            if (addPageNumbers) {
                const pageNumber = doc.internal.getNumberOfPages();
                doc.setFontSize(8);
                doc.text(`Page ${pageNumber}`, doc.internal.pageSize.width - margin, doc.internal.pageSize.height - margin / 2);
            }
        }

        const outputFileName = imageFiles.length > 1 ? 'Combined_Images.pdf' : imageFiles[0].name.replace(/\.[^/.]+$/, "") + '.pdf';
        const pdfBlob = doc.output('blob');

        addToHistory({
            fileName: outputFileName,
            date: new Date().toLocaleString(),
            format: 'pdf',
            // For images, storing raw image data in history is too large.
            // Store a flag or reference to indicate this was a multi-image conversion.
            // On history download, the user will be prompted to re-upload originals or just download.
            // For simplicity in this demo, we'll store options and prompt.
            options: {
                pageSize: pageSizeSelect.value,
                orientation: orientationSelect.value,
                imageFit: imageFitSelect.value,
                margin: parseFloat(marginInput.value),
                addPageNumbers: document.getElementById('addPageNumbers').checked
            }
        });
        
        showStatus('Conversion complete! Click Download PDF.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your images have been successfully combined into a PDF.',
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

// Download PDF (regenerates the PDF for simplicity as blob isn't stored in history)
function downloadPdf() {
    if (imageFiles.length === 0) {
        showError('No PDF to download. Please convert images first.');
        Swal.fire({
            title: 'No Data',
            text: 'No PDF to download. Please convert images first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing PDF for download...', 'info');
    
    const swalInstance = Swal.fire({
        title: 'Preparing PDF File',
        html: `Please wait while we generate your PDF file...`,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(async () => {
        try {
            const { jsPDF } = window.jspdf;
            const pageSize = pageSizeSelect.value;
            let orientation = orientationSelect.value;
            const imageFit = imageFitSelect.value;
            const margin = parseFloat(marginInput.value);
            const addPageNumbers = document.getElementById('addPageNumbers').checked;

            const imageDataPromises = imageFiles.map(file => {
                return new Promise((resolve) => {
                    const reader = new FileReader();
                    reader.onload = (e) => resolve(e.target.result);
                    reader.readAsDataURL(file);
                });
            });

            const imageDataUrls = await Promise.all(imageDataPromises);

            let doc;
            if (pageSize === 'Fit' || orientation === 'auto') {
                doc = new jsPDF('portrait', 'pt', 'a4'); 
            } else {
                doc = new jsPDF(orientation, 'pt', pageSize);
            }

            for (let i = 0; i < imageDataUrls.length; i++) {
                const imgData = imageDataUrls[i];
                const img = new Image();
                img.src = imgData;

                await new Promise(resolve => {
                    img.onload = resolve;
                });

                const imgWidth = img.width;
                const imgHeight = img.height;

                let currentPageWidth, currentPageHeight;
                let currentOrientation = orientation;

                if (pageSize === 'Fit') {
                    currentPageWidth = imgWidth + 2 * margin;
                    currentPageHeight = imgHeight + 2 * margin;
                    
                    if (i > 0) {
                        doc.addPage([currentPageWidth, currentPageHeight], imgWidth > imgHeight ? 'landscape' : 'portrait');
                    } else {
                        doc = new jsPDF(imgWidth > imgHeight ? 'landscape' : 'portrait', 'pt', [currentPageWidth, currentPageHeight]);
                    }
                } else {
                    const pageDimensions = doc.internal.pageSize;
                    currentPageWidth = pageDimensions.getWidth();
                    currentPageHeight = pageDimensions.getHeight();

                    if (orientation === 'auto') {
                        currentOrientation = (imgWidth > imgHeight) ? 'landscape' : 'portrait';
                        if ((doc.internal.pageSize.getWidth() < doc.internal.pageSize.getHeight() && currentOrientation === 'landscape') ||
                            (doc.internal.pageSize.getWidth() > doc.internal.pageSize.getHeight() && currentOrientation === 'portrait')) {
                            doc.addPage();
                        }
                    } else if (i > 0) {
                        doc.addPage();
                    }
                }

                let x = margin;
                let y = margin;
                let width = currentPageWidth - 2 * margin;
                let height = currentPageHeight - 2 * margin;

                if (imageFit === 'contain') {
                    const ratio = Math.min(width / imgWidth, height / imgHeight);
                    width = imgWidth * ratio;
                    height = imgHeight * ratio;
                    x = (currentPageWidth - width) / 2;
                    y = (currentPageHeight - height) / 2;
                } else if (imageFit === 'cover') {
                    const ratio = Math.max(width / imgWidth, height / imgHeight);
                    width = imgWidth * ratio;
                    height = imgHeight * ratio;
                    x = (currentPageWidth - width) / 2;
                    y = (currentPageHeight - height) / 2;
                }

                doc.addImage(imgData, 'JPEG', x, y, width, height);

                if (addPageNumbers) {
                    const pageNumber = doc.internal.getNumberOfPages();
                    doc.setFontSize(8);
                    doc.text(`Page ${pageNumber}`, doc.internal.pageSize.width - margin, doc.internal.pageSize.height - margin / 2);
                }
            }

            const outputFileName = imageFiles.length > 1 ? 'Combined_Images.pdf' : imageFiles[0].name.replace(/\.[^/.]+$/, "") + '.pdf';
            doc.save(outputFileName);
            
            showStatus('PDF file downloaded!', 'success');
            swalInstance.close();
            Swal.fire({
                title: 'Download Complete',
                text: 'Your PDF file has been downloaded.',
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 1000,
                timerProgressBar: true
            });
        } catch (error) {
            showError(`Error during PDF download: ${error.message}`);
            swalInstance.close();
            Swal.fire({
                title: 'Download Error',
                text: error.message,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    }, 50); // Small delay for Swal to show
}

// History Functions
function addToHistory(item) {
    const historyItem = {
        id: Date.now(),
        fileName: item.fileName,
        date: item.date,
        format: item.format,
        options: item.options // Store conversion options for history re-generation
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('imageConversionHistory', JSON.stringify(conversionHistory));
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
            localStorage.setItem('imageConversionHistory', JSON.stringify(conversionHistory));
            displayHistory();
        }
    });
}

// For history download and preview, since image data is not stored,
// the user would theoretically need to re-upload the original images.
// For this demo, we'll just show a message. In a real app, you might
// implement server-side storage (defeats "privacy guaranteed") or
// a mechanism to prompt the user to re-select files for history re-conversion.

function downloadHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    Swal.fire({
        title: 'Cannot Redownload',
        html: `For privacy, we do not store your original images. To download "${item.fileName}" again, please re-upload your original image files and convert them with the same options.`,
        icon: 'info',
        confirmButtonText: 'Understood',
        confirmButtonColor: '#0d6efd'
    });
}

function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    Swal.fire({
        title: 'Cannot Preview',
        html: `For privacy, we do not store your original images. To preview "${item.fileName}" again, please re-upload your original image files and convert them.`,
        icon: 'info',
        confirmButtonText: 'Understood',
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