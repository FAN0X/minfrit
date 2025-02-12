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
                        <h4 class="card-title">Gestión - Habitantes </h4>
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
                                        <th style="width: 10%">Departamentos Asignados</th>
                                        <th style="width: 11%">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($menu = $tabla->fetch_assoc()) {
                                        $id = $menu['id_usuario'];     
                                        $id_usuemp = $menu['id_usuemp'];  
                                        $listviviendas = $a->fn28_rusuario_vivienda($idconj_open, $id_usuemp);
                                        $txtviviendas = '';
                                        while ($viv = $listviviendas->fetch_assoc()) {
                                            $txtviviendas = $viv['num_vivienda'].',';
                                        }
                                        $txtviviendas=substr($txtviviendas, 0, -1);
                                    ?>
                                        <tr>
                                            <td> <?php echo utf8_encode($menu['nombre_usuario'].' '. $menu['apellido_usuario']) ?></td>
                                            <td> <?php echo utf8_encode($menu['tlf1_usuario']) ?> </td>
                                            <td> <?php echo utf8_encode($txtviviendas) ?> </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button onclick="md28_r002_d2(2,<?php echo $id_usuemp ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_lg" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-pencil-alt"></i></button>
                                                    <?php 
                                                    if($id != $idusu_open){
                                                    ?>
                                                    <button onclick="md28_d003_d2(3,<?php echo $id_usuemp ?>)" style="margin-left: 10px" data-bs-toggle="modal" data-bs-target="#modalcontent_sm" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
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