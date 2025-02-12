<?php
class Fn_27 {
    function fn27_rvivienda_all($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM  vivienda  WHERE estado_vivienda != -1 and id_empresa = $id";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn27_rconcepto_all -- fn27 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fn27_cvivienda_xdata($num_vivienda, $piso_vivienda, $observa_vivienda,$id_empresa) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "INSERT INTO   vivienda (num_vivienda, piso_vivienda,estado_vivienda,observa_vivienda,id_empresa)"
                . " VALUES ('$num_vivienda', '$piso_vivienda',0, '$observa_vivienda',$id_empresa) ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn27_rvivienda_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM  vivienda WHERE  id_vivienda = $id";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn27_regresos_xnumfactura -- fn27";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_vivienda' => $menu['id_vivienda'],
                'num_vivienda' => $menu['num_vivienda'],
                'observa_vivienda' => $menu['observa_vivienda'],
                'piso_vivienda' => $menu['piso_vivienda'],
                'estado_vivienda' => $menu['estado_vivienda'],
                'id_empresa' => $menu['id_empresa'],
                'estadoboton_vivienda' => $menu['estadoboton_vivienda']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn27_rvivienda_xidall($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM usuario u, usuario_empresa uc, usuario_vivienda uv "
                . "WHERE u.id_usuario=uc.id_usuario and uc.id_usuemp=uv.id_usuemp "
                . "and uc.estado_usuemp !=-1 and uv.estado_usuvivienda!=-1 AND uv.id_vivienda = $id";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn27_rconcepto_all -- fn27 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    function fn27_verifvivienda_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM vivienda v, usuario_vivienda uv WHERE v.id_vivienda=uv.id_vivienda and v.id_vivienda = $id";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn27_verifvivienda_xid -- fn27";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_vivienda' => $menu['id_vivienda'],
                'num_vivienda' => $menu['num_vivienda'],
                'observa_vivienda' => $menu['observa_vivienda'],
                'piso_vivienda' => $menu['piso_vivienda'],
                'estado_vivienda' => $menu['estado_vivienda'],
                'id_empresa' => $menu['id_empresa'],
                'id_usuario' => $menu['id_usuario'],
                'estadoboton_vivienda' => $menu['estadoboton_vivienda']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn27_rvivienda_xnumpiso($num_vivienda,$piso_vivienda,$id,$idvivienda) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from  vivienda where num_vivienda like '$num_vivienda' and piso_vivienda = '$piso_vivienda' and id_empresa = $id and id_vivienda!=$idvivienda limit 0,1";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn27_rvivienda_xnumpiso -- fn27";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_vivienda' => $menu['id_vivienda'],
                'num_vivienda' => $menu['num_vivienda'],
                'observa_vivienda' => $menu['observa_vivienda'],
                'piso_vivienda' => $menu['piso_vivienda'],
                'estado_vivienda' => $menu['estado_vivienda']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn27_rconcepto_empresa_xid($idconcepto, $idempresa ) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from  concepto_empresa  where estado_concon != -1 and id_concepto = $idconcepto  and id_empresa = $idempresa  limit 0,1";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn27_rconcepto_empresa_xid -- fn27";
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
    
    function fn27_rvivienda_xest($id,$estado) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE vivienda SET estado_vivienda = $estado  "
                . " WHERE id_vivienda = $id ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn27_estado_xid($id_estado){
        $res="INACTIVO";
        if($id_estado==1){
            $res="ACTIVO";
        }
        return $res;
    }
    
    
    function fn27_uvivienda_xdata($num_vivienda,$piso_vivienda,$observa_vivienda,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE vivienda SET num_vivienda = '$num_vivienda', piso_vivienda = '$piso_vivienda', observa_vivienda = '$observa_vivienda'  "
                . " WHERE id_vivienda = $id ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn27_rusuario_all($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM usuario u , usuario_empresa uc where u.id_usuario= uc.id_usuario and uc.id_empresa=$id and uc.estado_usuemp!=-1";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn28_rusuario_all -- fn28 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn27_rusuario_empresa_xid($id_vivienda,$id_usuemp) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM usuario u, usuario_empresa uc, usuario_vivienda uv "
                . "WHERE u.id_usuario=uc.id_usuario and uc.id_usuemp=uv.id_usuemp "
                . "and uc.estado_usuemp !=-1 and uv.estado_usuvivienda!=-1 AND uv.id_vivienda = $id_vivienda and uc.id_usuemp=$id_usuemp ";
                
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn28_regresos_xnumfactura -- fn28";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_usuario' => $menu['id_usuario'],
                'id_empresa' => $menu['id_empresa'],
                'id_usuemp' => $menu['id_usuemp'],
                'nombre_usuario' => $menu['nombre_usuario'],
                'apellido_usuario' => $menu['apellido_usuario'],
                'tlf1_usuario' => $menu['tlf1_usuario'],
                'email_usuario' => $menu['email_usuario'],
                'cedula_usuario' => $menu['cedula_usuario']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn27_verifusuario_vivienda_xid($id_usuemp, $id ) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM vivienda v, usuario_vivienda uv WHERE v.id_vivienda=uv.id_vivienda and v.id_vivienda = $id and uv.id_usuemp= $id_usuemp";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn27_verifvivienda_xid -- fn27";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_vivienda' => $menu['id_vivienda'],
                'num_vivienda' => $menu['num_vivienda'],
                'observa_vivienda' => $menu['observa_vivienda'],
                'piso_vivienda' => $menu['piso_vivienda'],
                'estado_vivienda' => $menu['estado_vivienda'],
                'id_empresa' => $menu['id_empresa'],
                'id_usuemp' => $menu['id_usuemp'],
                'estadoboton_vivienda' => $menu['estadoboton_vivienda']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn27_cusuario_vivienda_xdata($id_usuemp, $id_vivienda,$tipo_usuario) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fecha= date('Y-m-d');
        $sql = "INSERT INTO usuario_vivienda (id_usuemp, id_vivienda,tipo_usuario,fechin_usuvivienda)"
                . " VALUES ($id_usuemp,$id_vivienda,$tipo_usuario,'$fecha') ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn27_uusuario_vivienda_xdata($id_usuemp,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fecha= date('Y-m-d'); 
        $sql = "UPDATE usuario_vivienda SET fechout_usuvivienda = '$fecha', estado_usuvivienda=-1 "
                . " WHERE id_usuemp = $id_usuemp and id_vivienda = $id and estado_usuvivienda != -1  ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
}


