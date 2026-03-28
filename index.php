<?php

$page_title = ""; // Edit in '/includes/config.php'
$page_description = "WordsCompare offers free online tools like PDF convertor, text utilities, calculators, and more — fast, secure, no signup";
$page_keywords = "Words Compare, PDF to XML, Speech to PDF, content tools, free web utilities";
include 'includes/header.php';

?>

<!-- <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($pageDescription); ?>">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo htmlspecialchars($pageUrl); ?>">
<meta property="og:site_name" content="Free Online Tools">
<meta property="og:locale" content="en_US">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630"> -->

<!-- Hero Section -->
<section class="hero-section py-3"
    style="background: #ffffff; border-bottom: 1px solid #e9ecef;">
    <div class="container px-3 text-center">
        <h1 class="display-5 fw-bold mb-2" style="color: #111111; letter-spacing: -0.5px;">Wordscompare one platform.
            Endless tools <span class="emoji">🛠️</span></h1>
        <p class="mb-0 mx-auto" style="max-width: 800px; color: #555555; line-height: 1.7; font-size: 1rem;">
            WordsCompare is a free
            online toolkit with 100+ browser-based tools including PDF converters, calculators, QR code generator, file
            converters, and code formatters</p>
    </div>
</section>

<!-- AdSense Test Ad: Responsive (test mode) -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2923840482782912"
    crossorigin="anonymous"></script>

<link rel="stylesheet" href="assets/css/homepage.css">

<!-- Category Navigation (Pills) -->
<nav class="category-nav-wrapper shadow-sm sticky-top"
    style="top: 56px; background: #ffffff; z-index: 1020; border-bottom: 1px solid #e9ecef;">
    <div class="container py-2 py-md-3">
        <ul class="nav nav-pills flex-nowrap overflow-auto hide-scrollbar" style="gap: 10px; white-space: nowrap; padding-bottom: 4px;">
            <li class="nav-item">
                <a class="nav-link active rounded-pill px-4 fw-bold shadow-sm" style="background:#dc3545; color:white;"
                    href="#">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill px-4 border text-dark fw-bold" style="border-color:#e0e0e0; background: #f8f9fa;"
                    href="#trending-tools">Trending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill px-4 border text-dark fw-medium" style="border-color:#d1d1d1;"
                    href="#pdf-editor-tools">PDF Editor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill px-4 border text-dark fw-medium" style="border-color:#d1d1d1;"
                    href="#pdf-conversions">PDF Conversions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill px-4 border text-dark fw-medium" style="border-color:#d1d1d1;"
                    href="#text-tools">Text Tools</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill px-4 border text-dark fw-medium" style="border-color:#d1d1d1;"
                    href="#business-tools">Business</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill px-4 border text-dark fw-medium" style="border-color:#d1d1d1;"
                    href="#developer-tools">Developer Tools</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill px-4 border text-dark fw-medium" style="border-color:#d1d1d1;"
                    href="#web-tools">Web</a>
            </li>
            <li class="nav-item">
                <a class="nav-link rounded-pill px-4 border text-dark fw-medium" style="border-color:#d1d1d1;"
                    href="#calculators">Calculators</a>
            </li>
        </ul>
    </div>
</nav>
<style>
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .category-nav-wrapper .nav-link {
        transition: all 0.2s ease;
    }

    .category-nav-wrapper .nav-link:not(.active):hover {
        background-color: #f0f0f0;
        border-color: #2d2d32 !important;
        color: #000 !important;
    }
</style>

