<?php

class Fn_4 {

    function fn4_rconjunto_xid($id,$tipo) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM conjunto c, vivienda v, usuario_vivienda uv, usuario u "
                . "WHERE u.id_usuario = uv.id_usuario and v.id_vivienda= uv.id_vivienda "
                . "and v.id_conjunto = c.id_conjunto and u.id_usuario= $id "
                . "and tipozomaresid_conjunto = $tipo  and c.estado_conjunto!=-1 "
                . "GROUP by u.id_usuario";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn77_rrol_all -- fn77 ";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fn4_rtipo_x($id) {
        $txt='Mis Conjutos Habitacionales';
        if($id==2){
            $txt='Mis Edificios';
        }if($id==3){
            $txt='Mis Casas';
        }
        return $txt;
    }
    
    function fn4_conjunto_x($nombre_conjunto,$cantidadhab_conjunto,$tipozomaresid_conjunto) {

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
    function fn4_casa_x($tipo_vivienda,$edificio_vivienda,$id_conjunto) {

        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fechavisita = date('Y-m-d');
        $nombre_conjunto = mysqli_real_escape_string($mysqlidato, $nombre_conjunto);
        $fecha = date('Y-m-d');

        $sql = "insert into vivienda (num_vivienda,observa_vivienda,tipo_vivienda,edificio_vivienda,piso_vivienda,estado_vivienda,id_conjunto,estadoboton_vivienda) "
                . "values ('0','',$tipo_vivienda,'$edificio_vivienda',0,1,$id_conjunto,0)";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = $mysqlidato->insert_id;
        }
        return $cuenta;
    }
    
    function f44_cusuario_vivienda_x($id_usuario,$id_vivienda) {

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
    
    function fn4_rconjunto_xname($name) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM conjunto c, vivienda v, usuario_vivienda uv, usuario u "
                . "WHERE u.id_usuario = uv.id_usuario and v.id_vivienda= uv.id_vivienda "
                . "and v.id_conjunto = c.id_conjunto and c.nombre_conjunto like '%$name%' and c.estado_conjunto!=-1 "
                . "GROUP by u.id_usuario";
        //echo $sql2;
        $arreglo=array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn4_rconjunto_xname -- fn4";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_conjunto' => $menu['id_conjunto']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
}