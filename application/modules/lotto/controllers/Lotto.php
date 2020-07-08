<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lotto extends MX_Controller {
	public function __construct()
    {
    	parent::__construct();
    	$this->load->model('Lotto_model');
    }
	public function index()
	{
		$data['content'] = 'lotto';

		$data['list_lotto'] = $this->Lotto_model->list_lotto();
		// print_r($data['list_user']);
		// exit();

		$this->load->view('header/admin_header',$data);
	}

	public function reserve_number()
	{
		$lotto_id = $this->uri->segment(3);

		if(!empty($lotto_id)){
			 $data['reserve_number'] = $this->Lotto_model->get_reserve_number($lotto_id);
			 $data['lotto'] = $this->Lotto_model->get_lotto($lotto_id);

		}else{
			redirect('lotto');
		}

		$data['content'] = 'reserve_number';
		$this->load->view('header/admin_header',$data);
	}

	public function lotto_insert()
	{
		$list_data = array(
			'name' => $this->input->post('name')
		);

		$result = $this->Lotto_model->lotto_insert($list_data);

		if($result==1){
			$this->session->set_flashdata('insert_lotto', 'done');
		}else{
			$this->session->set_flashdata('insert_lotto', 'fail');
		}
		redirect('lotto');
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
	public function lotto_delete()
	{
		$id = $this->uri->segment(3);
		$return = $this->Lotto_model->lotto_delete($id);
		redirect('lotto/index');
	}


}
