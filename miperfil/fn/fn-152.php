<?php

class Fn_152 {

    function fn152_transaccion() {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM transaccion t, concepto c where t.id_concepto=c.id_concepto and t.id_concepto=0 order by fecha_trans desc limit 0,1520";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, problema en fn152_transaccion.";
            exit;
        } else {
            $arreglo = $resultado2;
        }

        $mysqlidato->close();
        return $arreglo;
    }

    function fn152_transaccion_xidconcepto($id_concepto) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM transaccion t, concepto c where t.id_concepto=c.id_concepto and t.id_concepto=$id_concepto order by fecha_trans desc";
       // echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, problema en fn152_transaccion_xidconcepto.";
            exit;
        } else {
            $arreglo = $resultado2;
        }

        $mysqlidato->close();
        return $arreglo;
    }

    function fn152_transaccion_xfecha($fechadesde, $fechahasta) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM transaccion t, concepto c where t.id_concepto=c.id_concepto and fecha_trans>'$fechadesde' and fecha_trans<'$fechahasta' order by fecha_trans desc limit 0,1520";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, problema en fn2_transaccion.";
            exit;
        } else {
            $arreglo = $resultado2;
        }

        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn152_rvivienda_usuario($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM vivienda v, usuario_vivienda uv where v.id_vivienda = uv.id_vivienda "
                . "and v.id_empresa = $id and v.estado_vivienda >=0 and uv.estado_usuvivienda>=1 order by num_vivienda asc  ";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, problema en fn152_rvivienda_usuario.";
            exit;
        } else {
            $arreglo = $resultado2;
        }

        $mysqlidato->close();
        return $arreglo;
    }

    function fn152_concepto($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM concepto_conjunto cc, concepto c where cc.id_concepto= c.id_concepto "
                . "AND cc.id_empresa = $id AND cc.estado_concon>=1  ";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, problema en fn152_concepto.";
            exit;
        } else {
            $arreglo = $resultado2;
        }

        $mysqlidato->close();
        return $arreglo;
    }

    function fn152_concepto_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM concepto where cod_concepto='$id' limit 0,1";
        
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, problemas en fn152_concepto_xid.";
            exit;
        }
        while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_concepto' => $menu['id_concepto'],
                'cod_concepto' => $menu['cod_concepto'],
                'nombre_concpeto' => $menu['nombre_concpeto'],
                'cedula_concepto' => $menu['cedula_concepto'],
                'email_concepto' => $menu['email_concepto'],
                'celular_concepto' => $menu['celular_concepto'],
                'casa_concepto' => $menu['casa_concepto'],
                'id_rol' => $menu['id_rol'],
                'estado_concepto' => $menu['estado_concepto'],
                'gastos_concepto' => $menu['gastos_concepto'],
                'clave_concepto' => $menu['clave_concepto']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    function fn152_documento_xid($documento,$detalle,$codconcepto) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM transaccion t, concepto c where c.id_concepto=t.id_concepto and documento_trans='$documento' "
                . "and detalle_trans='$detalle' and cod_concepto=$codconcepto limit 0,1";
        //echo $sql2.'<br><br>';
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, problemas en fn152_documento_xid.";
            exit;
        }
        while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_trans' => $menu['id_trans'],
                'fecha_trans' => $menu['fecha_trans'],
                'id_concepto' => $menu['id_concepto']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    function fn152_concepto_xidconcepto($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM concepto where id_concepto='$id' limit 0,1";
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, problemas en fn152_concepto_xid.";
            exit;
        }
        while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_concepto' => $menu['id_concepto'],
                'cod_concepto' => $menu['cod_concepto'],
                'nombre_concpeto' => $menu['nombre_concpeto'],
                'cedula_concepto' => $menu['cedula_concepto'],
                'email_concepto' => $menu['email_concepto'],
                'celular_concepto' => $menu['celular_concepto'],
                'casa_concepto' => $menu['casa_concepto'],
                'id_rol' => $menu['id_rol'],
                'estado_concepto' => $menu['estado_concepto'],
                'gastos_concepto' => $menu['gastos_concepto'],
                'clave_concepto' => $menu['clave_concepto']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
