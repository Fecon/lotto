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
	public function rn_insert($list_data, $lotto_id)
	{
		$this->db->trans_start();

		$this->db->where('lotto_id',$lotto_id);
		$this->db->delete('reserve_number');

		$this->db->insert_batch('reserve_number', $list_data);
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

	public function rn_delete($lotto_id)
	{
		$this->db->where('lotto_id',$lotto_id);
		$this->db->delete('reserve_number');
	}

	public function lotto_delete($id)
	{
		$this->db->trans_start();

		$this->db->where('lotto_id',$id);
		$this->db->delete('buy');

		$this->db->where('id',$id);
		$this->db->delete('lotto');

		$this->db->trans_complete();
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
	public function get_reserve_number2($lotto_id)
	{
		$this->db->where('lotto_id',$lotto_id)
							->where('pay2',0);
		$query = $this->db->get('reserve_number');
		return $query->result_array();
	}
	public function get_reserve_number3($lotto_id)
	{
		$this->db->where('lotto_id',$lotto_id)
							->where_not_in('pay2', "");
		$query = $this->db->get('reserve_number');
		return $query->result_array();
	}
	public function get_lotto($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('lotto');
		return $query->result_array();
	}

	public function get_lottoInfo($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('lotto')
		->result_array();
		return $query[0];
	}

}
