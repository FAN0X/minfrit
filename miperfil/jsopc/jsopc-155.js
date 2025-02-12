function md155_d1(dato0) {
    $.post("mod/mod-155.php", {dato_0: dato0}, function (data) {
        $("#content_md").html(data);
    });
}

function cn155_f1() {
    $.post("cn/cn-155.php", $("#frm_nuevo").serialize(), function (data) {
        $("#table155").html(data);
    });
}

function md155_d2(dato0, dato1) {
    $.post("mod/mod-155.php", {dato_0: dato0, dato_1: dato1}, function (data) {
        $("#content_md").html(data);
    });
}

function cn155_f2() {
    $.post("cn/cn-155.php", $("#frm_editar").serialize(), function (data) {
        $("#table155").html(data);
        //$("#div_editar").html(data);
    });
}

function md155_d3(dato0, dato1) {
    $.post("mod/mod-155.php", {dato_0: dato0, dato_1: dato1}, function (data) {
        $("#content_md").html(data);
    });
}

function cn155_f3() {
    var f = $(this);
    var formData = new FormData(document.getElementById("frm_imagen"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "cn/cn-155.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function (res) {
        $("#div_editarimagen").html(res);
        cn155_table();
    });
}

function md155_d4(dato0, dato1) {
    $.post("mod/mod-155.php", {dato_0: dato0, dato_1: dato1}, function (data) {
        $("#content_sm").html(data);
    });
}

function cn155_f4(dato0, dato1, dato2) {
    $.post("cn/cn-155.php", {dato_0: dato0, dato_1: dato1, dato_2: dato2}, function (data) {
        $("#fill_"+dato1).html(data);
    });
}

function cn155_table(){
    $.post("cn/cn-155.php", {dato_0: -1}, function (data) {
        $("#table155").html(data);
    });
}

function md155_d5(dato0, dato1, dato2) {
    $.post("mod/mod-155.php", {dato_0: dato0, dato_1: dato1, dato_2:dato2}, function (data) {
        $("#content_sm").html(data);
    });
}

function cn155_f5(){
    $.post("cn/cn-155.php", $("#frm_password").serialize(), function (data) {
        $("#i_result").html(data);
    });
}

function cn155_f6(dato0, dato1, dato2){
    $.post("cn/cn-155.php", {dato_0: dato0, dato_1: dato1, dato_2:dato2}, function (data) {
        $("#table155").html(data);
    });
}
function cn155_f7(dato0, dato1, dato2) {
    $.post("cn/cn-155.php", {dato_0: dato0, dato_1: dato1, dato_2: dato2}, function (data) {
        $("#fill_"+dato1).html(data);
    });
}

