<?php
// SEO and Page Metadata
$page_title = "$title"; // You may Change the Title here
$page_description = "$desc";  // Put your Description here
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
        
        <div class="col-lg-7 border shadow-sm">
            <div class="tool-container rounded-3 p-4 p-md-5">
                <header class="text-center mb-4">
                    <h1 class="h2">Age Calculator <i class="fas fa-birthday-cake text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Calculate your exact age in years, months, and days.</p>
                </header>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-calendar-alt me-2"></i>Enter Your Birth Date</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="birthDate" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="birthDate">
                            </div>
                            <div class="col-md-6">
                                <label for="calculateFromDate" class="form-label">Calculate Age Up To</label>
                                <input type="date" class="form-control" id="calculateFromDate">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="calculateBtn">
                        <i class="fas fa-calculator me-2"></i> Calculate Age
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="preview-area card mt-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-clock me-2"></i>Your Age Details</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="m-0 p-3 bg-light" id="ageOutput" style="min-height: 150px;">
                            <div class="text-center text-muted">Your age will be displayed here</div>
                        </div>
                    </div>
                </div>

                <div class="history-area card mt-4" id="historyContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Calculation History (Last 10)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="historyTable">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th>Birth Date</th>
                                        <th>Calculated On</th>
                                        <th>Age</th>
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
                <?php include '../../views/content/age-calculator-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
let calculationHistory = JSON.parse(localStorage.getItem('ageCalculatorHistory')) || [];

// Initialize elements
const birthDateInput = document.getElementById('birthDate');
const calculateFromDateInput = document.getElementById('calculateFromDate');
const calculateBtn = document.getElementById('calculateBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const ageOutput = document.getElementById('ageOutput');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

// Set default values for date inputs
const today = new Date();
const yyyy = today.getFullYear();
const mm = String(today.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed
const dd = String(today.getDate()).padStart(2, '0');
const todayString = `${yyyy}-${mm}-${dd}`;
calculateFromDateInput.value = todayString; // Default to today

// Event Listeners
calculateBtn.addEventListener('click', calculateAge);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'How to Use the Age Calculator',
        html: `Follow these simple steps:<br><br>
        <ol class="text-start">
            <li>Enter your "Date of Birth" in the first field.</li>
            <li>(Optional) Change the "Calculate Age Up To" date if you want to find your age on a specific past or future date. By default, it's today's date.</li>
            <li>Click the "Calculate Age" button.</li>
            <li>Your exact age will be displayed in years, months, and days, along with additional details.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    birthDateInput.value = '';
    calculateFromDateInput.value = todayString;
    ageOutput.innerHTML = '<div class="text-center text-muted">Your age will be displayed here</div>';
    statusArea.textContent = '';
}

// Calculate Age
function calculateAge() {
    const birthDateStr = birthDateInput.value;
    const calculateFromDateStr = calculateFromDateInput.value;

    if (!birthDateStr || !calculateFromDateStr) {
        showError('Please enter both dates.');
        Swal.fire({
            title: 'Error',
            text: 'Please enter both dates.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    const birthDate = new Date(birthDateStr);
    const calculateFromDate = new Date(calculateFromDateStr);

    if (isNaN(birthDate.getTime()) || isNaN(calculateFromDate.getTime())) {
        showError('Invalid date format. Please use the calendar picker.');
        Swal.fire({
            title: 'Error',
            text: 'Invalid date format. Please use the calendar picker.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (birthDate > calculateFromDate) {
        showError('Birth Date cannot be after the "Calculate Age Up To" date.');
        Swal.fire({
            title: 'Error',
            text: 'Birth Date cannot be after the "Calculate Age Up To" date.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    let years = calculateFromDate.getFullYear() - birthDate.getFullYear();
    let months = calculateFromDate.getMonth() - birthDate.getMonth();
    let days = calculateFromDate.getDate() - birthDate.getDate();

    // Adjust for negative months or days
    if (days < 0) {
        months--;
        const lastDayOfPrevMonth = new Date(calculateFromDate.getFullYear(), calculateFromDate.getMonth(), 0).getDate();
        days = lastDayOfPrevMonth + days;
    }
    if (months < 0) {
        years--;
        months = 12 + months;
    }

    const totalDays = Math.floor((calculateFromDate - birthDate) / (1000 * 60 * 60 * 24));
    const totalHours = Math.floor((calculateFromDate - birthDate) / (1000 * 60 * 60));
    const totalMinutes = Math.floor((calculateFromDate - birthDate) / (1000 * 60));

    let outputHtml = `
        <p class="h4 text-center mb-3">Your exact age is:</p>
        <div class="alert alert-success text-center h3">
            <strong>${years}</strong> years, <strong>${months}</strong> months, and <strong>${days}</strong> days.
        </div>
        <hr>
        <p class="text-muted text-center mb-0">Total days: <strong>${totalDays}</strong></p>
        <p class="text-muted text-center mb-0">Total hours: <strong>${totalHours}</strong></p>
        <p class="text-muted text-center">Total minutes: <strong>${totalMinutes}</strong></p>
    `;
    ageOutput.innerHTML = outputHtml;
    showStatus('Age calculated successfully!', 'success');

    addToHistory(birthDateStr, calculateFromDateStr, `${years}y ${months}m ${days}d`);

    Swal.fire({
        title: 'Calculation Complete!',
        text: 'Your age has been calculated.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// History Functions
function addToHistory(birthDate, calculatedOn, ageResult) {
    const historyItem = {
        id: Date.now(),
        birthDate: birthDate,
        calculatedOn: calculatedOn,
        ageResult: ageResult,
        timestamp: new Date().toLocaleString()
    };

    calculationHistory.unshift(historyItem);
    if (calculationHistory.length > 10) {
        calculationHistory.pop();
    }

    localStorage.setItem('ageCalculatorHistory', JSON.stringify(calculationHistory));
    displayHistory();
}

function displayHistory() {
    if (calculationHistory.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    historyList.innerHTML = '';
    calculationHistory.forEach(item => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>
                <button class="btn btn-sm btn-outline-danger delete-history" data-id="${item.id}" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
            <td>${item.birthDate}</td>
            <td>${item.calculatedOn}</td>
            <td><span class="badge bg-primary">${item.ageResult}</span></td>
            <td class="text-end">
                <button class="btn btn-sm btn-outline-secondary copy-history" data-id="${item.id}" title="Copy result">
                    <i class="fas fa-copy"></i>
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

    historyContainer.style.display = 'block';
}

function deleteHistoryItem(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to recover this calculation!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            calculationHistory = calculationHistory.filter(item => item.id !== id);
            localStorage.setItem('ageCalculatorHistory', JSON.stringify(calculationHistory));
            displayHistory();
            Swal.fire('Deleted!', 'Your calculation has been deleted.', 'success');
        }
    });
}

function copyHistoryItem(id) {
    const item = calculationHistory.find(item => item.id === id);
    if (!item) return;

    const textToCopy = `Birth Date: ${item.birthDate}, Calculated On: ${item.calculatedOn}, Age: ${item.ageResult}`;
    copyToClipboard(textToCopy);
    showStatus('Calculation copied to clipboard!', 'success');
    
    Swal.fire({
        title: 'Copied!',
        text: 'Calculation result has been copied to your clipboard.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// Helper function to copy text to clipboard
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