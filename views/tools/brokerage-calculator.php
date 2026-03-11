<?php
// SEO and Page Metadata
$page_title = "Brokerage Calculator - Calculate Stock Trading Fees Online"; // You may Change the Title here
$page_description = "Free brokerage calculator online. Calculate stock trading brokerage fees, taxes, and net profit/loss for NSE, BSE, MCX trades. Compare brokers instantly."; // Put your Description here
$page_keywords = "brokerage calculator - calculate stock trading fees online, brokerage, calculator, calculate, stock, trading, fees, online, free online tools, pdf tools";

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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">Brokerage Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Calculate total charges for your stock trades including brokerage, STT, and other taxes.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Trade Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <label for="trade-type" class="form-label mb-1">Segment</label>
                                    <select id="trade-type" class="form-select mt-2">
                                        <option value="equity-delivery">Equity Delivery</option>
                                        <option value="equity-intraday">Equity Intraday</option>
                                        <option value="equity-futures">Equity Futures</option>
                                        <option value="equity-options">Equity Options</option>
                                    </select>
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="buy-price" class="form-label mb-1">Buy Price (per share)</label>
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
                                        </div>
                                    </div>
                                    <input type="number" id="buy-price" class="form-control mt-2" value="1000" min="0.01" step="0.01">
                                </div>

                                <div>
                                    <label for="sell-price" class="form-label mb-1">Sell Price (per share)</label>
                                    <input type="number" id="sell-price" class="form-control mt-2" value="1010" min="0.01" step="0.01">
                                </div>

                                <div>
                                    <label for="quantity" class="form-label mb-1">Quantity</label>
                                    <input type="number" id="quantity" class="form-control mt-2" value="10" min="1" step="1">
                                </div>

                                <div id="brokerage-rate-input">
                                    <label for="brokerage-rate" class="form-label mb-1">Brokerage (per order, or %)</label>
                                    <input type="number" id="brokerage-rate" class="form-control mt-2" value="20" min="0" step="0.01">
                                    <div class="form-text">e.g., 0.03 for % of turnover, or 20 for flat fee.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="brokerage-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Net Profit/Loss</p>
                            <p id="net-pnl-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Gross Profit/Loss</p>
                                    <p id="gross-pnl-result" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Total Charges</p>
                                    <p id="total-charges-result" class="h4 fw-semibold text-gray-800">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    
        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Charges Breakdown</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Charge Type</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Amount</th>
                            </tr>
                        </thead>
                        <tbody id="charges-table-body" class="bg-white">
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
                <?php include '../../views/content/brokerage-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Brokerage Calculator
let brokerageChart; // Variable to hold the Chart.js instance

// Get DOM elements
const tradeTypeSelect = document.getElementById('trade-type');
const buyPriceInput = document.getElementById('buy-price');
const sellPriceInput = document.getElementById('sell-price');
const quantityInput = document.getElementById('quantity');
const brokerageRateInput = document.getElementById('brokerage-rate');
const brokerageRateDiv = document.getElementById('brokerage-rate-input');
const currencySelect = document.getElementById('currency-select'); // New: Get currency select element

const netPnLResult = document.getElementById('net-pnl-result');
const grossPnLResult = document.getElementById('gross-pnl-result');
const totalChargesResult = document.getElementById('total-charges-result');
const chargesTableBody = document.getElementById('charges-table-body');
const brokerageChartCanvas = document.getElementById('brokerage-chart');

// Event Listeners for inputs
tradeTypeSelect.addEventListener('change', updateCalculator);
buyPriceInput.addEventListener('input', updateCalculator);
sellPriceInput.addEventListener('input', updateCalculator);
quantityInput.addEventListener('input', updateCalculator);
brokerageRateInput.addEventListener('input', updateCalculator);
currencySelect.addEventListener('change', updateCalculator); // New: Add event listener for currency select

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
    return new Intl.NumberFormat('en-IN', { 
        style: 'currency',
        currency: selectedCurrency,
        minimumFractionDigits: 2, 
        maximumFractionDigits: 2
    }).format(amount);
}

