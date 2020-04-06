<?php
    include_once 'DBManager.php';
    class DataTransform extends DBManager {

        public function __construct()
        {
            parent::__construct();
        }

        public function getProveedorByID($id){
            try{
                $this->sql="select Compania from Proveedores where IDProveedor= :id";
                $resultado=$this->base->prepare($this->sql);
                $resultado->bindValue(":id",$id);
                $resultado->execute();
                $this->closeConection();
                if($resultado->rowCount()!=0){

                    return $resultado->fetch();

                }else{
                    return 0; //no existe
                }

            }catch(Exception $e){
                die("Error en conexion" . $e->getMessage());
            }
        }

        public function getListaProveedores(){
            try{
                $this->sql="select * from Proveedores";
                $resultado=$this->base->prepare($this->sql);
                $resultado->execute();
                $this->closeConection();

                foreach ($resultado as $campo){
                    echo '<option value="' . $campo["IDProveedor"] . '">' .$campo["Compania"] . '</option>';
                }

            }catch(Exception $e){
                die("Error en conexion" . $e->getMessage());
            }
        }

        public function getListaCategoriaProducto(){
            try{
                $this->sql="select * from CategoriaProductos";
                $resultado=$this->base->prepare($this->sql);
                $resultado->execute();
                $this->closeConection();

                foreach ($resultado as $campo){
                    echo '<option value="' . $campo["IDCategoria"] . '">' .$campo["Nombre"] . '</option>';
                }

            }catch(Exception $e){
                die("Error en conexion" . $e->getMessage());
            }
        }

    }

?>