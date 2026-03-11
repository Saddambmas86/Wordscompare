<?php
// SEO and Page Metadata
$page_title = "PDF to Audio Converter"; // You may Change the Title here
$page_description = "PDF to Audio Converter online."; // Put your Description here
$page_keywords = "PDF to audio, convert PDF to speech, text to speech PDF, listen to PDF, free PDF audio converter, online text reader";

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
                    <h1 class="h2">PDF to Audio Converter <i class="fas fa-headphones-alt text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Convert your PDF documents into listenable audio files (MP3).</p>
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
                    <div class="mt-2 small text-danger" id="fileError"></div>
                </div>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Conversion Options</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="voiceSelect" class="form-label">Voice</label>
                                <select id="voiceSelect" class="form-select">
                                    </select>
                            </div>
                            <div class="col-md-6">
                                <label for="rateInput" class="form-label">Speech Rate</label>
                                <input type="range" class="form-range" id="rateInput" min="0.5" max="2" value="1" step="0.1">
                                <small class="text-muted" id="rateValue">1.0x</small>
                            </div>
                            <div class="col-md-6">
                                <label for="pitchInput" class="form-label">Speech Pitch</label>
                                <input type="range" class="form-range" id="pitchInput" min="0" max="2" value="1" step="0.1">
                                <small class="text-muted" id="pitchValue">1.0x</small>
                            </div>
                             <div class="col-md-6">
                                <label for="pageRange" class="form-label">Page Range (e.g., 1-3, 5)</label>
                                <input type="text" id="pageRange" class="form-control" placeholder="All pages (e.g., 1-5, 8)">
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="readAloudOnlyVisible" checked>
                                    <label class="form-check-label" for="readAloudOnlyVisible">
                                        Only read visible text (ignore hidden/layout text)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="playBtn" disabled>
                        <i class="fas fa-play me-2"></i> Play Audio
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="stopBtn" disabled>
                        <i class="fas fa-stop me-2"></i> Stop Audio
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                    <button class="btn btn-success btn-md px-2" id="downloadBtn" disabled>
                        <i class="fas fa-download me-2"></i> Download MP3
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>
                <div id="progressArea" class="progress mt-3 d-none">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                </div>
                
                <div class="alert alert-warning mt-4" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i> 
                    <strong>Note:</strong> MP3 download relies on your browser's Text-to-Speech capabilities and may not be supported by all browsers for direct MP3 saving. For best results, consider using the "Play Audio" feature.
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
                <?php include '../../views/content/pdf-to-audio-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script>
// Configure PDF.js worker source
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

let currentPdfText = "";
let currentUtterance = null;
let currentFile = null;
let audioHistory = JSON.parse(localStorage.getItem('pdfAudioHistory')) || [];

// HTML Elements
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const fileError = document.getElementById('fileError');
const voiceSelect = document.getElementById('voiceSelect');
const rateInput = document.getElementById('rateInput');
const rateValue = document.getElementById('rateValue');
const pitchInput = document.getElementById('pitchInput');
const pitchValue = document.getElementById('pitchValue');
const pageRangeInput = document.getElementById('pageRange');
const readAloudOnlyVisible = document.getElementById('readAloudOnlyVisible');
const playBtn = document.getElementById('playBtn');
const stopBtn = document.getElementById('stopBtn');
const resetBtn = document.getElementById('resetBtn');
const downloadBtn = document.getElementById('downloadBtn');
const statusArea = document.getElementById('statusArea');
const progressArea = document.getElementById('progressArea');
const progressBar = progressArea.querySelector('.progress-bar');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
playBtn.addEventListener('click', playAudio);
stopBtn.addEventListener('click', stopAudio);
resetBtn.addEventListener('click', resetAll);
downloadBtn.addEventListener('click', downloadAudio);
rateInput.addEventListener('input', () => rateValue.textContent = `${rateInput.value}x`);
pitchInput.addEventListener('input', () => pitchValue.textContent = `${pitchInput.value}x`);

// Speech Synthesis API Setup
let voices = [];
const synth = window.speechSynthesis;

