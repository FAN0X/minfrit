/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */
function cnindex_f1() {
    $.post("consulta/cn-index.php", $("#filter").serialize(), function (data) {
        $("#list_club").html(data);
    });
}

function cnindex_f3(dato0, dato1) {
    $('#exampleModal').modal('show');
    $.post("consulta/cn-index.php", {dato_0: dato0, dato_1: dato1}, function (data) {
        $("#div_subscribe").html(data);
    });
}

function cnindex_f4(dato0, dato1, dato2) {
    $.post("consulta/cn-index.php", {dato_0: dato0, dato_1: dato1, dato_2: dato2}, function (data) {
        if (data == '1') {
            window.location.href = 'ok-subscription-club.php';
        } else {
            $("#result_subscribe").html(data);
        }
    });
}
const uno = document.getElementById('amount');
uno.addEventListener('input', () => {
  let val= uno.value;
  //el atributo value es un string, el signo "+" transforma en number
  $("#i_resrange").html(val);
});