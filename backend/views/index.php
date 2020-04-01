<!DOCTYPE html>
<html lang="en">
<?php require "../../common/Controllers/sessionController.php";
 $sessionController = new sessionController("../../");
 require 'barra_tareas.php';
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
    
    <div class="filtro-negro">
        <br><br><br>
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
                $(".menu").css("filter","invert(1)");
                $(".filtro-negro").css("filter","invert(1)");
            }
            else if($("#modo").is(":not(:checked)")){
                $(".menu").css("filter","none");
                $(".filtro-negro").css("filter","none");
            }
            });
        });
    </script>
</body>
</html>