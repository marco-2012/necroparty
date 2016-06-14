<?php
session_start();
class Session{
	public static $fill = array('id', 'user', 'email', 'created_at');
	public function __construct(){
		
	}
	/**
	 * Recupera una variable de sesión
	 */
	public static function get($key){
		if(isset($_SESSION[$key]))
			return $_SESSION[$key];
		return false;
	}
	/**
	 * Agrega una variable de seión
	 */
	public static function set($key, $value){
		$_SESSION[$key] = $value;
	}
	/**
	 * Elimina una variable de sesión
	 */
	public static function delete($key){
		unset($_SESSION[$key]);
	}
	/**
	 * Destruye la sesión
	 */
	public static function destroy()
	{
		self::delete('user');
		$_SESSION = array();
		session_destroy();
	}
	/**
	 * Destruye la sesión
	 */
	public static function register($user){
		if(!is_object($user)) return false;
		$userSes = array();
		$user = (array) $user;
		foreach (self::$fill as $val) {
			isset($user[$val]) && $userSes[$val] = $user[$val];
		}

		if(!self::get('user'))
			self::set('user', $userSes);
		//self::set('user', $user);
	}
	/**
	 * Agrega nuevos datos a la variable de sesión del usuario
	 */
	public static function addData($idx, $data){
		if(empty($idx)) return;
		$userSes = Session::get('user');
		$userSes[$idx] = $data;
		Session::set('user', $userSes);
	}

	/**
	 * Verifica si la sesión existe (está activa)
	 */
	public static function active(){
		return is_array(self::get('user')) && count(self::get('user'));
	}
}
?>