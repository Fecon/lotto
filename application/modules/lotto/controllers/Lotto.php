<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lotto extends MX_Controller {
	public function __construct()
    {
    	parent::__construct();
    	$this->load->model('Lotto_model');
    }
	public function index()
	{
		// $data['user_data'] = $this->session->userdata('user_data');
		//
		// if($data['user_data']['user_role']!=1){
		// 	redirect('user_manage/user_edit/'.$data['user_data']['user_id']);
		// }

		$data['content'] = 'lotto';

		$data['list_lotto'] = $this->Lotto_model->list_lotto();
		// print_r($data['list_user']);
		// exit();

		$this->load->view('header/admin_header',$data);
	}

	public function user_insert()
	{
		$list_data = array(
			'name' => $this->input->post('name')
		);

		$result = $this->Lotto_model->user_insert($list_data);

		if($result==1){
			$this->session->set_flashdata('insert_user', 'done');
		}else{
			$this->session->set_flashdata('insert_user', 'fail');
		}
		redirect('user_manage');
	}
	public function user_update()
	{
		$list_data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$result = $this->Lotto_model->user_update($list_data);

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
		$return = $this->Lotto_model->user_delete($id);
		redirect('user_manage/index');
	}


}
