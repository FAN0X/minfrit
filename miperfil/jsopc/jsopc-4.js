//mod
function md4_r001_d1(dato0) {
    $.post("mod/mod-4.php",{dato_0: dato0}, function (data) {
        $("#content_md").html(data);
    });
}
function md4_r002_d1(dato0,dato1) {
    $.post("mod/mod-4.php",{dato_0: dato0,dato_1: dato1}, function (data) {
        $("#content_lg").html(data);
    });
}


//cn
function cn4_c001_f1() {
    $.post("cn/cn-4.php",$("#frm_nuevo").serialize(), function (data) {
        $("#msg_mod").html(data);
    });
}