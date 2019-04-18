<?php
class Location extends CI_Model
{
	/*
	Determines if a given location_id is an location
	*/
	function exists($location_id)
	{
		$this->db->from('locations');
		$this->db->where('location_id',$location_id);
		$query = $this->db->get();

		return ($query->num_rows()==1);
	}

	/*
	Returns all the locations
	*/
	function get_all($deleted=0,$limit=10000, $offset=0,$col='location_id',$order='asc')
	{
		if (!$deleted)
		{
			$deleted = 0;
		}
		$this->db->from('locations');
		$this->db->where('deleted',$deleted);
		if (!$this->config->item('speed_up_search_queries'))
		{
			$this->db->order_by($col, $order);
		}
		$this->db->limit($limit);
		$this->db->offset($offset);
		return $this->db->get();
	}
	
	function count_all($deleted = 0)
	{
		if (!$deleted)
		{
			$deleted = 0;
		}
		
		$this->db->from('locations');
		$this->db->where('deleted',$deleted);
		return $this->db->count_all_results();
	}
	
	/*
	Gets information about a particular location
	*/
	function get_info($location_id,$can_cache = FALSE)
	{
		if ($can_cache)
		{
			static $cache;
		}
		
		if (isset($cache[$location_id]))
		{
			return $cache[$location_id];
		}
		
		$this->db->from('locations');
		$this->db->where('location_id',$location_id);
		
		$query = $this->db->get();

		if($query->num_rows()==1)
		{
			
			$cache[$location_id] = $query->row();
			return $cache[$location_id];
		}
		else
		{
			//Get empty base parent object, as $location_id is NOT a location
			$location_obj=new stdClass();

			//Get all the fields from locations table
			$fields = $this->db->list_fields('locations');

			foreach ($fields as $field)
			{
				$location_obj->$field='';
			}
			$cache[$location_id] = $location_obj;
			return $cache[$location_id];
		}
	}
	
	function get_info_for_key($key, $override_location_id = false, $use_cache = TRUE)
	{
		if ($use_cache)
		{
			static $location_info = array();
		}
		else
		{
				$location_info = array();
		}	
		if ($override_location_id !== FALSE)
		{
			$location_id = $override_location_id;
		}
		else
		{
			$location_id= $this->Ususario->get_logged_in_employee_current_location_id();
		}
		
		if (!isset($location_info[$location_id]))
		{			
			$location_info[$location_id] = $this->get_info($location_id);
		}
		
		return $location_info[$location_id]->{$key};
	}

	/*
	Inserts or updates a location
	*/
	function save(&$location_data,$location_id=false)
	{	
		//Check for duplicate taxes
		for($k = 1;$k<=5;$k++)
		{
			if (isset($location_data["default_tax_${k}_name"]) && isset($location_data["default_tax_${k}_rate"]))
			{
				$current_tax = $location_data["default_tax_${k}_name"].$location_data["default_tax_${k}_rate"];
			
				for ($j = 1;$j<=5;$j++)
				{
					$check_tax = $location_data["default_tax_${j}_name"].$location_data["default_tax_${j}_rate"];
					if ($j!=$k && $current_tax != '' && $check_tax != '')
					{
						if ($current_tax == $check_tax)
						{
							return FALSE;
						}
					}
				}
			}
		}
		
		if (!$location_id or !$this->exists($location_id))
		{
			if($this->db->insert('locations',$location_data))
			{
				$location_data['location_id']=$this->db->insert_id();
				return true;
			}
			return false;
		}

		$this->db->where('location_id', $location_id);
		return $this->db->update('locations',$location_data);
	}


