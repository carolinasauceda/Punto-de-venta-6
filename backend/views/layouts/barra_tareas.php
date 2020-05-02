<?php
    $siteURL="http://www.puntodventa.com/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Creacion de barra de tareas. Esto para poder solicitar su uso sin necesidad de repetir el codigo
    en todas las pantallas donde lo vayamos a solicitar  -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index-style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
</head>
<body>
    <nav>
        <div class="menu d-flex justify-content-between align-items-baseline">
            <div class="col-md-3 d-flex justify-content-between">
                <!--<h6 class="logo">L O G O</h6>-->
                <a href="/frontend/index2.html"><img src="../img/logo.png" alt="logo-punto-de-venta" width="100px" height="35px"></a>
                <h6 class="logo"> Bienvenido,<?php  echo $_SESSION["Nombre"]?></h6>
                <input type="checkbox" name="modo" id="modo" class="logo">
            </div>
            <div class="col-md-9">
                <ul class="d-flex justify-content-end">
                    <li><a href="#">Inventario</a></li>
                    <li><a href="<?php echo $siteURL?>backend/views/empleados/">Empleados</a></li>
                    <li><a href="<?php echo $siteURL?>backend/views/proveedores/">Proveedores</a></li>
                    <li><a href="<?php echo $siteURL?>backend/views/productos/">Productos</a></li>
                    <li><a href="<?php echo $siteURL?>frontend/views/ventas/">Ventas</a></li>
                    <li class="boton-especial"><a href="../login.php">Salir</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
</body>
</html>