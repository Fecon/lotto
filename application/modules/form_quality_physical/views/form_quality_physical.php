<?php  echo form_open('form_quality_physical/insert_data');  ?>

<div class="row">
  <div class="col-xs-12">
    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">คุณภาพเมล็ดทางกายภาพ</h3>
      </div>
      <!-- /.box-header --><br>
      <div class="box-body table-responsive"><br>
        <div class="row">
          <div class="col-xs-12">
            <div class="row row-hidden bg-olive-active" align="center">
              <div class="col-md-1"># </div>
              <div class="col-md-3">Designation </div>
              <div class="col-md-3">ศูนย์วิจัย </div>
              <div class="col-md-1">สีเปลือกข้าว <br />(Hull color) </div>
              <div class="col-md-1">ข้าวปน <br />(Off type) </div>
              <div class="col-md-1">Width <br />(mm.) </div>
              <div class="col-md-1">Length<br /> (mm.) </div>
              <div class="col-md-1">Shape <br />(mm.) </div>
            </div>
            <br />
            <?php for($i=0;$i<count($pedigree_selected);$i++){ ?>
            <div class="row select_disease<?php echo $pedigree_selected[$i]['rp_id'] ;?>" align="center">
              <div class="col-xs-5 col-sm-5 col-md-1 col-hidden">
                <div class="form-group">
                  <label>ลำดับที่ </label>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-1">
                <div class="form-group">
                  <label><?php echo $i+1 ;?> </label>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-3 col-hidden">
                <div class="form-group">
                  <label>Designation : </label>
                </div>
              </div>
              <div class="col-xs-7 col-sm-7 col-md-3">
                <div class="form-group">
                  <label><?php echo $pedigree_selected[$i]['designation'] ;?> </label>
                  <input type="hidden" name="entry[]" value="<?php echo $pedigree_selected[$i]['entry'] ;?>">
                  <input type="hidden" name="pedigree_id[]" value="<?php echo $pedigree_selected[$i]['pedigree_id'] ;?>">
                </div>
              </div>
              <div class="col-xs-1 col-sm-1 col-md-4 col-hidden">
                <div class="form-group">
                  <label></label>
                </div>
              </div>
              <div class="col-xs-11 col-sm-11 col-md-3">
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
              <div class="col-xs-5 col-sm-5 col-md-1 col-hidden">
                <label>สีเปลือกข้าว : </label>
              </div>
              <div class="col-xs-7 col-sm-7 col-md-1">
                <div class="form-group">
                  <div class="input-group">
                  <input type="text" class="form-control" name="hull_color[]" step="any">
                  </div>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                <div class="form-group">
                  <label>ข้าวปน : </label>
                </div>
              </div>
              <div class="col-xs-7 col-sm-7 col-md-1">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" name="off_type[]" step="any">
                  </div>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                <div class="form-group">
                  <label>Width (mm.)  : </label>
                </div>
              </div>
              <div class="col-xs-7 col-sm-7 col-md-1">
                <div class="form-group">
                  <div class="input-group">
                    <input type="number" class="form-control" name="width[]" step="any">
                  </div>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-1 col-hidden">
                <div class="form-group">
                  <label>Length (mm.) : </label>
                </div>
              </div>
              <div class="col-xs-7 col-sm-7 col-md-1">
                <div class="form-group">
                  <div class="input-group">
                    <input type="number" class="form-control" name="length[]" step="any">
                  </div>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-1 col-hidden">
                <div class="form-group">
                  <label>Shape (mm.) : </label>
                </div>
              </div>
              <div class="col-xs-7 col-sm-7 col-md-1">
                <div class="form-group">
                  <div class="input-group">
                    <input type="number" class="form-control" name="shape[]" step="any">
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
		
	  				$(select_disease).append(
					'<div class="col-xs-5 col-sm-5 col-md-1 col-hidden"><div class="form-group"><label> </label></div></div><div class="col-xs-5 col-sm-5 col-md-1"><div class="form-group"><label></label></div></div><div class="col-xs-5 col-sm-5 col-md-3 col-hidden"><div class="form-group"><label> </label></div></div><div class="col-xs-7 col-sm-7 col-md-3"><div class="form-group"><label></label><input type="hidden" name="entry[]" value="'+ entry +'"><input type="hidden" name="pedigree_id[]" value="'+ pedigree_id +'"></div></div><div class="col-xs-1 col-sm-1 col-md-4 col-hidden"><div class="form-group"><label></label></div></div><div class="col-xs-11 col-sm-11 col-md-3"><div class="form-group"><div class="input-group"><select class="form-control" name="dep_no[]"><option value="">-- เลือก --</option>'
					+'<?php foreach($department_all as $dept_all){ ?><optgroup label="<?php echo $dept_all['GEO_NAME'] ; ?>"><?php foreach($dept_all['department_list'] as $department){echo '<option value="'.$department['dep_no'].'">'.$department['dep_name'].'</option>';} ?></optgroup><?php } ?>'
					
					+'</select><span class="input-group-addon" onClick="add_disease('+ rp_id +')" style=" border-style:dashed;"><a><i class="fa fa-plus-circle"></i></a></span></div></div></div><div class="col-xs-5 col-sm-5 col-md-1 col-hidden"><label>สีเปลือกข้าว : </label></div><div class="col-xs-7 col-sm-7 col-md-1"><div class="form-group"><div class="input-group"><input type="text" class="form-control" name="hull_color[]" step="any"></div></div></div><div class="col-xs-5 col-sm-5 col-md-2 col-hidden"><div class="form-group"><label>ข้าวปน : </label></div></div><div class="col-xs-7 col-sm-7 col-md-1"><div class="form-group"><div class="input-group"><input type="text" class="form-control" name="off_type[]" step="any"></div></div></div><div class="col-xs-5 col-sm-5 col-md-2 col-hidden"><div class="form-group"><label>Width (mm.)  : </label></div></div><div class="col-xs-7 col-sm-7 col-md-1"><div class="form-group"><div class="input-group"><input type="number" class="form-control" name="width[]" step="any"></div></div></div><div class="col-xs-5 col-sm-5 col-md-1 col-hidden"><div class="form-group"><label>Length (mm.) : </label></div></div><div class="col-xs-7 col-sm-7 col-md-1"><div class="form-group"><div class="input-group"><input type="number" class="form-control" name="length[]" step="any"></div></div></div><div class="col-xs-5 col-sm-5 col-md-1 col-hidden"><div class="form-group"><label>Shape (mm.) : </label></div></div><div class="col-xs-7 col-sm-7 col-md-1"><div class="form-group"><div class="input-group"><input type="number" class="form-control" name="shape[]" step="any"></div></div></div><div class="col-xs-12 col-sm-12 col-md-12 col-hidden"><hr></div>'
					 );

	}
		
</script>