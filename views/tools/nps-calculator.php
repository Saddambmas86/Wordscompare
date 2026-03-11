<?php
// SEO and Page Metadata
$page_title = "$title"; // You may Change the Title here
$page_description = "$desc"; // Put your Description here
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

<div class="col-lg-8 border shadow-sm">
    <main class="pt-5">
        <div class="row justify-content-center px-2">
            <div class="col-12 p-3 p-md-4 rounded shadow">
                <div class="text-center mb-4 mb-md-5">
                    <h1 class="h2 fw-bold text-gray-800 mb-2">NPS Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Plan your retirement with the National Pension System. Estimate your maturity amount and pension.
                    </p>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">NPS Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="current-age" class="form-label mb-1">Current Age</label>
                                        <span class="h5 fw-semibold text-primary"><span id="current-age-text">30</span> Years</span>
                                    </div>
                                    <input type="range" id="current-age" min="18" max="60" step="1" value="30" class="form-range mt-2">
                                </div>

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
                                    <input type="range" id="monthly-investment" min="500" max="50000" step="500" value="5000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="return-rate" class="form-label mb-1">Expected Return Rate</label>
                                        <span class="h5 fw-semibold text-primary"><span id="return-rate-text">10</span> %</span>
                                    </div>
                                    <input type="range" id="return-rate" min="5" max="15" step="0.1" value="10" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="annuity-rate" class="form-label mb-1">Expected Annuity Rate</label>
                                        <span class="h5 fw-semibold text-primary"><span id="annuity-rate-text">6</span> %</span>
                                    </div>
                                    <input type="range" id="annuity-rate" min="4" max="10" step="0.1" value="6" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="annuity-purchase" class="form-label mb-1">Corpus for Annuity (%)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="annuity-purchase-text">60</span> %</span>
                                    </div>
                                    <input type="range" id="annuity-purchase" min="40" max="100" step="5" value="60" class="form-range mt-2">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="nps-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Total Investment</p>
                            <p id="total-investment-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Maturity Amount</p>
                                    <p id="maturity-amount-result" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Monthly Pension</p>
                                    <p id="monthly-pension-result" class="h4 fw-semibold text-gray-800">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Year-wise Projection</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Year</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Age</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Invested Amount</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Corpus Value</th>
                            </tr>
                        </thead>
                        <tbody id="nps-projection-table-body" class="bg-white">
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
                <?php include '../../views/content/nps-calculator-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// JavaScript for NPS Calculator
let npsChart; // Variable to hold the Chart.js instance

// Get DOM elements
const currentAgeSlider = document.getElementById('current-age');
const currentAgeText = document.getElementById('current-age-text');
const monthlyInvestmentSlider = document.getElementById('monthly-investment');
const monthlyInvestmentText = document.getElementById('monthly-investment-text');
const returnRateSlider = document.getElementById('return-rate');
const returnRateText = document.getElementById('return-rate-text');
const annuityRateSlider = document.getElementById('annuity-rate');
const annuityRateText = document.getElementById('annuity-rate-text');
const annuityPurchaseSlider = document.getElementById('annuity-purchase');
const annuityPurchaseText = document.getElementById('annuity-purchase-text');

const totalInvestmentResult = document.getElementById('total-investment-result');
const maturityAmountResult = document.getElementById('maturity-amount-result');
const monthlyPensionResult = document.getElementById('monthly-pension-result');
const npsProjectionTableBody = document.getElementById('nps-projection-table-body');
const npsChartCanvas = document.getElementById('nps-chart');
const currencySelect = document.getElementById('currency-select'); // Get the currency select element


// Event Listeners for sliders and currency select
currentAgeSlider.addEventListener('input', updateCalculator);
monthlyInvestmentSlider.addEventListener('input', updateCalculator);
returnRateSlider.addEventListener('input', updateCalculator);
annuityRateSlider.addEventListener('input', updateCalculator);
annuityPurchaseSlider.addEventListener('input', updateCalculator);
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
 * Updates the displayed values for sliders and triggers NPS calculation.
 */
