<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ("Secure_area.php");   
class Admin extends Secure_area {

	function __construct()
	{
		parent::__construct('usuarios');
	}
	public function index()
	{
		$this->load->view('partial/header');
        $this->load->view('admin');
        $this->load->view('partial/footer');
	}
        
}
        
    /* End of file  Persona.php */
        
                            