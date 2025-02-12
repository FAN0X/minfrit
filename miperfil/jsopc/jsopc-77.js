function cn77_d1(dato0, dato1) {
    $.post("cn/cn-77.php",{dato_0: dato0, dato_1: dato1}, function (data) {
        $("#list-rol").html(data);
    });
}
function cn77_d2(dato0, dato1, dato2) {
    $.post("cn/cn-77.php",{dato_0: dato0, dato_1: dato1, dato_2: dato2}, function (data) {
        $("#list-opc").html(data);
    });
}
function cn77_d3(dato0, dato1, dato2, dato3) {
    $.post("cn/cn-77.php",{dato_0: dato0, dato_1: dato1, dato_2: dato2, dato_3: dato3}, function (data) {
        $("#div_"+dato3).html(data);
    });
}
