<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ("Secure_area.php");  
class Inicial extends Secure_area {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Alumnos_model');

	}

	// List all your items
	public function index( $offset = 0 )
	{
		$this->load->view('partial/header');
		$this->load->view('inicial');
		$this->load->view('partial/footer');
	}
	
	public function inicial_estimulacion($value='')
	{

		$data = array();
		$data['action'] = "add";
		$data['tipo'] = "Regístrate";
		$data['error'] = "";
		$this->load->view('inicial_estimulacion',$data);
	}

	public function ver_estimulacion($value='')
	{
		$this->load->view('ver_estimulacion');
	}

	// Add a new item
	public function add()
	{
		$new_name = '';
		if ($_FILES["archivo"]['name']!='') {
			$config['upload_path']          = './uploads/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 100;
	        $config['max_width']            = 1024;
	        $config['max_height']           = 768;
	        $new_name = time().$_FILES["archivo"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('archivo'))
	        {
	                $error = array('error' => $this->upload->display_errors());
	                $this->load->view('inicial_estimulacion', $error);
	                exit;
	        }
		}
		
		$codigo = $this->input->post('codigo');
    	$nombre = $this->input->post('nombre');
    	$apellido = $this->input->post('apellido');
    	$telefono = $this->input->post('telefono');
    	$action = $this->input->post('action');
    	$data = array(
    		'codigo' => $codigo,
    		'nombre' => $nombre,
    		'apellido' => $apellido,
    		'telefono' => $telefono
    		 );
    	if ($new_name!='') {
    		$data['filename'] = $new_name;
    	}
    	if ($this->Alumnos_model->save($data)) {
    		
    	}else{
    		
    	}

	}

	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
}

/* End of file Inicial.php */
/* Location: ./application/controllers/Inicial.php */
