<?php
// SEO and Page Metadata
$page_title = "CAGR Calculator - Compound Annual Growth Rate Calculator"; // You may Change the Title here
$page_description = "Free CAGR calculator online. Calculate Compound Annual Growth Rate for investments, revenue, and portfolios. Understand your true investment growth rate."; // Put your Description here
$page_keywords = "cagr calculator, calculator, online calculator, free math tools, age calculator, bmi calculator, conversion calculator, wordscompare";

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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">CAGR Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Calculate the Compound Annual Growth Rate (CAGR) to understand the average annual growth of your investment.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Investment Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="starting-value" class="form-label mb-1">Starting Investment Value</label>
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
                                            <span class="h5 fw-semibold text-primary"><span id="starting-value-text">1,00,000</span></span>
                                        </div>
                                    </div>
                                    <input type="range" id="starting-value" min="1000" max="10000000" step="1000" value="100000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="ending-value" class="form-label mb-1">Ending Investment Value</label>
                                        <span class="h5 fw-semibold text-primary"><span id="ending-value-text">2,00,000</span></span>
                                    </div>
                                    <input type="range" id="ending-value" min="1000" max="20000000" step="1000" value="200000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="number-of-years" class="form-label mb-1">Number of Years</label>
                                        <span class="h5 fw-semibold text-primary"><span id="number-of-years-text">5</span> Years</span>
                                    </div>
                                    <input type="range" id="number-of-years" min="1" max="50" step="1" value="5" class="form-range mt-2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="cagr-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Calculated CAGR</p>
                            <p id="cagr-result" class="display-6 fw-bold text-gray-800 mb-3">0.00 %</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Total Growth</p>
                                    <p id="total-growth-result" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Total Growth (%)</p>
                                    <p id="total-growth-percent" class="h4 fw-semibold text-gray-800">0.00 %</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    
        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Year-wise Growth Breakdown</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Year</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Starting Value</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Growth This Year</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Ending Value</th>
                            </tr>
                        </thead>
                        <tbody id="growth-table-body" class="bg-white">
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
                <?php include '../../views/content/cagr-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for CAGR Calculator
let cagrChart; // Variable to hold the Chart.js instance

// Get DOM elements
const startingValueSlider = document.getElementById('starting-value');
const startingValueText = document.getElementById('starting-value-text');
const endingValueSlider = document.getElementById('ending-value');
const endingValueText = document.getElementById('ending-value-text');
const numberOfYearsSlider = document.getElementById('number-of-years');
const numberOfYearsText = document.getElementById('number-of-years-text');

const cagrResult = document.getElementById('cagr-result');
const totalGrowthResult = document.getElementById('total-growth-result');
const totalGrowthPercent = document.getElementById('total-growth-percent');
const growthTableBody = document.getElementById('growth-table-body');
const cagrChartCanvas = document.getElementById('cagr-chart');
const currencySelect = document.getElementById('currency-select'); // Get the currency select element


// Event Listeners for inputs
startingValueSlider.addEventListener('input', updateCalculator);
endingValueSlider.addEventListener('input', updateCalculator);
numberOfYearsSlider.addEventListener('input', updateCalculator);
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
        minimumFractionDigits: 0, 
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the displayed values for sliders and triggers CAGR calculation.
 */
function updateCalculator() {
    // Update slider text displays
    startingValueText.textContent = formatCurrency(startingValueSlider.value).replace(currencySelect.value, '').trim(); // Format and remove currency code for display next to dropdown
    endingValueText.textContent = formatCurrency(endingValueSlider.value).replace(currencySelect.value, '').trim(); // Format and remove currency code for display next to dropdown
    numberOfYearsText.textContent = numberOfYearsSlider.value;

    calculateCAGR();
}

/**
 * Calculates the CAGR, total growth, and total growth percentage, then updates the UI.
 */
function calculateCAGR() {
    const beginningValue = parseFloat(startingValueSlider.value);
    const endingValue = parseFloat(endingValueSlider.value);
    const numYears = parseFloat(numberOfYearsSlider.value);

    let cagr = 0;
    let totalGrowth = 0;
    let totalGrowthPct = 0;

    if (beginningValue > 0 && numYears > 0) {
        cagr = (Math.pow((endingValue / beginningValue), (1 / numYears)) - 1) * 100;
        totalGrowth = endingValue - beginningValue;
        totalGrowthPct = (totalGrowth / beginningValue) * 100;
    } else if (beginningValue === 0 && endingValue > 0) {
        // Handle case where starting value is 0 and ending value is positive (infinite growth)
        cagr = Infinity; 
        totalGrowth = endingValue;
        totalGrowthPct = Infinity;
    } else {
        // All other edge cases (e.g., 0/0, negative values not meaningful for CAGR here)
        cagr = 0;
        totalGrowth = 0;
        totalGrowthPct = 0;
    }

    // Update results in UI
    cagrResult.textContent = `${cagr.toFixed(2)} %`;
    totalGrowthResult.textContent = formatCurrency(totalGrowth);
    totalGrowthPercent.textContent = `${totalGrowthPct.toFixed(2)} %`;

    // Generate and display growth schedule
    generateGrowthSchedule(beginningValue, cagr, numYears);
    // Update chart
    updateChart(beginningValue, totalGrowth);
}

/**
 * Generates and displays the year-wise growth schedule based on CAGR.
 * @param {number} beginningValue The initial investment value.
 * @param {number} cagr The calculated CAGR (as a percentage, e.g., 7.5 for 7.5%).
 * @param {number} numYears The total number of years.
 */
function generateGrowthSchedule(beginningValue, cagr, numYears) {
    growthTableBody.innerHTML = ''; // Clear previous schedule

    let currentYearValue = beginningValue;
    const annualGrowthFactor = 1 + (cagr / 100);

    for (let year = 1; year <= numYears; year++) {
        const startingBalanceThisYear = currentYearValue;
        
        // Calculate ending value for this year using the CAGR
        // If CAGR is infinite (beginningValue was 0), handle it to avoid NaN/Infinity issues in table
        let endingBalanceThisYear;
        let growthThisYear;

        if (cagr === Infinity) {
            // For infinite growth, distribute total growth evenly or show it all at the end
            // For simplicity here, we can set future values to ending value directly if the intent is to show path to that value
            // Or calculate growth relative to the previous year if possible.
            // A more robust solution might involve adjusting how infinite CAGR is displayed.
            // For this table, let's assume if CAGR is infinite, it implies reaching endingValue quickly or in one jump
            // which might not be realistic for year-by-year breakdown.
            // Let's make it consistent with the overall ending value for the last year.
            if (year === numYears) {
                endingBalanceThisYear = parseFloat(endingValueSlider.value);
            } else {
                endingBalanceThisYear = beginningValue; // Or some other representation for intermediate years
            }
            growthThisYear = endingBalanceThisYear - startingBalanceThisYear;

        } else {
            endingBalanceThisYear = startingBalanceThisYear * annualGrowthFactor;
            growthThisYear = endingBalanceThisYear - startingBalanceThisYear;
        }

        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${year}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(startingBalanceThisYear)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(growthThisYear)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(endingBalanceThisYear)}</td>
        `;
        growthTableBody.appendChild(row);

        currentYearValue = endingBalanceThisYear;
    }
}

/**
 * Updates the Chart.js pie chart with principal and total growth data.
 * @param {number} beginningValue The initial investment value.
 * @param {number} totalGrowth The total growth amount.
 */
function updateChart(beginningValue, totalGrowth) {
    const ctx = cagrChartCanvas.getContext('2d');

    if (cagrChart) {
        cagrChart.destroy(); // Destroy existing chart before creating a new one
    }

    cagrChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Starting Value', 'Total Growth'],
            datasets: [{
                data: [beginningValue, totalGrowth],
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