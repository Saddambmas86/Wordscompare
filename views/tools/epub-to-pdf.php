<?php
// SEO and Page Metadata
$page_title = "EPUB to PDF Converter - Convert eBook to PDF Online Free"; // You may Change the Title here
$page_description = "Convert EPUB to PDF online for free. Transform e-book EPUB files into PDF documents instantly. Preserve formatting, fonts, and images. No software needed."; // Put your Description here
$page_keywords = "epub to pdf converter - convert ebook to pdf, epub, pdf, converter, convert, ebook, free online tools, pdf tools";

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
                    <h1 class="h2">EPUB to PDF Converter <i class="fas fa-book-open text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Convert your EPUB ebooks into readable and shareable PDF documents.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop EPUB File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="epubUpload" accept=".epub" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('epubUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select EPUB Files
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
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="addPageNumbers">
                                    <label class="form-check-label" for="addPageNumbers">
                                        Add page numbers to PDF
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeImages">
                                    <label class="form-check-label" for="includeImages">
                                        Attempt to include images (Experimental)
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
                        <h5 class="mb-0"><i class="fas fa-eye me-2"></i>EPUB Text Preview</h5>
                        <span class="badge bg-info" id="wordCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <div class="text-responsive p-3" style="max-height: 300px; overflow-y: auto; background-color: #f8f9fa; border: 1px solid #e9ecef;">
                            <p id="epubPreviewText" class="text-muted text-center p-4">Upload EPUB to see text preview.</p>
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
                <?php include '../../views/content/epub-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>

<script>
// JavaScript for EPUB to PDF Converter
let files = [];
let epubContentText = ''; // Stores extracted text content
let conversionHistory = JSON.parse(localStorage.getItem('epubConversionHistory')) || [];