function fn152_transaccion_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM transaccion t,concepto c where t.id_concepto=c.id_concepto and id_trans =$id limit 0,1";
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, problemas en fn152_concepto_xid.";
            exit;
        }
        while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_trans' => $menu['id_trans'],
                'fecha_trans' => $menu['fecha_trans'],
                'oficina_trans' => $menu['oficina_trans'],
                'tipo_trans' => $menu['tipo_trans'],
                'detalle_trans' => $menu['detalle_trans'],
                'documento_trans' => $menu['documento_trans'],
                'monto_trans' => $menu['monto_trans'],
                'saldo_trans' => $menu['saldo_trans'],
                'id_concepto' => $menu['id_concepto'],
                'oberva_trans' => $menu['oberva_trans'],
                'archivo_trans' => $menu['archivo_trans'],
                'estado_trans' => $menu['estado_trans'],
                'cod_concepto' => $menu['cod_concepto'],
                'nombre_concpeto' => $menu['nombre_concpeto']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    function fn152_sumacreditodebito($tipo,$id,$fecha_ini,$fecha_fin) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT sum(monto_trans) as suma FROM transaccion "
                . "where tipo_trans='$tipo' and id_usuvivienda=$id "
                . "and fecha_trans<='$fecha_fin' and fecha_trans>='$fecha_ini' order by fecha_trans desc";
        //echo $sql2;
        $arreglo = 0;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, problemas en fn152_sumacreditodebito.";
            exit;
        }
        while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['suma'];
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn152_sumacreditodebito2($tipo,$id,$fecha_ini,$fecha_fin) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT sum(monto_trans) as suma FROM transaccion "
                . "where tipo_trans='$tipo' and id_concon=$id "
                . "and fecha_trans<='$fecha_fin' and fecha_trans>='$fecha_ini' order by fecha_trans desc";
        //echo $sql2;
        $arreglo = 0;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, problemas en fn152_sumacreditodebito.";
            exit;
        }
        while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['suma'];
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fn152_sumacreditodebito_xdata($tipo, $fechadesde, $fechahasta) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT sum(monto_trans) as suma FROM transaccion where fecha_trans>'$fechadesde' and fecha_trans<'$fechahasta' and tipo_trans='$tipo' order by fecha_trans desc";
        $arreglo = 0;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, problemas en fn2_sumacredito.";
            exit;
        }
        while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['suma'];
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fn2_sumacreditodebito_xdataid($id_concepto, $tipo, $fechadesde, $fechahasta) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT sum(monto_trans) as suma FROM transaccion where id_concepto=$id_concepto and fecha_trans>'$fechadesde' and fecha_trans<'$fechahasta' and tipo_trans='$tipo' order by fecha_trans desc";
        $arreglo = 0;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, problemas en fn2_sumacreditodebito_xdataid.";
            exit;
        }
        while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['suma'];
        }
        $mysqlidato->close();
        return $arreglo;
    }
    function fn2_sumacreditodebito_xdataidconcepto($id_concepto, $tipo) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT sum(monto_trans) as suma FROM transaccion where id_concepto=$id_concepto and tipo_trans='$tipo' order by fecha_trans desc";
        $arreglo = 0;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, problemas en fn2_sumacreditodebito_xdataid.";
            exit;
        }
        while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['suma'];
        }
        $mysqlidato->close();
        return $arreglo;
    }
    function fn152_ctransaccion_xdata($id_concepto, $codconcepto, $fecha, $oficina, $tipotrans,$detalle, $documento,
                            $monto, $saldo, $observacion, $archivo, $estado) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "insert into transaccion (fecha_trans,oficina_trans,tipo_trans,detalle_trans,documento_trans,monto_trans,"
                . "saldo_trans,id_concepto,oberva_trans,archivo_trans,estado_trans) "
                . "values('$fecha','$oficina',UPPER('$tipotrans'),"
                . "'$detalle','$documento',$monto,$saldo,$id_concepto,'$observacion','$archivo',$estado) ";
        //echo $sql."<br>";
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    function fn152_cseg_xdata($fechaactual, $id_concepto, $tiposeg) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "insert into seguimiento (fechahora_seg,id_concepto,tipo_seg) "
                . "values('$fechaactual',$id_concepto,'$tiposeg') ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    function fn152_ctransaccion_xconcepto($id_concepto,$id_trans) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "update transaccion set id_concepto=$id_concepto where id_trans=$id_trans ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    function fn152_ctransaccion_xarchivo($dato, $id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "update transaccion set archivo_trans='$dato' where id_trans=$id ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    function fn152_cregistro_xdata($fecha_trans,$oficina_trans,$tipo_trans,$detalle_trans,$documento_trans,$monto_trans,
            $saldo_trans,$id_concepto,$oberva_trans) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "insert into transaccion (fecha_trans,oficina_trans,tipo_trans,detalle_trans,documento_trans,monto_trans,saldo_trans,"
                . "id_concepto,oberva_trans,archivo_trans,estado_trans) "
                . "values('$fecha_trans','$oficina_trans','$tipo_trans','$detalle_trans','$documento_trans',$monto_trans,$saldo_trans,"
                . "$id_concepto,'$oberva_trans','',1) ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    function fn152_uregistro_xdata($fecha_trans,$oficina_trans,$tipo_trans,$detalle_trans,$documento_trans,$monto_trans,
            $saldo_trans,$id_concepto,$oberva_trans,$id_trans) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "update transaccion set fecha_trans='$fecha_trans',oficina_trans='$oficina_trans',tipo_trans='$tipo_trans',"
                . "detalle_trans='$detalle_trans',documento_trans='$documento_trans'"
                . ",monto_trans=$monto_trans,saldo_trans=$saldo_trans,"
                . "id_concepto=$id_concepto,oberva_trans='$oberva_trans' where id_trans=$id_trans ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
}
