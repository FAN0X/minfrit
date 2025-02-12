/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

function cn152_001_d2(dato0) {
//    loading_start();
    var fechain=$("#fecha_ini").val();
    var fechaout=$("#fecha_fin").val();
    $.post("cn/cn-152.php", {dato_0: dato0,dato_1: fechain,dato_2: fechaout}, function (data) {
        $("#i_tabla152").html(data);
//        loading_start();
    });
}
function loading_start() {
    var div = document.getElementById("i_loadingglobal");
    if (div.style.display != "none") {
        div.style.display = "none";
    } else {
        div.style.display = "block";
    }
}
