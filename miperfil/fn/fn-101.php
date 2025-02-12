<?php
class Fn_101 {
    
    function fn101_cclub_xdata($sql) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
            echo $mysqlidato->error;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn101_rclub_xorgsnumERP($orgsnumERP) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM club where orgsnumERP_club = '$orgsnumERP'  ";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn101_rclub_xorgsnumERP -- fnindex";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn101_rclub_all() {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM club WHERE estado_club != -1";
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn101_rclub_all -- fn101 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fn101_cusuario_xdata($nombre_usuario, $apellido_usuario, $telefono_usuario, $email_usuario, $cedula_usuario,$estado) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fecha=date('Y-m-d');
        $sql = "INSERT INTO usuario(nombre_usuario, apellido_usuario, email_usuario,fechacreacion_usuario,estado_usuario,telefono_usuario,cedula_usuario) "
                . " VALUES ('$nombre_usuario', '$apellido_usuario', '$email_usuario','$fecha',$estado,'$telefono_usuario','$cedula_usuario') ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn101_rclub_x($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from club where id_club = ".$id." limit 0,1";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn101_rclub_x -- fn101";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_club' => $menu['id_club'],
                'nombre_club' => $menu['nombre_club'],
                'desc_club' => $menu['desc_club'],
                'foto_club' => $menu['foto_club'],
                'latitud_club' => $menu['latitud_club'],
                'longitud_club' => $menu['longitud_club'],
                'edadmin_club' => $menu['edadmin_club'],
                'edadmax_club' => $menu['edadmax_club'],
                'id_categoria' => $menu['id_categoria'],
                'estado_club' => $menu['estado_club']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn101_uusuario_x($nombre_usuario, $apellido_usuario,$telefono_usuario,$email_usuario, $cedula_usuario,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE usuario SET nombre_usuario = '$nombre_usuario', apellido_usuario = '$apellido_usuario',telefono_usuario='$telefono_usuario',email_usuario='$email_usuario',cedula_usuario='$cedula_usuario' "
                . " WHERE id_usuario = $id ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn101_uavisos_ximg($id, $img) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE avisos SET img_avisos = '$img'  "
                . " WHERE id_avisos = $id ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn101_uusuario_xest($id,$estado) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE club SET estado_club = $estado  "
                . " WHERE id_club = $id ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    function fn101_estado_xid($id_estado){
        $res="INACTIVO";
        if($id_estado==1){
            $res="ACTIVO";
        }
        return $res;
    }
    
    function fn101_uusuario_xpass($id, $clave) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE usuario SET clave_usuario = '".$clave."'  "
                . " WHERE id_usuario = $id ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn101_rrol_all() {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM categoria WHERE estado_categoria != -1 and id_categoriapadre != 0";
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn101_rrol_all -- fn101 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn101_rcategoria_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from categoria where id_categoria = ".$id." limit 0,1";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn101_rcategoria_xid -- fn101";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_categoria' => $menu['id_categoria'],
                'nombre_categoria' => $menu['nombre_categoria'],
                'desc_categoria' => $menu['desc_categoria'],
                'id_categoriapadre' => $menu['id_categoriapadre'],
                'estado_categoria' => $menu['estado_categoria']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn101_ucategoriaclub_xidclub($id,$idrol) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE club SET id_categoria = $idrol  "
                . " WHERE id_club = $id ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn101_uimgclub_x($img, $id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = " UPDATE club SET foto_club = '$img' "
                . " WHERE id_club =  " . $id . " ";
        echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
}
