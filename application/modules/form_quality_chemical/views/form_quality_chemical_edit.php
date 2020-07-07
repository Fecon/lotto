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
            <?php $no=1 ;for($i=0;$i<count($get_data);$i++){ ?>
            <div class="row select_disease<?php echo $get_data[$i]['id'] ;?>" align="center">
              <div class="col-xs-5 col-sm-5 col-md-1 col-hidden">
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
              <div class="col-xs-5 col-sm-5 col-md-3 col-hidden">
                <div class="form-group">
                  <?php if(isset($get_data[$i-1])){
						if($get_data[$i]['pedigree_id'] != $get_data[$i-1]['pedigree_id']){ ?>
                  <label>Designation : </label>
                  <?php }
					  }
					  if($i==0){ echo  "<label>Designation : </label>";  }?>
                </div>
              </div>
              <div class="col-xs-7 col-sm-7 col-md-3">
                <div class="form-group">
                  <?php if(isset($get_data[$i-1])){
						if($get_data[$i]['pedigree_id'] != $get_data[$i-1]['pedigree_id']){ ?>
                  <label><?php echo $get_data[$i]['designation'] ;?> </label>
                  <?php }
					  }
					  if($i==0){ echo  "<label>".$get_data[$i]['designation']." </label>"; }?>
                  <input type="hidden" name="entry[]" value="<?php echo $get_data[$i]['entry'] ;?>">
                  <input type="hidden" name="pedigree_id[]" value="<?php echo $get_data[$i]['pedigree_id'] ;?>">
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
              <div class="col-xs-5 col-sm-5 col-md-1 col-hidden">
                <label>Amylose(%) : </label>
              </div>
              <div class="col-xs-7 col-sm-7 col-md-1">
                <div class="form-group">
                  <div class="input-group">
                    <input type="number" class="form-control" name="amylose[]" step="any" value="<?php echo $get_data[$i]['amylose'] ?>">
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
                    <input type="number" class="form-control" name="alkali_14[]" step="any" value="<?php echo $get_data[$i]['alkali_14'] ?>">
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
                    <input type="number" class="form-control" name="alkali_17[]" step="any" value="<?php echo $get_data[$i]['alkali_17'] ?>">
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
                  	<option <?php if($get_data[$i]['aroma']==1){
								echo ' selected' ; 
								} ?> value="1">+</option>
                    <option <?php if($get_data[$i]['aroma']==0){
								echo ' selected' ; 
								} ?> value="0">-</option>
                    
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
                    <input type="number" class="form-control" name="chaliness[]" step="any" value="<?php echo $get_data[$i]['chaliness'] ?>">
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
		
	  				$(select_disease).append(
					'<div class="col-xs-5 col-sm-5 col-md-1 col-hidden"><div class="form-group"><label> </label></div></div><div class="col-xs-5 col-sm-5 col-md-1"><div class="form-group"><label></label></div></div><div class="col-xs-5 col-sm-5 col-md-3 col-hidden"><div class="form-group"><label></label></div></div><div class="col-xs-7 col-sm-7 col-md-3"><div class="form-group"><label></label><input type="hidden" name="entry[]" value="'+ entry +'"><input type="hidden" name="pedigree_id[]" value="'+ pedigree_id +'"></div></div><div class="col-xs-1 col-sm-1 col-md-4 col-hidden"><div class="form-group"><label></label></div></div><div class="col-xs-11 col-sm-11 col-md-3"><div class="form-group"><div class="input-group"><select class="form-control" name="dep_no[]"><option value="">-- เลือก --</option>'
					+'<?php foreach($department_all as $dept_all){ ?><optgroup label="<?php echo $dept_all['GEO_NAME'] ; ?>"><?php foreach($dept_all['department_list'] as $department){echo '<option value="'.$department['dep_no'].'">'.$department['dep_name'].'</option>';} ?></optgroup><?php } ?>'
					
					+'</select><span class="input-group-addon" onClick="add_disease('+ id +')" style=" border-style:dashed;"><a><i class="fa fa-plus-circle"></i></a></span></div></div></div><div class="col-xs-5 col-sm-5 col-md-1 col-hidden"><label>Amylose(%) : </label></div><div class="col-xs-7 col-sm-7 col-md-1"><div class="form-group"><div class="input-group"><input type="number" class="form-control" name="amylose[]" step="any"></div></div></div><div class="col-xs-5 col-sm-5 col-md-2 col-hidden"><div class="form-group"><label>Alkali 1.4% : </label></div></div><div class="col-xs-7 col-sm-7 col-md-1"><div class="form-group"><div class="input-group"><input type="number" class="form-control" name="alkali_14[]" step="any"></div></div></div><div class="col-xs-5 col-sm-5 col-md-2 col-hidden"><div class="form-group"><label>Alkali 1.7%  : </label></div></div><div class="col-xs-7 col-sm-7 col-md-1"><div class="form-group"><div class="input-group"><input type="number" class="form-control" name="alkali_17[]" step="any"></div></div></div><div class="col-xs-5 col-sm-5 col-md-1 col-hidden"><div class="form-group"><label>Aroma : </label></div></div><div class="col-xs-7 col-sm-7 col-md-1"><div class="form-group"><div class="input-group"><input type="number" class="form-control" name="aroma[]" step="any"></div></div></div><div class="col-xs-5 col-sm-5 col-md-1 col-hidden"><div class="form-group"><label>Chaliness : </label></div></div><div class="col-xs-7 col-sm-7 col-md-1"><div class="form-group"><div class="input-group"><input type="number" class="form-control" name="chaliness[]" step="any"></div></div></div><div class="col-xs-12 col-sm-12 col-md-12 col-hidden"><hr></div>'
					 );

	}
		
</script>