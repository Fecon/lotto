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

}
