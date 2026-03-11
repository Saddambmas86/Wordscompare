<?php
// SEO and Page Metadata
$page_title = "$title"; // You may Change the Title here
$page_description = "$desc"; // Put your Description here
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
                    <h1 class="h2">HTML to PDF Converter <i class="fas fa-file-pdf text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Turn any HTML content or web page into a high-quality PDF document.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop HTML File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="htmlUpload" accept=".html,.htm,text/html" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('htmlUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select HTML Files
                    </button>
                    <div id="fileInfo" class="mt-3 small text-muted">No file selected.</div>
                    <hr class="my-4">
                    <h5 class="mb-3">Or Paste HTML Code / URL</h5>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-code"></i></span>
                        <textarea id="htmlInput" class="form-control" rows="5" placeholder="Paste your HTML code here..."></textarea>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-link"></i></span>
                        <input type="text" id="urlInput" class="form-control" placeholder="Enter a URL to convert">
                        <button class="btn btn-outline-secondary" type="button" id="fetchUrlBtn">Fetch URL</button>
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
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="addPageNumbers">
                                    <label class="form-check-label" for="addPageNumbers">
                                        Add page numbers to PDF
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeBackground">
                                    <label class="form-check-label" for="includeBackground">
                                        Include background graphics (images, colors)
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
                        <h5 class="mb-0"><i class="fas fa-eye me-2"></i>HTML Preview</h5>
                        <span class="badge bg-info" id="contentSource"></span>
                    </div>
                    <div class="card-body p-0">
                        <div id="htmlPreview" style="height: 400px; overflow: auto; border: 1px solid #dee2e6; background-color: #fff;">
                            <p class="text-center text-muted p-4">Upload an HTML file, paste code, or enter a URL to see preview.</p>
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
                                        <th>Source</th>
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
                <?php include '../../views/content/html-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
// JavaScript for HTML to PDF Converter
let currentHtmlContent = '';
let conversionHistory = JSON.parse(localStorage.getItem('htmlConversionHistory')) || [];

// Initialize elements
const htmlUpload = document.getElementById('htmlUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const htmlInput = document.getElementById('htmlInput');
const urlInput = document.getElementById('urlInput');
const fetchUrlBtn = document.getElementById('fetchUrlBtn');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const htmlPreview = document.getElementById('htmlPreview');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const contentSourceSpan = document.getElementById('contentSource');


// Event Listeners
htmlUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
htmlInput.addEventListener('input', handleHtmlInputChange);
urlInput.addEventListener('input', handleUrlInputChange);
fetchUrlBtn.addEventListener('click', fetchUrlContent);
convertBtn.addEventListener('click', convertHtmlToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to HTML to PDF Converter',
        html: `Follow these steps to convert your HTMLs:<br><br>
        <ol class="text-start">
            <li>Upload an HTML file, paste HTML code, or enter a URL.</li>
            <li>Adjust conversion options like page size, orientation, and background.</li>
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
    currentHtmlContent = '';
    htmlUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    htmlInput.value = '';
    urlInput.value = '';
    htmlPreview.innerHTML = '<p class="text-center text-muted p-4">Upload an HTML file, paste code, or enter a URL to see preview.</p>';
    contentSourceSpan.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('pageSize').value = 'A4';
    document.getElementById('orientation').value = 'portrait';
    document.getElementById('addPageNumbers').checked = false;
    document.getElementById('includeBackground').checked = false;
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

    const file = selectedFiles[0]; // Only process the first file for simplicity
    if (file.type !== 'text/html' && !file.name.endsWith('.html') && !file.name.endsWith('.htm')) {
        showError('Please upload only HTML files.');
        return;
    }
    if (file.size > 20 * 1024 * 1024) { // Max 20MB for HTML
        showError('File must be less than 20MB.');
        return;
    }

    const reader = new FileReader();
    reader.onload = (e) => {
        currentHtmlContent = e.target.result;
        displayHtmlPreview(currentHtmlContent, file.name);
        fileInfo.textContent = `${file.name} selected.`;
        htmlInput.value = ''; // Clear text area
        urlInput.value = ''; // Clear URL input
        showStatus('HTML file loaded. Previewing...', 'info');
        convertBtn.disabled = false;
        Swal.fire({
            title: 'File Added',
            text: `${file.name} has been selected for conversion.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    };
    reader.onerror = () => {
        showError('Failed to read HTML file.');
        convertBtn.disabled = true;
    };
    reader.readAsText(file);
}

