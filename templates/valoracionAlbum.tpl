{include 'templates/header.tpl'}



<div class="">

<input class="userID" value="{$user_id}" type="hidden">
<input class="id_album" value="{$album->album_id}" type="hidden">
<div class="container">
<h1>{$album->artist}</h1>
<p>{$album->name}</p>
<img src="{$album->cover}" width="220" height="220">
</div>

 {literal} 
    
    <form action="">
    <label for="">Comentario</label>
    <textarea id="wmd-input" name="post-text" class=" comment wmd-input s-input bar0 js-post-body-field" data-post-type-id="2" cols="50" rows="5" tabindex="101" data-min-length=""></textarea>
    <label for="">Puntuacion</label>
    <input class="rating" type="number" maxlength="5">
    <button id="btn-insertComment" type="click">Enviar</button>

    </form>
    
 {/literal} 
 <div id="apiComentarios">

 {include 'templates/vue/commentView.tpl'}
 </div>
 </div>


<script src="js/comments.js"></script>


{include 'templates/footer.tpl'}