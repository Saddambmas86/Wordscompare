<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutual Fund Returns Calculator - Calculate MF Investment Returns</title>
    <meta name="description" content="Free mutual fund returns calculator online. Calculate absolute, CAGR, XIRR returns for lumpsum and SIP investments. Track MF portfolio performance!">
    <meta name="keywords" content="mutual fund returns calculator, mf return calculator, cagr calculator, xirr calculator, sip returns, lumpsum returns, mutual fund performance, portfolio calculator">
    
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
    <div class="card border-0 shadow-sm text-white mb-4" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
        <div class="card-body p-4 p-md-5 text-center">
            <i class="fas fa-chart-line fa-4x mb-3"></i>
            <h2 class="display-5 mb-3">📊 Mutual Fund Returns Calculator - Calculate MF Investment Returns Free</h2>
            <p class="lead mb-0">Calculate absolute returns, CAGR, XIRR for lumpsum and SIP investments. Track your mutual fund portfolio performance!</p>
        </div>
    </div>

    <div class="container mb-5">
        <!-- Feature Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center feature-card">
                    <div class="card-body">
                        <i class="fas fa-calculator fa-3x text-primary mb-3"></i>
                        <h6 class="fw-bold">Multiple Methods</h6>
                        <p class="small mb-0">Absolute, CAGR, XIRR</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center feature-card">
                    <div class="card-body">
                        <i class="fas fa-coins fa-3x text-success mb-3"></i>
                        <h6 class="fw-bold">SIP & Lumpsum</h6>
                        <p class="small mb-0">Both investment types</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center feature-card">
                    <div class="card-body">
                        <i class="fas fa-chart-pie fa-3x text-info mb-3"></i>
                        <h6 class="fw-bold">Portfolio Tracking</h6>
                        <p class="small mb-0">Multiple schemes support</p>
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

        <!-- Return Calculation Methods -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-0 py-3">
                <h3 class="h2 mb-0 text-center fw-bold"><i class="fas fa-list-ul me-2 text-primary"></i>Mutual Fund Return Calculation Methods</h3>
            </div>
            <div class="card-body p-4 p-md-5">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card border-primary border-2 h-100">
                            <div class="card-header bg-primary text-white">
                                <h5 class="fw-bold mb-0"><i class="fas fa-percent me-2"></i>Absolute Returns</h5>
                            </div>
                            <div class="card-body">
                                <p class="small">Simple return over investment period</p>
                                <div class="formula-box bg-light p-3 rounded mb-3">
                                    <strong>Formula:</strong> ((Current Value - Invested) ÷ Invested) × 100<br>
                                    <strong>Example:</strong> Invested ₹1L, Current ₹1.5L<br>Return = ((1.5L-1L)/1L)×100 = <strong>50%</strong>
                                </div>
                                <ul class="small">
                                    <li><strong>Best For:</strong> Single lumpsum investment</li>
                                    <li><strong>Holding Period:</strong> Less than 1 year</li>
                                    <li><strong>Limitation:</strong> Doesn't account for time value</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card border-success border-2 h-100">
                            <div class="card-header bg-success text-white">
                                <h5 class="fw-bold mb-0"><i class="fas fa-chart-line me-2"></i>CAGR (Compounded Annual Growth Rate)</h5>
                            </div>
                            <div class="card-body">
                                <p class="small">Annualized return accounting for compounding</p>
                                <div class="formula-box bg-light p-3 rounded mb-3">
                                    <strong>Formula:</strong> (Current Value / Invested)^(1/n) - 1<br>
                                    <strong>Example:</strong> ₹1L → ₹1.5L in 3 years<br>CAGR = (1.5/1)^(1/3) - 1 = <strong>14.47%</strong>
                                </div>
                                <ul class="small">
                                    <li><strong>Best For:</strong> Long-term investments (>1 year)</li>
                                    <li><strong>Advantage:</strong> Accounts for compounding effect</li>
                                    <li><strong>Use Case:</strong> Compare different funds fairly</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card border-info border-2 h-100">
                            <div class="card-header bg-info text-white">
                                <h5 class="fw-bold mb-0"><i class="fas fa-calculator me-2"></i>XIRR (Extended Internal Rate of Return)</h5>
                            </div>
                            <div class="card-body">
                                <p class="small">Most accurate for multiple cash flows</p>
                                <div class="alert alert-light border">
                                    <strong>Used For:</strong><br>
                                    • SIP investments (multiple dates)<br>
                                    • STP/SWP transactions<br>
                                    • Multiple purchases/redemptions<br>
                                    • Irregular cash flows
                                </div>
                                <ul class="small">
                                    <li><strong>Most Accurate:</strong> Considers exact investment dates</li>
                                    <li><strong>Excel Formula:</strong> =XIRR(values, dates)</li>
                                    <li><strong>Industry Standard:</strong> SEBI mandated for MF returns</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card border-warning border-2 h-100">
                            <div class="card-header bg-warning text-dark">
                                <h5 class="fw-bold mb-0"><i class="fas fa-exchange-alt me-2"></i>Point-to-Point Returns</h5>
                            </div>
                            <div class="card-body">
                                <p class="small">Returns between two specific dates</p>
                                <ul class="small">
                                    <li><strong>Purpose:</strong> Check fund performance in specific period</li>
                                    <li><strong>Example:</strong> "How did my fund perform in 2023?"</li>
                                    <li><strong>Use Case:</strong> Compare fund vs benchmark</li>
                                    <li><strong>Limitation:</strong> Short-term volatility may distort</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Use Cases -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-0 py-3">
                <h3 class="h2 mb-0 text-center fw-bold"><i class="fas fa-users me-2 text-success"></i>Mutual Fund Returns Calculator Use Cases</h3>
            </div>
            <div class="card-body p-4 p-md-5">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="fw-bold text-primary mb-3"><i class="fas fa-user-injured me-2"></i>Investors</h5>
                                <ul class="small">
                                    <li>Track portfolio performance across multiple AMCs</li>
                                    <li>Compare actual returns vs expected returns</li>
                                    <li>Evaluate fund manager performance</li>
                                    <li>Make informed rebalancing decisions</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="fw-bold text-success mb-3"><i class="fas fa-briefcase me-2"></i>Financial Advisors</h5>
                                <ul class="small">
                                    <li>Generate client portfolio reports</li>
                                    <li>Demonstrate value of advisory services</li>
                                    <li>Compare recommended funds vs existing holdings</li>
                                    <li>Asset allocation review and optimization</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="fw-bold text-info mb-3"><i class="fas fa-search me-2"></i>Fund Research</h5>
                                <ul class="small">
                                    <li>Analyze historical performance across market cycles</li>
                                    <li>Compare funds within same category</li>
                                    <li>Evaluate consistency of outperformance</li>
                                    <li>Risk-adjusted returns analysis (Sharpe ratio)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="fw-bold text-warning mb-3"><i class="fas fa-file-invoice me-2"></i>Tax Planning</h5>
                                <ul class="small">
                                    <li>Calculate capital gains for tax filing</li>
                                    <li>Determine LTCG vs STCG (holding period)</li>
                                    <li>Harvesting losses for tax optimization</li>
                                    <li>Indexation benefits for debt funds</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white border-0 py-3">
                <h3 class="h2 mb-0 text-center fw-bold"><i class="fas fa-question-circle me-2 text-info"></i>Frequently Asked Questions</h3>
            </div>
            <div class="card-body p-4 p-md-5">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item mb-3 border">
                        <h4 class="accordion-header">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                <span class="faq-badge me-3">Q1</span>
                                Which return method should I use?
                            </button>
                        </h4>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p class="text-success fw-bold"><i class="fas fa-check-circle me-2"></i>Depends on investment type:</p>
                                <ul>
                                    <li><strong>Lumpsum (Single Investment):</strong> Use CAGR for >1 year, Absolute for <1 year</li>
                                    <li><strong>SIP (Multiple Investments):</strong> Always use XIRR (most accurate)</li>
                                    <li><strong>Portfolio with Multiple Funds:</strong> XIRR for overall portfolio returns</li>
                                    <li><strong>Quick Estimation:</strong> Point-to-point returns work</li>
                                    <li><strong>SEBI Mandate:</strong> All AMCs must report CAGR/XIRR only</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item mb-3 border">
                        <h4 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                <span class="faq-badge me-3">Q2</span>
                                Why is my XIRR different from fund's CAGR?
                            </button>
                        </h4>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p class="text-info fw-bold"><i class="fas fa-info-circle me-2"></i>Timing differences matter:</p>
                                <ul>
                                    <li><strong>Fund CAGR:</strong> Calculated from NAV on specific dates (point-to-point)</li>
                                    <li><strong>Your XIRR:</strong> Based on YOUR investment dates and amounts</li>
                                    <li><strong>Market Timing:</strong> If you invested at market peak, your XIRR will be lower</li>
                                    <li><strong>SIP Advantage:</strong> Rupee cost averaging may give different returns than lumpsum</li>
                                    <li><strong>Entry/Exit Load:</strong> Your actual returns reduced by loads (if applicable)</li>
                                </ul>
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
                        <h5 class="fw-bold text-primary mb-3">Why Calculate MF Returns?</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Performance Review:</strong> Know if your funds are beating benchmarks
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Informed Decisions:</strong> Decide whether to hold, buy more, or exit
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Goal Tracking:</strong> Monitor progress towards financial goals
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Advisor Accountability:</strong> Verify if advisor's recommendations worked
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Tax Compliance:</strong> Accurate capital gains calculation
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold text-success mb-3">Tool Features</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>All Methods:</strong> Absolute, CAGR, XIRR in one place
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>SIP & Lumpsum:</strong> Support for both investment types
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Multiple Schemes:</strong> Calculate portfolio-level returns
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>Date-wise Accuracy:</strong> Exact investment dates considered
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle benefit-check me-2"></i>
                                <strong>100% Free:</strong> Unlimited calculations, no registration
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="text-center mt-4 p-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 15px;">
                    <h4 class="text-white mb-3"><i class="fas fa-chart-line me-2"></i>Calculate MF Returns Now!</h4>
                    <p class="text-white mb-0">Track your mutual fund performance—free forever!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
