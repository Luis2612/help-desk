<form method="POST" id="frmNuevoReporte" onsubmit="return agregarNuevoReporte()">
<!-- Modal -->
<div class="modal fade" id="modalCrearReporte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Reporte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <label for="idEquipo">Mis Dispositivos</label>
            <select name="idEquipo" id="idEquipo" class="form-control" required>
                <option value="">Selecciona un Dispositivo</option>
            </select>
            <label for="problema">Describe tu problema</label>
            <textarea name="problema" id="problema" class="form-control" required></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button  class="btn btn-primary">Crear</button>
      </div>
    </div>
  </div>
</div>
</form>