<?php

class ALertas extends Controlador{
	public function index($alerta){
		$this->vista('alertas/'.$alerta);
	}
}
?>