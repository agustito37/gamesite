<h5 class="card-title text-center text-primary">Nuevo juego</h5>

<form class="form-signin" action="actions/doCreateGame.php" method="post" enctype="multipart/form-data">
  <div class="form-label-group mb-3">
    <input type="text" name="name" class="form-control" placeholder="Nombre" required autofocus>
  </div>

  <div class="form-label-group mb-3">
    <input type="file" name="image" accept=".jpg, .png" class="form-control">
  </div>

  {if $error}
      <div class="alert alert-danger" role="alert">{$error}</div>
  {/if}

  <button class="btn btn-lg btn-primary btn-block" type="submit">Crear</button>
</form>
              