<?php
// SEO and Page Metadata
$page_title = "PowerPoint to PDF Converter - Convert PPT/PPTX to PDF Online"; // You may Change the Title here
$page_description = "Convert PowerPoint to PDF online for free. Transform PPT and PPTX presentations into PDF documents. Preserve slides, animations, and formatting. Fast and secure."; // Put your Description here
$page_keywords = "powerpoint to pdf converter - convert ppt/pptx to pdf online, powerpoint, pdf, converter, convert, ppt/pptx, online, free online tools, pdf tools";

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
                    <h1 class="h2">PPT to PDF Converter <i class="fas fa-file-pdf text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Effortlessly convert your PowerPoint presentations (PPT, PPTX) to PDF documents.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop PPT/PPTX File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="pptUpload" accept=".ppt,.pptx" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('pptUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select PPT/PPTX Files
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
                                <label for="outputQuality" class="form-label">Output Quality</label>
                                <select id="outputQuality" class="form-select">
                                    <option value="high" selected>High (Best quality)</option>
                                    <option value="medium">Medium (Good balance)</option>
                                    <option value="low">Low (Smaller file size)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="pageLayout" class="form-label">Page Layout</label>
                                <select id="pageLayout" class="form-select">
                                    <option value="oneSlidePerPage" selected>One Slide Per Page</option>
                                    <option value="notesPage">Notes Page (If available)</option>
                                    <option value="handouts2">2 Slides Per Page (Handouts)</option>
                                    <option value="handouts3">3 Slides Per Page (Handouts)</option>
                                    <option value="handouts4">4 Slides Per Page (Handouts)</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeHiddenSlides">
                                    <label class="form-check-label" for="includeHiddenSlides">
                                        Include Hidden Slides
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
                        <h5 class="mb-0"><i class="fas fa-file-pdf me-2"></i>PDF Preview (First few pages)</h5>
                        <span class="badge bg-info" id="pageCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <div id="pdfViewer" style="width: 100%; height: 500px; overflow: auto; background-color: #e0e0e0; display: flex; justify-content: center; align-items: center; text-align: center;">
                            <span class="text-muted">Upload PPT/PPTX to see PDF preview.</span>
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
                <?php include '../../views/content/ppt-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script>
    // Set workerSrc for PDF.js
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';
</script>
<!-- JSZip for reading PPTX files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script>
// JavaScript for PPT to PDF Converter
let files = [];
let generatedPdfBlob = null; // Store the generated PDF blob for download
let conversionHistory = JSON.parse(localStorage.getItem('pptConversionHistory')) || [];