<main class="container-fluid my-1 px-0">

    <?php $brandIcons = ['fa-html5', 'fa-dev', 'fa-whatsapp', 'fa-facebook']; ?>

    <!-- Trending Tools Section -->
    <section class="tools-section bg-light py-4" id="trending-tools">
        <div class="container">
            <h2 class="mb-5">Trending Tools <span class="emoji">🔥</span></h2>
            <div class="tools-grid">
                <?php
                $trendingTools = [
                    ['title' => 'EId Wishes card generator', 'description' => 'Generate beautiful Eid Mubarak wishes cards with name and photo.', 'icon' => 'fa-moon', 'color' => 'text-warning', 'url' => 'https://prophetstories.in/'],
                    ['title' => 'Text Compare', 'description' => 'Compare two texts side-by-side and highlight differences instantly.', 'icon' => 'fa-file-alt', 'color' => 'text-info', 'slug' => 'text-comparision'],
                ];
                foreach ($trendingTools as $tool) {
                    $iconPrefix = in_array($tool['icon'], $brandIcons) ? 'fab' : 'fas';
                    $url = isset($tool['url']) ? $tool['url'] : $base_url . $tool['slug'];
                    echo '<div><a href="' . $url . '" class="card-link"><div class="card tool-card h-100"><div class="card-body"><i class="' . $iconPrefix . ' ' . $tool['icon'] . ' ' . $tool['color'] . '"></i><h3 class="card-title h5">' . $tool['title'] . '</h3><p class="card-text">' . $tool['description'] . '</p></div></div></a></div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- PDF Editor Tools Section -->
    <section class="tools-section bg-white py-4" id="pdf-editor-tools">
        <div class="container">
            <h2 class="mb-5 mt-4">PDF Editor & Manipulation <span class="emoji">🛠️</span></h2>
            <div class="tools-grid">
                <?php
                $pdfEditorTools = [
                    [
                        'title' => 'PDF Metadata Editor',
                        'description' => 'Edit metadata information in your PDF files.',
                        'icon' => 'fa-edit',
                        'color' => 'text-primary',
                        'slug' => 'pdf-metadata-editor'
                    ],
                    [
                        'title' => 'Add Page Number to PDF',
                        'description' => 'Add page numbers to your PDF documents.',
                        'icon' => 'fa-sort-numeric-down',
                        'color' => 'text-primary',
                        'slug' => 'add-page-number-to-pdf'
                    ],
                    [
                        'title' => 'Add Watermark to PDF',
                        'description' => 'Add text or image watermarks to PDF.',
                        'icon' => 'fa-tint',
                        'color' => 'text-info',
                        'slug' => 'add-watermark-to-pdf'
                    ],
                    [
                        'title' => 'Delete PDF Pages',
                        'description' => 'Remove unwanted pages from your PDF files.',
                        'icon' => 'fa-trash-alt',
                        'color' => 'text-danger',
                        'slug' => 'delete-pdf-pages'
                    ],
                    [
                        'title' => 'Repair PDF',
                        'description' => 'Repair corrupted or damaged PDF documents.',
                        'icon' => 'fa-tools',
                        'color' => 'text-info',
                        'slug' => 'repair-pdf'
                    ],
                    [
                        'title' => 'PDF to OCR',
                        'description' => 'Perform Optical Character Recognition on PDFs.',
                        'icon' => 'fa-font',
                        'color' => 'text-purple',
                        'slug' => 'pdf-to-ocr'
                    ],
                    [
                        'title' => 'Lock PDF',
                        'description' => 'Secure your PDF files with a password.',
                        'icon' => 'fa-lock',
                        'color' => 'text-danger',
                        'slug' => 'lock-pdf'
                    ],
                    [
                        'title' => 'Reorder PDF Pages',
                        'description' => 'Change the order of pages in your PDF.',
                        'icon' => 'fa-sort',
                        'color' => 'text-primary',
                        'slug' => 'reorder-pdf-pages'
                    ],
                    [
                        'title' => 'Merge PDF',
                        'description' => 'Combine multiple PDFs into a single file.',
                        'icon' => 'fa-object-group',
                        'color' => 'text-success',
                        'slug' => 'merge-pdf'
                    ],
                    [
                        'title' => 'PDF to Audio',
                        'description' => 'Convert PDF text into audio format.',
                        'icon' => 'fa-volume-up',
                        'color' => 'text-info',
                        'slug' => 'pdf-to-audio'
                    ]
                ];

                foreach ($pdfEditorTools as $tool) {
                    $iconPrefix = in_array($tool['icon'], $brandIcons) ? 'fab' : 'fas';
                    echo '<div><a href="' . $base_url . $tool['slug'] . '" class="card-link"><div class="card tool-card h-100"><div class="card-body"><i class="' . $iconPrefix . ' ' . $tool['icon'] . ' ' . $tool['color'] . '"></i><h3 class="card-title h5">' . $tool['title'] . '</h3><p class="card-text">' . $tool['description'] . '</p></div></div></a></div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- PDF Conversions Section -->
    <section class="tools-section bg-light py-4" id="pdf-conversions">
        <div class="container">
            <h2 class="mb-5 mt-4">PDF Conversions <span class="emoji">🔄</span></h2>
            <div class="tools-grid">
                <?php
                $pdfTools = [
                    [
                        'title' => 'PDF to Word',
                        'description' => 'Convert PDFs to editable Word documents.',
                        'icon' => 'fa-file-word',
                        'color' => 'text-primary',
                        'slug' => 'pdf-to-word'
                    ],
                    [
                        'title' => 'Word to PDF',
                        'description' => 'Convert editable Word documents to secure PDF files.',
                        'icon' => 'fa-file-pdf',
                        'color' => 'text-primary',
                        'slug' => 'word-to-pdf'
                    ],
                    [
                        'title' => 'PDF to Excel',
                        'description' => 'Convert PDFs to editable Excel files.',
                        'icon' => 'fa-file-excel',
                        'color' => 'text-success',
                        'slug' => 'pdf-to-excel'
                    ],
                    [
                        'title' => 'Excel to PDF',
                        'description' => 'Convert Microsoft Excel spreadsheets to PDF.',
                        'icon' => 'fa-file-excel',
                        'color' => 'text-success',
                        'slug' => 'excel-to-pdf'
                    ],
                    [
                        'title' => 'PDF to JPG',
                        'description' => 'Convert PDF pages to high-quality JPG images.',
                        'icon' => 'fa-file-image',
                        'color' => 'text-warning',
                        'slug' => 'pdf-to-jpg'
                    ],
                    [
                        'title' => 'JPG to PDF',
                        'description' => 'Convert JPG images to PDF documents.',
                        'icon' => 'fa-file-image',
                        'color' => 'text-warning',
                        'slug' => 'jpg-to-pdf'
                    ],
                    [
                        'title' => 'PDF to PPT',
                        'description' => 'Convert PDF documents to PowerPoint presentations.',
                        'icon' => 'fa-file-powerpoint',
                        'color' => 'text-danger',
                        'slug' => 'pdf-to-ppt'
                    ],
                    [
                        'title' => 'PDF to PNG',
                        'description' => 'Convert PDFs to PNG images.',
                        'icon' => 'fa-image',
                        'color' => 'text-danger',
                        'slug' => 'pdf-to-png'
                    ],
                    [
                        'title' => 'PDF to CSV',
                        'description' => 'Extract tables/data from PDFs to CSV.',
                        'icon' => 'fa-file-csv',
                        'color' => 'text-danger',
                        'slug' => 'pdf-to-csv'
                    ],
                    [
                        'title' => 'CSV to PDF',
                        'description' => 'Convert Comma Separated Values files to PDF.',
                        'icon' => 'fa-file-csv',
                        'color' => 'text-danger',
                        'slug' => 'csv-to-pdf'
                    ],
                    [
                        'title' => 'PDF to HTML',
                        'description' => 'Transform PDFs into web-friendly HTML.',
                        'icon' => 'fa-html5',
                        'color' => 'text-danger',
                        'slug' => 'pdf-to-html'
                    ],
                    [
                        'title' => 'HTML to PDF',
                        'description' => 'Convert HTML web pages to PDF.',
                        'icon' => 'fa-html5',
                        'color' => 'text-danger',
                        'slug' => 'html-to-pdf'
                    ],
                    [
                        'title' => 'PDF to Text',
                        'description' => 'Extract editable text from PDFs.',
                        'icon' => 'fa-file-alt',
                        'color' => 'text-dark',
                        'slug' => 'pdf-to-text'
                    ],
                    [
                        'title' => 'Text to PDF',
                        'description' => 'Convert plain text files to PDF.',
                        'icon' => 'fa-file-alt',
                        'color' => 'text-muted',
                        'slug' => 'text-to-pdf'
                    ],
                    [
                        'title' => 'PDF to JSON',
                        'description' => 'Extract structured data from PDFs to JSON.',
                        'icon' => 'fa-code',
                        'color' => 'text-info',
                        'slug' => 'pdf-to-json'
                    ],
                    [
                        'title' => 'JSON to PDF',
                        'description' => 'Convert JSON data into PDF documents.',
                        'icon' => 'fa-file-code',
                        'color' => 'text-secondary',
                        'slug' => 'json-to-pdf'
                    ],
                    [
                        'title' => 'PDF to WebP',
                        'description' => 'Convert PDFs to optimized WebP images.',
                        'icon' => 'fa-file-image',
                        'color' => 'text-success',
                        'slug' => 'pdf-to-webp'
                    ],
                    [
                        'title' => 'PDF to XML',
                        'description' => 'Extract PDF data into XML format.',
                        'icon' => 'fa-file-code',
                        'color' => 'text-secondary',
                        'slug' => 'pdf-to-xml'
                    ],
                    [
                        'title' => 'XML to PDF',
                        'description' => 'Convert XML data into PDF documents.',
                        'icon' => 'fa-file-code',
                        'color' => 'text-secondary',
                        'slug' => 'xml-to-pdf'
                    ],
                    [
                        'title' => 'PDF to JFIF',
                        'description' => 'Convert your PDF documents to JFIF images.',
                        'icon' => 'fa-file-image',
                        'color' => 'text-danger',
                        'slug' => 'pdf-to-jfif'
                    ],
                    [
                        'title' => 'JFIF to PDF',
                        'description' => 'Convert your JFIF images to PDF documents.',
                        'icon' => 'fa-file-pdf',
                        'color' => 'text-primary',
                        'slug' => 'jfif-to-pdf'
                    ],
                    [
                        'title' => 'IPYNB to PDF',
                        'description' => 'Convert Jupyter notebooks (IPYNB) to PDF.',
                        'icon' => 'fa-file-pdf',
                        'color' => 'text-primary',
                        'slug' => 'ipynb-to-pdf'
                    ],
                    [
                        'title' => 'PDF to IPYNB',
                        'description' => 'Convert PDF documents to Jupyter notebooks (IPYNB).',
                        'icon' => 'fa-file-code',
                        'color' => 'text-info',
                        'slug' => 'pdf-to-ipynb'
                    ],
                    [
                        'title' => 'PNR to PDF',
                        'description' => 'Convert PNR files to PDF documents.',
                        'icon' => 'fa-file-pdf',
                        'color' => 'text-primary',
                        'slug' => 'pnr-to-pdf'
                    ],
                    [
                        'title' => 'EPUB to PDF',
                        'description' => 'Convert EPUB e-books to PDF documents.',
                        'icon' => 'fa-file-pdf',
                        'color' => 'text-primary',
                        'slug' => 'epub-to-pdf'
                    ],
                    [
                        'title' => 'PDF to EPUB',
                        'description' => 'Convert PDF documents to EPUB e-books.',
                        'icon' => 'fa-book-reader',
                        'color' => 'text-success',
                        'slug' => 'pdf-to-epub'
                    ],
                    [
                        'title' => 'PDF to Markdown',
                        'description' => 'Convert PDF documents to Markdown files.',
                        'icon' => 'fa-file-alt',
                        'color' => 'text-secondary',
                        'slug' => 'pdf-to-markdown'
                    ],
                    [
                        'title' => 'PDF to TIFF',
                        'description' => 'Convert PDF documents to TIFF images.',
                        'icon' => 'fa-file-image',
                        'color' => 'text-danger',
                        'slug' => 'pdf-to-tiff'
                    ],
                    [
                        'title' => 'PDF to SVG',
                        'description' => 'Convert PDF documents to Scalable Vector Graphics (SVG).',
                        'icon' => 'fa-bezier-curve',
                        'color' => 'text-success',
                        'slug' => 'pdf-to-svg'
                    ],
                    [
                        'title' => 'SVG to PDF',
                        'description' => 'Convert SVG images to PDF documents.',
                        'icon' => 'fa-file-pdf',
                        'color' => 'text-primary',
                        'slug' => 'svg-to-pdf'
                    ],
                    [
                        'title' => 'RTF to PDF',
                        'description' => 'Convert Rich Text Format (RTF) files to PDF.',
                        'icon' => 'fa-file-pdf',
                        'color' => 'text-primary',
                        'slug' => 'rtf-to-pdf'
                    ],
                    [
                        'title' => 'DWG to PDF',
                        'description' => 'Convert AutoCAD DWG files to PDF documents.',
                        'icon' => 'fa-file-pdf',
                        'color' => 'text-primary',
                        'slug' => 'dwg-to-pdf'
                    ],
                    [
                        'title' => 'PDF to PSD',
                        'description' => 'Convert PDF documents to Photoshop (PSD) files.',
                        'icon' => 'fa-file-image',
                        'color' => 'text-danger',
                        'slug' => 'pdf-to-psd'
                    ],
                    [
                        'title' => 'Shreelipi to PDF',
                        'description' => 'Convert Shreelipi files to PDF documents.',
                        'icon' => 'fa-file-pdf',
                        'color' => 'text-primary',
                        'slug' => 'shreelipi-to-pdf'
                    ],
                ];

                foreach ($pdfTools as $tool) {
                    $iconPrefix = in_array($tool['icon'], $brandIcons) ? 'fab' : 'fas';
                    echo '<div><a href="' . $base_url . $tool['slug'] . '" class="card-link"><div class="card tool-card h-100"><div class="card-body"><i class="' . $iconPrefix . ' ' . $tool['icon'] . ' ' . $tool['color'] . '"></i><h3 class="card-title h5">' . $tool['title'] . '</h3><p class="card-text">' . $tool['description'] . '</p></div></div></a></div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Text Tools Section -->
    <section class="tools-section bg-white" id="text-tools">
        <div class="container">
            <h2 class="mb-5">Text Tools <span class="emoji">️</span></h2>
            <div class="tools-grid">
                <?php
                $textTools = [
                    ['title' => 'Word Counter', 'description' => 'Count words/chars.', 'icon' => 'fa-calculator', 'color' => 'text-info', 'slug' => 'word-counter'],
                    ['title' => 'Case Converter', 'description' => 'Convert text case.', 'icon' => 'fa-text-height', 'color' => 'text-warning', 'slug' => 'case-converter'],
                    ['title' => 'Remove Spaces', 'description' => 'Clean up text.', 'icon' => 'fa-compress', 'color' => 'text-success', 'slug' => 'remove-extra-spaces'],
                    ['title' => 'Find & Replace', 'description' => 'Replace text.', 'icon' => 'fa-search-plus', 'color' => 'text-primary', 'slug' => 'find-replace-text'],
                    ['title' => 'Reverse Text', 'description' => 'Reverse text.', 'icon' => 'fa-exchange-alt', 'color' => 'text-danger', 'slug' => 'reverse-text'],
                    ['title' => 'Text to Slug', 'description' => 'Create URL slugs.', 'icon' => 'fa-link', 'color' => 'text-secondary', 'slug' => 'text-to-slug'],
                    ['title' => 'Text Compare', 'description' => 'Compare texts.', 'icon' => 'fa-file-alt', 'color' => 'text-info', 'slug' => 'text-comparision'],
                ];

                foreach ($textTools as $tool) {
                    $iconPrefix = in_array($tool['icon'], $brandIcons) ? 'fab' : 'fas';
                    echo '<div><a href="' . $base_url . $tool['slug'] . '" class="card-link"><div class="card tool-card h-100"><div class="card-body"><i class="' . $iconPrefix . ' ' . $tool['icon'] . ' ' . $tool['color'] . '"></i><h3 class="card-title h5">' . $tool['title'] . '</h3><p class="card-text">' . $tool['description'] . '</p></div></div></a></div>';
                }
                ?>
            </div>
        </div>
    </section>



    <!-- Business Tools Section -->
    <section class="tools-section bg-light" id="business-tools">
        <div class="container">
            <h2 class="mb-5">Business Tools <span class="emoji">🖼️</span></h2>
            <div class="tools-grid">
                <?php
                $imageTools = [
                    [
                        'title' => 'Calendar Generator',
                        'description' => 'Create and customize printable calendars for any month or year.',
                        'icon' => 'fa-calendar',
                        'color' => 'text-info',
                        'slug' => 'calendar-generator'
                    ],
                    [
                        'title' => 'Offer Letter Generator',
                        'description' => 'Generate professional offer letters for job candidates.',
                        'icon' => 'fa-file-contract',
                        'color' => 'text-success',
                        'slug' => 'offer-letter-generator'
                    ],
                    [
                        'title' => 'Payroll Sheet Generator',
                        'description' => 'Generate payroll sheets with employee details.',
                        'icon' => 'fa-file-invoice-dollar',
                        'color' => 'text-warning',
                        'slug' => 'payroll-sheet-generator'
                    ],
                    [
                        'title' => 'Timesheet Calculator',
                        'description' => 'Easily calculate work hours, overtime, and total pay from timesheets. Free & online. ',
                        'icon' => 'fa-clock',
                        'color' => 'text-primary',
                        'slug' => 'timesheet-calculator'
                    ],
                ];

                foreach ($imageTools as $tool) {
                    $iconPrefix = in_array($tool['icon'], $brandIcons) ? 'fab' : 'fas';
                    echo '<div><a href="' . $base_url . $tool['slug'] . '" class="card-link"><div class="card tool-card h-100"><div class="card-body"><i class="' . $iconPrefix . ' ' . $tool['icon'] . ' ' . $tool['color'] . '"></i><h3 class="card-title h5">' . $tool['title'] . '</h3><p class="card-text">' . $tool['description'] . '</p></div></div></a></div>';
                }
                ?>
            </div>
        </div>
    </section>



    <!-- Developer Tools Section -->
    <section class="tools-section bg-white" id="developer-tools">
        <div class="container">
            <h2 class="mb-5">Developer Tools <span class="emoji">👨‍</span></h2>
            <div class="tools-grid">
                <?php
                $devTools = [
                    ['title' => 'JSON Formatter', 'description' => 'Format JSON.', 'icon' => 'fa-code', 'color' => 'text-warning', 'slug' => 'json-formatter'],
                    ['title' => 'Base64 Encoder', 'description' => 'Encode/Decode Base64.', 'icon' => 'fa-lock', 'color' => 'text-success', 'slug' => 'base64-encoder'],
                    ['title' => 'URL Encoder', 'description' => 'Safely Encode/Decode URLs.', 'icon' => 'fa-link', 'color' => 'text-primary', 'slug' => 'url-encoder'],
                    ['title' => 'Hash Generator', 'description' => 'Generate MD5, SHA-1 etc.', 'icon' => 'fa-fingerprint', 'color' => 'text-info', 'slug' => 'hash-generator'],
                    ['title' => 'JWT Decoder', 'description' => 'Decode and view JWT claims.', 'icon' => 'fa-key', 'color' => 'text-danger', 'slug' => 'jwt-decoder'],
                ];

                foreach ($devTools as $tool) {
                    $iconPrefix = in_array($tool['icon'], $brandIcons) ? 'fab' : 'fas';
                    echo '<div><a href="' . $base_url . $tool['slug'] . '" class="card-link"><div class="card tool-card h-100"><div class="card-body"><i class="' . $iconPrefix . ' ' . $tool['icon'] . ' ' . $tool['color'] . '"></i><h3 class="card-title h5">' . $tool['title'] . '</h3><p class="card-text">' . $tool['description'] . '</p></div></div></a></div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Web Tools Section -->
    <section class="tools-section bg-light" id="web-tools">
        <div class="container">
            <h2 class="mb-5">Web Tools <span class="emoji"></span></h2>
            <div class="tools-grid">
                <?php
                $webTools = [
                    ['title' => 'Password Generator', 'description' => 'Create passwords.', 'icon' => 'fa-lock', 'color' => 'text-success', 'slug' => 'password-generator'],
                    ['title' => 'QR Code Generator', 'description' => 'Create QR codes.', 'icon' => 'fa-qrcode', 'color' => 'text-purple', 'slug' => 'qr-code-generator'],
                    ['title' => 'Color Picker', 'description' => 'Pick colors.', 'icon' => 'fa-palette', 'color' => 'text-info', 'slug' => 'color-picker'],
                ];
                foreach ($webTools as $tool) {
                    $iconPrefix = in_array($tool['icon'], $brandIcons) ? 'fab' : 'fas';
                    $url = isset($tool['url']) ? $tool['url'] : $base_url . $tool['slug'];
                    echo '<div><a href="' . $url . '" class="card-link"><div class="card tool-card h-100"><div class="card-body"><i class="' . $iconPrefix . ' ' . $tool['icon'] . ' ' . $tool['color'] . '"></i><h3 class="card-title h5">' . $tool['title'] . '</h3><p class="card-text">' . $tool['description'] . '</p></div></div></a></div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Calculator Tools Section -->
    <section class="tools-section bg-white" id="calculators">
        <div class="container">
            <h2 class="mb-5">Calculators <span class="emoji"></span></h2>
            <div class="tools-grid">
                <?php
                $calcTools = [
                    [
                        'title' => 'Age Calculator',
                        'description' => 'Calculate age from birth date to current date.',
                        'icon' => 'fa-birthday-cake',
                        'color' => 'text-primary',
                        'slug' => 'age-calculator'
                    ],
                    [
                        'title' => 'Simple Calculator',
                        'description' => 'Basic calculator for addition, subtraction, multiplication and division.',
                        'icon' => 'fa-calculator',
                        'color' => 'text-success',
                        'slug' => 'simple-calculator'
                    ],
                    [
                        'title' => 'Percentage Calculator',
                        'description' => 'Calculate percentages, increases, and decreases.',
                        'icon' => 'fa-percent',
                        'color' => 'text-info',
                        'slug' => 'percentage-calculator'
                    ],
                    [
                        'title' => 'Scientific Calculator',
                        'description' => 'Advanced calculator with trigonometric, logarithmic and exponential functions.',
                        'icon' => 'fa-square-root-alt',
                        'color' => 'text-secondary',
                        'slug' => 'scientific-calculator'
                    ],
                    [
                        'title' => 'BMI Calculator',
                        'description' => 'Calculate Body Mass Index based on height and weight.',
                        'icon' => 'fa-weight',
                        'color' => 'text-danger',
                        'slug' => 'bmi-calculator'
                    ],
                    [
                        'title' => 'EMI Calculator',
                        'description' => 'Calculate Equated Monthly Installments for loans.',
                        'icon' => 'fa-money-bill-wave',
                        'color' => 'text-warning',
                        'slug' => 'emi-calculator'
                    ],
                    [
                        'title' => 'SIP Calculator',
                        'description' => 'Calculate returns on Systematic Investment Plans (SIP).',
                        'icon' => 'fa-calendar-plus',
                        'color' => 'text-primary',
                        'slug' => 'sip-calculator'
                    ],
                    [
                        'title' => 'Lumpsum Calculator',
                        'description' => 'Calculate returns on one-time lump sum investments.',
                        'icon' => 'fa-money-bill-wave',
                        'color' => 'text-success',
                        'slug' => 'lumpsum-calculator'
                    ],
                    [
                        'title' => 'SWP Calculator',
                        'description' => 'Calculate Systematic Withdrawal Plan returns.',
                        'icon' => 'fa-calendar-minus',
                        'color' => 'text-info',
                        'slug' => 'swp-calculator'
                    ],
                    [
                        'title' => 'Mutual Fund Returns Calculator',
                        'description' => 'Calculate returns from mutual fund investments.',
                        'icon' => 'fa-chart-line',
                        'color' => 'text-warning',
                        'slug' => 'mutual-fund-returns-calculator'
                    ],
                    [
                        'title' => 'Sukanya Samriddhi Yojana (SSY) Calculator',
                        'description' => 'Calculate returns for SSY savings.',
                        'icon' => 'fa-female',
                        'color' => 'text-danger',
                        'slug' => 'sukanya-samriddhi-yojana-calculator'
                    ],
                    [
                        'title' => 'Income Tax Calculator',
                        'description' => 'Calculate your income tax liability.',
                        'icon' => 'fa-file-invoice-dollar',
                        'color' => 'text-primary',
                        'slug' => 'income-tax-calculator'
                    ],
                    [
                        'title' => 'PPF Calculator',
                        'description' => 'Calculate Public Provident Fund returns.',
                        'icon' => 'fa-piggy-bank',
                        'color' => 'text-success',
                        'slug' => 'ppf-calculator'
                    ],
                    [
                        'title' => 'EPF Calculator',
                        'description' => 'Calculate Employee Provident Fund returns.',
                        'icon' => 'fa-building',
                        'color' => 'text-info',
                        'slug' => 'epf-calculator'
                    ],
                    [
                        'title' => 'FD Calculator',
                        'description' => 'Calculate Fixed Deposit returns.',
                        'icon' => 'fa-lock',
                        'color' => 'text-warning',
                        'slug' => 'fd-calculator'
                    ],
                    [
                        'title' => 'RD Calculator',
                        'description' => 'Calculate Recurring Deposit returns.',
                        'icon' => 'fa-calendar-week',
                        'color' => 'text-danger',
                        'slug' => 'rd-calculator'
                    ],
                    [
                        'title' => 'NPS Calculator',
                        'description' => 'Calculate National Pension Scheme returns.',
                        'icon' => 'fa-user-tie',
                        'color' => 'text-primary',
                        'slug' => 'nps-calculator'
                    ],
                    [
                        'title' => 'HRA Calculator',
                        'description' => 'Calculate House Rent Allowance exemption.',
                        'icon' => 'fa-home',
                        'color' => 'text-success',
                        'slug' => 'hra-calculator'
                    ],
                    [
                        'title' => 'Retirement Calculator',
                        'description' => 'Calculate required corpus for retirement.',
                        'icon' => 'fa-umbrella-beach',
                        'color' => 'text-info',
                        'slug' => 'retirement-calculator'
                    ],
                    [
                        'title' => 'Car Loan EMI Calculator',
                        'description' => 'Calculate EMI for car loans.',
                        'icon' => 'fa-car',
                        'color' => 'text-warning',
                        'slug' => 'car-loan-emi-calculator'
                    ],
                    [
                        'title' => 'Home Loan EMI Calculator',
                        'description' => 'Calculate EMI for home loans.',
                        'icon' => 'fa-house-user',
                        'color' => 'text-danger',
                        'slug' => 'home-loan-emi-calculator'
                    ],
                    [
                        'title' => 'Home Equity Loan Calculator',
                        'description' => 'Calculate your home equity loan payments and interest.',
                        'icon' => 'fa-home',
                        'color' => 'text-info',
                        'slug' => 'home-equity-loan-calculator'
                    ],
                    [
                        'title' => 'Reverse Mortgage Calculator',
                        'description' => 'Estimate your reverse mortgage payments and benefits.',
                        'icon' => 'fa-percentage',
                        'color' => 'text-warning',
                        'slug' => 'reverse-mortgage-calculator'
                    ],
                    [
                        'title' => 'Personal Loan Calculator',
                        'description' => 'Calculate monthly payments and interest for personal loans.',
                        'icon' => 'fa-calculator',
                        'color' => 'text-success',
                        'slug' => 'personal-loan-calculator'
                    ],
                    [
                        'title' => 'Refinance Calculator',
                        'description' => 'Calculate savings and compare refinancing options.',
                        'icon' => 'fa-calculator',
                        'color' => 'text-success',
                        'slug' => 'refinance-calculator'
                    ],
                    [
                        'title' => 'Simple Interest Calculator',
                        'description' => 'Calculate simple interest on investments/loans.',
                        'icon' => 'fa-percentage',
                        'color' => 'text-primary',
                        'slug' => 'simple-interest-calculator'
                    ],
                    [
                        'title' => 'Compound Interest Calculator',
                        'description' => 'Calculate compound interest on investments.',
                        'icon' => 'fa-chart-bar',
                        'color' => 'text-success',
                        'slug' => 'compound-interest-calculator'
                    ],
                    [
                        'title' => 'NSC Calculator',
                        'description' => 'Calculate National Savings Certificate returns.',
                        'icon' => 'fa-certificate',
                        'color' => 'text-info',
                        'slug' => 'nsc-calculator'
                    ],
                    [
                        'title' => 'Step-up SIP Calculator',
                        'description' => 'Calculate returns on increasing SIP investments.',
                        'icon' => 'fa-sort-amount-up',
                        'color' => 'text-warning',
                        'slug' => 'step-up-sip-calculator'
                    ],
                    [
                        'title' => 'Gratuity Calculator',
                        'description' => 'Calculate gratuity amount for employees.',
                        'icon' => 'fa-hand-holding-usd',
                        'color' => 'text-danger',
                        'slug' => 'gratuity-calculator'
                    ],
                    [
                        'title' => 'CAGR Calculator',
                        'description' => 'Calculate Compound Annual Growth Rate.',
                        'icon' => 'fa-chart-line',
                        'color' => 'text-primary',
                        'slug' => 'cagr-calculator'
                    ],
                    [
                        'title' => 'GST Calculator',
                        'description' => 'Calculate Goods and Services Tax amounts.',
                        'icon' => 'fa-receipt',
                        'color' => 'text-success',
                        'slug' => 'gst-calculator'
                    ],
                    [
                        'title' => 'Flat vs Reducing Rate Calculator',
                        'description' => 'Compare flat and reducing rate interest methods.',
                        'icon' => 'fa-balance-scale-right',
                        'color' => 'text-info',
                        'slug' => 'flat-vs-reducing-rate-calculator'
                    ],
                    [
                        'title' => 'Brokerage Calculator',
                        'description' => 'Calculate brokerage charges for trades.',
                        'icon' => 'fa-handshake',
                        'color' => 'text-warning',
                        'slug' => 'brokerage-calculator'
                    ],
                    [
                        'title' => 'Margin Calculator',
                        'description' => 'Calculate margin requirements for trading.',
                        'icon' => 'fa-border-style',
                        'color' => 'text-danger',
                        'slug' => 'margin-calculator'
                    ],
                    [
                        'title' => 'TDS Calculator',
                        'description' => 'Calculate Tax Deducted at Source amounts.',
                        'icon' => 'fa-file-invoice',
                        'color' => 'text-primary',
                        'slug' => 'tds-calculator'
                    ],
                    [
                        'title' => 'Salary Calculator',
                        'description' => 'Calculate take-home salary after deductions.',
                        'icon' => 'fa-money-check-alt',
                        'color' => 'text-success',
                        'slug' => 'salary-calculator'
                    ],
                    [
                        'title' => 'Inflation Calculator',
                        'description' => 'Calculate future value considering inflation.',
                        'icon' => 'fa-chart-pie',
                        'color' => 'text-info',
                        'slug' => 'inflation-calculator'
                    ],
                    [
                        'title' => 'Discount Calculator',
                        'description' => 'Calculate final price after discount and amount saved.',
                        'icon' => 'fa-tag',
                        'color' => 'text-warning',
                        'slug' => 'discount-calculator'
                    ],
                    [
                        'title' => 'PTO Calculator',
                        'description' => 'Calculate your Paid Time Off (PTO) days and balance.',
                        'icon' => 'fa-calendar-alt',
                        'color' => 'text-info',
                        'slug' => 'pto-calculator'
                    ],
                    [
                        'title' => 'APY Calculator',
                        'description' => 'Calculate Annual Percentage Yield for investments.',
                        'icon' => 'fa-percentage',
                        'color' => 'text-success',
                        'slug' => 'apy-calculator'
                    ],
                    [
                        'title' => 'Tax Calculator',
                        'description' => 'Calculate your tax liability quickly and accurately.',
                        'icon' => 'fa-calculator',
                        'color' => 'text-primary',
                        'slug' => 'tax-calculator'
                    ],
                    [
                        'title' => 'Loan Eligibility Calculator',
                        'description' => 'Check how much loan amount you are eligible for instantly.',
                        'icon' => 'fa-hand-holding-usd',
                        'color' => 'text-success',
                        'slug' => 'loan-eligibility-calculator'
                    ],
                    [
                        'title' => 'Investment Returns Calculator',
                        'description' => 'Estimate your investment returns with ease.',
                        'icon' => 'fa-chart-line',
                        'color' => 'text-warning',
                        'slug' => 'investment-returns-calculator'
                    ],
                    [
                        'title' => 'Unit Converter',
                        'description' => 'Convert between different units of measurement.',
                        'icon' => 'fa-balance-scale',
                        'color' => 'text-danger',
                        'slug' => 'unit-converter'
                    ],
                ];

                foreach ($calcTools as $tool) {
                    $iconPrefix = in_array($tool['icon'], $brandIcons) ? 'fab' : 'fas';
                    echo '<div><a href="' . $base_url . $tool['slug'] . '" class="card-link"><div class="card tool-card h-100"><div class="card-body"><i class="' . $iconPrefix . ' ' . $tool['icon'] . ' ' . $tool['color'] . '"></i><h3 class="card-title h5">' . $tool['title'] . '</h3><p class="card-text">' . $tool['description'] . '</p></div></div></a></div>';
                }
                ?>
            </div>
    </section>

    <!-- All Tools CTA (SEO + Accessibility optimized) -->
    <section class="py-5 bg-white">
        <div class="container px-4">
            <h2 class="text-center mb-3">How to Use These Tools <span class="text-danger">🛠️</span></h2>
            <p class="lead text-center text-muted mb-4">
                Quick, consistent steps to get accurate results from any tool on this site.
            </p>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <ol class="step-list fs-6">
                        <li class="mb-3"><strong>Find the right tool:</strong> Browse categories (PDF, Text,
                            Developer,
                            Business, Calculators) or use the search bar to quickly locate a tool.</li>
                        <li class="mb-3"><strong>Open the tool page:</strong> Click the tool card to open its
                            dedicated
                            page where inputs and options are provided.</li>
                        <li class="mb-3"><strong>Read the instructions:</strong> Each tool shows a short instruction
                            and
                            sample input. Review any notes about supported file types and limits.</li>
                        <li class="mb-3"><strong>Provide input:</strong> Paste text or upload files using the
                            provided
                            input area. For file uploads, check the maximum file size noted on the tool page.</li>
                        <li class="mb-3"><strong>Adjust settings:</strong> Select output format, page range,
                            conversion
                            options, or other settings as needed.</li>
                        <li class="mb-3"><strong>Process:</strong> Click the primary action button (Convert /
                            Generate /
                            Calculate). Wait for the result — processing happens in your browser for privacy and
                            speed.
                        </li>
                        <li class="mb-3"><strong>Download or copy:</strong> When complete, download the file or copy
                            the
                            output text. Use the share buttons if you want to send results to others.</li>
                        <li class="mb-3"><strong>Clear & repeat:</strong> Clear the input to run another operation
                            or
                            try different settings.</li>
                    </ol>

                    <p class="small text-muted mb-3">
                        Tip: Use the "View All Tools" page to see a complete list and the search bar for faster
                        access.
                    </p>

                    <div class="text-center">
                        <a href="#" class="btn btn-danger btn-lg px-4 py-2">
                            <i class="fas fa-th-list me-2"></i> View All Tools
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Structured HowTo for SEO -->
        <script type="application/ld+json">
 {
 "@context": "https://schema.org",
 "@type": "HowTo",
 "name": "How to use the free online tools",
 "description": "Step-by-step instructions to find, use and download results from the free online tools.",
 "image": "<?php echo $base_url; ?>assets/images/tools-howto.png",
 "totalTime": "PT5M",
 "supply": [],
 "tool": [],
 "step": [
 {"@type":"HowToStep","name":"Find the right tool","text":"Browse categories or search to locate the required tool."},
 {"@type":"HowToStep","name":"Open the tool page","text":"Click the tool card to open its page."},
 {"@type":"HowToStep","name":"Read the instructions","text":"Review input requirements and file limits."},
 {"@type":"HowToStep","name":"Provide input","text":"Paste text or upload files as required."},
 {"@type":"HowToStep","name":"Adjust settings and process","text":"Choose options and click Convert/Generate/Calculate."},
 {"@type":"HowToStep","name":"Download or copy result","text":"Download the output file or copy the result text."}
 ],
 "url": "<?php echo $base_url; ?>all-tools"
 }
 </script>
    </section>


    <!-- Comprehensive Tools Guide Section -->
    <section class="tools-guide py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Complete Guide to Our Tools <span class="text-danger"></span></h2>

            <div class="row g-4">
                <!-- PDF Tools Guide -->
                <div class="col-lg-4 mb-4">
                    <div class="guide-card p-4 bg-white rounded-3 shadow-sm h-100">
                        <h3 class="h5 mb-3"><i class="fas fa-file-pdf text-danger me-2"></i>PDF Tools Guide</h3>
                        <p>Our PDF tools suite offers comprehensive file conversion capabilities. Convert PDFs to
                            various formats including Word, Excel, PowerPoint, and images. Supports batch
                            processing,
                            OCR text extraction, and metadata editing. Perfect for document management and digital
                            workflows.</p>
                    </div>
                </div>

                <!-- Calculator Tools Guide -->
                <div class="col-lg-4 mb-4">
                    <div class="guide-card p-4 bg-white rounded-3 shadow-sm h-100">
                        <h3 class="h5 mb-3"><i class="fas fa-calculator text-success me-2"></i>Financial Calculators
                        </h3>
                        <p>Access powerful financial calculators for investment planning, loans, and retirement.
                            Features include SIP calculator, EMI calculator, PPF calculator, and more. Get accurate
                            calculations for mutual funds, fixed deposits, and tax planning.</p>
                    </div>
                </div>

                <!-- Text Tools Guide -->
                <div class="col-lg-4 mb-4">
                    <div class="guide-card p-4 bg-white rounded-3 shadow-sm h-100">
                        <h3 class="h5 mb-3"><i class="fas fa-font text-primary me-2"></i>Text Manipulation Tools
                        </h3>
                        <p>Transform and analyze text with our specialized tools. Count words, convert case, remove
                            spaces, and generate slugs. Perfect for content creators, writers, and developers
                            needing
                            quick text operations.</p>
                    </div>
                </div>

                <!-- Developer Tools Guide -->
                <div class="col-lg-4 mb-4">
                    <div class="guide-card p-4 bg-white rounded-3 shadow-sm h-100">
                        <h3 class="h5 mb-3"><i class="fas fa-code text-info me-2"></i>Developer Utilities</h3>
                        <p>Essential tools for developers including JSON formatter, code beautifier, and syntax
                            highlighter. Streamline your development workflow with our efficient and reliable
                            development utilities.</p>
                    </div>
                </div>

                <!-- Business Tools Guide -->
                <div class="col-lg-4 mb-4">
                    <div class="guide-card p-4 bg-white rounded-3 shadow-sm h-100">
                        <h3 class="h5 mb-3"><i class="fas fa-briefcase text-warning me-2"></i>Business Tools</h3>
                        <p>Enhance your business operations with our specialized tools. Generate professional
                            calendars,
                            create offer letters, manage payroll sheets, and track employee time. Ideal for HR and
                            business management.</p>
                    </div>
                </div>

                <!-- Web Tools Guide -->
                <div class="col-lg-4 mb-4">
                    <div class="guide-card p-4 bg-white rounded-3 shadow-sm h-100">
                        <h3 class="h5 mb-3"><i class="fas fa-globe text-purple me-2"></i>Web Utilities</h3>
                        <p>Access essential web tools including password generator, QR code creator, and color
                            picker.
                            Perfect for web developers and designers needing quick, reliable online utilities.</p>
                    </div>
                </div>
            </div>

            <!-- Tool Usage Tips -->
            <div class="mt-5 pt-4">
                <h2 class="mb-4">Pro Tips for Professional Results <span class="emoji">💡</span></h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded shadow-sm border-start border-4 border-danger h-100">
                            <h4 class="h5 mb-3 fw-bold"><i class="fas fa-bolt text-danger me-2"></i>Batch Conversion
                            </h4>
                            <p class="text-muted small mb-0">Save time by uploading multiple documents once. Our
                                cloud-native API processes large batches with 99.9% accuracy.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded shadow-sm border-start border-4 border-info h-100">
                            <h4 class="h5 mb-3 fw-bold"><i class="fas fa-eye text-info me-2"></i>Enable OCR</h4>
                            <p class="text-muted small mb-0">Converting a scanned image? Toggle the OCR setting to
                                extract editable text from non-searchable PDFs instantly.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded shadow-sm border-start border-4 border-success h-100">
                            <h4 class="h5 mb-3 fw-bold"><i class="fas fa-table text-success me-2"></i>Smart Data
                                Extraction</h4>
                            <p class="text-muted small mb-0">For PDF-to-Excel, our intelligent fallback ensures
                                layout preservation even for files without formal table structures.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded shadow-sm border-start border-4 border-warning h-100">
                            <h4 class="h5 mb-3 fw-bold"><i class="fas fa-shield-alt text-warning me-2"></i>Privacy
                                First</h4>
                            <p class="text-muted small mb-0">All document processing happens securely. Your files
                                are automatically deleted from our servers immediately after conversion.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded shadow-sm border-start border-4 border-primary h-100">
                            <h4 class="h5 mb-3 fw-bold"><i class="fas fa-keyboard text-primary me-2"></i>Quick
                                Access</h4>
                            <p class="text-muted small mb-0">Use the smart search bar (Ctrl+K or Cmd+K) to find any
                                of our 100+ tools in less than a second.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded shadow-sm border-start border-4 border-secondary h-100">
                            <h4 class="h5 mb-3 fw-bold"><i class="fas fa-mobile-alt text-secondary me-2"></i>Work
                                from Anywhere</h4>
                            <p class="text-muted small mb-0">Access all premium tools on your mobile browser. No app
                                installation required for high-speed PDF tasks.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Features Section -->
    <section class="tools-section bg-white border-top">
        <div class="container">
            <h2 class="mb-5">Why Choose <?php echo $site_name; ?>? <span class="emoji"></span></h2>
            <div class="row g-3">
                <div class="col-md-4 col-sm-6">
                    <div class="feature-box">
                        <i class="fas fa-shield-alt text-danger"></i>
                        <h3>Secure</h3>
                        <p>Your data stays on your device. We never store anything.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="feature-box">
                        <i class="fas fa-bolt text-danger"></i>
                        <h3>Fast</h3>
                        <p>Instant results with optimized processing.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="feature-box">
                        <i class="fas fa-heart text-danger"></i>
                        <h3>100% Free</h3>
                        <p>No subscriptions, no hidden costs.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="feature-box">
                        <i class="fas fa-mobile-alt text-danger"></i>
                        <h3>Mobile Ready</h3>
                        <p>Works on all devices and screens.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="feature-box">
                        <i class="fas fa-user-tie text-danger"></i>
                        <h3>No Login</h3>
                        <p>Start using instantly without registration.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="feature-box">
                        <i class="fas fa-headset text-danger"></i>
                        <h3>Support</h3>
                        <p>Help available 24/7 for all users.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div id="sharer">
        <?php include 'includes/sharer.php'; ?>
    </div>

    <!-- FAQ Section -->
    <section class="faq-section bg-light">
        <div class="container">
            <h2 class="mb-5">Frequently Asked Questions <span class="emoji"></span></h2>
            <div class="row g-3">
                <div class="col-lg-6">
                    <div class="accordion" id="faqAccordion1">
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq1">
                                    <i class="fas fa-lock text-danger me-2"></i> Is my data secure?
                                </button>
                            </h3>
                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1">
                                <div class="accordion-body">All processing happens in your browser. We never upload
                                    your
                                    data to our servers.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq2">
                                    <i class="fas fa-dollar-sign text-danger me-2"></i> Is this really free?
                                </button>
                            </h3>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1">
                                <div class="accordion-body">Yes! All tools are completely free with no usage limits.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq3">
                                    <i class="fas fa-file-upload text-danger me-2"></i> What's the file size limit?
                                </button>
                            </h3>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1">
                                <div class="accordion-body">Most tools support files up to 50MB, depending on your
                                    device's memory.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq4">
                                    <i class="fas fa-mobile-alt text-danger me-2"></i> Does it work on mobile?
                                </button>
                            </h3>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1">
                                <div class="accordion-body">Yes! All tools work on smartphones, tablets, and
                                    computers.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq13">
                                    <i class="fas fa-image text-danger me-2"></i> Can I convert images to PDF?
                                </button>
                            </h3>
                            <div id="faq13" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">Yes, we offer multiple image to PDF conversion tools.
                                    You
                                    can convert JPG to PDF, PNG to PDF, WebP to PDF, and even create PDFs from
                                    multiple
                                    images. We also have PDF to image converter for the reverse process.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq14">
                                    <i class="fas fa-code text-danger me-2"></i> Do you have tools for developers?
                                </button>
                            </h3>
                            <div id="faq14" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">Absolutely! We have many developer tools including JSON
                                    formatter, XML formatter, HTML formatter, code minifiers, base64
                                    encoder/decoder,
                                    URL encoder/decoder, and more. These tools help developers format, validate, and
                                    convert code easily.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq15">
                                    <i class="fas fa-qrcode text-danger me-2"></i> Can I generate QR codes?
                                </button>
                            </h3>
                            <div id="faq15" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">Yes, our QR code generator allows you to create QR codes
                                    for
                                    URLs, text, contact information, WiFi credentials, and more. You can customize
                                    the
                                    size and download the QR code in various formats.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq16">
                                    <i class="fas fa-globe text-danger me-2"></i> Is WordsCompare available
                                    worldwide?
                                </button>
                            </h3>
                            <div id="faq16" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">Yes, WordsCompare is accessible from anywhere in the
                                    world.
                                    All you need is an internet connection and a web browser. Our tools work
                                    globally
                                    and support multiple languages and formats.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordion" id="faqAccordion2">
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq5">
                                    <i class="fas fa-cloud text-danger me-2"></i> Do I need an account?
                                </button>
                            </h3>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">No accounts needed! Start using immediately without
                                    registration.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq6">
                                    <i class="fas fa-globe text-danger me-2"></i> What browsers are supported?
                                </button>
                            </h3>
                            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">All modern browsers including Chrome, Firefox, Safari,
                                    and
                                    Edge.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq7">
                                    <i class="fas fa-history text-danger me-2"></i> Is usage tracked?
                                </button>
                            </h3>
                            <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">No, we don't track or store your usage history.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq8">
                                    <i class="fas fa-question-circle text-danger me-2"></i> How to contact support?
                                </button>
                            </h3>
                            <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">Use our contact form for any questions or issues.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq9">
                                    <i class="fas fa-file-pdf text-danger me-2"></i> What PDF tools are available?
                                </button>
                            </h3>
                            <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">We offer comprehensive PDF tools including PDF to Word
                                    converter, PDF to Excel converter, PDF to PowerPoint, PDF to image converter,
                                    image
                                    to PDF converter, merge PDF, split PDF, compress PDF, and many more. All tools
                                    work
                                    directly in your browser.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq10">
                                    <i class="fas fa-calculator text-danger me-2"></i> What calculators do you
                                    offer?
                                </button>
                            </h3>
                            <div id="faq10" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">Our calculator collection includes EMI calculator, GST
                                    calculator, BMI calculator, age calculator, loan eligibility calculator,
                                    investment
                                    return calculator, compound interest calculator, and many more financial and
                                    health
                                    calculators.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq11">
                                    <i class="fas fa-mobile-alt text-danger me-2"></i> Can I use these tools on my
                                    phone?
                                </button>
                            </h3>
                            <div id="faq11" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">Yes! All our tools are fully responsive and work
                                    perfectly
                                    on mobile phones, tablets, and desktop computers. You can access our PDF
                                    converter,
                                    calculators, and text utilities from any device with a web browser.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq12">
                                    <i class="fas fa-font text-danger me-2"></i> What text utilities are available?
                                </button>
                            </h3>
                            <div id="faq12" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">Our text utilities include word counter, character
                                    counter,
                                    case converter, text comparison tool, find and replace, text to slug converter,
                                    JSON
                                    formatter, and more. These tools are perfect for writers, editors, and content
                                    creators.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- <h2 class="mb-4 text-center">Why Choose WordsCompare?</h2> -->
                    <p class="lead mb-4 text-center">WordsCompare provides a comprehensive suite of free online
                        tools
                        designed to make your daily tasks easier. From PDF conversion to text analysis, calculators
                        to
                        file formatters, our tools are built with simplicity and efficiency in mind.</p>

                    <div class="row text-start mt-5">
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-bolt text-warning me-2"></i>Fast & Efficient Processing</h5>
                            <p>All tools process your data instantly in your browser. No waiting, no queues - get
                                results immediately. Our client-side processing ensures your files are handled
                                quickly
                                without server delays.</p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-shield-alt text-success me-2"></i>Secure & Private</h5>
                            <p>Your files never leave your computer. All processing happens locally in your browser
                                for
                                maximum privacy and security. We don't store, track, or access your data.</p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-dollar-sign text-info me-2"></i>Completely Free Forever</h5>
                            <p>No hidden fees, no subscriptions, no credit cards required. All tools are free to use
                                without any limitations. Enjoy unlimited access to all our utilities.</p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-mobile-alt text-primary me-2"></i>Mobile Friendly Design</h5>
                            <p>Access all tools from any device - desktop, tablet, or smartphone. Our responsive
                                design
                                ensures perfect usability across all screen sizes.</p>
                        </div>
                    </div>

                    <div class="mt-5">
                        <h3 class="h4 mb-3">About Our Wordscompare Online Tools</h3>
                        <p>Looking for a fast and secure online PDF convertor? WordsCompare provides a complete
                            suite of
                            PDF tools including PDF converter, PDF merger, JPG to PDF, PDF to image convertor, and
                            Excel
                            to PDF convertor — all in one place. No registration required. 100% free and
                            browser-based.
                        </p>
                        <p>WordsCompare is your one-stop destination for free online utilities. Whether you need to
                            convert PDF documents, calculate financial figures, compare text files, or format code -
                            we
                            have the tools you need. Our platform offers over 100 different utilities spanning
                            multiple
                            categories including document conversion, text manipulation, mathematical calculations,
                            and
                            developer tools.</p>
                        <p>Each tool is designed with user experience in mind. We prioritize simplicity without
                            sacrificing functionality. You don't need to create an account, provide personal
                            information, or download any software. Simply visit our website, select the tool you
                            need,
                            and get your work done efficiently.</p>
                        <p>Our powerful PDF converter allows you to convert documents in seconds. Whether you need
                            to
                            convert PDF to Excel, image to PDF, or photo to PDF convertor tools, everything works
                            directly in your browser for fast and secure processing.</p>
                        <p>Convert PDF pages into high-quality images using our PDF to image convertor. You can also
                            use
                            our online image to PDF convertor or photo to PDF convertor to create professional PDF
                            documents from JPG or PNG files.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Popular Tools & Features</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <i class="fas fa-file-pdf text-danger fa-2x mb-3"></i>
                        <h5>PDF Conversion Tools</h5>
                        <p>Convert PDFs to Word, Excel, PowerPoint, images, and more. Our PDF tools maintain
                            formatting
                            and quality while ensuring fast conversion. Support for batch processing and multiple
                            output
                            formats.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <i class="fas fa-calculator text-primary fa-2x mb-3"></i>
                        <h5>Smart Financial Calculators</h5>
                        <p>Comprehensive financial calculators for EMI, GST, BMI, age, loan eligibility, and more.
                            Get
                            accurate results instantly with detailed breakdowns and visual representations of your
                            calculations.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <i class="fas fa-font text-success fa-2x mb-3"></i>
                        <h5>Text Utilities & Analysis</h5>
                        <p>Advanced word counter, case converter, text comparison with diff highlighting, find and
                            replace, and more tools for text manipulation. Perfect for writers, editors, and content
                            creators.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <i class="fas fa-image text-warning fa-2x mb-3"></i>
                        <h5>Image Conversion Tools</h5>
                        <p>Convert images to PDF, compare images side by side, and access various image processing
                            utilities. Support for JPG, PNG, WebP, and other popular formats.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <i class="fas fa-code text-info fa-2x mb-3"></i>
                        <h5>Developer & Code Tools</h5>
                        <p>JSON formatter, XML formatter, code beautifiers, minifiers, and utilities for developers
                            and
                            programmers. Make your coding tasks easier with our specialized tools.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <i class="fas fa-qrcode text-secondary fa-2x mb-3"></i>
                        <h5>QR Code Generator</h5>
                        <p>Create QR codes instantly for URLs, text, contact information, WiFi credentials, and
                            more.
                            Customize size and download in various formats for print or digital use.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-12">
                    <h3 class="h4 mb-3">More Than 100 Free Tools Available</h3>
                    <p>Our extensive collection includes document converters, data formatters, unit converters,
                        password
                        generators, color pickers, and specialized utilities for business, education, and personal
                        use.
                        Every tool is designed to be intuitive and efficient, helping you complete tasks quickly
                        without
                        any learning curve.</p>
                    <p>Whether you're a student working on assignments, a professional handling documents, a
                        developer
                        writing code, or anyone needing quick utilities - WordsCompare has something for you.
                        Explore
                        our categories and discover tools that can save you time and effort every day.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-5">How It Works</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="p-3">
                        <div class="rounded-circle bg-danger text-white d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-mouse-pointer fa-lg"></i>
                        </div>
                        <h5>1. Select Tool</h5>
                        <p>Choose from our wide range of free online tools.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3">
                        <div class="rounded-circle bg-danger text-white d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-upload fa-lg"></i>
                        </div>
                        <h5>2. Upload/Input</h5>
                        <p>Upload your file or enter your text/data.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3">
                        <div class="rounded-circle bg-danger text-white d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-cog fa-lg"></i>
                        </div>
                        <h5>3. Process</h5>
                        <p>Our tool processes your data instantly.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3">
                        <div class="rounded-circle bg-danger text-white d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-download fa-lg"></i>
                        </div>
                        <h5>4. Download</h5>
                        <p>Get your results and download instantly.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SEO Content Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2>Free Online PDF Converter and Document Tools</h2>
                    <p class="lead mb-5">WordsCompare offers the best free online PDF converter tools,
                        calculators, and utilities to help you work smarter and faster.</p>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <h4>Comprehensive PDF Conversion Solutions</h4>
                            <p>Our PDF converter tools are designed to handle all your document conversion needs.
                                Whether you need to convert PDF to Excel for data analysis, PDF to Word for editing,
                                or
                                PDF to PowerPoint for presentations, our tools deliver professional-quality results.
                                The
                                PDF to image converter allows you to extract pages as high-quality JPG or PNG files,
                                while our image to PDF converter helps you create professional documents from
                                scanned
                                images or photos.</p>
                            <p>Business users appreciate our batch processing capabilities and the ability to
                                maintain
                                formatting during conversion. Students find our tools invaluable for converting
                                academic
                                papers and research documents between different formats. All conversions happen
                                securely
                                in your browser, ensuring your sensitive documents remain private.</p>
                        </div>
                        <div class="col-md-6">
                            <h4>Smart Calculators for Every Need</h4>
                            <p>Our collection of online calculators covers financial, health, and mathematical
                                calculations. The EMI calculator helps you plan loans by computing equated monthly
                                installments with detailed amortization schedules. Use our GST calculator to quickly
                                compute tax amounts for business transactions. The BMI calculator provides instant
                                health assessments with category classifications.</p>
                            <p>Financial planning becomes easier with our investment calculators, compound interest
                                tools, and retirement planners. Business owners benefit from our margin calculator,
                                discount calculator, and currency converters. Each calculator provides accurate
                                results
                                with detailed breakdowns, helping you make informed decisions for personal and
                                professional use.</p>
                        </div>
                    </div>

                    <div class="row g-4 mt-4">
                        <div class="col-md-6">
                            <h4>Text Analysis and Content Tools</h4>
                            <p>Content creators and writers rely on our text utilities for daily tasks. The word
                                counter
                                provides detailed statistics including character count, sentence count, and reading
                                time
                                estimates. Our case converter transforms text between uppercase, lowercase, title
                                case,
                                and sentence case formats instantly. The text comparison tool highlights differences
                                between two documents, making it perfect for proofreading and version control.</p>
                            <p>Additional text tools include find and replace functionality, text-to-slug conversion
                                for
                                SEO-friendly URLs, and duplicate line removal. Developers appreciate our JSON
                                formatter
                                and XML beautifier for cleaning up code. These tools process everything locally in
                                your
                                browser, ensuring your content remains confidential and secure.</p>
                        </div>
                        <div class="col-md-6">
                            <h4>Developer and Technical Utilities</h4>
                            <p>Software developers find essential tools in our platform. Code formatters for HTML,
                                CSS,
                                and JavaScript help maintain consistent coding standards. Base64 encoding and
                                decoding
                                utilities simplify data transformation tasks. URL encoders ensure special characters
                                are
                                properly formatted for web use. The QR code generator creates scannable codes for
                                websites, contact information, and WiFi credentials.</p>
                            <p>Our platform also includes color pickers with hex and RGB values, password generators
                                for
                                secure credential creation, and unit converters for technical calculations. All
                                developer tools are designed with simplicity in mind, requiring no installation or
                                registration. Whether you're debugging code, formatting data, or generating assets,
                                our
                                tools streamline your workflow.</p>
                        </div>
                    </div>

                    <div class="mt-5">
                        <h3 class="h4 mb-3">Why Thousands Choose WordsCompare Daily</h3>
                        <p>WordsCompare has become the preferred destination for free online tools because we
                            prioritize
                            user experience, privacy, and reliability. Unlike many online services, we never require
                            registration or personal information. Our browser-based processing means your files
                            never
                            leave your computer, eliminating security concerns associated with cloud uploads.</p>
                        <p>The platform is continuously updated with new tools based on user feedback and emerging
                            needs. Our responsive design ensures perfect functionality across desktop computers,
                            tablets, and smartphones. Whether you need a quick PDF conversion, financial
                            calculation, or
                            text analysis, WordsCompare delivers professional results instantly without cost or
                            complexity.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final Premium Banner (Replaced with Beautiful CSS Version) -->
    <section class="bottom-promo-banner py-5" style="background: #f8f9fa;">
        <div class="container d-flex justify-content-center">
            <div class="banner-wrapper overflow-hidden shadow-lg hover-scale transition-transform"
                style="border-radius: 24px; border: none; max-width: 1000px; width: 100%; background: linear-gradient(45deg, #0575E6 0%, #021B79 100%);">
                <a href="#pdf-conversions" class="d-block text-decoration-none p-5 text-center position-relative">
                    <div
                        style="position: absolute; top: -20px; right: -20px; width: 150px; height: 150px; background: rgba(255,255,255,0.05); border-radius: 50%;">
                    </div>
                    <div class="position-relative">
                        <h2 class="h1 text-white fw-bold mb-3">Elevate Your Workflow</h2>
                        <p class="text-white-50 lead mb-4">Experience the power of professional document tools, free
                            forever.</p>
                        <div class="d-inline-flex gap-3 flex-wrap justify-content-center">
                            <span class="badge bg-light text-primary p-3 rounded-pill px-4"><i
                                    class="fas fa-bolt me-2"></i> Fast</span>
                            <span class="badge bg-light text-primary p-3 rounded-pill px-4"><i
                                    class="fas fa-lock me-2"></i> Secure</span>
                            <span class="badge bg-light text-primary p-3 rounded-pill px-4"><i
                                    class="fas fa-check-circle me-2"></i> Pro Quality</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>