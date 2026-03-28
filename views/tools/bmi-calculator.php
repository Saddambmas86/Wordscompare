<?php
// SEO and Page Metadata
$page_title = "BMI Calculator - Body Mass Index Calculator Online Free"; // You may Change the Title here
$page_description = "Free BMI calculator online. Calculate your Body Mass Index instantly — enter your height and weight to find out if you are underweight, healthy, or overweight."; // Put your Description here
$page_keywords = "bmi calculator, calculator, online calculator, free math tools, age calculator, bmi calculator, conversion calculator, wordscompare";

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
                    <h1 class="h2">BMI Calculator <i class="fas fa-calculator text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Calculate your Body Mass Index (BMI) and assess your weight status.</p>
                </header>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-sliders-h me-2"></i>BMI Settings</h5>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" id="bmiUnitTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="metric-tab" data-bs-toggle="tab" data-bs-target="#metric" type="button" role="tab" aria-controls="metric" aria-selected="true">Metric (kg, cm)</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="imperial-tab" data-bs-toggle="tab" data-bs-target="#imperial" type="button" role="tab" aria-controls="imperial" aria-selected="false">Imperial (lbs, ft, in)</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="bmiUnitTabsContent">
                            <div class="tab-pane fade show active" id="metric" role="tabpanel" aria-labelledby="metric-tab">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="metricWeight" class="form-label">Weight (kg)</label>
                                        <input type="number" class="form-control" id="metricWeight" placeholder="e.g., 70" min="1" step="0.1">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="metricHeight" class="form-label">Height (cm)</label>
                                        <input type="number" class="form-control" id="metricHeight" placeholder="e.g., 175" min="1" step="0.1">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="imperial" role="tabpanel" aria-labelledby="imperial-tab">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="imperialWeight" class="form-label">Weight (lbs)</label>
                                        <input type="number" class="form-control" id="imperialWeight" placeholder="e.g., 154" min="1" step="0.1">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="imperialHeightFt" class="form-label">Height (ft)</label>
                                        <input type="number" class="form-control" id="imperialHeightFt" placeholder="e.g., 5" min="0" step="1">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="imperialHeightIn" class="form-label">Height (in)</label>
                                        <input type="number" class="form-control" id="imperialHeightIn" placeholder="e.g., 9" min="0" max="11" step="1">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mt-3">
                            <div class="col-md-6">
                                <label for="age" class="form-label">Age (years)</label>
                                <input type="number" class="form-control" id="age" placeholder="e.g., 25" min="1" max="120">
                            </div>
                            <div class="col-md-6">
                                <label for="gender" class="form-label">Gender</label>
                                <select id="gender" class="form-select">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Prefer not to say</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="activityLevel" class="form-label">Activity Level</label>
                                <select id="activityLevel" class="form-select">
                                    <option value="sedentary">Sedentary (little or no exercise)</option>
                                    <option value="lightly-active">Lightly Active (light exercise/sports 1-3 days/week)</option>
                                    <option value="moderately-active">Moderately Active (moderate exercise/sports 3-5 days/week)</option>
                                    <option value="very-active">Very Active (hard exercise/sports 6-7 days a week)</option>
                                    <option value="extra-active">Extra Active (very hard exercise/physical job)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="calculateBtn">
                        <i class="fas fa-calculator me-2"></i> Calculate BMI
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="result-area card mt-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Your BMI Result</h5>
                        <span class="badge bg-info" id="bmiCategoryBadge">Category: N/A</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="m-0 p-3 bg-light" id="bmiOutput" style="min-height: 100px; max-height: 200px; overflow: auto;">
                            <div class="text-center text-muted">Your BMI result will appear here</div>
                        </div>
                    </div>
                </div>

                <div class="history-area card mt-4" id="historyContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>BMI History (Last 10)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="historyTable">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th>Date</th>
                                        <th>BMI</th>
                                        <th>Category</th>
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

    <!-- Sticky sidebar -->
    <div class="col-lg-2 border shadow-sm sticky-top vh-100 p-3">
        
    </div>

    </div>
</div>

<?php include '../../includes/sharer.php'; ?>

<!-- Content -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 border shadow-sm">
            <article>
                <header class="mb-5 text-center">
                    <h2 class="display-5"><?php echo $page_title; ?></h2>
                    <p class="lead"><?php echo $page_description; ?></p>
                </header>
                <?php include '../../views/content/bmi-calculator-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
// JavaScript for BMI Calculator
let bmiHistory = JSON.parse(localStorage.getItem('bmiHistory')) || [];

// Initialize elements
const metricWeightInput = document.getElementById('metricWeight');
const metricHeightInput = document.getElementById('metricHeight');
const imperialWeightInput = document.getElementById('imperialWeight');
const imperialHeightFtInput = document.getElementById('imperialHeightFt');
const imperialHeightInInput = document.getElementById('imperialHeightIn');
const ageInput = document.getElementById('age');
const genderSelect = document.getElementById('gender');
const activityLevelSelect = document.getElementById('activityLevel');

