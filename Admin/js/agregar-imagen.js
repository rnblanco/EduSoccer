var img;
var pais="";
var texto="";

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

// Validaciones para < > . & y números en el titulo
// / 48-57 numeros / 38 & / 46 . / 60 < / 61 = / 62 > /
function tprotection(str){

        var iKeyCode = (str.which) ? str.which : str.keyCode
        if ( iKeyCode> 47 && iKeyCode < 58 || iKeyCode==61 || iKeyCode == 62 || iKeyCode == 60 || iKeyCode == 46 || iKeyCode == 38|| iKeyCode == 34 )
            return false;
        return true; 
    
}
// Validaciones para < > . & y números en el cuerpo
// / 38 & / 46 . / 60 < / 61 = / 62 > /
function bprotection(str){

    var iKeyCode = (str.which) ? str.which : str.keyCode

    if (iKeyCode == 60 || iKeyCode==61 || iKeyCode == 62 || iKeyCode == 38|| iKeyCode == 34)
        return false;
    return true;
    
}
// Validaciones para llenar el formulario
function validate1(val) {
    f = document.getElementById('file');
    v3 = document.getElementById("img");

    flag3 = true;

    switch (val){
        
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
        case 0:
            if(v1.value == "") {
                v1.style.borderColor = "red";
                flag1 = false;
            }
            else {
                v1.style.borderColor = "green";
                flag1 = true;
                pais=v1.value;
            }
            if(v2.value == "") {
                v2.style.borderColor = "red";
                flag2 = false;
            }
            else {
                v2.style.borderColor = "green";
                flag2 = true;
                texto=v2.value;
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
                
        break;
    }
    
    flag = flag3;
    
    return flag;

}
    
$(document).ready(function(){
        
        $(".next").click(function(e){
            e.preventDefault();
            validate1(1);
            validate1(2);
            validate1(3);
            
            if(validate1(3)){

                var name = document.getElementById("img").files[0].name;
                var ext = name.split('.').pop().toLowerCase();

                if(jQuery.inArray(ext, ['png','jpg','jpeg']) == -1){
                    Swal.fire({type:"error", title:"Extensión de imagen no permitida, utiliza: png, jpg, jpeg"});
                }

                else {
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("img").files[0]);
                    var f = document.getElementById("img").files[0];
                    var fsize = f.size;
                    
                    if(fsize > 2000000){
                        Swal.fire({type:"error", title:"Imagen demasiado grande"});
                    }
                    else{  
                        img = document.getElementById('img').files[0];
                        var form_data = new FormData();
                        form_data.append("img", img);
                        
                        $.ajax({
                            url:'../Db/agregarImagen.php',
                            data:form_data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type:'post',
                            success:function(data){
                                if(data.code = 200){
                                       Swal.fire('Imagen agregada de manera exitosa! ','','success').then((result)=>{
                                        if(result.value){
                                            window.location.href = "carrusel.php";
                                        }
                                    })
                                }
                                else{
                                    Swal.fire('La imagen no pudo ser agregada, intenta de nuevo','','error');
                                }
                            }

                        });   
                    }
                }
                    
            }
            else{
                Swal.fire('Por favor rellena todos los datos requeridos','','error');
            }
        });
});

$(document).on("click", ".browse", function() {
    var file = $(this).parents().find(".file");
    file.trigger("click");
  });

$('input[type="file"]').change(function(e) {
    var fileName = e.target.files[0].name;
    $("#file").val(fileName);
  
    var reader = new FileReader();
    reader.onload = function(e) {
      // get loaded data and render thumbnail.
      document.getElementById("preview").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
    
    validate1(0);
});