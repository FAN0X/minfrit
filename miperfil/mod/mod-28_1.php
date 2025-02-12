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
                                <div class="col-sm-6">
                                    <input type="text" name="nombre_usuario" class="form-control" placeholder="Nombre *">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="apellido_usuario" class="form-control" placeholder="Apellido *">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="text" name="cedula_usuario" class="form-control" placeholder="Cédula *">
                                </div>
                                 <div class="col-sm-6">
                                    <input type="text" name="tlf1_usuario" class="form-control" placeholder="Teléfono *">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="text" name="email_usuario" class="form-control" placeholder="Email *">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Tipo Usuario</label>
                                <div class="col-sm-6">
                                    <select id="id" class="form-control" name="tipo_usuario">
                                        <option value="2">Inquilino</option>
                                        <option value="1">Propietario</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Datos Departamento</label>
                                <hr>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">No. Piso</label>
                                <label class="col-sm-6 col-form-label">No.Departamento</label>
                                <div class="col-sm-6">
                                    <select id="id" class="form-control" onchange="cn28_u005_d3(5,this.value)">
                                        <option value="">SELECCIONE UN PISO</option>
                                        <?php 
                                        while ($detpiso = $pisodepa->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $detpiso['piso_vivienda']; ?>"><?php echo $detpiso['piso_vivienda']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <div id="div_ndepa">
                                        <select id="id" class="form-control">
                                            <option value="0">SELECCIONE UN PISO</option>
                                        </select>
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
    $detusuario = $a->fn28_rusuario_vivienda_xid($id);
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
                                <div class="col-sm-6">
                                    <input type="text" name="nombre_usuario" class="form-control" placeholder="Nombre *" value="<?php echo utf8_encode($detusuario[0]['nombre_usuario']) ?>">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="apellido_usuario" class="form-control" placeholder="Apellido *" value="<?php echo utf8_encode($detusuario[0]['apellido_usuario']) ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="text" name="cedula_usuario" class="form-control" placeholder="Cédula *" value="<?php echo $detusuario[0]['cedula_usuario'] ?>">
                                </div>
                                 <div class="col-sm-6">
                                     <input type="text" name="tlf1_usuario" class="form-control" placeholder="Teléfono *" value="<?php echo $detusuario[0]['tlf1_usuario'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="text" name="email_usuario" class="form-control" placeholder="Email *" value="<?php echo $detusuario[0]['email_usuario'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Tipo Usuario</label>
                                <div class="col-sm-6">
                                    <select id="id" class="form-control" name="tipo_usuario">
                                        <option value="2" <?php if(detusuario[0]['tipo_usuario']==2){ echo 'selected';} ?>>Inquilino</option>
                                        <option value="1" <?php if(detusuario[0]['tipo_usuario']==1){ echo 'selected';} ?>>Propietario</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Datos Departamento</label>
                                <hr>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">No. Piso</label>
                                <label class="col-sm-6 col-form-label">No.Departamento</label>
                                <div class="col-sm-6">
                                    <select id="id" class="form-control" onchange="cn28_u005_d3(5,this.value)">
                                        <option value="0">SELECCIONE UN PISO</option>
                                        <?php 
                                        while ($detpiso = $pisodepa->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $detpiso['piso_vivienda']; ?>" <?php if($detusuario[0]['piso_vivienda']==$detpiso['piso_vivienda']){ echo 'selected';} ?>><?php echo $detpiso['piso_vivienda']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <div id="div_ndepa">
                                        <?php 
                                        $piso_vivienda = $_POST['dato_1'];
                                        $viviendas = $a->fn28_rviviendas_xdepa_all($idconj_open, $detusuario[0]['piso_vivienda']);
                                        ?>
                                        <select class="form-control" name="id_vivienda">
                                            <option value="">SELECCIONE UN PISO</option>
                                            <?php 
                                            while ($detviv = $viviendas->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $detviv['id_vivienda']; ?>" <?php if($detusuario[0]['id_vivienda']==$detviv['id_vivienda']){ echo 'selected';} ?>><?php echo $detviv['num_vivienda']; ?> </option>
                                            <?php } ?>
                                        </select>
                                        <?php
                                        ?>
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

