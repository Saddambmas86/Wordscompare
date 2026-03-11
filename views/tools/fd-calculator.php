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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">FD Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Estimate the maturity amount and interest earned on your Fixed Deposit investments.
                    </p>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Fixed Deposit Details</h3>
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
                                        <label for="interest-rate" class="form-label mb-1">Interest Rate (p.a.)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="interest-rate-text">7.0</span> %</span>
                                    </div>
                                    <input type="range" id="interest-rate" min="1" max="15" step="0.1" value="7.0" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="tenure-years" class="form-label mb-1">Tenure (Years)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="tenure-years-text">5</span> Years</span>
                                    </div>
                                    <input type="range" id="tenure-years" min="1" max="20" step="1" value="5" class="form-range mt-2">
                                </div>
                                 <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="compounding-frequency" class="form-label mb-1">Compounding Frequency</label>
                                    </div>
                                    <select id="compounding-frequency" class="form-select mt-2">
                                        <option value="1">Annually</option>
                                        <option value="2">Half-yearly</option>
                                        <option value="4" selected>Quarterly</option>
                                        <option value="12">Monthly</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="fd-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Maturity Amount</p>
                            <p id="maturity-amount-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Principal Amount</p>
                                    <p id="principal-display-result" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Total Interest Earned</p>
                                    <p id="total-interest-earned-result" class="h4 fw-semibold text-gray-800">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Year-wise Growth of your FD</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Year</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Opening Balance</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Interest Earned</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Closing Balance</th>
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
                <?php include '../../views/content/fd-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// JavaScript for FD Calculator
let fdChart; // Variable to hold the Chart.js instance

// Get DOM elements
const principalAmountSlider = document.getElementById('principal-amount');
const principalAmountText = document.getElementById('principal-amount-text');
const interestRateSlider = document.getElementById('interest-rate');
const interestRateText = document.getElementById('interest-rate-text');
const tenureYearsSlider = document.getElementById('tenure-years');
const tenureYearsText = document.getElementById('tenure-years-text');
const compoundingFrequencySelect = document.getElementById('compounding-frequency');
const currencySelect = document.getElementById('currency-select'); //

const maturityAmountResult = document.getElementById('maturity-amount-result');
const principalDisplayResult = document.getElementById('principal-display-result');
const totalInterestEarnedResult = document.getElementById('total-interest-earned-result');
const growthTableBody = document.getElementById('growth-table-body');
const fdChartCanvas = document.getElementById('fd-chart');


// Event Listeners for sliders and select
principalAmountSlider.addEventListener('input', updateCalculator);
interestRateSlider.addEventListener('input', updateCalculator);
tenureYearsSlider.addEventListener('input', updateCalculator);
compoundingFrequencySelect.addEventListener('change', updateCalculator);
currencySelect.addEventListener('change', updateCalculator); //

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
        style: 'currency',
        currency: selectedCurrency,
        minimumFractionDigits: 0, // No decimal places for whole rupees
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the displayed values for sliders and triggers FD calculation.
 */
function updateCalculator() {
    // Update slider text displays
    principalAmountText.textContent = new Intl.NumberFormat('en-IN').format(principalAmountSlider.value);
    interestRateText.textContent = interestRateSlider.value;
    tenureYearsText.textContent = tenureYearsSlider.value;

    calculateFD();
}

/**
 * Calculates the FD maturity amount and interest earned, then updates the UI.
 */
function calculateFD() {
    const principal = parseFloat(principalAmountSlider.value);
    const annualInterestRate = parseFloat(interestRateSlider.value) / 100; // Convert to decimal
    const tenureYears = parseFloat(tenureYearsSlider.value);
    const compoundingFrequency = parseInt(compoundingFrequencySelect.value); // n

    let maturityAmount = 0;
    let totalInterestEarned = 0;

    // Compound Interest Formula: A = P * (1 + r/n)^(n*t)
    maturityAmount = principal * Math.pow((1 + annualInterestRate / compoundingFrequency), (compoundingFrequency * tenureYears));
    totalInterestEarned = maturityAmount - principal;

    // Update results in UI
    maturityAmountResult.textContent = formatCurrency(maturityAmount);
    principalDisplayResult.textContent = formatCurrency(principal);
    totalInterestEarnedResult.textContent = formatCurrency(totalInterestEarned);

    // Generate and display growth schedule
    generateGrowthSchedule(principal, annualInterestRate, tenureYears, compoundingFrequency);
    // Update chart
    updateChart(principal, totalInterestEarned);
}

/**
 * Generates and displays the year-wise FD growth schedule.
 * @param {number} principal The initial principal amount.
 * @param {number} annualInterestRate The annual interest rate (as a decimal).
 * @param {number} tenureYears The total tenure in years.
 * @param {number} compoundingFrequency The compounding frequency per year.
 */
function generateGrowthSchedule(principal, annualInterestRate, tenureYears, compoundingFrequency) {
    growthTableBody.innerHTML = ''; // Clear previous schedule

    let currentBalance = principal;

    for (let year = 1; year <= tenureYears; year++) {
        const openingBalance = currentBalance;
        const interestEarnedThisYear = currentBalance * (Math.pow((1 + annualInterestRate / compoundingFrequency), compoundingFrequency) - 1);
        currentBalance += interestEarnedThisYear;

        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${year}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(openingBalance)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(interestEarnedThisYear)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(currentBalance)}</td>
        `;
        growthTableBody.appendChild(row);
    }
}

/**
 * Updates the Chart.js pie chart with principal and interest data.
 * @param {number} principal The total principal amount.
 * @param {number} totalInterestEarned The total interest earned.
 */
function updateChart(principal, totalInterestEarned) {
    const ctx = fdChartCanvas.getContext('2d');

    if (fdChart) {
        fdChart.destroy(); // Destroy existing chart before creating a new one
    }

    fdChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Principal Amount', 'Total Interest Earned'],
            datasets: [{
                data: [principal, totalInterestEarned],
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