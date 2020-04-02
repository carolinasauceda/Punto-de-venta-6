<?php
require_once '../../../../DB/DBManager.php';
require '../ProductoController.php'; //Necesitamos importar DBManager primero

$formObj= new tablaProducto();

if(isset($_POST['nombre'])){
    $id=htmlentities(addslashes($_POST["id"]));
    $nombre=htmlentities(addslashes($_POST["nombre"]));
    $proveedor=htmlentities(addslashes($_POST["proveedor"]));
    $categoria=htmlentities(addslashes($_POST["categoria"]));
    $precio=htmlentities(addslashes($_POST["precio"]));
    $stock=htmlentities(addslashes($_POST["stock"]));
    $activo=htmlentities(addslashes($_POST["activo"]));
    if($nombre=="" ||$proveedor=="" || $categoria=="" || $precio==0.0 || ((int)$activo>1)){
        echo 0;
    }else{
        echo $formObj->saveChanges($id, $nombre, $proveedor, $categoria, $precio,$stock, $activo);
    }


}else if(isset($_POST["initData"])){
    $result= $formObj->getRegisterFilterByID($_POST["initData"]);
    if($result==0)
        return 0;
    $json=array(
        'IDProducto'=>$result['IDProducto'],
        'Nombre'=>$result['Nombre'],
        'IDProveedor'=>$result['IDProveedor'],
        'IDCategoria'=>$result['IDCategoria'],
        'PrecioUnitario'=>$result['PrecioUnitario'],
        'EnExistencia'=>$result['EnExistencia'],
        'RActivo'=>$result['RActivo']
    );
    echo json_encode($json);
}else if(isset($_POST["deleteAction"])){
    echo $formObj->dropRegisterByID($_POST['id']);
}else{
    echo 0;
}
?>