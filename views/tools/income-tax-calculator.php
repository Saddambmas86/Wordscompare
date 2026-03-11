<?php
// SEO and Page Metadata
$page_title = "$title"; // You may Change the Title here
$page_description = "$desc"; // Put your Description here
$page_keywords = "$kw";

// Include common header
include '../../includes/header.php';
?>

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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">Income Tax Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Estimate your income tax liability for the current financial year.
                    </p>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Your Income Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="annual-income" class="form-label mb-1">Annual Income (Gross)</label>
                                        <div class="d-flex align-items-center">
                                            <select id="currency-select" class="form-select form-select-sm me-2" onchange="updateCalculator()">
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
                                    <div class="input-group">
                                        <input type="number" id="annual-income" min="0" value="700000" class="form-control" oninput="updateCalculator()">
                                    </div>
                                    <small class="form-text text-muted">Enter your total annual income before deductions.</small>
                                </div>

                                <div>
                                    <label for="deductions" class="form-label mb-1">Deductions (e.g., 80C, 80D)</label>
                                    <div class="input-group">
                                        <input type="number" id="deductions" min="0" value="150000" class="form-control" oninput="updateCalculator()">
                                    </div>
                                    <small class="form-text text-muted">Total amount of eligible tax deductions.</small>
                                </div>

                                <div>
                                    <label for="age-group" class="form-label mb-1">Age Group</label>
                                    <select id="age-group" class="form-select" onchange="updateCalculator()">
                                        <option value="below60">Below 60 years</option>
                                        <option value="60to80">60 to 80 years (Senior Citizen)</option>
                                        <option value="above80">Above 80 years (Super Senior Citizen)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-center">
                            <p class="h5 text-gray-600">Net Taxable Income</p>
                            <p id="net-taxable-income-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Total Tax Liability</p>
                                    <p id="total-tax-result" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Average Tax Rate</p>
                                    <p id="average-tax-rate-result" class="h4 fw-semibold text-gray-800">0 %</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Tax Breakdown</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Income Slab</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Tax Rate</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Tax Amount</th>
                            </tr>
                        </thead>
                        <tbody id="tax-breakdown-table-body" class="bg-white">
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
                <?php include '../../views/content/income-tax-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Income Tax Calculator

// Get DOM elements
const annualIncomeInput = document.getElementById('annual-income');
const deductionsInput = document.getElementById('deductions');
const ageGroupSelect = document.getElementById('age-group');
// START: Added currency select element
const currencySelect = document.getElementById('currency-select');
// END: Added currency select element

const netTaxableIncomeResult = document.getElementById('net-taxable-income-result');
const totalTaxResult = document.getElementById('total-tax-result');
const averageTaxRateResult = document.getElementById('average-tax-rate-result');
const taxBreakdownTableBody = document.getElementById('tax-breakdown-table-body');

