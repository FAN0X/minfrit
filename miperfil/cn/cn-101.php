<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
include '../sesiones/opensesion.php';
require '../fn/fn-101.php';
require '../funciones/fn-alert.php';
$opc_cn = $_POST['dato_0'];
$fn101 = new Fn_101();
$fnalert = new Fn_alert();

//OPC

if ($opc_cn == -1) {
    $tabla = $fn101->fn101_rusuario_all();
    $include = 1;
}

if ($opc_cn == 1) {
    $nombre_usuario = utf8_decode($_POST['nombre_usuario']);
    $apellido_usuario = utf8_decode($_POST['apellido_usuario']);
    $telefono_usuario = utf8_decode($_POST['telefono_usuario']);
    $cedula_usuario = utf8_decode($_POST['cedula_usuario']);
    $email_usuario = utf8_decode($_POST['email_usuario']);
    $estado = 0;
    $cuenta = $fn101->fn101_cusuario_xdata($nombre_usuario, $apellido_usuario, $telefono_usuario, $email_usuario, $cedula_usuario, $estado);
    echo $fnalert->fnalert_create($cuenta);
    $tabla = $fn101->fn101_rusuario_all();
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
    $cuenta = $fn101->fn101_uusuario_x($nombre_usuario, $apellido_usuario, $telefono_usuario, $email_usuario, $cedula_usuario, $id);
    echo $fnalert->fnalert_edit($cuenta);
    $tabla = $fn101->fn101_rusuario_all();
    $include = 1;
}

if ($opc_cn == 3) {
    $id = $_POST['dato_1'];
    $dato = utf8_decode($_FILES['dato_5']['name']);
    $cuenta = 0;
    $dir_subida = '../../images/';
    $fichero_subido = $dir_subida . basename($_FILES['dato_5']['name']);

    if (move_uploaded_file($_FILES['dato_5']['tmp_name'], $fichero_subido)) {
        $cuenta = $fn101->fn101_uavisos_ximg($id, $dato);
        echo $fnalert->fnalert_edit($cuenta);
    } else {
        echo $fnalert->fnalert_edit(0);
    }
}

if ($opc_cn == 4) {
    $id = $_POST['dato_1'];
    $estado = $_POST['dato_2'];
    $cuenta = $fn101->fn101_uusuario_xest($id, $estado);
    if ($cuenta == 0) {
        ?>
        <label><i class="fa fa-exclamation"></i></label>
        <?php
    }
    //$tabla = $fn101->fn101_rusuario_all();
    //$include = 1;
}



if ($opc_cn == 5) {
    $id = $_POST['dato_1'];
    $cedula = $_POST['dato_2'];
    $pass1 = $_POST['new_pass'];
    $pass2 = $_POST['conf_pass'];

    $clave = md5($cedula . '' . $pass1);

    if ($pass1 == $pass2) {
        $cuenta = $fn101->fn101_uusuario_xpass($id, $clave);
        if ($cuenta == 1) {
            echo "Contraseña actualizada correctamente.";
        } else {
            echo "Error al actualizar la contraseña.";
        }
    } else {
        echo "Las contraseñas no coinciden.";
    }
}

if ($opc_cn == 6) {
    $id = $_POST['dato_1'];
    $idcategoria = $_POST['dato_2'];
    $cuenta = $fn101->fn101_ucategoriaclub_xidclub($id, $idcategoria);
    $include = 1;
}

