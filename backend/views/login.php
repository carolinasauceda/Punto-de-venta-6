<?php
session_start();
session_destroy();
?>
<!--Pagina principal del backend-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../../common/commonHeaders.php"?>
    <link rel="stylesheet" href="../css/style-login.css">
    <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
    <title>Punto de venta</title>
</head>
<body>
    <div class="login-form">
        <div class="logo"><img src="../img/logo.png" alt="logo-ADPI"></div>
        <h6>Iniciar sesion</h6>
        <form method="post">
            <div class="textbox">
                <input name="usuario"  id="usuario-field" type="text" placeholder="Usuario">
                <span class="check-message hidden">Required</span>
            </div>
            <div class="textbox">
                <input name="password" type="password" id="password-field" placeholder="Contraseña">
                <span class="check-message hidden">Required</span>
            </div>
            <input type="submit" id="opener" value="Log In Now" name="loginbtn" class="login-btn" disabled>
            <div class="privacy-link">
                <h6>Punto de venta</h6>
            </div>
        </form>
        <div class="informacion-adicional">
            Aplicacion creada por: equipo 6
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(".textbox input").focusout(function(){
            if($(this).val() == ""){
                $(this).siblings().removeClass("hidden");
                $(this).css("background","red");
            }else{
                $(this).siblings().addClass("hidden");
                $(this).css("background","#ffffff");
            }
        });

        $(".textbox input").keyup(function(){
            var inputs = $(".textbox input");
            if(inputs[0].value != "" && inputs[1].value){
                $(".login-btn").attr("disabled",false);
                $(".login-btn").addClass("active");
            }else{
                $(".login-btn").attr("disabled",true);
                $(".login-btn").removeClass("active");
            }
        });
        
    </script>

    <?php
    /*if(isset($_POST['loginbtn'])){ // button name
        $Login->actionLogin();
    }*/
    ?>
    <script src="../js/login.js"></script>
    <!--Nota para caro: si deseas agregar algun mensajito controlado por javascript favor de pasarte al archivo login.js dentro de la carpeta js de este directorio-->

</body>
</html>