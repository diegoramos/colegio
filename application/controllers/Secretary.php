<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secretary extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

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
		$this->load->view('registrar_secretaria');
	}
	
	// Add a new item
	public function add()
	{

	}

	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
}

/* End of file Secretary.php */
/* Location: ./application/controllers/Secretary.php */
