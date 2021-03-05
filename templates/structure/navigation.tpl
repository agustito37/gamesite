<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="index.php">
        <img src="{$public_path}imgs/logo.png">
    </a>
    <form action="./index.php" method="get" class="form-inline w-50">
        <input class="form-control w-50 mr-2 my-1" name="query" type="search" placeholder="Buscar..." value="{$smarty.get.query}">
        <select name="genreId" class="form-control mr-2 my-1">
            <option value="">Todos</option>
            {foreach from=$genres item=genre}
                <option value="{$genre.id}" {if $smarty.get.genreId == $genre.id}selected{/if}>{$genre.nombre}</option>
            {/foreach}
        </select>
        <select name="consoleId" class="form-control mr-2 my-1">
            <option value="">Todas</option>
            {foreach from=$consoles item=console}
                <option value="{$console.id}" {if $smarty.get.consoleId == $console.id}selected{/if}>{$console.nombre}</option>
            {/foreach}
        </select>
        <button class="btn btn-outline-primary my-1" type="submit">Buscar</button>
    </form>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto align-items-center">
        {if $smarty.session}
            <li class="nav-item mr-2 text-muted">{$smarty.session.user.alias}</li>
        {/if}
        {if $smarty.session.user.es_admin}
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Admin
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./nuevo.php">Nuevo juego</a>
                <a class="dropdown-item" href="./revision.php">Revisar comentarios</a>
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
        