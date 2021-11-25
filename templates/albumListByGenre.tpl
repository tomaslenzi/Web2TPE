{include 'templates/header.tpl'}


<div class="container">
    <h1 class="text-center">List of best-selling albums</h1>
        <div class="row">
        <div class="col-sm-12">
            <h2 class="container">Dinamic Table</h2><a class="btn btn-info" aria-current="page" href="ver">More info</a>
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
    
                     <tr>{foreach $albums as $album }
                        <th scope="row">{$album->album_id }</th> 
                         <td>{$album->artist}</td> 
                        <td>{$album->name}</td> 
                        <td><img src="{$album->cover}" width="220" height="220"></td>
                        
                        
                    </tr>

                     {/foreach}
                </tbody>
                    
                </table>
        </div>
    </div>


</div>



{include 'templates/footer.tpl'}