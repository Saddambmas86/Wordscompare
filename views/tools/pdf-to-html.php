<?php
// SEO and Page Metadata
$page_title = "PDF to HTML Converter - Convert PDF to Web Page Online Free"; // You may Change the Title here
$page_description = "Convert PDF to HTML online for free. Transform PDF documents into web-ready HTML pages. Preserve layout, text, and images. Instant, browser-based conversion."; // Put your Description here
$page_keywords = "pdf to html, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
                    <h1 class="h2">PDF to HTML Converter <i class="fas fa-code text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Transform PDF documents into clean, web-ready HTML files.</p>
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
                                <label for="htmlFormat" class="form-label">HTML Format</label>
                                <select id="htmlFormat" class="form-select">
                                    <option value="responsive" selected>Responsive HTML</option>
                                    <option value="minimal">Minimal HTML</option>
                                    <option value="styled">Styled HTML</option>
                                    <option value="full">Full Document</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="imageQuality" class="form-label">Image Quality</label>
                                <select id="imageQuality" class="form-select">
                                    <option value="high">High Quality</option>
                                    <option value="medium" selected>Medium Quality</option>
                                    <option value="low">Low Quality</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="encoding" class="form-label">Encoding</label>
                                <select id="encoding" class="form-select">
                                    <option value="utf-8" selected>UTF-8 (Recommended)</option>
                                    <option value="windows-1252">Windows-1252</option>
                                    <option value="iso-8859-1">ISO-8859-1</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="preserveLayout" checked>
                                    <label class="form-check-label" for="preserveLayout">
                                        Preserve original layout
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

<!-- HTML Structure -->
<div class="preview-area card mt-4">
    <div class="card-header bg-light d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-code me-2"></i>HTML Output</h5>
        <div>
            <button class="btn btn-sm btn-outline-secondary" id="togglePreview">
                <i class="fas fa-eye me-1"></i> Toggle Preview
            </button>
            <span class="badge bg-info" id="pageCount"></span>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="row g-0">
            <!-- HTML Code Viewer -->
            <div class="col-md-6 border-end" id="codeViewerContainer">
                <div class="p-3 bg-light border-bottom">
                    <small class="text-muted">HTML Code</small>
                    <button class="btn btn-sm btn-outline-primary float-end py-0 px-2" id="copyHtmlCode">
                        <i class="fas fa-copy"></i> Copy
                    </button>
                </div>
                <pre id="htmlCodeViewer" class="m-0 p-3 bg-dark text-light" style="height: 400px; overflow: auto;"></pre>
            </div>
            <!-- Live Preview -->
            <div class="col-md-6" id="livePreviewContainer">
                <div class="p-3 bg-light border-bottom">
                    <small class="text-muted">Live Preview</small>
                </div>
                <div class="ratio ratio-16x9">
                    <iframe id="htmlPreview" srcdoc="<div class='text-center text-muted p-4'>Preview will appear here after conversion.</div>"></iframe>
                </div>
            </div>
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
                <?php include '../../views/content/pdf-to-html-content.php'; ?>
            </article>
        </div>
    </div>
</div>


<script>
// JavaScript for PDF to HTML Converter
let files = [];
let htmlData = [];
let conversionHistory = JSON.parse(localStorage.getItem('pdfToHtmlHistory')) || [];

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
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

// Preview elements
const togglePreviewBtn = document.getElementById('togglePreview');
const codeViewerContainer = document.getElementById('codeViewerContainer');
const livePreviewContainer = document.getElementById('livePreviewContainer');
const htmlCodeViewer = document.getElementById('htmlCodeViewer');
const htmlPreview = document.getElementById('htmlPreview');
const copyHtmlCodeBtn = document.getElementById('copyHtmlCode');

// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertPDF);
downloadBtn.addEventListener('click', downloadFile);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
togglePreviewBtn.addEventListener('click', togglePreview);
copyHtmlCodeBtn.addEventListener('click', copyHtmlCode);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PDF to HTML Converter',
        html: `Follow these steps to convert your PDFs:<br><br>
        <ol class="text-start">
            <li>Upload PDFs by clicking "Select PDF Files" or dragging them into the drop zone.</li>
            <li>Choose your HTML format and quality settings.</li>
            <li>Enable OCR for scanned PDFs if needed.</li>
            <li>Preview the HTML output in the viewer.</li>
            <li>Download the HTML file with all assets.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    files = [];
    htmlData = [];
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    htmlPreview.srcdoc = "<div class='text-center text-muted p-4'>Preview will appear here after conversion.</div>";
    htmlCodeViewer.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('pageRange').value = '1-';
    document.getElementById('htmlFormat').value = 'responsive';
    document.getElementById('imageQuality').value = 'medium';
    document.getElementById('encoding').value = 'utf-8';
    document.getElementById('preserveLayout').checked = true;
    document.getElementById('enableOCR').checked = false;

    // Reset preview layout
    codeViewerContainer.classList.remove('col-md-12');
    codeViewerContainer.classList.add('col-md-6');
    livePreviewContainer.classList.remove('d-none');
    togglePreviewBtn.innerHTML = '<i class="fas fa-eye me-1"></i> Show Preview';
}

// Toggle Preview View
function togglePreview() {
    codeViewerContainer.classList.toggle('col-md-6');
    codeViewerContainer.classList.toggle('col-md-12');
    livePreviewContainer.classList.toggle('d-none');
    
    if (livePreviewContainer.classList.contains('d-none')) {
        togglePreviewBtn.innerHTML = '<i class="fas fa-eye me-1"></i> Show Preview';
    } else {
        togglePreviewBtn.innerHTML = '<i class="fas fa-code me-1"></i> Show Code';
    }
}

// Copy HTML Code
function copyHtmlCode() {
    const code = htmlCodeViewer.textContent;
    navigator.clipboard.writeText(code).then(() => {
        const originalText = copyHtmlCodeBtn.innerHTML;
        copyHtmlCodeBtn.innerHTML = '<i class="fas fa-check"></i> Copied!';
        setTimeout(() => {
            copyHtmlCodeBtn.innerHTML = originalText;
        }, 2000);
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

// Convert PDF to HTML
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
    const htmlFormat = document.getElementById('htmlFormat').value;
    const imageQuality = document.getElementById('imageQuality').value;
    const encoding = document.getElementById('encoding').value;
    const preserveLayout = document.getElementById('preserveLayout').checked;
    const enableOCR = document.getElementById('enableOCR').checked;

    showStatus('Converting PDF to HTML...', 'info');
    convertBtn.disabled = true;

    // Show loading alert
    let timerInterval;
    const swalInstance = Swal.fire({
        title: 'Converting PDF to HTML',
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
        htmlData = [];
        
        // Process each file
        for (const file of files) {
            const fileData = await readFileAsArrayBuffer(file);
            const pdf = await pdfjsLib.getDocument(fileData).promise;
            
            // Parse page range
            const pagesToConvert = parsePageRange(pageRange, pdf.numPages);
            
            // Generate HTML for each page
            let fullHtml = '';
            for (const pageNum of pagesToConvert) {
                const page = await pdf.getPage(pageNum);
                const textContent = await page.getTextContent();
                const viewport = page.getViewport({ scale: 1.0 });
                
                // Generate HTML for this page
                const pageHtml = generatePageHtml(textContent, viewport, htmlFormat, preserveLayout);
                fullHtml += pageHtml;
            }
            
            // Add to htmlData array
            htmlData.push({
                name: file.name.replace('.pdf', '.html'),
                content: fullHtml,
                format: htmlFormat
            });
        }
        
        // Update UI with the first file's data
        displayHtmlOutput(htmlData[0].content);
        downloadBtn.disabled = false;
        showStatus('Conversion complete!', 'success');
        
        // Add to history
        addToHistory({
            fileName: htmlData[0].name,
            date: new Date().toLocaleString(),
            format: htmlData[0].format,
            content: htmlData[0].content
        });
        
        // Close loading alert and show success
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your PDF has been successfully converted to HTML.',
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

// Display HTML Output
function displayHtmlOutput(htmlContent) {
    // Display in preview iframe
    htmlPreview.srcdoc = htmlContent;
    
    // Display formatted code
    htmlCodeViewer.textContent = formatHtml(htmlContent);
    
    // Apply syntax highlighting if available
    if (window.Prism) {
        Prism.highlightElement(htmlCodeViewer);
    }
    
    // Show both panels
    codeViewerContainer.classList.remove('col-md-12');
    codeViewerContainer.classList.add('col-md-6');
    livePreviewContainer.classList.remove('d-none');
    togglePreviewBtn.innerHTML = '<i class="fas fa-eye me-1"></i> Show Preview';
}

// Helper function to generate HTML from PDF page
function generatePageHtml(textContent, viewport, format, preserveLayout) {
    // Create a proper HTML document structure
    let html = `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Converted Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 100%;
            padding: 15px;
        }
        
        @media (min-width: 768px) {
            body {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
            }
        }
        
        .content {
            line-height: 1.6;
        }
        
        .content p {
            margin-bottom: 1em;
        }
    </style>
