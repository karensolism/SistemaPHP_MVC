<?php

class Empleado{

    public $id;
    public $nombre;
    public $correo;

   

    
    public function __construct($id,$nombre,$correo){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->correo=$correo;

    }
    public static function consultar(){
        $listaEmpleados=[];
        $conexionBD=BD::crearInstancia();
        $sql= $conexionBD->query("SELECT * FROM empleados");

        foreach($sql->fetchAll() as $empleado){
            $listaEmpleados[]= new Empleado($empleado['Id'],$empleado['Nombre'],$empleado['Correo']);
        }
        return $listaEmpleados;
    }


    public static function crear($nombre, $correo){
        $conexionBD=BD::crearInstancia();

        $sql=$conexionBD->prepare("INSERT INTO empleados(Nombre, Correo)VALUES (?,?)");
        $sql->execute(array($nombre,$correo));

    }
    
    public static function borrar($id){
        $conexionBD=BD::crearInstancia();

        $sql=$conexionBD->prepare("DELETE FROM  empleados WHERE Id=?");
        $sql->execute(array($id));

    }
    public static function buscar($id){
        $conexionBD=BD::crearInstancia();

        $sql=$conexionBD->prepare("SELECT * FROM  empleados WHERE Id=?");
        $sql->execute(array($id));
        $empleado=$sql->fetch();
        return new Empleado($empleado['Id'],$empleado['Nombre'],$empleado['Correo']);
   

    }
    public static function editar($id,$nombre,$correo){
        $conexionBD=BD::crearInstancia();

        $sql=$conexionBD->prepare("UPDATE empleados SET Nombre=?, Correo=? WHERE Id=?");
        $sql->execute(array($id,$nombre,$correo));
       
    }
}
?>