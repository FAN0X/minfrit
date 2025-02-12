<?php
require './fn/fn-27.php';
$a = new Fn_27();
$fechaactual = date('Y-m-d');
$fechaanterior = date("Y-m-d",strtotime($fechaactual."- 30 days")); 
$tabla = $a->fn27_rvivienda_all($idconj_open);
?>
<script src="./jsopc/jsopc-27.js"></script>

<div class="content-body">
    
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gestión - Viviendas </h4>
                        <div class="btn-group mb-2">
                            <a href="index_habitacional.php?opc=27&conf=<?php echo $confirmacion ?>&dato3=<?php echo $idconj_open ?>"  class="btn btn-warning light  px-3" >
                                <i class="fa fa-retweet"></i> <b class="caret m-l-5"></b>
                            </a>
                            <button onclick="md27_r001_d1(1)" type="button" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-primary light  px-3" data-bs-toggle="dropdown">
                                <i class="fa fa-plus"></i> <b class="caret m-l-5"></b>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="table27">
                            <table id="example3" class="display">
                                <thead>
                                    <tr>
                                        <th>No. Departamento</th>
                                        <th style="width: 11%">Piso</th>
                                        <th style="width: 13%">Estado</th>
                                        <th style="width: 11%">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($menu = $tabla->fetch_assoc()) {
                                        $id = $menu['id_vivienda'];
                                        $listhabitantes = $a->fn27_rvivienda_xidall($id);
                                        $txthabitantes = '';
                                        $txtstado = 'LIBRE';
                                        if($listhabitantes->num_rows>0){
                                            while ($habita = $listhabitantes->fetch_assoc()) {
                                                $txthabitantes .= $habita['nombre_usuario'].' '.$habita['apellido_usuario'].', ';
                                            }
                                            $txthabitantes=substr($txthabitantes, 0, -2);
                                            $txthabitantes=' ('.$txthabitantes.')';
                                            $txtstado = 'OCUPADA';
                                        }
                                    ?>
                                        <tr>
                                            <td> <?php echo utf8_encode($menu['num_vivienda'].$txthabitantes) ?></td>
                                            <td> <?php echo utf8_encode($menu['piso_vivienda']) ?> </td>
                                            <td>
                                                <?php echo $txtstado ?>
<!--                                                <select class="form-control" onchange="cn27_u004_d3(4, <?php echo $id ?>, this.value)">
                                                        <option value="0" <?php if($st==0){ echo 'selected';} ?>>LIBRE</option>
                                                        <option value="1" <?php if($st==1){ echo 'selected';} ?>>OCUPADA</option>
                                                    </select>
                                                <div id="fill_<?php echo $id ?>" ></div>-->
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button onclick="md27_r002_d2(2,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-pencil-alt"></i></button>
                                                    <button onclick="md27_r004_d2(4,<?php echo $id ?>)" style="margin-left: 10px" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-check"></i></button>
                                                    <button onclick="md27_d003_d2(3,<?php echo $id ?>)" style="margin-left: 10px" data-bs-toggle="modal" data-bs-target="#modalcontent_sm" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
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