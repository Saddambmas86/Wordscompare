<?php
// SEO and Page Metadata
$page_title = "Discount Calculator - Calculate Sale Price & Savings Online"; // You may Change the Title here
$page_description = "Free discount calculator online. Calculate sale price, discount amount, and savings percentage instantly. Perfect for shopping, retail pricing, and deals."; // Put your Description here
$page_keywords = "discount calculator, calculator, online calculator, free math tools, age calculator, bmi calculator, conversion calculator, wordscompare";

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

        <div class="col-lg-7 border shadow-sm">
            <div class="tool-container rounded-3 p-4 p-md-5">
                <header class="text-center mb-4">
                    <h1 class="h2">Discount Calculator <i class="fas fa-tags text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Quickly calculate discounted prices and savings.</p>
                </header>

                <ul class="nav nav-tabs mb-4" id="myDiscountTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="sale-price-tab" data-bs-toggle="tab" data-bs-target="#sale-price-pane" type="button" role="tab" aria-controls="sale-price-pane" aria-selected="true">Calculate Sale Price</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="original-price-tab" data-bs-toggle="tab" data-bs-target="#original-price-pane" type="button" role="tab" aria-controls="original-price-pane" aria-selected="false">Find Original Price</button>
                    </li>
                </ul>

                <div class="tab-content" id="myDiscountTabContent">
                    <div class="tab-pane fade show active" id="sale-price-pane" role="tabpanel" aria-labelledby="sale-price-tab">
                        <div class="options-card card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="fas fa-calculator me-2"></i>Calculation Settings</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="originalPrice" class="form-label">Original Price</label>
                                        <div class="input-group">
                                            <select id="currency-select-sale" class="form-select flex-grow-0" style="width: auto;">
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
                                            <input type="number" class="form-control" id="originalPrice" placeholder="e.g., 100" min="0" step="0.01">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="discountPercentage" class="form-label">Discount Percentage (%)</label>
                                        <input type="number" class="form-control" id="discountPercentage" placeholder="e.g., 20" min="0" max="100" step="0.1">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                            <button class="btn btn-danger btn-md px-4" id="calculateBtn">
                                <i class="fas fa-bolt me-2"></i> Calculate
                            </button>
                            <button class="btn btn-primary btn-md px-4" id="howToBtn">
                                <i class="fas fa-question-circle me-2"></i> How To
                            </button>
                            <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                                <i class="fas fa-redo me-2"></i> Reset
                            </button>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="original-price-pane" role="tabpanel" aria-labelledby="original-price-tab">
                        <div class="options-card card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0"><i class="fas fa-calculator me-2"></i>Calculation Settings</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="salePrice" class="form-label">Sale Price</label>
                                        <div class="input-group">
                                            <select id="currency-select-original" class="form-select flex-grow-0" style="width: auto;">
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
                                            <input type="number" class="form-control" id="salePrice" placeholder="e.g., 80" min="0" step="0.01">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="discountPercentageOriginal" class="form-label">Discount Percentage (%)</label>
                                        <input type="number" class="form-control" id="discountPercentageOriginal" placeholder="e.g., 20" min="0" max="100" step="0.1">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                            <button class="btn btn-danger btn-md px-4" id="calculateOriginalBtn">
                                <i class="fas fa-bolt me-2"></i> Calculate Original
                            </button>
                            <button class="btn btn-primary btn-md px-4" id="howToOriginalBtn">
                                <i class="fas fa-question-circle me-2"></i> How To
                            </button>
                            <button class="btn btn-secondary btn-md px-2" id="resetOriginalBtn">
                                <i class="fas fa-redo me-2"></i> Reset
                            </button>
                        </div>
                    </div>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="preview-area card mt-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-money-bill-wave me-2"></i>Results</h5>
                        <span class="badge bg-info" id="resultStatus">Enter Values</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="m-0 p-3 bg-light" id="calculationOutput" style="min-height: 120px; max-height: 400px; overflow: auto;">
                            <div class="text-center text-muted">Your calculation results will appear here</div>
                        </div>
                    </div>
                </div>

                <div class="history-area card mt-4" id="historyContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Calculation History (Last 10)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="historyTable">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th>Original Price</th>
                                        <th>Discount %</th>
                                        <th>Discounted Price</th>
                                        <th>Savings</th>
                                        <th>Date</th>
                                        <th width="15%" class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="historyList"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
                <?php include '../../views/content/discount-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Discount Calculator
