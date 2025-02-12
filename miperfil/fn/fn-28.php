<?php
class Fn_28 {
    function fn28_rusuario_all($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM usuario u , usuario_empresa ue where u.id_usuario= ue.id_usuario and ue.id_empresa=$id and ue.estado_usuemp!=-1";
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
    
    function fn28_rusuario_vivienda($id,$id_usuemp) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM usuario_vivienda uv , vivienda v  where uv.id_vivienda=v.id_vivienda AND uv.estado_usuvivienda!=-1 AND uv.id_usuemp=$id_usuemp AND v.id_empresa=$id";
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

    function fn28_cusuario_xdata($nombre_usuario, $apellido_usuario,$email_usuario,$tlf1_usuario,
            $cedula_usuario,$terminos_usuario) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fechaactual = date('Y-m-d');
        $nombre_usuario = mysqli_real_escape_string($mysqlidato, $nombre_usuario);
        $apellido_usuario = mysqli_real_escape_string($mysqlidato, $apellido_usuario);
        $email_usuario = mysqli_real_escape_string($mysqlidato, $email_usuario);
        $tlf1_usuario = mysqli_real_escape_string($mysqlidato, $tlf1_usuario);
        $cedula_usuario = mysqli_real_escape_string($mysqlidato, $cedula_usuario);
        
         $sql = "insert into usuario (nombre_usuario,apellido_usuario,email_usuario,tlf1_usuario,tlf2_usuario,fechareg_usuario,fechaultima_usuario,"
                . "dir1_usuario,dir2_usuario,tipo2_usuario,cedula_usuario,clave_usuario,id_casa,estado_usuario,termino_usuario,ip_usuario,id_rol) "
                . "values ('$nombre_usuario','$apellido_usuario','$email_usuario','$tlf1_usuario','','$fechaactual','$fechaactual','','',0,"
                . "'$cedula_usuario',MD5(CONCAT('" . $email_usuario . "','" . $cedula_usuario . "')),0,1,$terminos_usuario,'',4)";
       //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = $mysqlidato->insert_id;
        }
        return $cuenta;
    }
    
    function fn28_cusuario_empresa_xdata($id_usuario, $id_empresa,$email_usuemp,$pass_usuemp) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fecha = date('Y-m-d');
        $sql = "INSERT INTO usuario_empresa(id_usuario, id_empresa,email_usuemp,pass_usuemp,fechin_usuemp,fechlogeo_usuemp,id_rol)"
                . " VALUES ($id_usuario,$id_empresa,'$email_usuemp',md5('$email_usuemp.$pass_usuemp'),'$fecha','$fecha',4) ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn28_cusuario_vivienda_xdata($id_usuario, $id_vivienda,$tipo_usuario) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "INSERT INTO usuario_vivienda (id_usuario, id_vivienda,tipo_usuario)"
                . " VALUES ($id_usuario,$id_vivienda,$tipo_usuario) ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn28_rusuario_empresa_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM usuario u , usuario_empresa uc where u.id_usuario= uc.id_usuario AND uc.id_usuemp=$id ";
                
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
    
    function fn28_verifvivienda_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM vivienda v, usuario_vivienda uv WHERE v.id_vivienda=uv.id_vivienda and v.id_vivienda = $id";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn28_verifvivienda_xid -- fn28";
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
    
    function fn28_rusuario_xcedula($cedula_usuario) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from  usuario where cedula_usuario like '$cedula_usuario' limit 0,1";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn28_rusuario_xcedula -- fn28";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_usuario' => $menu['id_usuario'],
                'nombre_usuario' => $menu['nombre_usuario'],
                'apellido_usuario' => $menu['apellido_usuario'],
                'email_usuario' => $menu['email_usuario'],
                'cedula_usuario' => $menu['cedula_usuario'],
                'tlf1_usuario' => $menu['tlf1_usuario']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn28_rverifica_usuarioempresa($cedula_usuario, $id_empresa) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from usuario_empresa uc, usuario u where uc.id_usuario=u.id_usuario and u.cedula_usuario = '$cedula_usuario' and uc.id_empresa=$id_empresa and uc.estado_usuemp!=-1 limit 0,1";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn28_rverifica_usuarioempresa -- fn28";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_usuario' => $menu['id_usuario'],
                'nombre_usuario' => $menu['nombre_usuario'],
                'apellido_usuario' => $menu['apellido_usuario'],
                'email_usuario' => $menu['email_usuario'],
                'cedula_usuario' => $menu['cedula_usuario'],
                'tlf1_usuario' => $menu['tlf1_usuario']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn28_rverifica_usuario($id_usuario, $id_empresa) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from usuario_empresa uc where uc.id_usuario = $id_usuario and uc.id_empresa=$id_empresa and uc.estado_usuemp!=-1 limit 0,1";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn28_rverifica_usuario -- fn28";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_usuario' => $menu['id_usuario'],
                'nombre_usuario' => $menu['nombre_usuario'],
                'apellido_usuario' => $menu['apellido_usuario'],
                'email_usuario' => $menu['email_usuario'],
                'cedula_usuario' => $menu['cedula_usuario'],
                'tlf1_usuario' => $menu['tlf1_usuario']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn28_rusuario_vivienda_xtipo($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM vivienda v, usuario_vivienda uv WHERE v.id_vivienda = uv.id_vivienda and  v.id_vivienda = $id and uv.tipo_usuario = 1  limit 0,1";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn28_rusuario_vivienda_xtipo -- fn28";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_usuvivienda' => $menu['id_usuvivienda'],
                'id_usuario' => $menu['id_usuario'],
                'id_vivienda' => $menu['id_vivienda'],
                'tipo_usuario' => $menu['tipo_usuario']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn28_rconcepto_empresa_xid($idconcepto, $idempresa ) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from  concepto_empresa  where estado_concon != -1 and id_concepto = $idconcepto  and id_empresa = $idempresa  limit 0,1";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn28_rconcepto_empresa_xid -- fn28";
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
    
    function fn28_uusuario_xdata($nombre_usuario, $apellido_usuario, $cedula_usuario,$tlf1_usuario,$email_usuario, $id_usuario) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE  usuario SET nombre_usuario = '$nombre_usuario',apellido_usuario='$apellido_usuario',cedula_usuario='$cedula_usuario',  "
                . " tlf1_usuario='$tlf1_usuario',email_usuario='$email_usuario' WHERE id_usuario = $id_usuario ";
//        echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn28_uusuario_vivienda_xdata($id,$tipo_usuario,$id_vivienda) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE usuario_vivienda SET tipo_usuario = $tipo_usuario, id_vivienda=$id_vivienda "
                . " WHERE id_usuvivienda = $id ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    
    function fn28_uusuario_xest($id,$estado) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE usuario_empresa SET estado_usuemp = $estado  "
                . " WHERE id_usuemp = $id ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn28_estado_xid($id_estado){
        $res="INACTIVO";
        if($id_estado==1){
            $res="ACTIVO";
        }
        return $res;
    }
    
    
    function fn28_uvivienda_xdata($num_vivienda,$piso_vivienda,$observa_vivienda,$id) {
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
    
    function fn28_rviviendas_xpiso_all($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT piso_vivienda FROM vivienda WHERE id_empresa = $id  GROUP BY piso_vivienda";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn28_rviviendas_xpiso_all -- fn28 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    function fn28_rviviendas_xdepa_all($id,$piso_vivienda) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM vivienda WHERE id_empresa = $id  and piso_vivienda = '$piso_vivienda'";
//        $sql2 = "SELECT * FROM vivienda WHERE id_empresa = $id and piso_vivienda = '$piso_vivienda' "
//                . "and id_vivienda not in (SELECT v.id_vivienda FROM vivienda v , usuario_vivienda uv "
//                . "WHERE v.id_vivienda=uv.id_vivienda and id_empresa = $id and piso_vivienda = '$piso_vivienda') ";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn28_rviviendas_xdepa_all -- fn28 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
}


