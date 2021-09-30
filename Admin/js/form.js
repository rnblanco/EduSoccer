let img;
let title="";
let body="";
let seccion = "";

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
    let title = document.getElementById('title');
    title.onpaste = function(e) {
      e.preventDefault();
    }
    let body = document.getElementById('body');
    body.onpaste = function(e) {
      e.preventDefault();
    }

}
// Validaciones para < > . & y números en el titulo
// / 48-57 numeros / 38 & / 46 . / 60 < / 61 = / 62 > /
function tprotection(str){
    
    if(document.getElementById('title').value.length>=100){
        return false;   
    }
    else {

        let iKeyCode = (str.which) ? str.which : str.keyCode
        if ( iKeyCode> 47 && iKeyCode < 58 || iKeyCode==61 || iKeyCode == 62 || iKeyCode == 60 || iKeyCode == 46 || iKeyCode == 38|| iKeyCode == 34 )
            return false;
        return true; 
    }
    
    
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
    v1 = document.getElementById("title");
    v2 = document.getElementById("body");
    v3 = document.getElementById("img");
    v4 = document.getElementsByClassName('radio selected');

    flag1 = true;
    flag2 = true;
    flag3 = true;
    flag4 = true;

    switch (val){
        
        case 1:
            if(v1.value == "") {
                v1.style.borderColor = "red";
                flag1 = false;
            }
            else {
                v1.style.borderColor = "green";
                title=v1.value;
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
                body=v2.value;
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
            if(v4.length==1){
                flag4=true;
                document.getElementById('seccion').value = document.getElementsByClassName('radio selected')[0].id ;
                seccion = document.getElementById('seccion').value;
                switch(seccion){
                    case "ActividadesPastorales": seccion = "Actividades Pastorales";break;
                    case "ArticulosVocacionales": seccion = "Artículos Vocacionales";break;
                    case "Articulosletios": seccion = " Artículos letios";break;
                    case "TestimoniosVocacionales": seccion = " Testimonios Vocacionales";break;
                }  
            }
            else{
                flag4=false;
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
                tile=v1.value;
            }
            if(v2.value == "") {
                v2.style.borderColor = "red";
                flag2 = false;
            }
            else {
                v2.style.borderColor = "green";
                flag2 = true;
                body=v2.value;
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
            if(v4.length==1){
                flag4=true;
                document.getElementById('seccion').value = document.getElementsByClassName('radio selected')[0].id ;
                seccion = document.getElementById('seccion').value;
                switch(seccion){
                    case "ActividadesPastorales": seccion = "Actividades Pastorales";break;
                    case "ArticulosVocacionales": seccion = "Artículos Vocacionales";break;
                    case "Articulosletios": seccion = " Artículos letios";break;
                    case "TestimoniosVocacionales": seccion = " Testimonios Vocacionales";break;
                }  
            }
            else{
                flag4=false;
            }
                
        break;
    }
    
    flag = flag1 && flag2 && flag3 && flag4;
    
    return flag;

}
    
$(document).ready(function(){
    
        let current_fs, next_fs, previous_fs;
        
        $(".next").click(function(e){
            e.preventDefault();
        
            str1 = "next1";
            str2 = "next2";
            
            if(!str1.localeCompare($(this).attr('id')) && validate1(4) == true) {
                val = true;
            }
            else {
                val = false;
            }

            if(!str2.localeCompare($(this).attr('id')) && validate1(0) == true) {
                val2 = true;
            }
            else {
                val2 = false;
            }
            
            // Validaciones para next
            if(!str1.localeCompare($(this).attr('id')) && val==true) {
                
                current_fs = $(this).parent().parent();
                next_fs = $(this).parent().parent().next();
                
                $(current_fs).removeClass("show");
                $(next_fs).addClass("show");
                
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                
                current_fs.animate({}, {
                    
                    step: function() {
                    
                    current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                    });
                    
                    next_fs.css({
                    'display': 'block'
                    });
                    }
                });
            }

            else if(!str2.localeCompare($(this).attr('id')) && val2 == true){

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
                        form_data.append("seccion", seccion);form_data.append("title", title);form_data.append("body", body);
                        console.log(img,seccion,title,body);
                                
                        $.ajax({
                            url:'../Db/agregarPublicacion.php',
                            data:form_data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type:'post',
                            success:function(data){
                                if(data.code = 200){
                                       Swal.fire('¡Artículo publicado de manera exitosa! ','','success').then((result)=>{
                                        if(result.value){
                                            window.location.href = "index.php";
                                        }
                                    })
                                }
                                else{
                                    Swal.fire('El artículo no pudo ser publicado, intenta de nuevo','','error');
                                }
                            }

                        });   
                    }
                }
                    
            }
            else if(!str2.localeCompare($(this).attr('id')) && val2 !== true){
                Swal.fire('Por favor rellena todos los datos requeridos','','error');
            }
            
        });
        // Validaciones para el diseño (pasar a la otra zona y colorear la barra de progresión)
        $(".prev").click(function(){
        
            current_fs = $(this).parent().parent();
            previous_fs = $(this).parent().parent().prev();
            
            $(current_fs).removeClass("show");
            $(previous_fs).addClass("show");
            
            $("#progressbar li").eq($("fieldset").index(next_fs)).removeClass("active");
            
            current_fs.animate({}, {
            step: function() {
                current_fs.css({
                'display': 'none',
                'position': 'relative'
                });
                
                previous_fs.css({
                'display': 'block'
                });
            }});
        });
    
        $('.row .radio').click(function(){
            let sel = document.getElementsByClassName('radio selected');
            if(sel.length>0){
                sel[0].classList.remove('selected');
                $(this).toggleClass('selected');
            }
            else{
                $(this).toggleClass('selected');
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