<?php
require_once '../../../../DB/DBManager.php';
require '../VentasController.php'; //Necesitamos importar DBManager primero


$formCatobj= new VentasManager();

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


}else if(isset($_POST["ProductID"])){
    $result= $formCatobj->getRegisterFilterByID($_POST["ProductID"]);
    if($result==0)
        return 0;
    if(isset($_POST['StockPetition'])){
        $json = array(
            'EnExistencia' => $result['EnExistencia']
        );
    }else{
        $json=array(
            'IDProducto'=>$result['IDProducto'],
            'Nombre'=>$result['Nombre'],
            'IDProveedor'=>$result['IDProveedor'],
            'IDCategoria'=>$result['IDCategoria'],
            'PrecioUnitario'=>$result['PrecioUnitario'],
            'EnExistencia'=>$result['EnExistencia'],
        );
    }
    echo json_encode($json);
}else if(isset($_POST["IDForStock"])){
    echo $formCatobj->UpdateStockByID($_POST['IDForStock'], $_POST["UpdateStock"]);
}else if(isset($_POST['ProcesarVenta'])){

    echo $formCatobj->registrarVenta($_POST['Venta'], $_POST['Productos']);
}else if(isset($_POST['SearchClient'])){
    echo $formCatobj->getClientInfo($_POST['SearchClient']);
}else{
    echo 0;
}

?>