

<?php
    include "header.php";
    if (isset($_SESSION ['usuario']) && $_SESSION['usuario']['rol'] == 2) {
        include "../clases/conexion.php"; 
        $con = new Conexion();
        $conexion = $con->conectar();
?>

   
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="fw-light">Asignacion de equipos</h1>
                <p class="lead">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAsignarEquipo">
                        Asignar Equipos</button>
                    <hr>
                    <div id="tablaAsignacionesLoad"></div>
                </p>
            </div>
        </div>
    </div>

    <?php  
            include "asignacion/modalAsignar.php";
            include "footer.php"; 
            ?>
            <script src="../public/js/asignacion/asignacion.js"></script>
            <?php
            } else {
                header("location:../index.html");
            }
    ?> 

            
