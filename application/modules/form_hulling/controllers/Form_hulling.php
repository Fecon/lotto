<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_hulling extends MX_Controller {
	public function __construct()
    {
      	parent::__construct();
       	$this->load->model('Form_hulling_model');
       	$this->load->model('form_comment/Comment_model');
    }
	public function index()
	{
		$data['content'] = 'form_template/form-template';
		$data['header_title'] = 'คุณภาพการสี';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_hulling/form_hulling';

		$research_id = $this->uri->segment(3);
		$pedigree_id = $this->uri->segment(4);
		$data['research_id'] = $research_id ;

		$data['pedigree'] = $this->Form_hulling_model->get_pedigree_detail($pedigree_id);
		$data['research'] = $this->Form_hulling_model->get_research_detail($research_id);
		$check_data = $this->Form_hulling_model->check_data($research_id,$pedigree_id);
		if($check_data!=0){
			redirect('form_hulling/edit_view/'.$research_id.'/'.$pedigree_id);
		}
		$data['repeat'] = $data['research']['repeat_amount'] ;

		$this->load->view('header/admin_header',$data);
	}
	public function edit_view()
	{
		$data['content'] = 'form_template/form-template';
		$data['header_title'] = 'คุณภาพการสี';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_hulling/form_hulling_edit';

		$research_id = $this->uri->segment(3);
		$pedigree_id = $this->uri->segment(4);
		$data['research_id'] = $research_id ;

		$data['pedigree'] = $this->Form_hulling_model->get_pedigree_detail($pedigree_id);
		$data['research'] = $this->Form_hulling_model->get_research_detail($research_id);

		$check_data = $this->Form_hulling_model->check_data($research_id,$pedigree_id);
		if($check_data==0){
			redirect('form_hulling/index/'.$research_id.'/'.$pedigree_id);
		}

		$data['get_data'] = $this->Form_hulling_model->get_data($research_id,$pedigree_id);

		if(empty($data['get_data'])){
			redirect('form_hulling/index/'.$research_id.'/'.$pedigree_id);
		}

		if(isset($data['get_data'][0])){
			$data['comment'] = $data['get_data'][0]['comment'];
		}else{
			$data['comment'] = "";
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
				'check_date' => $date,
				'data1' => $this->input->post('data1'),
				'data2' => $this->input->post('data2'),
				'data3' => $this->input->post('data3'),
				'data4' => $this->input->post('data4'),
				'data5' => $this->input->post('data5'),
				'data6' => $this->input->post('data6'),
				'data7' => $this->input->post('data7'),
				'data8' => $this->input->post('data8'),
				'data9' => $this->input->post('data9'),
				'data10' => $this->input->post('data10'),
				'data11' => $this->input->post('data11'),
				'comment' => $this->input->post('comment'),
				'research_id' => $this->input->post('research_id'),
				'pedigree_id' => $this->input->post('pedigree_id'),
			);
			$id = $this->Form_hulling_model->insert_data($inputData);

		if(empty($inputData['research_id'])){
			redirect('research');
		}else{
			redirect('form_hulling/edit_view/'.$inputData['research_id'].'/'.$inputData['pedigree_id']);
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
				'check_date' => $date,
				'data1' => $this->input->post('data1'),
				'data2' => $this->input->post('data2'),
				'data3' => $this->input->post('data3'),
				'data4' => $this->input->post('data4'),
				'data5' => $this->input->post('data5'),
				'data6' => $this->input->post('data6'),
				'data7' => $this->input->post('data7'),
				'data8' => $this->input->post('data8'),
				'data9' => $this->input->post('data9'),
				'data10' => $this->input->post('data10'),
				'data11' => $this->input->post('data11'),
				'comment' => $this->input->post('comment'),
			);
			$this->Form_hulling_model->update_data($inputData);

		if(empty($inputData['research_id'])){
			redirect('research');
		}else{
			redirect('form_hulling/edit_view/'.$inputData['research_id'].'/'.$inputData['pedigree_id']);
		}
	}
	public function excel()
	{

		$research_id = $this->uri->segment(3);
		$pedigree_id = $this->uri->segment(4);
		$data['research_id'] = $research_id ;

		$data['pedigree'] = $this->Form_hulling_model->get_pedigree_detail($pedigree_id);
		$data['research'] = $this->Form_hulling_model->get_research_detail($research_id);

		$data['get_data'] = $this->Form_hulling_model->get_data($research_id,$pedigree_id);

		// echo "<pre>";
		// print_r($data['get_data']);
		// exit();
		$this->load->view('export_excel',$data);
	}
}
