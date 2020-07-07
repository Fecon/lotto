<?php 
	$form = array('form_water_level','form_lost_grove','form_disease','form_leaves','form_bloom','form_high','form_awn_grove','form_tree_grove','form_no_grain','form_seed_good','form_seed_grove','form_product');
?>
<?php 
	$current_form = $this->uri->segment(1); 
    for($i=0;$i<count($form);$i++){
    	if($form[$i]==$current_form){
        	if(reset($form)==$form[$i]){
            	$previous = '' ;
            }else{
            	$previous = $form[$i-1];
            }
            if(end($form)==$form[$i]){
            	$next = '' ;
            }else{
            	$next = $form[$i+1];
            }
			
			if($current_form=='form_lost_grove'){
				
			}else{
			
			}
			if($current_form=='form_disease'||$current_form=='form_bloom'){
				
			}else{
			
			}
            exit();   
        }
    }
?>
<div class="row">
	<div class="col-md-1">
    <?php if(!empty($previous)){ ?>
    	<a href="<?php echo site_url($previous) ?>">
    	<button type="button" class="btn btn-block btn-primary btn-flat">ก่อนหน้า</button>
        </a>
    <?php } ?>
    </div>
    <div class="col-md-10"></div>
    <div class="col-md-1">
    <?php if(!empty($next)){ ?>
    	<a href="<?php echo site_url($next) ?>">
    	<button type="button" class="btn btn-block btn-primary btn-flat">ถัดไป</button>
        </a>
    <?php } ?>
    </div>
</div>

<?php 
	$this->load->model('research/Research_model');
	$data['water_lv_time'] = $this->Research_model->get_water_lv_time($research_id);
	$data['leaves_time'] = $this->Research_model->get_leaves_time($research_id);
?>
<div class="modal fade" id="water_lv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ครั้งที่วัดระดับน้ำในแปลง</h4>
      </div>
      <div class="modal-body">
      <div class="row"> <br>
      <?php foreach($water_lv_time as $value_water_time){ ?>
            <div class="col-md-3 col-sm-4 col-xs-4"> <a class="forms-list-name" href="<?php echo site_url('form_water_level/edit_view/'.$research_id.'/'.$value_water_time['keep_date_id']) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
               <?php 
			    $date = date_create_from_format('Y-m-d', $value_water_time['keep_date']);
				echo date_format($date, 'd/m/Y'); ?>
                <span class="forms-list-date" style="font-size:2em; position:relative;margin-top:-7px;margin-left:-45px; text-align:center; z-index:100;"><?php 
			   echo $value_water_time['terms'] ?></span></a> </div>
               <?php } ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <a href="<?php echo site_url('form_water_level/index/'.$research_id) ?>"><button type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มครั้งต่อไป</button></a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="leaves" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ครั้งที่บันทึกใบม้วน ใบตาย</h4>
      </div>
      <div class="modal-body">
      <div class="row"> <br>
      <?php foreach($leaves_time as $value_leaves_time){ ?>
            <div class="col-md-3 col-sm-4 col-xs-4"> <a class="forms-list-name" href="<?php echo site_url('form_leaves/edit_view/'.$research_id.'/'.$value_leaves_time['keep_date_id']) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
               <?php 
			    $date = date_create_from_format('Y-m-d', $value_leaves_time['keep_date']);
				echo date_format($date, 'd/m/Y'); ?>
                <span class="forms-list-date" style="font-size:2em; position:relative;margin-top:-7px; margin-left:-45px; text-align:center; z-index:100;"><?php 
			   echo $value_leaves_time['terms'] ?></span></a> </div>
               <?php } ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <a href="<?php echo site_url('form_leaves/index/'.$research_id) ?>"><button type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มครั้งต่อไป</button></a>
      </div>
    </div>
  </div>
</div>