<?php //

session_start();
include '../config.php';
include '../controlador/conexion.php';
include '../funciones/fn-index.php';
require '../funciones/fn-alert.php';
include '../consulta/cn_registro.php';

$a = new Fn_index();
$fnalert = new Fn_alert();

if (isset($_SESSION['sesionwisu'])) {
    header('Location: ./index.php');
} else {
    $cedula_usuario = utf8_decode($_POST['cedula_usuario']);
    $nombre_usuario = utf8_decode($_POST['nombre_usuario']);
    $apellido_usuario = utf8_decode($_POST['apellido_usuario']);
    $nombre_conjunto = utf8_decode($_POST['nombre_conjunto']);
    $email_usuario = utf8_decode($_POST['email_usuario']);
    $tlf1_usuario = utf8_decode($_POST['tlf1_usuario']);
    $clave_usuario = utf8_decode($_POST['clave_usuario']);
    $clave1_usuario = utf8_decode($_POST['clave1_usuario']);
    $cantidadhab_conjunto = utf8_decode($_POST['cantidadhab_conjunto']);
    $tipo_gestor = utf8_decode($_POST['tipo_gestor']);
    $tipozomaresid_conjunto = utf8_decode($_POST['tipozomaresid_conjunto']);
    $ip = $a->getUserIp();
    $terminos_usuario = 1 ;
    
    //echo "asas";
    $consulta = new Consulta_registro($nombre_usuario, $apellido_usuario, $cedula_usuario, $tlf1_usuario, $email_usuario, $nombre_conjunto, $terminos_usuario, $ip, $clave_usuario, $clave1_usuario, $cantidadhab_conjunto);
    if ($consulta->esValida()) {
        $validacedula = $a->fnindex_valida_cedula($cedula_usuario);
        ///echo $validacedula->num_rows;
        if ($validacedula->num_rows == 0) {
            $id_conjunto = $a->fnindex_conjunto_x($nombre_conjunto,$cantidadhab_conjunto,$tipozomaresid_conjunto);
            if ($id_conjunto > 0) {
                $tipo_vivienda = 5;
                $edificio_vivienda = 0;
                $tipo_usuario = 2;
                if ($tipo_gestor == 0) {
                    $tipo_vivienda = 1;
                    $edificio_vivienda = 1;
                    $tipo_usuario = 1;
                }
                $id_casa = $a->fnindex_casa_x($tipo_vivienda, $edificio_vivienda, $id_conjunto);
                if ($id_casa > 0) {
                    $id_rol = 4;
                    if($tipo_usuario==1){
                        $id_rol = 2;
                    }
                    $cuenta_registro = $a->fnindex_cregistro_x($cedula_usuario, $nombre_usuario, $apellido_usuario, $id_casa, $email_usuario, $tlf1_usuario, $clave_usuario, $ip, $tipo_usuario, $terminos_usuario,$id_rol);
                    if ($cuenta_registro > 0) {
                        $cuenta_vivienda= $a->fnindex_cusuario_vivienda_x($cuenta_registro, $id_casa);
                        echo 1;
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
            echo $fnalert->fnalert_registro(4, '');
        }
    } else {
        echo $fnalert->fnalert_registro(5, $consulta->getValidationError());
    }
}
