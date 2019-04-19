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
		$data = array();
		/*
		tipo_alumno 
		1 => estimulacion
		2 => 3 años
		3 => 4 años
		5 => 5 años
		*/
		$data['info'] = $this->Alumnos_model->get_all(1);
		$this->load->view('ver_estimulacion',$data);
	}

	// Add a new item
	public function add_update()
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
	        		$data = array('error' => $this->upload->display_errors());
	        		if ($this->input->post('action')=='add') {
	        			$data['action'] = "add";
						$data['tipo'] = "Regístrate";
	        		}else if($this->input->post('action')=='update'){
	        			$data['action'] = "update";
						$data['tipo'] = "ACtualizar";
	        		}
	                $this->load->view('inicial_estimulacion', $data);
	                exit;
	        }
		}
		
		$codigo = $this->input->post('codigo');
    	$nombre = $this->input->post('nombre');
    	$apellido = $this->input->post('apellido');
    	$telefono = $this->input->post('telefono');
    	if ($this->input->post('action')=='add') {
    		$data_save = array(
	    		'codigo' => $codigo,
	    		'nombre' => $nombre,
	    		'apellido' => $apellido,
	    		'telefono' => $telefono,
	    		'tipo_alumno' => 1
	    		 );
	    	if ($new_name!='') {
	    		$data_save['filename'] = $new_name;
	    	}
	    	if ($this->Alumnos_model->save($data_save)) {
	    		header("Location: ".base_url()."inicial/ver_estimulacion"); 
	    	}else{
	    		$data = array('error' => 'Error al guardar');
	    		$data['action'] = "add";
				$data['tipo'] = "Regístrate";
	    		$this->load->view('inicial_estimulacion', $data);
	    		exit;
	    	}
    	}else if($this->input->post('action')=='update'){
    		$alumno_id = $this->input->post('alumno_id');
    		$data_up = array(
	    		'codigo' => $codigo,
	    		'nombre' => $nombre,
	    		'apellido' => $apellido,
	    		'telefono' => $telefono,
	    		'tipo_alumno' => 1
	    		 );
	    	if ($new_name!='') {
	    		$data_up['filename'] = $new_name;
	    	}
	    	if ($this->Alumnos_model->update($alumno_id,$data_up)) {
	    		header("Location: ".base_url()."inicial/ver_estimulacion"); 
	    	}else{
	    		$data = array('error' => 'Error al guardar');
	    		$data['action'] = "update";
				$data['tipo'] = "ACtualizar";
				$data['error'] = "";
	    		$this->load->view('inicial_estimulacion', $data);
	    		exit;
	    	}
    	}

	}

	//Update one item
	public function edit( $id = NULL )
	{
		$data = array();
		$data['info'] = $this->Alumnos_model->get_by_id($id);
		$data['action'] = "update";
		$data['tipo'] = "ACtualizar";
		$data['error'] = "";
		$this->load->view('inicial_estimulacion',$data);
	}

	//Delete one item
	public function delete( $alumno_id = NULL )
	{
		$this->Alumnos_model->delete($alumno_id);
		header("Location: ".base_url()."inicial/ver_estimulacion"); 
	}
}

/* End of file Inicial.php */
/* Location: ./application/controllers/Inicial.php */
