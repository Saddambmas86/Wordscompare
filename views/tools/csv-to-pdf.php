<?php
// SEO and Page Metadata
$page_title = "Free CSV to PDF Converter"; // You may Change the Title here
$page_description = "CSV to PDF converter online."; // Put your Description here
$page_keywords = "CSV to PDF, convert CSV to PDF, export CSV to PDF, free CSV converter, online PDF tool";

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
                    <h1 class="h2">CSV to PDF Converter <i class="fas fa-file-pdf text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Transform your CSV data into professional and shareable PDF documents.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop CSV File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="csvUpload" accept=".csv,text/csv" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('csvUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select CSV Files
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
                                <label for="delimiter" class="form-label">Input Delimiter</label>
                                <select id="delimiter" class="form-select">
                                    <option value="," selected>Comma ( , ) - Standard</option>
                                    <option value=";">Semicolon ( ; )</option>
                                    <option value="\t">Tab</option>
                                    <option value="|">Pipe ( | )</option>
                                    <option value="custom">Custom Delimiter</option>
                                </select>
                                <input type="text" id="customDelimiter" class="form-control mt-2 d-none" placeholder="Enter custom delimiter">
                            </div>
                            <div class="col-md-6">
                                <label for="encoding" class="form-label">Encoding</label>
                                <select id="encoding" class="form-select">
                                    <option value="utf-8" selected>UTF-8 (Recommended)</option>
                                    <option value="windows-1252">Windows-1252</option>
                                    <option value="iso-8859-1">ISO-8859-1</option>
                                </select>
                            </div>
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
                                    <input class="form-check-input" type="checkbox" id="headerCheck" checked>
                                    <label class="form-check-label" for="headerCheck">
                                        First row of the CSV is the header
                                    </label>
                                </div>
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
                        <h5 class="mb-0"><i class="fas fa-table me-2"></i>CSV Preview</h5>
                        <span class="badge bg-info" id="rowCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-0" id="previewTable">
                                <thead>
                                    <tr>
                                        <th colspan="5" class="text-center text-muted p-4">Upload CSV to see preview.</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
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
                <?php include '../../views/content/csv-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>
<script>
// JavaScript for CSV to PDF Converter
let files = [];
let parsedCsvData = [];
let conversionHistory = JSON.parse(localStorage.getItem('csvConversionHistory')) || [];

