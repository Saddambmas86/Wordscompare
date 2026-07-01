<?php
// includes/header.php
include_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= htmlspecialchars(empty($page_title) ? "$site_name - $default_title_suffix" : "$page_title | $site_name") ?>
    </title>
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
    <meta name='theme-color' content='#dc3545' />

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
    
    <style>
        /* Remove dropdown arrows from navigation - Bootstrap 5
        #developerToolsDropdown.dropdown-toggle::after,
        #developerToolsDropdown.dropdown-toggle::before,
        #pdfToolsDropdown.dropdown-toggle::after,
        #pdfToolsDropdown.dropdown-toggle::before,
        #calculatorDropdown.dropdown-toggle::after,
        #calculatorDropdown.dropdown-toggle::before {
            display: none !important;
            content: none !important;
            border: none !important;
        } */
        
        /* Also target by data attribute */
        a[data-bs-toggle="dropdown"]::after {
            display: none !important;
            content: none !important;
            border: none !important;
        }
        
        /* Fix navbar alignment */
        .navbar {
            align-items: center !important;
        }
        
        .navbar-brand {
            margin-right: 0 !important;
            padding-right: 0 !important;
            display: inline-flex !important;
            align-items: center !important;
            height: auto !important;
        }
        
        .navbar .nav-link {
            padding-top: 0.5rem !important;
            padding-bottom: 0.5rem !important;
            display: inline-flex !important;
            align-items: center !important;
            height: auto !important;
        }
        
        .navbar .container-fluid {
            display: flex !important;
            align-items: center !important;
            flex-wrap: nowrap !important;
        }
        
        /* Ensure Home link aligns properly with brand */
        .navbar > .container-fluid > a[href="<?php echo $base_url; ?>"]:first-child {
            display: inline-flex !important;
            align-items: center !important;
            margin-right: 8px !important;
        }
    </style>

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
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2923840482782912"
        crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <a class="navbar-brand" href="<?php echo $base_url; ?>">
                    <i class="fas fa-toolbox me-2"></i><?php echo $site_name; ?>
                </a>
                <a class="nav-link text-white me-2" href="<?php echo $base_url; ?>">
                    <i class="fas fa-home"></i> Home
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">  
                        <a class="nav-link" href="<?php echo $base_url; ?>about">
                            <i class="fas fa-info-circle me-1"></i>About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_url; ?>privacy">
                            <i class="fas fa-user-shield me-1"></i>Privacy
                        </a>
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
