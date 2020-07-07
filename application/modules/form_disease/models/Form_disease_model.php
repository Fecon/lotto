<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_disease_model extends CI_Model {

	public function get_table($table) {
        $query = $this->db->get($table)
                    -> result_array();
        return $query;
    }
    public function insert_table($table,$input)
    {
       $this->db->insert($table,$input);   
    }
    public function get_data_by_id($table,$id) {
        $query = $this->db
                    ->where($table['primary'],$id)
                    ->get($table['table'])
                    -> result_array();
        return $query ;
    }
    public function get_comment($research_id,$form_type)
	{
		$query = $this->db->where('research_id',$research_id)
					->where('form_type',$form_type)
					->get('comment');
		return $query->result_array(); 
	}
	public function get_research_all()
	{
		$query = $this->db->get('research');
		return $query->result_array(); 
	}
	public function get_research_geo()
	{
		$query1 = $this->db->get('department_geography');
		$query = $query1->result_array(); 
		foreach ($query as $key => $value) {
			$this->db->where('department.dep_zone',$value['GEO_ID'])
				->where('status',1)
				->join('department','department.dep_no = research.dep_no');
			$query2 = $this->db->get('research');
			$query[$key]['research_pending'] = $query2->result_array(); 
		}
		foreach ($query as $key => $value) {
			$this->db->where('department.dep_zone',$value['GEO_ID'])
				->where('status',2)
				->join('department','department.dep_no = research.dep_no');
			$query2 = $this->db->get('research');
			$query[$key]['research_done'] = $query2->result_array(); 
		}
		return $query ; 
	}
	
	public function get_type_of_research()
	{
		$query = $this->db->get('type_of_research');
		return $query->result_array(); 
	}
	public function get_research_detail($research_id)
	{ 
		$query = $this->db->where('research.research_id',$research_id)
			->join('type_of_research','type_of_research.tor_id = research.type_of_research')
			->join('type_of_ecology','type_of_ecology.toe_id = research.type_of_ecology')
			->join('user','user.user_id = research.user_id','left')
			->join('department','department.dep_no = research.dep_no')
			->get('research');
		
			if ($query->num_rows() > 0){
				$result = $query->result_array(); 
				return $result[0] ;
			}
		
	}
	public function insert_data($input)
	{
		//////////// Operation ////////////
		$this->db->insert('form_disease',$input);
		$id = $this->db->insert_id();
		return $id ;
		////////// End Operation //////////
	}
	public function insert_disease($input)
	{
		$this->db->trans_start();
		//////////// Operation ////////////
		$this->db->insert('form_disease_disease',$input);
		////////// End Operation //////////
		$this->db->trans_complete();
	}
	public function insert_animal($input)
	{
		$this->db->trans_start();
		//////////// Operation ////////////
		$this->db->insert('form_disease_animal',$input);
		////////// End Operation //////////
		$this->db->trans_complete();
	}
	public function insert_insect($input)
	{
		$this->db->trans_start();
		//////////// Operation ////////////
		$this->db->insert('form_disease_insect',$input);
		////////// End Operation //////////
		$this->db->trans_complete();
	}
	
	public function update_research($input)
	{
		$this->db->trans_start();
		//////////// Operation ////////////
		$this->db->where('research_id',$input['research_id'])
			->update('research',$input);
		////////// End Operation //////////
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

	public function get_pedigree_all()
	{
		$query = $this->db->get('pedigree');
		return $query->result_array(); 
	}
	public function get_pest_animal()
	{
		$query = $this->db->where('animal_status',1)
			->get('pest_animal');
		return $query->result_array(); 
	}
	public function get_pest_disease()
	{
		$query = $this->db->where('disease_status',1)->get('pest_disease');
		return $query->result_array(); 
	}
	public function get_pest_insect()
	{
		$query = $this->db->where('insect_status',1)->get('pest_insect');
		return $query->result_array(); 
	}
	public function get_research_pedigree($research_id)
	{
		$this->db->where('research_id',$research_id)
			->order_by('entry,rp_id')
			->join('pedigree','pedigree.pedigree_id = research_pedigree.pedigree_id');
		$query = $this->db->get('research_pedigree');
		return $query->result_array(); 
	}
	public function get_pedigree_plot($research_id)
	{
		$this->db->where('research_pedigree_plot.research_id',$research_id)
			->join('research_pedigree','research_pedigree.rp_id = research_pedigree_plot.rp_id');
		$query = $this->db->get('research_pedigree_plot');
		return $query->result_array(); 
	}
	public function get_pedigree_plot_repeat($research_id,$repeat)
	{
		$this->db->where('research_pedigree_plot.research_id',$research_id)
			->where('research_pedigree_plot.repeat',$repeat)
			->order_by('research_pedigree_plot.plot_no','asc');
			//->join('research_pedigree','research_pedigree.rp_id = research_pedigree_plot.rp_id');
		$query = $this->db->get('research_pedigree_plot');
		return $query->result_array(); 
	}
	public function get_data($research_id,$repeat)
	{

		$this->db->where('form_disease.research_id',$research_id)
			->where('form_disease.repeatedly',$repeat)
			->order_by('form_disease.plot_no','asc');
			//->join('research_pedigree','research_pedigree.rp_id = research_pedigree_plot.rp_id');
		$query1 = $this->db->get('form_disease');
		$query = $query1->result_array(); 
		/*
		foreach ($query as $key => $value) {
			$this->db->where('plot_no',$value['plot_no'])
				->where('research_id',$research_id)
				// ->group_by('plot_no') // BUG //
				->order_by('plot_no','asc')
				->join('pest_insect','pest_insect.insect_id = form_disease.insect','left')
				->join('pest_disease','pest_disease.disease_id = form_disease.disease','left')
				->join('pest_animal','pest_animal.animal_id = form_disease.animal','left');
			$query2 = $this->db->get('form_disease');
			$query[$key]['disease_data'] = $query2->result_array(); 
		}
		*/
		foreach ($query as $key => $value) {
			$this->db->where('form_id',$value['id'])
				->join('pest_disease','pest_disease.disease_id = form_disease_disease.disease','left');
			$query2 = $this->db->get('form_disease_disease');
			$query[$key]['disease_data'] = $query2->result_array(); 
			if(!empty($query[$key]['disease_data'])){
				$this->session->set_flashdata('data_set', 'not_empty');
			}
		}
		foreach ($query as $key => $value) {
			$this->db->where('form_id',$value['id'])
				->join('pest_insect','pest_insect.insect_id = form_disease_insect.insect','left');
			$query3 = $this->db->get('form_disease_insect');
			$query[$key]['insect_data'] = $query3->result_array(); 
			if(!empty($query[$key]['insect_data'])){
				$this->session->set_flashdata('data_set', 'not_empty');
			}
		}
		foreach ($query as $key => $value) {
			$this->db->where('form_id',$value['id'])
				->join('pest_animal','pest_animal.animal_id = form_disease_animal.animal','left');
			$query4 = $this->db->get('form_disease_animal');
			$query[$key]['animal_data'] = $query4->result_array(); 
			if(!empty($query[$key]['animal_data'])){
				$this->session->set_flashdata('data_set', 'not_empty');
			}
		}
		return $query ;
	}
	public function get_pedigree_detail($pedigree_id)
	{
		$this->db->where('pedigree_id',$pedigree_id);
		$query = $this->db->get('pedigree');
		return $query->result_array(); 
	}
	
	public function update_data($input)
	{
		$this->db->trans_start();
		//////////// Operation ////////////
		$this->db->where('id',$input['id'])
			->update('form_disease',$input);
		////////// End Operation //////////
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
	public function update_table($table,$input,$id)
	{
		$this->db->trans_start();
		//////////// Operation ////////////
		$this->db->where($table['pk'],$id)
			->update($table['table'],$input);
		////////// End Operation //////////
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
	public function clear_data($research_id)
	{
		$this->db->trans_start();
		$this->db->where('research_id',$research_id)
			->delete('form_disease');

		$this->db->where('research_id',$research_id)
			->delete('form_disease_animal');

		$this->db->where('research_id',$research_id)
			->delete('form_disease_disease');

		$this->db->where('research_id',$research_id)
			->delete('	form_disease_insect');
		$this->db->trans_complete();
	}
	public function check_data($research_id)
	{

		$query = $this->db->where('research_id',$research_id)
			->get('form_disease_animal',1);

		$query2 = $this->db->where('research_id',$research_id)
			->get('form_disease_disease',1);

		$query3 = $this->db->where('research_id',$research_id)
			->get('	form_disease_insect',1);

		$result = ($query->num_rows()+$query2->num_rows()+$query3->num_rows()); 

		return $result ;
	}
	public function del_table($table,$id)
	{
		$this->db->where($table['pk'],$id)
			->delete($table['table']);
	}
	public function update_comment($input)
	{
		$this->db->trans_start();
		//////////// Operation ////////////
		$this->db->where('research_id',$input['research_id'])
			->where('form_type',$input['form_type'])
			->update('comment',$input);
		////////// End Operation //////////
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
	


}
