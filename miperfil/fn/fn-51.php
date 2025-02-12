<?php
class Fn_51 {
    function fn51_ringresos1_all($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM  transaccion t,  concepto c, concepto_conjunto cc "
                . "where t.id_concon=cc.id_concon and c.id_concepto=cc.id_concepto and cc.id_empresa = $id  ";
        echo $sql2;
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
        $sql2 = "SELECT * FROM  transaccion t,  concepto c, concepto_conjunto cc "
                . "where t.id_concon=cc.id_concon and c.id_concepto=cc.id_concepto "
                . "and t.fechareal_trans>='$fechadesde' and t.fechareal_trans<='$fechaasta' and cc.id_empresa = $id  ";
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
        $sql2 = "SELECT * FROM  transaccion t,  concepto c, concepto_conjunto cc, usuario_vivienda uv , vivienda v ,"
                . " usuario_empresa ue, usuario u where t.id_concon=cc.id_concon and c.id_concepto=cc.id_concepto "
                . "and t.id_usuvivienda=uv.id_usuvivienda and uv.id_vivienda=v.id_vivienda and uv.id_usuemp=ue.id_usuemp "
                . "and ue.id_usuario=u.id_usuario and t.fechareal_trans>='$fechadesde' and t.fechareal_trans<='$fechaasta' "
                . "and cc.id_empresa = $id   ";
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
        $sql2 = "SELECT * FROM  transaccion t,  concepto c, concepto_conjunto cc, usuario_vivienda uv , vivienda v ,"
                . " usuario_empresa ue, usuario u where t.id_concon=cc.id_concon and c.id_concepto=cc.id_concepto "
                . "and t.id_usuvivienda=uv.id_usuvivienda and uv.id_vivienda=v.id_vivienda and uv.id_usuemp=ue.id_usuemp "
                . "and ue.id_usuario=u.id_usuario and cc.id_empresa = $id and uv.id_usuvivienda = $id_usuvivienda  ";
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
        $sql2 = "SELECT  COUNT(t.id_trans) as nregistro, u.* FROM  transaccion t,  concepto c,"
                . " concepto_conjunto cc , usuario_vivienda uv , vivienda v , usuario_empresa ue ,"
                . "usuario u  WHERE t.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto "
                . "and t.id_usuvivienda = uv.id_usuvivienda  and uv.id_vivienda=v.id_vivienda "
                . "and uv.id_usuemp =ue.id_usuemp and ue.id_usuario=u.id_usuario and cc.id_empresa = $id and uv.id_usuvivienda = $id_usuvivienda  ";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_detingreso1_xid -- fn51";
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
        $sql2 = "SELECT  sum(t.monto_trans) as vpagado FROM  transaccion t,  concepto c, concepto_conjunto cc ,"
                . " usuario_vivienda uv , vivienda v , usuario_empresa ue ,usuario u  WHERE t.id_concon = cc.id_concon "
                . "AND c.id_concepto=cc.id_concepto and t.id_usuvivienda = uv.id_usuvivienda  and uv.id_vivienda=v.id_vivienda "
                . "and uv.id_usuemp =ue.id_usuemp and ue.id_usuario=u.id_usuario and cc.id_empresa = $id and uv.id_usuvivienda = $id_usuvivienda and t.estado_trans=1 ";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_detingreso2_xid -- fn51";
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
        $sql2 = "SELECT  sum(t.monto_trans) as vxpagar FROM  transaccion t,  concepto c, concepto_conjunto cc , "
                . "usuario_vivienda uv , vivienda v , usuario_empresa ue ,usuario u  WHERE t.id_concon = cc.id_concon "
                . "AND c.id_concepto=cc.id_concepto and t.id_usuvivienda = uv.id_usuvivienda  and uv.id_vivienda=v.id_vivienda "
                . "and uv.id_usuemp =ue.id_usuemp and ue.id_usuario=u.id_usuario and cc.id_empresa = $id and uv.id_usuvivienda = $id_usuvivienda "
                . "and (t.estado_trans=0 or t.estado_trans=2) ";
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
    
    
    function fn51_ctrasanccion_xdata($id_empresa, $id_concon,$id_usuvivienda,$fecha_trans  ,$tipo_trans 
            ,$detalle_trans,$monto_trans,$oberva_trans) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "INSERT INTO transaccion(id_empresa, id_concon,id_usuvivienda,fecha_trans ,fechamax__trans,fechareal_trans  ,"
                . "tipo_trans ,detalle_trans,documento_trans,monto_trans,saldo_trans,oberva_trans,archivo_trans,"
                . "estado_trans ,sec_trans)"
                . " VALUES ($id_empresa, $id_concon,$id_usuvivienda,'$fecha_trans' ,'$fecha_trans' ,$fecha_trans,"
                . "'$tipo_trans' ,'$detalle_trans','',$monto_trans,0,'$oberva_trans','',"
                . "1 ,0) ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    function fn51_ctrasanccion2_xdata($sql) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        
        //echo $sql;
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
    
    function fn51_rtransaccion_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM  transaccion t,  concepto c, concepto_conjunto cc , usuario_vivienda uv , "
                . "vivienda v , usuario_empresa ue, usuario u   WHERE t.id_concon = cc.id_concon "
                . "AND c.id_concepto=cc.id_concepto and t.id_usuvivienda = uv.id_usuvivienda  "
                . "and uv.id_vivienda=v.id_vivienda and uv.id_usuemp =ue.id_usuemp and ue.id_usuario=u.id_usuario "
                . "and t.id_trans = $id ";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_regresos_xnumfactura -- fn51";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_trans' => $menu['id_trans'],
                'monto_trans' => $menu['monto_trans'],
                'documento_trans' => $menu['documento_trans'],
                'detalle_trans' => $menu['detalle_trans'],
                'oberva_trans' => $menu['oberva_trans'],
                'archivo_trans' => $menu['archivo_trans'],
                'id_empresa' => $menu['id_empresa'],
                'id_concon' => $menu['id_concon'],
                'id_usuvivienda' => $menu['id_usuvivienda'],
                'nombre_concepto' => $menu['nombre_concepto'],
                'num_vivienda' => $menu['num_vivienda'],
                'nombre_usuario' => $menu['nombre_usuario'],
                'apellido_usuario' => $menu['apellido_usuario'],
                'fecha_trans' => $menu['fecha_trans'],
                'fechamax__trans' => $menu['fechamax__trans'],
                'tipo_trans' => $menu['tipo_trans'],
                'fechareal_trans' => $menu['fechareal_trans'],
                'estado_trans' => $menu['estado_trans']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn51_rtransaccion_xdata($documento_trans,$id_trans) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM  transaccion t,  concepto c, concepto_conjunto cc , usuario_vivienda uv , "
                . "vivienda v , usuario_empresa ue, usuario u   WHERE t.id_concon = cc.id_concon "
                . "AND c.id_concepto=cc.id_concepto and t.id_usuvivienda = uv.id_usuvivienda  "
                . "and uv.id_vivienda=v.id_vivienda and uv.id_usuemp =ue.id_usuemp and ue.id_usuario=u.id_usuario "
                . "AND t.documento_trans like '$documento_trans' and t.id_trans NOT IN($id_trans)";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_rtransaccion_xdata -- fn51";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_trans' => $menu['id_trans'],
                'monto_trans' => $menu['monto_trans'],
                'documento_trans' => $menu['documento_trans'],
                'detalle_trans' => $menu['detalle_trans'],
                'oberva_trans' => $menu['oberva_trans'],
                'archivo_trans' => $menu['archivo_trans'],
                'id_empresa' => $menu['id_empresa'],
                'id_concon' => $menu['id_concon'],
                'id_usuvivienda' => $menu['id_usuvivienda'],
                'nombre_concepto' => $menu['nombre_concepto'],
                'num_vivienda' => $menu['num_vivienda'],
                'nombre_usuario' => $menu['nombre_usuario'],
                'apellido_usuario' => $menu['apellido_usuario'],
                'fecha_trans' => $menu['fecha_trans'],
                'fechamax__trans' => $menu['fechamax__trans'],
                'tipo_trans' => $menu['tipo_trans'],
                'fechareal_trans' => $menu['fechareal_trans'],
                'estado_trans' => $menu['estado_trans']);
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
    
    
    function fn51_utransaccion_xdata($documento_trans, $monto_trans, $oberva_trans, $id_trans) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fecha = date('Y-m-d');
        $sql = "UPDATE  transaccion SET documento_trans = '$documento_trans', monto_trans = $monto_trans, "
                . "oberva_trans = '$oberva_trans' ,fechareal_trans = '$fecha',estado_trans = 1   "
                . " WHERE id_trans = $id_trans ";
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
    
