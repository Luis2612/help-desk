
<!-- Modal -->
<form id="frmAgregarUsuario" method="POST" onsubmit="return agregarNuevoUsuario()">
<div class="modal fade" id="modalAgregarUsuarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
            <div class="col-sm-4">
                        <label for="tipoDocumento">Tipo de Documento</label>
                        <select class="form-control" id="tipoDocumento" name="tipoDocumento">
                            <option value="">Seleccione una opcion</option>
                            <option value="C">C.C</option>
                            <option value="P">Pasaprote</option>
                            <option value="P">C.E</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="numeroDocumento">Numero de documento</label>
                        <input type="text" class="form-control" id="numeroDocumento" name="numeroDocumento" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="nombres">Nombre</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" required>
                    </div>
            </div>
            <div class="row">
                    <div class="col-sm-4">
                        <label for="apellidos">Apellido</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos">
                    </div>
                    <div class="col-sm-4">
                    <label for="telefono">Telefono: </label>
                    <input type="text" class="form-control" id="telefono" name="telefono">                  
                    </div>
                    <div class="col-sm-4">
                        <label for="correo">Correo</label>
                        <input type="mail" class="form-control" id="correo" name="correo">
                    </div>

            </div>
            <div class="row">
            <div class="col-sm-4">
                        <label for="password">Contraseña</label>
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                <label for="idRol">Rol de usuario</label>
                <select name="idRol" id="idRol" class="form-control">
                    <option value="1">Seleccione una Opcion</input>
                    <option value="1">Cliente</input>
                    <option value="2">Administrador</option>
                </select>
            </div>
            <div class="col-sm-12">Oficina</label>
                <select name="oficina" id="oficina" class="form-control">
                    <option value="1">Seleccione una Opcion</input>
                    <option value="1">Juridico</input>
                    <option value="2">Analisis</option>
                    <option value="2">Presidencia</option>
                    <option value="2">Desarrollo</option>
                    <option value="2">Cartera</option>
                </select>
            </div>
      </div>
      <div class="row">
      <div class="col-sm-12">
                <label for="idRol">Area</label>
                <select name="area" id="area" class="form-control">
                    <option value="1">Seleccione una Opcion</input>
                    <option value="2">sistemas</option>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <span class="btn btn-secondary" data-dismiss="modal">Cerrar</span>
        <button class="btn btn-primary">Agregar</button>
      </div>
    </div>
  </div>
    </div>
</form>




