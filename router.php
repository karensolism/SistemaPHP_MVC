<?php

/*son los que se obtienen por la url: http://localhost:8080/SistemaPHP/?controlador=paginas&accion=inicio*/
//echo $controlador;
//echo $accion;

//el router agarra el controlador:
include_once("controladores/controlador_".$controlador.".php");

$objControlador="Controlador".ucfirst($controlador);

//instancía el controlador_paginas

$controlador = new $objControlador();
$controlador->$accion();

?>