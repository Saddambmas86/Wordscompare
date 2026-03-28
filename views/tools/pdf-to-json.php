<?php
// SEO and Page Metadata
$page_title = "PDF to JSON Converter - Extract PDF Data to JSON Online Free"; // You may Change the Title here
$page_description = "Convert PDF to JSON online for free. Extract structured text and data from PDF files into JSON format. Ideal for developers and data processing pipelines."; // Put your Description here
$page_keywords = "pdf to json, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
                    <h1 class="h2">PDF to JSON Converter <i class="fas fa-file-code text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Extract text content from PDF files into structured JSON format.</p>
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
                                <label for="outputFormat" class="form-label">Output Format</label>
                                <select id="outputFormat" class="form-select">
                                    <option value="json" selected>JSON</option>
                                    <option value="json-min">Minified JSON</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="encoding" class="form-label">Encoding</label>
                                <select id="encoding" class="form-select">
                                    <option value="utf-8" selected>UTF-8 (Recommended)</option>
                                    <option value="windows-1252">Windows-1252</option>
                                    <option value="iso-8859-1">ISO-8859-1</option>
                                    <option value="utf-16">UTF-16</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="textFormat" class="form-label">Text Formatting</label>
                                <select id="textFormat" class="form-select">
                                    <option value="preserve" selected>Preserve original formatting</option>
                                    <option value="clean">Clean extra whitespace</option>
                                    <option value="compact">Compact (single line per page)</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeMetadata">
                                    <label class="form-check-label" for="includeMetadata">
                                        Include PDF metadata (author, title, etc.)
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableOCR">
                                    <label class="form-check-label" for="enableOCR">
                                        Enable OCR for scanned PDFs (experimental)
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
                        <h5 class="mb-0"><i class="fas fa-code me-2"></i>JSON Preview</h5>
                        <span class="badge bg-info" id="pageCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <pre class="m-0 p-3 bg-light" id="jsonPreview" style="min-height: 200px; max-height: 400px; overflow: auto;">{
  "preview": "Converted JSON will appear here"
}</pre>
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
                <?php include '../../views/content/pdf-to-json-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