	function search_count_all($search,$deleted=0, $limit=10000,$search_field = NULL)
	{
		if (!$deleted)
		{
			$deleted = 0;
		}
		
			$this->db->from('locations');
			if ($search)
			{
				if ($search_field)
				{
					$this->db->where("$search_field LIKE '".$this->db->escape_like_str($search)."%' and deleted=$deleted");		
				}
				else
				{

					$search_terms_array=explode(" ", $this->db->escape_like_str($search));
					
					//to keep track of which search term of the array we're looking at now	
					$search_name_criteria_counter=0;
					$sql_search_name_criteria = '';
					//loop through array of search terms
					foreach ($search_terms_array as $x)
					{
						$sql_search_name_criteria.=
						($search_name_criteria_counter > 0 ? " AND " : "").
						"name LIKE '".(!$this->config->item('speed_up_search_queries') ? '%' : '').$this->db->escape_like_str($x)."%'";
				
						$search_name_criteria_counter++;
					}
	
					$this->db->where("((".
					$sql_search_name_criteria. ") or 
					address LIKE '".(!$this->config->item('speed_up_search_queries') ? '%' : '').$this->db->escape_like_str($search)."%' or 
					location_id LIKE '".(!$this->config->item('speed_up_search_queries') ? '%' : '').$this->db->escape_like_str($search)."%' or 
					phone LIKE '".(!$this->config->item('speed_up_search_queries') ? '%' : '').$this->db->escape_like_str($search)."%' or 
					email LIKE '".(!$this->config->item('speed_up_search_queries') ? '%' : '').$this->db->escape_like_str($search)."%') and deleted=$deleted");
				}
			}
			else
			{
				$this->db->where('deleted',$deleted);
			}
			$this->db->limit($limit);
			$result=$this->db->get();				
			return $result->num_rows();
	}

	/*
	Get search suggestions to find locations
	*/
	function get_search_suggestions($search,$deleted=0,$limit=25)
	{
		if (!trim($search))
		{
			return array();
		}
		if (!$deleted)
		{
			$deleted = 0;
		}
		
		$suggestions = array();

			$this->db->from('locations');
			$this->db->like('name', $search,!$this->config->item('speed_up_search_queries') ? 'both' : 'after');
			$this->db->where('deleted',$deleted);
			$this->db->limit($limit);
			$by_name = $this->db->get();			
			
			$temp_suggestions = array();
			foreach($by_name->result() as $row)
			{
				$data = array(
					'name' => $row->name,
					'email' => $row->email,
					'avatar' => base_url()."assets/img/user.png" 
				 );
				$temp_suggestions[$row->location_id] = $data;
			}
			
			asort($temp_suggestions);
		
			foreach($temp_suggestions as $key => $value)
			{
				$suggestions[]=array('value'=> $key, 'label' => $value['name'],'avatar'=>$value['avatar'],'subtitle'=>$value['email']);		
			}
		
		
			$this->db->from('locations');
			$this->db->where('deleted',$deleted);
			$this->db->like('address', $search,!$this->config->item('speed_up_search_queries') ? 'both' : 'after');
			$this->db->limit($limit);
		
			$by_address = $this->db->get();
			
			$temp_suggestions = array();
			foreach($by_address->result() as $row)
			{
				$data = array(
					'name' => $row->address,
					'email' => $row->name,
					'avatar' => base_url()."assets/img/user.png" 
				 );
				$temp_suggestions[$row->location_id] = $data;

			}
			
			asort($temp_suggestions);
		
			foreach($temp_suggestions as $key => $value)
			{
				$suggestions[]=array('value'=> $key, 'label' => $value['name'],'avatar'=>$value['avatar'],'subtitle'=>$value['email']);		
			}

			$this->db->from('locations');
			$this->db->where('location_id', $search);
			$this->db->where('deleted',$deleted);
			$this->db->limit($limit);
			$by_location_id = $this->db->get();
		
			$temp_suggestions = array();
			foreach($by_location_id->result() as $row)
			{
				$data = array(
					'name' => $row->location_id,
					'email' => $row->name,
					'avatar' => base_url()."assets/img/user.png" 
				 );
				$temp_suggestions[$row->location_id] = $data;

			}
			
			asort($temp_suggestions);
		
			foreach($temp_suggestions as $key => $value)
			{
				$suggestions[]=array('value'=> $key, 'label' => $value['name'],'avatar'=>$value['avatar'],'subtitle'=>$value['email']);		
			}
		
			$this->db->from('locations');
			$this->db->like('phone', $search,!$this->config->item('speed_up_search_queries') ? 'both' : 'after');
			$this->db->where('deleted',$deleted);
			$this->db->limit($limit);
			$by_phone = $this->db->get();
		
			$temp_suggestions = array();
			foreach($by_phone->result() as $row)
			{
				$data = array(
					'name' => $row->phone,
					'email' => $row->name,
					'avatar' => base_url()."assets/img/user.png" 
				 );
				$temp_suggestions[$row->location_id] = $data;
			}
			
			asort($temp_suggestions);
		
			foreach($temp_suggestions as $key => $value)
			{
				$suggestions[]=array('value'=> $key, 'label' => $value['name'],'avatar'=>$value['avatar'],'subtitle'=>$value['email']);		
			}
		
			$this->db->from('locations');
			$this->db->like('email', $search,!$this->config->item('speed_up_search_queries') ? 'both' : 'after');
			$this->db->where('deleted',$deleted);
			$this->db->limit($limit);
			$by_email = $this->db->get();
			$temp_suggestions = array();
			foreach($by_email->result() as $row)
			{
				$data = array(
					'name' => $row->email,
					'email' => $row->name,
					'avatar' => base_url()."assets/img/user.png" 
				 );
				$temp_suggestions[$row->location_id] = $data;
			}
			
			asort($temp_suggestions);
		
			foreach($temp_suggestions as $key => $value)
			{
				$suggestions[]=array('value'=> $key, 'label' => $value['name'],'avatar'=>$value['avatar'],'subtitle'=>$value['email']);		
			}
		
		//only return $limit suggestions
		$suggestions = array_map("unserialize", array_unique(array_map("serialize", $suggestions)));
		if(count($suggestions) > $limit)
		{
			$suggestions = array_slice($suggestions, 0,$limit);
		}
		return $suggestions;
	}


