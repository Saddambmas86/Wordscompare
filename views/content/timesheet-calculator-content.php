<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timesheet Calculator - Calculate Employee Work Hours & Pay</title>
    <meta name="description" content="Free timesheet calculator online. Calculate employee work hours, overtime, and payroll. Track time entries, breaks, and total wages!">
    <meta name="keywords" content="timesheet calculator, work hours calculator, overtime calculator, employee time tracker, payroll calculator, time card calculator, hourly wage calculator, timesheet template">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
        }
        .benefit-check {
            color: #28a745;
            font-size: 1.3rem;
        }
    </style>
</head>
<body>
    <!-- Intro Section -->
    <div class="card border-0 shadow-sm text-white mb-4" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
        <div class="card-body p-4 p-md-5 text-center">
            <i class="fas fa-clock fa-4x mb-3"></i>
            <h2 class="display-5 mb-3">⏰ Timesheet Calculator - Calculate Employee Work Hours & Pay Free</h2>
            <p class="lead mb-0">Track work hours, calculate regular and overtime pay. Perfect for hourly employees, freelancers, and HR departments!</p>
        </div>
    </div>

    <div class="container mb-5">
        <!-- Feature Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center feature-card">
                    <div class="card-body">
                        <i class="fas fa-calculator fa-3x text-primary mb-3"></i>
                        <h6 class="fw-bold">Auto Calculation</h6>
                        <p class="small mb-0">Hours, overtime, pay</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center feature-card">
                    <div class="card-body">
                        <i class="fas fa-chart-bar fa-3x text-success mb-3"></i>
                        <h6 class="fw-bold">Weekly/Monthly</h6>
                        <p class="small mb-0">Flexible pay periods</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center feature-card">
                    <div class="card-body">
                        <i class="fas fa-download fa-3x text-info mb-3"></i>
                        <h6 class="fw-bold">Export Options</h6>
                        <p class="small mb-0">Excel, PDF formats</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center feature-card">
                    <div class="card-body">
                        <i class="fas fa-shield-alt fa-3x text-warning mb-3"></i>
                        <h6 class="fw-bold">Private</h6>
                        <p class="small mb-0">No data stored or shared</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- How It Works -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-0 py-3">
                <h3 class="h2 mb-0 text-center fw-bold"><i class="fas fa-cogs me-2 text-primary"></i>How Timesheet Calculator Works</h3>
            </div>
            <div class="card-body p-4 p-md-5">
                <p class="lead text-center mb-5">Calculate work hours and pay in simple steps.</p>
                
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="text-center mb-3">
                            <div class="step-number mx-auto">1</div>
                        </div>
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-user-clock fa-3x text-primary mb-3"></i>
                                <h5 class="fw-bold">Enter Time Entries</h5>
                                <p class="small text-muted mb-0">Input clock-in/clock-out times for each day.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="text-center mb-3">
                            <div class="step-number mx-auto">2</div>
                        </div>
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-coins fa-3x text-success mb-3"></i>
                                <h5 class="fw-bold">Set Pay Rate</h5>
                                <p class="small text-muted mb-0">Specify hourly rate and overtime multiplier (1.5x, 2x).</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="text-center mb-3">
                            <div class="step-number mx-auto">3</div>
                        </div>
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-file-invoice-dollar fa-3x text-info mb-3"></i>
                                <h5 class="fw-bold">Calculate Total Pay</h5>
                                <p class="small text-muted mb-0">Get regular hours, overtime, and total earnings!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Benefits -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 py-3">
                <h3 class="h2 mb-0 text-center fw-bold"><i class="fas fa-star me-2 text-warning"></i>Benefits</h3>
            </div>
            <div class="card-body p-4 p-md-5">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h5 class="fw-bold text-primary mb-3">Why Use Timesheet Calculator?</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Accurate Tracking:</strong> Precise work hour calculations
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Overtime Management:</strong> Automatic overtime detection and calculation
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Payroll Ready:</strong> Export timesheets for payroll processing
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Labor Law Compliance:</strong> Track breaks, overtime as per regulations
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Freelancer Billing:</strong> Track billable hours for clients
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold text-success mb-3">Tool Features</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Flexible Entry:</strong> Multiple time entries per day supported
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Break Deduction:</strong> Auto-deduct unpaid break/lunch time
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Custom Overtime:</strong> Set daily/weekly overtime thresholds
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Detailed Report:</strong> Day-by-day breakdown with totals
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>100% Free:</strong> Unlimited timesheet generation, no registration
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="text-center mt-4 p-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 15px;">
                    <h4 class="text-white mb-3"><i class="fas fa-clock me-2"></i>Calculate Timesheet Now!</h4>
                    <p class="text-white mb-0">Track work hours easily—free forever!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
