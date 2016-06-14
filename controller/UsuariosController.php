<?php
class UsuariosController extends ControladorBase{
	public $user;

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		// creamos el objeto usuario
		$usuario = new Usuario();

		// se obtienen todos los usuarios
		$allUsers = $usuario->getAll();

		// se carga la vista index y se le pasan los valores
		$this->view('index', array(
			'allUsers' => $allUsers,
			'Hola' => 'Soy max pawel'
		));
	}
	/**
	 * Muestra el formulario de registro
	 */
	public function create(){
		Session::active() ? 
			$this->redirect('Usuarios', 'profile') : 
			$this->view('user/create'); 
	}
	/**
	 * Almacena el usuario en la base de datos
	 */
	public function store(){
		if(Session::active()){
			$this->redirect('Usuarios', 'profile');
		}else{
			if(isset($_POST['email'])){
				$fieldsRes = $this->confirmFormCreate($_POST);
				foreach ($fieldsRes as $key => $value) {
					if(!$value['success']){
						Session::set('fieldsRes', $fieldsRes);
						return $this->redirect('Usuarios', 'create');
					}
				}
				$this->user = is_object($this->user) ? $this->user : new Usuario();
				$user = $this->user;
				$user->setEmail($_POST['email']);
				$user->setUser($_POST['user']);
				$user->setPassword($_POST['password']);
				$user->setFacebook($_POST['facebook']);
				$save = $user->save();
				is_numeric($save) ? 
					$this->redirect('Summary', 'index') : 
					$this->redirect('Usuarios', 'create');
			}else{
				$this->redirect('Usuarios', 'create');
			}
		}
	}
	/**
	 * Verifica que los campos obligatorios estén en el post 
	 * enviado del formulario del registro de usuario
	 *
	 */
	public function confirmFormCreate($post){
		$array = array('value'=>null, 'msn'=>null, 'success'=>false, 'class'=>null);
		$fieldsRes = array(
			'email'=>$array, 
			'user'=>$array, 
			'password'=>$array, 
			'password2'=>$array
		);
		// comprobando que los campos obligatorios estén llenos
		foreach ($fieldsRes as $key => $value) {
			//if(isset($post[$key])){
				$val = (isset($post[$key]) && !empty($post[$key]));
				$fieldsRes[$key]['value'] = $val ? $post[$key] : null;
				$fieldsRes[$key]['success'] = $val;
				$fieldsRes[$key]['msn'] = $val ? null : 'Este campo es obligatorio.';
				$fieldsRes[$key]['class'] = $val ? null : 'has-error';
			//}
		}
		// comprobando que la contraseña verificación sea correcta
		if($fieldsRes['password']['value'] && $fieldsRes['password']['value']){
			if($fieldsRes['password']['value'] != $fieldsRes['password2']['value']){
				$fieldsRes['password2']['msn'] = 
					'La contraseña no coincide con la contraseña de verificación';
				$fieldsRes['password']['value'] = false;
				$fieldsRes['password2']['value'] = null;
				$fieldsRes['password2']['success'] = false;
				$fieldsRes['password2']['class'] = 'has-error';
			}else{
				$fieldsRes['password']['success'] = true;
				$fieldsRes['password2']['success'] = true;
			}
		}

		// comprobando el formato del correo electrónico
		$expr = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
		$email = $fieldsRes['email']['value'];
		if(!preg_match($expr, $email)){
			$fieldsRes['email']['success'] = false;
			$fieldsRes['email']['class'] = 'has-error';
			$fieldsRes['email']['msn'] = 'La dirección de correo no es válida';
		}

		// comprobando que el correo electrónico sea único
		$this->user = is_object($this->user) ? $this->user : new Usuario();
		$user = $this->user;
		if($fieldsRes['email']['success']){
			$userRes = $user->getBy('email', $email);
			if(count($userRes)){
				$fieldsRes['email']['success'] = false;
				$fieldsRes['email']['class'] = 'has-error';
				$fieldsRes['email']['msn'] = 'La dirección de correo electrónico ya está dada de alta';
			}
		}
		// comprobando que el user sea único
		if($fieldsRes['user']['success']){
			$userRes = $user->getBy('user', $fieldsRes['user']['value']);
			if(count($userRes)){
				$fieldsRes['user']['success'] = false;
				$fieldsRes['user']['class'] = 'has-error';
				$fieldsRes['user']['msn'] = 'El usuario ya está dado de alta';
			}
		}
		return $fieldsRes;
	}

	public function crear(){
		if(isset($_POST['nombre'])){
			// creamos al usuario
			$usuario = new Usuario();
			$usuario->setNombre($_POST['nombre']);
			$usuario->setAp($_POST['ap']);
			$usuario->setAm($_POST['am']);
			$usuario->setEmail($_POST['email']);
			$usuario->setPassword($_POST['password']);
			$usuario->setNivel($_POST['nivel']);
			$save = $usuario->save();
		}
		$this->redirect('Usuarios', 'index');
	}

	public function borrar(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$usuario = new Usuario();
			$usuario->deleteById($id);
		}
		$this->redirect();
	}

	public function hola(){
		$usuario = new Usuario();
		$usu = $usuario->getUnUsuario();
		var_dump($usu);
	}



	/* ********************** */
	/* ***** PENDIENTES ***** */
	/* ********************** */

	// ENVIAR CORREO ELECTRÓNICO DE CONFIRMACIÓN
}
?>