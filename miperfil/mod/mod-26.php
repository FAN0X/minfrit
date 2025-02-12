<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
include '../sesiones/opensesion.php';
require '../fn/fn-26.php';
$opc_mod = $_POST['dato_0'];
$a = new Fn_26();
$fechaactual = date('Y-m-d');

if ($opc_mod == 1) {
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
                            <input type="hidden" value="1" name="dato_0">
                            
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Conceptos Generales *</label>
                                <div class="col-sm-12">
                                    <select  class="form-control" onchange="js26_001_d1(this.value)" name="nombre_concepto">
                                        <option value="ALICUOTAS">ALICUOTAS</option>
                                        <option value="ARRIENDO">ARRIENDO</option>
                                        <option value="PAGO DE AGUA">PAGO DE AGUA</option>
                                        <option value="PAGO DE LUZ">PAGO DE LUZ</option>
                                        <option value="PAGO DE TELEFONO">PAGO DE TELEFONO</option>
                                        <option value="0">PERSONALIZADO</option>
                                    </select>
                                </div>
                            </div>
                            <div id="new_concepto" style="display: none">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Nuevo Concepto *</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="newnombre_concepto" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Descripción (Opcional)</label>
                                    <div class="col-sm-12">
                                        <textarea id="id" name="desc_concepto" rows="3" class="form-control" cols="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Tipo *</label>
                                <div class="col-sm-12">
                                    <select id="id" class="form-control" name="tipo_concepto">
                                        <option value="1">Egreso</option>
                                        <option value="0">Ingreso</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Periodo *</label>
                                <div class="col-sm-12">
                                    <select id="id" class="form-control" name="periodo_concon">
                                        <option value="0">No Periodo</option>
                                        <option value="1">Mensual</option>
                                        <option value="2">Trimestral</option>
                                        <option value="3">Semestral</option>
                                        <option value="4">Anual</option>
                                        <option value="5">Semanal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Valor Estandar *</label>
                                <div class="col-sm-12">
                                    <input type="text" name="valorestandar_concon" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Valor Maximo *</label>
                                <div class="col-sm-12">
                                    <input type="text" name="valormaximo_concon" class="form-control">
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
        <button type="button"  onclick="cn26_c001_f1()"  class="btn btn-warning" >Guardar </button>
    </div>
    <?php
}

if ($opc_mod == 2) {
    $id = $_POST['dato_1'];
    $detconcepto = $a->fn26_rconcepto_xid($id);
    ?>
    <!-- Material color picker -->
    <script src="vendor/moment/moment.min.js"></script>
    <script src="vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="js/plugins-init/material-date-picker-init.js"></script>
    <div class="modal-header">
        <h5 class="modal-title">Detalle Concepto : <?php echo $detconcepto[0]['nombre_concepto'] ?></h5>
        <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="basic-form">
                        <form class="form-valide" id="frm_editar" method="post">
                            <input type="hidden" value="2" name="dato_0">
                            <input type="hidden" value="<?php echo $detconcepto[0]['id_concon'] ?>" name="dato_1">
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Periodo *</label>
                                <div class="col-sm-12">
                                    <select id="id" class="form-control" name="periodo_concon">
                                        <option value="0" <?php if($detconcepto[0]['periodo_concon'] == 0){ echo selected;} ?> >No Periodo</option>
                                        <option value="1" <?php if($detconcepto[0]['periodo_concon'] == 1){ echo selected;} ?>>Mensual</option>
                                        <option value="2" <?php if($detconcepto[0]['periodo_concon'] == 2){ echo selected;} ?>>Trimestral</option>
                                        <option value="3" <?php if($detconcepto[0]['periodo_concon'] == 3){ echo selected;} ?>>Semestral</option>
                                        <option value="4" <?php if($detconcepto[0]['periodo_concon'] == 4){ echo selected;} ?>>Anual</option>
                                        <option value="5" <?php if($detconcepto[0]['periodo_concon'] == 5){ echo selected;} ?>>Semanal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Valor Estandar *</label>
                                <div class="col-sm-12">
                                    <input type="text" name="valorestandar_concon" class="form-control" value="<?php echo $detconcepto[0]['valorestandar_concon'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Valor Maximo *</label>
                                <div class="col-sm-12">
                                    <input type="text" name="valormaximo_concon" class="form-control" value="<?php echo $detconcepto[0]['valormaximo_concon'] ?>">
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
        <button type="button"  onclick="cn26_u002_f1()"  class="btn btn-warning" >Guardar </button>
    </div>
    <?php
}

if ($opc_mod == 3) {
    $id = $_POST['dato_1'];
    ?>
    <div class="modal-content" id="content_sm">
        <div class="modal-header">
            <h5 class="modal-title">Eliminar registro</h5>
            <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST" id="frm_delete">
                <input type="hidden" name="dato_0" value="4">
                <input type="hidden" name="dato_1" value="<?php echo $id ?>">
                <label> Está seguro que desea eliminar este registro ?</label>
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">NO</button>
                <button type="button" onclick="cn26_u003_d3(3, <?php echo $id ?>, -1)"  class="btn btn-primary" data-bs-dismiss="modal">SI</button>
            </form>
        </div>

    </div>
    <?php
}