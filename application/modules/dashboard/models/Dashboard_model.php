<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

	public function list_lotto()
	{
		$query = $this->db
			->order_by('id', 'desc')
			->get('lotto');
		return $query->result_array();
	}

	public function list_agent()
	{
		$query = $this->db
			->order_by('name', 'asc')
			->get('agent');
		return $query->result_array();
	}

	public function get_agents($id)
	{
		$this->db->where('id', $id);
		$query = $this->db
			->get('agent')
			->result_array();
		return $query;
	}

	public function get_lotto($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('lotto')
			->result_array();
		return $query[0];
	}

	public function get_agent($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('agent')->result_array();
		return $query[0];
	}

	public function get_latest_lotto()
	{
		$query = $this->db
			->order_by('id', 'desc')
			->limit(1)
			->get('lotto')
			->result_array();
		return $query[0];
	}

	public function get_agent_buy($agent_id, $lotto_id)
	{
		$query = $this->db
			->where('agent_id', $agent_id)
			->where('lotto_id', $lotto_id)
			->get('buy')
			->result_array();
		return $query;
	}

	public function get_buy($lotto_id)
	{
		$query = $this->db
			->where('lotto_id', $lotto_id)
			->get('buy')
			->result_array();
		return $query;
	}

	public function get_reserve_number($lotto_id)
	{
		$query = $this->db
			->where('lotto_id', $lotto_id)
			->get('reserve_number');
		return $query->result_array();
	}

	public function get_pay_rate($lotto_id, $number)
	{
		$query = $this->db
			->where('lotto_id', $lotto_id)
			->where('number', $number)
			->get('reserve_number');
		return $query->result_array();
	}

	public function get_tod_pay_rate($lotto_id, $number)
	{
		$query = $this->db
			->where('lotto_id', $lotto_id)
			->where('number', $number)
			->or_where('3_1', $number)
			->or_where('3_2', $number)
			->or_where('3_3', $number)
			->or_where('3_4', $number)
			->or_where('3_5', $number)
			->or_where('3_6', $number)
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
		$this->db->where('id', $list_data['id']);
		$this->db->update('buy', $list_data);
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

	public function get_sum_agent_buy($lotto_id, $number, $agent_id)
	{
		$query = $this->db
			->select('number')
			->select_sum('top')
			->select_sum('bottom')
			->select_sum('pay')
			->select_sum('pay2')
			->select_sum('total_pay')
			->where('lotto_id', $lotto_id)
			->where('number', $number)
			->where('agent_id', $agent_id)
			->get('buy')
			->result_array();
		return $query[0];
	}

	public function get_sum_agent_received($lotto_id, $agent_id)
	{
		$query = $this->db
			->select_sum('top')
			->select_sum('bottom')
			->select_sum('pay')
			->select_sum('pay2')
			->select_sum('total_pay')
			->where('lotto_id', $lotto_id)
			->where('agent_id', $agent_id)
			->get('buy')
			->result_array();
		return $query[0];
	}

	public function get_sum_agents_received($lotto_id)
	{
		$query = $this->db
			->select('agent.*')
			->order_by('agent.name', 'asc')
			->get('agent')
			->result_array();

		foreach ($query as $key => $value) {
			$query2 = $this->db
				->select_sum('top')
				->select_sum('bottom')
				->select_sum('pay')
				->select_sum('pay2')
				->select_sum('total_pay')
				->where('lotto_id', $lotto_id)
				->where('buy.agent_id', $value['id'])
				->get('buy')
				->result_array();

			$query[$key] = array_merge($query[$key], $query2[0]);
		}
		return $query;
	}

	public function get_sum_agent_type_received($lotto_id, $agent_id, $type)
	{
		$query = $this->db
			->select_sum('top')
			->select_sum('bottom')
			->select_sum('pay')
			->select_sum('pay2')
			->select_sum('total_pay')
			->where('type', $type)
			->where('lotto_id', $lotto_id)
			->where('agent_id', $agent_id)
			->get('buy')
			->result_array();
		return $query[0];
	}

	public function get_sum_received($lotto_id, $type)
	{
		$query = $this->db
			->select_sum('top')
			->select_sum('bottom')
			->select_sum('pay')
			->select_sum('pay2')
			->select_sum('total_pay')
			->where('type', $type)
			->where('lotto_id', $lotto_id)
			->get('buy')
			->result_array();
		return $query[0];
	}

	public function get_sum_buy($lotto_id, $number)
	{
		$query = $this->db
			->select('number')
			->select_sum('top')
			->select_sum('bottom')
			->select_sum('pay')
			->select_sum('pay2')
			->select_sum('total_pay')
			->where('lotto_id', $lotto_id)
			->where('number', $number)
			->get('buy')
			->result_array();
		return $query[0];
	}

	public function get_total_buy_number($lotto_id, $type, $subtype, $lessthan)
	{
		$query = $this->db->distinct()
			->select("number")
			->where('lotto_id', $lotto_id)
			->where('type', $type)
			->get('buy')
			->result_array();

		foreach ($query as $key => $value) {
			$query2 = $this->db
				->select_sum($subtype)
				->where('lotto_id', $lotto_id)
				->where('number', $value['number'])
				->get('buy')
				->result_array();

			if ($query2[0][$subtype] <= $lessthan) {
				unset($query[$key]);
			} else {
				$query[$key]['sent'] = $query2[0][$subtype];
			}
		}
		return $query;
	}

	public function get_agent_buy_number($lotto_id, $type, $subtype, $lessthan, $agent_id)
	{
		$query = $this->db->distinct()
			->select("number")
			->where('lotto_id', $lotto_id)
			->where('agent_id', $agent_id)
			->where('type', $type)
			->get('buy')
			->result_array();

		foreach ($query as $key => $value) {
			$query2 = $this->db
				->select_sum($subtype)
				->where('lotto_id', $lotto_id)
				->where('number', $value['number'])
				->where('agent_id', $agent_id)
				->where('type', $type)
				->get('buy')
				->result_array();

			if ($query2[0][$subtype] <= $lessthan) {
				unset($query[$key]);
			} else {
				$query[$key]['sent'] = $query2[0][$subtype];
			}
		}
		return $query;
	}
}
