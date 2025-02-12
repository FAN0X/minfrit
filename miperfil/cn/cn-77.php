<?php
include '../config.php';
require '../controlador/conexion.php';
require '../fn/fn-77.php';
require '../funciones/fn-alert.php';
$opc_cn = $_POST['dato_0'];
//echo $opc_cn;
$fn77 = new Fn_77();
$fnalert = new Fn_alert();

if ($opc_cn == 1) {
    $id = utf8_decode($_POST['dato_1']);
    $tupla = $fn77->fn77_rrol_x($id);
    $tabla = $fn77->fn77_rmenup_all();
    $include = 1;
}
if ($opc_cn == 2) {
    $id = utf8_decode($_POST['dato_1']);
    $id_rol = utf8_decode($_POST['dato_2']);
    $tabla = $fn77->fn77_rmenup_xidpadre($id);
    $include = 2;
}
if ($opc_cn == 3) {
    $opc = utf8_decode($_POST['dato_1']);
    $id_rol = utf8_decode($_POST['dato_2']);
    $id_menu = utf8_decode($_POST['dato_3']);
    $detmenu = $fn77->fn77_rmenu_x($id_menu);
    $idmenup = $detmenu[0]['pertenece_menu'];
    $st = 1;
    $_st = 'checked';
    if ($opc == 1) {
        $st = 0;
        $_st = '';
    }
    if ($st == 0) {
        $cuenta = $fn77->fn77_drolmenu_x($id_rol, $id_menu);
        $vermenup = $fn77->fn77_rrolmenupertenece_x($idmenup, $id_rol);
        if(count($vermenup)==0){
            $cuenta = $fn77->fn77_drolmenu_x($id_rol, $idmenup);
        }
    } else {
        $cuenta = $fn77->fn77_crolmenu_x($id_rol, $id_menu);
        $vermenup = $fn77->fn77_rrolmenu_x($idmenup, $id_rol);
        if(count($vermenup)==0){
            $cuenta = $fn77->fn77_crolmenu_x($id_rol, $idmenup);
        }
    }
    $tupla = $fn77->fn77_rmenu_x($id_menu);
    $include = 3;
}
if ($include == 1) {
    ?>
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4><?php echo utf8_encode($tupla[0]['nombre_rol']) ?></h4>
            <span>Seleccione los permisos para este rol </span>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-6 col-xl-6">
            <div class="list-group mb-4 " id="list-tab" role="tablist">
                <?php while ($menu = $tabla->fetch_assoc()) { ?>
                    <a onclick="cn77_d2(2,<?php echo utf8_encode($menu['id_menu']) ?>,<?php echo utf8_encode($tupla[0]['id_rol']) ?>)" class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-opc" role="tab"><?php echo utf8_encode($menu['nombre_menu']) ?> 
                        <span style="float: right !important;"  class="fa fa-angle-right"></span>
                    </a>
                    <?php
                }
                ?>
            </div>

        </div>
        <div class="col-lg-6 col-xl-6">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-opc">

                </div>
            </div>
        </div>
    </div>
    <?php
}
if ($include == 2) {
    ?>
    <div class="basic-list-group">
        <ul class="list-group">
            <?php
            while ($menu = $tabla->fetch_assoc()) {
                $menurol = $fn77->fn77_rrolmenu_x($menu['id_menu'], $id_rol);
                $check = '';
                if (count($menurol) == 1) {
                    $check = 'checked';
                }
                ?>
                <li class="list-group-item">
                    <div id="div_<?php echo $menu['id_menu'] ?>" class="custom-control custom-checkbox checkbox-warning">
                        <input onchange="cn77_d3(3,<?php echo count($menurol) ?>,<?php echo $id_rol ?>,<?php echo $menu['id_menu'] ?>)" <?php echo $check ?> type="checkbox" class="custom-control-input"  id="customCheckBox<?php echo utf8_encode($menu['id_menu']) ?>" required>
                        <label class="custom-control-label" for="customCheckBox<?php echo utf8_encode($menu['id_menu']) ?>"><?php echo utf8_encode($menu['nombre_menu']) ?></label>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <?php
}
if ($include == 3) {
    ?>
    <input onchange="cn77_d3(3,<?php echo $st ?>,<?php echo $id_rol ?>,<?php echo $id_menu ?>)" <?php echo $_st ?> type="checkbox" class="custom-control-input"  id="customCheckBox<?php echo utf8_encode($id_menu) ?>" required>
    <label class="custom-control-label" for="customCheckBox<?php echo utf8_encode($id_menu) ?>"><?php echo utf8_encode($tupla[0]['nombre_menu']) ?></label>
    <?php
}
