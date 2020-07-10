<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function count_research_all()
	{
		$query = $this->db->where_not_in('status',0)
				->get('research');
		return $query->num_rows(); 
	}
	public function count_research_year($year)
	{
		$query = $this->db->where_not_in('status',0)
				->where('research_year',$year)
				->get('research');
		return $query->num_rows(); 
	}
	public function count_research_status($status,$year)
	{
		$query = $this->db->where('status',$status)
				// ->where('research_year',$year)
				->get('research');
		return $query->num_rows(); 
	}
	
	public function get_research_geo()
	{
		$query1 = $this->db->get('department_geography');
		$query = $query1->result_array(); 
		foreach ($query as $key => $value) {
			$query2 = $this->db
				->where('department.dep_zone',$value['GEO_ID'])
				->where('department_status',1)
				->where_not_in('research.status',0)
				->join('department','department.dep_no = research.dep_no')
				->get('research');
			$query[$key]['count_geo_research'] = $query2->num_rows();
			$query2 = $this->db
				->where('department.dep_zone',$value['GEO_ID'])
				->where('department_status',1)
				->where('research.status',1)
				->join('department','department.dep_no = research.dep_no')
				->get('research');
			$query[$key]['count_geo_research_pending'] = $query2->num_rows();

			$query[$key]['count_geo_research_done'] = $query[$key]['count_geo_research'] - $query[$key]['count_geo_research_pending'] ;
		}
		return $query ; 
	}

}
