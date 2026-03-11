<?php
// SEO and Page Metadata
$page_title = "Tax Calculator India FY 2024-25 - Income Tax Calculator Online"; // You may Change the Title here
$page_description = "Free tax calculator online. Calculate income tax, deductions, and net tax payable under India's old and new tax regime for FY 2024-25. Accurate and instant."; // Put your Description here
$page_keywords = "tax calculator india fy 2024-25 - income tax calculator online, tax, calculator, india, 2024-25, income, online, free online tools, pdf tools";

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
                            <h1 class="h2 fw-bold text-gray-800 mb-2">Tax Calculator</h1>
                            <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                                Calculate both income tax and sales tax with our comprehensive calculator.
                            </p>
                        </div>
                        
                        <ul class="nav nav-tabs mb-4" id="taxTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="income-tab" data-bs-toggle="tab" data-bs-target="#income-tax" type="button" role="tab">Income Tax</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="sales-tab" data-bs-toggle="tab" data-bs-target="#sales-tax" type="button" role="tab">Sales Tax</button>
                            </li>
                        </ul>
                        
                        <div class="tab-content" id="taxTabsContent">
                            <!-- Income Tax Calculator -->
                            <div class="tab-pane fade show active" id="income-tax" role="tabpanel">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="p-4 rounded border">
                                            <h3 class="h4 fw-bold text-gray-700 mb-4">Income Details</h3>
                                            <div class="space-y-4">
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <label for="income-amount" class="form-label mb-1">Annual Income</label>
                                                        <div class="d-flex align-items-center">
                                                            <select id="income-currency" class="form-select form-select-sm me-2">
                                                                <option value="USD" selected>$ (USD)</option>
                                                                <option value="EUR">EUR (€)</option>
                                                                <option value="INR">INR (₹)</option>
                                                                <option value="GBP">GBP (£)</option>
                                                            </select>
                                                            <span class="h5 fw-semibold text-primary"><span id="income-amount-text">50,000</span></span>
                                                        </div>
                                                    </div>
                                                    <input type="range" id="income-amount" min="10000" max="1000000" step="1000" value="50000" class="form-range mt-2">
                                                </div>

                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <label for="income-tax-rate" class="form-label mb-1">Income Tax Rate</label>
                                                        <span class="h5 fw-semibold text-primary"><span id="income-tax-rate-text">20</span> %</span>
                                                    </div>
                                                    <input type="range" id="income-tax-rate" min="0" max="50" step="0.5" value="20" class="form-range mt-2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                                            <canvas id="income-tax-chart"></canvas>
                                        </div>
                                        <div class="text-center">
                                            <p class="h5 text-gray-600">Estimated Tax</p>
                                            <p id="income-tax-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                                            <div class="d-flex justify-content-center gap-4">
                                                <div class="text-start">
                                                    <p class="small text-gray-500">Effective Rate</p>
                                                    <p id="effective-rate-result" class="h4 fw-semibold text-primary">0%</p>
                                                </div>
                                                <div class="text-start">
                                                    <p class="small text-gray-500">Take Home Pay</p>
                                                    <p id="take-home-result" class="h4 fw-semibold text-gray-800">0</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Sales Tax Calculator -->
                            <div class="tab-pane fade" id="sales-tax" role="tabpanel">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="p-4 rounded border">
                                            <h3 class="h4 fw-bold text-gray-700 mb-4">Sales Details</h3>
                                            <div class="space-y-4">
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <label for="sales-amount" class="form-label mb-1">Purchase Amount</label>
                                                        <div class="d-flex align-items-center">
                                                            <select id="sales-currency" class="form-select form-select-sm me-2">
                                                                <option value="USD" selected>$ (USD)</option>
                                                                <option value="EUR">EUR (€)</option>
                                                                <option value="INR">INR (₹)</option>
                                                                <option value="GBP">GBP (£)</option>
                                                            </select>
                                                            <span class="h5 fw-semibold text-primary"><span id="sales-amount-text">100</span></span>
                                                        </div>
                                                    </div>
                                                    <input type="range" id="sales-amount" min="1" max="10000" step="1" value="100" class="form-range mt-2">
                                                </div>

                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <label for="sales-tax-rate" class="form-label mb-1">Sales Tax Rate</label>
                                                        <span class="h5 fw-semibold text-primary"><span id="sales-tax-rate-text">7.5</span> %</span>
                                                    </div>
                                                    <input type="range" id="sales-tax-rate" min="0" max="20" step="0.1" value="7.5" class="form-range mt-2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                                            <canvas id="sales-tax-chart"></canvas>
                                        </div>
                                        <div class="text-center">
                                            <p class="h5 text-gray-600">Total Amount</p>
                                            <p id="sales-total-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                                            <div class="d-flex justify-content-center gap-4">
                                                <div class="text-start">
                                                    <p class="small text-gray-500">Tax Amount</p>
                                                    <p id="sales-tax-result" class="h4 fw-semibold text-primary">0</p>
                                                </div>
                                                <div class="text-start">
                                                    <p class="small text-gray-500">Original Price</p>
                                                    <p id="sales-original-result" class="h4 fw-semibold text-gray-800">0</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <div class="col-lg-2 border shadow-sm sticky-top vh-100 p-3">
            <!-- Empty sidebar as per original -->
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
                <?php include '../../views/content/tax-calculator-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Tax Calculator
