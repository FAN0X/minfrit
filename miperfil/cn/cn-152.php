<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
require '../fn/fn-152.php';
include '../sesiones/opensesion.php';
$a = new Fn_152();
$iopc = $_POST['dato_0'];

if ($iopc == 1) {
    $fecha_ini = utf8_decode($_POST['dato_1']);
    $fecha_fin = utf8_decode($_POST['dato_2']);
    $vivienda = $a->fn152_rvivienda_usuario($idconj_open);
    $concepto = $a->fn152_concepto($idconj_open);
    ?>
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
    <?php
}