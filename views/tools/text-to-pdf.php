<?php
// SEO and Page Metadata
$page_title = "Text to PDF Converter - Convert TXT Files to PDF Online Free"; // You may Change the Title here
$page_description = "Convert text to PDF online for free. Transform plain TXT files and text content into PDF documents. Customize fonts and layout. Fast, secure, no software needed."; // Put your Description here
$page_keywords = "text to pdf converter - convert txt files to pdf, text, pdf, converter, convert, txt, files, free online tools, pdf tools";

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
                    <h1 class="h2">Text to PDF Converter <i class="fas fa-file-pdf text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Transform your plain text files into professional and shareable PDF documents.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop Text File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="textUpload" accept=".txt,text/plain" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('textUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select Text Files
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
                                <label for="fontSize" class="form-label">Font Size</label>
                                <input type="number" id="fontSize" class="form-control" value="10" min="6" max="24">
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
                                    <input class="form-check-input" type="checkbox" id="addBorder">
                                    <label class="form-check-label" for="addBorder">
                                        Add border to PDF content
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
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>Text Preview</h5>
                    </div>
                    <div class="card-body">
                        <pre id="textPreview" class="bg-light p-3 border rounded" style="max-height: 400px; overflow-y: auto; white-space: pre-wrap; word-break: break-word;"></pre>
                        <p id="lineCount" class="text-muted small mt-2 mb-0"></p>
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
                <?php include '../../views/content/text-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
// JavaScript for Text to PDF Converter
let files = [];
let textContent = '';
let conversionHistory = JSON.parse(localStorage.getItem('textConversionHistory')) || [];

// Initialize elements
const textUpload = document.getElementById('textUpload');
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
const lineCountSpan = document.getElementById('lineCount');
const fontSizeInput = document.getElementById('fontSize');


