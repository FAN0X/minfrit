<?php
class Fn_index {

    function fnindex_rcategoria_xidcategoriapadre($id_categoriapadre) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM categoria where id_categoriapadre = $id_categoriapadre"
                . " and estado_categoria = 1 "
                . " order by nombre_categoria asc  ";
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fnindex_rcategoria_xidcategoriapadre -- fnindex";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fnindex_rclub() {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM club "
                . " where estado_club = 1 "
                . " order by nombre_club asc  ";
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fnindex_rclub -- fnindex";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fnindex_rclub_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM club WHERE id_club = $id";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fnindex_rclub_xid";
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
    
    function fnindex_rnoticia_xidclub($id_club) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM noticia "
                . " where id_club = $id_club "
                . " order by fecha_noticia desc  ";
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fnindex_rnoticia_xidclub -- fnindex";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fnindex_rnoticia_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM noticia WHERE id_noticia = $id";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fnindex_rnoticia_xid";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_noticia' => $menu['id_noticia'],
                'titulo_noticia' => $menu['titulo_noticia'],
                'autor_notica' => $menu['autor_notica'],
                'fecha_noticia' => $menu['fecha_noticia'],
                'hora_noticia' => $menu['hora_noticia'],
                'resumen_noticia' => $menu['resumen_noticia'],
                'detalle_noticia' => $menu['detalle_noticia'],
                'estado_noticia' => $menu['estado_noticia'],
                'img_noticia' => $menu['img_noticia'],
                'tag_noticia' => $menu['tag_noticia'],
                'cliks_noticia' => $menu['cliks_noticia'],
                'lugar_noticia' => $menu['lugar_noticia'],
                'id_club' => $menu['id_club']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

}
