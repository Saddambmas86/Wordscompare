<?php
// SEO and Page Metadata
$page_title = "Flat vs Reducing Rate Calculator - Compare Loan Rates"; // You may Change the Title here
$page_description = "Free flat vs reducing rate calculator. Compare flat interest rates and reducing balance rates on loans. Find the true cost of your loan and make smarter decisions."; // Put your Description here
$page_keywords = "flat vs reducing rate calculator - compare loan rates, flat, reducing, rate, calculator, compare, loan, rates, free online tools, pdf tools";

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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">Flat vs. Reducing Rate Loan Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Compare loan costs and monthly payments for Flat Rate and Reducing Balance interest methods.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Loan Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="loan-amount" class="form-label mb-1">Loan Amount</label>
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
                                            <span class="h5 fw-semibold text-primary"><span id="loan-amount-text">10,00,000</span></span>
                                        </div>
                                    </div>
                                    <input type="range" id="loan-amount" min="100000" max="5000000" step="50000" value="1000000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="interest-rate" class="form-label mb-1">Annual Interest Rate</label>
                                        <span class="h5 fw-semibold text-primary"><span id="interest-rate-text">10.0</span> %</span>
                                    </div>
                                    <input type="range" id="interest-rate" min="5" max="25" step="0.1" value="10.0" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="loan-tenure" class="form-label mb-1">Loan Tenure (Years)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="loan-tenure-text">5</span> Years</span>
                                    </div>
                                    <input type="range" id="loan-tenure" min="1" max="15" step="1" value="5" class="form-range mt-2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="loan-comparison-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <h3 class="h4 fw-bold text-gray-700 mb-3">Comparison Summary</h3>
                            <div class="row g-3">
                                <div class="col-6">
                                    <p class="h5 text-gray-600">Flat Rate Loan</p>
                                    <p id="flat-emi-result" class="h4 fw-bold text-gray-800 mb-1">0 EMI</p>
                                    <p id="flat-total-payment-result" class="small text-gray-500">Total: 0</p>
                                </div>
                                <div class="col-6">
                                    <p class="h5 text-gray-600">Reducing Rate Loan</p>
                                    <p id="reducing-emi-result" class="h4 fw-bold text-gray-800 mb-1">0 EMI</p>
                                    <p id="reducing-total-payment-result" class="small text-gray-500">Total: 0</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="h5 text-gray-600">Savings with Reducing Rate</p>
                                <p id="savings-result" class="display-6 fw-bold text-primary">0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    
        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Detailed Breakdown</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Metric</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Flat Rate</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Reducing Balance</th>
                            </tr>
                        </thead>
                        <tbody id="comparison-table-body" class="bg-white">
                            <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Monthly Payment (EMI)</td>
                                <td id="table-flat-emi" class="py-2 px-4 border-b text-right text-sm text-gray-800">0</td>
                                <td id="table-reducing-emi" class="py-2 px-4 border-b text-right text-sm text-gray-800">0</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Total Interest Payable</td>
                                <td id="table-flat-interest" class="py-2 px-4 border-b text-right text-sm text-gray-800">0</td>
                                <td id="table-reducing-interest" class="py-2 px-4 border-b text-right text-sm text-gray-800">0</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Total Amount Payable</td>
                                <td id="table-flat-total" class="py-2 px-4 border-b text-right text-sm text-gray-800">0</td>
                                <td id="table-reducing-total" class="py-2 px-4 border-b text-right text-sm text-gray-800">0</td>
                            </tr>
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
                <?php include '../../views/content/flat-vs-reducing-rate-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Flat vs. Reducing Rate Loan Calculator
let comparisonChart; // Variable to hold the Chart.js instance

// Get DOM elements
const loanAmountSlider = document.getElementById('loan-amount');
const loanAmountText = document.getElementById('loan-amount-text');
const interestRateSlider = document.getElementById('interest-rate');
const interestRateText = document.getElementById('interest-rate-text');
const loanTenureSlider = document.getElementById('loan-tenure');
const loanTenureText = document.getElementById('loan-tenure-text');

const flatEmiResult = document.getElementById('flat-emi-result');
const flatTotalPaymentResult = document.getElementById('flat-total-payment-result');
const reducingEmiResult = document.getElementById('reducing-emi-result');
const reducingTotalPaymentResult = document.getElementById('reducing-total-payment-result');
const savingsResult = document.getElementById('savings-result');

const tableFlatEmi = document.getElementById('table-flat-emi');
const tableFlatInterest = document.getElementById('table-flat-interest');
const tableFlatTotal = document.getElementById('table-flat-total');
const tableReducingEmi = document.getElementById('table-reducing-emi');
const tableReducingInterest = document.getElementById('table-reducing-interest');
const tableReducingTotal = document.getElementById('table-reducing-total');

const loanComparisonChartCanvas = document.getElementById('loan-comparison-chart');
const currencySelect = document.getElementById('currency-select'); // Get the currency select element


