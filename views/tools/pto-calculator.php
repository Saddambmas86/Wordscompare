<?php
// SEO and Page Metadata
$page_title = "PTO Calculator"; // You may Change the Title here
$page_description = "PTO Calculator online."; // Put your Description here
$page_keywords = "PTO calculator, paid time off, vacation accrual, sick leave, personal time, leave calculator, HR tool";

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
    <main class="pt-5">
        <div class="row justify-content-center px-2">
            <div class="col-12 p-3 p-md-4 rounded shadow">
                <div class="text-center mb-4 mb-md-5">
                    <h1 class="h2 fw-bold text-gray-800 mb-2">PTO Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Estimate your Paid Time Off (PTO) accrual based on your work schedule and company policy.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Accrual Policy</h3>
                            <div class="space-y-4">
                                <div>
                                    <label for="accrual-rate" class="form-label mb-1">Hours Accrued Per Pay Period</label>
                                    <input type="number" id="accrual-rate" class="form-control mt-2" value="3.34" step="0.01" min="0">
                                </div>

                                <div>
                                    <label for="pay-periods" class="form-label mb-1">Number of Pay Periods Per Year</label>
                                    <select id="pay-periods" class="form-select mt-2">
                                        <option value="12">Monthly (12)</option>
                                        <option value="24" selected>Semi-Monthly (24)</option>
                                        <option value="26">Bi-weekly (26)</option>
                                        <option value="52">Weekly (52)</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="starting-balance" class="form-label mb-1">Current PTO Balance (Hours)</label>
                                    <input type="number" id="starting-balance" class="form-control mt-2" value="40" step="0.5" min="0">
                                </div>

                                <div>
                                    <label for="hours-taken" class="form-label mb-1">PTO Hours Taken This Year</label>
                                    <input type="number" id="hours-taken" class="form-control mt-2" value="0" step="0.5" min="0">
                                </div>

                                <div>
                                    <label for="max-accrual" class="form-label mb-1">Maximum Accrual Limit (Hours, leave blank if none)</label>
                                    <input type="number" id="max-accrual" class="form-control mt-2" placeholder="e.g., 160" step="1" min="0">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-center w-100">
                            <p class="h5 text-gray-600">Projected PTO in 1 Year</p>
                            <p id="projected-pto-result" class="display-6 fw-bold text-gray-800 mb-3">0 Hours</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Accrued Annually</p>
                                    <p id="annual-accrual-result" class="h4 fw-semibold text-primary">0 Hours</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Net Accrual</p>
                                    <p id="net-accrual-result" class="h4 fw-semibold text-gray-800">0 Hours</p>
                                </div>
                            </div>
                        </div>
                        <div class="w-75 mt-4" style="max-width: 256px; height: 256px;">
                            <canvas id="pto-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    
        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">PTO Balance Over Time</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Period</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Accrued</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Balance (End of Period)</th>
                            </tr>
                        </thead>
                        <tbody id="pto-table-body" class="bg-white">
                            </tbody>
                    </table>
                </div>
            </div>
        </div>

            </main>
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
                <?php include '../../views/content/pto-calculator-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// JavaScript for PTO Calculator
let ptoChart; // Variable to hold the Chart.js instance

// Get DOM elements
const accrualRateInput = document.getElementById('accrual-rate');
const payPeriodsSelect = document.getElementById('pay-periods');
const startingBalanceInput = document.getElementById('starting-balance');
const hoursTakenInput = document.getElementById('hours-taken');
const maxAccrualInput = document.getElementById('max-accrual');

const projectedPtoResult = document.getElementById('projected-pto-result');
const annualAccrualResult = document.getElementById('annual-accrual-result');
const netAccrualResult = document.getElementById('net-accrual-result');
const ptoTableBody = document.getElementById('pto-table-body');
const ptoChartCanvas = document.getElementById('pto-chart');


// Event Listeners for inputs
accrualRateInput.addEventListener('input', updateCalculator);
payPeriodsSelect.addEventListener('change', updateCalculator);
startingBalanceInput.addEventListener('input', updateCalculator);
hoursTakenInput.addEventListener('input', updateCalculator);
maxAccrualInput.addEventListener('input', updateCalculator);

// Initial calculation on page load
window.onload = function() {
    updateCalculator();
};

/**
 * Updates the PTO calculation and UI.
 */
