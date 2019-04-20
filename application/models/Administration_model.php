<?php
class Administration_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
	
	function save_people($data){
		$this->db->insert('personas', $data);
		return $this->db->insert_id();
	}

	function save_usuario($data){
		$this->db->insert('usuario', $data);
	}

	public function save_modules($data_modules)
	{
		$this->db->insert_batch('permissions', $data_modules);
	}

	function update_people($id,$data){
		$this->db->where('id_persona',$id)->update('personas', $data);
	}
	function update_usuario($id,$data){
		$this->db->where('id_persona',$id)->update('usuario', $data);
	}

	function get_all_usuarios($tipo){
		return $this->db->select('p.nombres,p.appaterno,p.dni,u.id_usuario,p.id_persona,u.usuario,u.password')
						->from('usuario u')
						->join('personas p','u.id_persona=p.id_persona')
						->where('u.tipo_ususario',$tipo)
						->where('u.deleted',0)
						->get()
						->result();
	}

	public function get_usuario_id($id=-1)
	{
		return $this->db->select('p.nombres,p.appaterno,p.dni,u.id_usuario,p.id_persona,u.usuario,u.password')
						->from('usuario u')
						->join('personas p','u.id_persona=p.id_persona')
						->where('u.id_persona',$id)
						->where('u.deleted',0)
						->get()
						->row();
	}
	public function delete_usuario($id = -1){
		$this->db->where('id_persona',$id)->update('usuario',array('deleted'=>1));
	}


	function get_directores(){
		return $this->db->where('deleted',0)->where('tipo_ususario',2)->get('usuario');
	}
	function get_secretaria(){
		return $this->db->where('deleted',0)->where('tipo_ususario',3)->get('usuario');
	}

	function get_alumnos($tipo){
		return $this->db->where('deleted',0)->where_in('tipo_alumno',$tipo)->get('alumnos');
	}

}
?>
