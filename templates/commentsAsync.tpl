{foreach from=$comments.results item=comment}
    <div class="comment pl-3 pr-3 pt-2 pb-3 mt-2">
        <p class="comment-header">
            <input type="number" 
                    name="rating"
                    class="rating comment-rating"
                    data-icon-lib="fa" 
                    data-active-icon="fa-star"
                    data-inactive-icon="fa-star-o" 
                    data-readonly="true"
                    value="{$comment.puntuacion}" />
            
            <strong>{$comment.alias_usuario}</strong>
            <span> - {$comment.fecha}</span>
            {if $smarty.session.user.es_admin}
                <span> - <a class="text-dark" href="actions/doDeleteComment.php?id={$comment.id}">Eliminar</a></span>
            {/if}
        </p>
        <p>{$comment.texto}</p>
    </div>
{/foreach}

<div class="mt-2 pl-2 pr-2">
    {if $page > 1}<button id="prev" class="btn btn-secondary">Anterior</button>{/if}
    {if $page < $comments.pageQuantity}<button id="next" class="btn btn-secondary float-right">Siguiente</button>{/if}
</div>
