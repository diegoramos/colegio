<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ("Secure_area.php");
class Home extends Secure_area {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Administration_model');
    }
    
    public function index()
    {
        $data = array();
        $data['titulo'] = "BIENVENIDO";
        $data['directores'] = $this->Administration_model->get_directores()->num_rows();
        $data['secretaria'] = $this->Administration_model->get_secretaria()->num_rows();

        $data['alumno1'] = $this->Administration_model->get_alumnos(array(1,2,3,4))->num_rows();
        $data['alumno2'] = $this->Administration_model->get_alumnos(array(6,7,8,9,10,11))->num_rows();
        $data['alumno3'] = $this->Administration_model->get_alumnos(array(12,13,14,15,16))->num_rows();
        $this->load->view('partial/header');
        $this->load->view('administracion',$data);
        $this->load->view('partial/footer');
    }
    function logout()
	{
		$this->Usuario->logout();
	}       
}
        
    /* End of file  Home.php */
        
                            