<?php
require_once '../../../../DB/DBManager.php';
require '../ProveedorController.php'; //Necesitamos importar DBManager primero
$formObj= new tablaProveedores();

if(isset($_POST["deleteAction"])){
    echo $formObj->dropRegisterByID($_POST['id']);
}else{
    echo $formObj->getAllRegisters();
}



?>