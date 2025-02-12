<?php
class Fn_52 {
    function fn52_regresos_all($fechadesde, $fechaasta,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM  egreso  e,  concepto c, concepto_conjunto cc   WHERE e.fecha_egreso >= '$fechadesde' and e.fecha_egreso <= '$fechaasta' and  e.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and cc.id_conjunto = $id  ";
       // echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn52_regresos_all -- fn52 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn52_regresos2_all($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM  egreso  e,  concepto c, concepto_conjunto cc   WHERE   e.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and cc.id_conjunto = $id  ";
       // echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn52_regresos_all -- fn52 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn52_regresos_totales($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT  COUNT(id_egreso) as nregistros , SUM(valor_egreso) as total FROM  egreso  e,  concepto c, concepto_conjunto cc   WHERE   e.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and cc.id_conjunto = $id  ";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn52_regresos_xid -- fn52";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('nregistros' => $menu['nregistros'],
                'total' => $menu['total']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn52_regresos_totalesfech($fechadesde, $fechaasta,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT COUNT(id_egreso) as nregistros , SUM(valor_egreso) as total FROM  egreso  e,  concepto c, concepto_conjunto cc   WHERE e.fecha_egreso >= '$fechadesde' and e.fecha_egreso <= '$fechaasta' and  e.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and cc.id_conjunto = $id  ";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn52_regresos_xid -- fn52";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('nregistros' => $menu['nregistros'],
                'total' => $menu['total']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn52_regresos_totalesfech2($fechadesde, $fechaasta,$id, $consepto) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT COUNT(id_egreso) as nregistros , SUM(valor_egreso) as total FROM  egreso  e,  concepto c, concepto_conjunto cc   WHERE e.fecha_egreso >= '$fechadesde' and e.fecha_egreso <= '$fechaasta' "
                . "and  e.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and cc.id_conjunto = $id and cc.id_concon = $consepto ";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn52_regresos_xid -- fn52";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('nregistros' => $menu['nregistros'],
                'total' => $menu['total']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn52_regresos_xconsepto($fechadesde, $fechaasta,$id, $consepto) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM  egreso  e,  concepto c, concepto_conjunto cc   WHERE e.fecha_egreso >= '$fechadesde' and e.fecha_egreso <= '$fechaasta' "
                . "and  e.id_concon = cc.id_concon AND c.id_concepto=cc.id_concepto and cc.id_conjunto = $id and cc.id_concon = $consepto ";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn52_regresos_all -- fn52 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn52_rconceptos_all($tipo,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM  concepto c, concepto_conjunto cc WHERE c.id_concepto=cc.id_concepto and c.tipo_concepto = $tipo and cc.id_conjunto=$id";
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

    function fn52_regresos_xdata($detalle_egreso, $numfactura_egreso, $id_tipoegreso,$fechafactura_egreso,$pago_egreso,$valor_egreso,$idconsepto) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fecha_egreso=date('Y-m-d');
        $sql = "INSERT INTO egreso(detalle_egreso, numfactura_egreso, id_tipoegreso,fechafactura_egreso,fecha_egreso,"
                . "pago_egreso,valor_egreso,id_concon) "
                . " VALUES ('$detalle_egreso', '$numfactura_egreso',$id_tipoegreso, '$fechafactura_egreso',"
                . " '$fecha_egreso',$pago_egreso,$valor_egreso,$idconsepto) ";
        echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn52_regresos_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from  egreso e, concepto c, concepto_conjunto cc where id_egreso = ".$id." AND c.id_concepto=cc.id_concepto and  e.id_concon = cc.id_concon  limit 0,1";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn52_regresos_xid -- fn52";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_egreso' => $menu['id_egreso'],
                'detalle_egreso' => $menu['detalle_egreso'],
                'numfactura_egreso' => $menu['numfactura_egreso'],
                'id_tipoegreso' => $menu['id_tipoegreso'],
                'fechafactura_egreso' => $menu['fechafactura_egreso'],
                'fecha_egreso' => $menu['fecha_egreso'],
                'pago_egreso' => $menu['pago_egreso'],
                'valor_egreso' => $menu['valor_egreso'],
                'id_concon' => $menu['id_concon'],
                'nombre_concepto' => $menu['nombre_concepto'],
                'id_conjunto' => $menu['id_conjunto']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn52_regresos_xnumfactura($numfactura) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from  egreso where numfactura_egreso like '".$numfactura."'  limit 0,1";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn52_regresos_xnumfactura -- fn52";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_egreso' => $menu['id_egreso'],
                'detalle_egreso' => $menu['detalle_egreso'],
                'numfactura_egreso' => $menu['numfactura_egreso'],
                'id_tipoegreso' => $menu['id_tipoegreso'],
                'fechafactura_egreso' => $menu['fechafactura_egreso'],
                'fecha_egreso' => $menu['fecha_egreso'],
                'pago_egreso' => $menu['pago_egreso'],
                'valor_egreso' => $menu['valor_egreso'],
                'id_conjunto' => $menu['id_conjunto']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    
    
    
    
    function fn52_regresos_xest($id,$estado) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE rol SET estado_rol = $estado  "
                . " WHERE id_rol = $id ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
}
