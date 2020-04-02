<?php
require_once '../../../../DB/DBManager.php';
require '../ClienteController.php'; //Necesitamos importar DBManager primero


$formObj= new tablaCliente();

if(isset($_POST['rfc'])){

    $id=htmlentities(addslashes($_POST["id"]));
    $nombre=htmlentities(addslashes($_POST["nombre"]));
    $rfc=htmlentities(addslashes($_POST["rfc"]));
    $apellido_P=htmlentities(addslashes($_POST["apellido_p"]));
    $apellido_M=htmlentities(addslashes($_POST["apellido_m"]));
    $correo=htmlentities(addslashes($_POST["correo"]));
    $telefono=htmlentities(addslashes($_POST["telefono"]));
    $activo=htmlentities(addslashes($_POST["activo"]));
    if($rfc=="" ||$nombre=="" || $apellido_M=="" || $apellido_P==""|| ((int)$activo>1)){
        echo 0;
    }else{
        echo $formObj->saveChanges($id, $rfc, $nombre, $apellido_P, $apellido_M, $correo, $telefono, $activo);
    }


}else if(isset($_POST["initData"])){
    $result= $formObj->getRegisterFilterByID($_POST["initData"]);
    if($result==0)
        return 0;
    $json=array(
        'Nombre'=>$result['Nombre'],
        'RFC'=>$result['RFC'],
        'Apellido_P'=>$result['Apellido_P'],
        'Apellido_M'=>$result['Apellido_M'],
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