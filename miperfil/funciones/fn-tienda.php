<?php

class Fn_tienda {

    function fntienda_rprod_x($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from producto p, marca m,categoriasprod c   "
                . " where c.id_catprod = p.id_catprod and id_prod =" . $id . "  "
                . " limit 0,1";
        //and p.id_marca = m.id_marca echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fnindex_rprod_x -- fnindex";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_prod' => $menu['id_prod'],
                'cod_prod' => $menu['cod_prod'],
                'nombre_prod' => $menu['nombre_prod'],
                'desc_prod' => $menu['desc_prod'],
                'desc1_prod' => $menu['desc1_prod'],
                'desc1_prod' => $menu['desc1_prod'],
                'desc2_prod' => $menu['desc2_prod'],
                'precio1_prod' => $menu['precio1_prod'],
                'precio2_prod' => $menu['precio2_prod'],
                'precio3_prod' => $menu['precio3_prod'],
                'precio4_prod' => $menu['precio4_prod'],
                'precio5_prod' => $menu['precio5_prod'],
                'precio6_prod' => $menu['precio6_prod'],
                'estado_prod' => $menu['estado_prod'],
                'id_catprod' => $menu['id_catprod'],
                'car1_prod' => $menu['car1_prod'],
                'car2_prod' => $menu['car2_prod'],
                'car3_prod' => $menu['car3_prod'],
                'img1_prod' => $menu['img1_prod'],
                'img2_prod' => $menu['img2_prod'],
                'img3_prod' => $menu['img3_prod'],
                'clik_prod' => $menu['clik_prod'],
                'caja_prod' => $menu['caja_prod'],
                'url_prod' => $menu['url_prod'],
                'codcaja_prod' => $menu['codcaja_prod'],
                'imgcaja_prod' => $menu['imgcaja_prod'],
                'posicion_catprod' => $menu['posicion_catprod'],
                'descu_prod' => $menu['descu_prod'],
                'descc_prod' => $menu['descc_prod'],
                'fechadescin_prod' => $menu['fechadescin_prod'],
                'fechadescout_prod' => $menu['fechadescout_prod'],
                'produni_prod' => $menu['produni_prod'],
                'fechauniprod_prod' => $menu['fechauniprod_prod'],
                'tipo_prod' => $menu['tipo_prod'],
                'descuentopvp_prod' => $menu['descuentopvp_prod'],
                'estadodescuentopvp_prod' => $menu['estadodescuentopvp_prod'],
                'img4_prod' => $menu['img4_prod'],
                'img5_prod' => $menu['img5_prod'],
                'tienda_prod' => $menu['tienda_prod'],
                'like_prod' => $menu['like_prod'],
                'dislike_prod' => $menu['dislike_prod'],
                'nombre1_prod' => $menu['nombre1_prod'],
                'id_marca' => $menu['id_marca'],
                'ivasn_prod' => $menu['ivasn_prod'],
                'valoriva_prod' => $menu['valoriva_prod'],
                'nom_marca' => $menu['nom_marca'],
                'nombre_catprod' => $menu['nombre_catprod'],
                'id_catprod' => $menu['id_catprod'],
                'grupo_catprod' => $menu['grupo_catprod']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_rimgxprod_xidprod($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from imgxproducto where id_prod=" . $id . " ";
        // echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo " Error fnindex_rimgxprod_xidprod -- fnindex";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_imgxprod' => $menu['id_imgxprod'],
                'name_imgxprod' => $menu['name_imgxprod'],
                'url_imgxprod' => $menu['url_imgxprod'],
                'id_prod' => $menu['id_prod'],
                'descu_prod' => $menu['descu_prod']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_rimgxcat_xidcat($idcat) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from imgxcatergoria where id_catprod=" . $idcat . " ";
        // echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo " Error fnindex_rimgxprod_xidprod -- fnindex";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_imgxcat' => $menu['id_imgxcat'],
                'name_imgxcat' => $menu['name_imgxcat'],
                'url_imgxcat' => $menu['url_imgxcat'],
                'id_catprod' => $menu['id_catprod']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_totales() {
        $dato = $_SESSION['tiendagero'];
        $subtotalsiniva = 0;
        $subtotalconiva = 0;
        $iva = 0;
        $descuentocal = 0;
        $descuentoprod_siniva = 0;
        $descuentoprod_iva = 0;
        $ivadesc = 0;
        if (isset($dato)) {
            for ($i = 0; $i < count($dato); $i++) {
                if ($dato[$i]['IvaSN'] == 'S') {
                    $descuentoprod_iva = $descuentoprod_iva + $dato[$i]['Descprod'];
                    $total1 = $dato[$i]['Cantidad'] * $dato[$i]['Precio1'];
                    $subtotalconiva1 = $dato[$i]['Cantidad'] * ($dato[$i]['Precio1'] / 1.12);
                    $iva1 = $total1 - $subtotalconiva1;
                    $iva += $iva1;
                    $subtotalconiva += $subtotalconiva1;
                } else {
                    $descuentoprod_siniva = $descuentoprod_siniva + $dato[$i]['Descprod'];
                    $subtotalsiniva += $dato[$i]['Cantidad'] * $dato[$i]['Precio1'];
                }
            }
        }

        $subtotal = $subtotalconiva + $subtotalsiniva;
        $ivadesc = ($subtotalconiva - $descuentoprod_iva) * 0.12;
        $subtotal1 = round(($subtotalconiva - $descuentoprod_iva), 2);
        $subtotal2 = round(($subtotalsiniva - $descuentoprod_siniva), 2);
        $subtotalcondescuento = $subtotal1 + $subtotal2;
        $total = $subtotal1 + $subtotal2 + $ivadesc;

        if (!isset($_SESSION['sesiontotales'])) {
            $descuento = 0;
            $envio = 0;
            $direccionenvio = 0;
            $fact = -1;
            $arreglototal[] = array('Total' => round($total, 2),
                'Subtotalconiva' => $subtotal1,
                'Subtotalsiniva' => $subtotal2,
                'Subtotal' => round($subtotal, 2),
                'Iva' => round($iva, 2),
                'Descuento' => round($descuento, 2),
                'ValorDescuento' => round($descuento, 2),
                'Envio' => round($envio, 2),
                'Direccionenvio' => $direccionenvio,
                'Formaenvio' => 1,
                'Tiendapendiente' => 0,
                'Factura' => $fact);
            $_SESSION['sesiontotales'] = $arreglototal;
        } else {
            $datos = $_SESSION['sesiontotales'];
            $descuentocal = $subtotalcondescuento * ($datos[0]['Descuento'] / 100);
            $subtotalcondescuento = $subtotalcondescuento - $descuentocal;
            //$ivadesc=$subtotalcondescuento*0.12;
            $total = $subtotalcondescuento + $ivadesc;
            $descuentototal = $descuentocal + $descuentoprod_iva + $descuentoprod_siniva;
            $datos[0]['Subtotal'] = round($subtotal, 2);
            $datos[0]['ValorDescuento'] = $descuentototal;
            $datos[0]['Subtotalconiva'] = $subtotal1;
            $datos[0]['Subtotalsiniva'] = $subtotal2;
            $datos[0]['Iva'] = round($ivadesc, 2);
            $datos[0]['Total'] = $total;
            $_SESSION['sesiontotales'] = $datos;
        }
    }

    function fntienda_rpedi_id() {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fecha = date('Y-m-d');
        $sql2 = "SELECT id_tienda from tienda order by id_tienda desc limit 0,1";
        //echo "AQUI LA CONSULTA".$sql2;
        $arreglo = 1;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fntienda_rpedi_id -- fntienda.";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['id_tienda'] + 1;
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_ctotales_x($id, $numtienda, $fecha, $hora, $id_usu, $total, $subtotal, $iva, $idenvio, $estado,
            $fact, $idship, $idalmacen, $descuento, $valordesc, $subtotal2, $requestId, $formaenvio, $subtotalsindesc, $plataformap) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $numtienda = mysqli_real_escape_string($mysqlidato, $numtienda);
        $fecha = mysqli_real_escape_string($mysqlidato, $fecha);
        $hora = mysqli_real_escape_string($mysqlidato, $hora);
        $total = mysqli_real_escape_string($mysqlidato, $total);
        $subtotal = mysqli_real_escape_string($mysqlidato, $subtotal);
        $iva = mysqli_real_escape_string($mysqlidato, $iva);
        $idenvio = mysqli_real_escape_string($mysqlidato, $idenvio);
        $estado = mysqli_real_escape_string($mysqlidato, $estado);
        $fact = mysqli_real_escape_string($mysqlidato, $fact);
        $idship = mysqli_real_escape_string($mysqlidato, $idship);
        $descuento = mysqli_real_escape_string($mysqlidato, $descuento);
        $idalmacen = mysqli_real_escape_string($mysqlidato, $idalmacen);
        $valordesc = mysqli_real_escape_string($mysqlidato, $valordesc);
        $subtotal2 = mysqli_real_escape_string($mysqlidato, $subtotal2);
        $requestId = mysqli_real_escape_string($mysqlidato, $requestId);
        $formaenvio = mysqli_real_escape_string($mysqlidato, $formaenvio);
        $subtotalsindesc = mysqli_real_escape_string($mysqlidato, $subtotalsindesc);
        $plataformap = mysqli_real_escape_string($mysqlidato, $plataformap);

        $sql = "insert into tienda (id_tienda,num_tienda,fecha_tienda,hora_tienda,id_usuario,total_tienda,"
                . "subtotal_tienda,iva_tienda,id_envio,id_formapago,estado_tienda,id_enviodirec,id_factura, id_shippify, id_almacen, descuento_tienda, valordesc_tienda, subtotal2_tienda, requestId_tienda, subtotalsindesc_tienda, plataformap_tienda) "
                . "values (" . $id . ",'" . $numtienda . "','" . $fecha . "','" . $hora . "'," . $id_usu . "," . $total . "," . $subtotal . ""
                . "," . $iva . ",0,$formaenvio,0," . $idenvio . "," . $fact . ",'" . $idship . "'," . $idalmacen . "," . $descuento . "," . $valordesc . "," . $subtotal2 . ",'" . $requestId . "'," . $subtotalsindesc . "," . $plataformap . ")";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    function fntienda_csql_x($sql) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    function fntienda_ralmacen_all() {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM almacen where estado_almacen = 1 order by id_almacen ";
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fnindex_ralmacen_all -- fnindex";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_optalmacen_x($latitud1, $longitud1) {
        $fntienda = new Fn_tienda();
        $almacen = $fntienda->fntienda_ralmacen_all();
        $dato = array();
        while ($detalmacen = $almacen->fetch_assoc()) {
            $latitud2 = $detalmacen['coorx_almacen'];
            $longitud2 = $detalmacen['coory_almacen'];
            $diferenciaX = $longitud1 - $longitud2;
            $diferenciaY = $latitud1 - $latitud2;
            $distancia = sqrt(pow($diferenciaX, 2) + pow($diferenciaY, 2));
            $datosnuevos = array('Valor' => $distancia,
                'Id_almacen' => $detalmacen['id_almacen']);
            array_push($dato, $datosnuevos);
        }
        sort($dato);
        return $dato[0]['Id_almacen'];
    }

    function fntienda_renvio_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from envio e, zona z "
                . " WHERE e.id_zona = z.id_zona and  e.id_enviodirec =" . $id . " ";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo " Error fntienda_renvio_xid -- fnindex";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('latitud_enviodirec' => $menu['latitud_enviodirec'],
                'longitud_enviodirec' => $menu['longitud_enviodirec'],
                'nombre_enviodirec' => $menu['nombre_enviodirec'],
                'apellido_enviodirec' => $menu['apellido_enviodirec'],
                'longitud_enviodirec' => $menu['longitud_enviodirec'],
                'tel1_enviodirec' => $menu['tel1_enviodirec'],
                'calle1_enviodirec' => $menu['calle1_enviodirec'],
                'calle2_enviodirec' => $menu['calle2_enviodirec'],
                'sector_enviodirec' => $menu['sector_enviodirec'],
                'tipov_enviodirec' => $menu['tipov_enviodirec'],
                'edificio_enviodirec' => $menu['edificio_enviodirec'],
                'piso_enviodirec' => $menu['piso_enviodirec'],
                'urbani_enviodirec' => $menu['urbani_enviodirec'],
                'numcasau_enviodirec' => $menu['numcasau_enviodirec'],
                'corx_enviodirec' => $menu['corx_enviodirec'],
                'cory_enviodirec' => $menu['cory_enviodirec'],
                'observa_enviodirec' => $menu['observa_enviodirec'],
                'tel2_enviodirec' => $menu['tel2_enviodirec'],
                'referencia_enviodirec' => $menu['referencia_enviodirec'],
                'numcasa_enviodirec' => $menu['numcasa_enviodirec'],
                'id_zona' => $menu['id_zona'],
                'lugar_zona' => $menu['lugar_zona'],
                'codigopadre_zona' => $menu['codigopadre_zona']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_rshippify_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from request_shippify where id_request = " . $id . " ";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo " Error fntienda_rshippify_xid -- fnindex";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('idapi_request' => $menu['idapi_request'],
                'secretkey_request' => $menu['secretkey_request']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_sedshippify_x($secretkey, $idapi, $idbodega, $idenvio, $idfact, $productos) {
        $fntienda = new Fn_tienda();
        $text_prod = '';
        $detbodega = $fntienda->fntienda_ralmacen_xid($idbodega);
        $detenvio = $fntienda->fntienda_renvio_xid($idenvio);
        for ($i = 0; $i < count($productos); $i++) {
            $text_prod .= ' [
                            "name" => "' . $productos[$i]['Id'] . '",
                            "size" => "s",
                            "qty" => "' . $productos[$i]['Cantidad'] . '"
                        ],';
        }
        $endpoint = 'https://api.shippify.co/';
        $username = $idapi;
        $base64secret = base64_encode($username . ":" . $secretkey);
        $headers = array(
            "Content-Type: application/json",
            "Cache-Control: no-cache",
            "Accept: application/json",
            "Authorization: Basic $base64secret",
        );
        $request = [
            "deliveries" => [
                [
                    "pickup" => [
                        "contact" => [
                            "name" => "Fernanda Lema",
                            "email" => "calidad@supaysoft.net",
                            "phonenumber" => "+19209489292"
                        ],
                        "location" => [
                            "address" => "" . $detbodega[0]['nombre_almacen'] . "",
                            "instructions" => "" . $detbodega[0]['direc_alamcen'] . "",
                            "lat" => $detbodega[0]['coorx_almacen'],
                            "lng" => $detbodega[0]['coory_almacen'],
                        ]
                    ],
                    "dropoff" => [
                        "contact" => [
                            "name" => "" . $detenvio[0]['nombre_enviodirec'] . " " . $detenvio[0]['apellido_enviodirec'] . "",
                            "email" => "" . $detenvio[0]['tel1_enviodirec'] . " ",
                            "phonenumber" => "" . $detenvio[0]['tel1_enviodirec'] . " "
                        ],
                        "location" => [
                            "address" => "" . $detenvio[0]['calle1_enviodirec'] . " " . $detenvio[0]['calle2_enviodirec'] . " " . $detenvio[0]['sector_enviodirec'] . "",
                            "instructions" => "" . $detenvio[0]['calle1_enviodirec'] . "",
                            "lat" => $detenvio[0]['latitud_enviodirec'],
                            "lng" => $detenvio[0]['longitud_enviodirec'],
                        ]
                    ],
                    "packages" => [
                        [
                            "name" => "PRUEBA_paperwork1",
                            "size" => "s",
                            "qty" => "2"
                        ],
                    ],
                    "referenceId" => "INVOICE_1525909",
                    "tags" => ["tag1", "tag2", "tag3"]
                ]
            ]
        ];

        var_dump($request);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $endpoint . 'v1/deliveries/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 1800);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $data = json_encode($request);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo 'error';
            var_dump($err);
        } else {
            echo 'correcto';
            $resArray = json_decode($result, true);
            print_r($resArray);
        }
    }

    function fntienda_ralmacen_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from almacen where id_almacen =" . $id . " ";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo " Error fntienda_ralmacen_xid -- fntienda";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_almacen' => $menu['id_almacen'],
                'codigo_almacen' => $menu['codigo_almacen'],
                'nombre_almacen' => $menu['nombre_almacen'],
                'desc_almacen' => $menu['desc_almacen'],
                'direc_alamcen' => $menu['direc_alamcen'],
                'coorx_almacen' => $menu['coorx_almacen'],
                'coory_almacen' => $menu['coory_almacen'],
                'representante_almacen' => $menu['representante_almacen'],
                'telf_almacen' => $menu['telf_almacen'],
                'email_almacen' => $menu['email_almacen']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_rfactura_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from factura where id_factura =" . $id . " ";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo " Error fntienda_rfactura_xid -- fnindex";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_factura' => $menu['id_factura'],
                'nombres_factura' => $menu['nombres_factura'],
                'apellidos_factura' => $menu['apellidos_factura'],
                'dire1_factura' => $menu['dire1_factura'],
                'dire2_factura' => $menu['dire2_factura'],
                'ruc_factura' => $menu['ruc_factura'],
                'tel1_factura' => $menu['tel1_factura'],
                'id_usuario' => $menu['id_usuario'],
                'nacionalidad_factura' => $menu['nacionalidad_factura'],
                'email_factura' => $menu['email_factura'],
                'tipodoc_factura' => $menu['tipodoc_factura']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_rtienda_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from tienda t, usuario u"
                . "  where id_tienda =" . $id . " and u.id_usuario = t.id_usuario ";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo " Error fntienda_rtienda_xid -- fntienda";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_tienda' => $menu['id_tienda'],
                'num_tienda' => $menu['num_tienda'],
                'fecha_tienda' => $menu['fecha_tienda'],
                'hora_tienda' => $menu['hora_tienda'],
                'id_usuario' => $menu['id_usuario'],
                'total_tienda' => $menu['total_tienda'],
                'subtotal_tienda' => $menu['subtotal_tienda'],
                'subtotal2_tienda' => $menu['subtotal2_tienda'],
                'descuento_tienda' => $menu['descuento_tienda'],
                'valordesc_tienda' => $menu['valordesc_tienda'],
                'iva_tienda' => $menu['iva_tienda'],
                'id_envio' => $menu['id_envio'],
                'id_formapago' => $menu['id_formapago'],
                'estado_tienda' => $menu['estado_tienda'],
                'id_enviodirec' => $menu['id_enviodirec'],
                'id_factura' => $menu['id_factura'],
                'id_shippify' => $menu['id_shippify'],
                'id_almacen' => $menu['id_almacen'],
                'nombre_usuario' => $menu['nombre_usuario'],
                'subtotalsindesc_tienda' => $menu['subtotalsindesc_tienda'],
                'tipotarjeta_tienda' => $menu['tipotarjeta_tienda']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_ustatustienda_xid($id, $estado) {
        $con = new Conecciones;
        $fntienda = new Fn_tienda();
        $mysqlidato = $con->crearConexion();
        $sql = "update tienda set estado_tienda = $estado where id_tienda=" . $id . " ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
            $fntienda->fnseg_c_segui_datos($id, 6, 3, '', $cuenta);
        } else {
            $cuenta = 1;
            $fntienda->fnseg_c_segui_datos($id, 6, 3, '', $cuenta);
        }
        return $cuenta;
    }

    function fntienda_rrequestid_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT requestId_tienda from tienda where id_tienda = " . $id . " ";
        //echo $sql2;
        $arreglo = 0;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo " Error fntienda_rrequestid_xid -- fntienda";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['requestId_tienda'];
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_rnumtienda_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT num_tienda from tienda where id_tienda = " . $id . " ";
        //echo $sql2;
        $arreglo = 0;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo " Error fntienda_rnumtienda_xid -- fntienda";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['num_tienda'];
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_ualmacenshiptienda_xid($id, $idbodega, $idship, $idvaucher, $idCliente, $idformapago, $varlortarjeta, $tipotarjeta, $fechatarjeta, $ultdigtarjeta, $estadomail_tienda) {
        $con = new Conecciones;
        $fntienda = new Fn_tienda();
        $mysqlidato = $con->crearConexion();
        $sql = "update tienda set estadomail_tienda = $estadomail_tienda, id_almacen = $idbodega, id_shippify = '$idship', idvaucher_tienda = '$idvaucher', idCliente_tienda = '$idCliente', "
                . "  id_formapago = $idformapago,  varlortarjeta_tienda = '$varlortarjeta',  tipotarjeta_tienda = '$tipotarjeta',  fechatarjeta_tienda = '$fechatarjeta', "
                . "  ultdigtarjeta_tienda = '$ultdigtarjeta' where id_tienda=" . $id . " ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
            $fntienda->fnseg_c_segui_datos($id, 7, 1, '', 0);
        } else {
            $cuenta = 1;
            $fntienda->fnseg_c_segui_datos($id, 7, 1, '', 1);
        }
        return $cuenta;
    }

