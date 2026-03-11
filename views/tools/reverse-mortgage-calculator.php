<?php
// SEO and Page Metadata
$page_title = "Reverse Mortgage Calculator - HECM Loan Calculator Online"; // You may Change the Title here
$page_description = "Free reverse mortgage calculator for seniors 62+. Calculate HECM loan limits, monthly income, and tenure. Plan your retirement income from home equity."; // Put your Description here
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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">Reverse Mortgage Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Estimate the potential proceeds from a reverse mortgage based on your home value, age, and interest rates.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Your Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="home-value" class="form-label mb-1">Current Home Value</label>
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
                                            <span class="h5 fw-semibold text-primary"><span id="home-value-text">50,00,000</span></span>
                                        </div>
                                    </div>
                                    <input type="range" id="home-value" min="1000000" max="50000000" step="500000" value="5000000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="age" class="form-label mb-1">Youngest Borrower's Age</label>
                                        <span class="h5 fw-semibold text-primary"><span id="age-text">62</span> Years</span>
                                    </div>
                                    <input type="range" id="age" min="62" max="99" step="1" value="62" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="interest-rate" class="form-label mb-1">Expected Interest Rate</label>
                                        <span class="h5 fw-semibold text-primary"><span id="interest-rate-text">6.0</span> %</span>
                                    </div>
                                    <input type="range" id="interest-rate" min="3" max="10" step="0.1" value="6.0" class="form-range mt-2">
                                </div>
                                
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="outstanding-loan" class="form-label mb-1">Outstanding Mortgage/Loan (if any)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="outstanding-loan-text">0</span></span>
                                    </div>
                                    <input type="range" id="outstanding-loan" min="0" max="10000000" step="100000" value="0" class="form-range mt-2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="rm-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Estimated Net Proceeds</p>
                            <p id="net-proceeds-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Total Available Loan Amount</p>
                                    <p id="total-loan-amount-result" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Loan Fees & Other Costs</p>
                                    <p id="fees-costs-result" class="h4 fw-semibold text-gray-800">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    
        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Key Factors Influencing Your Reverse Mortgage</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Factor</th>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Impact on Proceeds</th>
                            </tr>
                        </thead>
                        <tbody id="factors-table-body" class="bg-white">
                            <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Home Value</td>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Higher home value generally leads to higher available loan amounts.</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Youngest Borrower's Age</td>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Older borrowers typically qualify for more proceeds.</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Interest Rate</td>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Lower interest rates can result in higher initial loan amounts.</td>
                            </tr>
                             <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Outstanding Mortgage/Loan</td>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Any existing loan must be paid off first, reducing net proceeds.</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Closing Costs & Fees</td>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">These reduce the total amount you receive.</td>
                            </tr>
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
                <?php include '../../views/content/reverse-mortgage-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Reverse Mortgage Calculator
let rmChart; // Variable to hold the Chart.js instance

// Get DOM elements
const homeValueSlider = document.getElementById('home-value');
const homeValueText = document.getElementById('home-value-text');
const ageSlider = document.getElementById('age');
const ageText = document.getElementById('age-text');
const interestRateSlider = document.getElementById('interest-rate');
const interestRateText = document.getElementById('interest-rate-text');
const outstandingLoanSlider = document.getElementById('outstanding-loan');
const outstandingLoanText = document.getElementById('outstanding-loan-text');

const netProceedsResult = document.getElementById('net-proceeds-result');
const totalLoanAmountResult = document.getElementById('total-loan-amount-result');
const feesCostsResult = document.getElementById('fees-costs-result');
const rmChartCanvas = document.getElementById('rm-chart');
const currencySelect = document.getElementById('currency-select'); // Get the currency select element


// Event Listeners for sliders and currency select
homeValueSlider.addEventListener('input', updateCalculator);
ageSlider.addEventListener('input', updateCalculator);
interestRateSlider.addEventListener('input', updateCalculator);
outstandingLoanSlider.addEventListener('input', updateCalculator);
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
 * Updates the displayed values for sliders and triggers calculation.
 */
function updateCalculator() {
    // Update slider text displays
    homeValueText.textContent = new Intl.NumberFormat('en-IN').format(homeValueSlider.value);
    ageText.textContent = ageSlider.value;
    interestRateText.textContent = interestRateSlider.value;
    // Format outstanding loan with the selected currency
    outstandingLoanText.textContent = new Intl.NumberFormat('en-IN').format(outstandingLoanSlider.value);

    calculateReverseMortgage();
}

