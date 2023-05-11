<?php 
    class Conexion {
        public function conectar() {
            $servidor = "127.0.0.1";
            $usuario = "root";
            $password = "";
            $db = "helpdesk";
            $conexion = mysqli_connect($servidor,$usuario,$password, $db);
            return $conexion;
        }   
    }
