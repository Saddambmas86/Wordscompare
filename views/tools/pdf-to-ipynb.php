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
                    <h1 class="h2">PDF to IPYNB Converter <i class="fas fa-file-code text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Transform your PDF documents into Jupyter Notebooks with extracted text content.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop PDF File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="pdfUpload" accept="application/pdf" class="d-none" multiple>
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
                                <label for="pageRange" class="form-label">Page Range (e.g., 1-3,5)</label>
                                <input type="text" id="pageRange" class="form-control" placeholder="All pages (leave blank)">
                                <small class="text-muted">Specify pages or leave blank for all.</small>
                            </div>
                            <div class="col-md-6">
                                <label for="cellType" class="form-label">Default Cell Type</label>
                                <select id="cellType" class="form-select">
                                    <option value="markdown" selected>Markdown Cell (Text)</option>
                                    </select>
                                <small class="text-muted">Extracted text will be placed into this type of cell.</small>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="pageBreakCell" checked>
                                    <label class="form-check-label" for="pageBreakCell">
                                        Create a new Markdown cell for each PDF page
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="addPageInfo">
                                    <label class="form-check-label" for="addPageInfo">
                                        Add page number information to each cell
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
                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>Text Preview (First Few Lines)</h5>
                        <span class="badge bg-info" id="extractedPageCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <pre id="previewText" class="p-3 mb-0" style="max-height: 300px; overflow-y: auto; background-color: #f8f9fa; border: 1px solid #dee2e6;"></pre>
                        <div class="text-center text-muted p-4" id="previewPlaceholder">Upload PDF to see preview.</div>
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
                <?php include '../../views/content/pdf-to-ipynb-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script>
    // Specify the worker URL for PDF.js
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';
</script>

<script>
// JavaScript for PDF to IPYNB Converter
let files = [];
let extractedTextContent = []; // Stores text content of each page
let conversionHistory = JSON.parse(localStorage.getItem('ipynbConversionHistory')) || [];

// Initialize elements
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const previewText = document.getElementById('previewText');
const previewPlaceholder = document.getElementById('previewPlaceholder');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const pageRangeInput = document.getElementById('pageRange');
const extractedPageCountSpan = document.getElementById('extractedPageCount');
const pageBreakCellCheckbox = document.getElementById('pageBreakCell');
const addPageInfoCheckbox = document.getElementById('addPageInfo');


// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertPdfToIpynb);
downloadBtn.addEventListener('click', downloadIpynb);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PDF to IPYNB Converter',
        html: `Follow these steps to convert your PDFs:<br><br>
        <ol class="text-start">
            <li>Upload PDF by clicking "Select PDF Files" or dragging it into the drop zone.</li>
            <li>(Optional) Specify page range, and choose if each PDF page should be a new cell.</li>
            <li>Click "Convert" to extract text and generate the IPYNB structure.</li>
            <li>Download your newly created Jupyter Notebook (.ipynb) file.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    files = [];
    extractedTextContent = [];
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    previewText.textContent = '';
    previewPlaceholder.style.display = 'block';
    extractedPageCountSpan.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset options
    pageRangeInput.value = '';
    document.getElementById('cellType').value = 'markdown';
    pageBreakCellCheckbox.checked = true;
    addPageInfoCheckbox.checked = false;
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
        showStatus('File ready for conversion. Extracting text...', 'info');
        
        Swal.fire({
            title: 'File Added',
            text: `${files[0].name} has been selected for conversion.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });

        extractTextFromPdf(files[0]);
    }
}

