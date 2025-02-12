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
//    echo $nombre_usuario.'--'.$apellido_usuario.'--'.$cedula_usuario.'--'.$tlf1_usuario.'--'.$email_usuario.'--'.$tipo_usuario.'--'.$id_vivienda;
    if($nombre_usuario != '' && $apellido_usuario != '' && $cedula_usuario != '' && $tlf1_usuario != '' && $email_usuario != ''){
        $detusuario_empresa = $a->fn28_rverifica_usuarioempresa($cedula_usuario, $idconj_open);
        if($detusuario_empresa[0]['id_usuario']>0){
            ?>
            <script>
            toastr.error("El Usuario ya se encuentra Registrado");
            </script>
            <?php
        }else{
            $verifuser= $a->fn28_rusuario_xcedula($cedula_usuario);
            if($verifuser[0]['id_usuario']>0){
                $cuentauser = $a->fn28_uusuario_xdata($nombre_usuario, $apellido_usuario, $cedula_usuario,$tlf1_usuario,$email_usuario, $verifuser[0]['id_usuario']);
                 if($cuentauser == 1){
                    $cuenta = $a->fn28_cusuario_empresa_xdata($verifuser[0]['id_usuario'], $idconj_open,$email_usuario,$cedula_usuario);
                    if($cuenta==1){
                        ?>
                        <script>
                        toastr.success("Usuario Registrado Correctamente");
                        </script>
                        <?php
                    } else {
                        ?>
                        <script>
                        toastr.error("Ocurrio un error al registrar el usuario");
                        </script>
                        <?php
                    }
                }else {
                    ?>
                    <script>
                    toastr.error("Ocurrio un error al actualizar datos del usuario");
                    </script>
                    <?php
                }    
            } else {
                $terminos_usuario = 1;
                $cuentauser = $a->fn28_cusuario_xdata($nombre_usuario, $apellido_usuario, $email_usuario, $tlf1_usuario, $cedula_usuario, $terminos_usuario);
                if($cuentauser > 0){
                    $cuenta = $a->fn28_cusuario_empresa_xdata($cuentauser, $idconj_open, $idconj_open,$email_usuario,$cedula_usuario);
                    if($cuenta==1){
                        ?>
                        <script>
                        toastr.success("Usuario Registrado Correctamente");
                        </script>
                        <?php
                    } else {
                        ?>
                        <script>
                        toastr.error("Ocurrio un error al registrar el usuario");
                        </script>
                        <?php
                    }
                } else {
                    ?>
                    <script>
                    toastr.error("Ocurrio un error al registrar el usuario");
                    </script>
                    <?php
                }
            }
        }
        
    } else {
        ?>
        <script>
        toastr.warning("Ingrese los campos requeridos");
        </script>
        <?php
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
    if($nombre_usuario != '' && $apellido_usuario != '' && $cedula_usuario != '' && $tlf1_usuario != '' && $email_usuario != '' ){
        $cuenta = $a->fn28_uusuario_xdata($nombre_usuario, $apellido_usuario, $cedula_usuario,$tlf1_usuario,$email_usuario, $id_usuario);
        if($cuenta==1){
            ?>
            <script>
            toastr.success("Usuario Actualizado Correctamente");
            </script>
            <?php
        } else {
            ?>
            <script>
            toastr.error("Ocurrio un error al actualizar el usuario");
            </script>
            <?php
        }
    } else {
        ?>
        <script>
        toastr.warning("Ingrese los campos requeridos");
        </script>
        <?php
    }
}
if ($opc_cn == 3) {
    $id = $_POST['dato_1'];
    $st = $_POST['dato_2'];
    $cuenta = $a->fn28_uusuario_xest($id, $st);
    if($cuenta==1){
            ?>
            <script>
            toastr.success("Usuario Eliminado Correctamente");
            </script>
            <?php
        } else {
            ?>
            <script>
            toastr.error("Ocurrio un error al eliminar el usuario");
            </script>
            <?php
        }
    
    $tabla = $a->fn28_rusuario_all($idconj_open);
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

if ($opc_cn == 6) {
    $cedula = $_POST['dato_1'];
    if($cedula!=''){
        $detusuario = $a->fn28_rusuario_xcedula($cedula);
        if($detusuario[0]['id_usuario']>0){
            $id_usuario = $detusuario[0]['id_usuario'];
            $verifiuc=$a->fn28_rverifica_usuario($id_usuario, $idconj_open);
            if($verifiuc[0]['id_usuario']>0){
                ?>
                <div id="msg_verifi" style="color: green;font-size: 12px">Usuario ya Registrado</div>
                <?php
            }else{
                ?>
                <div id="msg_verifi" style="color: red;font-size: 12px">Usuario no Registrado</div>
                <?php
            }
            ?>
            <div class="form-group row">
                <div class="col-sm-6">
                    <input type="text" name="nombre_usuario" class="form-control" placeholder="Nombre *" value="<?php echo utf8_encode($detusuario[0]['nombre_usuario']) ?>">
                </div>
                <div class="col-sm-6">
                    <input type="text" name="apellido_usuario" class="form-control" placeholder="Apellido *" value="<?php echo utf8_encode($detusuario[0]['apellido_usuario']) ?>">
                </div>
            </div>
            <div class="form-group row">
                 <div class="col-sm-6">
                    <input type="text" name="tlf1_usuario" class="form-control" placeholder="Teléfono *" value="<?php echo $detusuario[0]['tlf1_usuario'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text" name="email_usuario" class="form-control" placeholder="Email *" value="<?php echo utf8_encode($detusuario[0]['email_usuario']) ?>">
                </div>
            </div>
            <?php
        }else{
            echo 2;
        }
    
    }else{
        echo 1;
    }
    
}

if ($include == 1) {
    ?>
    <table id="example3" class="display">
        <thead>
            <tr>
                <th>Nombre</th>
                <th style="width: 13%">Teléfono</th>
                <th style="width: 10%">Departamentos Asignados</th>
                <th style="width: 11%">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($menu = $tabla->fetch_assoc()) {
                $id = $menu['id_usuario'];     
                $id_usuemp = $menu['id_usuemp'];  
                $listviviendas = $a->fn28_rusuario_vivienda($idconj_open, $id_usuemp);
                $txtviviendas = '';
                while ($viv = $listviviendas->fetch_assoc()) {
                    $txtviviendas = $viv['num_vivienda'].',';
                }
                $txtviviendas=substr($txtviviendas, 0, -1);
            ?>
                <tr>
                    <td> <?php echo utf8_encode($menu['nombre_usuario'].' '. $menu['apellido_usuario']) ?></td>
                    <td> <?php echo utf8_encode($menu['tlf1_usuario']) ?> </td>
                    <td> <?php echo utf8_encode($txtviviendas) ?> </td>
                    <td>
                        <div class="d-flex">
                            <button onclick="md28_r002_d2(2,<?php echo $id_usuemp ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_lg" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-pencil-alt"></i></button>
                            <?php 
                            if($id != $idusu_open){
                            ?>
                            <button onclick="md28_d003_d2(3,<?php echo $id_usuemp ?>)" style="margin-left: 10px" data-bs-toggle="modal" data-bs-target="#modalcontent_sm" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
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

