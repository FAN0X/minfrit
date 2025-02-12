<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
require '../fn/fn-155.php';
$opc_mod = $_POST['dato_0'];
$fn155 = new Fn_155();


if ($opc_mod == 1) {
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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="basic-form">
                        <form class="form-valide" id="frm_nuevo" method="post">
                            <input type="hidden" value="1" name="dato_0">
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Nombre</label>
                                <div class="col-sm-12">
                                    <input type="text" name="nombre_usuario" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Apellido</label>
                                <div class="col-sm-12">
                                    <input type="text" name="apellido_usuario" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Teléfono</label>
                                <div class="col-sm-12">
                                    <input type="text" name="telefono_usuario" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Cedula</label>
                                <div class="col-sm-12">
                                    <input type="text" name="cedula_usuario" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="text" name="email_usuario" class="form-control" placeholder="">
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cerrar</button>
        <button type="button"  onclick="cn155_f1()" data-bs-dismiss="modal" class="btn btn-warning" >Guardar </button>
    </div>
    <?php
}

if ($opc_mod == 2) {
    $id = $_POST['dato_1'];
    $tupla = $fn155->fn155_rusuario_x($id);
    ?>
    <div class="modal-header">
        <h5 class="modal-title">Editar Usuario</h5>
        <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="">
            <div class="row">
                <div class="col-md-12" id="div_editar"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="basic-form">
                        <form class="form-valide" id="frm_editar" method="post">
                            <input type="hidden" value="2" name="dato_0">
                            <input type="hidden" value="<?php echo $id ?>" name="dato_1">
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Nombre</label>
                                <div class="col-sm-12">
                                    <input type="text" name="nombre_usuario" class="form-control" value="<?php echo utf8_encode($tupla[0]['nombre_usuario']) ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Apellido</label>
                                <div class="col-sm-12">
                                    <input type="text" name="apellido_usuario" class="form-control" value="<?php echo utf8_encode($tupla[0]['apellido_usuario']) ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Teléfono</label>
                                <div class="col-sm-12">
                                    <input type="text" name="telefono_usuario" class="form-control" value="<?php echo utf8_encode($tupla[0]['telefono_usuario']) ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Cedula</label>
                                <div class="col-sm-12">
                                    <input type="text" name="cedula_usuario" class="form-control" value="<?php echo utf8_encode($tupla[0]['cedula_usuario']) ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="text" name="email_usuario" class="form-control" value="<?php echo utf8_encode($tupla[0]['email_usuario']) ?>">
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cerrar</button>
        <button onclick="cn155_f2()" type="button" class="btn btn-warning" data-bs-dismiss="modal">Guardar cambios</button>
    </div>
    <?php
}

if ($opc_mod == 3) {
    $id = $_POST['dato_1'];
    $tupla = $fn155->fn155_ravisos_x($id);
    ?>
    
    <?php
}

if ($opc_mod == 4) {
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
                <button type="button" onclick="cn155_f7(7, <?php echo $id ?>, -1)"  class="btn btn-primary" data-bs-dismiss="modal">SI</button>
            </form>
        </div>

    </div>
    <?php
}

if ($opc_mod == 5) {
    $id = $_POST['dato_1'];
    $cedula = $_POST['dato_2'];
    ?>
    <div class="modal-content" id="content_sm">
        <div class="modal-header">
            <h5 class="modal-title">Nueva contraseña</h5>
            <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST" id="frm_password">
                <input type="hidden" name="dato_0" value="5">
                <input type="hidden" name="dato_1" value="<?php echo $id ?>">
                <input type="hidden" name="dato_2" value="<?php echo $cedula ?>">
                <label> Actualizar contraseña</label>
                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Contraseña nueva</label>
                    <div class="col-sm-12">
                        <input type="password" name="new_pass" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Confirmar contraseña</label>
                    <div class="col-sm-12">
                        <input type="password" name="conf_pass" class="form-control" value="">
                    </div>
                </div>
                <div id="i_result">
                    
                </div>
                <center>
                    <button onclick="cn155_f5()" type="button" class="btn btn-warning">Actualizar contraseña</button>
                </center>
            </form>
        </div>

    </div>
    <?php
}