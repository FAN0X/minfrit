function cn2_d1(dato0, dato1) {
    $.post("consulta/cn-2.php", {dato_0: dato0, dato_1: dato1}, function (data) {
        $("#div_ciudad").html(data);
    });
}
function cn2_f2() {
    $.post("consulta/cn-2.php", $("#frm_editarusuario").serialize(), function (data) {
        $("#div_editar").html(data);
    });
}
function md2_d1(dato0, dato1) {
    $.post("modal/mod-2.php", {dato_0: dato0,dato_1: dato1}, function (data) {
        $("#content_md").html(data);
    });
}
function cn2_f5() {
    var f = $(this);
    var formData = new FormData(document.getElementById("frm_imagen"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "consulta/cn-2.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    })
            .done(function (res) {
                $("#div_editarimagen").html(res);
            });
}