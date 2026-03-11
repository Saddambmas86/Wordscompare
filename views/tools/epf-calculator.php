<?php
// SEO and Page Metadata
$page_title = "EPF Calculator - Employee Provident Fund Calculator Online"; // You may Change the Title here
$page_description = "Free EPF calculator online. Calculate Employee Provident Fund maturity amount, monthly contributions, and interest. Plan your retirement savings effectively."; // Put your Description here
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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">EPF Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Estimate your EPF contributions, interest earned, and total corpus at retirement.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">EPF Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="monthly-salary" class="form-label mb-1">Monthly Basic Salary + DA</label>
                                        <div class="d-flex align-items-center">
                                            <select id="currency-select" class="form-select form-select-sm me-2">
                                                <option value="USD">$ (USD)</option>
                                                <option value="EUR">EUR (€)</option>
                                                <option value="INR" selected>INR (₹)</option>
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
                                            <span class="h5 fw-semibold text-primary"><span id="monthly-salary-text">50,000</span></span>
                                        </div>
                                    </div>
                                    <input type="range" id="monthly-salary" min="15000" max="500000" step="1000" value="50000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="employee-contribution" class="form-label mb-1">Employee Contribution (%)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="employee-contribution-text">12</span> %</span>
                                    </div>
                                    <input type="range" id="employee-contribution" min="0" max="100" step="1" value="12" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="employer-epf-contribution" class="form-label mb-1">Employer EPF Contribution (%)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="employer-epf-contribution-text">3.67</span> %</span>
                                    </div>
                                    <input type="range" id="employer-epf-contribution" min="0" max="12" step="0.01" value="3.67" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="current-age" class="form-label mb-1">Current Age</label>
                                        <span class="h5 fw-semibold text-primary"><span id="current-age-text">25</span> Years</span>
                                    </div>
                                    <input type="range" id="current-age" min="18" max="58" step="1" value="25" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="retirement-age" class="form-label mb-1">Retirement Age</label>
                                        <span class="h5 fw-semibold text-primary"><span id="retirement-age-text">58</span> Years</span>
                                    </div>
                                    <input type="range" id="retirement-age" min="50" max="60" step="1" value="58" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="epf-interest-rate" class="form-label mb-1">Expected EPF Interest Rate (%)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="epf-interest-rate-text">8.15</span> %</span>
                                    </div>
                                    <input type="range" id="epf-interest-rate" min="5" max="10" step="0.01" value="8.15" class="form-range mt-2">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="epf-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Total EPF Corpus at Retirement</p>
                            <p id="total-epf-corpus" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Employee Contribution</p>
                                    <p id="total-employee-contribution" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Employer Contribution</p>
                                    <p id="total-employer-contribution" class="h4 fw-semibold text-secondary">0</p>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <p class="small text-gray-500">Total Interest Earned</p>
                                <p id="total-interest-earned" class="h4 fw-semibold text-success">0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    
        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Year-wise Growth Projection</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Year</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Employee Contribution</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Employer Contribution</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Interest Earned</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Closing Balance</th>
                            </tr>
                        </thead>
                        <tbody id="epf-projection-table-body" class="bg-white">
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
                <?php include '../../views/content/epf-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for EPF Calculator
let epfChart; // Variable to hold the Chart.js instance

// Get DOM elements
const monthlySalarySlider = document.getElementById('monthly-salary');
const monthlySalaryText = document.getElementById('monthly-salary-text');
const employeeContributionSlider = document.getElementById('employee-contribution');
const employeeContributionText = document.getElementById('employee-contribution-text');
const employerEpfContributionSlider = document.getElementById('employer-epf-contribution');
const employerEpfContributionText = document.getElementById('employer-epf-contribution-text');
const currentAgeSlider = document.getElementById('current-age');
const currentAgeText = document.getElementById('current-age-text');
const retirementAgeSlider = document.getElementById('retirement-age');
const retirementAgeText = document.getElementById('retirement-age-text');
const epfInterestRateSlider = document.getElementById('epf-interest-rate');
const epfInterestRateText = document.getElementById('epf-interest-rate-text');

const totalEpfCorpus = document.getElementById('total-epf-corpus');
const totalEmployeeContribution = document.getElementById('total-employee-contribution');
const totalEmployerContribution = document.getElementById('total-employer-contribution');
const totalInterestEarned = document.getElementById('total-interest-earned');
const epfProjectionTableBody = document.getElementById('epf-projection-table-body');
const epfChartCanvas = document.getElementById('epf-chart');
const currencySelect = document.getElementById('currency-select'); // Get the currency select element


