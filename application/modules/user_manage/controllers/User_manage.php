<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_manage extends MX_Controller {
	public function __construct()
    {
    	parent::__construct();
    	$this->load->model('User_model');
    }
	public function index()
	{
		$data['user_data'] = $this->session->userdata('user_data');

		if($data['user_data']['user_role']!=1){
			redirect('user_manage/user_edit/'.$data['user_data']['user_id']);
		}

		$data['content'] = 'user';

		$data['list_admin'] = $this->User_model->list_user();

		$this->load->view('header/admin_header',$data);
	}
	public function user_edit()
	{
		$data['user_data'] = $this->session->userdata('user_data');
		$user_id = $this->uri->segment(3);
		if(empty($user_id)){
			redirect('user_manage');
		}
		// print_r($data['user_data']);
		// exit();
		if($data['user_data']['user_role']!=1){
			if($user_id!=$data['user_data']['user_id']){
				redirect('user_manage');
			}
		}

		$data['department_all'] = $this->User_model->get_research_geo();
		$data['get_profile'] = $this->User_model->get_profile($user_id);
		

		$data['content'] = 'profile';
		$this->load->view('header/admin_header',$data);
	}

	public function list_user()
	{
		$list_user = $this->User_model->list_user();
		// echo "<Pre>";
		// print_r($list_user);
		// exit();
		## Return Value ##
		header('Content-Type: text/javascript; charset=utf8');
		$json = '('.json_encode($list_user).')'; 
		print_r($_GET['callback'].$json);
	}
	public function user_insert()
	{
		$userfile = $_FILES['userfile'];
		$explode_type = explode("/", $userfile['type']);
		$type = reset($explode_type);

		$username = $this->input->post('username');
		$checkRepeat = $this->User_model->checkRepeat('username',$username);
		if($checkRepeat!=0){
			$this->session->set_flashdata('insert_user', 'repeat');
			redirect('user_manage');
		}

		if(!empty($userfile) && $type == 'image'){
			$imagename = $userfile['name'];
			$explode_name = explode(".", $imagename);
			$file_type = end($explode_name);
			$date = DateTime::createFromFormat('U.u', microtime(true));
			$date_filename = date_format($date, 'YmdHis_u');
			$imageupload_name = $date_filename.'.'.$file_type ;
			$this->do_upload($imageupload_name);
		}else{
			$imageupload_name = 'user.png';
		}
		
		$input_password = $this->input->post('password');

		$password = $this->password_encryption($input_password);
		$list_data = array(
			'username' => $this->input->post('username'),
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'mobile' => $this->input->post('mobile'),
			'user_role' => $this->input->post('user_role'),
			'dep_no' => $this->input->post('dep_no'),
			'user_role' => $this->input->post('user_role'),
			'password' => $password,
			'user_image' => $imageupload_name,
		);

		$result = $this->User_model->user_insert($list_data);	

		if($result==1){
			$this->session->set_flashdata('insert_user', 'done');
		}else{
			$this->session->set_flashdata('insert_user', 'fail');
		}
		redirect('user_manage');
	}
	public function user_update()
	{
		$userfile = $_FILES['userfile'];
		$explode_type = explode("/", $userfile['type']);
		$type = reset($explode_type);
		
		if(!empty($userfile) && $type == 'image'){
			$imagename = $userfile['name'];
			$explode_name = explode(".", $imagename);
			$file_type = end($explode_name);
			$date = DateTime::createFromFormat('U.u', microtime(true));
			$date_filename = date_format($date, 'YmdHis_u');
			$imageupload_name = $date_filename.'.'.$file_type ;
			$this->do_upload($imageupload_name);
		}elseif(empty($type)){
			// do nothing //
		}else{
			$this->session->set_flashdata('imagecheck', 'image_error');
		}
		
		$input_password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');
		$user_role = $this->input->post('user_role');
		if($input_password != $confirm_password){
			$this->session->set_flashdata('update_user', 'password_incorrect');
			redirect('user_manage/user_edit/'.$this->input->post('user_id'));	
		}
				$list_data = array(
					'user_id' => $this->input->post('user_id'),
					'username' => $this->input->post('username'),
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'mobile' => $this->input->post('mobile'),
					'user_role' => $this->input->post('user_role'),
					'dep_no' => $this->input->post('dep_no'),
					'user_role' => $this->input->post('user_role'),
					'user_image' => @$imageupload_name,
				);
				if(!empty($input_password)){
					$password = $this->password_encryption($input_password);
					$password_array = array(
						'password' => $password,
					);
					$list_data = array_merge($list_data,$password_array);

				}
				// for user //
				if(empty($user_role)){
					unset($list_data['user_role']);
					unset($list_data['dep_no']);
				}
				// end for user //

				if(!isset($imageupload_name)){
					unset($list_data['user_image']);
				}

			$result = $this->User_model->user_update($list_data);	

		if($result==1){
			$this->session->set_flashdata('update_user', 'done');
		}else{
			$this->session->set_flashdata('update_user', 'fail');
		}

		redirect('user_manage/user_edit/'.$list_data['user_id']);	
	}
	public function user_delete()
	{
			$data = $_GET['models'];
			$arr = json_decode($data);
			foreach($arr as $name)
			{
				$list_data = array(
					'id' => $name->id,
					'status' => 0 ,
			);
				$return = $this->User_model->user_update($list_data);	
			}
			## Return Value ##
			header('Content-Type: text/javascript; charset=utf8');
			$json = '('.json_encode($list_data).')'; 
			print_r($_GET['callback'].$json);
	}
	public function do_upload($imageupload_name)
	{
		$config['upload_path'] = './assets/files/users/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2000';
		$config['file_name'] = $imageupload_name;
		$config['overwrite'] = true;
		$this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('imagecheck', 'image_error');
                }
                else
                {
                	$user_data = $this->session->userdata('user_data');
                	$user_data['user_image'] = $imageupload_name ;
                	$this->session->set_userdata('user_data', $user_data);
                    $data = array('upload_data' => $this->upload->data());
                }
	}
	public function password_encryption($input_password)
	{
		$options = [
		    'cost' => 11,
		    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		];
		$password = password_hash($input_password, PASSWORD_BCRYPT, $options);
		return $password ;

	}

}

