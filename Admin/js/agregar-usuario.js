let nombre="";
let pais="";
let email = "";
let pass = "";
let stipo = document.getElementById('stipo').value;


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
    let pais = document.getElementById('pais');
    pais.onpaste = function(e) {
      e.preventDefault();
    }
    let email = document.getElementById('email');
    email.onpaste = function(e) {
      e.preventDefault();
    }
    let pass = document.getElementById('pass');
    pass.onpaste = function(e) {
      e.preventDefault();
    }

}
// Validaciones para < > . & y números en el titulo
// / 48-57 numeros / 38 & / 46 . / 60 < / 61 = / 62 > / " 34/
function nprotection(str){
    
    if(document.getElementById('nombre').value.length>=220){
        return false;   
    }
    else {

        let iKeyCode = (str.which) ? str.which : str.keyCode
        if ( iKeyCode> 47 && iKeyCode < 58 || iKeyCode==61 || iKeyCode == 62 || iKeyCode == 60 || iKeyCode == 46 || iKeyCode == 38 || iKeyCode == 34)
            return false;
        return true; 
    }  
}
// Validaciones para < > . & y números en el titulo
// / 48-57 numeros / 38 & / 46 . / 60 < / 61 = / 62 > /
function pprotection(str){
    
    if(document.getElementById('pais').value.length>=220){
        return false;   
    }
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
    
    if(document.getElementById('email').value.length>=220){
        return false;   
    }
    else {

        let iKeyCode = (str.which) ? str.which : str.keyCode
        if ( iKeyCode==61 || iKeyCode == 62 || iKeyCode == 60 || iKeyCode == 46 || iKeyCode == 38 || iKeyCode == 34 )
            return false;
        return true; 
    }  
}

// Validaciones para < > . & en contraseña
// / 38 & / 46 . / 60 < / 61 = / 62 > /
function cprotection(str){

    let iKeyCode = (str.which) ? str.which : str.keyCode

    if (iKeyCode == 60 || iKeyCode==61 || iKeyCode == 62 || iKeyCode == 38 || iKeyCode == 34)
        return false;
    return true;
    
}
// Validaciones para llenar el formulario
function validate1(val) {
    
    v1 = document.getElementById("nombre");
    v2 = document.getElementById("pais");
    v3 = document.getElementById("email");
    v4 = document.getElementById("pass");
    v5 = document.getElementById("tipo");

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
                pais=v2.value;
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
                email= v3.value;
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
                tipo= v5.value;
            }
        break;
    }
    
    flag = flag1 && flag2 && flag3 && flag4 && flag5;
    
    return flag;

}
    
$(document).ready(function(){
    
        $(".next").click(function(e){
            e.preventDefault();

            if(stipo==3){

                validate1(1);validate1(2);validate1(3);validate1(4);validate1(5);

                if( validate1(1) && validate1(2) && validate1(3) && validate1(4) && validate1(5)){

                    let form_data = new FormData();
                    form_data.append("nombre", nombre); form_data.append("pais", pais);form_data.append("email", email);form_data.append("tipo", tipo);form_data.append("pass", pass);         
                    $.ajax({
                        url:'../Db/agregarUsuario.php',
                        data:form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        type:'post',
                        success:function(){
                            Swal.fire('Usuario agregado correctamente! ','','success').then((result)=>{
                                if(result.value){

                                    window.location.href = "administradores.php";
                                }
                            });           
                        }, error:function(){
                            Swal.fire('El usuario no fue agregado','','error');
                        }   
                    });   
                }

                else{
                    Swal.fire('Por favor rellena todos los datos requeridos','','error');
                }

            }
            else{

                validate1(1);validate1(2);validate1(3);validate1(4);validate1(5);

                if( validate1(1) && validate1(2) && validate1(3) && validate1(4) && validate1(5)){

                    let form_data = new FormData();
                    form_data.append("nombre", nombre); form_data.append("pais", pais);form_data.append("email", email);form_data.append("tipo", "1");form_data.append("pass", pass);         
                    $.ajax({
                        url:'../Db/agregarUsuario.php',
                        data:form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        type:'post',
                        success:function(){
                            Swal.fire('Usuario agregado correctamente! ','','success').then((result)=>{
                                if(result.value){

                                    window.location.href = "escritores.php";
                                }
                            });           
                        }, error:function(){
                            Swal.fire('El usuario no fue agregado','','error');
                        }   
                    });   
                }

                else{
                    Swal.fire('Por favor rellena todos los datos requeridos','','error');
                }

                
            }
        });
});

