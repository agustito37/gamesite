<!DOCTYPE html>
<html>
    {include file='./head.tpl'}
    <body class="bg-dark">
        {include file='./navigation.tpl'}
        <main class="container-fluid">
            <div class="row h-100">
                <section id="content" class="col bg-primary hidden-md-down p-4 h-100">
                    {include file=$body}
                </section>
            </div>
        </main>
    </body>
</html>