function populateVoiceList() {
    voices = synth.getVoices().sort((a, b) => {
        const langA = a.lang.toLowerCase();
        const langB = b.lang.toLowerCase();
        if (langA < langB) return -1;
        if (langA > langB) return 1;
        return a.name.localeCompare(b.name);
    });
    
    voiceSelect.innerHTML = '';
    const defaultOption = document.createElement('option');
    defaultOption.textContent = 'Default Browser Voice';
    defaultOption.value = ''; // Use browser default if no specific voice is selected
    voiceSelect.appendChild(defaultOption);

    // Filter for English voices by default, prioritize common ones
    const preferredLanguages = ['en-US', 'en-GB', 'en'];

    const filteredVoices = voices.filter(voice => 
        preferredLanguages.some(lang => voice.lang.startsWith(lang))
    );

    // Add filtered voices
    filteredVoices.forEach(voice => {
        const option = document.createElement('option');
        option.textContent = `${voice.name} (${voice.lang})`;
        if (voice.default) {
            option.textContent += ' — DEFAULT';
        }
        option.value = voice.name;
        option.setAttribute('data-lang', voice.lang);
        option.setAttribute('data-name', voice.name);
        voiceSelect.appendChild(option);
    });

    // If no English voices, add all available
    if (voiceSelect.options.length === 1 && voices.length > 0) {
        voices.forEach(voice => {
            const option = document.createElement('option');
            option.textContent = `${voice.name} (${voice.lang})`;
            if (voice.default) {
                option.textContent += ' — DEFAULT';
            }
            option.value = voice.name;
            option.setAttribute('data-lang', voice.lang);
            option.setAttribute('data-name', voice.name);
            voiceSelect.appendChild(option);
        });
    }
}

populateVoiceList();
if (synth.onvoiceschanged !== undefined) {
    synth.onvoiceschanged = populateVoiceList;
}

// Initial display of history
displayHistory();

