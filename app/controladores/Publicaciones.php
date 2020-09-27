<?php
class Publicaciones extends Controlador{

	public function __construct(){
		if (!isset($_SESSION['id_usuario'])) {
			redirect('usuarios/login');
		}

		$this->modeloPublicacion = $this->modelo('modeloPublicaciones');
	}

	public function index(){
		$posts = $this->modeloPublicacion->selPublicaciones();
		$data = [
			'post' => $posts
		];
		$this->vista('publicaciones/index', $data);
	}

	public function vistaNuevaPublicacion(){
		$this->vista('publicaciones/nueva_publicacion');
	}

	public function nuevaPublicacion(){
		$_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

		$archivo = $_FILES['imagen']['tmp_name'];
		$nombrearchivo = $_FILES['imagen']['name'];
		$info = pathinfo($nombrearchivo);
		$extension = $info['extension'];
		$nombre_imagen = $_SESSION['id_usuario'].'-'.rand(00000,99999);
		move_uploaded_file($archivo, RUTAIMG . '/public/imagenes/'.$nombre_imagen.'.'.$extension);
		$ruta = $nombre_imagen.'.'.$extension;

		$data = [
			'id_usuario' => $_SESSION['id_usuario'],
			'titulo' => trim($_POST['titulo']),
			'mensaje' => trim($_POST['mensaje']),
			'imagen' => trim($ruta)
		];

		if ($this->modeloPublicacion->agregarPublicacion($data)) {
			//redirect('publicaciones');
			redirect('alertas/agrego_publicacion');
		}else{
			die('No guardo la publicacion');
		}
	}

	public function vistaEditarPublicacion($id){
		$post = $this->modeloPublicacion->publicacionesPorId($id);
		if ($post->id_usuario != $_SESSION['id_usuario']) {
			redirect('publicaciones');
		}

		$data = [
			'id' => $id,
			'titulo' => $post->titulo,
			'mensaje' => $post->mensaje,
			'imagen' => $post->imagen
		];

		$this->vista('publicaciones/editar_publicacion', $data);
	}

	public function editarPublicacion($id){
		$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		$archivo = $_FILES['imagen']['tmp_name'];
		if ($archivo == '') {
			$ruta = $_POST['ruta'];
		}else{
			$imagen_eliminar = $_POST['ruta'];
			$borrar_img = RUTAIMG . '/public/imagenes/'.$imagen_eliminar;
			unlink($borrar_img);
			$nombrearchivo=$_FILES['imagen']['name'];
			$info = pathinfo($nombrearchivo);
			$extension = $info['extension'];
			$nombre_imagen = $_SESSION['id_usuario'].'-'.rand(00000,99999);
			move_uploaded_file($archivo, RUTAIMG.'/public/imagenes/'.$nombre_imagen.'.'.$extension);
			$ruta = $nombre_imagen.'.'.$extension;
		}

		$data =[
			'id' => $id,
			'id_usuario' => $_SESSION['id_usuario'],
			'titulo' => trim($_POST['titulo']),
			'mensaje' => trim($_POST['mensaje']),
			'imagen' => $ruta
		];

		if ($this->modeloPublicacion->actualizarPublicacion($data)) {
			//redirect('publicaciones');
			redirect('alertas/edito_publicacion');
		}else{
			die('No se realizo actualiczacion de publicacion');
		}
	}

	public function eliminarPublicacion($id,$imagen){
		if ($this->modeloPublicacion->borrarPublicacion($id)) {
			$borrar_img = RUTAIMG . '/public/imagenes/'.$imagen;
			unlink($borrar_img);
			//redirect('publicaciones');
			redirect('alertas/elimino_publicacion');
		}else{
			die('No se elimino la publicacion');
		}
	}

}
?>