	/*
	Preform a search on locations
	*/
	
	function search($search, $deleted=0,$limit=20,$offset=0,$column='name',$orderby='asc',$search_field = NULL)
	{
		if (!$deleted)
		{
			$deleted = 0;
		}
		
		$this->db->from('locations');
		
		if ($search)
		{
				if ($search_field)
				{
					$this->db->where("$search_field LIKE '".$this->db->escape_like_str($search)."%' and deleted=$deleted");		
				}
				else
				{

					$search_terms_array=explode(" ", $this->db->escape_like_str($search));
				
					//to keep track of which search term of the array we're looking at now	
					$search_name_criteria_counter=0;
					$sql_search_name_criteria = '';
					//loop through array of search terms
					foreach ($search_terms_array as $x)
					{
						$sql_search_name_criteria.=
						($search_name_criteria_counter > 0 ? " AND " : "").
						"name LIKE '".(!$this->config->item('speed_up_search_queries') ? '%' : '').$this->db->escape_like_str($x)."%'";
				
						$search_name_criteria_counter++;
					}
	
					$this->db->where("((".
					$sql_search_name_criteria. ") or 
					address LIKE '".(!$this->config->item('speed_up_search_queries') ? '%' : '').$this->db->escape_like_str($search)."%' or 
					location_id LIKE '".(!$this->config->item('speed_up_search_queries') ? '%' : '').$this->db->escape_like_str($search)."%' or 
					phone LIKE '".(!$this->config->item('speed_up_search_queries') ? '%' : '').$this->db->escape_like_str($search)."%' or 
					email LIKE '".(!$this->config->item('speed_up_search_queries') ? '%' : '').$this->db->escape_like_str($search)."%') and deleted=$deleted");
			}
		}
		else
		{
			$this->db->where('deleted',$deleted);
		}
		
		if (!$this->config->item('speed_up_search_queries'))
		{
			$this->db->order_by($column, $orderby);
		}
		
		$this->db->limit($limit);
		$this->db->offset($offset);
		return $this->db->get();	
	}


	function get_locations_search_suggestions($search,$deleted=0,$limit=25)
	{
		if (!trim($search))
		{
			return array();
		}
		if (!$deleted)
		{
			$deleted = 0;
		}
		
		$suggestions = array();
		
			$this->db->select("location_id,name,color", false);
			$this->db->from('locations');
			$this->db->where('deleted', $deleted);
			$this->db->like("name",$search,!$this->config->item('speed_up_search_queries') ? 'both' : 'after');
			$this->db->limit($limit);	
		
			$by_name = $this->db->get();
		
			$temp_suggestions = array();
		
			foreach($by_name->result() as $row)
			{
				$data = array(
						'name' => $row->name,
						'color' => $row->color
						);

				$temp_suggestions[$row->location_id] = $data;		
		
		
			foreach($temp_suggestions as $key => $value)
			{
				$suggestions[]=array('value'=> $key, 'label' => $value['name'],'color'=>$value['color']);		
			}

			$this->db->select("location_id, color,address", false);
			$this->db->from('locations');
			$this->db->like("address",$search,!$this->config->item('speed_up_search_queries') ? 'both' : 'after');
			$this->db->limit($limit);
			
			$by_address = $this->db->get();
		
			$temp_suggestions = array();
		
			foreach($by_address->result() as $row)
			{
				$data = array(
						'name' => $row->address,
						'color' => $row->color
						);

				$temp_suggestions[$row->location_id] = $data;
			}
		
			foreach($temp_suggestions as $key => $value)
			{
				$suggestions[]=array('value'=> $key, 'label' => $value['name'],'color'=>$value['color']);
			}
		}
		
		
		for($k=count($suggestions)-1;$k>=0;$k--)
		{
			if (!$suggestions[$k]['label'])
			{
				unset($suggestions[$k]);
			}
		}
		
		$suggestions = array_values($suggestions);
		
		//only return $limit suggestions
		$suggestions = array_map("unserialize", array_unique(array_map("serialize", $suggestions)));
		if(count($suggestions) > $limit)
		{
			$suggestions = array_slice($suggestions, 0,$limit);
		}
		return $suggestions;

	}

