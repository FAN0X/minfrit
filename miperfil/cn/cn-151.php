<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
require '../fn/fn-151.php';
require '../funciones/fn-alert.php';
include '../sesiones/opensesion.php';
$opc_cn = $_POST['dato_0'];
$a = new Fn_151();
$fnalert = new Fn_alert();

//OPC

if ($opc_cn == -1) {
    $fechadesde = $_POST['fechdesde'];
    $fechaasta = $_POST['fechasta'];
//    $id_usuvivienda = $_POST['id_usuvivienda'];
    $detvivienda = $a->fn151_detingresototal1_xid($fechadesde, $fechaasta, $idconj_open);
    $pagorealizado = $a->fn151_detingresototal2_xid($fechadesde, $fechaasta, $idconj_open);
    $conceptoscobrar = $a->fn151_detingresototal3_xid($fechadesde, $fechaasta, $idconj_open);
    $tabla = $a->fn151_ringresos_all($fechadesde, $fechaasta,$idconj_open);
    $include = 1;
}
if ($opc_cn == 1) {
    $tipo_concepto = utf8_decode($_POST['tipo_concepto']);
    $id_concon = utf8_decode($_POST['id_concon']);
    $tipo_trans = utf8_decode($_POST['tipo_trans']);
    $id_usuvivienda = utf8_decode($_POST['id_usuvivienda']);
    $monto_trans = utf8_decode($_POST['monto_trans']);
    $fecha_trans = utf8_decode($_POST['fecha_trans']);
    $detalle_trans = utf8_decode($_POST['detalle_trans']);
    $repeat = utf8_decode($_POST['repeat']);
    $mora = utf8_decode($_POST['mora']);
    $firstmonth = utf8_decode($_POST['firstmonth']);
    $valor_firstmonth = utf8_decode($_POST['valor_firstmonth']);
    $oberva_trans = utf8_decode($_POST['oberva_trans']);
    
//    echo $fecha_ingreso.'--'.$id_concon.'--'.$id_usuvivienda.'--'.$valor_ingreso.'--'.$repeat.'--'.$mora.'--'.$firstmonth.'--'.$valor_firstmonth;
    if($tipo_concepto==1){
        if($id_concon != 0 && $monto_trans != ''){
            $cuenta = $a->fn151_ctrasanccion_xdata($idconj_open, $id_concon, $id_usuvivienda, $fecha_trans,
                  $tipo_trans, $detalle_trans, $monto_trans, $oberva_trans);
             if($cuenta > 0){
                echo $fnalert->fnalert_save(1);
            } else {
                echo $fnalert->fnalert_save(7);
            }
        } else {
            echo $fnalert->fnalert_required(1);
        }
    }else{
        if($id_concon != 0 && $monto_trans != '' && $repeat > 0 && $mora >= 0 ){

            $aux = 0;
             $sql = "INSERT INTO transaccion(id_empresa, id_concon,id_usuvivienda,fecha_trans ,fechamax__trans ,fechareal_trans,"
                . "tipo_trans ,detalle_trans,documento_trans,monto_trans,saldo_trans,oberva_trans,archivo_trans,"
                . "estado_trans ,sec_trans) values ";
            for ($i = 0; $i < $repeat; $i++) {
                $fecha_trans = date("Y-m-d",strtotime($fecha_trans."+ $i month")); 
                $fechamax__trans = date("Y-m-d",strtotime($fecha_trans."+ $mora days"));
                if($i==0 and $firstmonth == 1){
                    $monto_trans = $valor_firstmonth;
                }else{
                    $monto_trans = $monto_trans;
                }
                 $sql .= " ($idconj_open, $id_concon,$id_usuvivienda,'$fecha_trans' ,'$fechamax__trans' ,'$fecha_trans',"
                . "'$tipo_trans' ,'$detalle_trans','',$monto_trans,0,'$oberva_trans','',"
                . "0 ,0) ,";

            }
            $sql = substr($sql, 0, -1);
            $cuentingreso = $a->fn151_ctrasanccion2_xdata($sql);
            if($cuentingreso > 0){
                echo $fnalert->fnalert_save(1);
            } else {
                echo $fnalert->fnalert_save(7);
            }

        } else {
            echo $fnalert->fnalert_required(1);
        }
    }
}
if ($opc_cn == 2) {
    $id_trans = $_POST['dato_1'];
    $documento_trans = utf8_decode($_POST['documento_trans']);
    $monto_trans= utf8_decode($_POST['monto_trans']);
    $oberva_trans = utf8_decode($_POST['oberva_trans']);
    if($documento_trans != '' && $monto_trans != ''){
        $veriffactura= $a->fn151_rtransaccion_xdata($documento_trans,$id_trans); 
        if(count($veriffactura)==0){
            $cuenta = $a->fn151_utransaccion_xdata($documento_trans, $monto_trans, $oberva_trans, $id_trans);
            if($cuenta==1){
                echo $fnalert->fnalert_save(3);
            } else {
                echo $fnalert->fnalert_save(4);
            }
        } else {
            echo $fnalert->fnalert_repetido(3);
        }
    } else {
        echo $fnalert->fnalert_required(1);
    }
}
if ($opc_cn == 3) {
    $id = $_POST['dato_1'];
    $st = $_POST['dato_2'];
    $verificar = $a->fn151_verifvivienda_xid($id);
    if(count($verificar)==0){
        $cuenta = $a->fn151_uusuario_xest($id, $st);
        if($cuenta==1){
            echo $fnalert->fnalert_delete(1);
        } else {
            echo $fnalert->fnalert_delete(2);
        }
    } else {
        echo $fnalert->fnalert_delete(3);
    }
    $tabla = $a->fn151_rvivienda_all($idconj_open);
    $include = 1;
}

