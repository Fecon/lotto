<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<?php  $attributes = array('class' => 'form-horizontal');
		echo form_open('research/research_ctrl/insert_date', $attributes);  ?>
<div class="row">
  <div class="col-md-12"> 
    <!-- Horizontal Form -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">ข้อมูลวันทดลอง</h3>
      </div>
      <!-- /.box-header --> 
      <!-- form	 start -->
      <div class="box-body">
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">วันตกกล้า </label>
          <div class="col-sm-4">
            <div class="input-group">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input type="date" class="form-control" id="sowdate" name="date_value[]" value="<?php echo @$type[1][0]['research_date_value'] ?>">
              <input type="hidden" name="date_desc[]" >
              <input type="hidden" name="date_type[]" value="1" >
              <input type="hidden" name="date_id[]" value="<?php echo @$type[2][0]['research_date_id'] ?>">
            </div>
            <!-- /.input group --> 
          </div>
          <label for="" class="col-sm-2 control-label">วันปักดำ </label>
          <div class="col-sm-4">
            <div class="input-group">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input type="date" class="form-control" id="pluckdate" name="date_value[]" value="<?php echo @$type[2][0]['research_date_value'] ?>">
              <input type="hidden" name="date_desc[]" >
              <input type="hidden" name="date_type[]" value="2" >
              <input type="hidden" name="date_id[]" value="<?php echo @$type[2][0]['research_date_id'] ?>">
            </div>
            <!-- /.input group --> 
          </div>
        </div>
        
        <div class="form-group">
        
          <label for="" class="col-sm-2 control-label">การซ่อมข้าว</label>
          <div class="col-sm-2">
            <input type="hidden" id="repair_number" 
            <?php if(!empty($type[3])){ 
						$repair_number = count($type[3])+1 ;
					}else{
						$repair_number = 2 ;
					}?>
            value="<?php echo $repair_number; ?>"/>
            <button type="button" onclick="add_repair()" class="btn btn-block btn-default btn-flat" style=" border-style:dashed;"><i class="fa fa-plus"></i> เพิ่มวันที่</button>
          </div>
          
          
          <div class="col-sm-8">
          
          <div class="select_repair">
          <?php if(!empty($type[3])){
			  		foreach($type[3] as $key => $value_repair){ ?>
            <div class="form-group">
            <div class="col-sm-1"></div>
              <label for="" class="col-sm-2 control-label">ครั้งที่ <?php echo $key+1 ?> : วันที่ </label>
              <div class="col-sm-5">
                <div class="input-group">
                  <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                  <input type="date" class="form-control" name="date_value[]" id="mend_rice" value="<?php echo $value_repair['research_date_value'] ?>">
                  <input type="hidden" name="date_desc[]" >
                  <input type="hidden" name="date_type[]" value="3" >
                  <input type="hidden" name="date_id[]" value="<?php echo $value_repair['research_date_id'] ?>">
                </div>
                <!-- /.input group --> 
              </div>
            </div>
            <?php }
		  }else{ ?>
            
            <div class="form-group">
            <div class="col-sm-1"></div>
              <label for="" class="col-sm-2 control-label">ครั้งที่ 1 : วันที่ </label>
              <div class="col-sm-5">
                <div class="input-group">
                  <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                  <input type="date" class="form-control" name="date_value[]" id="mend_rice" value="<?php echo @$value_repair['research_date_value'] ?>">
                  <input type="hidden" name="date_desc[]" >
                  <input type="hidden" name="date_type[]" value="3" >
                  <input type="hidden" name="date_id[]" value="">
                </div>
                <!-- /.input group --> 
              </div>
            </div>
            <?php } ?>
          </div>
          </div>
          </div>
        
        <div class="form-group">
          <label for="" class="col-sm-2 control-label"> </label>
          <div class="col-sm-10">
            <hr style=" border-color:#069">
          </div>
        </div>
        <!-- /.input group -->
        
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">การใส่ปุ๋ย </label>
          <div class="col-sm-2">
            <input type="hidden" id="fertilizer_number" 
			<?php if(!empty($type[4])){ 
						$fertilizer_number = count($type[4])+1 ;
					}else{
						$fertilizer_number = 2 ;
					}?>
            value="<?php echo $fertilizer_number; ?>"/>
            <button type="button" onClick="add_fertilizer();" class="btn btn-block btn-default btn-flat" style=" border-style:dashed;"><i class="fa fa-plus"></i> เพิ่มวันที่</button>
          </div>
        </div>
        <div class="select_fertilizer">
                  <?php if(!empty($type[4])){
			  		foreach($type[4] as $key => $value_fertilizer){ ?>
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">ครั้งที่ <?php echo $key+1 ?>  </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="manure_desc" name="date_desc[]" placeholder="รายละเอียด" value="<?php echo $value_fertilizer['research_date_desc'] ?>">
            </div>
            <label for="" class="col-sm-1 control-label">วันที่ </label>
            <div class="col-sm-3">
              <div class="input-group">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input type="date" class="form-control" name="date_value[]" id="manure_date" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php echo @$value_fertilizer['research_date_value'] ?>">
                <input type="hidden" name="date_type[]" value="4" >
                <input type="hidden" name="date_id[]" value="<?php echo $value_fertilizer['research_date_id'] ?>">
              </div>
            </div>
          </div>
          
           <?php }
		  }else{ ?>
          <div class="form-group">
            <label for="" class="col-sm-2 control-label">ครั้งที่ 1 </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="manure_desc" name="date_desc[]" placeholder="รายละเอียด" value="">
            </div>
            <label for="" class="col-sm-1 control-label">วันที่ </label>
            <div class="col-sm-3">
              <div class="input-group">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input type="date" class="form-control" name="date_value[]" id="manure_date" >
                <input type="hidden" name="date_type[]" value="4" >
                <input type="hidden" name="date_id[]" >
              </div>
            </div>
          </div>
          <?php } ?>
          
        </div>
        <div class="form-group">
          <label for="" class="col-sm-2 control-label"> </label>
          <div class="col-sm-10">
            <hr style=" border-color:#690">
          </div>
        </div>
        
       <div class="form-group">
        
          <label for="" class="col-sm-2 control-label">การกำจัดวัชพืช</label>
          <div class="col-sm-2">
            <input type="hidden" id="weed_number" 
            <?php if(!empty($type[5])){ 
						$weed_number = count($type[5])+1 ;
					}else{
						$weed_number = 2 ;
					}?>
            value="<?php echo $weed_number; ?>"/>
            <button type="button" onclick="add_weed()" class="btn btn-block btn-default btn-flat" style=" border-style:dashed;"><i class="fa fa-plus"></i> เพิ่มวันที่</button>
          </div>
          
          
          <div class="col-sm-8">
          
          <div class="select_weed">
          <?php if(!empty($type[5])){
			  		foreach($type[5] as $key => $value_weed){ ?>
            <div class="form-group">
            <div class="col-sm-1"></div>
              <label for="" class="col-sm-2 control-label">ครั้งที่ <?php echo $key+1 ?> : วันที่ </label>
              <div class="col-sm-5">
                <div class="input-group">
                  <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                  <input type="date" class="form-control" name="date_value[]" value="<?php echo $value_weed['research_date_value'] ?>">
                  <input type="hidden" name="date_desc[]" >
                  <input type="hidden" name="date_type[]" value="5" >
                  <input type="hidden" name="date_id[]" value="<?php echo $value_weed['research_date_id'] ?>">
                </div>
                <!-- /.input group --> 
              </div>
            </div>
            <?php }
		  }else{ ?>
            
            <div class="form-group">
            <div class="col-sm-1"></div>
                <label for="" class="col-sm-2 control-label">ครั้งที่ 1 : วันที่ </label>
              <div class="col-sm-5">
                <div class="input-group">
                  <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                  <input type="date" class="form-control" name="date_value[]" >
                  <input type="hidden" name="date_desc[]" >
                  <input type="hidden" name="date_type[]" value="5" >
                  <input type="hidden" name="date_id[]" value="">
                </div>
                <!-- /.input group --> 
              </div>
            </div>
            <?php } ?>
          </div>
          </div>
          </div>
          
        <div class="form-group">
          <label for="" class="col-sm-2 control-label"> </label>
          <div class="col-sm-10">
            <hr style=" border-color:#F60">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">ปัญหาอุปสรรค </label>
          <div class="col-sm-10">
            <textarea class="form-control" name="date_desc[]" rows="3" placeholder=""><?php echo @$type[6][0]['research_date_desc'] ?></textarea>
            <input type="hidden" name="date_type[]" value="6" >
            <input type="hidden" name="date_value[]">
            <input type="hidden" name="date_id[]" value="<?php echo @$type[6][0]['research_date_id'] ?>">
          </div>
        </div>
      </div>
      <!-- /.box-body --> 
      <!-- /.box-footer --> 
      
    </div>
    <!-- /.box --> 
  </div>
