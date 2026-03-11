<?php
// SEO and Page Metadata
$page_title = "Timesheet Calculator";
$page_description = "A free online timesheet calculator to quickly calculate total hours worked, including breaks, regular pay, and overtime pay.";
$page_keywords = "timesheet calculator, free timesheet calculator, online timesheet, work hours calculator, calculate hours, timecard calculator, time and a half, double time, hourly rate, overtime pay, timesheet download";

// Include common header (assuming this exists in the environment)
include '../../includes/header.php';
?>

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
                    <h1 class="h2">Timesheet Calculator <i class="fas fa-clock text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Easily calculate your total work hours and breaks for any pay period.</p>
                </header>

                <div id="timesheet-form">
                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h5 class="mb-0"><i class="fas fa-dollar-sign me-2"></i>Rate & Currency</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="hourly-rate" class="form-label">Hourly Rate</label>
                                    <div class="input-group">
                                        <span class="input-group-text currency-symbol">$</span>
                                        <input type="number" id="hourly-rate" class="form-control" value="20" min="0" step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="overtime-multiplier" class="form-label">Overtime Multiplier</label>
                                    <div class="input-group">
                                        <input type="number" id="overtime-multiplier" class="form-control" value="1.5" min="1" step="0.1">
                                        <span class="input-group-text">x</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="currency-selector" class="form-label">Currency</label>
                                    <select id="currency-selector" class="form-select">
                                        <option value="USD" selected>$ (USD)</option>
                                        <option value="EUR">€ (EUR)</option>
                                        <option value="GBP">£ (GBP)</option>
                                        <option value="JPY">¥ (JPY)</option>
                                        <option value="CAD">$ (CAD)</option>
                                        <option value="AUD">$ (AUD)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="fas fa-calendar-alt me-2"></i>Timesheet Entries</h5>
                            <ul class="nav nav-pills" id="timesheet-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="week-tab" data-bs-toggle="tab" data-bs-target="#week-view" type="button" role="tab" aria-controls="week-view" aria-selected="true">Week View</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="date-tab" data-bs-toggle="tab" data-bs-target="#date-view" type="button" role="tab" aria-controls="date-view" aria-selected="false">Date View</button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-0">
                            <div class="tab-content" id="timesheet-tab-content">
                                <div class="tab-pane fade show active" id="week-view" role="tabpanel" aria-labelledby="week-tab">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover mb-0" id="week-timesheet-table">
                                            <thead>
                                                <tr>
                                                    <th>Day</th>
                                                    <th>Start Time</th>
                                                    <th>End Time</th>
                                                    <th>Break (min)</th>
                                                    <th>Hours</th>
                                                </tr>
                                            </thead>
                                            <tbody id="week-entries-container">
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="date-view" role="tabpanel" aria-labelledby="date-tab">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover mb-0" id="date-timesheet-table">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Start Time</th>
                                                    <th>End Time</th>
                                                    <th>Break (min)</th>
                                                    <th>Hours</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="date-entries-container">
                                                <tr id="date-entry-1">
                                                    <td><input type="date" class="form-control" id="date-date-1"></td>
                                                    <td><input type="time" class="form-control" id="date-start-1" value="09:00"></td>
                                                    <td><input type="time" class="form-control" id="date-end-1" value="17:00"></td>
                                                    <td><input type="number" class="form-control" id="date-break-1" value="30" min="0"></td>
                                                    <td><input type="text" class="form-control" id="date-hours-1" readonly></td>
                                                    <td><button class="btn btn-danger btn-sm remove-row-btn" type="button"><i class="fas fa-minus-circle"></i></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="p-3 d-grid">
                                        <button class="btn btn-outline-danger" id="addRowBtn" type="button"><i class="fas fa-plus-circle me-2"></i>Add Row</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                        <button class="btn btn-danger btn-md px-4" id="calculateBtn">
                            <i class="fas fa-calculator me-2"></i> Calculate
                        </button>
                        <button class="btn btn-primary btn-md px-4" id="howToBtn">
                            <i class="fas fa-question-circle me-2"></i> How To
                        </button>
                        <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                            <i class="fas fa-redo me-2"></i> Reset
                        </button>
                        <button class="btn btn-success btn-md px-2" id="downloadCsvBtn">
                            <i class="fas fa-file-csv me-2"></i> Download CSV
                        </button>
                        <button class="btn btn-info btn-md px-2 text-white" id="downloadPdfBtn">
                            <i class="fas fa-file-pdf me-2"></i> Download PDF
                        </button>
                    </div>

                    <div class="card mb-4" id="results-card">
                        <div class="card-header bg-light">
                            <h5 class="mb-0"><i class="fas fa-clipboard-list me-2"></i>Results</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-3 text-center">
                                    <p class="small text-muted mb-1">Total Hours</p>
                                    <h4 class="fw-bold" id="totalHours">0.00</h4>
                                </div>
                                <div class="col-md-3 text-center">
                                    <p class="small text-muted mb-1">Regular Pay</p>
                                    <h4 class="fw-bold text-primary" id="regularPay">0.00</h4>
                                </div>
                                <div class="col-md-3 text-center">
                                    <p class="small text-muted mb-1">Overtime Pay</p>
                                    <h4 class="fw-bold text-danger" id="overtimePay">0.00</h4>
                                </div>
                                <div class="col-md-3 text-center">
                                    <p class="small text-muted mb-1">Total Pay</p>
                                    <h4 class="fw-bold" id="totalPay">0.00</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="card mb-4" id="entries-summary-card" style="display: none;">
                        <div class="card-header bg-light">
                            <h5 class="mb-0"><i class="fas fa-table me-2"></i>Entry Details</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover mb-0" id="summary-table">
                                    <thead>
                                        <tr>
                                            <th>Day/Date</th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>Break (min)</th>
                                            <th>Hours</th>
                                        </tr>
                                    </thead>
                                    <tbody id="summary-table-body">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="col-lg-2 border shadow-sm sticky-top vh-100 p-3">
        
    </div>

    </div>