async function extractTextFromPdf(file) {
    const swalInstance = Swal.fire({
        title: 'Processing PDF',
        html: 'Extracting text from your PDF. Please wait...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        },
        allowOutsideClick: false,
        allowEscapeKey: false
    });

    extractedTextContent = []; // Clear previous content
    previewText.textContent = '';
    previewPlaceholder.style.display = 'block';
    extractedPageCountSpan.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    try {
        const arrayBuffer = await file.arrayBuffer();
        const pdf = await pdfjsLib.getDocument({ data: arrayBuffer }).promise;
        
        const pageRange = parsePageRange(pageRangeInput.value, pdf.numPages);
        let extractedCount = 0;

        for (let i = 0; i < pageRange.length; i++) {
            const pageNum = pageRange[i];
            const page = await pdf.getPage(pageNum);
            const textContent = await page.getTextContent();
            const pageText = textContent.items.map(item => item.str).join(' ');
            extractedTextContent.push({ pageNum: pageNum, text: pageText });
            extractedCount++;

            // Update loading message
            swalInstance.update({
                html: `Extracting text from page ${pageNum} (${extractedCount}/${pageRange.length})...`
            });
        }

        if (extractedTextContent.length > 0) {
            // Show a preview of the first few lines
            const fullText = extractedTextContent.map(p => p.text).join('\n\n--- Page Break ---\n\n');
            previewText.textContent = fullText.substring(0, 1000) + (fullText.length > 1000 ? '...' : '');
            previewPlaceholder.style.display = 'none';
            extractedPageCountSpan.textContent = `Pages: ${extractedTextContent.length}`;
            convertBtn.disabled = false;
            showStatus('Text extraction complete. Click Convert to create IPYNB.', 'success');
        } else {
            showError('No text extracted from PDF. Please check the file or page range.');
        }

        swalInstance.close();
    } catch (error) {
        swalInstance.close();
        showError(`Error extracting text: ${error.message}`);
        Swal.fire({
            title: 'Extraction Error',
            text: `Failed to extract text from PDF: ${error.message}`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// Parses page range string (e.g., "1-3,5") into an array of page numbers
function parsePageRange(rangeStr, totalPages) {
    if (!rangeStr) {
        return Array.from({ length: totalPages }, (_, i) => i + 1); // All pages
    }

    const pages = new Set();
    const parts = rangeStr.split(',').map(s => s.trim());

    parts.forEach(part => {
        if (part.includes('-')) {
            const [start, end] = part.split('-').map(Number);
            if (!isNaN(start) && !isNaN(end) && start <= end) {
                for (let i = start; i <= end; i++) {
                    if (i >= 1 && i <= totalPages) pages.add(i);
                }
            }
        } else {
            const pageNum = Number(part);
            if (!isNaN(pageNum) && pageNum >= 1 && pageNum <= totalPages) {
                pages.add(pageNum);
            }
        }
    });
    
    const sortedPages = Array.from(pages).sort((a, b) => a - b);
    if (sortedPages.length === 0) {
        // If parsing fails or results in no valid pages, default to all pages
        return Array.from({ length: totalPages }, (_, i) => i + 1);
    }
    return sortedPages;
}

// Convert PDF to IPYNB
function convertPdfToIpynb() {
    if (extractedTextContent.length === 0) {
        showError('No text extracted from PDF. Please upload and process a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No text extracted from PDF. Please upload and process a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Generating IPYNB file...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    const swalInstance = Swal.fire({
        title: 'Creating Jupyter Notebook',
        html: 'Please wait while we assemble your .ipynb file...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const createPageBreakCell = pageBreakCellCheckbox.checked;
        const addPageInfo = addPageInfoCheckbox.checked;
        const defaultCellType = document.getElementById('cellType').value; // 'markdown' or 'code' (currently only markdown supported)

        const cells = [];
        extractedTextContent.forEach((pageData, index) => {
            const pageNum = pageData.pageNum;
            let text = pageData.text.trim();

            if (text) {
                let cellSource = [];
                if (addPageInfo) {
                    cellSource.push(`# Page ${pageNum}\n\n`);
                }
                cellSource.push(text);

                cells.push({
                    cell_type: defaultCellType,
                    metadata: {},
                    source: cellSource
                });
            }

            if (createPageBreakCell && index < extractedTextContent.length - 1) {
                cells.push({
                    cell_type: "markdown",
                    metadata: {},
                    source: ["--- End of Page " + pageNum + " ---"]
                });
            }
        });

        // Basic IPYNB structure
        const notebook = {
            cells: cells,
            metadata: {
                kernelspec: {
                    display_name: "Python 3",
                    language: "python",
                    name: "python3"
                },
                language_info: {
                    codemirror_mode: {
                        name: "ipython",
                        version: 3
                    },
                    file_extension: ".py",
                    mimetype: "text/x-python",
                    name: "python",
                    nbconvert_exporter: "python",
                    pygments_lexer: "ipython3",
                    version: "3.9.7" // Placeholder, actual version might vary
                },
                "nbviewer": {
                    "source_url": "",
                    "webpath": ""
                },
                "toc": {
                    "base_numbering": 1,
                    "nav_menu": {},
                    "number_sections": true,
                    "sideBar": true,
                    "toc_cell": true,
                    "toc_position": {},
                    "toc_section_display": "false",
                    "toc_window_display": "false"
                },
                "vscode": {
                    "languageId": "python"
                }
            },
            nbformat: 4,
            nbformat_minor: 5
        };

        const ipynbContent = JSON.stringify(notebook, null, 2);
        
        // Store the generated content for download and history
        const fileName = files[0].name.replace('.pdf', '.ipynb');
        const ipynbBlob = new Blob([ipynbContent], { type: 'application/x-ipynb+json' });
        
        addToHistory({
            fileName: fileName,
            date: new Date().toLocaleString(),
            format: 'ipynb',
            content: ipynbContent // Store the full content for direct download/preview
        });

        showStatus('IPYNB conversion complete! Click Download.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your PDF has been successfully converted to an IPYNB file.',
            icon: 'success',
            confirmButtonText: 'Great!',
            timer: 1000,
            timerProgressBar: true
        });

    } catch (error) {
        showError(`Error generating IPYNB: ${error.message}`);
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

// Download IPYNB
function downloadIpynb() {
    if (extractedTextContent.length === 0) {
        showError('No IPYNB to download. Please convert first.');
        Swal.fire({
            title: 'No Data',
            text: 'No IPYNB to download. Please convert first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing IPYNB for download...', 'info');
    
    Swal.fire({
        title: 'Preparing IPYNB File',
        html: `Please wait while we prepare your .ipynb file...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        // Re-generate the IPYNB content to ensure the latest options are applied, or use the last generated content
        // For simplicity, let's assume `convertPdfToIpynb` has successfully populated `notebook` if called recently.
        // Or better, directly create the blob from the last successful conversion's `ipynbContent` (if stored globally or passed)
        // Since `addToHistory` stores `ipynbContent`, we can use that for direct download.
        const lastConvertedItem = conversionHistory[0]; // Assuming the most recent conversion is the one to download
        if (lastConvertedItem && lastConvertedItem.format === 'ipynb') {
            const ipynbBlob = new Blob([lastConvertedItem.content], { type: 'application/x-ipynb+json' });
            const url = URL.createObjectURL(ipynbBlob);
            const a = document.createElement('a');
            a.href = url;
            a.download = lastConvertedItem.fileName;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
            
            showStatus('IPYNB file downloaded!', 'success');
            Swal.fire({
                title: 'Download Complete',
                text: 'Your IPYNB file has been downloaded.',
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 1000,
                timerProgressBar: true
            });
        } else {
            showError('No valid IPYNB content found for download. Please convert a PDF first.');
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
        content: item.content // Store the full IPYNB content JSON string
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('ipynbConversionHistory', JSON.stringify(conversionHistory));
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
            localStorage.setItem('ipynbConversionHistory', JSON.stringify(conversionHistory));
            displayHistory();
            Swal.fire(
                'Deleted!',
                'Your file has been deleted from history.',
                'success'
            )
        }
    });
}

function downloadHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.content) return;

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
        const ipynbBlob = new Blob([item.content], { type: 'application/x-ipynb+json' });
        const url = URL.createObjectURL(ipynbBlob);
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
            text: `Your IPYNB file has been downloaded.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }, 1500);
}

function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.content) return;

    // Display the stored IPYNB content as plain text in the preview area
    previewText.textContent = item.content.substring(0, 1000) + (item.content.length > 1000 ? '...' : '');
    previewPlaceholder.style.display = 'none';
    extractedPageCountSpan.textContent = `Content from History`;
    
    showStatus(`Previewing ${item.fileName}`, 'info');
    
    // Scroll to preview area
    previewText.scrollIntoView({ behavior: 'smooth' });
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