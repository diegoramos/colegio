<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ("Secure_area.php");
class Usuarios extends Secure_area {

    function __construct()
	{
		parent::__construct('usuarios');
		/*$this->lang->load('employees');
        $this->lang->load('module');*/
        $this->load->model('Usuario');
        //$this->lang->load('employees');
        $this->lang->load('module');
	}
    public function index()
    {
        $data = array();
        $data['all_modules'] = $this->Module->get_all_modules();
        $this->load->view('partial/header');
        $this->load->view('partial/menu');
        $this->load->view('usuario/usuario',$data);
        $this->load->view('partial/footer');
    }
    public function search(){
        $search = $this->input->get('search');
		$limit  = $this->input->get('limit');
		$offset = $this->input->get('offset');
		$sort   = $this->input->get('sort');
        $order  = $this->input->get('order');

        $usuarios = $this->Usuario->search($search, $limit, $offset, $sort, $order);
        $total_rows = $this->Usuario->get_found_rows($search);
        $obj = new stdClass();
        $obj->total=$total_rows;
        $obj->rows=$usuarios->result();
        echo json_encode($obj);
    }
    public function ajax_edit($id)
    {
        $data = $this->Usuario->get_by_id($id);
        $modules=$this->Module->get_all_modules();
        $data->permissions = array();
        foreach ($modules->result() as $key => $module) {
            if ($this->Usuario->has_module_permission($module->module_id,$id)) {
                $data->permissions[]= $val="permissions".$module->module_id;
                foreach($this->Module_action->get_module_actions($module->module_id)->result() as $module_action)
                    {
                        if ($this->Usuario->has_module_action_permission($module->module_id,$module_action->action_id,$id)) {
                            $data->permissions[]="permissions_actions".$module->module_id."|".$module_action->action_id;
                        }
                    }
            }
        }
        echo json_encode($data);
    }
    public function ajax_add_update($id_persona=-1)
    {
        $this->_validate();
        if (!$id_persona) {
            $this->_validate_pass();
        }
        $permission_data = $this->input->post("permissions")!=false ? $this->input->post("permissions"):array();
        $permission_action_data = $this->input->post("permissions_actions")!=false ? $this->input->post("permissions_actions"):array();

        $data_people = array(
                'nombres' => $this->input->post('nombres'),
                'appaterno' => $this->input->post('appaterno'),
                'apmaterno' => $this->input->post('apmaterno'),
                'dni' => $this->input->post('dni'),
                'sexo' => $this->input->post('sexo'),
                'telefono' => $this->input->post('telefono'),
                'email' => $this->input->post('email'),
                //'phone' => $this->input->post('phone'),
                //'address' => $this->input->post('address'),
                'create_date' => date('Y-m-d H:m:i')
            );
        $data_user = array(
                'usuario' => $this->input->post('username'),
                'estado' => 1
            );
        if ($id_persona) {
            if ($this->input->post('password') != '') {
                $data_user['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }
        }else{
             $data_user['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }
        /*
        $insert = $this->People_model->save_people($data_people);
        if ($insert>0) {
            $data_user['person_id'] = $insert;
            $this->User_model->save_user($data_user);
            $this->People_model->update_permisos($permission_data,$permission_action_data,$insert);
        }*/
        $locations =array();
        if($this->Usuario->save_usuario($data_people,$data_user,$permission_data,$permission_action_data,$locations,$id_persona)){
            echo json_encode(array("status" => TRUE,'update'=>TRUE));
        }else{
            echo json_encode(array("status" => FALSE,'update'=>FALSE));
        }
        
    }
    public function delete()
    {
        $employees_to_delete = $this->security->xss_clean($this->input->post('ids'));
        if($this->Usuario->delete_list($employees_to_delete))
        {
            echo json_encode(array('success' => TRUE,'message' => 'Se elimino correctamente ' .
                            count($employees_to_delete) . ' registro(s) ' ));
        }
        else
        {
            echo json_encode(array('success' => FALSE, 'message' => 'No se pudo eliminar el usuario'));
        }
    }
    private function _validate_pass()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        if($this->input->post('password')!=$this->input->post('password_confirmation'))
        {
            $data['inputerror'][] = 'password_confirmation';
            $data['error_string'][] = 'Las contraseñas deben ser iguales';
            $data['status'] = FALSE;
        }
        if($this->input->post('password') == '')
        {
            $data['inputerror'][] = 'password';
            $data['error_string'][] = 'Password es requerido';
            $data['status'] = FALSE;
        }
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('nombres') == '')
        {
            $data['inputerror'][] = 'nombres';
            $data['error_string'][] = 'Nombre es requerido';
            $data['status'] = FALSE;
        }
        if($this->input->post('appaterno') == '')
        {
            $data['inputerror'][] = 'appaterno';
            $data['error_string'][] = 'Apellido paterno es requerido';
            $data['status'] = FALSE;
        }
        if($this->input->post('apmaterno') == '')
        {
            $data['inputerror'][] = 'apmaterno';
            $data['error_string'][] = 'Apellido materno es requerido';
            $data['status'] = FALSE;
        }
        if($this->input->post('dni') == '')
        {
            $data['inputerror'][] = 'dni';
            $data['error_string'][] = 'Dni es requerido';
            $data['status'] = FALSE;
        }

        if($this->input->post('username') == '')
        {
            $data['inputerror'][] = 'username';
            $data['error_string'][] = 'Usuario es requerido';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
}
        
    /* End of file  Usuarios.php */
        
                            