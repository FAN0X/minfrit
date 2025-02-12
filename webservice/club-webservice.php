<?php

session_start();
include '../config.php';
include '../controlador/conexion.php';
require '../funciones/fn-index.php';
$fnindex = new Fn_index();
$url = 'https://data.brreg.no/enhetsregisteret/api/enheter?page=1&size=600';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
$response = curl_exec($curl);
curl_close($curl);
$json_data = json_decode($response, true);
//print_r($json_data);
$clubs = $json_data['_embedded']['enheter'];
$sqlinsert = '';
$cuentanoexiste = 0;
for ($i = 0; $i < count($clubs); $i++) {
    $orgsnumERP = $clubs[$i]['organisasjonsnummer'];
    $nombre_club = str_replace("'","",$clubs[$i]['navn']);
    //echo $nombre_club;
    $cuentaexist = $fnindex->fnindex_rclub_xorgsnumERP($orgsnumERP);
    if ($cuentaexist->num_rows > 0) {
        echo 'Ya existe';
    } else {
        //$id_club = $fnindex->fnindex_rclublastid();
        $id_club = 0;
        $cuentanoexiste++;
        $desc_club = '';
        $foto_club = '';
        $latitud_club = '0';
        $longitud_club = '0';
        $edadmin_club = 0;
        $edadmax_club = 0;
        $id_categoria = 0;
        $estado_club = 0;
        $orgsnumERP_club = $orgsnumERP;
        echo 'No existe';
        $sqlinsert = $sqlinsert . "INSERT INTO `club`(`id_club`, `nombre_club`, `desc_club`, `foto_club`, "
                . "`latitud_club`, `longitud_club`, `edadmin_club`, `edadmax_club`, `id_categoria`,"
                . " `estado_club`, `orgsnumERP_club`) "
                . " VALUES ('$id_club','$nombre_club','$desc_club','$foto_club',"
                . " '$latitud_club', '$longitud_club','$edadmin_club','$edadmax_club','$id_categoria',"
                . " '$estado_club','$orgsnumERP_club'); ";
    }
}
if ($cuentanoexiste > 0) {
    echo 'fin' . $sqlinsert;
    $cuentasql = $fnindex->fnindex_cclub_xdata($sqlinsert);
    echo 'Resultado' . $cuentasql;
    echo 'Registros no existe'.$cuentanoexiste;
}

