<?php
require './fn/fn-78.php';
$a = new Fn_78();
$tabla = $a->fn78_rroles_all();
?>
<script src="./jsopc/jsopc-78.js"></script>
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Panel de Usuario - Roles </h4>
                        <div class="btn-group mb-2">
                            <a href="index.php?opc=78"  class="btn btn-warning light  px-3" >
                                <i class="fa fa-retweet"></i> <b class="caret m-l-5"></b>
                            </a>
                            <button onclick="md78_d1(1)" type="button" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-primary light  px-3" data-bs-toggle="dropdown">
                                <i class="fa fa-plus"></i> <b class="caret m-l-5"></b>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="table78">
                            <table id="example3" class="display">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Permiso</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($menu = $tabla->fetch_assoc()) {
                                        $st = $menu['estado_rol'];
                                        $id = $menu['id_rol'];
                                        $estado = $a->fn78_estado_xid($st);
                                    ?>
                                        <tr>
                                            <td> <?php echo utf8_encode($menu['nombre_rol']) ?></td>
                                            <td> <?php echo utf8_encode($menu['permiso_rol']) ?> </td>
                                            <td>
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <?php
                                                        if($st == 0){
                                                        ?>
                                                        <input value="1" name="estado" onchange="cn78_f4(4, <?php echo $id ?>, this.value)" type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id ?>" required>
                                                        <label class="custom-control-label" for="customCheckBox<?php echo $id ?>">Inactivo</label>
                                                        <?php
                                                        }else if($st == 1){
                                                        ?>
                                                        <input value="0" name="estado" onchange="cn78_f4(4, <?php echo $id ?>, this.value)" checked type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id ?>" required>
                                                        <label class="custom-control-label" for="customCheckBox<?php echo $id ?>">Activo</label>
                                                        <?php    
                                                        }
                                                        ?>
                                                    </div>
                                                <div id="fill_<?php echo $id ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button onclick="md78_d2(2,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-pencil-alt"></i></button>
                                                    <button onclick="md78_d4(4,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_sm" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
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