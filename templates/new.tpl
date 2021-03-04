<h5 class="card-title text-center text-primary">Nuevo juego</h5>

<form class="form-signin" action="actions/doCreateGame.php" method="post" enctype="multipart/form-data">
  <div class="form-label-group mb-3">
    <input type="text" name="name" class="form-control" placeholder="Nombre *" autofocus required>
  </div>
    
  <div class="form-label-group mb-3">
    <input type="text" name="company" class="form-control" placeholder="Compañía *" required>
  </div>
    
  <div class="form-label-group mb-3">
   <label for="date" class="text-dark">Fecha de lanzamiento *</label>
   <input type='text' name="date" class="form-control datepicker" required>
  </div>
    
  <div class="form-label-group mb-3">
    <label for="genre" class="text-dark">Género *</label>
    <select name="genre" class="form-control" required>
        {foreach from=$genres item=genre}
            <option value="{$genre.id}">{$genre.nombre}</option>
        {/foreach}
    </select>
  </div>
    
  <div class="form-label-group mb-3">
    <label for="consoles" class="text-dark">Consolas *</label>
    <select id="consoles" name="consoles[]" class="form-control" multiple required>
        {foreach from=$consoles item=console}
            <option value="{$console.id}">{$console.nombre}</option>
        {/foreach}
    </select>
  </div>
    
  <div class="form-label-group mb-3">
   <textarea class="form-control" name="summary" placeholder="Descripción *" required></textarea>
  </div>
    
  <div class="form-label-group mb-3">
   <input type='url' name="video" placeholder="Url video" class="form-control">
  </div>
    
  <div class="form-label-group mb-3">
    <label for="image" class="text-dark">Poster *</label>
    <input type="file" name="image" id="image" accept=".jpg, .png" class="text-dark form-control-file" required>
  </div>

  {if $error}
      <div class="alert alert-danger" role="alert">{$error}</div>
  {/if}

  <button class="btn btn-lg btn-primary btn-block" type="submit">Crear</button>
</form>
  
<script>
    $('.datepicker').datepicker({ autoclose: true });
    $('.datepicker').datepicker('update', new Date());
</script>
              