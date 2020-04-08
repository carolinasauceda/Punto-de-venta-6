<?php
require_once '../../../../DB/DBManager.php';
require '../EmpleadoController.php'; //Necesitamos importar DBManager primero
$formObj= new tablaEmpleados();

if(isset($_POST["deleteAction"])){
    echo $formObj->dropRegisterByID($_POST['id']);
}else{
    echo $formObj->getAllRegisters();
}



?>