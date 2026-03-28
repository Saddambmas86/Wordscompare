<?php
// SEO and Page Metadata
$page_title = "XML to PDF Converter - Convert XML Data to PDF Online Free"; // You may Change the Title here
$page_description = "Convert XML to PDF online for free. Transform XML data files into formatted PDF documents. Preserve structure and content. Instant, browser-based conversion."; // Put your Description here
$page_keywords = "xml to pdf, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
                    <h1 class="h2">XML to PDF Converter <i class="fas fa-file-pdf text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Transform your XML data into professional and shareable PDF documents.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop XML File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="xmlUpload" accept=".xml,text/xml" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('xmlUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select XML Files
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
                                <label for="rootElement" class="form-label">Root Element for Table</label>
                                <input type="text" id="rootElement" class="form-control" placeholder="e.g., 'item' or 'record'">
                                <small class="text-muted">Specify the XML element representing each row (e.g., if your XML has `&lt;items&gt;&lt;item&gt;...&lt;/item&gt;&lt;/items&gt;`, enter 'item').</small>
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
                        <h5 class="mb-0"><i class="fas fa-table me-2"></i>XML Data Preview</h5>
                        <span class="badge bg-info" id="rowCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-0" id="previewTable">
                                <thead>
                                    <tr>
                                        <th colspan="5" class="text-center text-muted p-4">Upload XML and specify root element to see preview.</th>
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
                <?php include '../../views/content/xml-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>
<script>
// JavaScript for XML to PDF Converter
let files = [];
let parsedXmlData = { headers: [], body: [] };
let conversionHistory = JSON.parse(localStorage.getItem('xmlConversionHistory')) || [];

// Initialize elements
const xmlUpload = document.getElementById('xmlUpload');
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
const rootElementInput = document.getElementById('rootElement');
const rowCountSpan = document.getElementById('rowCount');