function updateCalculator() {
    const accrualRate = parseFloat(accrualRateInput.value);
    const payPeriodsPerYear = parseFloat(payPeriodsSelect.value);
    const startingBalance = parseFloat(startingBalanceInput.value);
    const hoursTaken = parseFloat(hoursTakenInput.value);
    const maxAccrual = parseFloat(maxAccrualInput.value) || Infinity; // Use Infinity if no cap

    const annualAccrual = accrualRate * payPeriodsPerYear;
    let currentBalance = startingBalance - hoursTaken; // Start with net balance after taken hours

    // Ensure current balance doesn't start below zero or above max cap
    currentBalance = Math.max(0, currentBalance);
    currentBalance = Math.min(maxAccrual, currentBalance);

    let projectedPtoEndYear = currentBalance;
    let netAccrualForYear = 0; // Accrual that actually adds to the balance

    // Generate and display year-wise growth schedule (for 12 periods to show monthly if selected, etc.)
    generatePtoSchedule(accrualRate, payPeriodsPerYear, currentBalance, maxAccrual, hoursTaken);

    // Re-calculate projected PTO for the year considering the cap for the projected display
    let accruedThisYear = 0;
    let balanceForProjection = startingBalance - hoursTaken;
    balanceForProjection = Math.max(0, balanceForProjection); // Cannot start negative

    for (let i = 0; i < payPeriodsPerYear; i++) {
        let earnedThisPeriod = accrualRate;
        
        // If adding this period's accrual would exceed the cap, only add up to the cap
        if (balanceForProjection + earnedThisPeriod > maxAccrual) {
            earnedThisPeriod = maxAccrual - balanceForProjection;
            earnedThisPeriod = Math.max(0, earnedThisPeriod); // Ensure it's not negative if already over cap
        }

        balanceForProjection += earnedThisPeriod;
        accruedThisYear += earnedThisPeriod;
    }

    projectedPtoEndYear = balanceForProjection;
    netAccrualForYear = accruedThisYear;


    // Update results in UI
    projectedPtoResult.textContent = `${projectedPtoEndYear.toFixed(2)} Hours`;
    annualAccrualResult.textContent = `${annualAccrual.toFixed(2)} Hours`;
    netAccrualResult.textContent = `${netAccrualForYear.toFixed(2)} Hours`;

    // Update chart
    updateChart(currentBalance, projectedPtoEndYear - currentBalance);
}

/**
 * Generates and displays the PTO balance schedule over periods.
 * @param {number} accrualRate Hours accrued per period.
 * @param {number} payPeriodsPerYear Total pay periods in a year.
 * @param {number} initialBalance Starting PTO balance for the schedule.
 * @param {number} maxAccrual Maximum allowed PTO balance.
 * @param {number} hoursTaken Hours taken this year (already deducted from initialBalance).
 */
function generatePtoSchedule(accrualRate, payPeriodsPerYear, initialBalance, maxAccrual, hoursTaken) {
    ptoTableBody.innerHTML = ''; // Clear previous schedule

    let currentBalance = initialBalance;

    for (let period = 1; period <= payPeriodsPerYear; period++) {
        const accruedThisPeriod = accrualRate;
        const balanceBeforeAccrual = currentBalance;

        // Apply accrual, respecting the cap
        currentBalance = Math.min(currentBalance + accruedThisPeriod, maxAccrual);
        
        // Calculate what actually got added
        const netAccruedForPeriod = currentBalance - balanceBeforeAccrual;

        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Period ${period}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${netAccruedForPeriod.toFixed(2)} Hrs</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${currentBalance.toFixed(2)} Hrs</td>
        `;
        ptoTableBody.appendChild(row);
    }
}

/**
 * Updates the Chart.js doughnut chart with current balance and projected accrual.
 * @param {number} currentBalance The current PTO balance.
 * @param {number} projectedAccrual The amount of PTO projected to be accrued this year.
 */
function updateChart(currentBalance, projectedAccrual) {
    const ctx = ptoChartCanvas.getContext('2d');

    if (ptoChart) {
        ptoChart.destroy(); // Destroy existing chart before creating a new one
    }

    ptoChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Current Balance', 'Projected Accrual This Year'],
            datasets: [{
                data: [currentBalance, projectedAccrual],
                backgroundColor: ['#4F46E5', '#f59e0b'], // Indigo 600 and Yellow 500
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '60%', // Creates the doughnut hole
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: {
                            size: 14
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.parsed || 0;
                            return `${label}: ${value.toFixed(2)} Hours`;
                        }
                    }
                }
            }
        },
        plugins: [{
            id: 'centerCircle',
            beforeDraw: function(chart) {
                const width = chart.width;
                const height = chart.height;
                const ctx = chart.ctx;
                
                ctx.restore();
                const fontSize = (height / 8).toFixed(2);
                ctx.font = fontSize + "px sans-serif";
                ctx.textBaseline = "middle";
                
                // Draw white circle (if needed, currently radius 0 makes it invisible)
                const centerX = width / 2;
                const centerY = height / 2;
                const radius = height * 0; 
                
                ctx.beginPath();
                ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI);
                ctx.fillStyle = 'white';
                ctx.fill();
                ctx.strokeStyle = 'white';
                ctx.stroke();
                
                ctx.save();
            }
        }]
    });
}
</script>

<?php include '../../includes/footer.php'; ?>