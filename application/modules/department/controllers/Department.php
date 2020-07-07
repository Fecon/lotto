<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends MX_Controller {
	public function __construct()
    {
      	parent::__construct();
       	$this->load->model('Department_model');
    }
	public function index()
	{
		$data['geo_all'] = $this->Department_model->get_research_geo();
		$data['department_all'] = $this->Department_model->get_department_all();
		// echo '<pre>';
		// print_r($data['geo_all']);
		// exit();
		$data['content'] = 'department';
		$this->load->view('header/admin_header',$data);
	}
	public function detail()
	{
		$dep_id = $this->uri->segment(3);
		$data['user_data'] = $this->session->userdata('user_data');
		$data['department'] = $this->Department_model->get_department($dep_id);
		$data['content'] = 'department-detail';
		$this->load->view('header/admin_header',$data);
	}
	public function edit_view()
	{
		$dep_id = $this->uri->segment(3);
		$data['department'] = $this->Department_model->get_department($dep_id);
		$data['content'] = 'department-view';
		$this->load->view('header/admin_header',$data);
	}
	public function update_department()
	{
		$input = array(
			'dep_id' => $this->input->post('dep_id'),
			'dep_no' => $this->input->post('dep_no'),
			'dep_name' => $this->input->post('dep_name'),
			'dep_shotname_en' => $this->input->post('dep_no'),
			'dep_zone' => $this->input->post('dep_zone'),
			'dep_province' => $this->input->post('dep_province'),
			'dep_address' => $this->input->post('dep_address'),
			'dep_tel' => $this->input->post('dep_tel'),
			'dep_email' => $this->input->post('dep_email'),
			'dep_link' => $this->input->post('dep_link'),
		);
		// echo "<Pre>";
		// print_r($input);
		// exit();
		$this->Department_model->update_department($input);
		redirect('department/detail/'.$input['dep_id']);
	}
}