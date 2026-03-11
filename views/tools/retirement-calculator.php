<?php
// SEO and Page Metadata
$page_title = "$title"; // You may Change the Title here
$page_description = "$desc"; // Put your Description here
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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">Retirement Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Plan for a comfortable retirement. Estimate your required corpus and monthly savings needed.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Your Details</h3>
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
                                        <label for="retirement-age" class="form-label mb-1">Retirement Age</label>
                                        <span class="h5 fw-semibold text-primary"><span id="retirement-age-text">60</span> Years</span>
                                    </div>
                                    <input type="range" id="retirement-age" min="50" max="70" step="1" value="60" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="monthly-expenses" class="form-label mb-1">Current Monthly Expenses</label>
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
                                            <span class="h5 fw-semibold text-primary"><span id="monthly-expenses-text">50,000</span></span>
                                        </div>
                                    </div>
                                    <input type="range" id="monthly-expenses" min="10000" max="200000" step="5000" value="50000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="inflation-rate" class="form-label mb-1">Expected Inflation Rate</label>
                                        <span class="h5 fw-semibold text-primary"><span id="inflation-rate-text">6</span> %</span>
                                    </div>
                                    <input type="range" id="inflation-rate" min="2" max="10" step="0.5" value="6" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="pre-retirement-return" class="form-label mb-1">Pre-Retirement Investment Return</label>
                                        <span class="h5 fw-semibold text-primary"><span id="pre-retirement-return-text">10</span> %</span>
                                    </div>
                                    <input type="range" id="pre-retirement-return" min="5" max="15" step="0.5" value="10" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="post-retirement-return" class="form-label mb-1">Post-Retirement Investment Return</label>
                                        <span class="h5 fw-semibold text-primary"><span id="post-retirement-return-text">7</span> %</span>
                                    </div>
                                    <input type="range" id="post-retirement-return" min="4" max="10" step="0.5" value="7" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="life-expectancy" class="form-label mb-1">Life Expectancy</label>
                                        <span class="h5 fw-semibold text-primary"><span id="life-expectancy-text">85</span> Years</span>
                                    </div>
                                    <input type="range" id="life-expectancy" min="70" max="100" step="1" value="85" class="form-range mt-2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="retirement-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Required Retirement Corpus</p>
                            <p id="corpus-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Monthly Savings Needed</p>
                                    <p id="monthly-savings-result" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Years to Retirement</p>
                                    <p id="years-to-retirement" class="h4 fw-semibold text-gray-800">0 Years</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    
        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Retirement Planning Breakdown</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Description</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Amount</th>
                            </tr>
                        </thead>
                        <tbody id="retirement-breakdown-body" class="bg-white">
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
                <?php include '../../views/content/retirement-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Retirement Calculator
let retirementChart; // Variable to hold the Chart.js instance

// Get DOM elements
const currentAgeSlider = document.getElementById('current-age');
const currentAgeText = document.getElementById('current-age-text');
const retirementAgeSlider = document.getElementById('retirement-age');
const retirementAgeText = document.getElementById('retirement-age-text');
const monthlyExpensesSlider = document.getElementById('monthly-expenses');
const monthlyExpensesText = document.getElementById('monthly-expenses-text');
const inflationRateSlider = document.getElementById('inflation-rate');
const inflationRateText = document.getElementById('inflation-rate-text');
const preRetirementReturnSlider = document.getElementById('pre-retirement-return');
const preRetirementReturnText = document.getElementById('pre-retirement-return-text');
const postRetirementReturnSlider = document.getElementById('post-retirement-return');
const postRetirementReturnText = document.getElementById('post-retirement-return-text');
const lifeExpectancySlider = document.getElementById('life-expectancy');
const lifeExpectancyText = document.getElementById('life-expectancy-text');

const corpusResult = document.getElementById('corpus-result');
const monthlySavingsResult = document.getElementById('monthly-savings-result');
const yearsToRetirement = document.getElementById('years-to-retirement');
const retirementBreakdownBody = document.getElementById('retirement-breakdown-body');
const retirementChartCanvas = document.getElementById('retirement-chart');
const currencySelect = document.getElementById('currency-select'); // Get the currency select element


// Event Listeners for sliders and currency select
currentAgeSlider.addEventListener('input', updateCalculator);
retirementAgeSlider.addEventListener('input', updateCalculator);
monthlyExpensesSlider.addEventListener('input', updateCalculator);
inflationRateSlider.addEventListener('input', updateCalculator);
preRetirementReturnSlider.addEventListener('input', updateCalculator);
postRetirementReturnSlider.addEventListener('input', updateCalculator);
lifeExpectancySlider.addEventListener('input', updateCalculator);
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
 * Updates the displayed values for sliders and triggers retirement calculation.
 */
function updateCalculator() {
    // Update slider text displays
    currentAgeText.textContent = currentAgeSlider.value;
    retirementAgeText.textContent = retirementAgeSlider.value;
    monthlyExpensesText.textContent = new Intl.NumberFormat('en-IN').format(monthlyExpensesSlider.value);
    inflationRateText.textContent = inflationRateSlider.value;
    preRetirementReturnText.textContent = preRetirementReturnSlider.value;
    postRetirementReturnText.textContent = postRetirementReturnSlider.value;
    lifeExpectancyText.textContent = lifeExpectancySlider.value;

    calculateRetirement();
}

/**
 * Calculates the retirement corpus, monthly savings, and updates the UI.
 */
