
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

function ReloadDb(id, fecha){
    console.log(fecha)
    let form_data = new FormData();
    form_data.append("alumno", id);
    form_data.append("fecha", fecha);
    let asistencia = document.getElementById('selector'+id);
    form_data.append("asistencia", asistencia.value);
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