</div>

<?php include '../../includes/sharer.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 border shadow-sm">
            <article>
                <header class="mb-5 text-center">
                    <h2 class="display-5"><?php echo $page_title; ?></h2>
                    <p class="lead"><?php echo $page_description; ?></p>
                </header>
                <?php // include '../../views/content/timesheet-calculator-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>

<script>
const daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
let dateRowCounter = 1;

document.addEventListener('DOMContentLoaded', () => {
    // Initial setup for week view
    generateWeekRows();
    updateDateViewDefaultRow();
    
    // Set up event listeners
    document.getElementById('currency-selector').addEventListener('change', updateCurrencySymbol);
    document.getElementById('addRowBtn').addEventListener('click', addDateRow);
    document.getElementById('resetBtn').addEventListener('click', resetAll);
    document.getElementById('calculateBtn').addEventListener('click', calculateAll);
    document.getElementById('howToBtn').addEventListener('click', showHowTo);
    document.getElementById('downloadCsvBtn').addEventListener('click', downloadCsv);
    document.getElementById('downloadPdfBtn').addEventListener('click', downloadPdf);
    
    // Event listener for tab changes
    const tabs = document.querySelectorAll('#timesheet-tabs button');
    tabs.forEach(tab => {
        tab.addEventListener('shown.bs.tab', event => {
            calculateAll(); // Recalculate when a new tab is shown
        });
    });

    // Run initial calculation
    calculateAll();
});

function updateCurrencySymbol() {
    const symbol = document.getElementById('currency-selector').options[document.getElementById('currency-selector').selectedIndex].text.split(' ')[0];
    document.querySelectorAll('.currency-symbol').forEach(el => el.textContent = symbol);
    calculateAll();
}

function updateDateViewDefaultRow() {
    const today = new Date().toISOString().slice(0, 10);
    const dateInput = document.getElementById(`date-date-1`);
    if (dateInput) {
        dateInput.value = today;
        setupDateEventListeners(1);
    }
}