if ($opc_cn == 4) {
    $id = $_POST['dato_1'];
    $st = $_POST['dato_2'];
    $cuenta = $a->fn151_uusuario_xest($id, $st);
    $estado = $a->fn26_estado_xid($st);
    $_st=1;
    $txtcheck = '';
    if($st == 1){
        $_st=0;
        $txtcheck = 'checked';
    }
    if ($cuenta==0) {
        ?>
        <input value="<?php echo $_st ?>" <?php echo $txtcheck ?> name="estado" onchange="cn151_u004_d3(4, <?php echo $id ?>, this.value)" type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id ?>" required>
        <label class="custom-control-label" for="customCheckBox<?php echo $id ?>"><?php echo $estado ?></label>
        <label style="color: red"><i class="fa fa-exclamation"></i></label>
        <?php
    } else {
        ?>
        <input value="<?php echo $_st ?>" <?php echo $txtcheck ?> name="estado" onchange="cn151_u004_d3(4, <?php echo $id ?>, this.value)" type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id ?>" required>
        <label class="custom-control-label" for="customCheckBox<?php echo $id ?>"><?php echo $estado ?></label>
        <label style="color: green"><i class="fa fa-check"></i></label>
        <?php
    }
}

if ($opc_cn == 5) {
    $piso_vivienda = $_POST['dato_1'];
    $viviendas = $a->fn151_rviviendas_xdepa_all($idconj_open, $piso_vivienda);
    ?>
    <select class="form-control" name="id_vivienda" onchange="cn151_u005_d3(5,this.value)">
        <?php 
        while ($detviv = $viviendas->fetch_assoc()) {
        ?>
        <option value="<?php echo $detviv['id_vivienda']; ?>"><?php echo $detviv['num_vivienda']; ?> </option>
        <?php } ?>
    </select>
    <?php
}
if ($opc_cn == 6) {
    $id_usuvivienda = $_POST['id_usuvivienda'];
    $detvivienda = $a->fn151_detingreso1_xid($id_usuvivienda,$idconj_open);
    $pagorealizado = $a->fn151_detingreso2_xid($id_usuvivienda,$idconj_open);
    $conceptoscobrar = $a->fn151_detingreso3_xid($id_usuvivienda,$idconj_open);
    $tabla = $a->fn151_ringresos2_xid_usuvivienda($id_usuvivienda,$idconj_open);
    $include = 2;
}
if ($opc_cn == 7) {
    $archivo = utf8_decode($_FILES['archivo']['name']);
    $separador = $_POST['separador'];
    $dir_subida = '../documentos/';
    $fichero_subido = $dir_subida . basename($_FILES['archivo']['name']);
    //echo $fichero_subido;
    // echo "SEPARADOR: ".$archivo;
    $contador1 = 0;
    if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
        //echo 'Subido correctamente';
        $linea = 0;
        $count_sinidentificar = 0;
        $count_insert = 0;
        $count_inserterror = 0;
        $count_identificados = 0;
        $array_count_updateerror = "";
        $array_count_inserterror = "";
        $array_count_insert = 0;
        $fechaactual = date('Y-m-d H:m:s');
        $tiposeg = "ARCHIVO";
        //Abrimos nuestro archivo
        $archivo = fopen($fichero_subido, "r");
        //Lo recorremos
        $primeroreg = 0;
        $ultimoreg = 0;
        while (($datos = fgetcsv($archivo, 0, $separador)) == true) {
            $num = count($datos);
            $linea++;

            //Recorremos las columnas de esa linea
            //echo "PRIMERO: ".$datos[0].' - '.$datos[1].' - '.$datos[2].' - '.$datos[3].' - '.$datos[4].' - '.$datos[5].' - '.$datos[6].'<br>';
            if ($linea > 1) {

                $consecutivo = trim($datos[0]);
                $codconcepto = trim($datos[8]);
                $fecha = $datos[1];
                $oficina = $datos[2];
                $tipotrans = trim($datos[3]);
                $detalle = $datos[4];
                $documento = $datos[5];
                $documento = trim($documento);
                $monto = $datos[6];
                $saldo = $datos[7];
                if ($monto != "" || $monto != null || $monto != 0) {
                    $monto = str_replace(',', '', $datos[6]);
                    $monto = str_replace('$', '', $monto);
                    $monto = trim($monto);
                } else {
                    $monto = 0;
                }

                if ($saldo != "" || $saldo != null || $saldo != 0) {
                    $saldo = str_replace(',', '', $datos[7]);
                    $saldo = str_replace('$', '', $saldo);
                    $saldo = trim($saldo);
                } else {
                    $saldo = 0;
                }
                if ($codconcepto == "" || $codconcepto == null || $codconcepto == "SIN IDENTIFICAR") {
                    $id_concepto1 = 0;
                }
                $observacion = $datos[9];
                $respaldo = "";
                $estado = 1;
                //echo "PRIMERO: ".$datos[0].' - '.$datos[1].' - '.$datos[2].' - '.$datos[3].' - '.$datos[4].' - '.$monto.' - '.$datos[6].'- '.$datos[7].'<br>';
                // echo "".$saldo."<br>";
//              
                $validadoc = $a->fn4_documento_xid($consecutivo);
                // echo count($validadoc).'<br>';
                if (count($validadoc) == 0) {
                    if ($contador1 == 0) {
                        $primeroreg = $datos[0];
                    }
                    $conceptovalue = $a->fn4_concepto_xid($codconcepto);

                    if ($codconcepto == "" || $codconcepto == "SIN IDENTIFICAR" || count($conceptovalue) == 0) {
                        $id_concepto1 = 0;
                        $count_sinidentificar++;
                    } else {

                        $id_concepto1 = $conceptovalue[0]['id_concepto'];
                        $count_identificados++;
                        $array_count_updateerror++;
                        //echo $codconcepto.'-'.count($conceptovalue).'-'.$conceptovalue[0]['id_concepto'].'<br>';
                    }

                    $cuenta = $a->fn4_ctransaccion_xdata($id_concepto1, $codconcepto, $fecha, $oficina, $tipotrans, $detalle, $documento,
                            $monto, $saldo, $observacion, $respaldo, $estado, $consecutivo);
                    if ($cuenta == 1) {
                        $count_insert++;
                    } else {
                        $count_inserterror++;
                    }
                    $ultimoreg = $datos[0];
                    $contador1++;
                } else {
                    $array_count_insert++;
                }

                //echo $linea . '/ ' . $datos[0] . "<br>";
            }
        }
        //Cerramos el archivo
        fclose($archivo);
        // $cuentaprod = $a->fn4_cseg_xdata($fechaactual, $id_concepto, $tiposeg);
    } else {
        echo '<strong style="color: red">Error al subir el documento</strong><br>' . $_FILES["archivo"]["error"];
    }
    echo '<span style="color:green;">Lineas recorridas' . $linea . "<br></span>";
