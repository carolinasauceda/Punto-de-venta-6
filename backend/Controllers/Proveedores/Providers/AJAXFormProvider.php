<?php
require_once '../../../../DB/DBManager.php';
require '../ProveedorController.php'; //Necesitamos importar DBManager primero



$formObj= new tablaProveedores();

if(isset($_POST['compania'])){

    $id=htmlentities(addslashes($_POST["id"]));
    $compania=htmlentities(addslashes($_POST["compania"]));
    $contacto=htmlentities(addslashes($_POST["contacto"]));
    $correo=htmlentities(addslashes($_POST["correo"]));
    $telefono=htmlentities(addslashes($_POST["telefono"]));
    $activo=htmlentities(addslashes($_POST["activo"]));
    if($compania=="" ||$contacto=="" || $telefono==""|| ((int)$activo>1)){
        echo 0;
    }else{
        echo $formObj->saveChanges($id, $compania, $contacto,  $correo, $telefono, $activo);
    }


}else if(isset($_POST["initData"])){
    $result= $formObj->getRegisterFilterByID($_POST["initData"]);
    if($result==0)
        return 0;
    $json=array(
        'IDProveedor'=>$result['IDProveedor'],
        'Compania'=>$result['Compania'],
        'Contacto'=>$result['Contacto'],
        'Correo'=>$result['Correo'],
        'Telefono'=>$result['Telefono'],
        'RActivo'=>$result['RActivo']
    );
    echo json_encode($json);
}else if(isset($_POST["deleteAction"])){
    echo $formObj->dropRegisterByID($_POST['id']);
}else{
    echo 0;
}
?>