// JavaScript for PDF to JSON Converter
let files = [];
let jsonData = [];
let conversionHistory = JSON.parse(localStorage.getItem('pdfJsonConversionHistory')) || [];

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
const jsonPreview = document.getElementById('jsonPreview');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertPDF);
downloadBtn.addEventListener('click', downloadFile);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PDF to JSON Converter',
        html: `Follow these steps to convert your PDFs:<br><br>
        <ol class="text-start">
            <li>Upload PDFs by clicking "Select PDF Files" or dragging them into the drop zone.</li>
            <li>Choose your page range and text formatting options.</li>
            <li>Enable OCR for scanned PDFs if needed.</li>
            <li>Preview the JSON output structure.</li>
            <li>Download as formatted or minified JSON.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    files = [];
    jsonData = [];
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    jsonPreview.textContent = '{\n  "preview": "Converted JSON will appear here"\n}';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset options
    document.getElementById('pageRange').value = '1-';
    document.getElementById('outputFormat').value = 'json';
    document.getElementById('encoding').value = 'utf-8';
    document.getElementById('textFormat').value = 'preserve';
    document.getElementById('includeMetadata').checked = false;
    document.getElementById('enableOCR').checked = false;
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

// Convert PDF to JSON
async function convertPDF() {
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

    const pageRange = document.getElementById('pageRange').value;
    const outputFormat = document.getElementById('outputFormat').value;
    const textFormat = document.getElementById('textFormat').value;
    const includeMetadata = document.getElementById('includeMetadata').checked;
    const enableOCR = document.getElementById('enableOCR').checked;

    showStatus('Converting PDF...', 'info');
    convertBtn.disabled = true;

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
        jsonData = [];
        
        for (const file of files) {
            const fileData = await readFileAsArrayBuffer(file);
            const pdf = await pdfjsLib.getDocument(fileData).promise;
            
            // Parse page range
            const pagesToProcess = parsePageRange(pageRange, pdf.numPages);
            
            // Get metadata if requested
            const metadata = includeMetadata ? await pdf.getMetadata().catch(() => null) : null;
            
            // Process each page
            const pages = [];
            for (const pageNum of pagesToProcess) {
                const page = await pdf.getPage(pageNum);
                const textContent = await page.getTextContent();
                
                // Format text based on user preference
                let pageText = textContent.items.map(item => item.str).join(' ');
                
                if (textFormat === 'clean') {
                    pageText = pageText.replace(/\s+/g, ' ').trim();
                } else if (textFormat === 'compact') {
                    pageText = pageText.replace(/\s+/g, ' ').trim();
                    pageText = pageText.replace(/\n/g, ' ');
                }
                
                pages.push({
                    page: pageNum,
                    text: pageText
                });
            }
            
            // Create JSON structure
            const jsonStructure = {
                document: {
                    fileName: file.name,
                    totalPages: pdf.numPages,
                    processedPages: pagesToProcess.length,
                    metadata: metadata || undefined,
                    pages: pages
                }
            };
            
            jsonData.push({
                name: file.name.replace('.pdf', '.json'),
                data: jsonStructure
            });
        }
        
        // Display preview
        const outputFormat = document.getElementById('outputFormat').value;
        const jsonString = outputFormat === 'json-min' 
            ? JSON.stringify(jsonData[0].data) 
            : JSON.stringify(jsonData[0].data, null, 2);
        
        jsonPreview.textContent = jsonString;
        downloadBtn.disabled = false;
        showStatus('Conversion complete!', 'success');
        
        // Add to history
        addToHistory({
            fileName: jsonData[0].name,
            date: new Date().toLocaleString(),
            format: outputFormat,
            data: jsonData[0].data
        });
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your PDF has been successfully converted to JSON.',
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

// Helper function to read file as ArrayBuffer
function readFileAsArrayBuffer(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.onload = () => resolve(reader.result);
        reader.onerror = reject;
        reader.readAsArrayBuffer(file);
    });
}

// Helper function to parse page range string
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

// Download JSON File
function downloadFile() {
    if (jsonData.length === 0) {
        showError('No data to download. Please convert first.');
        Swal.fire({
            title: 'No Data',
            text: 'No data to download. Please convert first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    const outputFormat = document.getElementById('outputFormat').value;
    
    Swal.fire({
        title: `Preparing ${outputFormat === 'json-min' ? 'Minified JSON' : 'JSON'} File`,
        html: `Please wait while we generate your JSON file...`,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    const jsonString = outputFormat === 'json-min' 
        ? JSON.stringify(jsonData[0].data) 
        : JSON.stringify(jsonData[0].data, null, 2);
    
    const blob = new Blob([jsonString], { type: 'application/json;charset=utf-8;' });
    const url = URL.createObjectURL(blob);
    
    const a = document.createElement('a');
    a.href = url;
    a.download = jsonData[0].name;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    
    showStatus('JSON file downloaded!', 'success');
    
    Swal.fire({
        title: 'Download Complete',
        text: `Your ${outputFormat === 'json-min' ? 'minified JSON' : 'JSON'} file has been downloaded.`,
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// History Functions
function addToHistory(item) {
    const historyItem = {
        id: Date.now(),
        fileName: item.fileName,
        date: item.date,
        format: item.format,
        data: item.data
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('pdfJsonConversionHistory', JSON.stringify(conversionHistory));
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
            <td>${item.format === 'json-min' ? 'Minified JSON' : 'JSON'}</td>
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
            localStorage.setItem('pdfJsonConversionHistory', JSON.stringify(conversionHistory));
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
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        const jsonString = item.format === 'json-min' 
            ? JSON.stringify(item.data) 
            : JSON.stringify(item.data, null, 2);
        
        const blob = new Blob([jsonString], { type: 'application/json;charset=utf-8;' });
        const url = URL.createObjectURL(blob);
        
        const a = document.createElement('a');
        a.href = url;
        a.download = item.fileName;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        
        showStatus(`${item.fileName} downloaded!`, 'success');
        Swal.fire({
            title: 'Download Complete',
            text: `Your ${item.format === 'json-min' ? 'minified JSON' : 'JSON'} file has been downloaded.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }, 1500);
}

function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    const jsonString = item.format === 'json-min' 
        ? JSON.stringify(item.data, null, 2) 
        : JSON.stringify(item.data, null, 2);
    
    jsonPreview.textContent = jsonString;
    showStatus(`Previewing ${item.fileName}`, 'info');
    jsonPreview.scrollIntoView({ behavior: 'smooth' });
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