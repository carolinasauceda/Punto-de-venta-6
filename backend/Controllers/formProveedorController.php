<?php
require "../../DB/DBManager.php";

class tablaProveedores extends  DBManager{

    public function __construct()
    {
        parent::__construct();
    }

    protected function _registerExist($id){
        try{
            $this->sql="SELECT * FROM Proveedores where IDProveedor= :id";
            $resultado=$this->base->prepare($this->sql);
            $resultado->bindValue(":id",$id);
            $resultado->execute();
            $numero_registro=$resultado->rowCount();
            if($numero_registro!=0){
                return 1;
            }else{
                return 0; //no existe
            }
        }catch (Exception $e){
            die("Error" . $e);
        }
    }

    function saveChanges($id, $compania, $contacto, $correo, $telefono, $activo){

        try{
            $typeSqlrequest=$this->_registerExist($id);
            if($typeSqlrequest==0){
                //IS an insert instruction
                $this->sql="Insert Into Proveedores (Compania, Contacto, Correo, Telefono, RActivo) values (:compania,:contacto, :correo, :telefono,:activo)";
            }else{
                //IS an Update instruction
                $this->sql="Update Proveedores set Compania= :compania, Contacto= :contacto, Correo= :correo, Telefono= :telefono, RActivo= :activo where IDProveedor= :ID";
            }

            $resultado=$this->base->prepare($this->sql);
            $resultado->bindValue(":compania",$compania);
            $resultado->bindValue(":contacto",$contacto);
            $resultado->bindValue(":correo",$correo);
            $resultado->bindValue(":telefono",$telefono);
            $resultado->bindValue(":activo",$activo);
            $typeSqlrequest==1?$resultado->bindValue(":ID",$id):null;
            $resultado->execute();
            $this->closeConection();
            echo 1;

        }catch (Exception $e){
            die("Error" . $e);
        }
    }


    function getRegisterFilterByID($ID){
        try{
            $this->sql="SELECT * FROM Proveedores where IDProveedor= :id";
            $resultado=$this->base->prepare($this->sql);
            $resultado->bindValue(":id",$ID);
            $resultado->execute();
            $numero_registro=$resultado->rowCount();
            $this->closeConection();
            if($numero_registro!=0){

                return $resultado->fetch();

            }else{
                return 0; //no existe
            }

        }catch(Exception $e){
            die("Error en la conexion: " . $e);
        }
    }

    function dropRegisterByID($ID){
        try{
            if($this->_registerExist($ID)){
                $this->sql="Delete from Proveedores where IDProveedor= :ID";
                $resultado=$this->base->prepare($this->sql);
                $resultado->bindValue(":ID",$ID);
                $resultado->execute();
                $this->closeConection();
                return 1;
            }else{
                return 0;
            }

        }catch(Exception $e){
            die("Error al conectar con la BD: " . $e);
        }

    }
}


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