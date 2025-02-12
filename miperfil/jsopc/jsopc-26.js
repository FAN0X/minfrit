//mod
function md26_r001_d1(dato0){
    $.post("mod/mod-26.php",{dato_0: dato0}, function (data) {
        $("#content_md").html(data);
    });
}
function md26_r002_d2(dato0,dato1){
    $.post("mod/mod-26.php",{dato_0: dato0,dato_1: dato1}, function (data) {
        $("#content_md").html(data);
    });
}
function md26_d003_d2(dato0,dato1){
    $.post("mod/mod-26.php",{dato_0: dato0,dato_1: dato1}, function (data) {
        $("#content_sm").html(data);
    });
}

//cn
function cn26_d1() {
    $.post("cn/cn-26.php",{dato_0: -1}, function (data) {
        $("#table26").html(data);
    });
}
function cn26_c001_f1() {
    $.post("cn/cn-26.php",$("#frm_nuevo").serialize(), function (data) {
        $("#msg_mod").html(data);
        cn26_d1();
    });
}
function cn26_u002_f1() {
    $.post("cn/cn-26.php",$("#frm_editar").serialize(), function (data) {
        $("#msg_mod").html(data);
        cn26_d1();
    });
}

function cn26_u003_d3(dato0, dato1, dato2) {
    $.post("cn/cn-26.php", {dato_0: dato0, dato_1: dato1, dato_2: dato2}, function (data) {
        $("#table26").html(data);
    });
}

function cn26_u004_d3(dato0, dato1, dato2) {
    $.post("cn/cn-26.php", {dato_0: dato0, dato_1: dato1, dato_2: dato2}, function (data) {
        $("#fill_"+dato1).html(data);
    });
}


//js
function js26_001_d1(dato0) {
    var ver = document.getElementById("new_concepto");
    if(dato0==0){
        ver.style.display = 'block';
    }else{
        ver.style.display = 'none';
    }
}