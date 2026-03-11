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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">Margin Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Calculate sales margin, cost, or selling price. Optimize your pricing strategy for maximum profitability.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Input Any Two Fields</h3>
                            <div class="space-y-4">
                                <div class="mb-3">
                                    <label for="currency-select" class="form-label mb-1">Currency</label>
                                    <select id="currency-select" class="form-select">
                                        <option value="USD" selected>$ (USD)</option>
                                        <option value="EUR">€ (EUR)</option>
                                        <option value="INR">₹ (INR)</option>
                                        <option value="GBP">£ (GBP)</option>
                                        <option value="JPY">¥ (JPY)</option>
                                        <option value="AUD">$ (AUD)</option>
                                        <option value="CAD">$ (CAD)</option>
                                        <option value="CHF">Fr. (CHF)</option>
                                        <option value="CNY">¥ (CNY)</option>
                                        <option value="SEK">kr (SEK)</option>
                                        <option value="NZD">$ (NZD)</option>
                                        <option value="MXN">$ (MXN)</option>
                                        <option value="SGD">$ (SGD)</option>
                                        <option value="HKD">$ (HKD)</option>
                                        <option value="NOK">kr (NOK)</option>
                                        <option value="KRW">₩ (KRW)</option>
                                        <option value="TRY">₺ (TRY)</option>
                                        <option value="RUB">₽ (RUB)</option>
                                        <option value="BRL">R$ (BRL)</option>
                                        <option value="ZAR">R (ZAR)</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="cost-price" class="form-label mb-1">Cost Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text currency-symbol">₹</span>
                                        <input type="number" id="cost-price" class="form-control" placeholder="e.g., 100" min="0">
                                    </div>
                                </div>

                                <div>
                                    <label for="selling-price" class="form-label mb-1">Selling Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text currency-symbol">₹</span>
                                        <input type="number" id="selling-price" class="form-control" placeholder="e.g., 150" min="0">
                                    </div>
                                </div>

                                <div>
                                    <label for="margin-percentage" class="form-label mb-1">Margin (%)</label>
                                    <div class="input-group">
                                        <input type="number" id="margin-percentage" class="form-control" placeholder="e.g., 33.33" min="0" max="100">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <div class="alert alert-info mt-3" role="alert">
                                    Fill in any two fields to calculate the third.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="margin-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Calculated Values</p>
                            <p id="result-text" class="display-6 fw-bold text-gray-800 mb-3">--</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Gross Profit</p>
                                    <p id="gross-profit-result" class="h4 fw-semibold text-primary">₹ 0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Margin (%)</p>
                                    <p id="margin-percent-result" class="h4 fw-semibold text-gray-800">0 %</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    
        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Margin Calculation Breakdown</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Metric</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Value</th>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Formula</th>
                            </tr>
                        </thead>
                        <tbody id="breakdown-table-body" class="bg-white">
                            <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Cost Price</td>
                                <td id="breakdown-cost-price" class="py-2 px-4 border-b text-right text-sm text-gray-800">₹ 0</td>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Given / Selling Price × (1 - Margin)</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Selling Price</td>
                                <td id="breakdown-selling-price" class="py-2 px-4 border-b text-right text-sm text-gray-800">₹ 0</td>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Given / Cost Price / (1 - Margin)</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Gross Profit</td>
                                <td id="breakdown-gross-profit" class="py-2 px-4 border-b text-right text-sm text-gray-800">₹ 0</td>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Selling Price - Cost Price</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Margin Percentage</td>
                                <td id="breakdown-margin-percentage" class="py-2 px-4 border-b text-right text-sm text-gray-800">0 %</td>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">(Gross Profit / Selling Price) × 100</td>
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
                <?php include '../../views/content/margin-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Margin Calculator
let marginChart; // Variable to hold the Chart.js instance

// Get DOM elements
const costPriceInput = document.getElementById('cost-price');
const sellingPriceInput = document.getElementById('selling-price');
const marginPercentageInput = document.getElementById('margin-percentage');
const currencySelect = document.getElementById('currency-select'); //
const currencySymbols = document.querySelectorAll('.currency-symbol'); //

const resultText = document.getElementById('result-text');
const grossProfitResult = document.getElementById('gross-profit-result');
const marginPercentResult = document.getElementById('margin-percent-result');

const breakdownCostPrice = document.getElementById('breakdown-cost-price');
const breakdownSellingPrice = document.getElementById('breakdown-selling-price');
const breakdownGrossProfit = document.getElementById('breakdown-gross-profit');
const breakdownMarginPercentage = document.getElementById('breakdown-margin-percentage');

const marginChartCanvas = document.getElementById('margin-chart');

