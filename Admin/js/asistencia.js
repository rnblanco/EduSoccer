
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

function Reload(){
    window.location.href="asistencia.php?id=" + document.getElementById('ids').value + "&fecha=" + document.getElementById('fecha').value;
}

function ReloadDb(){
    let asistencia = document.getElementById('asistencia').value;
    let asistenciaReal = asistencia.split(",",1)[0];
    let id = asistencia.split(",",2)[1];
    let form_data = new FormData();
    form_data.append("alumno", id);
    form_data.append("fecha", document.getElementById('fecha').value);
    form_data.append("asistencia", asistenciaReal);
    $.ajax({
        url:'../Db/agregarAsistencia.php',
        data:form_data,
        cache: false,
        contentType: false,
        processData: false,
        type:'post',
        success:function(data){
            if(data.code = 200){
                Swal.fire('Asistencia registrada de manera exitosa! ','','success').then(()=>{
                    let deletable = document.getElementById('deletable');
                    if(deletable){ deletable.remove() }
                })
            }
            else Swal.fire('La asistencia no pudo ser registrada, intenta de nuevo','','error');
        }
    });
}