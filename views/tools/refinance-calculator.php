<?php
// SEO and Page Metadata
$page_title = "Refinance Calculator"; // You may Change the Title here
$page_description = "Refinance Calculator online."; // Put your Description here
$page_keywords = "refinance calculator, loan refinance, mortgage refinance, personal loan refinance, loan comparison, interest savings";

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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">Refinance Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Discover your potential savings by refinancing your existing loan.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Current Loan Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="current-loan-amount" class="form-label mb-1">Current Loan Balance</label>
                                        <div class="d-flex align-items-center">
                                            <select id="currency-select-current" class="form-select form-select-sm me-2">
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
                                            <span class="h5 fw-semibold text-primary"><span id="current-loan-amount-text">20,00,000</span></span>
                                        </div>
                                    </div>
                                    <input type="range" id="current-loan-amount" min="100000" max="50000000" step="50000" value="2000000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="current-interest-rate" class="form-label mb-1">Current Interest Rate</label>
                                        <span class="h5 fw-semibold text-primary"><span id="current-interest-rate-text">10.0</span> %</span>
                                    </div>
                                    <input type="range" id="current-interest-rate" min="3" max="25" step="0.1" value="10.0" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="current-loan-tenure" class="form-label mb-1">Remaining Tenure (Years)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="current-loan-tenure-text">15</span> Years</span>
                                    </div>
                                    <input type="range" id="current-loan-tenure" min="1" max="30" step="1" value="15" class="form-range mt-2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">New Loan Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="new-loan-amount" class="form-label mb-1">New Loan Amount</label>
                                        <div class="d-flex align-items-center">
                                            <select id="currency-select-new" class="form-select form-select-sm me-2">
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
                                            <span class="h5 fw-semibold text-primary"><span id="new-loan-amount-text">20,00,000</span></span>
                                        </div>
                                    </div>
                                    <input type="range" id="new-loan-amount" min="100000" max="50000000" step="50000" value="2000000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="new-interest-rate" class="form-label mb-1">New Interest Rate</label>
                                        <span class="h5 fw-semibold text-primary"><span id="new-interest-rate-text">8.0</span> %</span>
                                    </div>
                                    <input type="range" id="new-interest-rate" min="3" max="25" step="0.1" value="8.0" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="new-loan-tenure" class="form-label mb-1">New Loan Tenure (Years)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="new-loan-tenure-text">15</span> Years</span>
                                    </div>
                                    <input type="range" id="new-loan-tenure" min="1" max="30" step="1" value="15" class="form-range mt-2">
                                </div>
                                
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="refinance-cost" class="form-label mb-1">Refinancing Costs</label>
                                        <span class="h5 fw-semibold text-primary"><span id="refinance-cost-text">0</span></span>
                                    </div>
                                    <input type="range" id="refinance-cost" min="0" max="1000000" step="1000" value="0" class="form-range mt-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-4 py-4">
                    <div class="col-12">
                        <div class="p-4 rounded border text-center">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Refinance Summary</h3>
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-4 text-center mb-3 mb-md-0">
                                    <p class="h5 text-gray-600">Current EMI</p>
                                    <p id="current-emi-result" class="display-6 fw-bold text-gray-800">0</p>
                                </div>
                                <div class="col-md-4 text-center mb-3 mb-md-0">
                                    <p class="h5 text-gray-600">New EMI</p>
                                    <p id="new-emi-result" class="display-6 fw-bold text-gray-800">0</p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <p class="h5 text-gray-600">Monthly Savings</p>
                                    <p id="monthly-savings-result" class="display-6 fw-bold text-success">0</p>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="row justify-content-center">
                                <div class="col-md-6 text-center mb-3 mb-md-0">
                                    <p class="h5 text-gray-600">Total Interest (Current)</p>
                                    <p id="total-interest-current" class="h4 fw-semibold text-gray-800">0</p>
                                </div>
                                <div class="col-md-6 text-center">
                                    <p class="h5 text-gray-600">Total Interest (New + Costs)</p>
                                    <p id="total-interest-new" class="h4 fw-semibold text-gray-800">0</p>
                                </div>
                            </div>
                             <div class="mt-4">
                                <p class="h5 text-gray-600">Total Savings Over Loan Term</p>
                                <p id="total-savings-result" class="display-5 fw-bold text-success">0</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row g-4 py-5 justify-content-center">
                     <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">EMI Comparison Chart</h3>
                     <div class="col-12 col-md-8" style="max-width: 500px; max-height: 400px;">
                        <canvas id="emi-comparison-chart"></canvas>
                     </div>
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
                <?php include '../../views/content/refinance-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Refinance Calculator
