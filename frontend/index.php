<!--Pagina principal del frontend-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Punto de venta</title>
</head>
<body>
    <div class="login-form">
        <div class="logo"><img src="img/logo-prueba.png" alt=""></div>
        <h6>Sign In</h6>
        <form action="">
            <div class="textbox">
                <input type="text" placeholder="Usuario">
                <span class="check-message hidden">Required</span>
            </div>
            <div class="textbox">
                <input type="password" placeholder="Contraseña">
                <span class="check-message hidden">Required</span>
            </div>
            <input type="submit" value="Log In Now" class="login-btn" disabled>
            <div class="privacy-link">
                <h6>Aplicacion</h6>
            </div>
        </form>
        <div class="informacion-adicional">
            Aplicacion creada por: equipo 6
        </div>
    </div>
    <script type="text/javascript">
        $(".textbox input").focusout(function(){
            if($(this).val() == ""){
                $(this).siblings().removeClass("hidden");
                $(this).css("background","#554343");
            }else{
                $(this).siblings().addClass("hidden");
                $(this).css("background","#484848");
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
</body>
</html>