// Event Listeners
annualIncomeInput.addEventListener('input', updateCalculator);
deductionsInput.addEventListener('input', updateCalculator);
ageGroupSelect.addEventListener('change', updateCalculator);
// START: Added event listener for currency select
currencySelect.addEventListener('change', updateCalculator);
// END: Added event listener for currency select

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
    const selectedCurrency = currencySelect.value; // Get the selected currency from the dropdown
    return new Intl.NumberFormat('en-US', { // Use a generic locale like 'en-US'
        style: 'currency',
        currency: selectedCurrency, // Use the selected currency
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the tax calculation and display.
 */
function updateCalculator() {
    const annualIncome = parseFloat(annualIncomeInput.value) || 0;
    const deductions = parseFloat(deductionsInput.value) || 0;
    const ageGroup = ageGroupSelect.value;

    const netTaxableIncome = Math.max(0, annualIncome - deductions);

    // Display net taxable income using the new formatCurrency function
    netTaxableIncomeResult.textContent = formatCurrency(netTaxableIncome);

    calculateTax(netTaxableIncome, ageGroup);
}

/**
 * Calculates the income tax based on taxable income and age group.
 * @param {number} taxableIncome The calculated net taxable income.
 * @param {string} ageGroup The selected age group (below60, 60to80, above80).
 */
function calculateTax(taxableIncome, ageGroup) {
    let tax = 0;
    let taxBreakdown = [];
    let remainingTaxableIncome = taxableIncome;
    let rebate87A = 0; // For tax rebate under Section 87A

    // Define tax slabs based on age group
    let slabs;
    if (ageGroup === 'below60') {
        slabs = [
            { limit: 250000, rate: 0.00 },
            { limit: 500000, rate: 0.05 },
            { limit: 1000000, rate: 0.20 },
            { limit: Infinity, rate: 0.30 }
        ];
        if (taxableIncome > 0 && taxableIncome <= 500000) { // Check taxableIncome > 0 to avoid rebate for 0 income
            rebate87A = Math.min(taxableIncome * 0.05, 12500); // Max rebate is 12,500
        }
    } else if (ageGroup === '60to80') {
        slabs = [
            { limit: 300000, rate: 0.00 },
            { limit: 500000, rate: 0.05 },
            { limit: 1000000, rate: 0.20 },
            { limit: Infinity, rate: 0.30 }
        ];
         if (taxableIncome > 0 && taxableIncome <= 500000) { // Check taxableIncome > 0 to avoid rebate for 0 income
            rebate87A = Math.min(taxableIncome * 0.05, 12500); // Max rebate is 12,500
        }
    } else { // above80
        slabs = [
            { limit: 500000, rate: 0.00 },
            { limit: 1000000, rate: 0.20 },
            { limit: Infinity, rate: 0.30 }
        ];
    }

    let previousSlabLimit = 0;
    for (let i = 0; i < slabs.length; i++) {
        const slab = slabs[i];
        let incomeInSlab = 0;
        let taxInSlab = 0;
        let slabLabel = "";

        if (remainingTaxableIncome > 0) {
            // Calculate the portion of income falling within the current slab
            if (i === 0) { // First slab
                 incomeInSlab = Math.min(remainingTaxableIncome, slab.limit);
            } else { // Subsequent slabs
                // Calculate the income within the current slab's range
                let currentSlabUpperLimit = slab.limit;
                // If it's the last slab (Infinity), then incomeInSlab is just the remainingTaxableIncome
                if (slab.limit === Infinity) {
                    incomeInSlab = remainingTaxableIncome;
                } else {
                    incomeInSlab = Math.min(remainingTaxableIncome, currentSlabUpperLimit - previousSlabLimit);
                }
            }
            
            if (incomeInSlab > 0) {
                taxInSlab = incomeInSlab * slab.rate;
                tax += taxInSlab;
                remainingTaxableIncome -= incomeInSlab;

                // Determine the label for the slab
                if (slab.limit === Infinity) {
                    slabLabel = `Above ${formatCurrency(previousSlabLimit)}`;
                } else {
                    // For slabs starting from 0, the lower bound for the label should be 0 or 1
                    let lowerBoundLabel = (previousSlabLimit === 0) ? formatCurrency(0) : formatCurrency(previousSlabLimit + 1);
                    slabLabel = `${lowerBoundLabel} to ${formatCurrency(slab.limit)}`;
                }

                taxBreakdown.push({
                    slab: slabLabel,
                    rate: `${(slab.rate * 100).toFixed(0)}%`,
                    amount: taxInSlab
                });
            }
        }
        previousSlabLimit = slab.limit;
        if (remainingTaxableIncome <= 0) break; // Stop if all income has been taxed
    }

    // Apply Section 87A rebate
    tax = Math.max(0, tax - rebate87A);

    // Add 4% Health and Education Cess
    const cess = tax * 0.04;
    tax += cess;

    // Update UI
    totalTaxResult.textContent = formatCurrency(tax);
    const averageTaxRate = taxableIncome > 0 ? (tax / taxableIncome) * 100 : 0;
    averageTaxRateResult.textContent = `${averageTaxRate.toFixed(2)} %`;

    // Populate tax breakdown table
    populateTaxBreakdownTable(taxBreakdown, rebate87A, cess, tax);
}

/**
 * Populates the tax breakdown table.
 * @param {Array} breakdownData Array of objects with slab, rate, and amount.
 * @param {number} rebate87A The rebate amount under Section 87A.
 * @param {number} cess The health and education cess amount.
 * @param {number} finalTax The final total tax liability.
 */
function populateTaxBreakdownTable(breakdownData, rebate87A, cess, finalTax) {
    taxBreakdownTableBody.innerHTML = ''; // Clear previous data

    let cumulativeTaxBeforeRebate = 0;

    if (breakdownData.length === 0 && finalTax === 0) { // Added finalTax === 0 check
        const row = document.createElement('tr');
        row.innerHTML = `<td colspan="3" class="text-center py-2 px-4">No tax liability for this income.</td>`;
        taxBreakdownTableBody.appendChild(row);
        return;
    }

    breakdownData.forEach(item => {
        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${item.slab}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${item.rate}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(item.amount)}</td>
        `;
        taxBreakdownTableBody.appendChild(row);
        cumulativeTaxBeforeRebate += item.amount;
    });

    // Add rebate row if applicable
    if (rebate87A > 0) {
        const rebateRow = document.createElement('tr');
        rebateRow.className = 'hover:bg-gray-100';
        rebateRow.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800 fw-bold">Less: Rebate u/s 87A</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800"></td>
            <td class="py-2 px-4 border-b text-right text-sm text-danger fw-bold">- ${formatCurrency(rebate87A)}</td>
        `;
        taxBreakdownTableBody.appendChild(rebateRow);
    }

    // Add row for tax before cess
    // Ensure taxBeforeCess is not negative
    const taxBeforeCess = Math.max(0, cumulativeTaxBeforeRebate - rebate87A);
    const taxBeforeCessRow = document.createElement('tr');
    taxBeforeCessRow.className = 'hover:bg-gray-100';
    taxBeforeCessRow.innerHTML = `
        <td class="py-2 px-4 border-b text-left text-sm text-gray-800 fw-bold">Tax Before Cess</td>
        <td class="py-2 px-4 border-b text-right text-sm text-gray-800"></td>
        <td class="py-2 px-4 border-b text-right text-sm text-gray-800 fw-bold">${formatCurrency(taxBeforeCess)}</td>
    `;
    taxBreakdownTableBody.appendChild(taxBeforeCessRow);


    // Add cess row only if taxBeforeCess is positive or there's some other reason to show it
    if (taxBeforeCess > 0 || cess > 0) { // Only show cess if there's tax before cess or cess itself is calculated
        const cessRow = document.createElement('tr');
        cessRow.className = 'hover:bg-gray-100';
        cessRow.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800 fw-bold">Add: Health and Education Cess (4%)</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">4%</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800 fw-bold">${formatCurrency(cess)}</td>
        `;
        taxBreakdownTableBody.appendChild(cessRow);
    }

    // Add total tax row
    const totalTaxRow = document.createElement('tr');
    totalTaxRow.className = 'hover:bg-gray-100';
    totalTaxRow.innerHTML = `
        <td class="py-2 px-4 border-b text-left text-sm text-gray-800 fw-bold">Total Tax Liability</td>
        <td class="py-2 px-4 border-b text-right text-sm text-gray-800"></td>
        <td class="py-2 px-4 border-b text-right text-sm text-primary fw-bold">${formatCurrency(finalTax)}</td>
    `;
    taxBreakdownTableBody.appendChild(totalTaxRow);
}
</script>

<?php include '../../includes/footer.php'; ?>