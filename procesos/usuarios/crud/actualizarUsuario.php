<?php 
    $datos = array(
            'idUsuario'=> $_POST['idUsuario'],
            'tipoDocumento'=> $_POST['tipoDocumentou'],
            'numeroDocumento'=> $_POST['numeroDocumentou'],
            'nombres'=> $_POST['nombresu'],
            'apellidos'=> $_POST['apellidosu'],
            'telefono'=> $_POST['telefonou'],
            'correo'=> $_POST['correou'],
            'area'=> $_POST['areau'],
            'idRol'=> $_POST['idRolu'],
            'oficina'=> $_POST['oficinau']
    
    );
     include "../../../clases/Usuarios.php";
     $Usuarios = new Usuarios();
     echo $Usuarios->actualizarUsuario($datos);