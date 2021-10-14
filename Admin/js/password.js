let lastPass="";
let newPass="";

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

// Validaciones para llenar el formulario
function validate1(val) {
    v4 = document.getElementById("lastPass");
    v5 = document.getElementById("newPass");

    flag4 = true;
    flag5 = true;

    switch (val){
        case 4:
            if(v4.value == "") {
                v4.style.borderColor = "red";
                flag4 = false;
            }
            else {
                v4.style.borderColor = "green";
                lastPass=v4.value;
                flag4 = true;
            }
            break;
        case 5:
            if(v5.value == "") {
                v5.style.borderColor = "red";
                flag5 = false;
            }
            else {
                v5.style.borderColor = "green";
                newPass=v5.value;
                flag5 = true;
            }
            break;
    }
    flag = flag4 && flag5;
    return flag;
}
    
$(document).ready(function(){
        
        $(".next").click(function(e){
            e.preventDefault();
            validate1(4);
            validate1(5);

            if( validate1(4) == true && validate1(5) == true){

                let form_data = new FormData();
                form_data.append("id", idUsuario); form_data.append("lastPass", lastPass);form_data.append("newPass", newPass);
                $.ajax({
                    url:'../Db/cambiarPassword.php',
                    data:form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type:'post',
                    success:function(){
                       Swal.fire('Contraseña editada de manera exitosa! ','','success').then((result)=>{
                            if(result.value) window.location.href = "index.php";
                       });
                    },
                    error:function(){
                        Swal.fire('Escribe la contraseña anterior, por favor','','error');
                    }
                });
            }
            else Swal.fire('Por favor rellena todos los datos requeridos','','error');

        });
});