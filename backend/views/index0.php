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
    <br> <a href="categorias/formulario-categoria.php">Formulario categoria</a>
    <br> <a href="clientes/formulario-cliente.php">Formulario cliente</a>
    <br> <a href="empleados/formulario-empleado.php">Formulario empleado</a>
    <br> <a href="nivelusuario/formulario-nivel-usuario.php">Formulario nivel de usuario</a>
    <br> <a href="productos/formulario-producto.php">Formulario producto</a>
    <br> <a href="proveedores/formulario-proveedor.php">Formulario proveedores</a>

</body>
</html>