let incomeTaxChart, salesTaxChart; // Variables to hold Chart.js instances

// Get DOM elements for Income Tax
const incomeAmountSlider = document.getElementById('income-amount');
const incomeAmountText = document.getElementById('income-amount-text');
const incomeTaxRateSlider = document.getElementById('income-tax-rate');
const incomeTaxRateText = document.getElementById('income-tax-rate-text');
const incomeCurrencySelect = document.getElementById('income-currency');
const incomeTaxResult = document.getElementById('income-tax-result');
const effectiveRateResult = document.getElementById('effective-rate-result');
const takeHomeResult = document.getElementById('take-home-result');
const incomeTaxChartCanvas = document.getElementById('income-tax-chart');

// Get DOM elements for Sales Tax
const salesAmountSlider = document.getElementById('sales-amount');
const salesAmountText = document.getElementById('sales-amount-text');
const salesTaxRateSlider = document.getElementById('sales-tax-rate');
const salesTaxRateText = document.getElementById('sales-tax-rate-text');
const salesCurrencySelect = document.getElementById('sales-currency');
const salesTotalResult = document.getElementById('sales-total-result');
const salesTaxResult = document.getElementById('sales-tax-result');
const salesOriginalResult = document.getElementById('sales-original-result');
const salesTaxChartCanvas = document.getElementById('sales-tax-chart');

// Event Listeners
incomeAmountSlider.addEventListener('input', updateIncomeTaxCalculator);
incomeTaxRateSlider.addEventListener('input', updateIncomeTaxCalculator);
incomeCurrencySelect.addEventListener('change', updateIncomeTaxCalculator);

salesAmountSlider.addEventListener('input', updateSalesTaxCalculator);
salesTaxRateSlider.addEventListener('input', updateSalesTaxCalculator);
salesCurrencySelect.addEventListener('change', updateSalesTaxCalculator);

// Initial calculation on page load
window.onload = function() {
    updateIncomeTaxCalculator();
    updateSalesTaxCalculator();
};

/**
 * Formats a number as currency based on the selected currency.
 * @param {number} amount The number to format.
 * @param {string} currency The currency code (USD, EUR, etc.)
 * @returns {string} The formatted currency string.
 */
function formatCurrency(amount, currency) {
    return new Intl.NumberFormat('en-IN', {
        style: 'currency',
        currency: currency,
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }).format(amount);
}

