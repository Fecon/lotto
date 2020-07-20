<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function list_lotto()
	{
		$query = $this->db
		->order_by('id','desc')
		->get('lotto');
		return $query->result_array();
	}
	
	public function list_agent()
	{
		$query = $this->db->get('agent');
		return $query->result_array();
	}

	public function get_lotto($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('lotto')
		->result_array();
		return $query[0];
	}

	public function get_agent($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('agent')->result_array();
		return $query[0];
	}

	public function get_latest_lotto()
	{
		$query = $this->db
		->order_by('id','desc')
		->limit(1)
		->get('lotto')
		->result_array();
		return $query[0];
	}

	public function get_agent_buy($agent_id,$lotto_id)
	{
		$query = $this->db
		->where('agent_id',$agent_id)
		->where('lotto_id',$lotto_id)
		->get('buy')
		->result_array();
		return $query;
	}

	public function get_reserve_number($lotto_id)
	{
		$query = $this->db
				->where('lotto_id',$lotto_id)
				->get('reserve_number');
		return $query->result_array();
	}

	public function get_pay_rate($lotto_id,$number)
	{
		$query = $this->db
				->where('lotto_id',$lotto_id)
				->where('number',$number)
				->get('reserve_number');
		return $query->result_array();
	}

	public function get_config()
	{
		$query = $this->db->get('config');
		return $query->result_array();
	}

	public function update_payback($list_data)
	{
		$this->db->trans_start();
		$this->db->where('id',$list_data['id']);
		$this->db->update('buy',$list_data);
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

}
