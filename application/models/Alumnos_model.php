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
	function get_alumnos_by_max_fecha($cant_mes){
		return $this->db->query("SELECT * FROM alumnos WHERE deleted = 0 AND fecha BETWEEN DATE_SUB(NOW(), INTERVAL $cant_mes MONTH) AND NOW() ORDER BY alumno_id DESC");
	}
	function get_monto_tipo_alumno($tipo){
		/*
		tipo_alumno 
		1 => estimulacion
		2 => 3 años
		3 => 4 años
		5 => 5 años
		*/
		return $this->db->select('SUM(monto) as total')
						->where('tipo_alumno',$tipo)
						->where('p.deleted',0)
						->where('a.deleted',0)
						->from('pagos p')
						->join('alumnos a','a.alumno_id=p.alumno_id')
						->get()
						->row();
	}

}

/* End of file Alumnos_model.php */
/* Location: ./application/models/Alumnos_model.php */
 ?>