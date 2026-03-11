<?php
// SEO and Page Metadata
$page_title = "Sukanya Samriddhi Yojana Calculator - SSY Returns Online"; // You may Change the Title here
$page_description = "Free Sukanya Samriddhi Yojana (SSY) calculator. Calculate maturity amount and interest for your daughter's SSY account. Government-backed tax-free savings scheme."; // Put your Description here
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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">Sukanya Samriddhi Yojana (SSY) Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Plan your daughter's future with the SSY calculator. Estimate maturity amount, interest earned, and annual contributions.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Investment Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="annual-investment" class="form-label mb-1">Annual Investment</label>
                                        <div class="d-flex align-items-center">
                                            <select id="currency-select" class="form-select form-select-sm me-2">
                                                <option value="USD">$ (USD)</option>
                                                <option value="EUR">EUR (€)</option>
                                                <option value="INR" selected>INR (₹)</option>
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
                                            <span class="h5 fw-semibold text-primary"><span id="annual-investment-text">1,00,000</span></span>
                                        </div>
                                    </div>
                                    <input type="range" id="annual-investment" min="250" max="150000" step="50" value="100000" class="form-range mt-2">
                                    <small class="form-text text-muted">Min: ₹250, Max: ₹1,50,000 per year</small>
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="current-age-girl" class="form-label mb-1">Girl Child's Current Age</label>
                                        <span class="h5 fw-semibold text-primary"><span id="current-age-girl-text">5</span> Years</span>
                                    </div>
                                    <input type="range" id="current-age-girl" min="0" max="10" step="1" value="5" class="form-range mt-2">
                                    <small class="form-text text-muted">Age at account opening (0-10 years)</small>
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="interest-rate-ssy" class="form-label mb-1">Current Interest Rate (Approx)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="interest-rate-ssy-text">8.2</span> %</span>
                                    </div>
                                    <input type="range" id="interest-rate-ssy" min="7.0" max="9.0" step="0.1" value="8.2" class="form-range mt-2">
                                    <small class="form-text text-muted">Interest rate is subject to change quarterly by government.</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="ssy-chart"></canvas>
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
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Year-wise Growth (Investment & Interest)</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Year</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Age of Girl Child</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Investment Made</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Interest Earned</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Closing Balance</th>
                            </tr>
                        </thead>
                        <tbody id="ssy-amortization-table-body" class="bg-white">
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
                <?php include '../../views/content/sukanya-samriddhi-yojana-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for SSY Calculator
let ssyChart; // Variable to hold the Chart.js instance

// Get DOM elements
const annualInvestmentSlider = document.getElementById('annual-investment');
const annualInvestmentText = document.getElementById('annual-investment-text');
const currentAgeGirlSlider = document.getElementById('current-age-girl');
const currentAgeGirlText = document.getElementById('current-age-girl-text');
const interestRateSsySlider = document.getElementById('interest-rate-ssy');
const interestRateSsyText = document.getElementById('interest-rate-ssy-text');

const maturityAmountResult = document.getElementById('maturity-amount-result');
const totalInvestmentResult = document.getElementById('total-investment-result');
const totalInterestEarnedResult = document.getElementById('total-interest-earned-result');
const ssyAmortizationTableBody = document.getElementById('ssy-amortization-table-body');
const ssyChartCanvas = document.getElementById('ssy-chart');
const currencySelect = document.getElementById('currency-select'); //

// Event Listeners for sliders and currency select
annualInvestmentSlider.addEventListener('input', updateCalculator);
currentAgeGirlSlider.addEventListener('input', updateCalculator);
interestRateSsySlider.addEventListener('input', updateCalculator);
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
        style: 'currency', //
        currency: selectedCurrency, //
        minimumFractionDigits: 0, // No decimal places for whole rupees
        maximumFractionDigits: 0 //
    }).format(amount); //
}

/**
 * Updates the displayed values for sliders and triggers SSY calculation.
 */
function updateCalculator() {
    // Update slider text displays
    annualInvestmentText.textContent = formatCurrency(annualInvestmentSlider.value); //
    interestRateSsyText.textContent = interestRateSsySlider.value;
    currentAgeGirlText.textContent = currentAgeGirlSlider.value; // Changed to correct element

    calculateSSY();
}

/**
 * Calculates the SSY maturity amount, total investment, and total interest earned, then updates the UI.
 */
function calculateSSY() {
    const annualInvestment = parseFloat(annualInvestmentSlider.value);
    const currentAgeGirl = parseInt(currentAgeGirlSlider.value);
    const annualInterestRate = parseFloat(interestRateSsySlider.value);

    const investmentPeriod = 15; // Years for which deposits are made
    const maturityPeriod = 21; // Total years until maturity
    const actualMaturityYears = maturityPeriod - currentAgeGirl; // Age at maturity or 21 years from opening

    let totalInvestment = 0;
    let totalInterestEarned = 0;
    let currentBalance = 0;

    ssyAmortizationTableBody.innerHTML = ''; // Clear previous schedule

    // Data for chart
    let principalContributions = 0;
    let interestAccumulated = 0;

    for (let year = 1; year <= actualMaturityYears; year++) {
        let investmentThisYear = 0;
        if (year <= investmentPeriod) {
            investmentThisYear = annualInvestment;
            totalInvestment += annualInvestment;
            principalContributions += annualInvestment; // For chart
        }

        currentBalance += investmentThisYear;
        const interestForYear = currentBalance * (annualInterestRate / 100);
        currentBalance += interestForYear;
        totalInterestEarned += interestForYear;
        interestAccumulated += interestForYear; // For chart

        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${year}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${currentAgeGirl + year}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(investmentThisYear)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(interestForYear)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(currentBalance)}</td>
        `;
        ssyAmortizationTableBody.appendChild(row);
    }
    
    // Update results in UI
    maturityAmountResult.textContent = formatCurrency(currentBalance);
    totalInvestmentResult.textContent = formatCurrency(totalInvestment);
    totalInterestEarnedResult.textContent = formatCurrency(totalInterestEarned);

    // Update chart
    updateChart(totalInvestment, totalInterestEarned); // Pass calculated values for chart
}

/**
 * Updates the Chart.js pie chart with principal and interest data.
 * @param {number} totalInvestment The total principal invested.
 * @param {number} totalInterest The total interest earned.
 */
function updateChart(totalInvestment, totalInterest) {
    const ctx = ssyChartCanvas.getContext('2d');

    if (ssyChart) {
        ssyChart.destroy(); // Destroy existing chart before creating a new one
    }

    ssyChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Total Investment', 'Total Interest Earned'],
            datasets: [{
                data: [totalInvestment, totalInterest],
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
                            return `${label}: ${formatCurrency(value)}`; //
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