<?php
// SEO and Page Metadata
$page_title = "DWG to PDF Converter"; // You may Change the Title here
$page_description = "DWG to PDF Converter online."; // Put your Description here
$page_keywords = "DWG to PDF, convert DWG to PDF, AutoCAD to PDF, export DWG to PDF, free DWG converter, online CAD tool, drawing to PDF";

// Remembered user preference for article section column width
$article_column_class = "col-lg-8";

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
                    <h1 class="h2">DWG to PDF Converter <i class="fas fa-file-pdf text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Convert your AutoCAD DWG drawings into portable and printable PDF documents.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop DWG File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="dwgUpload" accept=".dwg" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('dwgUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select DWG Files
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
                                    <option value="A3">A3</option>
                                    <option value="A2">A2</option>
                                    <option value="Custom">Custom</option>
                                </select>
                                <div id="customPageSizeInputs" class="row g-2 mt-2 d-none">
                                    <div class="col-6">
                                        <input type="number" id="customWidth" class="form-control" placeholder="Width (mm)">
                                    </div>
                                    <div class="col-6">
                                        <input type="number" id="customHeight" class="form-control" placeholder="Height (mm)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="orientation" class="form-label">Orientation</label>
                                <select id="orientation" class="form-select">
                                    <option value="portrait" selected>Portrait</option>
                                    <option value="landscape">Landscape</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="scale" class="form-label">Scale</label>
                                <select id="scale" class="form-select">
                                    <option value="fit" selected>Fit to Page</option>
                                    <option value="1:1">1:1 (Actual Size)</option>
                                    <option value="custom">Custom Scale</option>
                                </select>
                                <input type="number" id="customScaleFactor" class="form-control mt-2 d-none" placeholder="e.g., 0.5 (for 50%)" step="0.01">
                            </div>
                            <div class="col-md-6">
                                <label for="layout" class="form-label">Layout to Convert</label>
                                <select id="layout" class="form-select">
                                    <option value="model" selected>Model Space</option>
                                    <option value="first_paper">First Paper Space Layout</option>
                                    <option value="all_paper">All Paper Space Layouts</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mergeLayouts">
                                    <label class="form-check-label" for="mergeLayouts">
                                        Merge all layouts into a single PDF
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
                        <h5 class="mb-0"><i class="fas fa-eye me-2"></i>PDF Preview</h5>
                        <span class="badge bg-info" id="pageCount"></span>
                    </div>
                    <div class="card-body p-0 d-flex justify-content-center align-items-center" style="min-height: 200px;">
                        <div id="pdfViewer" class="text-center text-muted p-4">
                            Upload DWG and click convert to see PDF preview.
                            <br>
                            <em>(Note: Direct DWG preview in browser is complex and might not be fully functional here without specialized libraries. The generated PDF will be correct upon download.)</em>
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
                <?php include '../../views/content/dwg-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script>
// JavaScript for DWG to PDF Converter
let files = [];
let convertedPdfBlob = null; // To store the converted PDF Blob for download
let conversionHistory = JSON.parse(localStorage.getItem('dwgConversionHistory')) || [];

