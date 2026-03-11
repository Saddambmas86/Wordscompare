<?php
// SEO and Page Metadata
$page_title = "SIP Calculator - Systematic Investment Plan Returns Calculator"; // You may Change the Title here
$page_description = "Free SIP calculator online. Calculate Systematic Investment Plan returns, wealth gained, and maturity amount for mutual fund SIPs. Plan smart monthly investments."; // Put your Description here
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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">SIP Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Estimate the potential returns on your Systematic Investment Plan (SIP) and plan your financial goals.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Investment Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="monthly-investment" class="form-label mb-1">Monthly Investment</label>
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

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="expected-return" class="form-label mb-1">Expected Annual Return</label>
                                        <span class="h5 fw-semibold text-primary"><span id="expected-return-text">12</span> %</span>
                                    </div>
                                    <input type="range" id="expected-return" min="1" max="30" step="0.1" value="12" class="form-range mt-2">
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
                            <canvas id="sip-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Maturity Amount</p>
                            <p id="maturity-amount-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Total Investment</p>
                                    <p id="total-investment-result" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Wealth Gained</p>
                                    <p id="wealth-gained-result" class="h4 fw-semibold text-gray-800">0</p>
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
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Investment in Year</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Return in Year</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Total Investment</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Maturity Value</th>
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
                <?php include '../../views/content/sip-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for SIP Calculator
let sipChart; // Variable to hold the Chart.js instance

// Get DOM elements
const monthlyInvestmentSlider = document.getElementById('monthly-investment');
const monthlyInvestmentText = document.getElementById('monthly-investment-text');
const expectedReturnSlider = document.getElementById('expected-return');
const expectedReturnText = document.getElementById('expected-return-text');
const investmentPeriodSlider = document.getElementById('investment-period');
const investmentPeriodText = document.getElementById('investment-period-text');

const maturityAmountResult = document.getElementById('maturity-amount-result');
const totalInvestmentResult = document.getElementById('total-investment-result');
const wealthGainedResult = document.getElementById('wealth-gained-result');
const growthTableBody = document.getElementById('growth-table-body');
const sipChartCanvas = document.getElementById('sip-chart');
const currencySelect = document.getElementById('currency-select'); // Get the currency select element


// Event Listeners for sliders and currency select
monthlyInvestmentSlider.addEventListener('input', updateCalculator);
expectedReturnSlider.addEventListener('input', updateCalculator);
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
    const selectedCurrency = currencySelect.value;
    return new Intl.NumberFormat('en-IN', { // 'en-IN' locale is good for number formatting, currency symbol changes with 'currency' option
        style: 'currency',
        currency: selectedCurrency,
        minimumFractionDigits: 0, // No decimal places for whole rupees
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the displayed values for sliders and triggers SIP calculation.
 */
function updateCalculator() {
    // Update slider text displays
    monthlyInvestmentText.textContent = new Intl.NumberFormat('en-IN').format(monthlyInvestmentSlider.value);
    expectedReturnText.textContent = expectedReturnSlider.value;
    investmentPeriodText.textContent = investmentPeriodSlider.value;

    calculateSIP();
}

/**
 * Calculates the SIP maturity amount, total investment, and wealth gained, then updates the UI.
 */
function calculateSIP() {
    const monthlyInvestment = parseFloat(monthlyInvestmentSlider.value);
    const annualReturnRate = parseFloat(expectedReturnSlider.value);
    const investmentPeriodYears = parseFloat(investmentPeriodSlider.value);

    // Convert annual return rate to monthly rate
    const monthlyReturnRate = annualReturnRate / (12 * 100);
    // Convert investment period from years to months
    const investmentPeriodMonths = investmentPeriodYears * 12;

    let maturityAmount = 0;

    if (monthlyReturnRate === 0) {
        maturityAmount = monthlyInvestment * investmentPeriodMonths;
    } else {
        // SIP formula: P * (((1 + i)^n - 1) / i) * (1 + i)
        const numerator = Math.pow((1 + monthlyReturnRate), investmentPeriodMonths) - 1;
        const denominator = monthlyReturnRate;
        maturityAmount = monthlyInvestment * (numerator / denominator) * (1 + monthlyReturnRate);
    }
    
    const totalInvestment = monthlyInvestment * investmentPeriodMonths;
    const wealthGained = maturityAmount - totalInvestment;

    // Update results in UI
    maturityAmountResult.textContent = formatCurrency(maturityAmount);
    totalInvestmentResult.textContent = formatCurrency(totalInvestment);
    wealthGainedResult.textContent = formatCurrency(wealthGained);

    // Generate and display growth projection
    generateGrowthProjection(monthlyInvestment, monthlyReturnRate, investmentPeriodMonths);
    // Update chart
    updateChart(totalInvestment, wealthGained);
}

/**
 * Generates and displays the year-wise growth projection.
 * @param {number} monthlyInvestment The monthly SIP investment.
 * @param {number} monthlyReturnRate The monthly expected return rate.
 * @param {number} investmentPeriodMonths The total investment period in months.
 */
function generateGrowthProjection(monthlyInvestment, monthlyReturnRate, investmentPeriodMonths) {
    growthTableBody.innerHTML = ''; // Clear previous schedule

    let cumulativeInvestment = 0;
    let cumulativeMaturityValue = 0;

    for (let year = 1; year <= investmentPeriodMonths / 12; year++) {
        let annualInvestment = 0;
        // Calculate for each month in the year
        for (let month = 1; month <= 12; month++) {
            if (((year - 1) * 12 + month) <= investmentPeriodMonths) {
                cumulativeInvestment += monthlyInvestment;
            }
        }
        
        // Recalculate maturity value up to the current year
        if (monthlyReturnRate === 0) {
            cumulativeMaturityValue = cumulativeInvestment;
        } else {
            const currentMonths = year * 12;
            const numerator = Math.pow((1 + monthlyReturnRate), currentMonths) - 1;
            const denominator = monthlyReturnRate;
            cumulativeMaturityValue = monthlyInvestment * (numerator / denominator) * (1 + monthlyReturnRate);
        }

        const annualReturn = cumulativeMaturityValue - cumulativeInvestment; // This might need re-evaluation for annual return in *that specific year*

        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${year}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(monthlyInvestment * 12)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(annualReturn)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(cumulativeInvestment)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(cumulativeMaturityValue)}</td>
        `;
        growthTableBody.appendChild(row);
    }
}

/**
 * Updates the Chart.js pie chart with total investment and wealth gained data.
 * @param {number} totalInvestment The total amount invested.
 * @param {number} wealthGained The total wealth gained (returns).
 */
function updateChart(totalInvestment, wealthGained) {
    const ctx = sipChartCanvas.getContext('2d');

    if (sipChart) {
        sipChart.destroy(); // Destroy existing chart before creating a new one
    }

    sipChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Total Investment', 'Wealth Gained'],
            datasets: [{
                data: [totalInvestment, wealthGained],
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
                
                // Draw white circle
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