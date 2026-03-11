<?php
// SEO and Page Metadata
$page_title = "TIFF to PDF Converter"; // You may Change the Title here
$page_description = "TIFF to PDF Converter online."; // Put your Description here
$page_keywords = "TIFF to PDF, convert TIFF to PDF, export TIFF to PDF, free TIFF converter, online PDF tool, multi-page TIFF to PDF";

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
                    <h1 class="h2">TIFF to PDF Converter <i class="fas fa-file-pdf text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Combine multiple TIFF images or convert single TIFFs into a single, compact PDF document.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop TIFF Files Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="tiffUpload" accept=".tiff,.tif" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('tiffUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select TIFF Files
                    </button>
                    <div id="fileInfo" class="mt-3 small text-muted">No files selected.</div>
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
                                    <option value="MatchImage">Match Image Size</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="orientation" class="form-label">Orientation</label>
                                <select id="orientation" class="form-select">
                                    <option value="portrait" selected>Portrait</option>
                                    <option value="landscape">Landscape</option>
                                    <option value="auto">Auto (from Image)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="imageQuality" class="form-label">Image Quality</label>
                                <select id="imageQuality" class="form-select">
                                    <option value="1.0">High (Less Compression)</option>
                                    <option value="0.8" selected>Medium (Recommended)</option>
                                    <option value="0.5">Low (More Compression)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="imageFit" class="form-label">Image Fit</label>
                                <select id="imageFit" class="form-select">
                                    <option value="fit" selected>Fit to Page</option>
                                    <option value="original">Original Size</option>
                                </select>
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

                <div class="preview-area card mt-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-images me-2"></i>TIFF Preview (<span id="imageCount">0</span> images)</h5>
                        <button class="btn btn-sm btn-outline-danger" id="clearImagesBtn" style="display:none;">Clear All</button>
                    </div>
                    <div class="card-body p-3">
                        <div id="imagePreviewContainer" class="d-flex flex-wrap justify-content-center align-items-center" style="min-height: 100px;">
                            <p class="text-muted text-center" id="noImageText">Upload TIFFs to see preview.</p>
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
                <?php include '../../views/content/tiff-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script src="https://unpkg.com/tiff.js@1.0.0/tiff.min.js"></script> <script>
// Initialize TIFF.js
// TIFF.initialize({
//     wasmPath: 'https://unpkg.com/tiff.js@1.0.0/tiff.wasm' // Or host it locally
// });

// If tiff.js is not initialized via global scope, initialize here.
// For direct script include, it usually attaches to window.Tiff
if (typeof Tiff === 'undefined') {
    console.error("TIFF.js library not loaded. Please ensure it's included correctly.");
}


// JavaScript for TIFF to PDF Converter
let uploadedTiffFiles = []; // Stores File objects
let conversionHistory = JSON.parse(localStorage.getItem('tiffConversionHistory')) || [];

// Initialize elements
const tiffUpload = document.getElementById('tiffUpload');
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
const imageCountSpan = document.getElementById('imageCount');
const noImageText = document.getElementById('noImageText');
const clearImagesBtn = document.getElementById('clearImagesBtn');


// Event Listeners
tiffUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertTiffToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
clearImagesBtn.addEventListener('click', clearAllImages);

// Initialize history display
displayHistory();
updateConvertButtonState();


// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to TIFF to PDF Converter',
        html: `Follow these steps to convert your TIFF images:<br><br>
        <ol class="text-start">
            <li>Upload one or more TIFF files by clicking "Select TIFF Files" or dragging them into the drop zone.</li>
            <li>Choose your desired PDF page size, orientation, image quality, and fit options.</li>
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
    clearAllImages(); // Clears files, preview, and resets buttons
    tiffUpload.value = '';
    fileInfo.textContent = 'No files selected.';
    statusArea.textContent = '';

    // Reset conversion options
    document.getElementById('pageSize').value = 'A4';
    document.getElementById('orientation').value = 'portrait';
    document.getElementById('imageQuality').value = '0.8';
    document.getElementById('imageFit').value = 'fit';
    document.getElementById('addPageNumbers').checked = false;
    
    updateConvertButtonState();
}

function clearAllImages() {
    uploadedTiffFiles = [];
    imagePreviewContainer.innerHTML = '';
    imagePreviewContainer.appendChild(noImageText);
    noImageText.style.display = 'block';
    imageCountSpan.textContent = '0';
    clearImagesBtn.style.display = 'none'; // Hide clear button when no images
    updateConvertButtonState();
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

    let validFilesAdded = false;
    Array.from(selectedFiles).forEach(file => {
        const fileNameLower = file.name.toLowerCase();
        if (!fileNameLower.endsWith('.tiff') && !fileNameLower.endsWith('.tif')) {
            showError(`Skipped "${file.name}": Please upload only TIFF (.tif, .tiff) files.`);
            return; // Skip invalid file
        }
        if (file.size > 50 * 1024 * 1024) { // Max 50MB per file
            showError(`Skipped "${file.name}": File size exceeds 50MB.`);
            return; // Skip too large file
        }
        uploadedTiffFiles.push(file);
        validFilesAdded = true;
    });

    if (validFilesAdded) {
        fileInfo.textContent = `${uploadedTiffFiles.length} file(s) selected.`;
        displayImagePreviews();
        updateConvertButtonState();
        showStatus('File(s) ready for conversion. Previewing...', 'info');
        Swal.fire({
            title: 'Files Added',
            text: `${validFilesAdded ? 'Valid files have been added.' : 'No new valid files were added.'}`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }
}

function updateConvertButtonState() {
    convertBtn.disabled = uploadedTiffFiles.length === 0;
    downloadBtn.disabled = true; // Always disable download until conversion is done
}

// Display Image Previews
function displayImagePreviews() {
    imagePreviewContainer.innerHTML = ''; // Clear existing previews
    noImageText.style.display = 'none'; // Hide "no image" text
    clearImagesBtn.style.display = 'block'; // Show clear button

    uploadedTiffFiles.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const imgContainer = document.createElement('div');
            imgContainer.className = 'preview-item position-relative m-2 border rounded p-1';
            imgContainer.style.width = '120px';
            imgContainer.style.height = '120px';
            imgContainer.style.overflow = 'hidden';
            imgContainer.style.display = 'flex';
            imgContainer.style.justifyContent = 'center';
            imgContainer.style.alignItems = 'center';

            const img = document.createElement('img');
            img.src = e.target.result;
            img.alt = `Preview ${file.name}`;
            img.style.maxWidth = '100%';
            img.style.maxHeight = '100%';
            img.style.objectFit = 'contain';

            const fileNameSpan = document.createElement('small');
            fileNameSpan.textContent = file.name;
            fileNameSpan.className = 'position-absolute bottom-0 text-white bg-dark bg-opacity-75 px-1 py-0';
            fileNameSpan.style.width = '100%';
            fileNameSpan.style.textAlign = 'center';
            fileNameSpan.style.fontSize = '0.7em'; // Smaller font for file name

            const removeBtn = document.createElement('button');
            removeBtn.className = 'btn btn-sm btn-danger position-absolute top-0 end-0 rounded-circle p-0';
            removeBtn.style.width = '24px';
            removeBtn.style.height = '24px';
            removeBtn.innerHTML = '<i class="fas fa-times"></i>';
            removeBtn.onclick = () => removeImagePreview(index);

            imgContainer.appendChild(img);
            imgContainer.appendChild(fileNameSpan);
            imgContainer.appendChild(removeBtn);
            imagePreviewContainer.appendChild(imgContainer);
        };
        reader.readAsDataURL(file);
    });
    imageCountSpan.textContent = uploadedTiffFiles.length;
}

function removeImagePreview(indexToRemove) {
    uploadedTiffFiles.splice(indexToRemove, 1);
    displayImagePreviews(); // Re-render previews
    fileInfo.textContent = `${uploadedTiffFiles.length} file(s) selected.`;
    if (uploadedTiffFiles.length === 0) {
        clearAllImages();
    }
    updateConvertButtonState();
}

// Convert TIFF to PDF
async function convertTiffToPdf() {
    if (uploadedTiffFiles.length === 0) {
        showError('No TIFF files to convert. Please upload file(s) first.');
        Swal.fire({
            title: 'Error',
            text: 'No TIFF files to convert. Please upload file(s) first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting TIFF(s) to PDF...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    const swalInstance = Swal.fire({
        title: 'Creating PDF',
        html: 'Processing images and generating your PDF document...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const { jsPDF } = window.jspdf;
        const pageSize = document.getElementById('pageSize').value;
        const orientation = document.getElementById('orientation').value;
        const addPageNumbers = document.getElementById('addPageNumbers').checked;
        const imageQuality = parseFloat(document.getElementById('imageQuality').value);
        const imageFit = document.getElementById('imageFit').value; // 'fit' or 'original'

        const doc = new jsPDF(orientation === 'auto' ? 'portrait' : orientation, 'pt', pageSize); // Initial orientation, will adjust per image if 'auto'
        let firstPage = true;

        for (const file of uploadedTiffFiles) {
            const arrayBuffer = await file.arrayBuffer();
            const tiff = Tiff.init({ buffer: arrayBuffer });
            
            if (!tiff) {
                throw new Error(`Could not initialize TIFF.js for file: ${file.name}. It might be corrupted or an unsupported TIFF format.`);
            }

            for (let i = 0; i < tiff.countDirectory(); i++) {
                tiff.setDirectory(i);
                const canvas = tiff.toCanvas();
                if (!canvas) {
                    console.warn(`Could not render image ${i + 1} from ${file.name}. Skipping.`);
                    continue;
                }

                const imgData = canvas.toDataURL('image/jpeg', imageQuality); // Convert to JPEG for PDF embedding

                const imgWidth = canvas.width;
                const imgHeight = canvas.height;

                let pageOrientation = orientation;
                if (orientation === 'auto') {
                    pageOrientation = imgWidth > imgHeight ? 'landscape' : 'portrait';
                }

                if (!firstPage) {
                    doc.addPage(pageSize, pageOrientation);
                } else {
                    // Set initial page orientation based on first image if auto
                    if (orientation === 'auto') {
                        doc.internal.pageSize.width = pageOrientation === 'landscape' ? doc.internal.pageSize.height : doc.internal.pageSize.width;
                        doc.internal.pageSize.height = pageOrientation === 'landscape' ? doc.internal.pageSize.width : doc.internal.pageSize.height;
                    } else if (pageSize === 'MatchImage') {
                        // If "Match Image Size" is selected for page size, set the first page's dimensions to the image's dimensions
                        // assuming 72 DPI (default for jsPDF pt units)
                        doc.internal.pageSize.width = imgWidth * 72 / canvas.width;
                        doc.internal.pageSize.height = imgHeight * 72 / canvas.height;
                    }
                }
                firstPage = false;

                const pdfPageWidth = doc.internal.pageSize.getWidth();
                const pdfPageHeight = doc.internal.pageSize.getHeight();
                
                let x = 0;
                let y = 0;
                let finalWidth = pdfPageWidth;
                let finalHeight = pdfPageHeight;

                if (imageFit === 'fit') {
                    // Calculate aspect ratios
                    const imgAspectRatio = imgWidth / imgHeight;
                    const pageAspectRatio = pdfPageWidth / pdfPageHeight;

                    if (imgAspectRatio > pageAspectRatio) {
                        // Image is wider than page, fit by width
                        finalHeight = pdfPageWidth / imgAspectRatio;
                    } else {
                        // Image is taller than page, fit by height
                        finalWidth = pdfPageHeight * imgAspectRatio;
                    }
                    x = (pdfPageWidth - finalWidth) / 2;
                    y = (pdfPageHeight - finalHeight) / 2;
                } else { // 'original'
                    // Add image with original dimensions (assuming 1:1 pixel to point mapping for simplicity)
                    // This might result in images overflowing the page if they are too large
                    finalWidth = imgWidth;
                    finalHeight = imgHeight;
                    x = (pdfPageWidth - finalWidth) / 2;
                    y = (pdfPageHeight - finalHeight) / 2;
                }

                doc.addImage(imgData, 'JPEG', x, y, finalWidth, finalHeight);
            }
            tiff.close(); // Clean up TIFF.js resources
        }

        // Add page numbers
        if (addPageNumbers) {
            const totalPages = doc.internal.getNumberOfPages();
            for (let j = 1; j <= totalPages; j++) {
                doc.setPage(j);
                doc.setFontSize(8);
                const pageNumberText = `Page ${j} of ${totalPages}`;
                const textWidth = doc.getStringUnitWidth(pageNumberText) * doc.internal.getFontSize();
                const margin = 10; // pt
                const xPos = doc.internal.pageSize.getWidth() - textWidth - margin;
                const yPos = doc.internal.pageSize.getHeight() - margin;
                doc.text(pageNumberText, xPos, yPos);
            }
        }


        const outputFileName = uploadedTiffFiles.length === 1 
            ? uploadedTiffFiles[0].name.replace(/\.(tiff|tif)$/i, '.pdf')
            : `combined_tiff_to_pdf_${Date.now()}.pdf`;

        // Store generated blob for download
        const pdfBlob = doc.output('blob');
        
        // Add to history
        addToHistory({
            fileName: outputFileName,
            date: new Date().toLocaleString(),
            format: 'pdf',
            blob: pdfBlob, // Store the blob directly
            options: {
                pageSize: document.getElementById('pageSize').value,
                orientation: document.getElementById('orientation').value,
                addPageNumbers: document.getElementById('addPageNumbers').checked,
                imageQuality: parseFloat(document.getElementById('imageQuality').value),
                imageFit: document.getElementById('imageFit').value
            }
        });
        
        showStatus('Conversion complete! Click Download PDF.', 'success');
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your TIFF(s) have been successfully converted to PDF.',
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
            html: `An error occurred during conversion:<br>${error.message}<br><br>Please try again. If the issue persists, ensure your TIFF files are not corrupted and are standard TIFF formats.`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    } finally {
        convertBtn.disabled = false; // Re-enable convert button
        updateConvertButtonState(); // Ensure correct state after conversion
    }
}

// Download PDF
function downloadPdf() {
    const latestHistoryItem = conversionHistory[0]; // Get the most recently converted item
    if (!latestHistoryItem || latestHistoryItem.format !== 'pdf' || !latestHistoryItem.blob) {
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
        html: `Preparing ${latestHistoryItem.fileName} for download...`,
        timer: 1000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        const url = URL.createObjectURL(latestHistoryItem.blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = latestHistoryItem.fileName;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url); // Clean up
        
        showStatus('PDF file downloaded!', 'success');
        Swal.fire({
            title: 'Download Complete',
            text: 'Your PDF file has been downloaded.',
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }, 1000);
}

// History Functions
function addToHistory(item) {
    const historyItem = {
        id: Date.now(),
        fileName: item.fileName,
        date: item.date,
        format: item.format,
        // For security and storage limits, we stringify the blob data URL,
        // or regenerate on demand for larger data.
        // For simplicity with blobs, we'll store a small indicator and regenerate on preview/download for TIFFs if needed.
        // However, storing the actual blob reference is possible but not persistent across sessions.
        // For this example, we directly store the blob for immediate re-download, but for persistent history,
        // you'd typically re-process the original file or store its raw content (carefully).
        // Let's modify to save the blob for the current session only.
        blob: item.blob, // Store blob for immediate use
        options: item.options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    // Note: Blobs cannot be directly stored in localStorage.
    // If you need persistent history, you'd store file metadata and re-run conversion
    // or use IndexedDB/send to server. For this demo, history only works for current session.
    // We'll store a "placeholder" in localStorage for the UI to display, but the actual blob
    // for re-download will only be available for the current session.
    const historyToStore = conversionHistory.map(h => ({
        id: h.id,
        fileName: h.fileName,
        date: h.date,
        format: h.format,
        options: h.options,
        // Don't store blob in localStorage
    }));
    localStorage.setItem('tiffConversionHistory', JSON.stringify(historyToStore));
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
                <button class="btn btn-sm btn-outline-primary download-history" data-id="${item.id}" title="Download" ${!item.blob ? 'disabled' : ''}>
                    <i class="fas fa-download"></i>
                </button>
                <button class="btn btn-sm btn-outline-secondary preview-history ms-1" data-id="${item.id}" title="Preview" ${!item.blob ? 'disabled' : ''}>
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
            const historyToStore = conversionHistory.map(h => ({
                id: h.id, fileName: h.fileName, date: h.date, format: h.format, options: h.options
            }));
            localStorage.setItem('tiffConversionHistory', JSON.stringify(historyToStore));
            displayHistory();
        }
    });
}

// Download from History: This will only work if the blob is still in memory (current session)
function downloadHistoryItemFromHistory(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.blob) {
        showError('File not available for download from history (session expired or not stored persistently).');
        Swal.fire({
            title: 'File Not Available',
            text: 'This file cannot be downloaded from history. Please re-upload and convert if needed.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus(`Downloading ${item.fileName}...`, 'info');
    
    Swal.fire({
        title: 'Preparing Download',
        html: `Preparing ${item.fileName} for download...`,
        timer: 1000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        const url = URL.createObjectURL(item.blob);
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
            text: `Your PDF file has been downloaded.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }, 1000);
}

// Preview from History: This will attempt to display the original image if available, otherwise show placeholder
function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    imagePreviewContainer.innerHTML = ''; // Clear current previews
    noImageText.style.display = 'none';
    clearImagesBtn.style.display = 'block';

    // If original files were stored (unlikely for large files/persistent history)
    // For this example, we'll just show a "PDF generated" message since original TIFFs aren't stored with history item
    // You would need to re-upload the original TIFFs to preview them again properly
    imagePreviewContainer.innerHTML = `
        <div class="text-center text-muted p-4">
            <i class="fas fa-file-pdf fa-3x mb-3"></i>
            <p>PDF for "${item.fileName}" was generated with these settings. Original TIFFs are not stored for re-preview.</p>
        </div>
    `;
    imageCountSpan.textContent = 'N/A'; // Since original images aren't present
    showStatus(`Previewing history item: ${item.fileName}`, 'info');
    
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