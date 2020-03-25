<!Doctype>
<html>
<head>
<?php
	include "common/commonHeaders.php";
?>
</head>
<body>
<br>

<a href="backend/index.php">backend</a>
<?php
	include "DB/DBManager.php";
	include "DB/helperformsLists.php";
$d1 = new Datetime();
echo $d1->format('U');
# 1584247951
	echo "<h1>Conexión Basica a tabla clientes:</h1>";
	$coneccion= new tableClientsManager();
	$resultado=$coneccion->getAllClients();
    echo " with {$resultado->rowCount()} registers <br><br>";
	foreach ($resultado as $campo){
	    echo "Nombre: " . $campo["Nombre"] . " Apellido Paterno: " . $campo["Apellido_P"] . "<br>";
    }


    echo "Polinecio: \n\n\n";
    $nivel = new formsList();
    $nivel->getListaNivelUsuario();


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
