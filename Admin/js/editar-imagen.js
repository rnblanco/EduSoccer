var img;
var id="";


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
    f = document.getElementById('file');
    v3 = document.getElementById("img");
    v4 = document.getElementById("ids");

    flag3 = true;
    flag4 = true;

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
                
        break;
    }
    
    flag = flag3 && flag4;
    
    return flag;

}
    
$(document).ready(function(){
    
        $(".next").click(function(e){
            e.preventDefault();

            
            if( validate1(3) && validate1(4)){

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
                        form_data.append("id",id);      
                        $.ajax({
                            url:'../Db/editarImagen.php',
                            data:form_data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type:'post',
                            success:function(){
                                Swal.fire('Imagen editada correctamente! ','','success').then((result)=>{
                                    if(result.value){
    
                                        window.location.href = "carrusel.php";
                                    }
                                });           
                            }, error:function(){
                                Swal.fire('No has cambiado la imagen','','error');
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