// Event Listeners for inputs
costPriceInput.addEventListener('input', calculateMargin);
sellingPriceInput.addEventListener('input', calculateMargin);
marginPercentageInput.addEventListener('input', calculateMargin);
currencySelect.addEventListener('change', updateCurrencySymbol); //
currencySelect.addEventListener('change', calculateMargin); //


// Initial calculation on page load
window.onload = function() {
    // Set initial values for demonstration
    costPriceInput.value = 100; //
    sellingPriceInput.value = 150; //
    updateCurrencySymbol(); //
    calculateMargin(); //
};

/**
 * Updates the currency symbol displayed next to the input fields.
 */
function updateCurrencySymbol() { //
    const selectedCurrency = currencySelect.value; //
    let symbol = ''; //

    switch (selectedCurrency) { //
        case 'USD': symbol = '$'; break; //
        case 'EUR': symbol = '€'; break; //
        case 'INR': symbol = '₹'; break; //
        case 'GBP': symbol = '£'; break; //
        case 'JPY': symbol = '¥'; break; //
        case 'AUD': symbol = '$'; break; //
        case 'CAD': symbol = '$'; break; //
        case 'CHF': symbol = 'Fr.'; break; //
        case 'CNY': symbol = '¥'; break; //
        case 'SEK': symbol = 'kr'; break; //
        case 'NZD': symbol = '$'; break; //
        case 'MXN': symbol = '$'; break; //
        case 'SGD': symbol = '$'; break; //
        case 'HKD': symbol = '$'; break; //
        case 'NOK': symbol = 'kr'; break; //
        case 'KRW': symbol = '₩'; break; //
        case 'TRY': symbol = '₺'; break; //
        case 'RUB': symbol = '₽'; break; //
        case 'BRL': symbol = 'R$'; break; //
        case 'ZAR': symbol = 'R'; break; //
        default: symbol = ''; break; //
    }

    currencySymbols.forEach(span => { //
        span.textContent = symbol; //
    }); //
} //

/**
 * Formats a number as currency based on the selected currency.
 * @param {number} amount The number to format.
 * @returns {string} The formatted currency string.
 */
function formatCurrency(amount) { //
    if (isNaN(amount) || amount === null) return currencySymbols[0] ? currencySymbols[0].textContent + ' 0' : '0'; //
    const selectedCurrency = currencySelect.value; //
    return new Intl.NumberFormat('en-IN', { //
        style: 'currency', //
        currency: selectedCurrency, //
        minimumFractionDigits: 0, //
        maximumFractionDigits: 2 //
    }).format(amount); //
} //

/**
 * Calculates the margin, cost price, or selling price based on user input.
 */
function calculateMargin() {
    let costPrice = parseFloat(costPriceInput.value); //
    let sellingPrice = parseFloat(sellingPriceInput.value); //
    let marginPercentage = parseFloat(marginPercentageInput.value); //

    let calculatedValue = NaN; //
    let grossProfit = 0; //
    let actualMarginPercent = 0; //

    // Determine which two fields are filled and calculate the third
    if (!isNaN(costPrice) && !isNaN(sellingPrice)) { //
        // Calculate Margin Percentage and Gross Profit
        grossProfit = sellingPrice - costPrice; //
        if (sellingPrice !== 0) { //
            actualMarginPercent = (grossProfit / sellingPrice) * 100; //
        } else {
            actualMarginPercent = 0; // Avoid division by zero
        }
        calculatedValue = actualMarginPercent; //
        resultText.textContent = `${actualMarginPercent.toFixed(2)} % Margin`; //
        marginPercentageInput.value = actualMarginPercent.toFixed(2); //
    } else if (!isNaN(costPrice) && !isNaN(marginPercentage)) { //
        // Calculate Selling Price and Gross Profit
        if (marginPercentage >= 100) { // Margin cannot be 100% or more as it implies profit >= selling price
            alert("Margin percentage cannot be 100% or higher. Please enter a value less than 100."); //
            sellingPriceInput.value = ''; //
            grossProfitResult.textContent = formatCurrency(0); //
            marginPercentResult.textContent = '0 %'; //
            updateChart(0, 0); // Reset chart
            updateBreakdown(0, 0, 0, 0); // Reset breakdown
            resultText.textContent = "--"; //
            return; //
        }
        
        sellingPrice = costPrice / (1 - (marginPercentage / 100)); //
        grossProfit = sellingPrice - costPrice; //
        actualMarginPercent = marginPercentage; //
        calculatedValue = sellingPrice; //
        sellingPriceInput.value = sellingPrice.toFixed(2); //
        resultText.textContent = `${formatCurrency(sellingPrice)} Selling Price`; //
    } else if (!isNaN(sellingPrice) && !isNaN(marginPercentage)) { //
        // Calculate Cost Price and Gross Profit
        if (marginPercentage >= 100) { // Margin cannot be 100% or more
            alert("Margin percentage cannot be 100% or higher. Please enter a value less than 100."); //
            costPriceInput.value = ''; //
            grossProfitResult.textContent = formatCurrency(0); //
            marginPercentResult.textContent = '0 %'; //
            updateChart(0, 0); // Reset chart
            updateBreakdown(0, 0, 0, 0); // Reset breakdown
            resultText.textContent = "--"; //
            return; //
        }

        costPrice = sellingPrice * (1 - (marginPercentage / 100)); //
        grossProfit = sellingPrice - costPrice; //
        actualMarginPercent = marginPercentage; //
        calculatedValue = costPrice; //
        costPriceInput.value = costPrice.toFixed(2); //
        resultText.textContent = `${formatCurrency(costPrice)} Cost Price`; //
    } else {
        // Not enough inputs
        grossProfit = 0; //
        actualMarginPercent = 0; //
        resultText.textContent = "--"; //
    }

    // Update results in UI
    grossProfitResult.textContent = formatCurrency(grossProfit); //
    marginPercentResult.textContent = `${actualMarginPercent.toFixed(2)} %`; //

    // Update chart
    updateChart(costPrice, grossProfit); //
    // Update breakdown table
    updateBreakdown(costPrice, sellingPrice, grossProfit, actualMarginPercent); //
}

