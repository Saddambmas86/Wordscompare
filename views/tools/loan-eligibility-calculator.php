<?php
// SEO and Page Metadata
$page_title = "Loan Eligibility Calculator - Check Loan Amount Online Free"; // You may Change the Title here
$page_description = "Free loan eligibility calculator. Check how much home, car, or personal loan you can get based on your income, expenses, and credit profile. Instant results."; // Put your Description here
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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">Loan Eligibility Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Find out how much you can borrow. Estimate your loan eligibility based on your financial details.
                    </p>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Your Financial Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="monthly-income" class="form-label mb-1">Monthly Income</label>
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
                                            <span class="h5 fw-semibold text-primary"><span id="monthly-income-text">50,000</span></span>
                                        </div>
                                    </div>
                                    <input type="range" id="monthly-income" min="10000" max="500000" step="5000" value="50000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="existing-emi" class="form-label mb-1">Existing Monthly EMIs</label>
                                        <span class="h5 fw-semibold text-primary"><span id="existing-emi-text">10,000</span></span>
                                    </div>
                                    <input type="range" id="existing-emi" min="0" max="250000" step="1000" value="10000" class="form-range mt-2">
                                </div>
                                
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="interest-rate" class="form-label mb-1">Interest Rate</label>
                                        <span class="h5 fw-semibold text-primary"><span id="interest-rate-text">8.5</span> %</span>
                                    </div>
                                    <input type="range" id="interest-rate" min="5" max="20" step="0.1" value="8.5" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="loan-tenure" class="form-label mb-1">Loan Tenure (Years)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="loan-tenure-text">10</span> Years</span>
                                    </div>
                                    <input type="range" id="loan-tenure" min="1" max="30" step="1" value="10" class="form-range mt-2">
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="eligibility-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Max. Loan Amount</p>
                            <p id="loan-amount-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Affordable EMI</p>
                                    <p id="affordable-emi-result" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Debt-to-Income Ratio</p>
                                    <p id="dti-ratio-result" class="h4 fw-semibold text-gray-800">0 %</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">How is Loan Eligibility Calculated?</h3>
            <div class="col-12 px-0">
                <div class="p-4 rounded border">
                    <p class="text-gray-600">
                        Loan eligibility is primarily determined by a bank or lender's assessment of your ability to repay the loan.
                        A key factor is your **Debt-to-Income (DTI) ratio**, which compares your total monthly debt payments to your
                        gross monthly income. Lenders typically prefer a DTI ratio below a certain threshold (e.g., 40-50%) to ensure
                        you have enough income left to comfortably make your new EMI payments.
                    </p>
                    <p class="text-gray-600 mt-3">
                        The calculation involves estimating your **maximum affordable EMI** first, which is a percentage of your
                        monthly income after accounting for your existing monthly debts. From there, the calculator works backwards
                        using the interest rate and loan tenure to determine the maximum principal amount you can borrow.
                    </p>
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
                <?php include '../../views/content/loan-eligibility-calculator-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Loan Eligibility Calculator
let eligibilityChart; // Variable to hold the Chart.js instance
const DTI_THRESHOLD = 0.5; // Maximum Debt-to-Income ratio (e.g., 50%)

// Get DOM elements
const monthlyIncomeSlider = document.getElementById('monthly-income');
const monthlyIncomeText = document.getElementById('monthly-income-text');
const existingEmiSlider = document.getElementById('existing-emi');
const existingEmiText = document.getElementById('existing-emi-text');
const interestRateSlider = document.getElementById('interest-rate');
const interestRateText = document.getElementById('interest-rate-text');
const loanTenureSlider = document.getElementById('loan-tenure');
const loanTenureText = document.getElementById('loan-tenure-text');

const loanAmountResult = document.getElementById('loan-amount-result');
const affordableEmiResult = document.getElementById('affordable-emi-result');
const dtiRatioResult = document.getElementById('dti-ratio-result');
const eligibilityChartCanvas = document.getElementById('eligibility-chart');
const currencySelect = document.getElementById('currency-select');

