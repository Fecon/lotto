<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download_app extends MX_Controller {
	public function __construct()
    {
      	parent::__construct();

    }
	public function index()
	{
		$data['content'] = 'list_app';
		$this->load->view('header/admin_header',$data);
	}
}