function setupWeekEventListeners() {
    const inputs = document.querySelectorAll('#week-entries-container input');
    inputs.forEach(input => {
        input.addEventListener('change', calculateAll);
        input.addEventListener('input', calculateAll);
    });
}

function setupDateEventListeners(rowId) {
    const row = document.getElementById(`date-entry-${rowId}`);
    if (row) {
        const inputs = row.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('change', calculateAll);
            input.addEventListener('input', calculateAll);
        });
        const removeButton = row.querySelector(`.remove-row-btn`);
        if (removeButton) {
            removeButton.addEventListener('click', () => removeDateRow(rowId));
        }
    }
}

function generateWeekRows() {
    const container = document.getElementById('week-entries-container');
    container.innerHTML = '';
    daysOfWeek.forEach((day, index) => {
        const row = document.createElement('tr');
        row.id = `week-entry-${index + 1}`;
        row.innerHTML = `
            <td>${day}</td>
            <td><input type="time" class="form-control" id="week-start-${index + 1}" value="09:00"></td>
            <td><input type="time" class="form-control" id="week-end-${index + 1}" value="17:00"></td>
            <td><input type="number" class="form-control" id="week-break-${index + 1}" value="30" min="0"></td>
            <td><input type="text" class="form-control" id="week-hours-${index + 1}" readonly></td>
        `;
        container.appendChild(row);
    });
    setupWeekEventListeners();
}

function addDateRow() {
    dateRowCounter++;
    const container = document.getElementById('date-entries-container');
    const today = new Date();
    const nextDate = new Date(today);
    nextDate.setDate(today.getDate() + (dateRowCounter - 1));
    const nextDateString = nextDate.toISOString().slice(0, 10);

    const newRowHtml = `
        <tr id="date-entry-${dateRowCounter}">
            <td><input type="date" class="form-control" id="date-date-${dateRowCounter}" value="${nextDateString}"></td>
            <td><input type="time" class="form-control" id="date-start-${dateRowCounter}" value="09:00"></td>
            <td><input type="time" class="form-control" id="date-end-${dateRowCounter}" value="17:00"></td>
            <td><input type="number" class="form-control" id="date-break-${dateRowCounter}" value="30" min="0"></td>
            <td><input type="text" class="form-control" id="date-hours-${dateRowCounter}" readonly></td>
            <td><button class="btn btn-danger btn-sm remove-row-btn" type="button"><i class="fas fa-minus-circle"></i></button></td>
        </tr>
    `;
    container.insertAdjacentHTML('beforeend', newRowHtml);
    setupDateEventListeners(dateRowCounter);
    calculateAll();
}

function removeDateRow(rowId) {
    const row = document.getElementById(`date-entry-${rowId}`);
    if (row) {
        row.remove();
        calculateAll();
    }
}

