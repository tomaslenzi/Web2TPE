<input type="hidden" class="id_album" value="{$album->album_id}"  id="idApi" >
<input type="hidden" class ="admin" value="{$admin}" >
<input type="hidden" class="id_admin" value="{$rol}" >

{if $rol == 1} 

  <div class="container">
    <div class="idcomment" :value="comment.id" :id="comment.id"  v-for="comment in comments">
      <span>
  {literal}
      User: {{comment.email}}
      </span>
      <p>
      Comment: {{ comment.content }}
      </p>
      <span>
      Rating :{{comment.rating}}
       
      </span>    
       <a class="idcomment btn btn-outline-danger btn-sm" :value="comment.comment_id" v-on:click="commentDelete(comment.comment_id)">
       <i  class="fas fa-trash-alt"></i>
       </a>
      </div>
</div>
    {/literal}
{else}

{literal}
  <div class="container">
    <div class="idcomment" :value="comment.id" :id="comment.id"  v-for="comment in comments">
      <span>
         User: {{comment.comment_id}}
      </span>
      <p>
      Comment: {{ comment.content }}
      </p>
      <span>
      Rating :{{comment.rating}}

      </span>
      
      </div>

    {/literal}
  {/if}
  </div>
   