// Event Listeners
textUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertTextToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to Text to PDF Converter',
        html: `Follow these steps to convert your text files:<br><br>
        <ol class="text-start">
            <li>Upload Text file by clicking "Select Text Files" or dragging it into the drop zone.</li>
            <li>Choose your desired page size, orientation, font size, and whether to add page numbers or a border.</li>
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
    // Reset file-related variables
    files = [];
    textContent = '';
    generatedPdfDoc = null;
    generatedFileName = '';
    textUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    textPreview.textContent = '';
    lineCountSpan.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('pageSize').value = 'A4';
    document.getElementById('orientation').value = 'portrait';
    document.getElementById('fontSize').value = '10';
    document.getElementById('addPageNumbers').checked = false;
    document.getElementById('addBorder').checked = false;
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
        if (file.type !== 'text/plain' && !file.name.endsWith('.txt')) {
            showError('Please upload only plain text (.txt) files.');
            return false;
        }
        if (file.size > 10 * 1024 * 1024) { // Max 10MB for text file
            showError('Each file must be less than 10MB.');
            return false;
        }
        return true;
    });

    if (files.length > 0) {
        fileInfo.textContent = `${files[0].name} selected.`;
        readTextFile(files[0]);
        showStatus('File ready for conversion. Previewing...', 'info');
        
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

function readTextFile(file) {
    const reader = new FileReader();
    reader.onload = (e) => {
        textContent = e.target.result;
        textPreview.textContent = textContent;
        const lines = textContent.split(/\r\n|\r|\n/).length;
        lineCountSpan.textContent = `Lines: ${lines}`;
        convertBtn.disabled = false;
        showStatus('Text preview loaded. Click Convert to create PDF.', 'success');
    };
    reader.onerror = () => {
        showError('Failed to read file.');
        convertBtn.disabled = true;
        Swal.fire({
            title: 'Error',
            text: 'Failed to read file.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    };
    reader.readAsText(file);
}

// Helper to sanitize text for PDF (handle special characters)
function sanitizeTextForPdf(text) {
    if (!text) return '';
    return String(text)
        .replace(/[\u2018\u2019\u201A\u201B]/g, "'")  // Various single quotes
        .replace(/[\u201C\u201D\u201E\u201F]/g, '"')  // Various double quotes
        .replace(/[\u2013\u2014\u2015]/g, '-')  // En dash, em dash, horizontal bar
        .replace(/[\u00A0\u2000-\u200A\u202F\u205F]/g, ' ')  // Various spaces
        .replace(/[\u200B-\u200D\uFEFF]/g, '')  // Zero-width characters
        .replace(/\u2026/g, '...')  // Ellipsis
        .replace(/\u00AD/g, '')  // Soft hyphen
        .replace(/[\u20AC]/g, 'EUR')  // Euro sign
        .replace(/[\u00A3]/g, 'GBP')  // Pound sign
        .replace(/[\u00A5]/g, 'JPY')  // Yen sign
        .replace(/[\u00A9]/g, '(C)')  // Copyright
        .replace(/[\u00AE]/g, '(R)')  // Registered trademark
        .replace(/[\u2122]/g, '(TM)') // Trademark
        .replace(/[^\x00-\x7F]/g, '?'); // Replace any other non-ASCII with ?
}

// Store generated PDF for download
let generatedPdfDoc = null;
let generatedFileName = '';

// Convert Text to PDF
async function convertTextToPdf() {
    if (!textContent) {
        showError('No text data to convert. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No text data to convert. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting Text to PDF...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    const swalInstance = Swal.fire({
        title: 'Creating PDF',
        html: 'Please wait while we generate your PDF document...',
        timerProgressBar: true,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const pageSize = document.getElementById('pageSize').value;
        const orientation = document.getElementById('orientation').value;
        const fontSize = parseInt(document.getElementById('fontSize').value);
        const addPageNumbers = document.getElementById('addPageNumbers').checked;
        const addBorder = document.getElementById('addBorder').checked;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        // Sanitize text content
        const sanitizedContent = sanitizeTextForPdf(textContent);

        const margin = 40;
        doc.setFontSize(fontSize);

        const lines = doc.splitTextToSize(sanitizedContent, doc.internal.pageSize.width - 2 * margin);

        let y = margin;
        for (let i = 0; i < lines.length; i++) {
            if (y + fontSize > doc.internal.pageSize.height - margin) {
                doc.addPage();
                y = margin;
            }
            doc.text(lines[i], margin, y);
            y += fontSize * 1.2; // Line height
        }

        if (addBorder) {
            const pages = doc.internal.getNumberOfPages();
            for (let i = 1; i <= pages; i++) {
                doc.setPage(i);
                doc.setDrawColor(220, 53, 69); // Bootstrap danger color
                doc.setLineWidth(1);
                doc.rect(margin - 5, margin - 5, doc.internal.pageSize.width - 2 * (margin - 5), doc.internal.pageSize.height - 2 * (margin - 5));
            }
        }

        if (addPageNumbers) {
            const pages = doc.internal.getNumberOfPages();
            for (let i = 1; i <= pages; i++) {
                doc.setPage(i);
                doc.setFontSize(8);
                doc.text(`Page ${i} of ${pages}`, doc.internal.pageSize.width - margin, doc.internal.pageSize.height - 10, { align: 'right' });
            }
        }

        const fileName = files[0].name.replace('.txt', '.pdf');
        
        // Store generated PDF
        generatedPdfDoc = doc;
        generatedFileName = fileName;
        
        addToHistory({
            fileName: fileName,
            date: new Date().toLocaleString(),
            format: 'pdf',
            content: textContent,
            options: {
                pageSize: pageSize,
                orientation: orientation,
                fontSize: fontSize,
                addPageNumbers: addPageNumbers,
                addBorder: addBorder
            }
        });
        
        showStatus('Conversion complete! Click Download PDF.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your Text file has been successfully converted to PDF.',
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
    if (!generatedPdfDoc) {
        showError('No PDF to download. Please convert first.');
        Swal.fire({
            title: 'No Data',
            text: 'No PDF to download. Please convert first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Downloading PDF...', 'info');
    
    try {
        generatedPdfDoc.save(generatedFileName);
        
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
        console.error('Download Error:', error);
        showError(`Error downloading PDF: ${error.message}`);
        Swal.fire({
            title: 'Download Error',
            text: error.message,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// History Functions
function addToHistory(item) {
    const historyItem = {
        id: Date.now(),
        fileName: item.fileName,
        date: item.date,
        format: item.format,
        content: item.content, // Store raw text content
        options: item.options // Store conversion options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('textConversionHistory', JSON.stringify(conversionHistory));
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
            localStorage.setItem('textConversionHistory', JSON.stringify(conversionHistory));
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
        // Regenerate PDF using stored content and options
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(item.options.orientation, 'pt', item.options.pageSize);

        const margin = 40;
        doc.setFontSize(item.options.fontSize);

        // Sanitize content before generating PDF
        const sanitizedContent = sanitizeTextForPdf(item.content);
        const lines = doc.splitTextToSize(sanitizedContent, doc.internal.pageSize.width - 2 * margin);

        let y = margin;
        for (let i = 0; i < lines.length; i++) {
            if (y + item.options.fontSize > doc.internal.pageSize.height - margin) {
                doc.addPage();
                y = margin;
            }
            doc.text(lines[i], margin, y);
            y += item.options.fontSize * 1.2;
        }

        if (item.options.addBorder) {
            const pages = doc.internal.getNumberOfPages();
            for (let i = 1; i <= pages; i++) {
                doc.setPage(i);
                doc.setDrawColor(220, 53, 69);
                doc.setLineWidth(1);
                doc.rect(margin - 5, margin - 5, doc.internal.pageSize.width - 2 * (margin - 5), doc.internal.pageSize.height - 2 * (margin - 5));
            }
        }

        if (item.options.addPageNumbers) {
            const pages = doc.internal.getNumberOfPages();
            for (let i = 1; i <= pages; i++) {
                doc.setPage(i);
                doc.setFontSize(8);
                doc.text(`Page ${i} of ${pages}`, doc.internal.pageSize.width - margin, doc.internal.pageSize.height - 10, { align: 'right' });
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
    textPreview.textContent = item.content;
    const lines = item.content.split(/\r\n|\r|\n/).length;
    lineCountSpan.textContent = `Lines: ${lines}`;

    // Set conversion options based on history for context
    document.getElementById('pageSize').value = item.options.pageSize;
    document.getElementById('orientation').value = item.options.orientation;
    document.getElementById('fontSize').value = item.options.fontSize;
    document.getElementById('addPageNumbers').checked = item.options.addPageNumbers;
    document.getElementById('addBorder').checked = item.options.addBorder;

    // Disable convert/download buttons if not current active file
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

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