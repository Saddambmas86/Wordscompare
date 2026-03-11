<?php
// SEO and Page Metadata
$page_title = "Mutual Fund Returns Calculator - Calculate MF Returns Online"; // You may Change the Title here
$page_description = "Free mutual fund returns calculator. Calculate absolute returns, CAGR, and wealth gained on your mutual fund investments. Analyze SIP and lump sum performance."; // Put your Description here
$page_keywords = "$kw";

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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">Mutual Fund Returns Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Estimate the potential returns on your Mutual Fund investments, whether through SIP or a lump sum, and plan for your financial goals.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Investment Details</h3>
                            <div class="space-y-4">
                                <div class="mb-3">
                                    <label for="investment-type" class="form-label mb-1">Investment Type</label>
                                    <select class="form-select" id="investment-type">
                                        <option value="sip">SIP (Systematic Investment Plan)</option>
                                        <option value="lump-sum">Lump Sum</option>
                                    </select>
                                </div>

                                <div id="sip-inputs">
                                    <div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label for="monthly-investment" class="form-label mb-1">Monthly Investment (SIP)</label>
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
                                                <span class="h5 fw-semibold text-primary"><span id="monthly-investment-text">5,000</span></span>
                                            </div>
                                        </div>
                                        <input type="range" id="monthly-investment" min="500" max="100000" step="500" value="5000" class="form-range mt-2">
                                    </div>
                                </div>

                                <div id="lump-sum-inputs" style="display: none;">
                                    <div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label for="lump-sum-investment" class="form-label mb-1">Lump Sum Investment</label>
                                            <div class="d-flex align-items-center">
                                                <span class="h5 fw-semibold text-primary"><span id="lump-sum-investment-text">1,00,000</span></span>
                                            </div>
                                        </div>
                                        <input type="range" id="lump-sum-investment" min="10000" max="5000000" step="10000" value="100000" class="form-range mt-2">
                                    </div>
                                </div>
                                
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="expected-rate" class="form-label mb-1">Expected Annual Return</label>
                                        <span class="h5 fw-semibold text-primary"><span id="expected-rate-text">12</span> %</span>
                                    </div>
                                    <input type="range" id="expected-rate" min="1" max="30" step="0.1" value="12" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="investment-period" class="form-label mb-1">Investment Period (Years)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="investment-period-text">10</span> Years</span>
                                    </div>
                                    <input type="range" id="investment-period" min="1" max="40" step="1" value="10" class="form-range mt-2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="returns-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Invested Amount</p>
                            <p id="invested-amount-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Estimated Returns</p>
                                    <p id="estimated-returns-result" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Total Value</p>
                                    <p id="total-value-result" class="h4 fw-semibold text-gray-800">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Year-wise Growth Projection</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Year</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Invested Amount</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Estimated Returns</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Total Value</th>
                            </tr>
                        </thead>
                        <tbody id="projection-table-body" class="bg-white">
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
                <?php include '../../views/content/mutual-fund-returns-calculator-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Mutual Fund Returns Calculator
let returnsChart; // Variable to hold the Chart.js instance

// Get DOM elements
const investmentTypeSelect = document.getElementById('investment-type');
const monthlyInvestmentSlider = document.getElementById('monthly-investment');
const monthlyInvestmentText = document.getElementById('monthly-investment-text');
const lumpSumInvestmentSlider = document.getElementById('lump-sum-investment');
const lumpSumInvestmentText = document.getElementById('lump-sum-investment-text');
const expectedRateSlider = document.getElementById('expected-rate');
const expectedRateText = document.getElementById('expected-rate-text');
const investmentPeriodSlider = document.getElementById('investment-period');
const investmentPeriodText = document.getElementById('investment-period-text');

const investedAmountResult = document.getElementById('invested-amount-result');
const estimatedReturnsResult = document.getElementById('estimated-returns-result');
const totalValueResult = document.getElementById('total-value-result');
const projectionTableBody = document.getElementById('projection-table-body');
const returnsChartCanvas = document.getElementById('returns-chart');

