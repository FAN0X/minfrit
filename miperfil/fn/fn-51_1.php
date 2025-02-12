<?php
class Fn_51 {
    function fn51_ringresos1_all($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM  ingreso  i,  concepto c, concepto_conjunto cc , usuario_vivienda uv , vivienda v , usuario u  "
                . "WHERE i.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and i.id_usuvivienda = uv.id_usuvivienda "
                . "and uv.id_vivienda=v.id_vivienda and uv.id_usuario =u.id_usuario and cc.id_conjunto = $id  ";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_ringresos_all -- fn51 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    function fn51_ringresos_all($fechadesde, $fechaasta,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM  ingreso  i,  concepto c, concepto_conjunto cc , usuario_vivienda uv , vivienda v , usuario u  "
                . "WHERE i.fecha_ingreso >= '$fechadesde' and i.fecha_ingreso <= '$fechaasta' "
                . "and  i.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and i.id_usuvivienda = uv.id_usuvivienda "
                . "and uv.id_vivienda=v.id_vivienda and uv.id_usuario =u.id_usuario and cc.id_conjunto = $id  ";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_ringresos_all -- fn51 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    function fn51_ringresos_xid_usuvivienda($fechadesde, $fechaasta,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM  ingreso  i,  concepto c, concepto_conjunto cc , usuario_vivienda uv , vivienda v , usuario u  "
                . "WHERE i.fecha_ingreso >= '$fechadesde' and i.fecha_ingreso <= '$fechaasta' "
                . "and  i.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and i.id_usuvivienda = uv.id_usuvivienda "
                . "and uv.id_vivienda=v.id_vivienda and uv.id_usuario =u.id_usuario and cc.id_conjunto = $id   ";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_ringresos_all -- fn51 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    function fn51_ringresos2_xid_usuvivienda($id_usuvivienda,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM  ingreso  i,  concepto c, concepto_conjunto cc , usuario_vivienda uv , vivienda v , usuario u  "
                . "WHERE i.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and i.id_usuvivienda = uv.id_usuvivienda "
                . "and uv.id_vivienda=v.id_vivienda and uv.id_usuario =u.id_usuario and cc.id_conjunto = $id and uv.id_usuvivienda = $id_usuvivienda  ";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_ringresos_all -- fn51 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn51_detingreso1_xid($id_usuvivienda,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT  COUNT(i.id_ingreso) as nregistro, u.* FROM  ingreso  i,  concepto c, concepto_conjunto cc , usuario_vivienda uv , vivienda v , usuario u  "
                . "WHERE i.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and i.id_usuvivienda = uv.id_usuvivienda "
                . "and uv.id_vivienda=v.id_vivienda and uv.id_usuario =u.id_usuario and cc.id_conjunto = $id and uv.id_usuvivienda = $id_usuvivienda  ";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_regresos_xnumfactura -- fn51";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('nregistro' => $menu['nregistro'],
                'cedula_usuario' => $menu['cedula_usuario'],
                'email_usuario' => $menu['email_usuario'],
                'tlf1_usuario' => $menu['tlf1_usuario'],
                'nombre_usuario' => $menu['nombre_usuario'],
                'apellido_usuario' => $menu['apellido_usuario']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn51_detingreso2_xid($id_usuvivienda,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT  sum(i.valor_ingreso) as vpagado FROM  ingreso  i,  concepto c, concepto_conjunto cc , usuario_vivienda uv , vivienda v , usuario u  "
                . "WHERE i.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and i.id_usuvivienda = uv.id_usuvivienda "
                . "and uv.id_vivienda=v.id_vivienda and uv.id_usuario =u.id_usuario and cc.id_conjunto = $id and uv.id_usuvivienda = $id_usuvivienda and i.estado_ingreso =1  ";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_regresos_xnumfactura -- fn51";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = $menu['vpagado'];
        }
        $mysqlidato->close();
        return $datosNuevos;
    }
    
    function fn51_detingreso3_xid($id_usuvivienda,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT  sum(i.valor_ingreso) as vxpagar FROM  ingreso  i,  concepto c, concepto_conjunto cc , usuario_vivienda uv , vivienda v , usuario u  "
                . "WHERE i.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and i.id_usuvivienda = uv.id_usuvivienda "
                . "and uv.id_vivienda=v.id_vivienda and uv.id_usuario =u.id_usuario and cc.id_conjunto = $id and uv.id_usuvivienda = $id_usuvivienda and (i.estado_ingreso = 0 or i.estado_ingreso = 2 )   ";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_regresos_xnumfactura -- fn51";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = $menu['vxpagar'];
        }
        $mysqlidato->close();
        return $datosNuevos;
    }
    
    

    function fn51_cingreso_xdata($sql) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        
        echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = $mysqlidato->insert_id;
        }
        return $cuenta;
    }
    
    function fn51_cusuario_vivienda_xdata($id_usuario, $id_vivienda) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "INSERT INTO usuario_vivienda (id_usuario, id_vivienda)"
                . " VALUES ($id_usuario,$id_vivienda) ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn51_ringreso_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM  ingreso  i,  concepto c, concepto_conjunto cc , usuario_vivienda uv , vivienda v , usuario u  "
                . "WHERE i.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and i.id_usuvivienda = uv.id_usuvivienda "
                . "and uv.id_vivienda=v.id_vivienda and uv.id_usuario =u.id_usuario and i.id_ingreso = $id ";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_regresos_xnumfactura -- fn51";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_ingreso' => $menu['id_ingreso'],
                'valor_ingreso' => $menu['valor_ingreso'],
                'numfactura_ingreso' => $menu['numfactura_ingreso'],
                'documento_ingreso' => $menu['documento_ingreso'],
                'obs_ingreso' => $menu['obs_ingreso'],
                'id_concon' => $menu['id_concon'],
                'nombre_concepto' => $menu['nombre_concepto'],
                'num_vivienda' => $menu['num_vivienda'],
                'nombre_usuario' => $menu['nombre_usuario'],
                'apellido_usuario' => $menu['apellido_usuario'],
                'fecha_ingreso' => $menu['fecha_ingreso'],
                'fechmax_ingreso' => $menu['fechmax_ingreso'],
                'estado_ingreso' => $menu['estado_ingreso'],
                'fechreal_ingreso' => $menu['fechreal_ingreso']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn51_ringresoxdata($numfactura_ingreso,$id_ingreso) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM  ingreso  i,  concepto c, concepto_conjunto cc , usuario_vivienda uv , vivienda v , usuario u  "
                . "WHERE i.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and i.id_usuvivienda = uv.id_usuvivienda "
                . "and uv.id_vivienda=v.id_vivienda and uv.id_usuario =u.id_usuario and numfactura_ingreso like '$numfactura_ingreso' and id_ingreso NOT IN($id_ingreso)";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_regresos_xnumfactura -- fn51";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_ingreso' => $menu['id_ingreso'],
                'valor_ingreso' => $menu['valor_ingreso'],
                'numfactura_ingreso' => $menu['numfactura_ingreso'],
                'documento_ingreso' => $menu['documento_ingreso'],
                'obs_ingreso' => $menu['obs_ingreso'],
                'id_concon' => $menu['id_concon'],
                'nombre_concepto' => $menu['nombre_concepto'],
                'num_vivienda' => $menu['num_vivienda'],
                'nombre_usuario' => $menu['nombre_usuario'],
                'apellido_usuario' => $menu['apellido_usuario'],
                'fecha_ingreso' => $menu['fecha_ingreso'],
                'fechmax_ingreso' => $menu['fechmax_ingreso'],
                'fechreal_ingreso' => $menu['fechreal_ingreso']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn51_verifvivienda_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM vivienda v, usuario_vivienda uv WHERE v.id_vivienda=uv.id_vivienda and v.id_vivienda = $id";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_verifvivienda_xid -- fn51";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_vivienda' => $menu['id_vivienda'],
                'num_vivienda' => $menu['num_vivienda'],
                'observa_vivienda' => $menu['observa_vivienda'],
                'piso_vivienda' => $menu['piso_vivienda'],
                'estado_vivienda' => $menu['estado_vivienda'],
                'id_conjunto' => $menu['id_conjunto'],
                'id_usuario' => $menu['id_usuario'],
                'estadoboton_vivienda' => $menu['estadoboton_vivienda']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn51_rusuario_xcedula($cedula_usuario) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from  usuario where cedula_usuario like '$cedula_usuario' limit 0,1";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_rvivienda_xnumpiso -- fn51";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_usuario' => $menu['id_usuario'],
                'nombre_usuario' => $menu['nombre_usuario'],
                'email_usuario' => $menu['email_usuario'],
                'cedula_usuario' => $menu['cedula_usuario'],
                'tlf1_usuario' => $menu['tlf1_usuario']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn51_rconcepto_conjunto_xid($idconcepto, $idconjunto ) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from  concepto_conjunto  where estado_concon != -1 and id_concepto = $idconcepto  and id_conjunto = $idconjunto  limit 0,1";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_rconcepto_conjunto_xid -- fn51";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_concon' => $menu['id_concon'],
                'id_concepto' => $menu['id_concepto'],
                'periodo_concon' => $menu['periodo_concon'],
                'tipo_concepto' => $menu['tipo_concepto'],
                'valorestandar_concon' => $menu['valorestandar_concon'],
                'valormaximo_concon' => $menu['valormaximo_concon'],
                'estado_concon' => $menu['estado_concon'],
                'id_conjunto' => $menu['id_conjunto']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn51_uusuario_xest($id,$estado) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE usuario SET estado_usuario = $estado  "
                . " WHERE id_usuario = $id ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn51_estado_xid($id_estado){
        $res="PENDIENTE";
        if($id_estado==1){
            $res="PAGADO";
        }if($id_estado==2){
            $res="EN REVISION";
        }
        return $res;
    }
    
    
    function fn51_uingreso_xdata($numfactura_ingreso, $valor_ingreso, $obs_ingreso, $id_ingreso) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fecha = date('Y-m-d');
        $sql = "UPDATE  ingreso SET numfactura_ingreso = '$numfactura_ingreso', valor_ingreso = $valor_ingreso, "
                . "obs_ingreso = '$obs_ingreso' ,fechreal_ingreso = '$fecha',estado_ingreso = 1   "
                . " WHERE id_ingreso = $id_ingreso ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn51_rviviendas_xpiso_all($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT piso_vivienda FROM vivienda WHERE id_conjunto = $id  GROUP BY piso_vivienda";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_rviviendas_xpiso_all -- fn51 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    function fn51_rviviendas_xdepa_all($id,$piso_vivienda) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM vivienda WHERE id_conjunto = $id  and piso_vivienda = '$piso_vivienda'";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_rviviendas_xdepa_all -- fn51 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn51_rconceptos_all($tipo,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM  concepto c, concepto_conjunto cc WHERE c.id_concepto=cc.id_concepto and c.tipo_concepto = $tipo and cc.id_conjunto= $id";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn52_rconceptos_all -- fn52 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn51_rusuario_vivienda($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from usuario u , usuario_vivienda uv , vivienda v "
                . "WHERE u.id_usuario = uv.id_usuario and uv.id_vivienda = v.id_vivienda and v.id_conjunto = $id  ";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_rusuario_vivienda -- fn51 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn51_rfinanza() {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from finanza order by id_finanza desc limit 0 ,1 ";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_rvivienda_xnumpiso -- fn51";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_finanza' => $menu['id_finanza'],
                'numcuenta_finanza' => $menu['numcuenta_finanza'],
                'descripcion_finanza' => $menu['descripcion_finanza'],
                'tipo_finanza' => $menu['tipo_finanza'],
                'valor_finanza' => $menu['valor_finanza'],
                'saldoanterior_finanza' => $menu['saldoanterior_finanza'],
                'saldoactual_finanza' => $menu['saldoactual_finanza'],
                'fecha_finanza' => $menu['fecha_finanza'],
                'numdoc_finanza' => $menu['numdoc_finanza'],
                'estado_finanza' => $menu['estado_finanza'],
                'id_formapago' => $menu['id_formapago']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn51_rfinanza_xdata($numcuenta_finanza,$descripcion_finanza,$tipo_finanza,$valor_finanza,$saldoanterior_finanza,$saldoactual_finanza,$numdoc_finanza) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fecha=date('Y-m-d');
        $sql = "INSERT INTO finanza (numcuenta_finanza, descripcion_finanza, tipo_finanza,valor_finanza,saldoanterior_finanza,"
                . "saldoactual_finanza,fecha_finanza,numdoc_finanza,estado_finanza,id_formapago) "
                . " VALUES ('$numcuenta_finanza','$descripcion_finanza',$tipo_finanza,$valor_finanza,$saldoanterior_finanza,$saldoactual_finanza,'$fecha','$numdoc_finanza',1,0) ";
        echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn51_detingresototal1_xid($fechadesde,$fechaasta,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT  COUNT(i.id_ingreso) as nregistro, u.* FROM  ingreso  i,  concepto c, concepto_conjunto cc , usuario_vivienda uv , vivienda v , usuario u  "
                . "WHERE i.fecha_ingreso >= '$fechadesde' and i.fecha_ingreso <= '$fechaasta' "
                . " and i.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and i.id_usuvivienda = uv.id_usuvivienda "
                . "and uv.id_vivienda=v.id_vivienda and uv.id_usuario =u.id_usuario and cc.id_conjunto = $id   ";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_detingresototal1_xid -- fn51";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('nregistro' => $menu['nregistro']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    function fn51_detingresototal2_xid($fechadesde,$fechaasta,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT  sum(i.valor_ingreso) as vpagado FROM  ingreso  i,  concepto c, concepto_conjunto cc , usuario_vivienda uv , vivienda v , usuario u  "
                . "WHERE i.fecha_ingreso >= '$fechadesde' and i.fecha_ingreso <= '$fechaasta' "
                . " and  i.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and i.id_usuvivienda = uv.id_usuvivienda "
                . "and uv.id_vivienda=v.id_vivienda and uv.id_usuario =u.id_usuario and cc.id_conjunto = $id  and i.estado_ingreso =1  ";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_detingresototal2_xid -- fn51";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = $menu['vpagado'];
        }
        $mysqlidato->close();
        return $datosNuevos;
    }
    
    function fn51_detingresototal3_xid($fechadesde,$fechaasta,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT  sum(i.valor_ingreso) as vxpagar FROM  ingreso  i,  concepto c, concepto_conjunto cc , usuario_vivienda uv , vivienda v , usuario u  "
                . "WHERE i.fecha_ingreso >= '$fechadesde' and i.fecha_ingreso <= '$fechaasta' "
                . " and  i.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and i.id_usuvivienda = uv.id_usuvivienda "
                . "and uv.id_vivienda=v.id_vivienda and uv.id_usuario =u.id_usuario and cc.id_conjunto = $id  and (i.estado_ingreso = 0 or i.estado_ingreso = 2 )   ";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_detingresototal3_xid -- fn51";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = $menu['vxpagar'];
        }
        $mysqlidato->close();
        return $datosNuevos;
    }
    
    
    function fn51_detingresototal1_all($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT  COUNT(i.id_ingreso) as nregistro, u.* FROM  ingreso  i,  concepto c, concepto_conjunto cc , usuario_vivienda uv , vivienda v , usuario u  "
                . "WHERE  i.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and i.id_usuvivienda = uv.id_usuvivienda "
                . "and uv.id_vivienda=v.id_vivienda and uv.id_usuario =u.id_usuario and cc.id_conjunto = $id   ";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_detingresototal1_xid -- fn51";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('nregistro' => $menu['nregistro']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    function fn51_detingresototal2_all($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT  sum(i.valor_ingreso) as vpagado FROM  ingreso  i,  concepto c, concepto_conjunto cc , usuario_vivienda uv , vivienda v , usuario u  "
                . "WHERE  i.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and i.id_usuvivienda = uv.id_usuvivienda "
                . "and uv.id_vivienda=v.id_vivienda and uv.id_usuario =u.id_usuario and cc.id_conjunto = $id  and i.estado_ingreso =1  ";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_detingresototal2_xid -- fn51";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = $menu['vpagado'];
        }
        $mysqlidato->close();
        return $datosNuevos;
    }
    
    function fn51_detingresototal3_all($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT  sum(i.valor_ingreso) as vxpagar FROM  ingreso  i,  concepto c, concepto_conjunto cc , usuario_vivienda uv , vivienda v , usuario u  "
                . "WHERE  i.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and i.id_usuvivienda = uv.id_usuvivienda "
                . "and uv.id_vivienda=v.id_vivienda and uv.id_usuario =u.id_usuario and cc.id_conjunto = $id  and (i.estado_ingreso = 0 or i.estado_ingreso = 2 )   ";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_detingresototal3_xid -- fn51";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = $menu['vxpagar'];
        }
        $mysqlidato->close();
        return $datosNuevos;
    }
    
}


