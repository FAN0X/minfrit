<?php
class Fn_tarea {
    
    function fntarea_datoslogin_x() {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM request_sam WHERE estado_request = 1";
        // echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo " fntarea_datoslogin_x";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_request' => $menu['id_request'],
                'user_request' => $menu['user_request'],
                'clave_request' => $menu['clave_request'],
                'token_request' => $menu['token_request'],
                'url_request' => $menu['url_request'],
                'estado_request' => $menu['estado_request']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fntarea_updatetoken_x($token, $id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE request_sam SET token_request='".$token."' WHERE id_request=".$id."";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fntarea_selectproducto_x($codigo) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM producto WHERE cod_prod = '$codigo'";
       // echo $sql2;
        $arreglo=0;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fntarea_selectproducto_x -- fn26";
            exit;
        } while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['id_prod'];
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fntarea_selectproducto_xestado($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM producto WHERE id_prod = '$id'";
       // echo $sql2;
        $arreglo=0;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fntarea_selectproducto_x -- fn26";
            exit;
        } while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['tipo4_prod'];
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fntarea_idporducto_x() {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT id_prod FROM producto order by id_prod desc limit 0,1";
        $arreglo=0;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fntarea_idporducto_x -- fn26";
            exit;
        } while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['id_prod']+1;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    function fntarea_updatestock_x($almacen, $stock, $idprod) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE almacenxproduct SET cantidad_almprod=".$stock." WHERE id_almacen=".$almacen." and id_prod=".$idprod."";
        //echo $sql.'<br>';
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    function fntarea_updateprecios_x($id_prod, $art_precio1, $art_precio2, $art_precio3, $art_precio4,$estado,$art_prcdesc_p3,$art_descripcion,$tipo) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "UPDATE producto SET precio1_prod=$art_precio1,precio2_prod=$art_precio2,precio3_prod=$art_precio3,precio4_prod=$art_precio4,estado_prod=$estado,nombre_prod='$art_descripcion', descu_prod=$art_prcdesc_p3,tipo_prod=$tipo WHERE id_prod=$id_prod";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    function fntarea_selectalmacen_x($codigo) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT id_almacen FROM almacen WHERE codigo_almacen = '$codigo' limit 0,1 ";
       //  echo $sql2;
        $arreglo = 0;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo " fntarea_selectalmacen_x";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['id_almacen'];
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fntarea_selectlinea_x($nombrelinea) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT id_linea FROM lineas WHERE nombre_linea like '$nombrelinea'";
        // echo $sql2.'<br>';
        $arreglo=0;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo " fntarea_selectlinea_x";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['id_linea'];
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fntarea_createproducto_x($id_prod1,$codigo, $idcategoria, $art_descripcion, $art_precio1, $art_precio2, $art_precio3, $art_precio4,$estado,$art_prcdesc_p3,$tipo) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "INSERT INTO producto(id_prod,cod_prod, id_catprod, nombre_prod, precio1_prod, precio2_prod, precio3_prod, precio4_prod, estado_prod,tipo_prod,descu_prod) "
                . " VALUES ($id_prod1,'$codigo',$idcategoria,'$art_descripcion','$art_precio1','$art_precio2','$art_precio3','$art_precio4', $estado,$tipo,$art_prcdesc_p3) ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fntarea_createalmprod_x($almacen, $stock, $idprod) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "INSERT INTO almacenxproduct(cantidad_almprod, id_almacen, id_prod) "
                . " VALUES ($stock,$almacen,$idprod) ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fntarea_selectproducto_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM producto WHERE id_prod = $id limit 0,1";
        $arreglo=0;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fntarea_selectproducto_xid -- fn26";
            exit;
        } while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['id_prod'];
        }
        $mysqlidato->close();
        return $arreglo;
    }
    function fntarea_selectproductocodigo_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM producto WHERE id_prod = $id limit 0,1";
       // echo $sql2;
        $arreglo="";
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fntarea_selectproducto_xid -- fn26";
            exit;
        } while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['cod_prod'];
        }
        $mysqlidato->close();
        return $arreglo;
    }
    function fntarea_productocodigo_xcambio() {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM producto";
       // echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fntarea_productocodigo_xcambio -- fn26";
            exit;
        } else{
            $arreglo=$resultado2;
        }
       
        $mysqlidato->close();
        return $arreglo;
    }
    function fntarea_update_codigo_x($codigo,$id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "update producto set cod_prod='$codigo' where id_prod=$id";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
}