/**
 * Updates the displayed values for income tax sliders and triggers calculation.
 */
function updateIncomeTaxCalculator() {
    // Update slider text displays
    incomeAmountText.textContent = new Intl.NumberFormat('en-IN').format(incomeAmountSlider.value);
    incomeTaxRateText.textContent = incomeTaxRateSlider.value;
    
    calculateIncomeTax();
}

/**
 * Calculates the income tax based on inputs and updates the UI.
 */
function calculateIncomeTax() {
    const income = parseFloat(incomeAmountSlider.value);
    const taxRate = parseFloat(incomeTaxRateSlider.value) / 100;
    const currency = incomeCurrencySelect.value;
    
    const taxAmount = income * taxRate;
    const takeHomePay = income - taxAmount;
    const effectiveRate = (taxAmount / income * 100).toFixed(2);
    
    // Update results in UI
    incomeTaxResult.textContent = formatCurrency(taxAmount, currency);
    effectiveRateResult.textContent = effectiveRate + '%';
    takeHomeResult.textContent = formatCurrency(takeHomePay, currency);
    
    // Update chart
    updateIncomeTaxChart(income, taxAmount, takeHomePay, currency);
}

/**
 * Updates the income tax chart with income, tax, and take-home pay data.
 * @param {number} income The total income.
 * @param {number} taxAmount The total tax amount.
 * @param {number} takeHomePay The take-home pay after tax.
 * @param {string} currency The currency code.
 */
function updateIncomeTaxChart(income, taxAmount, takeHomePay, currency) {
    const ctx = incomeTaxChartCanvas.getContext('2d');
    
    if (incomeTaxChart) {
        incomeTaxChart.destroy();
    }
    
    incomeTaxChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Tax Paid', 'Take Home Pay'],
            datasets: [{
                data: [taxAmount, takeHomePay],
                backgroundColor: ['#f59e0b', '#4F46E5'],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '60%',
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
                            return `${label}: ${formatCurrency(value, currency)}`;
                        }
                    }
                }
            }
        }
    });
}

/**
 * Updates the displayed values for sales tax sliders and triggers calculation.
 */
function updateSalesTaxCalculator() {
    // Update slider text displays
    salesAmountText.textContent = new Intl.NumberFormat('en-IN').format(salesAmountSlider.value);
    salesTaxRateText.textContent = salesTaxRateSlider.value;
    
    calculateSalesTax();
}

/**
 * Calculates the sales tax based on inputs and updates the UI.
 */
function calculateSalesTax() {
    const amount = parseFloat(salesAmountSlider.value);
    const taxRate = parseFloat(salesTaxRateSlider.value) / 100;
    const currency = salesCurrencySelect.value;
    
    const taxAmount = amount * taxRate;
    const totalAmount = amount + taxAmount;
    
    // Update results in UI
    salesTotalResult.textContent = formatCurrency(totalAmount, currency);
    salesTaxResult.textContent = formatCurrency(taxAmount, currency);
    salesOriginalResult.textContent = formatCurrency(amount, currency);
    
    // Update chart
    updateSalesTaxChart(amount, taxAmount, currency);
}

/**
 * Updates the sales tax chart with original amount and tax data.
 * @param {number} amount The original amount.
 * @param {number} taxAmount The tax amount.
 * @param {string} currency The currency code.
 */
function updateSalesTaxChart(amount, taxAmount, currency) {
    const ctx = salesTaxChartCanvas.getContext('2d');
    
    if (salesTaxChart) {
        salesTaxChart.destroy();
    }
    
    salesTaxChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Original Price', 'Sales Tax'],
            datasets: [{
                data: [amount, taxAmount],
                backgroundColor: ['#4F46E5', '#f59e0b'],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '60%',
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
                            return `${label}: ${formatCurrency(value, currency)}`;
                        }
                    }
                }
            }
        }
    });
}
</script>

<?php include '../../includes/footer.php'; ?>