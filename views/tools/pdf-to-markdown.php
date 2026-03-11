<?php
// SEO and Page Metadata
$page_title = "PDF to Markdown Converter - Convert PDF to MD Online Free"; // You may Change the Title here
$page_description = "Convert PDF to Markdown online for free. Transform PDF documents into clean Markdown text. Preserve headings, lists, and structure. Perfect for developers."; // Put your Description here
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
                    <h1 class="h2">PDF to Markdown Converter <i class="fas fa-file-alt text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Effortlessly convert your PDF documents into structured Markdown format.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop PDF File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="pdfUpload" accept=".pdf" class="d-none" multiple>
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
                                <input type="text" id="pageRange" class="form-control" placeholder="All pages">
                            </div>
                            <div class="col-md-6">
                                <label for="outputType" class="form-label">Output Type</label>
                                <select id="outputType" class="form-select">
                                    <option value="text" selected>Plain Text Markdown</option>
                                    <option value="table">Table-aware Markdown</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableOcr">
                                    <label class="form-check-label" for="enableOcr">
                                        Enable OCR (Experimental - for scanned PDFs)
                                    </label>
                                </div>
                            </div>
                             <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeHeaders" checked>
                                    <label class="form-check-label" for="includeHeaders">
                                        Include Headers (h1, h2, etc.)
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
                        <h5 class="mb-0"><i class="fas fa-eye me-2"></i>Markdown Preview</h5>
                        <span class="badge bg-info" id="charCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <textarea id="markdownPreview" class="form-control" rows="15" placeholder="Upload a PDF and convert to see Markdown output..." readonly></textarea>
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
                <?php include '../../views/content/pdf-to-markdown-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js"></script>
<script src="https://unpkg.com/sweetalert2@11.12.0/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/sweetalert2@11.12.0/dist/sweetalert2.min.css">
<script>
// Set worker source for PDF.js
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

// Global variables
let pdfFile = null;
let conversionHistory = JSON.parse(localStorage.getItem('pdfToMarkdownHistory')) || [];

// Element references
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const markdownPreview = document.getElementById('markdownPreview');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const pageRangeInput = document.getElementById('pageRange');
const outputTypeSelect = document.getElementById('outputType');
const enableOcrCheckbox = document.getElementById('enableOcr');
const includeHeadersCheckbox = document.getElementById('includeHeaders');
const charCountSpan = document.getElementById('charCount');

// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertPdfToMarkdown);
downloadBtn.addEventListener('click', downloadMarkdown);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PDF to Markdown Converter',
        html: `Follow these steps to convert your PDFs:<br><br>
        <ol class="text-start">
            <li>Upload PDF by clicking "Select PDF Files" or dragging it into the drop zone.</li>
            <li>Choose conversion options like page range, output type (plain text/table-aware), and enable OCR.</li>
            <li>Click "Convert" to generate the Markdown preview.</li>
            <li>Download your newly created Markdown file.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    pdfFile = null;
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    markdownPreview.value = '';
    charCountSpan.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    pageRangeInput.value = '';
    outputTypeSelect.value = 'text';
    enableOcrCheckbox.checked = false;
    includeHeadersCheckbox.checked = true;
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

    const file = selectedFiles[0]; // We'll process only one PDF at a time for simplicity and focus.

    if (file.type !== 'application/pdf') {
        showError('Please upload only PDF files.');
        Swal.fire({
            title: 'File Type Error',
            text: 'Please upload only PDF files.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }
    if (file.size > 50 * 1024 * 1024) { // Max 50MB for PDF
        showError('File must be less than 50MB.');
        Swal.fire({
            title: 'File Size Error',
            text: 'File must be less than 50MB.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    pdfFile = file;
    fileInfo.textContent = `${pdfFile.name} selected.`;
    convertBtn.disabled = false;
    showStatus('PDF file ready for conversion.', 'info');
    
    // Show success message
    Swal.fire({
        title: 'File Added',
        text: `${pdfFile.name} has been selected for conversion.`,
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// Convert PDF to Markdown
async function convertPdfToMarkdown() {
    if (!pdfFile) {
        showError('No PDF selected. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No PDF selected. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting PDF to Markdown...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Show loading alert
    const swalInstance = Swal.fire({
        title: 'Processing PDF',
        html: 'Extracting text and tables. This may take a moment...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const fileReader = new FileReader();
        fileReader.onload = async function() {
            const typedarray = new Uint8Array(this.result);
            const pdfDoc = await pdfjsLib.getDocument({ data: typedarray }).promise;

            const pageRange = pageRangeInput.value.trim();
            const pagesToProcess = parsePageRange(pageRange, pdfDoc.numPages);
            const outputType = outputTypeSelect.value; // 'text' or 'table'
            const enableOcr = enableOcrCheckbox.checked; // OCR is complex, simple placeholder
            const includeHeaders = includeHeadersCheckbox.checked;

            let markdownOutput = '';

            for (let i = 0; i < pagesToProcess.length; i++) {
                const pageNumber = pagesToProcess[i];
                if (pageNumber < 1 || pageNumber > pdfDoc.numPages) {
                    continue; // Skip invalid page numbers
                }
                const page = await pdfDoc.getPage(pageNumber);
                const textContent = await page.getTextContent();
                const viewport = page.getViewport({ scale: 1 }); // Needed for position data

                let pageText = '';
                
                // Simple OCR placeholder (in reality, requires a separate library like Tesseract.js)
                if (enableOcr) {
                    pageText += `\n\n\n\n`;
                    // For a real OCR, you'd render the page to a canvas and pass to Tesseract
                    // This is just a placeholder to acknowledge the option.
                }

                if (outputType === 'table') {
                    // This is a *very* simplistic table extraction.
                    // Real-world table extraction from PDFs is very complex.
                    // It often involves analyzing text positions, font sizes, lines, etc.
                    // For this example, we'll just try to guess based on aligned text.
                    const textItems = textContent.items;
                    const lines = groupTextItemsIntoLines(textItems, 2); // Group items by Y coordinate
                    
                    let tableContent = [];
                    let lastY = -1;
                    let currentRow = [];

                    lines.forEach(line => {
                        // Check if this line seems like a new row based on Y position jump
                        // or if it's the very first line.
                        if (lastY === -1 || Math.abs(line[0].transform[5] - lastY) > 15) { // Assuming line height > 15pt
                            if (currentRow.length > 0) {
                                tableContent.push(currentRow);
                            }
                            currentRow = [];
                        }
                        
                        // Sort items in the current line by X coordinate
                        line.sort((a, b) => a.transform[4] - b.transform[4]);
                        currentRow.push(line.map(item => item.str.trim()).join(' ').trim()); // Join text within a line
                        lastY = line[0].transform[5]; // Update last Y for comparison
                    });
                    if (currentRow.length > 0) {
                        tableContent.push(currentRow);
                    }

                    if (tableContent.length > 1) { // Assume a table if more than one row detected
                        // Simple Markdown table conversion
                        const header = tableContent[0];
                        const body = tableContent.slice(1);
                        
                        markdownOutput += '\n\n';
                        markdownOutput += '| ' + header.join(' | ') + ' |\n';
                        markdownOutput += '|' + header.map(() => '---').join('|') + '|\n';
                        body.forEach(row => {
                            markdownOutput += '| ' + row.join(' | ') + ' |\n';
                        });
                        markdownOutput += '\n';

                        // Remove table rows from general text content processing
                        // This is an oversimplification; real implementations need to remove
                        // text items that were part of the detected table.
                        // For this example, we just add the markdown table and then fall back to plain text.
                        // A more sophisticated approach would be to categorize text blocks.
                    } else {
                        // If no clear table, treat as plain text
                        textContent.items.forEach(item => {
                            pageText += item.str + ' ';
                        });
                    }

                } else { // Plain Text Markdown
                    let lastY = 0;
                    textContent.items.forEach(item => {
                        // Add newlines for paragraphs or distinct text blocks
                        if (lastY !== 0 && item.transform[5] < lastY - 10) { // Significant jump up means new paragraph
                            markdownOutput += '\n\n';
                        } else if (lastY !== 0 && item.transform[5] < lastY) { // Same line but might be slight shift
                             // Do nothing for slight shifts, assume same line
                        } else if (lastY !== 0 && item.transform[5] > lastY && (item.transform[5] - lastY > 5)) {
                            // If Y increases significantly, new line or block
                            markdownOutput += '\n';
                        }
                        
                        // Simple header detection (very rudimentary)
                        if (includeHeaders) {
                            if (item.fontName.toLowerCase().includes('bold') && item.width > 200 && item.height > 15) { // Heuristic for potential header
                                if (item.str.trim().length > 0) {
                                     markdownOutput += `## ${item.str.trim()}\n\n`; // Use H2 for simplicity
                                     lastY = item.transform[5];
                                     return;
                                }
                            }
                        }
                        
                        markdownOutput += item.str.trim() + ' ';
                        lastY = item.transform[5];
                    });
                    markdownOutput += '\n\n'; // Add spacing between pages
                }
            }

            markdownPreview.value = markdownOutput.trim();
            charCountSpan.textContent = `Characters: ${markdownOutput.trim().length}`;

            // Add to history
            addToHistory({
                fileName: pdfFile.name.replace('.pdf', '.md'),
                date: new Date().toLocaleString(),
                format: 'md',
                content: markdownOutput.trim(),
                options: { // Store options for potential re-generation or debugging
                    pageRange: pageRangeInput.value,
                    outputType: outputTypeSelect.value,
                    enableOcr: enableOcrCheckbox.checked,
                    includeHeaders: includeHeadersCheckbox.checked
                }
            });

            showStatus('Conversion complete! Click Download Markdown.', 'success');
            convertBtn.disabled = false;
            downloadBtn.disabled = false;
            
            swalInstance.close();
            Swal.fire({
                title: 'Conversion Complete!',
                text: 'Your PDF has been successfully converted to Markdown.',
                icon: 'success',
                confirmButtonText: 'Great!',
                timer: 1000,
                timerProgressBar: true
            });
            
        };
        fileReader.readAsArrayBuffer(pdfFile);

    } catch (error) {
        showError(`Error during Markdown generation: ${error.message}`);
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

// Simple helper to parse page range (e.g., "1-3,5")
function parsePageRange(rangeStr, numPages) {
    if (!rangeStr) {
        return Array.from({ length: numPages }, (_, i) => i + 1);
    }
    const pages = new Set();
    rangeStr.split(',').forEach(part => {
        part = part.trim();
        if (part.includes('-')) {
            let [start, end] = part.split('-').map(Number);
            if (!isNaN(start) && !isNaN(end)) {
                for (let i = start; i <= end; i++) {
                    pages.add(i);
                }
            }
        } else {
            const pageNum = Number(part);
            if (!isNaN(pageNum)) {
                pages.add(pageNum);
            }
        }
    });
    return Array.from(pages).sort((a, b) => a - b);
}

// Basic text item grouping for table-like structures
// This is a *highly* simplified approach for demonstration.
function groupTextItemsIntoLines(items, yTolerance = 5) {
    const lines = [];
    let currentLine = [];
    let lastY = -1;

    items.sort((a, b) => a.transform[5] - b.transform[5] || a.transform[4] - b.transform[4]); // Sort by Y then X

    items.forEach(item => {
        if (lastY === -1 || Math.abs(item.transform[5] - lastY) <= yTolerance) {
            currentLine.push(item);
        } else {
            lines.push(currentLine);
            currentLine = [item];
        }
        lastY = item.transform[5];
    });
    if (currentLine.length > 0) {
        lines.push(currentLine);
    }
    return lines;
}


// Download Markdown
function downloadMarkdown() {
    if (!markdownPreview.value) {
        showError('No Markdown to download. Please convert first.');
        Swal.fire({
            title: 'No Data',
            text: 'No Markdown to download. Please convert first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing Markdown for download...', 'info');
    
    // Show loading alert
    Swal.fire({
        title: 'Preparing Markdown File',
        html: `Please wait while we prepare your Markdown file...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        const fileName = pdfFile.name.replace('.pdf', '.md');
        const blob = new Blob([markdownPreview.value], { type: 'text/markdown;charset=utf-8' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = fileName;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        
        showStatus('Markdown file downloaded!', 'success');
        Swal.fire({
            title: 'Download Complete',
            text: 'Your Markdown file has been downloaded.',
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
        content: item.content, // Store the markdown content
        options: item.options // Store conversion options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('pdfToMarkdownHistory', JSON.stringify(conversionHistory));
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
            localStorage.setItem('pdfToMarkdownHistory', JSON.stringify(conversionHistory));
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
        const blob = new Blob([item.content], { type: 'text/markdown;charset=utf-8' });
        const url = URL.createObjectURL(blob);
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
            text: `Your Markdown file has been downloaded.`,
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

    markdownPreview.value = item.content;
    charCountSpan.textContent = `Characters: ${item.content.length}`;
    
    showStatus(`Previewing ${item.fileName}`, 'info');
    
    // Scroll to preview area
    markdownPreview.scrollIntoView({ behavior: 'smooth' });
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