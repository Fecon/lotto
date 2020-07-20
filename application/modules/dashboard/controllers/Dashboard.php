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
		$data['lottoInfo'] = $this->Dashboard_model->get_latest_lotto();

		$data['list_lotto'] = $this->Dashboard_model->list_lotto();
		$data['list_agent'] = $this->Dashboard_model->list_agent();

		// echo "<Pre>";
		// print_r($data);
		// exit();

		$data['content'] = 'dashboard';

		$this->load->view('header/admin_header',$data);
	}

	public function summary()
	{
		$lotto_id 		= $this->input->post('lotto_id');
		$agent_id 	 	= $this->input->post('agent_id');
		$data['lottoInfo']	= $this->Dashboard_model->get_lotto($lotto_id);
		if($agent_id!=0){
			$data['agentInfo']	= $this->Dashboard_model->get_agent($agent_id);
		}
		

		$data['list_lotto'] = $this->Dashboard_model->list_lotto();
		$data['list_agent'] = $this->Dashboard_model->list_agent();

		// echo "<Pre>";
		// print_r($data);
		// print_r($this->input->post());
		// exit();

		$data['content'] = 'dashboard';

		$this->load->view('header/admin_header',$data);
	}
}
