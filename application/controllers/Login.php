<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Login extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
	}
    public function index()
    {
        if($this->Usuario->is_logged_in())
		{
			redirect(base_url().'home');
        }
        
        $this->load->view('login');  
             
    }
    public function login_check()
	{
        $username = $this->input->post('usuario');
        $password = $this->input->post('password');
        $tipo_usuario = $this->input->post('tipo_usuario');
        if(!$this->Usuario->login($username, $password))
        {
            echo json_encode(array('status'=>false));
            exit;
        }
		echo json_encode(array('status'=>true));
	}
            
}
        
    /* End of file  Login.php */
        
                            