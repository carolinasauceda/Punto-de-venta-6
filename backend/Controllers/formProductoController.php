<?php
require "../../DB/DBManager.php";

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
}


$formObj= new tablaProducto();

if(isset($_POST['nombre'])){
    $id=htmlentities(addslashes($_POST["id"]));
    $nombre=htmlentities(addslashes($_POST["nombre"]));
    $proveedor=htmlentities(addslashes($_POST["proveedor"]));
    $categoria=htmlentities(addslashes($_POST["categoria"]));
    $precio=htmlentities(addslashes($_POST["precio"]));
    $stock=htmlentities(addslashes($_POST["stock"]));
    $activo=htmlentities(addslashes($_POST["activo"]));
    if($nombre=="" ||$proveedor=="" || $categoria=="" || $precio==0.0 || ((int)$activo>1)){
        echo 0;
    }else{
        echo $formObj->saveChanges($id, $nombre, $proveedor, $categoria, $precio,$stock, $activo);
    }


}else if(isset($_POST["initData"])){
    $result= $formObj->getRegisterFilterByID($_POST["initData"]);
    if($result==0)
        return 0;
    $json=array(
        'IDProducto'=>$result['IDProducto'],
        'Nombre'=>$result['Nombre'],
        'IDProveedor'=>$result['IDProveedor'],
        'IDCategoria'=>$result['IDCategoria'],
        'PrecioUnitario'=>$result['PrecioUnitario'],
        'EnExistencia'=>$result['EnExistencia'],
        'RActivo'=>$result['RActivo']
    );
    echo json_encode($json);
}else if(isset($_POST["deleteAction"])){
    echo $formObj->dropRegisterByID($_POST['id']);
}else{
    echo 0;
}
?>