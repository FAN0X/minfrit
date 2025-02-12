<?php
class Fn_26 {
    function fn26_rconcepto_all($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM  concepto c, concepto_conjunto cc WHERE cc.estado_concon != -1 AND c.id_concepto=cc.id_concepto AND cc.id_empresa = $id";
        echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn26_rconcepto_all -- fn26 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fn26_cconcepto_xdata($nombre_concepto, $desc_concepto, $tipo_concepto) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "INSERT INTO  concepto (nombre_concepto, desc_concepto, tipo_concepto,estado_concepto)"
                . " VALUES ('$nombre_concepto', '$desc_concepto',$tipo_concepto, 1) ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = $mysqlidato->insert_id;
        }
        return $cuenta;
    }
    function fn26_cconcepto_conjunto_xdata($id_concepto, $periodo_concon, $valorestandar_concon,$valormaximo_concon,$idconj_open) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "INSERT INTO  concepto_conjunto  (id_concepto, periodo_concon, valorestandar_concon,valormaximo_concon,estado_concon,id_empresa)"
                . " VALUES ($id_concepto, $periodo_concon ,$valorestandar_concon, $valormaximo_concon,0,$idconj_open) ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    function fn26_rconcepto_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM  concepto c, concepto_conjunto cc WHERE c.id_concepto=cc.id_concepto AND cc.id_concon = $id";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn26_regresos_xnumfactura -- fn26";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_concon' => $menu['id_concon'],
                'id_concepto' => $menu['id_concepto'],
                'nombre_concepto' => $menu['nombre_concepto'],
                'desc_concepto' => $menu['desc_concepto'],
                'tipo_concepto' => $menu['tipo_concepto'],
                'periodo_concon' => $menu['periodo_concon'],
                'valorestandar_concon' => $menu['valorestandar_concon'],
                'valormaximo_concon' => $menu['valormaximo_concon'],
                'estado_concon' => $menu['estado_concon'],
                'id_empresa' => $menu['id_empresa']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn26_rconcepto_xnombre($nombre,$tipo_concepto) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from  concepto where nombre_concepto like '".$nombre."' and tipo_concepto = $tipo_concepto  limit 0,1";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn26_regresos_xnumfactura -- fn26";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_concepto' => $menu['id_concepto'],
                'nombre_concepto' => $menu['nombre_concepto'],
                'desc_concepto' => $menu['desc_concepto'],
                'tipo_concepto' => $menu['tipo_concepto'],
                'estado_concepto' => $menu['estado_concepto']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn26_rconcepto_conjunto_xid($idconcepto, $idconjunto ) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from  concepto_conjunto  where estado_concon != -1 and id_concepto = $idconcepto  and id_empresa = $idconjunto  limit 0,1";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn26_rconcepto_conjunto_xid -- fn26";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_concon' => $menu['id_concon'],
                'id_concepto' => $menu['id_concepto'],
                'periodo_concon' => $menu['periodo_concon'],
                'tipo_concepto' => $menu['tipo_concepto'],
                'valorestandar_concon' => $menu['valorestandar_concon'],
                'valormaximo_concon' => $menu['valormaximo_concon'],
                'estado_concon' => $menu['estado_concon'],
                'id_empresa' => $menu['id_empresa']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn26_rconcepto_conjunto_xest($id,$estado) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE concepto_conjunto SET estado_concon = $estado  "
                . " WHERE id_concon = $id ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn26_estado_xid($id_estado){
        $res="INACTIVO";
        if($id_estado==1){
            $res="ACTIVO";
        }
        return $res;
    }
    
    function fn26_rtipoconcepto($id) {
        $txt = 'Ingreso';
        if($id==1){
            $txt = 'Egreso';
        }
        return $txt;
    }
    
    function fn26_uconcepto_conjunto_xdata($periodo_concon,$valorestandar_concon,$valormaximo_concon,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE  concepto_conjunto  SET periodo_concon = $periodo_concon, valorestandar_concon = $valorestandar_concon, valormaximo_concon = $valormaximo_concon  "
                . " WHERE id_concon = $id ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
}
