<?php
require './fn/fn-152.php';
$a = new Fn_152();
$fecha = date('Y-m-d');
$fecha_fin = date('Y-m-d');
$nuevafecha = strtotime('-12 months', strtotime($fecha_fin));
$fecha_ini = date('Y-m-d', $nuevafecha);
$anio = date('Y');
//$tabla = $a->fn152_transaccion();
$vivienda = $a->fn152_rvivienda_usuario($idconj_open);
$concepto = $a->fn152_concepto($idconj_open);
?>
<script src="./jsopc/jsopc-152.js"></script>



    
<div class="content-body">
    
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Reporte - Totales </h4>
                        
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form id="frm_serch"  method="post">
                                    <input type="hidden" value="-1" name="dato_0">
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
                                </form>
                            </div>
                        </div>
                        
                        <div class="table-responsive" id="i_tabla152">

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
                                    while ($menu = $vivienda->fetch_assoc()) {
                                        $id = $menu['id_usuvivienda'];
                                        $sumacredito = $a->fn152_sumacreditodebito('C', $id, $fecha_ini, $fecha_fin);
                                        $sumadebito = $a->fn152_sumacreditodebito('D', $id, $fecha_ini, $fecha_fin);
                                        $resultadototal = $sumacredito - $sumadebito;
                                        ?>
                                        <tr>
                                            <th><?php echo utf8_encode($menu['num_vivienda']) ?></th>
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
                                        $id = $menu['id_concon'];
                                        $sumacredito = $a->fn152_sumacreditodebito2('C', $id, $fecha_ini, $fecha_fin);
                                        $sumadebito = $a->fn152_sumacreditodebito2('D', $id, $fecha_ini, $fecha_fin);
                                        $resultadototal = $sumacredito - $sumadebito;
                                        ?>
                                        <tr>
                                            <th><?php echo utf8_encode($menu['nombre_concepto']) ?></th>
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
                        <!-- Md modal  -->
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
                        <div class="modal fade bd-example-modal-lg" id="modalcontent_lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" id="content_lg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
