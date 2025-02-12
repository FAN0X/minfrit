<?php
require './fn/fn-101.php';
$a = new Fn_101();
$tabla = $a->fn101_rclub_all();

?>
<script src="./jsopc/jsopc-101.js"></script>
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Clubs - Clubs </h4>
                        <div class="btn-group mb-2">
                            <a href="index.php?opc=101"  class="btn btn-warning light  px-3" >
                                <i class="fa fa-retweet"></i> <b class="caret m-l-5"></b>
                            </a>
                            <a onclick="md101_d6(6)" type="button" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-warning light  px-3" >
                                <i class="fa fa-cloud"></i> <b class="caret m-l-5"></b>
                            </a>
                            <button onclick="md101_d1(1)" type="button" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-primary light  px-3" data-toggle="dropdown">
                                <i class="fa fa-plus"></i> <b class="caret m-l-5"></b>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="table101">
                            <table id="example3" class="display">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Estado</th>
                                        <th>Category</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($menu = $tabla->fetch_assoc()) {
                                        $st = $menu['estado_club'];
                                        $id = $menu['id_club'];
                                        $idcategoria = $menu['id_categoria'];
                                        $estado = $a->fn101_estado_xid($st);
                                        $rolactivo = $a->fn101_rcategoria_xid($idcategoria);
                                        $roles = $a->fn101_rrol_all();
                                    ?>
                                        <tr>
                                            <td style="justify-content: center;"> 
                                                <a href="#" onclick="md101_d2(5,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_md" >
                                                    <img style="width: 40px; " src="./images/img-icon.png"> 
                                                </a>
                                            </td>
                                            <td> <?php echo utf8_encode($menu['nombre_club']) ?> </td>
                                            <td> <?php echo utf8_encode($menu['desc_club']) ?> </td>
                                            <td>
                                                <div class="custom-control custom-checkbox mb-3">
                                                    <?php
                                                    if($st == 0){
                                                    ?>
                                                    <input value="1" name="estado" onchange="cn101_f4(4, <?php echo $id ?>, this.value)" type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id ?>" required>
                                                    <label class="custom-control-label" for="customCheckBox<?php echo $id ?>">Inactivo</label>
                                                    <?php
                                                    }else if($st == 1){
                                                    ?>
                                                    <input value="0" name="estado" onchange="cn101_f4(4, <?php echo $id ?>, this.value)" checked type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id ?>" required>
                                                    <label class="custom-control-label" for="customCheckBox<?php echo $id ?>">Activo</label>
                                                    <?php    
                                                    }
                                                    ?>
                                                </div>
                                                <div id="fill_<?php echo $id ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <select onchange="cn101_f6(6,<?php echo $id ?>,this.value)">
                                                    <option value="<?php echo $rolactivo[0]['nombre_categoria'] ?>"><?php echo $rolactivo[0]['nombre_categoria'] ?></option>
                                                    <?php
                                                    while ($detroles = $roles->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $detroles['id_categoria'] ?>"><?php echo $detroles['nombre_categoria'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button onclick="md101_d2(2,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-pencil-alt"></i></button>
                                                    <button onclick="md101_d4(4,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_sm" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></button>
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