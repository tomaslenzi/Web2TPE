{include 'templates/header.tpl'}
  <div class="container">
       
     <form action="register" method="POST"  class="col-md-4 offset-md-4 mt-4">
            <h1>{$titulo}</h1>
            <label>Usuario: (@eMail)</label>
            <input type="text" placeholder="eMail" name="email_registrar"  class="form-control input-sm" required>
            <label>Contrasenia:</label>
            <input type="password" placeholder="contrasenia" name="password_registrar"   class="form-control input-sm" required>
             <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Registrarme</button>
          </form>
        <div>
        </div>
        {if $mensaje}
            {$mensaje}
        {/if}
       
        </div>
      </div>
      {include 'templates/footer.tpl'}
 