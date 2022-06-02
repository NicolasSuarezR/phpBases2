<?php
    //Creo la clase Model

    class Model
    {
        var $id;
        var $usuario;
        var $clave;

        function __construct()
        {

        }
        function Logear()
        {
            //variables para la conexion
            $infoDB = "sqlsrv:Server=PAVILION-GAMING;Database=productos";

            $conn = new PDO($infoDB);

            try {
                $consulta = $conn->prepare("SELECT * FROM usuario WHERE username=:parametro1 AND pass=(SELECT dbo.fun_encriptar(:parametro2))");

                $consulta -> bindValue(":parametro1", $this->usuario);
                $consulta -> bindValue(":parametro2", $this->clave);

                $consulta->execute();
                $fila=$consulta->fetch();

                return $fila;
            }catch (PDOException $e){
                echo "Error->".$e;
            }
        }
    }

?>