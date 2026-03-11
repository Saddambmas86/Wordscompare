<?php
// includes/header.php
include_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars(empty($page_title) ? "$site_name - $default_title_suffix" : "$page_title | $site_name") ?></title>
    <meta name="description" content="<?php echo $page_description; ?>">
    <meta name="keywords" content="<?php echo $page_keywords; ?>">
    <?php
    // Canonical URL
    if (isset($canonical_url) && !empty($canonical_url)) {
        echo '<link rel="canonical" href="' . $canonical_url . '">';
    } else {
        $current_page_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        echo '<link rel="canonical" href="' . $current_page_url . '">';
    }
    ?>
    
    <meta name="author" content="Code Hub">
    <meta name="robots" content="index, follow">
    <meta property="og:type" content="website">
    <meta name='theme-color' content='#dc3545'/>

    <!-- Resource Hints -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://pagead2.googlesyndication.com">

    <!-- Bootstrap CSS (Critical) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/homepage.css">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo $base_url; ?>assets/img/logo.ico" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo $base_url; ?>assets/img/logo.ico" type="image/x-icon">

    <!-- Schema Markup -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "WordsCompare",
        "url": "https://www.wordscompare.com",
        "logo": "https://www.wordscompare.com/assets/img/logo.ico",
        "description": "Free online tools for PDF conversion, calculators, and text utilities",
        "sameAs": []
    }
    </script>

    <!-- Essential Libraries (Synchronous to avoid breaking tool scripts) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

