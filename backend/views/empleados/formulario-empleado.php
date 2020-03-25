<!doctype html>
<html lang="en">
<head>
    <?php
        require "../../../common/Controllers/sessionController.php";
        $userControl= new sessionController('../../../');
        $edition=$userControl->isAutorizeFor('formEmpleados');
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include "../../../common/commonHeaders.php"; ?>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">



    <link rel="icon" href="Favicon.png">
    <title>Nuevo Empleado</title>

    <?php
    include_once '../../../DB/helperformsLists.php';
    $id=0;
    if(isset($_GET["id"])){$id=$_GET["id"];}else{$id=0;}
    ?>

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
                        <div class="card-header">Nuevo empleado</div>
                        <div class="card-body">
                            <div id="alertsArea"></div>
                            <form name="my-form" id="formulario"  method="post">
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">RFC</label>
                                    <div class="col-md-6">
                                        <input type="text" id="RFC" data="<?php echo $id?>" class="form-control" name="RFC">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                    <div class="col-md-6">
                                        <input type="text" id="nombre" class="form-control" name="nombre">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Apellido Paterno</label>
                                    <div class="col-md-6">
                                        <input type="text" id="apellido_p" class="form-control" name="apellido_p">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">Apellido Materno</label>
                                    <div class="col-md-6">
                                        <input type="text" id="apellido_m" class="form-control" name="apellido_m">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Fecha de nacimiento</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" id="fnac" name="fnac">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Fecha de Contratación</label>
                                    <div class="col-md-6">
                                        <input type="date" id="fcontratacion" class="form-control" name="fcontratacion">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Dirección</label>
                                    <div class="col-md-6">
                                        <input type="text" id="direccion" class="form-control" name="direccion">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Teléfono</label>
                                    <div class="col-md-6">
                                        <input type="tel" id="telefono" class="form-control" name="telefono">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Tipo de usuario</label>
                                    <div class="col-md-6">
                                        <select id="tipousuario" class="form-control">
                                            <?php
                                             $nivelesDeUsuario= new formsList();
                                             $nivelesDeUsuario->getListaNivelUsuario();
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Clave</label>
                                    <div class="col-md-6">
                                        <input type="password" id="clave" class="form-control" name="clave">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Estado</label>
                                    <div class="col-md-6">
                                        <select id="estado-seleccion" class="form-control">
                                            <option value="1">Activo</option>
                                            <option value="0">Archivado</option>
                                        </select>
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
    connection="../../Controllers/formEmpleadoController.php";
    formSelector="#formulario";
    registerKeyDataField="#RFC";
    loadregisterfunc = form.onloadEmpleadoRegister();
    savePostData=form.onSavePostDataOfEmpleado();
    onDeleteNewRedirect="../../views/empleados/formulario-empleado.php";
    SuccessAlert=msg.basicSuccessAlert();
    WarningAlert=msg.basicwarningAlert();
</script>
<script src="../../js/AJAXController.js"></script>
</body>
</html>