<?php
// error_reporting(0);
require_once "controladores/inicio.controlador.php";
require_once "controladores/personas.controlador.php";

require_once "modelos/personas.modelo.php";

$inicio = new ControladorInicio();

$inicio->inicio();

?>