<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
include '../sesiones/opensesion.php';
require '../fn/fn-52.php';
$opc_mod = $_POST['dato_0'];
$a = new Fn_52();
$fechaactual = date('Y-m-d');

if ($opc_mod == 1) {
    $conseptoegresos = $a->fn52_rconceptos_all(1,$idconj_open);
    ?>
    <!-- Material color picker -->
    <script src="vendor/moment/moment.min.js"></script>
    <script src="vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="js/plugins-init/material-date-picker-init.js"></script>
    <div class="modal-header">
        <h5 class="modal-title">Nuevo Egreso</h5>
        <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="basic-form">
                        <form class="form-valide" id="frm_nuevo" method="post">
                            <input type="hidden" value="2" name="dato_0">
                            
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Numero de Factura *</label>
                                <div class="col-sm-12">
                                    <input type="text" name="numfactura_egreso" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Fecha de Factura *</label>
                                <div class="col-sm-12">
                                    <input type="date" name="fechafactura_egreso" class="form-control" value="<?php echo $fechaactual ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Cosepto</label>
                                <div class="col-sm-12">
                                    <select id="id" class="form-control" name="idconsepto">
                                        <option value="0">--SELECCIONE CONCEPTO--</option>
                                        <?php 
                                        while ($menuconcepto = $conseptoegresos->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $menuconcepto['id_concon'] ?>"><?php echo utf8_encode($menuconcepto['nombre_concepto']) ?></option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Detalle *</label>
                                <div class="col-sm-12">
                                    <textarea id="id" name="detalle_egreso" rows="2" class="form-control" cols="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Valor *</label>
                                <div class="col-sm-12">
                                    <input type="text" name="valor_egreso" class="form-control" value="0">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="msg_mod"></div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cerrar</button>
        <button type="button"  onclick="cn52_c002_f1()"  class="btn btn-warning" >Guardar </button>
    </div>
    <?php
}

if ($opc_mod == 2) {
    $id = $_POST['dato_1'];
    $detegreso = $a->fn52_regresos_xid($id);
    $conseptoegresos = $a->fn52_rconceptos_all(1);
    ?>
    <!-- Material color picker -->
    <script src="vendor/moment/moment.min.js"></script>
    <script src="vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="js/plugins-init/material-date-picker-init.js"></script>
    <div class="modal-header">
        <h5 class="modal-title">Detalle Egreso</h5>
        <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="basic-form">
                        <form class="form-valide" id="frm_nuevo" method="post">
                            <input type="hidden" value="2" name="dato_0">
                            
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Numero de Factura *</label>
                                <div class="col-sm-12">
                                    <input type="text" name="numfactura_egreso" class="form-control" value="<?php echo $detegreso[0]['numfactura_egreso'] ?>" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Fecha de Factura *</label>
                                <div class="col-sm-12">
                                    <input type="date" name="fechafactura_egreso" class="form-control" value="<?php echo $detegreso[0]['fechafactura_egreso'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Cosepto</label>
                                <div class="col-sm-12">
                                    <select id="id" class="form-control" name="idconsepto">
                                        <?php 
                                        while ($menuconcepto = $conseptoegresos->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $menuconcepto['id_concon'] ?>" <?php if($menuconcepto['id_concon'] ==$detegreso[0]['id_concon'] ){ echo 'selected'; } ?> ><?php echo utf8_encode($menuconcepto['nombre_concepto']) ?></option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Detalle *</label>
                                <div class="col-sm-12">
                                    <textarea id="id" name="detalle_egreso" rows="2" class="form-control" cols="10"><?php echo $detegreso[0]['detalle_egreso'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Valor *</label>
                                <div class="col-sm-12">
                                    <input type="text" name="valor_egreso" class="form-control" value="<?php echo $detegreso[0]['valor_egreso'] ?>">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="msg_mod"></div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cerrar</button>
        <!--<button type="button"  onclick="cn52_c002_f1()"  class="btn btn-warning" >Guardar </button>-->
    </div>
    <?php
}