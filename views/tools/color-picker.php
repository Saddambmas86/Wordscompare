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
                    <h1 class="h2">Color Picker <i class="fas fa-eye-dropper text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Extract colors from images or create beautiful color palettes.</p>
                </header>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-sliders-h me-2"></i>Color Selection</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="colorInput" class="form-label">Choose a Color</label>
                                <input type="color" class="form-control form-control-color w-100" id="colorInput" value="#ff0000">
                            </div>
                            <div class="col-md-6">
                                <label for="imageUpload" class="form-label">Or Upload Image</label>
                                <input type="file" class="form-control" id="imageUpload" accept="image/*">
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeHex" checked>
                                    <label class="form-check-label" for="includeHex">
                                        Include HEX Value
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeRGB" checked>
                                    <label class="form-check-label" for="includeRGB">
                                        Include RGB Value
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeHSL" checked>
                                    <label class="form-check-label" for="includeHSL">
                                        Include HSL Value
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="generateQR" checked>
                                    <label class="form-check-label" for="generateQR">
                                        Generate QR Code
                                    </label>
                                </div>
                            </div>
                            <div class="col-12" id="logoUploadContainer">
                                <label for="logoUpload" class="form-label">Add Logo to QR Code (Optional)</label>
                                <input type="file" class="form-control" id="logoUpload" accept="image/*">
                                <small class="text-muted">Recommended size: 100x100px (will be resized automatically)</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="generateBtn">
                        <i class="fas fa-bolt me-2"></i> Generate
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                    <button class="btn btn-success btn-md px-2" id="copyBtn" disabled>
                        <i class="fas fa-copy me-2"></i> Copy
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="preview-area card mt-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-palette me-2"></i>Color Information</h5>
                        <span class="badge bg-info" id="colorTypeBadge">HEX</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="color-display rounded-3 mb-3" id="colorDisplay" style="height: 200px; background-color: #ff0000;"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="color-values mb-3">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text">HEX</span>
                                        <input type="text" class="form-control font-monospace" id="hexValue" value="#ff0000" readonly>
                                        <button class="btn btn-outline-secondary copy-value" data-target="hexValue">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text">RGB</span>
                                        <input type="text" class="form-control font-monospace" id="rgbValue" value="rgb(255, 0, 0)" readonly>
                                        <button class="btn btn-outline-secondary copy-value" data-target="rgbValue">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text">HSL</span>
                                        <input type="text" class="form-control font-monospace" id="hslValue" value="hsl(0, 100%, 50%)" readonly>
                                        <button class="btn btn-outline-secondary copy-value" data-target="hslValue">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="qr-area card mt-4" id="qrContainer">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-qrcode me-2"></i>QR Code</h5>
                    </div>
                    <div class="card-body text-center">
                        <div id="qrCodeOutput" class="mb-3"></div>
                        <div class="btn-group">
                            <button class="btn btn-outline-primary" id="downloadQR">
                                <i class="fas fa-download me-2"></i> Download
                            </button>
                            <button class="btn btn-outline-success" id="shareQR">
                                <i class="fas fa-share-alt me-2"></i> Share
                            </button>
                        </div>
                    </div>
                </div>

                <div class="history-area card mt-4" id="historyContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Color History (Last 10)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="historyTable">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th>Color</th>
                                        <th>HEX</th>
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
                <?php include '../../views/content/color-picker-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<!-- Include QR Code library -->
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

<script>
// JavaScript for Color Picker
let selectedColor = '#ff0000';
let colorHistory = JSON.parse(localStorage.getItem('colorHistory')) || [];

// Initialize elements
const colorInput = document.getElementById('colorInput');
const imageUpload = document.getElementById('imageUpload');
const generateBtn = document.getElementById('generateBtn');
const copyBtn = document.getElementById('copyBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const colorDisplay = document.getElementById('colorDisplay');
const hexValue = document.getElementById('hexValue');
const rgbValue = document.getElementById('rgbValue');
const hslValue = document.getElementById('hslValue');
const statusArea = document.getElementById('statusArea');
const colorTypeBadge = document.getElementById('colorTypeBadge');
const qrCodeOutput = document.getElementById('qrCodeOutput');
const qrContainer = document.getElementById('qrContainer');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const downloadQR = document.getElementById('downloadQR');
const shareQR = document.getElementById('shareQR');
const logoUpload = document.getElementById('logoUpload');
const logoUploadContainer = document.getElementById('logoUploadContainer');

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    updateColorFromPicker();
    displayHistory(); // Load history when page loads
});

