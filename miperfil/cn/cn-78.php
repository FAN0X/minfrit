<?php
include '../config.php';
require '../controlador/conexion.php';
require '../fn/fn-78.php';
require '../funciones/fn-alert.php';
$opc_cn = $_POST['dato_0'];
$fn78 = new Fn_78();
$fnalert = new Fn_alert();

//OPC

if ($opc_cn == -1) {
    $tabla = $fn78->fn78_rusuario_all();
    $include = 1;
}

if ($opc_cn == 1) {
    $nombre_rol = utf8_decode($_POST['nombre_rol']);
    $permiso_rol = utf8_decode($_POST['permiso_rol']);
    $estado = 0;
    $cuenta = $fn78->fn78_crol_xdata($nombre_rol, $permiso_rol, $estado);
    echo $fnalert->fnalert_create($cuenta);
    $tabla = $fn78->fn78_rroles_all();
    $include = 1;
}

if ($opc_cn == 2) {
    $id = utf8_decode($_POST['dato_1']);
    $nombre_rol = utf8_decode($_POST['nombre_rol']);
    $permiso_rol = utf8_decode($_POST['permiso_rol']);
    $cuenta = $fn78->fn78_urol_x($nombre_rol, $permiso_rol, $id);
    echo $fnalert->fnalert_edit($cuenta);
    $tabla = $fn78->fn78_rroles_all();
    $include = 1;
}

if ($opc_cn == 3) {
    $id = $_POST['dato_1'];
    $dato = utf8_decode($_FILES['dato_5']['name']);
    $cuenta = 0;
    $dir_subida = '../../images/';
    $fichero_subido = $dir_subida . basename($_FILES['dato_5']['name']);

    if (move_uploaded_file($_FILES['dato_5']['tmp_name'], $fichero_subido)) {
        $cuenta = $fn78->fn78_uavisos_ximg($id, $dato);
        echo $fnalert->fnalert_edit($cuenta);
    } else {
        echo $fnalert->fnalert_edit(0);
    }
}

if ($opc_cn == 4) {
    $id = $_POST['dato_1'];
    $estado = $_POST['dato_2'];
    $cuenta = $fn78->fn78_urol_xest($id, $estado);
    if ($cuenta==0) {
        ?>
        <label><i class="fa fa-exclamation"></i></label>
        <?php
    }
    //$tabla = $fn78->fn78_rroles_all();
    //$include = 1;
}

if ($opc_cn == 5) {
    $id = $_POST['dato_1'];
    $estado = $_POST['dato_2'];
    $cuenta = $fn78->fn78_urol_xest($id, $estado);
    
    $tabla = $fn78->fn78_rroles_all();
    $include = 1;
}


//INCLUDE

if ($include == 1) {
    ?>
    <table id="example3" class="display">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Permiso</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($menu = $tabla->fetch_assoc()) {
                $st = $menu['estado_rol'];
                $id = $menu['id_rol'];
                $estado = $a->fn78_estado_xid($st);
                ?>
                <tr>
                    <td> <?php echo utf8_encode($menu['nombre_rol']) ?></td>
                    <td> <?php echo utf8_encode($menu['permiso_rol']) ?> </td>
                    <td>
                            <div class="custom-control custom-checkbox mb-3">
                                <?php
                                if ($st == 0) {
                                    ?>
                                    <input value="1" name="estado" onchange="cn78_f4(4, <?php echo $id ?>, this.value)" type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id ?>" required>
                                    <label class="custom-control-label" for="customCheckBox<?php echo $id ?>">Inactivo</label>
                                    <?php
                                } else if ($st == 1) {
                                    ?>
                                    <input value="0" name="estado" onchange="cn78_f4(4, <?php echo $id ?>, this.value)" checked type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id ?>" required>
                                    <label class="custom-control-label" for="customCheckBox<?php echo $id ?>">Activo</label>
                                    <?php
                                }
                                ?>
                            </div>
                        <div id="fill_<?php echo $id ?>">
                        </div>
                    </td>
                    <td>
                        <div class="d-flex">
                            <button onclick="md78_d2(2,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-pencil-alt"></i></button>
                            <button onclick="md78_d4(4,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_sm" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
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