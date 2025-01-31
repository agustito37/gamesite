<h2 class="text-light">
    {$game.nombre_juego}
</h2>

<div class="product-detail card flex-row mt-3">
    <div class="card-header border-0">
        <img src="{getGamePosterUrl poster=$game.poster}" alt="">
        <p class="text-center mt-2 mb-0 text-light">{$game.visualizaciones} visitas</p>
    </div>
    <div class="card-block p-2 d-flex flex-row flex-grow-1">
        <div class="d-flex flex-column h-100 w-100">
            <p class="card-text">Género: {$game.nombre_genero}</p>
            <p class="card-text">Empresa: {$game.empresa}</p>
            <p class="card-text">Fecha lanzamiento: {$game.fecha_lanzamiento}</p>
            {if $game.resumen}
                <p>{$game.resumen}</p>
            {/if}
            {if $game.url_video}
                <p class="card-text"><a class="text-dark" target="_blank" href="{$game.url_video}">Ver video</a></p>
            {/if}
            <p class="card-text mt-auto">
                {foreach from=$gameConsoles item=console}
                    <span class="d-inline-block badge badge-secondary">{$console.nombre}</span>
                {/foreach}
            </p>
        </div>
        <p class="ml-auto h-100">
            <span class="score badge badge-{getScoreColor score=$game.puntuacion}">{getFormattedScore score=$game.puntuacion}</span>
        </p>
    </div>
</div>
        
<h4 class="text-light mt-5 mb-3">Comentarios ({$commentsCount})</h2>

<div id="comments">{if $commentsCount}Cargando...{/if}</div>

{if $smarty.session}
    {if !$hasCommented}
        <form class="mt-2 p-2 w-100" action="actions/doCreateComment.php" method="post">
            <textarea class="form-control" name="comment" placeholder="¿Qué te pareció el {$game.nombre_juego}?" required></textarea>
            <div class="clearfix">
                <input type="number" 
                    name="rating" 
                    class="rating"
                    data-icon-lib="fa" 
                    data-active-icon="fa-star"
                    data-inactive-icon="fa-star-o" 
                    value="1" />
            </div>
            <input type="hidden" name="game" value="{$game.id}" />
            <button class="mt-1 btn btn-secondary float-right" type="submit">Comentar</button>
        </form>
    {else}
        <p class="mt-2 ml-2">Ya has comentado</p>
    {/if}
{/if}