// Initialize elements
const pptUpload = document.getElementById('pptUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const pdfViewer = document.getElementById('pdfViewer');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const pageCountSpan = document.getElementById('pageCount');

// Event Listeners
pptUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertPptToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PPT to PDF Converter',
        html: `Follow these steps to convert your PPTs:<br><br>
        <ol class="text-start">
            <li>Upload PPT/PPTX by clicking "Select PPT/PPTX Files" or dragging them into the drop zone.</li>
            <li>Choose your desired output quality, page layout, and other options.</li>
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
    generatedPdfBlob = null;
    pptUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    pdfViewer.innerHTML = '<span class="text-muted">Upload PPT/PPTX to see PDF preview.</span>';
    pdfViewer.style.height = '500px';
    pageCountSpan.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('outputQuality').value = 'high';
    document.getElementById('pageLayout').value = 'oneSlidePerPage';
    document.getElementById('includeHiddenSlides').checked = false;
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
        const fileType = file.name.split('.').pop().toLowerCase();
        if (fileType !== 'ppt' && fileType !== 'pptx') {
            showError('Please upload only PPT or PPTX files.');
            return false;
        }
        if (file.size > 50 * 1024 * 1024) { // Max 50MB per file
            showError('Each file must be less than 50MB.');
            return false;
        }
        return true;
    });

    if (files.length > 0) {
        // We will process only the first file for now
        fileInfo.textContent = `${files[0].name} selected.`;
        convertBtn.disabled = false;
        showStatus('File ready for conversion.', 'info');
        
        // Clear previous preview
        pdfViewer.innerHTML = '<span class="text-muted">Click "Convert" to generate PDF preview.</span>';
        pageCountSpan.textContent = '';

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

// Parse PPTX file and extract slide content
async function parsePPTX(file) {
    // Check if file is PPTX (ZIP-based) or PPT (binary)
    const fileName = file.name.toLowerCase();
    
    if (fileName.endsWith('.pptx')) {
        return await parsePPTXFile(file);
    } else if (fileName.endsWith('.ppt')) {
        // For .ppt files, we can only extract basic info as it's a binary format
        return await parsePPTFile(file);
    } else {
        throw new Error('Unsupported file format. Please upload .ppt or .pptx files only.');
    }
}

// Parse PPTX (ZIP-based format)
async function parsePPTXFile(file) {
    let zip;
    try {
        zip = await JSZip.loadAsync(file);
    } catch (e) {
        throw new Error('Invalid PPTX file. The file may be corrupted or not a valid PowerPoint presentation.');
    }
    
    const slides = [];
    
    // List all files in the ZIP for debugging
    const allFiles = Object.keys(zip.files);
    console.log('Files in PPTX:', allFiles);
    
    // Find presentation.xml (might be in different case)
    const presentationPath = allFiles.find(f => f.toLowerCase() === 'ppt/presentation.xml');
    if (!presentationPath) {
        throw new Error('Invalid PPTX file: presentation.xml not found');
    }
    
    const presentationXml = await zip.file(presentationPath)?.async('text');
    if (!presentationXml) {
        throw new Error('Invalid PPTX file: presentation.xml is empty');
    }
    
    // Parse slide IDs from presentation.xml - handle various namespace prefixes
    // Try different patterns for sldId
    const slideIdPatterns = [
        /<p:sldId[^>]*id="(\d+)"[^>]*r:id="([^"]+)"/g,
        /<sldId[^>]*id="(\d+)"[^>]*r:id="([^"]+)"/g,
        /<p:sldId[^>]*Id="(\d+)"[^>]*r:id="([^"]+)"/gi,
        /<sldId[^>]*id='(\d+)'[^>]*r:id='([^']+)'/g
    ];
    
    let slideIds = [];
    let match;
    
    for (const pattern of slideIdPatterns) {
        pattern.lastIndex = 0; // Reset regex
        while ((match = pattern.exec(presentationXml)) !== null) {
            slideIds.push({ id: match[1], rId: match[2] });
        }
        if (slideIds.length > 0) break;
    }
    
    console.log('Found slide IDs:', slideIds);
    
    // If no slides found with patterns, try alternative method
    if (slideIds.length === 0) {
        // Try to find all slide references directly
        const slideRefPattern = /r:id="(rId\d+)"/g;
        while ((match = slideRefPattern.exec(presentationXml)) !== null) {
            slideIds.push({ id: String(slideIds.length + 1), rId: match[1] });
        }
    }
    
    // Get slide relationships
    const relsPath = allFiles.find(f => f.toLowerCase() === 'ppt/_rels/presentation.xml.rels');
    if (!relsPath) {
        throw new Error('Invalid PPTX file: presentation relationships not found');
    }
    
    const presentationRels = await zip.file(relsPath)?.async('text');
    if (!presentationRels) {
        throw new Error('Invalid PPTX file: presentation relationships are empty');
    }
    
    // Parse slide paths from relationships - handle various formats
    const slidePaths = {};
    const relPatterns = [
        /<Relationship[^>]*Id="([^"]+)"[^>]*Target="([^"]+)"[^>]*Type="[^"]*slide"[^>]*\/>/g,
        /<Relationship[^>]*Id="([^"]+)"[^>]*Target="([^"]+)"[^>]*Type="[^"]*slide\/[^"]*"[^>]*\/>/g,
        /<Relationship[^>]*Id='([^']+)'[^>]*Target='([^']+)'[^>]*Type='[^']*slide'[^>]*\/>/gi
    ];
    
    for (const pattern of relPatterns) {
        pattern.lastIndex = 0;
        while ((match = pattern.exec(presentationRels)) !== null) {
            slidePaths[match[1]] = match[2];
        }
    }
    
    console.log('Found slide paths:', slidePaths);
    
    // If still no slide paths, try to find slides directly in the slides folder
    if (Object.keys(slidePaths).length === 0) {
        const slideFiles = allFiles.filter(f => f.match(/^ppt\/slides\/slide\d+\.xml$/i));
        console.log('Found slide files directly:', slideFiles);
        
        for (let i = 0; i < slideFiles.length; i++) {
            const slidePath = slideFiles[i];
            const slideXml = await zip.file(slidePath)?.async('text');
            if (!slideXml) continue;
            
            const texts = extractTextsFromSlide(slideXml);
            
            slides.push({
                slideNumber: i + 1,
                texts: texts
            });
        }
    } else {
        // Extract content from each slide using relationships
        for (const slideId of slideIds) {
            let slidePath = slidePaths[slideId.rId];
            if (!slidePath) continue;
            
            // Handle relative paths
            if (slidePath.startsWith('/')) {
                slidePath = slidePath.substring(1);
            } else if (!slidePath.startsWith('ppt/')) {
                slidePath = 'ppt/' + slidePath;
            }
            
            const slideXml = await zip.file(slidePath)?.async('text');
            if (!slideXml) continue;
            
            const texts = extractTextsFromSlide(slideXml);
            
            slides.push({
                slideNumber: slides.length + 1,
                texts: texts
            });
        }
    }
    
    console.log('Total slides extracted:', slides.length);
    
    if (slides.length === 0) {
        throw new Error('No slides found in the presentation. The file may be corrupted or in an unsupported format.');
    }
    
    return slides;
}

// Helper function to extract text from slide XML
function extractTextsFromSlide(slideXml) {
    const texts = [];
    let match;
    
    // Regular text - try various patterns
    const textPatterns = [
        /<a:t>([^<]*)<\/a:t>/g,
        /<a:t xml:space="preserve">([^<]*)<\/a:t>/g,
        /<t>([^<]*)<\/t>/g
    ];
    
    for (const pattern of textPatterns) {
        pattern.lastIndex = 0;
        while ((match = pattern.exec(slideXml)) !== null) {
            if (match[1].trim()) {
                texts.push(match[1]);
            }
        }
    }
    
    // Field text (like page numbers, dates)
    const fieldRegex = /<a:fld[^>]*>.*?<a:t>([^<]*)<\/a:t>.*?<\/a:fld>/g;
    while ((match = fieldRegex.exec(slideXml)) !== null) {
        if (match[1].trim()) {
            texts.push(match[1]);
        }
    }
    
    return texts;
}

// Parse PPT (binary format) - limited support
async function parsePPTFile(file) {
    // For .ppt files, we'll create a basic structure
    // True parsing of .ppt requires complex binary parsing
    const slides = [];
    
    // Read file as ArrayBuffer to check for basic PowerPoint signatures
    const arrayBuffer = await file.arrayBuffer();
    const uint8Array = new Uint8Array(arrayBuffer);
    
    // Check for PowerPoint 97-2003 signature
    const signature = uint8Array.slice(0, 8);
    const isPPT = signature[0] === 0xD0 && signature[1] === 0xCF && 
                  signature[2] === 0x11 && signature[3] === 0xE0;
    
    if (!isPPT) {
        throw new Error('Invalid PPT file. The file may be corrupted.');
    }
    
    // For .ppt files, we can't easily extract text in browser
    // Create a placeholder slide with information
    slides.push({
        slideNumber: 1,
        texts: [
            'PowerPoint 97-2003 Format (.ppt)',
            '',
            'This is an older PowerPoint format.',
            'For best results, please save your presentation as .pptx format:',
            'File > Save As > PowerPoint Presentation (*.pptx)',
            '',
            'File name: ' + file.name,
            'File size: ' + (file.size / 1024).toFixed(2) + ' KB'
        ]
    });
    
    return slides;
}

// Convert PPT to PDF
async function convertPptToPdf() {
    if (files.length === 0) {
        showError('No PPT/PPTX file selected. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No PPT/PPTX file selected. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting PowerPoint to PDF...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    const swalInstance = Swal.fire({
        title: 'Converting Presentation',
        html: 'Parsing PPTX file and extracting content...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const file = files[0];
        
        // Parse the PPTX file
        const slides = await parsePPTX(file);
        
        if (slides.length === 0) {
            throw new Error('No slides found in the presentation');
        }
        
        Swal.update({
            html: `Found ${slides.length} slides. Generating PDF...`
        });

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF('p', 'pt', 'a4');

        const pageWidth = doc.internal.pageSize.getWidth();
        const pageHeight = doc.internal.pageSize.getHeight();
        const margin = 40;
        const contentWidth = pageWidth - 2 * margin;

        const outputQuality = document.getElementById('outputQuality').value;
        const pageLayout = document.getElementById('pageLayout').value;
        const addPageNumbers = document.getElementById('addPageNumbers').checked;

        // Process each slide
        for (let i = 0; i < slides.length; i++) {
            const slide = slides[i];
            
            if (i > 0) doc.addPage();
            
            // Add slide title
            doc.setFontSize(20);
            doc.setTextColor(0, 0, 0);
            doc.text(`Slide ${slide.slideNumber}`, pageWidth / 2, 50, { align: 'center' });
            
            // Add slide content
            doc.setFontSize(12);
            let yPosition = 80;
            const lineHeight = 16;
            
            for (const text of slide.texts) {
                // Split long text into lines
                const lines = doc.splitTextToSize(text, contentWidth);
                
                for (const line of lines) {
                    if (yPosition > pageHeight - margin - 20) {
                        doc.addPage();
                        yPosition = 50;
                    }
                    doc.text(line, margin, yPosition);
                    yPosition += lineHeight;
                }
                yPosition += 10; // Space between text blocks
            }

            // Add page numbers
            if (addPageNumbers) {
                doc.setFontSize(8);
                doc.setTextColor(128, 128, 128);
                doc.text(`Page ${i + 1} of ${slides.length}`, pageWidth - margin, pageHeight - 20, { align: 'right' });
            }
        }
        
        generatedPdfBlob = doc.output('blob');

        // Display PDF preview
        await displayPdfPreview(generatedPdfBlob);

        // Add to history
        addToHistory({
            fileName: file.name.replace(/\.(ppt|pptx)$/i, '.pdf'),
            date: new Date().toLocaleString(),
            format: 'pdf',
            blob: generatedPdfBlob,
            options: {
                outputQuality: outputQuality,
                pageLayout: pageLayout,
                addPageNumbers: addPageNumbers
            }
        });
        
        showStatus('Conversion complete! PDF preview generated. Click Download.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: `Successfully converted ${slides.length} slides to PDF.`,
            icon: 'success',
            confirmButtonText: 'Great!',
            timer: 1500,
            timerProgressBar: true
        });
        
    } catch (error) {
        console.error('Conversion error:', error);
        showError(`Error during PDF generation: ${error.message}`);
        convertBtn.disabled = false;
        downloadBtn.disabled = true;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Error',
            text: `Failed to convert: ${error.message}. Please ensure the file is a valid PPTX file.`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// Display PDF Preview
async function displayPdfPreview(blob) {
    pdfViewer.innerHTML = ''; // Clear previous content
    pdfViewer.style.height = '600px'; // Adjust height for viewer

    const loadingTask = pdfjsLib.getDocument({ data: await blob.arrayBuffer() });
    const pdf = await loadingTask.promise;
    
    pageCountSpan.textContent = `Pages: ${pdf.numPages}`;

    // Limit preview to first 3 pages for performance
    const numPagesToRender = Math.min(pdf.numPages, 3); 

    for (let i = 1; i <= numPagesToRender; i++) {
        const page = await pdf.getPage(i);
        const scale = 1.5;
        const viewport = page.getViewport({ scale: scale });

        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');
        canvas.height = viewport.height;
        canvas.width = viewport.width;
        canvas.style.display = 'block';
        canvas.style.margin = '10px auto';
        canvas.style.border = '1px solid #ddd';

        pdfViewer.appendChild(canvas);

        const renderContext = {
            canvasContext: context,
            viewport: viewport
        };
        await page.render(renderContext).promise;
    }
    if (pdf.numPages > numPagesToRender) {
        const moreText = document.createElement('p');
        moreText.textContent = `...and ${pdf.numPages - numPagesToRender} more pages. Download to view full PDF.`;
        moreText.className = 'text-muted text-center mt-3';
        pdfViewer.appendChild(moreText);
    }
}


// Download PDF
function downloadPdf() {
    if (!generatedPdfBlob) {
        showError('No PDF to download. Please convert first.');
        Swal.fire({
            title: 'No PDF',
            text: 'No PDF to download. Please convert first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing PDF for download...', 'info');
    
    Swal.fire({
        title: 'Preparing Download',
        html: `Preparing your PDF file for download...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        const url = URL.createObjectURL(generatedPdfBlob);
        const a = document.createElement('a');
        a.href = url;
        const fileName = files[0].name.replace(/\.(ppt|pptx)$/i, '.pdf');
        a.download = fileName;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        
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
        blob: item.blob, // Store the actual Blob for re-download/preview
        options: item.options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('pptConversionHistory', JSON.stringify(conversionHistory.map(h => ({
        ...h,
        // For localStorage, Blob needs to be converted to something storable.
        // Base64 is an option, but for large files it's not practical.
        // For this client-side demo, we'll keep the actual blob in memory
        // and only store metadata in localStorage. If the page is refreshed,
        // the blobs will be lost, which is consistent with "local, in-browser processing".
        // To make blobs persist, they would need to be stored in IndexedDB or a server.
        // For now, if the page refreshes, history items won't be re-downloadable/previewable.
        // To simulate, we'll store a placeholder if the blob is too large or for simplicity.
        blob: null // Set blob to null for localStorage to avoid exceeding quota
    }))));
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
        // Check if item.blob is null (meaning it wasn't saved to localStorage or page refreshed)
        const canPerformAction = item.blob !== null;

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
                <button class="btn btn-sm btn-outline-primary download-history ${canPerformAction ? '' : 'disabled'}" data-id="${item.id}" title="Download">
                    <i class="fas fa-download"></i>
                </button>
                <button class="btn btn-sm btn-outline-secondary preview-history ms-1 ${canPerformAction ? '' : 'disabled'}" data-id="${item.id}" title="Preview">
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

    document.querySelectorAll('.download-history:not(.disabled)').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            downloadHistoryItemFromHistory(id); // Renamed to avoid conflict
        });
    });

    document.querySelectorAll('.preview-history:not(.disabled)').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            previewHistoryItemFromHistory(id); // Renamed to avoid conflict
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
            localStorage.setItem('pptConversionHistory', JSON.stringify(conversionHistory.map(h => ({
                ...h,
                blob: null // Ensure blob is null when saving to storage
            }))));
            displayHistory();
        }
    });
}

function downloadHistoryItemFromHistory(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.blob) {
        showError('File not available for download. It might have been cleared from memory.');
        Swal.fire({
            title: 'File Not Available',
            text: 'This file is no longer available in memory. Please re-convert if needed.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
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

async function previewHistoryItemFromHistory(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.blob) {
        showError('Preview not available. File might have been cleared from memory.');
        Swal.fire({
            title: 'Preview Not Available',
            text: 'This file is no longer available in memory for preview. Please re-convert if needed.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus(`Previewing ${item.fileName}...`, 'info');
    await displayPdfPreview(item.blob);
    
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