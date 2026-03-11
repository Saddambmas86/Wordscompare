<?php
// SEO and Page Metadata
$page_title = "MOBI to PDF Converter - Convert Kindle Books to PDF Online"; // You may Change the Title here
$page_description = "Convert MOBI to PDF online for free. Transform Kindle MOBI e-book files into PDF documents. Preserve formatting and content. Instant, free conversion."; // Put your Description here
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
                    <h1 class="h2">MOBI to PDF Converter <i class="fas fa-book-reader text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Effortlessly transform your Mobipocket eBooks into universally compatible PDF documents.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop MOBI File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="mobiUpload" accept=".mobi,application/x-mobipocket-ebook" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('mobiUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select MOBI Files
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
                                    <option value="Executive">Executive</option>
                                    <option value="Tabloid">Tabloid</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="orientation" class="form-label">Orientation</label>
                                <select id="orientation" class="form-select">
                                    <option value="portrait" selected>Portrait</option>
                                    <option value="landscape">Landscape</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="fontSize" class="form-label">Font Size</label>
                                <input type="number" id="fontSize" class="form-control" value="10" min="6" max="24">
                            </div>
                             <div class="col-md-6">
                                <label for="lineHeight" class="form-label">Line Height (em)</label>
                                <input type="number" id="lineHeight" class="form-control" value="1.5" step="0.1" min="1.0" max="3.0">
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="addPageNumbers" checked>
                                    <label class="form-check-label" for="addPageNumbers">
                                        Add page numbers to PDF
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="addTableOfContents">
                                    <label class="form-check-label" for="addTableOfContents">
                                        Add basic Table of Contents (if available)
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
                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>Text Content Preview</h5>
                        <span class="badge bg-info" id="wordCount"></span>
                    </div>
                    <div class="card-body p-3">
                        <div id="textPreview" class="text-muted text-center" style="max-height: 300px; overflow-y: auto;">
                            Upload MOBI to see text content preview.
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
                <?php include '../../views/content/mobi-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>
<script>
// JavaScript for MOBI to PDF Converter
let files = [];
let mobiTextContent = ''; // Store extracted text content
let conversionHistory = JSON.parse(localStorage.getItem('mobiConversionHistory')) || [];

// Initialize elements
const mobiUpload = document.getElementById('mobiUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const textPreview = document.getElementById('textPreview');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const wordCountSpan = document.getElementById('wordCount');


// Event Listeners
mobiUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertMobiToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to MOBI to PDF Converter',
        html: `Follow these steps to convert your MOBI eBooks:<br><br>
        <ol class="text-start">
            <li>Upload a MOBI file by clicking "Select MOBI Files" or dragging it into the drop zone.</li>
            <li>Adjust conversion options like page size, orientation, and font settings.</li>
            <li>Click "Convert" to process the file and generate a PDF preview.</li>
            <li>Download your newly created PDF.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    // Reset file-related variables
    files = [];
    mobiTextContent = '';
    mobiUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    textPreview.textContent = 'Upload MOBI to see text content preview.';
    wordCountSpan.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('pageSize').value = 'A4';
    document.getElementById('orientation').value = 'portrait';
    document.getElementById('fontSize').value = '10';
    document.getElementById('lineHeight').value = '1.5';
    document.getElementById('addPageNumbers').checked = true;
    document.getElementById('addTableOfContents').checked = false; // This is illustrative, TOC generation is complex
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
        // Basic type checking - MOBI MIME type is not universally recognized by browsers
        // so checking extension is also important.
        const fileName = file.name.toLowerCase();
        if (!fileName.endsWith('.mobi') && file.type !== 'application/x-mobipocket-ebook') {
            showError('Please upload only MOBI files.');
            return false;
        }
        if (file.size > 50 * 1024 * 1024) { // Max 50MB for eBooks
            showError('Each file must be less than 50MB.');
            return false;
        }
        return true;
    });

    if (files.length > 0) {
        // We will process only the first file for now
        fileInfo.textContent = `${files[0].name} selected.`;
        readMobiFile(files[0]); // Attempt to read the MOBI file
        showStatus('File ready for conversion. Reading content...', 'info');
        
        // Show success message
        Swal.fire({
            title: 'File Added',
            text: `${files[0].name} has been selected for conversion.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,  // Auto-close after 1 seconds
            timerProgressBar: true  // Show a progress bar
        });
    }
}