</head>
<body>
    <div class="content">`;
    
    // Process text content into paragraphs
    let currentParagraph = '';
    const items = textContent.items;
    
    for (const item of items) {
        currentParagraph += item.str;
        
        // Simple paragraph detection
        if (item.str.trim().endsWith('.') || item.str.trim().endsWith('!') || item.str.trim().endsWith('?')) {
            html += `<p>${currentParagraph}</p>`;
            currentParagraph = '';
        } else {
            currentParagraph += ' ';
        }
    }
    
    // Add any remaining text
    if (currentParagraph.trim()) {
        html += `<p>${currentParagraph}</p>`;
    }
    
    // Close document
    html += `</div>
</body>
</html>`;
    
    return html;
}

// Format HTML for display
function formatHtml(html) {
    // Basic indentation formatting
    let formatted = '';
    let indent = 0;
    const lines = html.split('\n');
    
    for (let line of lines) {
        line = line.trim();
        if (!line) continue;
        
        if (line.includes('</')) {
            indent--;
        }
        
        formatted += '  '.repeat(indent) + line + '\n';
        
        if (line.includes('<') && !line.includes('</') && !line.includes('/>')) {
            indent++;
        }
    }
    
    return formatted.trim();
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

// Download HTML File
function downloadFile() {
    if (htmlData.length === 0) {
        showError('No data to download. Please convert first.');
        Swal.fire({
            title: 'No Data',
            text: 'No data to download. Please convert first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    // Show loading alert
    Swal.fire({
        title: 'Preparing HTML File',
        html: 'Please wait while we generate your HTML file...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Create download
    const blob = new Blob([htmlData[0].content], { type: 'text/html;charset=utf-8;' });
    const url = URL.createObjectURL(blob);
    
    const a = document.createElement('a');
    a.href = url;
    a.download = htmlData[0].name;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    
    showStatus('HTML file downloaded!', 'success');
    
    Swal.fire({
        title: 'Download Complete',
        text: 'Your HTML file has been downloaded.',
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
        content: item.content
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('pdfToHtmlHistory', JSON.stringify(conversionHistory));
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
            <td>${item.format.charAt(0).toUpperCase() + item.format.slice(1)} HTML</td>
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
            localStorage.setItem('pdfToHtmlHistory', JSON.stringify(conversionHistory));
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
        const blob = new Blob([item.content], { type: 'text/html;charset=utf-8;' });
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
            text: `Your HTML file has been downloaded.`,
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

    // Display in both preview iframe and code viewer
    htmlPreview.srcdoc = item.content;
    htmlCodeViewer.textContent = formatHtml(item.content);
    
    // Apply syntax highlighting if available
    if (window.Prism) {
        Prism.highlightElement(htmlCodeViewer);
    }
    
    showStatus(`Previewing ${item.fileName}`, 'info');
    
    // Ensure both panels are visible
    codeViewerContainer.classList.remove('col-md-12');
    codeViewerContainer.classList.add('col-md-6');
    livePreviewContainer.classList.remove('d-none');
    togglePreviewBtn.innerHTML = '<i class="fas fa-eye me-1"></i> Show Preview';
    
    // Scroll to preview area
    document.querySelector('.preview-area').scrollIntoView({ behavior: 'smooth' });
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