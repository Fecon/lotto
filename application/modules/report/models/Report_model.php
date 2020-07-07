<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

	public function insert_pedigree($input)
	{
		$this->db->trans_start();
		$this->db->insert('pedigree',$input);
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
	public function get_type_of_research()
	{
		$query = $this->db->get('type_of_research');
		return $query->result_array(); 
	}
	public function get_pedigree_all()
	{
		$query = $this->db->get('pedigree');
		return $query->result_array(); 
	}
	public function get_department_all()
	{
		$query = $this->db->order_by('dep_name','asc')->get('department');
		return $query->result_array(); 
	}
	public function get_research_all()
	{
		$query = $this->db->group_by('research_name')
				->get('research');
		return $query->result_array(); 
	}
	public function filter_search($input)
	{
		$this->db->select('
					research_id as id,
					research_name as name
				');
		if(!empty($input['year'])){
			$this->db->where('research_year',$input['year']);
		}
		if(!empty($input['tor'])){
			$this->db->where('type_of_research',$input['tor']);
		}
		if(!empty($input['dep_no'])){
			$this->db->where('dep_no',$input['dep_no']);
		}
		
		$query = $this->db->group_by('research_name')
				->get('research');
		return $query->result_array(); 
	}
	public function update_pedigree($input)
	{
		$this->db->trans_start();
		$this->db->where('pedigree_id',$input['pedigree_id']);
		$this->db->update('pedigree',$input);
		$this->db->trans_complete();
		// was there any update or error?
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
	public function get_export($research_id)
	{
		$query = $this->db->where('research_id',$research_id)
				->order_by('entry,repeat')
				->get('research_pedigree_plot')
				->result_array(); 

		// ผลผลิต
		foreach ($query as $key => $value) {
			$gy = $this->db->select('AVG(NULLIF(product_kg_rai,0)) as product_kg_rai')
				->where('research_id',$value['research_id'])
				->where('repeatedly',$value['repeat'])
				->where('entry',$value['entry'])
				->where('block',$value['block'])
				->get('form_product')
				->result_array(); 
			if(!empty($gy)){
				$query[$key]['gy'] = $gy[0]['product_kg_rai'] ;
			}else{
				$query[$key]['gy'] = "";
			}
			
		}

		// ออกดอก
		foreach ($query as $key => $value) {
			$dtf = $this->db->select('AVG(NULLIF(day,0)) as day')
				->where('research_id',$value['research_id'])
				->where('repeatedly',$value['repeat'])
				->where('entry',$value['entry'])
				->where('block',$value['block'])
				->get('form_bloom')
				->result_array(); 
			if(!empty($dtf)){
				$query[$key]['dtf'] = $dtf[0]['day'] ;
			}else{
				$query[$key]['dtf'] = "";
			}
			
		}

		// ความสูง
		foreach ($query as $key => $value) {
			$ht = $this->db->select('AVG(NULLIF(average,0)) as average')
				->where('research_id',$value['research_id'])
				->where('repeatedly',$value['repeat'])
				->where('entry',$value['entry'])
				->where('block',$value['block'])
				->get('form_high')
				->result_array(); 
			if(!empty($ht)){
				$query[$key]['ht'] = $ht[0]['average'] ;
			}else{
				$query[$key]['ht'] = "";
			}
			
		}

		//รวงต่อกอ
		foreach ($query as $key => $value) {
			$pan = $this->db->select('AVG(NULLIF(average,0)) as average')
				->where('research_id',$value['research_id'])
				->where('repeatedly',$value['repeat'])
				->where('entry',$value['entry'])
				->where('block',$value['block'])
				->get('form_awn_grove')
				->result_array(); 
			if(!empty($pan)){
				$query[$key]['awn_grove'] = $pan[0]['average'] ;
			}else{
				$query[$key]['awn_grove'] = "";
			}
			
		}

		//น้ำในแปลง
		foreach ($query as $key => $value) {
			$subquery = $this->db->select('AVG(NULLIF(value,0)) as value')
				->where('research_id',$value['research_id'])
				->where('repeat',$value['repeat'])
				->where('entry',$value['entry'])
				->where('block',$value['block'])
				->get('	form_water_level')
				->result_array(); 
			if(!empty($subquery)){
				$query[$key]['water_level'] = $subquery[0]['value'] ;
			}else{
				$query[$key]['water_level'] = "";
			}
			
		}

		//ใบม้วน
		foreach ($query as $key => $value) {
			$subquery = $this->db->select('AVG(NULLIF(roll_leaves,0)) as roll_leaves')
				->where('research_id',$value['research_id'])
				->where('repeatedly',$value['repeat'])
				->where('entry',$value['entry'])
				->where('block',$value['block'])
				->get('form_leaves')
				->result_array(); 
			if(!empty($subquery)){
				$query[$key]['roll_leaves'] = $subquery[0]['roll_leaves'];
			}else{
				$query[$key]['roll_leaves'] = "";
			}
		}

		//ใบตาย
		foreach ($query as $key => $value) {
			$subquery = $this->db->select('AVG(NULLIF(dead_leaves,0)) as dead_leaves')
				->where('research_id',$value['research_id'])
				->where('repeatedly',$value['repeat'])
				->where('entry',$value['entry'])
				->where('block',$value['block'])
				->get('form_leaves')
				->result_array(); 
			if(!empty($subquery)){
				$query[$key]['dead_leaves'] = $subquery[0]['dead_leaves'];
			}else{
				$query[$key]['dead_leaves'] = "";
			}
		}

		//กอหาย
		foreach ($query as $key => $value) {
			$subquery = $this->db->select('AVG(NULLIF(balance,0)) as balance')
				->where('research_id',$value['research_id'])
				->where('repeatedly',$value['repeat'])
				->where('entry',$value['entry'])
				->where('block',$value['block'])
				->get('form_lost_grove')
				->result_array(); 
			if(!empty($dtf)){
				$query[$key]['lost_grove'] = $subquery[0]['balance'] ;
			}else{
				$query[$key]['lost_grove'] = "";
			}
		}

		//ต้นต่อกอ
		foreach ($query as $key => $value) {
			$subquery = $this->db->select('AVG(NULLIF(average,0)) as average')
				->where('research_id',$value['research_id'])
				->where('repeatedly',$value['repeat'])
				->where('entry',$value['entry'])
				->where('block',$value['block'])
				->get('form_tree_grove')
				->result_array(); 
			if(!empty($dtf)){
				$query[$key]['tree_grove'] = $subquery[0]['average'] ;
			}else{
				$query[$key]['tree_grove'] = "";
			}
		}

		//ต้นที่ไม่ออกรวงต่อกอ
		foreach ($query as $key => $value) {
			$subquery = $this->db->select('AVG(NULLIF(average,0)) as average')
				->where('research_id',$value['research_id'])
				->where('repeatedly',$value['repeat'])
				->where('entry',$value['entry'])
				->where('block',$value['block'])
				->get('form_no_grain')
				->result_array(); 
			if(!empty($dtf)){
				$query[$key]['no_grain'] = $subquery[0]['average'] ;
			}else{
				$query[$key]['no_grain'] = "";
			}
		}

		//จำนวนเมล็ดดีต่อรวง
		foreach ($query as $key => $value) {
			$subquery = $this->db->select('AVG(NULLIF(average,0)) as average')
				->where('research_id',$value['research_id'])
				->where('repeatedly',$value['repeat'])
				->where('entry',$value['entry'])
				->where('block',$value['block'])
				->get('form_seed_good')
				->result_array(); 
			if(!empty($dtf)){
				$query[$key]['seed_good'] = $subquery[0]['average'] ;
			}else{
				$query[$key]['seed_good'] = "";
			}
		}

		//จำนวนเมล็ดลีบต่อรวง
		foreach ($query as $key => $value) {
			$subquery = $this->db->select('AVG(NULLIF(average,0)) as average')
				->where('research_id',$value['research_id'])
				->where('repeatedly',$value['repeat'])
				->where('entry',$value['entry'])
				->where('block',$value['block'])
				->get('form_seed_grove')
				->result_array(); 
			if(!empty($dtf)){
				$query[$key]['seed_grove'] = $subquery[0]['average'] ;
			}else{
				$query[$key]['seed_grove'] = "";
			}
		}

		return $query;
	}
}
