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
	}elseif($user_data['user_role']==3){
		if($dept!=$user_data['dep_no']){
			$role = 0 ;
		}
	}
	if(isset($role)){
		echo '<script>
				$( document ).ready(function() {
					document.getElementById("back").disabled = true;
					$( "input" ).prop( "disabled", true ); 
					$( "select" ).prop( "disabled", true ); 
					$( "textarea" ).prop( "disabled", true ); 
					$(this).find("button[type=submit]").prop("disabled", true);
				});
			 </script>';
	}
?>
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> กำหนดEntry </h1>
    <ol class="breadcrumb">
    </ol>
  </section>
  <br>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-7 col-xs-12"> 
        <!-- Default box -->
        <div class="box box-primary">
          <div class="box-header"> <i class="ion ion-clipboard"></i>
            <h3 class="box-title">Entry</h3>
          </div>
          <!-- /.box-header -->
          <?php  echo form_open('research/research_ctrl/update_entry');  ?>
          <div class="box-body">
            <div class="col-lg-2 col-xs-3">
              <div align="center">No.
                <hr style="border-color:#390" />
              </div>
              <ul class="todo-list">
                <?php  for($i=1  ; $i<count($pedigree_selected[0])+1 ; $i++) { ?>
                <li> <span class="text text-blue"><?php echo $i  ?></span> </li>
                <?php } ?>
              </ul>
            </div>
            <div class="col-lg-10 col-xs-9">
              <div align="center">Designation
                <hr style="border-color:#390"  />
              </div>
              <ul class="todo-list">
                <?php for($i=0 ; $i < count($pedigree_selected[0]) ; $i++){?>
                <li> 
                  <!-- drag handle --> 
                  <span class="handle"> <i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i> </span> 
                  <!-- checkbox --> 
                  |
                  <?php  foreach($array_research_id as $key=>$value) {  ?>
                  	<input type="hidden" value="<?php echo $pedigree_selected[$key][$i]['rp_id']  ?>" name="rp_id<?php echo $key ?>[]">
                  <?php } ?>
                  <!-- todo text --> 
                  <span class="text"><?php echo $pedigree_selected[0][$i]['designation']  ?></span> 
                  <!-- General tools such as edit or delete-->
                  <div class="tools"> <i class="fa fa-link"></i> </div>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <!-- /.box-body -->
          
          <div class="box-footer clearfix no-border" align="center">
            <input type="hidden" value="<?php echo $research_id  ?>" name="research_id">
            <a href="<?php echo site_url('research/research_edit/'.$research_id) ?>">
            <button type="button" id="back" class="btn btn-default">ย้อนกลับ</button>
            </a>
            <button  type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> บันทึก</button>
          </div>
          <?php echo form_close();?> </div>
        <!-- /.box --> 
      </div>
    </div>
  </section>
  <!-- /.content --> 
</div>
<!-- /.content-wrapper --> 
<script src="<?php echo base_url()?>assets/dist/js/pages/dashboard.js"></script>