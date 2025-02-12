function cnsesion_f1() {
    
    $.post("sesiones/sesion.php", $("#account").serialize(), function (data) {
        if (data == "1") {
            location.href = "./index.php?opc=4";
        } else {
            $("#div_sesion").html(data);
        }
    });
}

function sesion_registro() {
    //alert("EJECUTADO");
    var div = document.getElementById("i_loader");
    div.style.display = "block";
    
    $.post("sesiones/sesion_registro.php", $("#i_formregistro").serialize(), function (data) {
 
        if (data == 1) {
            window.location.href = "http://project.supaysoft.net:84/proyectos/wasiup/V3/index.php?opc=4";
        } else {
            $("#i_res").html(data);
        }
    });
}