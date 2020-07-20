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
		// $data['count_all'] = $this->Dashboard_model->count_research_all();

		// echo "<Pre>";
		// print_r($data);
		// exit();

		$data['content'] = 'report';

		$this->load->view('header/admin_header',$data);
	}
}
