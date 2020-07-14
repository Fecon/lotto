<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_index extends MX_Controller {

	public function __construct()
  {
  	parent::__construct();
  	$this->load->model('Buy_model');
  }

	public function index()
	{
		$data['list_agent'] = $this->Buy_model->list_agent();
		$data['lotto'] = $this->Buy_model->get_lotto();
		$data['content'] = 'user_index';
		$this->load->view('header/admin_header',$data);
	}
}
