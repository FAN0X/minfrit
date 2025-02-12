<?php
require './fn/fn-77.php';
$a = new Fn_77();
$tabla = $a->fn77_rrol_all();
?>
<script src="./jsopc/jsopc-77.js"></script>
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Usuarios - Asignar Permisos </h4>
                        <div class="btn-group mb-2">
                            <a href="index.php?opc=77"  class="btn btn-warning light  px-3" >
                                <i class="flaticon-381-repeat-1"></i> <b class="caret m-l-5"></b>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="basic-list-group">
                            <div class="row">
                                <div class="col-lg-6 col-xl-4">
                                    <div class="list-group mb-4 " id="list-tab" role="tablist">
                                        <?php while ($menu = $tabla->fetch_assoc()) { ?>
                                        <a onclick="cn77_d1(1,<?php echo utf8_encode($menu['id_rol']) ?>)" class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-rol" role="tab"><?php echo utf8_encode($menu['nombre_rol']) ?> 
                                                <span style="float: right !important;"  class="fa fa-angle-right"></span>
                                            </a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-8">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="list-rol">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" id="table76">

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