let emiComparisonChart; // Variable to hold the Chart.js instance

// Get DOM elements for Current Loan
const currentLoanAmountSlider = document.getElementById('current-loan-amount');
const currentLoanAmountText = document.getElementById('current-loan-amount-text');
const currentInterestRateSlider = document.getElementById('current-interest-rate');
const currentInterestRateText = document.getElementById('current-interest-rate-text');
const currentLoanTenureSlider = document.getElementById('current-loan-tenure');
const currentLoanTenureText = document.getElementById('current-loan-tenure-text');
const currencySelectCurrent = document.getElementById('currency-select-current'); // Get the currency select element for current loan

// Get DOM elements for New Loan
const newLoanAmountSlider = document.getElementById('new-loan-amount');
const newLoanAmountText = document.getElementById('new-loan-amount-text');
const newInterestRateSlider = document.getElementById('new-interest-rate');
const newInterestRateText = document.getElementById('new-interest-rate-text');
const newLoanTenureSlider = document.getElementById('new-loan-tenure');
const newLoanTenureText = document.getElementById('new-loan-tenure-text');
const refinanceCostSlider = document.getElementById('refinance-cost');
const refinanceCostText = document.getElementById('refinance-cost-text');
const currencySelectNew = document.getElementById('currency-select-new'); // Get the currency select element for new loan


// Get Result Display Elements
const currentEmiResult = document.getElementById('current-emi-result');
const newEmiResult = document.getElementById('new-emi-result');
const monthlySavingsResult = document.getElementById('monthly-savings-result');
const totalInterestCurrent = document.getElementById('total-interest-current');
const totalInterestNew = document.getElementById('total-interest-new');
const totalSavingsResult = document.getElementById('total-savings-result');

const emiComparisonChartCanvas = document.getElementById('emi-comparison-chart');


// Event Listeners for sliders and input
currentLoanAmountSlider.addEventListener('input', updateCalculator);
currentInterestRateSlider.addEventListener('input', updateCalculator);
currentLoanTenureSlider.addEventListener('input', updateCalculator);
currencySelectCurrent.addEventListener('change', updateCalculator); // Add event listener for currency select for current loan

newLoanAmountSlider.addEventListener('input', updateCalculator);
newInterestRateSlider.addEventListener('input', updateCalculator);
newLoanTenureSlider.addEventListener('input', updateCalculator);
refinanceCostSlider.addEventListener('input', updateCalculator);
currencySelectNew.addEventListener('change', updateCalculator); // Add event listener for currency select for new loan


// Initial calculation on page load
window.onload = function() {
    // Set initial new loan amount to match current loan balance
    newLoanAmountSlider.value = currentLoanAmountSlider.value;
    // Set initial new loan currency to match current loan currency
    currencySelectNew.value = currencySelectCurrent.value; 
    updateCalculator();
};

/**
 * Formats a number as currency based on the selected currency.
 * @param {number} amount The number to format.
 * @param {string} currencyId The ID of the currency select element (e.g., 'currency-select-current').
 * @returns {string} The formatted currency string.
 */
