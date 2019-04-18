<?php
class Secure_area extends CI_Controller 
{
	var $module_id;
	
	/*
	Los controladores que se consideran seguros extienden Secure_area, opcionalmente un $module_id puede
	también se configurará para verificar si un usuario puede acceder a un módulo particular en el sistema
	*/
	function __construct($module_id=null)
	{
		parent::__construct();
		$this->module_id = $module_id;	
		$this->load->model('Usuario');
		$this->load->model('Location');
		if(!$this->Usuario->is_logged_in())
		{
			redirect(base_url().'login?continue='.rawurlencode(uri_string().'?'.$_SERVER['QUERY_STRING']));
		}
		
		if(!$this->Usuario->has_module_permission($this->module_id,$this->Usuario->get_logged_in_employee_info()->id_persona))
		{
			redirect('no_access/'.$this->module_id);
		}
		//load up global data
		$logged_in_employee_info=$this->Usuario->get_logged_in_employee_info();
		
		$data['allowed_modules']=$this->Module->get_allowed_modules($logged_in_employee_info->id_persona);
		$data['user_info']=$logged_in_employee_info;

        $all_locations_in_system = array();
		$locations_list=$this->Location->get_all();

		$authenticated_locations = $this->Usuario->get_authenticated_location_ids($logged_in_employee_info->id_persona);
		$locations = array();
		$total_locations_in_system = 0;
		foreach($locations_list->result() as $row)
		{
			if(in_array($row->location_id, $authenticated_locations))
			{
				$locations[$row->location_id] =$row->name;
			}
			
			$all_locations_in_system[$row->location_id] =$row->name;
			
			$total_locations_in_system++;
		}
		
		$data['total_locations_in_system'] = $total_locations_in_system;
		$data['authenticated_locations'] = $locations;
        $data['all_locations_in_system'] = $all_locations_in_system;
		
		$location_id = $this->Usuario->get_logged_in_employee_current_location_id();
        $loc_info = $this->Location->get_info($location_id);
        
        $data['current_logged_in_location_id'] = $location_id;
		$data['current_employee_location_info'] = $loc_info;
        $data['location_color'] = $loc_info->color;
        
        $this->load->vars($data);
	}
	
	function check_action_permission($action_id)
	{
		if (!$this->Usuario->has_module_action_permission($this->module_id, $action_id, $this->Usuario->get_logged_in_employee_info()->id_persona))
		{
			redirect('no_access/'.$this->module_id);
		}
	}	
	function verificar_permiso_accion($action_id)
	{
		if (!$this->Usuario->has_module_action_permission($this->module_id, $action_id, $this->People_model->get_logged_in_employee_info()->id_persona))
		{
			return false;
		}
		return true;
	}	
}
?>