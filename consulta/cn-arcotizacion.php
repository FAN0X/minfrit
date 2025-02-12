<?php
session_start();
require '../controlador/conexion.php';
require '../funciones/fn-arcotizacion.php';
require '../funciones/fn-index.php';
include '../sesiones/abrir.php';

$fnarc = new Fn_arcotizacion();
$fnindex = new Fn_index();

$opc_cn = $_POST['dato_0'];

if ($opc_cn == 1) {
    $filtrado = $_POST['txtsearch'];
    $id = $_POST['dato_1'];
    
    $tabla = $fnarc->fnarc_rproducto_xidprod($filtrado);
    $include = 1;
}

if($opc_cn == 2){
    $id = $_POST['dato_1'];
    $idprod = $_POST['dato_2'];
    
    $verif = $fnarc->fnarc_rprod_xidprod($id, $idprod);
    
    if($verif == 1){
        
    }else{
        $producto = $fnarc->fnarc_rproductos_xidprod($idprod);
        
        $precio = $producto[0]['precio1_prod'];
        
        $cuenta = $fnarc->fnarc_cproducto_xidprod($id, $idprod, $precio);
    }
    
    $include = 2;
}

if($opc_cn == 3){
    $idtprod = $_POST['dato_1'];
    $id = $_POST['dato_2'];
    
    $verif = $fnarc->fnarc_dproducto_xidprod($idtprod);
    
    $include = 2;
}

if($opc_cn == 4){
    $estado = $_POST['dato_1'];
    $id = $_POST['dato_2'];
    $idusu = $_POST['dato_3'];
    
    if($estado == 3){
        $texto = ' APROBADA AL CLIENTE';
    }else{
        $texto = ' RECHAZADA AL CLIENTE';
    }
    $verif = $fnarc->fnarc_uproducto_xestado($estado, $id);
    
    
    $cuenta = $fnarc->fnarc_cseguimiento_xid($id, $idusu, utf8_decode('COTIZACIÓN ' . $texto));
    
    echo $cuenta;
}

