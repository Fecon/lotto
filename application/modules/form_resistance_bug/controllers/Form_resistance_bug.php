<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_resistance_bug extends MX_Controller {
	public function __construct()
    {
      	parent::__construct();
       	$this->load->model('Form_resistance_bug_model');
       	$this->load->model('form_comment/Comment_model');
    }
	public function index()
	{
		$data['content'] = 'form_template/form-testing-template';
		$data['header_title'] = 'ปฏิกิริยาความต้านทานโรคและแมลง';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_resistance_bug/form_resistance_bug';

		$research_id = $this->uri->segment(3);
		$resistance_id = $this->uri->segment(4);
		$data['research_id'] = $research_id ;
		$data['resistance_type_id'] = $resistance_id ;
		
		$data['pedigree_selected'] = $this->Form_resistance_bug_model->get_research_pedigree($research_id);

		$data['department_all'] = $this->Form_resistance_bug_model->get_department_geo();
		$data['resistance'] = $this->Form_resistance_bug_model->get_resistance_bug_detail($resistance_id);

		$check_data = $this->Form_resistance_bug_model->check_data($research_id,$resistance_id);

		if($check_data!=0){
			redirect('form_resistance_bug/edit_view/'.$research_id.'/'.$resistance_id);
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
		// print_r($data['pedigree_selected']);
		// print_r($data['resistance']);
		// exit();

		$this->load->view('header/admin_header',$data);
	}
	public function edit_view()
	{
		$data['content'] = 'form_template/form-testing-template';
		$data['header_title'] = 'ปฏิกิริยาความต้านทานโรคและแมลง';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_resistance_bug/form_resistance_bug_edit';

		$research_id = $this->uri->segment(3);
		$resistance_id = $this->uri->segment(4);
		$data['research_id'] = $research_id ;
		$data['resistance_type_id'] = $resistance_id ;
		
		$data['pedigree_selected'] = $this->Form_resistance_bug_model->get_research_pedigree($research_id);

		$data['department_all'] = $this->Form_resistance_bug_model->get_department_geo();
		$data['resistance'] = $this->Form_resistance_bug_model->get_resistance_bug_detail($resistance_id);

		$check_data = $this->Form_resistance_bug_model->check_data($research_id,$resistance_id);

		if($check_data==0){
			redirect('form_resistance_bug/index/'.$research_id.'/'.$resistance_id);
		}

		$data['get_data'] = $this->Form_resistance_bug_model->get_data($research_id,$resistance_id);

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
		// print_r($data['get_data']);
		// exit();

		$this->load->view('header/admin_header',$data);
	}
	public function insert_data()
	{
		$research_id = $this->input->post('research_id');
		$resistance_type_id = $this->input->post('resistance_type_id');

		$dep_no = $this->input->post('dep_no');
		$value_disease = $this->input->post('value_disease');

		$entry = $this->input->post('entry');
		$pedigree_id = $this->input->post('pedigree_id');

		$this->Form_resistance_bug_model->clear_data($research_id,$resistance_type_id);

		for ($i=0; $i < count($dep_no); $i++) { 
			
			$input = array(
				'resistance_type_id' => $resistance_type_id,
				'research_id' => $research_id,
				'dep_no' => $dep_no[$i],
				'value_disease' => $value_disease[$i],
				'entry' => $entry[$i],
				'pedigree_id' => $pedigree_id[$i],
			);
			// echo "<pre>";
			// print_r($input);
			$this->Form_resistance_bug_model->insert_data($input);	
			
		}

		$form_sub_id = $resistance_type_id;
		$input_comment	= array(
			'research_id' => $research_id, 
			'form_type' => $this->uri->segment(1), 
			'comment' => $this->input->post('comment'), 
			'form_sub_id' => $form_sub_id 
		);
		$this->Comment_model->clear_comment_sub($input_comment);
		$this->Comment_model->insert_data($input_comment);

		// exit();
		if(empty($research_id)){
			redirect('research');
		}else{
			redirect('form_resistance_bug/edit_view/'.$research_id.'/'.$resistance_type_id);
		}
	}

	public function excel()
	{

		$research_id = $this->uri->segment(3);
		$resistance_id = $this->uri->segment(4);
		$data['research_id'] = $research_id ;
		$data['resistance_type_id'] = $resistance_id ;
		
		$data['pedigree_selected'] = $this->Form_resistance_bug_model->get_research_pedigree($research_id);

		$data['department_all'] = $this->Form_resistance_bug_model->get_department_geo();
		$data['resistance'] = $this->Form_resistance_bug_model->get_resistance_bug_detail($resistance_id);

		$data['get_data'] = $this->Form_resistance_bug_model->get_data($research_id,$resistance_id);
		// echo "<pre>";
		// print_r($data['pedigree_plot']);
		// exit();
		$this->load->view('export_excel',$data);
	}
}
