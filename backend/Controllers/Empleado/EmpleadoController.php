<?php
//Por cuestiones del desarrollo se debe importar el archivo DBManager antes de importar esta clase
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
                $this->sql="Update Empleados set RActivo=0 where IDEmpleado= :ID";
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
        $this->sql="Select * from Empleados";
        $resultado=$this->base->prepare($this->sql);
        $resultado->execute();
        $this->closeConection();


        //$resultado->fetch();
        while($row=$resultado->fetch()){
            $json['data'][]=array(
                'ID'=>  $row['IDEmpleado'],
                'RFC'=>$row['RFC'],
                'Nombre'=>$row["Nombre"],
                'Apellido_P'=>$row["Apellido_P"],
                'Apellido_M'=>$row["Apellido_M"],
                'Fecha_Nacimiento'=>$row["Fecha_Nacimiento"],
                'Fecha_Contratacion'=>$row["Fecha_Contratacion"],
                'Direccion'=>$row["Direccion"],
                'NivelUsuario'=>$row["NivelUsuario"],
                'Telefono'=>$row["Telefono"],
                'RActivo'=>$row["RActivo"]?'Si':'No'
            );
        }

        return json_encode($json);
    }

}
?>