// Event Listeners
colorInput.addEventListener('input', updateColorFromPicker);
imageUpload.addEventListener('change', handleImageUpload);
generateBtn.addEventListener('click', generateColorInfo);
copyBtn.addEventListener('click', copyColorValues);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
downloadQR.addEventListener('click', downloadQRCode);
shareQR.addEventListener('click', shareQRCode);
document.querySelectorAll('.copy-value').forEach(btn => {
    btn.addEventListener('click', (e) => {
        const target = e.currentTarget.getAttribute('data-target');
        copyToClipboard(document.getElementById(target).value);
        showStatus(`${target.toUpperCase()} value copied!`, 'success');
    });
});

// Initialize QR code container visibility
qrContainer.style.display = 'none';
logoUploadContainer.style.display = document.getElementById('generateQR').checked ? 'block' : 'none';

// Show/hide logo upload based on QR code checkbox
document.getElementById('generateQR').addEventListener('change', function() {
    logoUploadContainer.style.display = this.checked ? 'block' : 'none';
    if (!this.checked) {
        qrContainer.style.display = 'none';
    }
});

// Update color from picker
function updateColorFromPicker() {
    selectedColor = colorInput.value;
    colorDisplay.style.backgroundColor = selectedColor;
}

// Handle image upload
function handleImageUpload(e) {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(event) {
        const img = new Image();
        img.onload = function() {
            // Create canvas to extract dominant color
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            canvas.width = img.width;
            canvas.height = img.height;
            ctx.drawImage(img, 0, 0);
            
            // Get image data
            const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height).data;
            
            // Simple dominant color extraction (could be enhanced)
            let r = 0, g = 0, b = 0, count = 0;
            for (let i = 0; i < imageData.length; i += 4) {
                r += imageData[i];
                g += imageData[i + 1];
                b += imageData[i + 2];
                count++;
            }
            
            // Calculate average color
            r = Math.round(r / count);
            g = Math.round(g / count);
            b = Math.round(b / count);
            
            // Convert to HEX
            selectedColor = rgbToHex(r, g, b);
            colorInput.value = selectedColor;
            colorDisplay.style.backgroundColor = selectedColor;
            
            showStatus('Dominant color extracted from image!', 'success');
        };
        img.src = event.target.result;
    };
    reader.readAsDataURL(file);
}

