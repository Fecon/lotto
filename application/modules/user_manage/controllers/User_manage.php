<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_manage extends MX_Controller {
	public function __construct()
    {
    	parent::__construct();
    	$this->load->model('User_model');
    }
	public function index()
	{
		// $data['user_data'] = $this->session->userdata('user_data');
		//
		// if($data['user_data']['user_role']!=1){
		// 	redirect('user_manage/user_edit/'.$data['user_data']['user_id']);
		// }

		$data['content'] = 'user';

		$data['list_user'] = $this->User_model->list_user();
		// print_r($data['list_user']);
		// exit();

		$this->load->view('header/admin_header',$data);
	}

	public function user_insert()
	{
		$list_data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);

		$result = $this->User_model->user_insert($list_data);

		if($result==1){
			$this->session->set_flashdata('insert_user', 'done');
		}else{
			$this->session->set_flashdata('insert_user', 'fail');
		}
		redirect('user_manage');
	}
	public function user_update()
	{
		$id = $this->uri->segment(3);
		$list_data = array(
			'id' => $id,
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$result = $this->User_model->user_update($list_data);

		if($result==1){
			$this->session->set_flashdata('update_user', 'done');
		}else{
			$this->session->set_flashdata('update_user', 'fail');
		}

		redirect('user_manage/index');
	}
	public function user_delete()
	{
		$id = $this->uri->segment(3);
		$return = $this->User_model->user_delete($id);
		redirect('user_manage/index');
	}

	public function disable()
	{
		$id = $this->uri->segment(3);
		$user = $this->User_model->get_user($id);

		$status = $user[0]['status'];
		if($status==0){
			$status = 1;
		}else{
			$status = 0;
		}

		$list_data = array(
			'id' 	=> $id,
			'status' => $status
		);

		$result = $this->User_model->user_update($list_data);

		if($result==1){
			$this->session->set_flashdata('update_user', 'done');
		}else{
			$this->session->set_flashdata('update_user', 'fail');
		}

		redirect('user_manage/index');
	}

	public function disable_all()
	{

		$status = $this->uri->segment(3);

		$list_data = array(
			'status' => $status
		);

		$result = $this->User_model->change_status_all($list_data);

		if($result==1){
			$this->session->set_flashdata('update_user', 'done');
		}else{
			$this->session->set_flashdata('update_user', 'fail');
		}

		redirect('user_manage/index');
	}


}
