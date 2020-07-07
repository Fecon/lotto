<style>
.disease_data select {
	background: #9fe693;
	color: #333;
}
.disease_data .input-group span {
	background: #7ad66b;
	border-style: dashed;
}
.disease_data .input-group span a {
	color: #FFF;
}
.disease_data .input-group span a:hover {
	color: #7ad96b;
}
.disease_data input {
	background: #9fe693;
	color: #333;
}
.insect_data select {
	background: #69B;
	color: #FFF;
}
.insect_data .input-group span {
	background: #69C;
	border-style: dashed;
}
.insect_data .input-group span a {
	color: #FFF;
}
.insect_data .input-group span a:hover {
	color: #e9e9e9;
}
.insect_data input {
	background: #69B;
	color: #FFF;
}
.animal_data select {
	background: #663;
	color: #FFF;
}
.animal_data .input-group span {
	background: #660;
	border-style: dashed;
}
.animal_data .input-group span a {
	color: #FFF;
}
.animal_data .input-group span a:hover {
	color: #e9e9e9;
}
.animal_data input {
	background: #663;
	color: #FFF;
}
</style>
<?php  echo form_open('form_disease/insert_data');  ?>

<div class="row">
  <div class="col-xs-12">
    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">ศัตรูพืช <?php echo $this->input->get('plot'); ?></h3>
        <div class="box-tools">
          <div class="input-group" style="width: 150px;"><br />
            <button class="btn btn-flat btn-sm btn-primary" type="button" data-toggle="modal" data-target="#add_new_disease" ><i class="fa fa-plus"></i> เพิ่มตัวเลือก</button>
            </div>
        </div>
      </div>
      <!-- /.box-header --><br>
      <div class="box-body table-responsive no-padding"> <br>
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <?php for($repeat_no=1;$repeat_no<=count($pedigree_plot);$repeat_no++){ ?>
            <li <?php if($repeat_no==1){ echo 'class="active"'; } ?>><a href="#tab_<?php echo $repeat_no ?>" data-toggle="tab">ซ้ำที่ <?php echo $repeat_no ?></a></li>
            <?php } ?>
          </ul>
          <div class="tab-content">
            <?php $repeat=0;
					for($repeat_no=1;$repeat_no<=count($pedigree_plot);$repeat_no++){ ?>
            <div class="tab-pane <?php if($repeat_no==1){ echo 'active'; } ?>" id="tab_<?php echo $repeat_no ?>">
              <div class="row row-hidden  bg-olive-active">
                <div class="col-md-1">แปลง (Plot) </div>
                <div class="col-md-1">ผังแปลง (Block) </div>
                <div class="col-md-1">เบอร์ (Entry) </div>
                <div class="col-md-3" align="center">โรค (%) </div>
                <div class="col-md-3" align="center">แมลง (%) </div>
                <div class="col-md-3" align="center">สัตว์ (%) </div>
              </div>
              <br>
              <?php for($i=0;$i<count($pedigree_plot[$repeat]);$i++){ ?>
              <input type="hidden" name="repeatedly[]" value="<?php echo $repeat_no ;?>" >
              <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>แปลง (Plot) : </label>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-1">
                  <div class="form-group">
                    <label><?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?> </label>
                    <input name="plot_no[]" id="plot_no" type="hidden" value="<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>"  />
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>ผังแปลง(Block) : </label>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-1">
                  <div class="form-group">
                    <label><?php echo $pedigree_plot[$repeat][$i]['block'] ;?> </label>
                    <input type="hidden" name="block[]" value="<?php echo $pedigree_plot[$repeat][$i]['block'] ;?>" >
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>เบอร์ (Entry) : </label>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-1">
                  <div class="form-group">
                    <label><?php echo $pedigree_plot[$repeat][$i]['entry'] ;?> </label>
                    <input type="hidden" name="entry[]" value="<?php echo $pedigree_plot[$repeat][$i]['entry'] ;?>" >
                  </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>โรค (%) </label>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-2 select_disease<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>">
                  <?php if(!empty($get_data[$repeat][$i]['disease_data'])){ ?>
                  <?php foreach($get_data[$repeat][$i]['disease_data'] as $key => $disease_data ){ ?>
                  <div class="form-group disease_data">
                    <div class="input-group">
                      <?php if($key != 0) { ?>
                      <input name="plot_no[]" id="plot_no" type="hidden" value="<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>"  />
                      <input type="hidden" name="value_animal[]" value="" >
                      <input type="hidden" name="value_insect[]" value="" >
                      <input type="hidden" name="animal[]" value="" >
                      <input type="hidden" name="insect[]" value="" >
                      <input type="hidden" name="block[]" value="<?php echo $pedigree_plot[$repeat][$i]['block'] ;?>" >
                      <input type="hidden" name="entry[]" value="<?php echo $pedigree_plot[$repeat][$i]['entry'] ;?>" >
                      <input type="hidden" name="repeatedly[]" value="<?php echo $repeat_no ;?>" >
                      <?php } ?>
                      <select class="form-control disease_data" name="disease[]" >
                        <?php if($disease_data['disease']!=0) { ?>
                        <option value="<?php echo $disease_data['disease'] ?>"><?php echo $disease_data['disease_name'] ?></option>
                        <?php } ?>
                        <option value="">-- เลือก --</option>
                        <?php foreach($get_pest_disease as $pest_disease){ ?>
                        <option value="<?php echo $pest_disease['disease_id'] ?>"><?php echo $pest_disease['disease_name'] ?></option>
                        <?php } ?>
                      </select>
                      <span class="input-group-addon" onClick="add_disease(<?php echo $pedigree_plot[$repeat][$i]['plot_no'].','.$pedigree_plot[$repeat][$i]['block'].','.$pedigree_plot[$repeat][$i]['entry'].','.$repeat_no ;?>);" ><a ><i class="fa fa-plus-circle"></i></a></span> </div>
                  </div>
                  <?php	} ?>
                  <?php }else{ 
							// if($key == 0) {?>
                  <div class="form-group">
                    <div class="input-group">
                      <select class="form-control" name="disease[]">
                        <option value="">-- เลือก --</option>
                        <?php foreach($get_pest_disease as $pest_disease){ ?>
                        <option value="<?php echo $pest_disease['disease_id'] ?>"><?php echo $pest_disease['disease_name'] ?></option>
                        <?php } ?>
                      </select>
                      <span class="input-group-addon" onClick="add_disease(<?php echo $pedigree_plot[$repeat][$i]['plot_no'].','.$pedigree_plot[$repeat][$i]['block'].','.$pedigree_plot[$repeat][$i]['entry'].','.$repeat_no ;?>);" style=" border-style:dashed;"><a><i class="fa fa-plus-circle"></i></a></span> </div>
                  </div>
                  <?php //	}
					  		}
						?>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-1 input_disease<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>">
                  <?php if(!empty($get_data[$repeat][$i]['disease_data'])){ ?>
                  <?php foreach($get_data[$repeat][$i]['disease_data'] as $key => $disease_data ){ ?>
                  <div class="form-group disease_data">
                    <div class="input-group">
                      <input type="number" name="value_disease[]"
                        <?php if($disease_data['disease']!=0) { ?>
                            	value="<?php echo $disease_data['value_disease'] ?>"
                        <?php } ?>
                        min="0" max="100" class="form-control" step="any">
                    </div>
                  </div>
                  <?php	} ?>
                  <?php }else{ 
							 // if($key == 0) {?>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" name="value_disease[]" value=""  max="100" min="0" step="any"  class="form-control">
                    </div>
                  </div>
                  <?php //	}
					  		}
						?>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>แมลง(%) </label>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-2 select_insect<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>">
                  <?php if(!empty($get_data[$repeat][$i]['insect_data'])){ ?>
                  <?php foreach($get_data[$repeat][$i]['insect_data'] as $key => $insect_data ){ ?>
                  <div class="form-group insect_data">
                    <div class="input-group">
                      <?php if($key != 0) { ?>
                      <input name="plot_no[]" id="plot_no" type="hidden" value="<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>"  />
                      <input type="hidden" name="value_animal[]" value="" >
                      <input type="hidden" name="value_disease[]" value="" >
                      <input type="hidden" name="animal[]" value="" >
                      <input type="hidden" name="disease[]" value="" >
                      <input type="hidden" name="block[]" value="<?php echo $pedigree_plot[$repeat][$i]['block'] ;?>" >
                      <input type="hidden" name="entry[]" value="<?php echo $pedigree_plot[$repeat][$i]['entry'] ;?>" >
                      <input type="hidden" name="repeatedly[]" value="<?php echo $repeat_no ;?>" >
                      <?php } ?>
                      <select class="form-control" name="insect[]">
                        <?php if($insect_data['insect']!=0) { ?>
                        <option value="<?php echo $insect_data['insect'] ?>"><?php echo $insect_data['insect_name'] ?></option>
                        <?php } ?>
                        <option value="">-- เลือก --</option>
                        <?php foreach($get_pest_insect as $pest_insect){ ?>
                        <option value="<?php echo $pest_insect['insect_id'] ?>"><?php echo $pest_insect['insect_name'] ?></option>
                        <?php } ?>
                      </select>
                      <span class="input-group-addon" onClick="add_insect(<?php echo $pedigree_plot[$repeat][$i]['plot_no'].','.$pedigree_plot[$repeat][$i]['block'].','.$pedigree_plot[$repeat][$i]['entry'].','.$repeat_no ;?>);" style=" border-style:dashed;"><a><i class="fa fa-plus-circle"></i></a></span> </div>
                  </div>
                  <?php } ?>
                  <?php }else{ 
					  // if($key == 0) {?>
                  <div class="form-group">
                    <div class="input-group">
                      <select class="form-control" name="insect[]">
                        <option value="">-- เลือก --</option>
                        <?php foreach($get_pest_insect as $pest_insect){ ?>
                        <option value="<?php echo $pest_insect['insect_id'] ?>"><?php echo $pest_insect['insect_name'] ?></option>
                        <?php } ?>
                      </select>
                      <span class="input-group-addon" onClick="add_insect(<?php echo $pedigree_plot[$repeat][$i]['plot_no'].','.$pedigree_plot[$repeat][$i]['block'].','.$pedigree_plot[$repeat][$i]['entry'].','.$repeat_no ;?>);" style=" border-style:dashed;"><a><i class="fa fa-plus-circle"></i></a></span> </div>
                  </div>
                  <?php } ?>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-1 input_insect<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>">
                  <?php if(!empty($get_data[$repeat][$i]['insect_data'])){ ?>
                  <?php foreach($get_data[$repeat][$i]['insect_data'] as $key => $insect_data ){  ?>
                  <div class="form-group insect_data">
                    <div class="input-group">
                      <input type="number" name="value_insect[]"
                        <?php if($insect_data['insect']!=0) { ?>
                            	value="<?php echo $insect_data['value_insect'] ?>"
                        <?php } ?>
                        min="0" max="100" class="form-control"  step="any">
                    </div>
                  </div>
                  <?php } ?>
                  <?php }else{ 
					  	// if($key == 0) {?>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" name="value_insect[]" value=""  max="100" min="0" step="any"  class="form-control">
                    </div>
                  </div>
                  <?php // }
					  		}	?>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>สัตว์(%) </label>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-2 select_animal<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>">
                  <?php if(!empty($get_data[$repeat][$i]['animal_data'])){ ?>
                  <?php foreach($get_data[$repeat][$i]['animal_data'] as $key => $animal_data ){ ?>
                  <div class="form-group animal_data">
                    <div class="input-group">
                      <?php if($key != 0) { ?>
                      <input name="plot_no[]" id="plot_no" type="hidden" value="<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>"  />
                      <input type="hidden" name="value_disease[]" value="" >
                      <input type="hidden" name="value_insect[]" value="" >
                      <input type="hidden" name="disease[]" value="" >
                      <input type="hidden" name="insect[]" value="" >
                      <input type="hidden" name="block[]" value="<?php echo $pedigree_plot[$repeat][$i]['block'] ;?>" >
                      <input type="hidden" name="entry[]" value="<?php echo $pedigree_plot[$repeat][$i]['entry'] ;?>" >
                      <input type="hidden" name="repeatedly[]" value="<?php echo $repeat_no ;?>" >
                      <?php } ?>
                      <select class="form-control" name="animal[]">
                        <?php if($animal_data['animal']!=0) { ?>
                        <option value="<?php echo $animal_data['animal'] ?>"><?php echo $animal_data['animal_name'] ?></option>
                        <?php } ?>
                        <option value="">-- เลือก --</option>
                        <?php foreach($get_pest_animal as $pest_animal){ ?>
                        <option value="<?php echo $pest_animal['animal_id'] ?>"><?php echo $pest_animal['animal_name'] ?></option>
                        <?php } ?>
                      </select>
                      <span class="input-group-addon" onClick="add_animal(<?php echo $pedigree_plot[$repeat][$i]['plot_no'].','.$pedigree_plot[$repeat][$i]['block'].','.$pedigree_plot[$repeat][$i]['entry'].','.$repeat_no ;?> , 1);" style=" border-style:dashed;"><a><i class="fa fa-plus-circle"></i></a></span> </div>
                  </div>
                  <?php } ?>
                  <?php }else{ 
					  	// if($key == 0) {?>
                  <div class="form-group">
                    <div class="input-group">
                      <select class="form-control" name="animal[]">
                        <option value="">- เลือก --</option>
                        <?php foreach($get_pest_animal as $pest_animal){ ?>
                        <option value="<?php echo $pest_animal['animal_id'] ?>"><?php echo $pest_animal['animal_name'] ?></option>
                        <?php } ?>
                      </select>
                      <span class="input-group-addon" onClick="add_animal(<?php echo $pedigree_plot[$repeat][$i]['plot_no'].','.$pedigree_plot[$repeat][$i]['block'].','.$pedigree_plot[$repeat][$i]['entry'].','.$repeat_no ;?> );" style=" border-style:dashed;"><a><i class="fa fa-plus-circle"></i></a></span> </div>
                  </div>
                  <?php // }
					  		}	?>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-1 input_animal<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>">
                  <?php if(!empty($get_data[$repeat][$i]['animal_data'])){ ?>
                  <?php foreach($get_data[$repeat][$i]['animal_data'] as $key => $animal_data ){  ?>
                  <div class="form-group animal_data">
                    <div class="input-group">
                      <input type="number" name="value_animal[]"
                        <?php if($animal_data['animal']!=0) { ?>
                            	value="<?php echo $animal_data['value_animal'] ?>"
                        <?php } ?>
                        min="0" max="100" class="form-control"  step="any">
                    </div>
                  </div>
                  <?php } ?>
                  <?php }else{ 
					  // if($key == 0) {?>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" name="value_animal[]" value=""  max="100" min="0" step="any"  class="form-control">
                    </div>
                  </div>
                  <?php // }
					  		}	?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-hidden">
                  <hr>
                </div>
              </div>
              <?php } ?>
            </div>
            <!-- /.tab-pane -->
            <?php $repeat++; } ?>
            <!-- /.tab-pane --> 
            <!-- /.tab-pane --> 
          </div>
          <!-- /.tab-content --> 
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="add_new_disease" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มข้อมูลตัวเลือก โรคและแมลง</h4>
      </div>
      <div class="modal-body">
      <div class="row"> <br>

            <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center"> 
            <a class="forms-list-name" href="<?php echo site_url('form_disease/add_disease/'.$research_id) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
               	 โรค
                <span class="forms-list-date"> 
                <i class="fa flaticon-germ-sample fa-2x"></i></span></a> </div>
                
                <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center"> 
                <a class="forms-list-name" href="<?php echo site_url('form_disease/add_insect/'.$research_id) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
               	 แมลง
                <span class="forms-list-date"> 
                <i class="fa flaticon-shape fa-2x"></i></span></a> </div>
                
                <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:center"> 
                <a class="forms-list-name" href="<?php echo site_url('form_disease/add_animal/'.$research_id) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
               	 สัตว์
                <span class="forms-list-date"> 
                <i class="fa flaticon-bird37 fa-2x"></i></span></a> </div>
               
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>

