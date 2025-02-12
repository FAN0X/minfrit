<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
require '../fn/fn-28.php';
require '../funciones/fn-alert.php';
include '../sesiones/opensesion.php';
$opc_cn = $_POST['dato_0'];
$a = new Fn_28();
$fnalert = new Fn_alert();

//OPC

if ($opc_cn == -1) {
    $tabla = $a->fn28_rusuario_all($idconj_open);
    $include = 1;
}
if ($opc_cn == 1) {
    $nombre_usuario = utf8_decode($_POST['nombre_usuario']);
    $apellido_usuario = utf8_decode($_POST['apellido_usuario']);
    $cedula_usuario = utf8_decode($_POST['cedula_usuario']);
    $tlf1_usuario = utf8_decode($_POST['tlf1_usuario']);
    $email_usuario = utf8_decode($_POST['email_usuario']);
    $tipo_usuario = utf8_decode($_POST['tipo_usuario']);
    $id_vivienda = utf8_decode($_POST['id_vivienda']);
//    echo $nombre_usuario.'--'.$apellido_usuario.'--'.$cedula_usuario.'--'.$tlf1_usuario.'--'.$email_usuario.'--'.$tipo_usuario.'--'.$id_vivienda;
    if($nombre_usuario != '' && $apellido_usuario != '' && $cedula_usuario != '' && $tlf1_usuario != '' && $email_usuario != '' && $id_vivienda != 0){
        $verifuser= $a->fn28_rusuario_xcedula($cedula_usuario);
        if(count($verifuser)==0){
            if($tipo_usuario==1){
                $verifipropietario = $a->fn28_rusuario_vivienda_xtipo($id_vivienda);
            }
            if(count($verifipropietario)==0){
                $terminos_usuario = 1;
                $cuentauser = $a->fn28_cusuario_xdata($nombre_usuario, $apellido_usuario, $email_usuario, $tlf1_usuario, $cedula_usuario, $terminos_usuario);
                if($cuentauser > 0){
                    $cuenta = $a->fn28_cusuario_vivienda_xdata($cuentauser, $id_vivienda,$tipo_usuario);
                    if($cuenta==1){
                        echo $fnalert->fnalert_save(1);
                    } else {
                        echo $fnalert->fnalert_save(7);
                    }

                } else {
                    echo $fnalert->fnalert_save(6);
                }
            } else {
                echo $fnalert->fnalert_save(8);
            }
        } else {
            if($tipo_usuario==1){
                $verifipropietario = $a->fn28_rusuario_vivienda_xtipo($id_vivienda);
            }
            if(count($verifipropietario)==0){
                $cuenta = $a->fn28_cusuario_vivienda_xdata($verifuser[0]['id_usuario'], $id_vivienda,$tipo_usuario);
                if($cuenta!=1){
                    echo $fnalert->fnalert_save(1);
                } else {
                    echo $fnalert->fnalert_save(7);
                }
            } else {
                echo $fnalert->fnalert_save(8);
            }
        }
    
    } else {
        echo $fnalert->fnalert_required(1);
    }
}
if ($opc_cn == 2) {
    $id_usuvivienda = $_POST['dato_1'];
    $id_usuario = $_POST['dato_2'];
    $nombre_usuario = utf8_decode($_POST['nombre_usuario']);
    $apellido_usuario = utf8_decode($_POST['apellido_usuario']);
    $cedula_usuario = utf8_decode($_POST['cedula_usuario']);
    $tlf1_usuario = utf8_decode($_POST['tlf1_usuario']);
    $email_usuario = utf8_decode($_POST['email_usuario']);
    $tipo_usuario = utf8_decode($_POST['tipo_usuario']);
    $id_vivienda = utf8_decode($_POST['id_vivienda']);
    if($nombre_usuario != '' && $apellido_usuario != '' && $cedula_usuario != '' && $tlf1_usuario != '' && $email_usuario != '' && $id_vivienda != 0){
        $cuenta = $a->fn28_uusuario_xdata($nombre_usuario, $apellido_usuario, $cedula_usuario,$tlf1_usuario,$email_usuario, $id_usuario);
        if($cuenta==1){
//            $cuenta =  $a->fn28_uusuario_vivienda_xdata($id_usuvivienda, $tipo_usuario, $id_vivienda);
            echo $fnalert->fnalert_save(3);
        } else {
            echo $fnalert->fnalert_save(4);
        }
    } else {
        echo $fnalert->fnalert_required(1);
    }
}
if ($opc_cn == 3) {
    $id = $_POST['dato_1'];
    $st = $_POST['dato_2'];
    $cuenta = $a->fn28_uusuario_xest($id, $st);
    if($cuenta==1){
        echo $fnalert->fnalert_delete(1);
    } else {
        echo $fnalert->fnalert_delete(2);
    }
    
    $tabla = $a->fn28_rvivienda_all($idconj_open);
    $include = 1;
}

