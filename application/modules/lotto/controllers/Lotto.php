<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lotto extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Lotto_model');
		$this->load->model('dashboard/Dashboard_model');
	}

	public function index()
	{
		$data['content'] = 'lotto';
		$data['list_lotto'] = $this->Lotto_model->list_lotto();

		$this->load->view('header/admin_header', $data);
	}

	public function reserve_number()
	{
		$lotto_id = $this->uri->segment(3);

		if (!empty($lotto_id)) {
			$data['reserve_number2'] = $this->Lotto_model->get_reserve_number2($lotto_id);
			$data['reserve_number3'] = $this->Lotto_model->get_reserve_number3($lotto_id);
			$data['lotto'] = $this->Lotto_model->get_lotto($lotto_id);
		} else {
			redirect('lotto');
		}

		$data['content'] = 'reserve_number';
		$this->load->view('header/admin_header', $data);
	}

	public function lotto_insert()
	{
		$list_data = array(
			'name' => $this->input->post('name')
		);

		$result = $this->Lotto_model->lotto_insert($list_data);

		if ($result == 1) {
			$this->session->set_flashdata('insert_lotto', 'done');
		} else {
			$this->session->set_flashdata('insert_lotto', 'fail');
		}
		redirect('lotto');
	}

	public function rn_insert()
	{
		$lotto_id = $this->uri->segment(3);
		$number_2 = $this->input->post('2digi');
		$pay_2digi = $this->input->post('2pay');
		$reserve_numbers = array();

		for ($i = 0; $i < count($number_2); $i++) {
			if (!empty($number_2[$i])) {
				$reserve_numbers[] =
					array(
						'lotto_id' 	=> $lotto_id,
						'number' 	=> $number_2[$i],
						'pay'  		=> $pay_2digi[$i],
						'pay2'  	=> 0,
						'3_1' 	  	=> null,
						'3_2' 	  	=> null,
						'3_3' 	  	=> null,
						'3_4' 	  	=> null,
						'3_5' 	  	=> null,
						'3_6' 	  	=> null
					);
			}
		}

		$number_3 = $this->input->post('3digi');
		$pay_3digi = $this->input->post('3pay');
		$pay2_3digi = $this->input->post('3pay2');

		for ($i = 0; $i < count($number_3); $i++) {

			if (!empty($number_3[$i])) {

				$str 		= $number_3[$i];
				$pay_3top	= $pay_3digi[$i];
				$pay_3tod 	= $pay2_3digi[$i];
				$three_tod_result = array();

				if (!empty($str)) {
					$n = strlen($str);
					$three_number = $this->permute($str, 0, $n - 1);

					$set_three_all_number = array();
					for ($a = 0; $a < 3; $a++) {
						for ($j = 0; $j < 2; $j++) {
							$set_three_all_number[] = $three_number[$a][$j];
						}
					}

					$set_three = array_unique($set_three_all_number);

					for ($a = 0; $a < 6; $a++) {
						if (isset($set_three[$a])) {
							$three_tod_result[$a] = $set_three[$a];
						} else {
							$three_tod_result[$a] = '';
						}
					}
				} else {
					for ($a = 0; $a < 6; $a++) {
						$three_tod_result[$a] = '';
					}
				}

				$reserve_numbers[] =
					array(
						'lotto_id' => $lotto_id,
						'number'  => $str,
						'pay'  	  => $pay_3top,
						'pay2'    => $pay_3tod,
						'3_1' 	  => $three_tod_result[0],
						'3_2' 	  => $three_tod_result[1],
						'3_3' 	  => $three_tod_result[2],
						'3_4' 	  => $three_tod_result[3],
						'3_5' 	  => $three_tod_result[4],
						'3_6' 	  => $three_tod_result[5]
					);
			}
		}

		if (empty($reserve_numbers)) {
			$this->Lotto_model->rn_delete($lotto_id);
		} else {
			$result = $this->Lotto_model->rn_insert($reserve_numbers, $lotto_id);
		}

		if ($result == 1) {
			$this->session->set_flashdata('insert_reserve_numbers', 'done');
		} else {
			$this->session->set_flashdata('insert_reserve_numbers', 'fail');
		}
		redirect('lotto/reserve_number/' . $lotto_id);
	}

	public function lotto_update()
	{
		$str = $this->input->post('3top');
		$id = $this->uri->segment(3);
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

		$prepare_data = array(
			'id' 	  => $id,
			'name' 	  => $this->input->post('name'),
			'2top' 	  => $this->input->post('2top'),
			'2bottom' => $this->input->post('2bottom'),
			'3top' 	  => $this->input->post('3top'),
			'3_1' 	  => $three_tod_result[0],
			'3_2' 	  => $three_tod_result[1],
			'3_3' 	  => $three_tod_result[2],
			'3_4' 	  => $three_tod_result[3],
			'3_5' 	  => $three_tod_result[4],
			'3_6' 	  => $three_tod_result[5]
		);

		$result = $this->Lotto_model->lotto_update($prepare_data);

		if ($result == 1) {
			$this->session->set_flashdata('update_user', 'done');
		} else {
			$this->session->set_flashdata('update_user', 'fail');
		}

		redirect('lotto/index');
	}

	public function lotto_delete()
	{
		$id = $this->uri->segment(3);
		$return = $this->Lotto_model->lotto_delete($id);
		redirect('lotto/index');
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

	public function check_lotto_all()
	{
		$lotto_id 		= $this->uri->segment(3);
		$lottoInfo		= $this->Dashboard_model->get_lotto($lotto_id);

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

		$prepare_data = array(
			'id' 	  => $lotto_id,
			'status'  => 1
		);

		$result = $this->Lotto_model->lotto_update($prepare_data);

		redirect('lotto/index');
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
			$rn_3tod = $this->Dashboard_model->get_tod_pay_rate($lottoInfo['id'], $lottoInfo['3_' . $i]);
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
}
