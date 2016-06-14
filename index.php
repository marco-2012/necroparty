<?php

/**
 * Controlador frontal index.php
 *
 * El controlador frontal es donde se cargan todos los 
 * ficheros de la aplicación y por tanto la única pagína 
 * que visita el usuario realmente es esta, en este caso 
 * index.php.
 */
// configuración global
require_once('config/global.php');
// base para los controladores
require_once('core/ControladorBase.php');
// funciones para el controlador frontal
require_once('core/ControladorFrontal.func.php');
// clase de sesiones
require_once('libs/Session.php');
require_once('libs/Debug.php');
// cargamos controladores y acciones
if(isset($_GET['controller'])){
	$controllerObj = cargarControlador($_GET['controller']);
	lanzarAccion($controllerObj);
}else{
	$controllerObj = cargarControlador(CONTROLADOR_DEFECTO);
	lanzarAccion($controllerObj);
}

?>