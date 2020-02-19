<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>conexion</title>
</head>
<body>
<?php
    try{
        $base=new PDO("mysql:host=localhost; dbname=punto-venta" , "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM usuarios where IDEmpleado= :login AND Clave= :password";
        $resultado=$base->prepare($sql);
        $login=htmlentities(addslashes($_POST["login"]));
        $password=htmlentities(addslashes($_POST["password"]));
        $resultado->bindValue(":IDEmpleado",$login);
        $resultado->bindValue(":Clave",$password);
        $resultado->execute();
        $numero_registro=$resultado->rowCount();
        if($numero_registro!=0){
            header("location:index.php");
        }else{
            header("location:login.php");
        }
    }catch(Exception $e){
        die("Error: " . $e->getMessage());
    }
?>
    
</body>
</html>