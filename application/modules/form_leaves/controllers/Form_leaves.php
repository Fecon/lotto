<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_leaves extends MX_Controller {

	public function __construct()
    {
      	parent::__construct();
       	$this->load->model('Form_leaves_model');
    }
	public function index()
	{
		$data['content'] = 'form_template/form-template';
		$data['header_title'] = 'ใบม้วน ใบตาย';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_leaves/form_leaves';

		$research_id = $this->uri->segment(3);
		$leaves_time = $this->Form_leaves_model->get_leaves_time($research_id);
		$last_time = end($leaves_time);
		if(empty($last_time)){
			$data['term'] = 1 ;
		}else{
			$data['term'] = $last_time['terms']+1 ;
		}

		$data['research_id'] = $research_id ;
		$data['get_research'] = $this->Form_leaves_model->get_research_detail($research_id);
		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Form_leaves_model->get_pedigree_plot_repeat($research_id,$repeat);
		}
		$this->load->view('header/admin_header',$data);
	}
	public function edit_view()
	{
		$data['content'] = 'form_template/form-template';
		$data['header_title'] = 'ใบม้วน ใบตาย';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_leaves/form_leaves_edit';

		$research_id = $this->uri->segment(3);
		$keep_time_id = $this->uri->segment(4);
		$leaves_time = $this->Form_leaves_model->get_leaves_time($research_id);
		$last_time = end($leaves_time);
		$data['term'] = $last_time['terms'] ;
		$data['keep_time_id'] = $keep_time_id ;

		$data['get_time'] = $this->Form_leaves_model->get_time($keep_time_id);
		if(isset($data['get_time'][0]['comment'])){
			$data['comment'] = $data['get_time'][0]['comment'];
		}
		
		$data['research_id'] = $research_id ;
		$data['get_research'] = $this->Form_leaves_model->get_research_detail($research_id);
		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Form_leaves_model->get_pedigree_plot_repeat($research_id,$repeat);
			$data['get_data'][] = $this->Form_leaves_model->get_data($research_id,$repeat,$keep_time_id);
		}
		// 		echo "<pre>";
		// print_r($data['get_data']);
		// exit();
		$this->load->view('header/admin_header',$data);
	}
	public function excel()
	{

		$research_id = $this->uri->segment(3);
		$keep_time_id = $this->uri->segment(4);
		$leaves_time = $this->Form_leaves_model->get_leaves_time($research_id);
		$last_time = end($leaves_time);
		$data['term'] = $last_time['terms'] ;
		$data['keep_time_id'] = $keep_time_id ;
		$data['research_id'] = $research_id ;
		$data['get_research'] = $this->Form_leaves_model->get_research_detail($research_id);
		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Form_leaves_model->get_pedigree_plot_repeat($research_id,$repeat);
			$data['get_data'][] = $this->Form_leaves_model->get_data($research_id,$repeat,$keep_time_id);
		}
		// echo "<pre>";
		// print_r($data['pedigree_plot']);
		// exit();
		$this->load->view('export_excel',$data);
	}
	public function insert_data()
	{
		$research_id = $this->input->post('research_id');

		$leaves_time = $this->Form_leaves_model->get_leaves_time($research_id);
		$last_time = end($leaves_time);
		if(empty($last_time)){
			$term = 1 ;
		}else{
			$term = $last_time['terms']+1 ;
		}

		$input = array(
			'research_id' => $research_id,
			'keep_date' => $this->input->post('date'),
			'terms' => $term,
			'comment' => $this->input->post('comment')

		);
		$keep_date_id = $this->Form_leaves_model->insert_keep_date($input);


		$dead_leaves = $this->input->post('dead_leaves');
		$roll_leaves = $this->input->post('roll_leaves');

		$plot_no = $this->input->post('plot_no');
		$block = $this->input->post('block');
		$entry = $this->input->post('entry');
		$repeat = $this->input->post('repeatedly');

		// print_r($water_level);

		for ($i=0; $i < count($plot_no); $i++) { 
			$input = array(
				'research_id' => $research_id,
				'dead_leaves' => $dead_leaves[$i],
				'roll_leaves' => $roll_leaves[$i],
				'plot_no' => $plot_no[$i],
				'block' => $block[$i],
				'entry' => $entry[$i],
				'repeatedly' => $repeat[$i],
				'keep_time_id' => $keep_date_id ,
			);
			// echo "<Pre>";
			// print_r($input);
			$this->Form_leaves_model->insert_data($input);
		}
		// exit();
		if(empty($research_id)){
			redirect('research');
		}else{
			redirect('form_leaves/edit_view/'.$research_id.'/'.$keep_date_id);
		}
	}
	public function update_data()
	{
		$research_id = $this->input->post('research_id');
		$keep_time_id = $this->input->post('keep_time_id');

		$input = array(
			'keep_date_id' => $keep_time_id,
			'research_id' => $research_id,
			'keep_date' => $this->input->post('keep_date'),
			'comment' => $this->input->post('comment')
		);
		// echo "<Pre>";
		// print_r($input);
		// exit();
		$this->Form_leaves_model->update_keep_date($input);

		$id = $this->input->post('id');
		$dead_leaves = $this->input->post('dead_leaves');
		$roll_leaves = $this->input->post('roll_leaves');
		$plot_no = $this->input->post('plot_no');
		$block = $this->input->post('block');
		$entry = $this->input->post('entry');
		$repeat = $this->input->post('repeatedly');

		for ($i=0; $i < count($id); $i++) { 
			$input = array(
				'id' => $id[$i],
				'research_id' => $research_id,
				'dead_leaves' => $dead_leaves[$i],
				'roll_leaves' => $roll_leaves[$i],
				'plot_no' => $plot_no[$i],
				'block' => $block[$i],
				'entry' => $entry[$i],
				'repeatedly' => $repeat[$i],
			);

			$this->Form_leaves_model->update_data($input);
		}

		if(empty($research_id)){
			redirect('research');
		}else{
			redirect('form_leaves/edit_view/'.$research_id.'/'.$keep_time_id);
		}

	}
}
