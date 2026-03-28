<?php
// SEO and Page Metadata
$page_title = "Inflation Calculator - Calculate Purchasing Power Online"; // You may Change the Title here
$page_description = "Free inflation calculator online. Calculate the real value of money over time, purchasing power loss, and future price using historical inflation rates."; // Put your Description here
$page_keywords = "inflation calculator, calculator, online calculator, free math tools, age calculator, bmi calculator, conversion calculator, wordscompare";

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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">Inflation Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Estimate the future cost of goods and understand the eroding power of inflation on your money.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Inflation Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="initial-amount" class="form-label mb-1">Current Amount</label>
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
                                            <span class="h5 fw-semibold text-primary"><span id="initial-amount-text">10,000</span></span>
                                        </div>
                                    </div>
                                    <input type="range" id="initial-amount" min="1000" max="1000000" step="1000" value="10000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="inflation-rate" class="form-label mb-1">Annual Inflation Rate</label>
                                        <span class="h5 fw-semibold text-primary"><span id="inflation-rate-text">5.0</span> %</span>
                                    </div>
                                    <input type="range" id="inflation-rate" min="0.1" max="15.0" step="0.1" value="5.0" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="years" class="form-label mb-1">Number of Years</label>
                                        <span class="h5 fw-semibold text-primary"><span id="years-text">10</span> Years</span>
                                    </div>
                                    <input type="range" id="years" min="1" max="50" step="1" value="10" class="form-range mt-2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="inflation-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Future Cost (After Inflation)</p>
                            <p id="future-cost-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Purchasing Power Loss</p>
                                    <p id="power-loss-result" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Current Value</p>
                                    <p id="current-value-display" class="h4 fw-semibold text-gray-800">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    
        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Year-wise Inflation Impact</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Year</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Start of Year Value</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Inflation for Year</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">End of Year Value</th>
                            </tr>
                        </thead>
                        <tbody id="inflation-table-body" class="bg-white">
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
                <?php include '../../views/content/inflation-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Inflation Calculator
let inflationChart; // Variable to hold the Chart.js instance

// Get DOM elements
const initialAmountSlider = document.getElementById('initial-amount');
const initialAmountText = document.getElementById('initial-amount-text');
const inflationRateSlider = document.getElementById('inflation-rate');
const inflationRateText = document.getElementById('inflation-rate-text');
const yearsSlider = document.getElementById('years');
const yearsText = document.getElementById('years-text');

const futureCostResult = document.getElementById('future-cost-result');
const powerLossResult = document.getElementById('power-loss-result');
const currentValueDisplay = document.getElementById('current-value-display');
const inflationTableBody = document.getElementById('inflation-table-body');
const inflationChartCanvas = document.getElementById('inflation-chart');
const currencySelect = document.getElementById('currency-select'); // Get the currency select element


// Event Listeners for inputs
initialAmountSlider.addEventListener('input', updateCalculator);
inflationRateSlider.addEventListener('input', updateCalculator);
yearsSlider.addEventListener('input', updateCalculator);
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
        style: 'currency',
        currency: selectedCurrency, //
        minimumFractionDigits: 0, // No decimal places for whole rupees
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the displayed values for sliders and triggers inflation calculation.
 */
function updateCalculator() {
    // Update slider text displays
    initialAmountText.textContent = new Intl.NumberFormat('en-IN').format(initialAmountSlider.value);
    inflationRateText.textContent = inflationRateSlider.value;
    yearsText.textContent = yearsSlider.value;

    calculateInflation();
}

/**
 * Calculates the future cost, purchasing power loss, and updates the UI.
 */
function calculateInflation() {
    const initialAmount = parseFloat(initialAmountSlider.value);
    const inflationRate = parseFloat(inflationRateSlider.value) / 100; // Convert to decimal
    const years = parseFloat(yearsSlider.value);

    // Future Value Formula for Inflation: FV = PV * (1 + IR)^N
    const futureCost = initialAmount * Math.pow((1 + inflationRate), years);
    const purchasingPowerLoss = futureCost - initialAmount;

    // Update results in UI
    futureCostResult.textContent = formatCurrency(futureCost);
    powerLossResult.textContent = formatCurrency(purchasingPowerLoss);
    currentValueDisplay.textContent = formatCurrency(initialAmount);

    // Generate and display inflation impact schedule
    generateInflationTable(initialAmount, inflationRate, years);
    // Update chart
    updateChart(initialAmount, purchasingPowerLoss);
}

/**
 * Generates and displays the year-wise inflation impact schedule.
 * @param {number} initialAmount The initial amount/cost.
 * @param {number} inflationRate The annual inflation rate (as decimal).
 * @param {number} years The total number of years.
 */
function generateInflationTable(initialAmount, inflationRate, years) {
    inflationTableBody.innerHTML = ''; // Clear previous schedule

    let currentCost = initialAmount;

    for (let year = 1; year <= years; year++) {
        const startOfYearValue = currentCost;
        const inflationForYear = currentCost * inflationRate;
        currentCost = currentCost * (1 + inflationRate);
        const endOfYearValue = currentCost;

        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${year}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(startOfYearValue)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(inflationForYear)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(endOfYearValue)}</td>
        `;
        inflationTableBody.appendChild(row);
    }
}

/**
 * Updates the Chart.js pie chart with current value and purchasing power loss.
 * @param {number} initialAmount The current value.
 * @param {number} purchasingPowerLoss The total loss due to inflation.
 */
function updateChart(initialAmount, purchasingPowerLoss) {
    const ctx = inflationChartCanvas.getContext('2d');

    if (inflationChart) {
        inflationChart.destroy(); // Destroy existing chart before creating a new one
    }

    inflationChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Current Value', 'Purchasing Power Loss'],
            datasets: [{
                data: [initialAmount, purchasingPowerLoss],
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