function handleHtmlInputChange() {
    const htmlCode = htmlInput.value;
    if (htmlCode.trim() !== '') {
        currentHtmlContent = htmlCode;
        displayHtmlPreview(currentHtmlContent, 'Pasted HTML');
        htmlUpload.value = ''; // Clear file input
        fileInfo.textContent = 'Pasted HTML code.';
        urlInput.value = ''; // Clear URL input
        convertBtn.disabled = false;
    } else {
        currentHtmlContent = '';
        htmlPreview.innerHTML = '<p class="text-center text-muted p-4">Upload an HTML file, paste code, or enter a URL to see preview.</p>';
        contentSourceSpan.textContent = '';
        convertBtn.disabled = true;
    }
}

function handleUrlInputChange() {
    // If URL is typed, clear other inputs
    if (urlInput.value.trim() !== '') {
        htmlInput.value = '';
        htmlUpload.value = '';
        fileInfo.textContent = 'URL entered.';
        // Don't enable convertBtn immediately, wait for fetchUrlContent
        convertBtn.disabled = true;
    } else {
        // If URL is cleared, re-evaluate based on other inputs
        handleHtmlInputChange(); // Check if pasted HTML exists
        if (htmlUpload.files.length > 0) { // Check if file is selected
            convertBtn.disabled = false;
        } else if (htmlInput.value.trim() !== '') {
             convertBtn.disabled = false;
        } else {
            convertBtn.disabled = true;
        }
    }
}