if ($include == 1) {
    ?>
    <table id="example3" class="display" style="width: 100%" border="1">
        <thead>
            <tr>
                <th>C贸digo</th>
                <th>Nombre</th>
                <th>Disponibilidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($menu = $tabla->fetch_assoc()) {
                $idprod = $menu['id_prod'];
                ?>
                <tr>
                    <td> <?php echo utf8_encode($menu['cod_prod']) ?> </td>
                    <td> <?php echo utf8_encode($menu['nombre_prod']) ?> </td>
                    <td><?php
                        $almacen = $fnindex->fnindex_ralamacen_xall($menu['id_prod']);
                        while ($menu1 = $almacen->fetch_assoc()) {
                            echo utf8_encode($menu1['nombre_almacen']) . ': ' . utf8_encode($menu1['cantidad_almprod']) . '<br>';
                        }
                        ?>
                    </td>
                    <td>
                        <button onclick="cnarcotizacion_r002_xdata(2,<?php echo $id ?>,<?php echo $idprod ?>)" class="btn btn-primary shadow btn-xs sharp ">
                            <i class="fa fa-plus"></i>
                        </button>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}

if($include == 2){
?>
    <div class="row" style="padding: 10px 10px; border: 1px silver solid;">
        <div class="col-md-3" style="border-right: 1px silver solid;">
            <b>PRODUCTO</b>
        </div>
        <div class="col-md-2" style="border-right: 1px silver solid;">
            <b>DISPONIBILIDAD</b>
        </div>
        <div class="col-md-1" style="border-right: 1px silver solid;">
            <b>CANTIDAD</b>
        </div>
        <div class="col-md-2" style="border-right: 1px silver solid;">
            <b>PRECIO</b>
        </div>
        <div class="col-md-2" style="border-right: 1px silver solid;">
            <b>DESCUENTO</b>
        </div>
        <div class="col-md-2" style="border-right: 1px silver solid;">
            <b>GUARDAR</b>
        </div>
    </div>
<?php
    $detcotiza = $fnindex->fnindex_rtiendaprod_xidtienda($id);
    while ($detmenu = $detcotiza->fetch_assoc()) {
        //precios por producto
        $precioprod = $fnindex->fnindex_rprecio_xidprod($detmenu['id_prod']);
        ?>
        <div class="row" style="border: 1px silver solid; padding: 10px 10px;">
            <div class="col-md-3">
                <?php echo utf8_encode($detmenu['nombre_prod']) ?> <small>( COD: <?php echo utf8_encode($detmenu['cod_prod']) ?> )</small>
                <?php if ($detmenu['tipo_prod'] == 2) { ?>
                    <br><small style="color: red;">EN OFERTA ( - <?php echo $detmenu['descu_prod'] ?> %) </small>
                <?php } ?>
            </div>
            <div class="col-md-2" style="text-align: left;" >
                <?php
                $almacen = $fnindex->fnindex_ralamacen_xall($detmenu['id_prod']);
                while ($menu = $almacen->fetch_assoc()) {
                    echo utf8_encode($menu['nombre_almacen']).': '.utf8_encode($menu['cantidad_almprod']).'<br>';
                    } ?>
            </div>
            <div class="col-md-1">
                <?php if ($detmenu['cantidadcot_tiendaprod'] != '') { ?>
                    <input id="cantidad_<?php echo utf8_encode($detmenu['id_tiendaprod']) ?>" type="number" value="<?php echo utf8_encode($detmenu['cantidadcot_tiendaprod']) ?>">
                <?php } else { ?>
                    <input id="cantidad_<?php echo utf8_encode($detmenu['id_tiendaprod']) ?>" type="number" value="<?php echo utf8_encode($detmenu['cant_tiendaprod']) ?>">
                <?php } ?>
            </div>
            <div class="col-md-2">
                <select class="form-control" id="precio_<?php echo utf8_encode($detmenu['id_tiendaprod']) ?>">
                    <option value=""> -- Seleccione un precio -- </option>
                    <option value="0"> NO DISPONIBLE</option>
                    <option <?php
                    if ($detmenu['preciofinalcot_tiendaprod'] == $precioprod[0]['precio1_prod']) {
                        echo 'selected';
                    }
                    ?> value="<?php echo $precioprod[0]['precio1_prod'] ?>">PVP 1: $ <?php echo number_format($precioprod[0]['precio1_prod'], 2) ?></option>
                    <option <?php
                    if ($detmenu['preciofinalcot_tiendaprod'] == $precioprod[0]['precio2_prod']) {
                        echo 'selected';
                    }
                    ?> value="<?php echo $precioprod[0]['precio2_prod'] ?>">PVP 2: $ <?php echo number_format($precioprod[0]['precio2_prod'], 2) ?></option>
                    <option <?php
                    if ($detmenu['preciofinalcot_tiendaprod'] == $precioprod[0]['precio3_prod']) {
                        echo 'selected';
                    }
                    ?>  value="<?php echo $precioprod[0]['precio3_prod'] ?>">PVP 3: $ <?php echo number_format($precioprod[0]['precio3_prod'], 2) ?></option>
                    <option <?php
                    if ($detmenu['preciofinalcot_tiendaprod'] == $precioprod[0]['precio4_prod']) {
                        echo 'selected';
                    }
                    ?>  value="<?php echo $precioprod[0]['precio4_prod'] ?>">PVP 4: $ <?php echo number_format($precioprod[0]['precio4_prod'], 2) ?></option>
                </select>
            </div>
            <div class="col-md-2">
                <input style="width: 80%; float: left;" id="descuento_<?php echo utf8_encode($detmenu['id_tiendaprod']) ?>" type="text" value="<?php echo utf8_encode($detmenu['descuentocot_tiendaprod']) ?>"><b style="font-size: 20px;">%</b>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-blue-geroneto" title="GUARDAR CAMBIOS" onclick="cntienda_r009_xdata(9,<?php echo utf8_encode($detmenu['id_tiendaprod']) ?>)">
                    <i class="fa fa-save"></i>
                </button>
                <button type="button" class="btn btn-blue-geroneto" title="ELIMINAR" onclick="cnarcotizacion_r003_xdata(3,<?php echo utf8_encode($detmenu['id_tiendaprod']) ?>, <?php echo $id ?>)">
                    <i class="fa fa-trash"></i>
                </button>
                <div id="result_<?php echo utf8_encode($detmenu['id_tiendaprod']) ?>"></div>
            </div>
        </div>
<?php    
    } 
}
?>