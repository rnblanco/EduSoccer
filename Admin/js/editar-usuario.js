let nombre="";
let apellido="";
let usuario = "";
let pass = "";
let edad = "";

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

//Quitar la posibilidad de copiar en todo
window.onload = function() {
    let nombre = document.getElementById('nombre');
    nombre.onpaste = function(e) {
        e.preventDefault();
    }
    let apellido = document.getElementById('apellido');
    apellido.onpaste = function(e) {
        e.preventDefault();
    }
    let usuario = document.getElementById('usuario');
    usuario.onpaste = function(e) {
        e.preventDefault();
    }
    let pass = document.getElementById('pass');
    pass.onpaste = function(e) {
        e.preventDefault();
    }
}

//Validación para edades no mayores a 100
$('.ageValidation').on('keydown keyup change', function(e){
    if ($(this).val() > 100 || $(this).val() < 0
        && e.keyCode !== 46 // keycode para delete
        && e.keyCode !== 8  // keycode para enter
    ) {
        e.preventDefault();
        $(this).val(Math.trunc($(this).val()/10) <= 0 ? '' : Math.trunc($(this).val()/10));
    }
});
// Validaciones para < > . & y números en el titulo
function notnumprotection(str){
    let iKeyCode = (str.which) ? str.which : str.keyCode
    if ( iKeyCode==45 || iKeyCode==61 || iKeyCode == 62 || iKeyCode == 60 || iKeyCode == 46 || iKeyCode == 38 || iKeyCode == 34) return false;
    return true;
}
// Validaciones para < > . & y números en el titulo
// / 48-57 numeros / 38 & / 46 . / 60 < / 61 = / 62 > / " 34/
function nprotection(str){
    if(document.getElementById('nombre').value.length>=220) return false;
    else {
        let iKeyCode = (str.which) ? str.which : str.keyCode
        if ( iKeyCode> 47 && iKeyCode < 58 || iKeyCode==61 || iKeyCode == 62 || iKeyCode == 60 || iKeyCode == 46 || iKeyCode == 38 || iKeyCode == 34 ) return false;
        return true;
    }
}
// Validaciones para < > . & y números en el titulo
// / 48-57 numeros / 38 & / 46 . / 60 < / 61 = / 62 > /
function pprotection(str){

    if(document.getElementById('apellido').value.length>=220) return false;
    else {
        let iKeyCode = (str.which) ? str.which : str.keyCode
        if ( iKeyCode> 47 && iKeyCode < 58 || iKeyCode==61 || iKeyCode == 62 || iKeyCode == 60 || iKeyCode == 46 || iKeyCode == 38 || iKeyCode == 34)
            return false;
        return true;
    }
}
// Validaciones para < > . & y números en el titulo
// / 48-57 numeros / 38 & / 46 . / 60 < / 61 = / 62 > /
function eprotection(str){

    if(document.getElementById('usuario').value.length>=220)return false;
    else {
        let iKeyCode = (str.which) ? str.which : str.keyCode
        if ( iKeyCode==61 || iKeyCode == 62 || iKeyCode == 60 || iKeyCode == 46 || iKeyCode == 38 || iKeyCode == 34 ) return false;
        return true;
    }
}

// Validaciones para < > . & en contraseña
// / 38 & / 46 . / 60 < / 61 = / 62 > /
function cprotection(str){
    let iKeyCode = (str.which) ? str.which : str.keyCode
    if (iKeyCode == 60 || iKeyCode==61 || iKeyCode == 62 || iKeyCode == 38 || iKeyCode == 34) return false;
    return true;
}
// Validaciones para llenar el formulario
function validate1(val) {

    v1 = document.getElementById("nombre");
    v2 = document.getElementById("apellido");
    v3 = document.getElementById("usuario");
    v4 = document.getElementById("pass");
    v5 = document.getElementById("edad");

    flag1 = true;
    flag2 = true;
    flag3 = true;
    flag4 = true;
    flag5 = true;

    switch (val){

        case 1:
            if(v1.value == "") {
                v1.style.borderColor = "red";
                flag1 = false;
            }
            else {

                v1.style.borderColor = "green";
                nombre=v1.value;
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
                apellido=v2.value;
                flag2 = true;
            }
            break;

        case 3:
            if(v3.value == "") {
                v3.style.borderColor = "red";
                flag3 = false;
            }
            else {
                v3.style.borderColor = "green";
                flag3 = true;
                usuario= v3.value;
            }
            break;
        case 4:
            if(v4.value == "") {
                v4.style.borderColor = "red";
                flag3 = false;
            }
            else {
                v4.style.borderColor = "green";
                flag3 = true;
                pass= v4.value;
            }
            break;

        case 5:
            if(v5.value == "") {
                v5.style.borderColor = "red";
                flag5 = false;
            }
            else {
                v5.style.borderColor = "green";
                flag5 = true;
                edad = v5.value;
            }
            break;
    }
    let flag = flag1 && flag2 && flag3 && flag4 && flag5;
    return flag;
}

$(document).ready(function(){

    $(".next").click(function(e){
        e.preventDefault();
        validate1(1);validate1(2);validate1(3);validate1(4);validate1(5);
        let checkBox = document.getElementById("flexCheckDefault");
        if (checkBox.checked == true){
            if( validate1(1) && validate1(2) && validate1(3) && validate1(4) && validate1(5)){
                let form_data = new FormData();
                let estado = document.getElementById("estado");
                let cargo = document.getElementById("cargo");
                form_data.append("nombre", nombre); form_data.append("apellido", apellido);form_data.append("edad", edad);
                form_data.append("pass", pass);form_data.append("usuario", usuario);form_data.append("estado", estado.value);
                form_data.append("cargo", cargo.value);form_data.append("md5", true);form_data.append("id", ids.value);
                $.ajax({
                    url:'../Db/editarUsuario.php',
                    data:form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type:'post',
                    success:function(){
                        Swal.fire('Profesor editado correctamente! ','','success').then((result)=>{
                            if(result.value) window.location.href = "usuarios.php";
                        });
                    }, error:function(){
                        Swal.fire('Por favor cambia los datos para proceder','','error');
                    }
                });
            }
            else Swal.fire('Por favor rellena todos los datos requeridos','','error');
        }
        else{
            if( validate1(1) && validate1(2) && validate1(3) && validate1(4)){

                let form_data = new FormData();
                let estado = document.getElementById("estado");
                let cargo = document.getElementById("cargo");
                let password = document.getElementById("password");
                let ids = document.getElementById("ids");
                form_data.append("nombre", nombre); form_data.append("apellido", apellido);form_data.append("edad", edad);
                form_data.append("pass", password.value);form_data.append("usuario", usuario);form_data.append("estado", estado.value);
                form_data.append("cargo", cargo.value);form_data.append("md5", false);form_data.append("id", ids.value);
                $.ajax({
                    url:'../Db/editarUsuario.php',
                    data:form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type:'post',
                    success:function(){
                        Swal.fire('Profesor editado correctamente! ','','success').then((result)=>{
                            if(result.value) window.location.href = "usuarios.php";
                        });
                    }, error:function(){
                        Swal.fire('Por favor cambia los datos para proceder','','error');
                    }
                });
            }
            else Swal.fire('Por favor rellena todos los datos requeridos','','error');
        }

    });
});

function showPassword(){
    let checkBox = document.getElementById("flexCheckDefault");
    let password = document.getElementById("password-div");
    if (checkBox.checked == true) password.style.display = "block";
    else password.style.display = "none";
}