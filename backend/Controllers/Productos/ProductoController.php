<?php
//Por cuestiones del desarrollo se debe importar el archivo DBManager antes de importar esta clase
class tablaProducto extends  DBManager{

    public function __construct()
    {
        parent::__construct();
    }

    protected function _registerExist($id){
        try{
            $this->sql="SELECT * FROM Productos where IDProducto= :id";
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

    function saveChanges($id, $nombre, $proveedor, $categoria, $precio,$stock, $activo){

        try{
            $typeSqlrequest=$this->_registerExist($id);
            if($typeSqlrequest==0){
                //IS an insert instruction
                $fecha = new DateTime();
                $id=$fecha->getTimestamp();
                $this->sql="Insert Into Productos (IDProducto, Nombre, IDProveedor, IDCategoria, Preciounitario, EnExistencia, RActivo) values ('$id', :nombre, :proveedor, :categoria, :precio, :stock, :activo)";
            }else{
                //IS an Update instruction
                $this->sql="Update Productos set Nombre= :nombre, IDProveedor= :proveedor, IDCategoria= :categoria, PrecioUnitario= :precio, EnExistencia= :stock,RActivo= :activo where IDProducto= :ID";
            }

            $resultado=$this->base->prepare($this->sql);
            $resultado->bindValue(":nombre",$nombre);
            $resultado->bindValue(":proveedor",$proveedor);
            $resultado->bindValue(":categoria",$categoria);
            $resultado->bindValue(":precio",$precio);
            $resultado->bindValue(":stock",$stock);
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
            $this->sql="SELECT * FROM Productos where IDProducto= :id";
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
                $this->sql="Delete from Productos where IDProducto= :ID";
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

    function getRegistersByNombre($name){
        $this->sql="Select * from Productos where Nombre like :name";
        $resultado=$this->base->prepare($this->sql);
        $resultado->bindValue(":name",'%'.$name . '%');
        $resultado->execute();
        $this->closeConection();

        $json=array();
        while($row=$resultado->fetch()){
            $json[]=array(
                'ID'=>  $row['IDProducto'],
                'Nombre'=>$row['Nombre'],
                'IDProveedor'=>$row["IDProveedor"],
                'IDCategoria'=>$row["IDCategoria"],
                'Precio'=>$row["PrecioUnitario"],
                'EnExistencia'=>$row["EnExistencia"],
                'RActivo'=>$row["RActivo"]
            );
        }
        return json_encode($json);
    }

    function getAllRegisters(){
        $this->sql="Select * from Productos";
        $resultado=$this->base->prepare($this->sql);
        $resultado->execute();
        $this->closeConection();

        $json=array();
        while($row=$resultado->fetch()){
            $json[]=array(
                'ID'=>  $row['IDProducto'],
                'Nombre'=>$row['Nombre'],
                'IDProveedor'=>$row["IDProveedor"],
                'IDCategoria'=>$row["IDCategoria"],
                'Precio'=>$row["PrecioUnitario"],
                'EnExistencia'=>$row["EnExistencia"],
                'RActivo'=>$row["RActivo"]
            );
        }
        return json_encode($json);
    }
}

?>














