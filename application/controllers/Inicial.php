<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ("Secure_area.php");  
class Inicial extends Secure_area {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

	}

	// List all your items
	public function index( $offset = 0 )
	{
		$this->load->view('partial/header');
		$this->load->view('inicial');
		$this->load->view('partial/footer');
	}
	
	public function inicial_estimulacion($value='')
	{
		$this->load->view('inicial_estimulacion');
	}

	public function ver_estimulacion($value='')
	{
		$this->load->view('ver_estimulacion');
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

/* End of file Inicial.php */
/* Location: ./application/controllers/Inicial.php */
