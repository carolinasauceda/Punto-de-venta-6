<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include "../common/commonHeaders.php"; ?>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">



    <link rel="icon" href="Favicon.png">
    <title>Nuevo Producto</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
    <a class="navbar-brand" href="#">L O G O</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">INICIO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">SALIR</a>
            </li>
        </ul>

    </div>
    </div>
</nav>

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Nuevo producto</div>
                        <div class="card-body">
                            <form name="my-form"   method="post">
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                    <div class="col-md-6">
                                        <input type="text" id="nombre" class="form-control" name="nombre">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Proveedor</label>
                                    <div class="col-md-6">
                                        <input list="browsers" id="proveedor" class="form-control name="proveedor">
                                        <datalist id="browsers">
                                            <option value="Bimbo">
                                            <option value="Coca cola">
                                            <option value="Pepsi">
                                            <option value="Sabritas">
                                            <option value="Gamesa">
                                          </datalist>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">Categoria</label>
                                    <div class="col-md-6">
                                        <input list="categoria" id="categorias" class="form-control name="categorias">
                                        <datalist id="categoria">
                                            <option value="Bebida">
                                            <option value="Pan dulce">
                                            <option value="Jugo natural">
                                            <option value="Galletas">
                                            <option value="Dulces">
                                          </datalist>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Precio individual</label>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control min="0.00" max="10000.00" step="0.01" id="precio" name="precio">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Stock</label>
                                    <div class="col-md-6">
                                        <input type="number" id="stock" name="stock" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Imagen</label>
                                    <div class="col-md-6">
                                        <input type="file" id="imagen" class="form-control" name="imagen">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Estado</label>
                                    <div class="col-md-6">
                                        <input list="estado" id="estado-seleccion" class="form-control" name="estado-seleccion">
                                        <datalist id="estado">
                                            <option value="activo">
                                            <option value="archivado">
                                          </datalist>
                                    </div>
                                </div>


                                <!--<div class="form-group row">
                                    <label for="nid_number" class="col-md-4 col-form-label text-md-right"><abbr
                                                title="National Id Card">NID</abbr> Number</label>
                                    <div class="col-md-6">
                                        <input type="text" id="nid_number" class="form-control" name="nid-number">
                                    </div>
                                </div>-->

                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                        Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</main>
<?php include "../common/commonHeaders.php"; ?>
</body>
</html>