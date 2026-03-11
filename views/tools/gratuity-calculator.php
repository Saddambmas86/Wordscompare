<?php
// SEO and Page Metadata
$page_title = "Gratuity Calculator - Calculate Gratuity Amount Online Free"; // You may Change the Title here
$page_description = "Free gratuity calculator online. Calculate your gratuity amount based on years of service and last drawn salary. Know your end-of-service benefits instantly."; // Put your Description here
$page_keywords = "gratuity calculator - calculate gratuity amount, gratuity, calculator, calculate, amount, free online tools, pdf tools";

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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">Gratuity Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Estimate your gratuity amount based on your last drawn salary and years of service.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Gratuity Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="last-drawn-salary" class="form-label mb-1">Last Drawn Basic + DA (Monthly)</label>
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
                                            <span class="h5 fw-semibold text-primary"><span id="last-drawn-salary-text">50,000</span></span>
                                        </div>
                                    </div>
                                    <input type="range" id="last-drawn-salary" min="10000" max="500000" step="1000" value="50000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="years-of-service" class="form-label mb-1">Years of Service</label>
                                        <span class="h5 fw-semibold text-primary"><span id="years-of-service-text">10</span> Years</span>
                                    </div>
                                    <input type="range" id="years-of-service" min="1" max="50" step="1" value="10" class="form-range mt-2">
                                    <small class="text-muted d-block mt-1">Minimum 5 years of service required for gratuity.</small>
                                </div>

                                <div>
                                    <label for="covered-by-act" class="form-label mb-1">Company Covered under Gratuity Act?</label>
                                    <select id="covered-by-act" class="form-select mt-2">
                                        <option value="yes">Yes (Payment of Gratuity Act, 1972)</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="gratuity-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Estimated Gratuity Amount</p>
                            <p id="gratuity-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Months of Salary Considered</p>
                                    <p id="months-considered" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Service Years Considered</p>
                                    <p id="service-years-display" class="h4 fw-semibold text-gray-800">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Year-wise Growth Breakdown</h3>
            <div class="col-12 px-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Year</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Gratuity Earned (This Year)</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Accumulated Gratuity</th>
                            </tr>
                        </thead>
                        <tbody id="gratuity-growth-table-body" class="bg-white">
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
                <?php include '../../views/content/gratuity-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Gratuity Calculator
let gratuityChart; // Variable to hold the Chart.js instance

// Get DOM elements
const lastDrawnSalarySlider = document.getElementById('last-drawn-salary');
const lastDrawnSalaryText = document.getElementById('last-drawn-salary-text');
const yearsOfServiceSlider = document.getElementById('years-of-service');
const yearsOfServiceText = document.getElementById('years-of-service-text');
const coveredByActSelect = document.getElementById('covered-by-act');
const currencySelect = document.getElementById('currency-select'); // Get the currency select element

const gratuityResult = document.getElementById('gratuity-result');
const monthsConsidered = document.getElementById('months-considered');
const serviceYearsDisplay = document.getElementById('service-years-display');
const gratuityGrowthTableBody = document.getElementById('gratuity-growth-table-body');
const gratuityChartCanvas = document.getElementById('gratuity-chart');


// Event Listeners for inputs
lastDrawnSalarySlider.addEventListener('input', updateCalculator);
yearsOfServiceSlider.addEventListener('input', updateCalculator);
coveredByActSelect.addEventListener('change', updateCalculator);
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
        minimumFractionDigits: 0, // No decimal places for whole rupees
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the displayed values for sliders and triggers Gratuity calculation.
 */
function updateCalculator() {
    // Update slider text displays
    lastDrawnSalaryText.textContent = new Intl.NumberFormat('en-IN').format(lastDrawnSalarySlider.value);
    yearsOfServiceText.textContent = yearsOfServiceSlider.value;

    calculateGratuity();
}

/**
 * Calculates the Gratuity amount and updates the UI.
 */
function calculateGratuity() {
    const lastDrawnSalary = parseFloat(lastDrawnSalarySlider.value);
    let yearsOfService = parseFloat(yearsOfServiceSlider.value);
    const coveredByAct = coveredByActSelect.value;

    let calculatedGratuity = 0;
    let serviceYearsConsideredForCalc = 0;
    let monthsFactor = 0;

    // Minimum 5 years of service required for eligibility
    if (yearsOfService < 5) {
        calculatedGratuity = 0;
        serviceYearsConsideredForCalc = 0;
    } else {
        if (coveredByAct === 'yes') {
            // Covered under Payment of Gratuity Act, 1972
            // If service period is 6 months or more in the last year, it is rounded up.
            // For range slider, we are only considering full years, so this logic is slightly simplified
            // but the Act typically means if you complete X years and 6 months/more, it's counted as X+1 years.
            // Since our slider is only for full years, we directly use the value.
            // If service was 10 years and 7 months, it would be considered 11 years.
            // We assume slider 'yearsOfService' already accounts for rounding if needed, or we only
            // calculate for full years on the slider. For this calculator, let's use a simpler interpretation:
            // if input is `X` years, calculate for `X` years.
            serviceYearsConsideredForCalc = yearsOfService; // The slider value is already rounded if input was e.g., 10.7
            
            // Formula for covered: (Last Drawn Salary * 15 * Years of Service) / 26
            calculatedGratuity = (lastDrawnSalary * 15 * serviceYearsConsideredForCalc) / 26;
            monthsFactor = 15; // 15 days of salary
        } else {
            // Not Covered under Act
            // Only completed years of service are considered. No rounding up.
            serviceYearsConsideredForCalc = yearsOfService;
            
            // Formula for not covered: (Last Drawn Salary * 15 * Years of Service) / 30
            // This is effectively (Last Drawn Salary / 2) * Years of Service
            calculatedGratuity = (lastDrawnSalary * 15 * serviceYearsConsideredForCalc) / 30;
            monthsFactor = 15; // 15 days of salary
        }
    }

    // Update results in UI
    gratuityResult.textContent = formatCurrency(Math.floor(calculatedGratuity)); // Gratuity is usually rounded down to nearest Rupee
    monthsConsidered.textContent = monthsFactor;
    serviceYearsDisplay.textContent = serviceYearsConsideredForCalc;

    // Generate and display year-wise growth
    generateGratuityGrowthSchedule(lastDrawnSalary, yearsOfService, coveredByAct);
    // Update chart
    updateChart(Math.floor(calculatedGratuity));
}

