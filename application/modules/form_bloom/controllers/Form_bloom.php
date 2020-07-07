<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_bloom extends MX_Controller {

	public function __construct()
    {
      	parent::__construct();
       	$this->load->model('Form_bloom_model');
       	$this->load->model('form_comment/Comment_model');
    }
	public function index()
	{
		$data['content'] = 'form_template/form-template';
		$data['header_title'] = 'วันออกดอก';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_bloom/form_bloom';

		$research_id = $this->uri->segment(3);
		$check_data = $this->Form_bloom_model->check_data($research_id);
		if($check_data!=0){
			redirect('form_bloom/edit_view/'.$research_id);
		}

		$form = $this->uri->segment(1);
		$comment = $this->Comment_model->get_comment($research_id,$form);
		if(isset($comment[0]['comment'])){
			$data['comment'] = $comment[0]['comment'];
		}else{
			$data['comment'] = '';
		}

		$data['research_id'] = $research_id ;
		$data['get_research'] = $this->Form_bloom_model->get_research_detail($research_id);

		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Form_bloom_model->get_pedigree_plot_repeat($research_id,$repeat);
		}
		$data['research_date'] = $this->Form_bloom_model->get_research_date($research_id);

		// echo "<pre>";
		// print_r($data['research_date']);
		// exit();

		$this->load->view('header/admin_header',$data);
	}
	public function edit_view()
	{
		$data['content'] = 'form_template/form-template';
		$data['header_title'] = 'วันออกดอก';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_bloom/form_bloom_edit';

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['get_research'] = $this->Form_bloom_model->get_research_detail($research_id);
		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Form_bloom_model->get_pedigree_plot_repeat($research_id,$repeat);
			$data['get_data'][] = $this->Form_bloom_model->get_data($research_id,$repeat);
		}
		$data['research_date'] = $this->Form_bloom_model->get_research_date($research_id);

		$form = $this->uri->segment(1);
		$comment = $this->Comment_model->get_comment($research_id,$form);
		if(isset($comment[0]['comment'])){
			$data['comment'] = $comment[0]['comment'];
		}else{
			$data['comment'] = '';
		}
		
		// 		echo "<pre>";
		// print_r($data['get_data']);
		// exit();
		$this->load->view('header/admin_header',$data);
	}
	public function insert_data()
	{
		$research_id = $this->input->post('research_id');

		$input_grain = $this->input->post('grain');
		$input_bloom50 = $this->input->post('bloom50');
		$input_bloom75 = $this->input->post('bloom75');
		$input_day = $this->input->post('day');
		$plot_no = $this->input->post('plot_no');
		$block = $this->input->post('block');
		$entry = $this->input->post('entry');
		$repeat = $this->input->post('repeatedly');


		for ($i=0; $i < count($plot_no); $i++) { 

			$grain = NULL ;
			if(!empty($input_grain[$i])){
				$date1 = date_create_from_format('d/m/Y', $input_grain[$i]);
				$grain = date_format($date1, 'Y-m-d');

			}
			
			$bloom50 = NULL ;
			if(!empty($input_bloom50[$i])){
				$date2 = date_create_from_format('d/m/Y', $input_bloom50[$i]);
				$bloom50 = date_format($date2, 'Y-m-d');
			}

			$bloom75 = NULL ;
			if(!empty($input_bloom75[$i])){
				$date3 = date_create_from_format('d/m/Y', $input_bloom75[$i]);
				$bloom75 = date_format($date3, 'Y-m-d');
			}

			if(empty($input_day[$i])){
				$day = NULL ;
			}else{
				$day = $input_day[$i] ;
			}


			$input = array(
				'research_id' => $research_id,
				'grain' => $grain,
				'bloom50' => $bloom50,
				'bloom75' => $bloom75,
				'day' => $day,
				'plot_no' => $plot_no[$i],
				'block' => $block[$i],
				'entry' => $entry[$i],
				'repeatedly' => $repeat[$i],
			);

			$this->Form_bloom_model->insert_data($input);
		}

		$input	= array(
			'research_id' => $research_id, 
			'form_type' => $this->uri->segment(1), 
			'comment' => $this->input->post('comment'), 
		);
		$this->Comment_model->clear_comment($input);
		$this->Comment_model->insert_data($input);

		if(empty($research_id)){
			redirect('research');
		}else{
			redirect('form_bloom/edit_view/'.$research_id);
		}
		

	}
	public function update_data()
	{
		$research_id = $this->input->post('research_id');

		$id = $this->input->post('id');
		$input_grain = $this->input->post('grain');
		$input_bloom50 = $this->input->post('bloom50');
		$input_bloom75 = $this->input->post('bloom75');
		$input_day = $this->input->post('day');
		$plot_no = $this->input->post('plot_no');
		$block = $this->input->post('block');
		$entry = $this->input->post('entry');
		$repeat = $this->input->post('repeatedly');

		for ($i=0; $i < count($id); $i++) { 

			$grain = NULL ;
			if(!empty($input_grain[$i])){
				$date1 = date_create_from_format('d/m/Y', $input_grain[$i]);
				$grain = date_format($date1, 'Y-m-d');

			}
			
			$bloom50 = NULL ;
			if(!empty($input_bloom50[$i])){
				$date2 = date_create_from_format('d/m/Y', $input_bloom50[$i]);
				$bloom50 = date_format($date2, 'Y-m-d');
			}

			$bloom75 = NULL ;
			if(!empty($input_bloom75[$i])){
				$date3 = date_create_from_format('d/m/Y', $input_bloom75[$i]);
				$bloom75 = date_format($date3, 'Y-m-d');
			}

			if(empty($input_day[$i])){
				$day = NULL ;
			}else{
				$day = $input_day[$i] ;
			}


			$input = array(
				'id' => $id[$i],
				'research_id' => $research_id,
				'grain' => $grain,
				'bloom50' => $bloom50,
				'bloom75' => $bloom75,
				'day' => $day,
				'plot_no' => $plot_no[$i],
				'block' => $block[$i],
				'entry' => $entry[$i],
				'repeatedly' => $repeat[$i],
			);

			$this->Form_bloom_model->update_data($input);
		}

		$input	= array(
			'research_id' => $research_id, 
			'form_type' => $this->uri->segment(1), 
			'comment' => $this->input->post('comment'), 
		);
		$this->Comment_model->clear_comment($input);
		$this->Comment_model->insert_data($input);

		if(empty($research_id)){
			redirect('research');
		}else{
			redirect('form_bloom/edit_view/'.$research_id);
		}

	}
	public function excel()
	{

		$data['header_title'] = 'วันออกดอก';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_bloom/form_bloom_edit';

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['get_research'] = $this->Form_bloom_model->get_research_detail($research_id);
		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Form_bloom_model->get_pedigree_plot_repeat($research_id,$repeat);
			$data['get_data'][] = $this->Form_bloom_model->get_data($research_id,$repeat);
		}
		$data['research_date'] = $this->Form_bloom_model->get_research_date($research_id);
		// 		echo "<pre>";
		// print_r($data['get_data']);
		// exit();
		
		$this->load->view('export_excel',$data);
	}
}
