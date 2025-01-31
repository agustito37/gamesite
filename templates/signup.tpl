<h5 class="card-title text-center text-primary">Registro</h5>

<form class="form-signin" action="actions/doRegister.php" method="post">
  <div class="form-label-group mb-3">
    <input type="email" name="email" class="form-control" placeholder="Email" autofocus required>
  </div>
    
  <div class="form-label-group mb-3">
    <input type="text" name="alias" class="form-control" placeholder="Alias" required>
  </div>
    
  <div class="form-label-group mb-3">
    <input id="password" type="password" name="password" class="form-control" placeholder="Contraseña" minlength="8" required>
  </div>
    
  <div class="form-label-group mb-3">
    <input type="password" name="passwordConfirm" class="form-control" placeholder="Confirmación contraseña" required>
  </div>
    
  <div id="feedback" class="w-100 mb-3 border rounded">
    <div id="feedback-percentage" class="h-100 pl-2"></div>
  </div>

  {if $error}
      <div class="alert alert-danger" role="alert">{$error}</div>
  {/if}

  <button class="btn btn-lg btn-primary btn-block" type="submit">Crear</button>
</form>
              