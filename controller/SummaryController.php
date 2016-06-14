<?php
class SummaryController extends ControladorBase{

	public function __construct(){
		parent::__construct();
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
		$this->view('summary');
	}
/*
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
*/
}
?>