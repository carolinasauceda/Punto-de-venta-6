<!DOCTYPE html>
<html lang="en">
<head>
    <?php require "../../common/Controllers/sessionController.php";
        $sessionController = new sessionController("../../");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Bienvenido al backend: <?php echo $_SESSION["Nombre"] . " " . $_SESSION["ApellidoP"] . " " . $_SESSION["ApellidoM"]?></p>
    <p>Usuario: <?= $_SESSION["UsuarioTipo"]?> Autorizacion nivel: <?= $_SESSION["AutorizacionNivel"]?></p>
    <a href="login.php">Logout</a>
    <br>
    <br> <a href="categorias/form.php">Formulario categoria</a>
    <br> <a href="clientes/form.php">Formulario cliente</a>
    <br> <a href="empleados/form.php">Formulario empleado</a>
    <br> <a href="nivelusuario/form.php">Formulario nivel de usuario</a>
    <br> <a href="productos/form.php">Formulario producto</a>
    <br> <a href="proveedores/form.php">Formulario proveedores</a>

</body>
</html>
