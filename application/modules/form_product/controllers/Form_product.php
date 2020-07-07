<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_product extends MX_Controller {

	public function __construct()
    {
      	parent::__construct();
       	$this->load->model('Form_product_model');
       	$this->load->model('form_comment/Comment_model');
    }
	public function index()
	{
		$data['content'] = 'form_template/form-template';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['header_title'] = 'ผลผลิต';
		$data['form_content'] = 'form_product/form_product';

		$research_id = $this->uri->segment(3);
		$check_data = $this->Form_product_model->check_data($research_id);
		if($check_data!=0){
			redirect('form_product/edit_view/'.$research_id);
		}

		$data['research_id'] = $research_id ;
		$data['get_research'] = $this->Form_product_model->get_research_detail($research_id);
		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Form_product_model->get_pedigree_plot_repeat($research_id,$repeat);
			$data['get_lost_grove'][] = $this->Form_product_model->get_lost_grove($research_id,$repeat);
		}

		$form = $this->uri->segment(1);
		$comment = $this->Comment_model->get_comment($research_id,$form);
		if(isset($comment[0]['comment'])){
			$data['comment'] = $comment[0]['comment'];
		}else{
			$data['comment'] = '';
		}

		$this->load->view('header/admin_header',$data);
	}
	public function edit_view()
	{
		$data['content'] = 'form_template/form-template';
		$data['header_title'] = 'ผลผลิต';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_product/form_product_edit';

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['get_research'] = $this->Form_product_model->get_research_detail($research_id);
		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Form_product_model->get_pedigree_plot_repeat($research_id,$repeat);
			$data['get_data'][] = $this->Form_product_model->get_data($research_id,$repeat);
			$data['get_lost_grove'][] = $this->Form_product_model->get_lost_grove($research_id,$repeat);
		}
		// echo "<pre>";
		// print_r($data['get_data']);
		// exit();
		$form = $this->uri->segment(1);
		$comment = $this->Comment_model->get_comment($research_id,$form);
		if(isset($comment[0]['comment'])){
			$data['comment'] = $comment[0]['comment'];
		}else{
			$data['comment'] = '';
		}

		$this->load->view('header/admin_header',$data);
	}
	public function insert_data()
	{
		$research_id = $this->input->post('research_id');
		$input_product_gram_plot = $this->input->post('product_gram_plot');
		$input_moisture = $this->input->post('moisture');
		$input_moisture_14 = $this->input->post('moisture_14');
		$input_product_gram_plot2 = $this->input->post('product_gram_plot2');
		$input_moisture2 = $this->input->post('moisture2');
		$input_moisture2_14 = $this->input->post('moisture2_14');
		$input_product_kg_rai = $this->input->post('product_kg_rai');
		$input_product_after_kg_rai = $this->input->post('product_after_kg_rai');

		$plot_no = $this->input->post('plot_no');
		$block = $this->input->post('block');
		$entry = $this->input->post('entry');
		$repeat = $this->input->post('repeatedly');

		for ($i=0; $i < count($plot_no); $i++) {

			if(empty($input_product_gram_plot[$i])){
				$product_gram_plot = NULL ;
			}else{
				$product_gram_plot = $input_product_gram_plot[$i] ;
			}

			if(empty($input_moisture[$i])){
				$moisture = NULL ;
			}else{
				$moisture = $input_moisture[$i] ;
			}
				
			if(empty($input_moisture_14[$i])){
				$moisture_14 = NULL ;
			}else{
				$moisture_14 = $input_moisture_14[$i] ;
			}

			// add 2nd input //
			if(empty($input_product_gram_plot2[$i])){
				$product_gram_plot2 = NULL ;
			}else{
				$product_gram_plot2 = $input_product_gram_plot2[$i] ;
			}

			if(empty($input_moisture2[$i])){
				$moisture2 = NULL ;
			}else{
				$moisture2 = $input_moisture2[$i] ;
			}
				
			if(empty($input_moisture2_14[$i])){
				$moisture2_14 = NULL ;
			}else{
				$moisture2_14 = $input_moisture2_14[$i] ;
			}
			// end 2nd input //

			if(empty($input_product_kg_rai[$i])){
				$product_kg_rai = NULL ;
			}else{
				$product_kg_rai = $input_product_kg_rai[$i] ;
			}

			if(empty($input_product_after_kg_rai[$i])){
				$product_after_kg_rai = NULL ;
			}else{
				$product_after_kg_rai = $input_product_after_kg_rai[$i] ;
			}

			$input = array(
				'research_id' => $research_id,
				'product_gram_plot' => $product_gram_plot,
				'moisture' => $moisture,
				'moisture_14' => $moisture_14,
				'product_gram_plot2' => $product_gram_plot2,
				'moisture2' => $moisture2,
				'moisture2_14' => $moisture2_14,
				'product_kg_rai' => $product_kg_rai,
				'product_after_kg_rai' => $product_after_kg_rai,
				'plot_no' => $plot_no[$i],
				'block' => $block[$i],
				'entry' => $entry[$i],
				'repeatedly' => $repeat[$i],
			);
			$this->Form_product_model->insert_data($input);
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
			redirect('form_product/edit_view/'.$research_id);
		}
	}
	public function update_data()
	{
		$research_id = $this->input->post('research_id');
		$input_product_gram_plot = $this->input->post('product_gram_plot');
		$input_moisture = $this->input->post('moisture');
		$input_moisture_14 = $this->input->post('moisture_14');
		$input_product_gram_plot2 = $this->input->post('product_gram_plot2');
		$input_moisture2 = $this->input->post('moisture2');
		$input_moisture2_14 = $this->input->post('moisture2_14');
		$input_product_kg_rai = $this->input->post('product_kg_rai');
		$input_product_after_kg_rai = $this->input->post('product_after_kg_rai');

		$id = $this->input->post('id');
		$plot_no = $this->input->post('plot_no');
		$block = $this->input->post('block');
		$entry = $this->input->post('entry');
		$repeat = $this->input->post('repeatedly');

		if(empty($id)){
			redirect('form_product/edit_view/'.$research_id);
		}

		for ($i=0; $i < count($plot_no); $i++) {

			if(empty($input_product_gram_plot[$i])){
				$product_gram_plot = NULL ;
			}else{
				$product_gram_plot = $input_product_gram_plot[$i] ;
			}

			if(empty($input_moisture[$i])){
				$moisture = NULL ;
			}else{
				$moisture = $input_moisture[$i] ;
			}
				
			if(empty($input_moisture_14[$i])){
				$moisture_14 = NULL ;
			}else{
				$moisture_14 = $input_moisture_14[$i] ;
			}

			// add 2nd input //
			if(empty($input_product_gram_plot2[$i])){
				$product_gram_plot2 = NULL ;
			}else{
				$product_gram_plot2 = $input_product_gram_plot2[$i] ;
			}

			if(empty($input_moisture2[$i])){
				$moisture2 = NULL ;
			}else{
				$moisture2 = $input_moisture2[$i] ;
			}
				
			if(empty($input_moisture2_14[$i])){
				$moisture2_14 = NULL ;
			}else{
				$moisture2_14 = $input_moisture2_14[$i] ;
			}
			// end 2nd input //

			if(empty($input_product_kg_rai[$i])){
				$product_kg_rai = NULL ;
			}else{
				$product_kg_rai = $input_product_kg_rai[$i] ;
			}

			if(empty($input_product_after_kg_rai[$i])){
				$product_after_kg_rai = NULL ;
			}else{
				$product_after_kg_rai = $input_product_after_kg_rai[$i] ;
			}

			$input = array(
				'id' => $id[$i],
				'research_id' => $research_id,
				'product_gram_plot' => $product_gram_plot,
				'moisture' => $moisture,
				'moisture_14' => $moisture_14,
				'product_gram_plot2' => $product_gram_plot2,
				'moisture2' => $moisture2,
				'moisture2_14' => $moisture2_14,
				'product_kg_rai' => $product_kg_rai,
				'product_after_kg_rai' => $product_after_kg_rai,
				'plot_no' => $plot_no[$i],
				'block' => $block[$i],
				'entry' => $entry[$i],
				'repeatedly' => $repeat[$i],
			);
			$this->Form_product_model->update_data($input);
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
			redirect('form_product/edit_view/'.$research_id);
		}
	}
	public function excel()
	{

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['get_research'] = $this->Form_product_model->get_research_detail($research_id);
	
		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Form_product_model->get_pedigree_plot_repeat($research_id,$repeat);
			$data['get_data'][] = $this->Form_product_model->get_data($research_id,$repeat);
		}
		// echo "<pre>";
		// print_r($data['pedigree_plot']);
		// exit();
		$this->load->view('export_excel',$data);
	}
}
