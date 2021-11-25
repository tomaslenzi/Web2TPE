<!-- Modal para editar album-->
<div class="modal fade" id="modalEdicionGenre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar</h4>
      </div>
      <div class="modal-body">
         <form action="editarGenre" method="POST"> 
            <div>
            <label>Id</label>
                  <select id="genre_id" name="genre_id">        
                {foreach $genres as $genre }
                        <option selected="true" value="{$genre->genre_id}" >{$genre->genre_id}</option>
                {/foreach}
                  </select>
           </div>
            
            <label>Genre</label>
            <input type="text" name="genre" id="genre" class="form-control input-sm">
            
           <div class="mb-3">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea class="form-control" name="description" id="message-text"></textarea>
           </div>
            
        ...
      </div>
      <div class="modal-footer">
       
        <button type="submit" class="btn btn-primary">Actualizar</button>
        
        </form>
      </div>
    </div>
  </div>
</div>