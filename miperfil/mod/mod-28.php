<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
include '../sesiones/opensesion.php';
require '../fn/fn-28.php';
$opc_mod = $_POST['dato_0'];
$a = new Fn_28();
$fechaactual = date('Y-m-d');

if ($opc_mod == 1) {
    $pisodepa = $a->fn28_rviviendas_xpiso_all($idconj_open);
    ?>
    <!-- Material color picker -->
    <script src="vendor/moment/moment.min.js"></script>
    <script src="vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="js/plugins-init/material-date-picker-init.js"></script>
    <div class="modal-header">
        <h5 class="modal-title">Nuevo Usuario</h5>
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
                                <label class="col-sm-12 col-form-label">Datos Personales</label>
                                <hr>
                            </div>
                             <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="nav-item dropdown notification_dropdown">
                                        <div class="input-group search-area">
                                            <input type="text" class="form-control"  placeholder=" CI" id="cedula_usuario"  name="cedula_usuario" onClick="this.select();" onkeypress="return /[0-9]/i.test(event.key)">
                                            <span class="input-group-text"><a href="javascript:void(0)" onclick="cn28_r006_d3(6)" id="btn_cedula"  type="button" ><i class="flaticon-381-search-2"></i></a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="data_user">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" name="nombre_usuario" class="form-control" placeholder="Nombre *">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="apellido_usuario" class="form-control" placeholder="Apellido *">
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <div class="col-sm-6">
                                        <input type="text" name="tlf1_usuario" class="form-control" placeholder="Teléfono *">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" name="email_usuario" class="form-control" placeholder="Email *">
                                    </div>
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
        <button type="button"  onclick="cn28_c001_f1()"  class="btn btn-warning" >Guardar </button>
    </div>
    <?php
}

if ($opc_mod == 2) {
    $id = $_POST['dato_1'];
    $detusuario = $a->fn28_rusuario_empresa_xid($id);
    $pisodepa = $a->fn28_rviviendas_xpiso_all($idconj_open);
//    print_r($detusuario);
    ?>
    <!-- Material color picker -->
    <script src="vendor/moment/moment.min.js"></script>
    <script src="vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="js/plugins-init/material-date-picker-init.js"></script>
    <div class="modal-header">
        <h5 class="modal-title">Detalle Departamento No. <?php echo $detusuario[0]['num_vivienda'] ?></h5>
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
                            <input type="hidden" value="<?php echo $detusuario[0]['id_usuario'] ?>" name="dato_2">
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Datos Personales</label>
                                <hr>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6">Nombre</label>
                                <label class="col-sm-6">Apellido</label>
                                <div class="col-sm-6">
                                    <input type="text" name="nombre_usuario" class="form-control" placeholder="Nombre *" value="<?php echo utf8_encode($detusuario[0]['nombre_usuario']) ?>">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="apellido_usuario" class="form-control" placeholder="Apellido *" value="<?php echo utf8_encode($detusuario[0]['apellido_usuario']) ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6">Cédula</label>
                                <label class="col-sm-6">Teléfono</label>
                                <div class="col-sm-6">
                                    <input type="text" name="cedula_usuario" class="form-control" placeholder="Cédula *" value="<?php echo $detusuario[0]['cedula_usuario'] ?>">
                                </div>
                                 <div class="col-sm-6">
                                     <input type="text" name="tlf1_usuario" class="form-control" placeholder="Teléfono *" value="<?php echo $detusuario[0]['tlf1_usuario'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12">E-mail</label>
                                <div class="col-sm-12">
                                    <input type="text" name="email_usuario" class="form-control" placeholder="Email *" value="<?php echo $detusuario[0]['email_usuario'] ?>">
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
        <button type="button"  onclick="cn28_u002_f1()"  class="btn btn-warning" >Guardar </button>
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
                <button type="button" onclick="cn28_u003_d3(3, <?php echo $id ?>, -1)"  class="btn btn-primary" data-bs-dismiss="modal">SI</button>
            </form>
        </div>

    </div>
    <?php
}

