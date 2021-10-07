function del(id){
    var form_data = new FormData();
    form_data.append("id", id);
    
        Swal.fire({
            type: 'info',
            title: '¿Estás seguro de eliminar la imagen?',
            showCancelButton: true,
            showConfirmButton:true,
            cancelButtonText:'No',
            confirmButtonText:'Si',
        })
        $('.swal2-confirm').click(function(e){
            e.preventDefault();
            $.ajax({
                url:'../Db/eliminarImagen.php',
                data:form_data,
                cache: false,
                contentType: false,
                processData: false,
                type:'post',
                success:function(){
                    Swal.fire('Imagen eliminada correctamente! ','','success').then((result)=>{
                        if(result.value){
                            window.location.href = "carrusel.php";
                        }
                    });           
                }, error:function(){
                    Swal.fire('¡La imagen no pudo ser eliminada!','','error');
                }   
            });
        });
        $('.swal2-cancel').click(function(e){
            e.preventDefault();
            Swal.close();
        });
}

function deshab(idPublicacion){
    var form_data = new FormData();
    form_data.append("id", idPublicacion);
    
    Swal.fire({
        type: 'info',
        title: '¿Estás seguro de deshabilitar la imagen?',
        showCancelButton: true,
        showConfirmButton:true,
        cancelButtonText:'No',
        confirmButtonText:'Si',
    })
    $('.swal2-confirm').click(function(e){
        e.preventDefault();
        $.ajax({
            url:'../Db/deshabilitarImagen.php',
            data:form_data,
            cache: false,
            contentType: false,
            processData: false,
            type:'post',
            success:function(){
                Swal.fire('Imagen deshabilitada correctamente! ','','success').then((result)=>{
                    if(result.value){
                        window.location.href = "carrusel.php";
                    }
                });           
            }, error:function(){
                Swal.fire('¡La imagen no pudo ser deshabilitada!','','error');
            }   
        });
    });
    $('.swal2-cancel').click(function(e){
        e.preventDefault();
        Swal.close();
    });
}

function hab(idPublicacion){
    var form_data = new FormData();
    form_data.append("id", idPublicacion);
    
    Swal.fire({
        type: 'info',
        title: '¿Estás seguro de habilitar la imagen?',
        showCancelButton: true,
        showConfirmButton:true,
        cancelButtonText:'No',
        confirmButtonText:'Si',
    })
    $('.swal2-confirm').click(function(e){
        e.preventDefault();
        $.ajax({
            url:'../Db/habilitarImagen.php',
            data:form_data,
            cache: false,
            contentType: false,
            processData: false,
            type:'post',
            success:function(){
                Swal.fire('Imagen habilitada correctamente! ','','success').then((result)=>{
                    if(result.value){
                        window.location.href = "carrusel.php";
                    }
                });           
            }, error:function(){
                Swal.fire('¡La imagen no pudo ser habilitada!','','error');
            }   
        });
    });
    $('.swal2-cancel').click(function(e){
        e.preventDefault();
        Swal.close();
    });

}
