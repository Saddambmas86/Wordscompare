<?php
// SEO and Page Metadata
$page_title = "Investment Returns Calculator - Calculate ROI Online Free"; // You may Change the Title here
$page_description = "Free investment returns calculator. Calculate total returns, CAGR, and profit/loss on your investments with detailed year-by-year growth breakdown."; // Put your Description here
$page_keywords = "investment returns calculator - calculate roi, investment, returns, calculator, calculate, roi, free online tools, pdf tools";

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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">Investment Returns Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Project the potential value of your investments over time, including recurring additions and compound interest.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Investment Details</h3>
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
                                    <input type="range" id="principal-amount" min="1000" max="10000000" step="1000" value="100000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="annual-addition" class="form-label mb-1">Annual Addition</label>
                                        <span class="h5 fw-semibold text-primary"><span id="annual-addition-text">10,000</span></span>
                                    </div>
                                    <input type="range" id="annual-addition" min="0" max="1000000" step="1000" value="10000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="interest-rate" class="form-label mb-1">Annual Interest Rate</label>
                                        <span class="h5 fw-semibold text-primary"><span id="interest-rate-text">12</span> %</span>
                                    </div>
                                    <input type="range" id="interest-rate" min="1" max="30" step="0.1" value="12" class="form-range mt-2">
                                </div>
                                
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="investment-period" class="form-label mb-1">Investment Period (Years)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="investment-period-text">10</span> Years</span>
                                    </div>
                                    <input type="range" id="investment-period" min="1" max="50" step="1" value="10" class="form-range mt-2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="investment-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Total Value</p>
                            <p id="total-value-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Total Investment</p>
                                    <p id="total-investment-result" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Total Gains</p>
                                    <p id="total-gains-result" class="h4 fw-semibold text-gray-800">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Investment Schedule (Year-wise)</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Year</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Opening Balance</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Annual Addition</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Interest Earned</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Closing Balance</th>
                            </tr>
                        </thead>
                        <tbody id="investment-table-body" class="bg-white">
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
                <?php include '../../views/content/investment-returns-calculator-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Investment Returns Calculator
let investmentChart; // Variable to hold the Chart.js instance

// Get DOM elements
const principalAmountSlider = document.getElementById('principal-amount');
const principalAmountText = document.getElementById('principal-amount-text');
const annualAdditionSlider = document.getElementById('annual-addition');
const annualAdditionText = document.getElementById('annual-addition-text');
const interestRateSlider = document.getElementById('interest-rate');
const interestRateText = document.getElementById('interest-rate-text');
const investmentPeriodSlider = document.getElementById('investment-period');
const investmentPeriodText = document.getElementById('investment-period-text');

const totalValueResult = document.getElementById('total-value-result');
const totalInvestmentResult = document.getElementById('total-investment-result');
const totalGainsResult = document.getElementById('total-gains-result');
const investmentTableBody = document.getElementById('investment-table-body');
const investmentChartCanvas = document.getElementById('investment-chart');
const currencySelect = document.getElementById('currency-select'); // Get the currency select element

// Event Listeners for sliders and currency select
principalAmountSlider.addEventListener('input', updateCalculator);
annualAdditionSlider.addEventListener('input', updateCalculator);
interestRateSlider.addEventListener('input', updateCalculator);
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
        minimumFractionDigits: 0, // No decimal places for whole numbers
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the displayed values for sliders and triggers calculation.
 */
function updateCalculator() {
    // Update slider text displays
    principalAmountText.textContent = new Intl.NumberFormat('en-IN').format(principalAmountSlider.value);
    annualAdditionText.textContent = new Intl.NumberFormat('en-IN').format(annualAdditionSlider.value);
    interestRateText.textContent = interestRateSlider.value;
    investmentPeriodText.textContent = investmentPeriodSlider.value;

    calculateInvestment();
}

/**
 * Calculates the investment returns, total gains, and total value, then updates the UI.
 */
function calculateInvestment() {
    const principal = parseFloat(principalAmountSlider.value);
    const annualAddition = parseFloat(annualAdditionSlider.value);
    const annualInterestRate = parseFloat(interestRateSlider.value) / 100;
    const investmentPeriod = parseFloat(investmentPeriodSlider.value);

    let totalValue = principal;
    let totalInvestment = principal;
    let totalGains = 0;
    
    // Clear previous schedule
    investmentTableBody.innerHTML = '';
    
    for (let year = 1; year <= investmentPeriod; year++) {
        const openingBalance = totalValue;
        const interestEarned = openingBalance * annualInterestRate;
        totalValue += interestEarned;
        totalValue += annualAddition;
        
        totalInvestment += annualAddition;
        totalGains = totalValue - totalInvestment;

        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${year}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(openingBalance)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(annualAddition)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(interestEarned)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(totalValue)}</td>
        `;
        investmentTableBody.appendChild(row);
    }
    
    // Adjust total investment if annual addition is 0, since the loop adds it in the first iteration
    if (annualAddition === 0) {
        totalInvestment = principal;
    } else {
        totalInvestment = principal + (annualAddition * investmentPeriod);
    }
    
    totalGains = totalValue - totalInvestment;

    // Update results in UI
    totalValueResult.textContent = formatCurrency(totalValue);
    totalInvestmentResult.textContent = formatCurrency(totalInvestment);
    totalGainsResult.textContent = formatCurrency(totalGains);

    // Update chart
    updateChart(totalInvestment, totalGains);
}

/**
 * Updates the Chart.js pie chart with investment and gains data.
 * @param {number} totalInvestment The total invested amount.
 * @param {number} totalGains The total gains from interest.
 */
function updateChart(totalInvestment, totalGains) {
    const ctx = investmentChartCanvas.getContext('2d');

    if (investmentChart) {
        investmentChart.destroy(); // Destroy existing chart before creating a new one
    }

    investmentChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Total Investment', 'Total Gains'],
            datasets: [{
                data: [totalInvestment, totalGains],
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
                
                // Draw white circle (if you want a specific background inside the doughnut hole)
                const centerX = width / 2;
                const centerY = height / 2;
                const radius = height * 0; // Adjust size of the white circle (currently 0, so no explicit circle)
                
                ctx.beginPath();
                ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI);
                ctx.fillStyle = 'white'; // Color of the circle
                ctx.fill();
                ctx.strokeStyle = 'white'; // Border color
                ctx.stroke();
                
                ctx.save();
            }
        }]
    });
}
</script>

<?php include '../../includes/footer.php'; ?>