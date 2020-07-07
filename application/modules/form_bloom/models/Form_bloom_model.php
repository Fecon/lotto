<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_bloom_model extends CI_Model {

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
	public function insert_data($input)
	{
		$this->db->trans_start();
		$this->db->insert('form_bloom',$input);
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
			->update('form_bloom',$input);
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
	public function get_pest_animal()
	{
		$query = $this->db->get('pest_animal');
		return $query->result_array(); 
	}
	public function get_pest_disease()
	{
		$query = $this->db->get('pest_disease');
		return $query->result_array(); 
	}
	public function get_pest_insect()
	{
		$query = $this->db->get('pest_insect');
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
			->order_by('plot_no','asc');
		$query1 = $this->db->get('form_bloom');
		$query = $query1->result_array(); 

		foreach ($query as $key => $value) {
			if(!empty($value['grain'])){
				$date1 = date_create_from_format('Y-m-d', $value['grain']);
				$grain = date_format($date1, 'd/m/Y');
				$query[$key]['grain'] = $grain ; 
			}
			
			if(!empty($value['bloom50'])){
				$date2 = date_create_from_format('Y-m-d', $value['bloom50']);
				$bloom50 = date_format($date2, 'd/m/Y');
				$query[$key]['bloom50'] = $bloom50 ; 
			}

			if(!empty($value['bloom75'])){
				$date3 = date_create_from_format('Y-m-d', $value['bloom75']);
				$bloom75 = date_format($date3, 'd/m/Y');
				$query[$key]['bloom75'] = $bloom75 ;
			}
			 
		}

		return $query; 

	}
	public function get_pedigree_detail($pedigree_id)
	{
		$this->db->where('pedigree_id',$pedigree_id);
		$query = $this->db->get('pedigree');
		return $query->result_array(); 
	}
	public function check_data($research_id)
	{
		$query = $this->db->where('research_id',$research_id)
			->get('form_bloom',1);
		return $query->num_rows(); 
	}
	public function get_research_date($research_id)
	{
		$this->db->where('research_date.research_id',$research_id)
			->where('research_date.research_date_type',1)
			->order_by('research_date.research_date_type','asc')
			->join('research_date_type','research_date_type.id = research_date.research_date_type','left');
		$query1 = $this->db->get('research_date');
		$query = $query1->result_array(); 

		foreach ($query as $key => $value) {
			if(!empty($value['research_date_value'])){
				$date1 = date_create_from_format('Y-m-d', $value['research_date_value']);
				$date_value = date_format($date1, 'd/m/Y');
				$query[$key]['research_date_value'] = $date_value ; 
			}
		}

		return $query;
	}
	
}
