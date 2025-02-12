<?php
session_start();
if (isset($_SESSION['sesionwisu'])) {
    header('Location: ./miperfil/index.php?opc=3');
}
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}
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
        <title>MinFritid | Sign In</title>
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
        <header class="header">
            <?php include './header.php' ?> 
        </header>
        <!-- ==== / header end ==== -->

        <!-- ==== authentication start ==== -->
        <section class="section section--space-bottom authentication authentication--alt wow fadeInUp"
                 data-wow-duration="0.4s">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xxl-6">
                        <div class="authentication__wrapper">
                            <h4>Sign in to MinFritid</h4>
                            <p>Sign in to your account and Join our club</p>
                            <form action="#" method="post" id="account">
                                <div class="input-single">
                                    <label for="authEmailIn">Enter Your Email ID</label>
                                    <input type="email" name="usernames" id="authEmailIn" required
                                           placeholder="Your email ID here">
                                </div>
                                <div class="input-single">
                                    <label for="authPassword">Enter Password</label>
                                    <input type="password" name="passs" id="authPassword" required
                                           placeholder="Enter Your Password">
                                </div>
                                <p class="forget secondary-text">
                                    <a href="#">Forgot Password?</a>
                                </p>
                                <div class="text-center" id="div_sesion" style="margin-bottom: 15px"><?php echo $msg ?></div>
                                <div class="section__cta text-start">
                                    <button onclick="cnsesion_f1()" type="button" class="cmn-button">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==== / authentication end ==== -->

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
        <!-- main js -->
        <script type="text/javascript" src="js/js-registro.js"></script>
    </body>
</html>