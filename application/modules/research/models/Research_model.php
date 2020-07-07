<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Research_model extends CI_Model {

	public function get_research_all()
	{
		$query = $this->db->get('research');
		return $query->result_array(); 
	}
	public function get_research_geo()
	{
		$query1 = $this->db->get('department_geography');
		$query = $query1->result_array(); 
		foreach ($query as $key => $value) {
			$this->db->where('department.dep_zone',$value['GEO_ID'])
				->where('status',1)
				->order_by('research_year','desc')
				->join('department','department.dep_no = research.dep_no');
			$query2 = $this->db->get('research');
			$query[$key]['research_pending'] = $query2->result_array(); 
		}
		foreach ($query as $key => $value) {
			$this->db->where('department.dep_zone',$value['GEO_ID'])
				->where('status',2)
				->order_by('research_year','desc')
				->join('department','department.dep_no = research.dep_no');
			$query2 = $this->db->get('research');
			$query[$key]['research_done'] = $query2->result_array(); 
		}
		return $query ; 
	}
	public function list_user()
	{
		$this->db->select('
			user_id,
			user_no,
			username,
			user_role,
			user_status,
			dep_no,
			name,
			email,
			mobile,
			user_image')
		->where('user_status',1);

		$query = $this->db->get('user');

		return $query->result_array();
	}
	public function get_type_of_ecology()
	{
		$query = $this->db->get('type_of_ecology');
		return $query->result_array(); 
	}
	public function get_type_of_research()
	{
		$query = $this->db->get('type_of_research');
		return $query->result_array(); 
	}
	public function get_resistance_bug()
	{
		$query = $this->db->get('resistance_bug');
		return $query->result_array(); 
	}
	public function get_research_detail($research_id)
	{ 
		$query = $this->db->select('
			research.*,
			type_of_research.tor_name ,
			type_of_ecology.toe_name ,
			user.* ,
			department.*
			')
			->where('research.research_id',$research_id)
			->join('type_of_research','type_of_research.tor_id = research.type_of_research')
			->join('type_of_ecology','type_of_ecology.toe_id = research.type_of_ecology')
			->join('user','user.user_id = research.user_id','left')
			->join('department','department.dep_no = research.dep_no')
			->get('research');
		
			if ($query->num_rows() > 0){
				$result = $query->result_array(); 
				return $result[0] ;
			}
		
	}
	public function insert_research($input)
	{

		//////////// Operation ////////////
		$this->db->insert('research',$input);
		$research_id = $this->db->insert_id();
		return $research_id;
		////////// End Operation //////////

	}
	public function update_research($input)
	{
		$this->db->trans_start();
		//////////// Operation ////////////
		$this->db->where('research_id',$input['research_id'])
			->update('research',$input);
		////////// End Operation //////////
		$this->db->trans_complete();
		// was there any update or error?
		if ($this->db->affected_rows() == '1') {
		    return TRUE;
		} else {
		    // any trans error?
		    if ($this->db->trans_status() === FALSE) {
		        return false;
		    }
		    return true;
		}
	}

	public function get_pedigree_all()
	{
		$query = $this->db->get('pedigree');
		return $query->result_array(); 
	}
	public function get_department_geo()
	{
		$query1 = $this->db->get('department_geography');
		$query = $query1->result_array(); 
		foreach ($query as $key => $value) {
			$this->db->select('dep_id,dep_no,dep_name,dep_shotname_th,dep_shotname_en')
				->where('department.dep_zone',$value['GEO_ID'])
				->where('department_status',1);
			$query2 = $this->db->get('department');
			$query[$key]['department_list'] = $query2->result_array();
		}
		return $query ;
	}
	public function get_department_user($dep_no,$dep_zone)
	{
		$query1 = $this->db->where('GEO_ID',$dep_zone)->get('department_geography');
		$query = $query1->result_array(); 
		foreach ($query as $key => $value) {
			$this->db->select('dep_id,dep_no,dep_name,dep_shotname_th,dep_shotname_en')
				->where('department.dep_zone',$value['GEO_ID'])
				->where('dep_no',$dep_no)
				->where('department_status',1);
			$query2 = $this->db->get('department');
			$query[$key]['department_list'] = $query2->result_array();
		}
		return $query ;
	}
	public function get_research_pedigree($research_id)
	{
		$this->db->where('research_id',$research_id)
			->order_by('entry,rp_id')
			->join('pedigree','pedigree.pedigree_id = research_pedigree.pedigree_id');
		$query = $this->db->get('research_pedigree');
		return $query->result_array(); 
	}
	public function get_pedigree_plot($research_id)
	{
		$this->db->where('research_pedigree_plot.research_id',$research_id)
			->join('research_pedigree','research_pedigree.rp_id = research_pedigree_plot.rp_id');
		$query = $this->db->get('research_pedigree_plot');
		return $query->result_array(); 
	}
	public function get_pedigree_plot_repeat($research_id,$repeat)
	{
		$this->db->select('
			research_pedigree_plot.ped_plot_id,
			research_pedigree_plot.research_id,
			research_pedigree_plot.rp_id,
			research_pedigree_plot.entry,
			research_pedigree_plot.plot_no,
			research_pedigree_plot.block,
			research_pedigree_plot.repeat,
			research_pedigree_plot.status,
			pedigree.designation
			
			')
			->where('research_pedigree_plot.research_id',$research_id)
			->where('research_pedigree_plot.repeat',$repeat)
			->order_by('research_pedigree_plot.plot_no','asc')
			->join('research_pedigree','research_pedigree.rp_id = research_pedigree_plot.rp_id')
			->join('pedigree','pedigree.pedigree_id = research_pedigree.pedigree_id');
		$query = $this->db->get('research_pedigree_plot');
		return $query->result_array(); 
	}
	public function get_pedigree_detail($pedigree_id)
	{
		$this->db->where('pedigree_id',$pedigree_id);
		$query = $this->db->get('pedigree');
		return $query->result_array(); 
	}
	public function get_department_all()
	{
		$query = $this->db->get('department');
		return $query->result_array(); 
	}
	public function insert_pedigree($input)
	{
		$this->db->trans_start();
		$this->db->insert('pedigree',$input);
		$this->db->trans_complete();
		// was there any insert or error?
		if ($this->db->affected_rows() == '1') {
		    return TRUE;
		} else {
		    // any trans error?
		    if ($this->db->trans_status() === FALSE) {
		        return false;
		    }
		    return true;
		}
	}
	public function insert_research_pedigree($input)
	{
		$this->db->trans_start();
		$this->db->insert('research_pedigree',$input);
		$this->db->trans_complete();
		// was there any insert or error?
		if ($this->db->affected_rows() == '1') {
		    return TRUE;
		} else {
		    // any trans error?
		    if ($this->db->trans_status() === FALSE) {
		        return false;
		    }
		    return true;
		}
	}
	public function insert_pedigree_plot($input)
	{
		$this->db->trans_start();
		$this->db->insert('research_pedigree_plot',$input);
		$this->db->trans_complete();
		// was there any insert or error?
		if ($this->db->affected_rows() == '1') {
		    return TRUE;
		} else {
		    // any trans error?
		    if ($this->db->trans_status() === FALSE) {
		        return false;
		    }
		    return true;
		}
	}
	public function update_research_pedigree($input)
	{
		$this->db->trans_start();
		$this->db->where('rp_id',$input['rp_id'])
				->update('research_pedigree',$input);
		$this->db->trans_complete();
		// was there any update or error?
		if ($this->db->affected_rows() == '1') {
		    return TRUE;
		} else {
		    // any trans error?
		    if ($this->db->trans_status() === FALSE) {
		        return false;
		    }
		    return true;
		}
	}
	public function delete_research_pedigree($research_id)
	{
		$this->db->where('research_id',$research_id)
				->delete('research_pedigree');
	}
	public function delete_pedigree_plot($research_id)
	{
		$this->db->where('research_id',$research_id)
				->delete('research_pedigree_plot');
	}
	
	public function check_data($research_id)
	{
		$query = $this->db->where('research_id',$research_id)
			->get('research_pedigree_plot',1);
		return $query->num_rows(); 
	}
	public function update_research_pedigree_plot($input)
	{
		$this->db->trans_start();
		$this->db->where('ped_plot_id',$input['ped_plot_id'])
				->update('research_pedigree_plot',$input);
		$this->db->trans_complete();
		// was there any update or error?
		if ($this->db->affected_rows() == '1') {
		    return TRUE;
		} else {
		    // any trans error?
		    if ($this->db->trans_status() === FALSE) {
		        return false;
		    }
		    return true;
		}
	}
	public function update_research_pedigree_plot_once($input)
	{
		$this->db->trans_start();
		$this->db->where('research_id',$input['research_id'])
				->where('plot_no',$input['plot_no'])
				->update('research_pedigree_plot',$input);
		$this->db->trans_complete();
		// was there any update or error?
		if ($this->db->affected_rows() == '1') {
		    return TRUE;
		} else {
		    // any trans error?
		    if ($this->db->trans_status() === FALSE) {
		        return false;
		    }
		    return true;
		}
	}
	public function insert_research_date($input)
	{
		$this->db->trans_start();
		$this->db->insert('research_date',$input);
		$this->db->trans_complete();
		// was there any insert or error?
		if ($this->db->affected_rows() == '1') {
		    return TRUE;
		} else {
		    // any trans error?
		    if ($this->db->trans_status() === FALSE) {
		        return false;
		    }
		    return true;
		}
	}
	public function update_research_date($input)
	{
		$this->db->trans_start();
		$this->db->where('research_date_id',$input['research_date_id'])
				->update('research_date',$input);
		$this->db->trans_complete();
		// was there any update or error?
		if ($this->db->affected_rows() == '1') {
		    return TRUE;
		} else {
		    // any trans error?
		    if ($this->db->trans_status() === FALSE) {
		        return false;
		    }
		    return true;
		}
	}
	public function get_research_date($research_id,$type)
	{
		$this->db->where('research_date.research_id',$research_id)
			->where('research_date.research_date_type',$type)
			->order_by('research_date.research_date_id','asc')
			->join('research_date_type','research_date_type.id = research_date.research_date_type','left');
		$query1 = $this->db->get('research_date');
		$query = $query1->result_array(); 

		foreach ($query as $key => $value) {
			if(!empty($value['research_date_value'])){
				$date1 = date_create_from_format('Y-m-d', $value['research_date_value']);
				$date_value = date_format($date1, 'Y-m-d');
				$query[$key]['research_date_value'] = $date_value ; 
			}
		}

		return $query;
	}
	public function clear_research_date($research_id)
	{
		$this->db->where('research_date.research_id',$research_id)
				->delete('research_date');
	}
	public function count_date_type()
	{
		$query = $this->db->get('research_date_type')
				->result_array(); 
		return $query;
	}

	public function get_water_lv_time($research_id)
	{
		$this->db->where('research_id',$research_id);
		$query = $this->db->get('form_water_level_time');
		return $query->result_array(); 
	}
	public function get_leaves_time($research_id)
	{
		$this->db->where('research_id',$research_id);
		$query = $this->db->get('form_leaves_time');
		return $query->result_array(); 
	}

	public function get_entry($research_id,$entry)
	{
		$query = $this->db->select('research_pedigree.pedigree_id')
			->where('entry',$entry)
			->where('research_id',$research_id)
			// ->join('pedigree','pedigree.pedigree_id = research_pedigree.pedigree_id')
			->get('research_pedigree')
			->result_array(); 
		if(!empty($query)){
			return $query[0]['pedigree_id'] ;
		}
		
	}
	public function get_average($research_id,$entry)
	{
		$query = array();

		$form_bloom = $this->db->select('
				AVG(day) as avg
			')
			->where_not_in('day',0)
			->where('entry',$entry)
			->where('research_id',$research_id)
			->get('form_bloom')
			->result_array(); 

		if(!empty($form_bloom)){
			$query['form_bloom'] = $form_bloom[0]['avg'] ;
		}else{
			$query['form_bloom'] = '' ;
		}

		$form_high = $this->db->select('
				AVG(average) as avg
			')
			->where_not_in('average',0)
			->where('entry',$entry)
			->where('research_id',$research_id)
			->get('form_high')
			->result_array(); 
		if(!empty($form_high)){
			$query['form_high'] = $form_high[0]['avg'] ;
		}else{
			$query['form_high'] = '' ;
		}

		$form_tree_grove = $this->db->select('
				AVG(average) as avg
			')
			->where_not_in('average',0)
			->where('entry',$entry)
			->where('research_id',$research_id)
			->get('form_tree_grove')
			->result_array(); 
		if(!empty($form_tree_grove)){
			$query['form_tree_grove'] = $form_tree_grove[0]['avg'] ;
		}else{
			$query['form_tree_grove'] = '' ;
		}

		$form_awn_grove = $this->db->select('
				AVG(average) as avg
			')
			->where_not_in('average',0)
			->where('entry',$entry)
			->where('research_id',$research_id)
			->get('form_awn_grove')
			->result_array(); 
		if(!empty($form_awn_grove)){
			$query['form_awn_grove'] = $form_awn_grove[0]['avg'] ;
		}else{
			$query['form_awn_grove'] = '' ;
		}

		$form_seed_good = $this->db->select('
				AVG(average) as avg
			')
			->where_not_in('average',0)
			->where('entry',$entry)
			->where('research_id',$research_id)
			->get('form_seed_good')
			->result_array(); 
		if(!empty($form_seed_good)){
			$query['form_seed_good'] = $form_seed_good[0]['avg'] ;
		}else{
			$query['form_seed_good'] = '' ;
		}

		$form_product = $this->db->select('
				AVG(product_kg_rai) as avg
			')
			->where_not_in('product_kg_rai',0)
			->where('entry',$entry)
			->where('research_id',$research_id)
			->get('form_product')
			->result_array(); 
		if(!empty($form_product)){
			$query['form_product'] = $form_product[0]['avg'] ;
		}else{
			$query['form_product'] = '' ;
		}

		$research_detail = $this->get_research_detail($research_id);

		$query['research_id'] = $research_id ;
		$query['entry'] = $entry ;
		$query['dep_no'] = $research_detail['dep_no'] ;
		$query['year'] = $research_detail['research_year'] ;
		$query['type_of_research'] = $research_detail['type_of_research'] ;

		$query['pedigree_id'] = $this->get_entry($research_id,$entry) ;

		return $query ;
		
	}
	public function insert_average($input)
	{
		$this->db->trans_start();
		$this->db->insert('average',$input);
		$this->db->trans_complete();
		// was there any insert or error?
		if ($this->db->affected_rows() == '1') {
		    return TRUE;
		} else {
		    // any trans error?
		    if ($this->db->trans_status() === FALSE) {
		        return false;
		    }
		    return true;
		}
	}
	public function insert_research_user($input)
	{
		//////////// Operation ////////////
		$this->db->insert('research_user',$input);
		////////// End Operation //////////
	}
	public function get_user_seleted($research_id)
	{
		$this->db->where('research_id',$research_id);
		$query = $this->db->get('research_user')->result_array(); 
		foreach ($query as $key => $value) {
			$result[] = $value['user_id'] ;
		}
		return $result ;
	}

}