/**
 * Updates the calculator based on input changes.
 */
function updateCalculator() {
    const tradeType = tradeTypeSelect.value;
    const buyPrice = parseFloat(buyPriceInput.value);
    const sellPrice = parseFloat(sellPriceInput.value);
    const quantity = parseInt(quantityInput.value);

    if (isNaN(buyPrice) || isNaN(sellPrice) || isNaN(quantity) || buyPrice <= 0 || quantity <= 0) {
        resetResults();
        return;
    }

    // Adjust brokerage input label/text based on trade type
    if (tradeType === 'equity-futures' || tradeType === 'equity-options') {
        brokerageRateInput.value = 20; // Default flat fee for F&O
        brokerageRateDiv.querySelector('.form-text').textContent = 'e.g., 20 for flat fee per lot.';
    } else { // Equity Delivery and Intraday
        brokerageRateInput.value = 0.03; // Default percentage for Equity
        brokerageRateDiv.querySelector('.form-text').textContent = 'e.g., 0.03 for % of turnover, or 20 for flat fee (max).';
    }


    calculateBrokerage(tradeType, buyPrice, sellPrice, quantity);
}

/**
 * Calculates all brokerage and charges and updates the UI.
 * @param {string} tradeType Type of trade (equity-delivery, equity-intraday, equity-futures, equity-options).
 * @param {number} buyPrice Buying price per share/unit.
 * @param {number} sellPrice Selling price per share/unit.
 * @param {number} quantity Number of shares/units.
 */
function calculateBrokerage(tradeType, buyPrice, sellPrice, quantity) {
    const buyValue = buyPrice * quantity;
    const sellValue = sellPrice * quantity;
    const totalTurnover = buyValue + sellValue;
    const brokerageRate = parseFloat(brokerageRateInput.value);

    let brokerageBuy = 0;
    let brokerageSell = 0;
    let stt = 0;
    let transactionCharges = 0;
    let sebiCharges = 0;
    let stampDuty = 0;
    let gst = 0;
    let grossPnL = 0;
    let totalCharges = 0;
    let netPnL = 0;

    // 1. Brokerage
    if (['equity-delivery', 'equity-intraday'].includes(tradeType)) {
        const maxBrokeragePerOrder = 20; // Max brokerage per order
        brokerageBuy = Math.min(buyValue * (brokerageRate / 100), maxBrokeragePerOrder);
        brokerageSell = Math.min(sellValue * (brokerageRate / 100), maxBrokeragePerOrder);
    } else if (tradeType === 'equity-futures') {
        brokerageBuy = Math.min(brokerageRate, buyValue * 0.0001); // Assuming flat Rs 20 or 0.01% of turnover
        brokerageSell = Math.min(brokerageRate, sellValue * 0.0001);
    } else if (tradeType === 'equity-options') {
        // Options brokerage is typically flat per lot, assuming brokerageRate is per lot
        // For simplicity, let's assume it's per order for now, adjust based on actual lot size logic if needed
        brokerageBuy = brokerageRate; 
        brokerageSell = brokerageRate;
    }
    
    const totalBrokerage = brokerageBuy + brokerageSell;


    // 2. STT (Securities Transaction Tax)
    if (tradeType === 'equity-delivery') {
        stt = sellValue * 0.001; // 0.1% on sell side
    } else if (tradeType === 'equity-intraday') {
        stt = sellValue * 0.00025; // 0.025% on sell side
    } else if (tradeType === 'equity-futures') {
        stt = sellValue * 0.0001; // 0.01% on sell side
    } else if (tradeType === 'equity-options') {
        // STT on options is on premium value
        stt = sellValue * 0.0005; // 0.05% on sell side (of premium value)
    }

    // 3. Transaction Charges (Exchange Turnover Charges)
    if (tradeType === 'equity-delivery' || tradeType === 'equity-intraday') {
        transactionCharges = totalTurnover * 0.0000345; // Approx 0.00345%
    } else if (tradeType === 'equity-futures') {
        transactionCharges = totalTurnover * 0.000019; // Approx 0.0019%
    } else if (tradeType === 'equity-options') {
        transactionCharges = totalTurnover * 0.00053; // Approx 0.053% (on premium value)
    }

    // 4. SEBI Turnover Fees
    sebiCharges = totalTurnover * 0.0000005; // 0.0000005% of turnover

    // 5. Stamp Duty (Rates vary by state, using common rates for illustration)
    // Buy side only for equity delivery/intraday, options premium
    if (tradeType === 'equity-delivery') {
        stampDuty = buyValue * 0.00003; // 0.003% on buy
    } else if (tradeType === 'equity-intraday') {
        stampDuty = buyValue * 0.00003; // 0.003% on buy
    } else if (tradeType === 'equity-futures') {
        stampDuty = buyValue * 0.00002; // 0.002% on buy
    } else if (tradeType === 'equity-options') {
        stampDuty = buyValue * 0.00003; // 0.003% on buy (of premium value)
    }

    // 6. GST (18% on Brokerage + Transaction Charges + SEBI Charges)
    gst = 0.18 * (totalBrokerage + transactionCharges + sebiCharges);

    // Calculate Gross P&L
    grossPnL = (sellPrice - buyPrice) * quantity;

    // Calculate Total Charges
    totalCharges = totalBrokerage + stt + transactionCharges + sebiCharges + stampDuty + gst;

    // Calculate Net P&L
    netPnL = grossPnL - totalCharges;

    // Update results in UI
    grossPnLResult.textContent = formatCurrency(grossPnL);
    totalChargesResult.textContent = formatCurrency(totalCharges);
    netPnLResult.textContent = formatCurrency(netPnL);

    // Populate charges breakdown table
    updateChargesTable(totalBrokerage, stt, transactionCharges, sebiCharges, stampDuty, gst);
    
    // Update chart
    updateChart(grossPnL, totalCharges, netPnL);
}