// Event Listeners for sliders and currency select
monthlySalarySlider.addEventListener('input', updateCalculator);
employeeContributionSlider.addEventListener('input', updateCalculator);
employerEpfContributionSlider.addEventListener('input', updateCalculator);
currentAgeSlider.addEventListener('input', updateCalculator);
retirementAgeSlider.addEventListener('input', updateCalculator);
epfInterestRateSlider.addEventListener('input', updateCalculator);
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
        minimumFractionDigits: 0, 
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the displayed values for sliders and triggers EPF calculation.
 */
function updateCalculator() {
    // Update slider text displays
    // The monthlySalaryText now needs to be formatted with currency
    monthlySalaryText.textContent = formatCurrency(monthlySalarySlider.value).replace(currencySelect.value, '').trim(); // Remove currency code and trim spaces
    employeeContributionText.textContent = employeeContributionSlider.value;
    employerEpfContributionText.textContent = employerEpfContributionSlider.value;
    currentAgeText.textContent = currentAgeSlider.value;
    retirementAgeText.textContent = retirementAgeSlider.value;
    epfInterestRateText.textContent = epfInterestRateSlider.value;

    calculateEPF();
}

/**
 * Calculates the EPF corpus, contributions, and interest, then updates the UI.
 */
function calculateEPF() {
    const monthlySalary = parseFloat(monthlySalarySlider.value);
    const employeeContributionRate = parseFloat(employeeContributionSlider.value) / 100;
    const employerEpfContributionRate = parseFloat(employerEpfContributionSlider.value) / 100;
    const currentAge = parseInt(currentAgeSlider.value);
    const retirementAge = parseInt(retirementAgeSlider.value);
    const annualInterestRate = parseFloat(epfInterestRateSlider.value) / 100;

    const yearsToRetirement = retirementAge - currentAge;
    
    let totalEmployeeContributed = 0;
    let totalEmployerContributed = 0;
    let totalInterestEarnedCalculated = 0;
    let currentBalance = 0;

    epfProjectionTableBody.innerHTML = ''; // Clear previous schedule

    for (let year = 1; year <= yearsToRetirement; year++) {
        let annualEmployeeContribution = monthlySalary * employeeContributionRate * 12;
        let annualEmployerContribution = monthlySalary * employerEpfContributionRate * 12;
        let annualTotalContribution = annualEmployeeContribution + annualEmployerContribution;

        // Interest is typically calculated on the opening balance plus half of the annual contributions
        // (assuming contributions are made monthly throughout the year)
        let interestForYear = (currentBalance + (annualTotalContribution / 2)) * annualInterestRate;
        
        currentBalance += annualTotalContribution + interestForYear;

        totalEmployeeContributed += annualEmployeeContribution;
        totalEmployerContributed += annualEmployerContribution;
        totalInterestEarnedCalculated += interestForYear;

        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${currentAge + year}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(annualEmployeeContribution)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(annualEmployerContribution)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(interestForYear)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(currentBalance)}</td>
        `;
        epfProjectionTableBody.appendChild(row);
    }

    // Update results in UI
    totalEpfCorpus.textContent = formatCurrency(currentBalance);
    totalEmployeeContribution.textContent = formatCurrency(totalEmployeeContributed);
    totalEmployerContribution.textContent = formatCurrency(totalEmployerContributed);
    totalInterestEarned.textContent = formatCurrency(totalInterestEarnedCalculated);

    // Update chart
    updateChart(totalEmployeeContributed, totalEmployerContributed, totalInterestEarnedCalculated);
}

/**
 * Updates the Chart.js pie chart with EPF data.
 * @param {number} employeeContrib The total employee contribution.
 * @param {number} employerContrib The total employer contribution.
 * @param {number} interestEarned The total interest earned.
 */
function updateChart(employeeContrib, employerContrib, interestEarned) {
    const ctx = epfChartCanvas.getContext('2d');

    if (epfChart) {
        epfChart.destroy(); // Destroy existing chart before creating a new one
    }

    epfChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Employee Contribution', 'Employer Contribution', 'Interest Earned'],
            datasets: [{
                data: [employeeContrib, employerContrib, interestEarned],
                backgroundColor: ['#4F46E5', '#f59e0b', '#10B981'], // Indigo 600, Amber 500, Emerald 500
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