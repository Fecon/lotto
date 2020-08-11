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

	public function list_lotto()
	{
		$query = $this->db
			->order_by('id','desc')
			->get('lotto');
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

	public function get_agent($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('agent')->result_array();
		return $query;
	}

	public function get_agents()
	{
		$query = $this->db
				->order_by('name','asc')
				->get('agent');
		return $query->result_array();
	}

	public function get_agent_buy($agent_id,$lotto_id,$type)
	{
		$query = $this->db
		->where('agent_id',$agent_id)
		->where('lotto_id',$lotto_id)
		->where('type',$type)
		->order_by('id','desc')
		->get('buy')
		->result_array();
		return $query;
	}

	public function get_buy($agent_id,$lotto_id)
	{
		$query = $this->db
		->select('buy.number , agent.name , buy.top , buy.bottom')
		->where('agent_id',$agent_id)
		->where('lotto_id',$lotto_id)
		->join('agent', 'agent.id = buy.agent_id')
		->get('buy')
		->result_array();
		return $query;
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

	public function buy_update($list_data)
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

	public function buy_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('buy');

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