const calculateBtn = document.getElementById('calculateBtn');
const resetBtn = document.getElementById('resetBtn');
const bmiOutput = document.getElementById('bmiOutput');
const statusArea = document.getElementById('statusArea');
const bmiCategoryBadge = document.getElementById('bmiCategoryBadge');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

// Event Listeners
calculateBtn.addEventListener('click', calculateBMI);
resetBtn.addEventListener('click', resetAll);

// Unit Tab Listener to clear other unit inputs
document.getElementById('metric-tab').addEventListener('shown.bs.tab', function (event) {
    imperialWeightInput.value = '';
    imperialHeightFtInput.value = '';
    imperialHeightInInput.value = '';
});

document.getElementById('imperial-tab').addEventListener('shown.bs.tab', function (event) {
    metricWeightInput.value = '';
    metricHeightInput.value = '';
});

// Initialize history display
displayHistory();

// Reset Button
function resetAll() {
    // Clear all input fields
    metricWeightInput.value = '';
    metricHeightInput.value = '';
    imperialWeightInput.value = '';
    imperialHeightFtInput.value = '';
    imperialHeightInInput.value = '';
    ageInput.value = '';
    genderSelect.value = 'male';
    activityLevelSelect.value = 'sedentary';

    // Reset output and status
    bmiOutput.innerHTML = '<div class="text-center text-muted">Your BMI result will appear here</div>';
    statusArea.textContent = '';
    bmiCategoryBadge.textContent = 'Category: N/A';
    bmiCategoryBadge.className = 'badge bg-info';

    // Reset tab to metric
    const metricTab = new bootstrap.Tab(document.getElementById('metric-tab'));
    metricTab.show();
}

