<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ("Secure_area.php"); 
class Economia extends Secure_area {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Alumnos_model');
		$this->load->model('Reporte_model');
	}

	public function index()
	{
		
	}

	public function ingresos($meses='')
	{
		$data = array();
		if ($meses=='') {
			$data['alumno1'] = $this->Alumnos_model->get_alumnos_by_max_fecha(3)->num_rows();
			$data['alumno2'] = $this->Alumnos_model->get_alumnos_by_max_fecha(6)->num_rows();
			$data['alumno3'] = $this->Alumnos_model->get_alumnos_by_max_fecha(12)->num_rows();
			$this->load->view('partial/header');
			$this->load->view('ingresos_economia',$data);
			$this->load->view('partial/footer');
		}else if ($meses=='3') {
			$data['titulo'] = "INFORME DE 3 MESES";
			$data['alumno'] = $this->Alumnos_model->get_alumnos_by_max_fecha(3)->result();
			$this->load->view('reporte/ingresos/por_tiempo',$data);
		}else if($meses=='6'){
			$data['titulo'] = "INFORME DE 6 MESES";
			$data['alumno'] = $this->Alumnos_model->get_alumnos_by_max_fecha(6)->result();
			$this->load->view('reporte/ingresos/por_tiempo',$data);
		}else if($meses=='12'){
			$data['titulo'] = "INFORME DE 1 AÑO";
			$data['alumno'] = $this->Alumnos_model->get_alumnos_by_max_fecha(12)->result();
			$this->load->view('reporte/ingresos/por_tiempo',$data);
		}else if($meses=='informe'){

			$data['estimulacion'] = $this->Alumnos_model->get_monto_tipo_alumno(1);
			$data['tres'] = $this->Alumnos_model->get_monto_tipo_alumno(2);
			$data['cuatro'] = $this->Alumnos_model->get_monto_tipo_alumno(3);
			$data['cinco'] = $this->Alumnos_model->get_monto_tipo_alumno(5);
			$this->load->view('reporte/ingresos/informe_ingresos',$data);
		}
	}
	public function ver_egresos($tipo_pago=''){
		$data = array();
		if ($tipo_pago==1) {
			$data['titulo'] = "Informe de gastos escolares";
		}else if($tipo_pago==2){
			$data['titulo'] = "Informe de gastos secretaria";
		}else if($tipo_pago==3){
			$data['titulo'] = "Informe de gastos profesores";
		}
		$data['info'] = $this->Reporte_model->get_gasto_tipo($tipo_pago)->result();
		$this->load->view('reporte/egresos/listado', $data);
	}
	public function save_pago(){

		if ($this->input->post('action')=='add') {
			$tipo_pago = $this->input->post('tipo_pago');
			$fecha = $this->input->post('fecha');
			$monto = $this->input->post('monto');
			$concepto = $this->input->post('concepto');

			$data_pago = array(
				'tipo_pago' => $tipo_pago,
				'fecha' => $fecha,
				'monto' => $monto,
				'concepto' => $concepto
			);
			$this->Reporte_model->save_pago($data_pago);
			header("Location: ".base_url()."economia/pagar");

		}else if($this->input->post('action')=='update'){
			$tipo_pago = $this->input->post('tipo_pago');
			$fecha = $this->input->post('fecha');
			$monto = $this->input->post('monto');
			$concepto = $this->input->post('concepto');
			$id = $this->input->post('pago_id');
			$data_pago = array(
				'tipo_pago' => $tipo_pago,
				'fecha' => $fecha,
				'monto' => $monto,
				'concepto' => $concepto
			);
			$this->Reporte_model->update_pago($id,$data_pago);
			header("Location: ".base_url()."economia/pagar");
		}else{
			$data['status'] = "Opcion incorrecta";
			$this->load->view('registrar_directores',$data);
		}
	}
	public function egresos()
	{
		$data = array();
		$data['tipo1'] = $this->Reporte_model->get_gasto_tipo(1)->num_rows();
		$data['tipo2'] = $this->Reporte_model->get_gasto_tipo(2)->num_rows();
		$data['tipo3'] = $this->Reporte_model->get_gasto_tipo(3)->num_rows();
		$this->load->view('partial/header');
		$this->load->view('economia_egresos',$data);
		$this->load->view('partial/footer');
	}

	public function pagar(){
		$data = array();
		$data['action'] = "add";
		//$data['info'] = new stdClass();//$this->Reporte_model->get_by_id($id);
		$data['pagos'] = $this->Reporte_model->get_all();;
		$this->load->view('reporte/egresos/pagar',$data);
	}
	public function delete_pago($id){
		if ($this->Reporte_model->delete_usuario($id)) {
			echo json_encode(TRUE);
		}else{
			echo json_encode(FALSE);
		}
	}

	public function edit($id){
		$data = array();
		$data['info'] = $this->Reporte_model->get_pago_id($id);
		echo json_encode($data['info']);
	}
}

/* End of file Economia.php */
/* Location: ./application/controllers/Economia.php */

 ?>