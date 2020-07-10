<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
    }
	public function index()
	{
		$data['list_lotto'] = $this->Dashboard_model->list_lotto();
		$data['list_agent'] = $this->Dashboard_model->list_agent();

		// echo "<Pre>";
		// print_r($data);
		// exit();

		$data['content'] = 'dashboard';

		$this->load->view('header/admin_header',$data);
	}
}
