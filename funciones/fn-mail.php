<?php

class Fn_mail {
    
    function fnmail_rcot_xestado($dato) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fin = $ini + $count;
        $sql2 = "SELECT * FROM tienda where estado_tienda = $dato ";
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fnmail_rcot_xestado";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fnmail_rase_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from usuario where id_usuario = $id ";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fnmail_rase_xid";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_usuario' => $menu['id_usuario'],
                'nombre_usuario' => $menu['nombre_usuario'],
                'apellido_usuario' => $menu['apellido_usuario'],
                'email_usuario' => $menu['email_usuario'],
                'clave_usuario' => $menu['clave_usuario'],
                'fechacreacion_usuario' => $menu['fechacreacion_usuario'],
                'fechacaduca_usuario' => $menu['fechacaduca_usuario'],
                'ingreso_usuario' => $menu['ingreso_usuario'],
                'id_rol' => $menu['id_rol'],
                'estado_usuario' => $menu['estado_usuario'],
                'id_zona' => $menu['id_zona'],
                'sexo_usuario' => $menu['sexo_usuario'],
                'foto_usuario' => $menu['foto_usuario'],
                'direccion1_usuario' => $menu['direccion1_usuario'],
                'direccion2_usuario' => $menu['direccion2_usuario'],
                'ruc_usuario' => $menu['ruc_usuario'],
                'id_empresa' => $menu['id_empresa'],
                'codigo_usuario' => $menu['codigo_usuario'],
                'tipo_cliente' => $menu['tipo_cliente'],
                'tiposesion_usuario' => $menu['tiposesion_usuario'],
                'telf1_usuario' => $menu['telf1_usuario'],
                'telf2_usuario' => $menu['telf2_usuario'],
                'calle1_usuario' => $menu['calle1_usuario'],
                'calle2_usuario' => $menu['calle2_usuario'],
                'codmd5_usuario' => $menu['codmd5_usuario'],
                'updatepass_usuario' => $menu['updatepass_usuario'],
                'email2_usuario' => $menu['email2_usuario'],
                'id_almacen' => $menu['id_almacen']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fnmail_r_dettienda_xid($id) {
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
    
    function fnmail_rtiendaprod_xidtienda($id) {
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
    
    function fnmail_msgemail($idcotiza, $asesor) {
        $fnmail = new Fn_mail();
        $dettienda = $fnmail->fnmail_r_dettienda_xid($idcotiza);
        $html = '
            <table style="width: 100%; ">
                <tr>
                    <td style="text-align: center;">
                        HOLA "'.utf8_encode($asesor).'" RECUERDA QUE TIENES UNA COTIZACIÓN PENDIENTE.
                    </td>
                </tr>
            </table>
            <hr>
            <table style="width: 100%; ">
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
                    $prodtienda = $fnmail->fnmail_rtiendaprod_xidtienda($idcotiza);
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
                    <td style="text-align: center;"><img src="https://geroneto.com/images/proforma.png"> </td>
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
            </table>
        ';
        return $html;
    }
    
    function fnmail_sendemail($mensaje,$email_asesor) {
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
        $mail->addAddress("stalin-1649@live.com", 'RECORDATORIO Cotización GERONETO ');
        $mail->addAddress("stalinp@supaysoft.net", 'RECORDATORIO Cotización GERONETO ');
        $mail->Subject = 'RECORDATORIO Cotización GERONETO ';
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
}