function updateCalculator() {
    // Update slider text displays
    currentAgeText.textContent = currentAgeSlider.value;
    // Use formatCurrency for monthlyInvestmentText
    monthlyInvestmentText.textContent = formatCurrency(monthlyInvestmentSlider.value).replace(currencySelect.value + ' ', ''); // Remove currency symbol for display with dropdown
    returnRateText.textContent = returnRateSlider.value;
    annuityRateText.textContent = annuityRateSlider.value;
    annuityPurchaseText.textContent = annuityPurchaseSlider.value;

    calculateNPS();
}

/**
 * Calculates the NPS maturity amount, total investment, and monthly pension, then updates the UI.
 */
function calculateNPS() {
    const currentAge = parseInt(currentAgeSlider.value);
    const monthlyInvestment = parseFloat(monthlyInvestmentSlider.value);
    const annualReturnRate = parseFloat(returnRateSlider.value) / 100;
    const annualAnnuityRate = parseFloat(annuityRateSlider.value) / 100;
    const annuityPurchasePercentage = parseFloat(annuityPurchaseSlider.value) / 100;

    const retirementAge = 60;
    const yearsToInvest = retirementAge - currentAge;
    const monthsToInvest = yearsToInvest * 12;

    let totalInvested = monthlyInvestment * monthsToInvest;
    let maturityAmount = 0;

    if (annualReturnRate === 0) {
        maturityAmount = totalInvested;
    } else {
        // Future value of a series of payments (annuity future value)
        // FV = P * [((1 + r)^n - 1) / r] * (1 + r_monthly)
        // Where P = monthly investment, r = monthly return rate, n = total months
        const monthlyReturnRate = annualReturnRate / 12;
        maturityAmount = monthlyInvestment * ((Math.pow((1 + monthlyReturnRate), monthsToInvest) - 1) / monthlyReturnRate) * (1 + monthlyReturnRate);
    }

    const lumpSumWithdrawal = maturityAmount * (1 - annuityPurchasePercentage);
    const corpusForAnnuity = maturityAmount * annuityPurchasePercentage;
    const monthlyPension = (corpusForAnnuity * annualAnnuityRate) / 12;

    // Update results in UI
    totalInvestmentResult.textContent = formatCurrency(totalInvested);
    maturityAmountResult.textContent = formatCurrency(maturityAmount);
    monthlyPensionResult.textContent = formatCurrency(monthlyPension);

    // Generate and display year-wise projection
    generateNPSProjection(currentAge, monthlyInvestment, annualReturnRate, yearsToInvest);
    // Update chart
    updateChart(totalInvested, maturityAmount - totalInvested);
}

/**
 * Generates and displays the year-wise NPS projection table.
 * @param {number} startAge The current age of the investor.
 * @param {number} monthlyInvestment The monthly investment amount.
 * @param {number} annualReturnRate The annual expected return rate.
 * @param {number} yearsToInvest The total number of years to invest.
 */
function generateNPSProjection(startAge, monthlyInvestment, annualReturnRate, yearsToInvest) {
    npsProjectionTableBody.innerHTML = ''; // Clear previous schedule

    let investedAmount = 0;
    let corpusValue = 0;
    const monthlyReturnRate = annualReturnRate / 12;

    for (let year = 1; year <= yearsToInvest; year++) {
        const age = startAge + year;
        investedAmount += (monthlyInvestment * 12);

        // Calculate corpus value for the current year
        if (annualReturnRate === 0) {
            corpusValue = investedAmount;
        } else {
            // Recalculate corpus based on total invested up to this point and compounded returns
            let monthsPassed = year * 12;
            corpusValue = monthlyInvestment * ((Math.pow((1 + monthlyReturnRate), monthsPassed) - 1) / monthlyReturnRate) * (1 + monthlyReturnRate);
        }

        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${year}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${age}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(investedAmount)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(corpusValue)}</td>
        `;
        npsProjectionTableBody.appendChild(row);
    }
}


/**
 * Updates the Chart.js pie chart with principal and interest data.
 * @param {number} totalInvested The total amount invested.
 * @param {number} totalGains The total gains (Maturity Amount - Total Invested).
 */
function updateChart(totalInvested, totalGains) {
    const ctx = npsChartCanvas.getContext('2d');

    if (npsChart) {
        npsChart.destroy(); // Destroy existing chart before creating a new one
    }

    npsChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Total Invested', 'Wealth Gained'],
            datasets: [{
                data: [totalInvested, totalGains],
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

                // Draw white circle (if needed, currently radius is 0)
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