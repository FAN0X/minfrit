<?php
class Fn_logistica {
    function fnlogistica_rcotizar_xfecha() {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM logistica";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn102_rcotizar_xfecha -- fn102";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fnlogistica_ruser_xid($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM usuario WHERE id_usuario = $id";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, no existe la categoría.";
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
                'id_almacen' => $menu['id_almacen'],
                'placa_usuario' => $menu['placa_usuario']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fnlogistica_usuario_x($rol) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM usuario t where t.id_rol = $rol and estado_usuario=1";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fnlogistica_usuario_x -- fn102";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fnlogistica_asesor_x() {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM logistica_persona t where  t.tipo_logper = 'ASESOR'";
        //echo $sql2;
        $arreglo;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fn102_rcotizar_xfecha -- fn102";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fnlogistica_logistica_d6($empresa, $oc, $oc1, $correo, $franja, $chofer, $asesor) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "INSERT INTO logistica(`empresa_logistica`, `tiporden_logistica`, `numerorden_logistica`, `franjahor_logistica`, `id_logper_c`, `id_logper_a`, `email_logistica`)"
                . " VALUES ('$empresa','$oc','$oc1','$franja','$chofer','$asesor','$correo') ";
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fnlogistica_mensajemail_d6($urlmail, $empresa, $oc, $oc1, $correo, $franja, $nombrechofer, $nombreasesor, $link, $placachofer) {
        $mensaje = "<table>
                    <tr>
                        <td>
                            <img src=".$urlmail."images/logo.png>
                        </td>
                    </tr>
                    <tr>
                        <td><br>Estimado Cliente:</td>
                        
                    </tr>
                    <tr>
                        <td>". $empresa. "</td>
                        
                    </tr>
                    <tr>
                        <td><br>Nos es grato comunicarle que se ha programado el despacho de su pedido con ". $oc. " #". $oc1. " para ser entregado en la ventana horaria entre ". $franja. " del día de hoy. <br>Los materiales serán entregados por el Sr. ". $nombrechofer. " con placa ".$placachofer.".</td>
                    </tr>
                    <tr>
                        <td><br>Gracias por confiar en nosotros, es un placer atenderle.</td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <br>Atentamente,<br>Depto. de Logística<br>GERONETO
                        </td>
                    </tr>
                    <tr>
                        <td>
                            (Este mensaje se ha enviado de forma automática)<br><br> Ayúdanos a mejorar nuestro servicio. ".$link."
                        </td>
                    </tr>
                </table>";
        return $mensaje;
    }
    
    function fnlogistica_enviomail_d6($mensaje, $hostmail, $puertomail, $passwordmail, $usuariomail, $correo, $mailvendedor, $mail1, $mail2, $mail3, $mail4, $mail5) {
        require '../phpmailer/PHPMailerAutoload.php';
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
        $mail->setFrom($usuariomail, 'Estado de despacho - Geroneto');
        $mail->addAddress(trim($correo), 'Estado de despacho - Geroneto');
        $mail->addAddress(trim($mailvendedor), 'Estado de despacho - Geroneto');
        $mail->addBCC(trim($mail1), 'Estado de despacho - Geroneto');
        $mail->addBCC(trim($mail2), 'Estado de despacho - Geroneto');
        $mail->addBCC(trim($mail3), 'Estado de despacho - Geroneto');
        $mail->addBCC(trim($mail4), 'Estado de despacho - Geroneto');
        $mail->addBCC(trim($mail5), 'Estado de despacho - Geroneto');
        $mail->Subject = 'Estado de despacho - Geroneto';
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
