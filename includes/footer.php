<!-- Footer -->
<footer class="py-5 mt-5 border-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="h5 mb-3 fw-bold"><?php echo $site_name; ?></div>
                <p class="text-muted">At <?php echo $site_name; ?>, we're committed to providing free, easy-to-use web
                    utilities that help developers, designers, and everyday internet users accomplish their tasks more
                    efficiently. We believe in creating tools that are both powerful and accessible to everyone.</p>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="h5 mb-3 fw-bold">IMPROTANT LINKS</div>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>about"
                            class="nav-link p-0 text-muted">About Us</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>contact"
                            class="nav-link p-0 text-muted">Contact Us</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>privacy"
                            class="nav-link p-0 text-muted">Privacy Policy</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>disclaimer"
                            class="nav-link p-0 text-muted">Disclaimer</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="h5 mb-3 fw-bold">TRENDING TOOLS</div>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>password-generator"
                            class="nav-link p-0 text-muted">Password Generator</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>qr-code-generator"
                            class="nav-link p-0 text-muted">QR Code Generator</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>color-picker"
                            class="nav-link p-0 text-muted">Color Picker</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>pdf-editor"
                            class="nav-link p-0 text-muted">PDF Editor</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="h5 mb-3 fw-bold">TOP PDF TOOLS</div>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>lock-pdf"
                            class="nav-link p-0 text-muted">Lock PDF</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>reorder-pdf-pages"
                            class="nav-link p-0 text-muted">Reorder PDF Pages</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>merge-pdf"
                            class="nav-link p-0 text-muted">Merge PDF</a></li>
                    <li class="nav-item mb-2"><a href="<?php echo $base_url; ?>pdf-to-audio"
                            class="nav-link p-0 text-muted">PDF to Audio</a></li>
                </ul>
            </div>

        </div>

        <!-- Contextual Navigation Block for SEO -->
        <div class="row mt-4 pt-4 border-top">
            <div class="col-12 text-center">
                <p class="text-muted small">
                    WordsCompare provides a comprehensive suite of free utilities.
                    Use our <a href="<?php echo $base_url; ?>pdf-to-word"
                        class="text-muted text-decoration-underline">PDF to Word Converter</a>,
                    <a href="<?php echo $base_url; ?>age-calculator" class="text-muted text-decoration-underline">Age
                        Calculator</a>,
                    <a href="<?php echo $base_url; ?>word-counter" class="text-muted text-decoration-underline">Word
                        Counter</a>,
                    <a href="<?php echo $base_url; ?>qr-code-generator" class="text-muted text-decoration-underline">QR
                        Code Generator</a>,
                    and <a href="<?php echo $base_url; ?>json-formatter"
                        class="text-muted text-decoration-underline">JSON Formatter</a>
                    to streamline your daily tasks.
                </p>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p class="mb-0">© <?= date('Y') ?> <a href="<?= $base_url ?>"
                    class="text-decoration-none"><?= htmlspecialchars($site_name) ?></a>. All rights reserved.</p>
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

<!-- Heavy Libraries (Deferred to footer if safe, but here we use Bootstrap only) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<!-- Dropdown Logic -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Close dropdown when item is clicked
        document.querySelectorAll('.dropdown-item-custom').forEach(function (item) {
            item.addEventListener('click', function () {
                const dropdownElement = this.closest('.dropdown-menu');
                if (dropdownElement) {
                    const toggleBtn = document.querySelector('[aria-labelledby="' + dropdownElement.id + '"]');
                    if (toggleBtn) {
                        bootstrap.Dropdown.getInstance(toggleBtn).hide();
                    }
                }
            });
        });

        // Search functionality
        document.querySelectorAll('.search-input').forEach(function (input) {
            input.addEventListener('keyup', function () {
                const searchText = this.value.toLowerCase();
                const dropdownMenu = this.closest('.dropdown-menu');
                const items = dropdownMenu.querySelectorAll('.dropdown-item-custom');
                const headers = dropdownMenu.querySelectorAll('.dropdown-category-header, .grid-column-header');
                const dividers = dropdownMenu.querySelectorAll('.dropdown-divider');

                let visibleCount = 0;

                items.forEach(function (item) {
                    const text = item.textContent.toLowerCase();
                    if (text.includes(searchText) || searchText === '') {
                        item.style.display = 'flex';
                        visibleCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Show/hide headers based on search
                headers.forEach(function (header) {
                    header.style.display = visibleCount > 0 ? 'flex' : 'none';
                });

                dividers.forEach(function (divider) {
                    divider.style.display = visibleCount > 0 ? 'block' : 'none';
                });
            });
        });
    });
</script>

<!-- Custom JS -->
<script src="<?php echo $base_url; ?>assets/js/script.js?v=<?php echo time(); ?>"></script>

</body>

</html>