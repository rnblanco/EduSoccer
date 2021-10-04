let img;
let nombre="";
let edad="";
let nacimiento="";
let padre="";
let padreTel="";
let madre="";
let madreTel="";
let contacto="";

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

//Quitar la posibilidad de copiar en nombre y cuerpo
window.onload = function() {
    let title = document.getElementById('nombre');
    title.onpaste = function(e) {
      e.preventDefault();
    }
    let body = document.getElementById('nacimiento');
    body.onpaste = function(e) {
      e.preventDefault();
    }
}
//Validación para telefonos no mayores a 6 digitos
$('.phoneValidation').on('keydown keyup change', function(e){
    if ($(this).val() > 80000000
        && e.keyCode !== 46 // keycode para delete
        && e.keyCode !== 6 // keycode para enter
    ) {
        e.preventDefault();
        $(this).val(Math.trunc($(this).val()/8));
    }
});

//Validación para edades no mayores al año actual y no menores a hace 80 años
$('.dateValidation').on('keydown keyup change', function(e){
    const value = $(this).val();
    const selectedYear = value.split('-')[0];
    const selectedMonth = value.split('-')[1];
    const selectedDay = value.split('-')[2];
    const currentYear=new Date().getFullYear();
    if(selectedYear > currentYear || (selectedDay > 0 || selectedMonth > 0) && selectedYear > 777 && selectedYear < currentYear - 80 ){
        e.preventDefault();
        $(this).val("");
    }
});

// Validaciones para < > . & y números en el nombre
// / 46-55 numeros / 36 & / 46 . / 60 < / 61 = / 62 > /
function tprotection(str){

    let iKeyCode = (str.which) ? str.which : str.keyCode
    if ( iKeyCode> 45 && iKeyCode < 56 || iKeyCode==61 || iKeyCode == 62 || iKeyCode == 60 || iKeyCode == 46 || iKeyCode == 36|| iKeyCode == 34 ) return false;
    return true;

}
// Validaciones para < > . & y números en el cuerpo
// / 36 & / 46 . / 60 < / 61 = / 62 > /
function bprotection(str){

    let iKeyCode = (str.which) ? str.which : str.keyCode
    if (iKeyCode == 60 || iKeyCode==61 || iKeyCode == 62 || iKeyCode == 36|| iKeyCode == 34)
        return false;
    return true;

}
// Validaciones para llenar el formulario
function validate1(val) {
    f = document.getElementById('file');
    v1 = document.getElementById("nombre");
    v2 = document.getElementById("nacimiento");
    v3 = document.getElementById("img");
    v4 = document.getElementById("edad");
    v5 = document.getElementById("padre");
    v6 = document.getElementById("padreTel");
    v7 = document.getElementById("madre");
    v8 = document.getElementById("madreTel");
    v9 = document.getElementById("contacto");

    flag1 = true;
    flag2 = true;
    flag3 = true;
    flag4 = true;
    flag5 = true;
    flag6 = true;
    flag7 = true;
    flag8 = true;
    flag9 = true;

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
                nacimiento=v2.value;
                flag2 = true;
            }
        break;
        case 3:
            f.style.borderColor = "green";
            v3.style.borderColor = "green";
            flag3 = true;
            img = v3.value || null;
        break;
        case 4:
            if(v4.value == "") {
                v4.style.borderColor = "red";
                flag4 = false;
            }
            else {
                v4.style.borderColor = "green";
                edad=v4.value;
                flag4 = true;
            }
            break;
        case 5:
            v5.style.borderColor = "green";
            padre = v5.value || null;
            flag5 = true;
            break;
        case 6:
            v6.style.borderColor = "green";
            padreTel = v6.value || null;
            flag6 = true;
            break;
        case 7:
            v7.style.borderColor = "green";
            madre = v7.value || null;
            flag7 = true;
            break;
        case 8:
            v8.style.borderColor = "green";
            madreTel = v8.value || null;
            flag8 = true;
            break;
        case 9:
            if(v9.value == "") {
                v9.style.borderColor = "red";
                flag9 = false;
            }
            else {
                v9.style.borderColor = "green";
                contacto=v9.value;
                flag9 = true;
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
                nombre=v1.value;
            }
            if(v2.value == "") {
                v2.style.borderColor = "red";
                flag2 = false;
            }
            else {
                v2.style.borderColor = "green";
                flag2 = true;
                nacimiento=v2.value;
            }
            // 3
            f.style.borderColor = "green";
            v3.style.borderColor = "green";
            flag3 = true;
            img = v3.value || null;

            if(v4.value == "") {
                v4.style.borderColor = "red";
                flag4 = false;
            }
            else {
                v4.style.borderColor = "green";
                flag4 = true;
                edad=v4.value;
            }
            // 5 - 8
            v5.style.borderColor = "green";
            padre = v5.value || null;
            flag5 = true;
            v6.style.borderColor = "green";
            padreTel = v6.value || null;
            flag6 = true;
            v7.style.borderColor = "green";
            madre = v7.value || null;
            flag7 = true;
            v8.style.borderColor = "green";
            madreTel = v8.value || null;
            flag8 = true;

            if(v9.value == "") {
                v9.style.borderColor = "red";
                flag9 = false;
            }
            else {
                v9.style.borderColor = "green";
                contacto=v9.value;
                flag9 = true;
            }
        break;
    }
    let flag = flag1 && flag2 && flag3 && flag4 && flag5 && flag6 && flag7 && flag8 && flag9;
    return flag;
}

