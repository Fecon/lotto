<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_dashboard extends MX_Controller {

	public function index()
	{
		$data['content'] = 'dashboard';
		$this->load->view('header/admin_header',$data);
	}
}
