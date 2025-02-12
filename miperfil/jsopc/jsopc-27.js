//mod
function md27_r001_d1(dato0){
    $.post("mod/mod-27.php",{dato_0: dato0}, function (data) {
        $("#content_md").html(data);
    });
}
function md27_r002_d2(dato0,dato1){
    $.post("mod/mod-27.php",{dato_0: dato0,dato_1: dato1}, function (data) {
        $("#content_md").html(data);
    });
}
function md27_d003_d2(dato0,dato1){
    $.post("mod/mod-27.php",{dato_0: dato0,dato_1: dato1}, function (data) {
        $("#content_sm").html(data);
    });
}
function md27_r004_d2(dato0,dato1){
    $.post("mod/mod-27.php",{dato_0: dato0,dato_1: dato1}, function (data) {
        $("#content_md").html(data);
    });
}

//cn
function cn27_d1() {
    $.post("cn/cn-27.php",{dato_0: -1}, function (data) {
        $("#table27").html(data);
    });
}
function cn27_c001_f1() {
    $.post("cn/cn-27.php",$("#frm_nuevo").serialize(), function (data) {
        $("#msg_mod").html(data);
        cn27_d1();
    });
}
function cn27_u002_f1() {
    $.post("cn/cn-27.php",$("#frm_editar").serialize(), function (data) {
        $("#msg_mod").html(data);
        cn27_d1();
    });
}

function cn27_u003_d3(dato0, dato1, dato2) {
    $.post("cn/cn-27.php", {dato_0: dato0, dato_1: dato1, dato_2: dato2}, function (data) {
        $("#table27").html(data);
    });
}

function cn27_u004_d3(dato0, dato1, dato2) {
    $.post("cn/cn-27.php", {dato_0: dato0, dato_1: dato1, dato_2: dato2}, function (data) {
        $("#fill_"+dato1).html(data);
    });
}

function cn27_u005_d3(dato0, dato1, dato2) {
    var isChecked = document.getElementById('checkbox_sv_'+dato2).checked;
    var dato3 = 0;
    if(isChecked){
        dato3 = 1;
    }
    var dato4 = document.getElementById('tp_habitante_'+dato2).value;
    $.post("cn/cn-27.php",{dato_0: dato0, dato_1: dato1, dato_2: dato2, dato_3: dato3, dato_4: dato4}, function (data) {
        $("#msg_mod").html(data);
        cn27_d1();
    });
}



//js
function js27_001_d1(dato0) {
    
}