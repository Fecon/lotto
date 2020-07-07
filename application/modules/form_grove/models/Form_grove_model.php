<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_grove_model extends CI_Model {


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
		$this->db->insert('form_grove',$input);
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
			->update('form_grove',$input);
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
		$query = $this->db->get('form_grove');
		return $query->result_array(); 
	}
	public function check_data($research_id)
	{

		$query = $this->db->where('research_id',$research_id)
			->get('form_grove',1);
		return $query->num_rows(); 
	}

}
