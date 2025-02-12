<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
include '../sesiones/opensesion.php';
require '../fn/fn-51.php';
$opc_mod = $_POST['dato_0'];
$a = new Fn_51();
$fechaactual = date('Y-m-d');

if ($opc_mod == 1) {
//    $pisodepa = $a->fn51_rviviendas_xpiso_all($idconj_open);
    
    ?>
    <!-- Material color picker -->
    <script src="vendor/moment/moment.min.js"></script>
    <script src="vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="js/plugins-init/material-date-picker-init.js"></script>
    <div class="modal-header">
        <h5 class="modal-title">Nueva Transacción</h5>
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
                                <label class="col-sm-3 col-form-label">Tipo Concepto *</label>
                                <div class="col-sm-9">
                                    <select id="tipo_concepto" class="form-control" name="tipo_concepto" onchange="cn51_r008_d1(8,this.value)">
                                        <option value="0">INGRESO</option>
                                        <option value="1">EGRESO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Concepto *</label>
                                <div class="col-sm-9">
                                    <select id="id_concon" class="form-control" name="id_concon">
                                        <option value="0">--SELECCIONE CONCEPTO--</option>
                                        <?php 
                                        $conseptoegresos = $a->fn51_rconceptos_xtipo(0,$idconj_open);
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
                                <label class="col-sm-3 col-form-label">Tipo Transacción</label>
                                <div class="col-sm-9">
                                    <select id="tipo_trans" class="form-control" name="tipo_trans">
                                        <option value="C">CRÉDITO</option>
                                        <option value="D">DÉBITO</option>
                                    </select>
                                </div>
                            </div>
                            <div id="i_vivienda">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Vivienda</label>
                                    <div class="col-sm-9">
                                        <select id="id" class="form-control" name="id_usuvivienda">
                                            <?php 
                                            $tablavs = $a->fn51_rusuario_vivienda($idconj_open);
                                            while ($menuvs = $tablavs->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $menuvs['id_usuvivienda'] ?>"><?php echo utf8_encode($menuvs['num_vivienda'].' - '.$menuvs['nombre_usuario'].' '.$menuvs['apellido_usuario']) ?></option>
                                            <?php 
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>    
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Detalles</label>
                                <div class="col-sm-9">
                                    <textarea id="detalle_trans" name="detalle_trans" class="form-control" rows="2" cols="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Monto *</label>
                                 <div class="col-sm-3">
                                    <input type="text" name="monto_trans" class="form-control" >
                                </div>
                                <label class="col-sm-3 col-form-label">Fecha (d/m/y)</label>
                                <div class="col-sm-3">
                                    <input type="date" name="fecha_trans" class="form-control" value="<?php echo $fechaactual ?>">
                                </div>
                            </div>
                            <div id="i_rep_max">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Repetir (Meses)</label>
                                    <div class="col-sm-3">
                                        <select id="id" class="form-control" name="repeat">
                                            <?php 
                                            for ($i = 1;$i <= 24;$i++) {
                                            ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <label class="col-sm-3 col-form-label">Máximo mora (Días)</label>
                                    <div class="col-sm-3">
                                        <select id="id" class="form-control" name="mora">
                                            <?php 
                                            for ($i = 0;$i <= 30;$i++) {
                                            ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>

    <!--                                <label class="col-sm-12 col-form-label">Datos Primer Mes</label>
                                    <div class="col-sm-6">
                                        <input type="checkbox" id="cb_pm" name="firstmonth" value="1" onchange="js51_001_d()">
                                    </div>
                                    <label class="col-sm-12 col-form-label">Monto Primer Mes</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="valor_firstmonth" id="monto_pm" disabled=""  class="form-control" >
                                    </div> -->
                                </div>
                            </div>    
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Observaciones</label>
                                <div class="col-sm-9">
                                    <textarea id="oberva_trans" name="oberva_trans" class="form-control" rows="2" cols="10"></textarea>
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
        <button type="button"  onclick="cn51_c001_f1()"  class="btn btn-warning" >Guardar </button>
    </div>
    <?php
}

if ($opc_mod == 2) {
    $id = $_POST['dato_1'];
    $detingreso = $a->fn51_rtransaccion_xid($id);
    ?>
    <!-- Material color picker -->
    <script src="vendor/moment/moment.min.js"></script>
    <script src="vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="js/plugins-init/material-date-picker-init.js"></script>
    <div class="modal-header">
        <h5 class="modal-title">Detalle Ingreso</h5>
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
                                <label class="col-sm-4 col-form-label">Departamento:</label>
                                <label class="col-sm-4 col-form-label">Fecha:</label>
                                <label class="col-sm-4 col-form-label">Fecha Maxima:</label>
                                <div class="col-sm-4">
                                    <?php echo $detingreso[0]['num_vivienda'] ?>
                                </div>
                                
                                <div class="col-sm-4">
                                    <?php echo $fechaactual ?>
                                </div>
                                <div class="col-sm-4">
                                    <?php echo $detingreso[0]['fechmax_ingreso'] ?>
                                </div>
                                <label class="col-sm-3 col-form-label">Usuario: </label>
                                <div class="col-sm-9">
                                    <?php echo utf8_encode($detingreso[0]['nombre_usuario'].' '.$detingreso[0]['apellido_usuario']) ?>
                                </div>
                                
                                <label class="col-sm-3 col-form-label">Concepto:</label>
                                <div class="col-sm-9">
                                    <?php echo utf8_encode($detingreso[0]['nombre_concepto']) ?>
                                </div>
                                
                                <label class="col-sm-6 col-form-label">Factura *</label>
                                <label class="col-sm-6 col-form-label">Valor *</label>
                                <div class="col-sm-6">
                                    <?php if($detingreso[0]['estado_ingreso']==0){ ?>
                                    <input type="text" name="documento_trans" class="form-control" value="<?php echo $detingreso[0]['documento_trans'] ?>">
                                    <?php }else{ ?>
                                    <?php echo $detingreso[0]['documento_trans'] ?>
                                    <?php } ?>
                                </div>
                                
                                <div class="col-sm-6">
                                    <?php if($detingreso[0]['estado_ingreso']==0){ ?>
                                    <input type="text" readonly="" name="monto_trans" class="form-control" value="<?php echo $detingreso[0]['monto_trans'] ?>">
                                    <?php }else{ ?>
                                    <?php echo $detingreso[0]['valor_ingreso'] ?>
                                    <?php } ?>
                                </div>
                                <label class="col-sm-12 col-form-label">Observaciones</label>
                                <div class="col-sm-12">
                                    <?php if($detingreso[0]['estado_ingreso']==0){ ?>
                                    <textarea id="id" name="oberva_trans" rows="3" cols="10" class="form-control"><?php echo $detingreso[0]['oberva_trans'] ?></textarea>
                                    <?php }else{ ?>
                                    <?php echo $detingreso[0]['oberva_trans'] ?>
                                    <?php } ?>
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
        <?php if($detingreso[0]['estado_ingreso']==0){ ?>
        <button type="button"  onclick="cn51_u002_f1()"  class="btn btn-warning" >Guardar </button>
        <?php } ?>
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
                <button type="button" onclick="cn51_u003_d3(3, <?php echo $id ?>, -1)"  class="btn btn-primary" data-bs-dismiss="modal">SI</button>
            </form>
        </div>

    </div>
    <?php
}
if ($opc_mod == 4) {
    ?>
    <!-- Material color picker -->
    <script src="vendor/moment/moment.min.js"></script>
    <script src="vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="js/plugins-init/material-date-picker-init.js"></script>
    <div class="modal-header">
        <h5 class="modal-title">Documento a Importar</h5>
        <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form class="form-valide" id="frm_editar" method="post">
            <input type="hidden" name="dato_0" value="7">
            <div class="row">
                <div class="col-md-12">
                    <div class="basic-form">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Documento Ejemplo</label>
                            <div class="col-sm-9">
                                <a href="./documentos/ejemplo/saldo002.csv" target="_blank">CLICK AQUÍ PARA DESCARGAR EJEMPLO</a><br>
                                <span style="color: red">Si algunas lineas no se ingresan, volver a importar solamente esas líneas</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Documento a subir</label>
                            <div class="col-sm-9">
                                <input type="file" name="archivo" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Separador</label>
                            <div class="col-sm-9">
                                <select name="separador" class="form-control" >
                                    <option value=","> , ( COMA )</option>
                                    <option value=";"> ; ( PUNTO Y COMA )</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12 text-center" id="div_editar">
                    <div id="loader" style="display: none">
                        <img src="./images/loading-gif-png-4.gif" width="60"><br>
                        CARGANDO...
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cerrar</button>
        <button type="button"  onclick="cn51_r007_d1()"  class="btn btn-warning" >Guardar </button>
    </div>
    <?php
}
if ($opc_mod == 5) {
    $id = $_POST['dato_1'];
    $detrasaccion = $a->fn51_rtransaccion_xid($id);
    ?>
    <div class="modal-content" id="content_sm">
        <div class="modal-header">
            <h5 class="modal-title">Archivo</h5>
            <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST" id="frm_upload">
                <input type="hidden" name="dato_0" value="9">
                <input type="hidden" name="dato_1" value="<?php echo $id ?>">
                <label> <b>Tamaño máximo del archivo 2mb</b></label><br>
                <?php if($detrasaccion[0]['archivo_trans']!=''){ ?>
                <label> <?php echo $detrasaccion[0]['archivo_trans'] ?></label>
                <?php }else{?>
                <label> SIN COMPROBANTE</label>
                <?php }?>
                
                <input type="file" name="file_comprobante" class="form-control" style="height: 35px">
            </form>
            <div class="row">
                <div class="col-md-12 text-center" id="div_loader">
                    <div id="loader" style="display: none">
                        <img src="./images/loading-gif-png-4.gif" width="60"><br>
                        CARGANDO...
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Salir</button>
            <button type="button" onclick="cn51_r009_f();"  class="btn btn-primary" >Guardar</button>
        </div>

    </div>
    <?php
}

