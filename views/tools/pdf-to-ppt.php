<?php
// SEO and Page Metadata
$page_title = "PDF to PowerPoint Converter - Convert PDF to PPTX Online Free"; // You may Change the Title here
$page_description = "Convert PDF to PowerPoint (PPT/PPTX) online for free. Transform PDF slides into editable presentations. Preserve layout and images. Fast and accurate."; // Put your Description here
$page_keywords = "pdf to ppt, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
        
        <div class="col-lg-7 border shadow-sm">
            <div class="tool-container rounded-3 p-4 p-md-5">
                <header class="text-center mb-4">
                    <h1 class="h2">PDF to PowerPoint Converter <i class="fas fa-file-powerpoint text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Transform your PDF slides into high-quality, editable PowerPoint presentations.</p>
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
                                <label for="pageRange" class="form-label">Page Range</label>
                                <input type="text" id="pageRange" class="form-control" placeholder="e.g. 1-3, 5" value="1-">
                            </div>
                            <div class="col-md-6">
                                <label for="outputFormat" class="form-label">Output Format</label>
                                <select id="outputFormat" class="form-select">
                                    <option value="pptx" selected>PowerPoint (PPTX)</option>
                                    <option value="ppt">PowerPoint 97-2003 (PPT)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="contentMode" class="form-label">Content Mode</label>
                                <select id="contentMode" class="form-select">
                                    <option value="textAndImages" selected>Text + Images</option>
                                    <option value="text">Text Only</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="layoutMode" class="form-label">Layout Mode</label>
                                <select id="layoutMode" class="form-select">
                                    <option value="flow" selected>Flow Layout (Editable)</option>
                                    <option value="fixed">Fixed Layout (Preserve PDF Appearance)</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="smartTextExtraction" checked>
                                    <label class="form-check-label" for="smartTextExtraction">
                                        Attempt Smart Text Extraction (Best for Editability)
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
                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>Text Preview</h5>
                        <span class="badge bg-info" id="pageCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <div class="text-responsive" style="max-height: 300px; overflow-y: auto;">
                            <pre id="textPreviewContent" class="p-3 mb-0 bg-light text-muted small">Upload PDF to see text preview.</pre>
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
                <?php include '../../views/content/pdf-to-ppt-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script>
    // Set the workerSrc for pdf.js
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';
</script>
<!-- PptxGenJS -->
<script src="https://cdn.jsdelivr.net/npm/pptxgenjs@3.11.0/dist/pptxgen.bundle.js"></script>

<!-- Check if PptxGenJS loaded -->
<script>
    // Wait for scripts to load and check
    window.addEventListener('load', function() {
        console.log('Checking for PptxGenJS...');
        console.log('window.PptxGenJS:', window.PptxGenJS);
        console.log('typeof PptxGenJS:', typeof PptxGenJS);
        
        if (typeof PptxGenJS === 'undefined') {
            console.error('PptxGenJS failed to load. All available global objects:');
            var pptxKeys = Object.keys(window).filter(function(k) { 
                return k.toLowerCase().indexOf('pptx') !== -1; 
            });
            console.log('PPTX-related globals:', pptxKeys);
        } else {
            console.log('PptxGenJS loaded successfully');
        }
    });
</script>

<script>
let files = [];
let pdfTextContent = []; // Stores extracted text per page
let conversionHistory = JSON.parse(localStorage.getItem('pptConversionHistory')) || [];

// Initialize elements
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const textPreviewContent = document.getElementById('textPreviewContent');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const pageCountSpan = document.getElementById('pageCount');
const pageRangeInput = document.getElementById('pageRange');
const slideLayoutSelect = document.getElementById('slideLayout');
const smartTextExtractionCheckbox = document.getElementById('smartTextExtraction');


// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertPdfToPpt);
downloadBtn.addEventListener('click', downloadPpt);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PDF to PPT Converter',
        html: `Follow these steps to convert your PDFs:<br><br>
        <ol class="text-start">
            <li>Upload PDF by clicking "Select PDF Files" or dragging it into the drop zone.</li>
            <li>Specify page range and slide layout.</li>
            <li>Click "Convert" to process and prepare the PPT.</li>
            <li>Download your newly created PowerPoint file.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    files = [];
    pdfTextContent = [];
    pdfDocument = null;
    window.currentPptx = null;
    window.currentFileName = null;
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    textPreviewContent.textContent = 'Upload PDF to see text preview.';
    pageCountSpan.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    pageRangeInput.value = '';
    slideLayoutSelect.value = 'TITLE_AND_CONTENT';
    smartTextExtractionCheckbox.checked = true;

    Swal.fire({
        title: 'Reset',
        text: 'All fields and selected files have been reset.',
        icon: 'info',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
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

    files = Array.from(selectedFiles).filter(file => {
        if (file.type !== 'application/pdf') {
            showError('Please upload only PDF files.');
            return false;
        }
        if (file.size > 50 * 1024 * 1024) { // Max 50MB
            showError('Each file must be less than 50MB.');
            return false;
        }
        return true;
    });

    if (files.length > 0) {
        // We will process only the first file for simplicity
        fileInfo.textContent = `${files[0].name} selected.`;
        showStatus('File selected. Reading PDF for preview...', 'info');
        
        // Show success message
        Swal.fire({
            title: 'File Added',
            text: `${files[0].name} has been selected for conversion.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });

        // Read and preview PDF text
        try {
            const fileReader = new FileReader();
            fileReader.onload = async function() {
                const typedArray = new Uint8Array(this.result);
                pdfDocument = await pdfjsLib.getDocument(typedArray).promise;
                pdfTextContent = []; // Clear previous content

                for (let i = 1; i <= pdfDocument.numPages; i++) {
                    const page = await pdfDocument.getPage(i);
                    const textContent = await page.getTextContent();
                    const pageText = textContent.items.map(s => s.str).join(' ');
                    pdfTextContent.push(pageText);
                }
                displayPreview(pdfTextContent);
                convertBtn.disabled = false;
                showStatus('PDF loaded. Click Convert to create PPT with preserved layout.', 'success');
            };
            fileReader.readAsArrayBuffer(files[0]);
        } catch (error) {
            showError(`Error reading PDF: ${error.message}`);
            Swal.fire({
                title: 'Error Reading PDF',
                text: error.message,
                icon: 'error',
                confirmButtonText: 'OK'
            });
            convertBtn.disabled = true;
        }
    }
}

// Display text preview
function displayPreview(textArray) {
    if (textArray.length > 0) {
        textPreviewContent.textContent = textArray.join('\n\n--- Page Break ---\n\n');
        pageCountSpan.textContent = `Pages: ${textArray.length}`;
    } else {
        textPreviewContent.textContent = 'No text content found or extracted.';
        pageCountSpan.textContent = 'Pages: 0';
    }
}

// Parse page range input (e.g., "1-3,5,7")
function parsePageRange(rangeStr, totalPages) {
    if (!rangeStr) return Array.from({length: totalPages}, (_, i) => i + 1); // All pages
    
    const pages = new Set();
    const parts = rangeStr.split(',').map(part => part.trim());

    parts.forEach(part => {
        if (part.includes('-')) {
            const [start, end] = part.split('-').map(Number);
            if (!isNaN(start) && !isNaN(end) && start <= end) {
                for (let i = start; i <= end; i++) {
                    if (i >= 1 && i <= totalPages) {
                        pages.add(i);
                    }
                }
            }
        } else {
            const pageNum = Number(part);
            if (!isNaN(pageNum) && pageNum >= 1 && pageNum <= totalPages) {
                pages.add(pageNum);
            }
        }
    });
    return Array.from(pages).sort((a, b) => a - b);
}


// Store PDF document for image rendering
let pdfDocument = null;

