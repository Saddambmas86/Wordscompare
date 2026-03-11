<?php
// SEO and Page Metadata
$page_title = "PDF OCR - Extract Text from Scanned PDF Online Free"; // You may Change the Title here
$page_description = "PDF OCR converter online for free. Extract and recognize text from scanned PDFs using Optical Character Recognition. Convert image PDFs to searchable text."; // Put your Description here
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
                    <h1 class="h2">PDF to OCR Converter <i class="fas fa-text-width text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Extract text from scanned PDFs and images, making them searchable and editable.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-file-pdf fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop PDF File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="pdfUpload" accept="application/pdf" class="d-none">
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('pdfUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select PDF File
                    </button>
                    <div id="fileInfo" class="mt-3 small text-muted">No file selected.</div>
                </div>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-cog me-2"></i>OCR Options</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="ocrLanguage" class="form-label">OCR Language</label>
                                <select id="ocrLanguage" class="form-select">
                                    <option value="eng" selected>English</option>
                                    <option value="deu">German</option>
                                    <option value="fra">French</option>
                                    <option value="spa">Spanish</option>
                                    <option value="ita">Italian</option>
                                    <option value="nld">Dutch</option>
                                    <option value="por">Portuguese</option>
                                    <option value="rus">Russian</option>
                                    <option value="ara">Arabic</option>
                                    <option value="jpn">Japanese</option>
                                    <option value="kor">Korean</option>
                                    <option value="chi_sim">Chinese (Simplified)</option>
                                    <option value="chi_tra">Chinese (Traditional)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="outputFormat" class="form-label">Output Format</label>
                                <select id="outputFormat" class="form-select">
                                    <option value="text" selected>Plain Text (.txt)</option>
                                    <option value="searchable_pdf">Searchable PDF</option>
                                    <option value="hocr">hOCR (.html)</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="pageRange" class="form-label">Page Range (e.g., 1-3,5)</label>
                                <input type="text" id="pageRange" class="form-control" placeholder="Leave empty for all pages">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="convertBtn" disabled>
                        <i class="fas fa-search me-2"></i> Start OCR
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
                <div id="progressArea" class="mb-3" style="display: none;">
                    <div class="progress">
                        <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small class="text-muted" id="progressText"></small>
                </div>

                <div class="preview-area card mt-4" id="ocrPreviewCard" style="display: none;">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>OCR Result Preview</h5>
                    </div>
                    <div class="card-body">
                        <textarea id="ocrTextResult" class="form-control" rows="10" readonly></textarea>
                        <div id="pdfViewer" style="height: 500px; display: none;"></div>
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
                <?php include '../../views/content/pdf-to-ocr-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src='https://cdn.jsdelivr.net/npm/tesseract.js@5/dist/tesseract.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>

<script>
// Set up PDF.js worker source
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.min.js';

let file = null;
let ocrResultText = '';
let ocrResultPdfBlob = null;
let conversionHistory = JSON.parse(localStorage.getItem('ocrConversionHistory')) || [];

// Initialize elements
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');
const progressBar = document.getElementById('progressBar');
const progressArea = document.getElementById('progressArea');
const progressText = document.getElementById('progressText');
const ocrTextResult = document.getElementById('ocrTextResult');
const pdfViewer = document.getElementById('pdfViewer');
const ocrPreviewCard = document.getElementById('ocrPreviewCard');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', startOcrConversion);
downloadBtn.addEventListener('click', downloadOcrResult);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PDF to OCR Converter',
        html: `Follow these steps to convert your PDFs:<br><br>
        <ol class="text-start">
            <li>Upload a PDF by clicking "Select PDF File" or dragging it into the drop zone.</li>
            <li>Choose your OCR language and preferred output format (Plain Text, Searchable PDF, hOCR).</li>
            <li>Click "Start OCR" to begin the recognition process.</li>
            <li>Once complete, preview the result and download your new searchable document.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    file = null;
    ocrResultText = '';
    ocrResultPdfBlob = null;
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    ocrTextResult.value = '';
    ocrPreviewCard.style.display = 'none';
    pdfViewer.style.display = 'none';
    statusArea.textContent = '';
    progressArea.style.display = 'none';
    progressBar.style.width = '0%';
    progressText.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset options
    document.getElementById('ocrLanguage').value = 'eng';
    document.getElementById('outputFormat').value = 'text';
    document.getElementById('pageRange').value = '';
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

    const selectedFile = selectedFiles[0];
    if (selectedFile.type !== 'application/pdf') {
        showError('Please upload only PDF files.');
        Swal.fire({
            title: 'Invalid File Type',
            text: 'Please upload only PDF files.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        file = null;
        convertBtn.disabled = true;
        return;
    }
    if (selectedFile.size > 50 * 1024 * 1024) { // Max 50MB for OCR PDF
        showError('File must be less than 50MB.');
        Swal.fire({
            title: 'File Too Large',
            text: 'The selected PDF file is too large. Please select a file smaller than 50MB.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        file = null;
        convertBtn.disabled = true;
        return;
    }

    file = selectedFile;
    fileInfo.textContent = `${file.name} selected.`;
    convertBtn.disabled = false;
    showStatus('PDF file ready for OCR.', 'info');
    
    Swal.fire({
        title: 'File Added',
        text: `${file.name} has been selected for OCR.`,
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// Start OCR Conversion
async function startOcrConversion() {
    if (!file) {
        showError('No PDF file selected for OCR.');
        Swal.fire({
            title: 'No File',
            text: 'Please select a PDF file before starting OCR.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Starting OCR process...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;
    progressArea.style.display = 'block';
    ocrPreviewCard.style.display = 'none';
    ocrTextResult.value = '';
    pdfViewer.style.display = 'none';

    const lang = document.getElementById('ocrLanguage').value;
    const outputFormat = document.getElementById('outputFormat').value;
    const pageRangeInput = document.getElementById('pageRange').value;
    let pages = [];

    if (pageRangeInput) {
        pages = parsePageRange(pageRangeInput);
    }

    const worker = await Tesseract.createWorker(lang, 1, {
        logger: m => {
            if (m.status === 'recognizing text') {
                const percent = Math.round(m.progress * 100);
                progressBar.style.width = `${percent}%`;
                progressText.textContent = `Progress: ${percent}% (${m.status})`;
            } else {
                progressText.textContent = `Status: ${m.status}`;
            }
        }
    });

    try {
        if (outputFormat === 'searchable_pdf') {
            await worker.setParameters({
                tessedit_create_pdf: '1',
                tessedit_pdf_set_filename: file.name.replace('.pdf', '_ocr.pdf')
            });
        }

        const pdfData = new Uint8Array(await file.arrayBuffer());
        const loadingTask = pdfjsLib.getDocument({ data: pdfData });
        const pdf = await loadingTask.promise;

        let combinedText = '';
        const imagesToOcr = [];

        for (let i = 1; i <= pdf.numPages; i++) {
            if (pages.length > 0 && !pages.includes(i)) {
                continue;
            }

            const page = await pdf.getPage(i);
            const viewport = page.getViewport({ scale: 2.0 }); // Scale up for better OCR
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            await page.render({ canvasContext: context, viewport: viewport }).promise;
            imagesToOcr.push(canvas.toDataURL('image/png'));
        }

        if (imagesToOcr.length === 0) {
            showError('No pages found for OCR within the specified range.');
            Swal.fire({
                title: 'No Pages',
                text: 'No pages found for OCR within the specified range. Please check your page range input.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            convertBtn.disabled = false;
            progressArea.style.display = 'none';
            await worker.terminate();
            return;
        }

        if (outputFormat === 'searchable_pdf') {
            const { data } = await worker.recognize(imagesToOcr[0], { pdfTitle: file.name.replace('.pdf', '_ocr.pdf') }); // Tesseract.js handles multi-page PDF generation if images array is passed
            
            // For searchable PDF, the result is directly a PDF
            ocrResultPdfBlob = new Blob([data.pdf], { type: 'application/pdf' });
            combinedText = data.text; // Still get text for preview purposes
            
            displaySearchablePdfPreview(ocrResultPdfBlob);

        } else {
            for (let i = 0; i < imagesToOcr.length; i++) {
                const { data } = await worker.recognize(imagesToOcr[i]);
                combinedText += data.text + '\n\n'; // Separate text from different pages
            }
            ocrResultText = combinedText;
            displayOcrTextPreview(combinedText);
        }

        showStatus('OCR complete!', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        progressArea.style.display = 'none';

        // Add to history
        addToHistory({
            fileName: file.name.replace('.pdf', `_ocr.${outputFormat === 'text' ? 'txt' : (outputFormat === 'searchable_pdf' ? 'pdf' : 'html')}`),
            date: new Date().toLocaleString(),
            format: outputFormat,
            textResult: outputFormat === 'text' || outputFormat === 'searchable_pdf' ? combinedText : null, // Store text for txt and searchable PDF for regeneration
            pdfResultBlob: outputFormat === 'searchable_pdf' ? ocrResultPdfBlob : null, // Store actual blob for searchable PDF
            hocrResult: outputFormat === 'hocr' ? combinedText : null // For hOCR, the 'text' result from Tesseract is the hOCR HTML
        });

        Swal.fire({
            title: 'OCR Complete!',
            text: 'Text extracted successfully!',
            icon: 'success',
            confirmButtonText: 'Great!',
            timer: 1000,
            timerProgressBar: true
        });

    } catch (error) {
        console.error('Error during OCR:', error);
        showError(`OCR failed: ${error.message}`);
        Swal.fire({
            title: 'OCR Failed',
            text: error.message || 'An unexpected error occurred during OCR.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    } finally {
        await worker.terminate();
    }
}

function parsePageRange(rangeString) {
    const pages = new Set();
    rangeString.split(',').forEach(part => {
        part = part.trim();
        if (part.includes('-')) {
            const [start, end] = part.split('-').map(Number);
            if (!isNaN(start) && !isNaN(end) && start <= end) {
                for (let i = start; i <= end; i++) {
                    pages.add(i);
                }
            }
        } else {
            const pageNum = Number(part);
            if (!isNaN(pageNum) && pageNum > 0) {
                pages.add(pageNum);
            }
        }
    });
    return Array.from(pages).sort((a, b) => a - b);
}

function displayOcrTextPreview(text) {
    ocrPreviewCard.style.display = 'block';
    ocrTextResult.style.display = 'block';
    pdfViewer.style.display = 'none';
    ocrTextResult.value = text;
}

function displaySearchablePdfPreview(pdfBlob) {
    ocrPreviewCard.style.display = 'block';
    ocrTextResult.style.display = 'none';
    pdfViewer.style.display = 'block';

    // Clear previous PDF viewer content
    while (pdfViewer.firstChild) {
        pdfViewer.removeChild(pdfViewer.firstChild);
    }

    // Embed the PDF using an iframe
    const iframe = document.createElement('iframe');
    iframe.src = URL.createObjectURL(pdfBlob);
    iframe.style.width = '100%';
    iframe.style.height = '100%';
    iframe.style.border = 'none';
    pdfViewer.appendChild(iframe);
}


// Download OCR Result
function downloadOcrResult() {
    const outputFormat = document.getElementById('outputFormat').value;
    let fileName = file ? file.name.replace('.pdf', '') : 'ocr_result';
    let blob = null;
    let type = '';

    if (outputFormat === 'text') {
        if (!ocrResultText) {
            showError('No OCR text to download.');
            Swal.fire({
                title: 'No Text',
                text: 'No OCR text available for download. Please run OCR first.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            return;
        }
        blob = new Blob([ocrResultText], { type: 'text/plain;charset=utf-8' });
        fileName += '.txt';
        type = 'text';
    } else if (outputFormat === 'searchable_pdf') {
        if (!ocrResultPdfBlob) {
            showError('No searchable PDF to download.');
            Swal.fire({
                title: 'No PDF',
                text: 'No searchable PDF available for download. Please run OCR first.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            return;
        }
        blob = ocrResultPdfBlob;
        fileName += '_searchable.pdf';
        type = 'pdf';
    } else if (outputFormat === 'hocr') {
        if (!ocrResultText) { // hOCR is also returned as text result from Tesseract
            showError('No hOCR output to download.');
            Swal.fire({
                title: 'No hOCR',
                text: 'No hOCR output available for download. Please run OCR first.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            return;
        }
        blob = new Blob([ocrResultText], { type: 'application/html;charset=utf-8' });
        fileName += '.html';
        type = 'html';
    }

    if (blob) {
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = fileName;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        showStatus(`${fileName} downloaded successfully!`, 'success');

        Swal.fire({
            title: 'Download Complete',
            text: `Your ${type.toUpperCase()} file has been downloaded.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    } else {
        showError('Could not prepare file for download.');
        Swal.fire({
            title: 'Download Error',
            text: 'An error occurred while preparing the file for download.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// History Functions
function addToHistory(item) {
    const historyItem = {
        id: Date.now(),
        fileName: item.fileName,
        date: item.date,
        format: item.format,
        textResult: item.textResult || null,
        // For security and storage efficiency, we generally don't store large blobs in localStorage.
        // Instead, we might store parameters to regenerate, or provide a warning about large files.
        // For this example, we'll store the blob for searchable PDF if it's small enough, or regenerate on download.
        // For a true production app, large blobs would need server-side storage or other mechanisms.
        // For this local-only example, let's keep a reference if available and regeneration logic.
        pdfResultBlob: item.pdfResultBlob ? item.pdfResultBlob : null,
        hocrResult: item.hocrResult || null
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('ocrConversionHistory', JSON.stringify(conversionHistory.map(h => {
        const copy = {...h};
        // Do not store the actual Blob in localStorage, just a flag if it was a searchable PDF.
        // We will regenerate it on demand.
        if (copy.pdfResultBlob) {
            copy.pdfResultBlob = true; // Store a flag instead of the blob
        }
        return copy;
    })));
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
            <td>${item.format.toUpperCase().replace('_', ' ')}</td>
            <td class="text-end">
                <button class="btn btn-sm btn-outline-primary download-history" data-id="${item.id}" data-format="${item.format}" title="Download">
                    <i class="fas fa-download"></i>
                </button>
                <button class="btn btn-sm btn-outline-secondary preview-history ms-1" data-id="${item.id}" data-format="${item.format}" title="Preview">
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
            localStorage.setItem('ocrConversionHistory', JSON.stringify(conversionHistory.map(h => {
                const copy = {...h};
                if (copy.pdfResultBlob) copy.pdfResultBlob = true;
                return copy;
            })));
            displayHistory();
        }
    });
}

async function downloadHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    showStatus(`Downloading ${item.fileName}...`, 'info');
    
    const swalInstance = Swal.fire({
        title: 'Preparing Download',
        html: `Preparing ${item.fileName} for download...`,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    let blob = null;
    let fileName = item.fileName;

    if (item.format === 'text' && item.textResult) {
        blob = new Blob([item.textResult], { type: 'text/plain;charset=utf-8' });
    } else if (item.format === 'hocr' && item.hocrResult) {
        blob = new Blob([item.hocrResult], { type: 'application/html;charset=utf-8' });
    } else if (item.format === 'searchable_pdf' && item.textResult) {
        // Regenerate searchable PDF for download using the stored text result
        // Note: For full fidelity, you would need to store the original image data or PDF input.
        // Here, we're creating a new PDF from the extracted text, which might not be 100% identical
        // to the original searchable PDF generated by Tesseract.js directly.
        // A more robust solution would involve storing the actual PDF blob or input file.
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        doc.text(item.textResult, 10, 10); // Basic text to PDF
        blob = doc.output('blob');
        fileName = fileName || 'download.pdf'; // Ensure filename
    }

    if (blob) {
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = fileName;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        showStatus(`${fileName} downloaded!`, 'success');
        swalInstance.close();
        Swal.fire({
            title: 'Download Complete',
            text: `Your file has been downloaded.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    } else {
        showError('Could not retrieve file from history for download. Original data might not be stored or regenerate failed.');
        swalInstance.close();
        Swal.fire({
            title: 'Download Error',
            text: 'Could not retrieve file from history for download.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    if (item.format === 'text' && item.textResult) {
        displayOcrTextPreview(item.textResult);
    } else if (item.format === 'hocr' && item.hocrResult) {
        // For hOCR, we can display it in an iframe or just the raw HTML for simplicity
        // For a better preview, this would require rendering the HTML
        displayOcrTextPreview(item.hocrResult);
        ocrTextResult.placeholder = "hOCR content displayed as raw HTML. For interactive preview, download the file.";
    } else if (item.format === 'searchable_pdf' && item.textResult) {
         // To preview searchable PDF, you'd ideally re-generate it or have stored the blob
         // For now, we'll just display the text content as a fallback or indicate it's a PDF.
         // A more complex implementation would involve regenerating the PDF and showing it in the viewer.
         displayOcrTextPreview(`(Searchable PDF preview not available directly here. Download '${item.fileName}' to view the PDF. Extracted text below for reference):\n\n${item.textResult}`);
    } else {
        displayOcrTextPreview('Preview not available for this format or data.');
    }

    showStatus(`Previewing ${item.fileName}`, 'info');
    ocrPreviewCard.scrollIntoView({ behavior: 'smooth' });
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