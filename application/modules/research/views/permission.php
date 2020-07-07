<?php 
	$research_id = $this->uri->segment(3); 
	$user_data = $this->session->userdata('user_data');
	$this->load->model('form_template/Template_model');
	$dept = $this->Template_model->get_research_detail($research_id);
	$research_dep = $this->Template_model->research_dept($research_id);

	if($user_data['user_role']==2){
		if (!in_array($user_data['dep_no'], $research_dep[0]['research_dept'])) {
		 	$role = 0 ;
		 }
	}elseif($user_data['user_role']==3 || $user_data['user_role']==4  ){
		if($dept['dep_no']!=$user_data['dep_no']){
			$role = 0 ;
		}
		if($research_dep[0]['status']==2){
			$role = 0 ;
		}
	}
	if(isset($role)){
		echo '<script>
				$( document ).ready(function() {
					$( "input" ).prop( "disabled", true ); 
					$( "select" ).prop( "disabled", true ); 
					$( "textarea" ).prop( "disabled", true ); 
					$(this).find("button[type=submit]").prop("disabled", true);
				});
			 </script>';
	}
?>