const sipInputsDiv = document.getElementById('sip-inputs');
const lumpSumInputsDiv = document.getElementById('lump-sum-inputs');

const currencySelect = document.getElementById('currency-select'); // Get the currency select element


// Event Listeners for sliders and select
investmentTypeSelect.addEventListener('change', toggleInvestmentType);
monthlyInvestmentSlider.addEventListener('input', updateCalculator);
lumpSumInvestmentSlider.addEventListener('input', updateCalculator);
expectedRateSlider.addEventListener('input', updateCalculator);
investmentPeriodSlider.addEventListener('input', updateCalculator);
currencySelect.addEventListener('change', updateCalculator); // Add event listener for currency select

// Initial calculation on page load
window.onload = function() {
    toggleInvestmentType(); // Set initial visibility
    updateCalculator();
};

/**
 * Toggles visibility of SIP vs Lump Sum input fields based on selection.
 */
function toggleInvestmentType() {
    const investmentType = investmentTypeSelect.value;
    if (investmentType === 'sip') {
        sipInputsDiv.style.display = 'block';
        lumpSumInputsDiv.style.display = 'none';
        // Ensure currency symbol is shown next to the current active input
        document.querySelector('#sip-inputs .h5 span').textContent = new Intl.NumberFormat('en-IN').format(monthlyInvestmentSlider.value);
    } else {
        sipInputsDiv.style.display = 'none';
        lumpSumInputsDiv.style.display = 'block';
        // Ensure currency symbol is shown next to the current active input
        document.querySelector('#lump-sum-inputs .h5 span').textContent = new Intl.NumberFormat('en-IN').format(lumpSumInvestmentSlider.value);
    }
    updateCalculator();
}

/**
 * Formats a number as currency based on the selected currency.
 * @param {number} amount The number to format.
 * @returns {string} The formatted currency string.
 */
