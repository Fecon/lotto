<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lost_grove_model extends CI_Model {

	public function get_research_all()
	{
		$query = $this->db->get('research');
		return $query->result_array(); 
	}
	public function get_comment($research_id,$form_type)
	{
		$query = $this->db->where('research_id',$research_id)
					->where('form_type',$form_type)
					->get('comment');
		return $query->result_array(); 
	}
	public function get_research_geo()
	{
		$query1 = $this->db->get('department_geography');
		$query = $query1->result_array(); 
		foreach ($query as $key => $value) {
			$this->db->where('department.dep_zone',$value['GEO_ID'])
				->where('status',1)
				->join('department','department.dep_no = research.dep_no');
			$query2 = $this->db->get('research');
			$query[$key]['research_pending'] = $query2->result_array(); 
		}
		foreach ($query as $key => $value) {
			$this->db->where('department.dep_zone',$value['GEO_ID'])
				->where('status',2)
				->join('department','department.dep_no = research.dep_no');
			$query2 = $this->db->get('research');
			$query[$key]['research_done'] = $query2->result_array(); 
		}
		return $query ; 
	}
	
	public function get_type_of_research()
	{
		$query = $this->db->get('type_of_research');
		return $query->result_array(); 
	}
	public function get_research_detail($research_id)
	{ 
		$query = $this->db->where('research.research_id',$research_id)
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
	public function insert_data($table,$input)
	{
		//////////// Operation ////////////
		$this->db->insert($table,$input);
		$id = $this->db->insert_id();
		return $id;
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
		$this->db->where('research_pedigree_plot.research_id',$research_id)
			->where('research_pedigree_plot.repeat',$repeat)
			->order_by('research_pedigree_plot.plot_no','asc');
			//->join('research_pedigree','research_pedigree.rp_id = research_pedigree_plot.rp_id');
		$query = $this->db->get('research_pedigree_plot');
		return $query->result_array(); 
	}
	public function get_data($research_id,$repeat)
	{
		$this->db->where('research_id',$research_id)
			->where('repeatedly',$repeat)
			//->where('keep_time_id',$keep_time_id)
			->order_by('plot_no','asc');
		$query = $this->db->get('form_lost_grove');
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
	public function get_department_geo()
	{
		$query1 = $this->db->get('department_geography');
		$query = $query1->result_array(); 
		foreach ($query as $key => $value) {
			$this->db->where('department.dep_zone',$value['GEO_ID']);
			$query2 = $this->db->get('department');
			$query[$key]['department'] = $query2->result_array(); 
		}
		return $query ;  
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
	public function update_keep_date($input)
	{
		$this->db->trans_start();
		//////////// Operation ////////////
		$this->db->where('keep_date_id',$input['keep_date_id'])
			->update('form_water_level_time',$input);
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
	public function update_data($input)
	{
		$this->db->trans_start();
		//////////// Operation ////////////
		$this->db->where('id',$input['id'])
			->update('form_lost_grove',$input);
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
	public function check_data($research_id)
	{

		$query = $this->db->where('research_id',$research_id)
			->get('form_lost_grove',1);
		return $query->num_rows(); 
	}
	public function update_comment($input)
	{
		$this->db->trans_start();
		//////////// Operation ////////////
		$this->db->where('research_id',$input['research_id'])
			->where('form_type',$input['form_type'])
			->update('comment',$input);
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

}
