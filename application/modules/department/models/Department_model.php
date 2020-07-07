<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department_model extends CI_Model {

	
	public function get_department_all()
	{
		$query = $this->db->get('department');
		return $query->result_array(); 
	}
	public function get_department($dep_id)
	{
		$query1 = $this->db->where('dep_id',$dep_id)
			->join('department_geography','department_geography.GEO_ID = department.dep_zone')
			->get('department');
		$query = $query1->result_array(); 

		foreach ($query as $key => $value) {
				$this->db->select('
					research_id,
					research_name,
					research_create_date,
					research.status,
					name')
					->where('research.dep_no',$value['dep_no'])
					->order_by('research_id','desc')
					->join('user','user.user_id = research.user_id','left');
				$query2 = $this->db->get('research');
				$query[$key]['research'] = $query2->result_array(); 
		} 
		return $query ; 
	}
	public function get_research_geo()
	{
		$query1 = $this->db->get('department_geography');
		$query = $query1->result_array(); 
		foreach ($query as $key => $value) {
			$this->db->select('dep_id,dep_no,dep_name,dep_shotname_th,dep_shotname_en')
				->where('department.dep_zone',$value['GEO_ID'])
				->where('department_status',1);
			$query2 = $this->db->get('department');
			$query[$key]['department_list'] = $query2->result_array();

			foreach ($query[$key]['department_list'] as $key2 => $value2) {
				$this->db->select('research_id,research_name')
					->where('dep_no',$value2['dep_no'])
					->where('status',1)
					->limit(1);
				$query3 = $this->db->get('research');
				$query[$key]['department_list'][$key2]['research'] = $query3->result_array(); 
			} 
		}
		return $query ; 
	}
	public function update_department($input)
	{
		$this->db->trans_start();
		//////////// Operation ////////////
		$this->db->where('dep_id',$input['dep_id'])
			->update('department',$input);
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
