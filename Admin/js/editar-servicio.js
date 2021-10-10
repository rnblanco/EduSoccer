let titulo="";
let contenido="";
let id="";

//Quitar la posibilidad de dar click derecho
$(document).bind("contextmenu",function(e) {
    e.preventDefault();
});

//Quitar la posibilidad de dar CTRL+F12
$(document).keydown(function(e){
    if(e.which === 123){
        return false;
    }
});

function r() {
    location.href = "index.php";
}

//Quitar la posibilidad de copiar en titulo y cuerpo
window.onload = function() {
    let title = document.getElementById('titulo');
    title.onpaste = function(e) {
        e.preventDefault();
    }
    let body = document.getElementById('contenido');
    body.onpaste = function(e) {
        e.preventDefault();
    }

}
// Validaciones para < > . & y números en el titulo
// / 48-57 numeros / 38 & / 46 . / 60 < / 61 = / 62 > /
function tprotection(str){

    let iKeyCode = (str.which) ? str.which : str.keyCode
    if ( iKeyCode> 47 && iKeyCode < 58 || iKeyCode==61 || iKeyCode == 62 || iKeyCode == 60 || iKeyCode == 46 || iKeyCode == 38 || iKeyCode == 34)
        return false;
    return true;

}
// Validaciones para < > . & y números en el cuerpo
// / 38 & / 46 . / 60 < / 61 = / 62 > /
function bprotection(str){

    let iKeyCode = (str.which) ? str.which : str.keyCode

    if (iKeyCode == 60 || iKeyCode==61 || iKeyCode == 62 || iKeyCode == 38|| iKeyCode == 34)
        return false;
    return true;

}
// Validaciones para llenar el formulario
function validate1(val) {
    v1 = document.getElementById("titulo");
    v2 = document.getElementById("contenido");
    v4 = document.getElementById("ids");

    flag1 = true;
    flag2 = true;
    flag4 = true;

    switch (val){

        case 1:
            if(v1.value == "") {
                v1.style.borderColor = "red";
                flag1 = false;
            }
            else {
                v1.style.borderColor = "green";
                titulo=v1.value;
                flag1 = true;
            }
            break;
        case 2:
            if(v2.value == "") {
                v2.style.borderColor = "red";
                flag2 = false;
            }
            else {
                v2.style.borderColor = "green";
                contenido=v2.value;
                flag2 = true;
            }
            break;
        case 4:
            if(v4.value == "") {
                v4.style.borderColor = "red";
                flag4 = false;
            }
            else {
                v4.style.borderColor = "green";
                id=v4.value;
                flag4 = true;
            }
            break;
        case 0:
            if(v1.value == "") {
                v1.style.borderColor = "red";
                flag1 = false;
            }
            else {
                v1.style.borderColor = "green";
                flag1 = true;
                titulo=v1.value;
            }
            if(v2.value == "") {
                v2.style.borderColor = "red";
                flag2 = false;
            }
            else {
                v2.style.borderColor = "green";
                flag2 = true;
                contenido=v2.value;
            }
            if(v4.value == "") {
                v4.style.borderColor = "red";
                flag4 = false;
            }
            else {
                v4.style.borderColor = "green";
                id=v4.value;
                flag4 = true;
            }

            break;
    }

    flag = flag1 && flag2 && flag4;

    return flag;

}

$(document).ready(function(){

    $(".next").click(function(e){
        e.preventDefault();

        if( validate1(1) && validate1(2) && validate1(4)){

            let form_data = new FormData();

            form_data.append("contenido", contenido);form_data.append("titulo", titulo);form_data.append("id",id);
            $.ajax({
                url:'../Db/editarServicio.php',
                data:form_data,
                cache: false,
                contentType: false,
                processData: false,
                type:'post',
                success:function(){
                    Swal.fire('Servicio editado correctamente! ','','success').then((result)=>{
                        if(result.value) window.location.href = "servicios.php";
                    });
                }, error:function(){
                    Swal.fire('No has hecho cambios en el servicio','','error');
                }
            });
        }
        else{
            Swal.fire('Por favor rellena todos los datos requeridos','','error');
        }
    });

});