//    echo '<span style="color:green;"> Transacciones Ingresadas : ' . $count_insert . " <br></span>";
//    echo '<span style="color:green;"> Transacciones no Ingresadas : ' . $count_inserterror . "<br></span>";
//    echo '<span style="color:green;"> Conceptos sin Identificar : ' . $count_sinidentificar . " <br></span>";
//    echo '<span style="color:green;"> Conceptos Identificados : ' . $count_identificados . " <br></span>";
//    echo '<span style="color:green;"> Transacciones repetidas : ' . $array_count_insert . " <br></span>";
    echo '<span style="color:green;"> Registrado desde: ' . $primeroreg . " - Hasta " . $ultimoreg . "  <br></span>";
}

if ($opc_cn == 8) {
    $tipo_concepto = $_POST['dato_1'];
    ?>
    <option value="0">--SELECCIONE CONCEPTO--</option>
    <?php 
    $conseptoegresos = $a->fn151_rconceptos_xtipo($tipo_concepto,$idconj_open);
    while ($menuconcepto = $conseptoegresos->fetch_assoc()) {
    ?>
    <option value="<?php echo $menuconcepto['id_concon'] ?>"><?php echo utf8_encode($menuconcepto['nombre_concepto']) ?></option>
    <?php 
    }
    
}    
if ($opc_cn == 9) {
    $id = $_POST['dato_1'];
    $archivo = utf8_decode($_FILES['file_comprobante']['name']);
    $dir_subida = '../documentos/';
    $fichero_subido = $dir_subida . basename($_FILES['file_comprobante']['name']);
    if (move_uploaded_file($_FILES['file_comprobante']['tmp_name'], $fichero_subido)) {
        $cuenta = $a->fn151_utransaccion_xid($id, $archivo);
        if($cuenta==1){
            ?>
            <script>
            toastr.success("Comprobante guardado correctamente");
            </script>
            <?php
        } else {
            ?>
            <script>
            toastr.error("Ocurrio un error al guardar el comprobante");
            </script>
            <?php
        }
    } else {
        ?>
        <script>
        toastr.error("Ocurrio un error al subir el comprobante");
        </script>
        <?php
    }
    ?>
    <div id="loader" style="display: none">
        <img src="./images/loading-gif-png-4.gif" width="60"><br>
        CARGANDO...
    </div>
    <?php
}

