<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
include '../sesiones/opensesion.php';
require '../fn/fn-126.php';
require '../funciones/fn-alert.php';
$opc_cn = $_POST['dato_0'];
$fn126 = new Fn_126();
$fnalert = new Fn_alert();

//OPC

if ($opc_cn == -1) {
    $tabla = $fn126->fn126_rusuario_all();
    $include = 1;
}

if ($opc_cn == 1) {
    $nombre_categoria = utf8_decode($_POST['nombre_categoria']);
    $desc_categoria = utf8_decode($_POST['desc_categoria']);
    $id_categoriapadre = 0;
    $estado_categoria = 0;
    $cuenta = $fn126->fn126_cusuario_xdata($nombre_categoria, $desc_categoria, 
            $id_categoriapadre, $estado_categoria);
    echo $fnalert->fnalert_create($cuenta);
    $tabla = $fn126->fn126_rusuario_all();
    $include = 1;
}

if ($opc_cn == 2) {
    $id = utf8_decode($_POST['dato_1']);
    $nombre_usuario = utf8_decode($_POST['nombre_usuario']);
    $apellido_usuario = utf8_decode($_POST['apellido_usuario']);
    $telefono_usuario = utf8_decode($_POST['telefono_usuario']);
    $cedula_usuario = utf8_decode($_POST['cedula_usuario']);
    $email_usuario = utf8_decode($_POST['email_usuario']);
    //echo($id.' - '.$nombre_usuario.' - '.$apellido_usuario.' - '.$telefono_usuario.' - '.$email_usuario);
    $cuenta = $fn126->fn126_uusuario_x($nombre_usuario, $apellido_usuario, $telefono_usuario, $email_usuario, $cedula_usuario,$id);
    echo $fnalert->fnalert_edit($cuenta);
    $tabla = $fn126->fn126_rusuario_all();
    $include = 1;
}

if ($opc_cn == 3) {
    $id = $_POST['dato_1'];
    $dato = utf8_decode($_FILES['dato_5']['name']);
    $cuenta = 0;
    $dir_subida = '../../images/';
    $fichero_subido = $dir_subida . basename($_FILES['dato_5']['name']);

    if (move_uploaded_file($_FILES['dato_5']['tmp_name'], $fichero_subido)) {
        $cuenta = $fn126->fn126_uavisos_ximg($id, $dato);
        echo $fnalert->fnalert_edit($cuenta);
    } else {
        echo $fnalert->fnalert_edit(0);
    }
}

if ($opc_cn == 4) {
    $id = $_POST['dato_1'];
    $estado = $_POST['dato_2'];
    $cuenta = $fn126->fn126_uusuario_xest($id, $estado);
    if ($cuenta==0) {
        ?>
        <label><i class="fa fa-exclamation"></i></label>
        <?php
    }
    //$tabla = $fn126->fn126_rusuario_all();
    //$include = 1;
}



if ($opc_cn == 5) {
    $id = $_POST['dato_1'];
    $cedula = $_POST['dato_2'];
    $pass1 = $_POST['new_pass'];
    $pass2 = $_POST['conf_pass'];
    
    $clave = md5($cedula.''.$pass1);
    
    if($pass1 == $pass2){
        $cuenta = $fn126->fn126_uusuario_xpass($id, $clave);
        if($cuenta == 1){
            echo "Contraseña actualizada correctamente.";
        }else{
            echo "Error al actualizar la contraseña.";
        }
    }else{
        echo "Las contraseñas no coinciden.";
    }
}

if ($opc_cn == 6) {
    $id = $_POST['dato_1'];
    $idrol = $_POST['dato_2'];
    $cuenta = $fn126->fn126_uusuario_xrol($id, $idrol);
    $include = 1;
}

if ($opc_cn == 7) {
    $id = $_POST['dato_1'];
    $estado = $_POST['dato_2'];
    $cuenta = $fn126->fn126_uusuario_xest($id, $estado);
    
    $tabla = $fn126->fn126_rusuario_all();
    $include = 1;
}

//INCLUDE

if ($include == 1) {
    $tabla = $fn126->fn126_rusuario_all();
    
    ?>
    <table id="example3" class="display">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Estado</th>
                <th>Rol</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($menu = $tabla->fetch_assoc()) {
                $st = $menu['estado_usuario'];
                $id = $menu['id_usuario'];
                $idrol = $menu['id_rol'];
                $mail = utf8_encode($menu['email_usuario']);
                $estado = $fn126->fn126_estado_xid($st);
                $rolactivo = $fn126->fn126_rusuario_xrol($idrol);
                $roles = $fn126->fn126_rrol_all();
                ?>
                <tr>
                    <td> <?php echo utf8_encode($menu['nombre_usuario']) ?></td>
                    <td> <?php echo utf8_encode($menu['apellido_usuario']) ?> </td>
                    <td> <?php echo utf8_encode($menu['email_usuario']) ?> </td>
                    <td> <?php echo utf8_encode($menu['telefono_usuario']) ?> </td>
                    <td>
                        <div id="fill_<?php echo $id ?>">
                            <div class="custom-control custom-checkbox mb-3">
                                <?php
                                if ($st == 0) {
                                    ?>
                                    <input value="1" name="estado" onchange="cn126_f4(4, <?php echo $id ?>, this.value)" type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id ?>" required>
                                    <label class="custom-control-label" for="customCheckBox<?php echo $id ?>">Inactivo</label>
                                    <?php
                                } else if ($st == 1) {
                                    ?>
                                    <input value="0" name="estado" onchange="cn126_f4(4, <?php echo $id ?>, this.value)" checked type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id ?>" required>
                                    <label class="custom-control-label" for="customCheckBox<?php echo $id ?>">Activo</label>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </td>
                    <td>
                        <select onchange="cn126_f6(6,<?php echo $id ?>,this.value)">
                            <option value="<?php echo $rolactivo[0]['id_rol'] ?>"><?php echo $rolactivo[0]['nombre_rol'] ?></option>
                            <?php
                            while ($detroles = $roles->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $detroles['id_rol'] ?>"><?php echo $detroles['nombre_rol'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <div class="d-flex">
                            <button onclick="md126_d2(2,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-pencil-alt"></i></button>
                            <button onclick="md126_d4(4,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_sm" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></button>
                            <button onclick="md126_d5(5,<?php echo $id ?>,'<?php echo $mail ?>')" data-bs-toggle="modal" data-bs-target="#modalcontent_sm" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-key"></i></button>
                        </div>												
                    </td>												
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <script>
        $('#example3').dataTable();
    </script>
    <?php
}