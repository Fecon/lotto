<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buy extends MX_Controller {

	public function __construct()
  {
  	parent::__construct();
  	$this->load->model('Buy_model');
  }

	public function index()
	{
		$user_data 	= $this->session->userdata('user_data');
		$user_id	= $user_data['id'];

		$data['list_agent'] = $this->Buy_model->list_agent($user_id);
		$data['lotto'] = $this->Buy_model->get_lotto();

		if(empty($data['lotto'])){
			$data['content'] = 'no_lotto';
		}else{
			$data['content'] = 'user_buy';
		}
		
		$this->load->view('header/user_header',$data);
	}

	public function custom()
	{
		$user_data 	= $this->session->userdata('user_data');
		$user_id	= $user_data['id'];

		$data['list_agent'] = $this->Buy_model->list_agent($user_id);
		$data['lotto'] = $this->Buy_model->get_lotto();

		if(empty($data['lotto'])){
			$data['content'] = 'no_lotto';
		}else{
			$data['content'] = 'user_buy_custom';
		}
		
		$this->load->view('header/user_header',$data);
	}

	public function history()
	{
		$user_data 	= $this->session->userdata('user_data');
		$user_id	= $user_data['id'];

		if($user_data['user_role']==1){

			$data['list_agent'] = $this->Buy_model->get_agents();



			
			
		}else{

			$data['list_agent'] = $this->Buy_model->list_agent($user_id);

			
		}

		if(empty($this->input->post())){
			$lottoInfo 	= $this->Buy_model->get_latest_lotto();
			$lotto_id	= $lottoInfo['id'];
			$agent_id 	= 0 ;

		}else{
			$lotto_id 	= $this->input->post('lotto_id');
			$agent_id 	= $this->input->post('agent_id');

		}

		$data['agentInfo']	= $this->Buy_model->get_agent($agent_id);
		$data['list_lotto'] = $this->Buy_model->list_lotto();

		$data['lotto'] 		= $this->Buy_model->get_lotto();

		$data['buy_2digi']  = $this->Buy_model->get_agent_buy($agent_id,$lotto_id,2);
		$data['buy_3digi']  = $this->Buy_model->get_agent_buy($agent_id,$lotto_id,3);

		if(empty($data['lotto'])){
			$data['content'] = 'no_lotto';
		}else{
			$data['content'] = 'user_history';
		}
		
		$this->load->view('header/user_header',$data);
	}

	public function buy_insert()
	{

		$lotto_id 		= $this->uri->segment(3);
		$agent_id 	 	= $this->input->post('agent_id');
		$buy_numbers 	= [];
		$number_2 		= $this->input->post('2digi');
		$top_2digi 	  	= $this->input->post('2digi_top');
		$bottom_2digi 	= $this->input->post('2digi_bottom');

		for ($i=0; $i < count($number_2) ; $i++) {
			if(!empty($number_2[$i])){
				$buy_numbers[] =
					array(
						'lotto_id' 	=> $lotto_id,
						'agent_id'	=> $agent_id,
						'number'	=> $number_2[$i],
						'type'		=> 2,
						'top'  		=> $top_2digi,
						'bottom'	=> $bottom_2digi
					);
			}
		}

		$number_3  = $this->input->post('3digi');
		$top_3digi = $this->input->post('3digi_top');
		$tod_3digi = $this->input->post('3digi_tod');

		for ($i=0; $i < count($number_3) ; $i++) {
			if(!empty($number_3[$i])){
				$buy_numbers[] =
					array(
						'lotto_id' 	=> $lotto_id,
						'agent_id'	=> $agent_id,
						'number'   	=> $number_3[$i],
						'type'		=> 3,
						'top'  	   	=> $top_3digi,
						'bottom'  	=> $tod_3digi
					);
			}
		}

		$result = $this->Buy_model->buy_insert($buy_numbers);

		if($result==1){
			$this->session->set_flashdata('insert_buy_numbers', 'done');
		}else{
			$this->session->set_flashdata('insert_buy_numbers', 'fail');
		}
		
		redirect('buy/index');
	}

	public function buy_insert_custom()
	{

		$lotto_id 		= $this->uri->segment(3);
		$agent_id 	 	= $this->input->post('agent_id');
		$buy_numbers 	= [];
		$number_2 		= $this->input->post('2digi');
		$top_2digi 	  	= $this->input->post('2digi_top');
		$bottom_2digi 	= $this->input->post('2digi_bottom');

		for ($i=0; $i < count($number_2) ; $i++) {
			if(!empty($number_2[$i])){
				$buy_numbers[] =
					array(
						'lotto_id' 	=> $lotto_id,
						'agent_id'	=> $agent_id,
						'number'	=> $number_2[$i],
						'type'		=> 2,
						'top'  		=> $top_2digi[$i],
						'bottom'	=> $bottom_2digi[$i]
					);
			}
		}

		$number_3  = $this->input->post('3digi');
		$top_3digi = $this->input->post('3digi_top');
		$tod_3digi = $this->input->post('3digi_tod');

		for ($i=0; $i < count($number_3) ; $i++) {
			if(!empty($number_3[$i])){
				$buy_numbers[] =
					array(
						'lotto_id' 	=> $lotto_id,
						'agent_id'	=> $agent_id,
						'number'   	=> $number_3[$i],
						'type'		=> 3,
						'top'  	   	=> $top_3digi[$i],
						'bottom'  	=> $tod_3digi[$i]
					);
			}
		}

		$result = $this->Buy_model->buy_insert($buy_numbers);

		if($result==1){
			$this->session->set_flashdata('insert_buy_numbers', 'done');
		}else{
			$this->session->set_flashdata('insert_buy_numbers', 'fail');
		}
		
		redirect('buy/custom');
	}
}
