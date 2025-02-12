<?php
session_start();
if (isset($_SESSION['sesionwisu'])) {
    header('Location: ./index.php?opc=2');
}
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}

?>
<!DOCTYPE html>
<html lang="en" class="h-100">


    <!-- Mirrored from makaanlelo.com/tf_products_007/tixia/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Aug 2022 19:20:27 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="admin, dashboard" />
        <meta name="author" content="DexignZone" />
        <meta name="robots" content="index, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="tixia : tixia School Admission Admin  Bootstrap 5 Template" />
        <meta property="og:title" content="tixia : tixia School Admission Admin  Bootstrap 5 Template" />
        <meta property="og:description" content="tixia : tixia School Admission Admin  Bootstrap 5 Template" />
        <meta property="og:image" content="https://tixia.dexignzone.com/xhtml/social-image.png" />
        <meta name="format-detection" content="telephone=no">
        <title>WasiUp - Panel de Cliente </title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
        <link href="css/style.css" rel="stylesheet">

    </head>

    <body class="vh-100">
        <div class="authincation h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-md-6">
                        <div class="authincation-content">
                            <div class="row no-gutters">
                                <div class="col-xl-12">
                                    <div class="auth-form">
                                        <div class="text-center mb-3">
                                            <a href="login.php"><img src="images/logo_1.png" alt="" width="40%"></a>
                                        </div>
                                        <h4 class="text-center mb-4">Ingresa a tu cuenta</h4>
                                        <form  id="account">
                                            <div class="form-group">
                                                <label class="mb-1"><strong>Correo</strong></label>
                                                <input type="email" name="usernames" class="form-control"  placeholder="hello@example.com">
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1"><strong>Clave</strong></label>
                                                <input type="password" name="passs" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                                <div class="form-group">
                                                    <div class="form-check custom-checkbox ms-1">
                                                        <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                                        <label class="form-check-label" for="basic_checkbox_1">Recordar mi clave</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <a href="olvido_clave.php">Olvidaste tu contraseña?</a>
                                                </div>
                                            </div>
                                            <div class="text-center" id="div_sesion" style="margin-bottom: 15px"><?php echo $msg ?></div>
                                            <div class="text-center">
                                                <button onclick="cnsesion_f1()" type="button" class="btn btn-primary btn-block">Ingresar</button>
                                            </div>
                                        </form>
                                        <div class="new-account mt-3">
                                            <p>No tienes una cuenta? <a class="text-primary" href="registro.php">Crear una</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--**********************************
            Scripts
        ***********************************-->
        <!-- Required vendors -->
        <script src="vendor/global/global.min.js"></script>
        <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="js/custom.min.js"></script>
        <script src="js/deznav-init.js"></script>
        <!-- js -->
        <script type="text/javascript" src="js/js-registro.js"></script>
    </body>


    <!-- Mirrored from makaanlelo.com/tf_products_007/tixia/xhtml/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Aug 2022 19:20:28 GMT -->
</html>