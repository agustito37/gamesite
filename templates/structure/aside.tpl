<aside class="col-2 px-1 bg-dark text-center p-5">
    <h5 class="text-light">Categorías</h5>
    {foreach from=$genres item=genre}
        <div class="mb-2">
            <a href="{getGenreParam genre=$genre.id}" class="d-inline-block badge badge-secondary">
                {$genre.nombre}
            </a>
        </div>
    {/foreach}

    <h5 class="text-light mt-5">Top Game</h5>
</aside>
    