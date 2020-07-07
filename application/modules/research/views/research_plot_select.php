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
					$( "input" ).prop( "disabled", true ); 
					$( "select" ).prop( "disabled", true ); 
					$( "textarea" ).prop( "disabled", true ); 
					$(this).find("button[type=submit]").prop("disabled", true);
				});
			 </script>';
	}
?>
<style>
a.tooltips {
	position: relative;
	display: inline;
}
a.tooltips span {
	position: absolute;
	width: 260px;
	color: #FFFFFF;
	background: #000000;
	height: 30px;
	line-height: 30px;
	text-align: center;
	visibility: hidden;
	border-radius: 6px;
}
a.tooltips span:after {
	content: '';
	position: absolute;
	top: 100%;
	left: 50%;
	margin-left: -8px;
	width: 0;
	height: 0;
	border-top: 8px solid #000000;
	border-right: 8px solid transparent;
	border-left: 8px solid transparent;
}
a:hover.tooltips span {
	font-size: 14px;
	visibility: visible;
	opacity: 1;
	bottom: 65px;
	left: 50%;
	margin-left: -130px;
	z-index: 999;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> การกำหนดEntry </h1>
  </section>
  <br>
  
  <!-- Main content -->
  <section class="content"> 
    <!-- Default box -->
    <div class="row">
      <div class="col-md-12"> 
        <!-- Horizontal Form -->
        <div class="box box-info"> <?php echo form_open('research/research_ctrl/update_research_pedigree_plot') ?>
          <div class="box-header with-border" align="center">
            <h3 class="box-title"><br />
              <!--<a  href="<?php echo site_url('research') ?>" ><button class="btn btn-success btn-lg"><i class="fa fa-check"></i> ยืนยันการสร้างการทดลอง </button></a>-->
              <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-check"></i> ยืนยันการสร้างการทดลอง </button>
              <br />
            </h3>
          </div>
          <!-- /.box-header -->
          
          <div class="box-body">
            <div class="row">
              <?php for($repeat=0;$repeat<count($pedigree_plot);$repeat++){ ?>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <?php for($i=0;$i<count($pedigree_plot[$repeat]);$i++){ ?>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="info-box"> <span class="info-box-icon 
								<?php 
								if($research_detail['block_amount']!=0){
									$block_amount = $research_detail['block_amount'] ;
								}else{
									$block_amount = 1 ;
								}
								$chk = $i % ($block_amount*2) ;
									if ($repeat % 2 == 0) {
										if ($chk==0 || $chk<$block_amount) {
									  		echo "bg-green" ;
										}else{
											echo "bg-olive" ;
										}
										
									}else{
										if ($chk==0 || $chk<$block_amount) {
									  		echo "bg-blue" ;
										}else{
											echo "bg-light-blue";
										}	
									}
								?>
                                " style="font-size:2.5em;"> <?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?> </span>
                      <div class="info-box-content">
                        <table class="table table-bordered table-hover table-striped">
                          <thead>
                            <tr>
                              <td><div align="center">Block</div></td>
                              <td ><div align="center">Entry</div></td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td align="center"><select class="form-control select2" name="block[]" style="min-width:60px;" required="required" >
                                  <option value="<?php echo $pedigree_plot[$repeat][$i]['block'] ;?>"><?php echo $pedigree_plot[$repeat][$i]['block'] ;?></option>
                                  <optgroup label="เลือกใหม่">
                                  <?php for($k=1;$k<=round($research_detail['pedigree_amount']/$research_detail['block_amount'], 0, PHP_ROUND_HALF_UP);$k++){ ?>
                                  <option value="<?php echo $k ?>"><?php echo $k ?></option>
                                  <?php } ?>
                                  </optgroup>
                                </select></td>
                              <td align="center" ><input type="hidden" name="research_id"  value="<?php echo $research_id ;?>" >
                                <input type="hidden" class="form-control" name="ped_plot_id[]" value="<?php echo $pedigree_plot[$repeat][$i]['ped_plot_id'] ;?>"  />
                                <select class="form-control select2" style="min-width:80px;" name="entry[]" id="entry<?php echo $pedigree_plot[$repeat][$i]['ped_plot_id'] ;?>" required="required" onchange="get_entry();">
                                  <?php for($j=1;$j<=$research_detail['pedigree_amount'];$j++){ ?>
                                  <option <?php  ?> value="<?php echo $j ?>"><?php echo $j ?></option>
                                  <?php } ?>
                                </select></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.info-box-content --> 
                    </div>
                    <!-- /.info-box --> 
                  </div>
                </div>
                <?php } ?>
              </div>
              <!-- /.col -->
              <?php } ?>
            </div>
          </div>
          <?php echo form_close(); ?> </div>
        <!-- /.box --> 
      </div>
    </div>
    <!-- /.box --> 
    
  </section>
  <!-- /.content --> 
</div>
<!-- /.content-wrapper --> 
<script>
function get_entry() {
  var id_acc = document.getElementById("group_account").value;
  var level = document.getElementById("level_ctrl").value;
  $.ajax({
  					url:"<?php echo site_url('research/select_entry_number');?>/"+id_acc+"/"+level,
  					type:"POST",                                        					
            data:{},
  					dataType:"json",
  					success:function(res) {	
              var cou = 0;
              $("#type_accounts").html("");
				
						  $(res).each(function(cou) {
              
              var tag = "<option value='"+res[cou].code_type_accounts+"'>"+res[cou].code_type_accounts+" "+res[cou].type_accounts+"</option>";
              $(tag).appendTo("#type_accounts");
                                                });
					   },
					   error:function(err) {
						  alert("error");
					   }                                      
				  });
}
	
</script>