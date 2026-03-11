<?php 
$page_title = "Disclaimer";
$page_description = "Legal disclaimer for Snapy Tools and its online utilities";
$page_keywords = "website disclaimer, legal notice, tool liability";
include '../includes/header.php'; 
?>

<!-- Page Content -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 border shadow-sm p-4">
            <article>
                <header class="mb-5 text-center">
                    <h1 class="display-5 fw-bold">Legal Disclaimer</h1>
                    <p class="lead">Important information about using our tools and services</p>
                </header>

                <section class="mb-5">
                    <h2 class="h4 mb-3">General Information</h2>
                    <p>The tools provided on <?php echo $site_name; ?> are for general informational purposes only. While we strive to keep the information up to date and correct, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose.</p>
                </section>

                <section class="mb-5">
                    <h2 class="h4 mb-3">No Liability</h2>
                    <p>In no event will we be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website.</p>
                    <p>Every effort is made to keep the website up and running smoothly. However, <?php echo $site_name; ?> takes no responsibility for, and will not be liable for, the website being temporarily unavailable due to technical issues beyond our control.</p>
                </section>

                <section class="mb-5">
                    <h2 class="h4 mb-3">Tool Usage</h2>
                    <p>Our web tools are provided as-is without warranty:</p>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h3 class="h5 card-title">Accuracy</h3>
                                    <p class="card-text">While we aim for accuracy, we cannot guarantee error-free results from our tools.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h3 class="h5 card-title">Professional Use</h3>
                                    <p class="card-text">Our tools are not substitutes for professional advice or services.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>You should always verify results independently when using our tools for important purposes.</p>
                </section>

                <section class="mb-5">
                    <h2 class="h4 mb-3">External Links</h2>
                    <p>Through this website you are able to link to other websites which are not under the control of <?php echo $site_name; ?>. We have no control over the nature, content and availability of those sites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.</p>
                </section>

                <section class="mb-5">
                    <h2 class="h4 mb-3">Intellectual Property</h2>
                    <p>All tools and content on this website are the property of <?php echo $site_name; ?> unless otherwise stated. You may use our tools for personal and commercial purposes, but you may not redistribute, sell, or modify our tools without permission.</p>
                </section>

                <section class="mb-4">
                    <h2 class="h4 mb-3">Changes to This Disclaimer</h2>
                    <p>We reserve the right to modify this disclaimer at any time. Changes will be posted on this page with an updated revision date.</p>
                    <p class="text-muted small">Last Updated: <?php echo date('F j, Y'); ?></p>
                </section>

                <section class="mb-4">
                    <h2 class="h4 mb-3">Contact</h2>
                    <p>If you have any questions about this disclaimer, please <a href="<?php echo $base_url; ?>contact">contact us</a>.</p>
                </section>
            </article>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>