<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagos_model extends CI_Model {

	function save_pago($data){
		return $this->db->insert('pagos', $data);
	}
	function update_pago($id,$data){
		return $this->db->where('pago_id',$id)->update('pagos', $data);
	}
	function get_all($id){
		return $this->db->where('alumno_id', $id)->get('pagos')->result();
	}
	function get_pago_id($id){
		return $this->db->where('pago_id', $id)->get('pagos')->row();
	}

}

/* End of file Pagos_model.php */
/* Location: ./application/models/Pagos_model.php */