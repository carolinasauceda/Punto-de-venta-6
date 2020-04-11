<?php
//Por cuestiones del desarrollo se debe importar el archivo DBManager antes de importar esta clase
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
                $this->sql="Update Clientes set RActivo=0 where RFC= :ID";
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


    function getAllRegisters(){
        $this->sql="Select * from Clientes";
        $resultado=$this->base->prepare($this->sql);
        $resultado->execute();
        $this->closeConection();


        $resultado->fetch();
        while($row=$resultado->fetch()){
            $json['data'][]=array(
                'ID'=>  $row['RFC'],
                'Nombre'=>$row['Nombre'],
                'Apellido_P'=>$row["Apellido_P"],
                'Apellido_M'=>$row["Apellido_M"],
                'Correo'=>$row["Correo"],
                'Telefono'=>$row["Telefono"],
                'RActivo'=>$row["RActivo"]?'Si':'No'
            );
        }

        return json_encode($json);
    }
}
?>