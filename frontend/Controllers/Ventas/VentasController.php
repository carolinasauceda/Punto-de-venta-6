<?php

//Por cuestiones del desarrollo se debe importar el archivo DBManager antes de importar esta clase
class VentasManager extends DBManager
{
    public function __construct()
    {
        parent::__construct();

    }

    /*protected function _registerExist($id)
    {
        try {
            $this->sql = "SELECT * FROM CategoriaProductos where IDCategoria= :id";
            $resultado = $this->base->prepare($this->sql);
            $resultado->bindValue(":id", $id);
            $resultado->execute();
            $numero_registro = $resultado->rowCount();
            if ($numero_registro != 0) {
                return 1;
            } else {
                return 0; //no existe
            }
        } catch (Exception $e) {
            die("Error" . $e);
        }
    }*/

    function getRegisterFilterByID($ID)
    {
        try {
            $this->sql = "SELECT * FROM Productos where IDProducto= :id and RActivo=1";
            $resultado = $this->base->prepare($this->sql);
            $resultado->bindValue(":id", $ID);
            $resultado->execute();
            $numero_registro = $resultado->rowCount();
            $this->closeConection();
            if ($numero_registro != 0) {

                return $resultado->fetch();

            } else {
                return 0; //no existe
            }

        } catch (Exception $e) {
            die("Error en la conexion: " . $e);
        }
    }


    function UpdateStockByID($ID, $stock)
    {
        try {
            $this->sql = "Update Productos set EnExistencia= :stock where IDProducto= :ID";
            $resultado = $this->base->prepare($this->sql);
            $resultado->bindValue(":ID", $ID);
            $resultado->bindValue(":stock", $stock);
            $resultado->execute();
            $this->closeConection();
            return 1;

        } catch (Exception $e) {
            die("Error al conectar con la BD: " . $e);
        }

    }

    function getClientInfo($clientid){

        $this->sql = "Select * from Clientes where RFC= :ID";
        $resultado = $this->base->prepare($this->sql);
        $resultado->bindValue(":ID", $clientid);
        $resultado->execute();
        $numero_registro = $resultado->rowCount();
        $this->closeConection();
        if ($numero_registro != 0) {
            $resultado=$resultado->fetch();
            $json = array(
                'ID' => $resultado['RFC'],
                'Nombre' => $resultado['Nombre'] .' '. $resultado['Apellido_P'] . ' ' . $resultado['Apellido_M'],
            );

            return json_encode($json);
        } else {
            return 0; //no existe
        }

    }

    function registrarVenta($venta, $productos){
        try {

            $fecha = new DateTime();
            $id=$fecha->getTimestamp();
            $id= $id . strval(rand ( 100 , 999 ));

            //IS an insert instruction
            $this->sql = "Insert Into Ventas (IDVenta, Cliente, IDEmpleado, Fecha, Total, Efectivo, Cambio) values (:idventa, :idcliente, :idempleado, :fecha, :total, :efectivo, :cambio)";
            $resultado = $this->base->prepare($this->sql);
            $resultado->bindValue(":idventa", $id);
            $resultado->bindValue(":idcliente", $venta['cliente']);
            $resultado->bindValue(":idempleado", $venta['empleado']);
            $resultado->bindValue(":fecha", date_format($fecha, 'Y-m-d'));
            $resultado->bindValue(":total", $venta['total']);
            $resultado->bindValue(":efectivo", $venta['efectivo']);
            $resultado->bindValue(":cambio", $venta['cambio']);
            $resultado->execute();

            $this->sql = "Insert Into DetallesVenta (IDVenta, IDProducto, PrecioUnitario, Cantidad) values (:idventa, :idproducto, :preciounitario, :cantidad)";
            $resultado = $this->base->prepare($this->sql);
            foreach ($productos as $idProducto => $info){
                $resultado->bindValue(":idventa", $id);
                $resultado->bindValue(":idproducto", $idProducto);
                $resultado->bindValue(":preciounitario", $info['Precio']);
                $resultado->bindValue(":cantidad", $info['Cantidad']);
                $resultado->execute();
            }
            $this->closeConection();

            echo 1;

        } catch (Exception $e) {
            die("Error" . $e);
        }
    }

}


?>