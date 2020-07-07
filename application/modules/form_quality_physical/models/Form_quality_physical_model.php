<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_quality_physical_model extends CI_Model {

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
	public function get_form_quality_physical()
	{
		$query = $this->db->get('form_quality_physical');
		return $query->result_array(); 
	}
	public function get_form_quality_physical_detail($id)
	{
		$query = $this->db->where('id',$id)
			->get('form_quality_physical');
		return $query->result_array();
		
	}
	public function insert_data($input)
	{
		$this->db->trans_start();
		$this->db->insert('form_quality_physical',$input);
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
		$this->db->where('id',$input['id'])
			->update('form_quality_physical',$input);
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

	
	public function get_data($research_id)
	{
		$this->db->where('research_id',$research_id)
			->order_by('entry,id','asc')
			->join('pedigree','pedigree.pedigree_id = form_quality_physical.pedigree_id');
		$query = $this->db->get('form_quality_physical');
		return $query->result_array(); 
	}
	public function check_data($research_id)
	{

		$query = $this->db->where('research_id',$research_id)
			->get('form_quality_physical',1);
		return $query->num_rows(); 
	}
	public function get_department_all()
	{
		$query = $this->db->get('department');
		return $query->result_array(); 
	}
	public function get_research_pedigree($research_id)
	{
		$this->db->where('research_id',$research_id)
			->order_by('entry,rp_id','asc')
			->join('pedigree','pedigree.pedigree_id = research_pedigree.pedigree_id');
		$query = $this->db->get('research_pedigree');
		return $query->result_array(); 
	}
	public function clear_data($research_id)
	{
		$this->db->trans_start();
		$this->db->where('research_id',$research_id)
			->delete('form_quality_physical');
		$this->db->trans_complete();
	}
}
