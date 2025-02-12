<?php
session_start();
include './config.php';
include './controlador/conexion.php';
require './funciones/fn-index.php';
$fnindex = new Fn_index();
$con = new Conecciones();
$conecta = $con->crearConexion();
$id = $_GET['idevent'];
$detnoticia = $fnindex->fnindex_rnoticia_xid($id);

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
    <title>MinFritid | <?php echo $detnoticia[0]['titulo_noticia'] ?></title>
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
              <h2 style="color: #000000"><?php echo $detnoticia[0]['titulo_noticia'] ?></h2>
          </div>
        </div>
        <div class="col-md-6">
          <div class="banner--inner__breadcrumb d-flex justify-content-start justify-content-md-end">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php" style="color: #000000">Home</a></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ==== / banner end ==== -->

  <!-- ==== blog details start ==== -->
  <section class="section blog-details">
    <div class="container">
      <div class="row justify-content-center section__row">
        <div class="col-12 col-xl-8 section__col">
          <div class="blog-details__wrapper">
            <div class="blog-details__inner">
              <div class="blog-details__thumb">
                <img src="assets/images/blog/details-thumb.png" alt="Blog Details">
              </div>
              <div class="blog-details__meta">
                <h3><?php echo $detnoticia[0]['titulo_noticia'] ?></h3>
                <div class="blog-details__content-meta">
                  <p><i class="golftio-user"></i> Admin</p>
                  <p><i class="fa-solid fa-calendar-week"></i> <?php echo $detnoticia[0]['fecha_noticia'] ?></p>
                </div>
                <div class="blog-details__content">
                  <?php echo utf8_encode($detnoticia[0]['detalle_noticia']) ?>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <div class="col-12 col-xl-4 section__col">
          <div class="sidebar wow fadeInUp" data-wow-duration="0.4s">
            <div class="sidebar__single">
              <h5>Popular Tags</h5>
              <hr>
              <div class="sidebar__tags">
                  <?php
                  $tag_noticia = utf8_encode($detnoticia[0]['tag_noticia']); 
                  $tagarray = explode(",", $tag_noticia);
                  for($i=0; $i < count($tagarray);$i++ ){
                  ?>
                 <a href="#" class="cmn-button cmn-button--secondary" title="Blog"><?php echo $tagarray[$i] ?></a>
                <?php } ?>
              </div>
            </div>
            <div class="sidebar__single">
              <h5>Follow Our Journey</h5>
              <hr>
              <div class="social justify-content-start">
                <a href="#">
                  <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="#">
                  <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="#">
                  <i class="fa-brands fa-linkedin-in"></i>
                </a>
                <a href="#">
                  <i class="fa-brands fa-square-instagram"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ==== / blog details end ==== -->

  <!-- ==== related news start ==== -->
  <section class="section related-news blog wow fadeInUp" data-wow-duration="0.4s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section__header--secondary">
            <div class="row align-items-center">
              <div class="col-lg-8">
                <div class="section__header--secondary__content">
                  <h2>More Related News</h2>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="section__header--secondary__cta">
                  <div class="slider-navigation justify-content-lg-end">
                    <button class="next-news cmn-button cmn-button--secondary">
                      <i class="fa-solid fa-angle-left"></i>
                    </button>
                    <button class="prev-news cmn-button cmn-button--secondary">
                      <i class="fa-solid fa-angle-right"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center section__row">
        <div class="col-sm-10 col-md-12 section__col">
          <div class="related-news__slider">
             <?php 
             $listnoticia = $fnindex->fnindex_rnoticia_xidclub(1);
             while ($noticia = $listnoticia->fetch_assoc()) { ?>
            <div class="blog-single">
              <div class="blog__thumb">
                <a href="blog-details.html" title="Read More">
                  <img src="assets/images/blog/one.png" alt="Blog">
                </a>
              </div>
              <div class="blog__content">
                <h5>
                  <a href="blog-details.html" title="Read More"> <?php echo $noticia['titulo_noticia'] ?></a>
                </h5>
                <div class="blog__content-meta">
                  <p><i class="golftio-user"></i> Admin</p>
                  <p><i class="fa-solid fa-calendar-week"></i> <?php echo $noticia['fecha_noticia'] ?></p>
                </div>
                <p class="secondary-text">
                  <?php echo $noticia['resumen_noticia'] ?>
                </p>
                <a href="event-detail.php?idevent=<?php echo $noticia['id_noticia'] ?>" title="Read More" class="cmn-button cmn-button--secondary">Read more</a>
              </div>
            </div>
          <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ==== / related news end ==== -->

 

   

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