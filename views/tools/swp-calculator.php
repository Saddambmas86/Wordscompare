<?php
// SEO and Page Metadata
$page_title = "SWP Calculator - Systematic Withdrawal Plan Calculator Online"; // You may Change the Title here
$page_description = "Free SWP calculator online. Calculate Systematic Withdrawal Plan returns, monthly withdrawals, and remaining corpus from mutual fund investments. Smart retirement planning."; // Put your Description here
$page_keywords = "swp calculator, calculator, online calculator, free math tools, age calculator, bmi calculator, conversion calculator, wordscompare";

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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">SWP Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Plan your systematic withdrawals. Calculate your monthly payout, corpus value over time, and total withdrawals.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">SWP Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="initial-investment" class="form-label mb-1">Initial Investment</label>
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
                                            <span class="h5 fw-semibold text-primary"><span id="initial-investment-text">10,00,000</span></span>
                                        </div>
                                    </div>
                                    <input type="range" id="initial-investment" min="100000" max="50000000" step="50000" value="1000000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="withdrawal-amount" class="form-label mb-1">Monthly Withdrawal</label>
                                        <span class="h5 fw-semibold text-primary"><span id="withdrawal-amount-text">10,000</span></span>
                                    </div>
                                    <input type="range" id="withdrawal-amount" min="1000" max="100000" step="500" value="10000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="expected-return" class="form-label mb-1">Expected Annual Return</label>
                                        <span class="h5 fw-semibold text-primary"><span id="expected-return-text">8.0</span> %</span>
                                    </div>
                                    <input type="range" id="expected-return" min="1" max="15" step="0.1" value="8.0" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="withdrawal-tenure" class="form-label mb-1">Withdrawal Tenure (Years)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="withdrawal-tenure-text">10</span> Years</span>
                                    </div>
                                    <input type="range" id="withdrawal-tenure" min="1" max="40" step="1" value="10" class="form-range mt-2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="swp-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Total Withdrawal</p>
                            <p id="total-withdrawal-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Corpus Remaining</p>
                                    <p id="corpus-remaining-result" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Wealth Gained/Lost</p>
                                    <p id="wealth-change-result" class="h4 fw-semibold text-gray-800">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    
        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Year-wise SWP Schedule</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Year</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Opening Balance</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Withdrawals (Annual)</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Returns Earned</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Closing Balance</th>
                            </tr>
                        </thead>
                        <tbody id="swp-table-body" class="bg-white">
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
                <?php include '../../views/content/swp-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for SWP Calculator
let swpChart; // Variable to hold the Chart.js instance

// Get DOM elements
const initialInvestmentSlider = document.getElementById('initial-investment');
const initialInvestmentText = document.getElementById('initial-investment-text');
const withdrawalAmountSlider = document.getElementById('withdrawal-amount');
const withdrawalAmountText = document.getElementById('withdrawal-amount-text');
const expectedReturnSlider = document.getElementById('expected-return');
const expectedReturnText = document.getElementById('expected-return-text');
const withdrawalTenureSlider = document.getElementById('withdrawal-tenure');
const withdrawalTenureText = document.getElementById('withdrawal-tenure-text');

const totalWithdrawalResult = document.getElementById('total-withdrawal-result');
const corpusRemainingResult = document.getElementById('corpus-remaining-result');
const wealthChangeResult = document.getElementById('wealth-change-result');
const swpTableBody = document.getElementById('swp-table-body');
const swpChartCanvas = document.getElementById('swp-chart');
const currencySelect = document.getElementById('currency-select'); // Get the currency select element