/**
 * Updates the Chart.js pie chart with cost and gross profit data.
 * @param {number} cost The cost price.
 * @param {number} profit The gross profit.
 */
function updateChart(cost, profit) {
    const ctx = marginChartCanvas.getContext('2d'); //

    if (marginChart) { //
        marginChart.destroy(); // Destroy existing chart before creating a new one
    }

    let chartData = []; //
    let chartLabels = []; //
    let backgroundColors = []; //

    if (cost > 0 || profit > 0) { //
        if (cost > 0) { //
            chartData.push(cost); //
            chartLabels.push('Cost Price'); //
            backgroundColors.push('#4F46E5'); // Indigo 600
        }
        if (profit > 0) { //
            chartData.push(profit); //
            chartLabels.push('Gross Profit'); //
            backgroundColors.push('#f59e0b'); // Yellow 500
        }
    } else {
        // Display empty state if no valid data
        chartData.push(1); // Small dummy value to show an empty circle
        chartLabels.push('No Data'); //
        backgroundColors.push('#E0E0E0'); // Light grey
    }


    marginChart = new Chart(ctx, { //
        type: 'doughnut', //
        data: { //
            labels: chartLabels, //
            datasets: [{ //
                data: chartData, //
                backgroundColor: backgroundColors, //
                borderWidth: 0, //
                hoverOffset: 4 //
            }]
        },
        options: { //
            responsive: true, //
            maintainAspectRatio: false, //
            cutout: '60%', // Creates the doughnut hole
            plugins: { //
                legend: { //
                    position: 'bottom', //
                    labels: { //
                        font: { //
                            size: 14 //
                        }
                    }
                },
                tooltip: { //
                    callbacks: { //
                        label: function(context) { //
                            const label = context.label || ''; //
                            const value = context.parsed || 0; //
                            return `${label}: ${formatCurrency(value)}`; //
                        }
                    }
                }
            }
        },
        plugins: [{ //
            id: 'centerCircle', //
            beforeDraw: function(chart) { //
                const width = chart.width; //
                const height = chart.height; //
                const ctx = chart.ctx; //
                
                ctx.restore(); //
                const fontSize = (height / 8).toFixed(2); //
                ctx.font = fontSize + "px sans-serif"; //
                ctx.textBaseline = "middle"; //
                
                // Draw white circle (if needed, currently radius 0 makes it invisible)
                const centerX = width / 2; //
                const centerY = height / 2; //
                const radius = height * 0; //
                
                ctx.beginPath(); //
                ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI); //
                ctx.fillStyle = 'white'; //
                ctx.fill(); //
                ctx.strokeStyle = 'white'; //
                ctx.stroke(); //
                
                ctx.save(); //
            }
        }]
    });
}

/**
 * Updates the breakdown table with calculated values.
 * @param {number} cost The calculated cost price.
 * @param {number} selling The calculated selling price.
 * @param {number} profit The calculated gross profit.
 * @param {number} margin The calculated margin percentage.
 */
function updateBreakdown(cost, selling, profit, margin) {
    breakdownCostPrice.textContent = formatCurrency(cost); //
    breakdownSellingPrice.textContent = formatCurrency(selling); //
    breakdownGrossProfit.textContent = formatCurrency(profit); //
    breakdownMarginPercentage.textContent = `${margin.toFixed(2)} %`; //
}

</script>

<?php include '../../includes/footer.php'; ?>