<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_quality_physical extends MX_Controller {
	public function __construct()
    {
      	parent::__construct();
       	$this->load->model('Form_quality_physical_model');
       	$this->load->model('form_comment/Comment_model');
    }
	public function index()
	{
		$data['content'] = 'form_template/form-testing-template';
		$data['header_title'] = 'คุณภาพเมล็ดทางกายภาพ';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_quality_physical/form_quality_physical';

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		
		$data['pedigree_selected'] = $this->Form_quality_physical_model->get_research_pedigree($research_id);

		$data['department_all'] = $this->Form_quality_physical_model->get_department_geo();


		$check_data = $this->Form_quality_physical_model->check_data($research_id);

		if($check_data!=0){
			redirect('form_quality_physical/edit_view/'.$research_id);
		}

		$form = $this->uri->segment(1);
		$comment = $this->Comment_model->get_comment($research_id,$form);
		if(isset($comment[0]['comment'])){
			$data['comment'] = $comment[0]['comment'];
		}else{
			$data['comment'] = '';
		}

		$this->load->view('header/admin_header',$data);
	}
	public function edit_view()
	{
		$data['content'] = 'form_template/form-testing-template';
		$data['header_title'] = 'คุณภาพเมล็ดทางกายภาพ';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_quality_physical/form_quality_physical_edit';

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		
		$data['pedigree_selected'] = $this->Form_quality_physical_model->get_research_pedigree($research_id);

		$data['department_all'] = $this->Form_quality_physical_model->get_department_geo();

		$check_data = $this->Form_quality_physical_model->check_data($research_id);

		if($check_data==0){
			redirect('form_quality_physical/index/'.$research_id);
		}

		$data['get_data'] = $this->Form_quality_physical_model->get_data($research_id);

		$form = $this->uri->segment(1);
		$comment = $this->Comment_model->get_comment($research_id,$form);
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

		$dep_no = $this->input->post('dep_no');
		$hull_color = $this->input->post('hull_color');
		$off_type = $this->input->post('off_type');
		$width = $this->input->post('width');
		$length = $this->input->post('length');
		$shape = $this->input->post('shape');



		$entry = $this->input->post('entry');
		$pedigree_id = $this->input->post('pedigree_id');

		$this->Form_quality_physical_model->clear_data($research_id);

		for ($i=0; $i < count($dep_no); $i++) { 
			if(empty($dep_no[$i])){
				$hull_color[$i] = NULL ;
				$off_type[$i] = NULL ;
				$width[$i] = NULL ;
				$length[$i] = NULL ;
				$shape[$i] = NULL ;
			}
			$input = array(
				'research_id' => $research_id,
				'dep_no' => $dep_no[$i],
				'hull_color' => $hull_color[$i],
				'off_type' => $off_type[$i],
				'width' => $width[$i],
				'length' => $length[$i],
				'shape' => $shape[$i],
				'entry' => $entry[$i],
				'pedigree_id' => $pedigree_id[$i],
			);
			// echo "<pre>";
			// print_r($input);
			$this->Form_quality_physical_model->insert_data($input);
		}

		$input	= array(
			'research_id' => $research_id, 
			'form_type' => $this->uri->segment(1), 
			'comment' => $this->input->post('comment'), 
		);
		$this->Comment_model->clear_comment($input);
		$this->Comment_model->insert_data($input);

		// exit();
		if(empty($research_id)){
			redirect('research');
		}else{
			redirect('form_quality_physical/edit_view/'.$research_id);
		}
	}
	public function excel()
	{
		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		
		$data['pedigree_selected'] = $this->Form_quality_physical_model->get_research_pedigree($research_id);

		$data['department_all'] = $this->Form_quality_physical_model->get_department_geo();

		$data['get_data'] = $this->Form_quality_physical_model->get_data($research_id);
		// echo "<pre>";
		// print_r($data['pedigree_plot']);
		// exit();
		$this->load->view('export_excel',$data);
	}

	
}
