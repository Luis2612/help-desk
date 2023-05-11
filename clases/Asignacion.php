<?php
    include "conexion.php";

    class Asignacion extends Conexion{
        public function agregarAsignacion($datos){
            $conexion = Conexion::conectar();

            $sql = "INSERT INTO t_asignacion (id_persona,
                                 id_equipo,
                                 marca,
                                 modelo,
                                 color,
                                 descripcion,
                                 memoria,
                                 disco_duro,
                                 procesador)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('iisssssss' , $datos['idPersona'],
                                             $datos['idPEquipo'],
                                             $datos['marca'],
                                             $datos['modelo'],
                                             $datos['color'],
                                             $datos['descripcion'],
                                             $datos['memoria'],
                                             $datos['discoDuro'],
                                             $datos['procesador']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }