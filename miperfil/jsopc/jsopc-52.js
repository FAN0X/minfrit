//mod
function md52_r001_d1(dato0){
    $.post("mod/mod-52.php",{dato_0: dato0}, function (data) {
        $("#content_md").html(data);
    });
}
function md52_r002_d2(dato0,dato1){
    $.post("mod/mod-52.php",{dato_0: dato0,dato_1: dato1}, function (data) {
        $("#content_md").html(data);
    });
}

//cn
function cn52_c001_f1() {
    $.post("cn/cn-52.php",$("#frm_serch").serialize(), function (data) {
        $("#table52").html(data);
    });
}
function cn52_c002_f1() {
    $.post("cn/cn-52.php",$("#frm_nuevo").serialize(), function (data) {
        $("#msg_mod").html(data);
        cn52_c001_f1();
    });
}