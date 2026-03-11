<?php
// SEO and Page Metadata
$page_title = "HRA Calculator - House Rent Allowance Exemption Calculator"; // You may Change the Title here
$page_description = "Free HRA calculator online. Calculate your House Rent Allowance tax exemption as per Income Tax rules. Know the exact HRA deduction you are eligible for."; // Put your Description here
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
        <div class="row justify-content="center px-2">
            <div class="col-12 p-3 p-md-4 rounded shadow">
                <div class="text-center mb-4 mb-md-5">
                    <h1 class="h2 fw-bold text-gray-800 mb-2">HRA Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Calculate your House Rent Allowance (HRA) exemption to understand your taxable income.
                    </p>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">HRA Details</h3>
                            <div class="space-y-4">
                                <div class="mb-3">
                                    <label for="currency-select" class="form-label mb-1">Select Currency</label>
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
                                    <label for="basic-salary" class="form-label mb-1">Basic Salary (Monthly)</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-salary-currency-symbol">₹</span>
                                        <input type="number" id="basic-salary" min="0" value="50000" class="form-control">
                                    </div>
                                </div>

                                <div>
                                    <label for="da-salary" class="form-label mb-1">Dearness Allowance (DA) (Monthly)</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="da-salary-currency-symbol">₹</span>
                                        <input type="number" id="da-salary" min="0" value="0" class="form-control">
                                    </div>
                                </div>

                                <div>
                                    <label for="commission" class="form-label mb-1">Commission (Monthly)</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="commission-currency-symbol">₹</span>
                                        <input type="number" id="commission" min="0" value="0" class="form-control">
                                    </div>
                                </div>

                                <div>
                                    <label for="actual-hra-received" class="form-label mb-1">Actual HRA Received (Monthly)</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="actual-hra-received-currency-symbol">₹</span>
                                        <input type="number" id="actual-hra-received" min="0" value="20000" class="form-control">
                                    </div>
                                </div>

                                <div>
                                    <label for="rent-paid" class="form-label mb-1">Rent Paid (Monthly)</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="rent-paid-currency-symbol">₹</span>
                                        <input type="number" id="rent-paid" min="0" value="15000" class="form-control">
                                    </div>
                                </div>

                                <div>
                                    <label for="city-type" class="form-label mb-1">City Type</label>
                                    <select id="city-type" class="form-select">
                                        <option value="metro">Metro (50% of Salary)</option>
                                        <option value="non-metro">Non-Metro (40% of Salary)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="hra-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Exempted HRA</p>
                            <p id="exempted-hra-result" class="display-6 fw-bold text-gray-800 mb-3">₹ 0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Taxable HRA</p>
                                    <p id="taxable-hra-result" class="h4 fw-semibold text-primary">₹ 0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Actual HRA Received</p>
                                    <p id="actual-hra-received-result" class="h4 fw-semibold text-gray-800">₹ 0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">HRA Exemption Breakdown</h3>
            <div class="col-12 px-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Criterion</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Amount</th>
                            </tr>
                        </thead>
                        <tbody id="hra-breakdown-table-body" class="bg-white">
                            <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Actual HRA Received (Monthly)</td>
                                <td id="breakdown-actual-hra" class="py-2 px-4 border-b text-right text-sm text-gray-800">₹ 0</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Rent Paid Annually minus 10% of (Basic + DA + Commission)</td>
                                <td id="breakdown-rent-minus-10-salary" class="py-2 px-4 border-b text-right text-sm text-gray-800">₹ 0</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">50% (Metro) / 40% (Non-Metro) of (Basic + DA + Commission)</td>
                                <td id="breakdown-percentage-of-salary" class="py-2 px-4 border-b text-right text-sm text-gray-800">₹ 0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="alert alert-info mt-4" role="alert">
                    <i class="fas fa-info-circle me-2"></i>
                    The **Exempted HRA** is the **minimum** of the above three amounts.
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
                <?php include '../../views/content/hra-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for HRA Calculator
let hraChart; // Variable to hold the Chart.js instance

// Get DOM elements
const basicSalaryInput = document.getElementById('basic-salary');
const daSalaryInput = document.getElementById('da-salary');
const commissionInput = document.getElementById('commission');
const actualHRAInput = document.getElementById('actual-hra-received');
const rentPaidInput = document.getElementById('rent-paid');
const cityTypeSelect = document.getElementById('city-type');
const currencySelect = document.getElementById('currency-select'); //

// Get currency symbol spans
const basicSalaryCurrencySymbol = document.getElementById('basic-salary-currency-symbol');
const daSalaryCurrencySymbol = document.getElementById('da-salary-currency-symbol');
const commissionCurrencySymbol = document.getElementById('commission-currency-symbol');
const actualHRAReceivedCurrencySymbol = document.getElementById('actual-hra-received-currency-symbol');
const rentPaidCurrencySymbol = document.getElementById('rent-paid-currency-symbol');


