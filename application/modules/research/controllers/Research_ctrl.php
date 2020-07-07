<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Research_ctrl extends MX_Controller {

	public function __construct()
    {
      	parent::__construct();
       	$this->load->model('Research_model');
    }
    public function debug()
    {
    	echo 'A OK';
    }
	public function insert_research()
	{
		$dep_no = $this->input->post('dep_no');
		
		$sess_research_id = $this->session->userdata('research_id');
		if(!empty($sess_research_id)){
			$this->research_create_plot($sess_research_id);
		}

		for ($i=0; $i < count($dep_no) ; $i++) { 
			$input =  array(
				'research_name' => $this->input->post('research_name'), 
				'research_year' => $this->input->post('research_year'), 
				'type_of_ecology' =>  $this->input->post('type_of_ecology'), 
				'type_of_research' => $this->input->post('type_of_research'), 
				'dep_no' => $dep_no[$i],
				
				'plot_width' =>  $this->input->post('plot_width'), 
				'plot_height' =>  $this->input->post('plot_height'), 
				'rows_rice' => $this->input->post('rows_rice'), 
				'rice_num' => $this->input->post('rice_num'),
				'rows_distance' =>  $this->input->post('rows_distance'), 
				'grove_distance' =>  $this->input->post('grove_distance'), 
				'rows_harvest' =>  $this->input->post('rows_harvest'), 
				'num_harvest' => $this->input->post('num_harvest'), 
				'length_harvest' =>  $this->input->post('length_harvest'), 
				'pedigree_amount' => $this->input->post('pedigree_amount'),
				'type_of_plan' =>  $this->input->post('type_of_plan'), 
				'block_amount' =>  $this->input->post('block_amount'), 
				'repeat_amount' => $this->input->post('repeat_amount'), 
				'entry_type' => $this->input->post('entry_type'),
			);

			$research_id = $this->Research_model->insert_research($input);

			$user_id = $this->input->post('user_id');
			for ($k=0; $k < count($user_id) ; $k++) { 
				$research_user =  array(
					'research_id' => $research_id,
					'user_id' => $user_id[$k], 
				);
				$this->Research_model->insert_research_user($research_user);
			}

			$array_research_id[] = $research_id ;

			
			if(!empty($research_id)){
				$this->session->set_userdata('research_id', $research_id);
				$this->session->set_userdata('check_create', 'added');
			}

			$pedigree_id = $this->session->userdata('pedigree_selected');
			for ($j=0; $j < count($pedigree_id) ; $j++) { 
				$input =  array(
					'research_id' => $research_id,
					'pedigree_id' => $pedigree_id[$j], 
				);
				$this->Research_model->insert_research_pedigree($input);
			}

		}
		$this->session->set_userdata('array_research_id',$array_research_id);

		$this->research_create_plot($research_id);
	}
	public function edit_research()
	{
		$array_research_id = $this->session->userdata('array_research_id');
		echo "<pre>";
		print_r($array_research_id);
		exit();
			for ($j=0; $j < count($array_research_id) ; $j++) { 
			$research_id = $array_research_id[$j] ;
			$input =  array(
					'research_id' => $this->input->post('research_id'),
					'research_name' => $this->input->post('research_name'), 
					'research_year' => $this->input->post('research_year'), 
					'type_of_ecology' =>  $this->input->post('type_of_ecology'), 
					'type_of_research' => $this->input->post('type_of_research'), 
					'dep_no' => $this->input->post('dep_no'),
					'user_id' =>  $this->input->post('user_id'), 
					'plot_width' =>  $this->input->post('plot_width'), 
					'plot_height' =>  $this->input->post('plot_height'), 
					'rows_rice' => $this->input->post('rows_rice'), 
					'rice_num' => $this->input->post('rice_num'),
					'rows_distance' =>  $this->input->post('rows_distance'), 
					'grove_distance' =>  $this->input->post('grove_distance'), 
					'rows_harvest' =>  $this->input->post('rows_harvest'), 
					'num_harvest' => $this->input->post('num_harvest'), 
					'length_harvest' =>  $this->input->post('length_harvest'),
					'pedigree_amount' => $this->input->post('pedigree_amount'),
					'type_of_plan' =>  $this->input->post('type_of_plan'), 
					'block_amount' =>  $this->input->post('block_amount'), 
					'repeat_amount' => $this->input->post('repeat_amount'), 
					'entry_type' => $this->input->post('entry_type'),
			);
			// print_r($input);
			$this->Research_model->update_research($input);

			// echo "<Pre>";
			// print_r($input);
			// exit();

			$pedigree_id = $this->session->userdata('pedigree_selected');
			if(isset($pedigree_id)){
				$this->Research_model->delete_research_pedigree($research_id);
				for ($i=0; $i < count($pedigree_id) ; $i++) { 
					$input =  array(
						'research_id' => $research_id,
						'pedigree_id' => $pedigree_id[$i], 
					);
					// print_r($input);
					$this->Research_model->insert_research_pedigree($input);
				}
			}
		}
		
		// print_r($input);
		// exit();
		// $this->session->unset_userdata('research_temporary');
		// $this->session->unset_userdata('pedigree_selected');
		$this->research_create_plot($research_id);
	}
	public function edit_research_each()
	{

			$research_id = $this->input->post('research_id') ;
			$input =  array(
					'research_id' => $this->input->post('research_id'),
					'research_name' => $this->input->post('research_name'), 
					'research_year' => $this->input->post('research_year'), 
					'type_of_ecology' =>  $this->input->post('type_of_ecology'), 
					'type_of_research' => $this->input->post('type_of_research'), 
					'dep_no' => $this->input->post('dep_no'),
					'user_id' =>  $this->input->post('user_id'), 
					'plot_width' =>  $this->input->post('plot_width'), 
					'plot_height' =>  $this->input->post('plot_height'), 
					'rows_rice' => $this->input->post('rows_rice'), 
					'rice_num' => $this->input->post('rice_num'),
					'rows_distance' =>  $this->input->post('rows_distance'), 
					'grove_distance' =>  $this->input->post('grove_distance'), 
					'rows_harvest' =>  $this->input->post('rows_harvest'), 
					'num_harvest' => $this->input->post('num_harvest'), 
					'length_harvest' =>  $this->input->post('length_harvest'),
					'pedigree_amount' => $this->input->post('pedigree_amount'),
					'type_of_plan' =>  $this->input->post('type_of_plan'), 
					'block_amount' =>  $this->input->post('block_amount'), 
					'repeat_amount' => $this->input->post('repeat_amount'), 
					'entry_type' => $this->input->post('entry_type'),
			);
			// print_r($input);
			$this->Research_model->update_research($input);

			// echo "<Pre>";
			// print_r($input);
			// exit();

			$pedigree_id = $this->session->userdata('pedigree_selected');
			if(isset($pedigree_id)){
				$this->Research_model->delete_research_pedigree($research_id);
				for ($i=0; $i < count($pedigree_id) ; $i++) { 
					$input =  array(
						'research_id' => $research_id,
						'pedigree_id' => $pedigree_id[$i], 
					);
					// print_r($input);
					$this->Research_model->insert_research_pedigree($input);
				}
			}
		$this->session->unset_userdata('research_temporary');
		$this->research_create_plot($research_id);
	}

	public function insert_pedigree()
	{
		$input = array(
			'source' => $this->input->post('source'),
			'designation' => $this->input->post('designation'),
			'cross_name' => $this->input->post('cross_name'),
			'seed_source' => $this->input->post('seed_source'),
			'traits' => $this->input->post('traits')
		);

		$this->Research_model->insert_pedigree($input);
		$research_id = $this->input->post('research_id');
		if(empty($research_id)){
			redirect('research/research_create');
		}else{
			redirect('research/research_edit/'.$research_id);
		}
		
		
	}
	public function select_pedigree_temp()
	{

		$pedigree_id = $this->input->post('pedigree_id') ;

		for ($i=0; $i < count($pedigree_id) ; $i++) { 
			$pedigree_selected[] = $pedigree_id[$i] ;
		}

		$this->session->set_userdata('pedigree_selected',$pedigree_selected);
		$research_session = $this->session->userdata('pedigree_selected');
        $result = json_encode($research_session);

        echo $result;

	}
	public function edit_pedigree_temp()
	{
		$pedigree_id = $this->input->post('pedigree_id');
		$research_id = $this->input->post('research_id');

		for ($i=0; $i < count($pedigree_id) ; $i++) { 
			$pedigree_selected[] = $pedigree_id[$i] ;
		}

		$this->session->set_userdata('pedigree_selected',$pedigree_selected);
		$research_session = $this->session->userdata('pedigree_selected');
		redirect('research/research_edit/'.$research_id);
	}

	public function update_research_info()
	{
		$research_id = $this->input->post('research_id') ;
		$input =  array(
				'research_id' => $this->input->post('research_id'),
				'research_name' => $this->input->post('research_name'), 
				'research_year' => $this->input->post('research_year'), 
				'type_of_ecology' =>  $this->input->post('type_of_ecology'), 
				'type_of_research' => $this->input->post('type_of_research'), 
				'dep_no' => $this->input->post('dep_no'),
				'user_id' =>  $this->input->post('user_id'), 
				'plot_width' =>  $this->input->post('plot_width'), 
				'plot_height' =>  $this->input->post('plot_height'), 
				'rows_rice' => $this->input->post('rows_rice'), 
				'rice_num' => $this->input->post('rice_num'),
				'rows_distance' =>  $this->input->post('rows_distance'), 
				'grove_distance' =>  $this->input->post('grove_distance'), 
				'rows_harvest' =>  $this->input->post('rows_harvest'), 
				'num_harvest' => $this->input->post('num_harvest'), 
				'length_harvest' =>  $this->input->post('length_harvest'), 
				'pedigree_amount' => $this->input->post('pedigree_amount'),
				'type_of_plan' =>  $this->input->post('type_of_plan'), 
				'block_amount' =>  $this->input->post('block_amount'), 
				'repeat_amount' => $this->input->post('repeat_amount'), 
				'entry_type' => $this->input->post('entry_type'),
		);
		$this->Research_model->update_research($input);

		redirect('research');
	}
	public function update_entry()
	{
		$array_research_id = $this->session->userdata('array_research_id');
		if(!empty($array_research_id)){
			$count_research = count($array_research_id) ; 
		}else{
			$count_research =  1 ;
		}

		for ($i=0; $i < $count_research ; $i++) { 
			$rp_id[] = $this->input->post('rp_id'.$i) ;
		}

		for ($i=0; $i < count($rp_id) ; $i++) { 
			for ($j=0; $j < count($rp_id[$i]); $j++) { 
				$input = array(
					'rp_id' => $rp_id[$i][$j],
					'entry' => $j+1
				);
				$this->Research_model->update_research_pedigree($input);
			}
		}
		$research_id = $this->input->post('research_id');
		if(empty($research_id))
		{
			$research_id = $this->uri->segment(3);
		}

		// $this->session->set_flashdata('insert_research', 'done');
		// $this->session->unset_userdata('research_id');
		if(!empty($array_research_id)){
			redirect('research/view_entry_create/'.$research_id);
		}else{
			redirect('research/select_plot/'.$research_id);
		}
		// redirect('research');
	}
	public function research_create_plot($research_id)
	{
		if(empty($research_id)){
			$research_id = $this->uri->segment(3);
		}
		$research = $this->Research_model->get_research_detail($research_id);

		if($research['entry_type'] == 1 ){ //Random plot
			redirect('research/set_entry_once/'.$research_id);
		}elseif($research['entry_type'] == 2 ){ //Select plot
			$this->session->set_flashdata('insert_research', 'done');
			$this->session->unset_userdata('research_id');
			$this->session->unset_userdata('pedigree_selected');
			$this->session->unset_userdata('check_create');
			$this->session->unset_userdata('array_research_id');
			$this->session->unset_userdata('check_entry');
			redirect('research');
		}elseif($research['entry_type'] == 3 ){ //Select plot by Leader
			redirect('research/set_entry_once/'.$research_id);
		}		
	}
	public function change_status()
	{
		$input = array(
			'research_id' => $this->input->post('research_id'),
			'status' => 0
		);
		// echo "<Pre>";
		// print_r($input);
		// exit();
		$this->Research_model->update_research($input);
		redirect('research');
	}
	public function update_session()
	{
		$research_temporary =  array(
				'research_name' => $this->input->post('research_name'), 
				'research_year' => $this->input->post('research_year'), 
				'type_of_ecology' =>  $this->input->post('type_of_ecology'), 
				'type_of_research' => $this->input->post('type_of_research'), 
				'dep_no' => $this->input->post('dep_no'),
				'user_id' =>  $this->input->post('user_id'), 
				'plot_width' =>  $this->input->post('plot_width'), 
				'plot_height' =>  $this->input->post('plot_height'), 
				'rows_rice' => $this->input->post('rows_rice'), 
				'rice_num' => $this->input->post('rice_num'),
				'rows_distance' =>  $this->input->post('rows_distance'), 
				'grove_distance' =>  $this->input->post('grove_distance'), 
				'rows_harvest' =>  $this->input->post('rows_harvest'), 
				'num_harvest' => $this->input->post('num_harvest'), 
				'length_harvest' =>  $this->input->post('length_harvest'), 
				'type_of_plan' =>  $this->input->post('type_of_plan'), 
				'block_amount' =>  $this->input->post('block_amount'), 
				'repeat_amount' => $this->input->post('repeat_amount'), 
				'entry_type' => $this->input->post('entry_type'),
		);

		$this->session->set_userdata('research_temporary',$research_temporary);
		$research_session = $this->session->userdata('research_temporary');

	}
	public function update_research_pedigree_plot()
	{		
		$research_id = $this->input->post('research_id');
		if(empty($research_id))
		{
			$research_id = $this->uri->segment(3);
		}

		$ped_plot_id = $this->input->post('ped_plot_id');
		$block = $this->input->post('block');
		$entry = $this->input->post('entry');

		for ($i=0; $i < count($ped_plot_id); $i++) { 
			$input = array(
				'ped_plot_id' => $ped_plot_id[$i],
				'block' => $block[$i],
				'entry' => $entry[$i],
			);

			$this->Research_model->update_research_pedigree_plot($input);
		}
		
		
		if(empty($research_id)){

			$this->session->unset_userdata('research_id');
			$this->session->unset_userdata('pedigree_selected');
			$this->session->unset_userdata('check_create');
			$this->session->unset_userdata('array_research_id');
			$this->session->unset_userdata('check_entry');
			$this->session->unset_userdata('research_temporary');

			redirect('research');
		}else{
			redirect('research/form_index/'.$research_id);
		}
		
	}
	public function update_research_pedigree_plot_once()
	{
		$array_research_id = $this->session->userdata('array_research_id');
		// echo "<pre>";
		// print_r($array_research_id);
		// exit();
		for ($j=0; $j < count($array_research_id) ; $j++) { 
			$research_id = $array_research_id[$j];	

			$plot_no = $this->input->post('plot_no');
			$block = $this->input->post('block');
			$entry = $this->input->post('entry');

			for ($i=0; $i < count($plot_no); $i++) { 
				$input = array(
					'research_id' => $research_id,
					'plot_no' => $plot_no[$i],
					'block' => $block[$i],
					'entry' => $entry[$i],
				);
				// print_r($input);
				$this->Research_model->update_research_pedigree_plot_once($input);
			}
		}
		// exit();
			$this->session->unset_userdata('research_id');
			$this->session->unset_userdata('pedigree_selected');
			$this->session->unset_userdata('check_create');
			$this->session->unset_userdata('array_research_id');
			$this->session->unset_userdata('check_entry');
			$this->session->unset_userdata('research_temporary');

		redirect('research');
		
	}
	public function insert_date()
	{
		$research_id = $this->input->post('research_id');

		$this->Research_model->clear_research_date($research_id);

		$input_date_value = $this->input->post('date_value');
		$date_desc = $this->input->post('date_desc');
		$date_type = $this->input->post('date_type');

		for ($i=0; $i < count($input_date_value); $i++) { 
			$date_value = NULL ;
			if(!empty($input_date_value[$i])){
				
				$date1 = date_create_from_format('Y-m-d', $input_date_value[$i]);
				$date_value = date_format($date1, 'Y-m-d');

			}
			$input = array(
				'research_id' => $research_id,
				'research_date_type' => $date_type[$i],
				'research_date_value' => $date_value,
				'research_date_desc' => $date_desc[$i],
			);

			$this->Research_model->insert_research_date($input);
		}

		redirect('research/form_date_edit/'.$research_id);
	}

	public function update_date()
	{
		$research_id = $this->input->post('research_id');

		$input_date_value = $this->input->post('date_value');
		$date_desc = $this->input->post('date_desc');
		$date_type = $this->input->post('date_type');
		$date_id = $this->input->post('date_id');

		for ($i=0; $i < count($input_date_value); $i++) { 
			$date_value = NULL ;
			if(!empty($input_date_value[$i])){
				$date1 = date_create_from_format('Y-m-d', $input_date_value[$i]);
				$date_value = date_format($date1, 'Y-m-d');

			}
			$input = array(
				'research_date_id' => $date_id[$i],
				'research_id' => $research_id,
				'research_date_type' => $date_type[$i],
				'research_date_value' => $date_value,
				'research_date_desc' => $date_desc[$i],
			);
			echo "<pre>";
			print_r($input);

			// $this->Research_model->update_research_date($input);
		}
		exit();
		redirect('research/form_date_edit/'.$research_id);
	}
	public function comment_update()
	{
		$input = array(
			'research_id' => $this->input->post('research_id'),
			'comment' => $this->input->post('research_comment')
		);
		// echo "<Pre>";
		// print_r($input);
		// exit();
		$this->Research_model->update_research($input);
		redirect('research/form_index/'.$input['research_id']);
	}
	public function close_research()
	{
		$research_id = $this->input->post('research_id');
		$pedigree = $this->Research_model->get_research_pedigree($research_id);

		foreach ($pedigree as $key => $value) {
			$average = $this->Research_model->get_average($research_id,$value['entry']);
			$this->Research_model->insert_average($average);
		}

		$input = array(
			'research_id' => $research_id, 
			'status' => 2, 
			);
		$this->Research_model->update_research($input);
		// print_r($input);

		$this->session->set_flashdata('close_research', 'success');
		redirect('research/form_index/'.$input['research_id']);
	}

}
