<!-- Vendor JS Files -->
<script src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/vendor/php-email-form/validate.js"></script>
<script src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/vendor/aos/aos.js"></script>
<script src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

<!-- SweetAlert Plugin Js -->
<script src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/plugins/sweetalert2/dist/sweetalert2.min.js"></script>

<!-- Main JS File -->
<script src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/js/main.js"></script>

<!-- bundle -->
<script src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/js/vendor.min.js"></script>
<script src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/js/app.min.js"></script>

<!-- 2️⃣ jQuery Validate -->
<script src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>

<!-- (Optional but recommended) Additional methods -->
<script src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>

<!-- Form Validation JS File -->
<script src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/js/form-validation.js"></script>

<!-- Custom JS File -->
<script src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/js/custom.js"></script>

<!-- Pagination JS -->
<script src="<?= $GLOBALS['INF_CONFIG']['sitehost'] ?>/assets/js/pagination.js"></script>

<?php
    Alert::render();
    unset($_SESSION['proms']['img_input']);
?>

</html>