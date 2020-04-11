<?php
require_once '../../../../DB/DBManager.php';
require_once '../../../../DB/helperDataTransform.php';
require '../ProductoController.php'; //Necesitamos importar DBManager primero
$formObj= new tablaProducto();

if(isset($_POST["deleteAction"])){
    echo $formObj->dropRegisterByID($_POST['id']);
}else if(isset($_POST['ViewAction'])){
    $DT= new DataTransform();
    $categoria=$DT->getCategoriaByID($_POST['categoria']);
    $proveedor=$DT->getProveedorByID($_POST['proveedor']);

        $json=array(
            'Categoria'=>$categoria,
            'Proveedor'=>$proveedor,
        );


    echo json_encode($json);
}else{
    echo $formObj->getAllRegisters();
}



?>