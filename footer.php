
<!-- ======= Footer ======= -->
<footer class="footer">
    <div class="copyrights">
        <div class="container">
            <p>&copy; Copyrights <?php
                global $conn;
                $info_quary = "SELECT * FROM site_info";
                $row = mysqli_fetch_assoc(mysqli_query($conn,$info_quary));
                 echo $row['s_name']?>. All rights reserved.</p>
            <div class="credits">
            </div>
        </div>
    </div>

</footer><!-- End  Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>