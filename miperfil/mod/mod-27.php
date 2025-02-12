<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
include '../sesiones/opensesion.php';
require '../fn/fn-27.php';
$opc_mod = $_POST['dato_0'];
$a = new Fn_27();
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
                                <label class="col-sm-12 col-form-label">Número Departamento *</label>
                                <div class="col-sm-12">
                                    <input type="text" name="num_vivienda" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Número Piso *</label>
                                <div class="col-sm-12">
                                    <input type="text" name="piso_vivienda" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Observaciones (Opcional)</label>
                                <div class="col-sm-12">
                                    <textarea id="id" name="observa_vivienda" rows="3" class="form-control" cols="10"></textarea>
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
        <button type="button"  onclick="cn27_c001_f1()"  class="btn btn-warning" >Guardar </button>
    </div>
    <?php
}

if ($opc_mod == 2) {
    $id = $_POST['dato_1'];
    $detconcepto = $a->fn27_rvivienda_xid($id);
    ?>
    <!-- Material color picker -->
    <script src="vendor/moment/moment.min.js"></script>
    <script src="vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="js/plugins-init/material-date-picker-init.js"></script>
    <div class="modal-header">
        <h5 class="modal-title">Detalle Departamento No. <?php echo $detconcepto[0]['num_vivienda'] ?></h5>
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
                            <input type="hidden" value="<?php echo $id ?>" name="dato_1">
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Número Departamento *</label>
                                <div class="col-sm-12">
                                    <input type="text" name="num_vivienda" class="form-control" value="<?php echo utf8_encode($detconcepto[0]['num_vivienda']) ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Número Piso *</label>
                                <div class="col-sm-12">
                                    <input type="text" name="piso_vivienda" class="form-control" value="<?php echo utf8_encode($detconcepto[0]['piso_vivienda']) ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Observaciones (Opcional)</label>
                                <div class="col-sm-12">
                                    <textarea id="id" name="observa_vivienda" rows="3" class="form-control" cols="10"><?php echo utf8_encode($detconcepto[0]['observa_vivienda']) ?></textarea>
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
        <button type="button"  onclick="cn27_u002_f1()"  class="btn btn-warning" >Guardar </button>
    </div>
    <?php
}

if ($opc_mod == 3) {
    $id = $_POST['dato_1'];
    ?>
    <div class="modal-content" id="content_sm">
        <div class="modal-header">
            <h5 class="modal-title">Eliminar Departamento</h5>
            <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST" id="frm_delete">
                <input type="hidden" name="dato_0" value="4">
                <input type="hidden" name="dato_1" value="<?php echo $id ?>">
                <label> <b>Solo puede ser eliminado si no hay un usuario asociado al departamento</b></label>
                <label> Está seguro que desea eliminar este registro ?</label>
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">NO</button>
                <button type="button" onclick="cn27_u003_d3(3, <?php echo $id ?>, -1)"  class="btn btn-primary" data-bs-dismiss="modal">SI</button>
            </form>
        </div>

    </div>
    <?php
}
if ($opc_mod == 4) {
    $id = $_POST['dato_1'];
    $detvivienda = $a->fn27_rvivienda_xid($id);
    $habitantes = $a->fn27_rusuario_all($idconj_open);
    ?>
    <!-- Material color picker -->
    <script src="vendor/moment/moment.min.js"></script>
    <script src="vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="js/plugins-init/material-date-picker-init.js"></script>
    <div class="modal-header">
        <h5 class="modal-title">Detalle Habitantes No. <?php echo $detvivienda[0]['num_vivienda'] ?></h5>
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
                            <input type="hidden" value="<?php echo $id ?>" name="dato_1">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <table id="example3mod" class="display">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Tipo Habitante</th>
                                                <th style="width: 11%">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($menu = $habitantes->fetch_assoc()) {
                                                $id_usuario = $menu['id_usuario'];     
                                                $id_usuemp = $menu['id_usuemp']; 
                                                $checkselect = '';
                                                $verificausuario = $a->fn27_rusuario_empresa_xid($id, $id_usuemp);
                                                if($verificausuario[0]['id_usuemp']>0){
                                                    $checkselect = 'checked';
                                                }
                                            ?>
                                                <tr>
                                                    <td> <?php echo utf8_encode($menu['nombre_usuario'].' '. $menu['apellido_usuario']) ?></td>
                                                    <td> 
                                                        <select id="tp_habitante_<?php echo $id_usuemp ?>" class="form-control">
                                                            <option value="2">INQUILINO</option>
                                                            <option value="1">PROPIETARIO</option>
                                                            
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="form-check custom-checkbox mb-3 checkbox-warning check-xl">
                                                                <input <?php echo $checkselect ?>  type="checkbox" class="form-check-input" id="checkbox_sv_<?php echo $id_usuemp ?>" onchange="cn27_u005_d3(5,<?php echo $id ?>,<?php echo $id_usuemp ?>)">
                                                            </div>
                                                        </div>												
                                                    </td>												
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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
    </div>
    <script>
        $(document).ready(function() {
            $('#example3mod').dataTable( {
//                    "bPaginate": false,
                "bFilter": false,
//                    "bInfo": false,
                "searching": false
            } );
        } );
    </script>
    <?php
}