    function fntienda_rtiendaprod_xidtienda($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from tiendaproducto tp, producto p"
                . "  where tp.id_tienda = " . $id . " and p.id_prod = tp.id_prod ";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fnindex_ralmacen_all -- fnindex";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_rusuario_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from usuario where id_usuario = " . $id . " ";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo " Error fntienda_rusuario_xid -- fntienda";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('nombre_usuario' => $menu['nombre_usuario'],
                'apellido_usuario' => $menu['apellido_usuario'],
                'telf1_usuario' => $menu['telf1_usuario'],
                'email_usuario' => $menu['email_usuario']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_emailpedido_xid($id, $email) {
        $fntienda = new Fn_tienda();
        $dettienda = $fntienda->fntienda_rtienda_xid($id);
        $detprod = $fntienda->fntienda_rtiendaprod_xidtienda($id);
        $detfact = $fntienda->fntienda_rfactura_xid($dettienda[0]['id_factura']);
        $detenvio = $fntienda->fntienda_renvio_xid($dettienda[0]['id_enviodirec']);
        $detvivienda = '';
        if ($detenvio[0]['tipov_enviodirec'] == 'edificio') {
            $detvivienda = 'Edificio:' . utf8_encode($detenvio[0]['edificio_enviodirec']) . ' - Piso: ' . utf8_encode($detenvio[0]['piso_enviodirec']);
        }
        if ($detenvio[0]['tipov_enviodirec'] == 'casa') {
            $detvivienda = 'Número de casa: ' . utf8_encode($detenvio[0]['numcasa_enviodirec']);
        }
        if ($detenvio[0]['tipov_enviodirec'] == 'urbaniza') {
            $detvivienda = 'Urbanización: ' . utf8_encode($detenvio[0]['urbani_enviodirec']) . ' - Número de casa: ' . utf8_encode($detenvio[0]['numcasau_enviodirec']);
        }
        require '../assets/phpmailer/PHPMailerAutoload.php';
        $html = '
            <div style="width: 100%; background-color: silver;">
        <center> <img src="https://itsa.ec/images/logo.png"> </center>
    </div>
    <div style="padding: 10px 10px;background-color: #575756;">
    </div>
    <div style="padding: 10px 10px;background-color: #ffeb00;">
        <center><h2 style=" font-family: Montserrat, sans-serif;font-weight: 700;font-size: 20px !important;">Hola, ' . utf8_encode($dettienda[0]['nombre_usuario']) . '</h2></center>
        <center><h2 style=" font-family: Montserrat, sans-serif;font-weight: 700;font-size: 15px !important;"> ! Tu pedido se ha generado correctamente, pronto nos comunicaremos contigo ¡</h2></center>
        <center><h2 style=" font-family: Montserrat, sans-serif;font-weight: 700;font-size: 15px !important;"> Aquí tienes el detalle de tu pedido "' . $dettienda[0]['num_tienda'] . '"</h2></center>
    </div>
    <div style="padding: 10px 10px;">
        <center>
            <p style="font-family: Montserrat, sans-serif; font-size: 14px; color: #575756; font-weight: 400; line-height: 24px;"> 
                <b>PRODUCTOS </b>
            </p>
            <table style=" text-align: center; width: 100%; font-family: Montserrat, sans-serif; font-size: 14px; color: #575756; font-weight: 400; line-height: 24px;">
                <tr>
                    <td style=" border-bottom: 1px solid black;text-align: left;">PRODUCTO</td>
                    <td style="border-bottom: 1px solid black;">CANTIDAD</td>
                    <td style="border-bottom: 1px solid black;">VALOR</td>
                    <td style="border-bottom: 1px solid black;">VALOR TOTAL</td>
                </tr>';
        while ($detproducto = $detprod->fetch_assoc()) {
            $html .= '<tr>
                    <td style=" border-bottom: 1px solid black;text-align: left;">' . utf8_encode($detproducto['cod_prod'] . ' / ' . $detproducto['nombre_prod']) . '</td>
                    <td style="border-bottom: 1px solid black;">' . utf8_encode($detproducto['cant_tiendaprod']) . '</td>
                    <td style="border-bottom: 1px solid black;">$ ' . number_format(($detproducto['total_tiendaprod'] / $detproducto['cant_tiendaprod']), 2) . '</td>
                    <td style="border-bottom: 1px solid black;">$ ' . number_format($detproducto['total_tiendaprod'], 2) . '</td>
                </tr>';
        }
        $html .= '</table>
            <table style=" text-align: right; width: 100%; font-family: Montserrat, sans-serif; font-size: 14px; color: #575756; font-weight: 400; line-height: 24px;">
                <tr>
                    <td  style="text-align: left; width: 40%; color: #ffb700; "> <b>Subtotal sin descuento</b></td>
                    <td style="text-align: left; width: 60%; color: #ffb700; ">  <b>$ ' . number_format($dettienda[0]['subtotalsindesc_tienda'], 2) . ' </b></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td  style="text-align: left; width: 40%; color: #ffb700;"> <b>Descuento</b> </td>
                    <td style="text-align: left; width: 60%; color: #ffb700;">  <b>$ ' . number_format($dettienda[0]['valordesc_tienda'], 2) . ' </b> </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td  style="text-align: left; width: 40%;"> <b>Subtotal 12% </b> </td>
                    <td style="text-align: left; width: 60%;">  <b>$ ' . number_format($dettienda[0]['subtotal_tienda'], 2) . '</b> </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td  style="text-align: left; width: 40%;"> <b>Subtotal 0% </b> </td>
                    <td style="text-align: left; width: 60%;">  <b>$ ' . number_format($dettienda[0]['subtotal2_tienda'], 2) . '</b> </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td  style="text-align: left; width: 40%;"> <b>Subtotal sin impuestos </b> </td>
                    <td style="text-align: left; width: 60%;">  <b>$ ' . number_format(($dettienda[0]['subtotal_tienda'] + $dettienda[0]['subtotal2_tienda']), 2) . '</b> </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td  style="text-align: left; width: 40%;"> <b>IVA </b> </td>
                    <td style="text-align: left; width: 60%;">  <b>$ ' . number_format($dettienda[0]['iva_tienda'], 2) . '</b> </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td  style="text-align: left; width: 40%; font-size: 18px; color: red;"> <b>TOTAL </b> </td>
                    <td style="text-align: left; width: 60%; font-size: 18px; color: red;"> <b> $ ' . number_format($dettienda[0]['total_tienda'], 2) . '</b> </td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <p style="font-family: Montserrat, sans-serif; font-size: 14px; color: #575756; font-weight: 400; line-height: 24px;"> 
                <b>INFORMACIÓN DE ENVIO  </b>
            </p>
            <table style=" text-align: right; width: 100%; font-family: Montserrat, sans-serif; font-size: 14px; color: #575756; font-weight: 400; line-height: 24px;">
                <tr>
                    <td  style="text-align: left; width: 100%;"> NOMBRES Y APELLIDOS: ' . utf8_encode($detenvio[0]['nombre_enviodirec'] . ' ' . $detenvio[0]['apellido_enviodirec']) . '</td>
                </tr>
                <tr>
                    <td  style="text-align: left; width: 100%;"> DIRECCIÓN: ' . utf8_encode($detenvio[0]['calle1_enviodirec'] . ' ' . $detenvio[0]['calle2_enviodirec'] . ' ' . $detenvio[0]['sector_enviodirec']) . '</td>
                </tr>
                <tr>
                    <td  style="text-align: left; width: 100%;"> REFERENCIA: ' . utf8_encode($detenvio[0]['referencia_enviodirec']) . '</td>
                </tr>
                <tr>
                    <td  style="text-align: left; width: 100%;"> TIPO DE VIVIENDA: ' . $detvivienda . ' </td>
                </tr>
                <tr>
                    <td  style="text-align: left; width: 100%;"> TELÉFONO: ' . utf8_encode($detenvio[0]['tel1_enviodirec']) . ' </td>
                </tr>
            </table>

            <p style="font-family: Montserrat, sans-serif; font-size: 14px; color: #575756; font-weight: 400; line-height: 24px;"> 
                <b>INFORMACIÓN DE FACTURACIÓN  </b>
            </p>';
        if ($dettienda[0]['id_factura'] == '-1') {
            $html .= '<table style="text-align: right; width: 100%; font-family: Montserrat, sans-serif; font-size: 14px; color: #575756; font-weight: 400; line-height: 24px;">
                <tr>
                    <td  style="text-align: left; width: 100%;"> Con datos de envio </td>
                </tr>
            </table>';
        } else {
            $html .= '<table style="text-align: right; width: 100%; font-family: Montserrat, sans-serif; font-size: 14px; color: #575756; font-weight: 400; line-height: 24px;">
                <tr>
                    <td  style="text-align: left; width: 100%;"> NOMBRES Y APELLIDOS: ' . utf8_encode($detfact[0]['nombres_factura'] . ' ' . $detfact[0]['apellidos_factura']) . ' </td>
                </tr>
                <tr>
                    <td  style="text-align: left; width: 100%;"> DIRECCIÓN: ' . utf8_encode($detfact[0]['dire1_factura']) . ' </td>
                </tr>
                <tr>
                    <td  style="text-align: left; width: 100%;"> RUC/C.I: ' . utf8_encode($detfact[0]['ruc_factura']) . ' </td>
                </tr>
                <tr>
                    <td  style="text-align: left; width: 100%;"> TELÉFONO: ' . utf8_encode($detfact[0]['tel1_factura']) . ' </td>
                </tr>
                <tr>
                    <td  style="text-align: left; width: 100%;"> NACIONALIDAD: ' . utf8_encode($detfact[0]['nacionalidad_factura']) . ' </td>
                </tr>
                <tr>
                    <td  style="text-align: left; width: 100%;"> EMAIL: ' . utf8_encode($detfact[0]['email_factura']) . '</td>
                </tr>
            </table>';
        }
        if ($dettienda[0]['id_formapago'] == '2') {
            $html .= '<table style="margin-bottom: 50px;text-align: right; width: 100%; font-family: Montserrat, sans-serif; font-size: 14px; color: #575756; font-weight: 400; line-height: 24px;">
                <tr>
                    <td  style="text-align: left; width: 100%;"> PAGO TRANSFERENCIA </td>
                </tr>
            </table>';
        } else if ($dettienda[0]['id_formapago'] == '1') {
            $html .= '<table style="margin-bottom: 50px;text-align: right; width: 100%; font-family: Montserrat, sans-serif; font-size: 14px; color: #575756; font-weight: 400; line-height: 24px;">
                <tr>
                    <td  style="text-align: left; width: 100%;"> PAGO TARJETA DE CREDITO – ' . $dettienda[0]['tipotarjeta_tienda'] . '</td>
                </tr>
            </table>';
        }
        $html .= '</center>
        <small style=" margin-top: 40px;font-family: Montserrat, sans-serif;  color: #575756; font-weight: 400; line-height: 24px;"> 
            <b>-</b> Si deseas inicar sesión da click <a href="https://geroneto.com/login.php"> aquí </a>.
        </small>

    </div>
    <table style="width: 100%; margin-top: 100px;">
                <tr>
                    <td style="text-align: center;"><img src="https://geroneto.com/images/proforma.png" style="width: 50%;"> </td>
                </tr>
            </table>
    <div style=" font-family: Montserrat, sans-serif; font-size: 14px; color: #575756; font-weight: 400; line-height: 24px; padding: 10px 10px;color: white;background-color: #575756;"> 
        <small> * Este email fue generado automáticamente, porfavor no responder.</small> 
    </div>';

        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 2;
        //Ask for HTML-friendly debug output
        //$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
        $mail->SMTPAutoTLS = true;
        //Set the hostname of the mail server
        $mail->Host = "mail.geroneto.com";
        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = 26;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication
        $mail->Username = "noreply@geroneto.com";
        //Password to use for SMTP authentication
        $mail->Password = "noreplytest1234";
        //Set who the message is to be sent from
        $mail->setFrom('noreply@geroneto.com', 'Pedido ITSA COMMERCE');
        //Set who the message is to be sent to
        $mail->addBCC(trim('jjoneto@geroneto.com'), 'Cotización GERONETO ');
        $mail->addBCC(trim('mercadeo@geroneto.com'), 'Cotización GERONETO ');
        $mail->addBCC(trim('imarin@geroneto.com'), 'Cotización GERONETO ');
        $mail->addCC(trim('info@geroneto.com'), 'Cotización  GERONETO ');
        $mail->addBCC('mercadeo1@geroneto.com', 'Cotización GERONETO ');
        $mail->addAddress(trim($email), 'Pedido ITSA COMMERCE');
        //$mail->addAddress(trim('tatiana.rubio@tomebamba.com.ec'), 'Pedido ITSA COMMERCE');
        //$mail->addAddress('calidad@supaysoft.net', 'Registro ITSA COMMERCE');
        //Set the subject line
        $mail->Subject = 'Pedido ITSA COMMERCE';
        $uniqueid = uniqid('np');
        $message = $html;
        $mail->CharSet = 'UTF-8';
        $mail->msgHTML($message);
        $mail->AltBody = 'This is a plain-text message body';
        if ($mail->send()) {
            $fntienda->fnseg_c_segui_datos($id, 1, 1, '', 1);
            $fntienda->fnseg_c_segui_datos($id, 2, 1, '', 1);
            return 1;
        } else {
            $fntienda->fnseg_c_segui_datos($id, 1, 3, '', 0);
            $fntienda->fnseg_c_segui_datos($id, 2, 1, '', 0);
            return 2;
        }
    }

    function fntiendapendiente_rpedi_id() {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fecha = date('Y-m-d');
        $sql2 = "SELECT id_tienda from tiendapendiente order by id_tienda desc limit 0,1";
        //echo "AQUI LA CONSULTA".$sql2;
        $arreglo = 1;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fntiendapendiente_rpedi_id -- fntienda.";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['id_tienda'] + 1;
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntiendapendiente_ctotales_x($id, $numtienda, $fecha, $hora, $id_usu, $total, $subtotal, $iva, $idenvio, $estado,
            $fact, $idship, $idalmacen, $descuento, $valordesc, $subtotal2) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $numtienda = mysqli_real_escape_string($mysqlidato, $numtienda);
        $fecha = mysqli_real_escape_string($mysqlidato, $fecha);
        $hora = mysqli_real_escape_string($mysqlidato, $hora);
        $total = mysqli_real_escape_string($mysqlidato, $total);
        $subtotal = mysqli_real_escape_string($mysqlidato, $subtotal);
        $iva = mysqli_real_escape_string($mysqlidato, $iva);
        $idenvio = mysqli_real_escape_string($mysqlidato, $idenvio);
        $estado = mysqli_real_escape_string($mysqlidato, $estado);
        $fact = mysqli_real_escape_string($mysqlidato, $fact);
        $idship = mysqli_real_escape_string($mysqlidato, $idship);
        $descuento = mysqli_real_escape_string($mysqlidato, $descuento);
        $idalmacen = mysqli_real_escape_string($mysqlidato, $idalmacen);
        $valordesc = mysqli_real_escape_string($mysqlidato, $valordesc);
        $subtotal2 = mysqli_real_escape_string($mysqlidato, $subtotal2);

        $sql = "insert into tiendapendiente (id_tienda,num_tienda,fecha_tienda,hora_tienda,id_usuario,total_tienda,"
                . "subtotal_tienda,iva_tienda,id_envio,id_formapago,estado_tienda,id_enviodirec,id_factura, id_shippify, id_almacen, descuento_tienda, valordesc_tienda, subtotal2_tienda) "
                . "values (" . $id . ",'" . $numtienda . "','" . $fecha . "','" . $hora . "'," . $id_usu . "," . $total . "," . $subtotal . ""
                . "," . $iva . ",0,0,0," . $idenvio . "," . $fact . ",'" . $idship . "'," . $idalmacen . "," . $descuento . "," . $valordesc . "," . $subtotal2 . ")";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    function fntienda_ctiendapendiente($idusuario) {
        $fntienda = new Fn_tienda();
        if (isset($_SESSION['sesiontotales']) && isset($_SESSION['tiendaitsa'])) {
            $fntienda->fntienda_totales();
            $idtiendap = $fntienda->fntiendapendiente_rpedi_id();
            $arreglototal = $_SESSION['sesiontotales'];
            $idenvio = $arreglototal[0]['Direccionenvio'];
            $fact = $arreglototal[0]['Factura'];
            if ($arreglototal[0]['Tiendapendiente'] == 0) {
                $arreglototal[0]['Tiendapendiente'] = $idtiendap;
                $_SESSION['sesiontotales'] = $arreglototal;
                $numtiendap = '000-' . $idtiendap;
                $idbodega = 0;
                $idship = 0;
                $fecha = date('Y-m-d');
                $hora = date('H:m:s');
                $estado = 0;
                $arreglototal = $_SESSION['sesiontotales'];
                $total = $arreglototal[0]['Total'];
                $descuento = $arreglototal[0]['Descuento'];
                $valordescuento = $arreglototal[0]['ValorDescuento'];
                $iva = $arreglototal[0]['Iva'];
                $subtotal = $arreglototal[0]['Subtotalconiva'];
                $subtotalsiniva = $arreglototal[0]['Subtotalsiniva'];
                $enviovalor = $arreglototal[0]['Envio'];
                $formaenvio = $arreglototal[0]['Formaenvio'];
                $idtmd5 = md5($idtiendap . 'pend');
                $inserttotal = $fntienda->fntiendapendiente_ctotales_x($idtiendap, $numtiendap, $fecha, $hora, $idusuario, $total, $subtotal, $iva, $idenvio, $estado, $fact, $idship, $idbodega, $descuento, $valordescuento, $subtotalsiniva);
                if ($inserttotal == 1) {
                    $tiendaproducto = $_SESSION['tiendaitsa'];
                    $setprodtienda = "insert into tiendaproductopendiente (id_tienda,id_prod,cant_tiendaprod,total_tiendaprod,estado_tiendaprod) values ";
                    $jsonprod = '';
                    for ($i = 0; $i < count($tiendaproducto); $i++) {
                        $jsonprod .= '{"idProd": "' . $tiendaproducto[$i]['Id'] . '", "codProd": "' . $tiendaproducto[$i]['Codigo'] . '" , "cantidadProd": "' . $tiendaproducto[$i]['Cantidad'] . '"},';
                        $total_prod = number_format(($tiendaproducto[$i]['Cantidad'] * $tiendaproducto[$i]['Precio1']), 2);
                        $setprodtienda = $setprodtienda . " (" . $idtiendap . "," . $tiendaproducto[$i]['Id'] . "," . $tiendaproducto[$i]['Cantidad'] . ""
                                . "," . $total_prod . ",0),";
                    }
                    $setprodtienda = trim($setprodtienda, ',');
                    $setprodtienda = $setprodtienda . ';';
                    $insertaproductos = $fntienda->fntienda_csql_x($setprodtienda);
                    if ($insertaproductos != 1) {
                        //echo "7";
                    }
                }
            } else {
                $fntienda->fntienda_utiendapendiente_xid($arreglototal[0]['Tiendapendiente'], $idenvio, $fact);
            }
        }
    }

    function fntienda_utiendapendiente_xid($id, $idenvio, $idfactura) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "update tiendapendiente set id_enviodirec = $idenvio, id_factura = $idfactura "
                . " where id_tienda=" . $id . " ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    function fntienda_ustatetiendap_xid($id, $estado) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "update tiendapendiente set estado2_tienda = $estado "
                . " where id_tienda=" . $id . " ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    function fntienda_rtiendap_xidmd5($id, $idmd5) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from tiendapendiente where id_tienda  = " . $id . " and md5check_tienda = '$idmd5' and estado2_tienda = 0 ";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo " Error fntienda_rtiendap_xidmd5 -- fntienda";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_tienda' => $menu['id_tienda'],
                'num_tienda' => $menu['num_tienda'],
                'fecha_tienda' => $menu['fecha_tienda'],
                'hora_tienda' => $menu['hora_tienda'],
                'id_usuario' => $menu['id_usuario'],
                'total_tienda' => $menu['total_tienda']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_restadot_xid($id) {
        $l_estado = 'PENDIENTE';
        if ($id == 1) {
            $l_estado = 'APROBADO';
        }
        if ($id == 0) {
            $l_estado = 'PENDIENTE';
        }
        if ($id == 6) {
            $l_estado = 'RECHAZADO';
        }
        if ($id == 7) {
            $l_estado = 'POR PAGAR';
        }
        return $l_estado;
    }

    function fntienda_utiendastate_xid($id, $estado) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "update tienda set estado_tienda = $estado "
                . " where id_tienda=" . $id . " ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    function fntienda_rtienda_xidusuxestado($id, $estado) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from tienda  where estado_tienda = $estado and id_usuario = $id and requestId_tienda !='' ";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fnindex_ralmacen_all -- fnindex";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_ridzonasrever_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from zona where id_zona ='" . $id . "' ";
        // echo $sql2;
        $arreglo = '';
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo " Error fntienda_ridzonasrever_xid -- fntienda";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['id_zonaserver'];
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_uproductostock_xcod($cod, $stock) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "update producto set produni_prod = $stock where cod_prod= '" . $cod . "' ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    function fntienda_sincproducto_x($cod) {
        $fntienda = new Fn_tienda();
        $data = array();
        $url = "http://200.7.195.89/lph/servlet/awslph_datosinventario_ec_prod";
        $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
                        <x:Envelope
    xmlns:x="http://schemas.xmlsoap.org/soap/envelope/"
    xmlns:lph="LPH">
    <x:Header/>
    <x:Body>
        <lph:WSLPH_DatosInventario_EC_Prod.Execute>
            <lph:Itecodigo>' . $cod . '</lph:Itecodigo>
        </lph:WSLPH_DatosInventario_EC_Prod.Execute>
    </x:Body>
</x:Envelope>';
        $headers = array(
            "Content-type: text/xml;charset=utf-8",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: LPHaction/AWSLPH_DATOSINVENTARIO_EC_PROD.Execute ",
            "Content-length: " . strlen($xml_post_string),
        );
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 1800);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $parser = xml_parser_create();
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
        xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
        xml_parse_into_struct($parser, $result, $values, $tags);
        xml_parser_free($parser);
        foreach ($tags as $key => $val) {
            if ($key == "SDTLPH_DatosInventario_EC.SDTLPH_DatosInventario_EC_Item") {
                $molranges = $val;
                // cada par contiguo de netradas de array son los 
                // rangos altos y bajos para cada definición de molécula
                for ($i = 0; $i < count($molranges); $i += 2) {
                    $offset = $molranges[$i] + 1;
                    $len = $molranges[$i + 1] - $offset;
                    $tdb[] = $fntienda->fntienda_pasproducto(array_slice($values, $offset, $len));
                }
            } else {
                continue;
            }
        }
        return $tdb;
    }

    function fntienda_pasproducto($mvalues) {
        for ($i = 0; $i < count($mvalues); $i++) {
            $mol[$mvalues[$i]["tag"]] = $mvalues[$i]["value"];
        }
        return $mol;
    }

    function fntienda_sincproducto_xcod($cod) {
        $fntienda = new Fn_tienda();
        $producto = $fntienda->fntienda_sincproducto_x($cod);
        for ($i = 0; $i < count($producto); $i++) {
            $p = $producto[$i];
            foreach ($p as $key => $val) {
                if ($key == 'Item_Codigo') {
                    $cuenta = $fntienda->fntienda_uproductostock_xcod($p['Item_Codigo'], $p['Saldo']);
                }
            }
        }
    }

    function fntienda_rlinea_x($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT l.desc_catprod as codigo_sublinea, sl.desc_catprod as codigo_linea from producto p, categoriasprod l,categoriasprod sl   "
                . " where l.id_catprod = p.id_catprod and l.per_categoria = sl.id_catprod  and id_prod = $id limit 0,1";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fnindex_rprod_x -- fnindex";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('codigo_sublinea' => $menu['codigo_sublinea'],
                'codigo_linea' => $menu['codigo_linea']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_rprod_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $hoy = date('Y-m-d');
        $sql2 = " SELECT * FROM producto WHERE id_prod  = $id ";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fntienda_rprod_xid -- fnindex";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('cod_prod' => $menu['cod_prod'],
                'id_catprod' => $menu['id_catprod'],
                'ivasn_prod' => $menu['ivasn_prod']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_rdesccategoria_x($idcat, $tipo) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $hoy = date('Y-m-d');
        $sql2 = " SELECT * FROM descuento_cliente WHERE '$hoy' >= `desde_descuentoc` AND  "
                . " '$hoy'  <= `hasta_descuentoc` and id_catprod = $idcat and tipo_desccuentoc=$tipo and estado_descuentoc!=0";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fnindex_rprod_x -- fnindex";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_descuentoc' => $menu['id_descuentoc'],
                'nombre_descuentoc ' => $menu['nombre_descuentoc '],
                'palabra_descuentoc' => $menu['palabra_descuentoc'],
                'desde_descuentoc ' => $menu['desde_descuentoc '],
                'hasta_descuentoc' => $menu['hasta_descuentoc'],
                'valor_descuentoc' => $menu['valor_descuentoc'],
                'estado_descuentoc' => $menu['estado_descuentoc'],
                'tipo_desccuentoc' => $menu['tipo_desccuentoc'],
                'id_catprod' => $menu['id_catprod'],
                'id_producto' => $menu['id_producto'],
                'plabra_descuentoc' => $menu['plabra_descuentoc'],
                'id_prodregalo' => $menu['id_prodregalo']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    public function fntienda_r_tienda_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = " SELECT * FROM tienda WHERE id_tienda = $id";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fnindex_rprod_x -- fnindex";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_tienda' => $menu['id_tienda'],
                'num_tienda' => $menu['num_tienda'],
                'fecha_tienda' => $menu['fecha_tienda'],
                'hora_tienda ' => $menu['hora_tienda '],
                'id_usuario' => $menu['id_usuario'],
                'total_tienda' => $menu['total_tienda'],
                'subtotal_tienda' => $menu['subtotal_tienda'],
                'iva_tienda' => $menu['iva_tienda'],
                'id_envio' => $menu['id_envio'],
                'id_formapago' => $menu['id_formapago'],
                'estado_tienda' => $menu['estado_tienda'],
                'id_enviodirec' => $menu['id_enviodirec'],
                'id_factura' => $menu['id_factura'],
                'id_shippify' => $menu['id_shippify'],
                'id_almacen' => $menu['id_almacen'],
                'idvaucher_tienda' => $menu['idvaucher_tienda'],
                'idCliente_tienda' => $menu['idCliente_tienda'],
                'descuento_tienda' => $menu['descuento_tienda'],
                'valordesc_tienda' => $menu['valordesc_tienda'],
                'subtotal2_tienda' => $menu['subtotal2_tienda'],
                'estado2_tienda' => $menu['estado2_tienda'],
                'requestId_tienda' => $menu['requestId_tienda'],
                'varlortarjeta_tienda' => $menu['varlortarjeta_tienda'],
                'tipotarjeta_tienda' => $menu['tipotarjeta_tienda'],
                'fechatarjeta_tienda' => $menu['fechatarjeta_tienda'],
                'ultdigtarjeta_tienda' => $menu['ultdigtarjeta_tienda'],
                'subtotalsindesc_tienda' => $menu['subtotalsindesc_tienda'],
                'estadomail_tienda' => $menu['estadomail_tienda']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    public function fntienda_r_textocurrier_xid($idtienda, $idenvio, $fact, $idbodega) {
        //seleccionar datos de envio 
        $productos = array();
        $fntienda = new Fn_tienda();
        //selecciones factura
        $detfactura = $fntienda->fntienda_r_factura_id($idenvio, $fact);
        //selecciones envio 
        $detenvio = $fntienda->fntienda_renvio_xid($idenvio);
        //selecciones productos
        $productos = $fntienda->fntienda_r_textoproductcurrier_xid($idtienda);
        //selecciones coordenadas almacen 
        $detbodega = $fntienda->fntienda_ralmacen_xid($idbodega);
        $request = [
            "deliveries" => [
                [
                    "pickup" => [
                        "contact" => [
                            "name" => utf8_encode($detbodega[0]['representante_almacen']),
                            "email" => utf8_encode($detbodega[0]['email_almacen']),
                            "phonenumber" => utf8_encode($detbodega[0]['telf_almacen'])
                        ],
                        "location" => [
                            "address" => utf8_encode($detbodega[0]['codigo_almacen']) . ' ' . utf8_encode($detbodega[0]['nombre_almacen'] . ' ' . utf8_encode($detbodega[0]['direc_alamcen'])),
                            "instructions" => utf8_encode($detbodega[0]['direc_alamcen']),
                            "lat" => utf8_encode($detbodega[0]['coorx_almacen']),
                            "lng" => utf8_encode($detbodega[0]['coory_almacen']),
                        ]
                    ],
                    "dropoff" => [
                        "contact" => [
                            "name" => utf8_encode($detenvio[0]['nombre_enviodirec'] . ' ' . $detenvio[0]['apellido_enviodirec']),
                            "email" => utf8_encode($detfactura[0]['email_factura']),
                            "phonenumber" => utf8_encode($detenvio[0]['tel1_enviodirec'])
                        ],
                        "location" => [
                            "address" => utf8_encode($detenvio[0]['calle1_enviodirec'] . ' ' . $detenvio[0]['calle2_enviodirec'] . ' ' . $detenvio[0]['sector_enviodirec']),
                            "instructions" => utf8_encode($detenvio[0]['referencia_enviodirec']),
                            "lat" => utf8_encode($detenvio[0]['latitud_enviodirec']),
                            "lng" => utf8_encode($detenvio[0]['longitud_enviodirec']),
                        ]
                    ],
                    "packages" => $productos,
                    "referenceId" => "INVOICE_" . $idtienda,
                    "tags" => ["TOMEBAMBA", utf8_encode($detenvio[0]['lugar_zona'])]
                ]
            ]
        ];
        return $request;
    }

    public function fntienda_enviocurrier_xid($idtienda, $idenvio, $fact, $idbodega) {
        //selecciona credenciales shippify
        $idship = 'ERROR_CURRIER';
        $fntienda = new Fn_tienda();
        $detship = $fntienda->fntienda_rshippify_xid(1);
        $secretkey = $detship[0]['secretkey_request'];
        $idapi = $detship[0]['idapi_request'];
        $endpoint = 'https://api.shippify.co/';
        $base64secret = base64_encode($idapi . ":" . $secretkey);
        $headers = array(
            "Content-Type: application/json",
            "Cache-Control: no-cache",
            "Accept: application/json",
            "Authorization: Basic $base64secret",
        );
        //seleccionar request
        $request = $fntienda->fntienda_r_textocurrier_xid($idtienda, $idenvio, $fact, $idbodega);
        //print_r($request);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $endpoint . 'v1/deliveries/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 1800);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $data = json_encode($request);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            //problema al enviar al servidor Shippify
            $idship = 4;
        } else {
            $resultadoship = json_decode($result, true);
            if ($resultadoship['code'] != 'OK') {
                $idship = 'ERROR_CURRIER';
                $fntienda->fnseg_c_segui_datos($idtienda, 3, 3, $err, 0);
            } else {
                $idship = $resultadoship['payload'][0]['id'];
                $fntienda->fnseg_c_segui_datos($idtienda, 3, 3, '', 1);
            }
        }
        return $idship;
    }

    public function fntienda_r_textoserver_xid($idtienda, $txt_formaenvio, $idenvio, $fact, $Xtarcnombre, $Xtarcidpagador, $Xtarcnombrecli, $Xtarcapellidocli) {
        $fntienda = new Fn_tienda();
        //seleccionar datos de productos 
        $productos = $fntienda->fntienda_r_textoproductserver_xid($idtienda);
        //seleccionar tienda
        $tienda = $fntienda->fntienda_r_tienda_xid($idtienda);
        //seleccionar datos de factura y envio 
        $detfactura = $fntienda->fntienda_r_factura_id($idenvio, $fact);
        //selecciones envio 
        $detenvio = $fntienda->fntienda_renvio_xid($idenvio);
        $idzona_envioserver = utf8_decode($detenvio[0]['id_zona']);
        $idzonapadre_envioserver = utf8_decode($detenvio[0]['codigopadre_zona']);
        $idzona_envio = $fntienda->fntienda_ridzonasrever_xid($idzona_envioserver);
        $idzonapadre_envio = $fntienda->fntienda_ridzonasrever_xid($idzonapadre_envioserver);
        $almacen = $fntienda->fntienda_ralmacen_xid($tienda[0]['id_almacen']);
        $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
                        <x:Envelope
    xmlns:x="http://schemas.xmlsoap.org/soap/envelope/"
    xmlns:lph="LPH"
    xmlns:sdt="SDTLPHECDatosFacturaDeta">
    <x:Header/>
    <x:Body>
        <lph:WSLPH_EC_DatosFactura.Execute>
            <lph:Xec_id_factura>' . $idtienda . '</lph:Xec_id_factura>
            <lph:Xfechapedido>' . utf8_encode($tienda[0]['fecha_tienda']) . '</lph:Xfechapedido>
            <lph:Xhorapedido>' . utf8_encode($tienda[0]['hora_tienda']) . '</lph:Xhorapedido>
            <lph:Xruc>' . utf8_encode($detfactura[0]['ruc_factura']) . '</lph:Xruc>
            <lph:Xnombres>' . utf8_encode($detfactura[0]['nombres_factura']) . '</lph:Xnombres>
            <lph:Xapellidos>' . utf8_encode($detfactura[0]['apellidos_factura']) . '</lph:Xapellidos>
            <lph:Xmail>' . utf8_encode($detfactura[0]['email_factura']) . '</lph:Xmail>
            <lph:Xagencia_factura>' . utf8_encode($almacen[0]['codigo_almacen']) . '</lph:Xagencia_factura>
            <lph:Xprovincia_codigo>' . utf8_encode($idzonapadre_envio) . '</lph:Xprovincia_codigo>
            <lph:Xcanton_codigo>' . utf8_encode($idzona_envio) . '</lph:Xcanton_codigo>
            <lph:Xcalle_principal>' . str_replace('&', 'y', utf8_encode($detenvio[0]['calle1_enviodirec'])) . '</lph:Xcalle_principal>
            <lph:Xcalle_secundaria>' . str_replace('&', 'y', utf8_encode($detenvio[0]['calle2_enviodirec'])) . '</lph:Xcalle_secundaria>
            <lph:Xreferencia>' . utf8_encode($detenvio[0]['referencia_enviodirec']) . '</lph:Xreferencia>
            <lph:Xnumero_celular>' . utf8_encode($detenvio[0]['tel1_enviodirec']) . '</lph:Xnumero_celular>
            <lph:Xid_rastreo>' . utf8_encode($tienda[0]['id_shippify']) . '</lph:Xid_rastreo>
            <lph:Xtipopago>' . utf8_encode($txt_formaenvio) . '</lph:Xtipopago>
            <lph:Xnroaprobtransaccion>' . utf8_encode($tienda[0]['num_tienda']) . '</lph:Xnroaprobtransaccion>
            <lph:Xtarcestado>APROBADO</lph:Xtarcestado>
            <lph:Xtarcfecha>' . utf8_encode($tienda[0]['fechatarjeta_tienda']) . '</lph:Xtarcfecha>
            <lph:Xtarcfranquicia>' . utf8_encode($tienda[0]['tipotarjeta_tienda']) . '</lph:Xtarcfranquicia>
            <lph:Xtarcnombre>' . utf8_encode($Xtarcnombre) . '</lph:Xtarcnombre>
            <lph:Xtarcidpagador>' . utf8_encode($Xtarcidpagador) . '</lph:Xtarcidpagador>
            <lph:Xtarcnombrecli>' . utf8_encode($Xtarcnombrecli) . '</lph:Xtarcnombrecli>
            <lph:Xtarcapellidocli>' . utf8_encode($Xtarcapellidocli) . '</lph:Xtarcapellidocli>
            <lph:Xtarcnumero>' . utf8_encode($tienda[0]['ultdigtarjeta_tienda']) . '</lph:Xtarcnumero>
            <lph:Xtarcvalortotal>' . $tienda[0]['varlortarjeta_tienda'] . '</lph:Xtarcvalortotal>
            <lph:Xsubtotal_iva>' . $tienda[0]['subtotal_tienda'] . '</lph:Xsubtotal_iva>
            <lph:Xsubtotal_siniva>' . $tienda[0]['subtotal2_tienda'] . '</lph:Xsubtotal_siniva>
            <lph:Xsubtotal>' . number_format(($tienda[0]['subtotal_tienda'] + $tienda[0]['subtotal2_tienda']), 2) . '</lph:Xsubtotal>
            <lph:Xdescuento_iva>' . $tienda[0]['valordesc_tienda'] . '</lph:Xdescuento_iva>
            <lph:Xdescuento_siniva>0</lph:Xdescuento_siniva>
            <lph:Xtotal>' . $tienda[0]['total_tienda'] . '</lph:Xtotal>
            <lph:Xstdfacturadeta>
            ' . $productos . '
            </lph:Xstdfacturadeta>
        </lph:WSLPH_EC_DatosFactura.Execute>
    </x:Body>
</x:Envelope>';
        return $xml_post_string;
    }

    public function fntienda_envioserver_xid($idtienda, $txt_formaenvio, $idenvio, $fact, $Xtarcnombre, $Xtarcidpagador, $Xtarcnombrecli, $Xtarcapellidocli) {
        $fntienda = new Fn_tienda();
        $url = "http://200.7.195.89/lph/servlet/awslph_ec_datosfactura";
        $xml_post_string = $fntienda->fntienda_r_textoserver_xid($idtienda, $txt_formaenvio, $idenvio, $fact, $Xtarcnombre, $Xtarcidpagador, $Xtarcnombrecli, $Xtarcapellidocli);
        $headers = array(
            "Content-type: text/xml;charset=utf-8",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: LPHaction/AWSLPH_EC_DATOSFACTURA.Execute",
            "Content-length: " . strlen($xml_post_string),
        );
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 1800);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        //pritnt_r($result);
    }

