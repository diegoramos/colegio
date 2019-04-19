<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ("Secure_area.php");  
class Primaria extends Secure_area {

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
		$this->load->view('primaria');
		$this->load->view('partial/footer');
	}
	
	public function registrar_primaria($tipo_alumno='')
	{
		$data = array();
		if ($tipo_alumno == 6) {
			$data['tipo_alumno'] = $tipo_alumno;
			$data['action'] = "add";
			$data['tipo'] = "Regístrar Primer Grado";
			$data['error'] = "";
		}elseif ($tipo_alumno == 7) {
			$data['tipo_alumno'] = $tipo_alumno;
			$data['action'] = "add";
			$data['tipo'] = "Regístrar Segundo Grado";
			$data['error'] = "";
		}elseif ($tipo_alumno == 8) {
			$data['tipo_alumno'] = $tipo_alumno;
			$data['action'] = "add";
			$data['tipo'] = "Regístrar Tercero Grado";
			$data['error'] = "";
		}elseif ($tipo_alumno == 9) {
			$data['tipo_alumno'] = $tipo_alumno;
			$data['action'] = "add";
			$data['tipo'] = "Regístrar Cuarto Grado";
			$data['error'] = "";
		}elseif ($tipo_alumno == 10) {
			$data['tipo_alumno'] = $tipo_alumno;
			$data['action'] = "add";
			$data['tipo'] = "Regístrar Quinto Grado";
			$data['error'] = "";
		}elseif ($tipo_alumno == 11) {
			$data['tipo_alumno'] = $tipo_alumno;
			$data['action'] = "add";
			$data['tipo'] = "Regístrar Sexto Grado";
			$data['error'] = "";
		}
		
		$this->load->view('registrar_primaria',$data);
	}

	public function ver_primaria($tipo_alumno='')
	{
		$data = array();
		/*
		tipo_alumno 
		6 => 1 grado
		7 => 2 grado
		8 => 3 grado
		9 => 4 grado
		10 => 5 grado
		11 => 6 grado
		*/
		$data['info'] = $this->Alumnos_model->get_all($tipo_alumno);
		$this->load->view('ver_primaria',$data);
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
	                $this->load->view('registrar_primaria', $data);
	                exit;
	        }
		}
		
		$codigo = $this->input->post('codigo');
    	$nombre = $this->input->post('nombre');
    	$apellido = $this->input->post('apellido');
    	$telefono = $this->input->post('telefono');
    	$tipo_alumno = $this->input->post('tipo_alumno');
    	if ($this->input->post('action')=='add') {
    		$data_save = array(
	    		'codigo' => $codigo,
	    		'nombre' => $nombre,
	    		'apellido' => $apellido,
	    		'telefono' => $telefono,
	    		'tipo_alumno' => $tipo_alumno
	    		 );
	    	if ($new_name!='') {
	    		$data_save['filename'] = $new_name;
	    	}
	    	if ($this->Alumnos_model->save($data_save)) {
	    		header("Location: ".base_url()."primaria/ver_primaria/".$tipo_alumno); 
	    	}else{
	    		$data = array('error' => 'Error al guardar');
	    		$data['action'] = "add";
				$data['tipo'] = "Regístrate";
	    		$this->load->view('registrar_primaria/'.$tipo_alumno, $data);
	    		exit;
	    	}
    	}else if($this->input->post('action')=='update'){
    		$alumno_id = $this->input->post('alumno_id');
    		$data_up = array(
	    		'codigo' => $codigo,
	    		'nombre' => $nombre,
	    		'apellido' => $apellido,
	    		'telefono' => $telefono,
	    		'tipo_alumno' => $tipo_alumno
	    		 );
	    	if ($new_name!='') {
	    		$data_up['filename'] = $new_name;
	    	}
	    	if ($this->Alumnos_model->update($alumno_id,$data_up)) {
	    		header("Location: ".base_url()."primaria/ver_primaria/".$tipo_alumno); 
	    	}else{
	    		$data = array('error' => 'Error al guardar');
	    		$data['action'] = "update";
				$data['tipo'] = "Actualizar";
				$data['error'] = "";
	    		$this->load->view('registrar_primaria/'.$tipo_alumno, $data);
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
		$data['tipo'] = "Actualizar";
		$data['error'] = "";
		$this->load->view('registrar_primaria',$data);
	}

	//Delete one item
	public function delete( $alumno_id = NULL, $tipo_alumno)
	{
		$this->Alumnos_model->delete($alumno_id);
		header("Location: ".base_url()."primaria/ver_primaria/".$tipo_alumno); 
	}

}

/* End of file primaria.php */
/* Location: ./application/controllers/primaria.php */