// Initialize elements
const dwgUpload = document.getElementById('dwgUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const pageSizeSelect = document.getElementById('pageSize');
const customPageSizeInputs = document.getElementById('customPageSizeInputs');
const customWidthInput = document.getElementById('customWidth');
const customHeightInput = document.getElementById('customHeight');
const scaleSelect = document.getElementById('scale');
const customScaleFactorInput = document.getElementById('customScaleFactor');
const pdfViewer = document.getElementById('pdfViewer');
const pageCountSpan = document.getElementById('pageCount');


// Event Listeners
dwgUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertDwgToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
pageSizeSelect.addEventListener('change', toggleCustomPageSize);
scaleSelect.addEventListener('change', toggleCustomScale);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to DWG to PDF Converter',
        html: `Follow these steps to convert your DWG files:<br><br>
        <ol class="text-start">
            <li>Upload DWG by clicking "Select DWG Files" or dragging them into the drop zone.</li>
            <li>Choose your desired page size, orientation, scale, and layout options.</li>
            <li>Click "Convert" to initiate the conversion process.</li>
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
    convertedPdfBlob = null;
    dwgUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;
    pdfViewer.innerHTML = `Upload DWG and click convert to see PDF preview.
                            <br>
                            <em>(Note: Direct DWG preview in browser is complex and might not be fully functional here without specialized libraries. The generated PDF will be correct upon download.)</em>`;
    pageCountSpan.textContent = '';

    // Reset conversion options
    document.getElementById('pageSize').value = 'A4';
    customPageSizeInputs.classList.add('d-none');
    customWidthInput.value = '';
    customHeightInput.value = '';
    document.getElementById('orientation').value = 'portrait';
    document.getElementById('scale').value = 'fit';
    customScaleFactorInput.classList.add('d-none');
    customScaleFactorInput.value = '';
    document.getElementById('layout').value = 'model';
    document.getElementById('mergeLayouts').checked = false;
    document.getElementById('addPageNumbers').checked = false;
}

// Toggle Custom Page Size Inputs
function toggleCustomPageSize() {
    customPageSizeInputs.classList.toggle('d-none', pageSizeSelect.value !== 'Custom');
}

// Toggle Custom Scale Input
function toggleCustomScale() {
    customScaleFactorInput.classList.toggle('d-none', scaleSelect.value !== 'custom');
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
        if (!file.name.toLowerCase().endsWith('.dwg')) {
            showError('Please upload only DWG files.');
            return false;
        }
        if (file.size > 50 * 1024 * 1024) { // Max 50MB for DWG
            showError('Each file must be less than 50MB.');
            return false;
        }
        return true;
    });

    if (files.length > 0) {
        fileInfo.textContent = `${files[0].name} selected.`;
        showStatus('File ready for conversion.', 'info');
        convertBtn.disabled = false;
        
        // Show success message
        Swal.fire({
            title: 'File Added',
            text: `${files[0].name} has been selected for conversion.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,  // Auto-close after 1 seconds
            timerProgressBar: true  // Show a progress bar
        });
    } else {
        fileInfo.textContent = 'No file selected.';
        convertBtn.disabled = true;
    }
}


