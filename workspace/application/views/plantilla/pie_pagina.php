    <!-- ======= MENSAJE FINAL ===== -->
    <!-- campo oculto para saber si debe monstrar un mensaje de error -->
    <input id="mostrarError" type="hidden" value="<?php echo $mensaje ?>" />

    <script>
        $(document).ready(function() {
            $mensaje=$("#mostrarError").val();
            if($mensaje!='')
            {
                alert($("#mostrarError").val());
            }
        });
    </script>

    <!-- ======= Footer ======= -->
    <footer id="footer" style="margin-top: 60px;">

        <!--<div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h4>Join Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div> -->

       <div class="container py-4">
            <div class="copyright">
                All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootstrap-bootstrap-business-template/ -->
                Diseñado por Kerlly Viera</a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>public/assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url() ?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>public/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url() ?>public/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>public/assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url() ?>public/assets/vendor/purecounter/purecounter.js"></script>
    <script src="<?= base_url() ?>public/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url() ?>public/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?= base_url() ?>public/assets/vendor/select2/dist/js/select2.js"></script>
    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>public/assets/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('.buscar').select2();
        });
    </script>                
    </body>

    </html>