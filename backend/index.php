<!DOCTYPE html>
<html lang="en">
<head>
    <?php  require "../common/Controllers/sessionController.php" ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Bienvenido al backend: <?php echo $_SESSION["Nombre"] . " " . $_SESSION["ApellidoP"] . " " . $_SESSION["ApellidoM"]?></p>
    <p>Usuario: <?= $_SESSION["UsuarioTipo"]?> Autorizacion nivel: <?= $_SESSION["AutorizacionNivel"]?></p>
    <a href="login.php">Logout</a>
    <br>
    <br> <a href="formulario-categoria.php">Formulario categoria</a>
    <br> <a href="formulario-cliente.php">Formulario cliente</a>
    <br> <a href="formulario-empleado.php">Formulario empleado</a>
    <br> <a href="formulario-nivel-usuario.php">Formulario nivel de usuario</a>
    <br> <a href="formulario-producto.php">Formulario producto</a>
    <br> <a href="formulario-proveedor.php">Formulario proveedores</a>

</body>
</html>
