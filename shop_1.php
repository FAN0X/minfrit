<?php
session_start();
include './config.php';
include './controlador/conexion.php';
require './funciones/fn-index.php';
$fnindex = new Fn_index();
$con = new Conecciones();
$conecta = $con->crearConexion();
$detcate = $fnindex->fnindex_rcategoria_xidcategoriapadre(0);
$listclub = $fnindex->fnindex_rclub();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- required meta -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- #favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
        <!-- #title -->
        <title>MinFritid | Shop</title>
        <!-- #keywords -->
        <meta name="keywords" content="Golf, Golftio">
        <!-- #description -->
        <meta name="description" content="Golftio HTML5 Template">

        <!-- ==== css dependencies start ==== -->

        <!-- bootstrap five css -->
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <!-- font awesome six css -->
        <link rel="stylesheet" href="assets/vendor/font-awesome/css/all.min.css">
        <!-- glyphter css -->
        <link rel="stylesheet" href="assets/vendor/glyphter/css/golftio.css">
        <!-- nice select css -->
        <link rel="stylesheet" href="assets/vendor/nice-select/css/nice-select.css">
        <!-- magnific popup css -->
        <link rel="stylesheet" href="assets/vendor/magnific-popup/css/magnific-popup.css">
        <!-- slick css -->
        <link rel="stylesheet" href="assets/vendor/slick/css/slick.css">
        <!-- odometer css -->
        <link rel="stylesheet" href="assets/vendor/odometer/css/odometer.css">
        <!-- jquery ui css -->
        <link rel="stylesheet" href="assets/vendor/jquery-ui/jquery-ui.min.css">
        <!-- animate css -->
        <link rel="stylesheet" href="assets/vendor/animate/animate.css">

        <!-- ==== / css dependencies end ==== -->

        <!-- main css -->
        <link rel="stylesheet" href="assets/css/main.css">
    </head>

    <body>

        <!-- ==== preloader start ==== -->
        <div id="preloader">
            <div id="ctn-preloader" class="ctn-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading">
                        <span data-text-preloader="L" class="letters-loading">
                            L
                        </span>

                        <span data-text-preloader="O" class="letters-loading">
                            O
                        </span>

                        <span data-text-preloader="A" class="letters-loading">
                            A
                        </span>

                        <span data-text-preloader="D" class="letters-loading">
                            D
                        </span>

                        <span data-text-preloader="I" class="letters-loading">
                            I
                        </span>

                        <span data-text-preloader="N" class="letters-loading">
                            N
                        </span>

                        <span data-text-preloader="G" class="letters-loading">
                            G
                        </span>
                    </div>
                </div>
                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
            </div>
        </div>
        <!-- ==== / preloader end ==== -->

        <!-- ==== header start ==== -->
        <header class="header header--secondary" style="background: #ffffff">
            <?php include './header.php' ?> 
        </header>
        <!-- ==== / header end ==== -->



        <!-- ==== shop section start ==== -->
        <section class="shop shop--main section">
            <div class="container">
                <div class="row justify-content-center section__row">
                    <div class="col-12 col-xl-4 section__col">
                        <?php include './mod-shop-right.php' ?>  
                    </div>
                    <div class="col-xl-8 section__col">
                        <?php include './mod-shop-left.php' ?>
                    </div>

                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Location map</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <section class="section product-description" style="padding: 0px 0px !important;">
                                <div class="container">
                                    <div class="row align-items-center section__row">
                                        <div class="col-lg-6 section__col">
                                            <div class="product-description__thumb">
                                                <img src="assets/images/shop/gloves-large.png" alt="Gloves">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-5 offset-xl-1 section__col">
                                            <div class="product-description__content">
                                                <div class="product-description__content-head">
                                                    <div>
                                                        <h5>Radio</h5>
                                                    </div>
                                                </div>
                                                <div class="product-description__content-tab">
                                                    <select class="selected form-control">
                                                        <option value="1"> 500 mt</option> 
                                                        <option value="1000"> 1000 mt</option> 
                                                        <option value="2000"> 2000 mt</option> 
                                                    </select>
                                                </div>
                                                <div class="product-description__content-footer">
                                                    <div class="product-pricing__cta">
                                                        <a href="#" class="cmn-button">Search club</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ==== / shop section end ==== -->

        <section class="section testimonial testimonial--secondary wow fadeInUp" data-wow-duration="0.4s" style="visibility: visible; animation-duration: 0.4s; animation-name: fadeInUp;">
            <?php include './mod-google-feeds.php' ?>
        </section>

        <!-- ==== footer start ==== -->
        <footer class="footer">
            <?php include './footer.php' ?>
        </footer>
        <!-- ==== / footer end ==== -->

        <!-- scroll to top -->
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>

        <!-- ==== js dependencies start ==== -->

        <!-- jquery -->
        <script src="assets/vendor/jquery/jquery-3.6.3.min.js"></script>
        <!-- bootstrap five js -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- nice select js -->
        <script src="assets/vendor/nice-select/js/jquery.nice-select.min.js"></script>
        <!-- magnific popup js -->
        <script src="assets/vendor/magnific-popup/js/jquery.magnific-popup.min.js"></script>
        <!-- slick js -->
        <script src="assets/vendor/slick/js/slick.min.js"></script>
        <!-- odometer js -->
        <script src="assets/vendor/odometer/js/odometer.min.js"></script>
        <!-- viewport js -->
        <script src="assets/vendor/viewport/viewport.jquery.js"></script>
        <!-- jquery ui js -->
        <script src="assets/vendor/jquery-ui/jquery-ui.min.js"></script>
        <!-- wow js -->
        <script src="assets/vendor/wow/wow.min.js"></script>

        <!-- ==== / js dependencies end ==== -->

        <!-- plugins js -->
        <script src="assets/js/plugins.js"></script>
        <!-- main js -->
        <script src="assets/js/main.js"></script>
        <script src="js/js-index.js"></script>
    </body>
</html>