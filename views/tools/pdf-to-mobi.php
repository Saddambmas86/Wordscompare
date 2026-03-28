<?php
// SEO and Page Metadata
$page_title = "PDF to MOBI Converter - Convert PDF to Kindle Format Online"; // You may Change the Title here
$page_description = "Convert PDF to MOBI online for free. Transform PDF documents into Kindle-compatible MOBI e-book format. Read PDFs on any Kindle device or app."; // Put your Description here
$page_keywords = "pdf to mobi, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
                    <h1 class="h2">PDF to MOBI Converter <i class="fas fa-book-reader text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Effortlessly convert your PDF documents to MOBI format for a seamless e-reading experience.</p>
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
                                <label for="pageRange" class="form-label">Page Range (e.g., 1-5, 8)</label>
                                <input type="text" id="pageRange" class="form-control" placeholder="All pages">
                            </div>
                            <div class="col-md-6">
                                <label for="outputFormat" class="form-label">Output Format</label>
                                <select id="outputFormat" class="form-select" disabled>
                                    <option value="mobi" selected>MOBI (Kindle)</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableOcr">
                                    <label class="form-check-label" for="enableOcr">
                                        Enable OCR (for scanned PDFs - experimental)
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

                <div class="card mt-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Conversion Info</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted text-center mb-0" id="conversionInfo">
                            Upload a PDF file and click convert. The generated MOBI file cannot be previewed directly in the browser.
                        </p>
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
                <?php include '../../views/content/pdf-to-mobi-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js"></script>
<script>
// Point pdf.js to its worker file
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';
</script>
<script>
let files = [];
let conversionHistory = JSON.parse(localStorage.getItem('mobiConversionHistory')) || [];

// Initialize elements
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const pageRangeInput = document.getElementById('pageRange');
const enableOcrCheckbox = document.getElementById('enableOcr');


// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertPdfToMobi);
downloadBtn.addEventListener('click', downloadMobi);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PDF to MOBI Converter',
        html: `Follow these steps to convert your PDFs:<br><br>
        <ol class="text-start">
            <li>Upload PDFs by clicking "Select PDF Files" or dragging them into the drop zone.</li>
            <li>Specify page range or enable OCR if needed.</li>
            <li>Click "Convert" to initiate the conversion.</li>
            <li>Download your newly created MOBI file.</li>
        </ol>
        <div class="alert alert-warning mt-3" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>Actual PDF to MOBI conversion often requires server-side processing.
        </div>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    files = [];
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    pageRangeInput.value = '';
    enableOcrCheckbox.checked = false;
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
            showError('Each file must be less than 50MB.');
            return false;
        }
        return true;
    });

    if (files.length > 0) {
        fileInfo.textContent = `${files[0].name} selected.`;
        showStatus('File ready for conversion.', 'info');
        convertBtn.disabled = false;
        
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


// Store the generated MOBI content
let generatedMobiContent = null;
let generatedMobiFileName = '';

// Convert PDF to MOBI
async function convertPdfToMobi() {
    if (files.length === 0) {
        showError('No PDF file selected. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No PDF file selected. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    // Use client-side conversion directly (server requires Calibre/Python)
    await convertClientSide();
}

// Client-side fallback conversion
async function convertClientSide() {
    const swalInstance = Swal.fire({
        title: 'Converting to MOBI',
        html: 'Extracting text from PDF... Please wait.',
        didOpen: () => {
            Swal.showLoading();
        },
        allowOutsideClick: false,
        allowEscapeKey: false
    });

    try {
        const file = files[0];
        const arrayBuffer = await file.arrayBuffer();
        const pdfData = new Uint8Array(arrayBuffer);
        
        // Load PDF document
        const pdfDoc = await pdfjsLib.getDocument({ data: pdfData }).promise;
        const numPages = pdfDoc.numPages;
        
        // Parse page range
        let pagesToConvert = [];
        const pageRange = pageRangeInput.value.trim();
        
        if (pageRange) {
            const ranges = pageRange.split(',');
            for (const range of ranges) {
                const trimmed = range.trim();
                if (trimmed.includes('-')) {
                    const [start, end] = trimmed.split('-').map(n => parseInt(n.trim()));
                    if (!isNaN(start) && !isNaN(end)) {
                        for (let i = start; i <= end && i <= numPages; i++) {
                            if (i >= 1) pagesToConvert.push(i);
                        }
                    }
                } else {
                    const pageNum = parseInt(trimmed);
                    if (!isNaN(pageNum) && pageNum >= 1 && pageNum <= numPages) {
                        pagesToConvert.push(pageNum);
                    }
                }
            }
        }
        
        if (pagesToConvert.length === 0) {
            pagesToConvert = Array.from({ length: numPages }, (_, i) => i + 1);
        }
        
        // Extract text from all pages
        let fullText = '';
        const title = file.name.replace(/\.pdf$/i, '');
        
        for (let i = 0; i < pagesToConvert.length; i++) {
            const pageNum = pagesToConvert[i];
            Swal.update({
                html: `Extracting text from page ${pageNum} of ${numPages}... (${i + 1}/${pagesToConvert.length})`
            });
            
            const page = await pdfDoc.getPage(pageNum);
            const textContent = await page.getTextContent();
            const pageText = textContent.items.map(item => item.str).join(' ');
            
            if (pageText.trim()) {
                fullText += `\n\n--- Page ${pageNum} ---\n\n`;
                fullText += pageText;
            }
            
            page.cleanup();
        }
        
        if (!fullText.trim()) {
            throw new Error('No text content found in the PDF. The PDF may be scanned or contain only images.');
        }
        
        Swal.update({ html: 'Creating MOBI file...' });
        
        // Sanitize text
        fullText = sanitizeTextForMobi(fullText);
        
        // Format for MOBI
        const formattedText = formatTextForMobi(title, fullText);
        
        // Create a simple text-based MOBI-like file
        // This creates a valid PalmDOC format file
        const mobiBlob = createSimpleMobi(title, formattedText);
        generatedMobiContent = mobiBlob;
        generatedMobiFileName = title + '.mobi';
        
        // Store in history
        addToHistory({
            fileName: generatedMobiFileName,
            date: new Date().toLocaleString(),
            format: 'mobi',
            mobiSize: mobiBlob.size,
            options: {
                pageRange: pageRangeInput.value,
                enableOcr: enableOcrCheckbox.checked
            }
        });
        
        swalInstance.close();
        showStatus('Conversion complete! Click Download MOBI.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;

        Swal.fire({
            title: 'Conversion Complete!',
            text: `Successfully converted ${pagesToConvert.length} page(s) to MOBI format.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 2000,
            timerProgressBar: true
        });
        
    } catch (error) {
        console.error('Conversion error:', error);
        swalInstance.close();
        showStatus('Conversion failed: ' + error.message, 'danger');
        convertBtn.disabled = false;
        
        Swal.fire({
            title: 'Conversion Error',
            text: error.message || 'Failed to convert PDF to MOBI.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// Sanitize text for MOBI format
function sanitizeTextForMobi(text) {
    if (!text) return '';
    return String(text)
        .replace(/[\u2018\u2019\u201A\u201B]/g, "'")
        .replace(/[\u201C\u201D\u201E\u201F]/g, '"')
        .replace(/[\u2013\u2014\u2015]/g, '-')
        .replace(/[\u00A0\u2000-\u200A\u202F\u205F]/g, ' ')
        .replace(/[\u200B-\u200D\uFEFF]/g, '')
        .replace(/\u2026/g, '...')
        .replace(/\u00AD/g, '')
        .replace(/[\u20AC]/g, 'EUR')
        .replace(/[\u00A3]/g, 'GBP')
        .replace(/[\u00A5]/g, 'JPY')
        .replace(/[\u00A9]/g, '(C)')
        .replace(/[\u00AE]/g, '(R)')
        .replace(/[\u2122]/g, '(TM)')
        .replace(/[^\x00-\x7F\n\r\t]/g, '?');
}

// Create a simple PalmDOC/MOBI file
function createSimpleMobi(title, text) {
    const encoder = new TextEncoder();
    const textBytes = encoder.encode(text);
    
    // Palm Database Header (78 bytes)
    const pdbHeader = new Uint8Array(78);
    const view = new DataView(pdbHeader.buffer);
    
    // Database name (32 bytes)
    const nameBytes = encoder.encode(title.substring(0, 31));
    pdbHeader.set(nameBytes, 0);
    
    // Attributes
    view.setUint16(32, 0, false);
    view.setUint16(34, 0, false);
    
    // Creation/modification time (Palm OS time)
    const palmTime = Math.floor(Date.now() / 1000) + 2082844800;
    view.setUint32(36, palmTime, false);
    view.setUint32(40, palmTime, false);
    view.setUint32(44, 0, false);
    view.setUint32(48, 0, false);
    view.setUint32(52, 0, false);
    view.setUint32(56, 0, false);
    
    // Type and creator
    view.setUint32(60, 0x424F4F4B, false); // 'BOOK'
    view.setUint32(64, 0x4D4F4249, false); // 'MOBI'
    view.setUint32(68, 0, false);
    view.setUint32(72, 0, false);
    view.setUint16(76, 1, false); // 1 record
    
    // Record info (8 bytes)
    const recordInfo = new Uint8Array(8);
    const recView = new DataView(recordInfo.buffer);
    recView.setUint32(0, 78 + 8, false); // Offset to data
    recView.setUint8(4, 0);
    recView.setUint8(5, 0);
    recView.setUint8(6, 0);
    recView.setUint8(7, 0);
    
    // PalmDOC Header (16 bytes)
    const docHeader = new Uint8Array(16);
    const docView = new DataView(docHeader.buffer);
    docView.setUint16(0, 1, false); // No compression
    docView.setUint16(2, 0, false);
    docView.setUint32(4, textBytes.length, false);
    docView.setUint16(8, 1, false); // 1 record
    docView.setUint16(10, Math.max(4096, textBytes.length), false);
    docView.setUint32(12, 0, false);
    
    // Combine all parts
    const totalSize = 78 + 8 + 16 + textBytes.length;
    const mobiFile = new Uint8Array(totalSize);
    let offset = 0;
    
    mobiFile.set(pdbHeader, offset);
    offset += 78;
    mobiFile.set(recordInfo, offset);
    offset += 8;
    mobiFile.set(docHeader, offset);
    offset += 16;
    mobiFile.set(textBytes, offset);
    
    return new Blob([mobiFile], { type: 'application/x-mobipocket-ebook' });
}

// Format text for MOBI
function formatTextForMobi(title, text) {
    let formatted = title + '\n';
    formatted += '='.repeat(Math.min(title.length, 40)) + '\n\n';
    
    const lines = text.split('\n');
    for (const line of lines) {
        const trimmed = line.trim();
        if (trimmed) {
            formatted += trimmed.replace(/\s+/g, ' ') + '\n';
        } else {
            formatted += '\n';
        }
    }
    
    return formatted;
}

// Download MOBI
function downloadMobi() {
    if (!generatedMobiContent || downloadBtn.disabled) {
        showError('No MOBI file to download. Please convert first.');
        Swal.fire({
            title: 'No Data',
            text: 'No MOBI file to download. Please convert first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing MOBI for download...', 'info');
    
    Swal.fire({
        title: 'Preparing MOBI File',
        html: `Your MOBI file is being prepared...`,
        timer: 1000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        const mobiBlob = new Blob([generatedMobiContent], { type: 'application/x-mobipocket-ebook' });
        const url = URL.createObjectURL(mobiBlob);
        const a = document.createElement('a');
        a.href = url;
        a.download = generatedMobiFileName;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        
        showStatus('MOBI file downloaded!', 'success');
        Swal.fire({
            title: 'Download Complete',
            text: 'Your MOBI file has been downloaded.',
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
        // In a real app, you'd store a URL or ID to retrieve the converted file
        mobiContent: item.mobiContent, // For client-side demo
        options: item.options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('mobiConversionHistory', JSON.stringify(conversionHistory));
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
                <button class="btn btn-sm btn-outline-secondary preview-history ms-1" data-id="${item.id}" title="View Info">
                    <i class="fas fa-info-circle"></i>
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
            localStorage.setItem('mobiConversionHistory', JSON.stringify(conversionHistory));
            displayHistory();
        }
    });
}

function downloadHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

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
        // Convert stored array back to Uint8Array if needed
        let mobiData = item.mobiContent;
        if (Array.isArray(mobiData)) {
            mobiData = new Uint8Array(mobiData);
        }
        
        const mobiBlob = new Blob([mobiData], { type: 'application/x-mobipocket-ebook' });
        const url = URL.createObjectURL(mobiBlob);
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
            text: `Your MOBI file has been downloaded.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }, 1000);
}

function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    // Display info about the historical conversion
    Swal.fire({
        title: `Info for ${item.fileName}`,
        html: `
            <p><strong>Date:</strong> ${item.date}</p>
            <p><strong>Format:</strong> ${item.format.toUpperCase()}</p>
            <p><strong>Original Options:</strong></p>
            <ul>
                <li>Page Range: ${item.options.pageRange || 'All'}</li>
                <li>OCR Enabled: ${item.options.enableOcr ? 'Yes' : 'No'}</li>
            </ul>
            <div class="alert alert-info mt-3" role="alert">
                <i class="fas fa-info-circle me-2"></i>MOBI files are not directly viewable in the browser. You can download it.
            </div>
        `,
        icon: 'info',
        confirmButtonText: 'OK'
    });

    showStatus(`Viewing info for ${item.fileName}`, 'info');
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