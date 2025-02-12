<?php

class Fn_sesion {

    function fn_ruser_x($user, $pass) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $user = mysqli_real_escape_string($mysqlidato, $user);
        $pass = mysqli_real_escape_string($mysqlidato, $pass);
        $sql2 = " SELECT * FROM usuario u, empresa e , usuario_empresa ue, rol r"
                . " WHERE u.id_usuario=ue.id_usuario and ue.id_empresa=e.id_empresa and r.id_rol = ue.id_rol and ue.email_usuemp='" . $user . "' 
	            and ue.pass_usuemp=MD5(CONCAT('" . $user . "','" . $pass . "')) "
                . " and ue.estado_usuemp!=0 and e.id_padre=0 limit 0,1";
        $arreglo;
        //echo $sql2;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, no existe un usuario con esos datos.";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fn_uuser_xemail($email) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $fechavisita = date('Y-m-d');
        $sql = " UPDATE usuario SET ingreso_usuario='" . $fechavisita . "' 
				where email_usuario='" . $email . "'";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    function fnsesion_rusuario_xemail($email) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from usuario where email_usuario='" . $email . "' and estado_usuario = 1 ";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo " Error fnindex_rusuario_xemail -- fnindex";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_usuario' => $menu['id_usuario'],
                'nombre_usuario' => $menu['nombre_usuario'],
                'apellido_usuario' => $menu['apellido_usuario']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }

    function fnsesion_cusuario_x($nombre, $apellido, $email, $fechacreacion, $fechacaduca, $ingreso, $id_rol, $direccion1, $ruc, $telf1, $pass) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql = "INSERT INTO usuario(clave_usuario,nombre_usuario,apellido_usuario,email_usuario,fechacreacion_usuario,fechacaduca_usuario,ingreso_usuario,id_rol ,estado_usuario,foto_usuario,direccion1_usuario,ruc_usuario,telf1_usuario) "
                . " VALUES (MD5(CONCAT('" . $email . "','" . $pass . "')),'$nombre','$apellido','$email','$fechacreacion','$fechacaduca','$ingreso',$id_rol,1,'avatar_user.png','$direccion1','$ruc','$telf1') ";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }

    function fnsesion_checkemail($email) {
        $opc = 0;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $opc = 1;
        }
        return $opc;
    }

    function fnsesion_check_xidusu($email,$tiposocial,$password) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM usuario u, rol r WHERE u.id_rol=r.id_rol and email_usuario='$email' and estado_usuario = 1 "
                . " and tiposesion_usuario = $tiposocial and clave_usuario = MD5(CONCAT('" . $email . "','" . $password . "')) limit 0,1";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fns_check_xidusu";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_usuario' => $menu['id_usuario'],
                'nombre_usuario' => $menu['nombre_usuario'],
                'apellido_usuario' => $menu['apellido_usuario'],
                'email_usuario' => $menu['email_usuario'],
                'clave_usuario' => $menu['clave_usuario'],
                'fechacreacion_usuario' => $menu['fechacreacion_usuario'],
                'nombre_rol' => $menu['nombre_rol'],
                'fechacaduca_usuario' => $menu['fechacaduca_usuario'],
                'ingreso_usuario' => $menu['ingreso_usuario'],
                'id_rol' => $menu['id_rol'],
                'id_zona' => $menu['id_zona'],
                'sexo_usuario' => $menu['sexo_usuario'],
                'foto_usuario' => $menu['foto_usuario'],
                'direccion1_usuario' => $menu['direccion1_usuario'],
                'direccion2_usuario' => $menu['direccion2_usuario'],
                'id_empresa' => $menu['id_empresa'],
                'codigo_usuario' => $menu['codigo_usuario'],
                'tipo_cliente' => $menu['tipo_cliente'],
                'tiposesion_usuario' => $menu['tiposesion_usuario'],
                'telf1_usuario' => $menu['telf1_usuario']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fnsesion_udatein_xidusu($idusuario) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $hoy = date('Y-m-d');
        $sql = "UPDATE usuario set ingreso_usuario='" . $hoy . "' "
                . " where id_usuario=" . $idusuario . "";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fnsesion_rusuario_lastid() {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT max(id_usuario) as cuenta FROM usuario ";
        //echo $sql2;
        $arreglo = 0;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, no existe el producto.";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $arreglo =  $menu['cuenta'] + 1;
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fnsesion_cuusuario_x($id_usuario,$nombre_usuario,$apellido_usuario,$email_usuario,$password,$foto_usuario,$tiposesion_usuario) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $hoy = date('Y-m-d');
        $caduca = date("Y-m-d",strtotime($hoy."+ 1 year"));
        $sql = "INSERT INTO `usuario`(`id_usuario`, `nombre_usuario`, "
                . "`apellido_usuario`, `email_usuario`, `clave_usuario`,"
                . " `fechacreacion_usuario`, `fechacaduca_usuario`, "
                . "`ingreso_usuario`, `id_rol`, `estado_usuario`, `id_zona`,"
                . " `sexo_usuario`, `foto_usuario`, `direccion1_usuario`, "
                . "`direccion2_usuario`, `ruc_usuario`, `id_empresa`, `codigo_usuario`, "
                . "`tipo_cliente`, `tiposesion_usuario`) "
                . " VALUES ($id_usuario,'$nombre_usuario','$apellido_usuario',"
                . " '$email_usuario',MD5(CONCAT('" . $email_usuario . "','" . $password . "')),"
                . " '$hoy','$caduca','$hoy',4,1,"
                . " 'EC1701','MASCULINO','$foto_usuario','','',"
                . " '',1,0,1,$tiposesion_usuario)";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fnsesion_generaPass() {
        //Se define una cadena de caractares. Te recomiendo que uses esta.
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        //Obtenemos la longitud de la cadena de caracteres
        $longitudCadena = strlen($cadena);

        //Se define la variable que va a contener la contraseña
        $pass = "";
        //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
        $longitudPass = 10;

        //Creamos la contraseña
        for ($i = 1; $i <= $longitudPass; $i++) {
            //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
            $pos = rand(0, $longitudCadena - 1);

            //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
            $pass .= substr($cadena, $pos, 1);
        }
        return $pass;
    }
    
    function fnsesion_ruser_xidusu($id) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * FROM usuario u, rol r WHERE u.id_rol=r.id_rol and estado_usuario = 1 "
                . " and u.id_usuario = $id limit 0,1";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Error fns_check_xidusu";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('id_usuario' => $menu['id_usuario'],
                'nombre_usuario' => $menu['nombre_usuario'],
                'apellido_usuario' => $menu['apellido_usuario'],
                'email_usuario' => $menu['email_usuario'],
                'clave_usuario' => $menu['clave_usuario'],
                'fechacreacion_usuario' => $menu['fechacreacion_usuario'],
                'nombre_rol' => $menu['nombre_rol'],
                'fechacaduca_usuario' => $menu['fechacaduca_usuario'],
                'ingreso_usuario' => $menu['ingreso_usuario'],
                'id_rol' => $menu['id_rol'],
                'id_zona' => $menu['id_zona'],
                'sexo_usuario' => $menu['sexo_usuario'],
                'foto_usuario' => $menu['foto_usuario'],
                'direccion1_usuario' => $menu['direccion1_usuario'],
                'direccion2_usuario' => $menu['direccion2_usuario'],
                'id_empresa' => $menu['id_empresa'],
                'codigo_usuario' => $menu['codigo_usuario'],
                'tipo_cliente' => $menu['tipo_cliente'],
                'tiposesion_usuario' => $menu['tiposesion_usuario'],
                'telf1_usuario' => $menu['telf1_usuario']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fnsesion_sendregistro_xidusu($email) {
        $fnsesion = new Fn_sesion();
        $detusu = $fnsesion->fnsesion_rusuario_xemail2($email);
        require '../assets/phpmailer/PHPMailerAutoload.php';
        $html = '
            <div style="width: 100%; background-color: silver;">
        <center> <img src="https://itsa.ec/itsatest/images/logo.png"> </center>
    </div>
    <div style="padding: 10px 10px;background-color: #575756;">
    </div>
    <div style="padding: 10px 10px;background-color: #ffeb00;">
        <center><h2 style=" font-family: Montserrat, sans-serif;font-weight: 700;font-size: 20px !important;">Bienvenid@, '.utf8_encode($detusu[0]['nombre_usuario']).'</h2></center>
        <center><h2 style=" font-family: Montserrat, sans-serif;font-weight: 700;font-size: 15px !important;"> !Tu registro se generado correctamente, ya eres parte de ITSA COMMERCE ¡</h2></center>
    </div>
    <div style="padding: 10px 10px;">
        <p style="font-family: Montserrat, sans-serif; font-size: 14px; color: #575756; font-weight: 400; line-height: 24px;">  <b>-</b> Tu usuario para iniciar sesión es: <b>'.utf8_encode($detusu[0]['email_usuario']).'</b></p> 
        <p style="font-family: Montserrat, sans-serif; font-size: 14px; color: #575756; font-weight: 400; line-height: 24px;">  <b>-</b> Puedes acceder iniciar sessión al hacer click <a href="https://itsa.ec/itsatest/login.php" target="_blank"> aquí</a> y  </p> 
        <p style="font-family: Montserrat, sans-serif; font-size: 14px; color: #575756; font-weight: 400; line-height: 24px;">  <b>-</b> Puedes ver tus pedidos realizados al hacer click <a href="https://itsa.ec/itsatest/miperfil/index.php?opc=176" target="_blank"> aquí</a> .  </p> 

    </div>
    <div style=" margin-top: 40px; font-family: Montserrat, sans-serif; font-size: 14px; color: #575756; font-weight: 400; line-height: 24px; padding: 10px 10px;color: white;background-color: #575756;"> 
        <small> * Este email fue generado automáticamente, porfavor no responder.</small> 
    </div>';

        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 1;
        //Ask for HTML-friendly debug output
        //$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
        $mail->SMTPAutoTLS = true;
        //Set the hostname of the mail server
        $mail->Host = "mail.itsa.ec";
        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = 587;
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
        $mail->Username = "noreplytest@itsa.ec";
        //Password to use for SMTP authentication
        $mail->Password = "noreplytest1234";
        //Set who the message is to be sent from
        $mail->setFrom('noreplytest@itsa.ec', 'Registro ITSA COMMERCE');
        //Set who the message is to be sent to
        $mail->addAddress(trim($email), 'Registro ITSA COMMERCE');
        //$mail->addAddress('calidad@supaysoft.net', 'Registro ITSA COMMERCE');
        //Set the subject line
        $mail->Subject = 'Registro ITSA COMMERCE';
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

    function fnsesion_rusuario_xemail2($email) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $sql2 = "SELECT * from usuario where email_usuario = '" . $email . "' ";
        //echo $sql2;
        $arreglo = array();
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo " Error fntienda_rusuario_xid -- fntienda";
            exit;
        }while ($menu = $resultado2->fetch_assoc()) {
            $datosNuevos = array('nombre_usuario' => $menu['nombre_usuario'],
                'apellido_usuario' => $menu['apellido_usuario'],
                'email_usuario' => $menu['email_usuario']);
            array_push($arreglo, $datosNuevos);
        }
        $mysqlidato->close();
        return $arreglo;
    }
    
    function fnsesion_cuusuarioinv_x($id_usuario, $nombre_usuario, $apellido_usuario, $email_usuario, $password, $foto_usuario, $tiposesion_usuario, $email2_usuario) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $hoy = date('Y-m-d');
        $caduca = date("Y-m-d", strtotime($hoy . "+ 1 year"));
        $sql = "INSERT INTO `usuario`(`id_usuario`, `nombre_usuario`, "
                . "`apellido_usuario`, `email_usuario`, `clave_usuario`,"
                . " `fechacreacion_usuario`, `fechacaduca_usuario`, "
                . "`ingreso_usuario`, `id_rol`, `estado_usuario`, `id_zona`,"
                . " `sexo_usuario`, `foto_usuario`, `direccion1_usuario`, "
                . "`direccion2_usuario`, `ruc_usuario`, `id_empresa`, `codigo_usuario`, "
                . "`tipo_cliente`, `tiposesion_usuario`, email2_usuario) "
                . " VALUES ($id_usuario,'$nombre_usuario','$apellido_usuario',"
                . " '$email_usuario',MD5(CONCAT('" . $email_usuario . "','" . $password . "')),"
                . " '$hoy','$caduca','$hoy',4,1,"
                . " 'EC1701','MASCULINO','$foto_usuario','','',"
                . " '',1,0,1,$tiposesion_usuario,'$email2_usuario')";
        //echo $sql;
        if ($mysqlidato->query($sql) == FALSE) {
            $cuenta = 0;
        } else {
            $cuenta = 1;
        }
        return $cuenta;
    }
    
    function fn_rsesionautomatica_x($user, $pass) {
        $con = new Conecciones;
        $mysqlidato = $con->crearConexion();
        $user = mysqli_real_escape_string($mysqlidato, $user);
        $pass = mysqli_real_escape_string($mysqlidato, $pass);
        $sql2 = " SELECT * FROM usuario u,rol r"
                . " WHERE r.id_rol = u.id_rol and email_usuario='" . $user . "' 
	            and clave_usuario='" . $pass . "' "
                . " and estado_usuario!=0 limit 0,1";
        $arreglo;
        //echo $sql2;
        if (!$resultado2 = $mysqlidato->query($sql2)) {
            echo "Lo sentimos, no existe un usuario con esos datos.";
            exit;
        } else {
            $arreglo = $resultado2;
        }
        $mysqlidato->close();
        return $arreglo;
    }
}