function calculateRetirement() {
    const currentAge = parseInt(currentAgeSlider.value);
    const retirementAge = parseInt(retirementAgeSlider.value);
    const currentMonthlyExpenses = parseFloat(monthlyExpensesSlider.value);
    const annualInflationRate = parseFloat(inflationRateSlider.value) / 100;
    const annualPreRetirementReturn = parseFloat(preRetirementReturnSlider.value) / 100;
    const annualPostRetirementReturn = parseFloat(postRetirementReturnSlider.value) / 100;
    const lifeExpectancy = parseInt(lifeExpectancySlider.value);

    const yearsToRetirementCalc = retirementAge - currentAge;
    const yearsInRetirement = lifeExpectancy - retirementAge;

    if (yearsToRetirementCalc < 0) {
        corpusResult.textContent = formatCurrency(0); // Display 0 in formatted currency
        monthlySavingsResult.textContent = formatCurrency(0); // Display 0 in formatted currency
        yearsToRetirement.textContent = "0 Years";
        updateChart(0, 0); // Clear chart
        retirementBreakdownBody.innerHTML = '';
        return;
    }

    yearsToRetirement.textContent = `${yearsToRetirementCalc} Years`;

    // 1. Calculate future monthly expenses at retirement
    const futureMonthlyExpenses = currentMonthlyExpenses * Math.pow((1 + annualInflationRate), yearsToRetirementCalc);
    const futureAnnualExpenses = futureMonthlyExpenses * 12;

    // 2. Calculate required retirement corpus
    // Using the perpetuity formula for expenses, adjusted for a finite period and growth
    let requiredCorpus = 0;
    if (annualPostRetirementReturn > annualInflationRate) {
        const rateDifference = (annualPostRetirementReturn - annualInflationRate) / (1 + annualInflationRate);
        requiredCorpus = futureAnnualExpenses / rateDifference * (1 - Math.pow((1 + rateDifference), -yearsInRetirement));
    } else if (annualPostRetirementReturn < annualInflationRate) {
         const rateDifference = (annualInflationRate - annualPostRetirementReturn) / (1 + annualPostRetirementReturn);
        requiredCorpus = futureAnnualExpenses / rateDifference * (Math.pow((1 + rateDifference), yearsInRetirement) - 1);
    } else { // If rates are equal
        requiredCorpus = futureAnnualExpenses * yearsInRetirement;
    }
    

    // 3. Calculate monthly savings needed (using Future Value of Annuity formula)
    let monthlySavings = 0;
    if (annualPreRetirementReturn === 0) { // Simple calculation for 0% return
        monthlySavings = requiredCorpus / (yearsToRetirementCalc * 12);
    } else {
        const monthlyPreRetirementReturn = annualPreRetirementReturn / 12;
        const numberOfMonths = yearsToRetirementCalc * 12;
        if (numberOfMonths > 0) {
            monthlySavings = requiredCorpus * (monthlyPreRetirementReturn / (Math.pow(1 + monthlyPreRetirementReturn, numberOfMonths) - 1));
        } else {
            monthlySavings = requiredCorpus; // If already at retirement age, need the full corpus now
        }
    }

    // Update results in UI
    corpusResult.textContent = formatCurrency(requiredCorpus);
    monthlySavingsResult.textContent = formatCurrency(monthlySavings);

    // Generate and display breakdown
    generateRetirementBreakdown(futureMonthlyExpenses, futureAnnualExpenses, requiredCorpus, monthlySavings);
    // Update chart
    updateChart(requiredCorpus, monthlySavings * (yearsToRetirementCalc * 12)); // Approximating total savings contribution
}

/**
 * Generates and displays the retirement planning breakdown.
 * @param {number} futureMonthlyExpenses Future monthly expenses at retirement.
 * @param {number} futureAnnualExpenses Future annual expenses at retirement.
 * @param {number} requiredCorpus The total required retirement corpus.
 * @param {number} monthlySavings The monthly savings needed.
 */
function generateRetirementBreakdown(futureMonthlyExpenses, futureAnnualExpenses, requiredCorpus, monthlySavings) {
    retirementBreakdownBody.innerHTML = ''; // Clear previous breakdown

    const breakdownData = [
        { label: 'Future Monthly Expenses (at Retirement)', value: futureMonthlyExpenses },
        { label: 'Future Annual Expenses (at Retirement)', value: futureAnnualExpenses },
        { label: 'Total Required Retirement Corpus', value: requiredCorpus },
        { label: 'Monthly Savings Required', value: monthlySavings },
    ];

    breakdownData.forEach(item => {
        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${item.label}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(item.value)}</td>
        `;
        retirementBreakdownBody.appendChild(row);
    });
}

/**
 * Updates the Chart.js pie chart with retirement data.
 * @param {number} requiredCorpus The total required retirement corpus.
 * @param {number} totalSavingsContribution The total amount saved by contributions.
 */
function updateChart(requiredCorpus, totalSavingsContribution) {
    const ctx = retirementChartCanvas.getContext('2d');

    if (retirementChart) {
        retirementChart.destroy(); // Destroy existing chart before creating a new one
    }

    const investmentGrowth = requiredCorpus - totalSavingsContribution; // Simplified for chart
    const dataForChart = [Math.max(0, totalSavingsContribution), Math.max(0, investmentGrowth)];
    const labelsForChart = ['Your Savings Contribution', 'Growth from Investments'];

    retirementChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labelsForChart,
            datasets: [{
                data: dataForChart,
                backgroundColor: ['#4F46E5', '#f59e0b'], // Indigo and Orange
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