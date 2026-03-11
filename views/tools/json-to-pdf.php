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
                    <h1 class="h2">JSON to PDF Converter <i class="fas fa-file-pdf text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Transform your JSON data into structured and readable PDF documents.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop JSON File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="jsonUpload" accept=".json,application/json" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('jsonUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select JSON Files
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
                            <div class="col-md-6">
                                <label for="outputFormat" class="form-label">Output Format</label>
                                <select id="outputFormat" class="form-select">
                                    <option value="table" selected>Table Format</option>
                                    <option value="jsonString">JSON String Format</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="nestingLevel" class="form-label">Table Nesting Level</label>
                                <input type="number" id="nestingLevel" class="form-control" value="1" min="1" disabled>
                                <div class="form-text">Max depth for table conversion (for nested JSON).</div>
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
                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>PDF Preview (Simulated)</h5>
                    </div>
                    <div class="card-body p-0">
                         <pre id="pdfPreviewContent" class="p-3 bg-light rounded-bottom mb-0" style="white-space: pre-wrap; word-wrap: break-word; max-height: 400px; overflow-y: auto; font-size: 0.85rem;">Upload JSON to see a simulated preview or convert to generate a full PDF.</pre>
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
                <?php include '../../views/content/json-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.31/jspdf.plugin.autotable.min.js"></script>
<script>
// JavaScript for JSON to PDF Converter
let files = [];
let parsedJsonData = null;
let conversionHistory = JSON.parse(localStorage.getItem('jsonConversionHistory')) || [];

