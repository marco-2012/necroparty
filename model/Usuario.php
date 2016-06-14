<?php
class Usuario extends EntidadBase{
	private $id;
	private $email;
	private $user;
	private $password;
	private $facebook;
	private $permissions;
	private $idGroup;

	public function __construct(){
		$table = 'users';
		parent::__construct($table);
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getUser(){
		return $this->user;
	}

	public function setUser($user){
		$this->user = $user;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getFacebook(){
		return $this->facebook;
	}

	public function setFacebook($facebook){
		$this->facebook = $facebook;
	}

	public function getPermissions(){
		return $this->permissions;
	}

	public function setPermissions($permissions){
		$this->permissions = $permissions;
	}

	public function getGroup(){
		return $this->idGroup;
	}

	public function setGroup($idGroup){
		$this->idGroup = $idGroup;
	}

	public function getNoArticles($id){
		if(!$id) return;
		$query = 'SELECT count(a.id) as no '.
			'FROM users u '.
			'INNER JOIN	articles a '.
			'ON a.user_id=u.id '.
			'WHERE u.id='.$id;
		return $this->query($query);
	}

	public function save(){
		$query = 'INSERT INTO '.$this->getTable().
			'(email, user, password, facebook, permissions, created_at)'.
			'VALUES("'.$this->email.'", "'.
				$this->user.'", "'.
				$this->password.'", "'.
				$this->facebook.'", "'.
				$this->permissions.'", "'.
				//$this->idGroup.'", "'.
				date('Y-m-d H:i:s').'")';
		$save = $this->db()->query($query);
		$save = $save ? $this->db()->insert_id : $this->db()->error;
		return $save;
	}
}
?>