<?php 
$page_title = "About Us";
$page_description = "Learn about Snapy Tools - our mission, vision, and the team behind the powerful web utilities";
$page_keywords = "about Snapy Tools, tools about, online utilities about";
include '../includes/header.php'; 
?>

<!-- Page Content -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 border shadow-sm p-4">
            <article>
                <header class="mb-5 text-center">
                    <h1 class="display-5 fw-bold">About <?php echo $site_name; ?></h1>
                    <p class="lead">Powerful web utilities designed to simplify your online experience</p>
                </header>

                <section class="mb-5">
                    <h2 class="h4 mb-3">Our Mission</h2>
                    <p>At <?php echo $site_name; ?>, we're committed to providing free, easy-to-use web utilities that help developers, designers, and everyday internet users accomplish their tasks more efficiently. We believe in creating tools that are both powerful and accessible to everyone.</p>
                </section>

                <section class="mb-5">
                    <h2 class="h4 mb-3">What We Offer</h2>
                    <p>Our platform features a growing collection of web-based tools including:</p>
                    <ul>
                        <li>Code generators and validators</li>
                        <li>Text and data conversion utilities</li>
                        <li>SEO and website analysis tools</li>
                        <li>Privacy-focused online tools</li>
                        <li>Developer resources</li>
                    </ul>
                    <p>All our tools are designed to work directly in your browser without requiring installations or downloads.</p>
                </section>

                <section class="mb-5">
                    <h2 class="h4 mb-3">Our Values</h2>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h3 class="h5 card-title">Simplicity</h3>
                                    <p class="card-text">We prioritize clean, intuitive interfaces that make complex tasks simple.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h3 class="h5 card-title">Privacy</h3>
                                    <p class="card-text">Your data stays yours. Most tools process data locally in your browser.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h3 class="h5 card-title">Accessibility</h3>
                                    <p class="card-text">We design our tools to be usable by everyone, regardless of ability or device.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h3 class="h5 card-title">Innovation</h3>
                                    <p class="card-text">We continuously improve and expand our toolset based on user feedback.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mb-5">
                    <h2 class="h4 mb-3">The Team</h2>
                    <p><?php echo $site_name; ?> is developed by a small team of passionate web developers and designers who understand the challenges of working online. We build the tools we want to use ourselves, and we're excited to share them with you.</p>
                    <p>While we may be small, we're dedicated to providing high-quality utilities that make a real difference in your workflow.</p>
                </section>

                <section class="mb-4">
                    <h2 class="h4 mb-3">Get In Touch</h2>
                    <p>We'd love to hear from you! Whether you have suggestions for new tools, feedback on existing ones, or just want to say hello, please don't hesitate to <a href="<?php echo $base_url; ?>contact">contact us</a>.</p>
                </section>
            </article>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>