    function fn51_rconceptos_xtipo($tipo,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM  concepto c, concepto_conjunto cc WHERE c.id_concepto=cc.id_concepto and cc.estado_concon=1 and c.tipo_concepto = $tipo and cc.id_empresa= $id";
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
        $sql2 = "SELECT * from usuario u ,usuario_empresa ue, usuario_vivienda uv , vivienda v "
                . "WHERE u.id_usuario=ue.id_usuario and ue.id_usuemp = uv.id_usuemp and uv.id_vivienda = v.id_vivienda "
                . "and v.id_empresa = $id  and uv.estado_usuvivienda!=-1";
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
        $sql2 = "SELECT  COUNT(t.id_trans) as nregistro FROM  transaccion t,  concepto c, concepto_conjunto cc    "
                . "WHERE t.fecha_trans >= '$fechadesde' and t.fecha_trans <= '$fechaasta'   "
                . "and t.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and cc.id_empresa = $id   ";
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
        $sql2 = "SELECT  SUM(t.monto_trans) as vpagado FROM  transaccion t,  concepto c, concepto_conjunto cc    "
                . "WHERE t.fecha_trans >= '$fechadesde' and t.fecha_trans <= '$fechaasta'   "
                . "and t.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and cc.id_empresa = $id AND t.estado_trans=1 ";
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
        $sql2 = "SELECT  SUM(t.monto_trans) as vxpagar FROM  transaccion t,  concepto c, concepto_conjunto cc   "
                . " WHERE t.fecha_trans >= '$fechadesde' and t.fecha_trans <= '$fechaasta' and t.id_concon = cc.id_concon "
                . "AND c.id_concepto=cc.id_concepto and cc.id_empresa = $id AND (t.estado_trans=0 or t.estado_trans=2) ";
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
        $sql2 = "SELECT COUNT(t.id_trans) as nregistro FROM  transaccion t,  concepto c, concepto_conjunto cc  "
                . "where t.id_concon=cc.id_concon and c.id_concepto=cc.id_concepto and cc.id_empresa = $id   ";
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
        $sql2 = "SELECT sum(t.monto_trans) as vpagado FROM  transaccion t,  concepto c, concepto_conjunto cc  "
                . "where t.id_concon=cc.id_concon and c.id_concepto=cc.id_concepto and cc.id_empresa = $id and t.estado_trans=1  ";
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
        $sql2 = "SELECT sum(t.monto_trans) as vxpagar FROM  transaccion t,  concepto c, concepto_conjunto cc  "
                . "where t.id_concon=cc.id_concon and c.id_concepto=cc.id_concepto and cc.id_empresa = $id "
                . "and (t.estado_trans=0 OR t.estado_trans=2)";
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
    
    function fn51_rhabitante_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM usuario_vivienda uv, vivienda v, usuario_empresa ue, usuario u "
                . "where uv.id_vivienda=v.id_vivienda and uv.id_usuemp=ue.id_usuemp "
                . "and ue.id_usuario=u.id_usuario and uv.id_usuvivienda = $id ";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn51_rhabitante_xid -- fn51";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_usuvivienda' => $menu['id_usuvivienda'],
                'id_usuemp' => $menu['id_usuemp'],
                'id_vivienda' => $menu['id_vivienda'],
                'tipo_usuario' => $menu['tipo_usuario'],
                'num_vivienda' => $menu['num_vivienda'],
                'id_usuario' => $menu['id_usuario'],
                'nombre_usuario' => $menu['nombre_usuario'],
                'apellido_usuario' => $menu['apellido_usuario']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn51_tipo($dato) {
        $txt= 'PAGADO';
        if($dato=='C'){
            $txt = 'CUOTA';
        }
        return $txt;
    }
    
    function fn51_utransaccion_xid($id,$archivo) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE transaccion SET archivo_trans = '$archivo'  "
                . " WHERE id_trans = $id ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
}