/**
 * Resets the results when inputs are invalid.
 */
function resetResults() {
    grossPnLResult.textContent = formatCurrency(0);
    totalChargesResult.textContent = formatCurrency(0);
    netPnLResult.textContent = formatCurrency(0);
    chargesTableBody.innerHTML = '';
    updateChart(0, 0, 0);
}

/**
 * Populates the charges breakdown table.
 */
function updateChargesTable(brokerage, stt, transactionCharges, sebiCharges, stampDuty, gst) {
    chargesTableBody.innerHTML = ''; // Clear previous data

    const charges = [
        { name: 'Brokerage', amount: brokerage },
        { name: 'STT (Securities Transaction Tax)', amount: stt },
        { name: 'Transaction Charges', amount: transactionCharges },
        { name: 'SEBI Turnover Fees', amount: sebiCharges },
        { name: 'Stamp Duty', amount: stampDuty },
        { name: 'GST (18%)', amount: gst }
    ];

    charges.forEach(charge => {
        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${charge.name}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(charge.amount)}</td>
        `;
        chargesTableBody.appendChild(row);
    });
}

/**
 * Updates the Chart.js pie chart with Gross P&L vs. Total Charges.
 */
function updateChart(grossPnL, totalCharges, netPnL) {
    const ctx = brokerageChartCanvas.getContext('2d');

    if (brokerageChart) {
        brokerageChart.destroy(); // Destroy existing chart before creating a new one
    }

    const dataLabels = ['Gross P&L', 'Total Charges'];
    const dataValues = [Math.abs(grossPnL), totalCharges];
    const backgroundColors = ['#4F46E5', '#f59e0b']; // Indigo 600, Yellow 500

    if (grossPnL < 0) { // If gross P&L is negative, show it as a loss component
        dataLabels[0] = 'Gross Loss';
    }
    
    brokerageChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: dataLabels,
            datasets: [{
                data: dataValues,
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
                
                const centerX = width / 2;
                const centerY = height / 2;
                const radius = height * 0; 
                
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