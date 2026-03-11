<?php
// SEO and Page Metadata
$page_title = "QR Code Generator - Create Custom QR Codes Online Free"; // You may Change the Title here
$page_description = "Free QR code generator online. Create custom QR codes for URLs, text, WiFi, contact info, and more. Download as PNG or SVG. No sign-up required."; // Put your Description here
$page_keywords = "qr code generator - create custom qr codes, code, generator, create, custom, codes, free online tools, pdf tools";

// Include common header
include '../../includes/header.php';
?>

<!-- TOOL -->
<div class="container">
    <div class="row justify-content-center">
        
        <!-- Mobile Toggle Button (Visible only on mobile) -->
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


        <!-- Sidebar Column (Visible on all screens) -->
        <div class="col-lg-2">
            <div class="collapse d-lg-block h-100" id="toolsSidebar">
                <div class="card h-100">
                    <div class="card-body p-2">
                        <!-- Search Box -->
                        <input type="text" id="searchTools" class="form-control border-danger mb-3" placeholder="Search tools...">
                        
                        <!-- Tools List -->
                        <div class="list-group list-group-flush overflow-auto" style="max-height: calc(200vh - 150px);">
                            <div id="toolsList"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-7 border shadow-sm">
            <div class="tool-container rounded-3 p-4 p-md-5">
                <header class="text-center mb-4">
                    <h1 class="h2">QR Code Generator <i class="fas fa-qrcode text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Create custom QR codes for URLs, text, WiFi and more.</p>
                </header>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-sliders-h me-2"></i>QR Code Settings</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="qrContent" class="form-label">Content to Encode</label>
                                <textarea class="form-control" id="qrContent" rows="3" placeholder="Enter URL, text, contact info, etc."></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="qrType" class="form-label">QR Code Type</label>
                                <select id="qrType" class="form-select">
                                    <option value="url">Website URL</option>
                                    <option value="text">Plain Text</option>
                                    <option value="wifi">WiFi Network</option>
                                    <option value="contact">Contact Info</option>
                                    <option value="sms">SMS Message</option>
                                    <option value="email">Email</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="qrSize" class="form-label">Size (px)</label>
                                <select id="qrSize" class="form-select">
                                    <option value="200">200x200</option>
                                    <option value="300" selected>300x300</option>
                                    <option value="400">400x400</option>
                                    <option value="500">500x500</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="qrColor" class="form-label">Color</label>
                                <input type="color" class="form-control form-control-color" id="qrColor" value="#000000" title="Choose QR code color">
                            </div>
                            <div class="col-md-6">
                                <label for="qrBgColor" class="form-label">Background Color</label>
                                <input type="color" class="form-control form-control-color" id="qrBgColor" value="#ffffff" title="Choose background color">
                            </div>
                            <div class="col-md-6">
                                <label for="qrErrorCorrection" class="form-label">Error Correction</label>
                                <select id="qrErrorCorrection" class="form-select">
                                    <option value="L">Low (7%)</option>
                                    <option value="M" selected>Medium (15%)</option>
                                    <option value="Q">Quartile (25%)</option>
                                    <option value="H">High (30%)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="qrMargin" class="form-label">Margin</label>
                                <select id="qrMargin" class="form-select">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4" selected>4</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="qrLogo" checked>
                                    <label class="form-check-label" for="qrLogo">
                                        Add Logo/Image (Center)
                                    </label>
                                </div>
                            </div>
                            <div class="col-12" id="logoUploadContainer">
                                <label for="qrLogoFile" class="form-label">Upload Logo</label>
                                <input class="form-control" type="file" id="qrLogoFile" accept="image/*">
                                <div class="form-text">Recommended size: 60x60px (will be resized automatically)</div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="qrRounded" checked>
                                    <label class="form-check-label" for="qrRounded">
                                        Rounded Corners
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="generateBtn">
                        <i class="fas fa-qrcode me-2"></i> Generate QR Code
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
                        <h5 class="mb-0"><i class="fas fa-eye me-2"></i>QR Code Preview</h5>
                        <span class="badge bg-info" id="typeBadge">Type: URL</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="m-0 p-3 bg-light d-flex justify-content-center align-items-center" id="qrOutput" style="min-height: 400px;">
                            <div class="text-center text-muted">Your generated QR code will appear here</div>
                        </div>
                    </div>
                </div>

                <div class="history-area card mt-4" id="historyContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>QR Code History (Last 10)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="historyTable">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th>Type</th>
                                        <th>Preview</th>
                                        <th>Date</th>
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
                <?php include '../../views/content/qr-code-generator-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<!-- QR Code Library -->