	/*
	Deletes one location
	*/
	function delete($location_id)
	{
		$current_location_id= $this->Employee->get_logged_in_employee_current_location_id();

		//Don't let current logged in location be deleted
		if($current_location_id == $location_id || !$location_id)
			return false;
		
		//Run these queries as a transaction, we want to make sure we do all or nothing
		$this->db->trans_start();

		$this->db->where('location_id', $location_id);
		$this->db->delete('employees_locations');

		$this->db->where('location_id', $location_id);
		$this->db->delete('location_items');

		$this->db->where('location_id', $location_id);
		$this->db->delete('location_items_taxes');

		$this->db->where('location_id', $location_id);
		$this->db->delete('location_items_tier_prices');

		$this->db->where('location_id', $location_id);
		$this->db->delete('location_item_kits');

		$this->db->where('location_id', $location_id);
		$this->db->delete('location_item_kits_taxes');

		$this->db->where('location_id', $location_id);
		$this->db->delete('location_item_kits_tier_prices');
		
		$this->db->where('location_id', $location_id);
		$this->db->update('locations', array('deleted' => 1));
		
		return $this->db->trans_complete();		
	}
	
	function delete_list($location_ids)
	{	
		$location_id= $this->Employee->get_logged_in_employee_current_location_id();

		//Don't let current logged in location be deleted
		if(in_array($location_id,$location_ids) || empty($location_ids))
		return false;

		$this->db->where_in('location_id',$location_ids);
		return $this->db->update('locations', array('deleted' => 1));
 	}
	
	function undelete_list($location_ids)
	{	
		$location_id= $this->Employee->get_logged_in_employee_current_location_id();

		$this->db->where_in('location_id',$location_ids);
		return $this->db->update('locations', array('deleted' => 0));
 	}
	
	function assign_employees_to_location($location_id,$employees)
	{
		$this->db->trans_start();
		
		$this->db->delete('usuarios_locations', array('location_id' => $location_id));
		foreach($employees as $employee_id)
		{
			$this->db->insert('usuarios_locations',
			array(
			'usuario_id'=>$employee_id,
			'location_id'=>$location_id
			));
		}
		
		$this->db->trans_complete();
		return TRUE;
	}
	
	function get_merchant_id($override_location_id = FALSE)
	{	
		//TODO Make this work with register id + hosted checkout...it doesn't work in all cases right now 
		
		//EMV
		if ($this->get_info_for_key('emv_merchant_id', $override_location_id))
		{
			return $this->get_info_for_key('emv_merchant_id', $override_location_id);				
		}
		else //Default hosted checkout
		{
			return $this->get_info_for_key('hosted_checkout_merchant_id', $override_location_id);				
		}
	}
	
	function set_all_locations_use_global_tax()
	{
		return $this->db->update('locations',
			array(
				'default_tax_1_rate' => '',
				'default_tax_2_rate' => '',
				'default_tax_3_rate' => '',
				'default_tax_4_rate' => '',
				'default_tax_5_rate' => '',
				'default_tax_1_name' => '',
				'default_tax_2_name' => '',
				'default_tax_3_name' => '',
				'default_tax_4_name' => '',
				'default_tax_5_name' => '',
				'tax_class_id' => NULL,
			));
	}
	
	function all_locations_use_global_tax()
	{
		$this->db->from('locations');
		$this->db->group_start();
		$this->db->or_where('default_tax_1_rate != ""');
		$this->db->or_where('default_tax_2_rate != ""');
		$this->db->or_where('default_tax_3_rate != ""');
		$this->db->or_where('default_tax_4_rate != ""');
		$this->db->or_where('default_tax_5_rate != ""');
		$this->db->or_where('tax_class_id IS NOT NULL');
		$this->db->group_end();
		$this->db->where('deleted',0);
		
		return $this->db->count_all_results() == 0;
	}

}
?>