// Event Listeners
xmlUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertXmlToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
rootElementInput.addEventListener('input', () => {
    // Re-parse and preview if a file is already selected and root element changes
    if (files.length > 0) {
        parseXmlFile(files[0]);
    }
});

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to XML to PDF Converter',
        html: `Follow these steps to convert your XMLs:<br><br>
        <ol class="text-start">
            <li>Upload an XML file by clicking "Select XML Files" or dragging it into the drop zone.</li>
            <li>In "Conversion Options", enter the XML element name that represents each row of data (e.g., 'item', 'product').</li>
            <li>Choose your desired page size and orientation.</li>
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
    files = [];
    parsedXmlData = { headers: [], body: [] };
    xmlUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    previewTable.innerHTML = '<thead><tr><th colspan="5" class="text-center text-muted p-4">Upload XML and specify root element to see preview.</th></tr></thead><tbody></tbody>';
    rowCountSpan.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('rootElement').value = '';
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
        if (file.type !== 'text/xml' && !file.name.endsWith('.xml')) {
            showError('Please upload only XML files.');
            return false;
        }
        if (file.size > 20 * 1024 * 1024) { // Max 20MB for XML
            showError('Each file must be less than 20MB.');
            return false;
        }
        return true;
    });

    if (files.length > 0) {
        fileInfo.textContent = `${files[0].name} selected.`;
        parseXmlFile(files[0]);
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

function parseXmlFile(file) {
    const reader = new FileReader();
    reader.onload = function(e) {
        try {
            const xmlString = e.target.result;
            const parser = new DOMParser();
            const xmlDoc = parser.parseFromString(xmlString, "text/xml");

            if (xmlDoc.getElementsByTagName("parsererror").length > 0) {
                showError('Invalid XML file. Please check its structure.');
                convertBtn.disabled = true;
                Swal.fire({
                    title: 'Parsing Error',
                    text: 'Invalid XML file. Please check its structure.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            const rootElementTag = rootElementInput.value.trim();
            if (!rootElementTag) {
                showStatus('Please specify the "Root Element for Table" to preview data.', 'warning');
                parsedXmlData = { headers: [], body: [] }; // Clear previous data
                displayPreview(parsedXmlData.headers, parsedXmlData.body);
                convertBtn.disabled = true;
                return;
            }

            const elements = xmlDoc.getElementsByTagName(rootElementTag);
            if (elements.length === 0) {
                showError(`No elements found with tag: '${rootElementTag}'. Please check the root element name.`);
                parsedXmlData = { headers: [], body: [] };
                displayPreview(parsedXmlData.headers, parsedXmlData.body);
                convertBtn.disabled = true;
                Swal.fire({
                    title: 'Element Not Found',
                    text: `No elements found with tag: '${rootElementTag}'. Please check the root element name.`,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            let headers = [];
            let body = [];
            const firstElement = elements[0];

            // Get headers from the first element's children (immediate text nodes ignored)
            Array.from(firstElement.children).forEach(child => {
                if (child.nodeType === 1) { // Element node
                    headers.push(child.nodeName);
                }
            });

            // If no child elements, check for attributes of the root element
            if (headers.length === 0 && firstElement.attributes.length > 0) {
                 Array.from(firstElement.attributes).forEach(attr => {
                     headers.push(attr.name);
                 });
            }


            // Populate body
            Array.from(elements).forEach(element => {
                let row = [];
                if (headers.length > 0) {
                    // Collect values for each header
                    headers.forEach(header => {
                        let value = '';
                        const childElement = element.getElementsByTagName(header)[0];
                        if (childElement && childElement.textContent) {
                            value = childElement.textContent;
                        } else { // Check if it's an attribute
                            value = element.getAttribute(header) || '';
                        }
                        row.push(value);
                    });
                } else {
                    // Fallback: If no structured child elements/attributes for headers,
                    // just take the text content of the root element itself
                    row.push(element.textContent.trim());
                    if (headers.length === 0) headers.push('Value'); // Set a default header
                }
                body.push(row);
            });

            if (headers.length === 0) {
                showError('Could not extract meaningful data from the specified root element. Try a different root element or a simpler XML structure.');
                parsedXmlData = { headers: [], body: [] };
                displayPreview(parsedXmlData.headers, parsedXmlData.body);
                convertBtn.disabled = true;
                Swal.fire({
                    title: 'Data Extraction Error',
                    text: 'Could not extract meaningful data from the specified root element. Try a different root element or a simpler XML structure.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            parsedXmlData = { headers, body };
            displayPreview(headers, body);
            convertBtn.disabled = true; // Disable until conversion is explicitly run
            downloadBtn.disabled = true; // Disable until conversion is explicitly run
            showStatus('XML data parsed. Click Convert to create PDF.', 'success');
            convertBtn.disabled = false;

        } catch (error) {
            showError(`Error parsing XML: ${error.message}`);
            convertBtn.disabled = true;
            Swal.fire({
                title: 'Parsing Error',
                text: `Error parsing XML: ${error.message}`,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    };
    reader.onerror = function() {
        showError('Failed to read file.');
        convertBtn.disabled = true;
    };
    reader.readAsText(file, document.getElementById('encoding').value);
}

// Display Preview
function displayPreview(headers, data) {
    const thead = previewTable.querySelector('thead');
    const tbody = previewTable.querySelector('tbody');
    thead.innerHTML = '';
    tbody.innerHTML = '';

    if (data && data.length > 0 && headers.length > 0) {
        rowCountSpan.textContent = `Rows: ${data.length}`;
        
        const headerTr = document.createElement('tr');
        headers.forEach(cell => {
            const th = document.createElement('th');
            th.textContent = cell;
            headerTr.appendChild(th);
        });
        thead.appendChild(headerTr);

        data.forEach(row => {
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
        thead.innerHTML = '<thead><tr><th colspan="5" class="text-center text-muted p-4">Upload XML and specify root element to see preview.</th></tr></thead>';
    }
}


// Convert XML to PDF
async function convertXmlToPdf() {
    if (parsedXmlData.body.length === 0 || parsedXmlData.headers.length === 0) {
        showError('No XML data to convert. Please upload a valid XML file and specify the root element.');
        Swal.fire({
            title: 'Error',
            text: 'No XML data to convert. Please upload a valid XML file and specify the root element.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting XML to PDF...', 'info');
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
        const pageSize = document.getElementById('pageSize').value;
        const orientation = document.getElementById('orientation').value;
        const addPageNumbers = document.getElementById('addPageNumbers').checked;
        const rootElementTag = document.getElementById('rootElement').value.trim();

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        doc.autoTable({
            head: [parsedXmlData.headers],
            body: parsedXmlData.body,
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

        const fileName = files[0].name.replace('.xml', '.pdf');
        
        // Add to history
        addToHistory({
            fileName: fileName,
            date: new Date().toLocaleString(),
            format: 'pdf',
            data: parsedXmlData, // Store the extracted data
            options: { // Store options needed for regeneration
                rootElement: rootElementTag,
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
            text: 'Your XML has been successfully converted to PDF.',
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
    if (parsedXmlData.body.length === 0 || parsedXmlData.headers.length === 0) {
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
        // Regenerate PDF on download to ensure options are applied correctly
        const pageSize = document.getElementById('pageSize').value;
        const orientation = document.getElementById('orientation').value;
        const addPageNumbers = document.getElementById('addPageNumbers').checked;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        doc.autoTable({
            head: [parsedXmlData.headers],
            body: parsedXmlData.body,
            startY: 40,
            styles: {
                fontSize: 8,
                cellPadding: 3,
                valign: 'middle',
                overflow: 'linebreak',
            },
            headStyles: {
                fillColor: [220, 53, 69],
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

        const fileName = files[0].name.replace('.xml', '.pdf');
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
        data: item.data, // Store extracted data
        options: item.options // Store conversion options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('xmlConversionHistory', JSON.stringify(conversionHistory));
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
            localStorage.setItem('xmlConversionHistory', JSON.stringify(conversionHistory));
            displayHistory();
            Swal.fire('Deleted!', 'Your file has been deleted from history.', 'success');
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
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(item.options.orientation, 'pt', item.options.pageSize);

        doc.autoTable({
            head: [item.data.headers],
            body: item.data.body,
            startY: 40,
            styles: {
                fontSize: 8,
                cellPadding: 3,
                valign: 'middle',
                overflow: 'linebreak',
            },
            headStyles: {
                fillColor: [220, 53, 69],
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

    // Clear existing preview
    const thead = previewTable.querySelector('thead');
    const tbody = previewTable.querySelector('tbody');
    thead.innerHTML = '';
    tbody.innerHTML = '';

    // Display the historical data in the preview table
    if (item.data && item.data.body.length > 0 && item.data.headers.length > 0) {
        rowCountSpan.textContent = `Rows: ${item.data.body.length}`;
        
        const headerTr = document.createElement('tr');
        item.data.headers.forEach(cell => {
            const th = document.createElement('th');
            th.textContent = cell;
            headerTr.appendChild(th);
        });
        thead.appendChild(headerTr);

        item.data.body.forEach(row => {
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