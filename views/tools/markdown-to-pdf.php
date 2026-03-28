<?php
// SEO and Page Metadata
$page_title = "Markdown to PDF Converter - Convert MD Files to PDF Online"; // You may Change the Title here
$page_description = "Convert Markdown to PDF online for free. Transform MD files and Markdown text into PDF documents. Preserve headings, lists, code blocks, and formatting."; // Put your Description here
$page_keywords = "markdown to pdf, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
                    <h1 class="h2">Markdown to PDF Converter <i class="fas fa-file-pdf text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Effortlessly transform your Markdown files into beautifully formatted PDF documents.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop Markdown (.md) File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="markdownUpload" accept=".md, .txt, text/markdown, text/plain" class="d-none">
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('markdownUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select Markdown File
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
                            <div class="col-md-12">
                                <label for="fontFamily" class="form-label">Font Family</label>
                                <select id="fontFamily" class="form-select">
                                    <option value="helvetica" selected>Helvetica</option>
                                    <option value="times">Times</option>
                                    <option value="courier">Courier</option>
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
                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>PDF Preview</h5>
                    </div>
                    <div class="card-body p-0" style="min-height: 200px; background-color: #f8f9fa;">
                        <iframe id="pdfPreviewFrame" style="width: 100%; height: 500px; border: none; display: none;"></iframe>
                        <p id="noPreviewMessage" class="text-center text-muted p-4">Upload Markdown to see PDF preview.</p>
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
                <?php include '../../views/content/markdown-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/marked/12.0.0/marked.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script>
// JavaScript for Markdown to PDF Converter
let file = null;
let markdownContent = '';
let conversionHistory = JSON.parse(localStorage.getItem('markdownConversionHistory')) || [];

// Initialize elements
const markdownUpload = document.getElementById('markdownUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');
const pdfPreviewFrame = document.getElementById('pdfPreviewFrame');
const noPreviewMessage = document.getElementById('noPreviewMessage');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

// Event Listeners
markdownUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertMarkdownToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to Markdown to PDF Converter',
        html: `Follow these steps to convert your Markdown files:<br><br>
        <ol class="text-start">
            <li>Upload a Markdown file (.md or .txt) by clicking "Select Markdown File" or dragging it into the drop zone.</li>
            <li>Choose your desired page size, orientation, and font.</li>
            <li>Click "Convert" to generate the PDF preview.</li>
            <li>Download your new PDF document.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    file = null;
    markdownContent = '';
    markdownUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    statusArea.textContent = '';
    pdfPreviewFrame.style.display = 'none';
    pdfPreviewFrame.src = '';
    noPreviewMessage.style.display = 'block';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('pageSize').value = 'A4';
    document.getElementById('orientation').value = 'portrait';
    document.getElementById('fontFamily').value = 'helvetica';
    document.getElementById('addPageNumbers').checked = false;
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

    file = selectedFiles[0];

    // Basic validation for file type and size
    if (!file.name.endsWith('.md') && !file.name.endsWith('.txt')) {
        showError('Please upload a Markdown (.md) or plain text (.txt) file.');
        Swal.fire({
            title: 'Invalid File Type',
            text: 'Please upload a Markdown (.md) or plain text (.txt) file.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        file = null;
        return;
    }
    if (file.size > 10 * 1024 * 1024) { // Max 10MB
        showError('File must be less than 10MB.');
        Swal.fire({
            title: 'File Too Large',
            text: 'File must be less than 10MB.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        file = null;
        return;
    }

    fileInfo.textContent = `${file.name} selected.`;
    readMarkdownFile(file);
    showStatus('File ready for conversion. Click Convert to create PDF.', 'info');
    
    Swal.fire({
        title: 'File Added',
        text: `${file.name} has been selected for conversion.`,
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

function readMarkdownFile(file) {
    const reader = new FileReader();
    reader.onload = (e) => {
        markdownContent = e.target.result;
        convertBtn.disabled = false;
    };
    reader.onerror = () => {
        showError('Failed to read file.');
        Swal.fire({
            title: 'File Read Error',
            text: 'Failed to read file. Please try again.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        convertBtn.disabled = true;
    };
    reader.readAsText(file);
}


// Convert Markdown to PDF
async function convertMarkdownToPdf() {
    if (!markdownContent) {
        showError('No Markdown content to convert. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No Markdown content to convert. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting Markdown to PDF...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    const swalInstance = Swal.fire({
        title: 'Creating PDF',
        html: 'Please wait while we generate your PDF document...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const { jsPDF } = window.jspdf;
        const pageSize = document.getElementById('pageSize').value;
        const orientation = document.getElementById('orientation').value;
        const fontFamily = document.getElementById('fontFamily').value;
        const addPageNumbers = document.getElementById('addPageNumbers').checked;

        const doc = new jsPDF(orientation, 'pt', pageSize);

        // Convert Markdown to HTML
        const htmlContent = marked.parse(markdownContent);

        // Add HTML to PDF
        // jsPDF's html() method is asynchronous
        await doc.html(htmlContent, {
            callback: function (doc) {
                if (addPageNumbers) {
                    const pageCount = doc.internal.getNumberOfPages();
                    for (let i = 1; i <= pageCount; i++) {
                        doc.setPage(i);
                        doc.setFontSize(8);
                        doc.text("Page " + i + " of " + pageCount, doc.internal.pageSize.width - 60, doc.internal.pageSize.height - 10);
                    }
                }
                
                const pdfBlob = doc.output('blob');
                displayPdfPreview(pdfBlob);

                // Add to history
                addToHistory({
                    fileName: file.name.replace(/\.(md|txt)$/i, '.pdf'),
                    date: new Date().toLocaleString(),
                    format: 'pdf',
                    markdown: markdownContent, // Store the raw markdown
                    options: {
                        pageSize: pageSize,
                        orientation: orientation,
                        fontFamily: fontFamily,
                        addPageNumbers: addPageNumbers
                    }
                });

                showStatus('Conversion complete! PDF preview available.', 'success');
                convertBtn.disabled = false;
                downloadBtn.disabled = false;
                swalInstance.close();
                Swal.fire({
                    title: 'Conversion Complete!',
                    text: 'Your Markdown has been successfully converted to PDF.',
                    icon: 'success',
                    confirmButtonText: 'Great!',
                    timer: 1000,
                    timerProgressBar: true
                });
            },
            x: 10,
            y: 10,
            autoPaging: 'text',
            html2canvas: { scale: 0.8 }, // Adjust scale if content overflows
            margin: [10, 10, 10, 10]
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

function displayPdfPreview(blob) {
    const url = URL.createObjectURL(blob);
    pdfPreviewFrame.src = url;
    pdfPreviewFrame.style.display = 'block';
    noPreviewMessage.style.display = 'none';
}

// Download PDF
function downloadPdf() {
    if (!file || !markdownContent) {
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
        html: `Please wait while we prepare your PDF file...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Regenerate PDF for download to ensure it's the latest version
    setTimeout(async () => {
        try {
            const { jsPDF } = window.jspdf;
            const pageSize = document.getElementById('pageSize').value;
            const orientation = document.getElementById('orientation').value;
            const fontFamily = document.getElementById('fontFamily').value;
            const addPageNumbers = document.getElementById('addPageNumbers').checked;

            const doc = new jsPDF(orientation, 'pt', pageSize);
            const htmlContent = marked.parse(markdownContent);

            await doc.html(htmlContent, {
                callback: function (doc) {
                    if (addPageNumbers) {
                        const pageCount = doc.internal.getNumberOfPages();
                        for (let i = 1; i <= pageCount; i++) {
                            doc.setPage(i);
                            doc.setFontSize(8);
                            doc.text("Page " + i + " of " + pageCount, doc.internal.pageSize.width - 60, doc.internal.pageSize.height - 10);
                        }
                    }
                    const fileName = file.name.replace(/\.(md|txt)$/i, '.pdf');
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
                },
                x: 10,
                y: 10,
                autoPaging: 'text',
                html2canvas: { scale: 0.8 },
                margin: [10, 10, 10, 10]
            });
        } catch (error) {
            showError(`Error preparing download: ${error.message}`);
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
        markdown: item.markdown, // Store raw markdown content
        options: item.options // Store conversion options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('markdownConversionHistory', JSON.stringify(conversionHistory));
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
            localStorage.setItem('markdownConversionHistory', JSON.stringify(conversionHistory));
            displayHistory();
        }
    });
}

function downloadHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.markdown) return;

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
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF(item.options.orientation, 'pt', item.options.pageSize);
            const htmlContent = marked.parse(item.markdown);

            await doc.html(htmlContent, {
                callback: function (doc) {
                    if (item.options.addPageNumbers) {
                        const pageCount = doc.internal.getNumberOfPages();
                        for (let i = 1; i <= pageCount; i++) {
                            doc.setPage(i);
                            doc.setFontSize(8);
                            doc.text("Page " + i + " of " + pageCount, doc.internal.pageSize.width - 60, doc.internal.pageSize.height - 10);
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
                },
                x: 10,
                y: 10,
                autoPaging: 'text',
                html2canvas: { scale: 0.8 },
                margin: [10, 10, 10, 10]
            });
        } catch (error) {
            showError(`Error preparing download: ${error.message}`);
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
    if (!item || !item.markdown) return;

    showStatus(`Previewing ${item.fileName}`, 'info');

    Swal.fire({
        title: 'Generating Preview',
        html: 'Please wait...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(async () => {
        try {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF(item.options.orientation, 'pt', item.options.pageSize);
            const htmlContent = marked.parse(item.markdown);

            await doc.html(htmlContent, {
                callback: function (doc) {
                    if (item.options.addPageNumbers) {
                        const pageCount = doc.internal.getNumberOfPages();
                        for (let i = 1; i <= pageCount; i++) {
                            doc.setPage(i);
                            doc.setFontSize(8);
                            doc.text("Page " + i + " of " + pageCount, doc.internal.pageSize.width - 60, doc.internal.pageSize.height - 10);
                        }
                    }
                    const pdfBlob = doc.output('blob');
                    displayPdfPreview(pdfBlob);
                    Swal.close();
                },
                x: 10,
                y: 10,
                autoPaging: 'text',
                html2canvas: { scale: 0.8 },
                margin: [10, 10, 10, 10]
            });
        } catch (error) {
            showError(`Error generating preview: ${error.message}`);
            Swal.close();
            Swal.fire({
                title: 'Preview Error',
                text: error.message,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    }, 500);
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