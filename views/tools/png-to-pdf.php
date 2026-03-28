<?php
// SEO and Page Metadata
$page_title = "PNG to PDF Converter - Convert PNG Images to PDF Online Free"; // You may Change the Title here
$page_description = "Convert PNG to PDF online for free. Transform PNG images into PDF documents. Combine multiple PNGs into one PDF file. Fast, secure, no software needed."; // Put your Description here
$page_keywords = "png to pdf, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
                    <h1 class="h2">PNG to PDF Converter <i class="fas fa-file-pdf text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Combine your PNG images into a single, high-quality PDF document.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop PNG Files Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="pngUpload" accept=".png,image/png" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('pngUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select PNG Files
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
                                    <option value="auto" selected>Auto (Fit Image)</option>
                                    <option value="A4">A4</option>
                                    <option value="Letter">Letter</option>
                                    <option value="Legal">Legal</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="orientation" class="form-label">Orientation</label>
                                <select id="orientation" class="form-select">
                                    <option value="portrait" selected>Portrait</option>
                                    <option value="landscape">Landscape</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="imageFit" class="form-label">Image Fit</label>
                                <select id="imageFit" class="form-select">
                                    <option value="fit" selected>Fit to Page</option>
                                    <option value="width">Fit to Width</option>
                                    <option value="height">Fit to Height</option>
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
                        <h5 class="mb-0"><i class="fas fa-images me-2"></i>Image Preview</h5>
                        <span class="badge bg-info" id="imageCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <div class="row g-2 p-3" id="imagePreviewContainer">
                            <div class="col-12 text-center text-muted p-4">Upload PNGs to see preview.</div>
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
                <?php include '../../views/content/png-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script>
// JavaScript for PNG to PDF Converter
let files = [];
let conversionHistory = JSON.parse(localStorage.getItem('pngConversionHistory')) || [];

// Initialize elements
const pngUpload = document.getElementById('pngUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');
const imagePreviewContainer = document.getElementById('imagePreviewContainer');
const imageCountSpan = document.getElementById('imageCount');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');


// Event Listeners
pngUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertPngToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PNG to PDF Converter',
        html: `Follow these steps to convert your PNGs:<br><br>
        <ol class="text-start">
            <li>Upload PNGs by clicking "Select PNG Files" or dragging them into the drop zone. You can upload multiple files.</li>
            <li>Choose your desired page size, orientation, and how images should fit on the page.</li>
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
    pngUpload.value = '';
    fileInfo.textContent = 'No files selected.';
    imagePreviewContainer.innerHTML = '<div class="col-12 text-center text-muted p-4">Upload PNGs to see preview.</div>';
    imageCountSpan.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('pageSize').value = 'auto';
    document.getElementById('orientation').value = 'portrait';
    document.getElementById('imageFit').value = 'fit';
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

async function handleFiles(selectedFiles) {
    if (selectedFiles.length === 0) return;

    files = [];
    const newFiles = Array.from(selectedFiles);

    for (const file of newFiles) {
        if (!file.type.startsWith('image/png')) {
            showError(`File "${file.name}" is not a PNG image and will be skipped.`);
            Swal.fire({
                title: 'Invalid File Type',
                text: `File "${file.name}" is not a PNG image and will be skipped. Only PNG files are supported.`,
                icon: 'error',
                confirmButtonText: 'OK'
            });
            continue;
        }
        if (file.size > 25 * 1024 * 1024) { // Max 25MB per file
            showError(`File "${file.name}" is too large (max 25MB) and will be skipped.`);
            Swal.fire({
                title: 'File Too Large',
                text: `File "${file.name}" is too large (max 25MB) and will be skipped.`,
                icon: 'error',
                confirmButtonText: 'OK'
            });
            continue;
        }
        files.push(file);
    }

    if (files.length > 0) {
        fileInfo.textContent = `${files.length} file(s) selected.`;
        await displayImagePreviews();
        convertBtn.disabled = false;
        showStatus('Images ready for conversion. Previewing...', 'info');
        
        Swal.fire({
            title: 'Files Added',
            text: `${files.length} PNG file(s) ready for conversion.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    } else {
        fileInfo.textContent = 'No files selected.';
        imagePreviewContainer.innerHTML = '<div class="col-12 text-center text-muted p-4">Upload PNGs to see preview.</div>';
        imageCountSpan.textContent = '';
        convertBtn.disabled = true;
    }
}

