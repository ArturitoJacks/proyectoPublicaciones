<?php

class modeloPublicaciones{

	private $db;

	public function __construct(){
		$this->db = new Conexion();
	}

	public function selPublicaciones(){
		$query = "SELECT *, publicaciones.id as id_publicacion,
							usuarios.id as id_usuario
							FROM publicaciones, usuarios
							WHERE publicaciones.id_usuario = usuarios.id
							ORDER BY publicaciones.fecha DESC;";
		return $this->db->resultquery($query);
	}

	public function publicacionesPorId($id){
		$query = $this->db->query("SELECT * FROM publicaciones WHERE id = '$id' ");
		$row = $query->fetch_object();
		return $row;

	}
	public function agregarPublicacion($data){
		$id = $data['id_usuario'];
		$titulo = $data['titulo'];
		$mensaje = $data['mensaje'];
		$hoy = date('Y-m-d H:i:s');
		$imagen = $data['imagen'];

		$ins = $this->db->query("INSERT INTO publicaciones VALUES(DEFAULT,'$id','$titulo','$mensaje','$hoy','$imagen')");
		if ($ins) {
			return true;
		}else{
			return false;
		}
	}

	public function actualizarPublicacion($data){
		$id = $data['id'];
		$titulo = $data['titulo'];
		$mensaje = $data['mensaje'];
		$imagen = $data['imagen'];

		$up = $this->db->query("UPDATE publicaciones SET titulo = '$titulo', mensaje = '$mensaje', imagen = '$imagen' WHERE id = '$id' ");
		if ($up) {
			return true;
		}else{
			return false;
		}

	}

	public function borrarPublicacion($id){
		$del = $this->db->query("DELETE FROM publicaciones WHERE id = '$id' ");
		if ($del) {
			return true;
		}else{
			return false;
		}
	}


}
?>