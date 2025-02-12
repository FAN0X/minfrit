<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
include '../sesiones/opensesion.php';
$con = new Conecciones;
$mysqlidato = $con->crearConexion();
$sql1 = "SELECT * FROM temporal1 t1 , temporal2 t2 where t1.id_concepto=t2.id_concepto ";
//echo $sql2;
$arreglo;
if (!$resultado2 = $mysqlidato->query($sql1)) {
    echo "Error fn151_ringresos_all -- fn151 ";
    exit;
} else {
    $arreglo = $resultado2;
}


$c=0;
$err=0;
while ($menu = $arreglo->fetch_assoc()) {
    
    $cedula = $menu['cedula_concepto'];
    $codconcepto = $menu['cod_concepto'];
    $id_trans = $menu['id_trans'];
    $id_empresa= $idconj_open;
    $id_usuvivienda= 0;
    $id_concon = 4;//
    $fecha_trans = $menu['fecha_trans'];
    $fechamax__trans = $menu['fecha_trans'];
    $fechareal_trans = $menu['fecha_trans'];
    $tipo_trans = $menu['tipo_trans'];
    $detalle_trans = $menu['detalle_trans'];
    $documento_trans = $menu['documento_trans'];
    $monto_trans = $menu['monto_trans'];
    $saldo_trans = $menu['saldo_trans'];
    $oberva_trans = $menu['oberva_trans'];
    $archivo_trans = '';
    if( $menu['archivo_trans']!=''){
        $archivo_trans = $menu['archivo_trans'];
    }
    $estado_trans = $menu['estado_trans'];
    $sec_trans = $menu['sec_trans'];
    $sql2 = "SELECT * FROM usuario u , usuario_empresa ue , usuario_vivienda uv "
            . "where u.id_usuario= ue.id_usuario and uv.id_usuemp=ue.id_usuemp "
            . "and uv.estado_usuvivienda!=-1 and u.cedula_usuario = '$cedula' and ue.id_empresa = 2";
    //echo $sql2;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn151_detingreso1_xid -- fn151";
            exit;
        }while ($menu2 = $resultado2->fetch_assoc()) {
            $id_usuvivienda = $menu2['id_usuvivienda'];
        }
        
        if($id_usuvivienda==0){
            $sql3 = "SELECT * FROM  concepto c, concepto_conjunto cc W"
                    . "HERE c.id_concepto=cc.id_concepto and cc.estado_concon=1 and cc.id_empresa= 2 and c.nombre_concepto = '$codconcepto' ";
            //echo $sql2;
                if (!$resultado2 = $mysqlidato->query($sql3)) {
                    echo "Error fn151_detingreso1_xid -- fn151";
                    exit;
                }while ($menu3 = $resultado2->fetch_assoc()) {
                    $id_concon = $menu3['id_concon'];
                }
        }
    
        $sql4 = "INSERT INTO transaccion(id_trans, id_empresa, id_concon, id_usuvivienda, fecha_trans, "
                . "fechamax__trans, fechareal_trans, tipo_trans, detalle_trans, documento_trans,"
                . " monto_trans, saldo_trans, oberva_trans, archivo_trans, estado_trans, sec_trans) "
                . "VALUES ($id_trans, $id_empresa, $id_concon, $id_usuvivienda, '$fecha_trans', "
                . "'$fechamax__trans', '$fechareal_trans', '$tipo_trans', '$detalle_trans', '$documento_trans',"
                . " $monto_trans, $saldo_trans, '$oberva_trans', '$archivo_trans', $estado_trans, $sec_trans)";
        //echo $sql4;
        if ($mysqlidato->query($sql4) == FALSE) {
            $err = 0;
        } else {
            $c++;
        }
            
}
$mysqlidato->close();

?>
Ingresados: <?php echo $c?> <br>
errores: <?php echo $err?> <br>
<?php

