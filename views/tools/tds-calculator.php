<?php
// SEO and Page Metadata
$page_title = "TDS Calculator - Calculate Tax Deducted at Source Online Free"; // You may Change the Title here
$page_description = "Free TDS calculator online. Calculate Tax Deducted at Source on salary, rent, interest, and professional fees. Know your TDS liability as per Indian tax rules."; // Put your Description here
$page_keywords = "tds calculator, calculator, online calculator, free math tools, age calculator, bmi calculator, conversion calculator, wordscompare";

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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">TDS Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Calculate Tax Deducted at Source (TDS) for various payments.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">TDS Calculation Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <label for="currency-select" class="form-label mb-1">Currency</label>
                                    <select id="currency-select" class="form-select mt-2">
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
                                    <label for="income-type" class="form-label mb-1">Type of Income</label>
                                    <select id="income-type" class="form-select mt-2">
                                        <option value="salary">Salary (Section 192)</option>
                                        <option value="interest">Interest other than Interest on Securities (Section 194A)</option>
                                        <option value="contractor">Payment to Contractors (Section 194C)</option>
                                        <option value="professional">Fees for Professional or Technical Services (Section 194J)</option>
                                        <option value="rent">Rent (Section 194IB / 194I)</option>
                                        <option value="commission">Commission or Brokerage (Section 194H)</option>
                                    </select>
                                </div>

                                <div id="amount-group">
                                    <label for="income-amount" class="form-label mb-1">Gross Amount (<span id="currency-symbol-amount">₹</span>)</label>
                                    <input type="number" id="income-amount" class="form-control mt-2" placeholder="Enter amount" value="50000">
                                </div>

                                <div id="pan-status-group" style="display: none;">
                                    <label for="pan-status" class="form-label mb-1">Recipient PAN Available?</label>
                                    <select id="pan-status" class="form-select mt-2">
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>

                                <div id="annual-salary-group" style="display: none;">
                                    <label for="annual-salary" class="form-label mb-1">Annual Taxable Salary (<span id="currency-symbol-salary">₹</span>)</label>
                                    <input type="number" id="annual-salary" class="form-control mt-2" placeholder="Enter annual taxable salary" value="500000">
                                    <small class="form-text text-muted">For Section 192 (Salary) calculations, based on applicable tax slabs.</small>
                                </div>

                                <div id="rent-period-group" style="display: none;">
                                    <label for="rent-period" class="form-label mb-1">Number of Months Rent Paid</label>
                                    <input type="number" id="rent-period" class="form-control mt-2" placeholder="e.g., 12" value="12">
                                    <small class="form-text text-muted">For Section 194IB (Rent) if payment exceeds <span id="currency-symbol-rent">₹</span>50,000/month.</small>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-center w-100">
                            <p class="h5 text-gray-600">Applicable TDS Rate</p>
                            <p id="tds-rate-result" class="display-6 fw-bold text-primary mb-3">0%</p>
                            
                            <p class="h5 text-gray-600">TDS Amount</p>
                            <p id="tds-amount-result" class="display-6 fw-bold text-gray-800 mb-3">₹ 0</p>
                            
                            <div class="d-flex justify-content-center gap-4 mt-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Net Amount Payable</p>
                                    <p id="net-payable-result" class="h4 fw-semibold text-gray-800">₹ 0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    
        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Important TDS Information</h3>
            <div class="col-12 px-0">
                 <div class="p-4 rounded border">
                    <p id="tds-info" class="text-muted">Select an income type to see relevant TDS information and thresholds.</p>
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
                <?php include '../../views/content/tds-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for TDS Calculator

// Get DOM elements
const currencySelect = document.getElementById('currency-select');
const incomeTypeSelect = document.getElementById('income-type');
const incomeAmountInput = document.getElementById('income-amount');
const panStatusGroup = document.getElementById('pan-status-group');
const panStatusSelect = document.getElementById('pan-status');
const annualSalaryGroup = document.getElementById('annual-salary-group');
const annualSalaryInput = document.getElementById('annual-salary');
const rentPeriodGroup = document.getElementById('rent-period-group');
const rentPeriodInput = document.getElementById('rent-period');

