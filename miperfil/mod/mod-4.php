<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
include '../sesiones/opensesion.php';
require '../fn/fn-4.php';
$opc_mod = $_POST['dato_0'];
$a = new Fn_4();


if ($opc_mod == 1) {
    ?>
    <!-- Material color picker -->
    <script src="vendor/moment/moment.min.js"></script>
    <script src="vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="js/plugins-init/material-date-picker-init.js"></script>
    <div class="modal-header">
        <h5 class="modal-title">Nueva Zona Residencial</h5>
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
                                <label class="col-sm-12 col-form-label">Nombre de Conjunto, Edificio o Casa *</label>
                                <div class="col-sm-12">
                                    <input type="text" name="nombre_conjunto" class="form-control" placeholder="Conjunto">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Tipo</label>
                                <div class="col-sm-12">
                                    <select id="id" class="form-control" name="tipozomaresid_conjunto">
                                        <option value="1">Conjunto Habitacional</option>
                                        <option value="2">Edificio</option>
                                        <option value="3">Casa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Número de unidades habitacionales *</label>
                                <div class="col-sm-12">
                                    <input type="text" name="cantidadhab_conjunto" class="form-control" value="1">
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
        <button type="button"  onclick="cn4_c001_f1()"  class="btn btn-warning" >Guardar </button>
    </div>
    <?php
}
if ($opc_mod == 2) {
    $tipo = $_POST['dato_1'];
    $tabconjuntos = $a->fn4_rconjunto_xid($idusu_open,$tipo);
    $txttipo = $a->fn4_rtipo_x($tipo);
    
    ?>
    <!-- Material color picker -->
    <script src="vendor/moment/moment.min.js"></script>
    <script src="vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="js/plugins-init/material-date-picker-init.js"></script>
    <div class="modal-header">
        <h5 class="modal-title"><?php echo $txttipo ?></h5>
        <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="basic-form">
                        <form class="form-valide" id="frm_selecionarc" method="post">
                            <input type="hidden" value="1" name="dato_0">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="table-responsive" id="table4_mod">
                                        <table id="example" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Detalle</th>
                                                    <th style="width: 15%">Unidades habitacionales</th>
                                                    <th style="width: 12%">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if(($tabconjuntos->num_rows)>0){
                                                    while ($menu = $tabconjuntos->fetch_assoc()) {
                                                        $confirmacion = md5($idusu_open.''.$menu['id_empresa'])
                                                ?>
                                                <tr>
                                                    <td> <?php echo $menu['nombre_empresa'] ?></td>
                                                    <td> <?php echo $menu['cantviviendas_empresa'] ?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="index_habitacional.php?opc=51&conf=<?php echo $confirmacion ?>&dato3=<?php echo $menu['id_empresa'] ?>" class="btn btn-warning px-3">IR <i class="fa fa-arrow-right "></i></a>
                                                        </div>												
                                                    </td>												
                                                </tr>
                                                <?php
                                                }}else{
                                                ?>
                                                <tr>
                                                    <td colspan="3"> <center>Aun no ha agregado un reguistro</center></td>
                                                </tr>   
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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
        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cerrar</button>
        <!--<button type="button"  onclick="cn4_f1()" data-bs-dismiss="modal" class="btn btn-warning" >Guardar </button>-->
    </div>
    <script>
        //$('#example3').dataTable();
        $(document).ready(function() {
            $('#example').dataTable( {
                "bPaginate": false,
                "bFilter": false,
                "bInfo": false,
                "searching": false
            } );
        } );
    </script>
    <?php
}
