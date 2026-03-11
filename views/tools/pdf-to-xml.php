<?php
// SEO and Page Metadata
$page_title = "PDF to XML Converter - Convert PDF Data to XML Online Free"; // You may Change the Title here
$page_description = "Convert PDF to XML online for free. Extract structured content from PDF files into XML format. Ideal for data processing, integration, and automation."; // Put your Description here
$page_keywords = "pdf to xml converter - convert pdf data to xml, pdf, xml, converter, convert, data, free online tools, pdf tools";

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
                    <h1 class="h2">PDF to XML Converter <i class="fas fa-file-code text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Extract text content from PDF files into structured XML format.</p>
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
                                    <option value="xml" selected>Formatted XML</option>
                                    <option value="xml-min">Minified XML</option>
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
                        <h5 class="mb-0"><i class="fas fa-code me-2"></i>XML Preview</h5>
                        <span class="badge bg-info" id="pageCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <pre class="m-0 p-3 bg-light" id="xmlPreview" style="min-height: 200px; max-height: 400px; overflow: auto;"><document>
  <preview>Converted XML will appear here</preview>
</document></pre>
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
                <?php include '../../views/content/pdf-to-xml-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
// JavaScript for PDF to XML Converter
let files = [];
let xmlData = [];
let conversionHistory = JSON.parse(localStorage.getItem('pdfXmlConversionHistory')) || [];

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
const xmlPreview = document.getElementById('xmlPreview');
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
        title: 'Welcome to PDF to XML Converter',
        html: `Follow these steps to convert your PDFs:<br><br>
        <ol class="text-start">
            <li>Upload PDFs by clicking "Select PDF Files" or dragging them into the drop zone.</li>
            <li>Choose your page range and text formatting options.</li>
            <li>Enable OCR for scanned PDFs if needed.</li>
            <li>Preview the XML output structure.</li>
            <li>Download as formatted or minified XML.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    files = [];
    xmlData = [];
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    xmlPreview.textContent = '<document>\n  <preview>Converted XML will appear here</preview>\n</document>';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset options
    document.getElementById('pageRange').value = '1-';
    document.getElementById('outputFormat').value = 'xml';
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

// Convert PDF to XML
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
        xmlData = [];
        
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
            
            // Create XML structure
            let xmlString = '<?xml version="1.0" encoding="UTF-8"?>\n';
            xmlString += '<document>\n';
            xmlString += `  <fileName>${escapeXml(file.name)}</fileName>\n`;
            xmlString += `  <totalPages>${pdf.numPages}</totalPages>\n`;
            xmlString += `  <processedPages>${pagesToProcess.length}</processedPages>\n`;
            
            if (metadata) {
                xmlString += '  <metadata>\n';
                if (metadata.info) {
                    for (const [key, value] of Object.entries(metadata.info)) {
                        if (value) {
                            xmlString += `    <${escapeXmlTagName(key)}>${escapeXml(value)}</${escapeXmlTagName(key)}>\n`;
                        }
                    }
                }
                xmlString += '  </metadata>\n';
            }
            
            xmlString += '  <pages>\n';
            for (const page of pages) {
                xmlString += '    <page>\n';
                xmlString += `      <number>${page.page}</number>\n`;
                xmlString += `      <content>${escapeXml(page.text)}</content>\n`;
                xmlString += '    </page>\n';
            }
            xmlString += '  </pages>\n';
            xmlString += '</document>';
            
            xmlData.push({
                name: file.name.replace('.pdf', '.xml'),
                data: xmlString
            });
        }
        
        // Display preview
        const outputFormat = document.getElementById('outputFormat').value;
        const formattedXml = formatXml(xmlData[0].data);
        xmlPreview.textContent = outputFormat === 'xml-min' ? xmlData[0].data : formattedXml;
        downloadBtn.disabled = false;
        showStatus('Conversion complete!', 'success');
        
        // Add to history
        addToHistory({
            fileName: xmlData[0].name,
            date: new Date().toLocaleString(),
            format: outputFormat,
            data: xmlData[0].data
        });
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your PDF has been successfully converted to XML.',
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

// Helper function to escape XML special characters
function escapeXml(unsafe) {
    if (!unsafe) return '';
    return unsafe.toString()
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&apos;');
}

// Helper function to make XML tag names safe
function escapeXmlTagName(tagName) {
    return tagName.replace(/[^a-zA-Z0-9_-]/g, '_');
}

// Helper function to format XML with proper indentation
function formatXml(xml) {
    const PADDING = '  ';
    const reg = /(>)(<)(\/*)/g;
    let pad = 0;
    
    xml = xml.replace(reg, '$1\r\n$2$3');
    
    return xml.split('\r\n').map((node, index) => {
        let indent = 0;
        if (node.match(/.+<\/\w[^>]*>$/)) {
            indent = 0;
        } else if (node.match(/^<\/\w/) && pad > 0) {
            pad -= 1;
        } else if (node.match(/^<\w[^>]*[^\/]>.*$/)) {
            indent = 1;
        } else {
            indent = 0;
        }
        
        pad += indent;
        return PADDING.repeat(pad - indent) + node;
    }).join('\r\n');
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

// Download XML File
function downloadFile() {
    if (xmlData.length === 0) {
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
        title: `Preparing ${outputFormat === 'xml-min' ? 'Minified XML' : 'XML'} File`,
        html: `Please wait while we generate your XML file...`,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    const xmlString = outputFormat === 'xml-min' 
        ? xmlData[0].data 
        : formatXml(xmlData[0].data);
    
    const blob = new Blob([xmlString], { type: 'application/xml;charset=utf-8;' });
    const url = URL.createObjectURL(blob);
    
    const a = document.createElement('a');
    a.href = url;
    a.download = xmlData[0].name;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    
    showStatus('XML file downloaded!', 'success');
    
    Swal.fire({
        title: 'Download Complete',
        text: `Your ${outputFormat === 'xml-min' ? 'minified XML' : 'XML'} file has been downloaded.`,
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

    localStorage.setItem('pdfXmlConversionHistory', JSON.stringify(conversionHistory));
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
            <td>${item.format === 'xml-min' ? 'Minified XML' : 'XML'}</td>
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
            localStorage.setItem('pdfXmlConversionHistory', JSON.stringify(conversionHistory));
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
        const xmlString = item.format === 'xml-min' 
            ? item.data 
            : formatXml(item.data);
        
        const blob = new Blob([xmlString], { type: 'application/xml;charset=utf-8;' });
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
            text: `Your ${item.format === 'xml-min' ? 'minified XML' : 'XML'} file has been downloaded.`,
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

    const xmlString = item.format === 'xml-min' 
        ? formatXml(item.data) 
        : formatXml(item.data);
    
    xmlPreview.textContent = xmlString;
    showStatus(`Previewing ${item.fileName}`, 'info');
    xmlPreview.scrollIntoView({ behavior: 'smooth' });
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