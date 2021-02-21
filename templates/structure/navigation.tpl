<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="index.php">
        <img src="public/imgs/logo.png">
    </a>
    <form action="./index.php" method="get" class="form-inline my-2 my-lg-0 w-50">
        <input class="form-control mr-sm-2 w-50" name="query" type="search" placeholder="Buscar..." value="{$smarty.get.query}" required>
        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        {if $smarty.session.user.es_admin}
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Admin
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./nuevo.php">Nuevo juego</a>
                <a class="dropdown-item" href="#">Revisar comentarios</a>
              </div>
            </li>
        {/if}
        <li class="nav-item">
            {if $smarty.session}
                <a class="nav-link" href="./actions/doLogout.php">Salir</a>
            {else}
                <a class="nav-link" href="./ingresar.php">Ingresar</a>
            {/if}
        </li>
      </ul>
    </div>
</nav>
        