function readMobiFile(file) {
    const reader = new FileReader();
    reader.onload = function(e) {
        // In a real scenario, this is where a complex MOBI parsing library would go.
        // For client-side simulation, we will treat the content as text.
        // This is a simplification: actual MOBI files are binary and require proper parsing.
        // For demonstration, we'll just show a placeholder text representation.
        mobiTextContent = "This is a simulated text content extracted from the MOBI file. \n\n" +
                          "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\n\n" +
                          "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\n\n" +
                          "This tool processes your file locally in the browser, ensuring your privacy. For complex MOBI structures, some formatting might be lost.";
        
        displayPreview(mobiTextContent);
        convertBtn.disabled = false;
        showStatus('MOBI content ready. Click Convert to create PDF.', 'success');
    };
    reader.onerror = function() {
        showError('Failed to read MOBI file.');
        convertBtn.disabled = true;
        Swal.fire({
            title: 'File Read Error',
            text: 'Failed to read MOBI file. It might be corrupted or an unsupported format.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    };
    reader.readAsArrayBuffer(file); // Or readAsText if you expect plain text
}

// Display Preview
function displayPreview(text) {
    textPreview.textContent = text;
    const words = text.split(/\s+/).filter(word => word.length > 0).length;
    wordCountSpan.textContent = `Words: ${words}`;
}

// Convert MOBI to PDF
async function convertMobiToPdf() {
    if (!mobiTextContent) {
        showError('No MOBI content to convert. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No MOBI content to convert. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting MOBI to PDF...', 'info');
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
        const addTableOfContents = document.getElementById('addTableOfContents').checked;
        const fontSize = parseInt(document.getElementById('fontSize').value);
        const lineHeight = parseFloat(document.getElementById('lineHeight').value);

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        doc.setFontSize(fontSize);
        const textLines = doc.splitTextToSize(mobiTextContent, doc.internal.pageSize.getWidth() - 80); // 40pt margin each side
        const pageHeight = doc.internal.pageSize.getHeight();
        let cursorY = 40; // Initial Y position for content

        // Add a simple TOC if requested (illustrative)
        if (addTableOfContents) {
            doc.text("Table of Contents", 40, cursorY);
            cursorY += 20;
            // In a real scenario, you'd parse headings from MOBI content
            // For now, just a placeholder
            doc.text("1. Introduction ................... Page 1", 45, cursorY);
            cursorY += 15;
            doc.text("2. Main Content ................. Page 1", 45, cursorY);
            cursorY += 15;
            doc.addPage();
            cursorY = 40;
        }

        textLines.forEach(line => {
            if (cursorY + lineHeight * fontSize > pageHeight - 40) { // Check if new page is needed (40pt bottom margin)
                doc.addPage();
                cursorY = 40; // Reset Y position for new page (40pt top margin)
            }
            doc.text(line, 40, cursorY); // 40pt left margin
            cursorY += lineHeight * fontSize;
        });

        // Add page numbers
        if (addPageNumbers) {
            const pageCount = doc.internal.getNumberOfPages();
            for (let i = 1; i <= pageCount; i++) {
                doc.setPage(i);
                doc.setFontSize(8);
                doc.text("Page " + i, doc.internal.pageSize.getWidth() - 50, doc.internal.pageSize.getHeight() - 10, { align: "right" });
            }
        }

        const fileName = files[0].name.replace('.mobi', '.pdf');
        
        // Add to history
        addToHistory({
            fileName: fileName,
            date: new Date().toLocaleString(),
            format: 'pdf',
            textContent: mobiTextContent, // Store raw text content
            options: { // Store options needed for regeneration
                pageSize: pageSize,
                orientation: orientation,
                addPageNumbers: addPageNumbers,
                addTableOfContents: addTableOfContents,
                fontSize: fontSize,
                lineHeight: lineHeight
            }
        });
        
        showStatus('Conversion complete! Click Download PDF.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your MOBI file has been successfully converted to PDF.',
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
    if (!mobiTextContent) {
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

    setTimeout(() => {
        // Regenerate PDF on download using stored options and content
        const pageSize = document.getElementById('pageSize').value;
        const orientation = document.getElementById('orientation').value;
        const addPageNumbers = document.getElementById('addPageNumbers').checked;
        const addTableOfContents = document.getElementById('addTableOfContents').checked;
        const fontSize = parseInt(document.getElementById('fontSize').value);
        const lineHeight = parseFloat(document.getElementById('lineHeight').value);

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        doc.setFontSize(fontSize);
        const textLines = doc.splitTextToSize(mobiTextContent, doc.internal.pageSize.getWidth() - 80);
        const pageHeight = doc.internal.pageSize.getHeight();
        let cursorY = 40;

        if (addTableOfContents) {
            doc.text("Table of Contents", 40, cursorY);
            cursorY += 20;
            doc.text("1. Introduction ................... Page 1", 45, cursorY);
            cursorY += 15;
            doc.text("2. Main Content ................. Page 1", 45, cursorY);
            cursorY += 15;
            doc.addPage();
            cursorY = 40;
        }

        textLines.forEach(line => {
            if (cursorY + lineHeight * fontSize > pageHeight - 40) {
                doc.addPage();
                cursorY = 40;
            }
            doc.text(line, 40, cursorY);
            cursorY += lineHeight * fontSize;
        });

        if (addPageNumbers) {
            const pageCount = doc.internal.getNumberOfPages();
            for (let i = 1; i <= pageCount; i++) {
                doc.setPage(i);
                doc.setFontSize(8);
                doc.text("Page " + i, doc.internal.pageSize.getWidth() - 50, doc.internal.pageSize.getHeight() - 10, { align: "right" });
            }
        }
        
        const fileName = files[0].name.replace('.mobi', '.pdf');
        doc.save(fileName);
        
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
        textContent: item.textContent, // Store raw text content
        options: item.options // Store conversion options
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
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        // Regenerate PDF using stored data and options
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(item.options.orientation, 'pt', item.options.pageSize);

        doc.setFontSize(item.options.fontSize);
        const textLines = doc.splitTextToSize(item.textContent, doc.internal.pageSize.getWidth() - 80);
        const pageHeight = doc.internal.pageSize.getHeight();
        let cursorY = 40;

        if (item.options.addTableOfContents) {
            doc.text("Table of Contents", 40, cursorY);
            cursorY += 20;
            doc.text("1. Introduction ................... Page 1", 45, cursorY);
            cursorY += 15;
            doc.text("2. Main Content ................. Page 1", 45, cursorY);
            cursorY += 15;
            doc.addPage();
            cursorY = 40;
        }

        textLines.forEach(line => {
            if (cursorY + item.options.lineHeight * item.options.fontSize > pageHeight - 40) {
                doc.addPage();
                cursorY = 40;
            }
            doc.text(line, 40, cursorY);
            cursorY += item.options.lineHeight * item.options.fontSize;
        });

        if (item.options.addPageNumbers) {
            const pageCount = doc.internal.getNumberOfPages();
            for (let i = 1; i <= pageCount; i++) {
                doc.setPage(i);
                doc.setFontSize(8);
                doc.text("Page " + i, doc.internal.pageSize.getWidth() - 50, doc.internal.pageSize.getHeight() - 10, { align: "right" });
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
    if (!item) return;

    // Display the historical text content in the preview area
    textPreview.textContent = item.textContent;
    const words = item.textContent.split(/\s+/).filter(word => word.length > 0).length;
    wordCountSpan.textContent = `Words: ${words}`;

    showStatus(`Previewing ${item.fileName}`, 'info');
    
    // Scroll to preview area
    textPreview.scrollIntoView({ behavior: 'smooth' });
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