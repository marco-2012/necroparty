<?php
class ControladorBase{
	public function __construct(){
		require_once('EntidadBase.php');
		require_once('ModeloBase.php');

		// incluir todos los modelos
		foreach (glob('model/*.php') as $file) {
			require_once $file;
		}
	}

	// pligins y funcionalidades
	/*
	* Este método lo que hace es recibir los datos del controlador en forma de array
	* los recorre y crea una variable dinámica con el indice asociativo y le da el 
	* valor que contiene dicha posición del array, luego carga los helpers para las
	* vistas y carga la vista que le llega como parámetro. En resumen un método para
	* renderizar vistas.
	*/
	public function view($vista, $datos=array()){
		// el array que se mandó a la vista se recorre 
		// para crear  por cada índice una variable
		foreach($datos as $id_assoc => $valor)
			${$id_assoc} = $valor;

		// Si hay una variable de sesión de 'messages' 
		// (donde se almacenan mensajes del sistema)
		// se convierten en variables globales
		if(is_array(Session::get('messages'))){
			foreach(Session::get('messages') as $id_assoc => $valor)
				${$id_assoc} = $valor;
			Session::delete('messages');
		}
		// Si hay una variable de sesión enviada al 
		// "redirect" se convierten en variables locales
		if(is_array(Session::get('viewValues'))){
			foreach(Session::get('viewValues') as $id_assoc => $valor)
				${$id_assoc} = $valor;
			Session::delete('viewValues');
		}

		require_once 'core/AyudaVistas.php';
		$helper = new AyudaVistas();
		require_once 'view/'.$vista.'View.php';
	}

	public function redirect($controlador = CONTROLADOR_DEFECTO, $accion=ACCION_DEFECTO, $values = array()){
		// se verifica si se estámn pasando variables por el array
		if(is_array($values) && !empty($values)){
			$viewValues = array();
			// cada índice del array se guarda en una variable de sesión
			// para que el método que renderiza la vista la combierta
			// en una variable local
			// De igual forma se guarda en la sesion el nombre
			// de las variables de sesión creadas para despues ser borradas
			foreach ($values as $key => $value){
				$viewValues[$key] = $value;
			}
			Session::set('viewValues', $viewValues);
		}
		
		header('Location:index.php?controller='.$controlador.'&action='.$accion);
	}

}
?>