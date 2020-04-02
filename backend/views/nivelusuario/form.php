<!doctype html>
<html lang="en">
<head>
    <?php
        require "../../../common/Controllers/sessionController.php";
        $userControl= new sessionController('../../../');
        $edition=$userControl->isAutorizeFor('formNivelUsuario');
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include "../../../common/commonHeaders.php"; ?>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">



    <link rel="icon" href="Favicon.png">

    <?php
    $id=0;
    if(isset($_GET["id"])){$id=$_GET["id"];}else{$id=0;}
    ?>

    <title>Nueva Categoria</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
    <a class="navbar-brand" href="#">L O G O</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">INICIO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../login.php">SALIR</a>
            </li>
        </ul>

    </div>
    </div>
</nav>

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Nueva categoria</div>
                        <div class="card-body">
                            <div id="alertsArea"></div>
                            <form name="my-form" id="formulario"  method="post">
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Descripción</label>
                                    <div class="col-md-6">
                                        <input type="text" value="" data="<?php echo $id?>" id="descripcion" class="form-control" name="descripcion">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Nivel de Permisos</label>
                                    <div class="col-md-6">
                                        <input type="number" value="" id="nivelDePermisos" class="form-control" name="nivelDePermisos">
                                    </div>
                                </div>


                                <!--<div class="form-group row">
                                    <label for="nid_number" class="col-md-4 col-form-label text-md-right"><abbr
                                                title="National Id Card">NID</abbr> Number</label>
                                    <div class="col-md-6">
                                        <input type="text" id="nid_number" class="form-control" name="nid-number">
                                    </div>
                                </div>-->

                                <div class="col-md-6 offset-md-4">
                                    <!--Botones de control-->
                                    <?php
                                        require "../layouts/formButtons";
                                        $buttons = new formButtons();
                                        $buttons->renderButtons($edition);
                                    ?>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</main>
<?php include "../../../common/commonJS.php"; ?>
<script src="../../../common/js/CommonAlerts.js"></script>
<script src="../../js/DataToSendManager.js"></script>
<script>
    msg = new alerts();
    form = new DataToSendManager();
    connection="../../Controllers/NivelUsuario/Providers/AJAXFormProvider.php";
    formSelector="#formulario";
    registerKeyDataField="#descripcion";
    loadregisterfunc = form.onloadNivelUsuarioRegister();
    savePostData=form.onSavePostDataOfNivelUsuario();
    onDeleteNewRedirect="../../views/nivelusuario/form.php";
    SuccessAlert=msg.basicSuccessAlert();
    WarningAlert=msg.basicwarningAlert();
</script>
<script src="../../js/AJAXFormController.js"></script>
</body>
</html>