// Event Listeners for sliders and currency select
initialInvestmentSlider.addEventListener('input', updateCalculator);
withdrawalAmountSlider.addEventListener('input', updateCalculator);
expectedReturnSlider.addEventListener('input', updateCalculator);
withdrawalTenureSlider.addEventListener('input', updateCalculator);
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
    const selectedCurrency = currencySelect.value; // Get selected currency
    return new Intl.NumberFormat('en-IN', { // 'en-IN' locale is good for number formatting, currency symbol changes with 'currency' option
        style: 'currency',
        currency: selectedCurrency, // Use selected currency
        minimumFractionDigits: 0, // No decimal places for whole rupees
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the displayed values for sliders and triggers SWP calculation.
 */
function updateCalculator() {
    // Update slider text displays
    initialInvestmentText.textContent = new Intl.NumberFormat('en-IN').format(initialInvestmentSlider.value);
    withdrawalAmountText.textContent = new Intl.NumberFormat('en-IN').format(withdrawalAmountSlider.value);
    expectedReturnText.textContent = expectedReturnSlider.value;
    withdrawalTenureText.textContent = withdrawalTenureSlider.value;

    calculateSWP();
}

/**
 * Calculates the SWP details and updates the UI.
 */
function calculateSWP() {
    let initialInvestment = parseFloat(initialInvestmentSlider.value);
    const monthlyWithdrawal = parseFloat(withdrawalAmountSlider.value);
    const annualReturnRate = parseFloat(expectedReturnSlider.value);
    const withdrawalTenureYears = parseFloat(withdrawalTenureSlider.value);

    const monthlyReturnRate = annualReturnRate / (12 * 100);
    const totalMonths = withdrawalTenureYears * 12;

    let currentCorpus = initialInvestment;
    let totalWithdrawals = 0;

    // Data for chart
    let principalWithdrawn = 0;
    let returnsConsumed = 0;

    const annualData = [];

    for (let year = 1; year <= withdrawalTenureYears; year++) {
        let openingBalanceThisYear = currentCorpus;
        let annualWithdrawalThisYear = 0;
        let annualReturnsEarned = 0;

        for (let month = 1; month <= 12; month++) {
            if (currentCorpus <= 0) break; // Stop if corpus is depleted

            const returnsForMonth = currentCorpus * monthlyReturnRate;
            currentCorpus += returnsForMonth;
            annualReturnsEarned += returnsForMonth;

            // Ensure withdrawal does not exceed current corpus
            let actualWithdrawal = Math.min(monthlyWithdrawal, currentCorpus);
            currentCorpus -= actualWithdrawal;
            annualWithdrawalThisYear += actualWithdrawal;
            totalWithdrawals += actualWithdrawal;

            if (actualWithdrawal > returnsForMonth) {
                principalWithdrawn += (actualWithdrawal - returnsForMonth);
            } else {
                returnsConsumed += actualWithdrawal;
            }
        }
        annualData.push({
            year: year,
            openingBalance: openingBalanceThisYear,
            annualWithdrawal: annualWithdrawalThisYear,
            annualReturnsEarned: annualReturnsEarned,
            closingBalance: currentCorpus
        });

        if (currentCorpus <= 0) break; // Break year loop if corpus depleted mid-year
    }

    const corpusRemaining = Math.max(0, currentCorpus);
    const wealthChange = corpusRemaining + totalWithdrawals - initialInvestment;

    // Update results in UI
    totalWithdrawalResult.textContent = formatCurrency(totalWithdrawals);
    corpusRemainingResult.textContent = formatCurrency(corpusRemaining);
    wealthChangeResult.textContent = formatCurrency(wealthChange);

    // Generate and display SWP schedule
    generateSWPSchedule(annualData);
    // Update chart
    updateChart(initialInvestment, totalWithdrawals, corpusRemaining);
}

/**
 * Generates and displays the year-wise SWP schedule.
 * @param {Array} annualData Array of objects containing annual SWP data.
 */
function generateSWPSchedule(annualData) {
    swpTableBody.innerHTML = ''; // Clear previous schedule

    annualData.forEach(data => {
        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${data.year}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(data.openingBalance)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(data.annualWithdrawal)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(data.annualReturnsEarned)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(Math.max(0, data.closingBalance))}</td>
        `;
        swpTableBody.appendChild(row);
    });
}

/**
 * Updates the Chart.js pie chart with SWP data.
 * @param {number} initialInvestment The initial investment amount.
 * @param {number} totalWithdrawals The total amount withdrawn.
 * @param {number} corpusRemaining The remaining corpus.
 */
function updateChart(initialInvestment, totalWithdrawals, corpusRemaining) {
    const ctx = swpChartCanvas.getContext('2d');

    if (swpChart) {
        swpChart.destroy(); // Destroy existing chart before creating a new one
    }

    const returnsGained = (corpusRemaining + totalWithdrawals) - initialInvestment;

    swpChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Initial Investment', 'Total Returns', 'Corpus Remaining'],
            datasets: [{
                data: [initialInvestment, returnsGained, corpusRemaining],
                backgroundColor: ['#4F46E5', '#f59e0b', '#10B981'], // Indigo 600, Amber 500, Green 500
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