// Generate color information
function generateColorInfo() {
    // Update color display
    colorDisplay.style.backgroundColor = selectedColor;
    
    // Generate color values
    const hex = selectedColor;
    const rgb = hexToRgb(selectedColor);
    const hsl = rgbToHsl(rgb.r, rgb.g, rgb.b);
    
    // Update values based on checkboxes
    hexValue.value = document.getElementById('includeHex').checked ? hex : '';
    rgbValue.value = document.getElementById('includeRGB').checked ? `rgb(${rgb.r}, ${rgb.g}, ${rgb.b})` : '';
    hslValue.value = document.getElementById('includeHSL').checked ? `hsl(${hsl.h}, ${hsl.s}%, ${hsl.l}%)` : '';
    
    // Generate QR code if enabled
    if (document.getElementById('generateQR').checked) {
        generateQRCode(hex, rgb, hsl);
        qrContainer.style.display = 'block';
    } else {
        qrContainer.style.display = 'none';
    }
    
    // Update UI
    copyBtn.disabled = false;
    showStatus('Color information generated!', 'success');
    
    // Add to history
    addToHistory(hex, rgb, hsl);
    
    Swal.fire({
        title: 'Success!',
        text: 'Color information has been generated.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// Generate QR Code
function generateQRCode(hex, rgb, hsl) {
    // Clear previous QR code
    qrCodeOutput.innerHTML = '';
    
    // Create data string for QR code
    let qrData = '';
    if (document.getElementById('includeHex').checked) qrData += `HEX: ${hex}\n`;
    if (document.getElementById('includeRGB').checked) qrData += `RGB: rgb(${rgb.r}, ${rgb.g}, ${rgb.b})\n`;
    if (document.getElementById('includeHSL').checked) qrData += `HSL: hsl(${hsl.h}, ${hsl.s}%, ${hsl.l}%)\n`;
    
    // Create QR code
    const qrcode = new QRCode(qrCodeOutput, {
        text: qrData.trim(),
        width: 200,
        height: 200,
        colorDark: hex,
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
    });
    
    // Add logo if uploaded
    if (logoUpload.files.length > 0) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const logoImg = new Image();
            logoImg.onload = function() {
                // Create canvas to add logo to QR code
                const canvas = document.createElement('canvas');
                canvas.width = 200;
                canvas.height = 200;
                const ctx = canvas.getContext('2d');
                
                // Draw QR code
                const qrImg = qrCodeOutput.querySelector('img');
                ctx.drawImage(qrImg, 0, 0, 200, 200);
                
                // Draw logo in center
                const logoSize = 40; // Size of logo in QR code
                const x = (200 - logoSize) / 2;
                const y = (200 - logoSize) / 2;
                ctx.drawImage(logoImg, x, y, logoSize, logoSize);
                
                // Replace QR code with new image
                qrImg.src = canvas.toDataURL('image/png');
            };
            logoImg.src = e.target.result;
        };
        reader.readAsDataURL(logoUpload.files[0]);
    }
}

// Download QR Code
function downloadQRCode() {
    const qrImg = qrCodeOutput.querySelector('img');
    if (!qrImg) {
        showError('No QR code to download. Please generate first.');
        return;
    }
    
    const link = document.createElement('a');
    link.download = `color-qr-${selectedColor.replace('#', '')}.png`;
    link.href = qrImg.src;
    link.click();
}

// Share QR Code
function shareQRCode() {
    const qrImg = qrCodeOutput.querySelector('img');
    if (!qrImg) {
        showError('No QR code to share. Please generate first.');
        return;
    }
    
    if (navigator.share) {
        navigator.share({
            title: 'My Color QR Code',
            text: `Check out this color: ${selectedColor}`,
            url: qrImg.src
        }).catch(err => {
            console.log('Error sharing:', err);
        });
    } else {
        // Fallback for browsers without Web Share API
        copyToClipboard(qrImg.src);
        showStatus('QR code image URL copied to clipboard!', 'success');
    }
}

// Copy Color Values
function copyColorValues() {
    let textToCopy = '';
    if (document.getElementById('includeHex').checked) textToCopy += `HEX: ${hexValue.value}\n`;
    if (document.getElementById('includeRGB').checked) textToCopy += `RGB: ${rgbValue.value}\n`;
    if (document.getElementById('includeHSL').checked) textToCopy += `HSL: ${hslValue.value}\n`;
    
    copyToClipboard(textToCopy.trim());
    showStatus('Color values copied to clipboard!', 'success');
    
    Swal.fire({
        title: 'Copied!',
        text: 'Color values have been copied to your clipboard.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to Color Picker',
        html: `Follow these steps to work with colors:<br><br>
        <ol class="text-start">
            <li>Choose a color using the color picker or upload an image to extract colors.</li>
            <li>Select which color formats to include (HEX, RGB, HSL).</li>
            <li>Optionally generate a QR code for easy sharing.</li>
            <li>Add your logo to customize the QR code (optional).</li>
            <li>Copy color values or download/share the QR code.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    colorInput.value = '#ff0000';
    selectedColor = '#ff0000';
    imageUpload.value = '';
    logoUpload.value = '';
    document.getElementById('includeHex').checked = true;
    document.getElementById('includeRGB').checked = true;
    document.getElementById('includeHSL').checked = true;
    document.getElementById('generateQR').checked = true;
    
    colorDisplay.style.backgroundColor = selectedColor;
    hexValue.value = '#ff0000';
    rgbValue.value = 'rgb(255, 0, 0)';
    hslValue.value = 'hsl(0, 100%, 50%)';
    qrCodeOutput.innerHTML = '';
    qrContainer.style.display = 'none';
    statusArea.textContent = '';
    copyBtn.disabled = true;
    colorTypeBadge.textContent = 'HEX';
    colorTypeBadge.className = 'badge bg-info';
}

// History Functions
function addToHistory(hex, rgb, hsl) {
    const historyItem = {
        id: Date.now(),
        hex: hex,
        rgb: rgb,
        hsl: hsl,
        date: new Date().toLocaleString()
    };

    colorHistory.unshift(historyItem);
    if (colorHistory.length > 10) {
        colorHistory.pop();
    }

    localStorage.setItem('colorHistory', JSON.stringify(colorHistory));
    displayHistory();
}

function displayHistory() {
    if (colorHistory.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    historyList.innerHTML = '';
    colorHistory.forEach(item => {
        const tr = document.createElement('tr');
        
        tr.innerHTML = `
            <td>
                <button class="btn btn-sm btn-outline-danger delete-history" data-id="${item.id}" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
            <td>
                <div style="width: 20px; height: 20px; background-color: ${item.hex}; border: 1px solid #ddd;"></div>
            </td>
            <td class="font-monospace">${item.hex}</td>
            <td>${item.date}</td>
            <td class="text-end">
                <button class="btn btn-sm btn-outline-secondary copy-history" data-id="${item.id}" title="Copy">
                    <i class="fas fa-copy"></i>
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

    document.querySelectorAll('.copy-history').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            copyHistoryItem(id);
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
        text: "You won't be able to recover this color!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            colorHistory = colorHistory.filter(item => item.id !== id);
            localStorage.setItem('colorHistory', JSON.stringify(colorHistory));
            displayHistory();
        }
    });
}