if ($opc_cn == 7) {
    $id = $_POST['dato_1'];
    $estado = $_POST['dato_2'];
    $cuenta = $fn101->fn101_uusuario_xest($id, $estado);

    $tabla = $fn101->fn101_rusuario_all();
    $include = 1;
}
if ($opc_cn == 8) {
    $id = $_POST['dato_1'];
    $dato = utf8_decode($_FILES['dato_5']['name']);
    $cuenta = 0;
    $dir_subida = '../../images/';
    $fichero_subido = $dir_subida . basename($_FILES['dato_5']['name']);
    if (move_uploaded_file($_FILES['dato_5']['tmp_name'], $fichero_subido)) {
        $cuenta = $fn101->fn101_uimgclub_x($dato, $id);
    } else {
        echo 'An error occurred while editing';
    }
    /*

     */
    $tupla = $fn101->fn101_rclub_x($id);
    $include = 3;
}
if ($opc_cn == 9) {
    $page_club = $_POST['page_club'];
    $limit_club = $_POST['limit_club'];
    $url = 'https://data.brreg.no/enhetsregisteret/api/enheter?page='.$page_club.'&size='.$limit_club.'';
    //echo $url;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    $response = curl_exec($curl);
    curl_close($curl);
    $json_data = json_decode($response, true);
    //print_r($json_data);
    $clubs = $json_data['_embedded']['enheter'];
    $sqlinsert = 'INSERT INTO club(id_club, nombre_club, desc_club, foto_club,
                    latitud_club, longitud_club, edadmin_club, edadmax_club, id_categoria,
                    estado_club, orgsnumERP_club) VALUES';
    $cuentanoexiste = 0;
    $cuentaexiste = 0;
    for ($i = 0; $i < count($clubs); $i++) {
        $orgsnumERP = $clubs[$i]['organisasjonsnummer'];
        $nombre_club = str_replace("'", "", $clubs[$i]['navn']);
        //echo $nombre_club;
        $cuentaexist = $fn101->fn101_rclub_xorgsnumERP($orgsnumERP);
        if ($cuentaexist->num_rows > 0) {
            //echo 'Ya existe';
            $cuentaexiste++;
        } else {
            //$id_club = $fnindex->fnindex_rclublastid();
            $id_club = 0;
            $cuentanoexiste++;
            $desc_club = '';
            $foto_club = '';
            $latitud_club = '0';
            $longitud_club = '0';
            $edadmin_club = 0;
            $edadmax_club = 0;
            $id_categoria = 0;
            $estado_club = 0;
            $orgsnumERP_club = $orgsnumERP;
            //echo 'No existe';
            $sqlinsert = $sqlinsert . ""
                    . "('$id_club','$nombre_club','$desc_club','$foto_club',"
                    . " '$latitud_club', '$longitud_club','$edadmin_club','$edadmax_club','$id_categoria',"
                    . " '$estado_club','$orgsnumERP_club'),";
        }
    }
    if ($cuentanoexiste > 0) {
        //echo 'fin' . $sqlinsert;
        $cuentasql = $fn101->fn101_cclub_xdata(substr($sqlinsert,  0, -1));
        //echo 'Resultado' . $cuentasql;
        echo 'Registros <b>no existe</b> ' . $cuentanoexiste .'<br>';
        echo 'Registros <b>existe</b> ' . $cuentaexiste.'<br>';
        echo 'Registros <b>ingresados</b> ' . $cuentaexiste.'<br>';
    }else {
        echo '<center>Todos los registros están ingresados correctamente</center>';
    }

}
//INCLUDE
if ($include == 1) {
    $tabla = $fn101->fn101_rclub_all();
    ?>
    <table id="example3" class="display">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Name</th>
                <th>Description</th>
                <th>Estado</th>
                <th>Category</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($menu = $tabla->fetch_assoc()) {
                $st = $menu['estado_club'];
                $id = $menu['id_club'];
                $idcategoria = $menu['id_categoria'];
                $estado = $a->fn101_estado_xid($st);
                $rolactivo = $a->fn101_rcategoria_xid($idcategoria);
                $roles = $a->fn101_rrol_all();
                ?>
                <tr>
                    <td style="justify-content: center;"> 
                        <a href="#" onclick="md101_d2(5,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_md" >
                            <img style="width: 40px; " src="./images/img-icon.png"> 
                        </a>
                    </td>
                    <td> <?php echo utf8_encode($menu['nombre_club']) ?> </td>
                    <td> <?php echo utf8_encode($menu['desc_club']) ?> </td>
                    <td>
                        <div class="custom-control custom-checkbox mb-3">
                            <?php
                            if ($st == 0) {
                                ?>
                                <input value="1" name="estado" onchange="cn101_f4(4, <?php echo $id ?>, this.value)" type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id ?>" required>
                                <label class="custom-control-label" for="customCheckBox<?php echo $id ?>">Inactivo</label>
                                <?php
                            } else if ($st == 1) {
                                ?>
                                <input value="0" name="estado" onchange="cn101_f4(4, <?php echo $id ?>, this.value)" checked type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id ?>" required>
                                <label class="custom-control-label" for="customCheckBox<?php echo $id ?>">Activo</label>
                                <?php
                            }
                            ?>
                        </div>
                        <div id="fill_<?php echo $id ?>">
                        </div>
                    </td>
                    <td>
                        <select onchange="cn101_f6(6,<?php echo $id ?>, this.value)">
                            <option value="<?php echo $rolactivo[0]['nombre_categoria'] ?>"><?php echo $rolactivo[0]['nombre_categoria'] ?></option>
                            <?php
                            while ($detroles = $roles->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $detroles['id_categoria'] ?>"><?php echo $detroles['nombre_categoria'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <div class="d-flex">
                            <button onclick="md101_d2(2,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-pencil-alt"></i></button>
                            <button onclick="md101_d4(4,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_sm" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></button>
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
if ($include == 3) {
    ?>
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="basic-form">
                    <form class="form-valide" id="frm_imagen" method="post">
                        <input type="hidden" value="8" name="dato_0">
                        <input type="hidden" value="<?php echo $id ?>" name="dato_1">
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Image ( 396 x 257 )px</label>
                            <!--                                <div class="col-sm-12">
                                                                <img src="../images/<?php echo utf8_encode($tupla[0]['foto_club']) ?>">
                                                            </div>-->
                            <div class="file-loading">
                                <input id="kv-explorer" name="dato_5"  type="file" data-theme="fas">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="js/fileup-v2/js/locales/es.js" type="text/javascript"></script>
        <script src="js/fileup-v2/js/fileinput.js" type="text/javascript"></script>
        <script>
        $(document).ready(function () {
            $("#kv-explorer").fileinput({
                theme: 'explorer-fas',
                maxFileSize: 6000,
                maxFileCount: 1,
                showUpload: false,
                allowedFileExtensions: ['jpg', 'png', 'gif'],
                initialPreviewAsData: true,
                initialPreview: [
                    "../images/<?php echo utf8_encode($tupla[0]['foto_club']) ?>"
                ],
                initialPreviewConfig: [
                    {caption: "<?php echo utf8_encode($tupla[0]['foto_club']) ?>", size: 329892, width: "120px", url: "{$url}", key: 1}
                ]
            });
        });
        </script>
    </div>
    <?php
}