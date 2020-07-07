<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedigree_model extends CI_Model {

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
	
	public function get_pedigree_all()
	{
		$query = $this->db->get('pedigree');
		return $query->result_array(); 
	}
	public function get_pedigree_detail($pedigree_id)
	{
		$query = $this->db->where('pedigree_id',$pedigree_id)->get('pedigree');
		return $query->result_array(); 
	}
	public function get_pedigree_research($pedigree_id)
	{
		$query = $this->db->where('research_pedigree.pedigree_id',$pedigree_id)
				->join('research','research.research_id = research_pedigree.research_id')
				->join('department','department.dep_no = research.dep_no')
				->get('research_pedigree');
		return $query->result_array(); 
	}
	public function get_department_all()
	{
		$query = $this->db->order_by('dep_name','asc')->get('department');
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
	public function get_type_of_research()
	{
		$query = $this->db->get('type_of_research');
		return $query->result_array(); 
	}
	public function get_resistance_bug()
	{
		$query = $this->db->select('
				id,eng_name as name
			')
				->get('resistance_bug');
		return $query->result_array(); 
	}

	public function basic_search($key)
	{
		$query = $this->db->like('designation',$key)
				->get('pedigree');
		return $query->result_array(); 
	}
	public function research_search($table,$input)
	{
		$this->db->select($table['table'].'.entry,'.$table['table'].'.research_id');
		$this->db->where($table['column'].' '.$input['sign'],$input['search']);
		if(isset($table['column2'])){
			$this->db->where($table['column2'].' '.$input['sign'],$input['search']);
		}
		if(isset($table['column3'])){
			$this->db->where($table['column3'].' '.$input['sign'],$input['search']);
		}
		if($input['year']!='*'){
			$this->db->where('research.research_year',$input['year']);
		}
		
		if($input['type_of_research']!='*'){
			$this->db->where('research.type_of_research',$input['type_of_research']);
		}
		if($input['department']!='*'){
			$this->db->where('research.dep_no',$input['department']);
		}
		$this->db->group_by($table['table'].'.entry,'.$table['table'].'.research_id');
		$this->db->join('research','research.research_id = '.$table['table'].'.research_id');

		$query = $this->db->get($table['table'])
					->result_array(); 

		$result = array();
		foreach ($query as $key => $value) {
			$query2 = $this->db->select('pedigree.*')
				->where('research_pedigree.entry',$value['entry'])
				->where('research_pedigree.research_id',$value['research_id'])
				->join('research_pedigree','research_pedigree.pedigree_id=pedigree.pedigree_id')
				->get('pedigree')
				->result_array(); 
			if(!empty($query2)){
				$result[] = $query2[0] ;
			}
		}
		$result = array_map("unserialize", array_unique(array_map("serialize", $result)));

		return $result; 
	}
	public function test_search($table,$input)
	{
		if($input['sign']==''){
			$this->db->like($table['column'].' '.$input['sign'],$input['search']);
			if(isset($table['column2'])){
				$this->db->like($table['column2'].' '.$input['sign'],$input['search']);
			}
		}else{
			$this->db->where($table['column'].' '.$input['sign'],$input['search']);
			if(isset($table['column2'])){
				$this->db->where($table['column2'].' '.$input['sign'],$input['search']);
			}
		}
		

		if(isset($table['table2'])){
			$this->db->join($table['table2'],$table['table2'].'.'.$table['id_table2'].' = '.$table['table'].'.'.$table['id_table']);
		}

		$this->db->group_by($table['table'].'.pedigree_id');
		$this->db->join('research','research.research_id = '.$table['table'].'.research_id');
		$query = $this->db->get($table['table'])
					->result_array(); 
		$result = array();
		foreach ($query as $key => $value) {
			$query2 = $this->db
				->group_by('pedigree.pedigree_id')
				->where('pedigree.pedigree_id',$value['pedigree_id'])
				->get('pedigree')
				->result_array(); 
			if(!empty($query2)){
				$result[] = $query2[0] ;
			}
		}
		// echo $this->db->last_query();
		return $result; 
	}
	
	public function search_average($input)
	{
		if(!empty($input['year'])){
			$this->db->where('average.year',$input['year']);
		}
		if(!empty($input['type_of_research'])){
			$this->db->where('average.type_of_research',$input['type_of_research']);
		}
		if(!empty($input['department'])){
			$this->db->where('average.dep_no',$input['department']);
		}
		if(!empty($input['form_research'])){
			$this->db->where('average.'.$input['form_research'].$input['sign'],$input['search']);
		}
		
		$query = $this->db->select('
					average.average_id,
					average.research_id,
					average.pedigree_id,
					average.entry,
					average.dep_no,
					average.year,
					average.type_of_research,
					average.'.$input["form_research"].' as average,
					average.average_status,
					pedigree.*,
				')
				->join('pedigree','pedigree.pedigree_id = average.pedigree_id')
				->get('average')
				->result_array(); 
		// echo $this->db->last_query();
		return $query ;
		
	}

	public function get_pedigree_tor($tor_id)
	{
		$query = $this->db->where('tor_id',$tor_id)->get('type_of_research');
		return $query->result_array(); 
	}
}
