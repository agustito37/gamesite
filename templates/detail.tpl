<h2 class="text-light">
    {$game.nombre_juego}
</h2>

<div class="product-detail card flex-row flex-wrap mt-3">
    <div class="card-header border-0">
        <img src="{getGamePosterUrl poster=$game.poster}" alt="">
    </div>
    <div class="card-block p-2 d-flex flex-row flex-grow-1">
        <div class="d-flex flex-column h-100 w-100">
            <p class="card-text">Género: {$game.nombre_genero}</p>
            <p class="card-text">Empresa: {$game.empresa}</p>
            <p class="card-text">Fecha lanzamiento: {$game.fecha_lanzamiento}</p>
            <p class="card-text mt-auto">
                {foreach from=$consoles item=console}
                    <span class="d-inline-block badge badge-secondary">{$console.nombre}</span>
                {/foreach}
            </p>
        </div>
        <p class="ml-auto h-100">
            <span class="score badge badge-{getScoreColor score=$game.puntuacion}">{$game.puntuacion}</span>
        </p>
    </div>
</div>
        
<h4 class="text-light mt-5 mb-3">Comentarios ({$comments.cantidad})</h2>

{foreach from=$comments.registros item=comment}
    <div class="comment pl-3 pr-3 pt-2 pb-3 mt-2">
        <p class="comment-header">
            <input type="number" 
                    name="rating" 
                    id="rating-custom-icons" 
                    class="rating"
                    data-icon-lib="fa" 
                    data-active-icon="fa-star"
                    data-inactive-icon="fa-star-o" 
                    data-readonly="true"
                    value="{$comment.puntuacion}" />
            <strong>{$comment.alias_usuario}</strong> - {$comment.fecha}</p>
        <p>{$comment.texto}</p>
    </div>
{/foreach}

{if $smarty.session}
    {if !$hasCommented}
        <form class="mt-2 p-2 w-100" action="actions/doCreateComment.php" method="post">
            <textarea class="form-control" name="comment" placeholder="¿Qué te pareció el {$game.nombre_juego}?" required></textarea>
            <div class="clearfix">
                <input type="number" 
                    name="rating" 
                    id="rating-custom-icons" 
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