if ($opc_cn == 4) {
    $id = $_POST['dato_1'];
    $st = $_POST['dato_2'];
    $cuenta = $a->fn28_uusuario_xest($id, $st);
    $estado = $a->fn28_estado_xid($st);
    $_st=1;
    $txtcheck = '';
    if($st == 1){
        $_st=0;
        $txtcheck = 'checked';
    }
    if ($cuenta==0) {
        ?>
        <input value="<?php echo $_st ?>" <?php echo $txtcheck ?> name="estado" onchange="cn28_u004_d3(4, <?php echo $id ?>, this.value)" type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id ?>" required>
        <label class="custom-control-label" for="customCheckBox<?php echo $id ?>"><?php echo $estado ?></label>
        <label style="color: red"><i class="fa fa-exclamation"></i></label>
        <?php
    } else {
        ?>
        <input value="<?php echo $_st ?>" <?php echo $txtcheck ?> name="estado" onchange="cn28_u004_d3(4, <?php echo $id ?>, this.value)" type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id ?>" required>
        <label class="custom-control-label" for="customCheckBox<?php echo $id ?>"><?php echo $estado ?></label>
        <label style="color: green"><i class="fa fa-check"></i></label>
        <?php
    }
}

if ($opc_cn == 5) {
    $piso_vivienda = $_POST['dato_1'];
    $viviendas = $a->fn28_rviviendas_xdepa_all($idconj_open, $piso_vivienda);
    ?>
    <select class="form-control" name="id_vivienda">
        <?php 
        while ($detviv = $viviendas->fetch_assoc()) {
        ?>
        <option value="<?php echo $detviv['id_vivienda']; ?>"><?php echo $detviv['num_vivienda']; ?> </option>
        <?php } ?>
    </select>
    <?php
}

if ($include == 1) {
    ?>
    <table id="example3" class="display">
        <thead>
            <tr>
                <th>Nombre</th>
                <th style="width: 13%">Teléfono</th>
                <th style="width: 10%">No. Departamento</th>
                <th style="width: 10%">No. Piso</th>
                <th style="width: 13%">Estado</th>
                <th style="width: 11%">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($menu = $tabla->fetch_assoc()) {
                $id = $menu['id_usuario'];     
                $id_usuvivienda = $menu['id_usuvivienda'];  
                $st = $menu['estado_usuvivienda'];
                $estado = $a->fn28_estado_xid($st);
                $_st=1;
                $txtcheck = '';
                if($st == 1){
                    $_st=0;
                    $txtcheck = 'checked';
                }
                $txthabilitar = '';
                if($id == $idusu_open){
                    $txthabilitar = 'disabled';
                }
            ?>
                <tr>
                    <td> <?php echo utf8_encode($menu['nombre_usuario'].' '. $menu['apellido_usuario']) ?></td>
                    <td> <?php echo utf8_encode($menu['tlf1_usuario']) ?> </td>
                    <td> <?php echo utf8_encode($menu['num_vivienda']) ?> </td>
                    <td> <?php echo utf8_encode($menu['piso_vivienda']) ?> </td>
                    <td>
                        <div id="fill_<?php echo $id_usuvivienda ?>">
                                <input value="<?php echo $_st ?>" <?php echo $txtcheck ?> <?php echo $txthabilitar ?>  name="estado" onchange="cn28_u004_d3(4, <?php echo $id_usuvivienda ?>, this.value)" type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id_usuvivienda ?>" required>
                                <label class="custom-control-label" for="customCheckBox<?php echo $id_usuvivienda ?>"><?php echo $estado ?></label>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex">
                            <button onclick="md28_r002_d2(2,<?php echo $id_usuvivienda ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_lg" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-pencil-alt"></i></button>
                            <?php 
                            if($id != $idusu_open){
                            ?>
                            <button onclick="md28_d003_d2(3,<?php echo $id_usuvivienda ?>)" style="margin-left: 10px" data-bs-toggle="modal" data-bs-target="#modalcontent_sm" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                            <?php
                            }
                            ?>
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

