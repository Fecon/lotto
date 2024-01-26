<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
	}

	public function index()
	{

		$data['list_lotto'] = $this->Dashboard_model->list_lotto();
		$data['list_agent'] = $this->Dashboard_model->list_agent();

		if (empty($this->input->post())) {
			$lottoInfo 	= $this->Dashboard_model->get_latest_lotto();
			if (empty($lottoInfo)) {
				redirect('dashboard/index_non');
			}
			$lotto_id	= $lottoInfo['id'];
			$agent_id	= 0;
		} else {
			$lotto_id 	= $this->input->post('lotto_id');
			$agent_id 	= $this->input->post('agent_id');
			$lottoInfo	= $this->Dashboard_model->get_lotto($lotto_id);
		}


		if ($agent_id != 0) {
			$data['agentInfo']	= $this->Dashboard_model->get_agent($agent_id);

			$sum = $this->get_statement($lotto_id, $lottoInfo, $agent_id);
			$data['agent_sent'] = $this->Dashboard_model->get_sum_agent_received($lotto_id, $agent_id);
		} else {
			$sum 						 = $this->get_non_agent_statement($lotto_id, $lottoInfo);
			$data['percent_total'] 		 = $this->get_percent($lotto_id, $data['list_agent']);
			$data['agent_sent']['2digi'] = $this->Dashboard_model->get_sum_received($lotto_id, 2);
			$data['agent_sent']['3digi'] = $this->Dashboard_model->get_sum_received($lotto_id, 3);
		}

		$data['sum'] = $sum;
		$data['lottoInfo']	= $this->Dashboard_model->get_lotto($lotto_id);

		$data['content'] = 'dashboard';

		$this->load->view('header/admin_header', $data);
	}

	public function export_pdf()
	{
		$data['list_lotto'] = $this->Dashboard_model->list_lotto();
		$data['list_agent'] = $this->Dashboard_model->list_agent();

		if (empty($this->input->post())) {
			$lottoInfo 	= $this->Dashboard_model->get_latest_lotto();
			if (empty($lottoInfo)) {
				redirect('dashboard/index_non');
			}
			$lotto_id	= $lottoInfo['id'];
		} else {
			$lotto_id 	= $this->input->post('lotto_id');
			$lottoInfo	= $this->Dashboard_model->get_lotto($lotto_id);
		}

		$data['content'] = 'agents';

		$this->load->view('header/admin_header', $data);
	}

	public function pdf()
	{


		if (empty($this->uri->segment(3))) {
			$lottoInfo 	= $this->Dashboard_model->get_latest_lotto();
			if (empty($lottoInfo)) {
				redirect('dashboard/index_non');
			}
			$lotto_id	= $lottoInfo['id'];
			$agent_id	= 0;
		} else {
			$lotto_id 	= $this->uri->segment(3);
			$agent_id 	= $this->uri->segment(4);
			$lottoInfo	= $this->Dashboard_model->get_lotto($lotto_id);
		}


		if ($agent_id != 0) {
			$data['agentInfo']	= $this->Dashboard_model->get_agent($agent_id);
			$file_name			= $data['agentInfo']['name'] . '_' . $lottoInfo['name'];

			$sum = $this->get_statement($lotto_id, $lottoInfo, $agent_id);
			$data['agent_sent'] = $this->Dashboard_model->get_sum_agent_received($lotto_id, $agent_id);
		} else {
			$sum 						 = $this->get_non_agent_statement($lotto_id, $lottoInfo);
			$data['percent_total'] 		 = $this->get_percent($lotto_id, $data['list_agent']);
			$data['agent_sent']['2digi'] = $this->Dashboard_model->get_sum_received($lotto_id, 2);
			$data['agent_sent']['3digi'] = $this->Dashboard_model->get_sum_received($lotto_id, 3);
			$file_name					 = 'All_' . $lottoInfo['name'];
		}

		$data['sum'] 		= $sum;
		$data['lottoInfo']  = $this->Dashboard_model->get_lotto($lotto_id);
		$data['file_name']  = $file_name;

		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('dashboard_to_pdf', $data, true);
		$mpdf->WriteHTML($html);
		// $mpdf->Output();
		$mpdf->Output($file_name . '.pdf', 'D');
	}

	public function index_non()
	{
		$data['content'] = 'dashboard-nodata';

		$this->load->view('header/admin_header', $data);
	}

	public function report()
	{
		$data['list_lotto'] = $this->Dashboard_model->list_lotto();
		$data['list_agent'] = $this->Dashboard_model->list_agent();
		$config 			= $this->Dashboard_model->get_config();
		$data['config'] 	= $config;

		if (empty($this->input->post())) {
			$lottoInfo 	= @$this->Dashboard_model->get_latest_lotto();
			$lotto_id	= $lottoInfo['id'];
			$agent_id	= 0;
		} else {
			$lotto_id 		= $this->input->post('lotto_id');
			$agent_id 	 	= $this->input->post('agent_id');
		}

		if ($agent_id != 0) {
			$data['agentInfo']	= $this->Dashboard_model->get_agent($agent_id);
		}

		$data['content'] = 'report';

		$this->load->view('header/admin_header', $data);
	}

	public function report_fixable()
	{

		$data['list_lotto'] = $this->Dashboard_model->list_lotto();
		$list_agent 		= $this->Dashboard_model->list_agent();
		$data['list_agent'] = $list_agent;
		$config 			= $this->Dashboard_model->get_config();
		$data['config'] 	= $config;

		if (empty($this->input->post())) {
			$lottoInfo 	= @$this->Dashboard_model->get_latest_lotto();
			$lotto_id	= $lottoInfo['id'];
			$agent_id	= 0;
		} else {
			$lotto_id 		= $this->input->post('lotto_id');
			$agent_id 	 	= $this->input->post('agent_id');
		}

		if ($agent_id != 0) {
			$data['agentInfo']	= $this->Dashboard_model->get_agent($agent_id);
			$agentInfo	= $this->Dashboard_model->get_agents($agent_id);

			$data['agent_sent'] = $this->Dashboard_model->get_sum_agent_received($lotto_id, $agent_id);

			$data['percent_total'] 		 = round($this->get_percent($lotto_id, $agentInfo), 0);
			$data['percent_2top'] 		 = round($this->get_percent_type($lotto_id, $agentInfo, 2, 'top'), 0);
			$data['percent_2bottom'] 	 = round($this->get_percent_type($lotto_id, $agentInfo, 2, 'bottom'), 0);
			$data['percent_3top'] 		 = round($this->get_percent_type($lotto_id, $agentInfo, 3, 'top'), 0);
			$data['percent_3tod'] 		 = round($this->get_percent_type($lotto_id, $agentInfo, 3, 'bottom'), 0);

			$data['number_2top'] 		 = $this->Dashboard_model->get_agent_buy_number($lotto_id, 2, 'top', $config[5]['value'], $agent_id);
			$data['number_2bottom'] 	 = $this->Dashboard_model->get_agent_buy_number($lotto_id, 2, 'bottom', $config[5]['value'], $agent_id);
			$data['number_3top'] 		 = $this->Dashboard_model->get_agent_buy_number($lotto_id, 3, 'top', $config[8]['value'], $agent_id);

			$number_3tod				 = $this->Dashboard_model->get_agent_buy_number($lotto_id, 3, 'bottom', 0, $agent_id);
			$data['number_3tod'] 	 	 = $this->get_3tod_report($number_3tod);

			$data['agent_sent']['2digi'] = $this->Dashboard_model->get_sum_agent_type_received($lotto_id, $agent_id, 2);
			$data['agent_sent']['3digi'] = $this->Dashboard_model->get_sum_agent_type_received($lotto_id, $agent_id, 3);
		} else {

			$data['percent_total'] 		 = $this->get_percent($lotto_id, $data['list_agent']);

			$data['percent_2top'] 		 = round($this->get_percent_type($lotto_id, $list_agent, 2, 'top'), 0);
			$data['percent_2bottom'] 	 = round($this->get_percent_type($lotto_id, $list_agent, 2, 'bottom'), 0);
			$data['percent_3top'] 		 = round($this->get_percent_type($lotto_id, $list_agent, 3, 'top'), 0);
			$data['percent_3tod'] 		 = round($this->get_percent_type($lotto_id, $list_agent, 3, 'bottom'), 0);

			$data['number_2top'] 		 = $this->Dashboard_model->get_total_buy_number($lotto_id, 2, 'top', $config[5]['value']);
			$data['number_2bottom'] 	 = $this->Dashboard_model->get_total_buy_number($lotto_id, 2, 'bottom', $config[5]['value']);
			$data['number_3top'] 		 = $this->Dashboard_model->get_total_buy_number($lotto_id, 3, 'top', $config[8]['value']);

			$number_3tod				 = $this->Dashboard_model->get_total_buy_number($lotto_id, 3, 'bottom', 0);
			$data['number_3tod'] 	 	 = $this->get_3tod_report($number_3tod);

			$data['agent_sent']['2digi'] = $this->Dashboard_model->get_sum_received($lotto_id, 2);
			$data['agent_sent']['3digi'] = $this->Dashboard_model->get_sum_received($lotto_id, 3);
		}

		$data['lotto_id']	= $lotto_id;
		$data['content'] 	= 'report_fixable';

		$this->load->view('header/admin_header', $data);
	}

	public function report_api()
	{

		$list_agent = $this->Dashboard_model->list_agent();
		$config = $this->Dashboard_model->get_config();

		if (empty($this->input->post())) {
			$lottoInfo 	= @$this->Dashboard_model->get_latest_lotto();
			$lotto_id	= $lottoInfo['id'];
			$agent_id	= 0;
		} else {
			$lotto_id 	= $this->input->post('lotto_id');
			$agent_id 	= $this->input->post('agent_id');
		}

		if ($agent_id != 0) {
			$agentInfo			= $this->Dashboard_model->get_agents($agent_id);

			$data['agent_sent'] = $this->Dashboard_model->get_sum_agent_received($lotto_id, $agent_id);

			$data['percent_total'] 		 = round($this->get_percent($lotto_id, $agentInfo), 0);
			$data['percent_2top'] 		 = round($this->get_percent_type($lotto_id, $agentInfo, 2, 'top'), 0);
			$data['percent_2bottom'] 	 = round($this->get_percent_type($lotto_id, $agentInfo, 2, 'bottom'), 0);
			$data['percent_3top'] 		 = round($this->get_percent_type($lotto_id, $agentInfo, 3, 'top'), 0);
			$data['percent_3tod'] 		 = round($this->get_percent_type($lotto_id, $agentInfo, 3, 'bottom'), 0);

			$data['number_2top'] 		 = $this->Dashboard_model->get_agent_buy_number($lotto_id, 2, 'top', $config[5]['value'], $agent_id);
			$data['number_2bottom'] 	 = $this->Dashboard_model->get_agent_buy_number($lotto_id, 2, 'bottom', $config[5]['value'], $agent_id);
			$data['number_3top'] 		 = $this->Dashboard_model->get_agent_buy_number($lotto_id, 3, 'top', $config[8]['value'], $agent_id);

			$number_3tod				 = $this->Dashboard_model->get_agent_buy_number($lotto_id, 3, 'bottom', 0, $agent_id);
			$data['number_3tod'] 	 	 = $this->get_3tod_report($number_3tod);

			$data['agent_sent']['2digi'] = $this->Dashboard_model->get_sum_agent_type_received($lotto_id, $agent_id, 2);
			$data['agent_sent']['3digi'] = $this->Dashboard_model->get_sum_agent_type_received($lotto_id, $agent_id, 3);
		} else {

			$data['percent_total'] 		 = $this->get_percent($lotto_id, $list_agent);

			$data['percent_2top'] 		 = round($this->get_percent_type($lotto_id, $list_agent, 2, 'top'), 0);
			$data['percent_2bottom'] 	 = round($this->get_percent_type($lotto_id, $list_agent, 2, 'bottom'), 0);
			$data['percent_3top'] 		 = round($this->get_percent_type($lotto_id, $list_agent, 3, 'top'), 0);
			$data['percent_3tod'] 		 = round($this->get_percent_type($lotto_id, $list_agent, 3, 'bottom'), 0);

			$data['number_2top'] 		 = $this->Dashboard_model->get_total_buy_number($lotto_id, 2, 'top', $config[5]['value']);
			$data['number_2bottom'] 	 = $this->Dashboard_model->get_total_buy_number($lotto_id, 2, 'bottom', $config[5]['value']);
			$data['number_3top'] 		 = $this->Dashboard_model->get_total_buy_number($lotto_id, 3, 'top', $config[8]['value']);

			$number_3tod				 = $this->Dashboard_model->get_total_buy_number($lotto_id, 3, 'bottom', 0);
			$data['number_3tod'] 	 	 = $this->get_3tod_report($number_3tod);

			$data['agent_sent']['2digi'] = $this->Dashboard_model->get_sum_received($lotto_id, 2);
			$data['agent_sent']['3digi'] = $this->Dashboard_model->get_sum_received($lotto_id, 3);
		}

		echo json_encode($data);
	}

	public function report_pdf()
	{

		$data['list_lotto'] = $this->Dashboard_model->list_lotto();
		$list_agent 		= $this->Dashboard_model->list_agent();
		$data['list_agent'] = $list_agent;
		$config 			= $this->Dashboard_model->get_config();
		$data['config'] 	= $config;

		if (empty($this->input->post())) {
			$lottoInfo 	= @$this->Dashboard_model->get_latest_lotto();
			$lotto_id	= $lottoInfo['id'];
			$agent_id	= 0;
		} else {
			$lotto_id 		= $this->input->post('lotto_id');
			$agent_id 	 	= $this->input->post('agent_id');
		}

		if ($agent_id != 0) {
			$data['agentInfo']	= $this->Dashboard_model->get_agent($agent_id);
			$agentInfo	= $this->Dashboard_model->get_agents($agent_id);

			$data['agent_sent'] = $this->Dashboard_model->get_sum_agent_received($lotto_id, $agent_id);

			$data['percent_total'] 		 = round($this->get_percent($lotto_id, $agentInfo), 0);
			$data['percent_2top'] 		 = round($this->get_percent_type($lotto_id, $agentInfo, 2, 'top'), 0);
			$data['percent_2bottom'] 	 = round($this->get_percent_type($lotto_id, $agentInfo, 2, 'bottom'), 0);
			$data['percent_3top'] 		 = round($this->get_percent_type($lotto_id, $agentInfo, 3, 'top'), 0);
			$data['percent_3tod'] 		 = round($this->get_percent_type($lotto_id, $agentInfo, 3, 'bottom'), 0);

			$data['number_2top'] 		 = $this->Dashboard_model->get_agent_buy_number($lotto_id, 2, 'top', $config[3]['value'], $agent_id);
			$data['number_2bottom'] 	 = $this->Dashboard_model->get_agent_buy_number($lotto_id, 2, 'bottom', $config[3]['value'], $agent_id);
			$data['number_3top'] 		 = $this->Dashboard_model->get_agent_buy_number($lotto_id, 3, 'top', $config[6]['value'], $agent_id);

			$number_3tod				 = $this->Dashboard_model->get_agent_buy_number($lotto_id, 3, 'bottom', 0, $agent_id);
			$data['number_3tod'] 	 	 = $this->get_3tod_report($number_3tod);

			$data['agent_sent']['2digi'] = $this->Dashboard_model->get_sum_agent_type_received($lotto_id, $agent_id, 2);
			$data['agent_sent']['3digi'] = $this->Dashboard_model->get_sum_agent_type_received($lotto_id, $agent_id, 3);
		} else {

			$data['percent_total'] 		 = $this->get_percent($lotto_id, $data['list_agent']);

			$data['percent_2top'] 		 = round($this->get_percent_type($lotto_id, $list_agent, 2, 'top'), 0);
			$data['percent_2bottom'] 	 = round($this->get_percent_type($lotto_id, $list_agent, 2, 'bottom'), 0);
			$data['percent_3top'] 		 = round($this->get_percent_type($lotto_id, $list_agent, 3, 'top'), 0);
			$data['percent_3tod'] 		 = round($this->get_percent_type($lotto_id, $list_agent, 3, 'bottom'), 0);

			$data['number_2top'] 		 = $this->Dashboard_model->get_total_buy_number($lotto_id, 2, 'top', $config[3]['value']);
			$data['number_2bottom'] 	 = $this->Dashboard_model->get_total_buy_number($lotto_id, 2, 'bottom', $config[3]['value']);
			$data['number_3top'] 		 = $this->Dashboard_model->get_total_buy_number($lotto_id, 3, 'top', $config[6]['value']);

			$number_3tod				 = $this->Dashboard_model->get_total_buy_number($lotto_id, 3, 'bottom', 0);
			$data['number_3tod'] 	 	 = $this->get_3tod_report($number_3tod);

			$data['agent_sent']['2digi'] = $this->Dashboard_model->get_sum_received($lotto_id, 2);
			$data['agent_sent']['3digi'] = $this->Dashboard_model->get_sum_received($lotto_id, 3);
		}

		array_multisort(array_column($data['number_2top'], 'sent'), SORT_DESC, SORT_NUMERIC, $data['number_2top']);
		array_multisort(array_column($data['number_2bottom'], 'sent'), SORT_DESC, SORT_NUMERIC, $data['number_2bottom']);
		array_multisort(array_column($data['number_3top'], 'sent'), SORT_DESC, SORT_NUMERIC, $data['number_3top']);
		array_multisort(array_column($data['number_3tod'], 'sent'), SORT_DESC, SORT_NUMERIC, $data['number_3tod']);

		$data['lottoInfo']  = $this->Dashboard_model->get_lotto($lotto_id);
		$data['lotto_id']	= $lotto_id;
		$data['content'] 	= 'report_fixable';

		$file_name  		= 'รายงาน_' . $lottoInfo['name'];
		$data['file_name']  = $file_name;

		// $this->load->view('report_pdf',$data);

		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('report_pdf', $data, true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
		// $mpdf->Output($file_name.'.pdf','D');
	}

	public function summary()
	{

		$data['list_lotto'] = $this->Dashboard_model->list_lotto();

		if (empty($this->input->post())) {
			$lottoInfo 	= $this->Dashboard_model->get_latest_lotto();
			if (empty($lottoInfo)) {
				redirect('dashboard/index_non');
			}
			$lotto_id	= $lottoInfo['id'];
		} else {
			$lotto_id 	= $this->input->post('lotto_id');
			$lottoInfo	= $this->Dashboard_model->get_lotto($lotto_id);
		}

		$data['summary'] = $this->Dashboard_model->get_sum_agents_received($lotto_id);
		$data['lotto']	 = $lottoInfo;
		$data['content'] = 'summary';

		$this->load->view('header/admin_header', $data);
	}

	public function summary_pdf()
	{

		$data['list_lotto'] = $this->Dashboard_model->list_lotto();

		if (empty($this->input->post())) {
			$lottoInfo 	= $this->Dashboard_model->get_latest_lotto();
			if (empty($lottoInfo)) {
				redirect('dashboard/index_non');
			}
			$lotto_id	= $lottoInfo['id'];
		} else {
			$lotto_id 	= $this->input->post('lotto_id');
			$lottoInfo	= $this->Dashboard_model->get_lotto($lotto_id);
		}

		$data['summary'] 	= $this->Dashboard_model->get_sum_agents_received($lotto_id);
		$data['lotto']	 	= $lottoInfo;
		$file_name  		= 'สรุปผลรวม_' . $lottoInfo['name'];
		$data['file_name']  = $file_name;

		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('summary_pdf', $data, true);
		$mpdf->WriteHTML($html);
		// $mpdf->Output();
		$mpdf->Output($file_name . '.pdf', 'D');
	}

	public function number_report()
	{

		$data['list_lotto'] = $this->Dashboard_model->list_lotto();

		if (empty($this->input->post())) {
			$lottoInfo 	= $this->Dashboard_model->get_latest_lotto();
			if (empty($lottoInfo)) {
				redirect('dashboard/index_non');
			}
			$lotto_id	= $lottoInfo['id'];
		} else {
			$lotto_id 	= $this->input->post('lotto_id');
			$lottoInfo	= $this->Dashboard_model->get_lotto($lotto_id);
		}

		$set1 = array();
		$set2 = array();
		$set3 = array();
		$set4 = array();
		$set5 = array();

		for ($i = 0; $i < 25; $i++) {
			if ($i < 10) {
				$i = str_pad($i, 2, "0", STR_PAD_LEFT);
			}
			$sum_i = $this->Dashboard_model->get_sum_buy($lotto_id, $i);
			$sum_i['number'] = $i;
			array_push($set1, $sum_i);
		}

		for ($i = 25; $i < 50; $i++) {
			$sum_i = $this->Dashboard_model->get_sum_buy($lotto_id, $i);
			$sum_i['number'] = $i;
			array_push($set2, $sum_i);
		}

		for ($i = 50; $i < 75; $i++) {
			$sum_i = $this->Dashboard_model->get_sum_buy($lotto_id, $i);
			$sum_i['number'] = $i;
			array_push($set3, $sum_i);
		}

		for ($i = 75; $i < 100; $i++) {
			$sum_i = $this->Dashboard_model->get_sum_buy($lotto_id, $i);
			$sum_i['number'] = $i;
			array_push($set4, $sum_i);
		}

		$data['set1'] 	= $set1;
		$data['set2'] 	= $set2;
		$data['set3'] 	= $set3;
		$data['set4'] 	= $set4;
		$data['lotto']	 	= $lottoInfo;
		$data['lotto_id']	= $lotto_id;

		$data['content'] = 'number_report';

		$this->load->view('header/admin_header', $data);
	}

	private function check_lotto($lotto_id, $agent_id, $lottoInfo)
	{
		$agent_buy 		= $this->Dashboard_model->get_agent_buy($agent_id, $lotto_id);
		$reserve_number = $this->Dashboard_model->get_reserve_number($lotto_id);

		$pay_rate = $this->pay_rate($lottoInfo);

		foreach ($agent_buy as $key => $buy) {

			$total_pay 	= 0;
			$pay 		= 0;
			$pay2 		= 0;

			if ($buy['type'] == 2) {

				// 2 บน //
				if ($buy['number'] === $lottoInfo['2top']) {
					$pay = $buy['top'] * $pay_rate['2top'];
					$total_pay += $pay;
				}

				// 2 ล่าง //
				if ($buy['number'] === $lottoInfo['2bottom']) {
					$pay2 = $buy['bottom'] * $pay_rate['2bottom'];
					$total_pay += $pay2;
				}
			} elseif ($buy['type'] == 3) {
				// 3 ตรง //
				if ($buy['number'] === $lottoInfo['3top']) {
					$pay = $buy['top'] * $pay_rate['3top'];
					$total_pay += $pay;
				}

				// 3 โต๊ด //
				for ($i = 1; $i <= 6; $i++) {
					if ($buy['number'] === $lottoInfo['3_' . $i]) {
						$pay2 = $buy['bottom'] * $pay_rate['3_' . $i];
						$total_pay += $pay2;
					}
				}
			}

			$this->update_payback($buy['id'], $pay, $pay2, $total_pay);
		}
	}

	private function check_lotto_all($lotto_id, $lottoInfo)
	{
		$agent_buy 		= $this->Dashboard_model->get_buy($lotto_id);
		$reserve_number = $this->Dashboard_model->get_reserve_number($lotto_id);

		$pay_rate = $this->pay_rate($lottoInfo);

		foreach ($agent_buy as $key => $buy) {

			$total_pay 	= 0;
			$pay 		= 0;
			$pay2 		= 0;

			if ($buy['type'] == 2) {

				// 2 บน //
				if ($buy['number'] === $lottoInfo['2top']) {
					$pay = $buy['top'] * $pay_rate['2top'];
					$total_pay += $pay;
				}

				// 2 ล่าง //
				if ($buy['number'] === $lottoInfo['2bottom']) {
					$pay2 = $buy['bottom'] * $pay_rate['2bottom'];
					$total_pay += $pay2;
				}
			} elseif ($buy['type'] == 3) {
				// 3 ตรง //
				if ($buy['number'] === $lottoInfo['3top']) {
					$pay = $buy['top'] * $pay_rate['3top'];
					$total_pay += $pay;
				}

				// 3 โต๊ด //
				for ($i = 1; $i <= 6; $i++) {
					if ($buy['number'] === $lottoInfo['3_' . $i]) {
						$pay2 = $buy['bottom'] * $pay_rate['3_' . $i];
						$total_pay += $pay2;
					}
				}
			}

			$this->update_payback($buy['id'], $pay, $pay2, $total_pay);
		}
	}

	private function pay_rate($lottoInfo)
	{
		$config 	= $this->Dashboard_model->get_config();
		$pay_rate 	= [];

		// 2top //
		$rn_2top = $this->Dashboard_model->get_pay_rate($lottoInfo['id'], $lottoInfo['2top']);
		if (empty($rn_2top)) {
			$pay_rate['2top'] = $config[0]['value'];
		} else {
			$pay_rate['2top'] = $rn_2top[0]['pay'];
		}

		// 2bottom //
		$rn_2bottom = $this->Dashboard_model->get_pay_rate($lottoInfo['id'], $lottoInfo['2bottom']);
		if (empty($rn_2bottom)) {
			$pay_rate['2bottom'] = $config[0]['value'];
		} else {
			$pay_rate['2bottom'] = $rn_2bottom[0]['pay'];
		}

		// 3top //
		$rn_3top = $this->Dashboard_model->get_pay_rate($lottoInfo['id'], $lottoInfo['3top']);
		if (empty($rn_3top)) {
			$pay_rate['3top'] = $config[1]['value'];
		} else {
			$pay_rate['3top'] = $rn_3top[0]['pay'];
		}

		// 3tod //
		for ($i = 1; $i <= 6; $i++) {
			$rn_3tod = $this->Dashboard_model->get_pay_rate($lottoInfo['id'], $lottoInfo['3_' . $i]);
			if (empty($rn_3tod)) {
				$pay_rate['3_' . $i] = $config[2]['value'];
			} else {
				$pay_rate['3_' . $i] = $rn_3tod[0]['pay2'];
			}
		}

		return $pay_rate;
	}

	private function update_payback($id, $pay, $pay2, $total)
	{
		$updateData = array(
			'id'   => $id,
			'pay'  => $pay,
			'pay2' => $pay2,
			'total_pay' => $total
		);
		$this->Dashboard_model->update_payback($updateData);
	}

	private function get_statement($lotto_id, $lottoInfo, $agent_id)
	{
		// Get payment info //
		// 2 Top //
		$sum['2top'] 	= $this->Dashboard_model->get_sum_agent_buy($lotto_id, $lottoInfo['2top'], $agent_id);
		$sum['2bottom'] = $this->Dashboard_model->get_sum_agent_buy($lotto_id, $lottoInfo['2bottom'], $agent_id);
		$sum['3top'] 	= $this->Dashboard_model->get_sum_agent_buy($lotto_id, $lottoInfo['3top'], $agent_id);

		// 3 โต๊ด //
		$tod_number 	= "";
		$tod_top 		= 0;
		$tod_bottom 	= 0;
		$tod_pay 		= 0;
		$tod_pay2 		= 0;
		$tod_total_pay 	= 0;

		for ($i = 1; $i <= 6; $i++) {
			$tod['3_' . $i] = $this->Dashboard_model->get_sum_agent_buy($lotto_id, $lottoInfo['3_' . $i], $agent_id);

			if (!empty($lottoInfo['3_' . $i])) {
				$tod_number .= $lottoInfo['3_' . $i] . " ";
			}

			$tod_top 		+= $tod['3_' . $i]['top'];
			$tod_bottom 	+= $tod['3_' . $i]['bottom'];
			$tod_pay 		+= $tod['3_' . $i]['pay'];
			$tod_pay2 		+= $tod['3_' . $i]['pay2'];
			$tod_total_pay 	+= $tod['3_' . $i]['total_pay'];


			$sum['3tod'] = array(
				'number' 	=>	$tod_number,
				'top'		=>	$tod_top,
				'bottom'	=>	$tod_bottom,
				'pay'		=>	$tod_pay,
				'pay2'		=>	$tod_pay2,
				'total_pay' =>	$tod_total_pay
			);
		}
		return $sum;
	}

	private function get_non_agent_statement($lotto_id, $lottoInfo)
	{
		// Get payment info //
		// 2 Top //
		$sum['2top'] 	= $this->Dashboard_model->get_sum_buy($lotto_id, $lottoInfo['2top']);
		$sum['2bottom'] = $this->Dashboard_model->get_sum_buy($lotto_id, $lottoInfo['2bottom']);
		$sum['3top'] 	= $this->Dashboard_model->get_sum_buy($lotto_id, $lottoInfo['3top']);

		// 3 โต๊ด //
		$tod_number 	= "";
		$tod_top 		= 0;
		$tod_bottom 	= 0;
		$tod_pay 		= 0;
		$tod_pay2 		= 0;
		$tod_total_pay 	= 0;

		for ($i = 1; $i <= 6; $i++) {
			$tod['3_' . $i] = $this->Dashboard_model->get_sum_buy($lotto_id, $lottoInfo['3_' . $i]);

			if (!empty($lottoInfo['3_' . $i])) {
				$tod_number .= $lottoInfo['3_' . $i] . " ";
			}

			$tod_top 		+= $tod['3_' . $i]['top'];
			$tod_bottom 	+= $tod['3_' . $i]['bottom'];
			$tod_pay 		+= $tod['3_' . $i]['pay'];
			$tod_pay2 		+= $tod['3_' . $i]['pay2'];
			$tod_total_pay 	+= $tod['3_' . $i]['total_pay'];


			$sum['3tod'] = array(
				'number' 	=>	$tod_number,
				'top'		=>	$tod_top,
				'bottom'	=>	$tod_bottom,
				'pay'		=>	$tod_pay,
				'pay2'		=>	$tod_pay2,
				'total_pay' =>	$tod_total_pay
			);
		}
		return $sum;
	}

	private function get_percent($lotto_id, $agents)
	{
		$percent_total = 0;
		foreach ($agents as $key => $agent) {
			$sum_agents 	= $this->Dashboard_model->get_sum_agent_received($lotto_id, $agent['id']);
			$percent_total += ($sum_agents['top'] + $sum_agents['bottom']) * ($agent['percent'] / 100);
		}
		return $percent_total;
	}

	private function get_percent_type($lotto_id, $agents, $type, $subtype)
	{
		$percent_total = 0;
		foreach ($agents as $key => $agent) {
			$sum_agents 	= $this->Dashboard_model->get_sum_agent_type_received($lotto_id, $agent['id'], $type);

			if ($subtype == 'top') {
				$percent_total += ($sum_agents['top']) * ($agent['percent'] / 100);
			} else {
				$percent_total += ($sum_agents['bottom']) * ($agent['percent'] / 100);
			}
		}
		return $percent_total;
	}

	private function get_3tod_report($buy_number)
	{

		sort($buy_number);
		$count_number = count($buy_number);

		foreach ($buy_number as $key => $value) {

			$tod = array();
			$tod = $this->gen_tod($value['number']);

			for ($i = 0; $i < count($tod); $i++) {
				for ($j = 0; $j < $count_number; $j++) {
					if ($i != 0 && isset($buy_number[$key]) && isset($buy_number[$j])) {
						if ($buy_number[$j]['number'] === $tod[$i]) {
							$buy_number[$key]['sent'] += $buy_number[$j]['sent'];
							unset($buy_number[$j]);
						}
					}
				}
			}
		}

		sort($buy_number);
		return $buy_number;
	}

	private function gen_tod($str)
	{

		if (!empty($str)) {
			$n = strlen($str);
			$three_number = $this->permute($str, 0, $n - 1);

			for ($i = 0; $i < 3; $i++) {
				for ($j = 0; $j < 2; $j++) {
					$set_three_all_number[] = $three_number[$i][$j];
				}
			}
			$set_three = array_unique($set_three_all_number);

			for ($i = 0; $i < 6; $i++) {
				if (isset($set_three[$i])) {
					$three_tod_result[$i] = $set_three[$i];
				} else {
					$three_tod_result[$i] = '';
				}
			}
		} else {
			for ($i = 0; $i < 6; $i++) {
				$three_tod_result[$i] = '';
			}
		}

		return $three_tod_result;
	}

	private function permute($str, $l, $r)
	{

		if ($l == $r) {
			return $str;
		} else {
			for ($i = $l; $i <= $r; $i++) {
				$str = $this->swap($str, $l, $i);
				$set_arr[] = $this->permute($str, $l + 1, $r);
				$str = $this->swap($str, $l, $i);
			}
			return $set_arr;
		}
	}

	private function swap($a, $i, $j)
	{
		$temp;
		$charArray = str_split($a);
		$temp = $charArray[$i];
		$charArray[$i] = $charArray[$j];
		$charArray[$j] = $temp;
		return implode($charArray);
	}
}
