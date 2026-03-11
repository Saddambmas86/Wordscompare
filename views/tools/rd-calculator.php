<?php
// SEO and Page Metadata
$page_title = "RD Calculator - Recurring Deposit Maturity Calculator Online"; // You may Change the Title here
$page_description = "Free RD calculator online. Calculate Recurring Deposit maturity amount and interest earned with quarterly compounding. Plan your monthly savings goal."; // Put your Description here
$page_keywords = "rd calculator - recurring deposit maturity calculator online, calculator, recurring, deposit, maturity, online, free online tools, pdf tools";

// Include common header
include '../../includes/header.php';
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">RD Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Plan your savings with confidence. Calculate your RD maturity amount and total interest earned.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">RD Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="monthly-deposit" class="form-label mb-1">Monthly Deposit</label>
                                        <div class="d-flex align-items-center">
                                            <select id="currency-select" class="form-select form-select-sm me-2">
                                                <option value="USD" selected>$ (USD)</option>
                                                <option value="EUR">EUR (€)</option>
                                                <option value="INR">INR (₹)</option>
                                                <option value="GBP">GBP (£)</option>
                                                <option value="JPY">JPY (¥)</option>
                                                <option value="AUD">AUD ($)</option>
                                                <option value="CAD">CAD ($)</option>
                                                <option value="CHF">CHF (Fr.)</option>
                                                <option value="CNY">CNY (¥)</option>
                                                <option value="SEK">SEK (kr)</option>
                                                <option value="NZD">NZD ($)</option>
                                                <option value="MXN">MXN ($)</option>
                                                <option value="SGD">SGD ($)</option>
                                                <option value="HKD">HKD ($)</option>
                                                <option value="NOK">NOK (kr)</option>
                                                <option value="KRW">KRW (₩)</option>
                                                <option value="TRY">TRY (₺)</option>
                                                <option value="RUB">RUB (₽)</option>
                                                <option value="BRL">BRL (R$)</option>
                                                <option value="ZAR">ZAR (R)</option>
                                            </select>
                                            <span class="h5 fw-semibold text-primary"><span id="monthly-deposit-text">5,000</span></span>
                                        </div>
                                    </div>
                                    <input type="range" id="monthly-deposit" min="500" max="100000" step="500" value="5000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="interest-rate" class="form-label mb-1">Interest Rate</label>
                                        <span class="h5 fw-semibold text-primary"><span id="interest-rate-text">6.5</span> %</span>
                                    </div>
                                    <input type="range" id="interest-rate" min="4" max="10" step="0.1" value="6.5" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="rd-tenure" class="form-label mb-1">RD Tenure (Years)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="rd-tenure-text">5</span> Years</span>
                                    </div>
                                    <input type="range" id="rd-tenure" min="1" max="10" step="1" value="5" class="form-range mt-2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="rd-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Maturity Amount</p>
                            <p id="maturity-amount-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Total Deposit</p>
                                    <p id="total-deposit-result" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Total Interest Earned</p>
                                    <p id="total-interest-result" class="h4 fw-semibold text-gray-800">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    
        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Maturity Schedule (Year-wise)</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Year</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Deposit Amount</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Interest Earned</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Maturity Value</th>
                            </tr>
                        </thead>
                        <tbody id="maturity-table-body" class="bg-white">
                            </tbody>
                    </table>
                </div>
            </div>
        </div>

            </main>
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
                <?php include '../../views/content/rd-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for RD Calculator
let rdChart; // Variable to hold the Chart.js instance

// Get DOM elements
const monthlyDepositSlider = document.getElementById('monthly-deposit');
const monthlyDepositText = document.getElementById('monthly-deposit-text');
const interestRateSlider = document.getElementById('interest-rate');
const interestRateText = document.getElementById('interest-rate-text');
const rdTenureSlider = document.getElementById('rd-tenure');
const rdTenureText = document.getElementById('rd-tenure-text');

const maturityAmountResult = document.getElementById('maturity-amount-result');
const totalDepositResult = document.getElementById('total-deposit-result');
const totalInterestResult = document.getElementById('total-interest-result');
const maturityTableBody = document.getElementById('maturity-table-body');
const rdChartCanvas = document.getElementById('rd-chart');
const currencySelect = document.getElementById('currency-select'); // Get the currency select element


// Event Listeners for sliders and currency select
monthlyDepositSlider.addEventListener('input', updateCalculator);
interestRateSlider.addEventListener('input', updateCalculator);
rdTenureSlider.addEventListener('input', updateCalculator);
currencySelect.addEventListener('change', updateCalculator); // Add event listener for currency select

// Initial calculation on page load
window.onload = function() {
    updateCalculator();
};

/**
 * Formats a number as currency based on the selected currency.
 * @param {number} amount The number to format.
 * @returns {string} The formatted currency string.
 */
