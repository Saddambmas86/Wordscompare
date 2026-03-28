<?php
// SEO and Page Metadata
$page_title = "Step-Up SIP Calculator - Calculate Increasing SIP Returns"; // You may Change the Title here
$page_description = "Free Step-Up SIP calculator. Calculate returns with annually increasing SIP contributions. See how top-up SIP accelerates your wealth creation over time."; // Put your Description here
$page_keywords = "step up sip calculator, calculator, online calculator, free math tools, age calculator, bmi calculator, conversion calculator, wordscompare";

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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">Step-up SIP Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Estimate the future value of your Step-up SIP investments and unlock the power of increasing contributions.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">SIP Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="monthly-sip" class="form-label mb-1">Monthly SIP Amount</label>
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
                                            <span class="h5 fw-semibold text-primary"><span id="monthly-sip-text">5,000</span></span>
                                        </div>
                                    </div>
                                    <input type="range" id="monthly-sip" min="500" max="100000" step="500" value="5000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="annual-step-up" class="form-label mb-1">Annual Step-up %</label>
                                        <span class="h5 fw-semibold text-primary"><span id="annual-step-up-text">10</span> %</span>
                                    </div>
                                    <input type="range" id="annual-step-up" min="0" max="20" step="1" value="10" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="expected-return" class="form-label mb-1">Expected Annual Return</label>
                                        <span class="h5 fw-semibold text-primary"><span id="expected-return-text">12.0</span> %</span>
                                    </div>
                                    <input type="range" id="expected-return" min="1" max="20" step="0.1" value="12.0" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="investment-period" class="form-label mb-1">Investment Period (Years)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="investment-period-text">15</span> Years</span>
                                    </div>
                                    <input type="range" id="investment-period" min="1" max="40" step="1" value="15" class="form-range mt-2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="sip-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Maturity Value</p>
                            <p id="maturity-value-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Total Investment</p>
                                    <p id="total-investment-result" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Wealth Gained</p>
                                    <p id="wealth-gained-result" class="h4 fw-semibold text-gray-800">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    
        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Year-wise Investment Breakdown</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Year</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Annual Investment</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Invested Amount</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Estimated Value</th>
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
                <?php include '../../views/content/step-up-sip-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Step-up SIP Calculator
let sipChart; // Variable to hold the Chart.js instance

// Get DOM elements
const monthlySipSlider = document.getElementById('monthly-sip');
const monthlySipText = document.getElementById('monthly-sip-text');
const annualStepUpSlider = document.getElementById('annual-step-up');
const annualStepUpText = document.getElementById('annual-step-up-text');
const expectedReturnSlider = document.getElementById('expected-return');
const expectedReturnText = document.getElementById('expected-return-text');
const investmentPeriodSlider = document.getElementById('investment-period');
const investmentPeriodText = document.getElementById('investment-period-text');

const maturityValueResult = document.getElementById('maturity-value-result');
const totalInvestmentResult = document.getElementById('total-investment-result');
const wealthGainedResult = document.getElementById('wealth-gained-result');
const investmentTableBody = document.getElementById('investment-table-body');
const sipChartCanvas = document.getElementById('sip-chart');
const currencySelect = document.getElementById('currency-select'); // Get the currency select element


