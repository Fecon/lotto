<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {

	public function get_comment($research_id,$form_type)
	{
		$query = $this->db->where('research_id',$research_id)
					->where('form_type',$form_type)
					->get('comment');
		return $query->result_array(); 
	}
	public function get_comment_sub($research_id,$form_type,$id)
	{
		$query = $this->db->where('research_id',$research_id)
					->where('form_type',$form_type)
					->where('form_sub_id',$id)
					->get('comment');
		return $query->result_array(); 
	}
	public function insert_data($input)
	{
		$this->db->trans_start();
		$this->db->insert('comment',$input);
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
	
	public function update_comment($input)
	{
		$this->db->trans_start();
		$this->db
			->where('research_id',$input['research_id'])
			->where('form_type',$input['form_type'])
			->update('comment',$input);
		$this->db->trans_complete();
		// was there any update or error?
		if ($this->db->affected_rows() == '1') {
		    return TRUE;
		} else {
		    // any trans error?
		    if ($this->db->trans_status() === FALSE) {
		        return false;
		    }
		    $this->db->insert('comment',$input);
		}
	}

	public function clear_comment($input)
	{
		$this->db
			->where('research_id',$input['research_id'])
			->where('form_type',$input['form_type'])
			->delete('comment');
	}

	public function clear_comment_sub($input)
	{
		$this->db
			->where('research_id',$input['research_id'])
			->where('form_type',$input['form_type'])
			->where('form_sub_id',$input['form_sub_id'])
			->delete('comment');
	}

}
