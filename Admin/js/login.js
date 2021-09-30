$(document).ready(function(e){
    $(".login100-form-btn").click(function(e){
        e.preventDefault();
        let user = document.getElementById("user").value;
        let pass = document.getElementById("pass").value;
        let form_data = new FormData();
        form_data.append("user", user);
        form_data.append("pass", pass);
        
        if(user == "" || pass == "") Swal.fire('Campos vacios, inténtalo de nuevo, por favor.','','error');
        else{
            $.ajax({
                type:'post',
                url:'../Db/verificar_usuario.php',
                data:form_data,
                processData: false,
                contentType: false,   
                success:function(){
                    Swal.fire('¡Acceso concedido! ','','success').then((result)=>{
                        if(result.value){
                            window.location.href = "index.php";
                        }
                    });
                }, error:function(){
                    Swal.fire('Acceso denegado, intenta de nuevo.','','error');
                }
            });
            return false;   
        }
    });
});

// Validaciones para < > . & y números en el usuario
// / 38 & / 60 < / 61 = / 62 > /
function uprotection(str){
    let iKeyCode = (str.which) ? str.which : str.keyCode
    if (iKeyCode == 60 || iKeyCode==61 || iKeyCode == 62 || iKeyCode == 38) return false;
    return true;
}

// Validaciones para < > . & y números en la contraseña
// / 38 & / 60 < / 61 = / 62 > /
function pprotection(str){
    let iKeyCode = (str.which) ? str.which : str.keyCode
    if (iKeyCode == 60 || iKeyCode==61 || iKeyCode == 62 || iKeyCode == 38) return false;
    return true;
}

//Quitar la posibilidad de dar click derecho
$(document).bind("contextmenu",function(e) {
    e.preventDefault();
});

//Quitar la posibilidad de dar CTRL+F12
$(document).keydown(function(e){
    if(e.which === 123) return false;
});