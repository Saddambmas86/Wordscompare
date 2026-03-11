<?php
// SEO and Page Metadata
$page_title = "APY Calculator - Annual Percentage Yield Calculator Online"; // You may Change the Title here
$page_description = "Free APY calculator online. Calculate Annual Percentage Yield on savings accounts, CDs, and investments. Compare APY vs APR and maximize your returns."; // Put your Description here
$page_keywords = "apy calculator - annual percentage yield calculator online, apy, calculator, annual, percentage, yield, online, free online tools, pdf tools";

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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">APY Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Calculate the Annual Percentage Yield (APY) to understand the true return on your investment, accounting for compounding.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Input Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="principal-amount" class="form-label mb-1">Principal Amount</label>
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
                                            <span class="h5 fw-semibold text-primary"><span id="principal-amount-text">1,00,000</span></span>
                                        </div>
                                    </div>
                                    <input type="range" id="principal-amount" min="10000" max="10000000" step="10000" value="100000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="annual-interest-rate" class="form-label mb-1">Annual Interest Rate (APR)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="annual-interest-rate-text">5.0</span> %</span>
                                    </div>
                                    <input type="range" id="annual-interest-rate" min="0.1" max="20" step="0.1" value="5.0" class="form-range mt-2">
                                </div>

                                <div>
                                    <label for="compounding-frequency" class="form-label mb-1">Compounding Frequency</label>
                                    <select id="compounding-frequency" class="form-select mt-2">
                                        <option value="1">Annually</option>
                                        <option value="2">Semi-annually</option>
                                        <option value="4">Quarterly</option>
                                        <option value="12" selected>Monthly</option>
                                        <option value="365">Daily</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="investment-period" class="form-label mb-1">Investment Period (Years)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="investment-period-text">5</span> Years</span>
                                    </div>
                                    <input type="range" id="investment-period" min="1" max="30" step="1" value="5" class="form-range mt-2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="apy-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Calculated APY</p>
                            <p id="apy-result" class="display-6 fw-bold text-gray-800 mb-3">0.00 %</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Future Value</p>
                                    <p id="future-value-display" class="h4 fw-semibold text-primary">₹ 0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Total Interest Earned</p>
                                    <p id="total-interest-display" class="h4 fw-semibold text-gray-800">₹ 0</p>
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
                <?php include '../../views/content/apy-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for APY Calculator
let apyChart; // Variable to hold the Chart.js instance

// Get DOM elements
const principalAmountSlider = document.getElementById('principal-amount');
const principalAmountText = document.getElementById('principal-amount-text');
const annualInterestRateSlider = document.getElementById('annual-interest-rate');
const annualInterestRateText = document.getElementById('annual-interest-rate-text');
const compoundingFrequencySelect = document.getElementById('compounding-frequency');
const investmentPeriodSlider = document.getElementById('investment-period');
const investmentPeriodText = document.getElementById('investment-period-text');

const apyResult = document.getElementById('apy-result');
const futureValueDisplay = document.getElementById('future-value-display');
const totalInterestDisplay = document.getElementById('total-interest-display');
const growthTableBody = document.getElementById('growth-table-body');
const apyChartCanvas = document.getElementById('apy-chart');
const currencySelect = document.getElementById('currency-select'); // Get the currency select element


// Event Listeners for inputs
principalAmountSlider.addEventListener('input', updateCalculator);
annualInterestRateSlider.addEventListener('input', updateCalculator);
compoundingFrequencySelect.addEventListener('change', updateCalculator);
investmentPeriodSlider.addEventListener('input', updateCalculator);
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
    const selectedCurrency = currencySelect.value; //
    return new Intl.NumberFormat('en-IN', { // 'en-IN' locale is good for number formatting, currency symbol changes with 'currency' option
        style: 'currency', //
        currency: selectedCurrency, //
        minimumFractionDigits: 0, // No decimal places for whole rupees
        maximumFractionDigits: 0 //
    }).format(amount); //
}

/**
 * Updates the displayed values for sliders and triggers APY calculation.
 */
function updateCalculator() {
    // Update slider text displays
    principalAmountText.textContent = new Intl.NumberFormat('en-IN').format(principalAmountSlider.value);
    annualInterestRateText.textContent = annualInterestRateSlider.value;
    investmentPeriodText.textContent = investmentPeriodSlider.value;

    calculateAPY();
}

/**
 * Calculates the APY, future value, and total interest, then updates the UI.
 */
function calculateAPY() {
    const principal = parseFloat(principalAmountSlider.value);
    const annualRate = parseFloat(annualInterestRateSlider.value) / 100; // r (as a decimal)
    const compoundingFrequency = parseFloat(compoundingFrequencySelect.value); // n
    const years = parseFloat(investmentPeriodSlider.value); // T

    // APY Formula: APY = (1 + r/n)^n - 1
    const apy = (Math.pow((1 + (annualRate / compoundingFrequency)), compoundingFrequency) - 1) * 100;

    // Future Value based on APY: FV = P * (1 + APY_decimal)^T
    // Or, using the original compound interest formula: FV = P * (1 + r/n)^(n*T)
    const futureValue = principal * Math.pow((1 + (annualRate / compoundingFrequency)), (compoundingFrequency * years));
    const totalInterestEarned = futureValue - principal;

    // Update results in UI
    apyResult.textContent = apy.toFixed(2) + ' %';
    futureValueDisplay.textContent = formatCurrency(futureValue);
    totalInterestDisplay.textContent = formatCurrency(totalInterestEarned);

    // Generate and display growth schedule
    generateGrowthSchedule(principal, annualRate, years, compoundingFrequency);
    // Update chart
    updateChart(principal, totalInterestEarned);
}

/**
 * Generates and displays the year-wise growth schedule.
 * @param {number} principal The initial principal.
 * @param {number} annualRate The annual interest rate (as decimal).
 * @param {number} years The total investment period in years.
 * @param {number} compoundingFrequency The number of times interest is compounded per year.
 */
function generateGrowthSchedule(principal, annualRate, years, compoundingFrequency) {
    growthTableBody.innerHTML = ''; // Clear previous schedule

    let currentBalance = principal;

    for (let year = 1; year <= years; year++) {
        const startingBalance = currentBalance;
        
        // Calculate balance at the end of the current year using compound interest formula
        // A = P (1 + R/N)^(N*1) for a single year's growth
        currentBalance = startingBalance * Math.pow((1 + (annualRate / compoundingFrequency)), (compoundingFrequency * 1));
        
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
    const ctx = apyChartCanvas.getContext('2d');

    if (apyChart) {
        apyChart.destroy(); // Destroy existing chart before creating a new one
    }

    apyChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Principal Amount', 'Total Interest Earned'],
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
                            return `${label}: ${formatCurrency(value)}`; //
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