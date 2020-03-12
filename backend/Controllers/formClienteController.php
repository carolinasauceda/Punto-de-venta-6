<?php
require "../../DB/DBManager.php";

class tablaCliente extends  DBManager{

    public function __construct()
    {
        parent::__construct();
    }

    protected function _registerExist($id){
        try{
            $this->sql="SELECT * FROM Clientes where RFC= :id";
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

    function saveChanges($id, $rfc, $nombre, $apellido_P, $apellido_M, $correo, $telefono, $activo){

        try{
            $typeSqlrequest=$this->_registerExist($id);
            if($typeSqlrequest==0){
                //IS an insert instruction
                $this->sql="Insert Into Clientes (RFC, Nombre, Apellido_P, Apellido_M, Correo, Telefono, RActivo) values (:rfc,:nombre,:apellido_P, :apellido_M, :correo, :telefono,:activo)";
            }else{
                //IS an Update instruction
                $this->sql="Update Clientes set RFC= :rfc, Nombre= :nombre, Apellido_P= :apellido_P, Apellido_M= :apellido_M, Correo= :correo, Telefono= :telefono, RActivo= :activo where RFC= :ID";
            }

            $resultado=$this->base->prepare($this->sql);
            $resultado->bindValue(":rfc",$rfc);
            $resultado->bindValue(":nombre",$nombre);
            $resultado->bindValue(":apellido_P",$apellido_P);
            $resultado->bindValue(":apellido_M",$apellido_M);
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
            $this->sql="SELECT * FROM Clientes where RFC= :id";
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
                $this->sql="Delete from Clientes where RFC= :ID";
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