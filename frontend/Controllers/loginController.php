<?php
require "../DB/DBManager.php";

class loginManager extends  DBManager {

    public function __construct()
    {
        parent::__construct();
    }

    public function actionLogin(){
        try{
            $this->sql="SELECT * FROM Empleados where IDEmpleado= :login AND Clave= :password";
            $resultado=$this->base->prepare($this->sql);
            $login=htmlentities(addslashes($_POST["usuario"]));
            $password=htmlentities(addslashes($_POST["password"]));
            $resultado->bindValue(":login",$login);
            $resultado->bindValue(":password",$password);
            $resultado->execute();
            $numero_registro=$resultado->rowCount();
            if($numero_registro!=0){
                header("location:index.php");
            }else{
                header("location:login.php");
            }
        }catch(Exception $e){
            die("Error: " . $e->getMessage());
        }
    }


}


?>