<?php
//Por cuestiones del desarrollo se debe importar el archivo DBManager antes de importar esta clase
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
                $this->sql="Update Proveedores  set RActivo=0 where IDProveedor= :ID";
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



    function getAllRegisters($adminOrsuper){
        if($adminOrsuper){
            $this->sql="Select * from Proveedores";
        }else{
            $this->sql="Select * from Proveedores where RActivo=1";
        }

        $resultado=$this->base->prepare($this->sql);
        $resultado->execute();
        $this->closeConection();


        $resultado->fetch();
        while($row=$resultado->fetch()){
            $json['data'][]=array(
                'ID'=>  $row['IDProveedor'],
                'Compania'=>$row['Compania'],
                'Contacto'=>$row["Contacto"],
                'Correo'=>$row["Correo"],
                'Telefono'=>$row["Telefono"],
                'RActivo'=>$row["RActivo"]?'Si':'No'
            );
        }

        return json_encode($json);
    }

}

?>