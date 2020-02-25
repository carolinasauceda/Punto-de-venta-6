<?php
require "../../DB/DBManager.php";

class loginManager extends  DBManager {

    public function __construct()
    {
        parent::__construct();
    }

    public function actionLogin($login,$password ){
        try{
            $this->sql="SELECT * FROM Empleados where IDEmpleado= :login AND Clave= :password";
            $resultado=$this->base->prepare($this->sql);
            $resultado->bindValue(":login",$login);
            $resultado->bindValue(":password",$password);
            $resultado->execute();
            $numero_registro=$resultado->rowCount();
            if($numero_registro!=0){
                //header("location:../index.php");
                return 1;
            }else{
                //header("location:../login.php");
                return 0;
            }
        }catch(Exception $e){
            die("Error: " . $e->getMessage());
        }
    }


}

$loginObj= new loginManager();

if(isset($_POST['usernamefield'])){
    $login=htmlentities(addslashes($_POST["usernamefield"]));
    $password=htmlentities(addslashes($_POST["passwordfield"]));
    echo $loginObj->actionLogin($login, $password);
}

?>

