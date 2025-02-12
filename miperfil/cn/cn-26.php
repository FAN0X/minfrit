<?php
session_start();
include '../config.php';
require '../controlador/conexion.php';
require '../fn/fn-26.php';
require '../funciones/fn-alert.php';
include '../sesiones/opensesion.php';
$opc_cn = $_POST['dato_0'];
$a = new Fn_26();
$fnalert = new Fn_alert();

//OPC

if ($opc_cn == -1) {
    $tabla = $a->fn26_rconcepto_all($idconj_open);
    $include = 1;
}
if ($opc_cn == 1) {
    $nombre_concepto = utf8_decode($_POST['nombre_concepto']);
    $newnombre_concepto= utf8_decode($_POST['newnombre_concepto']);
    $desc_concepto = utf8_decode($_POST['desc_concepto']);
    $tipo_concepto = $_POST['tipo_concepto'];
    $periodo_concon = $_POST['periodo_concon'];
    $valorestandar_concon = $_POST['valorestandar_concon'];
    $valormaximo_concon = $_POST['valormaximo_concon'];
    
    if($nombre_concepto != '0'){
        $verifconsepto = $a->fn26_rconcepto_xnombre($nombre_concepto,$tipo_concepto); 
        if(count($verifconsepto)==0){
            $id_concepto = $a->fn26_cconcepto_xdata($nombre_concepto, $nombre_concepto, $tipo_concepto,$idconj_open);
            if($id_concepto > 0){
                $cuentadesc = $a->fn26_cconcepto_conjunto_xdata($id_concepto, $periodo_concon, $valorestandar_concon, $valormaximo_concon, $idconj_open);
                if($cuentadesc==1){
                    echo $fnalert->fnalert_save(1);
                } else {
                    echo $fnalert->fnalert_save(2);
                }
            } else {
                echo $fnalert->fnalert_save(2);
            }
        } else {
            $verifconcepto_conjunto  = $a->fn26_rconcepto_conjunto_xid($verifconsepto[0]['id_concepto'], $idconj_open);
            if(count($verifconcepto_conjunto)== 0){
                $cuentadesc = $a->fn26_cconcepto_conjunto_xdata($verifconsepto[0]['id_concepto'], $periodo_concon, $valorestandar_concon, $valormaximo_concon, $idconj_open);
                if($cuentadesc==1){
                    echo $fnalert->fnalert_save(1);
                } else {
                    echo $fnalert->fnalert_save(2);
                }
            } else {
                echo $fnalert->fnalert_repetido(2);
            }
            
        }
    
    } else {
        
        if($newnombre_concepto != ''){
            $verifconsepto = $a->fn26_rconcepto_xnombre($newnombre_concepto,$tipo_concepto); 
            if(count($verifconsepto)==0){
                $id_concepto = $a->fn26_cconcepto_xdata($newnombre_concepto, $desc_concepto, $tipo_concepto,$idconj_open);
                if($id_concepto > 0){
                    $cuentadesc = $a->fn26_cconcepto_conjunto_xdata($id_concepto, $periodo_concon, $valorestandar_concon, $valormaximo_concon, $idconj_open);
                    if($cuentadesc==1){
                        echo $fnalert->fnalert_save(1);
                    } else {
                        echo $fnalert->fnalert_save(2);
                    }
                } else {
                    echo $fnalert->fnalert_save(2);
                }
            } else {
                $verifconcepto_conjunto  = $a->fn26_rconcepto_conjunto_xid($verifconsepto[0]['id_concepto'], $idconj_open);
                if(count($verifconcepto_conjunto)== 0){
                    $cuentadesc = $a->fn26_cconcepto_conjunto_xdata($verifconsepto[0]['id_concepto'], $periodo_concon, $valorestandar_concon, $valormaximo_concon, $idconj_open);
                    if($cuentadesc==1){
                        echo $fnalert->fnalert_save(1);
                    } else {
                        echo $fnalert->fnalert_save(2);
                    }
                } else {
                    echo $fnalert->fnalert_repetido(2);
                }

            }
        } else {
            echo $fnalert->fnalert_required(1);
        }
        
    }
}
if ($opc_cn == 2) {
    $id_concepto = $_POST['dato_1'];
    $periodo_concon = utf8_decode($_POST['periodo_concon']);
    $valorestandar_concon= utf8_decode($_POST['valorestandar_concon']);
    $valormaximo_concon = utf8_decode($_POST['valormaximo_concon']);
    
    $cuenta = $a->fn26_uconcepto_conjunto_xdata($periodo_concon, $valorestandar_concon, $valormaximo_concon, $id_concepto);
    if($cuenta==1){
        echo $fnalert->fnalert_save(3);
    } else {
        echo $fnalert->fnalert_save(4);
    }
}
if ($opc_cn == 3) {
    $id = $_POST['dato_1'];
    $st = $_POST['dato_2'];
    $cuenta = $a->fn26_rconcepto_conjunto_xest($id, $st);
    if($cuenta==1){
        echo $fnalert->fnalert_delete(1);
    } else {
        echo $fnalert->fnalert_delete(2);
    }
    $tabla = $a->fn26_rconcepto_all($idconj_open);
    $include = 1;
}

if ($opc_cn == 4) {
    $id = $_POST['dato_1'];
    $st = $_POST['dato_2'];
    $cuenta = $a->fn26_rconcepto_conjunto_xest($id, $st);
    $estado = $a->fn26_estado_xid($st);
    $_st=1;
    $txtcheck = '';
    if($st == 1){
        $_st=0;
        $txtcheck = 'checked';
    }
    if ($cuenta==0) {
        ?>
        <input value="<?php echo $_st ?>" <?php echo $txtcheck ?> name="estado" onchange="cn26_u004_d3(4, <?php echo $id ?>, this.value)" type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id ?>" required>
        <label class="custom-control-label" for="customCheckBox<?php echo $id ?>"><?php echo $estado ?></label>
        <label style="color: red"><i class="fa fa-exclamation"></i></label>
        <?php
    } else {
        ?>
        <input value="<?php echo $_st ?>" <?php echo $txtcheck ?> name="estado" onchange="cn26_u004_d3(4, <?php echo $id ?>, this.value)" type="checkbox" class="custom-control-input" id="customCheckBox<?php echo $id ?>" required>
        <label class="custom-control-label" for="customCheckBox<?php echo $id ?>"><?php echo $estado ?></label>
        <label style="color: green"><i class="fa fa-check"></i></label>
        <?php
    }
    
}

if ($include == 1) {
    ?>
    <table id="example3" class="display">
        <thead>
            <tr>
                <th>Concepto</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th style="width: 13%">Acción</th>
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
