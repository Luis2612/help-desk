$(document).ready(function(){
    $('#tablaUsuarioLoad').load("usuarios/tablaUsuarios.php");
});

//Función para agregar un nuevo usuario desde la tabla
function agregarNuevoUsuario(){
    $.ajax({
        type: "POST",
        data: $('#frmAgregarUsuario').serialize(),
        url: "../procesos/usuarios/crud/agregarNuevoUsuario.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if (respuesta == 0) {
                $('#tablaUsuarioLoad').load("usuarios/tablaUsuarios.php");
                $('#frmAgregarUsuario')[0].reset();
                Swal.fire(":D" , "Aregado con exito!" , "success");    
            } else {
                    Swal.fire(":c","Error al cargar" + respuesta, "error");
            }

        }
    });
    return false;
}
function obtenerDatosUsuario(idUsuario){
    $.ajax({
            type: "POST",
            data : "idUsuario=" + idUsuario,
            url :"../procesos/usuarios/crud/obtenerDatosUsuario.php",
            success : function(respuesta){
                respuesta = jQuery.parseJSON(respuesta);
                $('#idUsuario').val(respuesta['idUsuario']);
                $('#tipoDocumento').val(respuesta['tipoDocumento']);
                $('#numeroDocumentou').val(respuesta['numeroDocumento']);
                $('#nombresu').val(respuesta['nombres']);
                $('#apellidosu').val(respuesta['apellidos']);
                $('#telefonou').val(respuesta['telefono']);
                $('#correou').val(respuesta['correo']);
                $('#areau').val(respuesta['area']);
                $('#idRolu').val(respuesta['idRol']);
                $('#oficinau').val(respuesta['oficina']);
                
 
            }
        });
}

function actualizarUsuario(){
    $.ajax ({
            type : "POST",
            data:$('#frmActualizarUsuario').serialize(),
            url :"../procesos/usuarios/crud/actualizarUsuario.php",
            success: function(respuesta){
                respuesta = respuesta.trim();
                $("#modalActualizarUsuarios").html(respuesta);
              if (respuesta == 1) {
                $('#modalActualizarUsuarios').modal('hide');
                $('#tablaUsuarioLoad').load("usuarios/tablaUsuarios.php");
                Swal.fire(":D" , "Actualizado con exito!" , "success");    
            } else {
                    Swal.fire(":c","Error al actualizar" + respuesta, "error");
            }

            }
    });

    return false;
}


