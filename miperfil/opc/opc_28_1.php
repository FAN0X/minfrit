<?php
require './fn/fn-28.php';
$a = new Fn_28();
$fechaactual = date('Y-m-d');
$fechaanterior = date("Y-m-d",strtotime($fechaactual."- 30 days")); 
$tabla = $a->fn28_rusuario_all($idconj_open);
?>
<script src="./jsopc/jsopc-28.js"></script>

<div class="content-body">
    
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gestión - Usuarios </h4>
                        <div class="btn-group mb-2">
                            <a href="index_habitacional.php?opc=28&conf=<?php echo $confirmacion ?>&dato3=<?php echo $idconj_open ?>"  class="btn btn-warning light  px-3" >
                                <i class="fa fa-retweet"></i> <b class="caret m-l-5"></b>
                            </a>
                            <button onclick="md28_r001_d1(1)" type="button" data-bs-toggle="modal" data-bs-target="#modalcontent_lg" class="btn btn-primary light  px-3" data-bs-toggle="dropdown">
                                <i class="fa fa-plus"></i> <b class="caret m-l-5"></b>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="table28">
                            <table id="example3" class="display">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th style="width: 13%">Teléfono</th>
                                        <th style="width: 10%">No. Departamento</th>
                                        <th style="width: 10%">No. Piso</th>
                                        <th style="width: 13%">Estado</th>
                                        <th style="width: 11%">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($menu = $tabla->fetch_assoc()) {
                                        $id = $menu['id_usuario'];     
                                        $id_usuvivienda = $menu['id_usuvivienda'];  
                                        $st = $menu['estado_usuvivienda'];
                                        $estado = $a->fn28_estado_xid($st);
                                        $_st=1;
                                        $txtcheck = '';
                                        if($st == 1){
                                            $_st=0;
                                            $txtcheck = 'checked';
                                        }
                                        $txthabilitar = '';
                                        if($id == $idusu_open){
                                            $txthabilitar = 'disabled';
                                        }
                                    ?>
                                        <tr>
                                            <td> <?php echo utf8_encode($menu['nombre_usuario'].' '. $menu['apellido_usuario']) ?></td>
                                            <td> <?php echo utf8_encode($menu['tlf1_usuario']) ?> </td>
                                            <td> <?php echo utf8_encode($menu['num_vivienda']) ?> </td>
                                            <td> <?php echo utf8_encode($menu['piso_vivienda']) ?> </td>
                                            <td>
                                                <div id="fill_<?php echo $id_usuvivienda ?>">
                                                        <input value="<?php echo $_st ?>" <?php echo $txtcheck ?> <?php echo $txthabilitar ?>  name="estado" onchange="cn28_u004_d3(4, <?php echo $id_usuvivienda ?>, this.value)" type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id_usuvivienda ?>" required>
                                                        <label class="custom-control-label" for="customCheckBox<?php echo $id_usuvivienda ?>"><?php echo $estado ?></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button onclick="md28_r002_d2(2,<?php echo $id_usuvivienda ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_lg" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-pencil-alt"></i></button>
                                                    <?php 
                                                    if($id != $idusu_open){
                                                    ?>
                                                    <button onclick="md28_d003_d2(3,<?php echo $id_usuvivienda ?>)" style="margin-left: 10px" data-bs-toggle="modal" data-bs-target="#modalcontent_sm" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>												
                                            </td>												
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Md modal  -->
                        <div class="modal fade" id="modalcontent_md">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" id="content_md">
                                </div>
                            </div>
                        </div>
                        <!-- Small modal -->
                        <div class="modal fade bd-example-modal-sm" id="modalcontent_sm" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content" id="content_sm">
                                </div>
                            </div>
                        </div>
                        <!-- lg modal -->
                        <div class="modal fade bd-example-modal-lg" id="modalcontent_lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" id="content_lg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>