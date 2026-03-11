<?php
// SEO and Page Metadata
$page_title = "Salary Calculator - Calculate Take-Home Pay & CTC Online"; // You may Change the Title here
$page_description = "Free salary calculator online. Calculate take-home pay, gross to net salary, HRA, PF deductions, and in-hand salary with India tax slabs. Accurate and instant."; // Put your Description here
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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">Salary Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Understand your take-home pay by calculating gross salary, deductions, and net salary.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Earnings & Deductions</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="gross-salary" class="form-label mb-1">Monthly Gross Salary</label>
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
                                            <input type="number" id="gross-salary" class="form-control" value="50000" min="0">
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label for="epf-contribution" class="form-label mb-1">Employee PF Contribution (%)</label>
                                    <div class="input-group">
                                        <input type="number" id="epf-contribution" class="form-control" value="12" min="0" max="100" step="0.1">
                                        <span class="input-group-text">%</span>
                                    </div>
                                    <small class="form-text text-muted">Typically 12% of Basic + DA.</small>
                                </div>

                                <div>
                                    <label for="esi-contribution" class="form-label mb-1">Employee ESI Contribution (%)</label>
                                    <div class="input-group">
                                        <input type="number" id="esi-contribution" class="form-control" value="0.75" min="0" max="100" step="0.01">
                                        <span class="input-group-text">%</span>
                                    </div>
                                    <small class="form-text text-muted">Typically 0.75% for salary < ₹21,000.</small>
                                </div>

                                <div>
                                    <label for="professional-tax" class="form-label mb-1">Professional Tax (Monthly)</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="pt-currency-symbol">₹</span>
                                        <input type="number" id="professional-tax" class="form-control" value="200" min="0">
                                    </div>
                                    <small class="form-text text-muted">Varies by state (max ₹200/month in many states).</small>
                                </div>

                                <div>
                                    <label for="other-deductions" class="form-label mb-1">Other Deductions (Monthly)</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="od-currency-symbol">₹</span>
                                        <input type="number" id="other-deductions" class="form-control" value="0" min="0">
                                    </div>
                                    <small class="form-text text-muted">e.g., LTA, medical insurance, etc.</small>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" id="consider-income-tax" checked>
                                    <label class="form-check-label" for="consider-income-tax">
                                        Consider Income Tax (Estimates based on simplified Indian tax slabs)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column justify-content-between">
                        <div class="p-4 rounded border mb-4">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Your Pay Breakdown</h3>
                            <div class="space-y-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0 text-gray-600">Gross Monthly Salary:</p>
                                    <p id="gross-monthly-display" class="h5 fw-semibold text-gray-800 mb-0">₹ 0</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0 text-gray-600">Total Deductions:</p>
                                    <p id="total-deductions-display" class="h5 fw-semibold text-danger mb-0">₹ 0</p>
                                </div>
                                <hr class="my-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0 h5 fw-bold text-gray-800">Net Monthly Salary:</p>
                                    <p id="net-monthly-display" class="display-6 fw-bold text-primary mb-0">₹ 0</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Annual Summary</h3>
                            <div class="space-y-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0 text-gray-600">Gross Annual Salary:</p>
                                    <p id="gross-annual-display" class="h5 fw-semibold text-gray-800 mb-0">₹ 0</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0 text-gray-600">Total Annual Deductions:</p>
                                    <p id="total-annual-deductions-display" class="h5 fw-semibold text-danger mb-0">₹ 0</p>
                                </div>
                                <hr class="my-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0 h5 fw-bold text-gray-800">Net Annual Salary:</p>
                                    <p id="net-annual-display" class="h4 fw-bold text-primary mb-0">₹ 0</p>
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
                <?php include '../../views/content/salary-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Salary Calculator

// Get DOM elements
const grossSalaryInput = document.getElementById('gross-salary');
const epfContributionInput = document.getElementById('epf-contribution');
const esiContributionInput = document.getElementById('esi-contribution');
const professionalTaxInput = document.getElementById('professional-tax');
const otherDeductionsInput = document.getElementById('other-deductions');
const considerIncomeTaxCheckbox = document.getElementById('consider-income-tax');

const grossMonthlyDisplay = document.getElementById('gross-monthly-display');
const totalDeductionsDisplay = document.getElementById('total-deductions-display');
const netMonthlyDisplay = document.getElementById('net-monthly-display');
const grossAnnualDisplay = document.getElementById('gross-annual-display');
const totalAnnualDeductionsDisplay = document.getElementById('total-annual-deductions-display');
const netAnnualDisplay = document.getElementById('net-annual-display');
const currencySelect = document.getElementById('currency-select'); //
const ptCurrencySymbol = document.getElementById('pt-currency-symbol'); //
const odCurrencySymbol = document.getElementById('od-currency-symbol'); //


// Event Listeners for inputs
grossSalaryInput.addEventListener('input', updateCalculator);
epfContributionInput.addEventListener('input', updateCalculator);
esiContributionInput.addEventListener('input', updateCalculator);
professionalTaxInput.addEventListener('input', updateCalculator);
otherDeductionsInput.addEventListener('input', updateCalculator);
considerIncomeTaxCheckbox.addEventListener('change', updateCalculator);
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
    const selectedCurrency = currencySelect.value; //
    return new Intl.NumberFormat('en-IN', { //
        style: 'currency', //
        currency: selectedCurrency, //
        minimumFractionDigits: 0, // No decimal places for whole rupees
        maximumFractionDigits: 0 //
    }).format(amount); //
}

/**
 * Updates the displayed currency symbol for input fields.
 */