    public function fntienda_r_textoproductserver_xid($idtienda) {
        $fntienda = new Fn_tienda();
        $textoproductos = '';
        $productos = $fntienda->fntienda_r_tiendaprod_xidtienda($idtienda);
        while ($detalleprod = $productos->fetch_assoc()) {
            $lineaprod = $fntienda->fntienda_rlinea_x($detalleprod['id_prod']);
            $textoproductos .= '
                    <sdt:SDTLPHECDatosFacturaDeta.SDTLPHECDatosFacturaDetaItem>
                        <sdt:item_codigo>' . utf8_encode($detalleprod['cod_prod']) . '</sdt:item_codigo>
                        <sdt:linea_codigo>' . utf8_encode($lineaprod[0]['codigo_linea']) . '</sdt:linea_codigo>
                        <sdt:sublinea_codigo>' . utf8_encode($lineaprod[0]['codigo_sublinea']) . '</sdt:sublinea_codigo>
                        <sdt:iva_sn>' . $detalleprod['ivasn_prod'] . '</sdt:iva_sn>
                        <sdt:iva_porcentaje>' . $detalleprod['valoriva_prod'] . '</sdt:iva_porcentaje>
                        <sdt:cantidad>' . $detalleprod['cant_tiendaprod'] . '</sdt:cantidad>
                        <sdt:precio_unitario>' . number_format($detalleprod['total_tiendaprod'] / $detalleprod['cant_tiendaprod'], 2) . '</sdt:precio_unitario>
                        <sdt:precio_total>' . number_format($detalleprod['total_tiendaprod'], 2) . '</sdt:precio_total>
                        <sdt:descuento_total>' . number_format($detalleprod['desc_tiendaprod'], 2) . '</sdt:descuento_total>
                        <sdt:precio_final>' . number_format($detalleprod['total_tiendaprod'], 2) . '</sdt:precio_final>
                        </sdt:SDTLPHECDatosFacturaDeta.SDTLPHECDatosFacturaDetaItem>';
        }
        return $textoproductos;
    }

