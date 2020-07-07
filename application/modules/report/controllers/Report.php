<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MX_Controller {
	public function __construct()
    {
      	parent::__construct();
       	$this->load->model('Report_model');
    }
	public function index()
	{
		
		$data['get_research_all'] = $this->Report_model->get_research_all();
		$data['type_of_research'] = $this->Report_model->get_type_of_research();
		$data['get_department'] = $this->Report_model->get_department_all();
		$data['content'] = 'report';
		$this->load->view('header/admin_header',$data);
	}
	public function filter_research()
	{
		// $year = $this->uri->segment(3);
		// $tor = $this->uri->segment(4);
		// $dep_no = $this->uri->segment(5);
		$year = $this->input->post('year');
		$tor = $this->input->post('type_of_research');
		$dep_no = $this->input->post('department');
		
		$input = array(
			'year' => $year , 
			'tor' => $tor , 
			'dep_no' => $dep_no , 
			);
		$result = $this->Report_model->filter_search($input);


		echo json_encode($result);
	}
	public function export()
	{
		$research_id = $this->input->post('research');
		$data['research_id'] = $research_id ;
		$data['get_data'] = $this->Report_model->get_export($research_id);
		// echo "<pre>";
		// print_r($data['get_data']);
		// exit();
		$this->load->view('export_excel',$data);
	}


}
