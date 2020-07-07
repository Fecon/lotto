<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail_model extends CI_Model {

	public function get_administrator()
	{
		$this->db->select('user_email');
		$this->db->where('user_level',1);
		$query = $this->db->get('user');
		return $query->result_array(); 
	}
	public function get_ticket_detail($ticket_id)
	{ 
		$this->db->where('ticket_id',$ticket_id);
		$this->db->join('user','user.user_id = ticket.user_id');
		$this->db->join('project','project.project_id = ticket.project_id');
		$this->db->join('ticket_category','ticket_category.category_id = ticket.ticket_category');
		$this->db->join('ticket_sub_category','ticket_sub_category.sub_category_id = ticket.ticket_sub_category');
		$query = $this->db->get('ticket');
		return $query->result_array(); 
	}
}
