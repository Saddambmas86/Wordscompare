<!-- Footer -->
<footer class="py-5 mt-5 border-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="h5 mb-3 fw-bold"><?php echo $site_name; ?></div>
                <p class="text-muted">At <?php echo $site_name; ?>, we're committed to providing free, easy-to-use web utilities that help developers, designers, and everyday internet users accomplish their tasks more efficiently. We believe in creating  tools that are both powerful and accessible to everyone.</p>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="h5 mb-3 fw-bold">IMPROTANT LINKS</div>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>about" class="nav-link p-0 text-muted">About Us</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>contact" class="nav-link p-0 text-muted">Contact Us</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>privacy" class="nav-link p-0 text-muted">Privacy Policy</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>disclaimer" class="nav-link p-0 text-muted">Disclaimer</a></li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="h5 mb-3 fw-bold">TRENDING TOOLS</div>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>password-generator" class="nav-link p-0 text-muted">Password Generator</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>qr-code-generator" class="nav-link p-0 text-muted">QR Code Generator</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>color-picker" class="nav-link p-0 text-muted">Color Picker</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>pdf-editor" class="nav-link p-0 text-muted">PDF Editor</a></li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="h5 mb-3 fw-bold">TOP PDF TOOLS</div>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>lock-pdf" class="nav-link p-0 text-muted">Lock PDF</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>reorder-pdf-pages" class="nav-link p-0 text-muted">Reorder PDF Pages</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>merge-pdf" class="nav-link p-0 text-muted">Merge PDF</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>pdf-to-audio" class="nav-link p-0 text-muted">PDF to Audio</a></li>
                </ul>
            </div>

        </div>
        
        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p class="mb-0">© <?= date('Y') ?> <a href="<?= $base_url ?>" class="text-decoration-none"><?= htmlspecialchars($site_name) ?></a>. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-dark" href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><i class="fab fa-github"></i></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><i class="fab fa-discord"></i></a></li>
            </ul>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button -->
<button id="scrollToTop" class="btn btn-danger scroll-to-top">
    <i class="fas fa-arrow-up"></i>
</button>

<!-- Custom JS -->
<script src="<?php echo $base_url; ?>assets/js/script.js?v=<?php echo time(); ?>"></script>
</body>
</html>