<?php
require "../../DB/DBManager.php";

class tablaNivelUsuario extends  DBManager{

    public function __construct()
    {
        parent::__construct();
    }

    protected function _registerExist($id){
        try{
            $this->sql="SELECT * FROM NivelUsuario where IDNivel= :id";
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

        //AILC200317
    }

    function saveChanges($id, $descripcion, $nivel){

        try{
            $typeSqlrequest=$this->_registerExist($id);
            if($typeSqlrequest==0){
                //IS an insert instruction
                $this->sql="Insert Into NivelUsuario(
                                                        Descripcion,
                                                        Nivel
                                                    ) 
                                                    values (
                                                            :descripcion,
                                                            :nivel
                                                           )";
            }else{
                //IS an Update instruction
                $this->sql="Update NivelUsuario set Descripcion= :descripcion, 
                                                            Nivel= :nivel 
                                                            where IDNivel= :ID";
            }

            $resultado=$this->base->prepare($this->sql);
            $resultado->bindValue(":descripcion",$descripcion);
            $resultado->bindValue(":nivel",$nivel);
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
            $this->sql="SELECT * FROM NivelUsuario where IDNivel= :id";
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
                $this->sql="Delete from NivelUsuario where IDNivel= :ID";
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