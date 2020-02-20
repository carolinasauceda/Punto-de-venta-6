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
        /*Caro, he actualizado los nombres de tablas, de esta manera la tabla usuario ahora es Usuario, y así susecivamente
            y modifique algunos campos en algunas tablas. Te aconsejo pasarte por el registro de commits.

        PD: Te aconsejo que la base de datos se llame simplemente puntoventa, por que puede ocacionar problemas para despues el guión.
        Y por ultimo, a si, deje un archivo sql en la carpeta DB, pueden importar la base de datos en su localhost para hacer pruebas,
        si no modifico nada pues seria la mas actualizada ( y ya me da miedo moverle pues veo ya estan haciendo conexiones).

        PD2: Revisa la estructura de la bd actual y dime o elimina que si y que no.

        */
        $base=new PDO("mysql:host=localhost; dbname=puntoventa" , "root", "");
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