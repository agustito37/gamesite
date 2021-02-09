<section class="signin col hidden-md-down p-4 h-100">
    <div class="col-sm-9 col-md-7 col-lg-4 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center text-primary">Sign In</h5>
            <form class="form-signin" action="actions/doLogin.php" method="post">
              <div class="form-label-group mb-3">
                <input type="text" name="user" id="inputUser" class="form-control" placeholder="Usuario" required autofocus>
              </div>

              <div class="form-label-group mb-3">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
              </div>
               
              {if $error}
                  <div class="alert alert-danger" role="alert">{$error}</div>
              {/if}
                
              <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
            </form>
          </div>
        </div>
      </div>
</section>
              