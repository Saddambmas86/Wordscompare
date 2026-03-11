<?php
// SEO and Page Metadata
$page_title = "Home Loan EMI Calculator"; // You may Change the Title here
$page_description = "Home Loan EMI Calculator online."; // Put your Description here
$page_keywords = "home loan EMI calculator, loan calculator, home loan EMI, loan amortization, interest calculation";

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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">Home Loan EMI Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Plan your home loan with confidence. Calculate your monthly EMI, total interest, and see a full amortization schedule.
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
                                            <span class="h5 fw-semibold text-primary"><span id="loan-amount-text">20,00,000</span></span>
                                        </div>
                                    </div>
                                    <input type="range" id="loan-amount" min="100000" max="20000000" step="50000" value="2000000" class="form-range mt-2">
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
                            <canvas id="emi-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Monthly EMI</p>
                            <p id="emi-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Total Interest</p>
                                    <p id="total-interest-result" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Total Payable</p>
                                    <p id="total-payment-result" class="h4 fw-semibold text-gray-800">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    
        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Amortization Schedule (Year-wise)</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Year</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Principal Paid</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Interest Paid</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Total Payment</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Balance</th>
                            </tr>
                        </thead>
                        <tbody id="amortization-table-body" class="bg-white">
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
                <?php include '../../views/content/home-loan-emi-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for EMI Calculator
let emiChart; // Variable to hold the Chart.js instance

// Get DOM elements
const loanAmountSlider = document.getElementById('loan-amount');
const loanAmountText = document.getElementById('loan-amount-text');
const interestRateSlider = document.getElementById('interest-rate');
const interestRateText = document.getElementById('interest-rate-text');
const loanTenureSlider = document.getElementById('loan-tenure');
const loanTenureText = document.getElementById('loan-tenure-text');

const emiResult = document.getElementById('emi-result');
const totalInterestResult = document.getElementById('total-interest-result');
const totalPaymentResult = document.getElementById('total-payment-result');
const amortizationTableBody = document.getElementById('amortization-table-body');
const emiChartCanvas = document.getElementById('emi-chart');
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
    const selectedCurrency = currencySelect.value;
    return new Intl.NumberFormat('en-IN', { // 'en-IN' locale is good for number formatting, currency symbol changes with 'currency' option
        style: 'currency',
        currency: selectedCurrency,
        minimumFractionDigits: 0, // No decimal places for whole rupees
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the displayed values for sliders and triggers EMI calculation.
 */
function updateCalculator() {
    // Update slider text displays
    loanAmountText.textContent = new Intl.NumberFormat('en-IN').format(loanAmountSlider.value);
    interestRateText.textContent = interestRateSlider.value;
    loanTenureText.textContent = loanTenureSlider.value;

    calculateEMI();
}

/**
 * Calculates the EMI, total interest, and total payable, then updates the UI.
 */
function calculateEMI() {
    const principal = parseFloat(loanAmountSlider.value);
    const annualInterestRate = parseFloat(interestRateSlider.value);
    const loanTenureYears = parseFloat(loanTenureSlider.value);

    // Convert annual interest rate to monthly rate
    const monthlyInterestRate = annualInterestRate / (12 * 100);
    // Convert loan tenure from years to months
    const loanTenureMonths = loanTenureYears * 12;

    let emi = 0;
    let totalInterest = 0;
    let totalPayment = 0;

    if (monthlyInterestRate === 0) {
        // Simple calculation if interest rate is 0
        emi = principal / loanTenureMonths;
        totalInterest = 0;
        totalPayment = principal;
    } else {
        // EMI formula: P * R * (1 + R)^N / ((1 + R)^N - 1)
        const numerator = principal * monthlyInterestRate * Math.pow((1 + monthlyInterestRate), loanTenureMonths);
        const denominator = Math.pow((1 + monthlyInterestRate), loanTenureMonths) - 1;
        emi = numerator / denominator;

        totalPayment = emi * loanTenureMonths;
        totalInterest = totalPayment - principal;
    }

    // Update results in UI
    emiResult.textContent = formatCurrency(emi);
    totalInterestResult.textContent = formatCurrency(totalInterest);
    totalPaymentResult.textContent = formatCurrency(totalPayment);

    // Generate and display amortization schedule
    generateAmortizationSchedule(principal, monthlyInterestRate, loanTenureMonths, emi);
    // Update chart
    updateChart(principal, totalInterest);
}

/**
 * Generates and displays the year-wise amortization schedule.
 * @param {number} principal The initial loan principal.
 * @param {number} monthlyInterestRate The monthly interest rate.
 * @param {number} loanTenureMonths The total loan tenure in months.
 * @param {number} emi The calculated monthly EMI.
 */
function generateAmortizationSchedule(principal, monthlyInterestRate, loanTenureMonths, emi) {
    amortizationTableBody.innerHTML = ''; // Clear previous schedule

    let remainingBalance = principal;
    let totalPrincipalPaid = 0;
    let totalInterestPaid = 0;

    for (let year = 1; year <= loanTenureMonths / 12; year++) {
        let annualPrincipalPaid = 0;
        let annualInterestPaid = 0;

        // Calculate for each month in the year
        for (let month = 1; month <= 12; month++) {
            if (remainingBalance <= 0) break; // Stop if loan is paid off

            const interestForMonth = remainingBalance * monthlyInterestRate;
            let principalForMonth = emi - interestForMonth;

            // Adjust last payment if remaining balance is less than principalForMonth
            if (principalForMonth > remainingBalance) {
                principalForMonth = remainingBalance;
                // If EMI calculation makes the last principal slightly negative or overshoots, cap it at remainingBalance
                if (principalForMonth < 0) principalForMonth = 0;
                // Recalculate EMI for this last month based on exact remaining principal + interest
                emi = interestForMonth + principalForMonth;
            }

            remainingBalance -= principalForMonth;

            annualPrincipalPaid += principalForMonth;
            annualInterestPaid += interestForMonth;
        }

        totalPrincipalPaid += annualPrincipalPaid;
        totalInterestPaid += annualInterestPaid;

        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${year}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(annualPrincipalPaid)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(annualInterestPaid)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(annualPrincipalPaid + annualInterestPaid)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(Math.max(0, remainingBalance))}</td>
        `;
        amortizationTableBody.appendChild(row);

        if (remainingBalance <= 0) break; // Ensure loop breaks if loan is fully paid mid-year
    }
}

/**
 * Updates the Chart.js pie chart with principal and interest data.
 * @param {number} principal The total principal amount.
 * @param {number} totalInterest The total interest paid.
 */
function updateChart(principal, totalInterest) {
    const ctx = emiChartCanvas.getContext('2d');

    if (emiChart) {
        emiChart.destroy(); // Destroy existing chart before creating a new one
    }

    emiChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Principal Amount', 'Total Interest'],
            datasets: [{
                data: [principal, totalInterest],
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