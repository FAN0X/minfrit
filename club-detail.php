<?php
session_start();
include './config.php';
include './controlador/conexion.php';
require './funciones/fn-index.php';
$fnindex = new Fn_index();
$con = new Conecciones();
$conecta = $con->crearConexion();
$id = $_GET['id'];
$detclub = $fnindex->fnindex_rclub_xid($id);
$sesion = $_SESSION['sesionwisu'];
$idusu_open = $sesion[0]['Id'];
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
        <title>MinFritid | <?php echo $detclub[0]['nombre_club'] ?></title>
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
        <header class="header header--secondary">
            <?php include './header.php' ?> 
        </header>
        <!-- ==== / header end ==== -->

        <!-- ==== banner start ==== -->
        <section class="banner--inner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="banner--inner__content">
                            <h2 style="color: black !important;"><?php echo $detclub[0]['nombre_club'] ?></h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="banner--inner__breadcrumb d-flex justify-content-start justify-content-md-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a style="color: black !important;" href="index.php">Index</a></li>
                                    <li class="breadcrumb-item" style="color: black !important;">Shop</li>
                                    <li class="breadcrumb-item active" aria-current="page" style="color: black !important;">
                                        <?php echo $detclub[0]['nombre_club'] ?>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==== / banner end ==== -->

        <!-- ==== product description section start ==== -->
        <section class="section product-description">
            <div class="container">
                <div class="row align-items-center section__row">
                    <div class="col-lg-6 section__col">
                        <div class="product-description__thumb">
                            <img src="images/<?php echo $detclub[0]['foto_club'] ?>" alt="Gloves">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-5 offset-xl-1 section__col">
                        <div class="product-description__content">
                            <div class="product-description__content-head">
                                <div>
                                    <h5><?php echo $detclub[0]['nombre_club'] ?></h5>
                                </div>
                                <div class="review-product">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                            <div class="product-description__content-tab">
                                <div class="product-description-tab-content">
                                    <div class="product-description-tab-single" id="productDescription">
                                        <p class="secondary-text"><?php echo $detclub[0]['desc_club'] ?></p>
                                        <p class="secondary-text mt-5"><b>Location:</b> </p>
                                        <p class="secondary-text mt-3"><b>Open:</b> </p>
                                        <p class="secondary-text mt-3"><b>Hours:</b> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="product-description__content-footer">
                                <div class="product-pricing__cta">
                                    <a onclick="cnindex_f3(3,<?php echo $detclub[0]['id_club'] ?>,<?php echo $idusu_open ?>)"  href="javascript:void(0)" class="cmn-button" data-toggle="modal" data-target="#exampleModal">Subscribe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content" id="div_subscribe">
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- ==== / product description section end ==== -->

        <!-- ==== review section start ==== -->
        <section class="section event wow fadeInUp" data-wow-duration="0.4s" style="background: ghostwhite !important;">
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <div class="section__header--secondary">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <div class="section__header--secondary__content">
                                        <h5>Event</h5>
                                        <h2>Our upcoming events</h2>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="section__header--secondary__cta">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center section__row">
                    <?php
                    $listnoticia = $fnindex->fnindex_rnoticia_xidclub($id);
                    while ($noticia = $listnoticia->fetch_assoc()) {
                        ?>
                        <div class="col-sm-10 col-md-6 section__col">
                            <div class="event__single">
                                <div class="event__single-thumb">
                                    <a href="event-detail.php?idevent=<?php echo $noticia['id_noticia'] ?>">
                                        <img src="assets/images/event/one.png" alt="Image">
                                    </a>
                                </div>
                                <div class="event__single-content">
                                    <h3><?php echo date('d', strtotime($noticia['fecha_noticia'])) ?><span class="primary-text">/<?php echo date('F', strtotime($noticia['fecha_noticia'])) ?></span></h3>
        <!--                            <p>Friday at 10:00 am</p>-->
                                    <h5 class="mb-3"><?php echo $noticia['titulo_noticia'] ?></h5>
                                    <p class="secondary-text"><i class="golftio-location"></i> <?php echo $noticia['lugar_noticia'] ?></p>
                                    <a href="event-detail.php?idevent=<?php echo $noticia['id_noticia'] ?>" class="cmn-button">View more</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- ==== / review section end ==== -->

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