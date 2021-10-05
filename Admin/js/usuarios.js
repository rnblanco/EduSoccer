function del(id){
    let form_data = new FormData();
    form_data.append("id", id);

    Swal.fire({
        type: 'info',
        title: '¿Estás seguro de eliminar al profesor?',
        showCancelButton: true,
        showConfirmButton:true,
        cancelButtonText:'No',
        confirmButtonText:'Si',
    })
    $('.swal2-confirm').click(function(e){
        e.preventDefault();
        $.ajax({
            url:'../Db/eliminarUsuario.php',
            data:form_data,
            cache: false,
            contentType: false,
            processData: false,
            type:'post',
            success:function(){
                Swal.fire('Profesor eliminado correctamente! ','','success').then((result)=>{
                    if(result.value){
                        window.location.href = "usuarios.php";
                    }
                });
            }, error:function(){
                Swal.fire('¡El profesor no pudo ser eliminado!','','error');
            }
        });
    });
    $('.swal2-cancel').click(function(e){
        e.preventDefault();
        Swal.close();
    });
    
}

function deshab(id){
    let form_data = new FormData();
    form_data.append("id", id);
    
    Swal.fire({
        type: 'info',
        title: '¿Estás seguro de deshabilitar al profesor?',
        showCancelButton: true,
        showConfirmButton:true,
        cancelButtonText:'No',
        confirmButtonText:'Si',
    })
    $('.swal2-confirm').click(function(e){
        e.preventDefault();
        $.ajax({
            url:'../Db/deshabilitarUsuario.php',
            data:form_data,
            cache: false,
            contentType: false,
            processData: false,
            type:'post',
            success:function(){
                Swal.fire('Profesor deshabilitado correctamente! ','','success').then((result)=>{
                    if(result.value){
                        window.location.href = "usuarios.php";
                    }
                });           
            }, error:function(){
                Swal.fire('¡El profesor no pudo ser deshabilitado!','','error');
            }   
        });
    });
    $('.swal2-cancel').click(function(e){
        e.preventDefault();
        Swal.close();
    });
}

function hab(id){
    let form_data = new FormData();
    form_data.append("id", id);
    
    Swal.fire({
        type: 'info',
        title: '¿Estás seguro de habilitar al profesor?',
        showCancelButton: true,
        showConfirmButton:true,
        cancelButtonText:'No',
        confirmButtonText:'Si',
    })
    $('.swal2-confirm').click(function(e){
        e.preventDefault();
        $.ajax({
            url:'../Db/habilitarUsuario.php',
            data:form_data,
            cache: false,
            contentType: false,
            processData: false,
            type:'post',
            success:function(){
                Swal.fire('Profesor habilitado correctamente! ','','success').then((result)=>{
                    if(result.value){
                        window.location.href = "usuarios.php";
                    }
                });           
            }, error:function(){
                Swal.fire('¡El profesor no pudo ser habilitado!','','error');
            }   
        });
    });
    $('.swal2-cancel').click(function(e){
        e.preventDefault();
        Swal.close();
    });

}