function calculateAll() {
    const hourlyRate = parseFloat(document.getElementById('hourly-rate').value) || 0;
    const overtimeMultiplier = parseFloat(document.getElementById('overtime-multiplier').value) || 1.5;
    const regularHoursLimit = 8; // Assuming 8-hour day for regular pay
    
    let totalHours = 0;
    let totalRegularHours = 0;
    let totalOvertimeHours = 0;
    let entries = [];
    const summaryTableBody = document.getElementById('summary-table-body');
    summaryTableBody.innerHTML = '';

    const activeTab = document.querySelector('#timesheet-tabs button.active').id;
    if (activeTab === 'week-tab') {
        entries = daysOfWeek.map((day, index) => ({
            id: `week-entry-${index + 1}`,
            dayOrDate: day,
            start: document.getElementById(`week-start-${index + 1}`).value,
            end: document.getElementById(`week-end-${index + 1}`).value,
            breakMinutes: parseFloat(document.getElementById(`week-break-${index + 1}`).value) || 0,
            hoursInput: document.getElementById(`week-hours-${index + 1}`)
        }));
    } else {
        const dateRows = document.querySelectorAll('#date-entries-container tr');
        entries = Array.from(dateRows).map(row => {
            const rowId = row.id.split('-')[2];
            return {
                id: row.id,
                dayOrDate: document.getElementById(`date-date-${rowId}`).value,
                start: document.getElementById(`date-start-${rowId}`).value,
                end: document.getElementById(`date-end-${rowId}`).value,
                breakMinutes: parseFloat(document.getElementById(`date-break-${rowId}`).value) || 0,
                hoursInput: document.getElementById(`date-hours-${rowId}`)
            };
        });
    }

    entries.forEach(entry => {
        const { dayOrDate, start, end, breakMinutes, hoursInput } = entry;
        
        let hoursPerDay = 0;
        if (start && end) {
            const startTime = new Date(`2000/01/01 ${start}`);
            const endTime = new Date(`2000/01/01 ${end}`);
            
            let totalMs = endTime - startTime;
            if (totalMs < 0) {
                totalMs += 24 * 60 * 60 * 1000; // Account for overnight shifts
            }

            hoursPerDay = (totalMs / (1000 * 60 * 60)) - (breakMinutes / 60);
        }

        if (!isNaN(hoursPerDay) && hoursPerDay > 0) {
            hoursInput.value = hoursPerDay.toFixed(2);
            totalHours += hoursPerDay;

            const regularHours = Math.min(hoursPerDay, regularHoursLimit);
            const overtimeHours = Math.max(0, hoursPerDay - regularHoursLimit);
            
            totalRegularHours += regularHours;
            totalOvertimeHours += overtimeHours;

            // Add row to the summary table
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${dayOrDate}</td>
                <td>${start}</td>
                <td>${end}</td>
                <td>${breakMinutes}</td>
                <td>${hoursPerDay.toFixed(2)}</td>
            `;
            summaryTableBody.appendChild(newRow);

        } else {
            hoursInput.value = '0.00';
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${dayOrDate}</td>
                <td>${start}</td>
                <td>${end}</td>
                <td>${breakMinutes}</td>
                <td>0.00</td>
            `;
            summaryTableBody.appendChild(newRow);
        }
    });

    const regularPay = totalRegularHours * hourlyRate;
    const overtimePay = totalOvertimeHours * hourlyRate * overtimeMultiplier;
    const totalPay = regularPay + overtimePay;

    const currencySymbol = document.querySelector('.currency-symbol').textContent;
    
    document.getElementById('totalHours').textContent = totalHours.toFixed(2);
    document.getElementById('regularPay').textContent = `${currencySymbol}${regularPay.toFixed(2)}`;
    document.getElementById('overtimePay').textContent = `${currencySymbol}${overtimePay.toFixed(2)}`;
    document.getElementById('totalPay').textContent = `${currencySymbol}${totalPay.toFixed(2)}`;

    // Show or hide the summary card based on whether there are entries
    const summaryCard = document.getElementById('entries-summary-card');
    if (entries.length > 0) {
        summaryCard.style.display = 'block';
    } else {
        summaryCard.style.display = 'none';
    }
}

function resetAll() {
    Swal.fire({
        title: 'Are you sure?',
        text: "This will clear all entries and calculations!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, reset it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Reset week view
            generateWeekRows();
            // Reset date view
            const dateContainer = document.getElementById('date-entries-container');
            dateContainer.innerHTML = '';
            dateRowCounter = 0;
            addDateRow();
            // Recalculate
            calculateAll();
            
            Swal.fire(
                'Reset!',
                'Your timesheet has been cleared.',
                'success'
            );
        }
    });
}

