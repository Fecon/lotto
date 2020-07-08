<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {


	public function list_user()
	{

		$query = $this->db->get('user');

		return $query->result_array();
	}
	public function user_insert($list_data)
	{
		$this->db->trans_start();
		$this->db->insert('user', $list_data);
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
	public function user_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('user');
	}
	public function user_update($list_data)
	{
		$this->db->trans_start();
		$this->db->where('user_id',$list_data['user_id']);
		$this->db->update('user',$list_data);
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

	public function user_forget($user_email)
	{
		$this->db->where('email',$user_email);
		$query = $this->db->get('user');
		return $query->result_array();
	}
	public function re_password($mail)
	{
		$this->db->where('user_email',$mail);
		$query = $this->db->get('user');
		return $query->result_array();
	}
	public function user_change($inpost)
	{
		$this->db->where('user_id',$inpost['id']);
		$this->db->update('user',$inpost);
	}
	public function get_profile($id)
	{
		$this->db->where('user_id',$id);
		$query = $this->db->get('user');
		return $query->result_array();
	}
	public function checkRepeat($type,$inData)
	{
		$this->db->where($type,$inData);
		$query = $this->db->get("user");
		return $query->num_rows();
	}
	public function get_research_geo()
	{
		$query1 = $this->db->get('department_geography');
		$query = $query1->result_array();
		foreach ($query as $key => $value) {
			$this->db->select('dep_id,dep_no,dep_name,dep_shotname_th,dep_shotname_en')
				->where('department.dep_zone',$value['GEO_ID'])
				->where('department_status',1);
			$query2 = $this->db->get('department');
			$query[$key]['department_list'] = $query2->result_array();
		}
		return $query ;
	}
	public function get_department()
	{
		$query = $this->db->get('department');
		return $query->result_array();
	}
}