    public function fntienda_r_textoproductcurrier_xid($idtienda) {
        $fntienda = new Fn_tienda();
        $textoproductos = array();
        $productos = $fntienda->fntienda_r_tiendaprod_xidtienda($idtienda);
        while ($detalleprod = $productos->fetch_assoc()) {
            $arraynuevo = [
                "name" => utf8_encode($detalleprod['nombre_prod']),
                "size" => "s",
                "qty" => $detalleprod['cant_tiendaprod'],
                "price" => $detalleprod['total_tiendaprod'],
            ];
            array_push($textoproductos, $arraynuevo);
        }
        return $textoproductos;
    }

    function fntienda_r_tiendaprod_xidtienda($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from tiendaproducto tp, producto p"
                . "  where tp.id_tienda = " . $id . " and p.id_prod = tp.id_prod ";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fntienda_r_tiendaprod_xidtienda";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }

    public function fntienda_r_factura_id($idenvio, $fact) {
        $fntienda = new Fn_tienda();
        if ($fact == '-1') {
            $detfactura = $fntienda->fntienda_rfacturasame_xid($idenvio);
        } else {
            $detfactura = $fntienda->fntienda_rfactura_xid($fact);
        }
        return $detfactura;
    }

    function fntienda_rfacturasame_xid($id_send) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fecha = date('Y-m-d');
        $sql2 = "SELECT * from envio e, zona z where e.id_zona=z.id_zona and id_enviodirec=" . $id_send . "";
        //echo "AQUI LA CONSULTA".$sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fnindex_rfacturasame_xid ";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_factura' => $menu['id_factura'],
                'nombres_factura' => $menu['nombre_enviodirec'],
                'apellidos_factura' => $menu['apellido_enviodirec'],
                'dire1_factura' => $menu['calle1_enviodirec'],
                'dire2_factura' => $menu['calle2_enviodirec'] . ' ' . $menu['sector_enviodirec'],
                'ruc_factura' => $menu['cedula_enviodirec'],
                'tel1_factura' => $menu['tel1_enviodirec'],
                'nacionalidad_factura' => '',
                'email_factura' => $menu['email_enviodirec'],
                'tipodoc_factura' => $menu['tipodoc_enviodirec']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    public function fntienda_envioserverprueba_xid($idtienda, $txt_formaenvio, $idenvio, $fact, $Xtarcnombre, $Xtarcidpagador, $Xtarcnombrecli, $Xtarcapellidocli) {
        $fntienda = new Fn_tienda();
        $url = "http://200.7.195.86/lph/servlet/awslph_ec_datosfactura_desa";
        $xml_post_string = $fntienda->fntienda_r_textoserverprueba_xid($idtienda, $txt_formaenvio, $idenvio, $fact, $Xtarcnombre, $Xtarcidpagador, $Xtarcnombrecli, $Xtarcapellidocli);
        $headers = array(
            "Content-type: text/xml;charset=utf-8",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: LPHaction/AWSLPH_EC_DATOSFACTURA_DESA.Execute",
            "Content-length: " . strlen($xml_post_string),
        );
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 1800);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            $fntienda->fnseg_c_segui_datos($idtienda, 5, 1, $err, 0);
        } else {
            $fntienda->fnseg_c_segui_datos($idtienda, 5, 1, '', 1);
        }
        //print_r($result);
    }

    public function fntienda_envioserverpruebaeco_xid($idtienda, $txt_formaenvio, $idenvio, $fact, $Xtarcnombre, $Xtarcidpagador, $Xtarcnombrecli, $Xtarcapellidocli) {
        $fntienda = new Fn_tienda();
        $url = "http://200.7.195.86/ecommerce/servlet/awslph_ec_datosfactura_desa";
        $xml_post_string = $fntienda->fntienda_r_textoserverpruebaeco_xid($idtienda, $txt_formaenvio, $idenvio, $fact, $Xtarcnombre, $Xtarcidpagador, $Xtarcnombrecli, $Xtarcapellidocli);
        $headers = array(
            "Content-type: text/xml;charset=utf-8",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: ECOMMaction/AWSLPH_EC_DATOSFACTURA_DESA.Execute",
            "Content-length: " . strlen($xml_post_string),
        );
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 1800);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        //print_r($result);
    }

    public function fntienda_r_textoserverprueba_xid($idtienda, $txt_formaenvio, $idenvio, $fact, $Xtarcnombre, $Xtarcidpagador, $Xtarcnombrecli, $Xtarcapellidocli) {
        $fntienda = new Fn_tienda();
        //seleccionar datos de productos 
        $productos = $fntienda->fntienda_r_textoproductserver_xid($idtienda);
        //seleccionar tienda
        $tienda = $fntienda->fntienda_r_tienda_xid($idtienda);
        //seleccionar datos de factura y envio 
        $detfactura = $fntienda->fntienda_r_factura_id($idenvio, $fact);
        //selecciones envio 
        $detenvio = $fntienda->fntienda_renvio_xid($idenvio);
        $idzona_envioserver = utf8_decode($detenvio[0]['id_zona']);
        $idzonapadre_envioserver = utf8_decode($detenvio[0]['codigopadre_zona']);
        $idzona_envio = $fntienda->fntienda_ridzonasrever_xid($idzona_envioserver);
        $idzonapadre_envio = $fntienda->fntienda_ridzonasrever_xid($idzonapadre_envioserver);
        $almacen = $fntienda->fntienda_ralmacen_xid($tienda[0]['id_almacen']);
        $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
                        <x:Envelope
    xmlns:x="http://schemas.xmlsoap.org/soap/envelope/"
    xmlns:lph="LPH"
    xmlns:sdt="SDTLPHECDatosFacturaDeta">
    <x:Header/>
    <x:Body>
        <lph:WSLPH_EC_DatosFactura.Execute>
            <lph:Xec_id_factura>' . $idtienda . '</lph:Xec_id_factura>
            <lph:Xfechapedido>' . utf8_encode($tienda[0]['fecha_tienda']) . '</lph:Xfechapedido>
            <lph:Xhorapedido>' . $tienda[0]['hora_tienda'] . '</lph:Xhorapedido>
            <lph:Xruc>' . utf8_encode($detfactura[0]['ruc_factura']) . '</lph:Xruc>
            <lph:Xnombres>' . utf8_encode($detfactura[0]['nombres_factura']) . '</lph:Xnombres>
            <lph:Xapellidos>' . utf8_encode($detfactura[0]['apellidos_factura']) . '</lph:Xapellidos>
            <lph:Xmail>' . utf8_encode($detfactura[0]['email_factura']) . '</lph:Xmail>
            <lph:Xagencia_factura>' . utf8_encode($almacen[0]['codigo_almacen']) . '</lph:Xagencia_factura>
            <lph:Xprovincia_codigo>' . utf8_encode($idzonapadre_envio) . '</lph:Xprovincia_codigo>
            <lph:Xcanton_codigo>' . utf8_encode($idzona_envio) . '</lph:Xcanton_codigo>
            <lph:Xcalle_principal>' . str_replace('&', 'y', utf8_encode($detenvio[0]['calle1_enviodirec'])) . '</lph:Xcalle_principal>
            <lph:Xcalle_secundaria>' . str_replace('&', 'y', utf8_encode($detenvio[0]['calle2_enviodirec'])) . '</lph:Xcalle_secundaria>
            <lph:Xreferencia>' . utf8_encode($detenvio[0]['referencia_enviodirec']) . '</lph:Xreferencia>
            <lph:Xnumero_celular>' . utf8_encode($detenvio[0]['tel1_enviodirec']) . '</lph:Xnumero_celular>
            <lph:Xid_rastreo>' . utf8_encode($tienda[0]['id_shippify']) . '</lph:Xid_rastreo>
            <lph:Xtipopago>' . utf8_encode($txt_formaenvio) . '</lph:Xtipopago>
            <lph:Xnroaprobtransaccion>' . utf8_encode($tienda[0]['num_tienda']) . '</lph:Xnroaprobtransaccion>
            <lph:Xtarcestado>APROBADO</lph:Xtarcestado>
            <lph:Xtarcfecha>' . utf8_encode($tienda[0]['fechatarjeta_tienda']) . '</lph:Xtarcfecha>
            <lph:Xtarcfranquicia>' . utf8_encode($tienda[0]['tipotarjeta_tienda']) . '</lph:Xtarcfranquicia>
            <lph:Xtarcnombre>' . utf8_encode($Xtarcnombre) . '</lph:Xtarcnombre>
            <lph:Xtarcidpagador>' . utf8_encode($Xtarcidpagador) . '</lph:Xtarcidpagador>
            <lph:Xtarcnombrecli>' . utf8_encode($Xtarcnombrecli) . '</lph:Xtarcnombrecli>
            <lph:Xtarcapellidocli>' . utf8_encode($Xtarcapellidocli) . '</lph:Xtarcapellidocli>
            <lph:Xtarcnumero>' . utf8_encode($tienda[0]['ultdigtarjeta_tienda']) . '</lph:Xtarcnumero>
            <lph:Xtarcvalortotal>' . $tienda[0]['varlortarjeta_tienda'] . '</lph:Xtarcvalortotal>
            <lph:Xsubtotal_iva>' . $tienda[0]['subtotal_tienda'] . '</lph:Xsubtotal_iva>
            <lph:Xsubtotal_siniva>' . $tienda[0]['subtotal2_tienda'] . '</lph:Xsubtotal_siniva>
            <lph:Xsubtotal>' . number_format(($tienda[0]['subtotal_tienda'] + $tienda[0]['subtotal2_tienda']), 2) . '</lph:Xsubtotal>
            <lph:Xdescuento_iva>' . $tienda[0]['valordesc_tienda'] . '</lph:Xdescuento_iva>
            <lph:Xdescuento_siniva>0</lph:Xdescuento_siniva>
            <lph:Xtotal>' . $tienda[0]['total_tienda'] . '</lph:Xtotal>
            <lph:Xstdfacturadeta>
            ' . $productos . '
            </lph:Xstdfacturadeta>
        </lph:WSLPH_EC_DatosFactura.Execute>
    </x:Body>
</x:Envelope>';
        return $xml_post_string;
    }

    public function fntienda_r_textoserverpruebaeco_xid($idtienda, $txt_formaenvio, $idenvio, $fact, $Xtarcnombre, $Xtarcidpagador, $Xtarcnombrecli, $Xtarcapellidocli) {
        $fntienda = new Fn_tienda();
        //seleccionar datos de productos 
        $productos = $fntienda->fntienda_r_textoproductserver_xid($idtienda);
        //seleccionar tienda
        $tienda = $fntienda->fntienda_r_tienda_xid($idtienda);
        //seleccionar datos de factura y envio 
        $detfactura = $fntienda->fntienda_r_factura_id($idenvio, $fact);
        //selecciones envio 
        $detenvio = $fntienda->fntienda_renvio_xid($idenvio);
        $idzona_envioserver = utf8_decode($detenvio[0]['id_zona']);
        $idzonapadre_envioserver = utf8_decode($detenvio[0]['codigopadre_zona']);
        $idzona_envio = $fntienda->fntienda_ridzonasrever_xid($idzona_envioserver);
        $idzonapadre_envio = $fntienda->fntienda_ridzonasrever_xid($idzonapadre_envioserver);
        $almacen = $fntienda->fntienda_ralmacen_xid($tienda[0]['id_almacen']);
        $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
                        <x:Envelope
    xmlns:x="http://schemas.xmlsoap.org/soap/envelope/"
    xmlns:eco="ECOMM"
    xmlns:sdt="SDTLPHECDatosFacturaDeta">
    <x:Header/>
    <x:Body>
        <eco:WSLPH_EC_DatosFactura.Execute>
            <eco:Xec_id_factura>' . $idtienda . '</eco:Xec_id_factura>
            <eco:Xfechapedido>' . utf8_encode($tienda[0]['fecha_tienda']) . '</eco:Xfechapedido>
            <eco:Xhorapedido>' . $tienda[0]['hora_tienda'] . '</eco:Xhorapedido>
            <eco:Xruc>' . utf8_encode($detfactura[0]['ruc_factura']) . '</eco:Xruc>
            <eco:Xnombres>' . utf8_encode($detfactura[0]['nombres_factura']) . '</eco:Xnombres>
            <eco:Xapellidos>' . utf8_encode($detfactura[0]['apellidos_factura']) . '</eco:Xapellidos>
            <eco:Xmail>' . utf8_encode($detfactura[0]['email_factura']) . '</eco:Xmail>
            <eco:Xagencia_factura>' . utf8_encode($almacen[0]['codigo_almacen']) . '</eco:Xagencia_factura>
            <eco:Xprovincia_codigo>' . utf8_encode($idzonapadre_envio) . '</eco:Xprovincia_codigo>
            <eco:Xcanton_codigo>' . utf8_encode($idzona_envio) . '</eco:Xcanton_codigo>
            <eco:Xcalle_principal>' . str_replace('&', 'y', utf8_encode($detenvio[0]['calle1_enviodirec'])) . '</eco:Xcalle_principal>
            <eco:Xcalle_secundaria>' . str_replace('&', 'y', utf8_encode($detenvio[0]['calle2_enviodirec'])) . '</eco:Xcalle_secundaria>
            <eco:Xreferencia>' . utf8_encode($detenvio[0]['referencia_enviodirec']) . '</eco:Xreferencia>
            <eco:Xnumero_celular>' . utf8_encode($detenvio[0]['tel1_enviodirec']) . '</eco:Xnumero_celular>
            <eco:Xid_rastreo>' . utf8_encode($tienda[0]['id_shippify']) . '</eco:Xid_rastreo>
            <eco:Xtipopago>' . utf8_encode($txt_formaenvio) . '</eco:Xtipopago>
            <eco:Xnroaprobtransaccion>' . utf8_encode($tienda[0]['num_tienda']) . '</eco:Xnroaprobtransaccion>
            <eco:Xtarcestado>APROBADO</eco:Xtarcestado>
            <eco:Xtarcfecha>' . utf8_encode($tienda[0]['fechatarjeta_tienda']) . '</eco:Xtarcfecha>
            <eco:Xtarcfranquicia>' . utf8_encode($tienda[0]['tipotarjeta_tienda']) . '</eco:Xtarcfranquicia>
            <eco:Xtarcnombre>' . utf8_encode($Xtarcnombre) . '</eco:Xtarcnombre>
            <eco:Xtarcidpagador>' . utf8_encode($Xtarcidpagador) . '</eco:Xtarcidpagador>
            <eco:Xtarcnombrecli>' . utf8_encode($Xtarcnombrecli) . '</eco:Xtarcnombrecli>
            <eco:Xtarcapellidocli>' . utf8_encode($Xtarcapellidocli) . '</eco:Xtarcapellidocli>
            <eco:Xtarcnumero>' . utf8_encode($tienda[0]['ultdigtarjeta_tienda']) . '</eco:Xtarcnumero>
            <eco:Xtarcvalortotal>' . $tienda[0]['varlortarjeta_tienda'] . '</eco:Xtarcvalortotal>
            <eco:Xsubtotal_iva>' . $tienda[0]['subtotal_tienda'] . '</eco:Xsubtotal_iva>
            <eco:Xsubtotal_siniva>' . $tienda[0]['subtotal2_tienda'] . '</eco:Xsubtotal_siniva>
            <eco:Xsubtotal>' . number_format(($tienda[0]['subtotal_tienda'] + $tienda[0]['subtotal2_tienda']), 2) . '</eco:Xsubtotal>
            <eco:Xdescuento_iva>' . $tienda[0]['valordesc_tienda'] . '</eco:Xdescuento_iva>
            <eco:Xdescuento_siniva>0</eco:Xdescuento_siniva>
            <eco:Xtotal>' . $tienda[0]['total_tienda'] . '</eco:Xtotal>
            <eco:Xstdfacturadeta>
            ' . $productos . '
            </eco:Xstdfacturadeta>
        </eco:WSLPH_EC_DatosFactura.Execute>
    </x:Body>
</x:Envelope>';
        return $xml_post_string;
    }

    function fntienda_rtienda_x($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from tienda t, envio e "
                . " where  e.id_enviodirec = t.id_enviodirec and "
                . " id_tienda=" . $id . " limit 0,1";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, no existe la categoría.";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_tienda' => $menu['id_tienda'],
                'num_tienda' => $menu['num_tienda'],
                'fecha_tienda' => $menu['fecha_tienda'],
                'hora_tienda' => $menu['hora_tienda'],
                'id_usuario' => $menu['id_usuario'],
                'total_tienda' => $menu['total_tienda'],
                'subtotal_tienda' => $menu['subtotal_tienda'],
                'subtotal2_tienda' => $menu['subtotal2_tienda'],
                'descuento_tienda' => $menu['descuento_tienda'],
                'valordesc_tienda' => $menu['valordesc_tienda'],
                'iva_tienda' => $menu['iva_tienda'],
                'id_envio' => $menu['id_envio'],
                'id_formapago' => $menu['id_formapago'],
                'estado_tienda' => $menu['estado_tienda'],
                'id_enviodirec' => $menu['id_enviodirec'],
                'nombre_enviodirec' => $menu['nombre_enviodirec'],
                'apellido_enviodirec' => $menu['apellido_enviodirec'],
                'calle1_enviodirec' => $menu['calle1_enviodirec'],
                'calle2_enviodirec' => $menu['calle2_enviodirec'],
                'sector_enviodirec' => $menu['sector_enviodirec'],
                'numcasa_enviodirec' => $menu['numcasa_enviodirec'],
                'referencia_enviodirec' => $menu['referencia_enviodirec'],
                'tel1_enviodirec' => $menu['tel1_enviodirec'],
                'tel2_enviodirec' => $menu['tel2_enviodirec'],
                'observa_enviodirec' => $menu['observa_enviodirec'],
                'tipov_enviodirec' => $menu['tipov_enviodirec'],
                'edificio_enviodirec' => $menu['edificio_enviodirec'],
                'piso_enviodirec' => $menu['piso_enviodirec'],
                'urbani_enviodirec' => $menu['urbani_enviodirec'],
                'numcasau_enviodirec' => $menu['numcasau_enviodirec'],
                'corx_enviodirec' => $menu['corx_enviodirec'],
                'cory_enviodirec' => $menu['cory_enviodirec'],
                'latitud_enviodirec' => $menu['latitud_enviodirec'],
                'longitud_enviodirec' => $menu['longitud_enviodirec'],
                'nombres_factura' => $menu['nombres_factura'],
                'apellidos_factura' => $menu['apellidos_factura'],
                'dire1_factura' => $menu['dire1_factura'],
                'ruc_factura' => $menu['ruc_factura'],
                'tel1_factura' => $menu['tel1_factura'],
                'nacionalidad_factura' => $menu['nacionalidad_factura'],
                'email_factura' => $menu['email_factura'],
                'email_enviodirec' => $menu['email_enviodirec'],
                'id_shippify' => $menu['id_shippify'],
                'id_factura' => $menu['id_factura'],
                'id_almacen' => $menu['id_almacen'],
                'requestId_tienda' => $menu['requestId_tienda'],
                'requestId_tienda' => $menu['requestId_tienda'],
                'id_vendedor' => $menu['id_vendedor']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_c_error_x() {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "insert into errores (nombre_error) "
                . " values('aa') ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    function fntienda_r_inpsession_xid($id) {
        if ($id == 1) {
            $txt = 'Soy usuario concurrente, iniciar sesión';
        }
        if ($id == 2) {
            $txt = 'Soy nuevo, registrarme';
        }
        if ($id == 3) {
            $txt = 'Continuar como invitado';
        }
        return $txt;
    }

    public function fntienda_envioservereco_xid($idtienda, $txt_formaenvio, $idenvio, $fact, $Xtarcnombre, $Xtarcidpagador, $Xtarcnombrecli, $Xtarcapellidocli) {
        $fntienda = new Fn_tienda();
        $url = "http://200.7.195.89/ecommerce/servlet/awslph_ec_datosfactura";
        $xml_post_string = $fntienda->fntienda_r_textoservereco_xid($idtienda, $txt_formaenvio, $idenvio, $fact, $Xtarcnombre, $Xtarcidpagador, $Xtarcnombrecli, $Xtarcapellidocli);
        $headers = array(
            "Content-type: text/xml;charset=utf-8",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: ECOMMaction/AWSLPH_EC_DATOSFACTURA.Execute",
            "Content-length: " . strlen($xml_post_string),
        );
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 1800);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        //pritnt_r($result);
    }

    public function fntienda_r_textoservereco_xid($idtienda, $txt_formaenvio, $idenvio, $fact, $Xtarcnombre, $Xtarcidpagador, $Xtarcnombrecli, $Xtarcapellidocli) {
        $fntienda = new Fn_tienda();
        //seleccionar datos de productos 
        $productos = $fntienda->fntienda_r_textoproductserver_xid($idtienda);
        //seleccionar tienda
        $tienda = $fntienda->fntienda_r_tienda_xid($idtienda);
        //seleccionar datos de factura y envio 
        $detfactura = $fntienda->fntienda_r_factura_id($idenvio, $fact);
        //selecciones envio 
        $detenvio = $fntienda->fntienda_renvio_xid($idenvio);
        $idzona_envioserver = utf8_decode($detenvio[0]['id_zona']);
        $idzonapadre_envioserver = utf8_decode($detenvio[0]['codigopadre_zona']);
        $idzona_envio = $fntienda->fntienda_ridzonasrever_xid($idzona_envioserver);
        $idzonapadre_envio = $fntienda->fntienda_ridzonasrever_xid($idzonapadre_envioserver);
        $almacen = $fntienda->fntienda_ralmacen_xid($tienda[0]['id_almacen']);
        $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
                        <x:Envelope
    xmlns:x="http://schemas.xmlsoap.org/soap/envelope/"
    xmlns:eco="ECOMM"
    xmlns:sdt="SDTLPHECDatosFacturaDeta">
    <x:Header/>
    <x:Body>
        <eco:WSLPH_EC_DatosFactura.Execute>
            <eco:Xec_id_factura>' . $idtienda . '</eco:Xec_id_factura>
            <eco:Xfechapedido>' . utf8_encode($tienda[0]['fecha_tienda']) . '</eco:Xfechapedido>
            <eco:Xhorapedido>' . utf8_encode($tienda[0]['hora_tienda']) . '</eco:Xhorapedido>
            <eco:Xruc>' . utf8_encode($detfactura[0]['ruc_factura']) . '</eco:Xruc>
            <eco:Xnombres>' . utf8_encode($detfactura[0]['nombres_factura']) . '</eco:Xnombres>
            <eco:Xapellidos>' . utf8_encode($detfactura[0]['apellidos_factura']) . '</eco:Xapellidos>
            <eco:Xmail>' . utf8_encode($detfactura[0]['email_factura']) . '</eco:Xmail>
            <eco:Xagencia_factura>' . utf8_encode($almacen[0]['codigo_almacen']) . '</eco:Xagencia_factura>
            <eco:Xprovincia_codigo>' . utf8_encode($idzonapadre_envio) . '</eco:Xprovincia_codigo>
            <eco:Xcanton_codigo>' . utf8_encode($idzona_envio) . '</eco:Xcanton_codigo>
            <eco:Xcalle_principal>' . str_replace('&', 'y', utf8_encode($detenvio[0]['calle1_enviodirec'])) . '</eco:Xcalle_principal>
            <eco:Xcalle_secundaria>' . str_replace('&', 'y', utf8_encode($detenvio[0]['calle2_enviodirec'])) . '</eco:Xcalle_secundaria>
            <eco:Xreferencia>' . utf8_encode($detenvio[0]['referencia_enviodirec']) . '</eco:Xreferencia>
            <eco:Xnumero_celular>' . utf8_encode($detenvio[0]['tel1_enviodirec']) . '</eco:Xnumero_celular>
            <eco:Xid_rastreo>' . utf8_encode($tienda[0]['id_shippify']) . '</eco:Xid_rastreo>
            <eco:Xtipopago>' . utf8_encode($txt_formaenvio) . '</eco:Xtipopago>
            <eco:Xnroaprobtransaccion>' . utf8_encode($tienda[0]['num_tienda']) . '</eco:Xnroaprobtransaccion>
            <eco:Xtarcestado>APROBADO</eco:Xtarcestado>
            <eco:Xtarcfecha>' . utf8_encode($tienda[0]['fechatarjeta_tienda']) . '</eco:Xtarcfecha>
            <eco:Xtarcfranquicia>' . utf8_encode($tienda[0]['tipotarjeta_tienda']) . '</eco:Xtarcfranquicia>
            <eco:Xtarcnombre>' . utf8_encode($Xtarcnombre) . '</eco:Xtarcnombre>
            <eco:Xtarcidpagador>' . utf8_encode($Xtarcidpagador) . '</eco:Xtarcidpagador>
            <eco:Xtarcnombrecli>' . utf8_encode($Xtarcnombrecli) . '</eco:Xtarcnombrecli>
            <eco:Xtarcapellidocli>' . utf8_encode($Xtarcapellidocli) . '</eco:Xtarcapellidocli>
            <eco:Xtarcnumero>' . utf8_encode($tienda[0]['ultdigtarjeta_tienda']) . '</eco:Xtarcnumero>
            <eco:Xtarcvalortotal>' . $tienda[0]['varlortarjeta_tienda'] . '</eco:Xtarcvalortotal>
            <eco:Xsubtotal_iva>' . $tienda[0]['subtotal_tienda'] . '</eco:Xsubtotal_iva>
            <eco:Xsubtotal_siniva>' . $tienda[0]['subtotal2_tienda'] . '</eco:Xsubtotal_siniva>
            <eco:Xsubtotal>' . number_format(($tienda[0]['subtotal_tienda'] + $tienda[0]['subtotal2_tienda']), 2) . '</eco:Xsubtotal>
            <eco:Xdescuento_iva>' . $tienda[0]['valordesc_tienda'] . '</eco:Xdescuento_iva>
            <eco:Xdescuento_siniva>0</eco:Xdescuento_siniva>
            <eco:Xtotal>' . $tienda[0]['total_tienda'] . '</eco:Xtotal>
            <eco:Xstdfacturadeta>
            ' . $productos . '
            </eco:Xstdfacturadeta>
        </eco:WSLPH_EC_DatosFactura.Execute>
    </x:Body>
</x:Envelope>';
        return $xml_post_string;
    }

    public function fnseg_c_segui_datos($id_pedido, $tipo_seg, $nivel_seg, $error, $estado) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $sql = "insert into seguimineto (fecha_seg, hora_seg, id_pedido, tipo_seg, nivel_seg, error_seg, estado_seg) "
                . " values('" . $fecha . "','" . $hora . "', $id_pedido, $tipo_seg, $nivel_seg,'" . $error . "', $estado) ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    public function fntienda_c_trabajo_datos($nombre, $email, $aspiracions, $area, $cv, $comentario) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "insert into trabajo (nombre_trabajo, email_trabajo, aspiracions_trabajo, area_trabajo, cv_trabajo, comentario_trabajo) "
                . " values('" . $nombre . "', '$email', '$aspiracions', '$area','" . $cv . "', '$comentario') ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    public function fnseg_c_cotizar_datos($idcatizar, $nombre_cotizar, $apellido_cotizar, $email_cotizar, $file_cotizar,
            $telefono1_cotizar, $telefono2_cotizar, $comentario_cotizar, $ciudad_cotizar, $sector, $adjunto, $estado_cotizar) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $sql = "insert into cotiza_rapido (id_cotizar, nombre_cotizar, apellido_cotizar, "
                . " email_cotizar, file_cotizar, telefono1_cotizar, telefono2_cotizar, "
                . " comentario_cotizar, estado_cotizar,fecha_cotizar, hora_cotizar, ciudad_cotizar,sector_cotizar,adjunto_cotizar) "
                . " values($idcatizar, '$nombre_cotizar','$apellido_cotizar', '$email_cotizar', '$file_cotizar',"
                . " '$telefono1_cotizar','$telefono2_cotizar', '$comentario_cotizar', $estado_cotizar,"
                . " '$fecha', '$hora', '$ciudad_cotizar','$sector',$adjunto) ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    public function fnseg_c_trabajo_datos($nombre_trabajo, $email_trabajo, $aspiracions_trabajo,
            $area_trabajo, $cv_trabajo, $comentario_trabajo, $telefono_trabajo, $discapacidad_trabajo) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $sql = "insert into trabajo (nombre_trabajo, email_trabajo, "
                . " aspiracions_trabajo, area_trabajo, cv_trabajo, "
                . " comentario_trabajo, telefono_trabajo, estado_trabajo, fecha_trabajo, hora_trabajo, discapacidad_trabajo) "
                . " values('$nombre_trabajo','$email_trabajo', '$aspiracions_trabajo',"
                . " '$area_trabajo','$cv_trabajo', '$comentario_trabajo', '$telefono_trabajo', 0,'$fecha','$hora', '$discapacidad_trabajo') ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = $mysqlidato->insert_id;
        }
        return $cuenta;
    }

    function fntienda_rtrabajo_email($email) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT count(id_trabajo) as cuenta from trabajo where email_trabajo='$email' limit 0,1";
        //echo "AQUI LA CONSULTA".$sql2;
        $arreglo = 0;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fntienda_rtrabajo_id -- fntienda.";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['cuenta'];
        }
        $mysqlidato->close();
        return $arreglo;
    }

    public function fntienda_ctiendapend_xstep2($idusu_open) {
        $fntienda = new Fn_tienda();
        if (isset($_SESSION['sesiontotales']) && isset($_SESSION['tiendaitsa'])) {
            $arreglototal = $_SESSION['sesiontotales'];
            $total = $arreglototal[0]['Total'];
            $descuento = $arreglototal[0]['Descuento'];
            $valordescuento = $arreglototal[0]['ValorDescuento'];
            $iva = $arreglototal[0]['Iva'];
            $subtotal = $arreglototal[0]['Subtotalconiva'];
            $subtotalsiniva = $arreglototal[0]['Subtotalsiniva'];
            $subtotalsindesc = $arreglototal[0]['Subtotal'];
            $idtienda = $fntienda->fntienda_rpedipend_id();
            $numtienda = 'ITSA-' . $idtienda . time();
            $plataformap = 0;
            $step = 2;
            $fecha = date('Y-m-d');
            $hora = date('H:m:s');
            //ingresar pedidos pendientes
            $cuenta = $fntienda->fntienda_cpendtotales_x($idtienda, $plataformap, $step, $numtienda, $subtotalsindesc,
                    $subtotalsiniva, $subtotal, $iva, $valordescuento, $descuento, $total, $fecha, $hora, $idusu_open);
            if ($cuenta == 1) {
                $infostore = $_SESSION['infostore'];
                $infostore[0]['id_usu'] = $idusu_open;
                $infostore[0]['id_tienda'] = $idtienda;
                $_SESSION['infostore'] = $infostore;
                $fntienda->fntienda_cpendproductos_xid($idtienda);
            }
        }
    }

    function fntienda_cpendtotales_x($idtienda, $plataformap, $step, $numtienda, $subtotalsindesc,
            $subtotalsiniva, $subtotal, $iva, $valordescuento, $descuento, $total, $fecha, $hora, $idusu_open) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();

        $sql = "insert into tiendapendiente (id_tienda, plataformap_tienda, step_tienda, num_tienda, "
                . " subtotalsindesc_tienda, subtotal2_tienda, subtotal_tienda,  iva_tienda, valordesc_tienda, "
                . " descuento_tienda, total_tienda, fecha_tienda, hora_tienda, id_usuario) "
                . "values ($idtienda ,$plataformap,$step, '" . $numtienda . "', $subtotalsindesc, $subtotalsiniva, $subtotal, $iva, "
                . " $valordescuento, $descuento, $total, '$fecha', '$hora', $idusu_open)";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    function fntienda_cpendproductos_xid($idtienda) {
        $fntienda = new Fn_tienda();
        $tiendaproducto = $_SESSION['tiendaitsa'];
        $setprodtienda = "insert into tiendaproductopendiente (id_tienda,id_prod,cant_tiendaprod,total_tiendaprod,estado_tiendaprod,desc_tiendaprod) values ";
        $jsonprod = '';
        for ($i = 0; $i < count($tiendaproducto); $i++) {
            $jsonprod .= '{"idProd": "' . $tiendaproducto[$i]['Id'] . '", "codProd": "' . $tiendaproducto[$i]['Codigo'] . '" , "cantidadProd": "' . $tiendaproducto[$i]['Cantidad'] . '"},';
            $total_prod = number_format(($tiendaproducto[$i]['Cantidad'] * $tiendaproducto[$i]['Precio1']), 2);
            $desc_prod = number_format($tiendaproducto[$i]['Descprod'], 2);
            $total_prod = str_replace(',', '', $total_prod);
            $desc_prod = str_replace(',', '', $desc_prod);
            $setprodtienda = $setprodtienda . " (" . $idtienda . "," . $tiendaproducto[$i]['Id'] . "," . $tiendaproducto[$i]['Cantidad'] . ""
                    . "," . $total_prod . ",0," . $desc_prod . "),";
        }
        $setprodtienda = trim($setprodtienda, ',');
        $setprodtienda = $setprodtienda . ';';
        $insertaproductos = $fntienda->fntienda_csql_x($setprodtienda);
    }

    function fntienda_rpedipend_id() {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fecha = date('Y-m-d');
        $sql2 = "SELECT id_tienda from tiendapendiente order by id_tienda desc limit 0,1";
        //echo "AQUI LA CONSULTA".$sql2;
        $arreglo = 1;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fntienda_rpedipend_id -- fntienda.";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['id_tienda'] + 1;
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_upend_xstep3($idtienda, $step, $idenvio) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = " UPDATE tiendapendiente SET id_enviodirec = $idenvio , step_tienda = $step WHERE id_tienda = $idtienda ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    function fntienda_upend_xstep4($idtienda, $step, $fact) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = " UPDATE tiendapendiente SET id_factura = $fact , step_tienda = $step WHERE id_tienda = $idtienda ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    function fntienda_upend_xstep5($idtienda, $step, $formapago) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = " UPDATE tiendapendiente SET id_formapago = $formapago , step_tienda = $step WHERE id_tienda = $idtienda ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    public function fntienda_utiendapend_xstep2($idusu_open, $idtienda) {
        $fntienda = new Fn_tienda();
        if (isset($_SESSION['sesiontotales']) && isset($_SESSION['tiendaitsa'])) {
            $arreglototal = $_SESSION['sesiontotales'];
            $total = $arreglototal[0]['Total'];
            $descuento = $arreglototal[0]['Descuento'];
            $valordescuento = $arreglototal[0]['ValorDescuento'];
            $iva = $arreglototal[0]['Iva'];
            $subtotal = $arreglototal[0]['Subtotalconiva'];
            $subtotalsiniva = $arreglototal[0]['Subtotalsiniva'];
            $subtotalsindesc = $arreglototal[0]['Subtotal'];
            $plataformap = 0;
            $numtienda = '';
            $step = 2;
            $fecha = date('Y-m-d');
            $hora = date('H:m:s');
            //ingresar pedidos pendientes
            $cuenta = $fntienda->fntienda_upendtotales_x($idtienda, $plataformap, $step, $numtienda, $subtotalsindesc,
                    $subtotalsiniva, $subtotal, $iva, $valordescuento, $descuento, $total, $fecha, $hora, $idusu_open);
            if ($cuenta == 1) {
                $fntienda->fntienda_dpendproductos_xid($idtienda);
                $fntienda->fntienda_cpendproductos_xid($idtienda);
            }
        }
    }

    function fntienda_upendtotales_x($idtienda, $plataformap, $step, $numtienda, $subtotalsindesc,
            $subtotalsiniva, $subtotal, $iva, $valordescuento, $descuento, $total, $fecha, $hora, $idusu_open) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();

        $sql = "update tiendapendiente set step_tienda = $step , subtotalsindesc_tienda = $subtotalsindesc , "
                . " subtotal2_tienda = $subtotalsiniva , subtotal_tienda = $subtotal , iva_tienda = $iva , valordesc_tienda = $valordescuento , "
                . " descuento_tienda = $descuento , total_tienda = $total , fecha_tienda = '$fecha', hora_tienda = '$hora' "
                . " where id_tienda = $idtienda ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    function fntienda_dpendproductos_xid($idtienda) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();

        $sql = "delete from tiendaproductopendiente where id_tienda = $idtienda ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    function fntienda_utiendapend_xid($idtienda, $estado) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();

        $sql = "update tiendapendiente set estado_tienda = $estado where id_tienda = $idtienda ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    function fntienda_r_cotizar_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from cotiza_rapido c, zona z "
                . "  where id_cotizar = " . $id . " and z.id_zona=c.ciudad_cotizar  ";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, error en fntienda_r_cotizar_xid.";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_cotizar' => $menu['id_cotizar'],
                'nombre_cotizar' => $menu['nombre_cotizar'],
                'apellido_cotizar' => $menu['apellido_cotizar'],
                'email_cotizar' => $menu['email_cotizar'],
                'file_cotizar' => $menu['file_cotizar'],
                'telefono1_cotizar' => $menu['telefono1_cotizar'],
                'telefono2_cotizar' => $menu['telefono2_cotizar'],
                'comentario_cotizar' => $menu['comentario_cotizar'],
                'estado_cotizar' => $menu['estado_cotizar'],
                'fecha_cotizar' => $menu['fecha_cotizar'],
                'hora_cotizar' => $menu['hora_cotizar'],
                'ciudad_cotizar' => $menu['ciudad_cotizar'],
                'id_zona' => $menu['id_zona'],
                'lugar_zona' => $menu['lugar_zona'],
                'sector_cotizar' => $menu['sector_cotizar'],
                'adjunto_cotizar' => $menu['adjunto_cotizar']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_sendemail_cotr($idcotiza, $email) {
        $fntienda = new Fn_tienda();
        $detcotiza = $fntienda->fntienda_r_cotizar_xid($idcotiza);
        require '../phpmailer/PHPMailerAutoload.php';
        require '../controlador/datosmailnew.php';
        $adjunto = $detcotiza[0]['adjunto_cotizar'];
        $html = '<table style="width: 100%; ">
    <tr style="background-color: #0763a9; border-radius: 20px;">
        <td style="text-align: center;"><img style="padding: 40px 20px;" src="https://geroneto.com/images/logo-white.png"> </td>
    </tr>
    <tr style="background-color: #0763a9">
        <td style="text-align: center; color: white; font-weight: 600; padding: 15px 15px;">COTIZACIÓN RÁPIDA' . utf8_encode($detcotiza[0]['id_cotizar']) . '</td>
    </tr> 
</table>
<table style="width: 100%; padding-left: 10%;">
    <tr>
        <td>
            <label style="font-weight: 600;"> Nombres y Apellidos: </label><label>
                ' . utf8_encode($detcotiza[0]['nombre_cotizar'] . ' ' . $detcotiza[0]['apellido_cotizar']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Teléfono: </label><label> ' . utf8_encode($detcotiza[0]['telefono1_cotizar']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Celular: </label><label> ' . utf8_encode($detcotiza[0]['telefono2_cotizar']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Email: </label><label> ' . utf8_encode($detcotiza[0]['email_cotizar']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Ciudad: </label><label> ' . utf8_encode($detcotiza[0]['lugar_zona']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Sector: </label><label> ' . utf8_encode($detcotiza[0]['sector_cotizar']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Observación: </label><label> ' . utf8_encode($detcotiza[0]['comentario_cotizar']) . '</label>
        </td>
    </tr>';
        if ($adjunto == 1) {
            $html .= '<tr>
        <td>
            <label style="font-weight: 600;"> Archivo: </label><a href="https://geroneto.com/documentos/' . utf8_encode($detcotiza[0]['file_cotizar']) . '"> ' . utf8_encode($detcotiza[0]['file_cotizar']) . '</a>
        </td>';
        } else {
            $html .= '<tr>
        <td>
            <label style="font-weight: 600;"> NO EXISTE ARCHIVO ADJUNTO </label>
        </td>';
        }


        $html .= '</tr>
</table>
<table style="width: 100%; margin-top: 100px;">
                <tr>
                    <td style="text-align: center;"><img src="https://geroneto.com/images/proforma.png" style="width: 50%;"> </td>
                </tr>
            </table>
<table style="width: 100%; padding-left: 100px; margin-top: 100px;">
    <tr>
        <td style="width: 60%;">
            <small> * Mensaje generado automáticamente, por favor no responder. </small>
        </td>
        <td style="width: 40%; text-align: right;">
        </td>
    </tr>
</table>';

        $datosserver = new datoServer();
        $server = $datosserver->url_1();
        $emails = $datosserver->email_1();
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->SMTPAutoTLS = false;
        $mail->Host = $server['host'];
        $mail->Port = $server['puerto'];
        $mail->SMTPAuth = true;
        $mail->Username = $server['user'];
        $mail->Password = $server['pass'];
        $mail->setFrom($server['user'], 'Asignación cotización ' . $header_email . ' GERONETO');
        //$mail->addAddress($email, 'Cotización  GERONETO ');
        $mail->addAddress('mercadeo@geroneto.com', 'Cotización GERONETO ');
        $mail->addBCC('jjoneto@geroneto.com', 'Cotización GERONETO ');
        $mail->addBCC('imarin@geroneto.com', 'Cotización GERONETO ');
        $mail->addBCC('mercadeo1@geroneto.com', 'Cotización GERONETO ');
        /* $mail->addCC('info@geroneto.com', 'Cotización  GERONETO '); */
        $mail->Subject = 'Cotización rápida GERONETO';
        $uniqueid = uniqid('np');
        $mail->CharSet = 'UTF-8';
        $mail->msgHTML($html);
        $mail->AltBody = 'This is a plain-text message body';

        //Set the subject line
        // $message = $html;
        if ($mail->send()) {
            return 1;
        } else {
            return 2;
        }
        // echo $html;
    }

    function fntienda_sendemail_tienda1($idcotiza, $email) {
        $fntienda = new Fn_tienda();
        $dettienda = $fntienda->fntienda_r_dettienda_xid($idcotiza);
        require '../phpmailer/PHPMailerAutoload.php';
        $html = '<table style="width: 100%; ">
    <tr style="background-color: #0763a9; border-radius: 20px;">
        <td style="text-align: center;"><img style="padding: 40px 20px;" src="https://geroneto.com/images/logo-white.png"> </td>
    </tr>
    <tr style="background-color: #0763a9">
        <td style="text-align: center; color: white; font-weight: 600; padding: 15px 15px;">COTIZACIÓN ' . utf8_encode($dettienda[0]['num_tienda']) . ' </td>
    </tr> 
</table>
<table style="width: 100%; padding-left: 10%;">
    <tr>
        <td>
            <label style="font-weight: 600;"> Nombres y Apellidos: </label><label> ' . utf8_encode($dettienda[0]['nombre_enviodirec'] . ' ' . $dettienda[0]['apellido_enviodirec']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Teléfono: </label><label> ' . utf8_encode($dettienda[0]['tel1_enviodirec']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Celular: </label><label> ' . utf8_encode($dettienda[0]['tel2_enviodirec']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Email: </label><label> ' . utf8_encode($dettienda[0]['email_enviodirec']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Mensaje: </label><label> ' . utf8_encode($dettienda[0]['referencia_enviodirec']) . '</label>
        </td>
    </tr>
</table>
<table style="width: 100%; padding-left: 10%;">
    <tr>
        <td style="border: 1px solid #000; background-color: silver;">
            <label style="font-weight: 600;"><center>PRODUCTO</center></label>
        </td>
        <td style="border: 1px solid #000; background-color: silver;">
            <label style="font-weight: 600;"><center>CÓDIGO</center></label>
        </td>
        <td style="border: 1px solid #000; background-color: silver;">
            <label style="font-weight: 600;"><center>CANTIDAD</center></label>
        </td>
    </tr>';
        $prodtienda = $fntienda->fntienda_rtiendaprod_xidtienda($idcotiza);
        while ($menu = $prodtienda->fetch_assoc()) {

            $html .= '<tr>
        <td style="border: 1px solid #000;">
            <p>' . utf8_encode($menu['nombre_prod']) . '</p>
        </td>
        <td style="border: 1px solid #000;">
            <p>' . utf8_encode($menu['cod_prod']) . '</p>
        </td>
        <td style="border: 1px solid #000;">
    <center><p>' . utf8_encode($menu['cant_tiendaprod']) . '</p></center>
</td>
</tr>';
        }
        $html .= '</table>
            <table style="width: 100%; margin-top: 100px;">
                <tr>
                    <td style="text-align: center;"><img src="https://geroneto.com/images/proforma.png" style="width: 50%;"> </td>
                </tr>
            </table>
<table style="width: 100%; padding-left: 100px; margin-top: 100px;">
    <tr>
        <td style="width: 60%;">
            <small> * Mensaje generado automáticamente, por favor no responder. </small>
        </td>
        <td style="width: 40%; text-align: right;">
        </td>
    </tr>
</table>';
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //Ask for HTML-friendly debug output
        //$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
        $mail->SMTPAutoTLS = true;
        //Set the hostname of the mail server
        $mail->Host = "mail.geroneto.com";
        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = 26;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication
        $mail->Username = "noreply@geroneto.com";
        //Password to use for SMTP authentication
        $mail->Password = "noreply2021";
        //Set who the message is to be sent from
        $mail->setFrom('noreply@geroneto.com', 'Cotización GERONETO');
        //Set who the message is to be sent to
        //$mail->addAddress(trim($email), 'Cotización SIMETRIC ');
        //$mail->addBCC(trim('stalinp@supaysoft.net'), 'Cotización GERONETO ');
        //$mail->addAddress(trim('stalin-1649@live.com'), 'Cotización  GERONETO ');

        $mail->addBCC(trim('jjoneto@geroneto.com'), 'Cotización GERONETO ');
        $mail->addBCC(trim('mercadeo@geroneto.com'), 'Cotización GERONETO ');
        $mail->addBCC(trim('imarin@geroneto.com'), 'Cotización GERONETO ');
        $mail->addCC(trim('info@geroneto.com'), 'Cotización  GERONETO ');
        $mail->addBCC('mercadeo1@geroneto.com', 'Cotización GERONETO ');
        $mail->addAddress(trim(utf8_encode($dettienda[0]['email_enviodirec'])), 'Cotización  GERONETO ');

        //Set the subject line
        $mail->Subject = 'Cotización GERONETO ';
        $uniqueid = uniqid('np');
        $message = $html;
        $mail->CharSet = 'UTF-8';
        $mail->msgHTML($message);
        $mail->AltBody = 'This is a plain-text message body';
        if ($mail->send()) {
            return 1;
        } else {
            return 2;
        }
    }

    function fntienda_msgemail_tienda($idcotiza, $email) {
        $fntienda = new Fn_tienda();
        $dettienda = $fntienda->fntienda_r_dettienda_xid($idcotiza);
        $html = '<table style="width: 100%; ">
    <tr style="background-color: #0763a9; border-radius: 20px;">
        <td style="text-align: center;"><img style="padding: 40px 20px;" src="https://geroneto.com/images/logo-white.png"> </td>
    </tr>
    <tr style="background-color: #0763a9">
        <td style="text-align: center; color: white; font-weight: 600; padding: 15px 15px;">COTIZACIÓN ' . utf8_encode($dettienda[0]['num_tienda']) . ' </td>
    </tr> 
</table>
<table style="width: 100%; padding-left: 10%;">
    <tr>
        <td>
            <label style="font-weight: 600;"> Nombres y Apellidos: </label><label> ' . utf8_encode($dettienda[0]['nombre_enviodirec'] . ' ' . $dettienda[0]['apellido_enviodirec']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Teléfono: </label><label> ' . utf8_encode($dettienda[0]['tel1_enviodirec']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Celular: </label><label> ' . utf8_encode($dettienda[0]['tel2_enviodirec']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Email: </label><label> ' . utf8_encode($dettienda[0]['email_enviodirec']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Mensaje: </label><label> ' . utf8_encode($dettienda[0]['referencia_enviodirec']) . '</label>
        </td>
    </tr>
</table>
<table style="width: 100%; padding-left: 10%;">
    <tr>
        <td style="border: 1px solid #000; background-color: silver;">
            <label style="font-weight: 600;"><center>IMAGEN</center></label>
        </td>
        <td style="border: 1px solid #000; background-color: silver;">
            <label style="font-weight: 600;"><center>PRODUCTO</center></label>
        </td>
        <td style="border: 1px solid #000; background-color: silver;">
            <label style="font-weight: 600;"><center>CÓDIGO</center></label>
        </td>
        <td style="border: 1px solid #000; background-color: silver;">
            <label style="font-weight: 600;"><center>CANTIDAD</center></label>
        </td>
    </tr>';
        $prodtienda = $fntienda->fntienda_rtiendaprod_xidtienda($idcotiza);
        while ($menu = $prodtienda->fetch_assoc()) {
            $tupla = $fntienda->fntienda_rprod_x($menu['id_prod']);
            $imagen = "";
            if ($tupla[0]['grupo_catprod'] == 0) {
                $imagen = $tuplaimg[0]['url_imgxprod'];
            } else if ($tupla[0]['grupo_catprod'] == 1) {
                $imagen = $tuplaimgcategoria[0]['url_imgxcat'];
            }
            if ($imagen == "") {
                $url = "https://www.geroneto.com/images/favicon.png";
            } else {
                $url = "https://www.geroneto.com/images/" . $imagen;
            }
            $html .= '<tr>
        <td style="border: 1px solid #000;">
            <img src="' . $url . '" width="100">
        </td>
        <td style="border: 1px solid #000;">
            <p>' . utf8_encode($menu['nombre_prod']) . '</p>
        </td>
        <td style="border: 1px solid #000;">
            <p>' . utf8_encode($menu['cod_prod']) . '</p>
        </td>
        <td style="border: 1px solid #000;">
    <center><p>' . utf8_encode($menu['cant_tiendaprod']) . '</p></center>
</td>
</tr>';
        }
        $html .= '</table>
            <table style="width: 100%; margin-top: 100px;">
                <tr>
                    <td style="text-align: center;"><img src="https://geroneto.com/images/proforma.png" style="width: 50%;"> </td>
                </tr>
            </table>
<table style="width: 100%; padding-left: 100px; margin-top: 100px;">
    <tr>
        <td style="width: 60%;">
            <small> * Mensaje generado automáticamente, por favor no responder. </small>
        </td>
        <td style="width: 40%; text-align: right;">
        </td>
    </tr>
</table>';
        return $html;
    }

    function fntienda_sendemail_tienda($mensaje, $email_vendedor) {
        require '../phpmailer/PHPMailerAutoload.php';
        require '../controlador/datosmail.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAutoTLS = true;
        $mail->Host = $hostmail;
        $mail->Port = $puertomail;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->SMTPAuth = true;
        $mail->Username = $usuariomail;
        $mail->Password = $passwordmail;

        //Correo Stalin
        //$mail->addAddress("stalin-1649@live.com", 'Cotización GERONETO ');

        $mail->addAddress(trim($mailmercadeo), 'Cotización GERONETO ');
        $mail->addAddress(trim($mailinfo), 'Cotización GERONETO ');
        $mail->addAddress('mercadeo1@geroneto.com', 'Cotización GERONETO');

        $mail->Subject = 'Cotización GERONETO ';
        $uniqueid = uniqid('np');
        $message = $mensaje;
        $mail->CharSet = 'UTF-8';
        $mail->msgHTML($message);
        $mail->AltBody = 'This is a plain-text message body';
        if ($mail->send()) {
            return 1;
        } else {
            return 2;
        }



        /*
          require '../phpmailer/PHPMailerAutoload.php';
          require '../controlador/datosmailnew.php';
          $datosserver=new datoServer();
          $server=$datosserver->url_1();
          $emails=$datosserver->email_1();
          $mail = new PHPMailer;
          $mail->isSMTP();
          $mail->SMTPDebug = 0;
          $mail->SMTPAutoTLS = true;
          $mail->Host = $server['host'];
          $mail->Port = $server['puerto'];
          $mail->SMTPOptions = array(
          'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
          )
          );
          $mail->SMTPAuth = true;
          $mail->Username = $server['user'];
          $mail->Password = $server['pass'];
          $mail->setFrom($server['user'], 'Cotización GERONETO ');
          $email_mercadeo = $emails['email_2'];
          $email_info = $emails['email_2'];
          $mail->addAddress(trim($email_mercadeo), 'Cotización GERONETO ');
          $mail->addAddress(trim($email_info), 'Cotización GERONETO ');
          $mail->Subject = 'Cotización GERONETO ';
          $uniqueid = uniqid('np');
          $mail->msgHTML($mensaje);
          $mail->CharSet = 'UTF-8';
          $mail->AltBody = 'This is a plain-text message body';

          if ($mail->send()) {
          return 1;
          } else {
          return 2;
          }
         */
    }

    function fntienda_rlastcotizar() {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT id_cotizar from cotiza_rapido order by id_cotizar desc limit 0,1";
        //echo $sql2;
        $arreglo = 0;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, no existe la categoría.";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $arreglo = $menu['id_cotizar'];
        }
        $mysqlidato->close();
        return $arreglo + 1;
    }

    function fntienda_r_dettienda_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from tienda t, envio e  "
                . "  where t.id_enviodirec = e.id_enviodirec and t.id_tienda = " . $id . "  ";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, no existe la categoría.";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('num_tienda' => $menu['num_tienda'],
                'nombre_enviodirec' => $menu['nombre_enviodirec'],
                'apellido_enviodirec' => $menu['apellido_enviodirec'],
                'tel1_enviodirec' => $menu['tel1_enviodirec'],
                'tel2_enviodirec' => $menu['tel2_enviodirec'],
                'email_enviodirec' => $menu['email_enviodirec'],
                'referencia_enviodirec' => $menu['referencia_enviodirec']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_uvendedor_xid($id, $id_usuario, $estado) {
        $con = new Conecciones;
        $fntienda = new Fn_tienda();
        $mysqlidato = $con->crearConexion();
        $sql = "update tienda set id_vendedor = $id_usuario , estado_tienda = $estado where id_tienda=" . $id . "  ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
            //$fntienda->fnseg_c_segui_datos($id, 6, 3, '', $cuenta);
        } else {
            $cuenta = 1;
            //$fntienda->fnseg_c_segui_datos($id, 6, 3, '', $cuenta);
        }
        return $cuenta;
    }

    function fntienda_cseguimiento_xid($id_tienda, $id_usuario, $observacion) {
        $con = new Conecciones;
        $fntienda = new Fn_tienda();
        $mysqlidato = $con->crearConexion();
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $sql = "insert into seguimiento(id_cotizaorden, fecha_seg, hora_seg, observa_seg,  documento_seg , id_usuario, id_usua, tipo_seg)"
                . " VALUES($id_tienda, '$fecha','$hora','$observacion', '', $id_usuario, $id_usuario, 1) ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
            //$fntienda->fnseg_c_segui_datos($id, 6, 3, '', $cuenta);
        } else {
            $cuenta = 1;
            //$fntienda->fnseg_c_segui_datos($id, 6, 3, '', $cuenta);
        }
        return $cuenta;
    }

    function fntienda_sendemailadmin_tienda($header_email, $id_tienda) {
        $con = new Conecciones;
        $fntienda = new Fn_tienda();
        $url = $con->geturl_prueba();
        $dettienda = $fntienda->fntienda_rtienda_xid($id_tienda);
        require '../phpmailer/PHPMailerAutoload.php';
        $email_admin = 'calidad@supaysoft.net';
        $html = '<table style="width: 100%; ">
    <tr style="background-color: #0763a9; border-radius: 20px;">
        <td style="text-align: center;"><img style="padding: 40px 20px;" src="' . $url . 'images/logo-white.png"> </td>
    </tr>
    <tr style="background-color: #0763a9">
        <td style="text-align: center; color: white; font-weight: 600; padding: 15px 15px;">COTIZACIÓN ' . utf8_encode($dettienda[0]['num_tienda']) . ' </td>
    </tr> 
</table>
<table style="width: 100%; padding-left: 10%;">
    <tr>
        <td>
            <br><br><label> Estimad@ Admin </label><br><br>
            <label style="font-weight: 600;"> La cotización #  ' . utf8_encode($dettienda[0]['num_tienda']) . ' ha sido  ' . $header_email . '</label>
        </td>
    </tr>
</table>
<table style="width: 100%; margin-top: 100px;">
                <tr>
                    <td style="text-align: center;"><img src="https://geroneto.com/images/proforma.png" style="width: 50%;"> </td>
                </tr>
            </table>
<table style="width: 100%; padding-left: 100px; margin-top: 100px;">
    <tr>
        <td style="width: 60%;">
            <small> * Mensaje generado automáticamente, por favor no responder. </small>
        </td>
        <td style="width: 40%; text-align: right;">
        </td>
    </tr>
</table>';
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //Ask for HTML-friendly debug output
        //$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
        $mail->SMTPAutoTLS = true;
        //Set the hostname of the mail server
        $mail->Host = "mail.geroneto.com";
        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = 26;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication
        $mail->Username = "noreply@geroneto.com";
        //Password to use for SMTP authentication
        $mail->Password = "noreply2021";
        //Set who the message is to be sent from
        $mail->setFrom('noreply@geroneto.com', 'Cotización ' . $header_email . ' GERONETO');
        //Set who the message is to be sent to
        //$mail->addAddress(trim($email), 'Cotización SIMETRIC ');
        $mail->addAddress(trim($email), 'Cotización SIMETRIC ');
        $mail->addBCC(trim('jjoneto@geroneto.com'), 'Cotización GERONETO ');
        $mail->addBCC(trim('mercadeo@geroneto.com'), 'Cotización GERONETO ');
        $mail->addBCC(trim('imarin@geroneto.com'), 'Cotización GERONETO ');
        $mail->addCC(trim('info@geroneto.com'), 'Cotización  GERONETO ');
        $mail->addBCC('mercadeo1@geroneto.com', 'Cotización GERONETO ');
        //$mail->addAddress(trim('info@geroneto.com'), 'Cotización ' . $header_email . '  GERONETO ');
        //Set the subject line
        $mail->Subject = 'Cotización ' . $header_email . ' GERONETO ';
        $uniqueid = uniqid('np');
        $message = $html;
        $mail->CharSet = 'UTF-8';
        $mail->msgHTML($message);
        $mail->AltBody = 'This is a plain-text message body';
        if ($mail->send()) {
            return 1;
        } else {
            return 2;
        }
    }

    function fntienda_utiendaprod_xid($id, $cantidad, $descuento, $precio) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "update tiendaproducto set preciofinalcot_tiendaprod = $precio, descuentocot_tiendaprod = $descuento,"
                . " cantidadcot_tiendaprod = $cantidad  where id_tiendaprod = " . $id . " ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    function fntienda_sendemailcliente_tienda($idcotiza) {
        $con = new Conecciones;
        $fntienda = new Fn_tienda();
        $dettienda = $fntienda->fntienda_rtienda_x($idcotiza);
        $url = $con->geturl_prueba();
        $nombre_usuario = utf8_encode($dettienda[0]['nombre_enviodirec']);
        $apellido_usuario = utf8_encode($dettienda[0]['apellido_enviodirec']);
        $num_cotiza = utf8_encode($dettienda[0]['num_tienda']);
        $email_cliente = utf8_encode($dettienda[0]['email_enviodirec']);
        $id_vendedor = utf8_encode($dettienda[0]['id_vendedor']);
        $detvendedor = $fntienda->fntienda_rvendedor_xid($id_vendedor);
        $fecha = date('d-m-Y');
        $fecha_vence = strtotime('+1 day', strtotime($fecha));
        $fecha_vence = date('d-m-Y', $fecha_vence);
        require '../phpmailer/PHPMailerAutoload.php';
        $html = '<div id="header" style="border: 0px solid #000;">
    <table style="width: 100%;">
        <tr>
            <td style=" width: 30%; ">
        <center>
            <div style="background-color: #0763a9;padding: 15px 15px; border-radius: 10px 0px 0px 0px;height: 70px;">
                <img src="' . $url . 'images/logo-white.png"> </div></center>
        </td> 
        <td style="width: 70%;">
        <center>
            <div style="background-color: silver;padding: 15px 15px; border-radius: 0px 10px 0px 0px;">
                <h2 style="color: #000; font-weight: 800;"> COTIZACIÓN GERONETO # ' . $num_cotiza . '</h2>
            </div></center>
        </td> 
        </tr>
    </table>
</div>
<div id="body_part1" style="border: 0 solid #000;text-align: center;">
    <p>Estimad@ ' . $nombre_usuario . ' ' . $apellido_usuario . '</p>
    <p>Hemos recibido una solicitud para una cotización desde nuestra página web.</p>
    <p>Te detallamos a continuación cada uno de los productos requeridos con su disponibilidad y precio actual.</p>
</div>
<div id="cabecera_detail" style="border: 0px solid #000;">
    <center>
        <div style="margin-bottom: 20px">
            <table style="width: 100%;">
                <tr style=" padding: 5px 5px;">
                    <td style="padding: 5px 5px;  border-bottom: 0px solid silver;">
                        <b><label style="font-size: 20px;">GERONIMO ONETO GERONETO S.A.</label></b>
                    </td>
                    <td style="padding: 5px 5px; border-bottom: 0px solid silver;">
                        <b>Número :</b> ' . $num_cotiza . '
                    </td>
                </tr>
                <tr style=" padding: 5px 5px;">
                    <td style="padding: 5px 5px;  border-bottom: 0px solid silver;">
                        <b>Proforma de Venta</b>
                    </td>
                    <td style="padding: 5px 5px; border-bottom: 0px solid silver;">
                        <b>Fecha : </b> ' . $fecha . '
                    </td>
                </tr>
                <tr style=" padding: 5px 5px;">
                    <td style="padding: 5px 5px;  border-bottom: 0px solid silver;">
                        <b> RUC: 0990176892001</b>
                    </td>
                    <td style="padding: 5px 5px; border-bottom: 0px solid silver;">
                        <b>Vendedor :</b> ' . utf8_encode($detvendedor[0]['nombre_usuario'] . ' ' . $detvendedor[0]['apellido_usuario']) . '
                    </td>
                </tr>
                <tr style=" padding: 5px 5px;">
                    <td style="padding: 5px 5px;  border-bottom: 0px solid silver;">
                        <small>  Km. 11.5 Vía a Daule. Parque Industrial el Sauce (Av. Tecas y Av. Luis Robles Plaza) </small><br>
                        <small>Teléfono: (04) 390-6262</small>
                    </td>
                    <td style="padding: 5px 5px; border-bottom: 0px solid silver;">
                         <b>Vence el  : </b> ' . $fecha_vence . '
                    </td>
                </tr>
                <tr style=" padding: 5px 5px;">
                    <td style="padding: 5px 5px;  border-bottom: 0px solid silver;">
                        <b>Cliente : </b>' . $nombre_usuario . ' ' . $apellido_usuario . '
                    </td>
                    <td style="padding: 5px 5px; border-bottom: 0px solid silver;">
                       
                    </td>
                </tr>
                <tr style=" padding: 5px 5px;">
                    <td style="padding: 5px 5px;  border-bottom: 0px solid silver;">
                        <b>Contacto : </b> ' . utf8_encode($dettienda[0]['tel1_enviodirec']) . '
                    </td>
                    <td style="padding: 5px 5px; border-bottom: 0px solid silver;">
                        
                    </td>
                </tr>
                <tr style=" padding: 5px 5px;">
                    <td style="padding: 5px 5px;  border-bottom: 0px solid silver;">
                        <b>Sucursal : </b> ' . utf8_encode($detvendedor[0]['nombre_almacen']) . '
                    </td>
                    <td style="padding: 5px 5px; border-bottom: 0px solid silver;">
                        
                    </td>
                </tr>
            </table>
        </div>
    </center>
</div>
<div id="detail" style="border: 0px solid #000;">
    <center>
        <div style="margin-bottom: 20px">
            <table style="width: 100%;">
                <tr style="background-color: #0763a9; padding: 5px 5px; ">
                    <td style="padding: 5px 5px; color: white; border-radius: 25px 20px; text-align: center;">
                        <b> CÓDIGO </b>
                    </td> 
                    <td style="padding: 5px 5px; color: white; border-radius: 25px 20px; text-align: center;">
                        <b> DESCRIPCIÓN </b>
                    </td> 
                    <td style="padding: 5px 5px; color: white; text-align: center;">
                        <b> CANTIDAD </b>
                    </td>
                    <td style="padding: 5px 5px; color: white; text-align: center;">
                        <b> PRECIO </b>
                    </td>
                    <td style="padding: 5px 5px; color: white; text-align: center;">
                        <b> % DESC </b>
                    </td>
                    <td style="padding: 5px 5px; color: white; text-align: center;">
                        <b> PARCIAL </b>
                    </td>
                </tr>';
        $prodtienda = $fntienda->fntienda_rtiendaprod_xidtienda($idcotiza);
        $suma = 0;
        $ivatotal = 0;
        $subtotal = 0;
        $total_1 = 0;
        $totalf = 0;
        $descuentototal = 0;
        $descuento = 0;
        $descuentototal1 = 0;
        while ($menu = $prodtienda->fetch_assoc()) {
//            $total = $menu['cantidadcot_tiendaprod'] * $menu['preciofinalcot_tiendaprod'];
//            $total_1=$total_1+$total;
//            $descuento = $total * ($menu['descuentocot_tiendaprod'] / 100 );
//            $descuentototal=$descuentototal+$descuento;
//            $parcial=$menu['preciofinalcot_tiendaprod']/1.12;
//            $descuentoparcial=$parcial*($menu['descuentocot_tiendaprod']/100);
//            $parcialmenosdescuento=$parcial-$descuentoparcial;
//            

            $parcial = $menu['preciofinalcot_tiendaprod'] / 1.12;
            $parcialdescuento = $parcial * ($menu['descuentocot_tiendaprod'] / 100);
            $descuentoparcialtotal = $parcialdescuento * $menu['cantidadcot_tiendaprod'];
            $parcialtotal = $parcial * $menu['cantidadcot_tiendaprod'];
            $totalcotiza = $totalcotiza + $parcialtotal;
            $descuentototal1 = $descuentototal1 + $descuentoparcialtotal;

            $html .= '<tr style=" padding: 5px 5px;">
                    <td style="padding: 5px 5px;  border-bottom: 1px solid silver; text-align: center;">
                        ' . utf8_encode($menu['cod_prod']) . '
                    </td>
                    <td style="padding: 5px 5px;  border-bottom: 1px solid silver; text-align: center;">
                        ' . utf8_encode($menu['nombre_prod']) . ' ';
            if ($menu['descuentocot_tiendaprod'] > 0) {
                $html .= '<small style="color: green; font-weight: 800;">   &nbsp;&nbsp;&nbsp;(-' . $menu['descuentocot_tiendaprod'] . '%)</small>';
            }
            $html .= '</td>
                    <td style="padding: 5px 5px; border-bottom: 1px solid silver; text-align: center;">
                        ' . utf8_encode($menu['cantidadcot_tiendaprod']) . '
                    </td>
                    <td style="padding: 5px 5px; border-bottom: 1px solid silver; text-align: center;">
                        $ ' . number_format($parcial, 2) . '
                    </td>
                    <td style="padding: 5px 5px; border-bottom: 1px solid silver; text-align: center;">
                         ' . $menu['descuentocot_tiendaprod'] . ' %
                    </td>
                    <td style="padding: 5px 5px; border-bottom: 1px solid silver; text-align: center;">
                        $ ' . number_format(($parcialtotal - $descuentoparcialtotal), 2) . '
                    </td>
                </tr>';
        }
//        $totalf=$total_1-$descuentototal;
        $iva = (($totalcotiza - $descuentototal1) * 0.12);
        $html .= '<tr style=" padding: 5px 5px;">
                    <td colspan="4" style="padding: 5px 5px; border-bottom: 1px solid silver; text-align: center;">
                        <b> CONTRIBUYENTE ESPECIAL <br> 
                        RESOLUCIÓN N°198 <br> 
                        NO RETIENE EL I.V.A </b> 
                    </td>
                    <td style="padding: 5px 5px; border-bottom: 1px solid silver;text-align: right; ">
                        SUBTOTAL 0%:  &nbsp; &nbsp; &nbsp; <br> 
                        SUBTOTAL 12%:  &nbsp; &nbsp; <br> 
                        DESCUENTO :  &nbsp; &nbsp;  &nbsp;  &nbsp; <br>
                        I.V.A (12%)  :  &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp; <br>
                        TOTAL   :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                    </td>
                    <td style="padding: 5px 5px; border-bottom: 1px solid silver;text-align: center; ">
                         $ ' . number_format(0, 2) . ' <br> 
                         $ ' . number_format($totalcotiza, 2) . ' <br> 
                         $ ' . number_format($descuentototal1, 2) . ' <br>
                         $ ' . number_format($iva, 2) . ' <br>
                         $ ' . number_format(($totalcotiza - $descuentototal1) + $iva, 2) . ' <br>
                    </td>
                </tr>
                <tr style=" padding: 5px 5px;">
                    <td colspan="6" style="padding: 5px 5px; border-bottom: 0px solid silver;">
                        <small><b>NOTA: </b> Esta proforma no garantiza existecias ni precios luego de la fecha de vencimiento</small>
                    </td>
                </tr>';
        $html .= '</table>
        </div>
    </center>
</div>
<div id="body_totales" style="text-align: center;">
    <div style="border-top: 1px solid #958030; border-bottom: 1px solid #958030;">
        <h2>VALOR TOTAL : $ ' . number_format($totalcotiza - $descuentototal1, 2) . '</h2>
    </div>
</div>
<div id="body_part2" >
    <center>
        <div style="width: 80%; border-radius: 10px 10px; border: 0px solid #0763a9; margin: 10px 10px; padding: 10px 10px;">
            <p>Te recordamos que en caso de requerir más información acerca de nuestros productos y servicios, puedes comunicarte al: (04)390-6262, estarémos gustosos de atender tus inquietudes.</p>
            <p>Contacto Asesor: ' . utf8_encode($detvendedor[0]['nombre_usuario'] . ' ' . $detvendedor[0]['apellido_usuario']) . ', Email: ' . utf8_encode($detvendedor[0]['email_usuario']) . ','
                . ' Telf: ' . utf8_encode($detvendedor[0]['telf1_usuario']) . '  <p>
        </div>
    </center>
</div>
<div id="footer" style="border-top: 1px solid #958030; text-align: center;">
    <i><p> "Aceros de confianza" </p></i>
</div>
<table style="width: 100%; margin-top: 100px;">
                <tr>
                    <td style="text-align: center;"><img src="https://geroneto.com/images/proforma.png" style="width: 50%;"> </td>
                </tr>
            </table>
';
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //Ask for HTML-friendly debug output
        //$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
        $mail->SMTPAutoTLS = true;
        //Set the hostname of the mail server
        $mail->Host = "mail.geroneto.com";
        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = 26;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication
        $mail->Username = "noreply@geroneto.com";
        //Password to use for SMTP authentication
        $mail->Password = "UVl;Edt{RHQ;";
        //Set who the message is to be sent from
        $mail->setFrom('noreply@geroneto.com', 'Cotización GERONETO');
        //Set who the message is to be sent to
        //$mail->addAddress(trim($email), 'Cotización SIMETRIC ');
        //$mail->addAddress(trim('sistemas@supaysoft.net'), 'Cotización  GERONETO ');
        $mail->addBCC(trim('jjoneto@geroneto.com'), 'Cotización GERONETO ');
        $mail->addBCC(trim('mercadeo@geroneto.com'), 'Cotización GERONETO ');
        $mail->addBCC(trim('imarin@geroneto.com'), 'Cotización GERONETO ');
        $mail->addCC(trim('info@geroneto.com'), 'Cotización  GERONETO ');
        $mail->addBCC('mercadeo1@geroneto.com', 'Cotización GERONETO ');
        $mail->addAddress(trim($email_cliente), 'Cotización GERONETO ');
        //Set the subject line
        $mail->Subject = 'Cotización GERONETO ';
        $uniqueid = uniqid('np');
        $message = $html;
        $mail->CharSet = 'UTF-8';
        $mail->msgHTML($message);
        $mail->AltBody = 'This is a plain-text message body';
        if ($mail->send()) {
            return 1;
        } else {
            return 2;
        }
    }

    function fntienda_rvendedor_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from usuario u, almacen a"
                . " where id_usuario = " . $id . " and u.id_almacen = a.id_almacen ";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo " Error fntienda_rusuario_xid -- fntienda";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('nombre_usuario' => $menu['nombre_usuario'],
                'apellido_usuario' => $menu['apellido_usuario'],
                'telf1_usuario' => $menu['telf1_usuario'],
                'email_usuario' => $menu['email_usuario'],
                'nombre_almacen' => $menu['nombre_almacen']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fntienda_ucotizarapida_xest2($id, $estado) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();

        $sql = "update cotiza_rapido set estado2_cotizar = $estado where id_cotizar = $id ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    function fntienda_msgemail_trabajo($id_trabajo, $email_trabajo) {
        $fntienda = new Fn_tienda();
        $dettrabajo = $fntienda->fntienda_r_dettrabajo_xid($id_trabajo);
        $html = '<table style="width: 100%; ">
    <tr style="background-color: #0763a9; border-radius: 20px;">
        <td style="text-align: center;"><img style="padding: 40px 20px;" src="https://geroneto.com/images/logo-white.png"> </td>
    </tr>
    
</table>
<table style="width: 100%; padding-left: 10%;">
    <tr>
        <td>
            <label style="font-weight: 600;"> Nombres y Apellidos: </label><label> ' . utf8_encode($dettrabajo[0]['nombre_trabajo']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Teléfono: </label><label> ' . utf8_encode($dettrabajo[0]['telefono_trabajo']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Email: </label><label> ' . utf8_encode($dettrabajo[0]['email_trabajo']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Aspiraciones: </label><label> ' . utf8_encode($dettrabajo[0]['aspiracions_trabajo']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Area: </label><label> ' . utf8_encode($dettrabajo[0]['area_trabajo']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Mensaje: </label><label> ' . utf8_encode($dettrabajo[0]['comentario_trabajo']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Discapacidad: </label><label> ' . utf8_encode($dettrabajo[0]['discapacidad_trabajo']) . '</label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight: 600;"> Hoja de Vida: </label><a href="https://geroneto.com/documentos/' . utf8_encode($dettrabajo[0]['cv_trabajo']) . '"> ' . utf8_encode($dettrabajo[0]['cv_trabajo']) . '</a>
        </td>
    </tr>
    </table>';
        return $html;
    }

    function fntienda_sendemail_trabajo($mensaje, $email_vendedor) {
        require '../phpmailer/PHPMailerAutoload.php';
        require '../controlador/datosmail.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAutoTLS = true;
        $mail->Host = $hostmail;
        $mail->Port = $puertomail;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->SMTPAuth = true;
        $mail->Username = $usuariomail;
        $mail->Password = $passwordmail;
        $mail->addAddress("rrhh@geroneto.com", 'POSTULANTE DESDE LA WEB ');
        /*
          $mail->addAddress($mailmercadeo, 'Cotización GERONETO ');
          $mail->addAddress($mailinfo, 'Cotización GERONETO ');
         */
        $mail->Subject = 'POSTULANTE DESDE LA WEB';
        $uniqueid = uniqid('np');
        $message = $mensaje;
        $mail->CharSet = 'UTF-8';
        $mail->msgHTML($message);
        $mail->AltBody = 'This is a plain-text message body';
        if ($mail->send()) {
            return 1;
        } else {
            return 2;
        }
    }

    function fntienda_r_dettrabajo_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from trabajo where id_trabajo=$id";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, fntienda_r_dettrabajo_xid.";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_trabajo' => $menu['id_trabajo'],
                'nombre_trabajo' => $menu['nombre_trabajo'],
                'email_trabajo' => $menu['email_trabajo'],
                'aspiracions_trabajo' => $menu['aspiracions_trabajo'],
                'area_trabajo' => $menu['area_trabajo'],
                'cv_trabajo' => $menu['cv_trabajo'],
                'comentario_trabajo' => $menu['comentario_trabajo'],
                'telefono_trabajo' => $menu['telefono_trabajo'],
                'estado_trabajo' => $menu['estado_trabajo'],
                'fecha_trabajo' => $menu['fecha_trabajo'],
                'hora_trabajo' => $menu['hora_trabajo'],
                'discapacidad_trabajo' => $menu['discapacidad_trabajo']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

}
