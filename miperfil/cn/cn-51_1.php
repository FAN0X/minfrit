<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
require '../fn/fn-51.php';
require '../funciones/fn-alert.php';
include '../sesiones/opensesion.php';
$opc_cn = $_POST['dato_0'];
$a = new Fn_51();
$fnalert = new Fn_alert();

//OPC

if ($opc_cn == -1) {
    $fechadesde = $_POST['fechdesde'];
    $fechaasta = $_POST['fechasta'];
//    $id_usuvivienda = $_POST['id_usuvivienda'];
    $detvivienda = $a->fn51_detingresototal1_xid($fechadesde, $fechaasta, $idconj_open);
    $pagorealizado = $a->fn51_detingresototal2_xid($fechadesde, $fechaasta, $idconj_open);
    $conceptoscobrar = $a->fn51_detingresototal3_xid($fechadesde, $fechaasta, $idconj_open);
    $tabla = $a->fn51_ringresos_all($fechadesde, $fechaasta,$idconj_open);
    $include = 1;
}
if ($opc_cn == 1) {
    $fecha_ingreso = utf8_decode($_POST['fecha_ingreso']);
    $id_concon = utf8_decode($_POST['id_concon']);
    $id_usuvivienda = utf8_decode($_POST['id_usuvivienda']);
    $valor_ingreso = utf8_decode($_POST['valor_ingreso']);
    $repeat = utf8_decode($_POST['repeat']);
    $mora = utf8_decode($_POST['mora']);
    $firstmonth = utf8_decode($_POST['firstmonth']);
    $valor_firstmonth = utf8_decode($_POST['valor_firstmonth']);
    
    
//    echo $fecha_ingreso.'--'.$id_concon.'--'.$id_usuvivienda.'--'.$valor_ingreso.'--'.$repeat.'--'.$mora.'--'.$firstmonth.'--'.$valor_firstmonth;
    if($id_concon != 0 && $valor_ingreso != '' && $repeat > 0 && $mora >= 0 ){
         
        $aux = 0;
         $sql = "insert into ingreso (id_concon,valor_ingreso,fecha_ingreso,fechmax_ingreso,id_usuvivienda) values ";
        for ($i = 0; $i < $repeat; $i++) {
            $fecha_ingreso = date("Y-m-d",strtotime($fecha_ingreso."+ $i month")); 
            $fechmax_ingreso = date("Y-m-d",strtotime($fecha_ingreso."+ $mora days"));
            if($i==0 and $firstmonth == 1){
                $valor_ingreso = $valor_firstmonth;
            }else{
                $valor_ingreso = $valor_ingreso;
            }
             $sql .= " ($id_concon,$valor_ingreso,'$fecha_ingreso','$fechmax_ingreso',$id_usuvivienda) ,";

        }
        $sql = substr($sql, 0, -1);
        $cuentingreso = $a->fn51_cingreso_xdata($sql);
        if($cuentingreso > 0){
            echo $fnalert->fnalert_save(1);
        } else {
            echo $fnalert->fnalert_save(7);
        }
         
    } else {
        echo $fnalert->fnalert_required(1);
    }
}
if ($opc_cn == 2) {
    $id_ingreso = $_POST['dato_1'];
    $numfactura_ingreso = utf8_decode($_POST['numfactura_ingreso']);
    $valor_ingreso= utf8_decode($_POST['valor_ingreso']);
    $obs_ingreso = utf8_decode($_POST['obs_ingreso']);
    if($numfactura_ingreso != '' && $valor_ingreso != ''){
        $veriffactura= $a->fn51_ringresoxdata($numfactura_ingreso,$id_ingreso); 
        if(count($veriffactura)==0){
            $cuenta = $a->fn51_uingreso_xdata($numfactura_ingreso, $valor_ingreso, $obs_ingreso, $id_ingreso);
            if($cuenta==1){
                $datfinanza = $a->fn51_rfinanza();
                $saldoactual = $datfinanza[0]['saldoactual_finanza']+$valor_ingreso;
                if($datfinanza[0]['saldoactual_finanza']!=''){
                    $saldoanterior = $datfinanza[0]['saldoactual_finanza'];
                }else{
                    $saldoanterior = 0;
                }
                
                $seguimiento = $a->fn51_rfinanza_xdata(' ', $obs_ingreso, 1, $valor_ingreso, $saldoanterior, $saldoactual, $numfactura_ingreso);
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
    $verificar = $a->fn51_verifvivienda_xid($id);
    if(count($verificar)==0){
        $cuenta = $a->fn51_uusuario_xest($id, $st);
        if($cuenta==1){
            echo $fnalert->fnalert_delete(1);
        } else {
            echo $fnalert->fnalert_delete(2);
        }
    } else {
        echo $fnalert->fnalert_delete(3);
    }
    $tabla = $a->fn51_rvivienda_all($idconj_open);
    $include = 1;
}

if ($opc_cn == 4) {
    $id = $_POST['dato_1'];
    $st = $_POST['dato_2'];
    $cuenta = $a->fn51_uusuario_xest($id, $st);
    $estado = $a->fn26_estado_xid($st);
    $_st=1;
    $txtcheck = '';
    if($st == 1){
        $_st=0;
        $txtcheck = 'checked';
    }
    if ($cuenta==0) {
        ?>
        <input value="<?php echo $_st ?>" <?php echo $txtcheck ?> name="estado" onchange="cn51_u004_d3(4, <?php echo $id ?>, this.value)" type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id ?>" required>
        <label class="custom-control-label" for="customCheckBox<?php echo $id ?>"><?php echo $estado ?></label>
        <label style="color: red"><i class="fa fa-exclamation"></i></label>
        <?php
    } else {
        ?>
        <input value="<?php echo $_st ?>" <?php echo $txtcheck ?> name="estado" onchange="cn51_u004_d3(4, <?php echo $id ?>, this.value)" type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id ?>" required>
        <label class="custom-control-label" for="customCheckBox<?php echo $id ?>"><?php echo $estado ?></label>
        <label style="color: green"><i class="fa fa-check"></i></label>
        <?php
    }
}

if ($opc_cn == 5) {
    $piso_vivienda = $_POST['dato_1'];
    $viviendas = $a->fn51_rviviendas_xdepa_all($idconj_open, $piso_vivienda);
    ?>
    <select class="form-control" name="id_vivienda" onchange="cn51_u005_d3(5,this.value)">
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
    $detvivienda = $a->fn51_detingreso1_xid($id_usuvivienda,$idconj_open);
    $pagorealizado = $a->fn51_detingreso2_xid($id_usuvivienda,$idconj_open);
    $conceptoscobrar = $a->fn51_detingreso3_xid($id_usuvivienda,$idconj_open);
    $tabla = $a->fn51_ringresos2_xid_usuvivienda($id_usuvivienda,$idconj_open);
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
                <th style="width: 13%">Tipo</th>
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
                $id = $menu['id_ingreso'];                                                                                       
                $st = $menu['estado_ingreso'];
                $estado = $a->fn51_estado_xid($st);
                $_st=1;
                $txtcheck = '';
                if($st == 1){
                    $_st=0;
                    $txtcheck = 'checked';
                }
            ?>
                <tr>
                    <td> <?php echo utf8_encode($menu['fecha_ingreso']) ?> </td>
                    <td> <?php echo utf8_encode($menu['nombre_concepto']) ?> </td>
                    <td> <?php echo utf8_encode($menu['num_vivienda'].' - '.$menu['nombre_usuario'].' '. $menu['apellido_usuario']) ?></td>
                    <td> </td>
                    <td> </td>
                    <td> <?php echo utf8_encode($menu['documento_ingreso']) ?> </td></td>
                    <td> <?php echo utf8_encode($menu['valor_ingreso']) ?> </td></td>
                    <td> </td>
                    <td>
                        <?php echo $estado ?>
                    </td>
                    <td>
                        <div class="d-flex">
                            <button onclick="md51_r002_d2(2,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_lg" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></button>
                            <?php 
                            if($menu['tipo_usuario']!=1){
                            ?>
                            <button onclick="md51_d003_d2(3,<?php echo $id ?>)" style="margin-left: 10px" data-bs-toggle="modal" data-bs-target="#modalcontent_sm" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
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
    <table id="example" class="display">
        <thead>
            <tr>
                <th style="width: 13%">Fecha</th>
                <th style="width: 10%">Consepto</th>
                <th style="width: 10%">Departamento</th>
                <th style="width: 10%">Oficina</th>
                <th style="width: 13%">Tipo</th>
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
                $id = $menu['id_ingreso'];                                                                                       
                $st = $menu['estado_ingreso'];
                $estado = $a->fn51_estado_xid($st);
                $_st=1;
                $txtcheck = '';
                if($st == 1){
                    $_st=0;
                    $txtcheck = 'checked';
                }
            ?>
                <tr>
                    <td> <?php echo utf8_encode($menu['fecha_ingreso']) ?> </td>
                    <td> <?php echo utf8_encode($menu['nombre_concepto']) ?> </td>
                    <td> <?php echo utf8_encode($menu['num_vivienda'].' - '.$menu['nombre_usuario'].' '. $menu['apellido_usuario']) ?></td>
                    <td> </td>
                    <td> </td>
                    <td> <?php echo utf8_encode($menu['documento_ingreso']) ?> </td></td>
                    <td> <?php echo utf8_encode($menu['valor_ingreso']) ?> </td></td>
                    <td> </td>
                    <td>
                        <?php echo $estado ?>
                    </td>
                    <td>
                        <div class="d-flex">
                            <button onclick="md51_r002_d2(2,<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#modalcontent_lg" class="btn btn-warning shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></button>
                            <?php 
                            if($menu['tipo_usuario']!=1){
                            ?>
                            <button onclick="md51_d003_d2(3,<?php echo $id ?>)" style="margin-left: 10px" data-bs-toggle="modal" data-bs-target="#modalcontent_sm" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
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
    <script>
        $(document).ready(function() {
            $('#example').dataTable( {
//                    "bPaginate": false,
                "bFilter": false,
//                    "bInfo": false,
                "searching": false
            } );
        } );
    </script>
    
    <?php
}
