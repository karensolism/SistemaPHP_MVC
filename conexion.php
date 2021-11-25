<?php

class BD{

    private static $instancia=NULL;

    public static function crearInstancia(){

        if(!isset( self::$instancia)){
            $opcionesPDO[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;

          self::$instancia= new PDO('mysql:host=localhost;dbname=empleados_php_mvc','root','',$opcionesPDO);
      // echo "Conexion exitosa";
        }
        return self::$instancia;

    }
}

?>