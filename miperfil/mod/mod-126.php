<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
require '../fn/fn-126.php';
$opc_mod = $_POST['dato_0'];
$fn126 = new Fn_126();


if ($opc_mod == 1) {
    ?>
    <!-- Material color picker -->
    <script src="vendor/moment/moment.min.js"></script>
    <script src="vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="js/plugins-init/material-date-picker-init.js"></script>
    <div class="modal-header">
        <h5 class="modal-title">New category</h5>
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
                                <label class="col-sm-12 col-form-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" name="nombre_categoria" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Description</label>
                                <div class="col-sm-12">
                                    <input type="text" name="desc_categoria" class="form-control" placeholder="">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
        <button type="button"  onclick="cn126_f1()" data-bs-dismiss="modal" class="btn btn-warning" >Save </button>
    </div>
    <?php
}

if ($opc_mod == 2) {
    $id = $_POST['dato_1'];
    $tupla = $fn126->fn126_rusuario_x($id);
    ?>
    <div class="modal-header">
        <h5 class="modal-title">Edit Category</h5>
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
                                <label class="col-sm-12 col-form-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" name="nombre_categoria" class="form-control" value="<?php echo utf8_encode($tupla[0]['nombre_categoria']) ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Description</label>
                                <div class="col-sm-12">
                                    <input type="text" name="desc_categoria" class="form-control" value="<?php echo utf8_encode($tupla[0]['desc_categoria']) ?>">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
        <button onclick="cn126_f2()" type="button" class="btn btn-warning" data-bs-dismiss="modal">Save</button>
    </div>
    <?php
}

if ($opc_mod == 3) {
    $id = $_POST['dato_1'];
    $tupla = $fn126->fn126_ravisos_x($id);
    ?>
    
    <?php
}

if ($opc_mod == 4) {
    $id = $_POST['dato_1'];
    ?>
    <div class="modal-content" id="content_sm">
        <div class="modal-header">
            <h5 class="modal-title">Delete record</h5>
            <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST" id="frm_delete">
                <input type="hidden" name="dato_0" value="4">
                <input type="hidden" name="dato_1" value="<?php echo $id ?>">
                <label> Are you sure you want to delete this record ?</label>
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Not</button>
                <button type="button" onclick="cn126_f7(7, <?php echo $id ?>, -1)"  class="btn btn-primary" data-bs-dismiss="modal">Yes</button>
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
                    <button onclick="cn126_f5()" type="button" class="btn btn-warning">Actualizar contraseña</button>
                </center>
            </form>
        </div>

    </div>
    <?php
}