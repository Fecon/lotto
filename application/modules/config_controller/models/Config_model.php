<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Config_model extends CI_Model
{


	public function get_config()
	{
		$query = $this->db->get('config');
		return $query->result_array();
	}

	public function config_update($list_data)
	{
		$this->db->trans_start();
		$this->db->where('name', $list_data['name']);
		$this->db->update('config', $list_data);
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
