<?php 

   $datos = array (

         "tipoDocumento"=>$_POST['tipoDocumento'],  
         "numeroDocumento"=>$_POST['numeroDocumento'],  
         "nombres"=>$_POST['nombres'],
         "apellidos"=>$_POST['apellidos'],  
         "telefono"=>$_POST['telefono'],  
         "correo"=>$_POST['correo'],  
         "password"=>$_POST['password'],  
         "idRol"=>$_POST['idRol'],
         "oficina"=>$_POST['oficina'],
         "area"=>$_POST['area']
    );

    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();

    echo $Usuarios->agregaNuevoUsuario($datos);

