<?php
require './fn/fn-155.php';
$a = new Fn_155();
$tabla = $a->fn155_rusuario_all();

?>
<script src="./jsopc/jsopc-155.js"></script>
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">My subscriptions</h4>
                        <div class="btn-group mb-2">
                            <a href="index.php?opc=155"  class="btn btn-warning light  px-3" >
                                <i class="fa fa-retweet"></i> <b class="caret m-l-5"></b>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="table155">
                            <table id="example3" class="display">
                                <thead>
                                    <tr>
                                        <th>Club</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th>Payments</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($menu = $tabla->fetch_assoc()) {
                                        $st = $menu['estado_usuario'];
                                        $id = $menu['id_usuario'];
                                    ?>
                                        <tr>
                                            <td> <?php echo utf8_encode($menu['nombre_club']) ?></td>
                                            <td> <?php echo utf8_encode($menu['nombre_categoria']) ?> </td>
                                            <td> <?php echo utf8_encode($menu['fecha_suscripcion']) ?> </td>
                                            <td> <button onclick="md155_d2(2,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-dollar-sign"></i></button> </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button onclick="md155_d2(2,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-list"></i></button>
                                                    <button onclick="md155_d4(4,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_sm" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></button>
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