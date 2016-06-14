<?php
class EntidadBase{
	private $table;
	private $db;
	private $conectar;

	public function __construct($table){
		$this->table = (string)$table;
		require_once('Conectar.php');
		$this->conectar = new Conectar();
		$this->db = $this->conectar->conexion();
	}

	public function getConectar(){
		return $this->conectar;
	}

	public function db(){
		return $this->db;
	}

	public function close(){
		$this->db()->close();
	}

	public function getTable(){
		return $this->table;
	}

	public function getAll(){
		$query = $this->db->query('SELECT * FROM '.$this->table.' ORDER BY id DESC');
		// se retorna el resultado en un array de objetos
		while($row = $query->fetch_object()){
			$resultSet[] = $row;
		}
		return $resultSet;
	}

	public function getById($id){
		$query = $this->db->query('SELECT * FROM '.$this->table.' WHERE id='.$id);
		if($row = $query->fetch_object){
			$resultSet[] = $row;
		}
		return $resultSet;
	}

	public function getBy($column, $value){
		/*echo '<hr /><pre>';
		var_dump($this->db());
		echo '<pre><hr />';*/


		$resultSet = array();
		$query = $this->db->query('SELECT * FROM '.$this->table.' WHERE '.$column.'="'.$value.'"');
		if($query){
			if($query->num_rows){
				while($row = $query->fetch_object()){
					$resultSet[] = $row;
				}
				$query->close();
			}
		}else{
			echo '<pre>';
			var_dump(mysqli_error($this->db));
			echo '</pre>';
			die();
		}
		return $resultSet;
	}

	public function deleteById($id){
		$query = $this->db->query('DELETE FROM '.$this->table.' WHERE id='.$id);
		return $query;
	}

	public function deteleBy($column, $value){
		$query = $this->db->query('DELETE FROM '.$this->table.' WHERE '.$column.' = "'.$value.'"');
		return $query;
	}

	public function query($query){
		$query = $this->db()->query($query);
		if($query == true){
			if($query->num_rows > 1){
				while($row = $query->fetch_object())
					$resultSet[] = $row;
			}elseif($query->num_rows == 1){
				if($row = $query->fetch_object())
					$resultSet[] = $row;
			}else
				$resultSet = true;
		}else
			$resultSet = false;
		return $resultSet;
	}
}
?>