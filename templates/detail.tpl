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
