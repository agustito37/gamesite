<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <link rel="stylesheet" href="public/bootstrap.min.css">
        <link rel="stylesheet" href="public/styles.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </head>
    <body class="bg-dark">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">
                <img src="public/imgs/logo.png">
            </a>
            <form class="form-inline my-2 my-lg-0 w-50">
                <input class="form-control mr-sm-2 w-50" type="search" placeholder="Buscar..." aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
            </form>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown mr-4">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Nuevo juego</a>
                    <a class="dropdown-item" href="#">Revisar comentarios</a>
                  </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ingresar</a>
                </li>
              </ul>
            </div>
        </nav>
        <main class="container-fluid">
            <div class="row  h-100">
                <aside class="col bg-primary hidden-md-down p-4 h-100">
                    <h2 class="text-light">
                        {if isset($category)}
                            {$category['name']}
                        {else}
                            Juegos
                        {/if}
                        
                        {foreach from=$games item=game}
                            <div class="product-listed card flex-row flex-wrap mt-3">
                                <div class="card-header border-0">
                                    <img src="{$game['img']}" alt="">
                                </div>
                                <div class="card-block p-2 d-flex flex-row flex-grow-1">
                                    <div class="d-flex flex-column h-100 w-100">
                                        <h4 class="card-title">{$game['name']}</h4>
                                        <p class="card-text">Fecha: {$game['date']}</p>
                                        {if not isset($category)}
                                            <p class="card-text mt-auto">Categoría: {$game['category_name']}</p>
                                        {/if}
                                    </div>
                                    <p class="ml-auto h-100">
                                        <span class="score badge badge-{getScoreColor score=$game['score']}">{$game['score']}</span>
                                    </p>
                                </div>
                            </div>
                        {/foreach}
                    </h2>
                </aside>
                <section class="col-2 px-1 bg-dark text-center p-5">
                    <h5 class="text-light">Categorías</h5>
                    {foreach from=$categories item=cat}
                        <div class="mb-2">
                            <a href="{getCategoryParam category=$cat['id']}" class="d-inline-block badge badge-secondary">
                                {$cat['name']}
                            </a>
                        </div>
                    {/foreach}
                    
                    <h5 class="text-light mt-5">Top Game</h5>
                </section>
            </div>
        </main>
    </body>
</html>
