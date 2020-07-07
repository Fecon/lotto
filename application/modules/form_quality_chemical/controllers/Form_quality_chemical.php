<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_quality_chemical extends MX_Controller {
	public function __construct()
    {
      	parent::__construct();
       	$this->load->model('Form_quality_chemical_model');
       	$this->load->model('form_comment/Comment_model');
    }
	public function index()
	{
		$data['content'] = 'form_template/form-testing-template';
		$data['header_title'] = 'คุณภาพเมล็ดทางเคมี';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_quality_chemical/form_quality_chemical';

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		
		$data['pedigree_selected'] = $this->Form_quality_chemical_model->get_research_pedigree($research_id);

		$data['department_all'] = $this->Form_quality_chemical_model->get_department_geo();


		$check_data = $this->Form_quality_chemical_model->check_data($research_id);

		if($check_data!=0){
			redirect('form_quality_chemical/edit_view/'.$research_id);
		}

		$form = $this->uri->segment(1);
		$comment = $this->Comment_model->get_comment($research_id,$form);
		if(isset($comment[0]['comment'])){
			$data['comment'] = $comment[0]['comment'];
		}else{
			$data['comment'] = '';
		}
		// echo "<pre>";
		// print_r($data['pedigree_selected']);
		// exit();

		$this->load->view('header/admin_header',$data);
	}
	public function edit_view()
	{
		$data['content'] = 'form_template/form-testing-template';
		$data['header_title'] = 'คุณภาพเมล็ดทางเคมี';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_quality_chemical/form_quality_chemical_edit';

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		
		$data['pedigree_selected'] = $this->Form_quality_chemical_model->get_research_pedigree($research_id);

		$data['department_all'] = $this->Form_quality_chemical_model->get_department_geo();

		$check_data = $this->Form_quality_chemical_model->check_data($research_id);

		if($check_data==0){
			redirect('form_quality_chemical/index/'.$research_id);
		}

		$data['get_data'] = $this->Form_quality_chemical_model->get_data($research_id);

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
		$amylose = $this->input->post('amylose');
		$alkali_14 = $this->input->post('alkali_14');
		$alkali_17 = $this->input->post('alkali_17');
		$aroma = $this->input->post('aroma');
		$chaliness = $this->input->post('chaliness');



		$entry = $this->input->post('entry');
		$pedigree_id = $this->input->post('pedigree_id');

		$this->Form_quality_chemical_model->clear_data($research_id);

		for ($i=0; $i < count($dep_no); $i++) { 
			if(empty($dep_no[$i])){
				$amylose[$i] = NULL ;
				$alkali_14[$i] = NULL ;
				$alkali_17[$i] = NULL ;
				$aroma[$i] = NULL ;
				$chaliness[$i] = NULL ;
			}
			$input = array(
				'research_id' => $research_id,
				'dep_no' => $dep_no[$i],
				'amylose' => $amylose[$i],
				'alkali_14' => $alkali_14[$i],
				'alkali_17' => $alkali_17[$i],
				'aroma' => $aroma[$i],
				'chaliness' => $chaliness[$i],
				'entry' => $entry[$i],
				'pedigree_id' => $pedigree_id[$i],
			);
			// echo "<pre>";
			// print_r($input);
			$this->Form_quality_chemical_model->insert_data($input);
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
			redirect('form_quality_chemical/edit_view/'.$research_id);
		}
	}
	public function excel()
	{

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		
		$data['pedigree_selected'] = $this->Form_quality_chemical_model->get_research_pedigree($research_id);

		$data['department_all'] = $this->Form_quality_chemical_model->get_department_geo();
		$data['get_data'] = $this->Form_quality_chemical_model->get_data($research_id);

		// echo "<pre>";
		// print_r($data['pedigree_plot']);
		// exit();
		$this->load->view('export_excel',$data);
	}
	
}
