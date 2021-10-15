let alumno="";
let fecha="";
let cobro="";

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

//Validación para fechas no menores al 2017 (año de creacion de la escuela) y fechas no mayores a un año en el futuro
$('.dateValidation').on('keydown keyup change', function(e){
    const value = $(this).val();
    const selectedYear = value.split('-')[0];
    const selectedMonth = value.split('-')[1];
    const selectedDay = value.split('-')[2];
    const currentYear=new Date().getFullYear();
    if(selectedYear > currentYear + 1 || (selectedDay > 0 || selectedMonth > 0) && selectedYear < 2017 ){
        e.preventDefault();
        $(this).val("");
        validate1(4);
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
    v4 = document.getElementById("fecha");
    v5 = document.getElementById("cobro");

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
                fecha=v4.value;
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
                form_data.append("alumno", document.getElementById('idAlumno').value); form_data.append("cobro", cobro);
                form_data.append("id", document.getElementById('ids').value); form_data.append("fecha", fecha);
                $.ajax({
                    url:'../Db/editarPago.php',
                    data:form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type:'post',
                    success:function(){
                       Swal.fire('Pago editado de manera exitosa! ','','success').then((result)=>{
                        if(result.value) window.location.href = "pagos.php";
                       })
                    },
                    error:function(){
                        Swal.fire('El pago no pudo ser editado, intenta de nuevo','','error');
                    }
                });
            }
            else Swal.fire('Por favor rellena todos los datos requeridos','','error');

        });
});