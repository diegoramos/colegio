<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ("Secure_area.php");  
class Pagos extends Secure_area {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pagos_model');
	}
	public function index()
	{
		//$this->load->view('partial/header');
		$this->load->view('pagos');
		//$this->load->view('partial/footer');
	}
	public function pagar($id)
	{
		$data = array();
		$data['action'] = "add";
		$data['pagos'] = new stdClass();
		$this->load->view('pagos',$data);
	}
	public function registrar_pago(){
		$data = array();
		$data['action'] = "add";
		$data['tipo'] = "Regístrar";
		$this->load->view('registrar_directores',$data);
	}
	public function listar_pago(){
		$data = array();
		/*
			tipo_ususario
			1 => admin,
			2 => director,
			3 => secretaria,
			*/
		$data['pagos'] = '';//$this->Administration_model->get_all_usuarios(2);
		$this->load->view('listar_directores',$data);
	}
	public function save_pago(){

		if ($this->input->post('action')=='add') {
			$nombre = $this->input->post('nombre');
			$apellidos = $this->input->post('apellidos');
			$usuario = $this->input->post('usuario');
			$password = $this->input->post('password');

			$data_persona = array(
				'nombres' => $nombre ,
				'appaterno' => $apellidos);
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
		}
		redirect('/administration/listar_directores/');
	}
	public function delete_pago($id_persona){
		$this->Administration_model->delete_usuario($id_persona);
		header("Location: ".base_url()."administration/listar_directores"); 
	}

	public function editar_pago($id_persona){
		$data = array();
		$data['tipo'] = "Actualizar";
		$data['action'] = "update";
		$data['info'] = $this->Administration_model->get_usuario_id($id_persona);
		$this->load->view('registrar_directores',$data);
	}
}

/* End of file Pagos.php */
/* Location: ./application/controllers/Pagos.php */
