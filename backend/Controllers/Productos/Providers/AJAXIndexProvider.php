<?php
require_once '../../../../DB/DBManager.php';
require '../ProductoController.php'; //Necesitamos importar DBManager primero
$formObj= new tablaProducto();

if(isset($_POST['search'])){
    echo $formObj->getRegistersByNombre($_POST['search']);
}else if(isset($_POST['initLoad'])){
    echo $formObj->getAllRegisters();
}

?>