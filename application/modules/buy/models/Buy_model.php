<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buy_model extends CI_Model {


	public function list_agent($user_id)
	{
		$query = $this->db
				->where('user_id', $user_id)
				->order_by('name','asc')
				->get('agent');
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
	public function buy_insert($list_data)
	{
		$this->db->trans_start();
		$this->db->insert_batch('buy', $list_data);
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

}
