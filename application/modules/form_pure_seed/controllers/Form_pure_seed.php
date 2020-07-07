<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_pure_seed extends MX_Controller {
	public function __construct()
    {
      	parent::__construct();
       	$this->load->model('Form_pure_seed_model');
       	$this->load->model('form_comment/Comment_model');
    }
	public function index()
	{
		$data['content'] = 'form_template/form-template';
		$data['header_title'] = 'ตรวจสอบความบริสุทธุิ์ของเมล็ดพันธุ์';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_pure_seed/form_pure_seed';

		$research_id = $this->uri->segment(3);
		$pedigree_id = $this->uri->segment(4);
		$data['research_id'] = $research_id ;

		$data['pedigree'] = $this->Form_pure_seed_model->get_pedigree_detail($pedigree_id);
		$data['research'] = $this->Form_pure_seed_model->get_research_detail($research_id);
		$data['repeat'] = $data['research']['repeat_amount'] ;

		$form = $this->uri->segment(1);
		$form_sub_id = $this->uri->segment(4);
		$comment = $this->Comment_model->get_comment_sub($research_id,$form,$form_sub_id);
		if(isset($comment[0]['comment'])){
			$data['comment'] = $comment[0]['comment'];
		}else{
			$data['comment'] = '';
		}

		// echo "<pre>";
		// print_r($data);
		// exit();
		$this->load->view('header/admin_header',$data);
	}
	public function edit_view()
	{
		$data['content'] = 'form_template/form-template';
		$data['header_title'] = 'ตรวจสอบความบริสุทธุิ์ของเมล็ดพันธุ์';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_pure_seed/form_pure_seed_edit';

		$research_id = $this->uri->segment(3);
		$pedigree_id = $this->uri->segment(4);
		$data['research_id'] = $research_id ;

		$data['pedigree'] = $this->Form_pure_seed_model->get_pedigree_detail($pedigree_id);
		$data['research'] = $this->Form_pure_seed_model->get_research_detail($research_id);
		$data['repeat'] = $data['research']['repeat_amount'] ;

		$check_data = $this->Form_pure_seed_model->check_data($research_id,$pedigree_id);
		if($check_data==0){
			redirect('form_pure_seed/index/'.$research_id.'/'.$pedigree_id);
		}

		$data['get_data'] = $this->Form_pure_seed_model->get_data($research_id,$pedigree_id);

		if(empty($data['get_data'])){
			redirect('form_pure_seed/index/'.$research_id.'/'.$pedigree_id);
		}

		if(isset($data['get_data'][0])){
			$data['pure_seed_repeat'] = $data['get_data'][0]['pure_seed_repeat'];
		}else{
			$data['pure_seed_repeat'] =  array();
		}

		$form = $this->uri->segment(1);
		$form_sub_id = $this->uri->segment(4);
		$comment = $this->Comment_model->get_comment_sub($research_id,$form,$form_sub_id);
		if(isset($comment[0]['comment'])){
			$data['comment'] = $comment[0]['comment'];
		}else{
			$data['comment'] = '';
		}
		
		// echo "<pre>";
		// print_r($data['pure_seed_repeat']);
		// exit();

		$this->load->view('header/admin_header',$data);
	}
	public function insert_data()
	{
		$check_date = $this->input->post('check_date');
		if(!empty($check_date)){
			$date = $check_date;
		}else{
			$date = date('Y-m-d');
		}

			$inputData = array(
				'plant_type' => $this->input->post('plant_type'),
				'check_date' => $date,
				'checker_name' => $this->input->post('checker_name'),
				'other_seed' => $this->input->post('other_seed'),
				'contamination' => $this->input->post('contamination'),
				'avg_pure_seed' => $this->input->post('avg_pure_seed'),
				'avg_other_seed' => $this->input->post('avg_other_seed'),
				'avg_contamination' => $this->input->post('avg_contamination'),
				'avg_total' => $this->input->post('avg_total'),
				'research_id' => $this->input->post('research_id'),
				'pedigree_id' => $this->input->post('pedigree_id'),
			);

			$id = $this->Form_pure_seed_model->insert_data($inputData);

		$repeat = $this->input->post('repeat');
		// exit();
		for ($i=1; $i <= $repeat ; $i++) { 
			$input = array(
				'pure_seed_id' => $id,
				'weight_seed' => $this->input->post('weight_seed'.$i),
				'weight_pure_seed' => $this->input->post('weight_pure_seed'.$i),
				'weight_other_seed' => $this->input->post('weight_other_seed'.$i),
				'weight_contamination' => $this->input->post('weight_contamination'.$i),
				'percent_pure_seed' => $this->input->post('percent_pure_seed'.$i),
				'percent_other_seed' => $this->input->post('percent_other_seed'.$i),
				'percent_contamination' => $this->input->post('percent_contamination'.$i),
				'repeatedly' => $i,
				'research_id' => $this->input->post('research_id'),
			);

			$this->Form_pure_seed_model->insert_repeat_data($input);

		}

		$form_sub_id = $inputData['pedigree_id'];
		$input_comment	= array(
			'research_id' => $input['research_id'], 
			'form_type' => $this->uri->segment(1), 
			'comment' => $this->input->post('comment'), 
			'form_sub_id' => $form_sub_id 
		);
		$this->Comment_model->clear_comment_sub($input_comment);
		$this->Comment_model->insert_data($input_comment);

		if(empty($inputData['research_id'])){
			redirect('research');
		}else{
			redirect('form_pure_seed/edit_view/'.$inputData['research_id'].'/'.$inputData['pedigree_id']);
		}
	}
	public function update_data()
	{
		$check_date = $this->input->post('check_date');
		if(!empty($check_date)){
			$date = $check_date;
		}else{
			$date = date('Y-m-d');
		}

			$inputData = array(
				'id' => $this->input->post('id'),
				'plant_type' => $this->input->post('plant_type'),
				'check_date' => $date,
				'checker_name' => $this->input->post('checker_name'),
				'other_seed' => $this->input->post('other_seed'),
				'contamination' => $this->input->post('contamination'),
				'avg_pure_seed' => $this->input->post('avg_pure_seed'),
				'avg_other_seed' => $this->input->post('avg_other_seed'),
				'avg_contamination' => $this->input->post('avg_contamination'),
				'avg_total' => $this->input->post('avg_total'),
				'research_id' => $this->input->post('research_id'),
				'pedigree_id' => $this->input->post('pedigree_id'),
			);
			// exit();
			$this->Form_pure_seed_model->update_data($inputData);
		

		$this->Form_pure_seed_model->clear_data($inputData['id']);

		$repeat = $this->input->post('repeat');
		// exit();
		for ($i=1; $i <= $repeat ; $i++) { 
			$input = array(
				'pure_seed_id' => $inputData['id'],
				'weight_seed' => $this->input->post('weight_seed'.$i),
				'weight_pure_seed' => $this->input->post('weight_pure_seed'.$i),
				'weight_other_seed' => $this->input->post('weight_other_seed'.$i),
				'weight_contamination' => $this->input->post('weight_contamination'.$i),
				'percent_pure_seed' => $this->input->post('percent_pure_seed'.$i),
				'percent_other_seed' => $this->input->post('percent_other_seed'.$i),
				'percent_contamination' => $this->input->post('percent_contamination'.$i),
				'repeatedly' => $i,
				'research_id' => $this->input->post('research_id'),
			);
			$this->Form_pure_seed_model->insert_repeat_data($input);

		}
			
		$form_sub_id = $inputData['pedigree_id'];
		$input_comment	= array(
			'research_id' => $input['research_id'], 
			'form_type' => $this->uri->segment(1), 
			'comment' => $this->input->post('comment'), 
			'form_sub_id' => $form_sub_id 
		);
		$this->Comment_model->clear_comment_sub($input_comment);
		$this->Comment_model->insert_data($input_comment);

		// exit();
		if(empty($inputData['research_id'])){
			redirect('research');
		}else{
			redirect('form_pure_seed/edit_view/'.$inputData['research_id'].'/'.$inputData['pedigree_id']);
		}
	}
}