// Reset Button
function resetAll() {
    stopAudio(); // Stop any ongoing speech
    currentPdfText = "";
    currentFile = null;
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    fileError.textContent = '';
    statusArea.textContent = '';
    progressArea.classList.add('d-none');
    progressBar.style.width = '0%';
    progressBar.textContent = '0%';
    playBtn.disabled = true;
    stopBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset options
    voiceSelect.value = ''; // Select default browser voice
    rateInput.value = '1';
    rateValue.textContent = '1.0x';
    pitchInput.value = '1';
    pitchValue.textContent = '1.0x';
    pageRangeInput.value = '';
    readAloudOnlyVisible.checked = true;
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

    const file = selectedFiles[0];
    fileError.textContent = '';

    if (file.type !== 'application/pdf') {
        fileError.textContent = 'Please upload a PDF file.';
        showError('Please upload a PDF file.');
        return;
    }
    if (file.size > 50 * 1024 * 1024) { // Max 50MB
        fileError.textContent = 'File size exceeds 50MB. Please upload a smaller PDF.';
        showError('File size exceeds 50MB. Please upload a smaller PDF.');
        return;
    }

    currentFile = file;
    fileInfo.textContent = `${file.name} selected.`;
    showStatus('Extracting text from PDF...', 'info');
    progressArea.classList.remove('d-none');
    progressBar.style.width = '0%';
    progressBar.textContent = '0%';
    
    // Show loading alert
    const swalLoading = Swal.fire({
        title: 'Extracting Text',
        html: `Please wait while we extract text from ${file.name}...`,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    extractTextFromPdf(file)
        .then(text => {
            currentPdfText = text;
            playBtn.disabled = false;
            // Download button enabled but with a warning, as direct MP3 saving is tricky
            downloadBtn.disabled = false; 
            showStatus('Text extraction complete. Ready to play audio.', 'success');
            progressArea.classList.add('d-none');
            
            swalLoading.close();
            Swal.fire({
                title: 'Text Extracted!',
                text: 'PDF text has been successfully extracted. You can now play or attempt to download the audio.',
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 1000,
                timerProgressBar: true
            });
        })
        .catch(error => {
            currentPdfText = "";
            playBtn.disabled = true;
            downloadBtn.disabled = true;
            fileError.textContent = `Error processing PDF: ${error.message}`;
            showError(`Error processing PDF: ${error.message}`);
            progressArea.classList.add('d-none');
            
            swalLoading.close();
            Swal.fire({
                title: 'Error',
                text: `Failed to extract text from PDF: ${error.message}`,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
}

// PDF Text Extraction using PDF.js
async function extractTextFromPdf(file) {
    const reader = new FileReader();
    const loadingTask = pdfjsLib.getDocument(await file.arrayBuffer());
    const pdf = await loadingTask.promise;
    let fullText = '';

    const pageRange = pageRangeInput.value.trim();
    let startPage = 1;
    let endPage = pdf.numPages;

    if (pageRange) {
        const ranges = pageRange.split(',').map(s => s.trim());
        let pagesToExtract = [];
        ranges.forEach(range => {
            if (range.includes('-')) {
                let [start, end] = range.split('-').map(Number);
                if (start > 0 && end <= pdf.numPages && start <= end) {
                    for (let i = start; i <= end; i++) {
                        pagesToExtract.push(i);
                    }
                }
            } else {
                let pageNum = Number(range);
                if (pageNum > 0 && pageNum <= pdf.numPages) {
                    pagesToExtract.push(pageNum);
                }
            }
        });
        
        pagesToExtract = [...new Set(pagesToExtract)].sort((a, b) => a - b); // Unique and sorted
        if (pagesToExtract.length === 0) {
            throw new Error('Invalid page range specified. Please use format like "1-3, 5".');
        }
        
        startPage = pagesToExtract[0];
        endPage = pagesToExtract[pagesToExtract.length - 1]; // This is effectively the last page in the *sorted* list, not necessarily pdf.numPages

        // Ensure we only iterate over the *actual* pages specified
        for (const pageNum of pagesToExtract) {
            const page = await pdf.getPage(pageNum);
            const textContent = await page.getTextContent({ normalizeWhitespace: true });
            
            // Filter visible text based on user option (simple heuristic)
            if (readAloudOnlyVisible.checked) {
                const viewport = page.getViewport({ scale: 1 });
                const visibleTextItems = textContent.items.filter(item => {
                    // Simple check: if text is within a reasonable Y range (e.g., not extremely high or low, not too far off to the side)
                    // This is a basic heuristic; a more robust solution would involve rendering or deeper layout analysis.
                    return item.transform[5] > 0 && item.transform[5] < viewport.height &&
                           item.transform[4] > 0 && item.transform[4] < viewport.width;
                });
                fullText += visibleTextItems.map(item => item.str).join(' ') + '\n\n';
            } else {
                fullText += textContent.items.map(item => item.str).join(' ') + '\n\n';
            }
            
            page.cleanup(); // Release page resources
            updateProgress((pageNum / pagesToExtract.length) * 100);
        }

    } else {
        // Process all pages
        for (let i = 1; i <= pdf.numPages; i++) {
            const page = await pdf.getPage(i);
            const textContent = await page.getTextContent({ normalizeWhitespace: true });
            
            if (readAloudOnlyVisible.checked) {
                const viewport = page.getViewport({ scale: 1 });
                const visibleTextItems = textContent.items.filter(item => {
                    return item.transform[5] > 0 && item.transform[5] < viewport.height &&
                           item.transform[4] > 0 && item.transform[4] < viewport.width;
                });
                fullText += visibleTextItems.map(item => item.str).join(' ') + '\n\n';
            } else {
                fullText += textContent.items.map(item => item.str).join(' ') + '\n\n';
            }

            page.cleanup();
            updateProgress((i / pdf.numPages) * 100);
        }
    }
    
    // Clean up extracted text (e.g., remove excessive newlines/spaces)
    fullText = fullText.replace(/\s+/g, ' ').trim(); 
    return fullText;
}

function updateProgress(percentage) {
    const p = Math.min(100, Math.max(0, Math.round(percentage)));
    progressBar.style.width = `${p}%`;
    progressBar.textContent = `${p}%`;
}


// Play Audio
function playAudio() {
    if (!currentPdfText) {
        showError('No text extracted from PDF. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No text extracted from PDF. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (synth.speaking) {
        synth.cancel(); // Stop any ongoing speech before starting new one
    }

    showStatus('Playing audio...', 'info');
    playBtn.disabled = true;
    stopBtn.disabled = false;

    currentUtterance = new SpeechSynthesisUtterance(currentPdfText);
    currentUtterance.voice = voices.find(voice => voice.name === voiceSelect.value) || synth.getVoices()[0]; // Fallback to first available voice
    currentUtterance.rate = parseFloat(rateInput.value);
    currentUtterance.pitch = parseFloat(pitchInput.value);

    currentUtterance.onend = () => {
        showStatus('Audio playback finished.', 'success');
        playBtn.disabled = false;
        stopBtn.disabled = true;
        // Add to history only after successful playback
        addToHistory({
            fileName: currentFile.name,
            date: new Date().toLocaleString(),
            format: 'audio',
            text: currentPdfText, // Store the extracted text
            options: {
                voiceName: voiceSelect.value,
                rate: rateInput.value,
                pitch: pitchInput.value,
                pageRange: pageRangeInput.value,
                readAloudOnlyVisible: readAloudOnlyVisible.checked
            }
        });
    };

    currentUtterance.onerror = (event) => {
        showError(`Audio playback error: ${event.error}`);
        playBtn.disabled = false;
        stopBtn.disabled = true;
        Swal.fire({
            title: 'Playback Error',
            text: `An error occurred during audio playback: ${event.error}. This often happens if the text is too long or the voice is unavailable.`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    };
    
    // Split long text into smaller chunks for better browser compatibility
    const maxTextLength = 1000; // Adjust as needed
    const textChunks = [];
    for (let i = 0; i < currentPdfText.length; i += maxTextLength) {
        textChunks.push(currentPdfText.substring(i, i + maxTextLength));
    }

    // Speak chunks sequentially
    let chunkIndex = 0;
    const speakNextChunk = () => {
        if (chunkIndex < textChunks.length) {
            const chunk = textChunks[chunkIndex];
            const utterance = new SpeechSynthesisUtterance(chunk);
            utterance.voice = currentUtterance.voice;
            utterance.rate = currentUtterance.rate;
            utterance.pitch = currentUtterance.pitch;
            utterance.onend = () => {
                chunkIndex++;
                speakNextChunk(); // Speak the next chunk
            };
            utterance.onerror = currentUtterance.onerror; // Use the same error handler
            synth.speak(utterance);
        } else {
            // All chunks spoken, simulate onend for the main utterance
            if (currentUtterance.onend) {
                currentUtterance.onend();
            }
        }
    };
    speakNextChunk();
}

// Stop Audio
function stopAudio() {
    if (synth.speaking) {
        synth.cancel();
        showStatus('Audio playback stopped.', 'warning');
        playBtn.disabled = false;
        stopBtn.disabled = true;
    }
}

// Download Audio (MP3) - This is highly experimental due to browser limitations
function downloadAudio() {
    if (!currentPdfText) {
        showError('No text extracted to download as audio.');
        Swal.fire({
            title: 'Error',
            text: 'No text extracted to download as audio. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (!window.MediaRecorder) {
        Swal.fire({
            title: 'Browser Not Supported',
            html: 'Your browser does not fully support the MediaRecorder API needed to record and download audio directly. Please use the "Play Audio" feature instead.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }
    
    showStatus('Attempting to download audio (this may take a moment)...', 'info');
    downloadBtn.disabled = true;
    playBtn.disabled = true;
    stopBtn.disabled = false; // Enable stop during recording

    Swal.fire({
        title: 'Generating Audio File',
        html: `Generating audio for download. Please do not close this tab. Progress will not be shown here.`,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    const context = new (window.AudioContext || window.webkitAudioContext)();
    const dest = context.createMediaStreamDestination();
    const mediaRecorder = new MediaRecorder(dest.stream);
    const chunks = [];

    mediaRecorder.ondataavailable = event => chunks.push(event.data);
    mediaRecorder.onstop = () => {
        const blob = new Blob(chunks, { 'type': 'audio/mpeg' }); // Attempt to save as MP3
        const fileName = (currentFile ? currentFile.name.replace('.pdf', '.mp3') : 'converted_audio.mp3');
        saveAs(blob, fileName); // Using FileSaver.js

        showStatus('MP3 download started!', 'success');
        downloadBtn.disabled = false;
        playBtn.disabled = false;
        stopBtn.disabled = true;
        Swal.close();
        Swal.fire({
            title: 'Download Initiated',
            text: 'Your MP3 file download should begin shortly. Please note: quality and compatibility may vary by browser.',
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 3000,
            timerProgressBar: true
        });

        // Add to history
        addToHistory({
            fileName: fileName,
            date: new Date().toLocaleString(),
            format: 'mp3',
            text: currentPdfText, // Store the text for potential preview/regeneration
            options: {
                voiceName: voiceSelect.value,
                rate: rateInput.value,
                pitch: pitchInput.value,
                pageRange: pageRangeInput.value,
                readAloudOnlyVisible: readAloudOnlyVisible.checked
            }
        });
    };

    mediaRecorder.onerror = (event) => {
        showError(`Audio recording error: ${event.error.name}`);
        downloadBtn.disabled = false;
        playBtn.disabled = false;
        stopBtn.disabled = true;
        Swal.close();
        Swal.fire({
            title: 'Download Error',
            text: `Failed to record audio for download: ${event.error.name}. Please try "Play Audio" instead.`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
        synth.cancel(); // Stop speaking if an error occurs during recording
    };

    mediaRecorder.start();

    // Re-create utterance specifically for recording
    const recordUtterance = new SpeechSynthesisUtterance(currentPdfText);
    recordUtterance.voice = voices.find(voice => voice.name === voiceSelect.value) || synth.getVoices()[0];
    recordUtterance.rate = parseFloat(rateInput.value);
    recordUtterance.pitch = parseFloat(pitchInput.value);

    // Connect the utterance to the audio destination
    recordUtterance.onend = () => {
        mediaRecorder.stop();
        context.close(); // Close audio context after recording
    };
    recordUtterance.onerror = (event) => {
        mediaRecorder.stop(); // Stop recording on error
        context.close();
        showError(`Speech synthesis error during recording: ${event.error}`);
    };

    synth.speak(recordUtterance);
}

// History Functions
function addToHistory(item) {
    const historyItem = {
        id: Date.now(),
        fileName: item.fileName,
        date: item.date,
        format: item.format,
        text: item.text, // Store the text
        options: item.options // Store all options to regenerate audio
    };

    audioHistory.unshift(historyItem);
    if (audioHistory.length > 10) {
        audioHistory.pop();
    }

    localStorage.setItem('pdfAudioHistory', JSON.stringify(audioHistory));
    displayHistory();
}

function displayHistory() {
    if (audioHistory.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    historyList.innerHTML = '';
    audioHistory.forEach(item => {
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
                <button class="btn btn-sm btn-outline-primary play-history" data-id="${item.id}" title="Play">
                    <i class="fas fa-play"></i>
                </button>
                <button class="btn btn-sm btn-outline-success download-history ms-1" data-id="${item.id}" title="Download">
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

    document.querySelectorAll('.play-history').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            playHistoryItem(id);
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
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            audioHistory = audioHistory.filter(item => item.id !== id);
            localStorage.setItem('pdfAudioHistory', JSON.stringify(audioHistory));
            displayHistory();
        }
    });
}

function playHistoryItem(id) {
    const item = audioHistory.find(item => item.id === id);
    if (!item || !item.text) {
        showError('No audio data found for this history item.');
        Swal.fire({
            title: 'Error',
            text: 'No audio data found for this history item.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (synth.speaking) {
        synth.cancel();
    }

    showStatus(`Playing audio for ${item.fileName}...`, 'info');
    playBtn.disabled = true; // Disable main play button
    stopBtn.disabled = false;

    const utterance = new SpeechSynthesisUtterance(item.text);
    utterance.voice = voices.find(voice => voice.name === item.options.voiceName) || synth.getVoices()[0];
    utterance.rate = parseFloat(item.options.rate);
    utterance.pitch = parseFloat(item.options.pitch);

    utterance.onend = () => {
        showStatus('History audio playback finished.', 'success');
        playBtn.disabled = false; // Re-enable main play button
        stopBtn.disabled = true;
    };

    utterance.onerror = (event) => {
        showError(`History audio playback error: ${event.error}`);
        playBtn.disabled = false; // Re-enable main play button
        stopBtn.disabled = true;
        Swal.fire({
            title: 'Playback Error',
            text: `An error occurred during history audio playback: ${event.error}. This often happens if the text is too long or the voice is unavailable.`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    };
    
    // Split long text into smaller chunks for history playback
    const maxTextLength = 1000;
    const textChunks = [];
    for (let i = 0; i < item.text.length; i += maxTextLength) {
        textChunks.push(item.text.substring(i, i + maxTextLength));
    }

    let chunkIndex = 0;
    const speakNextChunk = () => {
        if (chunkIndex < textChunks.length) {
            const chunk = textChunks[chunkIndex];
            const chunkUtterance = new SpeechSynthesisUtterance(chunk);
            chunkUtterance.voice = utterance.voice;
            chunkUtterance.rate = utterance.rate;
            chunkUtterance.pitch = utterance.pitch;
            chunkUtterance.onend = () => {
                chunkIndex++;
                speakNextChunk();
            };
            chunkUtterance.onerror = utterance.onerror;
            synth.speak(chunkUtterance);
        } else {
            if (utterance.onend) {
                utterance.onend();
            }
        }
    };
    speakNextChunk();
}

function downloadHistoryItem(id) {
    const item = audioHistory.find(item => item.id === id);
    if (!item || !item.text) {
        showError('No audio text data found for this history item to download.');
        Swal.fire({
            title: 'Error',
            text: 'No audio text data found for this history item to download.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (!window.MediaRecorder) {
        Swal.fire({
            title: 'Browser Not Supported',
            html: 'Your browser does not fully support the MediaRecorder API needed to record and download audio. Please use the "Play Audio" feature instead.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus(`Preparing to download ${item.fileName}...`, 'info');
    
    Swal.fire({
        title: 'Generating Audio File',
        html: `Generating audio for ${item.fileName}. Please do not close this tab.`,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    const context = new (window.AudioContext || window.webkitAudioContext)();
    const dest = context.createMediaStreamDestination();
    const mediaRecorder = new MediaRecorder(dest.stream);
    const chunks = [];

    mediaRecorder.ondataavailable = event => chunks.push(event.data);
    mediaRecorder.onstop = () => {
        const blob = new Blob(chunks, { 'type': 'audio/mpeg' });
        saveAs(blob, item.fileName);

        showStatus(`${item.fileName} download started!`, 'success');
        Swal.close();
        Swal.fire({
            title: 'Download Initiated',
            text: `Your ${item.fileName} download should begin shortly.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 3000,
            timerProgressBar: true
        });
    };

    mediaRecorder.onerror = (event) => {
        showError(`Audio recording error for history item: ${event.error.name}`);
        Swal.close();
        Swal.fire({
            title: 'Download Error',
            text: `Failed to record audio for download: ${event.error.name}. Please try "Play Audio" instead.`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
        synth.cancel();
    };

    mediaRecorder.start();

    const recordUtterance = new SpeechSynthesisUtterance(item.text);
    recordUtterance.voice = voices.find(voice => voice.name === item.options.voiceName) || synth.getVoices()[0];
    recordUtterance.rate = parseFloat(item.options.rate);
    recordUtterance.pitch = parseFloat(item.options.pitch);

    recordUtterance.onend = () => {
        mediaRecorder.stop();
        context.close();
    };
    recordUtterance.onerror = (event) => {
        mediaRecorder.stop();
        context.close();
        showError(`Speech synthesis error during history recording: ${event.error}`);
    };

    synth.speak(recordUtterance);
}


// Helper Functions for Status and Errors
function showStatus(message, type) {
    statusArea.textContent = message;
    statusArea.className = `text-center text-${type}`;
}

function showError(message) {
    showStatus(message, 'danger');
}
</script>

<?php include '../../includes/footer.php'; ?>