<!-- Modal para nuevos-->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add new album</h4>
      </div>
      <div class="modal-body">
     <form action="nueva" method="POST">
      
     
            <label>Artist</label>
            <input type="text" name="artist"  class="form-control input-sm">
            <label>Name</label>
            <input type="text" name="name"   class="form-control input-sm">
            <label>Sales</label>
            <input type="text" name="sales"  class="form-control input-sm">
            <label>Year</label>
            <input type="text" name="year" class="form-control input-sm">
            <label>Cover</label>
            <input type="text" name="cover"  class="form-control input-sm">
            <label>Genre</label>
                        <select name="genre_id" class="custom-select">
               {foreach from=$genre item=$genero} 
                        <option value={$genero->genre_id}>{$genero->genre}</option>
                       
                {/foreach}
              </select>
        ...
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      	
      </form>
    </div>
  </div>
</div>