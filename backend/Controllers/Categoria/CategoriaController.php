<?php
    //Por cuestiones del desarrollo se debe importar el archivo DBManager antes de importar esta clase
class tablaCategoria extends  DBManager{
    public function __construct()
    {
        parent::__construct();

    }

    protected function _registerExist($id){
        try{
            $this->sql="SELECT * FROM CategoriaProductos where IDCategoria= :id";
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

    function saveChanges($id, $nombre, $descripcion, $activo){

        try{
            $typeSqlrequest=$this->_registerExist($id);
            if($typeSqlrequest==0){
                //IS an insert instruction
                $this->sql="Insert Into CategoriaProductos (Nombre, Descripcion, RActivo) values (:nombre,:descripcion,:activo)";
            }else{
                //IS an Update instruction
                $this->sql="Update CategoriaProductos set Nombre= :nombre,Descripcion= :descripcion,RActivo= :activo where IDCategoria= :ID";
            }

            $resultado=$this->base->prepare($this->sql);
            $resultado->bindValue(":nombre",$nombre);
            $resultado->bindValue(":descripcion",$descripcion);
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
            $this->sql="SELECT * FROM CategoriaProductos where IDCategoria= :id";
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
                $this->sql="Update CategoriaProductos set RActivo=0 where IDCategoria= :ID";
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
            $this->sql="Select * from CategoriaProductos";
        }else{
            $this->sql="Select * from CategoriaProductos where RActivo=1";
        }

        $resultado=$this->base->prepare($this->sql);
        $resultado->execute();
        $this->closeConection();


        $resultado->fetch();
        while($row=$resultado->fetch()){
            $json['data'][]=array(
                'ID'=>  $row['IDCategoria'],
                'Nombre'=>$row['Nombre'],
                'Descripcion'=>$row["Descripcion"],
                'RActivo'=>$row["RActivo"]?'Si':'No'
            );
        }

        return json_encode($json);
    }
}

?>