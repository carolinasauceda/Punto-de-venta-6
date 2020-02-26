<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require "../common/Controllers/sessionController.php"
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Bienvenido al Frontend: <?php echo $_SESSION["Nombre"] . " " . $_SESSION["ApellidoP"] . " " . $_SESSION["ApellidoM"]?></p>
    <a href="login.php">Logout</a>
</body>
</html>