function formatCurrency(amount) {
    const selectedCurrency = currencySelect.value; // Get selected currency
    return new Intl.NumberFormat('en-IN', { 
        style: 'currency',
        currency: selectedCurrency, // Use selected currency
        minimumFractionDigits: 0, 
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the displayed values for sliders and triggers mutual fund calculation.
 */
function updateCalculator() {
    // Update slider text displays
    // Use formatCurrency for the displayed values
    monthlyInvestmentText.textContent = new Intl.NumberFormat('en-IN').format(monthlyInvestmentSlider.value); 
    lumpSumInvestmentText.textContent = new Intl.NumberFormat('en-IN').format(lumpSumInvestmentSlider.value); 
    expectedRateText.textContent = expectedRateSlider.value;
    investmentPeriodText.textContent = investmentPeriodSlider.value;

    calculateReturns();
}

/**
 * Calculates the mutual fund returns (SIP or Lump Sum) and updates the UI.
 */
function calculateReturns() {
    const investmentType = investmentTypeSelect.value;
    const annualRate = parseFloat(expectedRateSlider.value) / 100;
    const investmentPeriodYears = parseFloat(investmentPeriodSlider.value);

    let investedAmount = 0;
    let estimatedReturns = 0;
    let totalValue = 0;

    if (investmentType === 'sip') {
        const monthlyInvestment = parseFloat(monthlyInvestmentSlider.value);
        const monthlyRate = annualRate / 12;
        const totalMonths = investmentPeriodYears * 12;

        investedAmount = monthlyInvestment * totalMonths;

        if (monthlyRate === 0) {
            totalValue = investedAmount;
        } else {
            // Future value of a series (SIP) formula
            totalValue = monthlyInvestment * (((Math.pow(1 + monthlyRate, totalMonths) - 1) / monthlyRate) * (1 + monthlyRate));
        }
        estimatedReturns = totalValue - investedAmount;

    } else { // lump-sum
        const lumpSumInvestment = parseFloat(lumpSumInvestmentSlider.value);
        investedAmount = lumpSumInvestment;
        
        // Compound interest formula
        totalValue = lumpSumInvestment * Math.pow((1 + annualRate), investmentPeriodYears);
        estimatedReturns = totalValue - investedAmount;
    }

    // Update results in UI
    investedAmountResult.textContent = formatCurrency(investedAmount); // Use formatCurrency
    estimatedReturnsResult.textContent = formatCurrency(estimatedReturns); // Use formatCurrency
    totalValueResult.textContent = formatCurrency(totalValue); // Use formatCurrency

    // Generate and display projection schedule
    generateProjectionSchedule(investmentType, annualRate, investmentPeriodYears);
    // Update chart
    updateChart(investedAmount, estimatedReturns);
}

/**
 * Generates and displays the year-wise growth projection.
 * @param {string} investmentType 'sip' or 'lump-sum'.
 * @param {number} annualRate The expected annual return rate.
 * @param {number} investmentPeriodYears The total investment period in years.
 */
function generateProjectionSchedule(investmentType, annualRate, investmentPeriodYears) {
    projectionTableBody.innerHTML = ''; // Clear previous schedule

    let currentInvested = 0;
    let currentValue = 0;

    const monthlyInvestment = parseFloat(monthlyInvestmentSlider.value);
    const lumpSumInvestment = parseFloat(lumpSumInvestmentSlider.value);
    const monthlyRate = annualRate / 12;

    for (let year = 1; year <= investmentPeriodYears; year++) {
        let yearInvested = 0;
        let yearStartValue = currentValue; // Value at the beginning of the year

        if (investmentType === 'sip') {
            yearInvested = monthlyInvestment * 12;
            currentInvested += yearInvested;
            
            // Calculate value after one year of SIP
            if (year === 1) { 
                let cumulativeValue = 0;
                for (let m = 1; m <= 12; m++) {
                    cumulativeValue += monthlyInvestment * Math.pow((1 + monthlyRate), (12 - m + 1));
                }
                currentValue = cumulativeValue;
            } else { 
                // Value from previous year grows
                currentValue = yearStartValue * Math.pow((1 + monthlyRate), 12);
                // Add new SIP investments for this year
                let sipValueThisYear = 0;
                for (let m = 1; m <= 12; m++) {
                    sipValueThisYear += monthlyInvestment * Math.pow((1 + monthlyRate), (12 - m + 1));
                }
                currentValue += sipValueThisYear;
            }

        } else { // lump-sum
            if (year === 1) {
                currentInvested = lumpSumInvestment;
                currentValue = lumpSumInvestment * Math.pow((1 + annualRate), year);
            } else {
                currentValue = lumpSumInvestment * Math.pow((1 + annualRate), year);
            }
            yearInvested = (year === 1) ? lumpSumInvestment : 0; 
        }
        
        let estimatedReturns = currentValue - currentInvested;
        
        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${year}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(currentInvested)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(estimatedReturns)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(currentValue)}</td>
        `;
        projectionTableBody.appendChild(row);
    }
}


/**
 * Updates the Chart.js pie chart with invested amount and estimated returns data.
 * @param {number} investedAmount The total invested amount.
 * @param {number} estimatedReturns The estimated returns.
 */
function updateChart(investedAmount, estimatedReturns) {
    const ctx = returnsChartCanvas.getContext('2d');

    if (returnsChart) {
        returnsChart.destroy(); 
    }

    returnsChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Invested Amount', 'Estimated Returns'],
            datasets: [{
                data: [investedAmount, estimatedReturns],
                backgroundColor: ['#4F46E5', '#f59e0b'], 
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '60%', 
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
                            return `${label}: ${formatCurrency(value)}`; // Use formatCurrency for tooltip
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