// Convert PDF to PPT with high fidelity (Primary: ConvertAPI, Fallback: PptxGenJS)
async function convertPdfToPpt() {
    if (files.length === 0) {
        showError('No PDF data to convert. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No PDF data to convert. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    const file = files[0];
    const pageRange = pageRangeInput.value;
    const slideLayout = slideLayoutSelect.value;
    const smartExtraction = smartTextExtractionCheckbox.checked;

    showStatus('Preparing high-fidelity editable PPTX conversion...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Show loading alert
    const swalInstance = Swal.fire({
        title: 'Creating PowerPoint',
        html: 'Performing high-fidelity conversion... This ensures your PPTX is fully editable.',
        timerProgressBar: true,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        // ── PATH A: PROFESSIONAL API (FIDELITY-FIRST & EDITABLE) ──────────
        try {
            const formData = new FormData();
            formData.append('File', file);
            formData.append('StoreFile', 'true');
            if (pageRange && pageRange !== '1-' && pageRange !== 'All pages') {
                formData.append('PageRange', pageRange);
            }

            const outputFormat = document.getElementById('outputFormat').value || 'pptx';
            const layoutMode = document.getElementById('layoutMode').value || 'flow';
            
            // Direct browser-to-cloud API call to bypass server limits
            const apiUrl = `https://v2.convertapi.com/convert/pdf/to/${outputFormat}?Secret=WoZf9gPWyMeW4eTB701cdm4e818fuh4g`;
            const response = await fetch(apiUrl, { method: 'POST', body: formData });
            const result = await response.json();

            if (response.ok && result.Files && result.Files.length > 0) {
                const dlResponse = await fetch(result.Files[0].Url);
                const pptxBlob = await dlResponse.blob();
                
                const fileName = file.name.replace(/\.pdf$/i, '.' + outputFormat);
                
                // Store for download
                window.currentPptxBlob = pptxBlob;
                window.currentFileName = fileName;
                window.isApiConversion = true;

                addToHistory({
                    fileName: fileName,
                    date: new Date().toLocaleString(),
                    format: 'pptx',
                    data: pdfTextContent,
                    blob: pptxBlob,
                    options: {
                        pageRange: pageRange,
                        slideLayout: slideLayout,
                        smartTextExtraction: smartExtraction,
                        method: 'api-high-fidelity'
                    }
                });

                showStatus('High-fidelity conversion complete! Click Download.', 'success');
                swalInstance.close();
                Swal.fire({
                    title: 'Success!',
                    text: 'Your PDF has been converted to an editable PowerPoint with perfect layout.',
                    icon: 'success',
                    confirmButtonText: 'Great!',
                    timer: 2000,
                    timerProgressBar: true
                });

                convertBtn.disabled = false;
                downloadBtn.disabled = false;
                return; // Success, exit function
            } else {
                throw new Error(result.Message || 'API Conversion failed');
            }
        } catch (apiErr) {
            console.warn('API Path failed, falling back to local rendering:', apiErr.message);
            // Fall through to Path B
        }

        // ── PATH B: LOCAL RENDERING (FALLBACK - IMAGE BASED) ─────────────
        if (!pdfDocument || pdfTextContent.length === 0) {
            throw new Error('Fallback failed: No PDF data loaded.');
        }

        if (typeof PptxGenJS === 'undefined') {
            throw new Error('PptxGenJS library is not loaded. Please check your internet connection.');
        }
        
        const pptx = new PptxGenJS();
        const parsedPageRange = parsePageRange(pageRange, pdfTextContent.length);
        
        pptx.defineSlideMaster({
            title: 'PDF_PAGE',
            background: { color: 'FFFFFF' }
        });

        for (let i = 0; i < parsedPageRange.length; i++) {
            const pageNum = parsedPageRange[i];
            const page = await pdfDocument.getPage(pageNum);
            const scale = 2.0; 
            const viewport = page.getViewport({ scale: scale });
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.width = viewport.width;
            canvas.height = viewport.height;
            context.fillStyle = 'white';
            context.fillRect(0, 0, canvas.width, canvas.height);
            
            await page.render({ canvasContext: context, viewport: viewport }).promise;
            const imageData = canvas.toDataURL('image/png', 1.0);
            
            const slide = pptx.addSlide();
            const slideWidth = 10;
            const slideHeight = 5.625;
            const imgWidth = canvas.width;
            const imgHeight = canvas.height;
            const scaleX = slideWidth / imgWidth;
            const scaleY = slideHeight / imgHeight;
            const imgScale = Math.min(scaleX, scaleY);
            const finalWidth = imgWidth * imgScale;
            const finalHeight = imgHeight * imgScale;
            const x = (slideWidth - finalWidth) / 2;
            const y = (slideHeight - finalHeight) / 2;
            
            slide.addImage({ data: imageData, x: x, y: y, w: finalWidth, h: finalHeight });
            page.cleanup();
        }

        const fileName = file.name.replace('.pdf', '.pptx');
        window.currentPptx = pptx;
        window.currentFileName = fileName;
        window.isApiConversion = false;
        
        addToHistory({
            fileName: fileName,
            date: new Date().toLocaleString(),
            format: 'pptx',
            data: pdfTextContent,
            options: {
                pageRange: pageRange,
                slideLayout: slideLayout,
                smartTextExtraction: smartExtraction,
                method: 'local-rendering'
            }
        });
        
        showStatus('Conversion complete (Basic mode). For editable text, ensure API access.', 'success');
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete',
            text: 'Converted using local rendering (preserved as images).',
            icon: 'info',
            confirmButtonText: 'OK'
        });
        
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
    } catch (error) {
        showError(`Error during conversion: ${error.message}`);
        convertBtn.disabled = false;
        downloadBtn.disabled = true;
        swalInstance.close();
        Swal.fire({ title: 'Conversion Error', text: error.message, icon: 'error' });
    }
}

// Download PPT
function downloadPpt() {
    if (window.isApiConversion && window.currentPptxBlob) {
        const url = URL.createObjectURL(window.currentPptxBlob);
        const a = document.createElement('a');
        a.href = url;
        a.download = window.currentFileName;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        showStatus('PPTX file downloaded!', 'success');
    } else if (window.currentPptx) {
        window.currentPptx.writeFile({ fileName: window.currentFileName });
        showStatus('PPTX file downloaded!', 'success');
    } else {
        showError('No PPTX to download. Please convert first.');
    }
}

// History Functions
function addToHistory(item) {
    const historyItem = {
        id: Date.now(),
        fileName: item.fileName,
        date: item.date,
        format: item.format,
        data: item.data, // Store raw extracted text
        options: item.options // Store conversion options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('pptConversionHistory', JSON.stringify(conversionHistory));
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
                <button class="btn btn-sm btn-outline-secondary preview-history ms-1" data-id="${item.id}" title="Preview Text">
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
            localStorage.setItem('pptConversionHistory', JSON.stringify(conversionHistory));
            displayHistory();
        }
    });
}

function downloadHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    showStatus(`Downloading ${item.fileName}...`, 'info');
    
    // Show loading alert
    Swal.fire({
        title: 'Preparing Download',
        html: `Preparing ${item.fileName} for download...`,
        timer: 1000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(async () => {
        // If it was an API conversion, use the stored blob if we had it (though we don't store blobs in localStorage)
        // Since we don't store blobs, we need to regenerate if it was local, or it's just a download link if we had a URL
        // However, for this implementation, we'll try to redo the conversion if it's missing, or just show an error
        
        if (item.options && item.options.method === 'api-high-fidelity') {
            // Re-conversion might be needed or we could have stored a temporary URL if this was a recent session
            // For persistence, we'd need a server-side storage. For now, we'll inform the user.
            Swal.fire({
                title: 'Re-conversion Required',
                text: 'High-fidelity files are processed in real-time. Please re-upload and convert the file for the best (editable) result.',
                icon: 'info',
                confirmButtonText: 'OK'
            });
            return;
        }

        // Fallback for local rendering history items
        if (typeof PptxGenJS === 'undefined') {
            Swal.fire('Error', 'PptxGenJS library is not loaded.', 'error');
            return;
        }
        const pptx = new PptxGenJS();
        const slideLayout = item.options.slideLayout;
        const smartExtraction = item.options.smartTextExtraction;
        const pageRange = parsePageRange(item.options.pageRange, item.data.length);

        for (const pageNum of pageRange) {
            const text = item.data[pageNum - 1];
            if (text) {
                const slide = pptx.addSlide(slideLayout);
                const lines = text.split('\n').filter(line => line.trim() !== '');
                if (lines.length > 0) {
                    const title = smartExtraction && lines.length > 1 ? lines[0].trim() : '';
                    const content = smartExtraction && lines.length > 1 ? lines.slice(1).join('\n').trim() : lines.join('\n').trim();

                    if (slideLayout === 'TITLE_AND_CONTENT') {
                        if (title) slide.addText(title, { x: 0.5, y: 0.5, w: 9, h: 0.75, fontSize: 24, bold: true, align: 'center', valign: 'middle' });
                        if (content) slide.addText(content, { x: 0.5, y: 1.5, w: 9, h: 6, fontSize: 12 });
                    } else if (slideLayout === 'TITLE_SLIDE') {
                        if (title) slide.addText(title, { x: 0.5, y: 3, w: 9, h: 1, fontSize: 32, bold: true, align: 'center', valign: 'middle' });
                        else if (content) slide.addText(content.substring(0, Math.min(200, content.length)), { x: 0.5, y: 3, w: 9, h: 1, fontSize: 32, bold: true, align: 'center', valign: 'middle' });
                    } else {
                        slide.addText(text, { x: 0.5, y: 0.5, w: 9, h: 6.5, fontSize: 12 });
                    }
                }
            }
        }
        
        pptx.writeFile({ fileName: item.fileName });
        showStatus(`${item.fileName} downloaded!`, 'success');
    }, 1000);
}

function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    // Display the historical text content in the preview area
    displayPreview(item.data);
    pageCountSpan.textContent = `Pages: ${item.data.length} (from history)`;
    showStatus(`Previewing text from ${item.fileName}`, 'info');
    
    // Scroll to preview area
    textPreviewContent.scrollIntoView({ behavior: 'smooth' });
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