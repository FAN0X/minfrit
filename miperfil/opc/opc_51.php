<?php
require './fn/fn-51.php';
$a = new Fn_51();
$fechaactual = date('Y-m-d');
$fechaanterior = date("Y-m-d",strtotime($fechaactual."- 30 days")); 
$detvivienda = $a->fn51_detingresototal1_all($idconj_open);
$pagorealizado = $a->fn51_detingresototal2_all($idconj_open);
$conceptoscobrar = $a->fn51_detingresototal3_all($idconj_open);
$tabla = $a->fn51_ringresos1_all($idconj_open);

//$conseptoegresos = $a->fn51_rconceptos_all(0,$idconj_open);
?>
<script src="./jsopc/jsopc-51.js"></script>

<div class="content-body">
    
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Finazas - Transacciones </h4>
                        <div class="btn-group mb-2">
                            <a href="index_habitacional.php?opc=51&conf=<?php echo $confirmacion ?>&dato3=<?php echo $idconj_open ?>"  class="btn btn-warning light  px-3" >
                                <i class="fa fa-retweet"></i> <b class="caret m-l-5"></b>
                            </a>
                            <button onclick="md51_r004_d1(4)" type="button" data-bs-toggle="modal" data-bs-target="#modalcontent_lg" class="btn btn-primary light  px-3" data-bs-toggle="dropdown">
                                <i class="fa fa-upload"></i> <b class="caret m-l-5"></b>
                            </button>
                            <button onclick="md51_r001_d1(1)" type="button" data-bs-toggle="modal" data-bs-target="#modalcontent_lg" class="btn btn-primary light  px-3" data-bs-toggle="dropdown">
                                <i class="fa fa-plus"></i> <b class="caret m-l-5"></b>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <form id="frm_serch"  method="post">
                                    <input type="hidden" value="-1" name="dato_0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="col-md-12">Fecha Desde:</label>
                                            <input type="date" class="form-control" name="fechdesde" value="<?php echo $fechaanterior; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-md-12">Fecha Hasta:</label>
                                            <input type="date" class="form-control" name="fechasta" value="<?php echo $fechaactual; ?>">
                                        </div>
                                        <div class="col-md-12" style="margin-top: 15px;margin-bottom: 15px">
                                            <button onclick="cn51_f1()"  type="button" class="btn btn-primary light  px-3" >
                                                <i class="fa fa-search"></i> Consultar
                                            </button>
                                        </div>
                                        <hr>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form id="frm_serch2"  method="post">
                                    <input type="hidden" value="6" name="dato_0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="col-md-12">Departamento:</label>
                                            <div class="col-md-12">
                                                <select id="id_usuvivienda" class="form-control" name="id_usuvivienda">
                                                    <?php 
                                                    $tablavs = $a->fn51_rusuario_vivienda($idconj_open);
                                                    while ($menuvs = $tablavs->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $menuvs['id_usuvivienda'] ?>"><?php echo utf8_encode($menuvs['num_vivienda'].' - '.$menuvs['nombre_usuario'].' '.$menuvs['apellido_usuario']) ?></option>
                                                    <?php 
                                                    }
                                                    ?>
                                                </select>

                                            </div>

                                        </div>
                                        <div class="col-md-12" style="margin-top: 15px;margin-bottom: 15px">
                                            <button onclick="cn51_r006_f1()"  type="button" class="btn btn-primary light  px-3" >
                                                <i class="fa fa-search"></i> Consultar
                                            </button>
                                        </div>
                                        <hr>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="table-responsive" id="table51">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="display" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th style="border: 1px solid black;">TOTAL DE REGISTROS</th>
                                                <th style="border: 1px solid black;text-align: right"><?php echo $detvivienda[0]['nregistro'] ?></th>
                                            </tr>    
                                            <tr>
                                                <th style="border: 1px solid black;">PAGOS REALIZADOS</th>
                                                <th style="border: 1px solid black;text-align: right">$ <?php echo number_format($pagorealizado, 2) ?></th>
                                            </tr>    
                                            <tr>    
                                                <th style="border: 1px solid black;">CONCEPTOS POR PAGAR</th>
                                                <th style="border: 1px solid black;text-align: right">$ <?php echo number_format($conceptoscobrar, 2) ?></th>
                                            </tr>    
                                            <tr>     
                                                <th style="border: 1px solid black;">
                                                    <strong style="color:red">SALDO PENDIENTE</strong>
                                                </th>
                                                <th style="border: 1px solid black;text-align: right"><strong style="color:red">$ <?php echo number_format($conceptoscobrar-$pagorealizado, 2) ?></strong></th>
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
                                        <th style="width: 13%">Fecha</th>
                                        <th style="width: 10%">Consepto</th>
                                        <th style="width: 10%">Departamento</th>
                                        <th style="width: 10%">Oficina</th>
