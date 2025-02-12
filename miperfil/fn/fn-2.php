<?php
class Fn_2 {

    function fn2_rusuario_x($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM usuario u  where id_usuario = $id   ";
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn2_rusuario_x fn_2.";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_usuario' => $menu['id_usuario'],
                'nombre_usuario' => $menu['nombre_usuario'],
                'apellido_usuario' => $menu['apellido_usuario'],
                'email_usuario' => $menu['email_usuario'],
                'clave_usuario' => $menu['clave_usuario'],
                'fechacreacion_usuario' => $menu['fechareg_usuario'],
                'fechacaduca_usuario' => $menu['fechaultima_usuario'],
                'ingreso_usuario' => $menu['ingreso_usuario'],
                'id_rol' => $menu['id_rol'],
                'estado_usuario' => $menu['estado_usuario'],
                'sexo_usuario' => $menu['sexo_usuario'],
                'foto_usuario' => $menu['foto_usuario'],
                'direccion1_usuario' => $menu['direccion1_usuario'],
                'direccion2_usuario' => $menu['direccion2_usuario'],
                'ruc_usuario' => $menu['cedula_usuario'],
                'id_empresa' => $menu['id_empresa'],
                'codigo_usuario' => $menu['codigo_usuario'],
                'tipo_cliente' => $menu['tipo_cliente'],
                'tiposesion_usuario' => $menu['tiposesion_usuario'],
                'tlf1_usuario' => $menu['tlf1_usuario'],
                'tlf2_usuario' => $menu['tlf2_usuario'],
                'calle1_usuario' => $menu['dir1_usuario'],
                'calle2_usuario' => $menu['dir2_usuario'],
                'codigopadre_zona' => $menu['codigopadre_zona'],
                'lugar_zona' => $menu['lugar_zona'],
                'id_zona' => $menu['id_zona']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn2_zonaec($idpadre) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM zona a WHERE a.codigopadre_zona = '$idpadre'  "
                . " ORDER BY a.lugar_zona asc";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn2_zonaec -- fn2.";
            exit;
        } else {
            $arreglo = $resultado2;
        }

        $mysqlidato->close();
        return $arreglo;
    }

    function fn2_uusuario_x($nombre, $apellido,$id_zona,$sexo,$direccion1,$ruc,$telf1,$telf2,$calle1,$calle2,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE usuario SET nombre_usuario = '$nombre', apellido_usuario = '$apellido', id_zona  = '$id_zona ', sexo_usuario  = '$sexo'"
                . " , direccion1_usuario  = '$direccion1 ', ruc_usuario  = '$ruc ', telf1_usuario  = '$telf1 ' ,telf2_usuario  = '$telf2 '"
                . " ,calle1_usuario  = '$calle1 ',calle2_usuario  = '$calle2 ' "
                . " WHERE id_usuario  = $id ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn2_uusuario_ximg($id,$img) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE usuario SET foto_usuario = '$img'  "
                . " WHERE id_usuario = $id ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
}
