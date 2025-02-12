<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
require '../fn/fn-4.php';
include '../sesiones/opensesion.php';
require '../funciones/fn-alert.php';
$opc_cn = $_POST['dato_0'];
//echo $opc_cn;
$a = new Fn_4();
$fnalert = new Fn_alert();

if ($opc_cn == 1) {
    $nombre_conjunto = $_POST['nombre_conjunto'];
    $tipozomaresid_conjunto = $_POST['tipozomaresid_conjunto'];
    $cantidadhab_conjunto = $_POST['cantidadhab_conjunto'];
    
    $verificac= $a->fn4_rconjunto_xname(trim($nombre_conjunto));
    if($verificac[0]['id_conjunto']==0){
        $id_conjunto = $a->fn4_conjunto_x($nombre_conjunto, $cantidadhab_conjunto, $tipozomaresid_conjunto);
        if ($id_conjunto > 0) {
            $tipo_vivienda = 5;
            $edificio_vivienda = 0;
            $id_casa = $a->fn4_casa_x($tipo_vivienda, $edificio_vivienda, $id_conjunto);
            if ($id_casa > 0) {
                $cuenta_vivienda= $a->f44_cusuario_vivienda_x($idusu_open, $id_casa);
                if ($cuenta_vivienda > 0) {
                     echo $fnalert->fnalert_registro(1, '');
                } else {
                    echo $fnalert->fnalert_registro(6, '');
                }
            } else {
                echo $fnalert->fnalert_registro(2, '');
            }
        } else {
            echo $fnalert->fnalert_registro(3, '');
        }
    } else {
        echo $fnalert->fnalert_registro(7, '');
    }
}