</div>

<script>
	function add_repair()
	{
		var repair_number = parseInt(document.getElementById('repair_number').value, 10);
		repair_number = isNaN(repair_number) ? 0 : repair_number;
		
	  	var select_repair = '.select_repair';
		
	  				$(select_repair).append(
					  '<div class="form-group">'
                      +'<div class="col-sm-1"></div>'
     
					  +'<label for="" class="col-sm-2 control-label">ครั้งที่ '+ repair_number +'  : วันที่       </label>'
                      +'<div class="col-sm-5">'
                      +'  <div class="input-group">'
                      +'<div class="input-group-addon">'
                      +'  <i class="fa fa-calendar"></i>'
                      +'</div>'
                      +'<input type="date" class="form-control" name="date_value[]" id="mend_rice"  data-mask value="">'
                      +'<input type="hidden" name="date_desc[]" ><input type="hidden" name="date_type[]" value="3" >'
                      +'<input type="hidden" name="date_id[]" value="">'
					 );
		repair_number++;
		document.getElementById('repair_number').value = repair_number;
	}
	
	function add_fertilizer()
	{
		var fertilizer_number = parseInt(document.getElementById('fertilizer_number').value, 10);
		fertilizer_number = isNaN(fertilizer_number) ? 0 : fertilizer_number;
		
	  	var select_fertilizer = '.select_fertilizer';
		
	  				$(select_fertilizer).append(
					'<div class="form-group">'
					+'<label for="" class="col-sm-2 control-label">ครั้งที่ '+ fertilizer_number +' </label>'
                    +'  <div class="col-sm-6">'
                    +'    <input type="text" class="form-control" id="manure_desc" name="date_desc[]" placeholder="รายละเอียด" value="">'
                    +'  </div>'
                    +'  <label for="" class="col-sm-1 control-label">วันที่       </label>'
                    +'  <div class="col-sm-3">'
                    +'    <div class="input-group">'
                    +'  <div class="input-group-addon">'
                    +'    <i class="fa fa-calendar"></i>'
                    +'  </div>'
                    +'  <input type="date" class="form-control" name="date_value[]" id="manure_date"  data-mask value="">'
                    +'  <input type="hidden" name="date_type[]" value="4" >'
                    +'  <input type="hidden" name="date_id[]" value="">'
                    +'</div>'
                    +'  </div>'
                    +'</div>'
					
					 );
		fertilizer_number++;
		document.getElementById('fertilizer_number').value = fertilizer_number;

	}
	
	function add_weed()
	{
		var weed_number = parseInt(document.getElementById('weed_number').value, 10);
		weed_number = isNaN(weed_number) ? 0 : weed_number;
		
	  	var select_weed = '.select_weed';
		
	  				$(select_weed).append(
					'<div class="form-group">'
                      +'<div class="col-sm-1"></div>'
					 +'<label for="" class="col-sm-2 control-label">ครั้งที่ '+ weed_number +'  : วันที่       </label>'
                      +'<div class="col-sm-5">'
                      +'  <div class="input-group">'
                      +'<div class="input-group-addon">'
                      +'  <i class="fa fa-calendar"></i>'
                      +'</div>'
                      +'<input type="date" class="form-control" name="date_value[]" id="weed"  data-mask value="">'
                      +'<input type="hidden" name="date_desc[]" ><input type="hidden" name="date_type[]" value="5" >'
                      +'<input type="hidden" name="date_id[]" value="">'
					 );
		weed_number++;
		document.getElementById('weed_number').value = weed_number;
	}
		
</script>