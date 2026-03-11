<?php
// SEO and Page Metadata
$page_title = "Payroll Sheet Generator"; // You may Change the Title here
$page_description = "Generate customizable and professional payroll sheets online for free. Manage employee records and create payroll reports."; // Put your Description here
$page_keywords = "payroll sheet generator, free payroll, employee payroll, HR tools, salary management, employee records";

// Include common header
include '../../includes/header.php';
?>

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
            <div class="tool-container rounded-3 p-4 p-md-5">
                <header class="text-center mb-4">
                    <h1 class="h2">Payroll Sheet Generator <i class="fas fa-money-bill-wave text-danger ms-2"></i></h1>
                    <p class="lead text-muted">100% Free Payroll Sheet Generator | No Registration or Sign up Needed</p>
                </header>

                <div class="row mb-4 text-center">
                    <div class="col-md-3">
                        <div class="card bg-light p-2">
                            <h6 class="mb-0">Total Employees</h6>
                            <p class="display-6 mb-0" id="totalEmployees">0</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-light p-2">
                            <h6 class="mb-0">Active Employees</h6>
                            <p class="display-6 mb-0" id="activeEmployees">0</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-light p-2">
                            <h6 class="mb-0">Monthly Payroll</h6>
                            <p class="display-6 mb-0" id="monthlyPayroll">$0</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-light p-2">
                            <h6 class="mb-0">Avg. Salary</h6>
                            <p class="display-6 mb-0" id="avgSalary">$0</p>
                        </div>
                    </div>
                </div>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-users me-2"></i>Employee Management</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="employeeId" class="form-label">Employee ID*</label>
                                <input type="text" id="employeeId" class="form-control" placeholder="EMP001" required>
                            </div>
                            <div class="col-md-6">
                                <label for="fullName" class="form-label">Full Name*</label>
                                <input type="text" id="fullName" class="form-control" placeholder="Jane Doe" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email*</label>
                                <input type="email" id="email" class="form-control" placeholder="jane.doe@example.com" required>
                            </div>
                            <div class="col-md-6">
                                <label for="designation" class="form-label">Designation*</label>
                                <input type="text" id="designation" class="form-control" placeholder="Software Developer" required>
                            </div>
                            <div class="col-md-6">
                                <label for="department" class="form-label">Department*</label>
                                <input type="text" id="department" class="form-control" placeholder="Engineering" required>
                            </div>
                            <div class="col-md-6">
                                <label for="employmentStatus" class="form-label">Employment Status*</label>
                                <select id="employmentStatus" class="form-select" required>
                                    <option value="">Select Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="On Leave">On Leave</option>
                                    <option value="Probation">Probation</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="monthlySalary" class="form-label">Monthly Salary*</label>
                                <div class="input-group">
                                    <select id="salaryCurrency" class="form-select flex-grow-0" style="max-width: fit-content;" required>
                                        <option value="$">$</option>
                                        <option value="₹">₹</option>
                                        <option value="€">€</option>
                                        <option value="£">£</option>
                                        <option value="¥">¥</option>
                                    </select>
                                    <input type="number" id="monthlySalary" class="form-control" placeholder="5000" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="paymentStatus" class="form-label">Payment Status*</label>
                                <select id="paymentStatus" class="form-select" required>
                                    <option value="">Select Status</option>
                                    <option value="Paid">Paid</option>
                                    <option value="Not Paid">Not Paid</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="paidDate" class="form-label">Paid Date*</label>
                                <input type="date" id="paidDate" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                <input type="tel" id="phoneNumber" class="form-control" placeholder="+1234567890">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="addEmployeeBtn">
                        <i class="fas fa-user-plus me-2"></i> Add Employee
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="generateReportBtn">
                        <i class="fas fa-file-invoice-dollar me-2"></i> Generate Payroll Report
                    </button>
                    <button class="btn btn-info btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                </div>
                
                <div id="statusArea" class="text-center"></div>

                <div class="options-card card mt-4" id="employeeRecordsContainer">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-users-cog me-2"></i>Employee Records</h5>
                        <input type="text" id="searchEmployee" class="form-control w-auto" placeholder="Search...">
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                            <table class="table table-striped table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>Salary</th>
                                        <th>Status</th>
                                        <th>Payment</th>
                                        <th>Paid Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="employeeTableBody">
                                    <tr><td colspan="10" class="text-center text-muted">No employee records found</td></tr>
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Employee Pagination" class="p-3">
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item" id="prevPage"><a class="page-link" href="#">&laquo; Prev</a></li>
                                <li class="page-item active"><a class="page-link" href="#" id="currentPage">Page 1 of 1</a></li>
                                <li class="page-item" id="nextPage"><a class="page-link" href="#">Next &raquo;</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="options-card card mt-4" id="payrollReportContainer" style="display: none;">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-file-excel me-2"></i>Employee Payroll Report</h5>
                        <div>
                            <button class="btn btn-success btn-sm me-2" id="downloadExcelBtn">
                                <i class="fas fa-file-excel me-2"></i> Download as Excel
                            </button>
                            <button class="btn btn-info btn-sm" id="printReportBtn">
                                <i class="fas fa-print me-2"></i> Print Report
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div id="payrollReportOutput" style="min-height: 200px; max-height: 600px; overflow: auto; border: 1px solid #eee; padding: 15px; background-color: #fff;">
                            <p class="text-muted text-center">No employee records to display</p>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 text-start">
                                <strong>Total Employees:</strong> <span id="reportTotalEmployees">0</span>
                            </div>
                            <div class="col-md-6 text-end">
                                <strong>Total Payroll:</strong> <span id="reportTotalPayroll">$0</span>
                            </div>
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
                <?php include '../../views/content/payroll-sheet-generator-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Payroll Sheet Generator