// Event Listeners for sliders and currency select
loanAmountSlider.addEventListener('input', updateCalculator);
interestRateSlider.addEventListener('input', updateCalculator);
loanTenureSlider.addEventListener('input', updateCalculator);
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
    const selectedCurrency = currencySelect.value; // Use the selected currency
    return new Intl.NumberFormat('en-IN', { // 'en-IN' locale is good for number formatting, currency symbol changes with 'currency' option
        style: 'currency',
        currency: selectedCurrency, // Use selectedCurrency here
        minimumFractionDigits: 0, 
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the displayed values for sliders and triggers loan calculations.
 */
function updateCalculator() {
    // Update slider text displays
    loanAmountText.textContent = new Intl.NumberFormat('en-IN').format(loanAmountSlider.value);
    interestRateText.textContent = interestRateSlider.value;
    loanTenureText.textContent = loanTenureSlider.value;

    calculateLoans();
}

/**
 * Calculates and compares Flat Rate and Reducing Balance loans.
 */
function calculateLoans() {
    const principal = parseFloat(loanAmountSlider.value);
    const annualInterestRate = parseFloat(interestRateSlider.value);
    const loanTenureYears = parseFloat(loanTenureSlider.value);
    const loanTenureMonths = loanTenureYears * 12;

    // --- Flat Rate Loan Calculation ---
    const flatRateInterestAmount = (principal * annualInterestRate * loanTenureYears) / 100;
    const flatRateTotalPayment = principal + flatRateInterestAmount;
    const flatRateEMI = flatRateTotalPayment / loanTenureMonths;

    // --- Reducing Balance Loan (EMI) Calculation ---
    // Convert annual interest rate to monthly rate
    const monthlyInterestRate = annualInterestRate / (12 * 100);

    let reducingRateEMI = 0;
    let reducingRateTotalPayment = 0;
    let reducingRateTotalInterest = 0;

    if (monthlyInterestRate === 0) {
        reducingRateEMI = principal / loanTenureMonths;
        reducingRateTotalInterest = 0;
        reducingRateTotalPayment = principal;
    } else {
        // EMI formula: P * R * (1 + R)^N / ((1 + R)^N - 1)
        const numerator = principal * monthlyInterestRate * Math.pow((1 + monthlyInterestRate), loanTenureMonths);
        const denominator = Math.pow((1 + monthlyInterestRate), loanTenureMonths) - 1;
        reducingRateEMI = numerator / denominator;

        reducingRateTotalPayment = reducingRateEMI * loanTenureMonths;
        reducingRateTotalInterest = reducingRateTotalPayment - principal;
    }

    const savings = flatRateTotalPayment - reducingRateTotalPayment;

    // Update results in UI (Summary)
    flatEmiResult.textContent = formatCurrency(flatRateEMI) + ' EMI';
    flatTotalPaymentResult.textContent = 'Total: ' + formatCurrency(flatRateTotalPayment);
    reducingEmiResult.textContent = formatCurrency(reducingRateEMI) + ' EMI';
    reducingTotalPaymentResult.textContent = 'Total: ' + formatCurrency(reducingRateTotalPayment);
    savingsResult.textContent = formatCurrency(savings);

    // Update results in UI (Detailed Table)
    tableFlatEmi.textContent = formatCurrency(flatRateEMI);
    tableFlatInterest.textContent = formatCurrency(flatRateInterestAmount);
    tableFlatTotal.textContent = formatCurrency(flatRateTotalPayment);
    tableReducingEmi.textContent = formatCurrency(reducingRateEMI);
    tableReducingInterest.textContent = formatCurrency(reducingRateTotalInterest);
    tableReducingTotal.textContent = formatCurrency(reducingRateTotalPayment);

    // Update chart
    updateChart(flatRateTotalPayment, reducingRateTotalPayment);
}

/**
 * Updates the Chart.js bar chart with total payment comparison.
 * @param {number} flatTotal The total payment for flat rate loan.
 * @param {number} reducingTotal The total payment for reducing balance loan.
 */
function updateChart(flatTotal, reducingTotal) {
    const ctx = loanComparisonChartCanvas.getContext('2d');

    if (comparisonChart) {
        comparisonChart.destroy(); // Destroy existing chart before creating a new one
    }

    comparisonChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Flat Rate Loan', 'Reducing Rate Loan'],
            datasets: [{
                label: 'Total Amount Payable',
                data: [flatTotal, reducingTotal],
                backgroundColor: ['#f59e0b', '#4F46E5'], // Yellow 500 and Indigo 600
                borderColor: ['#f59e0b', '#4F46E5'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y', // Make it a horizontal bar chart
            plugins: {
                legend: {
                    display: false // Hide legend as bars are self-explanatory
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.dataset.label || '';
                            const value = context.parsed.x || 0;
                            return `${label}: ${formatCurrency(value)}`; // Use formatCurrency for tooltip
                        }
                    }
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total Amount Payable' // Removed currency symbol, will be added by formatCurrency in tick callback
                    },
                    ticks: {
                        callback: function(value, index, values) {
                            return formatCurrency(value); // Use formatCurrency for x-axis ticks
                        }
                    }
                },
                y: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
}
</script>

<?php include '../../includes/footer.php'; ?>