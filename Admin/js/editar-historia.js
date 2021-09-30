let img;
let titulo="";
let contenido="";
let id="";
let subtitulo="";

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
function notnumprotection(str){
    let iKeyCode = (str.which) ? str.which : str.keyCode
    if ( iKeyCode==61 || iKeyCode == 62 || iKeyCode == 60 || iKeyCode == 46 || iKeyCode == 38 || iKeyCode == 34) return false;
    return true;
}
// / 48-57 numeros / 38 & / 46 . / 60 < / 61 = / 62 > /
function tprotection(str){
    let iKeyCode = (str.which) ? str.which : str.keyCode
    if ( iKeyCode> 47 && iKeyCode < 58 || iKeyCode==61 || iKeyCode == 62 || iKeyCode == 60 || iKeyCode == 46 || iKeyCode == 38 || iKeyCode == 34) return false;
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
    f = document.getElementById('file');
    v1 = document.getElementById("titulo");
    v5 = document.getElementById("subtitulo");
    v2 = document.getElementById("contenido");
    v3 = document.getElementById("img");
    v4 = document.getElementById("ids");

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
        case 3:
            if(v3.value == "") {
                v3.style.borderColor = "red";
                flag3 = false;
            }
            else {
                f.style.borderColor = "green";
                v3.style.borderColor = "green";
                flag3 = true;
                img=v3.value;
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
        case 5:
            if(v5.value == "") {
                v5.style.borderColor = "red";
                flag5 = false;
            }
            else {
                v5.style.borderColor = "green";
                subtitulo=v5.value;
                flag5 = true;
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
            if(v3.value == "") {
                v3.style.borderColor = "red";
                f.style.borderColor = "red";
                flag3 = false;
            }
            else {
                f.style.borderColor = "green";
                v3.style.borderColor = "green";
                flag3 = true;
                img=v3.value;
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
            if(v5.value == "") {
                v5.style.borderColor = "red";
                flag5 = false;
            }
            else {
                v5.style.borderColor = "green";
                flag5 = true;
                subtitulo=v5.value;
            }
                
        break;
    }
    
    flag = flag1 && flag2 && flag3 && flag4 && flag5;
    
    return flag;

}
    
$(document).ready(function(){
    
        $(".next").click(function(e){
            e.preventDefault();

            //con imagen
            if( validate1(1) && validate1(2) && validate1(3) && validate1(4) && validate1(5)){

                let name = document.getElementById("img").files[0].name;
                let ext = name.split('.').pop().toLowerCase();

                if(jQuery.inArray(ext, ['png','jpg','jpeg']) == -1){
                    Swal.fire({type:"error", title:"Extensión de imagen no permitida, utiliza: png, jpg, jpeg"});
                }

                else {
                    let oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("img").files[0]);
                    let f = document.getElementById("img").files[0];
                    let fsize = f.size;
                    
                    if(fsize > 2000000){
                        Swal.fire({type:"error", title:"Imagen demasiado grande"});
                    }
                    else{  
                        img = document.getElementById('img').files[0];
                        let form_data = new FormData();
                        form_data.append("img", img);
                        form_data.append("contenido", contenido);form_data.append("titulo", titulo);form_data.append("subtitulo", subtitulo);form_data.append("id",id);
                        $.ajax({
                            url:'../Db/editarHistoriaConImagen.php',
                            data:form_data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type:'post',
                            success:function(){
                                Swal.fire('Historia editada correctamente! ','','success').then((result)=>{
                                    if(result.value){

                                        window.location.href = "historia.php";
                                    }
                                });
                            }, error:function(){
                                Swal.fire('La historia no fue editada con imagen','','error');
                            }
                        });
                    }
                }
            }
            //sin imagen
            else if( validate1(1) && validate1(2) && validate1(3)==false && validate1(4) && validate1(5)){

                let form_data = new FormData();

                        form_data.append("contenido", contenido);form_data.append("titulo", titulo);form_data.append("subtitulo", subtitulo);form_data.append("id",id);
                        $.ajax({
                            url:'../Db/editarHistoriaSinImagen.php',
                            data:form_data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type:'post',
                            success:function(){
                                Swal.fire('Historia editada correctamente! ','','success').then((result)=>{
                                    if(result.value){
    
                                        window.location.href = "historia.php";
                                    }
                                });           
                            }, error:function(){
                                Swal.fire('No has hecho cambios en la historia','','error');
                            }
                        });   
            }
            else{
                Swal.fire('Por favor rellena todos los datos requeridos','','error');
            }
        });
        
});

$(document).on("click", ".browse", function() {
    let file = $(this).parents().find(".file");
    file.trigger("click");
  });

$('input[type="file"]').change(function(e) {
    let fileName = e.target.files[0].name;
    $("#file").val(fileName);
  
    let reader = new FileReader();
    reader.onload = function(e) {
      // get loaded data and render thumbnail.
      document.getElementById("preview").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
    
    validate1(0);
});