<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_controller extends MX_Controller {
	public function __construct()
    {
    	parent::__construct();
    	$this->load->model('Config_model');
    }
	public function index()
	{
		$data['config'] = $this->Config_model->get_config();

		$data['content'] = 'config';
		$this->load->view('header/admin_header',$data);
	}

	public function config_update()
	{
		$post = $this->input->post();
		foreach ($post as $key => $value) {

			$input = array(
				'name' => $key,
				'value' => $value,
			);
			$result = $this->Config_model->config_update($input);
		}

		if($result==1){
			$this->session->set_flashdata('config_agent', 'done');
		}else{
			$this->session->set_flashdata('config_agent', 'fail');
		}

		redirect('config_controller/index');
	}


}
