<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ("Secure_area.php");
class Home extends Secure_area {

    public function index()
    {
        $this->load->view('partial/header');
        $this->load->view('dashboard');
        $this->load->view('partial/footer');
    }
    function logout()
	{
		$this->Usuario->logout();
	}       
}
        
    /* End of file  Home.php */
        
                            