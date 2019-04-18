<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ("Secure_area.php");   
class Administration extends Secure_area {

	public function index()
	{
		$this->load->view('partial/header');
		$this->load->view('administracion');
		$this->load->view('partial/footer');
	}
	public function registrar_directores(){
		$this->load->view('registrar_directores');
	}
	public function listar_directores(){
		
	}

}

/* End of file Administracion.php */
/* Location: ./application/controllers/Administracion.php */

 ?>