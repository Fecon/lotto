<?php  echo form_open('form_quality_chemical/insert_data');  ?>

<div class="row">
  <div class="col-xs-12">
    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">คุณภาพเมล็ดทางเคมี</h3>
      </div>
      <!-- /.box-header --><br>
      <div class="box-body table-responsive"><br>
        <div class="row">
          <div class="col-xs-12">
            <div class="row row-hidden bg-olive-active" align="center">
              <div class="col-md-1"># </div>
              <div class="col-md-3">Designation </div>
              <div class="col-md-3">ศูนย์วิจัย </div>
              <div class="col-md-1">Amylose(%) </div>
              <div class="col-md-1">Alkali 1.4% </div>
              <div class="col-md-1">Alkali 1.7% </div>
              <div class="col-md-1">Aroma </div>
              <div class="col-md-1">Chaliness </div>
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
                    <span class="input-group-addon" onClick="add_disease(<?php echo $pedigree_selected[$i]['rp_id'].','.$pedigree_selected[$i]['entry'].','.$pedigree_selected[$i]['pedigree_id'] ;?>);" style=" border-style:dashed;"><a><i class="fa fa-plus-circle"></i></a></span> </div>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-1 col-hidden">
                <label>Amylose(%) : </label>
              </div>
              <div class="col-xs-7 col-sm-7 col-md-1">
                <div class="form-group">
                  <div class="input-group">
                    <input type="number" class="form-control" name="amylose[]" step="any">
                  </div>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                <div class="form-group">
                  <label>Alkali 1.4% : </label>
                </div>
              </div>
              <div class="col-xs-7 col-sm-7 col-md-1">
                <div class="form-group">
                  <div class="input-group">
                    <input type="number" class="form-control" name="alkali_14[]" step="any">
                  </div>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                <div class="form-group">
                  <label>Alkali 1.7%  : </label>
                </div>
              </div>
              <div class="col-xs-7 col-sm-7 col-md-1">
                <div class="form-group">
                  <div class="input-group">
                    <input type="number" class="form-control" name="alkali_17[]" step="any">
                  </div>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-1 col-hidden">
                <div class="form-group">
                  <label>Aroma : </label>
                </div>
              </div>
              <div class="col-xs-7 col-sm-7 col-md-1">
                <div class="form-group">
                  <div class="input-group">
                  <select class="form-control" name="aroma[]">
                  	<option selected value="1">+</option>
                    <option value="0">-</option>
                  </select>
                  </div>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-1 col-hidden">
                <div class="form-group">
                  <label>Chaliness : </label>
                </div>
              </div>
              <div class="col-xs-7 col-sm-7 col-md-1">
                <div class="form-group">
                  <div class="input-group">
                    <input type="number" class="form-control" name="chaliness[]" step="any">
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
					
					+'</select><span class="input-group-addon" onClick="add_disease('+ rp_id +')" style=" border-style:dashed;"><a><i class="fa fa-plus-circle"></i></a></span></div></div></div><div class="col-xs-5 col-sm-5 col-md-1 col-hidden"><label>Amylose(%) : </label></div><div class="col-xs-7 col-sm-7 col-md-1"><div class="form-group"><div class="input-group"><input type="number" class="form-control" name="amylose[]" step="any"></div></div></div><div class="col-xs-5 col-sm-5 col-md-2 col-hidden"><div class="form-group"><label>Alkali 1.4% : </label></div></div><div class="col-xs-7 col-sm-7 col-md-1"><div class="form-group"><div class="input-group"><input type="number" class="form-control" name="alkali_14[]" step="any"></div></div></div><div class="col-xs-5 col-sm-5 col-md-2 col-hidden"><div class="form-group"><label>Alkali 1.7%  : </label></div></div><div class="col-xs-7 col-sm-7 col-md-1"><div class="form-group"><div class="input-group"><input type="number" class="form-control" name="alkali_17[]" step="any"></div></div></div><div class="col-xs-5 col-sm-5 col-md-1 col-hidden"><div class="form-group"><label>Aroma : </label></div></div><div class="col-xs-7 col-sm-7 col-md-1"><div class="form-group"><div class="input-group"><select class="form-control" name="aroma[]"><option value="0">+</option><option selected value="1">-</option></select></div></div></div><div class="col-xs-5 col-sm-5 col-md-1 col-hidden"><div class="form-group"><label>Chaliness : </label></div></div><div class="col-xs-7 col-sm-7 col-md-1"><div class="form-group"><div class="input-group"><input type="number" class="form-control" name="chaliness[]" step="any"></div></div></div><div class="col-xs-12 col-sm-12 col-md-12 col-hidden"><hr></div>'
					 );

	}
		
</script>