let calculationHistory = JSON.parse(localStorage.getItem('discountHistory')) || [];

// Initialize elements for "Calculate Sale Price" tab
const originalPriceInput = document.getElementById('originalPrice');
const discountPercentageInput = document.getElementById('discountPercentage');
const calculateBtn = document.getElementById('calculateBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const currencySelectSale = document.getElementById('currency-select-sale'); // New currency select for sale price tab

// Initialize elements for "Find Original Price" tab (New)
const salePriceInput = document.getElementById('salePrice');
const discountPercentageOriginalInput = document.getElementById('discountPercentageOriginal');
const calculateOriginalBtn = document.getElementById('calculateOriginalBtn');
const howToOriginalBtn = document.getElementById('howToOriginalBtn');
const resetOriginalBtn = document.getElementById('resetOriginalBtn');
const currencySelectOriginal = document.getElementById('currency-select-original'); // New currency select for original price tab

// Common elements
const calculationOutput = document.getElementById('calculationOutput');
const statusArea = document.getElementById('statusArea');
const resultStatusBadge = document.getElementById('resultStatus');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

// Event Listeners for "Calculate Sale Price"
calculateBtn.addEventListener('click', calculateDiscount);
howToBtn.addEventListener('click', showHowToSalePrice);
resetBtn.addEventListener('click', resetSalePrice);
currencySelectSale.addEventListener('change', calculateDiscount); // Add event listener for currency select


// Event Listeners for "Find Original Price" (New)
calculateOriginalBtn.addEventListener('click', calculateOriginalPrice);
howToOriginalBtn.addEventListener('click', showHowToOriginalPrice);
resetOriginalBtn.addEventListener('click', resetOriginalPrice);
currencySelectOriginal.addEventListener('change', calculateOriginalPrice); // Add event listener for currency select


// Initialize history display
displayHistory();

// How To Button for "Calculate Sale Price"
function showHowToSalePrice() {
    Swal.fire({
        title: 'How to Calculate Sale Price',
        html: `Follow these steps:<br><br>
        <ol class="text-start">
            <li>Enter the "Original Price" of the item.</li>
            <li>Enter the "Discount Percentage" you want to apply.</li>
            <li>Click "Calculate" to see the discounted price and savings.</li>
            <li>Your recent calculations will be saved in the history.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// How To Button for "Find Original Price" (New)
function showHowToOriginalPrice() {
    Swal.fire({
        title: 'How to Find Original Price',
        html: `Follow these steps:<br><br>
        <ol class="text-start">
            <li>Enter the "Sale Price" (the price after discount).</li>
            <li>Enter the "Discount Percentage" that was applied.</li>
            <li>Click "Calculate Original" to find the original price before discount.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

/**
 * Formats a number as currency based on the selected currency for the sale price tab.
 * @param {number} amount The number to format.
 * @returns {string} The formatted currency string.
 */
function formatCurrencySale(amount) {
    const selectedCurrency = currencySelectSale.value;
    return new Intl.NumberFormat('en-IN', { // 'en-IN' locale is good for number formatting, currency symbol changes with 'currency' option
        style: 'currency',
        currency: selectedCurrency,
        minimumFractionDigits: 2, // Always show two decimal places for currency
        maximumFractionDigits: 2
    }).format(amount);
}

/**
 * Formats a number as currency based on the selected currency for the original price tab.
 * @param {number} amount The number to format.
 * @returns {string} The formatted currency string.
 */
function formatCurrencyOriginal(amount) {
    const selectedCurrency = currencySelectOriginal.value;
    return new Intl.NumberFormat('en-IN', { // 'en-IN' locale is good for number formatting, currency symbol changes with 'currency' option
        style: 'currency',
        currency: selectedCurrency,
        minimumFractionDigits: 2, // Always show two decimal places for currency
        maximumFractionDigits: 2
    }).format(amount);
}


// Reset Button for "Calculate Sale Price"
function resetSalePrice() {
    originalPriceInput.value = '';
    discountPercentageInput.value = '';
    currencySelectSale.value = 'INR'; // Reset currency to default

    calculationOutput.innerHTML = '<div class="text-center text-muted">Your calculation results will appear here</div>';
    statusArea.textContent = '';
    resultStatusBadge.textContent = 'Enter Values';
    resultStatusBadge.className = 'badge bg-info';
}

// Reset Button for "Find Original Price" (New)
function resetOriginalPrice() {
    salePriceInput.value = '';
    discountPercentageOriginalInput.value = '';
    currencySelectOriginal.value = 'INR'; // Reset currency to default

    calculationOutput.innerHTML = '<div class="text-center text-muted">Your calculation results will appear here</div>';
    statusArea.textContent = '';
    resultStatusBadge.textContent = 'Enter Values';
    resultStatusBadge.className = 'badge bg-info';
}


// Calculate Discount (existing function)
function calculateDiscount() {
    const originalPrice = parseFloat(originalPriceInput.value);
    const discountPercentage = parseFloat(discountPercentageInput.value);

    // Validate inputs
    if (isNaN(originalPrice) || originalPrice < 0) {
        showError('Please enter a valid positive number for Original Price.');
        Swal.fire({
            title: 'Error',
            text: 'Please enter a valid positive number for Original Price.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (isNaN(discountPercentage) || discountPercentage < 0 || discountPercentage > 100) {
        showError('Please enter a valid discount percentage between 0 and 100.');
        Swal.fire({
            title: 'Error',
            text: 'Please enter a valid discount percentage between 0 and 100.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    const discountAmount = originalPrice * (discountPercentage / 100);
    const finalPrice = originalPrice - discountAmount;

    // Format for display using the new formatCurrencySale function
    const formattedOriginalPrice = formatCurrencySale(originalPrice);
    const formattedDiscountPercentage = discountPercentage.toFixed(1);
    const formattedDiscountAmount = formatCurrencySale(discountAmount);
    const formattedFinalPrice = formatCurrencySale(finalPrice);

    // Update UI
    calculationOutput.innerHTML = `
        <div class="result-item p-2 mb-2 bg-white rounded shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <strong>Original Price:</strong> <span>${formattedOriginalPrice}</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-1">
                <strong>Discount:</strong> <span>${formattedDiscountPercentage}%</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-1 text-danger">
                <strong>You Save:</strong> <span>${formattedDiscountAmount}</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-1 text-success fw-bold fs-5">
                <strong>Final Price:</strong> <span>${formattedFinalPrice}</span>
            </div>
            <div class="text-end mt-2">
                <button class="btn btn-sm btn-outline-secondary copy-result"
                        data-original-raw="${originalPrice.toFixed(2)}"
                        data-discount-percent="${formattedDiscountPercentage}"
                        data-discount-amount-raw="${discountAmount.toFixed(2)}"
                        data-final-price-raw="${finalPrice.toFixed(2)}"
                        data-currency="${currencySelectSale.value}">
                    <i class="fas fa-copy"></i> Copy Details
                </button>
            </div>
        </div>
    `;

    // Add copy event listener to the "Copy Details" button
    document.querySelector('.copy-result').addEventListener('click', (e) => {
        const originalRaw = e.currentTarget.getAttribute('data-original-raw');
        const discountPercent = e.currentTarget.getAttribute('data-discount-percent');
        const discountAmountRaw = e.currentTarget.getAttribute('data-discount-amount-raw');
        const finalRaw = e.currentTarget.getAttribute('data-final-price-raw');
        const currency = e.currentTarget.getAttribute('data-currency');

        const textToCopy = `Original Price: ${new Intl.NumberFormat('en-IN', { style: 'currency', currency: currency, minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(originalRaw)}\nDiscount: ${discountPercent}%\nSavings: ${new Intl.NumberFormat('en-IN', { style: 'currency', currency: currency, minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(discountAmountRaw)}\nFinal Price: ${new Intl.NumberFormat('en-IN', { style: 'currency', currency: currency, minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(finalRaw)}`;
        copyToClipboard(textToCopy);
        showStatus('Calculation details copied to clipboard!', 'success');
        Swal.fire({
            title: 'Copied!',
            text: 'Calculation details have been copied to your clipboard.',
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    });

    resultStatusBadge.textContent = 'Calculated!';
    resultStatusBadge.className = 'badge bg-success';
    showStatus('Calculation complete!', 'success');

    // Add to history
    addToHistory(originalPrice, discountPercentage, finalPrice, discountAmount, currencySelectSale.value); // Pass currency to history

    Swal.fire({
        title: 'Calculation Complete!',
        text: 'The discounted price and savings have been calculated.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// Calculate Original Price (New function)
function calculateOriginalPrice() {
    const salePrice = parseFloat(salePriceInput.value);
    const discountPercentage = parseFloat(discountPercentageOriginalInput.value);

    // Validate inputs
    if (isNaN(salePrice) || salePrice < 0) {
        showError('Please enter a valid positive number for Sale Price.');
        Swal.fire({
            title: 'Error',
            text: 'Please enter a valid positive number for Sale Price.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (isNaN(discountPercentage) || discountPercentage < 0 || discountPercentage >= 100) { // Discount cannot be 100% or more
        showError('Please enter a valid discount percentage between 0 and 99.9.');
        Swal.fire({
            title: 'Error',
            text: 'Please enter a valid discount percentage between 0 and 99.9.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    const originalPrice = salePrice / (1 - discountPercentage / 100);
    const discountAmount = originalPrice - salePrice;

    // Format for display using the new formatCurrencyOriginal function
    const formattedOriginalPrice = formatCurrencyOriginal(originalPrice);
    const formattedDiscountPercentage = discountPercentage.toFixed(1);
    const formattedSalePrice = formatCurrencyOriginal(salePrice);
    const formattedDiscountAmount = formatCurrencyOriginal(discountAmount);

    // Update UI
    calculationOutput.innerHTML = `
        <div class="result-item p-2 mb-2 bg-white rounded shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-1 text-success fw-bold fs-5">
                <strong>Original Price:</strong> <span>${formattedOriginalPrice}</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-1">
                <strong>Discount:</strong> <span>${formattedDiscountPercentage}%</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-1">
                <strong>Sale Price:</strong> <span>${formattedSalePrice}</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-1 text-info">
                <strong>Discount Amount:</strong> <span>${formattedDiscountAmount}</span>
            </div>
            <div class="text-end mt-2">
                <button class="btn btn-sm btn-outline-secondary copy-result"
                        data-original-raw="${originalPrice.toFixed(2)}"
                        data-discount-percent="${formattedDiscountPercentage}"
                        data-sale-price-raw="${salePrice.toFixed(2)}"
                        data-discount-amount-raw="${discountAmount.toFixed(2)}"
                        data-currency="${currencySelectOriginal.value}">
                    <i class="fas fa-copy"></i> Copy Details
                </button>
            </div>
        </div>
    `;

    document.querySelector('.copy-result').addEventListener('click', (e) => {
        const originalRaw = e.currentTarget.getAttribute('data-original-raw');
        const discountPercent = e.currentTarget.getAttribute('data-discount-percent');
        const saleRaw = e.currentTarget.getAttribute('data-sale-price-raw');
        const discountAmountRaw = e.currentTarget.getAttribute('data-discount-amount-raw');
        const currency = e.currentTarget.getAttribute('data-currency');

        const textToCopy = `Original Price: ${new Intl.NumberFormat('en-IN', { style: 'currency', currency: currency, minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(originalRaw)}\nDiscount: ${discountPercent}%\nSale Price: ${new Intl.NumberFormat('en-IN', { style: 'currency', currency: currency, minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(saleRaw)}\nDiscount Amount: ${new Intl.NumberFormat('en-IN', { style: 'currency', currency: currency, minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(discountAmountRaw)}`;
        copyToClipboard(textToCopy);
        showStatus('Calculation details copied to clipboard!', 'success');
        Swal.fire({
            title: 'Copied!',
            text: 'Calculation details have been copied to your clipboard.',
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    });

    resultStatusBadge.textContent = 'Calculated!';
    resultStatusBadge.className = 'badge bg-success';
    showStatus('Calculation complete!', 'success');

    // Add to history (you might want a separate history or adapt this one)
    addToHistory(originalPrice, discountPercentage, salePrice, discountAmount, currencySelectOriginal.value); // Store original, discount%, final, and savings/discount amount

    Swal.fire({
        title: 'Calculation Complete!',
        text: 'The original price has been calculated.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}


// Helper function to copy text to clipboard
function copyToClipboard(text) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    textarea.style.position = 'fixed';
    document.body.appendChild(textarea);
    textarea.select();

    try {
        document.execCommand('copy');
    } catch (err) {
        console.error('Failed to copy text: ', err);
    }

    document.body.removeChild(textarea);
}

// History Functions
function addToHistory(originalPrice, discountPercentage, finalOrSalePrice, savingsOrDiscountAmount, currency) { // Added currency parameter
    const historyItem = {
        id: Date.now(),
        originalPrice: originalPrice.toFixed(2),
        discountPercentage: discountPercentage.toFixed(1),
        finalOrSalePrice: finalOrSalePrice.toFixed(2), // Renamed for clarity for both modes
        savingsOrDiscountAmount: savingsOrDiscountAmount.toFixed(2), // Renamed for clarity for both modes
        currency: currency, // Store currency
        date: new Date().toLocaleString()
    };

    calculationHistory.unshift(historyItem);
    if (calculationHistory.length > 10) {
        calculationHistory.pop();
    }

    localStorage.setItem('discountHistory', JSON.stringify(calculationHistory));
    displayHistory();
}

function displayHistory() {
    if (calculationHistory.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    historyList.innerHTML = '';
    calculationHistory.forEach(item => {
        const tr = document.createElement('tr');

        // Use formatCurrency for displaying historical values
        const formattedOriginal = new Intl.NumberFormat('en-IN', { style: 'currency', currency: item.currency, minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(item.originalPrice);
        const formattedFinalOrSale = new Intl.NumberFormat('en-IN', { style: 'currency', currency: item.currency, minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(item.finalOrSalePrice);
        const formattedSavingsOrDiscount = new Intl.NumberFormat('en-IN', { style: 'currency', currency: item.currency, minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(item.savingsOrDiscountAmount);


        tr.innerHTML = `
            <td>
                <button class="btn btn-sm btn-outline-danger delete-history" data-id="${item.id}" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
            <td>${formattedOriginal}</td>
            <td>${item.discountPercentage}%</td>
            <td>${formattedFinalOrSale}</td>
            <td>${formattedSavingsOrDiscount}</td>
            <td>${item.date}</td>
            <td class="text-end">
                <button class="btn btn-sm btn-outline-secondary copy-history" data-id="${item.id}" title="Copy">
                    <i class="fas fa-copy"></i>
                </button>
            </td>
        `;
        historyList.appendChild(tr);
    });

    // Add event listeners for history actions
    document.querySelectorAll('.delete-history').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            deleteHistoryItem(id);
        });
    });

    document.querySelectorAll('.copy-history').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            copyHistoryItem(id);
        });
    });

    historyContainer.style.display = 'block';
}

function deleteHistoryItem(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to recover this calculation!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            calculationHistory = calculationHistory.filter(item => item.id !== id);
            localStorage.setItem('discountHistory', JSON.stringify(calculationHistory));
            displayHistory();
            Swal.fire(
                'Deleted!',
                'Your calculation has been deleted.',
                'success'
            );
        }
    });
}

function copyHistoryItem(id) {
    const item = calculationHistory.find(item => item.id === id);
    if (!item) return;

    // Use stored currency for copying
    const formattedOriginal = new Intl.NumberFormat('en-IN', { style: 'currency', currency: item.currency, minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(item.originalPrice);
    const formattedFinalOrSale = new Intl.NumberFormat('en-IN', { style: 'currency', currency: item.currency, minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(item.finalOrSalePrice);
    const formattedSavingsOrDiscount = new Intl.NumberFormat('en-IN', { style: 'currency', currency: item.currency, minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(item.savingsOrDiscountAmount);


    const textToCopy = `Original Price: ${formattedOriginal}\nDiscount: ${item.discountPercentage}%\nSavings: ${formattedSavingsOrDiscount}\nFinal Price: ${formattedFinalOrSale}`;
    copyToClipboard(textToCopy);
    showStatus('Calculation details copied to clipboard!', 'success');

    Swal.fire({
        title: 'Copied!',
        text: 'Calculation details have been copied to your clipboard.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// Helper Functions
function showStatus(message, type) {
    statusArea.textContent = message;
    statusArea.className = `text-center text-${type}`;
}

function showError(message) {
    showStatus(message, 'danger');
}
</script>

<?php include '../../includes/footer.php'; ?>