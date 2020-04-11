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

                    $res=$resultado->fetch();
                    return $res['Compania'];

                }else{
                    return 0; //no existe
                }

            }catch(Exception $e){
                die("Error en conexion" . $e->getMessage());
            }
        }

        public function getCategoriaByID($id){
            try{
                $this->sql="SELECT * FROM CategoriaProductos where IDCategoria= :id";
                $resultado=$this->base->prepare($this->sql);
                $resultado->bindValue(":id",$id);
                $resultado->execute();
                $numero_registro=$resultado->rowCount();
                if($numero_registro!=0){
                    $res=$resultado->fetch();
                    return $res['Nombre'];
                }else{
                    return 0; //no existe
                }
            }catch (Exception $e){
                die("Error" . $e);
            }
        }

        public function getNivelUsuarioByID($id){
            try{
                $this->sql="SELECT * FROM NivelUsuario where IDNivel= :id";
                $resultado=$this->base->prepare($this->sql);
                $resultado->bindValue(":id",$id);
                $resultado->execute();
                $numero_registro=$resultado->rowCount();
                if($numero_registro!=0){
                    $res=$resultado->fetch();
                    return $res['Descripcion'];
                }else{
                    return 0; //no existe
                }
            }catch (Exception $e){
                die("Error" . $e);
            }
        }



    }

?>