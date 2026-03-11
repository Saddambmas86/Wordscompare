<?php
// SEO and Page Metadata
$page_title = "Speech to PDF Converter - Convert Voice to PDF Online Free"; // You may Change the Title here
$page_description = "Convert speech to PDF online for free. Record or transcribe your voice and convert speech to text into a PDF document. Fast, accurate, and easy to use."; // Put your Description here
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
                    <h1 class="h2">Speech to PDF Converter <i class="fas fa-microphone text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Convert your spoken words into written text, then save them as a professional PDF document.</p>
                </header>

                <div id="speechInputArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-microphone-alt fa-3x text-muted mb-3"></i>
                    <h5 id="speech-heading">Click the microphone to start speaking...</h5>
                    <p class="text-muted mb-3">Your speech will be transcribed into the text area below.</p>
                    <button type="button" class="btn btn-danger btn-lg" id="startRecordingBtn">
                        <i class="fas fa-microphone me-2"></i> Start Recording
                    </button>
                    <button type="button" class="btn btn-warning btn-lg d-none" id="stopRecordingBtn">
                        <i class="fas fa-stop-circle me-2"></i> Stop Recording
                    </button>
                    <div id="speechStatus" class="mt-3 small text-muted"></div>
                </div>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Conversion Options</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="languageSelect" class="form-label">Language</label>
                                <select id="languageSelect" class="form-select">
                                    <option value="en-US" selected>English (US)</option>
                                    <option value="en-GB">English (UK)</option>
                                    <option value="es-ES">Spanish (Spain)</option>
                                    <option value="fr-FR">French (France)</option>
                                    <option value="de-DE">German (Germany)</option>
                                    <option value="hi-IN">Hindi (India)</option>
                                    <option value="bn-IN">Bengali (India)</option>
                                    <option value="te-IN">Telugu (India)</option>
                                    <option value="kn-IN">Kannada (India)</option>
                                    <option value="ta-IN">Tamil (India)</option>
                                    <option value="ml-IN">Malayalam (India)</option>
                                    <option value="pa-IN">Punjabi (India)</option>
                                    <option value="gu-IN">Gujarati (India)</option>
                                    <option value="mr-IN">Marathi (India)</option>
                                    <option value="ur-PK">Urdu (Pakistan)</option>
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
                            <div class="col-md-6">
                                <label for="fontSize" class="form-label">Font Size (PDF)</label>
                                <select id="fontSize" class="form-select">
                                    <option value="10">10 (Standard)</option>
                                    <option value="12">12</option>
                                    <option value="14">14</option>
                                    <option value="16">16</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="addTimestamp">
                                    <label class="form-check-label" for="addTimestamp">
                                        Add timestamp to each line
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
                        <i class="fas fa-file-pdf me-2"></i> Convert to PDF
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
                        <h5 class="mb-0"><i class="fas fa-font me-2"></i>Transcribed Text Preview</h5>
                    </div>
                    <div class="card-body p-0">
                        <textarea id="transcribedText" class="form-control" rows="10" placeholder="Your transcribed text will appear here..." readonly></textarea>
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
                <?php include '../../views/content/speech-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
// JavaScript for Speech to PDF Converter
let recognition;
let finalTranscript = '';
let interimTranscript = '';
let recordingStartTime = 0;
let isRecording = false;
let history = JSON.parse(localStorage.getItem('speechConversionHistory')) || [];

// Initialize elements
const startRecordingBtn = document.getElementById('startRecordingBtn');
const stopRecordingBtn = document.getElementById('stopRecordingBtn');
const transcribedText = document.getElementById('transcribedText');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const speechStatus = document.getElementById('speechStatus');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const languageSelect = document.getElementById('languageSelect');


