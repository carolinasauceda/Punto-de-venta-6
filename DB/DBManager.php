<!--Codigo relevante a la base de datos-->
<?php
class DBManager{
    public $base;
    protected $sql; //Instruccion sql
    const DBName="puntoventa";
    const Host="localhost";
    const DBUserName="root";
    const DBPassword="";

    public function __construct()
    {
        try{
            $this->base=new PDO('mysql:host=' . self::Host. '; dbname='. self::DBName, self::DBUserName, self::DBPassword);
            $this->base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           // $this->base->exec("SET CHARACTER utf8"); //Para setear los caracteres a utf8, yo la comento por problemas en linux
            echo "<script>console.log('Conexión establecida con la bd')</script>";
        }catch(Exception $e){
            die("Error en conexion" . $e->getMessage());

        }

    }

    public function closeConection(){
        $this->base=null;
    }


    protected function getAllFrom($tableName){
        try{
            $this->sql="select * from $tableName";
            $resultado=$this->base->prepare($this->sql);
            $resultado->execute();
            $count=$resultado->rowCount();
            echo $count;
            $this->closeConection();
            return $resultado;

        }catch(Exception $e) {
            die("Error en conexion" . $e->getMessage());
        }
    }




}


class tableClientsManager extends DBManager{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllClients(){
       return $this->getAllFrom("Clientes");
    }
}

Class tableUserManager extends  DBManager{
    public function  __construct()
    {
        parent::__construct();
    }

    public function getAllUsers(){
        return $this->getAllFrom('Usuarios');
    }
}

class  tableNivelUsuario extends DBManager{
    public function __construct()
    {
        parent::__construct();
    }

    public function NivelUsuarioToText($IDNivel){
        try{
            $this->sql="select Descripcion from NivelUsuario where IDNivel=$IDNivel";
            $resultado=$this->base->prepare($this->sql);
            $resultado->execute(array($IDNivel));
            $resultado=$resultado->fetch();
            return $resultado["Descripcion"];

        }catch(Exception $e) {
            die("Error en conexion" . $e->getMessage());
        }
    }



}

?>