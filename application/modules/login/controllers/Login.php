<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

	public function index()
	{
		$this->load->view('login');
	}
	public function check_index()
	{
		$this->session->unset_userdata('user_data');
		$this->load->model('Login_model');

		$input = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		);

		$password_verify = $this->Login_model->check_login($input);

		if(!empty($password_verify)){
			$data_temporary = $this->Login_model->get_profile($input);

			$this->session->set_userdata('user_data',$data_temporary[0]);
			$user_data = $this->session->userdata('user_data');

			if($user_data['user_role']==1){
				redirect('dashboard','refresh');
			}else{
				redirect('user_index','refresh');
			}	
		} else {
			redirect('login/index','refresh');
		}


		// $input_password = $this->input->post('password');
		// $options = [
		// 	'cost' => 11,
		// 	'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		// 		];
		// echo $password = password_hash($input_password, PASSWORD_BCRYPT, $options);
		// exit();

		// $password_verify = $this->Login_model->get_user($input);
		// if(!empty($password_verify)){
		// 	$hash = $password_verify[0]['password'] ;
		// }else{
		// 	$hash = "";
		// }

		// if (password_verify($input['password'], $hash)) {
		//     $data_temporary = $this->Login_model->get_profile($input);
		//     if(!empty($data_temporary)){
		// 		$user_data_temporary = $data_temporary[0];

		// 		if(!empty($user_data_temporary)){
		// 			if($user_data_temporary['user_status']==0){
		// 				// redirect('login/index','refresh');
		// 			}else{
		// 				$this->session->set_userdata('user_data',$user_data_temporary);
		// 				$user_data = $this->session->userdata('user_data');

		// 				if($user_data['user_role']==1){
		// 					redirect('dashboard','refresh');
		// 				}else{
		// 					redirect('user_index','refresh');
		// 				}
						
		// 			}	
		// 		} else {
		// 			redirect('login/index','refresh');
		// 		}

		// 	}else{
		// 		redirect('login/index','refresh');
		// 	}
		// } else {
		//     redirect('login/index','refresh');
		// }

		
	}
	public function logout()
	{
		session_destroy();
		redirect('login/index','refresh');
	}
}

