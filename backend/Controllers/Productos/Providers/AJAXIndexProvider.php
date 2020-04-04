<?php
require_once '../../../../DB/DBManager.php';
require '../ProductoController.php'; //Necesitamos importar DBManager primero

    $tableObj = new tablaProducto();
    echo $tableObj->getAllRegisters();

?>