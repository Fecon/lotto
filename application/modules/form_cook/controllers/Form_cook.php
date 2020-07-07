<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_cook extends MX_Controller {

	public function __construct()
    {
    	parent::__construct();
    	$this->load->model('Form_cook_model');
    }
	public function index()
	{
		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['get_data'] = $this->Form_cook_model->get_data($research_id);

		$data['content'] = 'record-compose';
		$this->load->view('header/admin_header',$data);
	}
	public function record_list()
	{
		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['get_data'] = $this->Form_cook_model->get_data($research_id);
		// echo "<pre>";
		// print_r($data['get_data']);
		// exit();
		$data['content'] = 'record-list';
		$this->load->view('header/admin_header',$data);
	}
	public function record_edit()
	{
		$research_id = $this->uri->segment(3);
		$record_id = $this->uri->segment(4);
		$data['research_id'] = $research_id ;
		$data['record_id'] = $record_id ;
		$data['get_data'] = $this->Form_cook_model->get_data($research_id);
		$data['get_detail'] = $this->Form_cook_model->get_detail($record_id);
		// echo "<pre>";
		// print_r($data['get_detail']);
		// exit();
		$data['content'] = 'record-compose-edit';
		$this->load->view('header/admin_header',$data);
	}
	public function record_insert()
	{
		$user_data = $this->session->userdata('user_data');

		$check_img = $_FILES['userfile'] ;
		if(!empty($check_img['tmp_name'][0])){
			$images_name = $this->do_upload($_FILES['userfile']);
		}

		$list_data = array(
			'title' => $this->input->post('title'),
			'subtitle' => $this->input->post('subtitle'),
			'description' => htmlentities($this->input->post("description"), ENT_QUOTES, "UTF-8"),
			'research_id' => $this->input->post('research_id'),
			'user_id' => $user_data['user_id'],
		);

		$record_id = $this->Form_cook_model->insert_data($list_data);

		if(!empty($check_img['tmp_name'][0])){
			for ($i=0; $i < count($images_name) ; $i++) { 
				$input_file = array(
					'record_id' => $record_id , 
					'file_name' => $images_name[$i]
				);
				$resultfile = $this->Form_cook_model->insert_filename($input_file);
			}
		}

		if($result==1){
			$this->session->set_flashdata('insert_record', 'done');
		}else{
			$this->session->set_flashdata('insert_record', 'fail');
		}
		redirect('form_cook/record_list/'.$this->input->post('research_id'));
	}
	public function record_update()
	{
		$user_data = $this->session->userdata('user_data');

		$check_img = $_FILES['userfile'] ;
		if(!empty($check_img['tmp_name'][0])){
			$images_name = $this->do_upload($_FILES['userfile']);
		}
		$record_id = $this->input->post('id');

		$list_data = array(
			'id' => $record_id,
			'title' => $this->input->post('title'),
			'subtitle' => $this->input->post('subtitle'),
			'description' => htmlentities($this->input->post("description"), ENT_QUOTES, "UTF-8"),
			'research_id' => $this->input->post('research_id'),
			'user_id' => $user_data['user_id'],
		);

		$this->Form_cook_model->update_data($list_data);
		
		if(!empty($check_img['tmp_name'][0])){
			for ($i=0; $i < count($images_name) ; $i++) { 
				$input_file = array(
					'record_id' => $record_id , 
					'file_name' => $images_name[$i]
				);
				$resultfile = $this->Form_cook_model->insert_filename($input_file);
			}
		}

		if($result==1){
			$this->session->set_flashdata('insert_record', 'done');
		}else{
			$this->session->set_flashdata('insert_record', 'fail');
		}
		redirect('form_cook/record_list/'.$this->input->post('research_id'));
	}
public function record_delete()
	{
		$research_id = $this->uri->segment(3);
		$record_id = $this->uri->segment(4);
		$this->Form_record_model->record_delete($record_id);
		redirect('form_record/record_list/'.$research_id);
	}
	public function img_delete()
	{
		$file_id = $this->uri->segment(5);
		$research_id = $this->uri->segment(3);
		$record_id = $this->uri->segment(4);
		$this->Form_cook_model->delete_attachment($file_id);
		redirect('form_cook/record_edit/'.$research_id.'/'.$record_id);
	}
	public function do_upload($images)
	{
		$config['upload_path'] = './assets/files/cook/';
		$config['allowed_types'] = 'gif|jpg|png|doc|docx|xls|xlsx|ppt|pptx|spss|pdf';
		$config['max_size']	= '100000';
		
		$config['overwrite'] = true;
		
		$this->load->library('upload', $config);

		$files = $_FILES;
		$userfile = $_FILES['userfile'];

	    $cpt = count($_FILES['userfile']['name']);
	    for($i=0; $i<$cpt; $i++)
	    {  
	    	$imagename = $userfile['name'][$i];
			$explode_name = explode(".", $imagename);
			$file_type = end($explode_name);
			$date = DateTime::createFromFormat('U.u', microtime(true));
			$date_filename = date_format($date, 'YmdHis_u');
			$imageupload_name = $date_filename.'.'.$file_type ;

			$images_name[] = $imageupload_name;
			

	    	$_FILES['userfile']['name']= $files['userfile']['name'][$i];
	        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
	        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
	        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
	        $_FILES['userfile']['size']= $files['userfile']['size'][$i]; 

	        $config['file_name'] = $imageupload_name;
	        $this->upload->initialize($config);
	        

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        // print_r($error);
                        $this->session->set_flashdata('imagecheck', 'image_error');
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                    $this->session->set_flashdata('imagecheck', 'done');
                    // print_r($data);
                }
        }

        return $images_name ;
	}
}
