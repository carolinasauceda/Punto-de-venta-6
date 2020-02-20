<!--Codigo relevante a la base de datos-->
<?php
class DBManager{
    public $base;
    private $sqlStatement; //Instruccion sql

    public function __construct()
    {
        try{
            $this->base=new PDO('mysql:host=localhost; dbname=punto-venta', 'root', '');
            $this->base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->base->exec("SET CHARACTER utf8");
            echo "Everyting is ok";
        }catch(Exception $e){
            die("Error en conexion" . $e->getMessage());

        }

    }

    public function getClients(){
        try{
            $this->sqlStatement="select * from clientes";
            $resultado=$this->base->prepare($this->sqlStatement);
            $resultado=$this->base->execute();
            while($registro=$resultado->fetch()){

            }

        }catch(Exception $e){
            die("Error en conexion" . $e->getMessage());
        }
    }

    public function closeConection(){
        $this->base=null;
    }




}



?>