<h2 class="text-light">
    {if $category}
        {$category.name}
    {else}
        Juegos
    {/if}
</h2>

{foreach from=$games item=game}
    <div class="product-listed card flex-row flex-wrap mt-3">
        <div class="card-header border-0">
            <img src="{$game.img}" alt="">
        </div>
        <div class="card-block p-2 d-flex flex-row flex-grow-1">
            <div class="d-flex flex-column h-100 w-100">
                <h4 class="card-title">{$game.name}</h4>
                <p class="card-text">Fecha: {$game.date}</p>
                {if not $category}
                    <p class="card-text mt-auto">Categoría: {$game.category_name}</p>
                {/if}
            </div>
            <p class="ml-auto h-100">
                <span class="score badge badge-{getScoreColor score=$game.score}">{$game.score}</span>
            </p>
        </div>
    </div>
{/foreach}
