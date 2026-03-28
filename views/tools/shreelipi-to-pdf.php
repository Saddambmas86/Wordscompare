<?php
// SEO and Page Metadata
$page_title = "Shreelipi to PDF Converter - Convert Shreelipi Fonts to PDF"; // You may Change the Title here
$page_description = "Convert Shreelipi text to PDF online for free. Transform Shreelipi font documents into PDF files instantly. Preserve Gujarati and other Indian language fonts."; // Put your Description here
$page_keywords = "shreelipi to pdf, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
                    <h1 class="h2">Shreelipi to PDF Converter <i class="fas fa-file-pdf text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Transform your Shreelipi text into professional and shareable PDF documents.</p>
                </header>

                <div id="inputArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-keyboard fa-3x text-muted mb-3"></i>
                    <h5 id="input-heading">Enter Your Shreelipi Text Here</h5>
                    <p class="text-muted mb-3">or paste from a file</p>
                    <textarea id="shreelipiText" class="form-control" rows="10" placeholder="Type or paste your Shreelipi text here..."></textarea>
                    <div id="charCount" class="mt-2 small text-muted text-end">0 characters</div>
                </div>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-cog me-2"></i>PDF Options</h5>
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
                                <label for="fontSize" class="form-label">Font Size</label>
                                <input type="number" id="fontSize" class="form-control" value="12" min="8" max="72">
                            </div>
                            <div class="col-md-6">
                                <label for="textAlign" class="form-label">Text Alignment</label>
                                <select id="textAlign" class="form-select">
                                    <option value="left" selected>Left</option>
                                    <option value="center">Center</option>
                                    <option value="right">Right</option>
                                    <option value="justify">Justify</option>
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
                        <i class="fas fa-exchange-alt me-2"></i> Convert to PDF
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                    <button class="btn btn-success btn-md px-2" id="downloadBtn" disabled>
                        <i class="fas fa-download me-2"></i> Download PDF
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="preview-area card mt-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>Text Preview</h5>
                        <span class="badge bg-info" id="charCountPreview"></span>
                    </div>
                    <div class="card-body">
                        <pre id="textPreview" class="text-break" style="white-space: pre-wrap; word-wrap: break-word;"></pre>
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
                <?php include '../../views/content/shreelipi-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>
<script>
// JavaScript for Shreelipi to PDF Converter
let conversionHistory = JSON.parse(localStorage.getItem('shreelipiConversionHistory')) || [];

// Initialize elements
const shreelipiTextarea = document.getElementById('shreelipiText');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const textPreview = document.getElementById('textPreview');
const charCountSpan = document.getElementById('charCount');
const charCountPreviewSpan = document.getElementById('charCountPreview');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

