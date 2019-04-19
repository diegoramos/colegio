<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ("Secure_area.php");  
class Pagos extends Secure_area {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pagos_model');
		$this->load->model('Alumnos_model');
	}
	public function index()
	{
		$this->load->view('pagos');
	}
	public function pagar($id)
	{
		$data = array();
		$data['action'] = "add";
		$data['alumno_id'] = $id;
		$data['info'] = $this->Alumnos_model->get_by_id($id);
		$data['pagos'] = $this->Pagos_model->get_all($id);;
		$this->load->view('pagos',$data);
	}
	public function listar_pago(){
		$data = array();
		$data['pagos'] = '';//$this->Administration_model->get_all_usuarios(2);
		$this->load->view('listar_directores',$data);
	}
	public function save_pago(){

		if ($this->input->post('action')=='add') {
			$alumno_id = $this->input->post('alumno_id');
			$fecha = $this->input->post('fecha');
			$monto = $this->input->post('monto');
			$concepto = $this->input->post('concepto');

			$data_pago = array(
				'alumno_id' => $alumno_id,
				'fecha' => $fecha,
				'monto' => $monto,
				'concepto' => $concepto
			);
			$this->Pagos_model->save_pago($data_pago);
			header("Location: ".base_url()."pagos/pagar/".$alumno_id);

		}else if($this->input->post('action')=='update'){
			$alumno_id = $this->input->post('alumno_id');
			$fecha = $this->input->post('fecha');
			$monto = $this->input->post('monto');
			$concepto = $this->input->post('concepto');

			$data_pago = array(
				'alumno_id' => $alumno_id,
				'fecha' => $fecha,
				'monto' => $monto,
				'concepto' => $concepto
			);
			$this->Pagos_model->update_pago($id,$data_pago);
			header("Location: ".base_url()."pagos/pagar/".$alumno_id);
		}else{
			$data['status'] = "Opcion incorrecta";
			$this->load->view('registrar_directores',$data);
		}
	}
	public function delete_pago($id_persona){
		$this->Administration_model->delete_usuario($id_persona);
		header("Location: ".base_url()."administration/listar_directores"); 
	}

	public function edit($id){
		$data = array();
		$data['info'] = $this->Pagos_model->get_pago_id($id);
		echo json_encode($data['info']);
	}
}

/* End of file Pagos.php */
/* Location: ./application/controllers/Pagos.php */