// Initialize elements
const csvUpload = document.getElementById('csvUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const previewTable = document.getElementById('previewTable');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const delimiterSelect = document.getElementById('delimiter');
const customDelimiter = document.getElementById('customDelimiter');
const rowCountSpan = document.getElementById('rowCount');


// Event Listeners
csvUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertCsvToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
delimiterSelect.addEventListener('change', toggleCustomDelimiter);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to CSV to PDF Converter',
        html: `Follow these steps to convert your CSVs:<br><br>
        <ol class="text-start">
            <li>Upload CSVs by clicking "Select CSV Files" or dragging them into the drop zone.</li>
            <li>Choose your input delimiter, encoding, page size, and orientation.</li>
            <li>Click "Convert" to generate the PDF preview.</li>
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
    parsedCsvData = [];
    csvUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    previewTable.innerHTML = '<thead><tr><th colspan="5" class="text-center text-muted p-4">Upload CSV to see preview.</th></tr></thead><tbody></tbody>';
    rowCountSpan.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('delimiter').value = ',';
    document.getElementById('customDelimiter').value = '';
    document.getElementById('customDelimiter').classList.add('d-none');
    document.getElementById('encoding').value = 'utf-8';
    document.getElementById('pageSize').value = 'A4';
    document.getElementById('orientation').value = 'portrait';
    document.getElementById('headerCheck').checked = true;
    document.getElementById('addPageNumbers').checked = false;
}

// Toggle Custom Delimiter
function toggleCustomDelimiter() {
    customDelimiter.classList.toggle('d-none', delimiterSelect.value !== 'custom');
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
        if (file.type !== 'text/csv' && !file.name.endsWith('.csv')) {
            showError('Please upload only CSV files.');
            return false;
        }
        if (file.size > 20 * 1024 * 1024) { // Max 20MB for CSV
            showError('Each file must be less than 20MB.');
            return false;
        }
        return true;
    });

    if (files.length > 0) {
        // We will process only the first file for now, consistent with previous behavior
        fileInfo.textContent = `${files[0].name} selected.`;
        parseCsvFile(files[0]);
        showStatus('File ready for conversion. Previewing...', 'info');
        
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

function parseCsvFile(file) {
    const delimiter = delimiterSelect.value === 'custom' ? customDelimiter.value : delimiterSelect.value;
    const encoding = document.getElementById('encoding').value;
    const header = document.getElementById('headerCheck').checked;

    Papa.parse(file, {
        delimiter: delimiter,
        encoding: encoding,
        header: false, // PapaParse returns arrays of arrays, we handle header display manually
        skipEmptyLines: true,
        complete: function(results) {
            if (results.errors.length > 0) {
                const errorMsg = results.errors.map(err => err.message).join('<br>');
                showError(`Error parsing CSV: ${errorMsg}`);
                convertBtn.disabled = true;
                Swal.fire({
                    title: 'Parsing Error',
                    html: `Error parsing CSV: ${errorMsg}`,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }
            parsedCsvData = results.data;
            displayPreview(parsedCsvData, header);
            convertBtn.disabled = false;
            showStatus('CSV preview loaded. Click Convert to create PDF.', 'success');
        },
        error: function(err) {
            showError(`Failed to parse CSV: ${err.message}`);
            convertBtn.disabled = true;
            Swal.fire({
                title: 'Parsing Error',
                text: `Failed to parse CSV: ${err.message}`,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}

// Display Preview
function displayPreview(data, hasHeader) {
    const thead = previewTable.querySelector('thead');
    const tbody = previewTable.querySelector('tbody');
    thead.innerHTML = '';
    tbody.innerHTML = '';

    if (data && data.length > 0) {
        rowCountSpan.textContent = `Rows: ${data.length}`;
        let headerRow = [];
        let dataRows = data;

        if (hasHeader) {
            headerRow = data[0];
            dataRows = data.slice(1);
        } else {
            // Generate generic headers if no header row
            headerRow = data[0].map((_, i) => `Column ${i + 1}`);
        }

        const headerTr = document.createElement('tr');
        headerRow.forEach(cell => {
            const th = document.createElement('th');
            th.textContent = cell;
            headerTr.appendChild(th);
        });
        thead.appendChild(headerTr);

        dataRows.forEach(row => {
            const tr = document.createElement('tr');
            row.forEach(cell => {
                const td = document.createElement('td');
                td.textContent = cell;
                tr.appendChild(td);
            });
            tbody.appendChild(tr);
        });
    } else {
        rowCountSpan.textContent = 'Rows: 0';
        thead.innerHTML = '<thead><tr><th colspan="5" class="text-center text-muted p-4">Upload CSV to see preview.</th></tr></thead>';
    }
}


// Convert CSV to PDF
async function convertCsvToPdf() {
    if (parsedCsvData.length === 0) {
        showError('No CSV data to convert. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No CSV data to convert. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting CSV to PDF...', 'info');
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
        const hasHeader = document.getElementById('headerCheck').checked;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        let tableHeaders = [];
        let tableBody = [];

        if (hasHeader && parsedCsvData.length > 0) {
            tableHeaders = parsedCsvData[0];
            tableBody = parsedCsvData.slice(1);
        } else {
            tableHeaders = parsedCsvData[0].map((_, i) => `Column ${i + 1}`);
            tableBody = parsedCsvData;
        }

        doc.autoTable({
            head: [tableHeaders],
            body: tableBody,
            startY: 40,
            styles: {
                fontSize: 8,
                cellPadding: 3,
                valign: 'middle',
                overflow: 'linebreak',
            },
            headStyles: {
                fillColor: [220, 53, 69], // Bootstrap danger color
                textColor: 255,
                fontStyle: 'bold',
                halign: 'center'
            },
            theme: 'striped',
            didDrawPage: function(data) {
                // Add page numbers
                if (addPageNumbers) {
                    let str = "Page " + doc.internal.getNumberOfPages();
                    doc.setFontSize(8);
                    doc.text(str, doc.internal.pageSize.width - data.settings.margin.right, doc.internal.pageSize.height - 10);
                }
            }
        });

        // Save the PDF content temporarily
        const fileName = files[0].name.replace('.csv', '.pdf');
        const pdfBlob = doc.output('blob');
        
        // Update stored data for history with blob or base64 representation
        // For simplicity and potential size limits, we'll store a small indicator
        // and regenerate PDF on history download if needed.
        // For now, let's keep `parsedCsvData` and use it to regenerate.

        // Add to history (store parsedCsvData to regenerate PDF on download/preview)
        addToHistory({
            fileName: fileName,
            date: new Date().toLocaleString(),
            format: 'pdf',
            data: parsedCsvData, // Store the raw parsed data to regenerate
            options: { // Store options needed for regeneration
                delimiter: delimiterSelect.value === 'custom' ? customDelimiter.value : delimiterSelect.value,
                encoding: document.getElementById('encoding').value,
                pageSize: document.getElementById('pageSize').value,
                orientation: document.getElementById('orientation').value,
                addPageNumbers: document.getElementById('addPageNumbers').checked,
                hasHeader: document.getElementById('headerCheck').checked
            }
        });
        
        showStatus('Conversion complete! Click Download PDF.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your CSV has been successfully converted to PDF.',
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
    if (parsedCsvData.length === 0) {
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
        html: `Please wait while we generate your PDF file...`,
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
        const hasHeader = document.getElementById('headerCheck').checked;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        let tableHeaders = [];
        let tableBody = [];

        if (hasHeader && parsedCsvData.length > 0) {
            tableHeaders = parsedCsvData[0];
            tableBody = parsedCsvData.slice(1);
        } else {
            tableHeaders = parsedCsvData[0].map((_, i) => `Column ${i + 1}`);
            tableBody = parsedCsvData;
        }

        doc.autoTable({
            head: [tableHeaders],
            body: tableBody,
            startY: 40,
            styles: {
                fontSize: 8,
                cellPadding: 3,
                valign: 'middle',
                overflow: 'linebreak',
            },
            headStyles: {
                fillColor: [220, 53, 69], // Bootstrap danger color
                textColor: 255,
                fontStyle: 'bold',
                halign: 'center'
            },
            theme: 'striped',
            didDrawPage: function(data) {
                if (addPageNumbers) {
                    let str = "Page " + doc.internal.getNumberOfPages();
                    doc.setFontSize(8);
                    doc.text(str, doc.internal.pageSize.width - data.settings.margin.right, doc.internal.pageSize.height - 10);
                }
            }
        });

        const fileName = files[0].name.replace('.csv', '.pdf');
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
        date: item.date,
        format: item.format,
        data: item.data, // Store raw parsed data
        options: item.options // Store conversion options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('csvConversionHistory', JSON.stringify(conversionHistory));
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
            localStorage.setItem('csvConversionHistory', JSON.stringify(conversionHistory));
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
        // Regenerate PDF using stored data and options
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(item.options.orientation, 'pt', item.options.pageSize);

        let tableHeaders = [];
        let tableBody = [];

        if (item.options.hasHeader && item.data.length > 0) {
            tableHeaders = item.data[0];
            tableBody = item.data.slice(1);
        } else {
            tableHeaders = item.data[0].map((_, i) => `Column ${i + 1}`);
            tableBody = item.data;
        }

        doc.autoTable({
            head: [tableHeaders],
            body: tableBody,
            startY: 40,
            styles: {
                fontSize: 8,
                cellPadding: 3,
                valign: 'middle',
                overflow: 'linebreak',
            },
            headStyles: {
                fillColor: [220, 53, 69], // Bootstrap danger color
                textColor: 255,
                fontStyle: 'bold',
                halign: 'center'
            },
            theme: 'striped',
            didDrawPage: function(data) {
                if (item.options.addPageNumbers) {
                    let str = "Page " + doc.internal.getNumberOfPages();
                    doc.setFontSize(8);
                    doc.text(str, doc.internal.pageSize.width - data.settings.margin.right, doc.internal.pageSize.height - 10);
                }
            }
        });
        
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

    // Clear existing preview
    const thead = previewTable.querySelector('thead');
    const tbody = previewTable.querySelector('tbody');
    thead.innerHTML = '';
    tbody.innerHTML = '';

    // Display the historical data in the preview table
    if (item.data && item.data.length > 0) {
        rowCountSpan.textContent = `Rows: ${item.data.length}`;
        let headerRow = [];
        let dataRows = item.data;

        if (item.options.hasHeader) {
            headerRow = item.data[0];
            dataRows = item.data.slice(1);
        } else {
            headerRow = item.data[0].map((_, i) => `Column ${i + 1}`);
        }

        const headerTr = document.createElement('tr');
        headerRow.forEach(cell => {
            const th = document.createElement('th');
            th.textContent = cell;
            headerTr.appendChild(th);
        });
        thead.appendChild(headerTr);

        dataRows.forEach(row => {
            const tr = document.createElement('tr');
            row.forEach(cell => {
                const td = document.createElement('td');
                td.textContent = cell;
                tr.appendChild(td);
            });
            tbody.appendChild(tr);
        });
    }

    showStatus(`Previewing ${item.fileName}`, 'info');
    
    // Scroll to preview area
    previewTable.scrollIntoView({ behavior: 'smooth' });
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