function formatCurrency(amount) {
    const selectedCurrency = currencySelect.value;
    return new Intl.NumberFormat('en-IN', { // 'en-IN' locale is good for number formatting, currency symbol changes with 'currency' option
        style: 'currency',
        currency: selectedCurrency,
        minimumFractionDigits: 0, // No decimal places for whole rupees
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the displayed values for sliders and triggers RD calculation.
 */
function updateCalculator() {
    // Update slider text displays
    monthlyDepositText.textContent = new Intl.NumberFormat('en-IN').format(monthlyDepositSlider.value);
    interestRateText.textContent = interestRateSlider.value;
    rdTenureText.textContent = rdTenureSlider.value;

    calculateRD();
}

/**
 * Calculates the RD maturity amount, total deposit, and total interest, then updates the UI.
 */
function calculateRD() {
    const monthlyDeposit = parseFloat(monthlyDepositSlider.value);
    const annualInterestRate = parseFloat(interestRateSlider.value);
    const rdTenureYears = parseFloat(rdTenureSlider.value);

    // Convert annual interest rate to monthly rate for compounding purposes
    const monthlyRate = annualInterestRate / (12 * 100); 
    const rdTenureMonths = rdTenureYears * 12;

    let totalDepositedAmount = monthlyDeposit * rdTenureMonths;
    let maturityAmount = 0;

    if (monthlyRate === 0) {
        maturityAmount = totalDepositedAmount;
    } else {
        // Future Value of a series of payments (Annuity Future Value formula)
        // FV = P * [ ((1 + r)^n - 1) / r ] * (1+r)  -- This is for annuity due (payment at start of period)
        // For RD, deposits are typically at the beginning of each month, so annuity due.
        // Or for simplicity and common online calculator behavior, use ordinary annuity and
        // compound the last month's interest too. Let's use an iterative approach which is more robust for RDs.

        let currentFutureValue = 0;
        for (let i = 1; i <= rdTenureMonths; i++) {
            currentFutureValue = (currentFutureValue + monthlyDeposit) * (1 + monthlyRate);
        }
        maturityAmount = currentFutureValue;
    }
    
    let totalInterestEarned = maturityAmount - totalDepositedAmount;
    if (totalInterestEarned < 0) totalInterestEarned = 0; // Ensure interest is not negative due to floating point inaccuracies


    // Update results in UI
    maturityAmountResult.textContent = formatCurrency(maturityAmount);
    totalDepositResult.textContent = formatCurrency(totalDepositedAmount);
    totalInterestResult.textContent = formatCurrency(totalInterestEarned);

    // Generate and display maturity schedule
    generateMaturitySchedule(monthlyDeposit, annualInterestRate, rdTenureYears);
    // Update chart
    updateChart(totalDepositedAmount, totalInterestEarned);
}

/**
 * Generates and displays the year-wise maturity schedule.
 * @param {number} monthlyDeposit The monthly deposit amount.
 * @param {number} annualInterestRate The annual interest rate.
 * @param {number} rdTenureYears The total RD tenure in years.
 */
function generateMaturitySchedule(monthlyDeposit, annualInterestRate, rdTenureYears) {
    maturityTableBody.innerHTML = ''; // Clear previous schedule

    let cumulativeDeposit = 0;
    let currentMaturityValueAtYearEnd = 0;
    const monthlyRate = annualInterestRate / (12 * 100);

    for (let year = 1; year <= rdTenureYears; year++) {
        let annualDeposit = monthlyDeposit * 12;
        cumulativeDeposit += annualDeposit;

        // Recalculate maturity value up to the end of the current year
        // This simulates the RD growth year by year for the table.
        let tempMonthlyDepositAmount = monthlyDeposit;
        let tempTenureMonths = year * 12; // Months up to current year
        let tempCurrentFutureValue = 0;

        if (monthlyRate === 0) {
            tempCurrentFutureValue = tempMonthlyDepositAmount * tempTenureMonths;
        } else {
            for (let m = 1; m <= tempTenureMonths; m++) {
                tempCurrentFutureValue = (tempCurrentFutureValue + tempMonthlyDepositAmount) * (1 + monthlyRate);
            }
        }
        currentMaturityValueAtYearEnd = tempCurrentFutureValue;
        
        let annualInterestEarned = currentMaturityValueAtYearEnd - (monthlyDeposit * year * 12);
        if (annualInterestEarned < 0) annualInterestEarned = 0; // Prevent negative interest due to precision

        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${year}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(monthlyDeposit * year * 12)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(annualInterestEarned)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(currentMaturityValueAtYearEnd)}</td>
        `;
        maturityTableBody.appendChild(row);
    }
}

/**
 * Updates the Chart.js pie chart with total deposit and total interest data.
 * @param {number} totalDeposit The total amount deposited.
 * @param {number} totalInterest The total interest earned.
 */
function updateChart(totalDeposit, totalInterest) {
    const ctx = rdChartCanvas.getContext('2d');

    if (rdChart) {
        rdChart.destroy(); // Destroy existing chart before creating a new one
    }

    rdChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Total Deposit', 'Total Interest Earned'],
            datasets: [{
                data: [totalDeposit, totalInterest],
                backgroundColor: ['#4F46E5', '#f59e0b'], // Indigo 600 and Orange 500
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
                            return `${label}: ${formatCurrency(value)}`;
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
                
                // Draw white circle (if needed, otherwise remove)
                const centerX = width / 2;
                const centerY = height / 2;
                const radius = height * 0; // Adjust size of the white circle
                
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