// Event Listeners
startRecordingBtn.addEventListener('click', startRecording);
stopRecordingBtn.addEventListener('click', stopRecording);
convertBtn.addEventListener('click', convertTextToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Check for SpeechRecognition API support
if (!('webkitSpeechRecognition' in window) && !('SpeechRecognition' in window)) {
    speechStatus.textContent = 'Speech Recognition is not supported in this browser. Please use Chrome or Edge.';
    speechStatus.className = 'mt-3 small text-danger';
    startRecordingBtn.disabled = true;
    convertBtn.disabled = true;
} else {
    // Check if running on HTTPS or localhost
    const isSecureContext = window.isSecureContext || location.hostname === 'localhost' || location.hostname === '127.0.0.1';
    if (!isSecureContext && location.protocol !== 'https:') {
        speechStatus.textContent = 'Microphone access requires HTTPS. Please use https://localhost or check browser settings.';
        speechStatus.className = 'mt-3 small text-warning';
    }
    
    // Update language when changed
    languageSelect.addEventListener('change', () => {
        Swal.fire({
            title: 'Language Changed',
            text: `Speech recognition language set to ${languageSelect.options[languageSelect.selectedIndex].text}.`,
            icon: 'info',
            confirmButtonText: 'OK',
            timer: 1500,
            timerProgressBar: true
        });
    });
}

// Create a new recognition instance
function createRecognition() {
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    const rec = new SpeechRecognition();
    rec.continuous = false; // Don't use continuous mode - it's buggy in many browsers
    rec.interimResults = true;
    rec.lang = languageSelect.value;
    
    rec.onstart = function() {
        isRecording = true;
        speechStatus.textContent = 'Listening... Speak clearly.';
        speechStatus.className = 'mt-3 small text-success';
        startRecordingBtn.classList.add('d-none');
        stopRecordingBtn.classList.remove('d-none');
        convertBtn.disabled = true;
        downloadBtn.disabled = true;
        recordingStartTime = Date.now();
        console.log('Recognition started');
    };

    rec.onresult = function(event) {
        interimTranscript = '';
        for (let i = event.resultIndex; i < event.results.length; ++i) {
            if (event.results[i].isFinal) {
                let timestamp = '';
                if (document.getElementById('addTimestamp').checked) {
                    const elapsed = Date.now() - recordingStartTime;
                    const minutes = Math.floor(elapsed / 60000);
                    const seconds = Math.floor((elapsed % 60000) / 1000);
                    timestamp = `[${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}] `;
                }
                finalTranscript += timestamp + event.results[i][0].transcript + '\n';
            } else {
                interimTranscript += event.results[i][0].transcript;
            }
        }
        transcribedText.value = finalTranscript + interimTranscript;
        transcribedText.scrollTop = transcribedText.scrollHeight;
        convertBtn.disabled = false;
    };

    rec.onerror = function(event) {
        console.error('Speech recognition error:', event.error);
        if (event.error === 'no-speech') {
            speechStatus.textContent = 'No speech detected. Try again...';
            speechStatus.className = 'mt-3 small text-warning';
        } else if (event.error === 'not-allowed') {
            speechStatus.textContent = 'Microphone access denied. Please allow microphone permissions.';
            speechStatus.className = 'mt-3 small text-danger';
        } else if (event.error === 'aborted') {
            speechStatus.textContent = 'Recording stopped.';
            speechStatus.className = 'mt-3 small text-info';
        } else if (event.error === 'network') {
            speechStatus.textContent = 'Network error. Check your internet connection.';
            speechStatus.className = 'mt-3 small text-danger';
        } else if (event.error === 'service-not-allowed') {
            speechStatus.textContent = 'Speech service not available. Try Chrome browser.';
            speechStatus.className = 'mt-3 small text-danger';
        } else {
            speechStatus.textContent = `Error: ${event.error}`;
            speechStatus.className = 'mt-3 small text-danger';
        }
        isRecording = false;
    };

    rec.onend = function() {
        console.log('Recognition ended');
        isRecording = false;
        speechStatus.textContent = 'Recording stopped.';
        speechStatus.className = 'mt-3 small text-info';
        startRecordingBtn.classList.remove('d-none');
        stopRecordingBtn.classList.add('d-none');
        if (finalTranscript.trim().length > 0) {
            convertBtn.disabled = false;
        }
    };
    
    return rec;
}

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to Speech to PDF Converter',
        html: `Follow these steps to convert your speech to PDFs:<br><br>
        <ol class="text-start">
            <li>Click "Start Recording" and allow microphone access.</li>
            <li>Speak clearly; your words will appear in the text preview.</li>
            <li>Click "Stop Recording" when done. Review and edit text if needed.</li>
            <li>Adjust PDF options like page size, orientation, and font size.</li>
            <li>Click "Convert to PDF" and then "Download PDF".</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    stopRecording(); // Ensure recognition is stopped
    finalTranscript = '';
    interimTranscript = '';
    transcribedText.value = '';
    speechStatus.textContent = '';
    startRecordingBtn.classList.remove('d-none');
    stopRecordingBtn.classList.add('d-none');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('languageSelect').value = 'en-US';
    document.getElementById('pageSize').value = 'A4';
    document.getElementById('orientation').value = 'portrait';
    document.getElementById('fontSize').value = '10';
    document.getElementById('addTimestamp').checked = false;
    document.getElementById('addPageNumbers').checked = false;
    
    Swal.fire({
        title: 'Reset Complete',
        text: 'All data and options have been reset.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

function startRecording() {
    if (!('webkitSpeechRecognition' in window) && !('SpeechRecognition' in window)) {
        showError('Speech Recognition not available.');
        return;
    }
    
    // Check if recognition is already running
    if (isRecording) {
        console.log('Recording is already in progress');
        return;
    }
    
    // Create a fresh recognition instance
    recognition = createRecognition();
    
    finalTranscript = ''; // Clear previous transcript
    transcribedText.value = ''; // Clear text area
    
    try {
        recognition.start();
        console.log('Recognition started');
    } catch (e) {
        console.error('Error starting recognition:', e);
        speechStatus.textContent = 'Could not start recording. Error: ' + e.message;
        speechStatus.className = 'mt-3 small text-danger';
        isRecording = false;
    }
}

function stopRecording() {
    if (recognition) {
        try {
            recognition.stop();
        } catch (e) {
            console.error('Error stopping recognition:', e);
        }
        isRecording = false;
    }
}

// Convert Transcribed Text to PDF
async function convertTextToPdf() {
    const textToConvert = transcribedText.value.trim();
    if (textToConvert.length === 0) {
        showError('No text to convert. Please record some speech first.');
        Swal.fire({
            title: 'No Text',
            text: 'No text to convert. Please record some speech first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting text to PDF...', 'info');
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
        const addPageNumbers = document.getElementById('addPageNumbers').checked;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        doc.setFontSize(fontSize);
        const margin = 40;
        const pageWidth = doc.internal.pageSize.getWidth();
        const lineHeight = fontSize * 1.2;
        let y = margin;

        const lines = doc.splitTextToSize(textToConvert, pageWidth - 2 * margin);

        lines.forEach(line => {
            if (y + lineHeight > doc.internal.pageSize.getHeight() - margin) {
                if (addPageNumbers) {
                    let str = "Page " + doc.internal.getNumberOfPages();
                    doc.setFontSize(8);
                    doc.text(str, pageWidth - margin, doc.internal.pageSize.getHeight() - 10);
                }
                doc.addPage();
                y = margin;
            }
            doc.text(line, margin, y);
            y += lineHeight;
        });
        
        if (addPageNumbers) {
            let str = "Page " + doc.internal.getNumberOfPages();
            doc.setFontSize(8);
            doc.text(str, pageWidth - margin, doc.internal.pageSize.getHeight() - 10);
        }

        const fileName = `SpeechToText_${new Date().getTime()}.pdf`;
        
        // Add to history
        addToHistory({
            fileName: fileName,
            date: new Date().toLocaleString(),
            format: 'pdf',
            text: textToConvert, // Store the transcribed text
            options: { // Store options needed for regeneration
                pageSize: pageSize,
                orientation: orientation,
                fontSize: fontSize,
                addPageNumbers: addPageNumbers
            }
        });
        
        showStatus('Conversion complete! Click Download PDF.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your speech has been successfully converted to PDF.',
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
    const textToConvert = transcribedText.value.trim();
    if (textToConvert.length === 0) {
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
    
    // Show loading alert
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
        const addPageNumbers = document.getElementById('addPageNumbers').checked;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        doc.setFontSize(fontSize);
        const margin = 40;
        const pageWidth = doc.internal.pageSize.getWidth();
        const lineHeight = fontSize * 1.2;
        let y = margin;

        const lines = doc.splitTextToSize(textToConvert, pageWidth - 2 * margin);

        lines.forEach(line => {
            if (y + lineHeight > doc.internal.pageSize.getHeight() - margin) {
                if (addPageNumbers) {
                    let str = "Page " + doc.internal.getNumberOfPages();
                    doc.setFontSize(8);
                    doc.text(str, pageWidth - margin, doc.internal.pageSize.getHeight() - 10);
                }
                doc.addPage();
                y = margin;
            }
            doc.text(line, margin, y);
            y += lineHeight;
        });

        if (addPageNumbers) {
            let str = "Page " + doc.internal.getNumberOfPages();
            doc.setFontSize(8);
            doc.text(str, pageWidth - margin, doc.internal.pageSize.getHeight() - 10);
        }

        const fileName = `SpeechToText_${new Date().getTime()}.pdf`;
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
        text: item.text, // Store transcribed text
        options: item.options // Store conversion options
    };

    history.unshift(historyItem);
    if (history.length > 10) {
        history.pop();
    }

    localStorage.setItem('speechConversionHistory', JSON.stringify(history));
    displayHistory();
}

function displayHistory() {
    if (history.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    historyList.innerHTML = '';
    history.forEach(item => {
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
            history = history.filter(item => item.id !== id);
            localStorage.setItem('speechConversionHistory', JSON.stringify(history));
            displayHistory();
        }
    });
}

function downloadHistoryItem(id) {
    const item = history.find(item => item.id === id);
    if (!item || !item.text) return;

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
        // Regenerate PDF using stored text and options
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(item.options.orientation, 'pt', item.options.pageSize);

        doc.setFontSize(item.options.fontSize);
        const margin = 40;
        const pageWidth = doc.internal.pageSize.getWidth();
        const lineHeight = item.options.fontSize * 1.2;
        let y = margin;

        const lines = doc.splitTextToSize(item.text, pageWidth - 2 * margin);

        lines.forEach(line => {
            if (y + lineHeight > doc.internal.pageSize.getHeight() - margin) {
                if (item.options.addPageNumbers) {
                    let str = "Page " + doc.internal.getNumberOfPages();
                    doc.setFontSize(8);
                    doc.text(str, pageWidth - margin, doc.internal.pageSize.getHeight() - 10);
                }
                doc.addPage();
                y = margin;
            }
            doc.text(line, margin, y);
            y += lineHeight;
        });

        if (item.options.addPageNumbers) {
            let str = "Page " + doc.internal.getNumberOfPages();
            doc.setFontSize(8);
            doc.text(str, pageWidth - margin, doc.internal.pageSize.getHeight() - 10);
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
    const item = history.find(item => item.id === id);
    if (!item || !item.text) return;

    transcribedText.value = item.text;
    
    // Set conversion options from history for preview consistency
    document.getElementById('pageSize').value = item.options.pageSize;
    document.getElementById('orientation').value = item.options.orientation;
    document.getElementById('fontSize').value = item.options.fontSize;
    document.getElementById('addPageNumbers').checked = item.options.addPageNumbers;

    // Note: language and timestamp options from history are not applied to the live recognition,
    // only for regenerating the PDF if downloaded from history.
    // The current UI's 'addTimestamp' checkbox would control live display.
    // For simplicity, we just set the text and the PDF options.

    showStatus(`Previewing ${item.fileName}`, 'info');
    convertBtn.disabled = false;
    downloadBtn.disabled = false;
    
    // Scroll to preview area
    transcribedText.scrollIntoView({ behavior: 'smooth' });
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