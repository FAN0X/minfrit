<?php
require './funciones/fn-152.php';
$a = new Fn152();
$fecha = date('Y-m-d');
$fecha_fin = date('Y-m-d');
$nuevafecha = strtotime('-12 months', strtotime($fecha_fin));
$fecha_ini = date('Y-m-d', $nuevafecha);
$anio = date('Y');
//$tabla = $a->fn152_transaccion();
$vivienda = $a->fn152_rvivienda_usuario($idconj_open);
$concepto = $a->fn152_concepto($idconj_open);
?>
<script src="./js/jsopc/jsopc-152.js"></script>
<div class="">
    <!--    <div class="page-title">
            <div class="title_left">
                <h3>Familias</h3>
            </div>
        </div>-->
    <div class="clearfix"></div>
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Resumen </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <hr>
                <div class="x_content">
                    <!-- start form for validation -->
                    <form id="filtro_form1">
                        <input type="hidden" id="i_opcfiltro" name="dato_0" value="2">

                        <div class="h1"></div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="heard">Fecha Desde:</label>
                                <input class="form-control col-md-7 col-xs-12" id="fecha_ini" value="<?php echo $fecha_ini ?>" type="date" name="fechain" >
                            </div>
                            <div class="col-md-4">
                                <label for="heard">Fecha Hasta:</label>
                                <input class="form-control col-md-7 col-xs-12" id="fecha_fin" value="<?php echo $fecha_fin ?>" type="date" name="fechaout" >
                            </div>
                            <div class="col-md-4">
                                <label for="heard"></label><br>
                                <button class="btn btn-primary" type="button" onclick="cn152_001_d2(1)">CONSULTAR</button>
                            </div>
                        </div>

                        <div class="h1"></div>
                        <hr>
                    </form>
                    <hr>
                    <!-- end form for validations -->

                </div>
                <div class="x_content">
                    <!--                        <div class="alert alert-info alert-dismissible fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <strong>Mensaje!</strong>  
                                            </div>-->
                    <div id="i_table">
                        <div class="row" style="height: 15200px; overflow-y: auto">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div id="i_tabla152">
                                    <h3>CORTE DESDE: <?php echo $fecha_ini ?> AL: <?php echo $fecha_fin ?></h3>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>CASA</th>
                                                <th>SALDO</th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($menu = $concepto->fetch_assoc()) {
                                                $id = $menu['id_concepto'];
                                                $sumacredito = $a->fn152_sumacreditodebito('C', $id, $fecha_ini, $fecha_fin);
                                                $sumadebito = $a->fn152_sumacreditodebito('D', $id, $fecha_ini, $fecha_fin);
                                                $resultadototal = $sumacredito - $sumadebito;
                                                ?>
                                                <tr>
                                                    <th><?php echo utf8_encode($menu['cod_concepto']) ?></th>
                                                    <th><?php
                                                        if ($resultadototal < 0) {
                                                            echo '<strong style="color:red">$ ' . number_format($resultadototal, 2) . '</strong>';
                                                        } else if ($resultadototal > 0) {
                                                            echo '<strong style="color:blue">$ ' . number_format($resultadototal, 2) . '</strong>';
                                                        } else {
                                                            echo '<strong style="color:green">$ ' . number_format($resultadototal, 2) . '</strong>';
                                                        }
                                                        ?>
                                                    </th>
                                                    <th>
                                                        <?php
                                                        if ($resultadototal < 0) {
                                                            echo '<strong style="color:red">SALDO PENDIENTE</strong>';
                                                        } else if ($resultadototal > 0) {
                                                            echo '<strong style="color:blue">SALDO A FAVOR</strong>';
                                                        } else {
                                                            echo '<strong style="color:green">AL DÍA</strong>';
                                                        }
                                                        ?>

                                                    </th>
                                                </tr> 
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            while ($menu = $concepto->fetch_assoc()) {
                                                $id = $menu['id_concepto'];
                                                $sumacredito = $a->fn152_sumacreditodebito2('C', $id, $fecha_ini, $fecha_fin);
                                                $sumadebito = $a->fn152_sumacreditodebito2('D', $id, $fecha_ini, $fecha_fin);
                                                $resultadototal = $sumacredito - $sumadebito;
                                                ?>
                                                <tr>
                                                    <th><?php echo utf8_encode($menu['cod_concepto']) ?></th>
                                                    <th><?php
                                                        if ($resultadototal < 0) {
                                                            echo '<strong style="color:red">$ ' . number_format($resultadototal, 2) . '</strong>';
                                                        } else if ($resultadototal > 0) {
                                                            echo '<strong style="color:blue">$ ' . number_format($resultadototal, 2) . '</strong>';
                                                        } else {
                                                            echo '<strong style="color:green">$ ' . number_format($resultadototal, 2) . '</strong>';
                                                        }
                                                        ?>
                                                    </th>
                                                    <th>
                                                        <?php
                                                        if ($resultadototal < 0) {
                                                            echo '<strong style="color:red">SALDO PENDIENTE</strong>';
                                                        } else if ($resultadototal > 0) {
                                                            echo '<strong style="color:blue">SALDO A FAVOR</strong>';
                                                        } else {
                                                            echo '<strong style="color:green">AL DÍA</strong>';
                                                        }
                                                        ?>

                                                    </th>
                                                </tr> 
                                                <?php
                                            }
                                            ?>    

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <hr>
                        <h2>Resumen de transacciones "SIN IDENTIFICAR" </h2>
                        <hr>
<!--                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Detalle</th>
                                    <th>Documento</th>
                                    <th>Monto</th>

                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                while ($menu = $tabla->fetch_assoc()) {
                                    $id = $menu['id_trans'];
                                    ?>
                                    <tr>
                                        <td><?php echo utf8_encode($menu['fecha_trans']) ?></td>
                                        <td><?php echo utf8_encode($menu['detalle_trans']) ?></td>
                                        <td><a href="../documentos/<?php echo utf8_encode($menu['archivo_trans']) ?>">--><?php echo utf8_encode($menu['documento_trans']) ?></a></td>
                                        <td><?php echo number_format($menu['monto_trans'], 2) ?></td>


                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>-->
                    </div>
                    <!--modal eliminar-->
                    <div class="modal fade" id="modalcontent_md">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" id="content_md">
                            </div>
                        </div>
                    </div>
                    <!-- Small modal -->
                    <div class="modal fade bd-example-modal-sm" id="modalcontent_sm" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content" id="content_sm">
                            </div>
                        </div>
                    </div>

                    <!-- lg modal -->
                    <div class="modal fade bd-example-modal-sm" id="modalcontent_lg" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content" id="content_lg">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>

