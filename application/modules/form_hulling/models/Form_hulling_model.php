<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_hulling_model extends CI_Model {

	public function get_pedigree_detail($pedigree_id)
	{
		$query = $this->db->where('pedigree_id',$pedigree_id)
			->get('pedigree');
		return $query->result_array(); 
	}

	public function get_research_detail($research_id)
	{ 
		$query = $this->db->where('research_id',$research_id)
			->get('research');
		
			if ($query->num_rows() > 0){
				$result = $query->result_array(); 
				return $result[0] ;
			}
		
	}
	public function insert_data($input)
	{
		$this->db->insert('form_hulling',$input);
		$id = $this->db->insert_id();
		return $id ;
	}
	
	public function insert_repeat_data($input)
	{
		$this->db->insert('form_hulling_repeat',$input);
	}
	
	public function get_data($research_id,$pedigree_id)
	{

		$this->db->where('form_hulling.research_id',$research_id)
				->where('form_hulling.pedigree_id',$pedigree_id);
			//->join('research_pedigree','research_pedigree.rp_id = research_pedigree_plot.rp_id');
		$query1 = $this->db->get('form_hulling');
		$query = $query1->result_array(); 
		
		return $query ;
	}
	
	public function update_data($input)
	{
		$this->db->trans_start();
		//////////// Operation ////////////
		$this->db->where('id',$input['id'])
			->update('form_hulling',$input);
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
	public function check_data($research_id,$pedigree_id)
	{
		$query = $this->db->where('research_id',$research_id)
			->where('pedigree_id',$pedigree_id)
			->get('form_hulling',1);
		$result = $query->num_rows(); 
		return $result ;
	}
}
