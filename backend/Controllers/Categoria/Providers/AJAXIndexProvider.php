<?php
require_once '../../../../DB/DBManager.php';
require '../CategoriaController.php'; //Necesitamos importar DBManager primero
$formObj= new tablaCategoria();

if(isset($_POST["deleteAction"])){
    echo $formObj->dropRegisterByID($_POST['id']);
}else{
    echo $formObj->getAllRegisters();
}



?>