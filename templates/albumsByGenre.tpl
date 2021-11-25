{include 'templates/header.tpl'}

<div class="container">
    <h1 class="text-center">List of best-selling albums</h1>
        <div class="row">
        <div class="col-sm-12">
            <h2 class="container">Dinamic Table</h2>
                <table class="table table-hover table-condensed table-striped table-dark">
                <thead>
 
                <tbody>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Artist</th>
                        <th scope="col">Album</th>
                        <th scope="col">Cover</th>
                    </tr>
                </thead>
                <tbody>
    
                    <tr>{foreach $genre as $gen}
                        <th scope="row">{$gen->album_id }</th>
                        <td>{$gen->artist}</td>  
                        <td>{$gen->name}</td> 
                        <td><img src="{$gen->cover}" width="220" height="220"></td>


                        
                    </tr>

                     {/foreach}
                </tbody>
                    
                </table>
        </div>
    </div>


</div>



{include 'templates/footer.tpl'}