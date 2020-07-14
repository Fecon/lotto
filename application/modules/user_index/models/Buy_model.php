<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buy_model extends CI_Model {


	public function list_agent()
	{
		$query = $this->db->get('agent');
		return $query->result_array();
	}
	public function get_lotto()
	{
		$query = $this->db
		->order_by('id','desc')
		->limit(1)
		->get('lotto');
		return $query->result_array();
	}
	public function list_user()
	{
		$query = $this->db->get('user');
		return $query->result_array();
	}
	public function agent_insert($list_data)
	{
		$this->db->trans_start();
		$this->db->insert('agent', $list_data);
		$this->db->trans_complete();
		if ($this->db->affected_rows() == '1') {
		    return TRUE;
		} else {
		    if ($this->db->trans_status() === FALSE) {
		        return false;
		    }
		    return true;
		}
	}
	public function agent_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('agent');
	}
	public function agent_update($list_data)
	{
		$this->db->trans_start();
		$this->db->where('id',$list_data['id']);
		$this->db->update('agent',$list_data);
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

	public function agent_change($input)
	{
		$this->db->where('id',$input['id']);
		$this->db->update('agent',$input);
	}
	public function get_profile($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('agent');
		return $query->result_array();
	}
	public function checkRepeat($type,$input)
	{
		$this->db->where($type,$input);
		$query = $this->db->get("agent");
		return $query->num_rows();
	}

}