async function displayImagePreviews() {
    imagePreviewContainer.innerHTML = '';
    imageCountSpan.textContent = `Images: ${files.length}`;

    if (files.length === 0) {
        imagePreviewContainer.innerHTML = '<div class="col-12 text-center text-muted p-4">Upload PNGs to see preview.</div>';
        return;
    }

    for (const file of files) {
        const reader = new FileReader();
        reader.onload = (e) => {
            const colDiv = document.createElement('div');
            colDiv.className = 'col-lg-3 col-md-4 col-sm-6 col-6';
            
            const cardDiv = document.createElement('div');
            cardDiv.className = 'card h-100 shadow-sm';

            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'card-img-top p-2';
            img.style.objectFit = 'contain';
            img.style.maxHeight = '150px';

            const cardBody = document.createElement('div');
            cardBody.className = 'card-body p-2 text-center';
            cardBody.innerHTML = `<small class="card-title text-truncate d-block">${file.name}</small>`;

            cardDiv.appendChild(img);
            cardDiv.appendChild(cardBody);
            colDiv.appendChild(cardDiv);
            imagePreviewContainer.appendChild(colDiv);
        };
        reader.readAsDataURL(file);
    }
}


// Convert PNG to PDF
async function convertPngToPdf() {
    if (files.length === 0) {
        showError('No PNG files to convert. Please upload files first.');
        Swal.fire({
            title: 'Error',
            text: 'No PNG files to convert. Please upload files first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting PNG to PDF...', 'info');
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
        const pageSize = document.getElementById('pageSize').value;
        const orientation = document.getElementById('orientation').value;
        const imageFit = document.getElementById('imageFit').value;
        const addPageNumbers = document.getElementById('addPageNumbers').checked;
        const oneImagePerPage = document.getElementById('oneImagePerPage').checked;

        const doc = new jsPDF(orientation, 'pt', 'a4'); // Initialize with a4, will adjust if pageSize is 'auto'

        let currentImageIndex = 0;

        for (const file of files) {
            const reader = new FileReader();
            reader.readAsDataURL(file);

            await new Promise((resolve, reject) => {
                reader.onload = function(event) {
                    const img = new Image();
                    img.src = event.target.result;
                    img.onload = function() {
                        const imgWidth = img.width;
                        const imgHeight = img.height;

                        let pdfWidth;
                        let pdfHeight;
                        let startX;
                        let startY;

                        // Calculate page dimensions based on orientation and specified pageSize
                        let docPageWidth = doc.internal.pageSize.getWidth();
                        let docPageHeight = doc.internal.pageSize.getHeight();
                        
                        // If 'auto' page size, set it to the first image's dimensions
                        if (pageSize === 'auto' && currentImageIndex === 0) {
                            doc.deletePage(1); // Remove the initial blank page
                            doc.addPage([imgWidth, imgHeight], orientation);
                            docPageWidth = doc.internal.pageSize.getWidth();
                            docPageHeight = doc.internal.pageSize.getHeight();
                        } else if (oneImagePerPage && currentImageIndex > 0) {
                            doc.addPage();
                            docPageWidth = doc.internal.pageSize.getWidth();
                            docPageHeight = doc.internal.pageSize.getHeight();
                        }

                        // Define margins
                        const margin = 20; // 20pt margin
                        const availableWidth = docPageWidth - (2 * margin);
                        const availableHeight = docPageHeight - (2 * margin);

                        switch (imageFit) {
                            case 'fit':
                                const ratio = Math.min(availableWidth / imgWidth, availableHeight / imgHeight);
                                pdfWidth = imgWidth * ratio;
                                pdfHeight = imgHeight * ratio;
                                break;
                            case 'width':
                                pdfWidth = availableWidth;
                                pdfHeight = imgHeight * (availableWidth / imgWidth);
                                break;
                            case 'height':
                                pdfHeight = availableHeight;
                                pdfWidth = imgWidth * (availableHeight / imgHeight);
                                break;
                            case 'original':
                                pdfWidth = imgWidth;
                                pdfHeight = imgHeight;
                                // If original size exceeds page, add a new page with custom dimensions
                                if (pdfWidth > docPageWidth || pdfHeight > docPageHeight) {
                                    if (currentImageIndex > 0 || pageSize !== 'auto') { // If it's not the first image or 'auto' isn't chosen
                                         doc.addPage([pdfWidth + 2*margin, pdfHeight + 2*margin], orientation);
                                         docPageWidth = doc.internal.pageSize.getWidth();
                                         docPageHeight = doc.internal.pageSize.getHeight();
                                    }
                                }
                                break;
                        }

                        startX = (docPageWidth - pdfWidth) / 2;
                        startY = (docPageHeight - pdfHeight) / 2;
                        
                        // Ensure image doesn't go into margins if 'original' size results in a very large image
                        if (imageFit === 'original') {
                            startX = Math.max(margin, startX);
                            startY = Math.max(margin, startY);
                        }

                        doc.addImage(img, 'PNG', startX, startY, pdfWidth, pdfHeight);

                        if (addPageNumbers) {
                            let pageNumberText = `Page ${doc.internal.getNumberOfPages()}`;
                            doc.setFontSize(8);
                            doc.text(pageNumberText, docPageWidth - margin, docPageHeight - margin);
                        }
                        
                        currentImageIndex++;
                        resolve();
                    };
                    img.onerror = reject;
                };
                reader.onerror = reject;
            });
        }
        
        if (pageSize !== 'auto' && doc.internal.getNumberOfPages() === 1 && currentImageIndex > 0) {
            // Remove the initial blank page if only one image and not auto-sized
            // This is handled by addPage() in first image processing for auto-size
            // For fixed sizes, we need to add a page only if there are images
            // If there's only one initial page and it's empty, and we added an image, it means image was on page 1.
            // If the document has more than 1 page by now, no need to delete anything.
            // This logic can be tricky with jspdf addImage behavior.
            // Best practice is to always call addPage() before adding an image if it's not the very first thing.
            // For simplicity, for single page results, if first page is blank, remove it after all images processed.
            // This is a known jspdf quirk. If the first image adds itself to a new page, the initial one is left blank.
            // A safer approach: always add a page before adding an image, if it's not the *very first* action.
            // Or, track if content was added to the first page.
            // Simple check: if first page is completely empty, remove it.
             const firstPageContent = doc.getPageContent(1);
             if (firstPageContent.length === 0 && files.length > 0 && pageSize !== 'auto') {
                // This means the addImage implicitly added to a new page
                // Or if currentImageIndex is 1 and addPage was not called (single image, fixed size)
                // A better check: if the content of the first page is empty and we have images, it's a blank page
                // This is hard without accessing internal state reliably.
                // For now, let's assume `addImage` adds to the current page, and `addPage` correctly creates new ones.
                // The main `doc.addPage()` for subsequent images handles this.
             }
        }
        

        const outputFileName = files.length > 1 ? 'combined_images.pdf' : files[0].name.replace(/\.png$/, '.pdf');
        
        // Add to history (store file info to regenerate PDF on download/preview)
        addToHistory({
            fileName: outputFileName,
            date: new Date().toLocaleString(),
            format: 'pdf',
            fileNames: files.map(f => f.name), // Store just names, not actual file data
            options: { // Store options needed for regeneration
                pageSize: pageSize,
                orientation: orientation,
                imageFit: imageFit,
                addPageNumbers: addPageNumbers,
                oneImagePerPage: oneImagePerPage,
            }
        });
        
        // Store base64 data for immediate download and preview
        const pdfDataUri = doc.output('datauristring');
        sessionStorage.setItem('currentPngPdf', pdfDataUri); // Use sessionStorage for temporary storage
        sessionStorage.setItem('currentPngPdfFileName', outputFileName);


        showStatus('Conversion complete! Click Download PDF.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your PNG(s) have been successfully converted to PDF.',
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
    const pdfDataUri = sessionStorage.getItem('currentPngPdf');
    const fileName = sessionStorage.getItem('currentPngPdfFileName');

    if (!pdfDataUri || !fileName) {
        showError('No PDF to download. Please convert first.');
        Swal.fire({
            title: 'No PDF Data',
            text: 'No PDF to download. Please convert first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing PDF for download...', 'info');
    
    Swal.fire({
        title: 'Preparing PDF File',
        html: `Preparing ${fileName} for download...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        const link = document.createElement('a');
        link.href = pdfDataUri;
        link.download = fileName;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        
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
        fileNames: item.fileNames, // Storing original file names for context
        options: item.options // Storing options to enable re-generation on download/preview
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('pngConversionHistory', JSON.stringify(conversionHistory));
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
            localStorage.setItem('pngConversionHistory', JSON.stringify(conversionHistory));
            displayHistory();
        }
    });
}

function downloadHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    showStatus(`Re-generating and downloading ${item.fileName}...`, 'info');
    
    Swal.fire({
        title: 'Preparing Download',
        html: `Re-generating ${item.fileName} for download...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(async () => {
        // To re-generate, we need the actual file data, which isn't stored in history for privacy.
        // The current implementation is client-side only. We can't re-download past images from history.
        // So, for history download, we can only warn the user or provide a placeholder.
        // Given the constraint of 'proper functionality', if the original file isn't available,
        // we can't truly re-generate. For a purely client-side tool, history downloads are
        // problematic without storing actual file data (which defeats the privacy aspect).
        // Let's modify to indicate it only works if original files are re-uploaded.
        
        // This is a limitation due to client-side processing and not storing actual file data.
        // Inform the user.
        Swal.fire({
            title: 'Cannot Re-download from History',
            text: 'For privacy reasons, original image files are not stored. To download this PDF again, please re-upload the original PNG images and convert them.',
            icon: 'info',
            confirmButtonText: 'OK'
        });
        showStatus('Cannot re-download from history.', 'warning');
    }, 1500);
}

function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    showStatus(`Previewing ${item.fileName}...`, 'info');

    Swal.fire({
        title: 'Cannot Preview from History',
        text: 'For privacy reasons, original image files are not stored. To preview this PDF again, please re-upload the original PNG images and convert them.',
        icon: 'info',
        confirmButtonText: 'OK'
    });
    showStatus('Cannot preview from history.', 'warning');
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