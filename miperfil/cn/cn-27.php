<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
require '../fn/fn-27.php';
require '../funciones/fn-alert.php';
include '../sesiones/opensesion.php';
$opc_cn = $_POST['dato_0'];
$a = new Fn_27();
$fnalert = new Fn_alert();

//OPC

if ($opc_cn == -1) {
    $tabla = $a->fn27_rvivienda_all($idconj_open);
    $include = 1;
}
if ($opc_cn == 1) {
    $num_vivienda = utf8_decode($_POST['num_vivienda']);
    $piso_vivienda= utf8_decode($_POST['piso_vivienda']);
    $observa_vivienda = utf8_decode($_POST['observa_vivienda']);
    $idvivienda = -1;
    if($num_vivienda != '' && $piso_vivienda != ''){
        $verifvivienda= $a->fn27_rvivienda_xnumpiso($num_vivienda,$piso_vivienda,$idconj_open,$idvivienda); 
        if(count($verifvivienda)==0){
            $cuenta = $a->fn27_cvivienda_xdata($num_vivienda, $piso_vivienda, $observa_vivienda, $idconj_open);
            if($cuenta > 0){
                echo $fnalert->fnalert_save(1);
            } else {
                echo $fnalert->fnalert_save(2);
            }
        } else {
            echo $fnalert->fnalert_repetido(3);
        }
    
    } else {
        echo $fnalert->fnalert_required(1);
    }
}
if ($opc_cn == 2) {
    $id_vivienda = $_POST['dato_1'];
    $num_vivienda = utf8_decode($_POST['num_vivienda']);
    $piso_vivienda= utf8_decode($_POST['piso_vivienda']);
    $observa_vivienda = utf8_decode($_POST['observa_vivienda']);
    if($num_vivienda != '' && $piso_vivienda != ''){
        $verifvivienda= $a->fn27_rvivienda_xnumpiso($num_vivienda,$piso_vivienda,$idconj_open,$id_vivienda); 
        if(count($verifvivienda)==0){
            $cuenta = $a->fn27_uvivienda_xdata($num_vivienda, $piso_vivienda, $observa_vivienda, $id_vivienda);
            if($cuenta==1){
                echo $fnalert->fnalert_save(3);
            } else {
                echo $fnalert->fnalert_save(4);
            }
        } else {
            echo $fnalert->fnalert_repetido(3);
        }
    } else {
        echo $fnalert->fnalert_required(1);
    }
}
if ($opc_cn == 3) {
    $id = $_POST['dato_1'];
    $st = $_POST['dato_2'];
    $verificar = $a->fn27_verifvivienda_xid($id);
    if(count($verificar)==0){
        $cuenta = $a->fn27_rvivienda_xest($id, $st);
        if($cuenta==1){
            echo $fnalert->fnalert_delete(1);
        } else {
            echo $fnalert->fnalert_delete(2);
        }
    } else {
        echo $fnalert->fnalert_delete(3);
    }
    $tabla = $a->fn27_rvivienda_all($idconj_open);
    $include = 1;
}

if ($opc_cn == 4) {
    $id = $_POST['dato_1'];
    $st = $_POST['dato_2'];
    $cuenta = $a->fn27_rvivienda_xest($id, $st);
    if ($cuenta==0) {
        ?>
        <label style="color: red"><i class="fa fa-exclamation"></i></label>
        <?php
    } else {
        ?>
        <label style="color: green"><i class="fa fa-check"></i></label>
        <?php
    }
    
}
if ($opc_cn == 5) {
    $id = $_POST['dato_1'];
    $id_usuemp = $_POST['dato_2'];
    $verificacheck = $_POST['dato_3'];
    $tp_habitante = $_POST['dato_4'];
    $detvivienda = $a->fn27_rvivienda_xid($id);
    if($verificacheck==1){
        $cuenta = $a->fn27_cusuario_vivienda_xdata($id_usuemp, $id, $tp_habitante);
        if($cuenta==1){
            ?>
            <script>
            toastr.success("Habitante agregado a Vivienda "+'<?php echo $detvivienda[0]['num_vivienda'] ?>');
            </script>
            <?php
        }else{
            ?>
            <script>
            toastr.error("Ocurrior un error al registrar el habitante de la vivienda "+'<?php echo $detvivienda[0]['num_vivienda'] ?>');
            </script>
            <?php
        }
    }else{
        $cuenta = $a->fn27_uusuario_vivienda_xdata($id_usuemp, $id);
        if($cuenta==1){
            ?>
            <script>
            toastr.success("Habitante retirado de la Vivienda "+'<?php echo $detvivienda[0]['num_vivienda'] ?>');
            </script>
            <?php
        }else{
            ?>
            <script>
            toastr.error("Ocurrior un error al retirar el habitante de la vivienda "+'<?php echo $detvivienda[0]['num_vivienda'] ?>');
            </script>
            <?php
        }
    }
    
    
}

if ($include == 1) {
    ?>
    <table id="example3" class="display">
        <thead>
            <tr>
                <th>No. Departamento</th>
                <th style="width: 11%">Piso</th>
                <th style="width: 13%">Estado</th>
                <th style="width: 11%">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($menu = $tabla->fetch_assoc()) {
                $id = $menu['id_vivienda'];
                $listhabitantes = $a->fn27_rvivienda_xidall($id);
                $txthabitantes = '';
                $txtstado = 'LIBRE';
                if($listhabitantes->num_rows>0){
                    while ($habita = $listhabitantes->fetch_assoc()) {
                        $txthabitantes .= $habita['nombre_usuario'].' '.$habita['apellido_usuario'].', ';
                    }
                    $txthabitantes=substr($txthabitantes, 0, -2);
                    $txthabitantes=' ('.$txthabitantes.')';
                    $txtstado = 'OCUPADA';
                }
            ?>
                <tr>
                    <td> <?php echo utf8_encode($menu['num_vivienda'].$txthabitantes) ?></td>
                    <td> <?php echo utf8_encode($menu['piso_vivienda']) ?> </td>
                    <td>
                        <?php echo $txtstado ?>
<!--                                                <select class="form-control" onchange="cn27_u004_d3(4, <?php echo $id ?>, this.value)">
                                <option value="0" <?php if($st==0){ echo 'selected';} ?>>LIBRE</option>
                                <option value="1" <?php if($st==1){ echo 'selected';} ?>>OCUPADA</option>
                            </select>
                        <div id="fill_<?php echo $id ?>" ></div>-->
                    </td>
                    <td>
                        <div class="d-flex">
                            <button onclick="md27_r002_d2(2,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-pencil-alt"></i></button>
                            <button onclick="md27_r004_d2(4,<?php echo $id ?>)" style="margin-left: 10px" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-check"></i></button>
                            <button onclick="md27_d003_d2(3,<?php echo $id ?>)" style="margin-left: 10px" data-bs-toggle="modal" data-bs-target="#modalcontent_sm" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                        </div>												
                    </td>												
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
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
    
    <?php
}

