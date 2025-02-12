<?php
session_start();
include '../config.php';
include '../controlador/conexion.php';
include '../funciones/fn-sesion.php';
require '../funciones/fn-alert.php';
//require '../assets/hybridauth-3.4.0/src/autoload.php';
//require '../assets/hybridauth-3.4.0/itsa/config.php';

//use Hybridauth\Hybridauth;

$a = new Fn_sesion();
$fnalert = new Fn_alert();
if (isset($_GET['sesionout'])) {
    unset($_SESSION['sesionwisu']);
    unset( $_SESSION['sesionwisuid']);
//    $hybridauth = new Hybridauth($config);
//    $hybridauth->disconnectAllAdapters();
    //echo $fnalert->fnalert_sesion(3);
    header('Location: ../../sign-in.php?msg=Sesión cerrada correctamente');
} else {
    if (isset($_SESSION['sesionwisu'])) {
        header('Location: ../../sign-in.php');
    } else {
        $user = utf8_decode($_POST['usernames']);
        $pass = utf8_decode($_POST['passs']);
        //$user = 'admin@tomebamba.com';
        //$pass = 'admin4321';
        if ($pass == '' || $user == '') {
            echo $fnalert->fnalert_sesion(1);
        } else {
            $sesion = $a->fn_ruser_x($user, $pass);
            echo $sesion->num_rows;
            if ($sesion->num_rows > 0) {
                while ($menu = $sesion->fetch_assoc()) {
                    $arreglo[] = array('Id' => $menu['id_usuario'],
                        'Nombresesion' => $menu['nombre_usuario'],
                        'Apellidosesion' => $menu['apellido_usuario'],
                        'Mailusuario' => $menu['email_usuario'],
                        'Roll' => $menu['id_rol'],
                        'Nombre_rol' => $menu['nombre_rol'],
                        'Estado' => $menu['estado_usuario'],
                        'Foto' => $menu['foto_usuario'],
                        'Ruc' => $menu['ruc_usuario'],
                        'Tele' => $menu['telefono_usuario'],
                        'Dire' => $menu['direccion_usuario'],
                        'id_emp' => $menu['id_empresa'],
                        'id_usuemp' => $menu['id_usuemp'],
                        'Nombrempresa' => $menu['nombre_empresa'],
                        'Tipo' => $menu['tiposesion_usuario'],
                        'Ivitado' => '0');
                    $_SESSION['sesionwisu'] = $arreglo;
                }
               // echo 'asas';
                $a->fn_uuser_xemail($user);
                $dato = $_POST['dato_0'];
                //agregar opcion inicio de sesión
                $infostore = $_SESSION['infostore'];
                $infostore[0]['tiposesion'] = 1;
                $_SESSION['infostore'] = $infostore;
                echo 1;
//                header('Location: ../index.php');
            } else {
                echo $fnalert->fnalert_sesion(2);
            }
        }
    }
}