<!-- Modal -->
<form id="frmAgregarUsuario" method="POST" onsubmit="return agregarNuevoUsuario()">
  <div class="modal fade" id="modalAgregarUsuarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
              <label for="tipoDocumento">Tipo de documento</label>
              <select class="form-control" id="tipoDocumento" name="tipoDocumento" required>
                <option value=""></option>
                <option value="dni">DNI</option>
                <option value="pasaporte">Pasaporte</option>
              </select>
            </div>
            <div class="col-sm-4">
              <label for="numeroDocumento">Número de documento</label>
              <input type="text" class="form-control" id="numeroDocumento" name="numeroDocumento" required>
            </div>
            <div class="col-sm-4">
              <label for="nombres">Nombres</label>
              <input type="text" class="form-control" id="nombres" name="nombres" required>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <label for="apellidos">Apellidos</label>
              <input type="text" class="form-control" id="apellidos" name="apellidos" required>
            </div>
            <div class="col-sm-4">
              <label for="telefono">Teléfono</label>
              <input type="text" class="form-control" id="telefono" name="telefono">
            </div>
            <div class="col-sm-4">
              <label for="correo">Correo</label>
              <input type="email" class="form-control" id="correo" name="correo">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <label for="contrasena">Contraseña</label>
              <input type="password" class="form-control" id="contrasena" name="contrasena">
            </div>
            <div class="col-sm-4">
              <label for="rol">Rol</label>
              <select class="form-control" id="rol" name="rol">
                <option value="cliente">Cliente</option>
                <option value="administrador">Administrador</option>
              </select>
            </div>
            <div class="col-sm-4">
              <label for="area">Área</label>
              <select class="form-control" id="area" name="area">
                <option value=""></option>
                <option value="area1">Área 1</option>
                <option value="area2">Área 2</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <label for="oficina">Oficina</label>
              <select class="form-control" id="oficina" name="oficina">
                <option value=""></option>
                <option value="oficina1">Oficina 1</option>
                <option value="oficina2">Oficina 2</option>
              </select>
            </div>
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
