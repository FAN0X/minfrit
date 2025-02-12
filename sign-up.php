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
    <title>MinFritid | Sign Up</title>
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
    <section class="section section--space-bottom authentication wow fadeInUp" data-wow-duration="0.4s">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xxl-6">
                    <div class="authentication__wrapper">
                        <h4>Let's Get Started!</h4>
                        <p>Please Enter your Email Address to join our club</p>
                        <form action="#" method="post">
                            <div class="input-group">
                                <div class="input-single">
                                    <label for="authFirstName">First Name</label>
                                    <input type="text" name="auth-first-name" id="authFirstName" required
                                        placeholder="Jone">
                                </div>
                                <div class="input-single">
                                    <label for="authLastName">Last Name</label>
                                    <input type="text" name="auth-last-name" id="authLastName" required
                                        placeholder="Fisher">
                                </div>
                            </div>
                            <div class="input-single">
                                <label for="authEmail">Enter Your Email ID</label>
                                <input type="email" name="auth-email" id="authEmail" required
                                    placeholder="Your email ID here">
                            </div>
                            <p>By clicking submit, you agree to <a href="#">Terms of Use</a>, <a
                                    href="#">Privacy Policy</a>, <a
                                    href="#">E-sign</a> & <a href="#">communication
                                    Authorization</a>.</p>
                            <div class="section__cta text-start">
                                <button type="submit" class="cmn-button">Sign Up</button>
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
</body>
</html>