<div class="">
<input class="userID" value="{$user}" type="hidden">
<input class="id_album" value="{$album->album_id}" type="hidden">
</div>
 {literal} 
    <div>
    <form action="">
    <label for="">Comentario</label>
    <textarea id="wmd-input" name="post-text" class=" comment wmd-input s-input bar0 js-post-body-field" data-post-type-id="2" cols="92" rows="15" tabindex="101" data-min-length=""></textarea>
    <label for="">Puntuacion</label>
    <input class="rating" type="number" maxlength="5">
    <button id="btn-insertComment" type="click">Enviar</button>

    </form>
    </div>
    
 {/literal} 
