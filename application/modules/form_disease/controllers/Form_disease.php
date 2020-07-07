<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_disease extends MX_Controller {

	public function __construct()
    {
      	parent::__construct();
       	$this->load->model('Form_disease_model');
       	$this->load->model('form_comment/Comment_model');
    }
	public function index()
	{
		$data['content'] = 'form_template/form-template';
		$data['header_title'] = 'ศัตรูพืช';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_disease/form_disease';
		
		$research_id = $this->uri->segment(3);

		$data['research_id'] = $research_id ;

		$check_data = $this->Form_disease_model->check_data($research_id);
		if($check_data!=0){
			redirect('form_disease/edit_view/'.$research_id);
		}

		$data['get_pest_animal'] = $this->Form_disease_model->get_pest_animal();
		$data['get_pest_disease'] = $this->Form_disease_model->get_pest_disease();
		$data['get_pest_insect'] = $this->Form_disease_model->get_pest_insect();
		$data['get_research'] = $this->Form_disease_model->get_research_detail($research_id);

		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) 
		{
			$data['pedigree_plot'][] = $this->Form_disease_model->get_pedigree_plot_repeat($research_id,$repeat);
		}
		// echo "<pre>";
		// print_r($data['get_data']);
		// exit();
		$this->load->view('header/admin_header',$data);
	}
	public function edit_view()
	{
		$data['content'] = 'form_template/form-template';
		$data['header_title'] = 'ศัตรูพืช';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_disease/form_disease_edit';

		$research_id = $this->uri->segment(3);
		$form = $this->uri->segment(1);
		$check_data = $this->Form_disease_model->check_data($research_id);
		if($check_data==0){
			redirect('form_disease/index/'.$research_id);
		}

		$comment = $this->Form_disease_model->get_comment($research_id,$form);
		if(isset($comment[0]['comment'])){
			$data['comment'] = $comment[0]['comment'];
		}else{
			$data['comment'] = '';
		}

		$data['research_id'] = $research_id ;
		$data['get_pest_animal'] = $this->Form_disease_model->get_pest_animal();
		$data['get_pest_disease'] = $this->Form_disease_model->get_pest_disease();
		$data['get_pest_insect'] = $this->Form_disease_model->get_pest_insect();
		$data['get_research'] = $this->Form_disease_model->get_research_detail($research_id);
		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Form_disease_model->get_pedigree_plot_repeat($research_id,$repeat);
			$data['get_data'][] = $this->Form_disease_model->get_data($research_id,$repeat);
		}
		// echo "<pre>";
		// print_r($data['get_data']);
		// exit();

		$this->load->view('header/admin_header',$data);
	}
	public function insert_data()
	{
		$research_id = $this->input->post('research_id');

		$animal = $this->input->post('animal');
		$value_animal = $this->input->post('value_animal');
		$insect = $this->input->post('insect');
		$value_insect = $this->input->post('value_insect');
		$disease = $this->input->post('disease');
		$value_disease = $this->input->post('value_disease');
		$plot_no = $this->input->post('plot_no');
		$block = $this->input->post('block');
		$entry = $this->input->post('entry');
		$repeat = $this->input->post('repeatedly');

		$this->Form_disease_model->clear_data($research_id);

		for ($i=0; $i < count($plot_no); $i++) { 
			
			$input = array(
				'research_id' => $research_id,
				'plot_no' => $plot_no[$i],
				'block' => $block[$i],
				'entry' => $entry[$i],
				'repeatedly' => $repeat[$i],
			);

			if($i == 0){
				$form_id = $this->Form_disease_model->insert_data($input);
			}else{
				if($plot_no[$i] != $plot_no[$i-1]){
					$form_id = $this->Form_disease_model->insert_data($input);
				}
			}
			
			if($disease[$i]!=0 || !empty($disease[$i])){
				$input_data = array(
					'form_id' => $form_id ,
					'disease' => $disease[$i],
					'value_disease' => $value_disease[$i],
					'research_id' => $research_id,
				);
				$this->Form_disease_model->insert_disease($input_data);

			}
			if($insect[$i]!=0 || !empty($insect[$i])){
				$input_data = array(
					'form_id' => $form_id ,
					'insect' => $insect[$i],
					'value_insect' => $value_insect[$i],
					'research_id' => $research_id,
				);
				$this->Form_disease_model->insert_insect($input_data);

			}
			if($animal[$i]!=0 || !empty($animal[$i])){
				$input_data = array(
					'form_id' => $form_id ,
					'animal' => $animal[$i],
					'value_animal' => $value_animal[$i],
					'research_id' => $research_id,
				);
				$this->Form_disease_model->insert_animal($input_data);

			}
		}


		$input	= array(
			'research_id' => $research_id, 
			'form_type' => $this->uri->segment(1), 
			'comment' => $this->input->post('comment'), 
		);
		$this->Comment_model->clear_comment($input);
		$this->Comment_model->insert_data($input);

		// exit();
		if(empty($research_id)){
			redirect('research');
		}else{
			redirect('form_disease/edit_view/'.$research_id);
		}
	}
	public function update_data()
	{

		$research_id = $this->input->post('research_id');

		$id = $this->input->post('id');
		$animal = $this->input->post('animal');
		$value_animal = $this->input->post('value_animal');
		$insect = $this->input->post('insect');
		$value_insect = $this->input->post('value_insect');
		$disease = $this->input->post('disease');
		$value_disease = $this->input->post('value_disease');
		$plot_no = $this->input->post('plot_no');
		$block = $this->input->post('block');
		$entry = $this->input->post('entry');
		$repeat = $this->input->post('repeatedly');


		$this->Form_disease_model->clear_data($research_id);

		for ($i=0; $i < count($plot_no); $i++) { 
			
			$input = array(
				'research_id' => $research_id,
				'plot_no' => $plot_no[$i],
				'block' => $block[$i],
				'entry' => $entry[$i],
				'repeatedly' => $repeat[$i],
			);

			if($i == 0){
				$form_id = $this->Form_disease_model->insert_data($input);
			}else{
				if($plot_no[$i] != $plot_no[$i-1]){
					$form_id = $this->Form_disease_model->insert_data($input);
				}
			}
			
			if($disease[$i]!=0 || !empty($disease[$i])){
				$input_data = array(
					'form_id' => $form_id ,
					'disease' => $disease[$i],
					'value_disease' => $value_disease[$i],
					'research_id' => $research_id,
				);
				$this->Form_disease_model->insert_disease($input_data);

			}
			if($insect[$i]!=0 || !empty($insect[$i])){
				$input_data = array(
					'form_id' => $form_id ,
					'insect' => $insect[$i],
					'value_insect' => $value_insect[$i],
					'research_id' => $research_id,
				);
				$this->Form_disease_model->insert_insect($input_data);

			}
			if($animal[$i]!=0 || !empty($animal[$i])){
				$input_data = array(
					'form_id' => $form_id ,
					'animal' => $animal[$i],
					'value_animal' => $value_animal[$i],
					'research_id' => $research_id,
				);
				$this->Form_disease_model->insert_animal($input_data);

			}
		}

		$input	= array(
			'research_id' => $research_id, 
			'form_type' => $this->uri->segment(1), 
			'comment' => $this->input->post('comment'), 
		);
		$this->Comment_model->clear_comment($input);
		$this->Comment_model->insert_data($input);

		if(empty($research_id)){
			redirect('research');
		}else{
			redirect('form_disease/edit_view/'.$research_id);
		}
		

	}
	public function add_disease()
	{
		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;

		$data['header_title'] = 'ศัตรูพืช';
		$data['content'] = 'form_disease/add_disease';

		$data['get_pest_disease'] = $this->Form_disease_model->get_table('pest_disease');
		
		$this->load->view('header/admin_header',$data);
	}
	public function add_animal()
	{
		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;

		$data['header_title'] = 'ศัตรูพืช';
		$data['content'] = 'form_disease/add_animal';

		$data['get_pest_animal'] = $this->Form_disease_model->get_table('pest_animal');
		$this->load->view('header/admin_header',$data);
	}
	public function add_insect()
	{
		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;

		$data['header_title'] = 'ศัตรูพืช';
		$data['content'] = 'form_disease/add_insect';

		$data['get_pest_insect'] = $this->Form_disease_model->get_table('pest_insect');
		$this->load->view('header/admin_header',$data);
	}
	public function insert_disease()
	{
		$research_id = $this->input->post('research_id') ;
		$input_data = array(
					'disease_name' => $this->input->post('name') 
				);
		$this->Form_disease_model->insert_table('pest_disease',$input_data);
		redirect('form_disease/add_disease/'.$research_id);
	}
	public function insert_animal()
	{
		$research_id = $this->input->post('research_id') ;
		$input_data = array(
					'animal_name' => $this->input->post('name') 
				);
		$this->Form_disease_model->insert_table('pest_animal',$input_data);
		redirect('form_disease/add_animal/'.$research_id);
	}
	public function insert_insect()
	{
		$research_id = $this->input->post('research_id') ;
		$input_data = array(
					'insect_name' => $this->input->post('name') 
				);
		$this->Form_disease_model->insert_table('pest_insect',$input_data);
		redirect('form_disease/add_insect/'.$research_id);
	}
	public function update_disease()
	{
		$id = $this->uri->segment(3);
		$status = $this->uri->segment(4);
		$research_id = $this->uri->segment(5);

		if($status==0){
			$status_update = 1 ;
		}elseif($status==1){
			$status_update = 0 ;
		}

		$table = array(
			'table' => 'pest_disease' , 
			'pk' => 'disease_id' 
		);

		$input_data = array(
			'disease_status' => $status_update
		);

		$this->Form_disease_model->update_table($table,$input_data,$id);
		redirect('form_disease/add_disease/'.$research_id);
	}
	public function del_disease()
	{
		$id = $this->uri->segment(3);
		$research_id = $this->uri->segment(4);

		$table = array(
			'table' => 'pest_disease' , 
			'pk' => 'disease_id' 
		);

		$this->Form_disease_model->del_table($table,$id);
		redirect('form_disease/add_disease/'.$research_id);
	}
	public function update_animal()
	{
		$id = $this->uri->segment(3);
		$status = $this->uri->segment(4);
		$research_id = $this->uri->segment(5);

		if($status==0){
			$status_update = 1 ;
		}elseif($status==1){
			$status_update = 0 ;
		}

		$table = array(
			'table' => 'pest_animal' , 
			'pk' => 'animal_id' 
		);

		$input_data = array(
			'animal_status' => $status_update
		);

		$this->Form_disease_model->update_table($table,$input_data,$id);
		redirect('form_disease/add_animal/'.$research_id);
	}
	public function del_animal()
	{
		$id = $this->uri->segment(3);
		$research_id = $this->uri->segment(4);

		$table = array(
			'table' => 'pest_animal' , 
			'pk' => 'animal_id' 
		);

		$this->Form_disease_model->del_table($table,$id);
		redirect('form_disease/add_animal/'.$research_id);
	}

	public function update_insect()
	{
		$id = $this->uri->segment(3);
		$status = $this->uri->segment(4);
		$research_id = $this->uri->segment(5);

		if($status==0){
			$status_update = 1 ;
		}elseif($status==1){
			$status_update = 0 ;
		}

		$table = array(
			'table' => 'pest_insect' , 
			'pk' => 'insect_id' 
		);

		$input_data = array(
			'insect_status' => $status_update
		);

		$this->Form_disease_model->update_table($table,$input_data,$id);
		redirect('form_disease/add_insect/'.$research_id);
	}
	public function del_insect()
	{
		$id = $this->uri->segment(3);
		$research_id = $this->uri->segment(4);

		$table = array(
			'table' => 'pest_insect' , 
			'pk' => 'insect_id' 
		);

		$this->Form_disease_model->del_table($table,$id);
		redirect('form_disease/add_insect/'.$research_id);
	}

	public function excel()
	{
		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['get_pest_animal'] = $this->Form_disease_model->get_pest_animal();
		$data['get_pest_disease'] = $this->Form_disease_model->get_pest_disease();
		$data['get_pest_insect'] = $this->Form_disease_model->get_pest_insect();
		$data['get_research'] = $this->Form_disease_model->get_research_detail($research_id);
		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Form_disease_model->get_pedigree_plot_repeat($research_id,$repeat);
			$data['get_data'][] = $this->Form_disease_model->get_data($research_id,$repeat);
		}
		// echo "<pre>";
		// // print_r($data['pedigree_plot']);
		// print_r($data['get_data']);
		// exit();
		$this->load->view('export_excel',$data);
	}
}
