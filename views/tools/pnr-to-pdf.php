<?php
// SEO and Page Metadata
$page_title = "PNR to PDF Converter - Generate PDF from PNR Online Free"; // You may Change the Title here
$page_description = "Convert PNR to PDF online for free. Generate PDF travel documents from PNR booking codes. Ideal for ticket printing and travel records. Instant conversion."; // Put your Description here
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
                    <h1 class="h2">PNR to PDF Converter <i class="fas fa-ticket-alt text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Generate professional PDF documents from your PNR (Passenger Name Record) data.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop PNR File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="pnrUpload" accept=".txt,.json" class="d-none">
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('pnrUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select PNR File (.txt or .json)
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
                                <label for="pnrInputType" class="form-label">PNR Input Type</label>
                                <select id="pnrInputType" class="form-select">
                                    <option value="raw_text" selected>Raw Text</option>
                                    <option value="json">JSON Data</option>
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
                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>PNR Data Preview</h5>
                        <span class="badge bg-info" id="dataCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-0" id="previewTable">
                                <thead>
                                    <tr>
                                        <th colspan="5" class="text-center text-muted p-4">Upload PNR file to see preview.</th>
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
                <?php include '../../views/content/pnr-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>
<script>
// JavaScript for PNR to PDF Converter
let files = [];
let pnrRawData = '';
let conversionHistory = JSON.parse(localStorage.getItem('pnrConversionHistory')) || [];

// Initialize elements
const pnrUpload = document.getElementById('pnrUpload');
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
const pnrInputTypeSelect = document.getElementById('pnrInputType');
const dataCountSpan = document.getElementById('dataCount');

// Event Listeners
pnrUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertPnrToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PNR to PDF Converter',
        html: `Follow these steps to convert your PNR data:<br><br>
        <ol class="text-start">
            <li>Upload your PNR file (TXT or JSON) by clicking "Select PNR File" or dragging it into the drop zone.</li>
            <li>Select the PNR input type (Raw Text or JSON) and other PDF options.</li>
            <li>Click "Convert" to generate the PDF preview.</li>
            <li>Download your newly created PNR PDF.</li>
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
    pnrRawData = '';
    pnrUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    previewTable.innerHTML = '<thead><tr><th colspan="5" class="text-center text-muted p-4">Upload PNR file to see preview.</th></tr></thead><tbody></tbody>';
    dataCountSpan.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('pnrInputType').value = 'raw_text';
    document.getElementById('encoding').value = 'utf-8';
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
        if (file.type !== 'text/plain' && file.type !== 'application/json' && !file.name.endsWith('.txt') && !file.name.endsWith('.json')) {
            showError('Please upload only .txt or .json files.');
            return false;
        }
        if (file.size > 5 * 1024 * 1024) { // Max 5MB for PNR files
            showError('Each file must be less than 5MB.');
            return false;
        }
        return true;
    });

    if (files.length > 0) {
        fileInfo.textContent = `${files[0].name} selected.`;
        readPnrFile(files[0]);
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

function readPnrFile(file) {
    const reader = new FileReader();
    const encoding = document.getElementById('encoding').value;

    reader.onload = function(e) {
        pnrRawData = e.target.result;
        displayPreview(pnrRawData);
        convertBtn.disabled = false;
        showStatus('PNR data preview loaded. Click Convert to create PDF.', 'success');
    };

    reader.onerror = function() {
        showError('Failed to read file.');
        convertBtn.disabled = true;
        Swal.fire({
            title: 'File Read Error',
            text: 'Failed to read file.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    };

    reader.readAsText(file, encoding);
}

// Display Preview
function displayPreview(data) {
    const thead = previewTable.querySelector('thead');
    const tbody = previewTable.querySelector('tbody');
    thead.innerHTML = '';
    tbody.innerHTML = '';
    dataCountSpan.textContent = '';

    const inputType = document.getElementById('pnrInputType').value;
    let tableHeaders = [];
    let tableBody = [];

    if (inputType === 'json') {
        try {
            const jsonData = JSON.parse(data);
            if (Array.isArray(jsonData)) {
                // If it's an array of objects
                if (jsonData.length > 0) {
                    tableHeaders = Object.keys(jsonData[0]);
                    tableBody = jsonData.map(obj => Object.values(obj));
                }
            } else if (typeof jsonData === 'object' && jsonData !== null) {
                // If it's a single object
                tableHeaders = ['Field', 'Value'];
                for (const key in jsonData) {
                    tableBody.push([key, JSON.stringify(jsonData[key])]);
                }
            } else {
                // Not a recognized JSON structure for table
                tableHeaders = ['Raw PNR Data'];
                tableBody = [[data]];
            }
        } catch (e) {
            // Fallback to raw text if JSON parsing fails
            showError('Invalid JSON format. Displaying as raw text.');
            tableHeaders = ['Raw PNR Data'];
            tableBody = [[data]];
        }
    } else { // raw_text
        const lines = data.split('\n').filter(line => line.trim() !== '');
        tableHeaders = ['Raw PNR Data'];
        tableBody = lines.map(line => [line]);
    }

    if (tableBody.length > 0) {
        dataCountSpan.textContent = `Entries: ${tableBody.length}`;
        const headerTr = document.createElement('tr');
        tableHeaders.forEach(cell => {
            const th = document.createElement('th');
            th.textContent = cell;
            headerTr.appendChild(th);
        });
        thead.appendChild(headerTr);

        tableBody.forEach(row => {
            const tr = document.createElement('tr');
            row.forEach(cell => {
                const td = document.createElement('td');
                td.textContent = cell;
                tr.appendChild(td);
            });
            tbody.appendChild(tr);
        });
    } else {
        dataCountSpan.textContent = 'Entries: 0';
        thead.innerHTML = '<thead><tr><th colspan="5" class="text-center text-muted p-4">Upload PNR file to see preview.</th></tr></thead>';
    }
}


// Convert PNR to PDF
async function convertPnrToPdf() {
    if (!pnrRawData) {
        showError('No PNR data to convert. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No PNR data to convert. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting PNR to PDF...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    const swalInstance = Swal.fire({
        title: 'Creating PDF',
        html: 'Please wait while we generate your PNR PDF document...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const pageSize = document.getElementById('pageSize').value;
        const orientation = document.getElementById('orientation').value;
        const addPageNumbers = document.getElementById('addPageNumbers').checked;
        const inputType = document.getElementById('pnrInputType').value;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        let tableHeaders = [];
        let tableBody = [];
        let docTitle = files[0] ? files[0].name.replace(/\.(txt|json)$/i, '') : 'PNR Document';

        if (inputType === 'json') {
            try {
                const jsonData = JSON.parse(pnrRawData);
                if (Array.isArray(jsonData)) {
                    if (jsonData.length > 0) {
                        tableHeaders = Object.keys(jsonData[0]);
                        tableBody = jsonData.map(obj => Object.values(obj));
                    }
                } else if (typeof jsonData === 'object' && jsonData !== null) {
                    tableHeaders = ['Field', 'Value'];
                    for (const key in jsonData) {
                        tableBody.push([key, JSON.stringify(jsonData[key], null, 2)]);
                    }
                }
            } catch (e) {
                // If JSON is invalid, treat as raw text
                tableHeaders = ['Raw PNR Data'];
                tableBody = pnrRawData.split('\n').filter(line => line.trim() !== '').map(line => [line]);
            }
        } else { // raw_text
            tableHeaders = ['Raw PNR Data'];
            tableBody = pnrRawData.split('\n').filter(line => line.trim() !== '').map(line => [line]);
        }

        // Add a title to the document
        doc.setFontSize(16);
        doc.text(docTitle, doc.internal.pageSize.width / 2, 30, { align: 'center' });

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

        const fileName = (files[0] ? files[0].name : 'pnr_data').replace(/\.(txt|json)$/i, '.pdf');
        
        // Store raw data and options for history
        addToHistory({
            fileName: fileName,
            date: new Date().toLocaleString(),
            format: 'pdf',
            rawData: pnrRawData,
            options: {
                inputType: inputType,
                encoding: document.getElementById('encoding').value,
                pageSize: pageSize,
                orientation: orientation,
                addPageNumbers: addPageNumbers
            }
        });
        
        showStatus('Conversion complete! Click Download PDF.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your PNR data has been successfully converted to PDF.',
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
    if (!pnrRawData) {
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
        // Regenerate PDF using stored rawData and current options
        const pageSize = document.getElementById('pageSize').value;
        const orientation = document.getElementById('orientation').value;
        const addPageNumbers = document.getElementById('addPageNumbers').checked;
        const inputType = document.getElementById('pnrInputType').value;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        let tableHeaders = [];
        let tableBody = [];
        let docTitle = files[0] ? files[0].name.replace(/\.(txt|json)$/i, '') : 'PNR Document';


        if (inputType === 'json') {
            try {
                const jsonData = JSON.parse(pnrRawData);
                if (Array.isArray(jsonData)) {
                    if (jsonData.length > 0) {
                        tableHeaders = Object.keys(jsonData[0]);
                        tableBody = jsonData.map(obj => Object.values(obj));
                    }
                } else if (typeof jsonData === 'object' && jsonData !== null) {
                    tableHeaders = ['Field', 'Value'];
                    for (const key in jsonData) {
                        tableBody.push([key, JSON.stringify(jsonData[key], null, 2)]);
                    }
                }
            } catch (e) {
                tableHeaders = ['Raw PNR Data'];
                tableBody = pnrRawData.split('\n').filter(line => line.trim() !== '').map(line => [line]);
            }
        } else { // raw_text
            tableHeaders = ['Raw PNR Data'];
            tableBody = pnrRawData.split('\n').filter(line => line.trim() !== '').map(line => [line]);
        }

        doc.setFontSize(16);
        doc.text(docTitle, doc.internal.pageSize.width / 2, 30, { align: 'center' });

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
        
        const fileName = (files[0] ? files[0].name : 'pnr_data').replace(/\.(txt|json)$/i, '.pdf');
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
        rawData: item.rawData,
        options: item.options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('pnrConversionHistory', JSON.stringify(conversionHistory));
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
            localStorage.setItem('pnrConversionHistory', JSON.stringify(conversionHistory));
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
        // Regenerate PDF using stored rawData and options
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(item.options.orientation, 'pt', item.options.pageSize);

        let tableHeaders = [];
        let tableBody = [];
        let docTitle = item.fileName.replace('.pdf', '');

        if (item.options.inputType === 'json') {
            try {
                const jsonData = JSON.parse(item.rawData);
                if (Array.isArray(jsonData)) {
                    if (jsonData.length > 0) {
                        tableHeaders = Object.keys(jsonData[0]);
                        tableBody = jsonData.map(obj => Object.values(obj));
                    }
                } else if (typeof jsonData === 'object' && jsonData !== null) {
                    tableHeaders = ['Field', 'Value'];
                    for (const key in jsonData) {
                        tableBody.push([key, JSON.stringify(jsonData[key], null, 2)]);
                    }
                }
            } catch (e) {
                tableHeaders = ['Raw PNR Data'];
                tableBody = item.rawData.split('\n').filter(line => line.trim() !== '').map(line => [line]);
            }
        } else { // raw_text
            tableHeaders = ['Raw PNR Data'];
            tableBody = item.rawData.split('\n').filter(line => line.trim() !== '').map(line => [line]);
        }
        
        doc.setFontSize(16);
        doc.text(docTitle, doc.internal.pageSize.width / 2, 30, { align: 'center' });

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
            timer: 1000,
            timerProgressBar: true
        });
    }, 1500);
}

function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    // Set the current file info and raw data for active conversion
    files = [{ name: item.fileName.replace('.pdf', item.options.inputType === 'json' ? '.json' : '.txt') }]; // Reconstruct a dummy file object
    pnrRawData = item.rawData;
    
    // Set conversion options in UI
    document.getElementById('pnrInputType').value = item.options.inputType;
    document.getElementById('encoding').value = item.options.encoding;
    document.getElementById('pageSize').value = item.options.pageSize;
    document.getElementById('orientation').value = item.options.orientation;
    document.getElementById('addPageNumbers').checked = item.options.addPageNumbers;

    displayPreview(item.rawData); // Display using the historical raw data

    fileInfo.textContent = `${files[0].name} (from history) selected.`;
    convertBtn.disabled = false;
    downloadBtn.disabled = false;

    showStatus(`Previewing ${item.fileName}`, 'info');
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