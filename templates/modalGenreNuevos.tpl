<!-- Modal para generps nuevos-->
<div class="modal fade" id="modalGenreNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add new genero</h4>
      </div>
      <div class="modal-body">
     <form action="nuevoGenre" method="POST">
      
     
            <label>Genre</label>
            <input type="text" name="genre"  class="form-control input-sm">
            <label>Description</label>
            <input type="textarea" name="description"   class="form-control input-sm">

        ...
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      	
      </form>
    </div>
  </div>
</div>