const currencySymbolAmount = document.getElementById('currency-symbol-amount');
const currencySymbolSalary = document.getElementById('currency-symbol-salary');
const currencySymbolRent = document.getElementById('currency-symbol-rent');


const tdsRateResult = document.getElementById('tds-rate-result');
const tdsAmountResult = document.getElementById('tds-amount-result');
const netPayableResult = document.getElementById('net-payable-result');
const tdsInfoDiv = document.getElementById('tds-info');

// Event Listeners for inputs
currencySelect.addEventListener('change', updateCurrencySymbolAndCalculate);
incomeTypeSelect.addEventListener('change', updateVisibilityAndCalculate);
incomeAmountInput.addEventListener('input', calculateTDS);
panStatusSelect.addEventListener('change', calculateTDS);
annualSalaryInput.addEventListener('input', calculateTDS);
rentPeriodInput.addEventListener('input', calculateTDS);


// Initial calculation on page load
window.onload = function() {
    updateCurrencySymbolAndCalculate(); // Initialize currency symbol and then calculate
};

/**
 * Updates the displayed currency symbol based on the selected currency.
 */
function updateCurrencySymbol() {
    const selectedCurrency = currencySelect.value;
    let symbol = '';
    switch (selectedCurrency) {
        case 'INR':
            symbol = '₹';
            break;
        case 'USD':
            symbol = '$';
            break;
        case 'EUR':
            symbol = '€';
            break;
        case 'GBP':
            symbol = '£';
            break;
        case 'JPY':
            symbol = '¥';
            break;
        default:
            symbol = ''; // Default to empty if no symbol found
    }
    currencySymbolAmount.textContent = symbol;
    currencySymbolSalary.textContent = symbol;
    currencySymbolRent.textContent = symbol;
}


/**
 * Formats a number as currency based on the selected currency.
 * @param {number} amount The number to format.
 * @param {string} currencyCode The 3-letter currency code (e.g., 'INR', 'USD').
 * @returns {string} The formatted currency string.
 */
function formatCurrency(amount, currencyCode) {
    let locale = 'en-US'; // Default locale
    switch (currencyCode) {
        case 'INR':
            locale = 'en-IN';
            break;
        case 'EUR':
            locale = 'de-DE'; // Example locale for Euro
            break;
        case 'GBP':
            locale = 'en-GB';
            break;
        case 'JPY':
            locale = 'ja-JP';
            break;
        // For USD, 'en-US' is fine as default
    }
    
    return new Intl.NumberFormat(locale, {
        style: 'currency',
        currency: currencyCode,
        minimumFractionDigits: (currencyCode === 'JPY' ? 0 : 2), // JPY typically has no decimals
        maximumFractionDigits: (currencyCode === 'JPY' ? 0 : 2)
    }).format(amount);
}

/**
 * Updates visibility of input fields based on selected income type.
 * Then triggers TDS calculation.
 */
function updateVisibilityAndCalculate() {
    const incomeType = incomeTypeSelect.value;

    // Reset display for all specific input groups
    panStatusGroup.style.display = 'none';
    annualSalaryGroup.style.display = 'none';
    rentPeriodGroup.style.display = 'none';
    
    // Always show amount input for now, but can be hidden if specific sections don't need it
    document.getElementById('amount-group').style.display = 'block'; 
    incomeAmountInput.value = 50000; // Reset for consistency

    // Update visibility based on selected type
    switch (incomeType) {
        case 'salary':
            annualSalaryGroup.style.display = 'block';
            incomeAmountInput.value = ''; // Amount not directly used for rate
            document.getElementById('amount-group').style.display = 'none';
            break;
        case 'interest':
        case 'contractor':
        case 'professional':
        case 'commission':
            panStatusGroup.style.display = 'block';
            break;
        case 'rent':
            panStatusGroup.style.display = 'block'; // For 194I
            rentPeriodGroup.style.display = 'block'; // For 194IB
            break;
    }
    calculateTDS();
}

/**
 * Updates the currency symbol and then re-calculates TDS.
 */
function updateCurrencySymbolAndCalculate() {
    updateCurrencySymbol();
    calculateTDS();
}


/**
 * Calculates TDS based on selected income type and inputs.
 */