// Event Listeners for inputs
monthlySipSlider.addEventListener('input', updateCalculator);
annualStepUpSlider.addEventListener('input', updateCalculator);
expectedReturnSlider.addEventListener('input', updateCalculator);
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
    const selectedCurrency = currencySelect.value; //
    return new Intl.NumberFormat('en-IN', { // 'en-IN' locale is good for number formatting, currency symbol changes with 'currency' option
        style: 'currency', //
        currency: selectedCurrency, //
        minimumFractionDigits: 0, 
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the displayed values for sliders and triggers SIP calculation.
 */
function updateCalculator() {
    // Update slider text displays
    // Updated this line to format using the selected currency
    monthlySipText.textContent = new Intl.NumberFormat('en-IN').format(monthlySipSlider.value); 
    interestRateText.textContent = interestRateSlider.value; // This line seems to be a remnant from EMI calculator, it will cause an error if not removed or adjusted
    annualStepUpText.textContent = annualStepUpSlider.value;
    expectedReturnText.textContent = expectedReturnSlider.value;
    investmentPeriodText.textContent = investmentPeriodSlider.value;

    calculateStepUpSIP();
}

/**
 * Calculates the Step-up SIP maturity value, total investment, and wealth gained, then updates the UI.
 */
function calculateStepUpSIP() {
    let monthlySIP = parseFloat(monthlySipSlider.value);
    const annualStepUpRate = parseFloat(annualStepUpSlider.value) / 100; // as decimal
    const annualReturnRate = parseFloat(expectedReturnSlider.value) / 100; // as decimal
    const investmentYears = parseInt(investmentPeriodSlider.value);

    let totalInvestedAmount = 0;
    let maturityValue = 0;

    // Monthly return rate
    const monthlyReturnRate = annualReturnRate / 12;

    // Iterate through each year
    for (let year = 1; year <= investmentYears; year++) {
        // Calculate future value of current year's SIPs
        for (let month = 1; month <= 12; month++) {
            totalInvestedAmount += monthlySIP;
            // Future value of each monthly contribution
            // FV = P * (1 + r)^n where n is remaining months
            maturityValue += monthlySIP * Math.pow((1 + monthlyReturnRate), ((investmentYears - year) * 12 + (12 - month + 1)));
        }
        // Step up SIP for the next year
        if (year < investmentYears) {
            monthlySIP *= (1 + annualStepUpRate);
        }
    }
    
    const wealthGained = maturityValue - totalInvestedAmount;

    // Update results in UI
    maturityValueResult.textContent = formatCurrency(maturityValue); //
    totalInvestmentResult.textContent = formatCurrency(totalInvestedAmount); //
    wealthGainedResult.textContent = formatCurrency(wealthGained); //

    // Generate and display investment breakdown
    generateInvestmentBreakdown(
        parseFloat(monthlySipSlider.value), // Initial monthly SIP
        annualStepUpRate,
        annualReturnRate,
        investmentYears
    );
    // Update chart
    updateChart(totalInvestedAmount, wealthGained);
}

/**
 * Generates and displays the year-wise investment breakdown for Step-up SIP.
 * @param {number} initialMonthlySIP The initial monthly SIP amount.
 * @param {number} annualStepUpRate The annual step-up rate (as decimal).
 * @param {number} annualReturnRate The expected annual return rate (as decimal).
 * @param {number} investmentYears The total investment period in years.
 */
function generateInvestmentBreakdown(initialMonthlySIP, annualStepUpRate, annualReturnRate, investmentYears) {
    investmentTableBody.innerHTML = ''; // Clear previous schedule

    let currentMonthlySIP = initialMonthlySIP;
    let cumulativeInvested = 0;
    let cumulativeMaturityValue = 0;

    // Monthly return rate
    const monthlyReturnRate = annualReturnRate / 12;

    for (let year = 1; year <= investmentYears; year++) {
        const annualInvestmentThisYear = currentMonthlySIP * 12;
        cumulativeInvested += annualInvestmentThisYear;

        // Calculate future value for this year's contributions
        let fvOfThisYearSips = 0;
        for (let month = 1; month <= 12; month++) {
            fvOfThisYearSips += currentMonthlySIP * Math.pow((1 + monthlyReturnRate), ((investmentYears - year) * 12 + (12 - month + 1)));
        }
        cumulativeMaturityValue += fvOfThisYearSips;


        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${year}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(annualInvestmentThisYear)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(cumulativeInvested)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(cumulativeMaturityValue)}</td>
        `;
        investmentTableBody.appendChild(row);

        // Increase monthly SIP for the next year
        if (year < investmentYears) {
            currentMonthlySIP *= (1 + annualStepUpRate);
        }
    }
}

/**
 * Updates the Chart.js pie chart with total investment and wealth gained data.
 * @param {number} totalInvestment The total amount invested.
 * @param {number} wealthGained The total wealth gained (interest/returns).
 */
function updateChart(totalInvestment, wealthGained) {
    const ctx = sipChartCanvas.getContext('2d');

    if (sipChart) {
        sipChart.destroy(); // Destroy existing chart before creating a new one
    }

    sipChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Total Investment', 'Wealth Gained'],
            datasets: [{
                data: [totalInvestment, wealthGained],
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