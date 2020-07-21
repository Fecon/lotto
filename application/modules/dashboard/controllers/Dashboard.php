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
		
		$data['list_lotto'] = $this->Dashboard_model->list_lotto();
		$data['list_agent'] = $this->Dashboard_model->list_agent();
		
		if(empty($this->input->post())){
			$lottoInfo 	= $this->Dashboard_model->get_latest_lotto();
			$lotto_id	= $lottoInfo['id'];
			$agent_id	= 0;
		}else{
			$lotto_id 		= $this->input->post('lotto_id');
			$agent_id 	 	= $this->input->post('agent_id');
			$lottoInfo		= $this->Dashboard_model->get_lotto($lotto_id);
		}
		
		
		if($agent_id!=0){
			$data['agentInfo']	= $this->Dashboard_model->get_agent($agent_id);
			$this->check_lotto($lotto_id, $agent_id, $lottoInfo);

			$sum = $this->get_statement($lotto_id,$lottoInfo,$agent_id);
			$data['agent_sent'] = $this->Dashboard_model->get_sum_agent_received($lotto_id,$agent_id);

		}else{
			$sum 						 = $this->get_non_agent_statement($lotto_id,$lottoInfo);
			$data['percent_total'] 		 = $this->get_percent($lotto_id,$data['list_agent']);
			$data['agent_sent']['2digi'] = $this->Dashboard_model->get_sum_received($lotto_id,2);
			$data['agent_sent']['3digi'] = $this->Dashboard_model->get_sum_received($lotto_id,3);
		}
		
		$data['sum'] = $sum ;
		$data['lottoInfo']	= $this->Dashboard_model->get_lotto($lotto_id);

		// echo "<Pre>";
		// print_r($data['sum']);
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
			
				$total_pay 	= 0;
				$pay 		= 0;
				$pay2 		= 0;

			if($buy['type']==2){

				// 2 บน //
				if($buy['number'] == $lottoInfo['2top']){
					$pay = $buy['top'] * $pay_rate['2top'];
					$total_pay += $pay;
				}

				// 2 ล่าง //
				if($buy['number'] == $lottoInfo['2bottom']){
					$pay2 = $buy['bottom'] * $pay_rate['2bottom'];
					$total_pay += $pay2;
				}
			
			}else{
				// 3 ตรง //
				if($buy['number'] == $lottoInfo['3top']){
					$pay = $buy['top'] * $pay_rate['3top'];
					$total_pay += $pay;
				}

				// 3 โต๊ด //
				for ($i=1; $i <= 6 ; $i++) { 
					if($buy['number'] == $lottoInfo['3_'.$i]){
						$pay2 = $buy['bottom'] * $pay_rate['3_'.$i];
						$total_pay += $pay2;
					}
				}

			}

			$this->update_payback($buy['id'],$pay,$pay2,$total_pay);

				

				
			
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

	private function update_payback($id,$pay,$pay2,$total)
	{
		$updateData = array(
			'id'   => $id,
			'pay'  => $pay,
			'pay2' => $pay2,
			'total_pay' => $total
		);
		$this->Dashboard_model->update_payback($updateData);
	}

	private function get_statement($lotto_id,$lottoInfo,$agent_id)
	{
		// Get payment info //
			// 2 Top //
			$sum['2top'] 	= $this->Dashboard_model->get_sum_agent_buy($lotto_id,$lottoInfo['2top'],$agent_id);
			$sum['2bottom'] = $this->Dashboard_model->get_sum_agent_buy($lotto_id,$lottoInfo['2bottom'],$agent_id);
			$sum['3top'] 	= $this->Dashboard_model->get_sum_agent_buy($lotto_id,$lottoInfo['3top'],$agent_id);

			// 3 โต๊ด //
			$tod_number 	= "" ;
			$tod_top 		= 0 ;
			$tod_bottom 	= 0 ;
			$tod_pay 		= 0 ;
			$tod_pay2 		= 0 ;
			$tod_total_pay 	= 0 ;

			for ($i=1; $i <= 6 ; $i++) { 
				$tod['3_'.$i] = $this->Dashboard_model->get_sum_agent_buy($lotto_id,$lottoInfo['3_'.$i],$agent_id);
				
				if(!empty($lottoInfo['3_'.$i])){
					$tod_number .= $lottoInfo['3_'.$i]." ";
				}

				$tod_top 		+= $tod['3_'.$i]['top'];
				$tod_bottom 	+= $tod['3_'.$i]['bottom'];
				$tod_pay 		+= $tod['3_'.$i]['pay'];
				$tod_pay2 		+= $tod['3_'.$i]['pay2'];
				$tod_total_pay 	+= $tod['3_'.$i]['total_pay'];


				$sum['3tod'] = array(
					'number' 	=>	$tod_number,
					'top'		=>	$tod_top ,
					'bottom'	=>	$tod_bottom ,
					'pay'		=>	$tod_pay ,
					'pay2'		=>	$tod_pay2 ,
					'total_pay' =>	$tod_total_pay
				);
			}
			return $sum;

	}

	private function get_non_agent_statement($lotto_id,$lottoInfo)
	{
		// Get payment info //
			// 2 Top //
			$sum['2top'] 	= $this->Dashboard_model->get_sum_buy($lotto_id,$lottoInfo['2top']);
			$sum['2bottom'] = $this->Dashboard_model->get_sum_buy($lotto_id,$lottoInfo['2bottom']);
			$sum['3top'] 	= $this->Dashboard_model->get_sum_buy($lotto_id,$lottoInfo['3top']);

			// 3 โต๊ด //
			$tod_number 	= "" ;
			$tod_top 		= 0 ;
			$tod_bottom 	= 0 ;
			$tod_pay 		= 0 ;
			$tod_pay2 		= 0 ;
			$tod_total_pay 	= 0 ;

			for ($i=1; $i <= 6 ; $i++) { 
				$tod['3_'.$i] = $this->Dashboard_model->get_sum_buy($lotto_id,$lottoInfo['3_'.$i]);
				
				if(!empty($lottoInfo['3_'.$i])){
					$tod_number .= $lottoInfo['3_'.$i]." ";
				}

				$tod_top 		+= $tod['3_'.$i]['top'];
				$tod_bottom 	+= $tod['3_'.$i]['bottom'];
				$tod_pay 		+= $tod['3_'.$i]['pay'];
				$tod_pay2 		+= $tod['3_'.$i]['pay2'];
				$tod_total_pay 	+= $tod['3_'.$i]['total_pay'];


				$sum['3tod'] = array(
					'number' 	=>	$tod_number,
					'top'		=>	$tod_top ,
					'bottom'	=>	$tod_bottom ,
					'pay'		=>	$tod_pay ,
					'pay2'		=>	$tod_pay2 ,
					'total_pay' =>	$tod_total_pay
				);
			}
			return $sum;
			
	}

	private function get_percent($lotto_id,$agents)
	{
		$percent_total = 0; 
		foreach ($agents as $key => $agent) {
			$sum_agents 	= $this->Dashboard_model->get_sum_agent_received($lotto_id,$agent['id']);
			$percent_total += ($sum_agents['top'] + $sum_agents['bottom']) * ($agent['percent']/100) ;
		}
		return $percent_total;
	}

}
