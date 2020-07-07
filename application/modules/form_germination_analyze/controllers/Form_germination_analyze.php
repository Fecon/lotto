<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_germination_analyze extends MX_Controller {
	public function __construct()
    {
      	parent::__construct();
       	$this->load->model('Form_germination_analyze_model');
       	$this->load->model('form_comment/Comment_model');
    }
	public function index()
	{
		$data['content'] = 'form_template/form-template';
		$data['header_title'] = 'ผลการวิเคราะห์ความงอก';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_germination_analyze/form_germination_analyze';

		$research_id = $this->uri->segment(3);
		$pedigree_id = $this->uri->segment(4);
		$data['research_id'] = $research_id ;

		$data['pedigree'] = $this->Form_germination_analyze_model->get_pedigree_detail($pedigree_id);
		$data['research'] = $this->Form_germination_analyze_model->get_research_detail($research_id);
		$check_data = $this->Form_germination_analyze_model->check_data($research_id,$pedigree_id);
		if($check_data!=0){
			redirect('form_germination_analyze/edit_view/'.$research_id.'/'.$pedigree_id);
		}
		$data['repeat'] = $data['research']['repeat_amount'] ;

		$form = $this->uri->segment(1);
		$form_sub_id = $this->uri->segment(4);
		$comment = $this->Comment_model->get_comment_sub($research_id,$form,$form_sub_id);
		if(isset($comment[0]['comment'])){
			$data['comment'] = $comment[0]['comment'];
		}else{
			$data['comment'] = '';
		}

		$this->load->view('header/admin_header',$data);
	}
	public function edit_view()
	{
		$data['content'] = 'form_template/form-template';
		$data['header_title'] = 'ผลการวิเคราะห์ความงอก';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_germination_analyze/form_germination_analyze_edit';

		$research_id = $this->uri->segment(3);
		$pedigree_id = $this->uri->segment(4);
		$data['research_id'] = $research_id ;

		$data['pedigree'] = $this->Form_germination_analyze_model->get_pedigree_detail($pedigree_id);
		$data['research'] = $this->Form_germination_analyze_model->get_research_detail($research_id);
		$data['repeat'] = $data['research']['repeat_amount'] ;

		$check_data = $this->Form_germination_analyze_model->check_data($research_id,$pedigree_id);
		if($check_data==0){
			redirect('form_germination_analyze/index/'.$research_id.'/'.$pedigree_id);
		}

		$data['get_data'] = $this->Form_germination_analyze_model->get_data($research_id,$pedigree_id);

		if(empty($data['get_data'])){
			redirect('form_germination_analyze/index/'.$research_id.'/'.$pedigree_id);
		}

		if(isset($data['get_data'][0])){
			$data['germination_repeat'] = $data['get_data'][0]['germination_repeat'];
			$data['comment'] = $data['get_data'][0]['comment'];
		}else{
			$data['germination_repeat'] =  array();
			$data['comment'] = "";
		}

		$form = $this->uri->segment(1);
		$form_sub_id = $this->uri->segment(4);
		$comment = $this->Comment_model->get_comment_sub($research_id,$form,$form_sub_id);
		if(isset($comment[0]['comment'])){
			$data['comment'] = $comment[0]['comment'];
		}else{
			$data['comment'] = '';
		}
		
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
				'avg_data3' => $this->input->post('avg_data3'),
				'avg_data4' => $this->input->post('avg_data4'),
				'avg_data5' => $this->input->post('avg_data5'),
				'avg_data6' => $this->input->post('avg_data6'),
				'comment' => $this->input->post('comment'),
				'research_id' => $this->input->post('research_id'),
				'pedigree_id' => $this->input->post('pedigree_id'),
			);
			$id = $this->Form_germination_analyze_model->insert_data($inputData);

		$repeat = $this->input->post('repeat');
		
		for ($i=0; $i < ($repeat) ; $i++) { 

				$input = array(
				'analyze_id' => $id,
				'weight' => $this->input->post('weight')[$i],
				'data1' => $this->input->post('data1')[$i],
				'data2' => $this->input->post('data2')[$i],
				'data3' => $this->input->post('data3')[$i],
				'data4' => $this->input->post('data4')[$i],
				'data5' => $this->input->post('data5')[$i],
				'data6' => $this->input->post('data6')[$i],
				'repeatedly' => $i+1,
				'research_id' => $this->input->post('research_id'),
			);

			$this->Form_germination_analyze_model->insert_repeat_data($input);

		}

		$form_sub_id = $inputData['pedigree_id'];
		$input_comment	= array(
			'research_id' => $inputData['research_id'], 
			'form_type' => $this->uri->segment(1), 
			'comment' => $this->input->post('comment'), 
			'form_sub_id' => $form_sub_id 
		);
		$this->Comment_model->clear_comment_sub($input_comment);
		$this->Comment_model->insert_data($input_comment);

		if(empty($inputData['research_id'])){
			redirect('research');
		}else{
			redirect('form_germination_analyze/edit_view/'.$inputData['research_id'].'/'.$inputData['pedigree_id']);
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
				'avg_data3' => $this->input->post('avg_data3'),
				'avg_data4' => $this->input->post('avg_data4'),
				'avg_data5' => $this->input->post('avg_data5'),
				'avg_data6' => $this->input->post('avg_data6'),
				'comment' => $this->input->post('comment'),
				'research_id' => $this->input->post('research_id'),
				'pedigree_id' => $this->input->post('pedigree_id'),
			);
			$this->Form_germination_analyze_model->update_data($inputData);
		

		$this->Form_germination_analyze_model->clear_data($inputData['id']);

		$repeat = $this->input->post('repeat');

		for ($i=0; $i < ($repeat) ; $i++) { 
				$check_date = $this->input->post('date')[$i];
				if(!empty($check_date)){
					$date = $check_date;
				}else{
					$date = date('Y-m-d');
				}

				$check_weight = $this->input->post('weight')[$i];
				if(!empty($check_weight)){
					$weight = $check_weight;
				}else{
					$weight = NULL;
				}
				$input = array(
				'analyze_id' => $this->input->post('id'),
				'weight' => $this->input->post('weight')[$i],
				'data1' => $this->input->post('data1')[$i],
				'data2' => $this->input->post('data2')[$i],
				'data3' => $this->input->post('data3')[$i],
				'data4' => $this->input->post('data4')[$i],
				'data5' => $this->input->post('data5')[$i],
				'data6' => $this->input->post('data6')[$i],
				'repeatedly' => $i+1,
				'research_id' => $this->input->post('research_id'),
			);

			$this->Form_germination_analyze_model->insert_repeat_data($input);

		}

		$form_sub_id = $inputData['pedigree_id'];
		$input_comment	= array(
			'research_id' => $inputData['research_id'], 
			'form_type' => $this->uri->segment(1), 
			'comment' => $this->input->post('comment'), 
			'form_sub_id' => $form_sub_id 
		);
		$this->Comment_model->clear_comment_sub($input_comment);
		$this->Comment_model->insert_data($input_comment);

		if(empty($inputData['research_id'])){
			redirect('research');
		}else{
			redirect('form_germination_analyze/edit_view/'.$inputData['research_id'].'/'.$inputData['pedigree_id']);
		}
	}
	public function excel()
	{

		$research_id = $this->uri->segment(3);
		$pedigree_id = $this->uri->segment(4);
		$data['research_id'] = $research_id ;

		$data['pedigree'] = $this->Form_germination_analyze_model->get_pedigree_detail($pedigree_id);
		$data['research'] = $this->Form_germination_analyze_model->get_research_detail($research_id);
		$data['repeat'] = $data['research']['repeat_amount'] ;

		$data['get_data'] = $this->Form_germination_analyze_model->get_data($research_id,$pedigree_id);

		if(isset($data['get_data'][0])){
			$data['germination_repeat'] = $data['get_data'][0]['germination_repeat'];
		}else{
			$data['germination_repeat'] =  array();
		}
		// echo "<pre>";
		// print_r($data['pedigree_plot']);
		// exit();
		$this->load->view('export_excel',$data);
	}
}
