<!-- Footer -->
<footer class="py-5 mt-5 border-top">  
        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p class="mb-0">© <?= date('Y') ?> <a href="<?= $base_url ?>"
                    class="text-decoration-none"><?= htmlspecialchars($site_name) ?></a>. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-dark" href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><i class="fab fa-github"></i></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><i class="fab fa-discord"></i></a></li>
            </ul>
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