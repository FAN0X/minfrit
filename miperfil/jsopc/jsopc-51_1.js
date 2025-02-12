//mod
function md51_r001_d1(dato0){
    $.post("mod/mod-51.php",{dato_0: dato0}, function (data) {
        $("#content_lg").html(data);
    });
}
function md51_r002_d2(dato0,dato1){
    $.post("mod/mod-51.php",{dato_0: dato0,dato_1: dato1}, function (data) {
        $("#content_lg").html(data);
    });
}
function md51_d003_d2(dato0,dato1){
    $.post("mod/mod-51.php",{dato_0: dato0,dato_1: dato1}, function (data) {
        $("#content_sm").html(data);
    });
}
function md51_r004_d1(dato0){
    $.post("mod/mod-51.php",{dato_0: dato0}, function (data) {
        $("#content_lg").html(data);
    });
}

//cn
function cn51_f1() {
    $.post("cn/cn-51.php",$("#frm_serch").serialize(), function (data) {
        $("#table51").html(data);
    });
}
function cn51_c001_f1() {
    $.post("cn/cn-51.php",$("#frm_nuevo").serialize(), function (data) {
        $("#msg_mod").html(data);
        cn51_f1();
    });
}
function cn51_u002_f1() {
    $.post("cn/cn-51.php",$("#frm_editar").serialize(), function (data) {
        $("#msg_mod").html(data);
        cn51_f1();
    });
}

function cn51_u003_d3(dato0, dato1, dato2) {
    $.post("cn/cn-51.php", {dato_0: dato0, dato_1: dato1, dato_2: dato2}, function (data) {
        $("#table51").html(data);
    });
}

function cn51_u004_d3(dato0, dato1, dato2) {
    $.post("cn/cn-51.php", {dato_0: dato0, dato_1: dato1, dato_2: dato2}, function (data) {
        $("#fill_"+dato1).html(data);
    });
}
function cn51_u005_d3(dato0, dato1) {
    $.post("cn/cn-51.php", {dato_0: dato0, dato_1: dato1}, function (data) {
        $("#div_ndepa").html(data);
    });
}

function cn51_r006_f1() {
    $.post("cn/cn-51.php",$("#frm_serch2").serialize(), function (data) {
        $("#table51").html(data);
    });
}
function cn51_r007_d1() {
    var div=document.getElementById("loader");
    div.style.display="block";
    var f = $(this);
    //alert("asdasd");
    var formData = new FormData(document.getElementById("frm_editar"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "cn/cn-51.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    })
            .done(function (res) {
                $("#div_editar").html(res);
            });
}

//js
function js51_001_d() {
    var monto_pm = document.getElementById('monto_pm');
    if( $('#cb_pm').prop('checked') ) {
        monto_pm.disabled = false;
    }else{
        monto_pm.disabled = true;
    }
    
}

