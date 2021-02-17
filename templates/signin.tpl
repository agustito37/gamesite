<h5 class="card-title text-center text-primary">Sign In</h5>

<form class="form-signin" action="actions/doLogin.php" method="post">
  <div class="form-label-group mb-3">
    <input type="email" name="email" id="inputUser" class="form-control" placeholder="Email" required autofocus>
  </div>

  <div class="form-label-group mb-3">
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
  </div>

  {if $error}
      <div class="alert alert-danger" role="alert">{$error}</div>
  {/if}

  <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
</form>
              