function copyHistoryItem(id) {
    const item = colorHistory.find(item => item.id === id);
    if (!item) return;

    let textToCopy = `HEX: ${item.hex}\n`;
    textToCopy += `RGB: rgb(${item.rgb.r}, ${item.rgb.g}, ${item.rgb.b})\n`;
    textToCopy += `HSL: hsl(${item.hsl.h}, ${item.hsl.s}%, ${item.hsl.l}%)`;
    
    copyToClipboard(textToCopy);
    showStatus('Color values copied to clipboard!', 'success');
    
    Swal.fire({
        title: 'Copied!',
        text: 'Color values have been copied to your clipboard.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

function previewHistoryItem(id) {
    const item = colorHistory.find(item => item.id === id);
    if (!item) return;

    // Update the current color display with the history item
    selectedColor = item.hex;
    colorInput.value = item.hex;
    colorDisplay.style.backgroundColor = item.hex;
    
    // Update the color values
    hexValue.value = item.hex;
    rgbValue.value = `rgb(${item.rgb.r}, ${item.rgb.g}, ${item.rgb.b})`;
    hslValue.value = `hsl(${item.hsl.h}, ${item.hsl.s}%, ${item.hsl.l}%)`;
    
    showStatus('Color preview loaded!', 'success');
}

// Color Conversion Functions
function hexToRgb(hex) {
    // Remove # if present
    hex = hex.replace('#', '');
    
    // Parse r, g, b values
    const r = parseInt(hex.substring(0, 2), 16);
    const g = parseInt(hex.substring(2, 4), 16);
    const b = parseInt(hex.substring(4, 6), 16);
    
    return { r, g, b };
}

function rgbToHex(r, g, b) {
    return "#" + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1);
}

function rgbToHsl(r, g, b) {
    r /= 255, g /= 255, b /= 255;
    const max = Math.max(r, g, b), min = Math.min(r, g, b);
    let h, s, l = (max + min) / 2;

    if (max === min) {
        h = s = 0; // achromatic
    } else {
        const d = max - min;
        s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
        switch (max) {
            case r: h = (g - b) / d + (g < b ? 6 : 0); break;
            case g: h = (b - r) / d + 2; break;
            case b: h = (r - g) / d + 4; break;
        }
        h /= 6;
    }

    return {
        h: Math.round(h * 360),
        s: Math.round(s * 100),
        l: Math.round(l * 100)
    };
}

// Helper Functions
function copyToClipboard(text) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    textarea.style.position = 'fixed';
    document.body.appendChild(textarea);
    textarea.select();
    
    try {
        document.execCommand('copy');
    } catch (err) {
        console.error('Failed to copy text: ', err);
    }
    
    document.body.removeChild(textarea);
}

function showStatus(message, type) {
    statusArea.textContent = message;
    statusArea.className = `text-center text-${type}`;
}

function showError(message) {
    showStatus(message, 'danger');
}
</script>

<?php include '../../includes/footer.php'; ?>