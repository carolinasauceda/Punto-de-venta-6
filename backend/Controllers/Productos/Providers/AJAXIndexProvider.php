<?php
require_once '../../../../DB/DBManager.php';
require '../ProductoController.php'; //Necesitamos importar DBManager primero
$formObj= new tablaProducto();

if(isset($_POST["deleteAction"])){
    echo $formObj->dropRegisterByID($_POST['id']);
}else{
    echo $formObj->getAllRegisters();
}



?>