async function fetchUrlContent() {
    const url = urlInput.value.trim();
    if (!url) {
        showError('Please enter a URL to fetch.');
        Swal.fire({
            title: 'URL Empty',
            text: 'Please enter a URL to fetch.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Fetching URL content...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Use a proxy if necessary for CORS issues.
    // For client-side, direct fetch to external URLs can be restricted by CORS.
    // This example assumes direct fetch might work for some URLs or will require a server-side proxy
    // if deployed in a real-world scenario with strict CORS policies.
    const proxyUrl = `https://api.allorigins.win/raw?url=${encodeURIComponent(url)}`;
    
    // Show loading alert
    const swalInstance = Swal.fire({
        title: 'Fetching Web Page',
        html: 'Please wait while we try to retrieve content from the URL...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const response = await fetch(proxyUrl); // Using a proxy to bypass CORS for testing
        if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
        const text = await response.text();
        currentHtmlContent = text;
        displayHtmlPreview(currentHtmlContent, url);
        fileInfo.textContent = `URL: ${url}`;
        htmlInput.value = ''; // Clear text area
        htmlUpload.value = ''; // Clear file input
        convertBtn.disabled = false;
        showStatus('URL content loaded. Previewing...', 'success');
        
        swalInstance.close();
        Swal.fire({
            title: 'URL Fetched!',
            text: `Content from ${url} loaded.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });

    } catch (error) {
        showError(`Failed to fetch URL: ${error.message}. (CORS or invalid URL)`);
        currentHtmlContent = ''; // Clear content on error
        htmlPreview.innerHTML = '<p class="text-center text-muted p-4">Failed to load URL content.</p>';
        contentSourceSpan.textContent = '';
        convertBtn.disabled = true;
        
        swalInstance.close();
        Swal.fire({
            title: 'Fetch Error',
            html: `Failed to fetch URL: ${error.message}. This might be due to CORS restrictions or an invalid URL.`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}


// Display HTML Preview
function displayHtmlPreview(html, sourceName) {
    htmlPreview.innerHTML = html;
    contentSourceSpan.textContent = `Source: ${sourceName}`;
    convertBtn.disabled = false;
}


// Convert HTML to PDF
async function convertHtmlToPdf() {
    if (!currentHtmlContent) {
        showError('No HTML content to convert. Please provide a file, code, or URL.');
        Swal.fire({
            title: 'Error',
            text: 'No HTML content to convert. Please provide a file, code, or URL.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting HTML to PDF...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Show loading alert
    const swalInstance = Swal.fire({
        title: 'Creating PDF',
        html: 'Please wait while we generate your PDF document...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const pageSize = document.getElementById('pageSize').value;
        const orientation = document.getElementById('orientation').value;
        const addPageNumbers = document.getElementById('addPageNumbers').checked;
        const includeBackground = document.getElementById('includeBackground').checked;

        // Create a temporary element to render the HTML, as html2canvas needs a DOM element
        const tempDiv = document.createElement('div');
        tempDiv.style.position = 'absolute';
        tempDiv.style.left = '-9999px'; // Position off-screen
        tempDiv.style.top = '0';
        // Use A4 width in pixels at 96 DPI (approx 794px for portrait)
        const pageWidthPx = orientation === 'portrait' ? 794 : 1123;
        tempDiv.style.width = pageWidthPx + 'px';
        tempDiv.style.padding = '40px'; // Add padding so content doesn't touch edges
        tempDiv.style.boxSizing = 'border-box';
        tempDiv.style.minHeight = '600px';
        tempDiv.style.backgroundColor = includeBackground ? '#ffffff' : 'transparent';
        tempDiv.innerHTML = currentHtmlContent;
        document.body.appendChild(tempDiv);

        // Wait for any images to load
        await waitForImages(tempDiv);

        // Get actual content dimensions
        const contentWidth = tempDiv.scrollWidth;
        const contentHeight = tempDiv.scrollHeight;

        const canvas = await html2canvas(tempDiv, {
            useCORS: true,
            allowTaint: true,
            backgroundColor: includeBackground ? '#ffffff' : null,
            scale: 2,
            logging: false,
            ignoreElements: (element) => {
                return element.id === 'convertBtn' || element.id === 'downloadBtn';
            },
            scrollX: 0,
            scrollY: 0,
            windowWidth: contentWidth,
            windowHeight: contentHeight,
            x: 0,
            y: 0,
            width: contentWidth,
            height: contentHeight
        });

        // if background is requested, draw it
        let imageData;
        if (includeBackground) {
            const tempCanvas = document.createElement('canvas');
            tempCanvas.width = canvas.width;
            tempCanvas.height = canvas.height;
            const tempCtx = tempCanvas.getContext('2d');
            tempCtx.fillStyle = '#ffffff'; // White background for the PDF
            tempCtx.fillRect(0, 0, tempCanvas.width, tempCanvas.height);
            tempCtx.drawImage(canvas, 0, 0);
            imageData = tempCanvas.toDataURL('image/jpeg', 1.0); // Use JPEG for smaller file size
        } else {
            imageData = canvas.toDataURL('image/png'); // PNG for transparency
        }

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        const imgWidth = doc.internal.pageSize.getWidth();
        const imgHeight = (canvas.height * imgWidth) / canvas.width;
        let position = 0;
        let heightLeft = imgHeight;

        doc.addImage(imageData, includeBackground ? 'JPEG' : 'PNG', 0, position, imgWidth, imgHeight);
        heightLeft -= doc.internal.pageSize.getHeight();

        while (heightLeft >= 0) {
            position = heightLeft - imgHeight;
            doc.addPage();
            doc.addImage(imageData, 'PNG', 0, position, imgWidth, imgHeight);
            heightLeft -= doc.internal.pageSize.getHeight();
        }

        // Add page numbers
        if (addPageNumbers) {
            const totalPages = doc.internal.getNumberOfPages();
            for (let i = 1; i <= totalPages; i++) {
                doc.setPage(i);
                doc.setFontSize(8);
                doc.text(`Page ${i} of ${totalPages}`, doc.internal.pageSize.getWidth() - 60, doc.internal.pageSize.getHeight() - 10, { align: 'right' });
            }
        }
        
        document.body.removeChild(tempDiv); // Clean up temp element


        const outputFileName = `converted_${contentSourceSpan.textContent.replace('Source: ', '').replace(/[^a-zA-Z0-9-.]/g, '_')}_${Date.now()}.pdf`;

        // Add to history
        addToHistory({
            fileName: outputFileName,
            date: new Date().toLocaleString(),
            format: 'pdf',
            source: contentSourceSpan.textContent.replace('Source: ', ''),
            htmlContent: currentHtmlContent, // Store the raw HTML to regenerate
            options: { // Store options needed for regeneration
                pageSize: pageSize,
                orientation: orientation,
                addPageNumbers: addPageNumbers,
                includeBackground: includeBackground
            }
        });
        
        showStatus('Conversion complete! Click Download PDF.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your HTML has been successfully converted to PDF.',
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
            html: `Error during PDF generation: ${error.message}. Please ensure your HTML is well-formed.`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// Download PDF
function downloadPdf() {
    if (!currentHtmlContent) {
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
        try {
            // Regenerate PDF on download to ensure options are applied correctly
            const pageSize = document.getElementById('pageSize').value;
            const orientation = document.getElementById('orientation').value;
            const addPageNumbers = document.getElementById('addPageNumbers').checked;
            const includeBackground = document.getElementById('includeBackground').checked;

            const tempDiv = document.createElement('div');
            tempDiv.style.position = 'absolute';
            tempDiv.style.left = '-9999px';
            tempDiv.style.top = '0';
            const pageWidthPx = orientation === 'portrait' ? 794 : 1123;
            tempDiv.style.width = pageWidthPx + 'px';
            tempDiv.style.padding = '40px';
            tempDiv.style.boxSizing = 'border-box';
            tempDiv.style.minHeight = '600px';
            tempDiv.style.backgroundColor = includeBackground ? '#ffffff' : 'transparent';
            tempDiv.innerHTML = currentHtmlContent;
            document.body.appendChild(tempDiv);

            await waitForImages(tempDiv);

            const contentWidth = tempDiv.scrollWidth;
            const contentHeight = tempDiv.scrollHeight;

            const canvas = await html2canvas(tempDiv, {
                useCORS: true,
                allowTaint: true,
                backgroundColor: includeBackground ? '#ffffff' : null,
                scale: 2,
                logging: false,
                ignoreElements: (element) => {
                    return element.id === 'convertBtn' || element.id === 'downloadBtn';
                },
                scrollX: 0,
                scrollY: 0,
                windowWidth: contentWidth,
                windowHeight: contentHeight,
                x: 0,
                y: 0,
                width: contentWidth,
                height: contentHeight
            });

            let imageData;
            if (includeBackground) {
                const tempCanvas = document.createElement('canvas');
                tempCanvas.width = canvas.width;
                tempCanvas.height = canvas.height;
                const tempCtx = tempCanvas.getContext('2d');
                tempCtx.fillStyle = '#ffffff';
                tempCtx.fillRect(0, 0, tempCanvas.width, tempCanvas.height);
                tempCtx.drawImage(canvas, 0, 0);
                imageData = tempCanvas.toDataURL('image/jpeg', 1.0);
            } else {
                imageData = canvas.toDataURL('image/png');
            }

            const { jsPDF } = window.jspdf;
            const doc = new jsPDF(orientation, 'pt', pageSize);

            const imgWidth = doc.internal.pageSize.getWidth();
            const imgHeight = (canvas.height * imgWidth) / canvas.width;
            let position = 0;
            let heightLeft = imgHeight;

            doc.addImage(imageData, includeBackground ? 'JPEG' : 'PNG', 0, position, imgWidth, imgHeight);
            heightLeft -= doc.internal.pageSize.getHeight();

            while (heightLeft >= 0) {
                position = heightLeft - imgHeight;
                doc.addPage();
                doc.addImage(imageData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= doc.internal.pageSize.getHeight();
            }

            if (addPageNumbers) {
                const totalPages = doc.internal.getNumberOfPages();
                for (let i = 1; i <= totalPages; i++) {
                    doc.setPage(i);
                    doc.setFontSize(8);
                    doc.text(`Page ${i} of ${totalPages}`, doc.internal.pageSize.getWidth() - 60, doc.internal.pageSize.getHeight() - 10, { align: 'right' });
                }
            }
            document.body.removeChild(tempDiv);
            
            const outputFileName = `converted_${contentSourceSpan.textContent.replace('Source: ', '').replace(/[^a-zA-Z0-9-.]/g, '_')}_${Date.now()}.pdf`;
            doc.save(outputFileName);
            
            showStatus('PDF file downloaded!', 'success');
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
            Swal.fire({
                title: 'Download Error',
                text: error.message,
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
        format: item.format,
        source: item.source,
        htmlContent: item.htmlContent, // Store raw HTML content
        options: item.options // Store conversion options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('htmlConversionHistory', JSON.stringify(conversionHistory));
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
            <td>${item.source}</td>
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
            localStorage.setItem('htmlConversionHistory', JSON.stringify(conversionHistory));
            displayHistory();
        }
    });
}

async function downloadHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.htmlContent) return;

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
        try {
            // Regenerate PDF using stored HTML content and options
            const { jsPDF } = window.jspdf;
            
            const tempDiv = document.createElement('div');
            tempDiv.style.position = 'absolute';
            tempDiv.style.left = '-9999px';
            tempDiv.style.top = '0';
            const pageWidthPx = item.options.orientation === 'portrait' ? 794 : 1123;
            tempDiv.style.width = pageWidthPx + 'px';
            tempDiv.style.padding = '40px';
            tempDiv.style.boxSizing = 'border-box';
            tempDiv.style.minHeight = '600px';
            tempDiv.style.backgroundColor = item.options.includeBackground ? '#ffffff' : 'transparent';
            tempDiv.innerHTML = item.htmlContent;
            document.body.appendChild(tempDiv);

            await waitForImages(tempDiv);

            const contentWidth = tempDiv.scrollWidth;
            const contentHeight = tempDiv.scrollHeight;

            const canvas = await html2canvas(tempDiv, {
                useCORS: true,
                allowTaint: true,
                backgroundColor: item.options.includeBackground ? '#ffffff' : null,
                scale: 2,
                logging: false,
                ignoreElements: (element) => {
                    return element.id === 'convertBtn' || element.id === 'downloadBtn';
                },
                scrollX: 0,
                scrollY: 0,
                windowWidth: contentWidth,
                windowHeight: contentHeight,
                x: 0,
                y: 0,
                width: contentWidth,
                height: contentHeight
            });

            let imageData;
            if (item.options.includeBackground) {
                const tempCanvas = document.createElement('canvas');
                tempCanvas.width = canvas.width;
                tempCanvas.height = canvas.height;
                const tempCtx = tempCanvas.getContext('2d');
                tempCtx.fillStyle = '#ffffff';
                tempCtx.fillRect(0, 0, tempCanvas.width, tempCanvas.height);
                tempCtx.drawImage(canvas, 0, 0);
                imageData = tempCanvas.toDataURL('image/jpeg', 1.0);
            } else {
                imageData = canvas.toDataURL('image/png');
            }

            const doc = new jsPDF(item.options.orientation, 'pt', item.options.pageSize);

            const imgWidth = doc.internal.pageSize.getWidth();
            const imgHeight = (canvas.height * imgWidth) / canvas.width;
            let position = 0;
            let heightLeft = imgHeight;

            doc.addImage(imageData, item.options.includeBackground ? 'JPEG' : 'PNG', 0, position, imgWidth, imgHeight);
            heightLeft -= doc.internal.pageSize.getHeight();

            while (heightLeft >= 0) {
                position = heightLeft - imgHeight;
                doc.addPage();
                doc.addImage(imageData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= doc.internal.pageSize.getHeight();
            }

            if (item.options.addPageNumbers) {
                const totalPages = doc.internal.getNumberOfPages();
                for (let i = 1; i <= totalPages; i++) {
                    doc.setPage(i);
                    doc.setFontSize(8);
                    doc.text(`Page ${i} of ${totalPages}`, doc.internal.pageSize.getWidth() - 60, doc.internal.pageSize.getHeight() - 10, { align: 'right' });
                }
            }
            document.body.removeChild(tempDiv);

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
        } catch (error) {
            showError(`Error during history PDF download: ${error.message}`);
            Swal.fire({
                title: 'Download Error',
                text: error.message,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    }, 1500);
}

function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.htmlContent) return;

    htmlPreview.innerHTML = item.htmlContent;
    contentSourceSpan.textContent = `Source: ${item.source} (History)`;
    
    // Update options fields to reflect historical item's settings
    document.getElementById('pageSize').value = item.options.pageSize;
    document.getElementById('orientation').value = item.options.orientation;
    document.getElementById('addPageNumbers').checked = item.options.addPageNumbers;
    document.getElementById('includeBackground').checked = item.options.includeBackground;

    showStatus(`Previewing ${item.source} from history`, 'info');
    
    // Scroll to preview area
    htmlPreview.scrollIntoView({ behavior: 'smooth' });

    // Enable convert and download buttons based on historical data
    convertBtn.disabled = false;
    downloadBtn.disabled = false;
    currentHtmlContent = item.htmlContent; // Set current content for download/re-convert
}


// Helper function to wait for images to load
function waitForImages(container) {
    const images = container.querySelectorAll('img');
    const promises = Array.from(images).map(img => {
        if (img.complete) return Promise.resolve();
        return new Promise((resolve, reject) => {
            img.onload = resolve;
            img.onerror = resolve; // Continue even if image fails
        });
    });
    return Promise.all(promises);
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