</head>
<body>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2923840482782912" crossorigin="anonymous"></script>
    
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo $base_url; ?>">
                <i class="fas fa-toolbox me-2"></i><?php echo $site_name; ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" href="<?php echo $base_url; ?>">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>

                    <!-- PDF Tools Dropdown -->
                    <li class="nav-item dropdown">
                        <button class="category-dropdown-toggle" id="pdfDropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-file-pdf"></i>PDF Tools
                        </button>
                        <div class="dropdown-menu grid-layout" aria-labelledby="pdfDropdown">
                            <div class="tools-search-box grid-search-box">
                                <input type="text" placeholder="Search PDF tools..." class="search-input" data-category="pdf">
                            </div>

                            <div class="dropdown-column">
                                <div class="grid-column-header"><i class="fas fa-file-contract"></i>Office</div>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-to-csv"><i class="fas fa-file-csv text-danger"></i><span>PDF to CSV</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>csv-to-pdf"><i class="fas fa-file-csv text-danger"></i><span>CSV to PDF</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-to-excel"><i class="fas fa-file-excel text-success"></i><span>PDF to Excel</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>excel-to-pdf"><i class="fas fa-file-excel text-success"></i><span>Excel to PDF</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-to-ppt"><i class="fas fa-file-powerpoint text-danger"></i><span>PDF to PPT</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-to-html"><i class="fas fa-html5 text-danger"></i><span>PDF to HTML</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>html-to-pdf"><i class="fas fa-html5 text-danger"></i><span>HTML to PDF</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>rtf-to-pdf"><i class="fas fa-file-pdf text-primary"></i><span>RTF to PDF</span></a>
                            </div>

                            <div class="dropdown-column">
                                <div class="grid-column-header"><i class="fas fa-code"></i>Data</div>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-to-json"><i class="fas fa-code text-info"></i><span>PDF to JSON</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>json-to-pdf"><i class="fas fa-file-code text-secondary"></i><span>JSON to PDF</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-to-xml"><i class="fas fa-file-code text-secondary"></i><span>PDF to XML</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>xml-to-pdf"><i class="fas fa-file-code text-secondary"></i><span>XML to PDF</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-to-text"><i class="fas fa-file-alt text-dark"></i><span>PDF to Text</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>text-to-pdf"><i class="fas fa-file-alt text-muted"></i><span>Text to PDF</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-to-markdown"><i class="fas fa-file-alt text-secondary"></i><span>PDF to Markdown</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-to-json"><i class="fas fa-code text-info"></i><span>PDF to OCR</span></a>
                            </div>

                            <div class="dropdown-column">
                                <div class="grid-column-header"><i class="fas fa-image"></i>Images</div>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-to-jpg"><i class="fas fa-file-image text-warning"></i><span>PDF to JPG</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>jpg-to-pdf"><i class="fas fa-file-image text-warning"></i><span>JPG to PDF</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-to-png"><i class="fas fa-image text-danger"></i><span>PDF to PNG</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-to-webp"><i class="fas fa-file-image text-success"></i><span>PDF to WebP</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-to-jfif"><i class="fas fa-file-image text-danger"></i><span>PDF to JFIF</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>jfif-to-pdf"><i class="fas fa-file-pdf text-primary"></i><span>JFIF to PDF</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-to-svg"><i class="fas fa-bezier-curve text-success"></i><span>PDF to SVG</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>svg-to-pdf"><i class="fas fa-file-pdf text-primary"></i><span>SVG to PDF</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-to-tiff"><i class="fas fa-file-image text-danger"></i><span>PDF to TIFF</span></a>
                            </div>

                            <div class="dropdown-column">
                                <div class="grid-column-header"><i class="fas fa-book"></i>E-Books & More</div>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>epub-to-pdf"><i class="fas fa-file-pdf text-primary"></i><span>EPUB to PDF</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-to-epub"><i class="fas fa-book-reader text-success"></i><span>PDF to EPUB</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>ipynb-to-pdf"><i class="fas fa-file-pdf text-primary"></i><span>IPYNB to PDF</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-to-ipynb"><i class="fas fa-file-code text-info"></i><span>PDF to IPYNB</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pnr-to-pdf"><i class="fas fa-file-pdf text-primary"></i><span>PNR to PDF</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>dwg-to-pdf"><i class="fas fa-file-pdf text-primary"></i><span>DWG to PDF</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-to-psd"><i class="fas fa-file-image text-danger"></i><span>PDF to PSD</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>shreelipi-to-pdf"><i class="fas fa-file-pdf text-primary"></i><span>Shreelipi to PDF</span></a>
                            </div>

                            <div class="dropdown-column">
                                <div class="grid-column-header"><i class="fas fa-tools"></i>PDF Tools</div>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-metadata-editor"><i class="fas fa-edit text-primary"></i><span>Metadata Editor</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>add-page-number-to-pdf"><i class="fas fa-sort-numeric-down text-primary"></i><span>Page Numbers</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>add-watermark-to-pdf"><i class="fas fa-tint text-info"></i><span>Add Watermark</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>delete-pdf-pages"><i class="fas fa-trash-alt text-danger"></i><span>Delete Pages</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>repair-pdf"><i class="fas fa-tools text-info"></i><span>Repair PDF</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>lock-pdf"><i class="fas fa-lock text-warning"></i><span>Lock PDF</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>reorder-pdf-pages"><i class="fas fa-sort text-success"></i><span>Reorder PDF Pages</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>merge-pdf"><i class="fas fa-compress-arrows-alt text-primary"></i><span>Merge PDF</span></a>
                                <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pdf-to-audio"><i class="fas fa-headphones-alt text-danger"></i><span>PDF to Audio</span></a>
                            </div>
                        </div>
                    </li>

                    <!-- Calculator Tools Dropdown -->
                    <li class="nav-item dropdown">
                        <button class="category-dropdown-toggle" id="calculatorDropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-calculator"></i>Calculators
                        </button>
                        <div class="dropdown-menu" aria-labelledby="calculatorDropdown">
                            <div class="tools-search-box">
                                <input type="text" placeholder="Search calculators..." class="search-input" data-category="calculator">
                            </div>
                            <div class="dropdown-category-header"><i class="fas fa-calculator"></i>Basic Calculators</div>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>simple-calculator"><i class="fas fa-calculator text-success"></i><span>Simple Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>scientific-calculator"><i class="fas fa-square-root-alt text-secondary"></i><span>Scientific Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>percentage-calculator"><i class="fas fa-percent text-info"></i><span>Percentage Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>age-calculator"><i class="fas fa-birthday-cake text-primary"></i><span>Age Calculator</span></a>

                            <div class="dropdown-divider"></div>
                            <div class="dropdown-category-header"><i class="fas fa-chart-line"></i>Investment Calculators</div>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>sip-calculator"><i class="fas fa-calendar-plus text-primary"></i><span>SIP Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>lumpsum-calculator"><i class="fas fa-money-bill-wave text-success"></i><span>Lumpsum Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>swp-calculator"><i class="fas fa-calendar-minus text-info"></i><span>SWP Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>mutual-fund-returns-calculator"><i class="fas fa-chart-line text-warning"></i><span>Mutual Fund Returns</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>step-up-sip-calculator"><i class="fas fa-sort-amount-up text-warning"></i><span>Step-up SIP</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>cagr-calculator"><i class="fas fa-chart-line text-primary"></i><span>CAGR Calculator</span></a>

                            <div class="dropdown-divider"></div>
                            <div class="dropdown-category-header"><i class="fas fa-home"></i>Loan Calculators</div>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>emi-calculator"><i class="fas fa-money-bill-wave text-warning"></i><span>EMI Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>home-loan-emi-calculator"><i class="fas fa-house-user text-danger"></i><span>Home Loan EMI</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>car-loan-emi-calculator"><i class="fas fa-car text-warning"></i><span>Car Loan EMI</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>personal-loan-calculator"><i class="fas fa-calculator text-success"></i><span>Personal Loan</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>home-equity-loan-calculator"><i class="fas fa-home text-info"></i><span>Home Equity Loan</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>reverse-mortgage-calculator"><i class="fas fa-percentage text-warning"></i><span>Reverse Mortgage</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>refinance-calculator"><i class="fas fa-calculator text-success"></i><span>Refinance Calculator</span></a>

                            <div class="dropdown-divider"></div>
                            <div class="dropdown-category-header"><i class="fas fa-piggy-bank"></i>Savings & Investments</div>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>ppf-calculator"><i class="fas fa-piggy-bank text-success"></i><span>PPF Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>epf-calculator"><i class="fas fa-building text-info"></i><span>EPF Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>fd-calculator"><i class="fas fa-lock text-warning"></i><span>FD Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>rd-calculator"><i class="fas fa-calendar-week text-danger"></i><span>RD Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>nps-calculator"><i class="fas fa-user-tie text-primary"></i><span>NPS Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>nsc-calculator"><i class="fas fa-certificate text-info"></i><span>NSC Calculator</span></a>

                            <div class="dropdown-divider"></div>
                            <div class="dropdown-category-header"><i class="fas fa-percent"></i>Interest & Tax</div>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>simple-interest-calculator"><i class="fas fa-percentage text-primary"></i><span>Simple Interest</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>compound-interest-calculator"><i class="fas fa-chart-bar text-success"></i><span>Compound Interest</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>income-tax-calculator"><i class="fas fa-file-invoice-dollar text-primary"></i><span>Income Tax</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>gst-calculator"><i class="fas fa-receipt text-success"></i><span>GST Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>tds-calculator"><i class="fas fa-file-invoice text-primary"></i><span>TDS Calculator</span></a>

                            <div class="dropdown-divider"></div>
                            <div class="dropdown-category-header"><i class="fas fa-briefcase"></i>Salary & Benefits</div>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>salary-calculator"><i class="fas fa-money-check-alt text-warning"></i><span>Salary Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>hra-calculator"><i class="fas fa-home text-success"></i><span>HRA Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>gratuity-calculator"><i class="fas fa-hand-holding-usd text-danger"></i><span>Gratuity Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>retirement-calculator"><i class="fas fa-umbrella-beach text-info"></i><span>Retirement Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>pto-calculator"><i class="fas fa-calendar-alt text-info"></i><span>PTO Calculator</span></a>

                            <div class="dropdown-divider"></div>
                            <div class="dropdown-category-header"><i class="fas fa-chart-pie"></i>Other Calculators</div>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>bmi-calculator"><i class="fas fa-weight text-danger"></i><span>BMI Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>sukanya-samriddhi-yojana-calculator"><i class="fas fa-female text-danger"></i><span>SSY Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>discount-calculator"><i class="fas fa-tag text-warning"></i><span>Discount Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>apy-calculator"><i class="fas fa-percentage text-success"></i><span>APY Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>unit-converter"><i class="fas fa-balance-scale text-danger"></i><span>Unit Converter</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>inflation-calculator"><i class="fas fa-chart-pie text-info"></i><span>Inflation Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>investment-returns-calculator"><i class="fas fa-chart-line text-warning"></i><span>Investment Returns</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>loan-eligibility-calculator"><i class="fas fa-hand-holding-usd text-success"></i><span>Loan Eligibility</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>flat-vs-reducing-rate-calculator"><i class="fas fa-balance-scale-right text-info"></i><span>Flat vs Reducing Rate</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>brokerage-calculator"><i class="fas fa-handshake text-warning"></i><span>Brokerage Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>margin-calculator"><i class="fas fa-border-style text-danger"></i><span>Margin Calculator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>tax-calculator"><i class="fas fa-calculator text-primary"></i><span>Tax Calculator</span></a>
                        </div>
                    </li>

                    <!-- Text Tools Dropdown -->
                    <li class="nav-item dropdown">
                        <button class="category-dropdown-toggle" id="textDropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-font"></i>Text Tools
                        </button>
                        <div class="dropdown-menu" aria-labelledby="textDropdown">
                            <div class="tools-search-box">
                                <input type="text" placeholder="Search text tools..." class="search-input" data-category="text">
                            </div>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>word-counter"><i class="fas fa-calculator text-info"></i><span>Word Counter</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>case-converter"><i class="fas fa-text-height text-warning"></i><span>Case Converter</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>remove-extra-spaces"><i class="fas fa-compress text-success"></i><span>Remove Extra Spaces</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>find-replace-text"><i class="fas fa-search-plus text-primary"></i><span>Find & Replace</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>reverse-text"><i class="fas fa-exchange-alt text-danger"></i><span>Reverse Text</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>text-to-slug"><i class="fas fa-link text-secondary"></i><span>Text to Slug</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>text-comparision"><i class="fas fa-file-alt text-info"></i><span>Text Compare</span></a>
                        </div>
                    </li>

                    <!-- Business Tools Dropdown -->
                    <li class="nav-item dropdown">
                        <button class="category-dropdown-toggle" id="businessDropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-briefcase"></i>Business
                        </button>
                        <div class="dropdown-menu" aria-labelledby="businessDropdown">
                            <div class="tools-search-box">
                                <input type="text" placeholder="Search business tools..." class="search-input" data-category="business">
                            </div>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>calendar-generator"><i class="fas fa-calendar text-info"></i><span>Calendar Generator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>offer-letter-generator"><i class="fas fa-file-contract text-success"></i><span>Offer Letter Generator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>payroll-sheet-generator"><i class="fas fa-file-invoice-dollar text-warning"></i><span>Payroll Sheet Generator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>timesheet-calculator"><i class="fas fa-clock text-primary"></i><span>Timesheet Calculator</span></a>
                        </div>
                    </li>

                    <!-- Web Tools Dropdown -->
                    <li class="nav-item dropdown">
                        <button class="category-dropdown-toggle" id="webDropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-code"></i>Web Tools
                        </button>
                        <div class="dropdown-menu" aria-labelledby="webDropdown">
                            <div class="tools-search-box">
                                <input type="text" placeholder="Search web tools..." class="search-input" data-category="web">
                            </div>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>json-formatter"><i class="fas fa-code text-warning"></i><span>JSON Formatter</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>password-generator"><i class="fas fa-lock text-success"></i><span>Password Generator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>qr-code-generator"><i class="fas fa-qrcode text-purple"></i><span>QR Code Generator</span></a>
                            <a class="dropdown-item-custom" href="<?php echo $base_url; ?>color-picker"><i class="fas fa-palette text-info"></i><span>Color Picker</span></a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_url; ?>contact">
                            <i class="fas fa-envelope me-1"></i>Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>