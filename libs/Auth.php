<?php

class Auth{

	public static $auth = false;
	private static $column1 = 'email';
	private static $column2 = 'password';
	public static $user;

	public static function authenticate($req){
		$column1 = isset($req[self::$column1]) ? $req[self::$column1] : false;
		if($column1){
			// verificando que el usuario exista
			self::$user = is_object(self::$user) ? self::$user : new Usuario();
			$userDb = self::$user->getBy('email', $column1);
			$userDb = isset($userDb[0]) ? $userDb[0] : $userDb;
			if(is_object($userDb)){
				// verificando si el password coincide
				$pass = isset($req[self::$column2]) ? $req[self::$column2] : false;
				$passDb = isset($userDb->password) ? $userDb->password : false;
				self::$auth = $pass == $passDb;
				if(self::$auth){
					Session::register($userDb);
				}
			}
		}
		// si la autenticación falló guardar el mensaje de error en 
		// la variable de sesión de 'messages'
		if(!self::$auth)
			Session::set('messages', array(
				'messages' => array(
					'email'=>array(
						array(
							'type'=>'error', 
							'text'=>'Email y/o contraseña no válida', 
							'value'=>$column1
						),
					)),
			));
		return self::$auth;
	}
}