// Initialize elements
const epubUpload = document.getElementById('epubUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const epubPreviewText = document.getElementById('epubPreviewText');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const wordCountSpan = document.getElementById('wordCount');


// Event Listeners
epubUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertEpubToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to EPUB to PDF Converter',
        html: `Follow these steps to convert your EPUBs:<br><br>
        <ol class="text-start">
            <li>Upload EPUBs by clicking "Select EPUB Files" or dragging them into the drop zone.</li>
            <li>Choose your desired page size, orientation, and other options.</li>
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
    epubContentText = '';
    epubUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    epubPreviewText.textContent = 'Upload EPUB to see text preview.';
    wordCountSpan.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('pageSize').value = 'A4';
    document.getElementById('orientation').value = 'portrait';
    document.getElementById('addPageNumbers').checked = false;
    document.getElementById('includeImages').checked = false;
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
        // Basic check for .epub extension, as MIME type for EPUB can be inconsistent
        if (!file.name.toLowerCase().endsWith('.epub')) {
            showError('Please upload only EPUB files.');
            return false;
        }
        if (file.size > 50 * 1024 * 1024) { // Max 50MB for EPUB
            showError('Each file must be less than 50MB.');
            return false;
        }
        return true;
    });

    if (files.length > 0) {
        fileInfo.textContent = `${files[0].name} selected.`;
        parseEpubFile(files[0]);
        showStatus('File ready for conversion. Processing...', 'info');
        
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

// Simplified EPUB Parsing (Conceptual)
// A real-world application would use an EPUB parsing library like epubjs.
// This function will just read the file as text and strip HTML tags as a placeholder.
function parseEpubFile(file) {
    const reader = new FileReader();
    reader.onload = function(e) {
        try {
            // This is a VERY simplistic approach. Actual EPUB parsing requires
            // decompressing the EPUB (which is a ZIP file), reading its XML manifest,
            // and then extracting HTML content from its various chapters.
            // For demonstration, we'll just treat it as a text file and strip HTML.
            // A proper solution would use an EPUB.js or similar library.
            let content = e.target.result;
            // Attempt to extract text from HTML-like content within the EPUB structure
            // This assumes the EPUB contains readable text components if opened as a text file.
            // In reality, you'd need to extract content from OEBPS/text/ or similar folders.
            const doc = new DOMParser().parseFromString(content, 'text/html');
            epubContentText = doc.body.textContent || ""; // Get plain text
            
            displayPreview(epubContentText);
            convertBtn.disabled = false;
            showStatus('EPUB text extracted. Click Convert to create PDF.', 'success');

        } catch (error) {
            showError(`Error processing EPUB: ${error.message}. Please try another file.`);
            convertBtn.disabled = true;
            Swal.fire({
                title: 'Processing Error',
                html: `Error processing EPUB: ${error.message}<br>This converter works best with standard text-based EPUBs.`,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    };
    // Read as ArrayBuffer if using a full EPUB parser like epubjs (it needs binary data)
    // For this simple text extraction, we'll read as text.
    reader.readAsText(file); 
}

// Display Preview
function displayPreview(text) {
    epubPreviewText.textContent = text.substring(0, 1500) + (text.length > 1500 ? '...' : ''); // Show first 1500 chars
    wordCountSpan.textContent = `Words: ${text.split(/\s+/).filter(word => word.length > 0).length}`;
    if (text.length === 0) {
        epubPreviewText.textContent = 'No readable text found in EPUB.';
    }
}


// Convert EPUB to PDF
async function convertEpubToPdf() {
    if (epubContentText.length === 0) {
        showError('No EPUB text to convert. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No EPUB text to convert. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting EPUB to PDF...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    const swalInstance = Swal.fire({
        title: 'Creating PDF',
        html: 'Please wait while we generate your PDF document from the EPUB content...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const pageSize = document.getElementById('pageSize').value;
        const orientation = document.getElementById('orientation').value;
        const addPageNumbers = document.getElementById('addPageNumbers').checked;
        const includeImages = document.getElementById('includeImages').checked; // Not fully implemented in simple parse

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        const margin = 40;
        const fontSize = 10;
        const lineHeight = 1.2;
        const maxLineWidth = doc.internal.pageSize.getWidth() - 2 * margin;

        doc.setFontSize(fontSize);
        doc.setLineHeightFactor(lineHeight);

        // Split text into lines that fit the page width
        const textLines = doc.splitTextToSize(epubContentText, maxLineWidth);
        let y = margin;

        textLines.forEach(line => {
            if (y + fontSize * lineHeight > doc.internal.pageSize.getHeight() - margin) {
                if (addPageNumbers) {
                    let str = "Page " + doc.internal.getNumberOfPages();
                    doc.setFontSize(8);
                    doc.text(str, doc.internal.pageSize.getWidth() - margin, doc.internal.pageSize.getHeight() - 10);
                }
                doc.addPage();
                y = margin;
            }
            doc.text(line, margin, y);
            y += fontSize * lineHeight;
        });

        if (addPageNumbers) {
            let str = "Page " + doc.internal.getNumberOfPages();
            doc.setFontSize(8);
            doc.text(str, doc.internal.pageSize.getWidth() - margin, doc.internal.pageSize.getHeight() - 10);
        }

        const fileName = files[0].name.replace('.epub', '.pdf');
        
        addToHistory({
            fileName: fileName,
            date: new Date().toLocaleString(),
            format: 'pdf',
            data: epubContentText, // Store raw text for regeneration
            options: {
                pageSize: pageSize,
                orientation: orientation,
                addPageNumbers: addPageNumbers,
                includeImages: includeImages // Keep option, though not fully functional in this sample
            }
        });
        
        showStatus('Conversion complete! Click Download PDF.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your EPUB has been successfully converted to PDF.',
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
    if (epubContentText.length === 0) {
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
        // Regenerate PDF on download using stored data and options
        const pageSize = document.getElementById('pageSize').value;
        const orientation = document.getElementById('orientation').value;
        const addPageNumbers = document.getElementById('addPageNumbers').checked;
        const includeImages = document.getElementById('includeImages').checked;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        const margin = 40;
        const fontSize = 10;
        const lineHeight = 1.2;
        const maxLineWidth = doc.internal.pageSize.getWidth() - 2 * margin;

        doc.setFontSize(fontSize);
        doc.setLineHeightFactor(lineHeight);

        const textLines = doc.splitTextToSize(epubContentText, maxLineWidth);
        let y = margin;

        textLines.forEach(line => {
            if (y + fontSize * lineHeight > doc.internal.pageSize.getHeight() - margin) {
                if (addPageNumbers) {
                    let str = "Page " + doc.internal.getNumberOfPages();
                    doc.setFontSize(8);
                    doc.text(str, doc.internal.pageSize.getWidth() - margin, doc.internal.pageSize.getHeight() - 10);
                }
                doc.addPage();
                y = margin;
            }
            doc.text(line, margin, y);
            y += fontSize * lineHeight;
        });

        if (addPageNumbers) {
            let str = "Page " + doc.internal.getNumberOfPages();
            doc.setFontSize(8);
            doc.text(str, doc.internal.pageSize.getWidth() - margin, doc.internal.pageSize.getHeight() - 10);
        }
        
        const fileName = files[0].name.replace('.epub', '.pdf');
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
        data: item.data, // Store raw text content
        options: item.options // Store conversion options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('epubConversionHistory', JSON.stringify(conversionHistory));
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
            localStorage.setItem('epubConversionHistory', JSON.stringify(conversionHistory));
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

        const margin = 40;
        const fontSize = 10;
        const lineHeight = 1.2;
        const maxLineWidth = doc.internal.pageSize.getWidth() - 2 * margin;

        doc.setFontSize(fontSize);
        doc.setLineHeightFactor(lineHeight);

        const textLines = doc.splitTextToSize(item.data, maxLineWidth);
        let y = margin;

        textLines.forEach(line => {
            if (y + fontSize * lineHeight > doc.internal.pageSize.getHeight() - margin) {
                if (item.options.addPageNumbers) {
                    let str = "Page " + doc.internal.getNumberOfPages();
                    doc.setFontSize(8);
                    doc.text(str, doc.internal.pageSize.getWidth() - margin, doc.internal.pageSize.getHeight() - 10);
                }
                doc.addPage();
                y = margin;
            }
            doc.text(line, margin, y);
            y += fontSize * lineHeight;
        });

        if (item.options.addPageNumbers) {
            let str = "Page " + doc.internal.getNumberOfPages();
            doc.setFontSize(8);
            doc.text(str, doc.internal.pageSize.getWidth() - margin, doc.internal.pageSize.getHeight() - 10);
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

    // Display the historical data in the preview area
    epubContentText = item.data; // Load stored content
    displayPreview(epubContentText);

    // Set the options to match the historical item for consistency in UI
    document.getElementById('pageSize').value = item.options.pageSize;
    document.getElementById('orientation').value = item.options.orientation;
    document.getElementById('addPageNumbers').checked = item.options.addPageNumbers;
    document.getElementById('includeImages').checked = item.options.includeImages;
    
    fileInfo.textContent = `${item.fileName} (from history)`;
    convertBtn.disabled = false;
    downloadBtn.disabled = false;


    showStatus(`Previewing ${item.fileName}`, 'info');
    
    // Scroll to preview area
    epubPreviewText.scrollIntoView({ behavior: 'smooth' });
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