// Calculate BMI
function calculateBMI() {
    let weight, heightCm, heightM, heightIn;
    let unit = document.querySelector('#bmiUnitTabs .nav-link.active').id;
    let isValid = true;
    let errorMessage = '';

    if (unit === 'metric-tab') {
        weight = parseFloat(metricWeightInput.value);
        heightCm = parseFloat(metricHeightInput.value);

        if (isNaN(weight) || weight <= 0) {
            errorMessage += 'Please enter a valid weight in kg. ';
            isValid = false;
        }
        if (isNaN(heightCm) || heightCm <= 0) {
            errorMessage += 'Please enter a valid height in cm. ';
            isValid = false;
        }
        heightM = heightCm / 100; // Convert cm to meters
    } else { // Imperial
        weight = parseFloat(imperialWeightInput.value);
        let heightFt = parseFloat(imperialHeightFtInput.value);
        heightIn = parseFloat(imperialHeightInInput.value);

        if (isNaN(weight) || weight <= 0) {
            errorMessage += 'Please enter a valid weight in lbs. ';
            isValid = false;
        }
        if (isNaN(heightFt) || heightFt < 0) {
            errorMessage += 'Please enter a valid height in feet. ';
            isValid = false;
        }
        if (isNaN(heightIn) || heightIn < 0 || heightIn > 11) {
            errorMessage += 'Please enter a valid height in inches (0-11). ';
            isValid = false;
        }
        heightIn = (heightFt * 12) + heightIn; // Convert ft and in to total inches
    }

    const age = parseInt(ageInput.value);
    const gender = genderSelect.value;
    const activityLevel = activityLevelSelect.value;

    if (isNaN(age) || age <= 0) {
        errorMessage += 'Please enter a valid age. ';
        isValid = false;
    }

    if (!isValid) {
        showError(errorMessage);
        Swal.fire({
            title: 'Input Error',
            text: errorMessage,
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    let bmi;
    if (unit === 'metric-tab') {
        bmi = weight / (heightM * heightM);
    } else { // Imperial
        bmi = (weight / (heightIn * heightIn)) * 703;
    }

    bmi = bmi.toFixed(2); // Round to 2 decimal places
    const category = getBMICategory(bmi);
    const badgeClass = getBMIBadgeClass(category);

    bmiOutput.innerHTML = `
        <p class="h4 text-center mb-3">Your BMI is: <strong class="text-danger">${bmi}</strong></p>
        <p class="h5 text-center mb-3">Which falls into the <span class="badge ${badgeClass}">${category}</span> category.</p>
        <p class="text-center text-muted">Based on your age (${age} years), gender (${gender}), and activity level (${activityLevel}).</p>
    `;
    bmiCategoryBadge.textContent = `Category: ${category}`;
    bmiCategoryBadge.className = `badge ${badgeClass}`;
    showStatus('BMI calculated successfully!', 'success');

    // Add to history
    addToHistory(bmi, category, unit, weight, heightCm || heightIn, age, gender, activityLevel);

    Swal.fire({
        title: 'BMI Calculated!',
        text: `Your BMI is ${bmi}, which is ${category}.`,
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 2000,
        timerProgressBar: true
    });
}

function getBMICategory(bmi) {
    if (bmi < 18.5) return 'Underweight';
    if (bmi >= 18.5 && bmi <= 24.9) return 'Healthy Weight';
    if (bmi >= 25.0 && bmi <= 29.9) return 'Overweight';
    return 'Obese';
}

function getBMIBadgeClass(category) {
    switch (category) {
        case 'Underweight': return 'bg-primary';
        case 'Healthy Weight': return 'bg-success';
        case 'Overweight': return 'bg-warning';
        case 'Obese': return 'bg-danger';
        default: return 'bg-info';
    }
}

// History Functions
function addToHistory(bmi, category, unit, weight, height, age, gender, activityLevel) {
    const historyItem = {
        id: Date.now(),
        bmi: bmi,
        category: category,
        date: new Date().toLocaleString(),
        details: { unit, weight, height, age, gender, activityLevel }
    };

    bmiHistory.unshift(historyItem);
    if (bmiHistory.length > 10) {
        bmiHistory.pop();
    }

    localStorage.setItem('bmiHistory', JSON.stringify(bmiHistory));
    displayHistory();
}

function displayHistory() {
    if (bmiHistory.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    historyList.innerHTML = '';
    bmiHistory.forEach(item => {
        const tr = document.createElement('tr');
        const badgeClass = getBMIBadgeClass(item.category);
        
        let heightDisplay;
        if (item.details.unit === 'metric-tab') {
            heightDisplay = `${item.details.height} cm`;
        } else {
            const totalInches = item.details.height;
            const feet = Math.floor(totalInches / 12);
            const inches = totalInches % 12;
            heightDisplay = `${feet}'${inches}"`;
        }

        tr.innerHTML = `
            <td>
                <button class="btn btn-sm btn-outline-danger delete-history" data-id="${item.id}" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
            <td>${item.date}</td>
            <td>${item.bmi}</td>
            <td><span class="badge ${badgeClass}">${item.category}</span></td>
            <td class="text-end">
                <button class="btn btn-sm btn-outline-secondary view-details" data-id="${item.id}" title="View Details">
                    <i class="fas fa-eye"></i>
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

    document.querySelectorAll('.view-details').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            viewHistoryDetails(id);
        });
    });

    historyContainer.style.display = 'block';
}

function deleteHistoryItem(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to recover this BMI record!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            bmiHistory = bmiHistory.filter(item => item.id !== id);
            localStorage.setItem('bmiHistory', JSON.stringify(bmiHistory));
            displayHistory();
            Swal.fire('Deleted!', 'Your BMI record has been deleted.', 'success');
        }
    });
}

function viewHistoryDetails(id) {
    const item = bmiHistory.find(item => item.id === id);
    if (!item) return;

    let heightUnitDisplay = "";
    let weightUnitDisplay = "";
    let heightValueDisplay = "";

    if (item.details.unit === 'metric-tab') {
        heightUnitDisplay = "cm";
        weightUnitDisplay = "kg";
        heightValueDisplay = item.details.height;
    } else {
        heightUnitDisplay = "ft, in";
        weightUnitDisplay = "lbs";
        const totalInches = item.details.height;
        const feet = Math.floor(totalInches / 12);
        const inches = totalInches % 12;
        heightValueDisplay = `${feet} ft ${inches} in`;
    }

    Swal.fire({
        title: 'BMI Record Details',
        html: `
            <table class="table table-bordered text-start mt-3">
                <tr><th>Date</th><td>${item.date}</td></tr>
                <tr><th>BMI</th><td><strong>${item.bmi}</strong></td></tr>
                <tr><th>Category</th><td><span class="badge ${getBMIBadgeClass(item.category)}">${item.category}</span></td></tr>
                <tr><th>Unit System</th><td>${item.details.unit === 'metric-tab' ? 'Metric' : 'Imperial'}</td></tr>
                <tr><th>Weight</th><td>${item.details.weight} ${weightUnitDisplay}</td></tr>
                <tr><th>Height</th><td>${heightValueDisplay}</td></tr>
                <tr><th>Age</th><td>${item.details.age} years</td></tr>
                <tr><th>Gender</th><td>${item.details.gender.charAt(0).toUpperCase() + item.details.gender.slice(1)}</td></tr>
                <tr><th>Activity Level</th><td>${item.details.activityLevel.replace(/-/g, ' ').split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ')}</td></tr>
            </table>
        `,
        icon: 'info',
        confirmButtonText: 'Close',
        confirmButtonColor: '#0d6efd'
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