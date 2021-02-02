<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    require_once './logica/utils.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <link rel="stylesheet" href="public/bootstrap.min.css">
        <link rel="stylesheet" href="public/styles.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </head>
    <body>
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
        <main class="container-fluid h-100">
            <div class="row  h-100">
                <aside class="col bg-primary hidden-md-down p-4 h-100">
                    <h2 class="text-light">
                        <?php
                            $categoria = getCategoriaActual();
                            if (isset($categoria)) {
                                echo $categoria['nombre'];
                            } else {
                                echo 'Juegos';
                            }
                        ?>
                    </h2>
                </aside>
                <section class="col-2 px-1 bg-dark text-center p-5">
                    <h5 class="text-light">Categorías</h5>
                    <?php foreach (getCategorias() as $cat): ?>
                        <div class="mb-2">
                            <a href="<?php echo getCategoriaParam($cat['id']) ?>" class="d-inline-block badge badge-secondary">
                                <?php echo $cat['nombre']; ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </section>
            </div>
        </main>
    </body>
</html>