<script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.1/build/qrcode.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.1/build/qrcode.tosj.min.js"></script>

<script>
// JavaScript for QR Code Generator
let generatedQR = null;
let qrHistory = JSON.parse(localStorage.getItem('qrHistory')) || [];

// Initialize elements
const qrContent = document.getElementById('qrContent');
const qrType = document.getElementById('qrType');
const qrSize = document.getElementById('qrSize');
const qrColor = document.getElementById('qrColor');
const qrBgColor = document.getElementById('qrBgColor');
const qrErrorCorrection = document.getElementById('qrErrorCorrection');
const qrMargin = document.getElementById('qrMargin');
const qrLogo = document.getElementById('qrLogo');
const qrLogoFile = document.getElementById('qrLogoFile');
const qrRounded = document.getElementById('qrRounded');
const generateBtn = document.getElementById('generateBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const qrOutput = document.getElementById('qrOutput');
const statusArea = document.getElementById('statusArea');
const typeBadge = document.getElementById('typeBadge');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const logoUploadContainer = document.getElementById('logoUploadContainer');

// Event Listeners
generateBtn.addEventListener('click', generateQRCode);
downloadBtn.addEventListener('click', downloadQRCode);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
qrType.addEventListener('change', updateType);
qrLogo.addEventListener('change', toggleLogoUpload);

// Initialize
updateType();
toggleLogoUpload();
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to QR Code Generator',
        html: `Follow these steps to create custom QR codes:<br><br>
        <ol class="text-start">
            <li>Enter the content you want to encode (URL, text, etc.)</li>
            <li>Select the appropriate QR code type</li>
            <li>Customize the appearance with colors and size</li>
            <li>Optionally add your logo in the center</li>
            <li>Click "Generate QR Code" to create it</li>
            <li>Download the image for use in your projects</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    qrContent.value = '';
    qrType.value = 'url';
    qrSize.value = '300';
    qrColor.value = '#000000';
    qrBgColor.value = '#ffffff';
    qrErrorCorrection.value = 'M';
    qrMargin.value = '4';
    qrLogo.checked = true;
    qrLogoFile.value = '';
    qrRounded.checked = true;
    
    qrOutput.innerHTML = '<div class="text-center text-muted">Your generated QR code will appear here</div>';
    statusArea.textContent = '';
    downloadBtn.disabled = true;
    typeBadge.textContent = 'Type: URL';
    typeBadge.className = 'badge bg-info';
    
    updateType();
    toggleLogoUpload();
}

// Update QR type badge
function updateType() {
    const typeText = qrType.options[qrType.selectedIndex].text;
    typeBadge.textContent = `Type: ${typeText}`;
    
    // Set placeholder based on type
    switch(qrType.value) {
        case 'url':
            qrContent.placeholder = 'Enter website URL (e.g. https://example.com)';
            break;
        case 'text':
            qrContent.placeholder = 'Enter text to encode';
            break;
        case 'wifi':
            qrContent.placeholder = 'Enter WiFi details (SSID and password)';
            break;
        case 'contact':
            qrContent.placeholder = 'Enter contact information (Name, phone, email, etc.)';
            break;
        case 'sms':
            qrContent.placeholder = 'Enter phone number and message';
            break;
        case 'email':
            qrContent.placeholder = 'Enter email address and subject';
            break;
    }
}

// Toggle logo upload visibility
function toggleLogoUpload() {
    logoUploadContainer.style.display = qrLogo.checked ? 'block' : 'none';
}

// Generate QR Code
function generateQRCode() {
    const content = qrContent.value.trim();
    const type = qrType.value;
    const size = parseInt(qrSize.value);
    const color = qrColor.value;
    const bgColor = qrBgColor.value;
    const errorCorrection = qrErrorCorrection.value;
    const margin = parseInt(qrMargin.value);
    const useLogo = qrLogo.checked;
    const rounded = qrRounded.checked;
    const logoFile = qrLogoFile.files[0];
    
    // Validate content
    if (!content) {
        showError('Please enter content to encode.');
        Swal.fire({
            title: 'Error',
            text: 'Please enter content to encode.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }
    
    // Format content based on type
    let formattedContent = content;
    switch(type) {
        case 'url':
            if (!content.startsWith('http://') && !content.startsWith('https://')) {
                formattedContent = 'https://' + content;
            }
            break;
        case 'wifi':
            // Format: WIFI:T:WPA;S:SSID;P:password;;
            const wifiParts = content.split(',');
            const ssid = wifiParts[0]?.trim() || 'MyWiFi';
            const password = wifiParts[1]?.trim() || '';
            const encryption = wifiParts[2]?.trim() || 'WPA';
            formattedContent = `WIFI:T:${encryption};S:${ssid};P:${password};;`;
            break;
        case 'contact':
            // Simple vCard format
            const contactParts = content.split(',');
            const name = contactParts[0]?.trim() || '';
            const phone = contactParts[1]?.trim() || '';
            const email = contactParts[2]?.trim() || '';
            formattedContent = `BEGIN:VCARD\nVERSION:3.0\nFN:${name}\nTEL:${phone}\nEMAIL:${email}\nEND:VCARD`;
            break;
        case 'sms':
            // Format: SMSTO:phone:message
            const smsParts = content.split(',');
            const phoneNum = smsParts[0]?.trim() || '';
            const message = smsParts[1]?.trim() || '';
            formattedContent = `SMSTO:${phoneNum}:${message}`;
            break;
        case 'email':
            // Format: MATMSG:TO:email;SUB:subject;BODY:body;;
            const emailParts = content.split(',');
            const emailAddr = emailParts[0]?.trim() || '';
            const subject = emailParts[1]?.trim() || '';
            const body = emailParts[2]?.trim() || '';
            formattedContent = `MATMSG:TO:${emailAddr};SUB:${subject};BODY:${body};;`;
            break;
    }
    
    // Clear previous QR code
    qrOutput.innerHTML = '';
    
    // Generate QR code
    QRCode.toCanvas(formattedContent, {
        width: size,
        color: {
            dark: color,
            light: bgColor
        },
        errorCorrectionLevel: errorCorrection,
        margin: margin
    }, function(err, canvas) {
        if (err) {
            showError('Error generating QR code: ' + err.message);
            Swal.fire({
                title: 'Error',
                text: 'Error generating QR code: ' + err.message,
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }
        
        // Style canvas
        canvas.style.maxWidth = '100%';
        canvas.style.height = 'auto';
        canvas.style.borderRadius = rounded ? '10px' : '0';
        
        // Add logo if enabled
        if (useLogo && logoFile) {
            addLogoToQR(canvas, logoFile, rounded);
        } else {
            qrOutput.appendChild(canvas);
            finalizeQRGeneration(canvas);
        }
    });
}

// Add logo to QR code
function addLogoToQR(canvas, logoFile, rounded) {
    const reader = new FileReader();
    
    reader.onload = function(e) {
        const logoImg = new Image();
        logoImg.onload = function() {
            // Calculate logo size (30% of QR code size)
            const logoSize = Math.min(canvas.width * 0.3, canvas.height * 0.3);
            
            // Create a container div for QR code and logo
            const container = document.createElement('div');
            container.style.position = 'relative';
            container.style.display = 'inline-block';
            
            // Add QR code to container
            container.appendChild(canvas);
            
            // Create logo image element
            const logoElement = document.createElement('img');
            logoElement.src = e.target.result;
            logoElement.style.position = 'absolute';
            logoElement.style.top = '50%';
            logoElement.style.left = '50%';
            logoElement.style.transform = 'translate(-50%, -50%)';
            logoElement.style.width = `${logoSize}px`;
            logoElement.style.height = `${logoSize}px`;
            logoElement.style.borderRadius = rounded ? '5px' : '0';
            logoElement.style.objectFit = 'contain';
            logoElement.style.backgroundColor = qrBgColor.value;
            logoElement.style.padding = '5px';
            
            // Add logo to container
            container.appendChild(logoElement);
            
            // Add container to output
            qrOutput.appendChild(container);
            
            finalizeQRGeneration(container);
        };
        logoImg.src = e.target.result;
    };
    
    reader.readAsDataURL(logoFile);
}

// Finalize QR generation
function finalizeQRGeneration(qrElement) {
    generatedQR = qrElement;
    downloadBtn.disabled = false;
    showStatus('QR code generated successfully!', 'success');
    
    // Add to history
    addToHistory(qrElement.outerHTML);
    
    Swal.fire({
        title: 'QR Code Generated!',
        text: 'Your custom QR code is ready.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// Download QR Code
function downloadQRCode() {
    if (!generatedQR) {
        showError('No QR code to download. Please generate first.');
        Swal.fire({
            title: 'No QR Code',
            text: 'No QR code to download. Please generate first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }
    
    // Create a temporary canvas for download
    const tempCanvas = document.createElement('canvas');
    const ctx = tempCanvas.getContext('2d');
    const size = parseInt(qrSize.value);
    
    tempCanvas.width = size;
    tempCanvas.height = size;
    
    // Fill background
    ctx.fillStyle = qrBgColor.value;
    ctx.fillRect(0, 0, size, size);
    
    // Draw QR code
    if (generatedQR.tagName === 'CANVAS') {
        // Direct QR code canvas
        ctx.drawImage(generatedQR, 0, 0, size, size);
    } else {
        // Container with logo - we need to draw both elements
        const qrCanvas = generatedQR.querySelector('canvas');
        const logoImg = generatedQR.querySelector('img');
        
        if (qrCanvas) {
            ctx.drawImage(qrCanvas, 0, 0, size, size);
            
            if (logoImg) {
                // Calculate logo position and size
                const logoSize = Math.min(size * 0.3, size * 0.3);
                const x = (size - logoSize) / 2;
                const y = (size - logoSize) / 2;
                
                // Create logo image for drawing
                const logo = new Image();
                logo.onload = function() {
                    // Draw rounded rect background
                    if (qrRounded.checked) {
                        ctx.fillStyle = qrBgColor.value;
                        ctx.beginPath();
                        ctx.roundRect(x-5, y-5, logoSize+10, logoSize+10, 5);
                        ctx.fill();
                    }
                    
                    // Draw logo
                    ctx.drawImage(logo, x, y, logoSize, logoSize);
                    
                    // Trigger download
                    triggerDownload(tempCanvas);
                };
                logo.src = logoImg.src;
                return;
            }
        }
    }
    
    // Trigger download if no logo processing needed
    triggerDownload(tempCanvas);
}

function triggerDownload(canvas) {
    const link = document.createElement('a');
    link.download = 'qr-code.png';
    link.href = canvas.toDataURL('image/png');
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    
    showStatus('QR code downloaded!', 'success');
    
    Swal.fire({
        title: 'Downloaded!',
        text: 'QR code has been downloaded.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// History Functions
function addToHistory(qrCodeHTML) {
    const typeText = qrType.options[qrType.selectedIndex].text;
    
    const historyItem = {
        id: Date.now(),
        type: typeText,
        qrCode: qrCodeHTML,
        date: new Date().toLocaleString()
    };

    qrHistory.unshift(historyItem);
    if (qrHistory.length > 10) {
        qrHistory.pop();
    }

    localStorage.setItem('qrHistory', JSON.stringify(qrHistory));
    displayHistory();
}

function displayHistory() {
    if (qrHistory.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    historyList.innerHTML = '';
    qrHistory.forEach(item => {
        const tr = document.createElement('tr');
        
        tr.innerHTML = `
            <td>
                <button class="btn btn-sm btn-outline-danger delete-history" data-id="${item.id}" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
            <td>${item.type}</td>
            <td>
                <div style="width: 50px; height: 50px; overflow: hidden; display: inline-block;">
                    ${item.qrCode}
                </div>
            </td>
            <td>${item.date}</td>
            <td class="text-end">
                <button class="btn btn-sm btn-outline-secondary copy-history" data-id="${item.id}" title="Copy">
                    <i class="fas fa-copy"></i>
                </button>
                <button class="btn btn-sm btn-outline-primary download-history ms-1" data-id="${item.id}" title="Download">
                    <i class="fas fa-download"></i>
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

    document.querySelectorAll('.copy-history').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            copyHistoryItem(id);
        });
    });

    document.querySelectorAll('.download-history').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            downloadHistoryItem(id);
        });
    });

    historyContainer.style.display = 'block';
}