function formatCurrency(amount, currencyId) {
    const selectedCurrency = document.getElementById(currencyId).value; // Get the selected currency from the correct dropdown
    return new Intl.NumberFormat('en-IN', {
        style: 'currency',
        currency: selectedCurrency,
        minimumFractionDigits: 0, // No decimal places for whole amounts
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the displayed values for sliders and triggers refinance calculation.
 */
function updateCalculator() {
    // Update slider text displays - Current Loan
    currentLoanAmountText.textContent = new Intl.NumberFormat('en-IN').format(currentLoanAmountSlider.value);
    currentInterestRateText.textContent = currentInterestRateSlider.value;
    currentLoanTenureText.textContent = currentLoanTenureSlider.value;

    // Update slider text displays - New Loan
    newLoanAmountText.textContent = new Intl.NumberFormat('en-IN').format(newLoanAmountSlider.value);
    newInterestRateText.textContent = newInterestRateSlider.value;
    newLoanTenureText.textContent = newLoanTenureSlider.value;
    refinanceCostText.textContent = new Intl.NumberFormat('en-IN').format(refinanceCostSlider.value);

    calculateRefinance();
}

/**
 * Calculates EMI for a given principal, annual rate, and tenure.
 * @param {number} principal 
 * @param {number} annualRate 
 * @param {number} tenureYears 
 * @returns {number} The calculated monthly EMI.
 */
function calculateEMI(principal, annualRate, tenureYears) {
    const monthlyInterestRate = (annualRate / 100) / 12;
    const tenureMonths = tenureYears * 12;

    if (monthlyInterestRate === 0) {
        return principal / tenureMonths;
    }

    const numerator = principal * monthlyInterestRate * Math.pow((1 + monthlyInterestRate), tenureMonths);
    const denominator = Math.pow((1 + monthlyInterestRate), tenureMonths) - 1;
    return numerator / denominator;
}

/**
 * Calculates total interest paid for a loan.
 * @param {number} emi 
 * @param {number} principal 
 * @param {number} tenureYears 
 * @returns {number} The total interest.
 */
function calculateTotalInterest(emi, principal, tenureYears) {
    const tenureMonths = tenureYears * 12;
    const totalPayment = emi * tenureMonths;
    return totalPayment - principal;
}

/**
 * Performs the refinance calculation and updates UI.
 */
function calculateRefinance() {
    // Current Loan
    const currentPrincipal = parseFloat(currentLoanAmountSlider.value);
    const currentAnnualRate = parseFloat(currentInterestRateSlider.value);
    const currentTenureYears = parseFloat(currentLoanTenureSlider.value);

    const currentEmi = calculateEMI(currentPrincipal, currentAnnualRate, currentTenureYears);
    const currentTotalInterest = calculateTotalInterest(currentEmi, currentPrincipal, currentTenureYears);

    // New Loan
    const newPrincipal = parseFloat(newLoanAmountSlider.value);
    const newAnnualRate = parseFloat(newInterestRateSlider.value);
    const newTenureYears = parseFloat(newLoanTenureSlider.value);
    const refinanceCosts = parseFloat(refinanceCostSlider.value);

    const newEmi = calculateEMI(newPrincipal, newAnnualRate, newTenureYears);
    let newTotalInterest = calculateTotalInterest(newEmi, newPrincipal, newTenureYears);
    newTotalInterest += refinanceCosts; // Add refinance costs to total interest for comparison

    // Calculate Savings
    const monthlySavings = currentEmi - newEmi;
    const totalSavings = (currentPrincipal + currentTotalInterest) - (newPrincipal + newTotalInterest); // Total payment difference, considering principal might change


    // Update UI - Pass the correct currency select ID to formatCurrency
    currentEmiResult.textContent = formatCurrency(currentEmi, 'currency-select-current');
    newEmiResult.textContent = formatCurrency(newEmi, 'currency-select-new');
    monthlySavingsResult.textContent = formatCurrency(monthlySavings, 'currency-select-new'); // Use new loan currency for savings
    monthlySavingsResult.classList.toggle('text-success', monthlySavings >= 0);
    monthlySavingsResult.classList.toggle('text-danger', monthlySavings < 0);


    totalInterestCurrent.textContent = formatCurrency(currentTotalInterest, 'currency-select-current');
    totalInterestNew.textContent = formatCurrency(newTotalInterest, 'currency-select-new');
    totalSavingsResult.textContent = formatCurrency(totalSavings, 'currency-select-new'); // Use new loan currency for total savings
    totalSavingsResult.classList.toggle('text-success', totalSavings >= 0);
    totalSavingsResult.classList.toggle('text-danger', totalSavings < 0);

    // Update Chart
    updateChart(currentEmi, newEmi);
}

/**
 * Updates the Chart.js bar chart with EMI comparison.
 * @param {number} currentEmi
 * @param {number} newEmi
 */
function updateChart(currentEmi, newEmi) {
    const ctx = emiComparisonChartCanvas.getContext('2d');

    if (emiComparisonChart) {
        emiComparisonChart.destroy(); // Destroy existing chart before creating a new one
    }

    emiComparisonChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Current EMI', 'New EMI'],
            datasets: [{
                label: 'Monthly EMI',
                data: [currentEmi, newEmi],
                backgroundColor: ['#4F46E5', '#f59e0b'], // Indigo 600 and Yellow 500
                borderColor: ['#4F46E5', '#f59e0b'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        // Use the currency symbol from the new loan for the chart's y-axis title
                        text: 'EMI Amount (' + document.getElementById('currency-select-new').selectedOptions[0].text.split(' ')[1] + ')' 
                    },
                    ticks: {
                        callback: function(value, index, values) {
                            // Use the new loan currency for chart tooltips and axis labels
                            return formatCurrency(value, 'currency-select-new');
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false // Hide dataset legend as labels are self-explanatory
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.dataset.label || '';
                            const value = context.parsed.y || 0;
                            // Use the new loan currency for chart tooltips
                            return `${label}: ${formatCurrency(value, 'currency-select-new')}`;
                        }
                    }
                }
            }
        }
    });
}
</script>

<?php include '../../includes/footer.php'; ?>