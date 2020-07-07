<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_grove extends MX_Controller {

	public function __construct()
    {
      	parent::__construct();
       	$this->load->model('Form_grove_model');
    }
	public function index()
	{
		$data['content'] = 'form_template/form-template';
		$data['header_title'] = 'แตกกอ';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_grove/form_grove';

		$research_id = $this->uri->segment(3);

		$check_data = $this->Form_grove_model->check_data($research_id);
		if($check_data!=0){
			redirect('form_grove/edit_view/'.$research_id);
		}
		
		$data['research_id'] = $research_id ;
		$data['get_research'] = $this->Form_grove_model->get_research_detail($research_id);
		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Form_grove_model->get_pedigree_plot_repeat($research_id,$repeat);
		}

		$this->load->view('header/admin_header',$data);
	}
	public function edit_view()
	{
		$data['content'] = 'form_template/form-template';
		$data['header_title'] = 'แตกกอ';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_grove/form_grove_edit';

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['get_research'] = $this->Form_grove_model->get_research_detail($research_id);
		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Form_grove_model->get_pedigree_plot_repeat($research_id,$repeat);
			$data['get_data'][] = $this->Form_grove_model->get_data($research_id,$repeat);
		}
		// 		echo "<pre>";
		// print_r($data['get_data']);
		// exit();
		$this->load->view('header/admin_header',$data);
	}
	public function insert_data()
	{
		$research_id = $this->input->post('research_id');

		for($slot = 1 ; $slot <= 5 ; $slot++){
			$no[$slot] = $this->input->post('no_'.$slot);
		}
		$input_average = $this->input->post('average');

		$plot_no = $this->input->post('plot_no');
		$block = $this->input->post('block');
		$entry = $this->input->post('entry');
		$repeat = $this->input->post('repeatedly');

		// print_r($water_level);

		for ($i=0; $i < count($plot_no); $i++) {

			for($slot = 1 ; $slot <= 5 ; $slot++){
				
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
				'research_id' => $research_id,
				'no_1' => $no[1][$i],
				'no_2' => $no[2][$i],
				'no_3' => $no[3][$i],
				'no_4' => $no[4][$i],
				'no_5' => $no[5][$i],
				'average' => $average,
				'plot_no' => $plot_no[$i],
				'block' => $block[$i],
				'entry' => $entry[$i],
				'repeatedly' => $repeat[$i],
			);
			// echo "<Pre>";
			// print_r($input);
			$this->Form_grove_model->insert_data($input);
		}
		// exit();
		if(empty($research_id)){
			redirect('research');
		}else{
			redirect('form_grove/edit_view/'.$research_id);
		}
	}
	public function update_data()
	{
		$research_id = $this->input->post('research_id');

		$id = $this->input->post('id');
		for($slot = 1 ; $slot <= 5 ; $slot++){
			$no[$slot] = $this->input->post('no_'.$slot);
		}
		$input_average = $this->input->post('average');

		$plot_no = $this->input->post('plot_no');
		$block = $this->input->post('block');
		$entry = $this->input->post('entry');
		$repeat = $this->input->post('repeatedly');

		for ($i=0; $i < count($id); $i++) { 

			for($slot = 1 ; $slot <= 5 ; $slot++){

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
				'average' => $average,
				'plot_no' => $plot_no[$i],
				'block' => $block[$i],
				'entry' => $entry[$i],
				'repeatedly' => $repeat[$i],
			);

			$this->Form_grove_model->update_data($input);
		}

		if(empty($research_id)){
			redirect('research');
		}else{
			redirect('form_grove/edit_view/'.$research_id);
		}

	}
	public function excel()
	{

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['get_research'] = $this->Form_grove_model->get_research_detail($research_id);
	
		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Form_grove_model->get_pedigree_plot_repeat($research_id,$repeat);
			$data['get_data'][] = $this->Form_grove_model->get_data($research_id,$repeat);
		}
		// echo "<pre>";
		// print_r($data['pedigree_plot']);
		// exit();
		$this->load->view('export_excel',$data);
	}
}
