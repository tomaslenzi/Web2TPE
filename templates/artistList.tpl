{include 'templates/header.tpl'}


<div class="container">
    <h1 class="text-center">List of best-selling albums</h1>
    
        <div class="row">
        <div class="col-sm-12">
            <h2 class="container">Dinamic Table</h2><a class="btn btn-info" aria-current="page" href="ver">More info</a>
                <table class="table table-hover table-condensed table-striped text-center table-dark">
                <thead class="table-dark">
 
                <tbody>
                    <tr>
                        <th class="text-center" scope="col">Id</th>
                        <th class="text-center" scope="col">Artist</th>
                        <th class="text-center" scope="col">Album</th>
                        <th class="text-center" scope="col">Cover</th>
                         <th class="text-center" scope="col">Valoraciones y Comentarios</th>
                    </tr>
                </thead>
                <tbody>
    
                    <tr>{foreach $albums as $album }
                        <th class="text-center" scope="row">{$album->album_id }</th> 
                         <td>{$album->artist}</td> 
                        <td>{$album->name}</td> 
                        <td><img src="{$album->cover}" width="220" height="220"></td>
                         <td><a href="valoraciones-csr/{$album->album_id }">Ver Valoraciones</td>
                        
                        
                    </tr>

                     {/foreach}
                </tbody>
                    
                </table>
        </div>
    </div>


</div>



{include 'templates/footer.tpl'}