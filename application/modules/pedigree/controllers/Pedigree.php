<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedigree extends MX_Controller {
	public function __construct()
    {
      	parent::__construct();
       	$this->load->model('Pedigree_model');
    }
	public function index()
	{
		$pedigree_id = $this->uri->segment(3);
		$pedigree_research = $this->uri->segment(4);

		if(!empty($pedigree_id)&&$pedigree_research!='research'){
			$pedigree_detail = $this->Pedigree_model->get_pedigree_detail($pedigree_id);
			if(!empty($pedigree_detail)){
				$data['pedigree_detail'] = $pedigree_detail ;
			}
		}

		if(!empty($pedigree_id)&&$pedigree_research=='research'){
			$data['pedigree_research'] = $this->Pedigree_model->get_pedigree_research($pedigree_id);
		}

		$data['type_of_research'] = $this->Pedigree_model->get_type_of_research();

		$search = $this->input->post('search');

		if(!empty($search)){
			$type = $this->input->post('search_type');
			$input_data = $this->input->post();
			if($type==1){
				$data['get_pedigree'] = $this->basic_search($input_data);
			}elseif($type==2){
				$data['get_pedigree'] = $this->research_search($input_data);
			}elseif($type==3){
				$data['get_pedigree'] = $this->test_search($input_data);
			}else{
				$data['get_pedigree'] = $this->Pedigree_model->get_pedigree_all();
			}
			
		}else{
			$data['get_pedigree'] = $this->Pedigree_model->get_pedigree_all();
		}

		$data['get_department'] = $this->Pedigree_model->get_department_all();
		$data['content'] = 'pedigree_list';
		$this->load->view('header/admin_header',$data);
	}
	public function add_pedigree()
	{
		$data['content'] = 'pedigree_add';
		$this->load->view('header/admin_header',$data);
	}
	public function search()
	{
		$pedigree_id = $this->uri->segment(3);
		$pedigree_research = $this->uri->segment(4);

		if(!empty($pedigree_id)&&$pedigree_research!='research'){
			$pedigree_detail = $this->Pedigree_model->get_pedigree_detail($pedigree_id);
			if(!empty($pedigree_detail)){
				$data['pedigree_detail'] = $pedigree_detail ;
			}
		}

		if(!empty($pedigree_id)&&$pedigree_research=='research'){
			$data['pedigree_research'] = $this->Pedigree_model->get_pedigree_research($pedigree_id);
		}

		$data['type_of_research'] = $this->Pedigree_model->get_type_of_research();

		$search = $this->input->post('search');

		if(!empty($search)){
			$type = $this->input->post('search_type');
			$input_data = $this->input->post();
			if($type==1){
				$data['get_pedigree'] = $this->basic_search($input_data);
			}elseif($type==2){
				$data['get_pedigree'] = $this->research_search($input_data);
			}elseif($type==3){
				$data['get_pedigree'] = $this->test_search($input_data);
			}else{
				$data['get_pedigree'] = $this->Pedigree_model->get_pedigree_all();
			}
			
		}else{
			$data['get_pedigree'] = $this->Pedigree_model->get_pedigree_all();
		}

		$data['get_department'] = $this->Pedigree_model->get_department_all();
		$data['content'] = 'pedigree_search';
		$this->load->view('header/admin_header',$data);
	}
	public function insert_pedigree()
	{
		$input = array(
			'source' => $this->input->post('source'),
			'designation' => $this->input->post('designation'),
			'cross_name' => $this->input->post('cross_name'),
			'seed_source' => $this->input->post('seed_source'),
			'traits' => $this->input->post('traits')
		);
		// echo "<Pre>";
		// print_r($input);
		// exit();
		$this->Pedigree_model->insert_pedigree($input);
		redirect('pedigree');
	}
	public function update_pedigree()
	{
		$input = array(
			'pedigree_id' => $this->input->post('pedigree_id'),
			'source' => $this->input->post('source'),
			'designation' => $this->input->post('designation'),
			'cross_name' => $this->input->post('cross_name'),
			'seed_source' => $this->input->post('seed_source'),
			'traits' => $this->input->post('traits')
		);
		// echo "<Pre>";
		// print_r($input);
		// exit();
		$this->Pedigree_model->update_pedigree($input);
		redirect('pedigree');
	}
	public function select_test_type($type)
	{
		$res = array();
		if($type==1){
			$res = $this->Pedigree_model->get_resistance_bug();
		}elseif($type==2){
			$res = array(
				array('id' => '','name' => 'เลือก...' ),
				array('id' => '1','name' => 'คุณภาพเมล็ดทางกายภาพ' ),
				array('id' => '2','name' => 'ตรวจสอบความบริสุทธุิ์ของเมล็ดพันธุ์' ),
				array('id' => '3','name' => 'ตรวจสอบความงอก' ),
				array('id' => '4','name' => 'คุณภาพการสี' ),
				array('id' => '5','name' => 'ผลการวิเคราะห์ความงอก' )
			);
		}elseif($type==3){
			$res = array(
				array('id' => '1','name' => 'Amylose(%)' ),
				array('id' => '2','name' => 'Alkali 1.4%' ),
				array('id' => '3','name' => 'Alkali 1.7%' ),
				array('id' => '4','name' => 'Aroma' ),
				array('id' => '5','name' => 'Chaliness' )
			);
		}
		
        echo json_encode($res);
	}
	public function select_column($maintype,$type)
	{
		$res = array();

		if($maintype==2){
			if($type==1){
				$res = array(
					array('id' => '1','name' => 'สีเปลือกข้าว (Hull color)' ),
					array('id' => '2','name' => 'ข้าวปน (Off type)' ),
					array('id' => '3','name' => 'Width (mm.)' ),
					array('id' => '4','name' => 'Length (mm.)' ),
					array('id' => '5','name' => 'Shape (mm.)' )
				);
			}elseif($type==2){
				$res = array(
					array('id' => '1','name' => 'ค่าเฉลี่ยทั้งหมด' ),
					array('id' => '2','name' => 'เมล็ดพืชอื่น' ),
					array('id' => '3','name' => 'สิ่งเจือปน' ),
					array('id' => '3','name' => 'เมล็ดพันธุ์บริสุทธิ์' ),
				);
			}elseif($type==3){
				$res = array(
					array('id' => '1','name' => 'ค่าเฉลี่ย (%)' )
				);
			}elseif($type==4){
				$res = array(
					array('id' => '1','name' => '% ความชื้น' ),
					array('id' => '2','name' => '% ข้าวกล้อง' ),
					array('id' => '3','name' => '% ข้าวสาร' ),
					array('id' => '4','name' => '% ข้าวเต็มเมล็ดและต้นข้าว' ),
					array('id' => '5','name' => '% แกลบ' ),
					array('id' => '6','name' => '% รำ' )
				);
			}elseif($type==5){
				$res = array(
					array('id' => '1','name' => 'ต้นอ่อนปกติ' ),
					array('id' => '2','name' => 'ต้นอ่อนผิดปกติ' ),
					array('id' => '3','name' => 'เมล็ดแข็ง / พักตัว' ),
					array('id' => '4','name' => 'เมล็ดเน่า / ตาย' )
				);
			}
		}else{
			$res = array();
		}

        echo json_encode($res);
	}
	public function basic_search($input_data)
	{
		$result = $this->Pedigree_model->basic_search($input_data['search']);
		return $result ;
	}
	public function research_search($input_data)
	{
		if($input_data['sign']==1){
			$input_data['sign'] = '>=';
		}elseif($input_data['sign']==2){
			$input_data['sign'] = '<=';
		}else{
			$input_data['sign'] = '';
		}

		if($input_data['form_research']==1){
			$table = array(
				'table' => 'form_water_level', 
				'column' => 'value', 
			);
		}elseif($input_data['form_research']==2){
			$table = array(
				'table' => 'form_lost_grove', 
				'column' => 'balance', 
			);
		}elseif($input_data['form_research']==3){
			$table = array(
				'table' => 'form_disease', 
				'column' => 'value_disease', 
				'column2' => 'value_insect', 
				'column3' => 'value_animal', 
			);
		}elseif($input_data['form_research']==4){
			$table = array(
				'table' => 'form_leaves', 
				'column' => 'dead_leaves', 
				'column2' => 'roll_leaves', 
			);
		}elseif($input_data['form_research']==5){
			$table = array(
				'table' => 'form_bloom', 
				'column' => 'day', 
			);
		}elseif($input_data['form_research']==6){
			$table = array(
				'table' => 'form_high', 
				'column' => 'average', 
			);
		}elseif($input_data['form_research']==7){
			$table = array(
				'table' => 'form_grove', 
				'column' => 'average', 
			);
		}elseif($input_data['form_research']==8){
			$table = array(
				'table' => 'form_tree_grove', 
				'column' => 'average', 
			);
		}elseif($input_data['form_research']==9){
			$table = array(
				'table' => 'form_no_grain', 
				'column' => 'average', 
			);
		}elseif($input_data['form_research']==10){
			$table = array(
				'table' => 'form_awn_grove', 
				'column' => 'average', 
			);
		}elseif($input_data['form_research']==11){
			$table = array(
				'table' => 'form_seed_grove', 
				'column' => 'average', 
			);
		}elseif($input_data['form_research']==12){
			$table = array(
				'table' => 'form_seed_good', 
				'column' => 'average', 
			);
		}elseif($input_data['form_research']==13){
			$table = array(
				'table' => 'form_product', 
				'column' => 'product_kg_rai', 
			);
			
		}

		$result = $this->Pedigree_model->research_search($table,$input_data);

		return $result ;
	}
	public function test_search($input_data)
	{
		if($input_data['sign']==1){
			$input_data['sign'] = '>=';
		}elseif($input_data['sign']==2){
			$input_data['sign'] = '<=';
		}else{
			$input_data['sign'] = '';
		}

		if($input_data['test_type']==1){
			$table = array(
				'table' => 'form_resistance_bug', 
				'column' => 'value_disease', 
				'column2' => 'resistance_type_id' , 
			);
		}elseif($input_data['test_type']==2){
			if($input_data['test_subtype']==1){
				if($input_data['column']==1){
					$column = 'hull_color';
				}elseif($input_data['column']==2){
					$column = 'off_type';
				}elseif($input_data['column']==3){
					$column = 'width';
				}elseif($input_data['column']==4){
					$column = 'length';
				}elseif($input_data['column']==5){
					$column = 'shape';
				}else{
					$column = "";
				}
				$table = array(
					'table' => 'form_quality_physical',  
					'column' => $column, 
				);
			}elseif($input_data['test_subtype']==2){
				if($input_data['column']==1){
					$column = 'avg_total';
				}elseif($input_data['column']==2){
					$column = 'avg_other_seed';
				}elseif($input_data['column']==3){
					$column = 'avg_contamination';
				}elseif($input_data['column']==4){
					$column = 'avg_pure_seed';
				}else{
					$column = "";
				}
				$table = array(
					'table' => 'form_pure_seed',  
					'column' => $column, 
				);
			}elseif($input_data['test_subtype']==3){
				if($input_data['column']==1){
					$column = 'avg';
				}else{
					$column = "";
				}
				$table = array(
					'table' => 'form_germination',  
					'id_table' => 'id',  
					'table2' => 'form_germination_repeat',  
					'id_table2' => 'germination_id',  
					'column' => $column, 
				);

			}elseif($input_data['test_subtype']==4){
				if($input_data['column']==1){
					$column = 'data1';
				}elseif($input_data['column']==2){
					$column = 'data3';
				}elseif($input_data['column']==3){
					$column = 'data5';
				}elseif($input_data['column']==4){
					$column = 'data7';
				}elseif($input_data['column']==5){
					$column = 'data9';
				}elseif($input_data['column']==6){
					$column = 'data11';
				}else{
					$column = "";
				}
				$table = array(
					'table' => 'form_hulling',  
					'column' => $column, 
				);

			}elseif($input_data['test_subtype']==5){
				if($input_data['column']==1){
					$column = 'avg_data3';
				}elseif($input_data['column']==2){
					$column = 'avg_data4';
				}elseif($input_data['column']==3){
					$column = 'avg_data5';
				}elseif($input_data['column']==4){
					$column = 'avg_data6';
				}else{
					$column = "";
				}
				$table = array(
					'table' => 'form_germination_analyze',  
					'column' => $column, 
				);
			
			}
		}elseif($input_data['test_type']==3){
			if($input_data['test_subtype']==1){
				$column = 'amylose';
			}elseif($input_data['test_subtype']==2){
				$column = 'alkali_14';
			}elseif($input_data['test_subtype']==3){
				$column = 'alkali_17';
			}elseif($input_data['test_subtype']==4){
				$column = 'aroma';
			}elseif($input_data['test_subtype']==5){
				$column = 'chaliness';
			}else{
				$column = "";
			}
			
			$table = array(
				'table' => 'form_quality_chemical',  
				'column' => $column, 
			);
		}
		// echo "<pre>";
		// print_r($input_data);
		// exit();
		$result = $this->Pedigree_model->test_search($table,$input_data);
		// echo "<pre>";
		// 	print_r($result);
		// exit();
		return $result ;
	}
	public function search_research()
	{
		$input_data = $this->input->post();

		if($input_data['sign']==1){
			$input_data['sign'] = '>=';
			$data['title']['sign'] = 'มากกว่าหรือเท่ากับ' ;
		}elseif($input_data['sign']==2){
			$input_data['sign'] = '<=';
			$data['title']['sign'] = 'น้อยกว่าหรือเท่ากับ' ;
		}else{
			$input_data['sign'] = '';
			$data['title']['sign'] = 'เท่ากับ' ;
		}
		// echo "<pre>";
		// print_r($input_data);

		if(empty($input_data['search'])){
			$data['title']['search'] = 'n/a' ;
		}else{
			$data['title']['search'] = $input_data['search'] ;
		}

		if(empty($input_data['department'])){
			$data['title']['department'] = 'ทุกศูนย์' ;
		}else{
			$data['title']['department'] = $input_data['department'] ;
		}

		if(empty($input_data['year'])){
			$data['title']['year'] = 'ทุกปี' ;
		}else{
			$data['title']['year'] = $input_data['year'] ;
		}

		if(empty($input_data['type_of_research'])){
			$data['title']['type_of_research'] = 'ทุกประเภท' ;
		}else{
			$type_of_research = $this->Pedigree_model->get_pedigree_tor($input_data['type_of_research']);
			if(!empty($type_of_research)){
				$data['title']['type_of_research'] = $type_of_research[0]['tor_name'] ;
			}else{
				$data['title']['type_of_research'] = 'n/a' ;
			}
		}

		if(empty($input_data['form_research'])){
			$data['title']['form_research'] = 'n/a' ;

		}else{

			switch ($input_data['form_research']) {
			    case "form_bloom":
			        $data['title']['form_research'] = 'วันออกดอก' ;
			        break;
			    case "form_high":
			        $data['title']['form_research'] = 'ความสูง' ;
			        break;
			    case "form_tree_grove":
			        $data['title']['form_research'] = 'จำนวนต้นต่อกอ' ;
			        break;
			    case "form_awn_grove":
			        $data['title']['form_research'] = 'จำนวนรวงต่อกอ' ;
			        break;
			    case "form_seed_good":
			        $data['title']['form_research'] = 'จำนวนเมล็ดดีต่อรวง' ;
			        break;
			    case "form_product":
			        $data['title']['form_research'] = 'ผลผลิต' ;
			        break;
			    default:
			        $data['title']['form_research'] = 'n/a' ;
			}
			
		}

		$data['get_pedigree'] = $this->Pedigree_model->search_average($input_data);
		$data['type_of_research'] = $this->Pedigree_model->get_type_of_research();
		$data['get_department'] = $this->Pedigree_model->get_department_all();

		
		// echo "<pre>" ;
		// print_r($data);
		// exit();
		$data['content'] = 'pedigree_result';
		$this->load->view('header/admin_header',$data);
	}
	public function preview()
	{
		$pedigree_id = $this->uri->segment(3);
		if(!empty($pedigree_id)){
			$pedigree_detail = $this->Pedigree_model->get_pedigree_detail($pedigree_id);
			if(!empty($pedigree_detail)){
				$data['pedigree_detail'] = $pedigree_detail ;
			}else{
				redirect('pedigree') ;
			}
		}else{
			redirect('pedigree') ;
		}

		$data['content'] = 'pedigree_preview';
		$this->load->view('header/admin_header',$data);	
	}



}
