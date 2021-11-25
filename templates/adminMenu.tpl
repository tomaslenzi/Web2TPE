{include 'templates/header.tpl'}
<body>
   <table class="table table-hover table-condensed table-striped table-dark">

                <thead>
                
                    <tr>
                        <th scope="col>User Id</th>
                        <th scope="col>User Id</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password Hash</th>
                        <th scope="col">Admin State</th>
                        <th scope="col">Eliminar usuario:</th>
                        <th scope="col">Dar Admin:</th>
                        <th scope="col">Quitar Admin:</th>
                    </tr>
                </thead>
                <tbody>
    
                    <tr>{foreach $users as $user }
                        <th scope="row">{$user->user_id }</th>
                        <td>{$user->email }</td>
                        <td>{$user->password}</td>
                        <td>{$user->admin}</td>
        
                    
                        <td><small><a href="eliminarUsuario/{$user->user_id}" class="btn btn-danger glyphicon glyphicon-remove" role="button"></a></li></small></td>
                        <td><small><a href="darAdmin/{$user->user_id}" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-cog"></span></td>
                         <td><small><a href="quitarAdmin/{$user->user_id}" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-trash"></span> </td>
                    </tr>

                     {/foreach}
                </tbody>
                   
                </table>




{include 'templates/footer.tpl'}