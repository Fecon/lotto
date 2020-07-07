<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Research extends MX_Controller {

	public function __construct()
    {
      	parent::__construct();
       	$this->load->model('Research_model');
    }
	public function index()
	{
		$data['user_data'] = $this->session->userdata('user_data');
		$data['get_research'] = $this->Research_model->get_research_geo();
		// echo "<pre>";
		// print_r($this->session->userdata());
		// exit();
		$data['content'] = 'research';
		$this->load->view('header/admin_header',$data);
	}
	public function form_index()
	{
		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['get_research'] = $this->Research_model->get_research_detail($research_id);

		$data['pedigree_selected'] = $this->Research_model->get_research_pedigree($research_id);
		$data['water_lv_time'] = $this->Research_model->get_water_lv_time($research_id);
		$data['leaves_time'] = $this->Research_model->get_leaves_time($research_id);
		$pedigree_selected = $data['pedigree_selected'] ;
		

		// $this->session->set_userdata('check_entry', 'fail');
		for ($repeat=1; $repeat <= $data['get_research']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Research_model->get_pedigree_plot_repeat($research_id,$repeat);
		}

		if(isset($data['pedigree_plot'][0][0])){
			if (empty($data['pedigree_plot'][0][0]['entry'])) {
				$this->session->set_userdata('check_entry', 'fail');
			}else {
				$this->session->unset_userdata('check_entry');
			}

		}else{
			$this->session->set_userdata('check_entry', 'fail');
		}
			

		$data['user_data'] = $this->session->userdata();
		$data['content'] = 'form_index';
		$this->load->view('header/admin_header',$data);
		
	}
	public function research_create()
	{
		$data['all_session'] = $this->session->userdata();


		if(isset($data['all_session']['pedigree_selected'])){
			for ($i=0; $i < count($data['all_session']['pedigree_selected']); $i++) { 

				$pedigree = $this->Research_model->get_pedigree_detail($data['all_session']['pedigree_selected'][$i]);
				$data['get_pedigree_selected'][] = $pedigree[0];
			}
		}
		$data['list_user'] = $this->Research_model->list_user();

		// echo "<pre>";
		// print_r($data['all_session']);
		// exit();
		
		if ($data['all_session']['user_data']['user_role']==1 || $data['all_session']['user_data']['user_role']== 2) {
			$data['department_all'] = $this->Research_model->get_department_geo();
		}else{
			$dep_no = $data['all_session']['user_data']['dep_no'];
			$dep_zone = $data['all_session']['user_data']['dep_zone'];
			$data['department_all'] = $this->Research_model->get_department_user($dep_no,$dep_zone);
		}
		

		$data['get_pedigree'] = $this->Research_model->get_pedigree_all();
		$data['type_of_research'] = $this->Research_model->get_type_of_research();
		$data['type_of_ecology'] = $this->Research_model->get_type_of_ecology();
		$data['content'] = 'research_create';
		$this->load->view('header/admin_header',$data);
	}
	public function research_edit()
	{
		$data['all_session'] = $this->session->userdata();

		if(isset($data['all_session']['pedigree_selected'])){
			for ($i=0; $i < count($data['all_session']['pedigree_selected']); $i++) { 

				$pedigree = $this->Research_model->get_pedigree_detail($data['all_session']['pedigree_selected'][$i]);
				$data['get_pedigree_selected'][] = $pedigree[0];
			}
		}

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['research_detail'] = $this->Research_model->get_research_detail($research_id);
		$data['pedigree_selected'] = $this->Research_model->get_research_pedigree($research_id);
		$data['list_user'] = $this->Research_model->list_user();
		$data['department_all'] = $this->Research_model->get_department_geo();
		$data['get_pedigree'] = $this->Research_model->get_pedigree_all();
		$data['type_of_research'] = $this->Research_model->get_type_of_research();
		$data['type_of_ecology'] = $this->Research_model->get_type_of_ecology();
		$data['user_seleted'] = $this->Research_model->get_user_seleted($research_id);

		// print_r($data['user_seleted']);
		// exit();

		$data['content'] = 'research_edit';
		$this->load->view('header/admin_header',$data);
	}
	
	public function random_plot()
	{
		$array_research_id = $this->session->userdata('array_research_id');
		// print_r($array_research_id);
			for ($i=0; $i < count($array_research_id) ; $i++) { 
			$research_id = $array_research_id[$i];
			$this->rand_entry($research_id);
			$data['research_id'] = $research_id ;
			$data['research_detail'] = $this->Research_model->get_research_detail($research_id);
			$data['pedigree_selected'] = $this->Research_model->get_research_pedigree($research_id);

			$pedigree_selected = $data['pedigree_selected'] ;
			$this->Research_model->delete_pedigree_plot($research_id);

			if(isset($data['pedigree_selected'])){
				for($repeat_num = 1 ; $repeat_num <= $data['research_detail']['repeat_amount']; $repeat_num++) {
					$entry = $this->gen_rand( 1 , count($pedigree_selected) , count($pedigree_selected) ) ;
					$block = 0 ; 
					for($i=0 ;  $i<count($pedigree_selected) ; $i++){ 
						if($data['research_detail']['block_amount']!=0){

							$block_amount = $data['research_detail']['block_amount'] ;
						}else{
							$block_amount = 0 ;
						}

						if($block_amount!=0){
							if($i % $block_amount ==0){
								$block++ ;
							}
						}

						$plot_number = $this->set_plot_number($data['research_detail']['pedigree_amount'],$repeat_num,$i);

						$input =  array(
							'rp_id' => $pedigree_selected[$i]['rp_id'],
							'research_id' => $research_id, 
							'entry' => $entry[$i], 
							'plot_no' => $plot_number,
							'block' => $block, 
							'repeat' => $repeat_num,
						);

						$this->Research_model->insert_pedigree_plot($input);	
					}
				}
			}
			for ($repeat=1; $repeat <= $data['research_detail']['repeat_amount']; $repeat++) { 
				$data['pedigree_plot'][] = $this->Research_model->get_pedigree_plot_repeat($research_id,$repeat);
			}
		}
		
		// echo "<pre>";
		// print_r($data['pedigree_plot']);
		// exit();
		$data['content'] = 'research_plot_random';
		$this->load->view('header/admin_header',$data);
	}

	public function rand_entry($research_id)
	{
	    $pedigree_selected = $this->Research_model->get_research_pedigree($research_id);
		$keepvalue = $this->gen_rand( 1 , count($pedigree_selected) , count($pedigree_selected) ) ;

		for ($i=0; $i < count($pedigree_selected) ; $i++) { 
			$input = array(
				'rp_id' => $pedigree_selected[$i]['rp_id'],
				'entry' => $keepvalue[$i] ,
			);
			$this->Research_model->update_research_pedigree($input);
		}

	}

	public function gen_rand( $from , $to , $amount )
	{
	    $keepvalue = array();
	    for($i=0;$i<$amount;$i++) {
	        
	        $value = rand($from , $to);      
	        if ( in_array( $value , $keepvalue) ) {
	            $i = count($keepvalue)-1;    
	            } else {
	                $keepvalue[] = $value;    
	            }
	        }
	    return $keepvalue;
	}

	public function select_plot()
	{
		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['research_detail'] = $this->Research_model->get_research_detail($research_id);
		$data['pedigree_selected'] = $this->Research_model->get_research_pedigree($research_id);

		$pedigree_selected = $data['pedigree_selected'] ;
		$this->Research_model->delete_pedigree_plot($research_id);

		$check_data = $this->Research_model->check_data($research_id);
		if($check_data!=0){
			redirect('research/edit_entry/'.$research_id);
		}else{
			if(isset($data['pedigree_selected'])){

				for($repeat_num = 1 ; $repeat_num <= $data['research_detail']['repeat_amount']; $repeat_num++) {
					
					$block = 0 ; 
					for($i=0 ;  $i<count($pedigree_selected) ; $i++){ 
						if($data['research_detail']['block_amount']!=0){

							$block_amount = $data['research_detail']['block_amount'] ;
						}else{
							$block_amount = 0 ;
						}

						if($block_amount!=0){
							if($i % $block_amount ==0){
								$block++ ;
							}
						}
						
						$plot_number = $this->set_plot_number($data['research_detail']['pedigree_amount'],$repeat_num,$i);

						$input =  array(
							'rp_id' => $pedigree_selected[$i]['rp_id'],
							'research_id' => $research_id, 
							'entry' => NULL, 
							'plot_no' => $plot_number,
							'block' => $block, 
							'repeat' => $repeat_num,
						);

						$this->Research_model->insert_pedigree_plot($input);	
					}
				}
			}
		}

		

		for ($repeat=1; $repeat <= $data['research_detail']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Research_model->get_pedigree_plot_repeat($research_id,$repeat);
		}
		
		
		// echo "<pre>";
		// print_r($data['pedigree_plot']);
		// exit();

		$data['content'] = 'research_plot_select';
		$this->load->view('header/admin_header',$data);
	}

	public function edit_entry()
	{
		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['research_detail'] = $this->Research_model->get_research_detail($research_id);
		$data['pedigree_selected'] = $this->Research_model->get_research_pedigree($research_id);

		$pedigree_selected = $data['pedigree_selected'] ;

		for ($repeat=1; $repeat <= $data['research_detail']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Research_model->get_pedigree_plot_repeat($research_id,$repeat);
		}
		
		echo "<pre>";
		print_r($data);
		exit();

		$data['content'] = 'research_plot_select';
		$this->load->view('header/admin_header',$data);
	}

	public function set_entry()
	{
		$research_id = $this->uri->segment(3);	

		$data['research_id'] = $research_id ;
		$data['research_detail'] = $this->Research_model->get_research_detail($research_id);

		if(empty($array_research_id)){
			$data['pedigree_selected'][] = $this->Research_model->get_research_pedigree($research_id);
			$data['array_research_id'] =  array($research_id);
			
		}else{
			foreach ($array_research_id as $key => $value) {
				$data['pedigree_selected'][] = $this->Research_model->get_research_pedigree($value);
				$data['array_research_id'] = $array_research_id ; 
			}
		}
		$data['content'] = 'set_entry';
		$this->load->view('header/admin_header',$data);
	}

	public function set_entry_once()
	{
		$array_research_id = $this->session->userdata('array_research_id');
		// print_r($array_research_id);
		// exit();

		for ($i=0; $i < count($array_research_id) ; $i++) { 
			$research_id = $array_research_id[$i];	
			
			$data['research_id'] = $research_id ;
			$data['research_detail'] = $this->Research_model->get_research_detail($research_id);

			if(empty($array_research_id)){
				$data['pedigree_selected'][] = $this->Research_model->get_research_pedigree($research_id);
				$data['array_research_id'] =  array($research_id);
				
			}else{
				foreach ($array_research_id as $key => $value) {
					$data['pedigree_selected'][] = $this->Research_model->get_research_pedigree($value);
					$data['array_research_id'] = $array_research_id ; 
				}
			}
		}
		// echo "<pre>";
		// print_r($data['pedigree_selected']);
		// exit();
		$data['content'] = 'set_entry_once';
		$this->load->view('header/admin_header',$data);
	}

	public function user_research()
	{
		$data['user_data'] = $this->session->userdata('user_data');
		
		$data['content'] = 'research';
		$data['get_research'] = $this->Research_model->get_research_geo();
		$this->load->view('header/admin_header',$data);
	}
	public function form_date()
	{
		$data['content'] = 'form_template/form-template';
		$data['header_title'] = 'ข้อมูลวันทดลอง';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_date';

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;

		$date_type = $this->Research_model->count_date_type($research_id);
		for ($i=0; $i < count($date_type) ; $i++) { 
			$data['type'][$date_type[$i]['id']] = $this->Research_model->get_research_date($research_id,$date_type[$i]['id']);
		}
		
		$this->load->view('header/admin_header',$data);
	}
	public function form_date_edit()
	{
		$data['content'] = 'form_template/form-template';
		$data['header_title'] = 'ข้อมูลวันทดลอง';
		$data['form_header'] = 'form_template/form-header';
		$data['form_submit'] = 'form_template/form-submit';
		$data['form_comment'] = 'form_template/form-comment';
		$data['form_content'] = 'form_date_edit';

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;

		$date_type = $this->Research_model->count_date_type($research_id);
		for ($i=0; $i < count($date_type) ; $i++) { 
			$data['type'][$date_type[$i]['id']] = $this->Research_model->get_research_date($research_id,$date_type[$i]['id']);
		}

		
		// echo "<pre>";
		// print_r($data['type']);
		// exit(); 

		$this->load->view('header/admin_header',$data);
	}

	public function view_entry()
	{
		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['research_detail'] = $this->Research_model->get_research_detail($research_id);
		$data['pedigree_selected'] = $this->Research_model->get_research_pedigree($research_id);

		$pedigree_selected = $data['pedigree_selected'] ;

		for ($repeat=1; $repeat <= $data['research_detail']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Research_model->get_pedigree_plot_repeat($research_id,$repeat);
		}
		
		// echo "<pre>";
		// print_r($data['pedigree_plot']);
		// exit();

		$data['content'] = 'research_view_plot';
		$this->load->view('header/admin_header',$data);
	}

	public function view_entry_create()
	{

		$research = $this->session->userdata('array_research_id');
		// echo '<pre>';
		// print_r($research);
		// exit();

		for ($j=0; $j < count($research) ; $j++) { 
			$research_id = $research[$j];
			$data['research_id'] = $research_id ;
			$data['research_detail'] = $this->Research_model->get_research_detail($research_id);
			$data['pedigree_selected'] = $this->Research_model->get_research_pedigree($research_id);
			if($data['research_detail']['entry_type']==1){
				redirect('research/random_plot/'.$research_id);
			}

			$pedigree_selected = $data['pedigree_selected'] ;
			$this->Research_model->delete_pedigree_plot($research_id);

			$check_data = $this->Research_model->check_data($research_id);
			if($check_data!=0){
				redirect('research/edit_entry/'.$research_id);
			}else{
				if(isset($data['pedigree_selected'])){

			// print_r($pedigree_selected);


					for($repeat_num = 1 ; $repeat_num <= $data['research_detail']['repeat_amount']; $repeat_num++) {
						// print_r($data['research_detail']);
						$block = 0 ; 
						for($i=0 ;  $i<count($pedigree_selected) ; $i++){ 
							if($data['research_detail']['block_amount']!=0){
								$block_amount = $data['research_detail']['block_amount'] ;
							}else{
								$block_amount = 0 ;
							}

							if($block_amount!=0){
								if(($i % $block_amount) ==0){
									$block++ ;
								}
							}

							$plot_number = $this->set_plot_number($data['research_detail']['pedigree_amount'],$repeat_num,$i);
							
							$input =  array(
								'rp_id' => $pedigree_selected[$i]['rp_id'],
								'research_id' => $research_id, 
								'entry' => NULL, 
								'plot_no' => $plot_number,
								'block' => $block, 
								'repeat' => $repeat_num,
							);
							// print_r($input);
							$this->Research_model->insert_pedigree_plot($input);	
						}
					}
				}
			}

				for ($repeat=1; $repeat <= $data['research_detail']['repeat_amount']; $repeat++) { 
					$data['pedigree_plot'][$j][] = $this->Research_model->get_pedigree_plot_repeat($research_id,$repeat);
				}
		}
		
		
		
		// echo "<pre>";
		// print_r($data['pedigree_plot']);
		// exit();
		if($data['research_detail']['entry_type']==2){
			$data['content'] = 'research_plot_select';
		}else{
			$data['content'] = 'research_plot_select_multi_department';
		}
		
		$this->load->view('header/admin_header',$data);
		$this->session->unset_userdata('research_temporary');
	}

	public function list_pedigree()
	{
		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['research_detail'] = $this->Research_model->get_research_detail($research_id);
		$data['pedigree_selected'] = $this->Research_model->get_research_pedigree($research_id);
		
		$data['content'] = 'list_pedigree';
		$this->load->view('header/admin_header',$data);
	}
	public function view_entry_excel()
	{
		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['research_detail'] = $this->Research_model->get_research_detail($research_id);
		$data['pedigree_selected'] = $this->Research_model->get_research_pedigree($research_id);

		$pedigree_selected = $data['pedigree_selected'] ;

		for ($repeat=1; $repeat <= $data['research_detail']['repeat_amount']; $repeat++) { 
			$data['pedigree_plot'][] = $this->Research_model->get_pedigree_plot_repeat($research_id,$repeat);
		}

		$this->load->view('view_plot_excel',$data);
	}	
	public function seed_test_list()
	{
		$data['user_data'] = $this->session->userdata('user_data');
		$data['get_research'] = $this->Research_model->get_research_geo();
		// echo "<pre>";
		// print_r($this->session->userdata());
		// exit();
		$data['content'] = 'seed_test';
		$this->load->view('header/admin_header',$data);
	}
	public function seed_test_index()
	{
		$data['user_data'] = $this->session->userdata('user_data');

		$research_id = $this->uri->segment(3);
		$data['research_id'] = $research_id ;
		$data['get_research'] = $this->Research_model->get_research_detail($research_id); 
		$data['pedigree_selected'] = $this->Research_model->get_research_pedigree($research_id);
		$data['resistance_bug'] = $this->Research_model->get_resistance_bug($research_id);
		// echo "<pre>";
		// print_r($this->session->userdata());
		// exit();
		$data['content'] = 'seed_test_index';
		$this->load->view('header/admin_header',$data);
	}
	public function set_plot_number($total,$repeat_num,$number)
	{
		if($total<100){
			$plot_number = $repeat_num.sprintf('%02d',($number+1));
		}elseif($total>=100&&$total<1000){
			$plot_number = $repeat_num.sprintf('%03d',($number+1));
		}else{
			$plot_number = $repeat_num.sprintf('%04d',($number+1));
		}
		return $plot_number;
		
	}
	public function select_entry_number($total,$repeat_num,$number)
	{
		if($total<100){
			$plot_number = $repeat_num.sprintf('%02d',($number+1));
		}elseif($total>=100&&$total<1000){
			$plot_number = $repeat_num.sprintf('%03d',($number+1));
		}else{
			$plot_number = $repeat_num.sprintf('%04d',($number+1));
		}
		return $plot_number;
		
	}

}
