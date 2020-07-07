<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_1000_weight extends MX_Controller {

	public function __construct()
    {
      	parent::__construct();
       	$this->load->model('Form_1000_weight_model');
       	$this->load->model('form_comment/Comment_model');
    }
	public function index()
	{
		$data['content'] = 'form_template/form-testing-template';
		$data['header_title'] = 'น้ำหนัก 1000 เมล็ด';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_1000_weight/form_1000_weight';

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		
		$data['get_research'] = $this->Form_1000_weight_model->get_research_detail($research_id);
		$data['pedigree_selected'] = $this->Form_1000_weight_model->get_research_pedigree($research_id);

		$form = $this->uri->segment(1);
		$comment = $this->Comment_model->get_comment($research_id,$form);
		if(isset($comment[0]['comment'])){
			$data['comment'] = $comment[0]['comment'];
		}else{
			$data['comment'] = '';
		}

		$check_data = $this->Form_1000_weight_model->check_data($research_id);

		if($check_data!=0){
			redirect('form_1000_weight/edit_view/'.$research_id);
		}

		if(empty($research_id)){
			redirect('research');
		}

		$this->load->view('header/admin_header',$data);
	}
	public function edit_view()
	{
		$data['content'] = 'form_template/form-testing-template';
		$data['header_title'] = 'น้ำหนัก 1000 เมล็ด';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_1000_weight/form_1000_weight_edit';

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['get_research'] = $this->Form_1000_weight_model->get_research_detail($research_id);
		$data['pedigree_selected'] = $this->Form_1000_weight_model->get_research_pedigree($research_id);

		$data['get_data'] = $this->Form_1000_weight_model->get_data($research_id);

		$form = $this->uri->segment(1);
		$comment = $this->Comment_model->get_comment($research_id,$form);
		if(isset($comment[0]['comment'])){
			$data['comment'] = $comment[0]['comment'];
		}else{
			$data['comment'] = '';
		}

		if(empty($research_id)){
			redirect('research');
		}

		if(empty($data['get_data'])){
			redirect('form_1000_weight/index/'.$research_id);
		}

		// echo "<pre>";
		// print_r($data);
		// exit();
		$this->load->view('header/admin_header',$data);
	}
	public function insert_data()
	{
		$research_id = $this->input->post('research_id');

		for($slot = 1 ; $slot <= 5 ; $slot++){
			$no[$slot] = $this->input->post('no_'.$slot);
		}
		$input_average = $this->input->post('average');
		$entry = $this->input->post('entry');
		$pedigree_id = $this->input->post('pedigree_id');

		for ($i=0; $i < count($pedigree_id); $i++) {

			for($slot = 1 ; $slot <= 5 ; $slot++){
				
				if(empty($no[$slot][$i])){
					$no[$slot][$i] = NULL ;
				}else{
					$no[$slot][$i] = $no[$slot][$i] ;
				}
			}

			if(empty($input_average[$i])){
				$average = NULL ;
			}else{
				$average = $input_average[$i] ;
			}
			

			$input = array(
				'research_id' => $research_id,
				'no_1' => $no[1][$i],
				'no_2' => $no[2][$i],
				'no_3' => $no[3][$i],
				'no_4' => $no[4][$i],
				'no_5' => $no[5][$i],
				'average' => $average,
				'entry' => $entry[$i],
				'pedigree_id' => $pedigree_id[$i],
			);
			// echo "<Pre>";
			// print_r($input);
			$this->Form_1000_weight_model->insert_data($input);
		}
		
		$input_comment	= array(
			'research_id' => $research_id, 
			'form_type' => $this->uri->segment(1), 
			'comment' => $this->input->post('comment'), 
		);
		$this->Comment_model->clear_comment($input_comment);
		$this->Comment_model->insert_data($input_comment);
		// exit();
		if(empty($research_id)){
			redirect('research');
		}else{
			redirect('form_1000_weight/edit_view/'.$research_id);
		}
	}
	public function update_data()
	{
		$research_id = $this->input->post('research_id');

		$id = $this->input->post('id');
		for($slot = 1 ; $slot <= 5 ; $slot++){
			$no[$slot] = $this->input->post('no_'.$slot);
		}
		$input_average = $this->input->post('average');

		for ($i=0; $i < count($id); $i++) { 

			for($slot = 1 ; $slot <= 5 ; $slot++){
				
				if(empty($no[$slot][$i])){
					$no[$slot][$i] = NULL ;
				}else{
					$no[$slot][$i] = $no[$slot][$i] ;
				}
			}

			if(empty($input_average[$i])){
				$average = NULL ;
			}else{
				$average = $input_average[$i] ;
			}

			$input = array(
				'id' => $id[$i],
				'no_1' => $no[1][$i],
				'no_2' => $no[2][$i],
				'no_3' => $no[3][$i],
				'no_4' => $no[4][$i],
				'no_5' => $no[5][$i],
				'average' => $average,
			);
			// echo "<Pre>";
			// print_r($input);

			$this->Form_1000_weight_model->update_data($input);
		}

		$input_comment	= array(
			'research_id' => $research_id, 
			'form_type' => $this->uri->segment(1), 
			'comment' => $this->input->post('comment'), 
		);
		$this->Comment_model->clear_comment($input_comment);
		$this->Comment_model->insert_data($input_comment);
		// exit();
		if(empty($research_id)){
			redirect('research');
		}else{
			redirect('form_1000_weight/edit_view/'.$research_id);
		}

	}
	public function excel()
	{

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['get_research'] = $this->Form_1000_weight_model->get_research_detail($research_id);
		$data['pedigree_selected'] = $this->Form_1000_weight_model->get_research_pedigree($research_id);

		$data['get_data'] = $this->Form_1000_weight_model->get_data($research_id);
		// echo "<pre>";
		// print_r($data['pedigree_plot']);
		// exit();
		$this->load->view('export_excel',$data);
	}
}
