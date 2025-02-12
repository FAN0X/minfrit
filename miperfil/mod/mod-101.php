<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
require '../fn/fn-101.php';
$opc_mod = $_POST['dato_0'];
$fn101 = new Fn_101();

if ($opc_mod == 1) {
    ?>
    <!-- Material color picker -->
    <script src="vendor/moment/moment.min.js"></script>
    <script src="vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="js/plugins-init/material-date-picker-init.js"></script>
    <div class="modal-header">
        <h5 class="modal-title">New Club</h5>
        <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-valide" id="frm_nuevo" method="post">
                        <input type="hidden" value="8" name="dato_0">
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" name="nombre_club" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Description</label>
                            <div class="col-sm-12">
                                <textarea type="text" name="desc_club" class="form-control" ></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div style="width: 50%">
                                <label class="col-sm-12 col-form-label">Lat</label>
                                <div class="col-sm-12">
                                    <input type="text" name="latitud_club" class="form-control" value="">
                                </div> 
                            </div>
                            <div style="width: 50%"> 
                                <label class="col-sm-12 col-form-label">Long</label>
                                <div class="col-sm-12">
                                    <input type="text" name="longitud_club" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div style="width: 50%">
                                <label class="col-sm-12 col-form-label">Age min</label>
                                <div class="col-sm-12">
                                    <input type="text" name="edadmin_club" class="form-control" value="">
                                </div>
                            </div>
                            <div style="width: 50%">
                                <label class="col-sm-12 col-form-label">Age max</label>
                                <div class="col-sm-12">
                                    <input type="text" name="edadmax_club" class="form-control" value="">
                                </div> 
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
        <button type="button"  onclick="cn101_f1()" data-bs-dismiss="modal" class="btn btn-warning" >Save </button>
    </div>
    <?php
}

if ($opc_mod == 2) {
    $id = $_POST['dato_1'];
    $tupla = $fn101->fn101_rclub_x($id);
    ?>
    <div class="modal-header">
        <h5 class="modal-title">Edit Club</h5>
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
                                    <input type="text" name="nombre_club" class="form-control" value="<?php echo utf8_encode($tupla[0]['nombre_club']) ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Description</label>
                                <div class="col-sm-12">
                                    <textarea type="text" name="desc_club" class="form-control" ><?php echo utf8_encode($tupla[0]['desc_club']) ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div style="width: 50%">
                                    <label class="col-sm-12 col-form-label">Lat</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="latitud_club" class="form-control" value="<?php echo utf8_encode($tupla[0]['latitud_club']) ?>">
                                    </div> 
                                </div>
                                <div style="width: 50%"> 
                                    <label class="col-sm-12 col-form-label">Long</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="longitud_club" class="form-control" value="<?php echo utf8_encode($tupla[0]['longitud_club']) ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div style="width: 50%">
                                    <label class="col-sm-12 col-form-label">Age min</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="edadmin_club" class="form-control" value="<?php echo utf8_encode($tupla[0]['edadmin_club']) ?>">
                                    </div>
                                </div>
                                <div style="width: 50%">
                                    <label class="col-sm-12 col-form-label">Age max</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="edadmax_club" class="form-control" value="<?php echo utf8_encode($tupla[0]['edadmax_club']) ?>">
                                    </div> 
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
        <button onclick="cn101_f2()" type="button" class="btn btn-warning" data-bs-dismiss="modal">Save changes</button>
    </div>
    <?php
}

if ($opc_mod == 3) {
    $id = $_POST['dato_1'];
    $tupla = $fn101->fn101_ravisos_x($id);
    ?>

    <?php
}

if ($opc_mod == 4) {
    $id = $_POST['dato_1'];
    ?>
    <div class="modal-content" id="content_sm">
        <div class="modal-header">
            <h5 class="modal-title">Delete club</h5>
            <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST" id="frm_delete">
                <input type="hidden" name="dato_0" value="4">
                <input type="hidden" name="dato_1" value="<?php echo $id ?>">
                <label> Are you sure you want to delete this record ?</label>
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">NOT</button>
                <button type="button" onclick="cn101_f7(7, <?php echo $id ?>, -1)"  class="btn btn-primary" data-bs-dismiss="modal">YES</button>
            </form>
        </div>

    </div>
    <?php
}
if ($opc_mod == 5) {
    $id = $_POST['dato_1'];
    $tupla = $fn101->fn101_rclub_x($id);
    ?>
    <div class="modal-header">
        <h5 class="modal-title">Edit Image Club</h5>
        <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
        </button>
    </div>
    <div class="modal-body" id="div_editarimagen">
        <div class="row">
            <div class="col-md-12">
                <div class="basic-form">
                    <form class="form-valide" id="frm_imagen" method="post">
                        <input type="hidden" value="8" name="dato_0">
                        <input type="hidden" value="<?php echo $id ?>" name="dato_1">
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Image ( 396 x 257 )px</label>
                            <!--                                <div class="col-sm-12">
                                                                <img src="../images/<?php echo utf8_encode($tupla[0]['foto_club']) ?>">
                                                            </div>-->
                            <div class="file-loading">
                                <input id="kv-explorer" name="dato_5"  type="file" data-theme="fas">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
        <button onclick="cn101_f8()" type="button" class="btn btn-warning" >Save changes</button>
    </div>
    <script src="js/fileup-v2/js/locales/es.js" type="text/javascript"></script>
    <script src="js/fileup-v2/js/fileinput.js" type="text/javascript"></script>
    <script>
            $(document).ready(function () {
                $("#kv-explorer").fileinput({
                    theme: 'explorer-fas',
                    maxFileSize: 6000,
                    maxFileCount: 1,
                    showUpload: false,
                    allowedFileExtensions: ['jpg', 'png', 'gif'],
                    initialPreviewAsData: true,
                    initialPreview: [
                        "../images/<?php echo utf8_encode($tupla[0]['foto_club']) ?>"
                    ],
                    initialPreviewConfig: [
                        {caption: "<?php echo utf8_encode($tupla[0]['foto_club']) ?>", size: 329892, width: "120px", url: "{$url}", key: 1}
                    ]
                });
            });
    </script>
    <?php
}
if ($opc_mod == 6) {
    ?>
    <!-- Material color picker -->
    <script src="vendor/moment/moment.min.js"></script>
    <script src="vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="js/plugins-init/material-date-picker-init.js"></script>
    <div class="modal-header">
        <h5 class="modal-title">Synchronize</h5>
        <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-valide" id="frm_sinc" method="post">
                        <input type="hidden" value="9" name="dato_0">
                        <div class="form-group row">
                            <div>
                                <label class="col-sm-12 col-form-label">Page</label>
                                <div class="col-sm-12">
                                    <input placeholder="0" type="text" name="page_club" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Limit</label>
                            <div class="col-sm-12">
                                <input placeholder="100" type="text" name="limit_club" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12" id="result_sinc"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
        <button type="button"  onclick="cn101_f9()" class="btn btn-warning" >Synchronize Now </button>
    </div>
    <?php
}
