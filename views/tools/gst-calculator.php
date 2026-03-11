<?php
// SEO and Page Metadata
$page_title = "GST Calculator"; // You may Change the Title here
$page_description = "GST Calculator online."; // Put your Description here
$page_keywords = "GST calculator, goods and services tax, tax calculator, GST India, add GST, remove GST, calculate GST";

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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">GST Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Effortlessly add or remove GST from any amount with precise calculations.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Calculate GST</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="original-amount" class="form-label mb-1">Amount</label>
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
                                            <input type="number" id="original-amount" class="form-control form-control-sm text-end" placeholder="Enter amount" value="25000">
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label for="gst-rate" class="form-label mb-1">GST Rate (%)</label>
                                    <select id="gst-rate" class="form-select">
                                        <option value="5">5%</option>
                                        <option value="12">12%</option>
                                        <option value="18" selected>18%</option>
                                        <option value="28">28%</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="form-label mb-2">Calculation Type</label>
                                    <div class="d-flex gap-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="calc-type" id="add-gst" value="add" checked>
                                            <label class="form-check-label" for="add-gst">
                                                Add GST
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="calc-type" id="remove-gst" value="remove">
                                            <label class="form-check-label" for="remove-gst">
                                                Remove GST
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-100 mb-4 text-center">
                            <p class="h5 text-gray-600">GST Amount</p>
                            <p id="gst-amount-result" class="display-6 fw-bold text-primary mb-3">0</p>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Net Amount / Gross Amount</p>
                            <p id="final-amount-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500" id="subtotal-label">Net Amount</p>
                                    <p id="subtotal-result" class="h4 fw-semibold text-gray-800">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500" id="total-label">Gross Amount</p>
                                    <p id="total-result" class="h4 fw-semibold text-gray-800">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    
        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">GST Rate Information</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">GST Rate</th>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Applicability</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">0%</td>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Certain essential goods and services (e.g., specific food grains, certain health services, religious services).</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">5%</td>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Commonly used goods and services (e.g., packaged food items, certain medicines, essential services, transport services).</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">12%</td>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Processed food items, certain textile products, some services (e.g., non-AC restaurants, specified construction services).</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">18%</td>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Most goods and services (e.g., financial services, telecom services, IT services, branded garments, industrial intermediaries).</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">28%</td>
                                <td class="py-2 px-4 border-b text-left text-sm text-gray-800">Luxury goods, sin goods, and certain services (e.g., automobiles, aerated drinks, tobacco products, cinema tickets, gambling).</td>
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
                <?php include '../../views/content/gst-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for GST Calculator

// Get DOM elements
const originalAmountInput = document.getElementById('original-amount');
const gstRateSelect = document.getElementById('gst-rate');
const addGSTRadio = document.getElementById('add-gst');
const removeGSTRadio = document.getElementById('remove-gst');
const currencySelect = document.getElementById('currency-select'); //

const gstAmountResult = document.getElementById('gst-amount-result');
const finalAmountResult = document.getElementById('final-amount-result');
const subtotalLabel = document.getElementById('subtotal-label');
const subtotalResult = document.getElementById('subtotal-result');
const totalLabel = document.getElementById('total-label');
const totalResult = document.getElementById('total-result');


// Event Listeners for inputs
originalAmountInput.addEventListener('input', updateCalculator);
gstRateSelect.addEventListener('change', updateCalculator);
addGSTRadio.addEventListener('change', updateCalculator);
removeGSTRadio.addEventListener('change', updateCalculator);
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
    return new Intl.NumberFormat('en-IN', { // 'en-IN' locale is good for number formatting, currency symbol changes with 'currency' option
        style: 'currency',
        currency: selectedCurrency, //
        minimumFractionDigits: 2, // Keep two decimal places for currency
        maximumFractionDigits: 2
    }).format(amount);
}

/**
 * Updates the calculator based on user input.
 */
function updateCalculator() {
    const amount = parseFloat(originalAmountInput.value);
    const gstRate = parseFloat(gstRateSelect.value);
    const isAddingGST = addGSTRadio.checked;

    if (isNaN(amount) || amount < 0) {
        gstAmountResult.textContent = formatCurrency(0);
        finalAmountResult.textContent = formatCurrency(0);
        subtotalResult.textContent = formatCurrency(0);
        totalResult.textContent = formatCurrency(0);
        return;
    }

    let gstAmount = 0;
    let netAmount = 0;
    let grossAmount = 0;

    if (isAddingGST) {
        // Add GST
        gstAmount = amount * (gstRate / 100);
        grossAmount = amount + gstAmount;
        netAmount = amount;

        subtotalLabel.textContent = 'Net Amount';
        totalLabel.textContent = 'Gross Amount';
        finalAmountResult.textContent = formatCurrency(grossAmount);

    } else {
        // Remove GST
        netAmount = amount / (1 + (gstRate / 100));
        gstAmount = amount - netAmount;
        grossAmount = amount;

        subtotalLabel.textContent = 'Original Amount';
        totalLabel.textContent = 'Gross Amount';
        finalAmountResult.textContent = formatCurrency(netAmount);
    }

    gstAmountResult.textContent = formatCurrency(gstAmount);
    subtotalResult.textContent = formatCurrency(netAmount);
    totalResult.textContent = formatCurrency(grossAmount);
}
</script>

<?php include '../../includes/footer.php'; ?>