function showHowTo() {
    Swal.fire({
        title: 'How to Use the Timesheet Calculator',
        html: `
        <ol class="text-start">
            <li>Choose either "Week View" or "Date View".</li>
            <li>Fill in your hourly rate and select a currency.</li>
            <li>For each day or date, enter your <strong>Start Time</strong>, <strong>End Time</strong>, and any unpaid <strong>Break</strong> time in minutes.</li>
            <li>The <strong>Hours</strong> for each row will update automatically.</li>
            <li>Click <strong>"Calculate"</strong> to see the total hours, regular pay, overtime pay, and total pay.</li>
            <li>You can download your timesheet as a PDF or CSV file.</li>
        </ol>
        `,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

function downloadCsv() {
    const activeTab = document.querySelector('#timesheet-tabs button.active').id;
    let csv = '';
    let filename = '';

    if (activeTab === 'week-tab') {
        filename = 'timesheet-week.csv';
        csv += 'Day,Start Time,End Time,Break (min),Total Hours\n';
        const rows = document.querySelectorAll('#week-timesheet-table tbody tr');
        rows.forEach(row => {
            const day = row.querySelector('td:nth-child(1)').textContent;
            const start = row.querySelector('input[type="time"]').value;
            const end = row.querySelector('input[type="time"]:nth-of-type(2)').value;
            const breakMin = row.querySelector('input[type="number"]').value;
            const hours = row.querySelector('input[type="text"]').value;
            csv += `${day},${start},${end},${breakMin},${hours}\n`;
        });
    } else {
        filename = 'timesheet-date.csv';
        csv += 'Date,Start Time,End Time,Break (min),Total Hours\n';
        const rows = document.querySelectorAll('#date-timesheet-table tbody tr');
        rows.forEach(row => {
            const date = row.querySelector('input[type="date"]').value;
            const start = row.querySelector('input[type="time"]').value;
            const end = row.querySelector('input[type="time"]:nth-of-type(2)').value;
            const breakMin = row.querySelector('input[type="number"]').value;
            const hours = row.querySelector('input[type="text"]').value;
            csv += `${date},${start},${end},${breakMin},${hours}\n`;
        });
    }

    const totalHours = document.getElementById('totalHours').textContent;
    const regularPay = document.getElementById('regularPay').textContent;
    const overtimePay = document.getElementById('overtimePay').textContent;
    const totalPay = document.getElementById('totalPay').textContent;

    csv += `\nSummary\nTotal Hours,Regular Pay,Overtime Pay,Total Pay\n`;
    csv += `${totalHours},${regularPay},${overtimePay},${totalPay}\n`;

    const blob = new Blob([csv], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.setAttribute('hidden', '');
    a.setAttribute('href', url);
    a.setAttribute('download', filename);
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}

function downloadPdf() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    const activeTab = document.querySelector('#timesheet-tabs button.active').id;
    let filename = '';
    let tableId = '';
    let title = '';

    if (activeTab === 'week-tab') {
        filename = 'timesheet-week.pdf';
        tableId = '#week-timesheet-table';
        title = 'Weekly Timesheet';
    } else {
        filename = 'timesheet-date.pdf';
        tableId = '#date-timesheet-table';
        title = 'Date Timesheet';
    }

    doc.setFontSize(22);
    doc.text(title, 105, 20, null, null, "center");
    
    // Add summary
    const totalHours = document.getElementById('totalHours').textContent;
    const regularPay = document.getElementById('regularPay').textContent;
    const overtimePay = document.getElementById('overtimePay').textContent;
    const totalPay = document.getElementById('totalPay').textContent;

    doc.setFontSize(14);
    doc.text(`Total Hours: ${totalHours}`, 15, 35);
    doc.text(`Regular Pay: ${regularPay}`, 15, 45);
    doc.text(`Overtime Pay: ${overtimePay}`, 15, 55);
    doc.text(`Total Pay: ${totalPay}`, 15, 65);

    // Add timesheet table
    doc.autoTable({
        html: tableId,
        startY: 75,
        theme: 'grid',
        headStyles: { fillColor: [220, 53, 69] },
        styles: {
            cellPadding: 3,
            fontSize: 10,
            halign: 'center'
        },
        columnStyles: {
            0: { halign: 'left' }
        },
        didParseCell: function(data) {
            // Check if the cell contains an input element and get its value
            const input = data.cell.raw.querySelector('input');
            if (input) {
                data.cell.text = [input.value];
            }
        }
    });

    doc.save(filename);
}
</script>

<?php include '../../includes/footer.php'; ?>