function deleteHistoryItem(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to recover this QR code!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            qrHistory = qrHistory.filter(item => item.id !== id);
            localStorage.setItem('qrHistory', JSON.stringify(qrHistory));
            displayHistory();
        }
    });
}

function copyHistoryItem(id) {
    const item = qrHistory.find(item => item.id === id);
    if (!item) return;

    // Create temporary element to select QR code
    const tempDiv = document.createElement('div');
    tempDiv.innerHTML = item.qrCode;
    document.body.appendChild(tempDiv);
    
    // Select the QR code
    const range = document.createRange();
    range.selectNode(tempDiv);
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);
    
    try {
        document.execCommand('copy');
        showStatus('QR code copied to clipboard!', 'success');
        
        Swal.fire({
            title: 'Copied!',
            text: 'QR code has been copied to your clipboard.',
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    } catch (err) {
        showError('Failed to copy QR code');
        console.error('Failed to copy QR code: ', err);
    }
    
    document.body.removeChild(tempDiv);
}

function downloadHistoryItem(id) {
    const item = qrHistory.find(item => item.id === id);
    if (!item) return;

    // Create temporary canvas for download
    const tempDiv = document.createElement('div');
    tempDiv.innerHTML = item.qrCode;
    document.body.appendChild(tempDiv);
    
    const qrElement = tempDiv.firstChild;
    const tempCanvas = document.createElement('canvas');
    const ctx = tempCanvas.getContext('2d');
    const size = 300; // Standard size for history downloads
    
    tempCanvas.width = size;
    tempCanvas.height = size;
    
    // Fill background
    ctx.fillStyle = '#ffffff';
    ctx.fillRect(0, 0, size, size);
    
    // Draw QR code
    if (qrElement.tagName === 'CANVAS') {
        // Direct QR code canvas
        ctx.drawImage(qrElement, 0, 0, size, size);
    } else if (qrElement.tagName === 'DIV') {
        // Container with logo
        const qrCanvas = qrElement.querySelector('canvas');
        const logoImg = qrElement.querySelector('img');
        
        if (qrCanvas) {
            ctx.drawImage(qrCanvas, 0, 0, size, size);
            
            if (logoImg) {
                // Calculate logo position and size
                const logoSize = Math.min(size * 0.3, size * 0.3);
                const x = (size - logoSize) / 2;
                const y = (size - logoSize) / 2;
                
                // Create logo image for drawing
                const logo = new Image();
                logo.onload = function() {
                    // Draw rounded rect background
                    ctx.fillStyle = '#ffffff';
                    ctx.beginPath();
                    ctx.roundRect(x-5, y-5, logoSize+10, logoSize+10, 5);
                    ctx.fill();
                    
                    // Draw logo
                    ctx.drawImage(logo, x, y, logoSize, logoSize);
                    
                    // Trigger download
                    triggerDownload(tempCanvas);
                    document.body.removeChild(tempDiv);
                };
                logo.src = logoImg.src;
                return;
            }
        }
    }
    
    // Trigger download if no logo processing needed
    triggerDownload(tempCanvas);
    document.body.removeChild(tempDiv);
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