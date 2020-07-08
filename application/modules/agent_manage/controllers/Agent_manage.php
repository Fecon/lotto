<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent_manage extends MX_Controller {
	public function __construct()
    {
    	parent::__construct();
    	$this->load->model('Agent_model');
    }
	public function index()
	{
		// $data['user_data'] = $this->session->userdata('user_data');
		//
		// if($data['user_data']['user_role']!=1){
		// 	redirect('user_manage/user_edit/'.$data['user_data']['agent_id']);
		// }

		$data['content'] = 'agent';

		$data['list_agent'] = $this->Agent_model->list_agent();
		$data['list_user'] = $this->Agent_model->list_user();
		// print_r($data['list_user']);
		// exit();

		$this->load->view('header/admin_header',$data);
	}

	public function agent_insert()
	{
		$list_data = array(
			'name' 		=> $this->input->post('name'),
			'percent' => $this->input->post('percent'),
			'user_id' => $this->input->post('user_id')
		);

		$result = $this->Agent_model->agent_insert($list_data);

		if($result==1){
			$this->session->set_flashdata('insert_agent', 'done');
		}else{
			$this->session->set_flashdata('insert_agent', 'fail');
		}
		redirect('agent_manage');
	}
	public function agent_update()
	{
		$list_data = array(
			'id' 			=> $this->input->post('id'),
			'name' 		=> $this->input->post('name'),
			'percent' => $this->input->post('percent'),
			'user_id' => $this->input->post('user_id')
		);
		$result = $this->Agent_model->agent_update($list_data);

		if($result==1){
			$this->session->set_flashdata('update_agent', 'done');
		}else{
			$this->session->set_flashdata('update_agent', 'fail');
		}

		redirect('agent_manage/index');
	}
	public function agent_delete()
	{
		$id = $this->uri->segment(3);
		$return = $this->Agent_model->agent_delete($id);
		redirect('agent_manage/index');
	}


}
