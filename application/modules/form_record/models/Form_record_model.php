<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_record_model extends CI_Model {


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
		$this->db->insert('form_record',$input);
		$insert_id = $this->db->insert_id();
   		return  $insert_id;
		$this->db->trans_complete();

	}
	public function insert_filename($input)
	{
		echo "<pre>";
		print_r($input);

		$this->db->trans_start();
		$this->db->insert('form_record_attachment',$input);
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
			->update('form_record',$input);
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
			->join('user','user.user_id=form_record.user_id');
		$query1 = $this->db->get('form_record');
		$query = $query1->result_array();

		foreach ($query as $key => $value) {
			$this->db->where('record_id',$value['id']);
			$query2 = $this->db->get('form_record_attachment');
			$query[$key]['attachment'] = $query2->result_array(); 
		}
		return $query; 
	}
	public function get_detail($record_id)
	{
		$this->db->where('id',$record_id);
		$query1 = $this->db->get('form_record');
		$query = $query1->result_array();

		foreach ($query as $key => $value) {
			$this->db->where('record_id',$value['id']);
			$query2 = $this->db->get('form_record_attachment');
			$query[$key]['attachment'] = $query2->result_array(); 
		}
		return $query; 
	}
	public function check_data($research_id)
	{
		$query = $this->db->where('research_id',$research_id)
			->get('form_record',1);
		return $query->num_rows(); 
	}
	public function delete_attachment($file_id)
	{
		$query = $this->db->where('file_id',$file_id)
			->delete('form_record_attachment');
	}
	public function record_delete($id)
	{
		$query = $this->db->where('id',$id)
			->delete('form_record');
	}

}