/**
 * Calculates the estimated reverse mortgage proceeds.
 * This is a simplified calculation for demonstration. Actual calculations are complex.
 */
function calculateReverseMortgage() {
    const homeValue = parseFloat(homeValueSlider.value);
    const age = parseFloat(ageSlider.value);
    const interestRate = parseFloat(interestRateSlider.value) / 100; // as decimal
    const outstandingLoan = parseFloat(outstandingLoanSlider.value);

    // --- Simplified Reverse Mortgage Logic ---
    // Loan-to-Value (LTV) factor heavily depends on age and interest rate.
    // This is a simplified approximation. Actual LTV factors are precise tables.
    let ltvFactor = 0; 
    if (age >= 62 && age < 70) {
        ltvFactor = 0.35 + (age - 62) * 0.01; // Example: 35% at 62, increasing by 1% per year
    } else if (age >= 70 && age < 80) {
        ltvFactor = 0.43 + (age - 70) * 0.008; // Example: 43% at 70, increasing by 0.8% per year
    } else if (age >= 80) {
        ltvFactor = 0.51 + (age - 80) * 0.005; // Example: 51% at 80, increasing by 0.5% per year
    }

    // Adjust LTV based on interest rate (simplified inverse relationship)
    // Lower interest rate, higher LTV factor. Higher interest rate, lower LTV factor.
    const baseRate = 0.06; // Assuming 6% is a neutral rate
    ltvFactor *= (1 + (baseRate - interestRate) * 2); // Factor of 2 to give it some impact

    // Ensure LTV factor is within reasonable bounds (e.g., 20% to 60%)
    ltvFactor = Math.max(0.20, Math.min(0.60, ltvFactor));


    let totalAvailableLoanAmount = homeValue * ltvFactor;

    // Estimate initial MIP (Mortgage Insurance Premium) - typically 2% of home value
    const initialMIP = homeValue * 0.02; 
    // Estimate other closing costs (origination fee, title, appraisal, etc.)
    // Origination fee is capped, but for simplicity, use a percentage of home value (e.g., 2-5%)
    const otherClosingCosts = Math.min(600000, Math.max(2500, homeValue * 0.02)); // Example caps and minimums
    
    const totalFeesAndCosts = initialMIP + otherClosingCosts;

    let netProceeds = totalAvailableLoanAmount - outstandingLoan - totalFeesAndCosts;

    // Ensure net proceeds are not negative
    netProceeds = Math.max(0, netProceeds);

    // Update results in UI
    netProceedsResult.textContent = formatCurrency(netProceeds);
    totalLoanAmountResult.textContent = formatCurrency(totalAvailableLoanAmount);
    feesCostsResult.textContent = formatCurrency(totalFeesAndCosts);

    // Update chart
    updateChart(outstandingLoan, totalFeesAndCosts, netProceeds);
}

/**
 * Updates the Chart.js pie chart with loan distribution data.
 * @param {number} outstandingLoan The amount to pay off existing loan.
 * @param {number} totalFeesAndCosts The total fees and closing costs.
 * @param {number} netProceeds The cash amount borrower receives.
 */
function updateChart(outstandingLoan, totalFeesAndCosts, netProceeds) {
    const ctx = rmChartCanvas.getContext('2d');

    if (rmChart) {
        rmChart.destroy(); // Destroy existing chart before creating a new one
    }

    // Filter out categories that are zero to avoid cluttering the chart legend and slices
    const chartLabels = [];
    const chartData = [];
    const backgroundColors = [];

    if (netProceeds > 0) {
        chartLabels.push('Net Cash to You');
        chartData.push(netProceeds);
        backgroundColors.push('#4F46E5'); // Indigo 600
    }
    if (outstandingLoan > 0) {
        chartLabels.push('Payoff Existing Mortgage');
        chartData.push(outstandingLoan);
        backgroundColors.push('#f59e0b'); // Yellow 500
    }
    if (totalFeesAndCosts > 0) {
        chartLabels.push('Fees & Closing Costs');
        chartData.push(totalFeesAndCosts);
        backgroundColors.push('#EF4444'); // Red 500
    }

    rmChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: chartLabels,
            datasets: [{
                data: chartData,
                backgroundColor: backgroundColors,
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