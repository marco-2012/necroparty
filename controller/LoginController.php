<?php
//use libs\ValidateForm;
class LoginController extends ControladorBase{
	public $session;

	public function __construct(){
		parent::__construct();
		$this->session = new Session();
	}

	public function index(){
		/*
		// creamos el objeto usuario
		$usuario = new Usuario();

		// se obtienen todos los usuarios
		$allUsers = $usuario->getAll();

		// se carga la vista index y se le pasan los valores
		$this->view('index', array(
			'allUsers' => $allUsers,
			'Hola' => 'Soy max pawel'
		));*/
		Session::active() ? 
			$this->redirect('Usuarios', 'index') :
			$this->view('login/login');
	}
	/**
	 * Inicia la sesión del usuario
	 */
	public function login(){
		// Si no hay una sesión activa
		if(!Session::active()){
			// se valida el formulario
			require_once('libs/ValidateForm.php');
			$messages = ValidateForm::validate($_POST, array(
				'email' => 'required|email|min:2|max:40',
				'password' => 'required',
			));
			// se comprueba si pasó la validación del formulario
			if(ValidateForm::$valid){
				// comprovando las credenciales (email/password)
				require_once('libs/Auth.php');
				if(Auth::authenticate($_POST)){
					$this->addData();
					$this->redirect('Summary', 'index');
				}else{
					$this->redirect('Summary', 'index');
				}
			}else
				$this->redirect('Summary', 'index');
		}else
			$this->redirect('Summary', 'index');
	}
	/**
	 * Cierra la sesión del usuario
	 */
	public function logout(){
		Session::active() && Session::destroy();
		$this->redirect('Summary', 'index');
	}

	/**
	 * Agrega datos extra a la sesión del usuario
	 *
	 */
	private function addData(){
		$this->addNoArticles();
	}

	/**
	 * Agrega el número de artículos del usuario
	 */
	private function addNoArticles(){
		$id = intval(Session::get('user')['id']);
		$no = Auth::$user->getNoArticles($id);
		$no = isset($no[0]) ? $no[0] : $no;
		$no = $no->no;
		Session::addData('noArticles', $no);
	}
}
?>