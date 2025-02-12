<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
require '../fn/fn-52.php';
require '../funciones/fn-alert.php';
include '../sesiones/opensesion.php';
$opc_cn = $_POST['dato_0'];
$a = new Fn_52();
$fnalert = new Fn_alert();

//OPC

if ($opc_cn == -1) {
    $fechaactual = date('Y-m-d');
    $fechaanterior = date("Y-m-d",strtotime($fechaactual."- 30 days")); 
    $tabla = $a->fn52_regresos_all($fechaanterior, $fechaactual,$idconj_open);
    $dettotales = $a->fn52_regresos_totalesfech($fechaanterior, $fechaactual, $idconj_open);
    $include = 1;
}
if ($opc_cn == 1) {
    $fechdesde = $_POST['fechdesde'];
    $fechasta = $_POST['fechasta'];
    $gasto = $_POST['gasto'];
    
    $tabla = $a->fn52_regresos_xconsepto($fechdesde, $fechasta,$idconj_open,$gasto);
    $dettotales = $a->fn52_regresos_totalesfech2($fechdesde, $fechasta, $idconj_open, $gasto);
    $include = 1;
}
if ($opc_cn == 2) {
    $numfactura_egreso = $_POST['numfactura_egreso'];
    $fechafactura_egreso = $_POST['fechafactura_egreso'];
    $idconsepto = $_POST['idconsepto'];
    $detalle_egreso = $_POST['detalle_egreso'];
    $valor_egreso = $_POST['valor_egreso'];
    $id_tipoegreso = 1;
    $pago_egreso = 0;
    
    if($numfactura_egreso != '' && $detalle_egreso!='' && $valor_egreso!='' && $idconsepto!=0){
        $verifnumfactura = $a->fn52_regresos_xnumfactura($numfactura_egreso); 
        if(count($verifnumfactura)==0){
            $cuenta = $a->fn52_regresos_xdata($detalle_egreso, $numfactura_egreso, $id_tipoegreso, $fechafactura_egreso, $pago_egreso, $valor_egreso,$idconsepto);
            if($cuenta == 1){
                echo $fnalert->fnalert_save(1);
            } else {
                echo $fnalert->fnalert_save(2);
            }
        } else {
            echo $fnalert->fnalert_repetido(1);
        }
    
    } else {
        echo $fnalert->fnalert_required(1);
    }
}


if ($include == 1) {
    ?>
    <div class="row">
        <div class="col-md-6">
            <table class="display" style="width: 100%;">
                <thead>
                    <tr>
                        <th style="border: 1px solid black;">TOTAL DE REGISTROS</th>
                        <th style="border: 1px solid black;;text-align: right"><?php echo $dettotales[0]['nregistros'] ?></th>
                    </tr>    
                    <tr>
                        <th style="border: 1px solid black;">TOTAL</th>
                        <th style="border: 1px solid black;text-align: right">$ <?php echo number_format($dettotales[0]['total'], 2) ?></th>
                    </tr>    
                </thead>
            </table>
        </div>

    </div>  
    <br>
    <br>
    <table id="example3" class="display">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Consepto</th>
                <th>Documento</th>
                <th>Detalle</th>
                <th>Monto</th>
                <th>Saldo</th>
                <th style="width: 13%">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($menu = $tabla->fetch_assoc()) {
                $id = $menu['id_egreso'];
            ?>
                <tr>
                    <td> <?php echo utf8_encode($menu['fecha_egreso']) ?></td>
                    <td> <?php echo utf8_encode($menu['nombre_concepto']) ?> </td>
                    <td> <?php echo utf8_encode($menu['numfactura_egreso']) ?> </td>
                    <td> <?php echo utf8_encode($menu['detalle_egreso']) ?> </td>
                    <td> <?php echo utf8_encode($menu['valor_egreso']) ?> </td>
                    <td> <?php echo utf8_encode($menu['valor_egreso']) ?> </td>
                    <td>
                        <div class="d-flex">
                            <button onclick="md52_d2(2,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-pencil-alt"></i></button>
                            <button onclick="md52_d4(4,<?php echo $id ?>)" style="margin-left: 10px" data-bs-toggle="modal" data-bs-target="#modalcontent_sm" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                        </div>												
                    </td>												
                </tr>
            <?php
            }
            ?>
        </tbody>
        <script>
            $(document).ready(function() {
                $('#example3').dataTable( {
//                    "bPaginate": false,
                    "bFilter": false,
//                    "bInfo": false,
                    "searching": false
                } );
            } );
        </script>
    </table>
    <?php
}