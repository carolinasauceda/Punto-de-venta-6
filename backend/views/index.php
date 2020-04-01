<!DOCTYPE html>
<html lang="en">
<?php require "../../common/Controllers/sessionController.php";
 $sessionController = new sessionController("../../");
 // el parametro de entrada es el numero de directorios necesarios para regresar a la carpeta raíz del sitio.
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/index-style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>T e s t</title>
</head>
<body>
    <nav>
        <div class="menu d-flex justify-content-between align-items-baseline">
            <div class="col-md-3 d-flex justify-content-between">
                <!--<h6 class="logo">L O G O</h6>-->
                <a href="/frontend/index2.html"><img src="../img/logo.png" alt="logo-punto-de-venta" width="90px"></a>
                <h6 class="logo"> Bienvenido,<?php  echo $_SESSION["Nombre"]?></h6>
                <input type="checkbox" name="modo" id="modo" class="logo">
            </div>
            <div class="col-md-9">
                <ul class="d-flex justify-content-end">
                    <li><a href="#">Inventario</a></li>
                    <li><a href="#">Empleados</a></li>
                    <li><a href="#">Proveedores</a></li>
                    <li><a href="#">Productos</a></li>
                    <li class="boton-especial"><a href="login.php">Salir</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="filtro-negro">
        <br><br><br><br><br>
        <p class="text-center">Aplicación de punto de venta inicial</p>
        <footer class="text-center">
            Programacion Web &copy; Instituto Tecnologico de Matamoros
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $("#modo").click(function(){
                if($("#modo").is(":checked")){
                $("body").css("filter","invert(1)");
                $(".filtro-negro").css("filter","inherit")
            }
            else if($("#modo").is(":not(:checked)")){
                $("body").css("filter","none");
            }
            });
        });
    </script>
</body>
</html>