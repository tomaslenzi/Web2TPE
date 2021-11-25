{include 'templates/header.tpl'}
{include 'templates/modalNuevos.tpl'}
{include 'templates/modalEditarAlbum.tpl'}



<div class="container">
    <h1 class="text-center">The best-selling albums of all time</h1>
        <div class="row">
        <div class="col-sm-12">
            <h2 class="container">Dinamic Table</h2><a class="btn btn-info" aria-current="page" href="ver">More info</a>
                
             
                
             <form action="viewByGenre"  method="POST"> 
              <select name="filterGenero" class="custom-select">
                
               {foreach $albums as $album } 
                        <option value={$album->genre_id}>{$album->genre}</option>
                       
                {/foreach}
              </select>
              <button class="btn btn-success" type="submit" >Ver</button>
                </form>

                <table class="table table-hover table-condensed table-striped table-dark">
                   {if $rol == 1}
                   <caption>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">Agregar nuevo
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                   </caption>
                   {/if}
                <thead>
                
                    <tr>
                        <th scope="col>Id</th>
                        <th scope="col>Id</th>
                        <th scope="col">Artist</th>
                        <th scope="col">Name</th>
                        <th scope="col">Sales</th>
                        <th scope="col">Year</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Cover</th>
                    </tr>
                </thead>
                <tbody>
    
                    <tr>{foreach $albums as $album }
                        <th scope="row">{$album->album_id }</th>
                        <td>{$album->artist }</td>
                        <td>{$album->name}</td>
                        <td>{$album->sales} millones</td>
                        <td>{$album->year}</td>
                        <td>{$album->genre} <small><a href="album/{$album->genre}">ver detalle</a></small></li></td>
                        <td><img src="{$album->cover}" width="220" height="220"></td>
                        {if $rol == 1} 
                        <td><button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion"></button></td>
                        <td><small><a href="eliminar/{$album->album_id}" class="btn btn-danger glyphicon glyphicon-remove" role="button"></a></li></small></td>
                        {/if}
                    </tr>

                     {/foreach}
                </tbody>
                   
                </table>
        </div>
    </div>


</div>


{include 'templates/footer.tpl'}

