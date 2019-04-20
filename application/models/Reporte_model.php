<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_model extends CI_Model {

	function save_pago($data){
		return $this->db->insert('pago_egresos', $data);
	}
	function update_pago($id,$data){
		return $this->db->where('pago_id',$id)->update('pago_egresos', $data);
	}
	function get_all(){
		return $this->db->where('deleted', 0)->get('pago_egresos')->result();
	}
	function get_pago_id($id){
		return $this->db->where('pago_id', $id)->get('pago_egresos')->row();
	}
	function delete_usuario($id){
		return $this->db->where('pago_id',$id)->update('pago_egresos',array('deleted'=>1));
	}


	function get_gasto_tipo($tipo){
		return $this->db->where('deleted',0)->where('tipo_pago',$tipo)->from('pago_egresos')->get();
	}

}

/* End of file Reporte_model.php */
/* Location: ./application/models/Reporte_model.php */

 ?>