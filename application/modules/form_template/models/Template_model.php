<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_model extends CI_Model {

	public function get_research_detail($research_id)
	{ 
		$query = $this->db->select('dep_no,status')
			->where('research.research_id',$research_id)
			->get('research');
		
			if ($query->num_rows() > 0){
				$result = $query->result_array(); 
				return $result[0] ;
			}
		
	}	
	public function research_dept($research_id)
	{
		$query = $this->db->select('department.dep_zone,research.status')
			->where('research.research_id',$research_id)
			->join('department','department.dep_no = research.dep_no')
			->get('research')
			->result_array();

		foreach ($query as $key => $value) {
			$result = $this->db->select('dep_no')
			->where('department.dep_zone',$value['dep_zone'])
			->get('department')
			->result_array();
			// $array[] += $result[0]['dep_no']);
			$result = array_map('current', $result);
			$query[$key]['research_dept'] = $result ;

		}

		return $query ;

	}
}