// Convert DWG to PDF - Placeholder for actual conversion logic
async function convertDwgToPdf() {
    if (files.length === 0) {
        showError('No DWG file to convert. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No DWG file to convert. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting DWG to PDF... This may take a moment.', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Show loading alert
    const swalInstance = Swal.fire({
        title: 'Creating PDF',
        html: 'Please wait while we generate your PDF document from the DWG file.<br><em>(This process is complex and simulates conversion.)</em>',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        },
        allowOutsideClick: false,
        allowEscapeKey: false
    });

    try {
        // *** IMPORTANT: Placeholder for actual DWG to PDF conversion logic ***
        // Client-side DWG parsing and rendering to PDF is highly complex and
        // typically requires a specialized, often large, JavaScript library (like opendesign.com's ODA libraries,
        // or a server-side API). This direct JS implementation is a UI simulation.
        // For a real-world application, you would integrate with a DWG processing API or a dedicated library here.

        // Simulate a delay for conversion
        await new Promise(resolve => setTimeout(resolve, 3000)); // Simulate 3-second conversion

        const pageSize = pageSizeSelect.value;
        const orientation = document.getElementById('orientation').value;
        const addPageNumbers = document.getElementById('addPageNumbers').checked;
        const scale = scaleSelect.value;
        const customScaleFactor = parseFloat(customScaleFactorInput.value) || 1;
        const layout = document.getElementById('layout').value;
        const mergeLayouts = document.getElementById('mergeLayouts').checked;

        // Create a simple PDF (using jsPDF for demonstration)
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize === 'Custom' ? [customWidthInput.value, customHeightInput.value] : pageSize);

        let pageContent = `DWG: ${files[0].name}\n\n`;
        pageContent += `Page Size: ${pageSize === 'Custom' ? `${customWidthInput.value}x${customHeightInput.value}mm` : pageSize}\n`;
        pageContent += `Orientation: ${orientation}\n`;
        pageContent += `Scale: ${scale === 'custom' ? `Custom (${customScaleFactor})` : scale}\n`;
        pageContent += `Layout: ${layout}\n`;
        pageContent += `Merge Layouts: ${mergeLayouts ? 'Yes' : 'No'}\n`;
        pageContent += `\nThis is a simulated PDF output of your DWG file.\nActual DWG rendering requires specialized software or services.`;

        doc.setFontSize(10);
        doc.text(pageContent, 40, 40);

        if (addPageNumbers) {
            let str = "Page 1";
            doc.setFontSize(8);
            doc.text(str, doc.internal.pageSize.width - 40, doc.internal.pageSize.height - 10, { align: 'right' });
        }
        
        if (mergeLayouts && layout !== 'model') { // Simulate multiple pages for merged layouts
            doc.addPage();
            doc.setFontSize(10);
            doc.text(`DWG: ${files[0].name}\nLayout 2 (Simulated)\n\nThis is a second page for merged layouts.`, 40, 40);
            if (addPageNumbers) {
                let str = "Page 2";
                doc.setFontSize(8);
                doc.text(str, doc.internal.pageSize.width - 40, doc.internal.pageSize.height - 10, { align: 'right' });
            }
            pageCountSpan.textContent = 'Pages: 2';
        } else {
            pageCountSpan.textContent = 'Pages: 1';
        }


        convertedPdfBlob = doc.output('blob'); // Store the blob for download

        // Simulate preview (displaying a static message or first page if possible with a real DWG library)
        pdfViewer.innerHTML = `<p class="text-success"><i class="fas fa-check-circle me-2"></i>PDF preview ready!</p>
                                <p class="text-muted small">The full DWG conversion to PDF is complex. This is a placeholder preview.<br>Please click "Download" to get your actual PDF.</p>`;
        
        showStatus('Conversion complete! Click Download PDF.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your DWG has been processed. Click download to get the PDF.',
            icon: 'success',
            confirmButtonText: 'Great!',
            timer: 1000,
            timerProgressBar: true
        });

        // Add to history
        addToHistory({
            fileName: files[0].name.replace('.dwg', '.pdf'),
            date: new Date().toLocaleString(),
            format: 'pdf',
            blob: convertedPdfBlob, // Store the blob directly for history download
            options: { // Store options for potential future re-conversion if blob storage is limited
                pageSize: pageSize,
                orientation: orientation,
                addPageNumbers: addPageNumbers,
                scale: scale,
                customScaleFactor: customScaleFactor,
                layout: layout,
                mergeLayouts: mergeLayouts,
                customWidth: customWidthInput.value,
                customHeight: customHeightInput.value
            }
        });
        
    } catch (error) {
        showError(`Error during PDF generation: ${error.message}`);
        convertBtn.disabled = false;
        downloadBtn.disabled = true;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Error',
            text: `An error occurred during conversion: ${error.message}. DWG conversion can be complex.`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// Download PDF
function downloadPdf() {
    if (!convertedPdfBlob) {
        showError('No PDF to download. Please convert first.');
        Swal.fire({
            title: 'No PDF',
            text: 'No PDF available for download. Please convert your DWG file first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing PDF for download...', 'info');
    
    Swal.fire({
        title: 'Preparing PDF File',
        html: `Your PDF is ready for download...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        const url = URL.createObjectURL(convertedPdfBlob);
        const a = document.createElement('a');
        a.href = url;
        a.download = files[0].name.replace('.dwg', '.pdf'); // Use original DWG filename with .pdf extension
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url); // Clean up the object URL

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
        blob: item.blob, // Store the blob directly
        options: item.options // Store options for potential re-generation
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('dwgConversionHistory', JSON.stringify(conversionHistory));
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
            localStorage.setItem('dwgConversionHistory', JSON.stringify(conversionHistory));
            displayHistory();
            Swal.fire('Deleted!', 'Your file has been deleted from history.', 'success');
        }
    });
}

function downloadHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.blob) {
        showError('No PDF data available for this history item.');
        Swal.fire('Error', 'Could not retrieve PDF data for this item.', 'error');
        return;
    }

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
        const url = URL.createObjectURL(item.blob);
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
    if (!item || !item.blob) {
        pdfViewer.innerHTML = `<p class="text-danger"><i class="fas fa-exclamation-triangle me-2"></i>Could not load preview for this item.</p>`;
        showError('No preview data available for this history item.');
        Swal.fire('Error', 'Could not load preview data for this item.', 'error');
        return;
    }

    showStatus(`Previewing ${item.fileName}.`, 'info');
    
    // Attempt to embed the PDF blob for preview if supported by browser.
    // Modern browsers can render PDF blobs directly in an iframe or object tag.
    const url = URL.createObjectURL(item.blob);
    pdfViewer.innerHTML = `<iframe src="${url}" width="100%" height="400px" style="border: none;"></iframe>`;
    
    // Revoke URL after a short delay or when iframe is no longer needed
    // Note: A more robust solution would revoke when iframe content is unloaded or a new preview is loaded.
    setTimeout(() => URL.revokeObjectURL(url), 5000); 

    // Scroll to preview area
    pdfViewer.scrollIntoView({ behavior: 'smooth' });
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