<?php
class Fn_index1 {

    function fnindex_rcatp_limit($ini, $count) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fin = $ini + $count;
        $sql2 = "SELECT * FROM categoriasprod where niv_categoria = 2 and estado_catprod = 1 "
                . " order by nombre_catprod asc "
                . " limit $ini,$fin ";
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fnindex_rcatp_limit -- fnindex";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    function fnindex_valida_cedula($cedula) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $cedula = mysqli_real_escape_string($mysqlidato, $cedula);
        $sql2 = "SELECT * FROM usuario where cedula_usuario like '$cedula' limit 0,1 ";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fnindex_valida_cedula -- fnindex";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fnindex_cregistro_x($cedula_usuario, $nombre_usuario, $apellido_usuario, $id_casa, $email_usuario, $tlf1_usuario, $clave_usuario, $ip,$tipo_usuario,$terminos_usuario,$id_rol) {

        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fechavisita = date('Y-m-d');
        $cedula_usuario = mysqli_real_escape_string($mysqlidato, $cedula_usuario);
        $nombre_usuario = mysqli_real_escape_string($mysqlidato, $nombre_usuario);
        $apellido_usuario = mysqli_real_escape_string($mysqlidato, $apellido_usuario);
        $id_conjunto = mysqli_real_escape_string($mysqlidato, $id_conjunto);
        $email_usuario = mysqli_real_escape_string($mysqlidato, $email_usuario);
        $tlf1_usuario = mysqli_real_escape_string($mysqlidato, $tlf1_usuario);
        $fecha = date('Y-m-d');

        $sql = "insert into usuario (nombre_usuario,apellido_usuario,email_usuario,tlf1_usuario,tlf2_usuario,fechareg_usuario,fechaultima_usuario,"
                . "dir1_usuario,dir2_usuario,tipo_usuario,cedula_usuario,clave_usuario,id_casa,estado_usuario,termino_usuario,ip_usuario,id_rol) "
                . "values ('$nombre_usuario','$apellido_usuario','$email_usuario','$tlf1_usuario','','$fecha','$fecha','','',$tipo_usuario,"
                . "'$cedula_usuario',MD5(CONCAT('" . $email_usuario . "','" . $clave_usuario . "')),$id_casa,1,$terminos_usuario,'$ip',$id_rol)";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = $mysqlidato->insert_id;
        }
        return $cuenta;
    }
    function fnindex_conjunto_x($nombre_conjunto,$cantidadhab_conjunto,$tipozomaresid_conjunto) {

        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fechavisita = date('Y-m-d');
        $nombre_conjunto = mysqli_real_escape_string($mysqlidato, $nombre_conjunto);
        $cantidadhab_conjunto = mysqli_real_escape_string($mysqlidato, $cantidadhab_conjunto);
        $tipozomaresid_conjunto = mysqli_real_escape_string($mysqlidato, $tipozomaresid_conjunto);
        $fecha = date('Y-m-d');

        $sql = "insert into conjunto (nombre_conjunto,dir1_conjunto,dir2_conjunto,tlf1_conjunto,tlf2_conjunto,numcuenta_conjunto,id_entidad,"
                . "identificacion_conjunto,identificador_conjunto,estado_conjunto,tiponegocio_conjunto,cantidadhab_conjunto,tipozomaresid_conjunto) "
                . "values ('$nombre_conjunto','','','','','',0,'','',1,1,$cantidadhab_conjunto,$tipozomaresid_conjunto)";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = $mysqlidato->insert_id;
        }
        return $cuenta;
    }

    function fnindex_casa_x($tipo_vivienda,$edificio_vivienda,$id_conjunto) {

        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fechavisita = date('Y-m-d');
        $nombre_conjunto = mysqli_real_escape_string($mysqlidato, $nombre_conjunto);
        $fecha = date('Y-m-d');

        $sql = "insert into vivienda (num_vivienda,observa_vivienda,tipo_vivienda,edificio_vivienda,piso_vivienda,estado_vivienda,id_conjunto,estadoboton_vivienda) "
                . "values ('Oficina','',$tipo_vivienda,'$edificio_vivienda',0,1,$id_conjunto,0)";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = $mysqlidato->insert_id;
        }
        return $cuenta;
    }
    
    function fnindex_cusuario_vivienda_x($id_usuario,$id_vivienda) {

        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fechavisita = date('Y-m-d');
        $nombre_conjunto = mysqli_real_escape_string($mysqlidato, $nombre_conjunto);
        $fecha = date('Y-m-d');

        $sql = "insert into usuario_vivienda(id_usuario,id_vivienda) "
                . "values ($id_usuario,$id_vivienda)";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    function Consultar($linea, $buscar, $vartoken, $url) {
        $param = "linea=" . $linea . "&buscar=" . $buscar;
        //echo $GLOBALS['url'];
        $data = $this->APIGet($url . "srv_fact/fact_cons_preciosexist", $param, $vartoken);
        return $data;
    }

    function codigo($codigo) {
        $cuenta = 6 - strlen($codigo);
        $res = "";
        for ($i = 0; $i < $cuenta; $i++) {
            $res = $res . "0";
        }
        return $res . '' . $codigo;
    }
    function getUserIP() {
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') > 0) {
                $addr = explode(",", $_SERVER['HTTP_X_FORWARDED_FOR']);
                return trim($addr[0]);
            } else {
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

}
