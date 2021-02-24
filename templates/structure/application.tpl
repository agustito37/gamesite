<!DOCTYPE html>
<html>
    {include file='./head.tpl'}
    <body class="bg-dark">
        {include file='./navigation.tpl'}
        <main class="container-fluid">
            <div class="row h-100">
                <section id="content" class="col bg-primary hidden-md-down p-4 h-100">
                    {if $body}
                        {include file=$body}
                    {else}
                        <h2 class="text-light">Cargando...</h2>
                    {/if}
                </section>
                {include file='./aside.tpl'}
            </div>
        </main>
    </body>
</html>
