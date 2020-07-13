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

	public function rn_insert()
	{
		$lotto_id = $this->uri->segment(3);
		$number = $this->input->post('number');
		$pay = $this->input->post('pay');
		for ($i=0; $i < count($number) ; $i++) {
			$
		}

		$list_data = array(
			'name' => $this->input->post('name'),
			'pay' => $this->input->post('pay')
		);

		$result = $this->Lotto_model->rn_insert($list_data,$lotto_id);

		if($result==1){
			$this->session->set_flashdata('insert_lotto', 'done');
		}else{
			$this->session->set_flashdata('insert_lotto', 'fail');
		}
		redirect('lotto');
	}

	public function lotto_update()
	{
		$str = $this->input->post('3top');
		$id = $this->uri->segment(3);
		if (!empty($str)) {
			$n = strlen($str);
			$three_number = $this->permute($str, 0, $n - 1);
		}else{
			for ($i=0; $i < 3 ; $i++) {
				for ($j=0; $j < 2 ; $j++) {
					$three_number[$i][$j] = '';
				}
			}
		}

		$list_data = array(
			'id' 	  => $id,
			'name' 	  => $this->input->post('name'),
			'2top' 	  => $this->input->post('2top'),
			'2bottom' => $this->input->post('2bottom'),
			'3top' 	  => $three_number[0][0],
			'3_1' 	  => $three_number[0][1],
			'3_2' 	  => $three_number[1][0],
			'3_3' 	  => $three_number[1][1],
			'3_4' 	  => $three_number[2][0],
			'3_5' 	  => $three_number[2][1],
		);

		print_r($list_data);
		// exit();
		$result = $this->Lotto_model->lotto_update($list_data);

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
