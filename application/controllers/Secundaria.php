<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ("Secure_area.php");  
class Secundaria extends Secure_area {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Alumnos_model');
		$this->load->model('Administration_model');

	}

	// List all your itemssdf
	public function index( $offset = 0 )
	{
		$data['alumno1'] = $this->Administration_model->get_alumnos(array(12,))->num_rows();
		$data['alumno2'] = $this->Administration_model->get_alumnos(array(13))->num_rows();
		$data['alumno3'] = $this->Administration_model->get_alumnos(array(14))->num_rows();
		$data['alumno4'] = $this->Administration_model->get_alumnos(array(15))->num_rows();
		$data['alumno5'] = $this->Administration_model->get_alumnos(array(16))->num_rows();
		$this->load->view('partial/header');
		$this->load->view('secundaria',$data);
		$this->load->view('partial/footer');
	}
	
	public function registrar_secundaria($tipo_alumno='')
	{
		$data = array();
		if ($tipo_alumno == 12) {
			$data['tipo_alumno'] = $tipo_alumno;
			$data['action'] = "add";
			$data['tipo'] = "Regístrar Primer Grado";
			$data['error'] = "";
		}elseif ($tipo_alumno == 13) {
			$data['tipo_alumno'] = $tipo_alumno;
			$data['action'] = "add";
			$data['tipo'] = "Regístrar Segundo Grado";
			$data['error'] = "";
		}elseif ($tipo_alumno == 14) {
			$data['tipo_alumno'] = $tipo_alumno;
			$data['action'] = "add";
			$data['tipo'] = "Regístrar Tercero Grado";
			$data['error'] = "";
		}elseif ($tipo_alumno == 15) {
			$data['tipo_alumno'] = $tipo_alumno;
			$data['action'] = "add";
			$data['tipo'] = "Regístrar Cuarto Grado";
			$data['error'] = "";
		}elseif ($tipo_alumno == 16) {
			$data['tipo_alumno'] = $tipo_alumno;
			$data['action'] = "add";
			$data['tipo'] = "Regístrar Quinto Grado";
			$data['error'] = "";
		}
		
		$this->load->view('registrar_secundaria',$data);
	}

	public function ver_secundaria($tipo_alumno='')
	{
		$data = array();
		/*
		tipo_alumno 
		12 => 1 grado
		13 => 2 grado
		14 => 3 grado
		15 => 4 grado
		16 => 5 grado
		*/
		$data['info'] = $this->Alumnos_model->get_all($tipo_alumno);
		$this->load->view('ver_secundaria',$data);
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
	                $this->load->view('registrar_secundaria', $data);
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
	    		header("Location: ".base_url()."secundaria/ver_secundaria/".$tipo_alumno); 
	    	}else{
	    		$data = array('error' => 'Error al guardar');
	    		$data['action'] = "add";
				$data['tipo'] = "Regístrate";
	    		$this->load->view('registrar_secundaria/'.$tipo_alumno, $data);
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
	    		header("Location: ".base_url()."secundaria/ver_secundaria/".$tipo_alumno); 
	    	}else{
	    		$data = array('error' => 'Error al guardar');
	    		$data['action'] = "update";
				$data['tipo'] = "ACtualizar";
				$data['error'] = "";
	    		$this->load->view('registrar_secundaria/'.$tipo_alumno, $data);
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
		$this->load->view('registrar_secundaria',$data);
	}

	//Delete one item
	public function delete( $alumno_id = NULL, $tipo_alumno)
	{
		$this->Alumnos_model->delete($alumno_id);
		header("Location: ".base_url()."secundaria/ver_secundaria/".$tipo_alumno); 
	}

}

/* End of file Inicial.php */
/* Location: ./application/controllers/Inicial.php */