function calculateTDS() {
    const selectedCurrency = currencySelect.value;
    const incomeType = incomeTypeSelect.value;
    const incomeAmount = parseFloat(incomeAmountInput.value) || 0;
    const panStatus = panStatusSelect.value;
    const annualSalary = parseFloat(annualSalaryInput.value) || 0;
    const rentPeriod = parseInt(rentPeriodInput.value) || 0;


    let tdsRate = 0;
    let tdsAmount = 0;
    let netPayable = 0;
    let infoText = '';

    const isPanAvailable = (panStatus === 'yes');

    switch (incomeType) {
        case 'salary':
            // Simplified salary TDS calculation (needs actual tax slab logic for accuracy)
            // This is a placeholder. Real salary TDS is complex.
            if (annualSalary > 700000) { // New tax regime limit for no tax
                tdsRate = 5; // Placeholder for a very basic slab estimate
                // For actual salary, you'd calculate full tax, divide by months, consider exemptions etc.
                // Here, let's just apply a rate to estimated monthly income for demonstration.
                let monthlyTaxableSalary = annualSalary / 12;
                tdsAmount = monthlyTaxableSalary * (tdsRate / 100);
                infoText = `TDS on Salary (Section 192) is based on individual tax slabs. This is a simplified estimate. Actual calculation depends on full income, deductions, and tax regime chosen. For an annual salary of ${formatCurrency(annualSalary, selectedCurrency)}, an estimated TDS rate of ${tdsRate}% is applied monthly.`;
            } else {
                tdsRate = 0;
                tdsAmount = 0;
                infoText = `No TDS usually for annual taxable salary up to ${formatCurrency(700000, selectedCurrency)} under the new tax regime (or based on old regime deductions).`;
            }
            // For salary, net payable isn't just incomeAmount - tdsAmount. It's the gross monthly salary minus TDS.
            // Since we don't have gross monthly salary as input, we'll indicate it.
            netPayable = "Varies based on full tax liability"; 
            break;

        case 'interest': // Section 194A
            const interestThresholdBank = 40000;
            const interestThresholdOther = 5000;
            if (incomeAmount <= interestThresholdBank) { // Assuming bank/post office/co-op for higher limit
                tdsRate = 0;
                infoText = `No TDS if interest payment is up to ${formatCurrency(interestThresholdBank, selectedCurrency)}.`;
            } else {
                tdsRate = isPanAvailable ? 10 : 20;
                infoText = `TDS for Interest (Section 194A). Threshold: ${formatCurrency(interestThresholdBank, selectedCurrency)}.`;
            }
            tdsAmount = incomeAmount * (tdsRate / 100);
            netPayable = incomeAmount - tdsAmount;
            break;

        case 'contractor': // Section 194C
            const contractorSingleThreshold = 30000;
            const contractorAggregateThreshold = 100000; // Simplified, not checking aggregate
            if (incomeAmount <= contractorSingleThreshold) {
                tdsRate = 0;
                infoText = `No TDS if single payment to contractor is up to ${formatCurrency(contractorSingleThreshold, selectedCurrency)}.`;
            } else {
                tdsRate = isPanAvailable ? (incomeAmount > 100000 ? 2 : 1) : 20; // Simplified rate logic
                infoText = `TDS for Payment to Contractors (Section 194C). Rates: 1% (Individual/HUF), 2% (Others). Threshold: Single payment > ${formatCurrency(contractorSingleThreshold, selectedCurrency)} or aggregate > ${formatCurrency(contractorAggregateThreshold, selectedCurrency)}.`;
            }
            tdsAmount = incomeAmount * (tdsRate / 100);
            netPayable = incomeAmount - tdsAmount;
            break;

        case 'professional': // Section 194J
            const professionalThreshold = 30000;
            if (incomeAmount <= professionalThreshold) {
                tdsRate = 0;
                infoText = `No TDS if payment for professional/technical services is up to ${formatCurrency(professionalThreshold, selectedCurrency)}.`;
            } else {
                tdsRate = isPanAvailable ? 10 : 20;
                infoText = `TDS for Professional/Technical Services (Section 194J). Rate: 10%. Threshold: ${formatCurrency(professionalThreshold, selectedCurrency)}.`;
            }
            tdsAmount = incomeAmount * (tdsRate / 100);
            netPayable = incomeAmount - tdsAmount;
            break;

        case 'rent': // Section 194IB (for > 50k/month) or 194I (for others)
            const annualRent = incomeAmount * rentPeriod;
            const rentIBThresholdMonthly = 50000;
            const rentIThresholdAnnual = 240000;

            if (incomeAmount > rentIBThresholdMonthly) { // Section 194IB for individuals/HUFs (simplified)
                tdsRate = isPanAvailable ? 5 : 20;
                // For 194IB, TDS is deducted once a year or at the end of tenancy, 
                // not monthly. Max TDS is for 12 months or till tenancy ends.
                tdsAmount = Math.min(annualRent * (tdsRate / 100), incomeAmount * (tdsRate / 100)); // Max TDS is principal amount * rate
                // Note: Actual 194IB calculation is complex, often capped at the last month's rent.
                infoText = `TDS for Rent paid by Individuals/HUFs (Section 194IB) if monthly rent exceeds ${formatCurrency(rentIBThresholdMonthly, selectedCurrency)}. Rate: 5%. If PAN not provided, 20% (capped at rent amount). This calculator assumes annual rent for calculation.`;
                netPayable = incomeAmount - (tdsAmount / rentPeriod); // Representing monthly net
            } else if (annualRent > rentIThresholdAnnual) { // Section 194I for other cases (simplified)
                 tdsRate = isPanAvailable ? 10 : 20;
                 tdsAmount = annualRent * (tdsRate / 100);
                 infoText = `TDS for Rent (Section 194I) if annual rent exceeds ${formatCurrency(rentIThresholdAnnual, selectedCurrency)}. Rate: 10%.`;
                 netPayable = incomeAmount - (tdsAmount / rentPeriod); // Representing monthly net
            }
            else {
                tdsRate = 0;
                tdsAmount = 0;
                infoText = `No TDS for rent if monthly rent is up to ${formatCurrency(rentIBThresholdMonthly, selectedCurrency)} (for individuals/HUFs under 194IB) or annual rent is up to ${formatCurrency(rentIThresholdAnnual, selectedCurrency)} (under 194I).`;
                netPayable = incomeAmount;
            }
            
            break;

        case 'commission': // Section 194H
            const commissionThreshold = 15000;
            if (incomeAmount <= commissionThreshold) {
                tdsRate = 0;
                infoText = `No TDS if commission/brokerage payment is up to ${formatCurrency(commissionThreshold, selectedCurrency)}.`;
            } else {
                tdsRate = isPanAvailable ? 5 : 20;
                infoText = `TDS for Commission or Brokerage (Section 194H). Rate: 5%. Threshold: ${formatCurrency(commissionThreshold, selectedCurrency)}.`;
            }
            tdsAmount = incomeAmount * (tdsRate / 100);
            netPayable = incomeAmount - tdsAmount;
            break;
    }

    // Adjust for higher rate if PAN not available, unless it's salary (handled internally)
    if (!isPanAvailable && incomeType !== 'salary' && tdsRate !== 0) {
        tdsRateResult.classList.add('text-danger'); // Highlight higher rate
        tdsRateResult.classList.remove('text-primary');
        if (tdsRate < 20) tdsRate = 20; // Default higher rate if no PAN is 20% or specified higher rate
        tdsAmount = incomeAmount * (tdsRate / 100);
        netPayable = incomeAmount - tdsAmount;
        infoText += ` <strong>NOTE: Higher TDS rate of ${tdsRate}% applied as PAN is not available.</strong>`;
    } else {
        tdsRateResult.classList.remove('text-danger');
        tdsRateResult.classList.add('text-primary');
    }


    tdsRateResult.textContent = `${tdsRate}%`;
    tdsAmountResult.textContent = formatCurrency(tdsAmount, selectedCurrency);
    netPayableResult.textContent = (typeof netPayable === 'string') ? netPayable : formatCurrency(netPayable, selectedCurrency);
    tdsInfoDiv.innerHTML = infoText; // Use innerHTML as it contains strong tags for emphasis
}
</script>

<?php include '../../includes/footer.php'; ?>