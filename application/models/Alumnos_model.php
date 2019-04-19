<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos_model extends CI_Model {

	function save($data){
		return $this->db->insert('alumnos', $data);
	}
	function update($id,$data){
		return $this->db->where('alumno_id',$id)->update('alumnos', $data);
	}
	function delete($id){
		$this->db->where('alumno_id',$id)->update('alumnos', array('deleted'=>1));
	}
	function get_all($tipo){
		return $this->db->where('tipo_alumno',$tipo)->where('deleted',0)->from('alumnos')->get()->result();
	}
	function get_by_id($id){
		return $this->db->where('alumno_id',$id)->where('deleted',0)->from('alumnos')->get()->row();
	}

}

/* End of file Alumnos_model.php */
/* Location: ./application/models/Alumnos_model.php */
 ?>