<?php

class Conecciones {

    function crearConexion() {

        //Datos para la conexión con el servidor
//        $host = "127.0.0.1";
//        $user = "itsaec_itsauserbdd";
//        $pass = "itsauserbdd2020";
//        $bdd = "itsaec_bdd_tomebamba";
        // Datos para la conexión con el servidor 
      
        $host = DB_HOST;
        $user = DB_USER;
        $pass = DB_PASS;
        $bdd = DB_NAME;

        $mysqli = new mysqli($host, $user, $pass, $bdd);
        //Si sucede algún error la función muere e imprimir el error
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            echo DB_HOST;
        }
        //Si nada sucede retornamos la conexión
        return $mysqli;
    }

    function crearConexionPDO() {
         $host = DB_HOST;
        $user = DB_USER;
        $pass = DB_PASS;
        $bdd = DB_NAME;
        try {

            $con = new PDO('mysql:host=' . $host . ';dbname=' . $bdd . '', '' . $user . '', '' . $pass . '');
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error conectando con la base de datos: ' . $e->getMessage();
        }
        return $con;
    }
    
    function geturl() {
        $url = "https://www.wasiup.com/";
        return $url;
    }

    function geturl_prueba() {
        $url = "https://www.wasiup.com/";
        return $url;
    }
}

?>