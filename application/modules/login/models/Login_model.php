<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function get_profile($input)
	{
		$this->db->where('username',$input['username']) ;
		$query = $this->db->get('user');
		return $query->result_array(); 
	}
	public function get_user($input)
	{
		$this->db->select('
			user.username,
			user.password,
			')
				->where('username',$input['username']);
		$query = $this->db->get('user');
		return $query->result_array(); 
	}

	public function check_login($input)
	{
		$this->db->select('
			user.username,
			user.password,
			')
				->where('username',$input['username'])
				->where('password',$input['password'])
				->where('status',1);
		$query = $this->db->get('user');
		return $query->result_array(); 
	}
	
}
