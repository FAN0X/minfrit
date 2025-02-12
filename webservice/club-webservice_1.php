<?php

session_start();
include '../config.php';
include '../controlador/conexion.php';
require '../funciones/fn-index.php';
$fnindex = new Fn_index();
$url = 'https://data.brreg.no/enhetsregisteret/api/enheter?page=1&size=100';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
$response = curl_exec($curl);
curl_close($curl);
$json_data = json_decode($response, true);
//print_r($json_data);
$clubs = $json_data['_embedded']['enheter'];
echo count($clubs);
$sqlinsert = '';
for ($i = 0; $i < $clubs; $i++) {
    //print_r($clubs[$i]);
    //echo $clubs[$i]['organisasjonsnummer'];
    $orgsnumERP = $clubs[$i]['organisasjonsnummer'];
    $nombre_club = $clubs[$i]['navn'];
    //echo $nombre_club;
    $cuentaexist = $fnindex->fnindex_rclub_xorgsnumERP($orgsnumERP);
    if ($cuentaexist->num_rows > 0) {
        echo 'Ya existe';
    } else {
        //$id_club = $fnindex->fnindex_rclublastid();
        $id_club = 0;
        echo 'No existe';
        $desc_club = '';
        $foto_club = '';
        $latitud_club = '0';
        $longitud_club = '0';
        $edadmin_club = 0;
        $edadmax_club = 0;
        $id_categoria = 0;
        $estado_club = 0;
        $orgsnumERP_club = $orgsnumERP;
        $sqlinsert .= "INSERT INTO `club`(`id_club`, `nombre_club`, `desc_club`, `foto_club`, "
                . "`latitud_club`, `longitud_club`, `edadmin_club`, `edadmax_club`, `id_categoria`,"
                . " `estado_club`, `orgsnumERP_club`) "
                . " VALUES ('$id_club','$nombre_club','$desc_club','$foto_club',"
                . " '$latitud_club', '$longitud_club','$edadmin_club','$edadmax_club','$id_categoria',"
                . " '$estado_club','$orgsnumERP_club'); ";
        /* $sqlinsert .= $fnindex->fnindex_sqlinsertclub_xdata($id_club, $nombre_club, $desc_club, $foto_club, $latitud_club,
          $longitud_club, $edadmin_club, $edadmax_club, $id_categoria, $estado_club, $orgsnumERP_club); */
    }
}
echo 'fin'.$sqlinsert;
