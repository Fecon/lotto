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
            <?php for($i=0;$i<count($pedigree_selected);$i++){ ?>
            <div class="row">
              <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                <div class="form-group">
                  <label>ลำดับที่ </label>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-1">
                <div class="form-group">
                  <label><?php echo $i+1 ;?> </label>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                <div class="form-group">
                  <label>Designation : </label>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-3">
                <div class="form-group">
                  <label><?php echo $pedigree_selected[$i]['designation'] ;?> </label>
                  <input type="hidden" name="entry[]" value="<?php echo $pedigree_selected[$i]['entry'] ;?>">
                  <input type="hidden" name="pedigree_id[]" value="<?php echo $pedigree_selected[$i]['pedigree_id'] ;?>">
                  <input type="hidden" name="resistance_type_id" value="<?php echo $resistance_type_id ;?>">
                </div>
              </div>
              <div class="col-xs-3 col-sm-3 col-md-2 col-hidden">
                <div class="form-group">
                  <label><?php echo $resistance[0]['short_name'] ; ?> </label>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-3 select_disease<?php echo $pedigree_selected[$i]['rp_id'] ;?>">
                <div class="form-group">
                  <div class="input-group">
                    <select class="form-control" name="dep_no[]">
                      <option value="">-- เลือก --</option>
                      <?php foreach($department_all as $dept_all){ ?>
                      <optgroup label="<?php echo $dept_all['GEO_NAME'] ; ?>">
                      <?php foreach($dept_all['department_list'] as $department){ 
				  			echo '<option value="'.$department['dep_no'].'">'.$department['dep_name'].'</option>';
				  		} ?>
                      </optgroup>
                      <?php } ?>
                    </select>
                    <!--
                    <span class="input-group-addon" onClick="add_disease(<?php echo $pedigree_selected[$i]['rp_id'].','.$pedigree_selected[$i]['entry'].','.$pedigree_selected[$i]['pedigree_id'] ;?>);" style=" border-style:dashed;"><a><i class="fa fa-plus-circle"></i></a></span> 
                    --></div>
                </div>
              </div>
              <div class="col-xs-3 col-sm-3 col-md-2 input_disease<?php echo $pedigree_selected[$i]['rp_id'] ;?>">
                <div class="form-group">
                  <div class="input-group">
                    <input type="number" name="value_disease[]" value="" max="10" min="0" class="form-control">
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
		var rp_id = x ;
		var entry = y ;
		var pedigree_id = z ;
		
	  	var select_disease = '.select_disease' + rp_id.toString() ;
		var input_disease = '.input_disease' + rp_id.toString() ;
		
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
					 +'		<span class="input-group-addon" onClick="add_disease('+ rp_id +')" style=" border-style:dashed;"><a><i class="fa fa-plus-circle"></i></a></span> </div>'
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