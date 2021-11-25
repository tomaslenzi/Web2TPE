<!-- Modal para editar album-->
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar</h4>
      </div>
      <div class="modal-body">
         <form action="editar" method="POST"> 
            <div>
                <label>Id</label>
                  <select id="album_id" name="album_id">        
                {foreach $albums as $album }
                        <option selected="true" value="{$album->album_id}" >{$album->album_id}</option>
                {/foreach}
                  </select>
            </div>
            
            <label>Artist</label>
            <input type="text" name="artist" id="artist" class="form-control input-sm">
            <label>Name</label>
            <input type="text" name="name"  id="name" class="form-control input-sm">
            <label>Sales</label>
            <input type="text" name="sales" id="sales" class="form-control input-sm">
            <label>Year</label>
            <input type="text" name="year" id="year" class="form-control input-sm">
            <label>Cover</label>
            <input type="text" name="cover" id="cover" class="form-control input-sm">

                              <label>Genre</label>
            <br>
            <select name="genre_id" class="custom-select">
               {foreach from=$genre item=$genero} 
                        <option value={$genero->genre_id}>{$genero->genre}</option>
                       
                {/foreach}
              </select>
                  
        ...
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
        
        </form>
      </div>
    </div>
  </div>
</div>