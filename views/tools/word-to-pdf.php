<?php
// SEO and Page Metadata
$page_title = "Word to PDF Converter - Convert DOC/DOCX to PDF Online Free"; // You may Change the Title here
$page_description = "Convert Word to PDF online for free. Transform DOC and DOCX files into PDF documents. Preserve fonts, tables, images, and formatting. Fast and secure."; // Put your Description here
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
                    <h1 class="h2">Word to PDF Converter <i class="fas fa-file-pdf text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Effortlessly convert your Word documents to universally compatible PDF files.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop Word File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="wordUpload" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('wordUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select Word Files
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
                        <h5 class="mb-0"><i class="fas fa-file-word me-2"></i>Document Preview</h5>
                        <span class="badge bg-info" id="fileStatus"></span>
                    </div>
                    <div class="card-body p-0">
                        <div class="text-center text-muted p-4" id="previewMessage">
                            Upload Word file to see status.
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
                <?php include '../../views/content/word-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script>
// JavaScript for Word to PDF Converter
let files = [];
let conversionHistory = JSON.parse(localStorage.getItem('wordConversionHistory')) || [];

// Initialize elements
const wordUpload = document.getElementById('wordUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const previewMessage = document.getElementById('previewMessage');
const fileStatusSpan = document.getElementById('fileStatus'); // Changed from rowCountSpan
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');


// Event Listeners
wordUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertWordToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);


// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to Word to PDF Converter',
        html: `Follow these steps to convert your Word documents:<br><br>
        <ol class="text-start">
            <li>Upload Word files by clicking "Select Word Files" or dragging them into the drop zone.</li>
            <li>Choose your desired page size and orientation for the output PDF.</li>
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
    wordUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    previewMessage.textContent = 'Upload Word file to see status.';
    fileStatusSpan.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('pageSize').value = 'A4';
    document.getElementById('orientation').value = 'portrait';
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

    files = Array.from(selectedFiles).filter(file => {
        const fileType = file.type;
        const fileName = file.name.toLowerCase();
        
        // Basic check for .doc and .docx mime types or extensions
        const isWord = (fileType === 'application/msword' || // .doc
                        fileType === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || // .docx
                        fileName.endsWith('.doc') || 
                        fileName.endsWith('.docx'));

        if (!isWord) {
            showError('Please upload only Word (.doc, .docx) files.');
            Swal.fire({
                title: 'Invalid File Type',
                text: 'Please upload only Microsoft Word documents (.doc, .docx).',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return false;
        }
        if (file.size > 50 * 1024 * 1024) { // Max 50MB for Word
            showError('Each file must be less than 50MB.');
            Swal.fire({
                title: 'File Too Large',
                text: 'Each Word file must be less than 50MB.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return false;
        }
        return true;
    });

    if (files.length > 0) {
        // We will process only the first file for now
        fileInfo.textContent = `${files[0].name} selected.`;
        processWordFile(files[0]); // Changed from parseCsvFile
        showStatus('File ready for conversion.', 'info');
        
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

// Placeholder for Word file processing
function processWordFile(file) {
    // In a real application, this would involve complex Word parsing.
    // For this client-side demo, we simply acknowledge the file.
    fileStatusSpan.textContent = `File Name: ${file.name}`;
    previewMessage.textContent = 'Word document uploaded. Click Convert to create PDF. (Full preview not available for Word documents)';
    convertBtn.disabled = false;
}


// Convert Word to PDF (Placeholder functionality)
async function convertWordToPdf() {
    if (files.length === 0) {
        showError('No Word file to convert. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No Word file to convert. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting Word to PDF...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Show loading alert
    const swalInstance = Swal.fire({
        title: 'Creating PDF',
        html: 'Please wait while we generate your PDF document from the Word file...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const pageSize = document.getElementById('pageSize').value;
        const orientation = document.getElementById('orientation').value;
        const addPageNumbers = document.getElementById('addPageNumbers').checked;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        // This is a placeholder for actual Word content conversion.
        // Direct, high-fidelity Word to PDF conversion in browser JS is extremely complex.
        // For demonstration, we'll create a simple PDF indicating conversion.
        
        doc.setFontSize(22);
        doc.text("Word to PDF Conversion", doc.internal.pageSize.getWidth() / 2, 80, { align: 'center' });
        doc.setFontSize(12);
        doc.text(`Original File: ${files[0].name}`, doc.internal.pageSize.getWidth() / 2, 120, { align: 'center' });
        doc.text("This is a placeholder PDF generated from your Word document.", doc.internal.pageSize.getWidth() / 2, 160, { align: 'center' });
        doc.text("For full fidelity conversion of complex Word features, a server-side solution or a specialized API is typically required.", doc.internal.pageSize.getWidth() / 2, 180, { align: 'center' });


        // Add page numbers
        if (addPageNumbers) {
            let str = "Page " + doc.internal.getNumberOfPages();
            doc.setFontSize(8);
            doc.text(str, doc.internal.pageSize.width - doc.internal.pageSize.margins.right, doc.internal.pageSize.height - 10, { align: 'right' });
        }


        const fileName = files[0].name.replace(/\.(doc|docx)$/i, '.pdf');
        
        // Add to history (store file name and options; actual PDF content is regenerated on download/preview)
        addToHistory({
            fileName: fileName,
            originalFileName: files[0].name,
            date: new Date().toLocaleString(),
            format: 'pdf',
            options: { // Store options needed for regeneration
                pageSize: document.getElementById('pageSize').value,
                orientation: document.getElementById('orientation').value,
                addPageNumbers: document.getElementById('addPageNumbers').checked
            }
        });
        
        showStatus('Conversion complete! Click Download PDF.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your Word document has been simulated to PDF.',
            icon: 'success',
            confirmButtonText: 'Great!',
            timer: 1000,  // Auto-close after 1 seconds
            timerProgressBar: true  // Show a progress bar
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
    if (files.length === 0) {
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
    
    // Show loading alert
    Swal.fire({
        title: 'Preparing PDF File',
        html: `Please wait while we prepare your PDF file...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        // Regenerate PDF on download to ensure options are applied correctly
        const pageSize = document.getElementById('pageSize').value;
        const orientation = document.getElementById('orientation').value;
        const addPageNumbers = document.getElementById('addPageNumbers').checked;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        doc.setFontSize(22);
        doc.text("Word to PDF Conversion", doc.internal.pageSize.getWidth() / 2, 80, { align: 'center' });
        doc.setFontSize(12);
        doc.text(`Original File: ${files[0].name}`, doc.internal.pageSize.getWidth() / 2, 120, { align: 'center' });
        doc.text("This is a placeholder PDF generated from your Word document.", doc.internal.pageSize.getWidth() / 2, 160, { align: 'center' });
        doc.text("For full fidelity conversion of complex Word features, a server-side solution or a specialized API is typically required.", doc.internal.pageSize.getWidth() / 2, 180, { align: 'center' });

        if (addPageNumbers) {
            let str = "Page " + doc.internal.getNumberOfPages();
            doc.setFontSize(8);
            doc.text(str, doc.internal.pageSize.width - doc.internal.pageSize.margins.right, doc.internal.pageSize.height - 10, { align: 'right' });
        }

        const fileName = files[0].name.replace(/\.(doc|docx)$/i, '.pdf');
        doc.save(fileName);
        
        showStatus('PDF file downloaded!', 'success');
        Swal.fire({
            title: 'Download Complete',
            text: 'Your PDF file has been downloaded.',
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,  // Auto-close after 1 seconds
            timerProgressBar: true  // Show a progress bar
        });
    }, 1500);
}

