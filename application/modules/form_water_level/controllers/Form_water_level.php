<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_water_level extends MX_Controller {

	public function __construct()
    {
      	parent::__construct();
       	$this->load->model('Water_level_model');
    }
	public function index()
	{
		$data['content'] = 'form_template/form-template';
		$data['header_title'] = 'ระดับน้ำในแปลง';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_water_level/form_water_level';

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;

		$water_lv_time = $this->Water_level_model->get_water_lv_time($research_id);
		$last_time = end($water_lv_time);
		if(empty($last_time)){
			$data['term'] = 1 ;
		}else{
			$data['term'] = $last_time['terms']+1 ;
		}

		$data['get_research'] = $this->Water_level_model->get_research_detail($research_id);
		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Water_level_model->get_pedigree_plot_repeat($research_id,$repeat);
		}

		$this->load->view('header/admin_header',$data);
	}
	public function edit_view()
	{
		$data['content'] = 'form_template/form-template';
		$data['header_title'] = 'ระดับน้ำในแปลง';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_water_level/form_water_level_edit';

		$research_id = $this->uri->segment(3);
		$keep_time_id = $this->uri->segment(4);
		$data['research_id'] = $research_id ;
		$data['keep_time_id'] = $keep_time_id ;

		$data['get_time'] = $this->Water_level_model->get_time($keep_time_id);
		if(isset($data['get_time'][0]['comment'])){
			$data['comment'] = $data['get_time'][0]['comment'];
		}
		
		$arr_date = explode("-", $data['get_time'][0]['keep_date']);
        $convert_date = $arr_date[2].'/'.$arr_date[1].'/'.($arr_date[0]) ;
		$data['term'] = $data['get_time'][0]['terms'] ;
		$data['date_time'] = $convert_date ;

		$data['get_research'] = $this->Water_level_model->get_research_detail($research_id);
	
		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Water_level_model->get_pedigree_plot_repeat($research_id,$repeat);
			$data['water_level'][] = $this->Water_level_model->get_data($research_id,$repeat,$keep_time_id);
		}
		// echo "<pre>";
		// print_r($data['water_level']);
		// exit();
		$this->load->view('header/admin_header',$data);
	}
	public function excel()
	{

		$research_id = $this->uri->segment(3);
		$keep_time_id = $this->uri->segment(4);
		$data['research_id'] = $research_id ;
		$data['keep_time_id'] = $keep_time_id ;
		$data['get_research'] = $this->Water_level_model->get_research_detail($research_id);

		$data['get_time'] = $this->Water_level_model->get_time($keep_time_id);
		$arr_date = explode("-", $data['get_time'][0]['keep_date']);
        $convert_date = $arr_date[2].'/'.$arr_date[1].'/'.($arr_date[0]) ;
		$data['term'] = $data['get_time'][0]['terms'] ;
		$data['date_time'] = $convert_date ;

	
		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Water_level_model->get_pedigree_plot_repeat($research_id,$repeat);
			$data['water_level'][] = $this->Water_level_model->get_data($research_id,$repeat,$keep_time_id);
		}
		// echo "<pre>";
		// print_r($data['pedigree_plot']);
		// exit();
		$this->load->view('export_excel',$data);
	}
	public function insert_data()
	{
		$research_id = $this->input->post('research_id');
		$water_lv_time = $this->Water_level_model->get_water_lv_time($research_id);
		$last_time = end($water_lv_time);
		if(empty($last_time)){
			$term = 1 ;
		}else{
			$term = $last_time['terms']+1 ;
		}
		$date = $this->input->post('date');
		if(empty($date)){
			$date = date('Y-m-d');
		}

		$input = array(
			'research_id' => $research_id,
			'keep_date' => $date,
			'terms' => $term,
			'comment' => $this->input->post('comment')
		);
		// echo "<pre>";
		// print_r($input);
		// exit();
		$keep_date_id = $this->Water_level_model->insert_keep_date($input);

		$water_level = $this->input->post('water_level');
		$plot_no = $this->input->post('plot_no');
		$block = $this->input->post('block');
		$entry = $this->input->post('entry');
		$repeat = $this->input->post('repeat');

		// print_r($water_level);

		for ($i=0; $i < count($water_level); $i++) { 

			if(empty($water_level[$i])){
				$value = NULL ;
			}else{
				$value = $water_level[$i] ;
			}

			$input = array(
				'research_id' => $research_id,
				'value' => $value,
				'plot_no' => $plot_no[$i],
				'block' => $block[$i],
				'entry' => $entry[$i],
				'repeat' => $repeat[$i],
				'keep_time_id' => $keep_date_id ,
			);
			// echo "<Pre>";
			// print_r($input);
			$this->Water_level_model->insert_data($input);
		}
		
		if(empty($research_id)){
			redirect('research');
		}else{
			redirect('form_water_level/edit_view/'.$research_id.'/'.$keep_date_id);
		}
	}
	public function update_data()
	{
		$research_id = $this->input->post('research_id');
		$keep_date_id = $this->input->post('keep_time_id');
		
		$input = array(
			'keep_date_id' => $keep_date_id,
			'research_id' => $research_id,
			'keep_date' => $this->input->post('keep_date'),
			'comment' => $this->input->post('comment')
		);
		// echo "<Pre>";
		// print_r($input);
		// exit();
		$this->Water_level_model->update_keep_date($input);
		
		$id = $this->input->post('id');
		$water_level = $this->input->post('water_level');
		$plot_no = $this->input->post('plot_no');
		$block = $this->input->post('block');
		$entry = $this->input->post('entry');
		$repeat = $this->input->post('repeat');
		for ($i=0; $i < count($id); $i++) {

			if(empty($water_level[$i])){
				$value = NULL ;
			}else{
				$value = $water_level[$i] ;
			}

			$input = array(
				'id' => $id[$i],
				'value' => $value,
			);

			$this->Water_level_model->update_data($input);
		}

		if(empty($research_id)){
			redirect('research');
		}else{
			redirect('form_water_level/edit_view/'.$research_id.'/'.$keep_date_id);
		}

	}
}
