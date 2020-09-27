<?php  
class modeloUsuarios{
	private $db;

	public function __construct(){
		$this->db = new Conexion();
	}

	public function altaDeUsuario($data){
		$nombre= $data['nombre'];
		$correo = $data['correo'];
		$pass = $data['pass'];

		$ins = $this->db->query("INSERT INTO usuarios VALUES (DEFAULT, '$nombre','$correo','$pass')");
		if ($ins) {
			return true;
		}else{
			false;
		}
	}

	public function login($correo,$pass){
		$query = $this->db->query("SELECT * FROM usuarios WHERE correo = '$correo'");
		$resultado = $query->fetch_object();
		$hashed_pass = $resultado->pass;
		if (password_verify($pass, $hashed_pass)) {
			return $resultado;
		}else{
			return false;
		}
	}
}
?>