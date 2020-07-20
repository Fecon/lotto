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

		$this->load->view('header/admin_header',$data);
	}

	public function reserve_number()
	{
		$lotto_id = $this->uri->segment(3);

		if(!empty($lotto_id)){
			 $data['reserve_number2'] = $this->Lotto_model->get_reserve_number2($lotto_id);
			 $data['reserve_number3'] = $this->Lotto_model->get_reserve_number3($lotto_id);
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

	public function rn_insert()
	{
		$lotto_id = $this->uri->segment(3);
		$number_2 = $this->input->post('2digi');
		$pay_2digi = $this->input->post('2pay');
		for ($i=0; $i < count($number_2) ; $i++) {
			if(!empty($number_2[$i])){
				$reserve_numbers[] =
					array(
						'lotto_id' => $lotto_id,
						'number' 	 => $number_2[$i],
						'pay'  		 => $pay_2digi[$i],
						'pay2'  	 => null
					);
			}
		}

		$number_3 = $this->input->post('3digi');
		$pay_3digi = $this->input->post('3pay');
		$pay2_3digi = $this->input->post('3pay2');

		for ($i=0; $i < count($number_3) ; $i++) {
			if(!empty($number_3[$i])){
				$reserve_numbers[] =
					array(
						'lotto_id' => $lotto_id,
						'number' 	 => $number_3[$i],
						'pay'  		 => $pay_3digi[$i],
						'pay2'  	 => $pay2_3digi[$i]
					);
			}
		}

		$result = $this->Lotto_model->rn_insert($reserve_numbers,$lotto_id);

		if($result==1){
			$this->session->set_flashdata('insert_reserve_numbers', 'done');
		}else{
			$this->session->set_flashdata('insert_reserve_numbers', 'fail');
		}
		redirect('lotto/reserve_number/'.$lotto_id);
	}

	public function lotto_update()
	{
		$str = $this->input->post('3top');
		$id = $this->uri->segment(3);
		if (!empty($str)) {
			$n = strlen($str);
			$three_number = $this->permute($str, 0, $n - 1);

			for ($i=0; $i < 3 ; $i++) {
				for ($j=0; $j < 2 ; $j++) {
					$set_three_all_number[] = $three_number[$i][$j];
				}
			}
			$set_three = array_unique($set_three_all_number);

			for ($i=0; $i < 6 ; $i++) {
				if(isset($set_three[$i])){
					$three_tod_result[$i] = $set_three[$i];
				}else{
					$three_tod_result[$i] = '';
				}
			}

		}else{
			for ($i=0; $i < 6 ; $i++) {
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

		if($result==1){
			$this->session->set_flashdata('update_user', 'done');
		}else{
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
	    }
	    else
	    {
	        for ($i = $l; $i <= $r; $i++)
	        {
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
	    $temp = $charArray[$i] ;
	    $charArray[$i] = $charArray[$j];
	    $charArray[$j] = $temp;
	    return implode($charArray);
	}

}