function updateCurrencySymbols() { //
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
    ptCurrencySymbol.textContent = symbol; //
    odCurrencySymbol.textContent = symbol; //
}


/**
 * Calculates estimated income tax based on simplified Indian tax slabs (New Tax Regime for simplicity).
 * This is a highly simplified estimation and does not account for all deductions (e.g., 80C, 80D, HRA exemptions, etc.)
 * or the old tax regime complexities.
 * @param {number} annualTaxableIncome The annual income after basic deductions (like standard deduction).
 * @returns {number} The estimated annual income tax.
 */
function calculateIncomeTax(annualTaxableIncome) {
    let tax = 0;
    // Assuming Standard Deduction of 50,000 is already factored into annualTaxableIncome for simplicity
    // For FY 2024-25 / AY 2025-26 New Tax Regime (simplified for calculator)
    // Up to 3,00,000 - Nil
    // 3,00,001 to 6,00,000 - 5% on income exceeding 3,00,000
    // 6,00,001 to 9,00,000 - 10% on income exceeding 6,00,000 + 15,000
    // 9,00,001 to 12,00,000 - 15% on income exceeding 9,00,000 + 45,000
    // 12,00,001 to 15,00,000 - 20% on income exceeding 12,00,000 + 90,000
    // Above 15,00,000 - 30% on income exceeding 15,00,000 + 1,50,000

    if (annualTaxableIncome <= 300000) {
        tax = 0;
    } else if (annualTaxableIncome <= 600000) {
        tax = (annualTaxableIncome - 300000) * 0.05;
    } else if (annualTaxableIncome <= 900000) {
        tax = 15000 + (annualTaxableIncome - 600000) * 0.10;
    } else if (annualTaxableIncome <= 1200000) {
        tax = 45000 + (annualTaxableIncome - 900000) * 0.15;
    } else if (annualTaxableIncome <= 1500000) {
        tax = 90000 + (annualTaxableIncome - 1200000) * 0.20;
    } else {
        tax = 150000 + (annualTaxableIncome - 1500000) * 0.30;
    }

    // Rebate under Section 87A for taxable income up to Rs. 7,00,000 (New Tax Regime)
    if (annualTaxableIncome <= 700000) {
        tax = 0; // Full rebate
    }

    // Add 4% Health and Education Cess
    tax += tax * 0.04;

    return tax;
}


/**
 * Updates the salary calculation and displays results.
 */
function updateCalculator() {
    const grossMonthly = parseFloat(grossSalaryInput.value);
    const epfRate = parseFloat(epfContributionInput.value) / 100;
    const esiRate = parseFloat(esiContributionInput.value) / 100;
    const professionalTaxMonthly = parseFloat(professionalTaxInput.value);
    const otherDeductionsMonthly = parseFloat(otherDeductionsInput.value);
    const considerIncomeTax = considerIncomeTaxCheckbox.checked;

    // EPF calculation (simplified: assuming gross salary is basis for PF)
    // In reality, PF is on Basic + DA. Here, using gross as a proxy for simplicity.
    const epfDeduction = grossMonthly * epfRate; 
    
    // ESI calculation (threshold ₹21,000)
    let esiDeduction = 0;
    if (grossMonthly <= 21000) { // ESI wage limit
        esiDeduction = grossMonthly * esiRate;
    }

    // Monthly Deductions
    let totalMonthlyDeductions = epfDeduction + esiDeduction + professionalTaxMonthly + otherDeductionsMonthly;

    // Annual Calculations for Income Tax Estimation
    const grossAnnual = grossMonthly * 12;
    const annualEPFDeduction = epfDeduction * 12;
    const annualESIDeduction = esiDeduction * 12;
    const annualProfessionalTax = professionalTaxMonthly * 12;
    const annualOtherDeductions = otherDeductionsMonthly * 12;

    // Taxable Income (simplified: Gross Annual - (EPF + ESI + PT + Other Deductions))
    // This is a very basic approximation for taxable income.
    // In reality, it involves HRA, LTA, standard deduction (₹50,000), 80C, 80D, etc.
    let annualTaxableIncome = grossAnnual - annualEPFDeduction - annualESIDeduction - annualProfessionalTax - annualOtherDeductions;
    
    // For income tax calculation, typically a standard deduction of 50,000 is applied.
    // However, to keep it simple and show impact of other fields, let's assume `annualTaxableIncome`
    // is the basis and `calculateIncomeTax` function handles the slab.
    // If you want to include standard deduction directly, uncomment the line below:
    // annualTaxableIncome = Math.max(0, annualTaxableIncome - 50000); // Standard deduction

    let annualIncomeTax = 0;
    if (considerIncomeTax) {
        annualIncomeTax = calculateIncomeTax(annualTaxableIncome);
    }
    const monthlyIncomeTax = annualIncomeTax / 12;

    totalMonthlyDeductions += monthlyIncomeTax;

    const netMonthly = grossMonthly - totalMonthlyDeductions;
    const totalAnnualDeductions = totalMonthlyDeductions * 12;
    const netAnnual = grossAnnual - totalAnnualDeductions;


    // Update UI
    grossMonthlyDisplay.textContent = formatCurrency(grossMonthly);
    totalDeductionsDisplay.textContent = formatCurrency(totalMonthlyDeductions);
    netMonthlyDisplay.textContent = formatCurrency(netMonthly);

    grossAnnualDisplay.textContent = formatCurrency(grossAnnual);
    totalAnnualDeductionsDisplay.textContent = formatCurrency(totalAnnualDeductions);
    netAnnualDisplay.textContent = formatCurrency(netAnnual);
    
    updateCurrencySymbols(); //
}
</script>

<?php include '../../includes/footer.php'; ?>