//mod
function md28_r001_d1(dato0){
    $.post("mod/mod-28.php",{dato_0: dato0}, function (data) {
        $("#content_lg").html(data);
    });
}
function md28_r002_d2(dato0,dato1){
    $.post("mod/mod-28.php",{dato_0: dato0,dato_1: dato1}, function (data) {
        $("#content_lg").html(data);
    });
}
function md28_d003_d2(dato0,dato1){
    $.post("mod/mod-28.php",{dato_0: dato0,dato_1: dato1}, function (data) {
        $("#content_sm").html(data);
    });
}

//cn
function cn28_d1() {
    $.post("cn/cn-28.php",{dato_0: -1}, function (data) {
        $("#table28").html(data);
    });
}
function cn28_c001_f1() {
    $.post("cn/cn-28.php",$("#frm_nuevo").serialize(), function (data) {
        $("#msg_mod").html(data);
        cn28_d1();
    });
}
function cn28_u002_f1() {
    $.post("cn/cn-28.php",$("#frm_editar").serialize(), function (data) {
        $("#msg_mod").html(data);
        cn28_d1();
    });
}

function cn28_u003_d3(dato0, dato1, dato2) {
    $.post("cn/cn-28.php", {dato_0: dato0, dato_1: dato1, dato_2: dato2}, function (data) {
        $("#table28").html(data);
    });
}

function cn28_u004_d3(dato0, dato1, dato2) {
    $.post("cn/cn-28.php", {dato_0: dato0, dato_1: dato1, dato_2: dato2}, function (data) {
        $("#fill_"+dato1).html(data);
    });
}
function cn28_u005_d3(dato0, dato1) {
    $.post("cn/cn-28.php", {dato_0: dato0, dato_1: dato1}, function (data) {
        $("#div_ndepa").html(data);
    });
}

function cn28_r006_d3(dato0) {
    var dato1 = document.getElementById('cedula_usuario').value;
    $.post("cn/cn-28.php", {dato_0: dato0, dato_1: dato1}, function (data) {
        if(data==1){
            toastr.error("Ingrese Cédula Válida");
            $("#msg_verifi").html('');
        }else if(data==2){
            toastr.error("Usuario no Encontrado");
            $("#msg_verifi").html('');
        }else{
            $("#data_user").html(data);
        }
        
    });
}


//js
function js28_001_d1(dato0) {
    
}

