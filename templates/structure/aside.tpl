<aside class="col-2 px-1 bg-dark text-center p-5">
    <h5 class="text-light">Género</h5>
    <div class="mb-2"><a href="./index.php" class="badge badge-secondary">Todos</a></div>
    {foreach from=$genres item=genre}
        <div class="mb-2">
            <a href="{getGenreParam genre=$genre.id}" class="badge badge-secondary">
                {$genre.nombre}
            </a>
        </div>
    {/foreach}

    {if $topGame}
        <h5 class="text-light mt-5">Top Game</h5>
        <a class="text-light" href="./detalle.php?gameId={$topGame.id}">
           <img class="img-fluid aside-poster mx-2" src="{getGamePosterUrl poster=$topGame.poster}" alt="{$topGame.nombre_juego} poster"> 
           <span class="d-block mt-1">{$topGame.nombre_juego}</span>
        </a>
    {/if}
</aside>
    