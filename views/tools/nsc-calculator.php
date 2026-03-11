<?php
// SEO and Page Metadata
$page_title = "NSC Calculator - National Savings Certificate Calculator"; // You may Change the Title here
$page_description = "Free NSC calculator online. Calculate National Savings Certificate maturity amount, interest earned at 5-year tenure. Secure government-backed investment planning."; // Put your Description here
$page_keywords = "$kw";

// Include common header
include '../../includes/header.php';
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">NSC Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Estimate the maturity value of your National Savings Certificate (NSC) investment.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Investment Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <label for="investment-amount" class="form-label mb-0">Investment Amount</label>
                                        <div class="d-flex align-items-center">
                                            <select id="currency-select" class="form-select form-select-sm me-2" style="width: auto;">
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
                                            <span class="h5 fw-semibold text-primary">
                                                <span id="currency-symbol">₹</span> <span id="investment-amount-text">50,000</span>
                                            </span>
                                        </div>
                                    </div>
                                    <input type="range" id="investment-amount" min="1000" max="1500000" step="1000" value="50000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="interest-rate" class="form-label mb-1">Current Interest Rate (Annual)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="interest-rate-text">7.7</span> %</span>
                                    </div>
                                    <input type="range" id="interest-rate" min="5" max="9" step="0.1" value="7.7" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="tenure" class="form-label mb-1">Tenure (Years)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="tenure-text">5</span> Years</span>
                                    </div>
                                    <input type="range" id="tenure" min="5" max="5" step="1" value="5" class="form-range mt-2" disabled>
                                    <small class="text-muted">NSC has a fixed tenure of 5 years.</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="nsc-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Maturity Value</p>
                            <p id="maturity-value-result" class="display-6 fw-bold text-gray-800 mb-3">₹ 0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Total Interest Earned</p>
                                    <p id="total-interest-result" class="h4 fw-semibold text-primary">₹ 0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Investment Amount</p>
                                    <p id="investment-display" class="h4 fw-semibold text-gray-800">₹ 0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    
        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Year-wise Growth Breakdown</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Year</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Starting Balance</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Interest Earned</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Ending Balance</th>
                            </tr>
                        </thead>
                        <tbody id="growth-table-body" class="bg-white">
                            </tbody>
                    </table>
                </div>
            </div>
        </div>

            </main>
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
                <?php include '../../views/content/nsc-calculator-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
// JavaScript for NSC Calculator
let nscChart; // Variable to hold the Chart.js instance

// Get DOM elements
const investmentAmountSlider = document.getElementById('investment-amount');
const investmentAmountText = document.getElementById('investment-amount-text');
const interestRateSlider = document.getElementById('interest-rate');
const interestRateText = document.getElementById('interest-rate-text');
const tenureSlider = document.getElementById('tenure'); // This will be disabled
const tenureText = document.getElementById('tenure-text'); // This will show '5'
const currencySelect = document.getElementById('currency-select'); // New: Currency select
const currencySymbolSpan = document.getElementById('currency-symbol'); // NEW: Get the currency symbol span

const maturityValueResult = document.getElementById('maturity-value-result');
const totalInterestResult = document.getElementById('total-interest-result');
const investmentDisplay = document.getElementById('investment-display');
const growthTableBody = document.getElementById('growth-table-body');
const nscChartCanvas = document.getElementById('nsc-chart');


// Event Listeners for inputs
investmentAmountSlider.addEventListener('input', updateCalculator);
interestRateSlider.addEventListener('input', updateCalculator);
currencySelect.addEventListener('change', updateCalculator); // New: Listen for currency change
// No event listener for tenureSlider as it's disabled and fixed at 5 years.

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
    return new Intl.NumberFormat('en-US', { // Using 'en-US' for a general locale, can be changed
        style: 'currency',
        currency: selectedCurrency,
        minimumFractionDigits: 0, // No decimal places for whole numbers
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the displayed values for sliders and triggers NSC calculation.
 */
function updateCalculator() {
    const selectedCurrency = currencySelect.value;
    const currentInvestmentAmount = new Intl.NumberFormat('en-US').format(investmentAmountSlider.value); // Format number only

    // Get the currency symbol for display
    let currencySymbol = '';
    try {
        currencySymbol = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: selectedCurrency,
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).formatToParts(0).find(part => part.type === 'currency').value;
    } catch (e) {
        // Fallback if currency symbol can't be determined (e.g., invalid currency code)
        currencySymbol = selectedCurrency;
    }


    // Update slider text displays
    investmentAmountText.textContent = currentInvestmentAmount;
    currencySymbolSpan.textContent = currencySymbol; // NEW: Update the currency symbol span
    // The problematic line is now replaced, and the HTML is structured to support this change.

    interestRateText.textContent = interestRateSlider.value;
    tenureText.textContent = tenureSlider.value; // Will always be 5

    calculateNSC();
}

/**
 * Calculates the NSC maturity value, total interest, and updates the UI.
 */
function calculateNSC() {
    const principal = parseFloat(investmentAmountSlider.value);
    const annualRate = parseFloat(interestRateSlider.value) / 100; // Convert to decimal
    const tenure = parseFloat(tenureSlider.value); // Always 5 years

    // NSC Maturity Formula: A = P (1 + R)^T (Interest compounded annually)
    const maturityValue = principal * Math.pow((1 + annualRate), tenure);
    const totalInterestEarned = maturityValue - principal;

    // Update results in UI
    maturityValueResult.textContent = formatCurrency(maturityValue);
    totalInterestResult.textContent = formatCurrency(totalInterestEarned);
    investmentDisplay.textContent = formatCurrency(principal);

    // Generate and display growth schedule
    generateGrowthSchedule(principal, annualRate, tenure);
    // Update chart
    updateChart(principal, totalInterestEarned);
}

/**
 * Generates and displays the year-wise growth schedule.
 * @param {number} principal The initial investment amount.
 * @param {number} annualRate The annual interest rate (as decimal).
 * @param {number} tenure The total tenure in years (always 5 for NSC).
 */
function generateGrowthSchedule(principal, annualRate, tenure) {
    growthTableBody.innerHTML = ''; // Clear previous schedule

    let currentBalance = principal;

    for (let year = 1; year <= tenure; year++) {
        const startingBalance = currentBalance;
        
        // Calculate balance at the end of the current year
        // Interest is compounded annually.
        currentBalance = startingBalance * (1 + annualRate);
        
        const interestEarnedThisYear = currentBalance - startingBalance;

        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${year}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(startingBalance)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(interestEarnedThisYear)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(currentBalance)}</td>
        `;
        growthTableBody.appendChild(row);
    }
}

/**
 * Updates the Chart.js pie chart with principal and total interest data.
 * @param {number} principal The total principal amount.
 * @param {number} totalInterest The total interest earned.
 */
function updateChart(principal, totalInterest) {
    const ctx = nscChartCanvas.getContext('2d');

    if (nscChart) {
        nscChart.destroy(); // Destroy existing chart before creating a new one
    }

    nscChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Investment Amount', 'Total Interest Earned'],
            datasets: [{
                data: [principal, totalInterest],
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
                
                // Draw white circle (if needed, currently radius 0 makes it invisible)
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