<!--                                        <th style="width: 13%">Tipo</th>-->
                                        <th style="width: 11%">Documento</th>
                                        <th style="width: 11%">Monto</th>
                                        <th style="width: 11%">Saldo</th>
                                        <th style="width: 11%">Estado</th>
                                        <th style="width: 11%">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($menu = $tabla->fetch_assoc()) {
                                        $id = $menu['id_trans'];                                                                                       
                                        $st = $menu['estado_trans'];
                                        $estado = $a->fn51_estado_xid($st);
                                        $id_usuvivienda = $menu['id_usuvivienda']; 
                                        if($id_usuvivienda>0){
                                            $dethabitante = $a->fn51_rhabitante_xid($id_usuvivienda);
                                        }
                                        $_st=1;
                                        $txtcheck = '';
                                        if($st == 1){
                                            $_st=0;
                                            $txtcheck = 'checked';
                                        }
//                                        $txttipo = $a->fn51_tipo($menu['tipo_trans ']);
                                    ?>
                                        <tr>
                                            <td> <?php echo utf8_encode($menu['fecha_trans']) ?> </td>
                                            <td> <?php echo utf8_encode($menu['nombre_concepto']) ?> </td>
                                            <td> <?php echo utf8_encode($dethabitante[0]['num_vivienda'].' - '.$dethabitante[0]['nombre_usuario'].' '. $dethabitante[0]['apellido_usuario']) ?></td>
                                            <td> </td>
<!--                                            <td> <?php echo $txttipo ?></td>-->
                                            <?php if($menu['archivo_trans']==!''){ ?>
                                            <td> <a href="./documentos/<?php echo utf8_encode($menu['archivo_trans']) ?>" target="_blank"><?php echo utf8_encode($menu['documento_trans']) ?></a></td>
                                            <?php }else{ ?>
                                            <td><?php echo utf8_encode($menu['documento_trans']) ?></td>
                                            <?php } ?>
                                            <td> <?php echo utf8_encode($menu['monto_trans']) ?> </td>
                                            <td> <?php echo utf8_encode($menu['saldo_trans']) ?> </td>
                                            <td>
                                                <?php echo $estado ?>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button onclick="md51_r002_d2(2,<?php echo $id ?>)" title="EDITAR REGISTRO" data-bs-toggle="modal" data-bs-target="#modalcontent_lg" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-edit"></i></button>
                                                    <button onclick="md51_r005_d1(5,<?php echo $id ?>)" data-bs-toggle="modal" style="margin-left: 5px" title="ARCHIVO" data-bs-target="#modalcontent_md" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-upload"></i></button>
                                                    <button onclick="cn51_c010_d1(10,'<?php echo utf8_encode($dethabitante[0]['nombre_usuario'].' '. $dethabitante[0]['apellido_usuario']) ?>')"  style="margin-left: 5px" title="ENVIO DE REGISTRO"  class="btn btn-warning shadow btn-xs sharp mr-1"><i class="flaticon-381-send-1"></i></button>
                                                    <?php 
//                                                    if($dethabitante[0]['tipo_usuario']!=1){
                                                    ?>
                                                    <!--<button onclick="md51_d003_d2(3,<?php echo $id ?>)" style="margin-left: 10px" data-bs-toggle="modal" data-bs-target="#modalcontent_sm" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>-->
                                                    <?php
//                                                    }
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
