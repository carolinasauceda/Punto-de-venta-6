<?php
require_once '../../../../DB/DBManager.php';
require '../NivelUsuarioController.php'; //Necesitamos importar DBManager primero

$formObj= new tablaNivelUsuario();

if(isset($_POST['descripcion'])){

    $id=htmlentities(addslashes($_POST["id"]));
    $descripcion=htmlentities(addslashes($_POST["descripcion"]));
    $nivel=htmlentities(addslashes($_POST["nivel"]));

    if($descripcion=="" || (int)$nivel==0){
        echo 0;
    }else{
        echo $formObj->saveChanges($id, $descripcion, $nivel);
    }


}else if(isset($_POST["initData"])){
    $result= $formObj->getRegisterFilterByID($_POST["initData"]);
    if($result==0)
        return 0;
    $json=array(
        'id'=>$result['IDNivel'],
        'descripcion'=>$result['Descripcion'],
        'nivel'=>$result['Nivel'],
    );
    echo json_encode($json);
}else if(isset($_POST["deleteAction"])){
    echo $formObj->dropRegisterByID($_POST['id']);
}else{
    echo 0;
}
?>