$(document).ready(function(){

        $(".next").click(function(e){
            e.preventDefault();
            validate1(1);validate1(2);validate1(3); validate1(4); validate1(5);
            validate1(6); validate1(7); validate1(8); validate1(9);

            if(validate1(1) && validate1(2) && validate1(3) && validate1(4) && validate1(5) &&
                validate1(6) && validate1(7) && validate1(8) && validate1(9)){

                let name = document.getElementById("img").files[0] ? document.getElementById("img").files[0].name : null;
                let ext =  name ? name.split('.').pop().toLowerCase() :null;

                if(jQuery.inArray(ext, ['png','jpg','jpeg']) == -1 && name != null) Swal.fire({type:"error", title:"Extensión de imagen no permitida, utiliza: png, jpg, jpeg"});
                else {
                    if(name !=null){
                        let oFReader = new FileReader();
                        oFReader.readAsDataURL(document.getElementById("img").files[0]) ;
                        let f = document.getElementById("img").files[0];
                        let fsize = f.size;
                        if(fsize > 2000000) Swal.fire({type:"error", title:"Imagen demasiado grande"});
                        else{
                            img = document.getElementById('img').files[0];
                            let form_data = new FormData();
                            form_data.append("img", img || null);form_data.append("nacimiento", nacimiento);
                            form_data.append("nombre", nombre);form_data.append("edad", edad);form_data.append("padre", padre || null);
                            form_data.append("padreTel", padreTel || null);form_data.append("madre", madre || null);
                            form_data.append("madreTel", madreTel|| null);form_data.append("contacto", contacto);
                            form_data.append("id", document.getElementById('ids').value);
                            $.ajax({
                                url:'../Db/editarAlumno.php',
                                data:form_data,
                                cache: false,
                                contentType: false,
                                processData: false,
                                type:'post',
                                success:function(data){
                                    if(data.code = 200){
                                        Swal.fire('Alumno editado de manera exitosa! ','','success').then((result)=>{
                                            if(result.value) window.location.href = "alumnos.php";
                                        })
                                    }
                                    else Swal.fire('El alumno no pudo ser editado, intenta de nuevo','','error');
                                }
                            });
                        }
                    }
                    else{
                        let form_data = new FormData();
                        form_data.append("img", document.getElementById('imagen').value);form_data.append("nacimiento", nacimiento);
                        form_data.append("nombre", nombre);form_data.append("edad", edad);form_data.append("padre", padre || null);
                        form_data.append("padreTel", padreTel || null);form_data.append("madre", madre || null);
                        form_data.append("madreTel", madreTel|| null);form_data.append("contacto", contacto);
                        form_data.append("id", document.getElementById('ids').value);
                        $.ajax({
                            url:'../Db/editarAlumno.php',
                            data:form_data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type:'post',
                            success:function(data){
                                if(data.code = 200){
                                    Swal.fire('Alumno editado de manera exitosa! ','','success').then((result)=>{
                                        if(result.value) window.location.href = "alumnos.php";
                                    })
                                }
                                else Swal.fire('El alumno no pudo ser editado, intenta de nuevo','','error');
                            }
                        });
                    }
                }
            }
            else Swal.fire('Por favor rellena todos los datos requeridos','','error');
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