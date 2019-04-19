<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secretary extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Administration_model');
	}

	// List all your items
	public function index( $offset = 0 )
	{
        $data = array();
        $data['all_modules'] = $this->Module->get_all_modules();
        $this->load->view('partial/header');
        $this->load->view('partial/menu');
        $this->load->view('secretary',$data);
        $this->load->view('partial/footer');
	}

	public function registrar_secretaria(){
		$data = array();
		$data['action'] = "add";
		$data['tipo'] = "Regístrar";
		$this->load->view('registrar_secretaria',$data);
	}

	public function listar_secretaria(){
		$data = array();
		/*
			tipo_ususario
			1 => admin,
			2 => director,
			3 => secretaria,
			*/
		$data['secretaria'] = $this->Administration_model->get_all_usuarios(3);
		$this->load->view('listar_secretaria',$data);
	}

	public function save_secretaria(){

		if ($this->input->post('action')=='add') {
			$nombre = $this->input->post('nombre');
			$apellidos = $this->input->post('apellidos');
			$dni = $this->input->post('dni');
			$usuario = $this->input->post('usuario');
			$password = $this->input->post('password');

			$data_persona = array(
				'nombres' => $nombre ,
				'appaterno' => $apellidos,
				'dni' => $dni);
			$last_id = $this->Administration_model->save_people($data_persona);
			/*
			tipo_ususario
			1 => admin,
			2 => director,
			3 => secretaria,
			*/
			$data_usuario = array(
				'id_persona' => $last_id,
				'usuario' => $usuario ,
				'tipo_ususario' => 3,
				'password' => password_hash($password, PASSWORD_DEFAULT));
			$this->Administration_model->save_usuario($data_usuario);
			$data = array();
			$data['action'] = "add";
			$data['tipo'] = "Regístrar";
			$data['status'] = "Se registro con exito";
			$this->load->view('registrar_secretaria',$data);

		}else if($this->input->post('action')=='update'){
			$nombre = $this->input->post('nombre');
			$apellidos = $this->input->post('apellidos');
			$dni = $this->input->post('dni');
			$usuario = $this->input->post('usuario');
			$password = $this->input->post('password');
			$id_persona = $this->input->post('id_persona');
			$data_persona = array(
				'nombres' => $nombre ,
				'appaterno' => $apellidos,
				'dni' => $dni);
			$last_id = $this->Administration_model->update_people($id_persona,$data_persona);
			$data_usuario = array(
				'usuario' => $usuario,
				'tipo_ususario' => 3);
			if ($password!='') {
				$data_usuario['password'] = password_hash($password, PASSWORD_DEFAULT);
			}
			$this->Administration_model->update_usuario($id_persona,$data_usuario);
			header("Location: ".base_url()."secretary/listar_secretaria"); 
		}else{
			$data['status'] = "Opcion incorrecta";
			$this->load->view('registrar_secretaria',$data);
		}
		redirect('/secretary/listar_secretaria/');
	}
	public function delete_secretaria($id_persona){
		$this->Administration_model->delete_usuario($id_persona);
		header("Location: ".base_url()."secretary/listar_secretaria"); 
	}

	public function editar_secretaria($id_persona){
		$data = array();
		$data['tipo'] = "Actualizar";
		$data['action'] = "update";
		$data['info'] = $this->Administration_model->get_usuario_id($id_persona);
		$this->load->view('registrar_secretaria',$data);
	}
}

/* End of file Secretary.php */
/* Location: ./application/controllers/Secretary.php */
