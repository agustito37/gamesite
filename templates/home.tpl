<h2 class="text-light">
    {if $genre}
        {$genre.nombre}
    {elseif $query}
        Buscar por <i>{$query}</i>
    {else}
        Juegos
    {/if}
</h2>

{foreach from=$games item=game}
    <div class="product-listed card flex-row flex-wrap mt-3">
        <div class="card-header border-0">
            <img src="{getGamePosterUrl poster=$game.poster}" alt="">
        </div>
        <div class="card-block p-2 d-flex flex-row flex-grow-1">
            <div class="d-flex flex-column h-100 w-100">
                <h4 class="card-title">{$game.nombre_juego}</h4>
                <p class="card-text">Fecha: {$game.fecha_lanzamiento}</p>
                {if not $genre}
                    <p class="card-text mt-auto">Categoría: {$game.nombre_genero}</p>
                {/if}
            </div>
            <p class="ml-auto h-100">
                <span class="score badge badge-{getScoreColor score=$game.puntuacion}">{$game.puntuacion}</span>
            </p>
        </div>
    </div>
{/foreach}
