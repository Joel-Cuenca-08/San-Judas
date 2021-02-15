<?php
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/administrativos.controlador.php";
require_once "controladores/conductores.controlador.php";
require_once "controladores/personas.controlador.php";
require_once "controladores/vehiculos.controlador.php";
require_once "controladores/propietario.controlador.php";


require_once "modelos/usuarios.modelo.php";
require_once "modelos/administrativos.modelo.php";
require_once "modelos/conductores.modelo.php";
require_once "modelos/personas.modelo.php";
require_once "modelos/vehiculos.modelo.php";
require_once "modelos/propietario.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
