<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_comment extends MX_Controller {

	public function __construct()
    {
      	parent::__construct();
       	$this->load->model('Comment_model');
    }
	public function index()
	{
		
	}
	public function insert_data($input)
	{
		$input = array(
			'research_id' => '', 
			'form_type' => '', 
			'comment' => '',
		); 
		$this->Comment_model->insert_data($input);
	}
	public function update_data()
	{
		$research_id = $this->input->post('research_id');

		$id = $this->input->post('id');
		for($slot = 1 ; $slot <= 10 ; $slot++){
			$no[$slot] = $this->input->post('no_'.$slot);
		}
		$input_average = $this->input->post('average');

		$plot_no = $this->input->post('plot_no');
		$block = $this->input->post('block');
		$entry = $this->input->post('entry');
		$repeat = $this->input->post('repeatedly');

		for ($i=0; $i < count($id); $i++) { 

			for($slot = 1 ; $slot <= 10 ; $slot++){
				
				if(empty($no[$slot][$i])){
					$no[$slot][$i] = NULL ;
				}else{
					$no[$slot][$i] = $no[$slot][$i] ;
				}
			}

			if(empty($input_average[$i])){
				$average = NULL ;
			}else{
				$average = $input_average[$i] ;
			}

			$input = array(
				'id' => $id[$i],
				'research_id' => $research_id,
				'no_1' => $no[1][$i],
				'no_2' => $no[2][$i],
				'no_3' => $no[3][$i],
				'no_4' => $no[4][$i],
				'no_5' => $no[5][$i],
				'no_6' => $no[6][$i],
				'no_7' => $no[7][$i],
				'no_8' => $no[8][$i],
				'no_9' => $no[9][$i],
				'no_10' => $no[10][$i],
				'average' => $average,
				'plot_no' => $plot_no[$i],
				'block' => $block[$i],
				'entry' => $entry[$i],
				'repeatedly' => $repeat[$i],
			);

			$this->Comment_model->update_data($input);
		}

		if(empty($research_id)){
			redirect('research');
		}else{
			redirect('form_high/edit_view/'.$research_id);
		}

	}
	public function excel()
	{

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['get_research'] = $this->Comment_model->get_research_detail($research_id);
	
		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Comment_model->get_pedigree_plot_repeat($research_id,$repeat);
			$data['get_data'][] = $this->Comment_model->get_data($research_id,$repeat);
		}
		// echo "<pre>";
		// print_r($data['pedigree_plot']);
		// exit();
		$this->load->view('export_excel',$data);
	}
}
