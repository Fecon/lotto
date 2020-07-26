<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {


	public function list_user()
	{
		$query = $this->db
			->order_by('user_role','asc')
			->get('user');
		return $query->result_array();
	}
	public function user_insert($list_data)
	{
		$this->db->trans_start();
		$this->db->insert('user', $list_data);
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
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('user');
	}
	public function user_update($list_data)
	{
		$this->db->trans_start();
		$this->db->where('id',$list_data['id']);
		$this->db->update('user',$list_data);
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

	public function get_user($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('user');
		return $query->result_array();
	}

	public function change_status_all($data)
	{
		$this->db->where('user_role',2)
				->update('user',$data);
	}

}
