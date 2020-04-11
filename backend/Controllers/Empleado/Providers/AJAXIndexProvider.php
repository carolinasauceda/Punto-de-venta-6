<?php
require_once '../../../../DB/DBManager.php';
require '../EmpleadoController.php'; //Necesitamos importar DBManager primero
$formObj= new tablaEmpleados();

if(isset($_POST["deleteAction"])){
    echo $formObj->dropRegisterByID($_POST['id']);
}else if(isset($_POST["ViewAction"])){
    require_once '../../../../DB/helperDataTransform.php';
    $DT= new DataTransform();
    $nivel=$DT->getNivelUsuarioByID($_POST["Nivel"]);

    $json=array(
        'Nivel'=>$nivel,
    );


    echo json_encode($json);
}else{
    echo $formObj->getAllRegisters();
}



?>