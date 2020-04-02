<?php
require_once '../../../../DB/DBManager.php';
require '../EmpleadoController.php'; //Necesitamos importar DBManager primero

$formObj= new tablaEmpleados();

if(isset($_POST['rfc'])){

    $id=htmlentities(addslashes($_POST["id"]));
    $rfc=htmlentities(addslashes($_POST["rfc"]));
    $nombre=htmlentities(addslashes($_POST["nombre"]));
    $apellido_P=htmlentities(addslashes($_POST["apellido_p"]));
    $apellido_M=htmlentities(addslashes($_POST["apellido_m"]));
    $fnac=htmlentities(addslashes($_POST["fnac"]));
    $fcontratacion=htmlentities(addslashes($_POST["fcontratacion"]));
    $direccion=htmlentities(addslashes($_POST["direccion"]));
    $telefono=htmlentities(addslashes($_POST["telefono"]));
    $tipoUsuario=htmlentities(addslashes($_POST["tipousuario"]));
    $clave=htmlentities(addslashes($_POST["clave"]));
    $activo=htmlentities(addslashes($_POST["activo"]));
    if($rfc=="" ||$nombre=="" || $apellido_M=="" || $apellido_P==""|| $clave=="" || $fcontratacion=="" || $fnac=="" || ((int)$activo>1)){
        echo 0;
    }else{
        echo $formObj->saveChanges($id, $rfc, $nombre, $apellido_P, $apellido_M, $fnac, $fcontratacion, $direccion, $telefono, $tipoUsuario, $clave, $activo);
    }


}else if(isset($_POST["initData"])){
    $result= $formObj->getRegisterFilterByID($_POST["initData"]);
    if($result==0)
        return 0;
    $json=array(
        'IDEmpleado'=>$result['IDEmpleado'],
        'RFC'=>$result['RFC'],
        'Nombre'=>$result['Nombre'],
        'Apellido_P'=>$result['Apellido_P'],
        'Apellido_M'=>$result['Apellido_M'],
        'Fecha_Nacimiento'=>$result['Fecha_Nacimiento'],
        'Fecha_Contratacion'=>$result['Fecha_Contratacion'],
        'Direccion'=>$result['Direccion'],
        'Telefono'=>$result['Telefono'],
        'NivelUsuario'=>$result['NivelUsuario'],
        'Clave'=>$result['Clave'],
        'RActivo'=>$result['RActivo']
    );
    echo json_encode($json);
}else if(isset($_POST["deleteAction"])){
    echo $formObj->dropRegisterByID($_POST['id']);
}else{
    echo 0;
}
?>