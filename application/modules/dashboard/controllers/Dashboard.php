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
		$lottoInfo		= $this->Dashboard_model->get_lotto($lotto_id);
		

		if($agent_id!=0){

			$data['agentInfo']	= $this->Dashboard_model->get_agent($agent_id);
			$this->check_lotto($lotto_id, $agent_id, $lottoInfo);

		}
		
		$data['lottoInfo']	= $this->Dashboard_model->get_lotto($lotto_id);
		$data['list_lotto'] = $this->Dashboard_model->list_lotto();
		$data['list_agent'] = $this->Dashboard_model->list_agent();

		// echo "<Pre>";
		// print_r($data);
		// print_r($this->input->post());
		// exit();

		$data['content'] = 'dashboard';

		$this->load->view('header/admin_header',$data);
	}

	private function check_lotto($lotto_id, $agent_id, $lottoInfo)
	{
		$agent_buy 		= $this->Dashboard_model->get_agent_buy($agent_id,$lotto_id);
		$reserve_number = $this->Dashboard_model->get_reserve_number($lotto_id);

		$pay_rate = $this->pay_rate($lottoInfo);

		foreach ($agent_buy as $key => $buy) {
			
				$pay_total = 0;
				// 2 บน //
				if($buy['number'] == $lottoInfo['2top']){
					$pay = $buy['top'] * $pay_rate['2top'];
					$pay_total += $pay;
				}

				// 2 ล่าง //
				if($buy['number'] == $lottoInfo['2bottom']){
					$pay = $buy['bottom'] * $pay_rate['2bottom'];
					$pay_total += $pay;
				}

				// 3 ตรง //
				if($buy['number'] == $lottoInfo['3top']){
					$pay = $buy['top'] * $pay_rate['3top'];
					$pay_total += $pay;
				}

				// 3 โต๊ด //
				for ($i=1; $i <= 6 ; $i++) { 
					if($buy['number'] == $lottoInfo['3_'.$i]){
						$pay = $buy['bottom'] * $pay_rate['3_'.$i];
						$pay_total += $pay;
					}
				}

				$this->update_payback($buy['id'],$pay_total);
			
		}
	}

	private function pay_rate($lottoInfo)
	{
		$config 	= $this->Dashboard_model->get_config();
		$pay_rate 	= [];

		// 2top //
		$rn_2top = $this->Dashboard_model->get_pay_rate($lottoInfo['id'],$lottoInfo['2top']);
		if(empty($rn_2top)){
			$pay_rate['2top'] = $config[0]['value'];
		}else{
			$pay_rate['2top'] = $rn_2top[0]['pay'];
		}

		// 2bottom //
		$rn_2bottom = $this->Dashboard_model->get_pay_rate($lottoInfo['id'],$lottoInfo['2bottom']);
		if(empty($rn_2bottom)){
			$pay_rate['2bottom'] = $config[0]['value'];
		}else{
			$pay_rate['2bottom'] = $rn_2bottom[0]['pay'];
		}

		// 3top //
		$rn_3top = $this->Dashboard_model->get_pay_rate($lottoInfo['id'],$lottoInfo['3top']);
		if(empty($rn_3top)){
			$pay_rate['3top'] = $config[1]['value'];
		}else{
			$pay_rate['3top'] = $rn_3top[0]['pay'];
		}

		// 3tod //
		for ($i=1; $i <= 6 ; $i++) { 
			$rn_3tod = $this->Dashboard_model->get_pay_rate($lottoInfo['id'],$lottoInfo['3_'.$i]);
			if(empty($rn_3tod)){
				$pay_rate['3_'.$i] = $config[2]['value'];
			}else{
				$pay_rate['3_'.$i] = $rn_3tod[0]['pay2'];
			}
		}

		return $pay_rate;
	}

	private function update_payback($id,$pay)
	{
		$updateData = array(
			'id'  => $id,
			'pay' => $pay
		);
		$this->Dashboard_model->update_payback($updateData);
	}

}
