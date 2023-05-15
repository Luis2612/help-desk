$(document).ready(function(){
    $('#tablaAsignacionesLoad').load('asignacion/tablaAsignacion.php');
});



function asignarEquipo(){
    $.ajax  ({
        type: "POST",
        data: $('#frmAsignaEquipo').serialize(),
        url: "../procesos/asignacion/asignar.php",
        success:function (respuesta) {
            respuesta = respuesta.trim();

            if(respuesta == 1){
                $('#frmAsignaEquipo') [0].reset();
                $('#tablaAsignacionesLoad').load('asignacion/tablaAsignacion.php');
                Swal.fire(":D", "Asignado con exito!" , "success");
            } else {
                Swal.fire(":(", "Fallo al asignar!" + respuesta, "error");
            }
        }
    });
    return false;
}

function eliminarAsigancion(idAsignacion){

Swal.fire({
    title: 'Estas seguro de eliminar este registro?',
    text: "Una vez eliminado no podra ser recuperado!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'SI, Seguro!'
}).then((result) => {
    if (result.isConfirmed) {
        $.ajax ({
            type: "POST",
            data:"idAsigancion=" + idAsignacion,
            url: "../procesos/asignacion/eliminarAsignacion.php",
            success: function (respuesta) {
                respuesta = respuesta.trim();
    
                if(respuesta == 1){
                    $('#tablaAsignacionesLoad').load('asignacion/tablaAsignacion.php');
                    Swal.fire(":D", "Eliminado con exito!" , "success");
                } else {
                    Swal.fire(":(", "Fallo al Eliminar!" + respuesta, "error");
                }
            }
        });
    }
    })
    return false;
}