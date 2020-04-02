<?php

    class sessionController{

        private $serverSettings;

        public function __construct($path2root)
        {
            //Path2Root from the file that is instanciating this class
            require  $path2root.'config/serverSettings.php';
            session_start();
            $this->serverSettings =new serverSettings();
            if(!isset($_SESSION["usuario"])){
                header("location:" . $this->serverSettings->getServerDomain(). "/backend/views/login.php" );
            }
        }

        public function isAutorizeFor($page){
            $permisosNivel=(int) $_SESSION['AutorizacionNivel'];
            switch($page){
                case 'formClientes':
                case 'formEmpleados':
                case 'formNivelUsuario':
                    if($permisosNivel<100) $this->_notAutorizeRedirect();
                    break;

                case 'formProductos':
                    if($permisosNivel<=20) return 0;
                    break;

                case 'formProveedor':
                case 'formCategoria':
                if($permisosNivel<=20) $this->_notAutorizeRedirect();
                    break;
            }

            //Si llegue hasta aqui esta Autorizado con permisos de escritura/lectura
            return 1;
        }

        public function _redirec(){
            header("Location: ");
            die();
        }

        public function _notAutorizeRedirect(){
            header("location:" . $this->serverSettings->getServerDomain(). "/backend/views/index.php" );
        }




    }
?>