// Initialize elements
const jsonUpload = document.getElementById('jsonUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const pdfPreviewContent = document.getElementById('pdfPreviewContent');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const outputFormatSelect = document.getElementById('outputFormat');
const nestingLevelInput = document.getElementById('nestingLevel');


// Event Listeners
jsonUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertJsonToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
outputFormatSelect.addEventListener('change', toggleNestingLevel);

// Initialize history display
displayHistory();
toggleNestingLevel(); // Set initial state for nesting level input

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to JSON to PDF Converter',
        html: `Follow these steps to convert your JSONs:<br><br>
        <ol class="text-start">
            <li>Upload JSON by clicking "Select JSON Files" or dragging it into the drop zone.</li>
            <li>Choose your desired PDF page size, orientation, and output format (Table or JSON String). Adjust nesting level if using Table format.</li>
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
    files = [];
    parsedJsonData = null;
    generatedPdfDoc = null;
    generatedFileName = '';
    jsonUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    pdfPreviewContent.textContent = 'Upload JSON to see a simulated preview or convert to generate a full PDF.';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('pageSize').value = 'A4';
    document.getElementById('orientation').value = 'portrait';
    document.getElementById('outputFormat').value = 'table';
    document.getElementById('nestingLevel').value = '1';
    document.getElementById('nestingLevel').disabled = false;
    document.getElementById('addPageNumbers').checked = false;
    toggleNestingLevel();
}

// Toggle Nesting Level Input based on Output Format
function toggleNestingLevel() {
    nestingLevelInput.disabled = (outputFormatSelect.value !== 'table');
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
        if (file.type !== 'application/json' && !file.name.endsWith('.json')) {
            showError('Please upload only JSON files.');
            return false;
        }
        if (file.size > 20 * 1024 * 1024) { // Max 20MB for JSON
            showError('Each file must be less than 20MB.');
            return false;
        }
        return true;
    });

    if (files.length > 0) {
        // We will process only the first file for now
        fileInfo.textContent = `${files[0].name} selected.`;
        readAndParseJsonFile(files[0]);
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

function readAndParseJsonFile(file) {
    const reader = new FileReader();
    reader.onload = function(e) {
        try {
            parsedJsonData = JSON.parse(e.target.result);
            displayPreview(parsedJsonData);
            convertBtn.disabled = false;
            showStatus('JSON preview loaded. Click Convert to create PDF.', 'success');
        } catch (error) {
            showError(`Error parsing JSON: ${error.message}`);
            convertBtn.disabled = true;
            Swal.fire({
                title: 'Parsing Error',
                html: `Error parsing JSON: ${error.message}`,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
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
    reader.readAsText(file);
}

// Display Preview (basic text preview for JSON)
function displayPreview(data) {
    try {
        pdfPreviewContent.textContent = JSON.stringify(data, null, 2);
    } catch (e) {
        pdfPreviewContent.textContent = "Could not display preview. Invalid JSON structure.";
    }
}


// Store generated PDF for download
let generatedPdfDoc = null;
let generatedFileName = '';

// Convert JSON to PDF
async function convertJsonToPdf() {
    if (!parsedJsonData) {
        showError('No JSON data to convert. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No JSON data to convert. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting JSON to PDF...', 'info');
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
        const addPageNumbers = document.getElementById('addPageNumbers').checked;
        const outputFormat = document.getElementById('outputFormat').value;
        const nestingLevel = parseInt(document.getElementById('nestingLevel').value);

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        // Add title
        doc.setFontSize(16);
        doc.setTextColor(0, 0, 0);
        doc.text('JSON Data Export', 40, 30);
        doc.setFontSize(10);
        doc.setTextColor(100, 100, 100);
        doc.text(`Generated: ${new Date().toLocaleString()}`, 40, 45);

        if (outputFormat === 'table') {
            // Attempt to convert to table
            console.log('Parsing JSON data:', parsedJsonData);
            const { headers, body } = flattenJsonToTable(parsedJsonData, nestingLevel);
            console.log('Headers:', headers);
            console.log('Body:', body);
            
            if (headers.length === 0 || body.length === 0) {
                 showError('JSON data is not suitable for table format at specified nesting level. Try "JSON String Format" or adjust nesting.');
                 swalInstance.close();
                 Swal.fire({
                    title: 'Conversion Error',
                    text: 'JSON data is not suitable for table format at specified nesting level. Try "JSON String Format" or adjust nesting.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
                convertBtn.disabled = false;
                return;
            }

            // Check if autoTable is available
            if (typeof doc.autoTable !== 'function') {
                throw new Error('PDF table plugin not loaded. Please refresh the page and try again.');
            }

            doc.autoTable({
                head: [headers],
                body: body,
                startY: 60,
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
                margin: { top: 60 },
                didDrawPage: function(data) {
                    if (addPageNumbers) {
                        const pageCount = doc.internal.getNumberOfPages();
                        doc.setFontSize(8);
                        doc.setTextColor(128, 128, 128);
                        doc.text(`Page ${pageCount}`, doc.internal.pageSize.width - 40, doc.internal.pageSize.height - 10, { align: 'right' });
                    }
                }
            });
        } else { // jsonString
            // Helper to sanitize text for PDF
            const sanitizeForPdf = (text) => {
                return String(text)
                    .replace(/[\u2018\u2019\u201A\u201B]/g, "'")
                    .replace(/[\u201C\u201D\u201E\u201F]/g, '"')
                    .replace(/[\u2013\u2014\u2015]/g, '-')
                    .replace(/[\u00A0\u2000-\u200A\u202F\u205F]/g, ' ')
                    .replace(/[\u200B-\u200D\uFEFF]/g, '')
                    .replace(/\u2026/g, '...')
                    .replace(/\u00AD/g, '')
                    .replace(/[\u20AC]/g, 'EUR')
                    .replace(/[\u00A3]/g, 'GBP')
                    .replace(/[\u00A5]/g, 'JPY')
                    .replace(/[\u00A9]/g, '(C)')
                    .replace(/[\u00AE]/g, '(R)')
                    .replace(/[\u2122]/g, '(TM)')
                    .replace(/[^\x00-\x7F]/g, '?');
            };
            
            const jsonString = sanitizeForPdf(JSON.stringify(parsedJsonData, null, 2));
            const lines = doc.splitTextToSize(jsonString, doc.internal.pageSize.width - 80);

            let y = 60;
            doc.setFontSize(9);
            doc.setTextColor(0, 0, 0);
            
            for (let i = 0; i < lines.length; i++) {
                if (y > doc.internal.pageSize.height - 40) {
                    doc.addPage();
                    y = 40;
                }
                doc.text(lines[i], 40, y);
                y += 11;
            }

            // Add page numbers
            if (addPageNumbers) {
                const totalPages = doc.internal.getNumberOfPages();
                for (let i = 1; i <= totalPages; i++) {
                    doc.setPage(i);
                    doc.setFontSize(8);
                    doc.setTextColor(128, 128, 128);
                    doc.text(`Page ${i} of ${totalPages}`, doc.internal.pageSize.width - 40, doc.internal.pageSize.height - 10, { align: 'right' });
                }
            }
        }

        const fileName = files[0].name.replace('.json', '.pdf');
        
        // Store generated PDF
        generatedPdfDoc = doc;
        generatedFileName = fileName;
        
        addToHistory({
            fileName: fileName,
            date: new Date().toLocaleString(),
            format: 'pdf',
            data: parsedJsonData,
            options: {
                pageSize: pageSize,
                orientation: orientation,
                addPageNumbers: addPageNumbers,
                outputFormat: outputFormat,
                nestingLevel: nestingLevel
            }
        });
        
        showStatus('Conversion complete! Click Download PDF.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your JSON has been successfully converted to PDF.',
            icon: 'success',
            confirmButtonText: 'Great!',
            timer: 1000,
            timerProgressBar: true
        });
        
    } catch (error) {
        console.error('PDF Generation Error:', error);
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

// Helper function to flatten JSON for autoTable
function flattenJsonToTable(json, level = 1) {
    let headers = new Set();
    let body = [];

    // Helper to get all unique keys from an object
    const getAllKeys = (obj, prefix = '', currentLevel = 1) => {
        let keys = [];
        for (const key in obj) {
            if (!obj.hasOwnProperty(key)) continue;
            const newKey = prefix ? `${prefix}.${key}` : key;
            const value = obj[key];
            
            if (value !== null && typeof value === 'object' && !Array.isArray(value) && currentLevel < level) {
                // Recursively get nested keys
                keys = keys.concat(getAllKeys(value, newKey, currentLevel + 1));
            } else {
                keys.push(newKey);
            }
        }
        return keys;
    };

    // Helper to sanitize text for PDF (handle special characters)
    const sanitizeForPdf = (text) => {
        if (text === null || text === undefined) return '';
        let str = String(text);
        // Replace common problematic Unicode characters with ASCII equivalents
        return str
            // Quotes
            .replace(/[\u2018\u2019\u201A\u201B]/g, "'")  // Various single quotes
            .replace(/[\u201C\u201D\u201E\u201F]/g, '"')  // Various double quotes
            // Dashes
            .replace(/[\u2013\u2014\u2015]/g, '-')  // En dash, em dash, horizontal bar
            // Spaces
            .replace(/[\u00A0\u2000-\u200A\u202F\u205F]/g, ' ')  // Various spaces
            .replace(/[\u200B-\u200D\uFEFF]/g, '')  // Zero-width characters
            // Other punctuation
            .replace(/\u2026/g, '...')         // Ellipsis
            .replace(/\u00AD/g, '')            // Soft hyphen
            // Common symbols
            .replace(/[\u20AC]/g, 'EUR')        // Euro sign
            .replace(/[\u00A3]/g, 'GBP')        // Pound sign
            .replace(/[\u00A5]/g, 'JPY')        // Yen sign
            .replace(/[\u00A9]/g, '(C)')        // Copyright
            .replace(/[\u00AE]/g, '(R)')        // Registered trademark
            .replace(/[\u2122]/g, '(TM)')       // Trademark
            // Remove any remaining non-ASCII characters except basic Latin
            .replace(/[^\x00-\x7F]/g, '?');     // Replace any other non-ASCII with ?
    };

    // Helper to get value at a key path
    const getValueAtPath = (obj, path) => {
        const parts = path.split('.');
        let value = obj;
        for (const part of parts) {
            if (value === null || value === undefined) return '';
            value = value[part];
        }
        
        if (value === null || value === undefined) return '';
        if (typeof value === 'object') return sanitizeForPdf(JSON.stringify(value));
        return sanitizeForPdf(String(value));
    };

    // Process the JSON data
    if (Array.isArray(json)) {
        // Get all unique headers from all items
        json.forEach(item => {
            if (item !== null && typeof item === 'object') {
                const keys = getAllKeys(item, '', 1);
                keys.forEach(key => headers.add(key));
            }
        });

        // Create rows
        json.forEach(item => {
            if (item !== null && typeof item === 'object') {
                const row = {};
                headers.forEach(header => {
                    row[header] = getValueAtPath(item, header);
                });
                body.push(row);
            } else {
                // Primitive in array
                headers.add('Value');
                body.push({ 'Value': String(item) });
            }
        });
    } else if (json !== null && typeof json === 'object') {
        // Single object
        const keys = getAllKeys(json, '', 1);
        keys.forEach(key => headers.add(key));
        
        const row = {};
        headers.forEach(header => {
            row[header] = getValueAtPath(json, header);
        });
        body.push(row);
    } else {
        // Single primitive
        headers.add('Value');
        body.push({ 'Value': String(json) });
    }

    // Convert to array format for autoTable
    const finalHeaders = Array.from(headers).map(h => sanitizeForPdf(h));
    const finalBody = body.map(row => {
        return finalHeaders.map(header => {
            const value = row[header] || '';
            return sanitizeForPdf(value);
        });
    });

    return { headers: finalHeaders, body: finalBody };
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

    localStorage.setItem('jsonConversionHistory', JSON.stringify(conversionHistory));
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
            localStorage.setItem('jsonConversionHistory', JSON.stringify(conversionHistory));
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

        if (item.options.outputFormat === 'table') {
            const { headers, body } = flattenJsonToTable(item.data, item.options.nestingLevel);
            if (headers.length === 0 || body.length === 0) {
                 showError('JSON data is not suitable for table format. Download not possible in this format.');
                 Swal.fire({
                    title: 'Download Error',
                    text: 'JSON data is not suitable for table format. Download not possible in this format.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
                return;
            }
            doc.autoTable({
                head: [headers],
                body: body,
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
        } else {
            const jsonString = JSON.stringify(item.data, null, 2);
            const lines = doc.splitTextToSize(jsonString, doc.internal.pageSize.width - 80);

            let y = 40;
            doc.setFontSize(10);
            for (let i = 0; i < lines.length; i++) {
                if (y > doc.internal.pageSize.height - 40) {
                    doc.addPage();
                    y = 40;
                    if (item.options.addPageNumbers) {
                        let str = "Page " + doc.internal.getNumberOfPages();
                        doc.setFontSize(8);
                        doc.text(str, doc.internal.pageSize.width - 40, doc.internal.pageSize.height - 10);
                    }
                    doc.setFontSize(10);
                }
                doc.text(lines[i], 40, y);
                y += 12;
            }

            if (item.options.addPageNumbers && !doc.internal.getNumberOfPages() > 0) {
                let str = "Page " + doc.internal.getNumberOfPages();
                doc.setFontSize(8);
                doc.text(str, doc.internal.pageSize.width - 40, doc.internal.pageSize.height - 10);
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

    // Display the historical data in the preview area as text
    displayPreview(item.data);
    
    showStatus(`Previewing ${item.fileName}`, 'info');
    
    // Scroll to preview area
    pdfPreviewContent.scrollIntoView({ behavior: 'smooth' });
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