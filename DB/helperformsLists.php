<?php
    include_once 'DBManager.php';
    class formsList extends DBManager {

        public function __construct()
        {
            parent::__construct();
        }

        public function getListaNivelUsuario(){
            try{
                $this->sql="select * from NivelUsuario";
                $resultado=$this->base->prepare($this->sql);
                $resultado->execute();
                $this->closeConection();

                foreach ($resultado as $campo){
                   echo '<option value="' . $campo["IDNivel"] . '">' .$campo["Descripcion"] . '</option>';
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