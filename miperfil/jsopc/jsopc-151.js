//mod
function md151_r001_d1(dato0){
    $.post("mod/mod-151.php",{dato_0: dato0}, function (data) {
        $("#content_lg").html(data);
    });
}
function md151_r002_d2(dato0,dato1){
    $.post("mod/mod-151.php",{dato_0: dato0,dato_1: dato1}, function (data) {
        $("#content_lg").html(data);
    });
}
function md151_d003_d2(dato0,dato1){
    $.post("mod/mod-151.php",{dato_0: dato0,dato_1: dato1}, function (data) {
        $("#content_sm").html(data);
    });
}
function md151_r004_d1(dato0){
    $.post("mod/mod-151.php",{dato_0: dato0}, function (data) {
        $("#content_lg").html(data);
    });
}
function md151_r005_d1(dato0,dato1){
    $.post("mod/mod-151.php",{dato_0: dato0,dato_1:dato1}, function (data) {
        $("#content_md").html(data);
    });
}


//cn
function cn151_f1() {
    $.post("cn/cn-151.php",$("#frm_serch").serialize(), function (data) {
        $("#table151").html(data);
    });
}
function cn151_c001_f1() {
    $.post("cn/cn-151.php",$("#frm_nuevo").serialize(), function (data) {
        $("#msg_mod").html(data);
        cn151_f1();
    });
}
function cn151_u002_f1() {
    $.post("cn/cn-151.php",$("#frm_editar").serialize(), function (data) {
        $("#msg_mod").html(data);
        cn151_f1();
    });
}

function cn151_u003_d3(dato0, dato1, dato2) {
    $.post("cn/cn-151.php", {dato_0: dato0, dato_1: dato1, dato_2: dato2}, function (data) {
        $("#table151").html(data);
    });
}

function cn151_u004_d3(dato0, dato1, dato2) {
    $.post("cn/cn-151.php", {dato_0: dato0, dato_1: dato1, dato_2: dato2}, function (data) {
        $("#fill_"+dato1).html(data);
    });
}
function cn151_u005_d3(dato0, dato1) {
    $.post("cn/cn-151.php", {dato_0: dato0, dato_1: dato1}, function (data) {
        $("#div_ndepa").html(data);
    });
}

function cn151_r006_f1() {
    $.post("cn/cn-151.php",$("#frm_serch2").serialize(), function (data) {
        $("#table151").html(data);
    });
}
function cn151_r007_d1() {
    var div=document.getElementById("loader");
    div.style.display="block";
    var f = $(this);
    //alert("asdasd");
    var formData = new FormData(document.getElementById("frm_editar"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "cn/cn-151.php",
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
function cn151_r008_d1(dato0,dato1) {
    $.post("cn/cn-151.php", {dato_0: dato0, dato_1: dato1}, function (data) {
        $("#id_concon").html(data);
        js151_001_d(dato1);
    });
}
function cn151_r009_f() {
    var div=document.getElementById("loader");
    div.style.display="block";
    //alert("asdasd");
    var formData = new FormData(document.getElementById("frm_upload"));
    $.ajax({
        url: "cn/cn-151.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    })
            .done(function (res) {
                $("#div_loader").html(res);
            });
}

function cn151_c010_d1(dato0,dato_nombre) {
    Swal.fire({
        title: "¿Desea enviar un correo al habitante "+dato_nombre+"?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, realizar",
        cancelButtonText: "No, salir"
    }).then((result) => {
        if (result.isConfirmed) {
//            $.post("consulta/cn-21.php",  $("#frm_paciente").serialize(), function (data) {
//                $("#div_botones").html(data);
//            });
        }
    });
    
}

//js
function js151_001_d() {
    var monto_pm = document.getElementById('monto_pm');
    if( $('#cb_pm').prop('checked') ) {
        monto_pm.disabled = false;
    }else{
        monto_pm.disabled = true;
    }
    
}

function js151_001_d(tipo) {
    var i_vivienda = document.getElementById('i_vivienda');
    var i_rep_max = document.getElementById('i_rep_max');
    if(tipo==1){
        i_vivienda.style.display='none';
        i_rep_max.style.display='none';
    }else{
        i_vivienda.style.display='block';
        i_rep_max.style.display='block';
    }
}