let employees = [];
const employeesPerPage = 10;
let currentPage = 1;

// Initialize elements
const totalEmployeesDisplay = document.getElementById('totalEmployees');
const activeEmployeesDisplay = document.getElementById('activeEmployees');
const monthlyPayrollDisplay = document.getElementById('monthlyPayroll');
const avgSalaryDisplay = document.getElementById('avgSalary');

const employeeIdInput = document.getElementById('employeeId');
const fullNameInput = document.getElementById('fullName');
const emailInput = document.getElementById('email');
const designationInput = document.getElementById('designation');
const departmentInput = document.getElementById('department');
const employmentStatusSelect = document.getElementById('employmentStatus');
const salaryCurrencySelect = document.getElementById('salaryCurrency');
const monthlySalaryInput = document.getElementById('monthlySalary');
const paymentStatusSelect = document.getElementById('paymentStatus');
const paidDateInput = document.getElementById('paidDate');
const phoneNumberInput = document.getElementById('phoneNumber');

const addEmployeeBtn = document.getElementById('addEmployeeBtn');
const generateReportBtn = document.getElementById('generateReportBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');

const searchEmployeeInput = document.getElementById('searchEmployee');
const employeeTableBody = document.getElementById('employeeTableBody');
const prevPageBtn = document.getElementById('prevPage');
const currentPageDisplay = document.getElementById('currentPage');
const nextPageBtn = document.getElementById('nextPage');

const payrollReportContainer = document.getElementById('payrollReportContainer');
const payrollReportOutput = document.getElementById('payrollReportOutput');
const downloadExcelBtn = document.getElementById('downloadExcelBtn');
const printReportBtn = document.getElementById('printReportBtn');
const reportTotalEmployeesDisplay = document.getElementById('reportTotalEmployees');
const reportTotalPayrollDisplay = document.getElementById('reportTotalPayroll');

// Event Listeners
addEmployeeBtn.addEventListener('click', addEmployee);
generateReportBtn.addEventListener('click', generatePayrollReport);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
searchEmployeeInput.addEventListener('input', () => renderEmployeeTable(1)); // Reset to page 1 on search
prevPageBtn.addEventListener('click', () => changePage(currentPage - 1));
nextPageBtn.addEventListener('click', () => changePage(currentPage + 1));
downloadExcelBtn.addEventListener('click', downloadPayrollExcel);
printReportBtn.addEventListener('click', printPayrollReport);


// Initial render and stats update
document.addEventListener('DOMContentLoaded', () => {
    renderEmployeeTable(currentPage);
    updateStatsDisplay();
});

function updateStatsDisplay() {
    const activeEmployees = employees.filter(emp => emp.employmentStatus === 'Active').length;
    const totalMonthlyPayroll = employees.reduce((sum, emp) => sum + parseFloat(emp.monthlySalary || 0), 0);
    const avgSalary = employees.length > 0 ? totalMonthlyPayroll / employees.length : 0;

    totalEmployeesDisplay.textContent = employees.length;
    activeEmployeesDisplay.textContent = activeEmployees;
    monthlyPayrollDisplay.textContent = `${salaryCurrencySelect.value}${totalMonthlyPayroll.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}`;
    avgSalaryDisplay.textContent = `${salaryCurrencySelect.value}${avgSalary.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}`;
}

