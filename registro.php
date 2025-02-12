<!DOCTYPE html>
<html lang="en" class="h-100">


    <!-- Mirrored from makaanlelo.com/tf_products_007/tixia/xhtml/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Aug 2022 19:22:33 GMT -->
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
        <title>WasiUp - Registro </title>
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
                                        <h4 class="text-center mb-4">Crear una cuenta</h4>
                                        <form id="i_formregistro">
                                            <div class="form-group">
                                                <label class="mb-1"><strong>Cédula o RUC</strong></label>
                                                <input type="text" name="cedula_usuario" class="form-control" placeholder="Cédula o RUC">
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1"><strong>Nombres</strong></label>
                                                <input type="text" name="nombre_usuario" class="form-control" placeholder="Nombres">
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1"><strong>Apellidos</strong></label>
                                                <input type="text" name="apellido_usuario" class="form-control" placeholder="Apellidos">
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1"><strong>Teléfono *</strong></label>
                                                <input type="text" name="tlf1_usuario" class="form-control" placeholder="Teléfono">
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1"><strong>Nombre de Conjunto Habitacional, Edificio o Casa *</strong></label>
                                                <input type="text" name="nombre_conjunto" class="form-control" placeholder="Conjunto">
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1"><strong>Tipo</strong></label>
                                                <div class="col-sm-12">
                                                    <select id="id" class="form-control" name="tipozomaresid_conjunto">
                                                        <option value="1">Conjunto Habitacional</option>
                                                        <option value="2">Edificio</option>
                                                        <option value="3">Casa</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1"><strong>Número de unidades habitacionales *</strong></label>
                                                <input type="text" name="cantidadhab_conjunto" class="form-control" placeholder="1">
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1"><strong>Tipo de Gestor *</strong></label>
                                                <select name="tipo_gestor" class="form-control">
                                                    <option value="0">PROPIETARIO</option>
                                                    <option value="1">ADMINISTRADOR</option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1"><strong>Email *</strong></label>
                                                <input type="email" name="email_usuario" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1"><strong>Contraseña</strong></label>
                                                <input type="password" name="clave_usuario" class="form-control" value="">
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1"><strong>Repita Contraseña</strong></label>
                                                <input type="password" name="clave1_usuario" class="form-control" value="">
                                            </div>

                                        </form>
                                        <div id="i_res" class="text-center">
                                            <div id="i_loader" style="display: none">
                                                <img src="images/Home-Icon.gif" width="100px" alt="alt"/>
                                                <br><label>CREANDO...</label>
                                            </div>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="button" onclick="sesion_registro()" class="btn btn-primary btn-block">Crear Cuenta</button>
                                        </div>
                                        <div class="new-account mt-3">
                                            <p>Ya tienes una cuenta? <a class="text-primary" href="login.php">Ingresar</a></p>
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
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>





        <script src="vendor/global/global.min.js"></script>
        <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="js/custom.min.js"></script>
        <script src="js/deznav-init.js"></script>
        <script type="text/javascript" src="js/js-registro.js"></script>
    </body>

    <!-- Mirrored from makaanlelo.com/tf_products_007/tixia/xhtml/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Aug 2022 19:22:33 GMT -->
</html>