/**
 * Generates and displays the year-wise gratuity growth schedule.
 * @param {number} lastDrawnSalary The last drawn monthly basic + DA.
 * @param {number} totalYearsOfService The total years of service from the slider.
 * @param {string} coveredByAct 'yes' or 'no' indicating coverage under the Act.
 */
function generateGratuityGrowthSchedule(lastDrawnSalary, totalYearsOfService, coveredByAct) {
    gratuityGrowthTableBody.innerHTML = ''; // Clear previous schedule

    let accumulatedGratuity = 0;
    const minYearsForGratuity = 5;

    for (let year = 1; year <= totalYearsOfService; year++) {
        let gratuityEarnedThisYear = 0;
        let effectiveYearsForCalc = year;

        // Apply rounding rule for 'covered by act' for each year's calculation if it were a completed service year
        // For the growth breakdown, we assume 'effectiveYearsForCalc' applies to the entire cumulative period
        // if this were the *final* year.
        // A simpler way for year-wise breakdown is to calculate the incremental gratuity.
        // Let's re-calculate total gratuity for `year` years of service and find the difference from previous year.

        let gratuityAtCurrentYear = 0;

        if (year >= minYearsForGratuity) {
            if (coveredByAct === 'yes') {
                // For 'covered by act', if the year value itself represents the *completed* service,
                // and we don't have months, we use the year directly.
                // If the Act's rounding (e.g., 5 years 7 months -> 6 years) was applied,
                // then we'd need monthly granularity, but for simple year-wise breakdown,
                // assume 'year' is the 'Years of Service' in the formula.
                gratuityAtCurrentYear = (lastDrawnSalary * 15 * year) / 26;
            } else {
                // Not Covered under Act - only completed years
                gratuityAtCurrentYear = (lastDrawnSalary * 15 * year) / 30;
            }
        }
        
        // Calculate incremental gratuity for this specific year
        gratuityEarnedThisYear = gratuityAtCurrentYear - accumulatedGratuity; // This logic needs adjustment

        // Simpler: Calculate total gratuity for 'year' years of service
        let currentYearGratuity = 0;
        let previousYearGratuity = 0;

        if (year >= minYearsForGratuity) {
            if (coveredByAct === 'yes') {
                currentYearGratuity = (lastDrawnSalary * 15 * year) / 26;
            } else {
                currentYearGratuity = (lastDrawnSalary * 15 * year) / 30;
            }
        }

        if (year > minYearsForGratuity) {
            if (coveredByAct === 'yes') {
                previousYearGratuity = (lastDrawnSalary * 15 * (year - 1)) / 26;
            } else {
                previousYearGratuity = (lastDrawnSalary * 15 * (year - 1)) / 30;
            }
        }

        const actualGratuityEarnedThisYear = currentYearGratuity - previousYearGratuity;
        accumulatedGratuity = currentYearGratuity;


        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${year}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(Math.floor(actualGratuityEarnedThisYear))}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(Math.floor(accumulatedGratuity))}</td>
        `;
        gratuityGrowthTableBody.appendChild(row);
    }
}

/**
 * Updates the Chart.js pie chart with gratuity data.
 * @param {number} totalGratuity The calculated total gratuity amount.
 */
function updateChart(totalGratuity) {
    const ctx = gratuityChartCanvas.getContext('2d');

    if (gratuityChart) {
        gratuityChart.destroy(); // Destroy existing chart before creating a new one
    }

    // For a gratuity calculator, a single value might be better represented by a bar or just text.
    // However, if we must use a doughnut, we can show "Gratuity" vs "0" or "Gratuity" vs "Max Limit - Gratuity".
    // For simplicity, let's just use the gratuity value as the sole segment for a meaningful chart.
    // Or, more contextually, show Gratuity vs. Remaining potential within the max limit if applicable.
    // For now, let's just represent the calculated gratuity value visually.

    // A better representation might be a single bar or just a number, but sticking to doughnut for consistency.
    // To make it show something, let's represent the total calculated gratuity.
    // We can compare it against a theoretical maximum if we want two segments.
    const maxGratuityLimit = 2000000; // Example: 20 Lakhs
    const remainingPotential = Math.max(0, maxGratuityLimit - totalGratuity); // Use Math.max to prevent negative

    gratuityChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Calculated Gratuity', 'Remaining from Max Limit'],
            datasets: [{
                data: [totalGratuity, remainingPotential],
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
                
                // Draw white circle (if needed)
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