const exemptedHRAResult = document.getElementById('exempted-hra-result');
const taxableHRAResult = document.getElementById('taxable-hra-result');
const actualHRAReceivedResult = document.getElementById('actual-hra-received-result'); // New element

const breakdownActualHRA = document.getElementById('breakdown-actual-hra');
const breakdownRentMinus10Salary = document.getElementById('breakdown-rent-minus-10-salary');
const breakdownPercentageOfSalary = document.getElementById('breakdown-percentage-of-salary');

const hraChartCanvas = document.getElementById('hra-chart');


// Event Listeners for inputs
basicSalaryInput.addEventListener('input', updateCalculator);
daSalaryInput.addEventListener('input', updateCalculator);
commissionInput.addEventListener('input', updateCalculator);
actualHRAInput.addEventListener('input', updateCalculator);
rentPaidInput.addEventListener('input', updateCalculator);
cityTypeSelect.addEventListener('change', updateCalculator); // Use 'change' for select
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
    const selectedCurrency = currencySelect.value;
    return new Intl.NumberFormat('en-IN', { // 'en-IN' locale is good for number formatting, currency symbol changes with 'currency' option
        style: 'currency',
        currency: selectedCurrency,
        minimumFractionDigits: 0, // No decimal places for whole rupees
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the displayed values and triggers HRA calculation.
 */
function updateCalculator() {
    // Update currency symbols based on selection
    const selectedCurrencySymbol = new Intl.NumberFormat('en-IN', { style: 'currency', currency: currencySelect.value }).formatToParts(0).find(part => part.type === 'currency').value;
    basicSalaryCurrencySymbol.textContent = selectedCurrencySymbol;
    daSalaryCurrencySymbol.textContent = selectedCurrencySymbol;
    commissionCurrencySymbol.textContent = selectedCurrencySymbol;
    actualHRAReceivedCurrencySymbol.textContent = selectedCurrencySymbol;
    rentPaidCurrencySymbol.textContent = selectedCurrencySymbol;

    calculateHRA();
}

/**
 * Calculates the HRA exemption and taxable HRA, then updates the UI.
 */
function calculateHRA() {
    const basicSalary = parseFloat(basicSalaryInput.value) || 0;
    const daSalary = parseFloat(daSalaryInput.value) || 0;
    const commission = parseFloat(commissionInput.value) || 0;
    const actualHRAReceived = parseFloat(actualHRAInput.value) || 0;
    const rentPaid = parseFloat(rentPaidInput.value) || 0;
    const cityType = cityTypeSelect.value;

    const totalSalaryForHRA = basicSalary + daSalary + commission; // Monthly total

    // Condition 1: Actual HRA received
    const cond1 = actualHRAReceived;

    // Condition 2: Rent paid annually minus 10% of (Basic + DA + Commission) annually
    const annualRentPaid = rentPaid * 12;
    const annual10PercentOfSalary = (totalSalaryForHRA * 0.10) * 12;
    const cond2 = Math.max(0, annualRentPaid - annual10PercentOfSalary); // Ensure it's not negative

    // Condition 3: 50% (Metro) or 40% (Non-Metro) of (Basic + DA + Commission) annually
    const percentageOfSalary = (cityType === 'metro' ? 0.50 : 0.40);
    const cond3 = (totalSalaryForHRA * percentageOfSalary) * 12; // Annual calculation

    // Exempted HRA is the least of the three conditions
    const exemptedHRA = Math.min(cond1 * 12, cond2, cond3); // Convert actualHRA to annual for comparison

    // Taxable HRA
    const taxableHRA = Math.max(0, (actualHRAReceived * 12) - exemptedHRA);

    // Update results in UI (displaying monthly for Actual HRA Received, but calculations are annual for exemption)
    exemptedHRAResult.textContent = formatCurrency(exemptedHRA);
    taxableHRAResult.textContent = formatCurrency(taxableHRA);
    actualHRAReceivedResult.textContent = formatCurrency(actualHRAReceived); // Display monthly actual HRA received

    // Update breakdown table (display annual figures for clarity)
    breakdownActualHRA.textContent = formatCurrency(cond1 * 12); // Annual Actual HRA
    breakdownRentMinus10Salary.textContent = formatCurrency(cond2);
    breakdownPercentageOfSalary.textContent = formatCurrency(cond3);


    // Update chart
    updateChart(exemptedHRA, taxableHRA);
}

/**
 * Updates the Chart.js pie chart with HRA exemption data.
 * @param {number} exemptedHRA The total exempted HRA amount (annual).
 * @param {number} taxableHRA The total taxable HRA amount (annual).
 */
function updateChart(exemptedHRA, taxableHRA) {
    const ctx = hraChartCanvas.getContext('2d');

    if (hraChart) {
        hraChart.destroy(); // Destroy existing chart before creating a new one
    }

    hraChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Exempted HRA', 'Taxable HRA'],
            datasets: [{
                data: [exemptedHRA, taxableHRA],
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