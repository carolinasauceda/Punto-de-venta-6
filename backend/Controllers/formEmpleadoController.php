<?php
require "../../DB/DBManager.php";

class tablaEmpleados extends  DBManager{

    public function __construct()
    {
        parent::__construct();
    }

    protected function _registerExist($id){
        try{
            $this->sql="SELECT * FROM Empleados where IDEmpleado= :id";
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

    function saveChanges($id, $rfc, $nombre, $apellido_P, $apellido_M, $fnac, $fcontratacion, $direccion, $telefono, $tipoUsuario, $clave, $activo){

        try{
            $typeSqlrequest=$this->_registerExist($id);
            if($typeSqlrequest==0){
                //IS an insert instruction
                $id=strtoupper(substr($apellido_M, 0, 2) . substr($apellido_P,0, 1) .
                        substr( $nombre, 0, 1)). str_replace("-","",$fcontratacion) .
                    strval(rand ( 10 , 99 )) ;
                $this->sql="Insert Into Empleados (IDEmpleado, 
                                                    RFC,
                                                    Nombre, 
                                                    Apellido_P, 
                                                    Apellido_M, 
                                                    Fecha_Nacimiento, 
                                                    Fecha_Contratacion, 
                                                    Direccion, 
                                                    Telefono, 
                                                    NivelUsuario, 
                                                    Clave, 
                                                    RActivo) 
                                                    values ('$id',
                                                            :rfc,
                                                            :nombre,
                                                            :apellido_P, 
                                                            :apellido_M, 
                                                            :fnac, 
                                                            :fcontratacion, 
                                                            :direccion, 
                                                            :telefono, 
                                                            :nivelusuario,
                                                            :clave,
                                                            :activo)";
            }else{
                //IS an Update instruction
                $this->sql="Update Empleados set RFC= :rfc, Nombre= :nombre, 
                                                            Apellido_P= :apellido_P, 
                                                            Apellido_M= :apellido_M, 
                                                            Fecha_Nacimiento=:fnac, 
                                                            Fecha_Contratacion=:fcontratacion,  
                                                            Direccion=:direccion,
                                                            Telefono= :telefono, 
                                                            NivelUsuario=:nivelusuario,
                                                            Clave=:clave,
                                                            RActivo= :activo 
                                                            where IDEmpleado= :ID";
            }

            $resultado=$this->base->prepare($this->sql);
            $resultado->bindValue(":rfc",$rfc);
            $resultado->bindValue(":nombre",$nombre);
            $resultado->bindValue(":apellido_P",$apellido_P);
            $resultado->bindValue(":apellido_M",$apellido_M);
            $resultado->bindValue(":fnac",$fnac);
            $resultado->bindValue(":fcontratacion",$fcontratacion);
            $resultado->bindValue(":direccion",$direccion);
            $resultado->bindValue(":telefono",$telefono);
            $resultado->bindValue(":nivelusuario",$tipoUsuario);
            $resultado->bindValue(":clave",$clave);
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
            $this->sql="SELECT * FROM Empleados where IDEmpleado= :id";
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
                $this->sql="Delete from Empleados where IDEmpleado= :ID";
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