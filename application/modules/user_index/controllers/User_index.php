<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_index extends MX_Controller {

	public function index()
	{
		$data['user_data'] = $this->session->userdata('user_data');
		$data['content'] = 'user_index';
		$this->load->view('header/admin_header',$data);
	}
}
