<?php
require './fn/fn-52.php';
$a = new Fn_52();
$fechaactual = date('Y-m-d');
$fechaanterior = date("Y-m-d",strtotime($fechaactual."- 30 days")); 
$tabla = $a->fn52_regresos2_all($idconj_open);
$conseptoegresos = $a->fn52_rconceptos_all(1,$idconj_open);
$dettotales = $a->fn52_regresos_totales($idconj_open);
?>
<script src="./jsopc/jsopc-52.js"></script>

<div class="content-body">
    
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Finanzas - Egresos </h4>
                        <div class="btn-group mb-2">
                            <a href="index_habitacional.php?opc=52&conf=<?php echo $confirmacion ?>&dato3=<?php echo $idconj_open ?>"  class="btn btn-warning light  px-3" >
                                <i class="fa fa-retweet"></i> <b class="caret m-l-5"></b>
                            </a>
                            <button onclick="md52_r001_d1(1)" type="button" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-primary light  px-3" data-bs-toggle="dropdown">
                                <i class="fa fa-plus"></i> <b class="caret m-l-5"></b>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="frm_serch"  method="post">
                            <input type="hidden" value="1" name="dato_0">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="col-md-12">Fecha Desde:</label>
                                    <input type="date" class="form-control" name="fechdesde" value="<?php echo $fechaanterior; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-12">Fecha Hasta:</label>
                                    <input type="date" class="form-control" name="fechasta" value="<?php echo $fechaactual; ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="col-md-12">Gastos:</label>
                                    <div class="col-md-12">
                                        <select id="id" class="form-control" name="gasto">
                                            <?php 
                                            
                                            while ($menuconcepto = $conseptoegresos->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $menuconcepto['id_concepto'] ?>"><?php echo utf8_encode($menuconcepto['nombre_concepto']) ?></option>
                                            <?php 
                                            }
                                            ?>
                                        </select>

                                    </div>

                                </div>
                                <div class="col-md-12" style="margin-top: 15px;margin-bottom: 15px">
                                    <button onclick="cn52_c001_f1()"  type="button" class="btn btn-primary light  px-3" >
                                        <i class="fa fa-search"></i> Consultar
                                    </button>
                                </div>
                                <hr>
                            </div>
                        </form>
                        
                        <div class="table-responsive" id="table52">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="display" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th style="border: 1px solid black;">TOTAL DE REGISTROS</th>
                                                <th style="border: 1px solid black;;text-align: right"><?php echo $dettotales[0]['nregistros'] ?></th>
                                            </tr>    
                                            <tr>
                                                <th style="border: 1px solid black;">TOTAL</th>
                                                <th style="border: 1px solid black;text-align: right">$ <?php echo number_format($dettotales[0]['total'], 2) ?></th>
                                            </tr>    
                                        </thead>
                                    </table>
                                </div>
                                
                            </div>  
                            <br>
                            <br>
                            <table id="example3" class="display">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Consepto</th>
                                        <th>Documento</th>
                                        <th>Detalle</th>
                                        <th>Monto</th>
                                        <th>Saldo</th>
                                        <th style="width: 13%">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($menu = $tabla->fetch_assoc()) {
                                        $id = $menu['id_egreso'];
                                    ?>
                                        <tr>
                                            <td> <?php echo utf8_encode($menu['fecha_egreso']) ?></td>
                                            <td> <?php echo utf8_encode($menu['nombre_concepto']) ?> </td>
                                            <td> <?php echo utf8_encode($menu['numfactura_egreso']) ?> </td>
                                            <td> <?php echo utf8_encode($menu['detalle_egreso']) ?> </td>
                                            <td> <?php echo utf8_encode($menu['valor_egreso']) ?> </td>
                                            <td> <?php echo utf8_encode($menu['valor_egreso']) ?> </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button onclick="md52_r002_d2(2,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_md" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-pencil-alt"></i></button>
                                                    <!--<button onclick="md52_d4(4,<?php echo $id ?>)" style="margin-left: 10px" data-bs-toggle="modal" data-bs-target="#modalcontent_sm" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>-->
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