// Event Listeners for sliders and currency select
monthlyIncomeSlider.addEventListener('input', updateCalculator);
existingEmiSlider.addEventListener('input', updateCalculator);
interestRateSlider.addEventListener('input', updateCalculator);
loanTenureSlider.addEventListener('input', updateCalculator);
currencySelect.addEventListener('change', updateCalculator);

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
    return new Intl.NumberFormat('en-IN', {
        style: 'currency',
        currency: selectedCurrency,
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the displayed values for sliders and triggers eligibility calculation.
 */
function updateCalculator() {
    // Update slider text displays
    monthlyIncomeText.textContent = new Intl.NumberFormat('en-IN').format(monthlyIncomeSlider.value);
    existingEmiText.textContent = new Intl.NumberFormat('en-IN').format(existingEmiSlider.value);
    interestRateText.textContent = interestRateSlider.value;
    loanTenureText.textContent = loanTenureSlider.value;

    calculateEligibility();
}

/**
 * Calculates the maximum eligible loan amount and updates the UI.
 */
function calculateEligibility() {
    const monthlyIncome = parseFloat(monthlyIncomeSlider.value);
    const existingEmi = parseFloat(existingEmiSlider.value);
    const annualInterestRate = parseFloat(interestRateSlider.value);
    const loanTenureYears = parseFloat(loanTenureSlider.value);

    // Calculate maximum affordable EMI based on DTI ratio
    const maxAffordableEmi = (monthlyIncome * DTI_THRESHOLD) - existingEmi;

    let eligibleLoanAmount = 0;
    
    // Check if the maxAffordableEmi is positive
    if (maxAffordableEmi > 0) {
        // Convert annual interest rate to monthly rate
        const monthlyInterestRate = annualInterestRate / (12 * 100);
        // Convert loan tenure from years to months
        const loanTenureMonths = loanTenureYears * 12;

        if (monthlyInterestRate === 0) {
            // Simple calculation if interest rate is 0
            eligibleLoanAmount = maxAffordableEmi * loanTenureMonths;
        } else {
            // Reverse EMI formula to find principal: P = EMI * ((1 + R)^N - 1) / (R * (1 + R)^N)
            const numerator = Math.pow((1 + monthlyInterestRate), loanTenureMonths) - 1;
            const denominator = monthlyInterestRate * Math.pow((1 + monthlyInterestRate), loanTenureMonths);
            eligibleLoanAmount = maxAffordableEmi * (numerator / denominator);
        }
    }

    // Calculate the Debt-to-Income ratio for the affordable EMI
    const dtiRatio = ((maxAffordableEmi + existingEmi) / monthlyIncome) * 100;

    // Update results in UI
    loanAmountResult.textContent = formatCurrency(eligibleLoanAmount);
    affordableEmiResult.textContent = formatCurrency(maxAffordableEmi);
    dtiRatioResult.textContent = dtiRatio.toFixed(1) + ' %';

    // Update chart
    updateChart(monthlyIncome, existingEmi, maxAffordableEmi);
}

/**
 * Updates the Chart.js pie chart with income and debt data.
 * @param {number} monthlyIncome The total monthly income.
 * @param {number} existingEmi The existing monthly EMI.
 * @param {number} maxAffordableEmi The calculated maximum affordable EMI.
 */
function updateChart(monthlyIncome, existingEmi, maxAffordableEmi) {
    const ctx = eligibilityChartCanvas.getContext('2d');
    
    if (eligibilityChart) {
        eligibilityChart.destroy(); // Destroy existing chart before creating a new one
    }

    // Calculate remaining income after all EMIs
    const remainingIncome = monthlyIncome - existingEmi - maxAffordableEmi;
    
    eligibilityChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Existing EMIs', 'Affordable New EMI', 'Remaining Income'],
            datasets: [{
                data: [existingEmi, maxAffordableEmi, remainingIncome > 0 ? remainingIncome : 0],
                backgroundColor: ['#f59e0b', '#4F46E5', '#10B981'], // Orange 500, Indigo 600, Green 500
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