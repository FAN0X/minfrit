<?php
if (isset($_SESSION['sesionwisu'])) {
    $sesion = $_SESSION['sesionwisu'];
    $nombreusu_open = $sesion[0]['Nombresesion'];
    $apellidousu_open = $sesion[0]['Apellidosesion'];
    $idusu_open = $sesion[0]['Id'];
    $emailusu_open = $sesion[0]['Mailusuario'];
    $idroll_open = $sesion[0]['Roll'];
    $nombreroll_open = $sesion[0]['Nombre_rol'];
    $estadousu_open= $sesion[0]['Estado'];
    $fotousu_open = $sesion[0]['Foto'];
    $rucusu_open = $sesion[0]['Ruc'];
    $telefusu_open = $sesion[0]['Tele'];
    $dirusu_open = $sesion[0]['Dire'];
    $tipousu_open = $sesion[0]['Tipo'];
    $id_empresa = $sesion[0]['id_emp'];
    $id_usuarioempresa = $sesion[0]['id_usuemp'];
    $nombrempresa = $sesion[0]['Nombrempresa'];
    if (isset($_SESSION['sesionwisuid'])) {
        $idconj_open =  $_SESSION['sesionwisuid'];
    }
    $numerousus = 1;
}