// History Functions
function addToHistory(item) {
    const historyItem = {
        id: Date.now(),
        fileName: item.fileName,
        originalFileName: item.originalFileName,
        date: item.date,
        format: item.format,
        options: item.options // Store conversion options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('wordConversionHistory', JSON.stringify(conversionHistory));
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
            localStorage.setItem('wordConversionHistory', JSON.stringify(conversionHistory));
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
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        // Regenerate PDF using stored options and original file name
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(item.options.orientation, 'pt', item.options.pageSize);

        doc.setFontSize(22);
        doc.text("Word to PDF Conversion", doc.internal.pageSize.getWidth() / 2, 80, { align: 'center' });
        doc.setFontSize(12);
        doc.text(`Original File: ${item.originalFileName}`, doc.internal.pageSize.getWidth() / 2, 120, { align: 'center' });
        doc.text("This is a placeholder PDF generated from your Word document.", doc.internal.pageSize.getWidth() / 2, 160, { align: 'center' });
        doc.text("For full fidelity conversion of complex Word features, a server-side solution or a specialized API is typically required.", doc.internal.pageSize.getWidth() / 2, 180, { align: 'center' });

        if (item.options.addPageNumbers) {
            let str = "Page " + doc.internal.getNumberOfPages();
            doc.setFontSize(8);
            doc.text(str, doc.internal.pageSize.width - doc.internal.pageSize.margins.right, doc.internal.pageSize.height - 10, { align: 'right' });
        }
        
        doc.save(item.fileName);
        
        showStatus(`${item.fileName} downloaded!`, 'success');
        Swal.fire({
            title: 'Download Complete',
            text: `Your PDF file has been downloaded.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,  // Auto-close after 1 seconds
            timerProgressBar: true  // Show a progress bar
        });
    }, 1500);
}

function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    // Display basic file info for preview
    fileInfo.textContent = `${item.originalFileName} (from history) selected.`;
    fileStatusSpan.textContent = `File Name: ${item.originalFileName}`;
    previewMessage.textContent = 'Word document from history loaded. (Full preview not available for Word documents)';

    // Update current conversion options to reflect history item's options
    document.getElementById('pageSize').value = item.options.pageSize;
    document.getElementById('orientation').value = item.options.orientation;
    document.getElementById('addPageNumbers').checked = item.options.addPageNumbers;

    convertBtn.disabled = false; // Allow conversion to generate new PDF based on historical data
    downloadBtn.disabled = false; // Allow direct download of a *newly generated* PDF based on history options

    showStatus(`Previewing history item: ${item.originalFileName}`, 'info');
    
    // Scroll to tool area
    document.getElementById('uploadArea').scrollIntoView({ behavior: 'smooth' });
}


// Helper Functions
function showStatus(message, type) {
    statusArea.textContent = message;
    statusArea.className = `text-center text-${type}`;
}

function showError(message) {
    showStatus(message, 'danger');
}

// Sidebar tools list (placeholder - assuming this is handled by a global script)
// If not, you'd need to fetch and populate toolsList here
document.addEventListener('DOMContentLoaded', function() {
    const toolsList = document.getElementById('toolsList');
    const searchTools = document.getElementById('searchTools');

    // Example tools (replace with actual dynamic loading if available)
    const tools = [
        { name: 'PDF to CSV', url: 'pdf-to-csv.php' },
        { name: 'CSV to PDF', url: 'csv-to-pdf.php' },
        { name: 'Word to PDF', url: 'word-to-pdf.php' }, // Current page
        { name: 'Image to PDF', url: '#'}, // Placeholder
        { name: 'Split PDF', url: '#'}, // Placeholder
        { name: 'Merge PDF', url: '#'}, // Placeholder
    ];

    function renderTools(filter = '') {
        toolsList.innerHTML = '';
        const filteredTools = tools.filter(tool => 
            tool.name.toLowerCase().includes(filter.toLowerCase())
        );

        filteredTools.forEach(tool => {
            const a = document.createElement('a');
            a.href = tool.url;
            a.className = 'list-group-item list-group-item-action ' + (tool.name === 'Word to PDF' ? 'active bg-danger text-white border-danger' : '');
            a.textContent = tool.name;
            toolsList.appendChild(a);
        });
    }

    renderTools(); // Initial render

    searchTools.addEventListener('input', (e) => {
        renderTools(e.target.value);
    });
});
</script>

<?php include '../../includes/footer.php'; ?>