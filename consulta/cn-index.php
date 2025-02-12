<?php
date_default_timezone_set('America/Guayaquil');
session_start();
//include '../sesiones/abrir.php';
include '../config.php';
include '../controlador/conexion.php';
require '../funciones/fn-index.php';
require '../funciones/fn-tienda.php';
$fnindex = new Fn_index();
$fntienda = new Fn_tienda();

$cn_opc = $_POST['dato_0'];
if ($cn_opc == 1) {
    //echo 'sdsdsd';
    $id_categoria = '';
    foreach ($_POST['categories'] as $checkbox) {
        $id_categoria .= $checkbox . ',';
    }
    $id_categoria = substr($id_categoria, 0, -1);
    //print_r($id_categoria);
    if ($id_categoria != '') {
        $listclub = $fnindex->fnindex_rclub_xidcategoria($id_categoria);
        while ($club = $listclub->fetch_assoc()) {
            ?>
            <div class="col-sm-10 col-md-4 col-xl-4 section__col">
                <div class="shop__card">
                    <div class="shop__card-thumb">
                        <a href="club-detail.php?id=<?php echo $club['id_club'] ?>">
                            <img src="images/<?php echo $club['foto_club'] ?>" alt="Image">
                        </a>
                    </div>
                    <div class="shop__card-info">
                        <h5><a href="club-detail.php?id=<?php echo $club['id_club'] ?>"><?php echo $club['nombre_club'] ?></a></h5>
                        <p style="color: #000000"><?php echo $club['desc_club'] ?></p>
                    </div>
                    <div class="shop__card-review">
                        <i class="golftio-star"></i>
                        <i class="golftio-star"></i>
                        <i class="golftio-star"></i>
                        <i class="golftio-star"></i>
                        <i class="golftio-star"></i>
                    </div>
                    <div class="shop__card-cta">
                        <a href="club-detail.php?id=<?php echo $club['id_club'] ?>" class="cmn-button">Subscribe</a>
                    </div>
                </div>
            </div>
            <?php
        }
    }else {
        $listclub = $fnindex->fnindex_rclub_xall();
        while ($club = $listclub->fetch_assoc()) {
            ?>
            <div class="col-sm-10 col-md-4 col-xl-4 section__col">
                <div class="shop__card">
                    <div class="shop__card-thumb">
                        <a href="club-detail.php?id=<?php echo $club['id_club'] ?>">
                            <img src="images/<?php echo $club['foto_club'] ?>" alt="Image">
                        </a>
                    </div>
                    <div class="shop__card-info">
                        <h5><a href="club-detail.php?id=<?php echo $club['id_club'] ?>"><?php echo $club['nombre_club'] ?></a></h5>
                        <p style="color: #000000"><?php echo $club['desc_club'] ?></p>
                    </div>
                    <div class="shop__card-review">
                        <i class="golftio-star"></i>
                        <i class="golftio-star"></i>
                        <i class="golftio-star"></i>
                        <i class="golftio-star"></i>
                        <i class="golftio-star"></i>
                    </div>
                    <div class="shop__card-cta">
                        <a href="club-detail.php?id=<?php echo $club['id_club'] ?>" class="cmn-button">Subscribe</a>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
if ($cn_opc == 2) {
    $sendopc = 0;
    $id_tienda = $_POST['dato_1'];
    $idusu = $_POST['dato_2'];
    $estado = 2;
    $comentario = utf8_decode($_POST['comentario']);
    $texto = 'ENVIADA A CLIENTE ';
    $cuenta = $fntienda->fntienda_cseguimiento_xid($id_tienda, $idusu, utf8_decode('COTIZACIÓN ' . $texto) . '' . $comentario);
    if ($cuenta == 1) {
        $cuenta1 = $fntienda->fntienda_ustatustienda_xid($id_tienda, $estado);
        $cuenta2 = $fntienda->fntienda_sendemailcliente_tienda($id_tienda);
        $sendopc = 1;
        $text = '<span style="color:green;">!!</span> RESPUESTA GUARDADA CORRECTAMENTE' . $cuenta;
    } else {
        $texterror = '<span style="color:red;">!!</span> ERROR AL ENVIAR LA RESPUESTA';
    }
    //crear json
    $jsondata = array();
    $jsondata['opc'] = $sendopc;
    $jsondata['text'] = $text;
    $jsondata['texterror'] = $texterror;
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($jsondata);
}
if ($cn_opc == 3) {
    $id_club = $_POST['dato_1'];
    $detclub = $fnindex->fnindex_rclub_xid($id_club);
    $sesion = $_SESSION['sesionwisu'];
    ?>
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subscribe <?php echo $detclub[0]['nombre_club'] ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <section class="section product-description" style="padding: 0px 0px !important;">
            <div class="container">
                <?php if (!$_SESSION['sesionwisu']) { ?>
                    <div class="row align-items-center section__row">
                        <div class="col-lg-12 section__col">
                            <div class="product-description__thumb text-center">
                                <h4>Hello welcome,</h4>
                                <p style="margin-top: 10px; font-size: 1.2em;">To access the subscription at <?php echo $detclub[0]['nombre_club'] ?> you must be registered with Minfritid</p>
                                <p style="margin-top: 10px; font-size: 1.2em;">Select one of the options below</p>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center section__row mb-5 mt-4">
                        <div class="col-lg-6 col-xl-6 text-right">
                            <a style="float: right !important;" href="sign-in.php" class="cmn-button">Login</a>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <a style="float: left !important;" href="sign-up.php" class="cmn-button">Register</a>
                        </div>
                    </div>
                    <?php
                } else {
                    $nombre_usuario = $sesion[0]['Nombresesion'];
                    ?>
                    <div class="row align-items-center section__row">
                        <div class="col-lg-12 section__col">
                            <div class="product-description__thumb text-center">
                                <h4>Hello  <?php echo $nombre_usuario ?> ,</h4>
                                <p style="margin-top: 10px; font-size: 1.2em;">To access the subscription at <?php echo $detclub[0]['nombre_club'] ?> you must be registered with Minfritid</p>
                                <p style="margin-top: 10px; font-size: 1.2em;">Select one of the options below</p>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center section__row mb-5 mt-4">
                        <div class="col-lg-12 col-xl-12 text-right">
                            <center><a onclick="cnindex_f4(4,<?php echo $id_club ?>,<?php echo $sesion[0]['Id'] ?>)"  href="javascript:void(0)" class="cmn-button">Subscribe now </a></center>
                        </div>
                        <div class="col-lg-12 col-xl-12 mt-5 text-center" id="result_subscribe"></div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
    <?php
}
if ($cn_opc == 4) {
    //registrarse 
    $id_club = $_POST['dato_1'];
    $id_usuario = $_POST['dato_2'];
    $estado_suscripcion = 0;
    $fecha_suscripcion = date('Y-m-d');
    $cuenta = $fnindex->fnindex_csuscripcion($id_club, $id_usuario, $estado_suscripcion, $fecha_suscripcion);
    if ($cuenta == 1) {
        echo '1';
    } else {
        echo 'Error when registering a new subscription ';
    }
}