<script>
	var clicks = 0;
	function add_disease(x , y , z , a)
	{
		clicks++;
		var count = clicks ;
		var plot_no = x ;
		var block = y ;
		var entry = z ;
		var repeatedly = a ;
		
	  	var select_disease = '.select_disease' + plot_no.toString() ;
		var input_disease = '.input_disease' + plot_no.toString() ;
		
	  				$(select_disease).append(
					'<div class="form-group added_input'+ count +'">'
                     +'   <div class="input-group">'
		             +'       <select class="form-control" name="disease[]">'
                     +'       	<option>-- เลือก --</option>'
                            	<?php foreach($get_pest_disease as $pest_disease){ ?>
		             +'           <option value="<?php echo $pest_disease['disease_id'] ?>"><?php echo $pest_disease['disease_name'] ?></option>'
                               	<?php } ?>
		             +'       </select>'
					 +'		<span class="input-group-addon" onClick="remove_input('+ count +')" style=" border-style:dashed;"><a><i class="fa fa-minus-circle" aria-hidden="true"></i></a></span> </div>'
		             +'   </div>'
                    +'</div>'
					);
					
					$(input_disease).append(
					'<div class="form-group added_input'+ count +'">'
                    +'  <div class="input-group">'
                    +'    <input type="number" name="value_disease[]" value=""  max="100" min="0" step="any"  class="form-control">'
					+'    <input type="hidden" name="value_animal[]" value="" >'
					+'    <input type="hidden" name="value_insect[]" value="" >'
					+'    <input type="hidden" name="animal[]" value="" >'
					+'    <input type="hidden" name="insect[]" value="" >'
					+'	 <input name="plot_no[]" type="hidden" value="'+ plot_no +'"  />'
					+'    <input type="hidden" name="block[]" value="'+ block +'" >'
					+'    <input type="hidden" name="entry[]" value="'+ entry +'" >'
					+'    <input type="hidden" name="repeatedly[]" value="'+ repeatedly +'" >'
                    +'  </div>'
                  	+'</div>'
					);
	}
	
	function add_insect(x , y , z , a)
	{
		clicks++;
		var count = clicks ;
		var plot_no = x ;
		var block = y ;
		var entry = z ;
		var repeatedly = a ;
		
	  	var select_insect = '.select_insect' + plot_no.toString() ;
		var input_insect = '.input_insect' + plot_no.toString() ;
		
	  				$(select_insect).append(
					'<div class="form-group added_input'+ count +'">'
                     +'   <div class="input-group">'
		             +'       <select class="form-control" name="insect[]">'
                     +'       	<option>-- เลือก --</option>'
                            	<?php foreach($get_pest_insect as $pest_insect){ ?>
		             +'           <option value="<?php echo $pest_insect['insect_id'] ?>"><?php echo $pest_insect['insect_name'] ?></option>'
                               	<?php } ?>
		             +'       </select>'
		             +'       <span class="input-group-addon" onClick="remove_input('+ count +');" style=" border-style:dashed;"><a><i class="fa fa-minus-circle" aria-hidden="true"></i></a></span>'
		             +'   </div>'
                    +'</div>'
					);
					
					$(input_insect).append(
					'<div class="form-group added_input'+ count +'">'
                    +'  <div class="input-group">'
                    +'    <input type="number" name="value_insect[]" value="" max="100" min="0" step="any"  class="form-control">'
					+'    <input type="hidden" name="value_animal[]" value="" >'
					+'    <input type="hidden" name="value_disease[]" value="" >'
					+'    <input type="hidden" name="animal[]" value="" >'
					+'    <input type="hidden" name="disease[]" value="" >'
					+'	 <input name="plot_no[]" type="hidden" value="'+ plot_no +'"  />'
					+'    <input type="hidden" name="block[]" value="'+ block +'" >'
					+'    <input type="hidden" name="entry[]" value="'+ entry +'" >'
					+'    <input type="hidden" name="repeatedly[]" value="'+ repeatedly +'" >'
                    +'  </div>'
                  	+'</div>'
					);
	}
	
	function add_animal(x , y , z , a)
	{
		clicks++;
		var count = clicks ;
		var plot_no = x ;
		var block = y ;
		var entry = z ;
		var repeatedly = a ;
		
	  	var select_animal = '.select_animal' + plot_no.toString();
		var input_animal = '.input_animal' + plot_no.toString() ;
		
	  				$(select_animal).append(
					'<div class="form-group added_input'+ count +'">'
                     +'   <div class="input-group">'
					 +'		<input name="plot_no[]" type="hidden" value="'+ plot_no +'"  />'
		             +'       <select class="form-control" name="animal[]">'
                     +'       	<option>-- เลือก --</option>'
                            	<?php foreach($get_pest_animal as $pest_animal){ ?>
		             +'           <option value="<?php echo $pest_animal['animal_id'] ?>"><?php echo $pest_animal['animal_name'] ?></option>'
                               	<?php } ?>
		             +'       </select>'
		             +'       <span class="input-group-addon" onClick="remove_input('+ count +');" style=" border-style:dashed;"><a><i class="fa fa-minus-circle"></i></a></span>'
		             +'   </div>'
                    +'</div>'
					);
					
					$(input_animal).append(
					'<div class="form-group added_input'+ count +'">'
                    +'  <div class="input-group">'
                    +'    <input type="number" name="value_animal[]" value=""  max="100" min="0" step="any"  class="form-control">'
					+'    <input type="hidden" name="value_insect[]" value="" >'
					+'    <input type="hidden" name="value_disease[]" value="" >'
					+'    <input type="hidden" name="insect[]" value="" >'
					+'    <input type="hidden" name="disease[]" value="" >'
					+'    <input type="hidden" name="block[]" value="'+ block +'" >'
					+'    <input type="hidden" name="entry[]" value="'+ entry +'" >'
					+'    <input type="hidden" name="repeatedly[]" value="'+ repeatedly +'" >'
                    +'  </div>'
                  	+'</div>'
					);
	}
	
			

	function remove_input(b)
	{
			var count = b ;
			
			var selected = '.added_input'+ count ;
			//var input_animal = '.input_animal' + plot_no.toString()  ;
			
			$(selected).remove();
			//$(input_animal).remove();
	 

	}

</script>
