<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumpsum Calculator - Calculate One Time Investment Returns</title>
    <meta name="description" content="Free lumpsum calculator online. Calculate one-time investment returns with compound interest. Plan your mutual fund, FD investments!">
    <meta name="keywords" content="lumpsum calculator, one time investment calculator, lumpsum returns, mutual fund lumpsum, fd lumpsum, compound interest calculator, investment planner">
    
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
            <i class="fas fa-hand-holding-usd fa-4x mb-3"></i>
            <h2 class="display-5 mb-3">💰 Lumpsum Calculator - Calculate One Time Investment Returns Free</h2>
            <p class="lead mb-0">Calculate returns on one-time investments with power of compounding. Perfect for mutual funds, FDs, lumpsum planning!</p>
        </div>
    </div>

    <div class="container mb-5">
        <!-- Feature Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center feature-card">
                    <div class="card-body">
                        <i class="fas fa-calculator fa-3x text-primary mb-3"></i>
                        <h6 class="fw-bold">Accurate Calculation</h6>
                        <p class="small mb-0">Compound interest formula</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center feature-card">
                    <div class="card-body">
                        <i class="fas fa-chart-line fa-3x text-success mb-3"></i>
                        <h6 class="fw-bold">Visual Growth</h6>
                        <p class="small mb-0">Year-by-year breakdown</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center feature-card">
                    <div class="card-body">
                        <i class="fas fa-clock fa-3x text-info mb-3"></i>
                        <h6 class="fw-bold">Any Tenure</h6>
                        <p class="small mb-0">1 to 30+ years</p>
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
                <h3 class="h2 mb-0 text-center fw-bold"><i class="fas fa-cogs me-2 text-primary"></i>How Lumpsum Calculation Works</h3>
            </div>
            <div class="card-body p-4 p-md-5">
                <p class="lead text-center mb-5">Calculate your one-time investment returns in 3 simple steps.</p>
                
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="text-center mb-3">
                            <div class="step-number mx-auto">1</div>
                        </div>
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-rupee-sign fa-3x text-primary mb-3"></i>
                                <h5 class="fw-bold">Enter Investment Amount</h5>
                                <p class="small text-muted mb-0">Input one-time amount (₹1,000 to ₹1 Crore+).</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="text-center mb-3">
                            <div class="step-number mx-auto">2</div>
                        </div>
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-percent fa-3x text-success mb-3"></i>
                                <h5 class="fw-bold">Expected Return Rate</h5>
                                <p class="small text-muted mb-0">Specify annual return (6% for FD, 12-15% for equity).</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="text-center mb-3">
                            <div class="step-number mx-auto">3</div>
                        </div>
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-clock fa-3x text-info mb-3"></i>
                                <h5 class="fw-bold">Investment Period</h5>
                                <p class="small text-muted mb-0">Choose duration (1 to 30+ years for long-term goals).</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-success mt-4">
                    <h6 class="alert-heading"><i class="fas fa-lightbulb me-2"></i>Compound Interest Formula:</h6>
                    <div class="formula-box bg-white p-3 rounded border">
                        <strong>A = P(1 + r/n)^(nt)</strong>
                        <p class="mt-2 mb-0 small">Where:<br>A = Maturity Amount<br>P = Principal (Initial Investment)<br>r = Annual interest rate (decimal)<br>n = Compounding frequency per year<br>t = Tenure in years</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Benefits Section -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 py-3">
                <h3 class="h2 mb-0 text-center fw-bold"><i class="fas fa-star me-2 text-warning"></i>Benefits</h3>
            </div>
            <div class="card-body p-4 p-md-5">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h5 class="fw-bold text-primary mb-3">Why Use Lumpsum Calculator?</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Wealth Projection:</strong> Know exact maturity value before investing
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Goal Planning:</strong> Determine if corpus meets future needs
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Comparison:</strong> Evaluate different investment options
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Reality Check:</strong> Understand actual returns after compounding
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Motivation:</strong> Visualize wealth creation potential
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold text-success mb-3">Tool Features</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Flexible Inputs:</strong> Any amount, custom period, expected return
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Detailed Breakdown:</strong> Invested vs gains visualization
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Year-wise Table:</strong> See wealth growth trajectory
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Inflation Impact:</strong> Calculate real returns (post-inflation)
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>100% Free:</strong> Unlimited calculations, no registration
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="text-center mt-4 p-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 15px;">
                    <h4 class="text-white mb-3"><i class="fas fa-calculator me-2"></i>Calculate Lumpsum Returns Now!</h4>
                    <p class="text-white mb-0">Plan your one-time investment—free forever!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
