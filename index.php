<!Doctype>
<html>
<head>
<?php
	include "common/commonHeaders.php";
?>
</head>
<body>
<br>
<a href="frontend/index2.php">Frontend</a>
<?php
	include "DB/DBManager.php";
	echo "<h1>Conexión Basica a tabla clientes:</h1>";
	$coneccion= new tableClientsManager();
	$resultado=$coneccion->getAllClients();
    echo " with {$resultado->rowCount()} registers <br><br>";
	foreach ($resultado as $campo){
	    echo "Nombre: " . $campo["Nombre"] . " Apellido Paterno: " . $campo["Apellido_P"] . "<br>";
    }


    echo "<h1>Conexión Basica a tabla Usuarios:</h1>";
    $coneccion= new tableUserManager();
    $Nivel = new tableNivelUsuario();
    $resultado=$coneccion->getAllUsers();
    echo " with {$resultado->rowCount()} registers <br><br>";
    foreach ($resultado as $campo){


        echo "Nickname: " . $campo["IDUsuario"] . " Nivel: " . $Nivel->NivelUsuarioToText($campo["NivelUsuario"]) . "<br>";
    }






	?>
</body>
</html>
