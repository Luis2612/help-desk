<?php 

$idAsignacion = $_POST['idAsigancion'];

include "../../clases/Asignacion.php";
$Asignacion = new Asignacion();

echo $Asignacion->eliminarAsigancion($idAsignacion);