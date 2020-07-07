<?php  echo form_open('form_resistance_bug/insert_data');  ?>

<div class="row">
  <div class="col-xs-12">
    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">ปฏิกิริยาความต้านทานโรคและแมลง (<?php echo $resistance[0]['short_name'] ; ?>)</h3>
      </div>
      <!-- /.box-header --><br>
      <div class="box-body table-responsive"><br>
        <div class="row">
          <div class="col-xs-12">
            <div class="row row-hidden bg-olive-active">
              <div class="col-md-1"># </div>
              <div class="col-md-3" align="center">Designation </div>
              <div class="col-md-5" align="center"><?php echo $resistance[0]['short_name'] ; ?> </div>
            </div>
            <br />
            <?php $no=1 ;for($i=0;$i<count($get_data);$i++){ ?>
            <div class="row">
              <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                <div class="form-group">
                <?php if(isset($get_data[$i-1])){
						if($get_data[$i]['pedigree_id'] != $get_data[$i-1]['pedigree_id']){ ?>
                  <label>ลำดับที่ </label>
                  <?php }
					  }
					  if($i==0){ echo  "<label>ลำดับที่ </label>";  }?>
                  
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-1">
                <div class="form-group">
                <?php if(isset($get_data[$i-1])){
						if($get_data[$i]['pedigree_id'] != $get_data[$i-1]['pedigree_id']){ ?>
                  <label><?php echo $no ;?> </label>
                  <?php $no++;}
					  }
					  if($i==0){ echo  "<label>".($no)." </label>"; $no++; }?>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                <div class="form-group">
                <?php if(isset($get_data[$i-1])){
						if($get_data[$i]['pedigree_id'] != $get_data[$i-1]['pedigree_id']){ ?>
                  <label>Designation : </label>
                  <?php }
					  }
					  if($i==0){ echo  "<label>Designation : </label>";  }?>
                  
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-3">
                <div class="form-group">
                <?php if(isset($get_data[$i-1])){
						if($get_data[$i]['pedigree_id'] != $get_data[$i-1]['pedigree_id']){ ?>
                  <label><?php echo $get_data[$i]['designation'] ;?> </label>
                  <?php }
					  }
					  if($i==0){ echo  "<label>".$get_data[$i]['designation']." </label>"; }?>
                  <input type="hidden" name="entry[]" value="<?php echo $get_data[$i]['entry'] ;?>">
                  <input type="hidden" name="pedigree_id[]" value="<?php echo $get_data[$i]['pedigree_id'] ;?>">
                  <input type="hidden" name="resistance_type_id" value="<?php echo $resistance_type_id ;?>">
                </div>
              </div>
              
              <div class="col-xs-8 col-sm-8 col-md-3 select_disease<?php echo $get_data[$i]['id'] ;?>">
                <div class="form-group">
                  <div class="input-group">
                    <select class="form-control" name="dep_no[]">
                      <?php foreach($department_all as $dept_all){ ?>
                      <optgroup label="<?php echo $dept_all['GEO_NAME'] ; ?>">
                      <option value="">-- เลือก --</option>
                      <?php foreach($dept_all['department_list'] as $department){ 
				  			echo '<option';
							if($department['dep_no']==$get_data[$i]['dep_no']){
								echo ' selected' ; 
								}
							echo ' value="'.$department['dep_no'].'">'.$department['dep_name'].'</option>';
				  		} ?>
                      </optgroup>
                      <?php } ?>
                    </select>
                    <!--
                    <span class="input-group-addon" onClick="add_disease(<?php echo $get_data[$i]['id'].','.$get_data[$i]['entry'].','.$get_data[$i]['pedigree_id'] ;?>);" style=" border-style:dashed;"><a><i class="fa fa-plus-circle"></i></a></span>
                    --> </div>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4 col-md-2 input_disease<?php echo $get_data[$i]['id'] ;?>">
                <div class="form-group">
                  <div class="input-group">
                    <input type="number" name="value_disease[]" max="10" min="0" class="form-control" value="<?php echo $get_data[$i]['value_disease'] ;?>">
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-hidden">
                <hr>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
	function add_disease(x,y,z)
	{
		var id = x ;
		var entry = y ;
		var pedigree_id = z ;
		
	  	var select_disease = '.select_disease' + id.toString() ;
		var input_disease = '.input_disease' + id.toString() ;
		
	  				$(select_disease).append(
					'<div class="form-group">'
                     +'   <div class="input-group">'
		             +'       <select class="form-control" name="dep_no[]">'
					 +'			  <option value="">-- เลือก --</option>'
					 			  <?php foreach($department_all as $dept_all){ ?>
					 +'			  <optgroup label="<?php echo $dept_all['GEO_NAME'] ; ?>">'
								  <?php foreach($dept_all['department_list'] as $department){ ?>
					 +'				<option value="<?php echo $department['dep_no'] ?>"><?php echo $department['dep_name'] ?></option>'
								  <?php } ?>
					 +'			  </optgroup>'
								  <?php } ?>
                	 +'			</select>'
					 +'		<span class="input-group-addon" onClick="add_disease('+ id +')" style=" border-style:dashed;"><a><i class="fa fa-plus-circle"></i></a></span> </div>'
		             +'   </div>'
                    +'</div>'
					);
					
					$(input_disease).append(
					'<div class="form-group">'
                    +'  <div class="input-group">'
                    +'    <input type="number" name="value_disease[]" value=""  max="10" min="0" class="form-control">'
					+'    <input type="hidden" name="entry[]" value="'+ entry +'" >'
					+'    <input type="hidden" name="pedigree_id[]" value="'+ pedigree_id +'" >'
                    +'  </div>'
                  	+'</div>'
					);
	}
	
	
			
</script>