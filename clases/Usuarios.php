<?php 

    
    
    include "conexion.php";
    class Usuarios extends Conexion{
        public function loginUsuario($usuario, $password){
           echo $conexion = Conexion::conectar();
            $sql = "SELECT * FROM t_usuarios
                    WHERE usuario = '$usuario' AND password = '$password'";
            $respuesta = mysqli_query($conexion,$sql);

            if(mysqli_num_rows($respuesta) > 0){
                $datosUsuarios = mysqli_fetch_array($respuesta);
                $_SESSION['usuario']['nombre'] = $datosUsuarios['usuario'];
                $_SESSION['usuario']['id'] = $datosUsuarios['id_usuario'];
                $_SESSION['usuario']['rol'] = $datosUsuarios['id_rol'];
                return 1;
            } else{
                return 0;
            }
        }
        public function agregaNuevoUsuario($datos) {
            $conexion = Conexion::conectar();
            $idPersona = self::agregarPersona($datos);

                if ($idPersona > 0) {
                    $sql = "INSERT INTO t_usuarios (id_rol, 
                                                    id_persona, 
                                                    usuario, 
                                                    password, 
                                                    ubicacion)
                            VALUES(?, ?, ?, ? ,?)";
                    $query = $conexion->prepare($sql);
                    $query->bind_param("iisss", $datos['idRol'],
                                                $idPersona,
                                                $datos['usuario'],
                                                $datos['password'],
                                                $datos['ubicacion']);

                    $respuesta = $query->execute();
                    return $respuesta;                           
                } else {
                    return 0;
                }
           

        }

        public function agregarPersona($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO t_persona (tipo_documento,
                                           numero_documento,
                                           nombres,
                                           apellidos,                                          
                                           telefono,
                                           correo,
                                           area,
                                           oficina)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("ssssssss",$datos['tipoDocumento'],
                                          $datos['numeroDocumento'],
                                          $datos['nombres'],
                                          $datos['apellidos'],
                                          $datos['telefono'],
                                          $datos['correo'], 
                                          $datos['area'],
                                          $datos['oficina']);

            $respuesta = $query->execute();
            $idPersona = mysqli_insert_id($conexion);
            $query->close();
            return $idPersona;
        }

        public function obtenerDatosUsuario($idUSuario){
            $conexion = Conexion::conectar();
            $sql = "SELECT
                        usuarios.id_usuario AS idUsuario,
                        usuarios.id_persona AS idPersona,
                        usuarios.id_rol AS idRol,
                        roles.nombre AS rol,
                        usuarios.activo AS estatus,
                        persona.tipo_documento AS tipoDocumento,
                        persona.numero_documento AS numeroDocumento,
                        persona.nombres AS nombres,
                        persona.apellidos AS apellidosPersona,
                        persona.correo AS correo,
                        persona.telefono AS telefono,
                        persona.area AS area,
                        persona.oficina AS oficina
                    FROM
                        t_usuarios AS usuarios
                    INNER JOIN t_cat_roles AS roles
                    ON
                        usuarios.id_rol = roles.id_rol
                    INNER JOIN t_persona AS persona
                    ON
                        usuarios.id_persona = persona.id_persona AND usuarios.id_usuario = '$idUSuario'";
            $respuesta = mysqli_query($conexion,$sql);
            $usuario = mysqli_fetch_array($respuesta);
        
            $datos = array (
                    'idUsuario' => $usuario['idUsuario'],
                    'nombrePersona' => $usuario['nombres'], 
                    'rol' => $usuario['rol'],
                    'idRol' => $usuario['idRol'],
                    'oficina' => $usuario['oficina'],
                    'estatus' => $usuario['estatus'],
                    'idPersona' => $usuario['idPersona'],
                    'tipoDocumento' => $usuario['tipoDocumento'],
                    'numeroDocumento' => $usuario['numeroDocumento'],
                    'nombres' => $usuario['nombres'],
                    'apellidosPersona' => $usuario['apellidosPersona'],
                    'correo' => $usuario['correo'],
                    'area' => $usuario['area'],
                    'telefono' => $usuario['telefono']
            );
            return $datos;
        }
        

        public function actualizarUsuario($datos){
            $conexion = Conexion::conectar();
            $exitoPersona = self::actualizarPersona($datos);
            
            if ($exitoPersona) {    
                $sql = "UPDATE t_usuarios SET id_rol = ?,
                                              usuario = ?,
                                              ubicacion = ? 
                        Where id_usuario = ?";   
                $query = $conexion->prepare($sql);
                $query->bind_param('issi', $datos['idRol'],
                                            $datos['usuario'],
                                            $datos['ubicacion'],
                                            $datos['idUsuario']); 
                $respuesta = $query->execute();
                $query->close();
                return $respuesta;
            } else {
                return 0;
            }
        }
        public function actualizarPersona($datos){
            $conexion = Conexion::conectar();

            $idPersona = self::obtenerIdPersona($datos['idUsuario']);

            $sql = "UPDATE t_persona SET tipo_documento = ?,
                                         numero_documento = ?,
                                         nombres = ?,
                                         apellidos = ?,
                                         telefono = ?,
                                         correo = ?
                                         area = ?
                                         oficina = ?
                    WHERE id_persona = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssssssssi', $datos['tipoDocumento'],
                                           $datos['numeroDocumento'],
                                           $datos['nombres'],
                                           $datos['apellidos'],
                                           $datos['telefono'],
                                           $datos['correo'],
                                           $datos['area'],
                                           $datos['oficina'],
                                           $idPersona);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;

        }

        public function obtenerIdPersona($idUsuario) {
            $conexion = Conexion::conectar();
            $sql = "SELECT 
            persona.id_persona as idPersona 
        FROM 
            `t_usuarios` as usuarios 
                INNER JOIN 
             t_persona as persona on usuarios.id_persona = persona.id_persona 
                 and usuarios.id_usuario = '$idUsuario'";
            $respuesta = mysqli_query($conexion,$sql);
            $idPersona = mysqli_fetch_array($respuesta)['idPersona'];
            return $idPersona;

        }
    }
             