if ($include == 1) {
    ?>
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
        <div class="col-md-6">
            <table class="display" style="width: 100%;">
                <thead>

                    <tr>
                        <th style="border: 1px solid black;">FECHA DESDE</th>
                        <th style="border: 1px solid black;"><?php echo $fechadesde ?></th>
                    </tr>    
                    <tr>    
                        <th style="border: 1px solid black;">FECHA HASTA</th>
                        <th style="border: 1px solid black;"><?php echo $fechaasta ?></th>
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
                <th style="width: 11%">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($menu = $tabla->fetch_assoc()) {
                $id = $menu['id_trans'];                                                                                       
                $st = $menu['estado_trans'];
//                $estado = $a->fn151_estado_xid($st);
                $id_usuvivienda = $menu['id_usuvivienda']; 
                if($id_usuvivienda>0){
                    $dethabitante = $a->fn151_rhabitante_xid($id_usuvivienda);
                }
                $_st=1;
                $txtcheck = '';
                if($st == 1){
                    $_st=0;
                    $txtcheck = 'checked';
                }
//                                        $txttipo = $a->fn151_tipo($menu['tipo_trans ']);
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
                    <td> <?php echo utf8_encode($menu['monto_trans']) ?> </td></td>
                    <td> <?php echo utf8_encode($menu['saldo_trans']) ?> </td></td>
                    <td>
                        <div class="d-flex">
                            <button onclick="md151_r002_d2(2,<?php echo $id ?>)" title="EDITAR REGISTRO" data-bs-toggle="modal" data-bs-target="#modalcontent_lg" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></button>
                        </div>												
                    </td>												
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#example3').dataTable( {
//                    "bPaginate": false,
                "bFilter": false,
//                    "bInfo": false,
                "searching": false
            } );
        } );
    </script>
    
    <?php
}
if ($include == 2) {
    ?>
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
        <div class="col-md-6">
            <table class="display" style="width: 100%;">
                <thead>

                    <tr>
                        <th style="border: 1px solid black;">Nombre</th>
                        <th style="border: 1px solid black;"><?php echo utf8_encode($detvivienda[0]['nombre_usuario'].' '.$detvivienda[0]['apellido_usuario']) ?></th>
                    </tr>    
                    <tr>    
                        <th style="border: 1px solid black;">Cedula</th>
                        <th style="border: 1px solid black;"><?php echo utf8_encode($detvivienda[0]['cedula_usuario']) ?></th>
                    </tr>    
                    <tr>     
                        <th style="border: 1px solid black;">Email</th>
                        <th style="border: 1px solid black;"><?php echo utf8_encode($detvivienda[0]['email_usuario']) ?></th>
                    </tr>   
                    <tr>     
                        <th style="border: 1px solid black;">Celular</th>
                        <th style="border: 1px solid black;"><?php echo utf8_encode($detvivienda[0]['tlf1_usuario']) ?></th>
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
                <th style="width: 11%">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($menu = $tabla->fetch_assoc()) {
                $id = $menu['id_trans'];                                                                                       
                $st = $menu['estado_trans'];
//                $estado = $a->fn151_estado_xid($st);
                $id_usuvivienda = $menu['id_usuvivienda']; 
                if($id_usuvivienda>0){
                    $dethabitante = $a->fn151_rhabitante_xid($id_usuvivienda);
                }
                $_st=1;
                $txtcheck = '';
                if($st == 1){
                    $_st=0;
                    $txtcheck = 'checked';
                }
//                                        $txttipo = $a->fn151_tipo($menu['tipo_trans ']);
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
                    <td> <?php echo utf8_encode($menu['monto_trans']) ?> </td></td>
                    <td> <?php echo utf8_encode($menu['saldo_trans']) ?> </td></td>
                    <td>
                        <div class="d-flex">
                            <button onclick="md151_r002_d2(2,<?php echo $id ?>)" title="EDITAR REGISTRO" data-bs-toggle="modal" data-bs-target="#modalcontent_lg" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></button>
                            
                        </div>												
                    </td>												
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#example3').dataTable( {
//                    "bPaginate": false,
                "bFilter": false,
//                    "bInfo": false,
                "searching": false
            } );
        } );
    </script>
    
    <?php
}
