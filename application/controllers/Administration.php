<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ("Secure_area.php");   
class Administration extends Secure_area {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Administration_model');
	}
	public function index()
	{
		$data = array();
		$data['titulo'] = "ADMINISTRADOR";
		$data['directores'] = $this->Administration_model->get_directores()->num_rows();
		$data['secretaria'] = $this->Administration_model->get_secretaria()->num_rows();

		$data['alumno1'] = $this->Administration_model->get_alumnos(array(1,2,3,4))->num_rows();
		$data['alumno2'] = $this->Administration_model->get_alumnos(array(6,7,8,9,10,11))->num_rows();
		$data['alumno3'] = $this->Administration_model->get_alumnos(array(12,13,14,15,16))->num_rows();
		$this->load->view('partial/header');
		$this->load->view('administracion',$data);
		$this->load->view('partial/footer');
	}
	public function registrar_directores(){
		$data = array();
		$data['action'] = "add";
		$data['tipo'] = "Regístrar";
		$this->load->view('registrar_directores',$data);
	}
	public function listar_directores(){
		$data = array();
		/*
			tipo_ususario
			1 => admin,
			2 => director,
			3 => secretaria,
			*/
		$data['directores'] = $this->Administration_model->get_all_usuarios(2);
		$this->load->view('listar_directores',$data);
	}
	public function save_director(){

		if ($this->input->post('action')=='add') {
			$nombre = $this->input->post('nombre');
			$apellidos = $this->input->post('apellidos');
			$usuario = $this->input->post('usuario');
			$password = $this->input->post('password');

			$data_persona = array(
				'nombres' => $nombre ,
				'appaterno' => $apellidos);
			$last_id = $this->Administration_model->save_people($data_persona);
			$data_modules = array(
				array(
					'module_id' => 'administration',
					'id_persona' => $last_id ),
				array(
					'module_id' => 'economia',
					'id_persona' => $last_id )
			);
			$this->Administration_model->save_modules($data_modules);
			/*
			tipo_ususario
			1 => admin,
			2 => director,
			3 => secretaria,
			*/
			$data_usuario = array(
				'id_persona' => $last_id,
				'usuario' => $usuario ,
				'tipo_ususario' => 2,
				'password' => password_hash($password, PASSWORD_DEFAULT));
			$this->Administration_model->save_usuario($data_usuario);
			$data = array();
			$data['action'] = "add";
			$data['tipo'] = "Regístrar";
			$data['status'] = "Se registro con exito";
			$this->load->view('registrar_directores',$data);
		}else if($this->input->post('action')=='update'){
			$nombre = $this->input->post('nombre');
			$apellidos = $this->input->post('apellidos');
			$usuario = $this->input->post('usuario');
			$password = $this->input->post('password');
			$id_persona = $this->input->post('id_persona');
			$data_persona = array(
				'nombres' => $nombre ,
				'appaterno' => $apellidos);
			$last_id = $this->Administration_model->update_people($id_persona,$data_persona);
			$data_usuario = array(
				'usuario' => $usuario,
				'tipo_ususario' => 2);
			if ($password!='') {
				$data_usuario['password'] = password_hash($password, PASSWORD_DEFAULT);
			}
			$this->Administration_model->update_usuario($id_persona,$data_usuario);
			header("Location: ".base_url()."administration/listar_directores"); 
		}else{
			$data['status'] = "Opcion incorrecta";
			$this->load->view('registrar_directores',$data);
			exit;
		}
		
		header("Location: ".base_url()."administration/listar_directores");
	}
	public function delete_usuario($id_persona){
		$this->Administration_model->delete_usuario($id_persona);
		header("Location: ".base_url()."administration/listar_directores"); 
	}

	public function editar_director($id_persona){
		$data = array();
		$data['tipo'] = "Actualizar";
		$data['action'] = "update";
		$data['info'] = $this->Administration_model->get_usuario_id($id_persona);
		$this->load->view('registrar_directores',$data);
	}

}

/* End of file Administracion.php */
/* Location: ./application/controllers/Administracion.php */

 ?>