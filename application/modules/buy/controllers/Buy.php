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
		if ($this->agent->is_mobile()){
			redirect('buy/input_pc');

		}else{
			redirect('buy/input_pc');
		}

	}

	public function input_pc()
	{
		$user_data 	= $this->session->userdata('user_data');
		$user_id	= $user_data['id'];

		$data['list_agent'] = $this->Buy_model->list_agent($user_id);
		$data['lotto'] = $this->Buy_model->get_lotto();

		// History // 
		if($user_data['user_role']==1){
			$data['list_agent'] = $this->Buy_model->get_agents();
		}else{
			$data['list_agent'] = $this->Buy_model->list_agent($user_id);
		}

		if(empty($this->input->post())){
			$lottoInfo 	= $this->Buy_model->get_latest_lotto();
			$lotto_id	= $lottoInfo['id'];
			$agent_id = $this->session->userdata('last_agent_id');

			if(empty($agent_id) && !empty($data['list_agent'])){
				$agent_id = $data['list_agent'][0]['id'] ;
			}

		}else{
			$lotto_id 	= $this->input->post('lotto_id');
			$agent_id 	= $this->input->post('agent_id');

		}

		$data['agentInfo']	= $this->Buy_model->get_agent($agent_id);
		$data['list_lotto'] = $this->Buy_model->list_lotto();

		$data['buy_2digi']  = $this->Buy_model->get_agent_buy($agent_id,$lotto_id,2);
		$data['buy_3digi']  = $this->Buy_model->get_agent_buy($agent_id,$lotto_id,3);

		if(empty($data['lotto'])){
			$data['content'] = 'no_lotto';
		}else{
			$data['content'] = 'user_buy_pc';
		}
		
		$this->load->view('header/user_header',$data);
	}

	public function input_mobile()
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
		$page 		= $this->uri->segment(4);

		if($user_data['user_role']==1){
			$data['list_agent'] = $this->Buy_model->get_agents();
		}else{
			$data['list_agent'] = $this->Buy_model->list_agent($user_id);
		}

		if(empty($this->input->post())){
			$lottoInfo 	= $this->Buy_model->get_latest_lotto();
			if(!empty($lottoInfo)){
				$lotto_id	= $lottoInfo['id'];
			}else{
				$lotto_id	= 0;
			}
			
			$agent_id = $this->session->userdata('last_agent_id');

			if(empty($agent_id) && !empty($data['list_agent'])){
				$agent_id = $data['list_agent'][0]['id'] ;
			}

		}else{
			$lotto_id 	= $this->input->post('lotto_id');
			$agent_id 	= $this->input->post('agent_id');

		}

		$data['lotto_id']	= $lotto_id;
		$data['agentInfo']	= $this->Buy_model->get_agent($agent_id);
		$data['list_lotto'] = $this->Buy_model->list_lotto();

		$data['lotto'] 		= $this->Buy_model->get_lotto();

		$data['buy_2digi']  = $this->Buy_model->get_agent_buy($agent_id,$lotto_id,2);
		$data['buy_3digi']  = $this->Buy_model->get_agent_buy($agent_id,$lotto_id,3);

		// print_r($data['buy_2digi']);
		// exit();

		$data['content'] = 'user_history';
		
		$this->load->view('header/user_header',$data);
	}

	public function buy_insert()
	{

		$lotto_id 		= $this->uri->segment(3);
		$page 			= $this->uri->segment(4);
		$agent_id 	 	= $this->input->post('agent_id');
		$buy_numbers 	= [];
		$number_2 		= $this->input->post('2digi');
		$top_2digi 	  	= $this->input->post('2digi_top');
		$bottom_2digi 	= $this->input->post('2digi_bottom');
		$md5			= substr(md5(time()) , -6);
		
		if(empty($top_2digi)){
			$top_2digi = 0;
		}

		if(empty($bottom_2digi)){
			$bottom_2digi = 0;
		}

		for ($i=0; $i < count($number_2) ; $i++) {
			if(!empty($number_2[$i])){
				$buy_numbers[] =
					array(
						'lotto_id' 	=> $lotto_id,
						'agent_id'	=> $agent_id,
						'number'	=> $number_2[$i],
						'set_number'=> $md5,
						'type'		=> 2,
						'top'  		=> $top_2digi,
						'bottom'	=> $bottom_2digi
					);
			}
		}

		$number_3  = $this->input->post('3digi');
		$top_3digi = $this->input->post('3digi_top');
		$tod_3digi = $this->input->post('3digi_tod');

		if(empty($top_3digi)){
			$top_3digi = 0;
		}

		if(empty($tod_3digi)){
			$tod_3digi = 0;
		}

		for ($i=0; $i < count($number_3) ; $i++) {
			if(!empty($number_3[$i])){
				$buy_numbers[] =
					array(
						'lotto_id' 	=> $lotto_id,
						'agent_id'	=> $agent_id,
						'number'   	=> $number_3[$i],
						'set_number'=> $md5,
						'type'		=> 3,
						'top'  	   	=> $top_3digi,
						'bottom'  	=> $tod_3digi
					);
			}
		}

		$result = $this->Buy_model->buy_insert($buy_numbers);

		if($result==1){
			$this->session->set_userdata('last_agent_id', $agent_id);
			$this->session->set_flashdata('insert_buy_numbers', 'done');
		}else{
			$this->session->set_flashdata('insert_buy_numbers', 'fail');
		}
		
		redirect('buy/'.$page);
	}

	public function buy_insert_custom()
	{

		$lotto_id 		= $this->uri->segment(3);
		$page 			= $this->uri->segment(4);
		$agent_id 	 	= $this->input->post('agent_id');
		$buy_numbers 	= [];
		$number_2 		= $this->input->post('2digi');
		$top_2digi 	  	= $this->input->post('2digi_top');
		$bottom_2digi 	= $this->input->post('2digi_bottom');
		$md5			= substr(md5(time()) , -6);

		for ($i=0; $i < count($number_2) ; $i++) {
			if(!empty($number_2[$i])){

				if(empty($top_2digi[$i])){
					$top_2digi[$i] = 0;
				}
		
				if(empty($bottom_2digi[$i])){
					$bottom_2digi[$i] = 0;
				}

				$buy_numbers[] =
					array(
						'lotto_id' 	=> $lotto_id,
						'agent_id'	=> $agent_id,
						'number'	=> $number_2[$i],
						'set_number'=> $md5,
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

				if(empty($top_3digi[$i])){
					$top_3digi[$i] = 0;
				}
		
				if(empty($tod_3digi[$i])){
					$tod_3digi[$i] = 0;
				}

				$buy_numbers[] =
					array(
						'lotto_id' 	=> $lotto_id,
						'agent_id'	=> $agent_id,
						'number'   	=> $number_3[$i],
						'set_number'=> $md5,
						'type'		=> 3,
						'top'  	   	=> $top_3digi[$i],
						'bottom'  	=> $tod_3digi[$i]
					);
			}
		}

		$result = $this->Buy_model->buy_insert($buy_numbers);

		if($result==1){
			$this->session->set_userdata('last_agent_id', $agent_id);
			$this->session->set_flashdata('insert_buy_numbers', 'done');
		}else{
			$this->session->set_flashdata('insert_buy_numbers', 'fail');
		}
		
		redirect('buy/'.$page);
	}

	public function buy_update()
	{
		$id 		= $this->uri->segment(3);
		$page 		= $this->uri->segment(4);
		$agent_id 	= $this->input->post('agent_id');
		$list_data 	= array(
			'id' 		=> $id,
			'number' 	=> $this->input->post('number'),
			'top' 		=> $this->input->post('top'),
			'bottom' 	=> $this->input->post('bottom')
		);
		$result = $this->Buy_model->buy_update($list_data);

		if($result==1){
			$this->session->set_userdata('last_agent_id', $agent_id);
			$this->session->set_flashdata('update_buy', 'done');
		}else{
			$this->session->set_flashdata('update_buy', 'fail');
		}

		redirect('buy/'.$page);
	}

	public function buy_delete()
	{
		$id 		= $this->uri->segment(3);
		$page 		= $this->uri->segment(4);
		$agent_id 	= $this->uri->segment(5);
		$return 	= $this->Buy_model->buy_delete($id);

		if($return==1){
			$this->session->set_userdata('last_agent_id', $agent_id);
			$this->session->set_flashdata('update_buy', 'done');
		}else{
			$this->session->set_flashdata('update_buy', 'fail');
		}
		redirect('buy/'.$page);
	}

}
