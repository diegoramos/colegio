<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos_model extends CI_Model {

	function save($data){
		return $this->db->insert('alumnos', $data);
	}

}

/* End of file Alumnos_model.php */
/* Location: ./application/models/Alumnos_model.php */
 ?>