<?php
    include "../../clases/conexion.php";
    $con = new conexion();
    $conexion = $con->conectar();
    $sql = "SELECT 
	usuarios.id_usuario AS idUsuario,
	usuarios.usuario AS nombreUsuario,
	roles.nombre AS rol,
    usuarios.id_rol AS idRol,
	persona.apellidos AS apellidos,
    usuarios.activo AS estatus,
    usuarios.id_persona AS idPersona,
    persona.nombres AS nombres,
    persona.tipo_documento AS tipoDocumento,
    persona.numero_documento AS numeroDocumento,
    persona.oficina AS oficina,
    persona.area AS area,
    persona.correo AS correo,
    persona.telefono as telefono
 FROM
 	t_usuarios AS usuarios 
    	INNER JOIN 
    t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol 
    	INNER JOIN 
    t_persona AS persona ON usuarios.id_persona = persona.id_persona";
$respuesta = mysqli_query($conexion, $sql);
?>

<table class="table table-sm dt-responsive nowrap" id="tablaUsuariosDataTable" style="width:100%">
    <thead>
        <tr>
            <th>Tipo de Documento</th>
            <th>Numero de Documento</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Area</th>
            <th>Oficina</th>
            <th>Reset Password</th>
            <th>Activar</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>
        <tr>
            <td><?php echo $mostrar['tipoDocumento']; ?></td>
            <td><?php echo $mostrar['numeroDocumento']; ?></td>
            <td><?php echo $mostrar['nombres']; ?></td>
            <td><?php echo $mostrar['apellidos']; ?></td>
            <td><?php echo $mostrar['telefono']; ?></td>
            <td><?php echo $mostrar['correo']; ?></td>
            <td><?php echo $mostrar['area']; ?></td>
            <td><?php echo $mostrar['oficina']; ?></td>
            <td>
                <button class="btn btn-success btn-sm">
                    cambiar password
                </button>
            </td>
            <td>
                <?php if ($mostrar['estatus'] == 1) { ?>
                    <button class="btn btn-info btn-sm">
                        Activo
                    </button>
                <?php } else { ?>
                    <button class="btn btn-info btn-sm">
                        Inactivo
                    </button>
                <?php } ?>
            </td>
            <td>
                <button class="btn btn-warning btn-sm" 
                        data-toggle="modal" 
                        data-target="#modalActualizarUsuarios"
                        onclick="obtenerDatosUsuario(<?php echo $mostrar ['idUsuario']?>)">
                    Editar
                </button>
            </td>
            <td>
                <button class="btn btn-danger btn-sm">
                    Eliminar
                </button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php   
            include 'modalActualizar.php';
            
            ?>
<script>
    $(document).ready(function(){
        $('#tablaUsuariosDataTable').DataTable();
    });
</script>
