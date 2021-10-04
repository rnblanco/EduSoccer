let alumno="";
let mes="";
let ano="";
let cobro="";
/*
//Quitar la posibilidad de dar click derecho
$(document).bind("contextmenu",function(e) {
    e.preventDefault();
});

//Quitar la posibilidad de dar CTRL+F12
$(document).keydown(function(e){
    if(e.which === 123){
       return false;
    }
});*/
function r() {
    location.href = "index.php";
}

//Validación para edades no mayores a 100
$('.monthValidation').on('keydown keyup change', function(e){
    if ($(this).val() > 12 || $(this).val() < 0
        && e.keyCode !== 46 // keycode para delete
        && e.keyCode !== 8  // keycode para enter
    ) {
        e.preventDefault();
        $(this).val(Math.trunc($(this).val()/10) <= 0 ? '' : Math.trunc($(this).val()/10));
    }
});
//Validación para años no mayores a 100 después del actual y no menores al actual
$('.yearValidation').on('keydown keyup change', function(e){
    const currentYear = new Date().getFullYear();
    if ($(this).val() > currentYear + 100  || $(this).val() < currentYear - 1 &&  $(this).val() > currentYear - 20 || $(this).val() < 0
        && e.keyCode !== 46 // keycode para delete
        && e.keyCode !== 8  // keycode para enter
    ) {
        e.preventDefault();
        $(this).val(Math.trunc($(this).val()/10) <= 0 ? '' : Math.trunc($(this).val()/10));
    }
});
//Validación para montos no mayores a 100 ni menores a 0
$('.moneyValidation').on('keydown keyup change', function(e){
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
// Validaciones para < > . & y números en el alumno
// / 48-57 numeros / 38 & / 46 . / 60 < / 61 = / 62 > /
function tprotection(str){

    let iKeyCode = (str.which) ? str.which : str.keyCode
    if ( iKeyCode> 47 && iKeyCode < 58 || iKeyCode==61 || iKeyCode == 62 || iKeyCode == 60 || iKeyCode == 46 || iKeyCode == 38|| iKeyCode == 34 )
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
    v1 = document.getElementById("alumno");
    const selector = document.querySelector('.select2-selection');
    v2 = document.getElementById("ano");
    v4 = document.getElementById("mes");
    v5 = document.getElementById("cobro");

    flag1 = true;
    flag2 = true;
    flag4 = true;
    flag5 = true;

    switch (val){
        
        case 1:
            if(v1.value == "") {
                selector.style.borderColor = "red";
                flag1 = false;
            }
            else {
                selector.style.borderColor = "green";
                alumno=v1.value;
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
                ano=v2.value;
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
                mes=v4.value;
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
                cobro=v5.value;
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
                alumno=v1.value;
            }
            if(v2.value == "") {
                v2.style.borderColor = "red";
                flag2 = false;
            }
            else {
                v2.style.borderColor = "green";
                flag2 = true;
                ano=v2.value;
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
                flag4 = true;
                mes=v4.value;
            }
            if(v5.value == "") {
                v5.style.borderColor = "red";
                flag5 = false;
            }
            else {
                v5.style.borderColor = "green";
                cobro=v5.value;
                flag5 = true;
            }
        break;
    }
    flag = flag1 && flag2 && flag4 && flag5;
    return flag;
}
    
$(document).ready(function(){
        
        $(".next").click(function(e){
            e.preventDefault();
            validate1(1);
            validate1(2);
            validate1(3);
            validate1(4);
            validate1(5);

            if(validate1(1) == true && validate1(2) == true && validate1(3) == true && validate1(4) == true && validate1(5) == true){

                let form_data = new FormData();
                form_data.append("ano", ano);form_data.append("alumno", alumno);
                form_data.append("mes", mes);form_data.append("cobro", cobro);
                $.ajax({
                    url:'../Db/agregarPago.php',
                    data:form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type:'post',
                    success:function(data){
                        if(data.code = 200){
                               Swal.fire('Pago agregado de manera exitosa! ','','success').then((result)=>{
                                if(result.value) window.location.href = "pagos.php";
                            })
                        }
                        else Swal.fire('El pago no pudo ser agregado, intenta de nuevo','','error');
                    }
                });
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

$(document).ready(function() {$('.search-select').select2();});