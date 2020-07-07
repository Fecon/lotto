<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends MX_Controller {

	public function __construct()
    {
    	parent::__construct();
    	$this->load->model('Calendar_model');
    }
	
	public function record_insert()
	{
		$user_data = $this->session->userdata('user_data');

		$list_data = array(
			'research_id' => 
			'title' => $this->input->post('title'),
			'subtitle' => $this->input->post('subtitle'),
			'description' => htmlentities($this->input->post("description"), ENT_QUOTES, "UTF-8"),
			'research_id' => $this->input->post('research_id'),
			'user_id' => $user_data['user_id'],
		);

		$record_id = $this->Calendar_model->insert_data($list_data);
	}
	public function record_update()
	{
		$user_data = $this->session->userdata('user_data');

		$images_name = $this->do_upload($_FILES['userfile']);
		$record_id = $this->input->post('id');

		$list_data = array(
			'id' => $record_id,
			'title' => $this->input->post('title'),
			'subtitle' => $this->input->post('subtitle'),
			'description' => htmlentities($this->input->post("description"), ENT_QUOTES, "UTF-8"),
			'research_id' => $this->input->post('research_id'),
			'user_id' => $user_data['user_id'],
		);

		$this->Calendar_model->update_data($list_data);

	}
	public function record_delete()
	{
		$research_id = $this->uri->segment(3);
		$record_id = $this->uri->segment(4);
		$this->Form_record_model->record_delete($record_id);
		redirect('form_record/record_list/'.$research_id);
	}
	public function form()
	{
		
	}
	
}
