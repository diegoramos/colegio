<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ("Secure_area.php"); 
class Economia extends Secure_area {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Alumnos_model');

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
	public function egresos()
	{
		$this->load->view('partial/header');
		$this->load->view('administracion');
		$this->load->view('partial/footer');
	}
	
}

/* End of file Economia.php */
/* Location: ./application/controllers/Economia.php */

 ?>