// Event Listeners
shreelipiTextarea.addEventListener('input', handleTextInput);
convertBtn.addEventListener('click', convertShreelipiToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to Shreelipi to PDF Converter',
        html: `Follow these steps to convert your Shreelipi text:<br><br>
        <ol class="text-start">
            <li>Type or paste your Shreelipi text into the input area.</li>
            <li>Choose your desired page size, orientation, font size, and text alignment.</li>
            <li>Click "Convert to PDF" to generate the PDF.</li>
            <li>Download your newly created PDF.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    shreelipiTextarea.value = '';
    handleTextInput(); // Update character counts and button states
    statusArea.textContent = '';
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('pageSize').value = 'A4';
    document.getElementById('orientation').value = 'portrait';
    document.getElementById('fontSize').value = '12';
    document.getElementById('textAlign').value = 'left';
    document.getElementById('addPageNumbers').checked = false;
}

// Text Input Handler
function handleTextInput() {
    const text = shreelipiTextarea.value;
    charCountSpan.textContent = `${text.length} characters`;
    charCountPreviewSpan.textContent = `Characters: ${text.length}`;
    textPreview.textContent = text;
    convertBtn.disabled = text.trim().length === 0;
    downloadBtn.disabled = true; // Disable download until new conversion
    showStatus('Enter text and click Convert.', 'info');
}

// Convert Shreelipi to PDF
async function convertShreelipiToPdf() {
    const shreelipiText = shreelipiTextarea.value.trim();
    if (shreelipiText.length === 0) {
        showError('Please enter some Shreelipi text to convert.');
        Swal.fire({
            title: 'No Text',
            text: 'Please enter some Shreelipi text to convert.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting Shreelipi text to PDF...', 'info');
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
        const fontSize = parseInt(document.getElementById('fontSize').value);
        const textAlign = document.getElementById('textAlign').value;
        const addPageNumbers = document.getElementById('addPageNumbers').checked;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        // --- IMPORTANT: FONT EMBEDDING FOR DEVANAGARI (SHREELIPI) ---
        // For correct rendering of Shreelipi (Devanagari script), you MUST
        // embed a Unicode font that supports Devanagari.
        // 1. Convert your chosen Devanagari font (e.g., NotoSansDevanagari-Regular.ttf)
        //    to a base64 string.
        // 2. Use jsPDF's `addFont` and `setFont` methods.
        //    Example (assuming 'NotoSansDevanagari' is your font name and you have a base64 string):
        //    doc.addFileToVFS('NotoSansDevanagari-Regular.ttf', 'YOUR_BASE64_FONT_STRING_HERE');
        //    doc.addFont('NotoSansDevanagari-Regular.ttf', 'NotoSansDevanagari', 'normal');
        //    doc.setFont('NotoSansDevanagari');
        // If no specific font is embedded, jsPDF will use its default font,
        // which may not correctly render Devanagari characters.
        // For demonstration, we will use a generic font. You would replace this:
        doc.setFont('helvetica'); // Fallback, replace with your Devanagari font

        doc.setFontSize(fontSize);

        const margin = 40; // pt
        const pageWidth = doc.internal.pageSize.getWidth();
        const lineHeight = fontSize * 1.2; // Adjust line height as needed

        const lines = doc.splitTextToSize(shreelipiText, pageWidth - 2 * margin);
        let y = margin + fontSize; // Initial Y position

        for (let i = 0; i < lines.length; i++) {
            let x;
            switch (textAlign) {
                case 'center':
                    x = pageWidth / 2;
                    break;
                case 'right':
                    x = pageWidth - margin;
                    break;
                case 'justify':
                    // jsPDF's default text method does not support justify easily.
                    // This would require manual word spacing calculation.
                    // For now, it will default to left if 'justify' is chosen.
                case 'left':
                default:
                    x = margin;
                    break;
            }

            if (y + lineHeight > doc.internal.pageSize.getHeight() - margin) {
                doc.addPage();
                y = margin + fontSize; // Reset Y for new page
                if (addPageNumbers) {
                    let pageNumStr = "Page " + (doc.internal.getNumberOfPages() - 1); // Previous page number
                    doc.setFontSize(8);
                    doc.text(pageNumStr, doc.internal.pageSize.width - margin, doc.internal.pageSize.height - 10, null, null, 'right');
                    doc.setFontSize(fontSize); // Restore font size
                }
            }

            doc.text(lines[i], x, y, { align: textAlign });
            y += lineHeight;
        }

        if (addPageNumbers) {
             let pageNumStr = "Page " + doc.internal.getNumberOfPages(); // Last page number
             doc.setFontSize(8);
             doc.text(pageNumStr, doc.internal.pageSize.width - margin, doc.internal.pageSize.height - 10, null, null, 'right');
        }

        const fileName = "shreelipi-document_" + Date.now() + ".pdf";
        
        // Add to history
        addToHistory({
            fileName: fileName,
            date: new Date().toLocaleString(),
            format: 'pdf',
            text: shreelipiText, // Store the raw text
            options: { // Store options needed for regeneration
                pageSize: pageSize,
                orientation: orientation,
                fontSize: fontSize,
                textAlign: textAlign,
                addPageNumbers: addPageNumbers
            }
        });
        
        showStatus('Conversion complete! Click Download PDF.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your Shreelipi text has been successfully converted to PDF.',
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
    const shreelipiText = shreelipiTextarea.value.trim();
    if (shreelipiText.length === 0) {
        showError('No PDF to download. Please convert text first.');
        Swal.fire({
            title: 'No Data',
            text: 'No PDF to download. Please convert text first.',
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
        const fontSize = parseInt(document.getElementById('fontSize').value);
        const textAlign = document.getElementById('textAlign').value;
        const addPageNumbers = document.getElementById('addPageNumbers').checked;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        doc.setFont('helvetica'); // Fallback, replace with your Devanagari font
        doc.setFontSize(fontSize);

        const margin = 40; // pt
        const pageWidth = doc.internal.pageSize.getWidth();
        const lineHeight = fontSize * 1.2;

        const lines = doc.splitTextToSize(shreelipiText, pageWidth - 2 * margin);
        let y = margin + fontSize;

        for (let i = 0; i < lines.length; i++) {
            let x;
            switch (textAlign) {
                case 'center':
                    x = pageWidth / 2;
                    break;
                case 'right':
                    x = pageWidth - margin;
                    break;
                case 'justify':
                case 'left':
                default:
                    x = margin;
                    break;
            }

            if (y + lineHeight > doc.internal.pageSize.getHeight() - margin) {
                doc.addPage();
                y = margin + fontSize;
                if (addPageNumbers) {
                    let pageNumStr = "Page " + (doc.internal.getNumberOfPages() - 1);
                    doc.setFontSize(8);
                    doc.text(pageNumStr, doc.internal.pageSize.width - margin, doc.internal.pageSize.height - 10, null, null, 'right');
                    doc.setFontSize(fontSize);
                }
            }
            doc.text(lines[i], x, y, { align: textAlign });
            y += lineHeight;
        }

        if (addPageNumbers) {
             let pageNumStr = "Page " + doc.internal.getNumberOfPages();
             doc.setFontSize(8);
             doc.text(pageNumStr, doc.internal.pageSize.width - margin, doc.internal.pageSize.height - 10, null, null, 'right');
        }

        const fileName = "shreelipi-document_" + Date.now() + ".pdf";
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
        text: item.text, // Store the raw text
        options: item.options // Store conversion options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('shreelipiConversionHistory', JSON.stringify(conversionHistory));
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
            localStorage.setItem('shreelipiConversionHistory', JSON.stringify(conversionHistory));
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

        doc.setFont('helvetica'); // Fallback, replace with your Devanagari font
        doc.setFontSize(item.options.fontSize);

        const margin = 40; // pt
        const pageWidth = doc.internal.pageSize.getWidth();
        const lineHeight = item.options.fontSize * 1.2;

        const lines = doc.splitTextToSize(item.text, pageWidth - 2 * margin);
        let y = margin + item.options.fontSize;

        for (let i = 0; i < lines.length; i++) {
            let x;
            switch (item.options.textAlign) {
                case 'center':
                    x = pageWidth / 2;
                    break;
                case 'right':
                    x = pageWidth - margin;
                    break;
                case 'justify':
                case 'left':
                default:
                    x = margin;
                    break;
            }

            if (y + lineHeight > doc.internal.pageSize.getHeight() - margin) {
                doc.addPage();
                y = margin + item.options.fontSize;
                if (item.options.addPageNumbers) {
                    let pageNumStr = "Page " + (doc.internal.getNumberOfPages() - 1);
                    doc.setFontSize(8);
                    doc.text(pageNumStr, doc.internal.pageSize.width - margin, doc.internal.pageSize.height - 10, null, null, 'right');
                    doc.setFontSize(item.options.fontSize);
                }
            }
            doc.text(lines[i], x, y, { align: item.options.textAlign });
            y += lineHeight;
        }

        if (item.options.addPageNumbers) {
             let pageNumStr = "Page " + doc.internal.getNumberOfPages();
             doc.setFontSize(8);
             doc.text(pageNumStr, doc.internal.pageSize.width - margin, doc.internal.pageSize.height - 10, null, null, 'right');
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

    shreelipiTextarea.value = item.text;
    document.getElementById('pageSize').value = item.options.pageSize;
    document.getElementById('orientation').value = item.options.orientation;
    document.getElementById('fontSize').value = item.options.fontSize;
    document.getElementById('textAlign').value = item.options.textAlign;
    document.getElementById('addPageNumbers').checked = item.options.addPageNumbers;
    
    handleTextInput(); // Update preview and button states based on loaded text

    showStatus(`Previewing ${item.fileName}`, 'info');
    
    // Scroll to input area
    shreelipiTextarea.scrollIntoView({ behavior: 'smooth' });
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