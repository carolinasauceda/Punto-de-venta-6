<?php
require_once '../../../../DB/DBManager.php';
require '../CategoriaController.php'; //Necesitamos importar DBManager primero

$formCatobj= new tablaCategoria();

if(isset($_POST['nombre'])){
    $nombre=htmlentities(addslashes($_POST["nombre"]));
    $id=(int)htmlentities(addslashes($_POST["id"]));
    $descripcion=htmlentities(addslashes($_POST["descripcion"]));
    $activo=htmlentities(addslashes($_POST["activo"]));
    if($nombre=="" || ((int)$activo>1)){
        echo 0;
    }else{
        if($descripcion==""){
            $descripcion="Sin descripcion aún";
        }
        echo $formCatobj->saveChanges($id,$nombre,$descripcion,$activo);
    }


}else if(isset($_POST["initData"])){
    $result= $formCatobj->getRegisterFilterByID($_POST["initData"]);
    if($result==0)
        return 0;
    $json=array(
        'id'=>$result['IDCategoria'],
        'Nombre'=>$result['Nombre'],
        'Descripcion'=>$result['Descripcion'],
        'RActivo'=>$result['RActivo']
    );
    echo json_encode($json);
}else if(isset($_POST["deleteAction"])){
    echo $formCatobj->dropRegisterByID($_POST['id']);
}else{
    echo 0;
}

?>