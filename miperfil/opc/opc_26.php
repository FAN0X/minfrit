<?php
require './fn/fn-26.php';
$a = new Fn_26();
$fechaactual = date('Y-m-d');
$fechaanterior = date("Y-m-d",strtotime($fechaactual."- 30 days")); 
$tabla = $a->fn26_rconcepto_all($idconj_open);
?>
<script src="./jsopc/jsopc-26.js"></script>

<div class="content-body">
    
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gestión - Conceptos </h4>
                        <div class="btn-group mb-2">
                            <a href="index_habitacional.php?opc=26&conf=<?php echo $confirmacion ?>&dato3=<?php echo $idconj_open ?>"  class="btn btn-warning light  px-3" >
                                <i class="fa fa-retweet"></i> <b class="caret m-l-5"></b>
                            </a>
                            <button onclick="md26_r001_d1(1)" type="button" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-primary light  px-3" data-bs-toggle="dropdown">
                                <i class="fa fa-plus"></i> <b class="caret m-l-5"></b>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="table26">
                            <table id="example3" class="display">
                                <thead>
                                    <tr>
                                        <th>Concepto</th>
                                        <th style="width: 11%">Tipo</th>
                                        <th style="width: 13%">Estado</th>
                                        <th style="width: 11%">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($menu = $tabla->fetch_assoc()) {
                                        $id = $menu['id_concon'];
                                        $tipo_concepto = $a->fn26_rtipoconcepto($menu['tipo_concepto']);                                                                                        
                                        $st = $menu['estado_concon'];
                                        $estado = $a->fn26_estado_xid($st);
                                        $_st=1;
                                        $txtcheck = '';
                                        if($st == 1){
                                            $_st=0;
                                            $txtcheck = 'checked';
                                        }
                                    ?>
                                        <tr>
                                            <td> <?php echo utf8_encode($menu['nombre_concepto']) ?></td>
                                            <td> <?php echo utf8_encode($tipo_concepto) ?> </td>
                                            <td>
                                                <div id="fill_<?php echo $id ?>">
                                                        <input value="<?php echo $_st ?>" <?php echo $txtcheck ?>  name="estado" onchange="cn26_u004_d3(4, <?php echo $id ?>, this.value)" type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id ?>" required>
                                                        <label class="custom-control-label" for="customCheckBox<?php echo $id ?>"><?php echo $estado ?></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button onclick="md26_r002_d2(2,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-pencil-alt"></i></button>
                                                    <button onclick="md26_d003_d2(3,<?php echo $id ?>)" style="margin-left: 10px" data-bs-toggle="modal" data-bs-target="#modalcontent_sm" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
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