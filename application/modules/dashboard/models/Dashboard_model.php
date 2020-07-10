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

}
