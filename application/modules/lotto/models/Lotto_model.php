<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lotto_model extends CI_Model {


	public function list_lotto()
	{
		$query = $this->db
		->order_by('id','desc')
		->get('lotto');
		return $query->result_array();
	}

	public function lotto_insert($list_data)
	{
		$this->db->trans_start();
		$this->db->insert('lotto', $list_data);
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
	public function lotto_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('lotto');
	}
	public function lotto_update($list_data)
	{
		$this->db->trans_start();
		$this->db->where('id',$list_data['id']);
		$this->db->update('lotto',$list_data);
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

	public function lotto_forget($lotto_email)
	{
		$this->db->where('email',$lotto_email);
		$query = $this->db->get('lotto');
		return $query->result_array();
	}
	public function re_password($mail)
	{
		$this->db->where('lotto_email',$mail);
		$query = $this->db->get('lotto');
		return $query->result_array();
	}
	public function lotto_change($inpost)
	{
		$this->db->where('lotto_id',$inpost['id']);
		$this->db->update('lotto',$inpost);
	}
	public function get_reserve_number($lotto_id)
	{
		$this->db->where('lotto_id',$lotto_id);
		$query = $this->db->get('reserve_number');
		return $query->result_array();
	}
	public function get_lotto($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('lotto');
		return $query->result_array();
	}
	public function checkRepeat($type,$inData)
	{
		$this->db->where($type,$inData);
		$query = $this->db->get("lotto");
		return $query->num_rows();
	}
}