function showHowTo() {
    Swal.fire({
        title: 'Welcome to Payroll Sheet Generator',
        html: `Follow these steps to manage your payroll:<br><br>
        <ol class="text-start">
            <li>Fill in the employee details in the "Employee Management" section.</li>
            <li>Click "Add Employee" to add the employee to the records table below.</li>
            <li>You can edit or delete employee records directly from the table.</li>
            <li>Use the search bar and pagination to navigate through employee records.</li>
            <li>Click "Generate Payroll Report" to create a summary of your payroll.</li>
            <li>Download the report as Excel (CSV) or print it for your records.</li>
            <li>Click "Reset" to clear all data and start fresh.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

function resetAll() {
    employees = [];
    currentPage = 1;
    clearEmployeeForm();
    renderEmployeeTable(currentPage);
    updateStatsDisplay();
    payrollReportOutput.innerHTML = '<p class="text-muted text-center">No employee records to display</p>';
    payrollReportContainer.style.display = 'none';
    reportTotalEmployeesDisplay.textContent = '0';
    reportTotalPayrollDisplay.textContent = '$0';
    showStatus('', '');
    Swal.fire({
        title: 'Reset Complete!',
        text: 'All employee data and reports have been cleared.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1500,
        timerProgressBar: true
    });
}

function clearEmployeeForm() {
    employeeIdInput.value = '';
    fullNameInput.value = '';
    emailInput.value = '';
    designationInput.value = '';
    departmentInput.value = '';
    employmentStatusSelect.value = '';
    salaryCurrencySelect.value = '$';
    monthlySalaryInput.value = '';
    paymentStatusSelect.value = '';
    paidDateInput.value = '';
    phoneNumberInput.value = '';
}

function addEmployee() {
    const employee = {
        id: employeeIdInput.value.trim(),
        fullName: fullNameInput.value.trim(),
        email: emailInput.value.trim(),
        designation: designationInput.value.trim(),
        department: departmentInput.value.trim(),
        employmentStatus: employmentStatusSelect.value,
        salaryCurrency: salaryCurrencySelect.value,
        monthlySalary: parseFloat(monthlySalaryInput.value.trim()),
        paymentStatus: paymentStatusSelect.value,
        paidDate: paidDateInput.value,
        phoneNumber: phoneNumberInput.value.trim()
    };

    // Basic validation
    if (!employee.id || !employee.fullName || !employee.email || !employee.designation || !employee.department || 
        !employee.employmentStatus || isNaN(employee.monthlySalary) || !employee.paymentStatus || !employee.paidDate) {
        showError('Please fill in all required fields (marked with *).');
        Swal.fire({
            title: 'Missing Information',
            text: 'Please fill in all required fields (marked with *).',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    // Check for duplicate Employee ID
    if (employees.some(emp => emp.id === employee.id)) {
        showError('Employee ID already exists. Please use a unique ID.');
        Swal.fire({
            title: 'Duplicate ID',
            text: 'Employee ID already exists. Please use a unique ID.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    employees.push(employee);
    clearEmployeeForm();
    renderEmployeeTable(currentPage);
    updateStatsDisplay();
    showStatus('Employee added successfully!', 'success');
}

function renderEmployeeTable(page) {
    const searchTerm = searchEmployeeInput.value.toLowerCase();
    const filteredEmployees = employees.filter(emp => 
        emp.id.toLowerCase().includes(searchTerm) ||
        emp.fullName.toLowerCase().includes(searchTerm) ||
        emp.email.toLowerCase().includes(searchTerm) ||
        emp.designation.toLowerCase().includes(searchTerm) ||
        emp.department.toLowerCase().includes(searchTerm)
    );

    const totalPages = Math.ceil(filteredEmployees.length / employeesPerPage);
    currentPage = Math.min(Math.max(1, page), totalPages || 1); // Ensure current page is valid

    const startIndex = (currentPage - 1) * employeesPerPage;
    const endIndex = startIndex + employeesPerPage;
    const paginatedEmployees = filteredEmployees.slice(startIndex, endIndex);

    employeeTableBody.innerHTML = ''; // Clear existing rows

    if (paginatedEmployees.length === 0) {
        employeeTableBody.innerHTML = '<tr><td colspan="10" class="text-center text-muted">No employee records found</td></tr>';
    } else {
        paginatedEmployees.forEach((emp, index) => {
            const row = employeeTableBody.insertRow();
            row.dataset.employeeId = emp.id; // Store ID for easy access
            row.innerHTML = `
                <td>${emp.id}</td>
                <td>${emp.fullName}</td>
                <td>${emp.email}</td>
                <td>${emp.department}</td>
                <td>${emp.designation}</td>
                <td>${emp.salaryCurrency}${emp.monthlySalary.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                <td><span class="badge bg-${emp.employmentStatus === 'Active' ? 'success' : (emp.employmentStatus === 'Inactive' ? 'danger' : 'warning')}">${emp.employmentStatus}</span></td>
                <td><span class="badge bg-${emp.paymentStatus === 'Paid' ? 'primary' : 'secondary'}">${emp.paymentStatus}</span></td>
                <td>${emp.paidDate}</td>
                <td>
                    <button class="btn btn-sm btn-outline-primary edit-btn" data-id="${emp.id}"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-sm btn-outline-danger delete-btn" data-id="${emp.id}"><i class="fas fa-trash-alt"></i></button>
                </td>
            `;
        });
    }

    // Update pagination controls
    currentPageDisplay.textContent = `Page ${currentPage} of ${totalPages || 1}`;
    prevPageBtn.classList.toggle('disabled', currentPage === 1);
    nextPageBtn.classList.toggle('disabled', currentPage === totalPages || totalPages === 0);

    // Add event listeners for new edit/delete buttons
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', (e) => editEmployee(e.currentTarget.dataset.id));
    });
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', (e) => deleteEmployee(e.currentTarget.dataset.id));
    });
}

function changePage(newPage) {
    const searchTerm = searchEmployeeInput.value.toLowerCase();
    const filteredEmployees = employees.filter(emp =>
        emp.id.toLowerCase().includes(searchTerm) ||
        emp.fullName.toLowerCase().includes(searchTerm) ||
        emp.email.toLowerCase().includes(searchTerm) ||
        emp.designation.toLowerCase().includes(searchTerm) ||
        emp.department.toLowerCase().includes(searchTerm)
    );
    const totalPages = Math.ceil(filteredEmployees.length / employeesPerPage);

    if (newPage >= 1 && newPage <= totalPages || totalPages === 0 && newPage === 1) {
        currentPage = newPage;
        renderEmployeeTable(currentPage);
    }
}

function editEmployee(id) {
    const employeeToEdit = employees.find(emp => emp.id === id);
    if (employeeToEdit) {
        // Populate the form with employee data
        employeeIdInput.value = employeeToEdit.id;
        fullNameInput.value = employeeToEdit.fullName;
        emailInput.value = employeeToEdit.email;
        designationInput.value = employeeToEdit.designation;
        departmentInput.value = employeeToEdit.department;
        employmentStatusSelect.value = employeeToEdit.employmentStatus;
        salaryCurrencySelect.value = employeeToEdit.salaryCurrency;
        monthlySalaryInput.value = employeeToEdit.monthlySalary;
        paymentStatusSelect.value = employeeToEdit.paymentStatus;
        paidDateInput.value = employeeToEdit.paidDate;
        phoneNumberInput.value = employeeToEdit.phoneNumber;

        // Remove the old employee from the array
        employees = employees.filter(emp => emp.id !== id);
        renderEmployeeTable(currentPage); // Re-render table after removal
        updateStatsDisplay();
        showStatus(`Editing employee: ${employeeToEdit.fullName}. Update details and click 'Add Employee' to save changes.`, 'info');
    }
}

function deleteEmployee(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            employees = employees.filter(emp => emp.id !== id);
            renderEmployeeTable(currentPage);
            updateStatsDisplay();
            Swal.fire(
                'Deleted!',
                'Employee record has been deleted.',
                'success'
            );
            showStatus('Employee record deleted.', 'danger');
        }
    });
}

function generatePayrollReport() {
    if (employees.length === 0) {
        payrollReportOutput.innerHTML = '<p class="text-muted text-center">No employee records to display</p>';
        reportTotalEmployeesDisplay.textContent = '0';
        reportTotalPayrollDisplay.textContent = '$0';
        payrollReportContainer.style.display = 'block';
        showError('No employees to generate a report for.');
        return;
    }

    let reportHtml = `
        <style>
            .payroll-report-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            .payroll-report-table th, .payroll-report-table td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
                font-size: 0.9em;
            }
            .payroll-report-table th {
                background-color: #f2f2f2;
                font-weight: bold;
            }
            .payroll-report-table tr:nth-child(even) {
                background-color: #f9f9f9;
            }
            .payroll-report-table .text-center { text-align: center; }
            .payroll-report-table .text-end { text-align: right; }
        </style>
        <table class="payroll-report-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Monthly Salary</th>
                    <th>Status</th>
                    <th>Payment</th>
                    <th>Paid Date</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
    `;

    let totalPayroll = 0;
    employees.forEach(emp => {
        reportHtml += `
            <tr>
                <td>${emp.id}</td>
                <td>${emp.fullName}</td>
                <td>${emp.email}</td>
                <td>${emp.department}</td>
                <td>${emp.designation}</td>
                <td>${emp.salaryCurrency}${emp.monthlySalary.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                <td>${emp.employmentStatus}</td>
                <td>${emp.paymentStatus}</td>
                <td>${emp.paidDate}</td>
                <td>${emp.phoneNumber || '-'}</td>
            </tr>
        `;
        totalPayroll += emp.monthlySalary;
    });

    reportHtml += `
            </tbody>
        </table>
    `;

    payrollReportOutput.innerHTML = reportHtml;
    reportTotalEmployeesDisplay.textContent = employees.length;
    reportTotalPayrollDisplay.textContent = `${salaryCurrencySelect.value}${totalPayroll.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}`;
    payrollReportContainer.style.display = 'block';
    showStatus('Payroll report generated successfully!', 'success');
}

function downloadPayrollExcel() {
    if (employees.length === 0) {
        showError('No employee records to download.');
        Swal.fire({
            title: 'No Data',
            text: 'There are no employee records to download.',
            icon: 'info',
            confirmButtonText: 'OK'
        });
        return;
    }

    let csvContent = "data:text/csv;charset=utf-8,";
    // Add header row
    csvContent += "ID,Full Name,Email,Designation,Department,Employment Status,Monthly Salary,Salary Currency,Payment Status,Paid Date,Phone Number\n";

    // Add employee data
    employees.forEach(emp => {
        const row = [
            `"${emp.id}"`,
            `"${emp.fullName}"`,
            `"${emp.email}"`,
            `"${emp.designation}"`,
            `"${emp.department}"`,
            `"${emp.employmentStatus}"`,
            emp.monthlySalary,
            `"${emp.salaryCurrency}"`,
            `"${emp.paymentStatus}"`,
            `"${emp.paidDate}"`,
            `"${emp.phoneNumber}"`
        ];
        csvContent += row.join(",") + "\n";
    });

    const encodedUri = encodeURI(csvContent);
    const link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "payroll_report.csv");
    document.body.appendChild(link); // Required for Firefox
    link.click();
    document.body.removeChild(link); // Clean up
    showStatus('Payroll report downloaded as Excel (CSV).', 'success');
}

function printPayrollReport() {
    if (employees.length === 0) {
        showError('No employee records to print.');
        Swal.fire({
            title: 'No Data',
            text: 'There are no employee records to print.',
            icon: 'info',
            confirmButtonText: 'OK'
        });
        return;
    }

    const printContent = document.getElementById('payrollReportOutput').innerHTML;
    // Ensure the report is generated before attempting to print
    if (printContent.includes('No employee records to display') || !payrollReportContainer.style.display || payrollReportContainer.style.display === 'none') {
        generatePayrollReport(); // Generate report if not already visible
    }

    // Use a timeout to ensure content is rendered before printing in the new window
    setTimeout(() => {
        const printWindow = window.open('', '_blank');
        printWindow.document.write('<html><head><title>Payroll Report</title>');
        // Include Bootstrap CSS for basic styling in print
        printWindow.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">');
        printWindow.document.write('<style>');
        printWindow.document.write(`
            body { font-family: Arial, sans-serif; margin: 20px; }
            .payroll-report-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
            .payroll-report-table th, .payroll-report-table td { border: 1px solid #ddd; padding: 8px; text-align: left; font-size: 0.9em; }
            .payroll-report-table th { background-color: #f2f2f2; font-weight: bold; }
            .payroll-report-table tr:nth-child(even) { background-color: #f9f9f9; }
            .payroll-report-table .text-center { text-align: center; }
            .payroll-report-table .text-end { text-align: right; }
            .report-summary { margin-top: 20px; font-weight: bold; }
            @media print {
                .no-print { display: none !important; }
            }
        `);
        printWindow.document.write('</style></head><body>');
        printWindow.document.write('<h1 class="text-center mb-4">Employee Payroll Report</h1>');
        printWindow.document.write(document.getElementById('payrollReportOutput').innerHTML); // Use the updated innerHTML
        printWindow.document.write(`
            <div class="row mt-3 report-summary">
                <div class="col-6 text-start">
                    Total Employees: ${reportTotalEmployeesDisplay.textContent}
                </div>
                <div class="col-6 text-end">
                    Total Payroll: ${reportTotalPayrollDisplay.textContent}
                </div>
            </div>
        `);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        // Removed printWindow.close(); to allow the print dialog to fully render
        showStatus('Payroll report sent to printer.', 'success');
    }, 100); // Small delay to ensure content is ready
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