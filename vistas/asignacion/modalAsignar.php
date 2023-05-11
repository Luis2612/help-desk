
    <!-- Modal -->
<form id="frmAsignaEquipo" method="POST" onsubmit="return asignarEquipo()">
<div class="modal fade" id="modalAsignarEquipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Asignar equipo</h5>
            <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    <label>Nombre de persona</label>
                    <?php
                        $sql = "SELECT 
                                id_persona,
                                concat(paterno, ' ', materno, ' ', nombre) as nombre
                            FROM 
                                t_persona ORDER BY paterno";
                        $respuesta = mysqli_query($conexion,$sql);
                    ?>
                    <select name="idPersona" id="idPersona" class="form-control" required>
                    <?php while($mostrar = mysqli_fetch_array($respuesta)) { ?>
                            <option value="<?php echo $mostrar['id_persona'] ?>"> <?php echo $mostrar['nombre'];?> </option>
                    
                    <option value=""></option>
                    <?php } ?>
                    </select>
                </div>
                 <div class="col-sm-6">
                    <label>Tipo de equipo</label>
                    <select name="idEquipo" id="idEquipo" class="form-control" required>
                    <option value=""></option>
                    </select>
                 </div>   
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <label for="marca">Marca</label>
                    <input type="text" name="marca" id="marca" class="form-control">
                </div>
                <div class="col-sm-4">
                    <label for="modelo">Modelo</label>
                    <input type="text" name="modelo" id="modelo" class="form-control">
                </div>
                <div class="col-sm-4">
                    <label for="color">Color</label>
                    <input type="text" name="color" id="color" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label for="memoria">Memoria</label>
                    <input type="text" class="form-control" id="memoria" name="memoria">
                </div>
                <div class="col-sm-4">
                    <label for="discoDuro">Disco Duro</label>
                    <input type="text" class="form-control" id="discoDuro" name="discoDuro">
                </div>
                <div class="col-sm-4">
                    <label for="procesador">Procesador</label>
                    <input type="text" class="form-control" id="procesador" name="procesador">
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Asignar</button>
        </div>
        </div>
    </div>
    </div>
</form>

