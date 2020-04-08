<?php
require_once '../../../../DB/DBManager.php';
require '../ClienteController.php'; //Necesitamos importar DBManager primero
$formObj= new tablaCliente();

if(isset($_POST["deleteAction"])){
    echo $formObj->dropRegisterByID($_POST['id']);
}else{
    echo $formObj->getAllRegisters();
}



?>