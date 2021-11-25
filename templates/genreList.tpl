{include 'templates/header.tpl'}
{include 'templates/modalGenreNuevos.tpl'}
{include 'templates/modalEditarGenre.tpl'}

<div class="container">
    <h1 class="text-center">Music Genres</h1>
    
    <div class="row">
        <div class="col-sm-12">
            <h2 class="container">Dinamic Table</h2>

                <table class="table table-hover table-condensed table-striped table-dark">
                 {if $rol == 1}
                   <caption >
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalGenreNuevo">Agregar nuevo
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                   </caption>
                 {/if}
                 
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead> 
                <tbody>   
                    <tr>{foreach $genres as $genre }
                        <th scope="row">{$genre->genre_id}</th>
                        <td>{$genre->genre}<small><a href="albums/{$genre->genre_id}">   view Albums</a></small></td>
                        <td>{$genre->description}</td>
                        {if $rol == 1}
                        <td><button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicionGenre"></button></td>
                        <td><small><a href="eliminarGenre/{$genre->genre_id}" class="btn btn-danger glyphicon glyphicon-remove" role="button"></a></li></small></td>
                        {/if}
                    </tr>

                     {/foreach}
                </tbody>     
                </table>
        </div>
       
    </div>


</div>

{include 'templates/footer.tpl'}