<?php

class ValidateForm{
	
	public static $valid = true;  
	private static $messages = array('messages' => array());
	/**
	 * Valida un formulario de acuerdo a las reglas enviadas
	 */
	public static function validate($req, $rules=array()){
		//dd($rules);
		if(!empty($rules)){
			$messages = self::$messages['messages'];
			foreach ($rules as $k => $val) {
				if(!isset($req[$k]) || empty($val)) continue;
				// Creando el index correspondiente al input si no existe
				if(!isset($messages[$k]))
					$messages[$k] = array();
				//dd(self::$messages['messages'][$k]);
				$messages[$k] = self::checkRules($req[$k], $val, $messages[$k]);
				//dd($val);
			}
			self::$messages['messages'] = $messages;
			self::messagesRegister(self::$messages);
			return self::$messages;
		}
	}
	/**
	 * Registra los mensajes en la sesión del usuario
	 */
	private static function messagesRegister($messages){
		Session::set('messages', $messages);
	}
	/**
	 * Checa cada regla que está separada por un "pipe" (|) y llama
	 * la función encargada de validar dicha regla (required, email, etc)
	 */
	private static function checkRules($val, $rules='', $messages){
		$rules = explode('|', $rules);
		foreach ($rules as $rule) {
			$rule = explode(':', $rule);
			$length = isset($rule[1]) ? $rule[1] : 0;
			$error = self::$rule[0]($val, $length);
			$error && array_push($messages, $error);
		}
		return $messages;
	}
	/**
	 * Valida un campo no esté vacio
	 */
	private static function required($val){
		if(empty($val)){
			self::$valid = false;
			return array('type'=>'error', 'text'=>'Campo requerido', 'value'=>$val);
		}
		else 
			return false; //array('type'=>'', 'text'=>'', 'value'=>$val);
	}
	/**
	 * Valida un campo con formato de correo electrónico
	 */
	private static function email($val = ''){
		$expr = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
		if(!preg_match($expr, $val)){
			self::$valid = false;
			return array('type'=>'error', 'text'=>'Correo no válido', 'value'=>$val);
		}
		else
			return false; //array('type'=>'', 'text'=>'', 'value'=>$val);
	}
	/**
	 * Valida un campo tenga un mínimo de carácteres
	 */
	private static function min($val = '', $min=0){
		if(strlen($val) < intval($min)){
			self::$valid = false;
			return array('type'=>'error', 'text'=>'Mínimo '.$min.' carácteres', 'value'=>$val);
		}
		else
			return false; //array('type'=>'', 'text'=>'', 'value'=>$val);
	}
	/**
	 * Valida un campo tenga un máximo de carácteres
	 */
	private static function max($val = '', $max=0){
		if(strlen($val) > intval($max)){
			self::$valid = false;
			return array('type'=>'error', 'text'=>'Máximo '.$max.' carácteres', 'value'=>$val);
		}
		else
			return false; // array('type'=>'', 'text'=>'', 'value'=>$val);
	}
}