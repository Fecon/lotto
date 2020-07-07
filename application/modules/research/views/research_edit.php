<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">

<!-- multi select -->
<link href="<?php echo base_url()?>assets/plugins/multiselect/css/multiselect.css" media="screen" rel="stylesheet" type="text/css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> แก้ไขหัวข้อการทดลอง </h1>
    <ol class="breadcrumb">
    </ol>
  </section>
  <br>
  
  <!-- Main content -->
  <section class="content"> 
    <!-- Default box -->
    <?php 
			$attributes = array('class' => 'form-horizontal');  
			echo form_open('research/research_ctrl/edit_research_each',$attributes);
	?>
    <div class="row">
      <div class="col-md-12"> 
        
        <!-- Horizontal Form -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">1. รายละเอียดการทดลอง</h3>
          </div>
          <!-- /.box-header --> 
          <!-- form start -->
          
          <div class="box-body">
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">ชื่อการทดลอง</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="research_name" id="research_name" placeholder="" required="required" onchange="add_seesion()"
            <?php 
				if(isset($research_detail)){
					echo ' value="'.$research_detail['research_name'].'"';
				}
			?> >
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">นิเวศการปลูกข้าว</label>
              <div class="col-sm-3">
                <select class="form-control" required="required" name="type_of_ecology" id="type_of_ecology"  onchange="add_seesion()">
                  <?php foreach($type_of_ecology as $value_toe){
					if(isset($research_detail)&&$research_detail['type_of_ecology']==$value_toe['toe_id']){
						echo '<option selected="selected" value="'.$research_detail['type_of_ecology'].'">'.$value_toe['toe_name'].'</option>';
					}else{
						echo '<option value="'.$value_toe['toe_id'].'">'.$value_toe['toe_name'].'</option>';
					}
					
					
				} 
			?>
                </select>
              </div>
              <label for="" class="col-sm-2 control-label">ประเภท</label>
              <div class="col-sm-5">
                <select class="form-control" name="type_of_research" id="type_of_research" onchange="add_seesion()">
                  <?php foreach($type_of_research as $value_tor){
				  		if(isset($research_detail)&&$research_detail['type_of_research']==$value_tor['tor_id']){
						echo '<option selected="selected" value="'.$research_detail['type_of_research'].'">'.$value_tor['tor_name'].'</option>';
					}else{
						echo '<option value="'.$value_tor['tor_id'].'">'.$value_tor['tor_name'].'</option>';
					}
									
							} ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">ผู้ดำเนินการ </label>
              <div class="col-sm-3">
                <select class="form-control select2" style="width: 100%;"  name="user_id" id="user_id" required multiple="multiple" >
                  <?php foreach($list_user as $user){ ?>
                  <option value="<?php echo $user['user_id'] ; ?>" 
				  <?php if (in_array($user['user_id'],$user_seleted)){
					  		echo ' selected="selected"';
				 		 }
				  ?>
                   ><?php echo $user['name'] ; ?></option>
                  <?php } ?>
                </select>
              </div>
              <label for="" class="col-sm-2 control-label">ปี พ.ศ.</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="research_year" id="research_year" placeholder="" required="required" onchange="add_seesion()"
            <?php 
				if(isset($research_detail)){
					echo ' value="'.$research_detail['research_year'].'"';
				}
			?> >
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">สถานที่ทำการทดลอง </label>
              <div class="col-sm-5">
                <select class="form-control" name="dep_no" id="dep_no" onchange="add_seesion()" data-placeholder="เลือกศูนย์วิจัย..." style="width: 100%;" required >
                  <?php foreach($department_all as $dept_all){ ?>
                  <optgroup label="<?php echo $dept_all['GEO_NAME'] ; ?>">
                  <?php foreach($dept_all['department_list'] as $department){ ?>
                  <?php 
					  		if($research_detail['dep_no']==$department['dep_no']){
								echo '<option selected="selected" value="'.$department['dep_no'].'">'.$department['dep_name'].'</option>';
							}else{
								echo '<option value="'.$department['dep_no'].'">'.$department['dep_name'].'</option>';
							}
					  ?>
                  <?php } ?>
                  </optgroup>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">ขนาดแปลงปลูก </label>
              <div class="col-sm-3">
                <div class="row">
                  <div class="col-sm-5">
                    <input type="number" min="0" class="form-control" step="any" name="plot_width" id="plot_width" placeholder=""  onchange="add_seesion()"
                <?php 
				if(isset($research_detail)){
					echo ' value="'.$research_detail['plot_width'].'"';
				}
				?>  />
                  </div>
                  <label for="" class="col-sm-1 control-label">x </label>
                  <div class="col-sm-5">
                    <input type="number" min="0" class="form-control" step="any" name="plot_height" id="plot_height" placeholder=""  onchange="add_seesion()"
                <?php 
				if(isset($research_detail)){
					echo ' value="'.$research_detail['plot_height'].'"';
				}
				?>  />
                  </div>
                </div>
              </div>
              <label for="" class="col-sm-1 control-label">เมตร </label>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">จำนวนแถวปักดำ </label>
              <div class="col-sm-3">
                <input type="number" min="0" class="form-control" name="rows_rice" id="rows_rice" placeholder="" onchange="add_seesion()"
            <?php 
				if(isset($research_detail)){
					echo ' value="'.$research_detail['rows_rice'].'"';
				}
				?> >
              </div>
              <label for="" class="col-sm-1 control-label">แถว </label>
              <label for="" class="col-sm-2 control-label">แถวละ </label>
              <div class="col-sm-3">
                <input type="number" min="0" class="form-control" name="rice_num" id="rice_num" placeholder="" onchange="add_seesion()"
            <?php 
				if(isset($research_detail)){
					echo ' value="'.$research_detail['rice_num'].'"';
				}
				?> >
              </div>
              <label for="" class="col-sm-1 control-label">กอ </label>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">ระยะระหว่างแถว </label>
              <div class="col-sm-3">
                <input type="number" min="0" class="form-control" name="rows_distance" id="rows_distance" placeholder="" onchange="add_seesion()"
            <?php 
				if(isset($research_detail)){
					echo ' value="'.$research_detail['rows_distance'].'"';
				}
				?> >
              </div>
              <label for="" class="col-sm-1 control-label">ซม. </label>
              <label for="" class="col-sm-2 control-label">ระยะระหว่างกอ </label>
              <div class="col-sm-3">
                <input type="number" min="0" class="form-control" name="grove_distance" id="grove_distance" placeholder="" onchange="add_seesion()"
            <?php 
				if(isset($research_detail)){
					echo ' value="'.$research_detail['grove_distance'].'"';
				}
				?> >
              </div>
              <label for="" class="col-sm-1 control-label">ซม. </label>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">พื้นที่เก็บเกี่ยว </label>
              <div class="col-sm-3">
                <div class="row">
                  <div class="col-sm-5">
                    <input type="number" min="1" class="form-control" step="any" name="length_harvest" id="length_harvest" placeholder=""  onchange="add_seesion()"
                <?php 
				if(isset($research_detail)){
					echo ' value="'.$research_detail['length_harvest'].'"';
				}
				?>  />
                  </div>
                </div>
              </div>
              <label for="" class="col-sm-1 control-label">ตร.ม. </label>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">จำนวนแถวเก็บเกี่ยว </label>
              <div class="col-sm-3">
                <input type="number" min="0" class="form-control" name="rows_harvest" id="rows_harvest" placeholder="" onchange="add_seesion()"
            <?php 
				if(isset($research_detail)){
					echo ' value="'.$research_detail['rows_harvest'].'"';
				}
				?> >
              </div>
              <label for="" class="col-sm-1 control-label">แถว </label>
              <label for="" class="col-sm-2 control-label">แถวละ </label>
              <div class="col-sm-3">
                <input type="number" min="0" class="form-control" name="num_harvest" id="num_harvest" placeholder="" onchange="add_seesion()"
            <?php 
				if(isset($research_detail)){
					echo ' value="'.$research_detail['num_harvest'].'"';
				}
				?> >
              </div>
              <label for="" class="col-sm-1 control-label">กอ</label>
            </div>
          </div>
          <!-- /.box-body --> 
          <!-- /.box-footer --> 
          
        </div>
        <!-- /.box --> 
      </div>
    </div>
    <!-- /.box -->
    
    <div class="row">
      <div class="col-md-12"> 
        <!-- Horizontal Form -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">2. คัดเลือกพันธุ์/สายพันธุ์ในการทดลอง</h3>
          </div>
          <!-- /.box-header --> 
          <!-- form start -->
          <div class="box-body">
            <div class="form-group">
              <div class="col-sm-6">
                <button type="button" class="btn btn-block btn-success btn-flat" data-toggle="modal" data-target="#check_pedigree"> <i class="fa fa-check-square-o"></i> เลือกพันธุ์/สายพันธุ์ </button>
                <hr style=" border-color:#360">
              </div>
              <div class="col-sm-6">
                <button type="button" class="btn btn-block btn-default btn-flat" style=" border-style:dashed;"  data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus"></i> เพิ่มพันธุ์/สายพันธุ์ใหม่ </button>
                <hr style=" border-color:#069">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12" align="center"> <span style="text-decoration:underline">พันธุ์/สายพันธุ์ที่เลือก</span> </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <table id="seed_list" class="table table-hover table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Source</th>
                      <th>Cross</th>
                      <th>Designation</th>
                      <th>Traits</th>
                      <th>Seed source</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(isset($get_pedigree_selected)){
								$pedigree_rows = $get_pedigree_selected ;
							}else{
								$pedigree_rows = $pedigree_selected ;
							}
							$num_seed = 1;
                            foreach($pedigree_rows as $value_selected) { 
							?>
                    <tr>
                      <td><?php echo $num_seed ?></td>
                      <td><?php echo $value_selected['source']; ?></td>
                      <td><?php echo $value_selected['cross_name']; ?></td>
                      <td><a href="#"><?php echo $value_selected['designation']; ?></a></td>
                      <td><?php echo $value_selected['traits']; ?></td>
                      <td><?php echo $value_selected['seed_source']; ?></td>
                    </tr>
                    <?php $num_seed++;} 
							?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.box-body --> 
          <!-- /.box-footer --> 
        </div>
        <!-- /.box --> 
      </div>
    </div>
    <div class="row">
      <div class="col-md-12"> 
        <!-- Horizontal Form -->
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">3. กำหนดแผนผังสุ่ม</h3>
          </div>
          <!-- /.box-header -->
          
          <div class="box-body">
            <div class="row">
              <div class="form-group">
                <label for="" class="col-sm-2 control-label">จำนวนพันธุ์/สายพันธุ์</label>
                <div class="col-sm-2">
                  <input type="number" min="0" class="form-control" name="pedigree_amount" id="pedigree_amount" placeholder="" readonly="readonly" value="<?php 
						  if(isset($get_pedigree_selected)){
							  echo count($get_pedigree_selected);
						  }else{
							  echo count($pedigree_selected);
						}
				   
				  ?>" >
                </div>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="form-group">
                <label for="" class="col-sm-2 control-label">แผนการทดลองแบบ </label>
                <div class="col-sm-10">
                  <div class="radio">
                    <label>
                      <input type="radio" name="type_of_plan" id="type_of_plan" value="Alpha Lattice" onclick="add_seesion()"
                  <?php 
				if(isset($research_detail)){
					if($research_detail['type_of_plan']=='Alpha Lattice'){
						echo 'checked="checked"';
					}
				}
				?> >
                      Alpha Lattice </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="type_of_plan" id="type_of_plan" value="RCB" onclick="add_seesion()"
                  <?php 
				if(isset($research_detail)){
					if($research_detail['type_of_plan']=='RCB'){
						echo 'checked="checked"';
					}
				}
				?> >
                      RCB </label>
                  </div>
                </div>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="form-group">
                <label for="" class="col-sm-2 control-label">จำนวน Plot ต่อ Block </label>
                <div class="col-sm-2">
                  <input type="number" min="0" class="form-control" name="block_amount" id="block_amount" placeholder="" onchange="add_seesion()"
              <?php 
				if(isset($research_detail)){
					echo ' value="'.$research_detail['block_amount'].'"';
				}else{
					echo ' value="0"';
				}
				?> >
                </div>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="form-group">
                <label for="" class="col-sm-2 control-label">จำนวนซ้ำ </label>
                <div class="col-sm-2">
                  <input type="number" min="0" class="form-control" name="repeat_amount" id="repeat_amount" placeholder="" onchange="add_seesion()"
              <?php 
				if(isset($research_detail)){
					echo ' value="'.$research_detail['repeat_amount'].'"';
				}
				?> >
                </div>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="form-group">
                <label for="" class="col-sm-2 control-label">การจัดเรียง Entry </label>
                <div class="col-sm-10">
                  <div class="radio">
                    <label>
                      <input type="radio" name="entry_type" id="entry_type" value="1" onclick="add_seesion()"
                  <?php 
				if(isset($research_detail)){
					if($research_detail['entry_type']=='1'){
						echo 'checked="checked"';
					}
				}
				?> >
                      สุ่มอัตโนมัติ </label>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="entry_type" id="entry_type" value="3" onclick="add_seesion()"
                  <?php 
				if(isset($research_detail)){
					if($research_detail['entry_type']=='3'){
						echo 'checked="checked"';
					}
				}
				?> >
                      หัวหน้าโครงการกำหนด </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="entry_type" id="entry_type" value="2" onclick="add_seesion()"
                  <?php 
				if(isset($research_detail)){
					if($research_detail['entry_type']=='2'){
						echo 'checked="checked"';
					}
				}
				?> >
                      กำหนดเอง </label>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div align="center">
                <input type="hidden" value="<?php echo $research_id ?>" name="research_id">
                <button type="submit" class="btn btn-lg btn-primary" style=" width:250px;">บันทึก</button>
              </div>
            </div>
            <!-- /.box-footer --> 
          </div>
          <!-- /.box --> 
        </div>
      </div>
    </div>
    <div id="update_session"></div>
    <?php echo form_close();?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">เพิ่มพันธุ์/สายพันธุ์</h4>
          </div>
          <?php $attributes = array('class' => 'form-horizontal');
				echo form_open('research/research_ctrl/insert_pedigree',$attributes);?>
          <div class="modal-body">
            <div class="box-body">
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Source :</label>
                <div class="col-sm-9">
                  <input type="text" name="source" class="form-control" id="" placeholder="" required="required">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Cross : </label>
                <div class="col-sm-9">
                  <input type="text" name="cross_name" class="form-control" id="" placeholder="" required="required">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Designation : </label>
                <div class="col-sm-9">
                  <input type="text" name="designation" class="form-control" id="" placeholder="" required="required">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Seed Source : </label>
                <div class="col-sm-9">
                  <input type="text" name="seed_source" class="form-control" id="" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Traits : </label>
                <div class="col-sm-9">
                  <input type="text" name="traits" class="form-control" id="" placeholder="">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" value="<?php echo $research_id ?>" name="research_id">
            <button type="submit" class="btn btn-primary" style=" width:200px;">บันทึก</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          <?php echo form_close();?> </div>
      </div>
    </div>
    <div class="modal fade" id="check_pedigree" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">รายชื่อพันธุ์/สายพันธุ์</h4>
          </div>
          <?php 
		  		$attr = array('id'=>'form_add_pedigree');
              	echo form_open('#', $attr);
		  ?>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="box-body" ><br />
                  <div class="mailbox-messages" >
              <table id="seed_add" class="table table-hover table-striped">
                <thead>
                <th style="width:10%" align="center"><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                  <th style="width:20%">Source</th>
                  <th style="width:25%">Designation</th>
                  <th style="width:20%">Cross</th>
                  <th style="width:15%">Traits</th>
                  <th style="width:10%">Seed source</th>
                    </thead>
                <tbody>
                        <?php 
                            $num_seed = 1;
							
                            foreach($get_pedigree as $value_pedigree) { ?>
                        <tr>
                          <td><input type="checkbox" class="pedigree_checkbox" name="pedigree_id[]" value="<?php echo $value_pedigree['pedigree_id']; ?>"
                        <?php 
							if(isset($all_session['pedigree_selected'])){
								if(in_array($value_pedigree['pedigree_id'],$all_session['pedigree_selected'])){
									echo ' checked="checked"';
								}
							}else{
								if(in_array($value_pedigree['pedigree_id'],$pedigree_selected)){
									echo ' checked="checked"';
								}
							}
						?>></td>
                          <td><a href="#"><?php echo $value_pedigree['source']; ?></a></td>
                          <td><a href="read-mail.html"><?php echo $value_pedigree['designation']; ?></a></td>
                          <td style="width:20%;word-break: break-all;"><?php echo $value_pedigree['cross_name']; ?></td>
                          <td><?php echo $value_pedigree['traits']; ?></td>
                          <td><?php echo $value_pedigree['seed_source']; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    
                    <!-- /.table --> 
                  </div>
                  <!-- /.mail-box-messages --> 
                </div>
                <!-- /.box-body --> 
                <!-- /. box --> 
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" value="<?php echo $research_id ?>" name="research_id">
            <button type="submit" class="btn btn-primary" style=" width:200px;">บันทึก</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">&nbsp;&nbsp;&nbsp; ปิด &nbsp;&nbsp;&nbsp;</button>
          </div>
        </div>
        <?php echo form_close();?> </div>
    </div>
  </section>
</div>
<!-- DataTables --> 
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<!-- Select2 --> 
<script src="<?php echo base_url()?>assets/plugins/select2/select2.full.min.js"></script> 

<script>
$(document).ready(function(){
	$(function () {
        $("#seed_list").DataTable();
	});

	  
	$("form#form_add_pedigree").submit(function(e) {
    e.preventDefault();
    var table = $("#seed_add").DataTable();
    var data = table.$("input[type='checkbox']").serialize();
    var url ="<?php echo site_url('research/research_ctrl/edit_pedigree_temp');?>";

    $.ajax({
              url: url,
              type: "POST",
              data: data,
              cache: false,
              success: function(rs) {
                console.log(rs);
                window.location="<?php echo site_url('research/research_edit/'.$research_id);?>";
              },

              error: function(rs) {
                console.log(rs);
              }
    });

  });
  		});

    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').focus()
    });
	
	$('#check_pedigree').on('shown.bs.modal', function () {
      $('#myInput').focus()
    });
</script> 

<!-- Page Script --> 
<script>
      $(function () {
		  //Initialize Select2 Elements
        $(".select2").select2();
        //Enable iCheck plugin for checkboxes
      });

	function add_seesion() {
		
		var research_name = document.getElementById('research_name').value;
		var research_year = document.getElementById('research_year').value;
		var type_of_ecology = document.getElementById('type_of_ecology').value ;
		var type_of_research = document.getElementById('type_of_research').value ;
		var dep_no = document.getElementById('dep_no').value ;
		var user_id = document.getElementById('user_id').value ;
		var plot_width = document.getElementById('plot_width').value ;
		var plot_height = document.getElementById('plot_height').value ;
		var rows_rice = document.getElementById('rows_rice').value ;
		var rice_num = document.getElementById('rice_num').value ;
		var rows_distance = document.getElementById('rows_distance').value ;
		var grove_distance = document.getElementById('grove_distance').value ;
		var rows_harvest = document.getElementById('rows_harvest').value ;
		var num_harvest = document.getElementById('num_harvest').value ;
		var length_harvest = document.getElementById('length_harvest').value ;
		var block_amount = document.getElementById('block_amount').value ;
		var repeat_amount = document.getElementById('repeat_amount').value ;
		var entry_type_checked = document.getElementsByName('entry_type') ;
		var type_of_plan_checked = document.getElementsByName('type_of_plan') ;
		
		for (var i = 0, length = entry_type_checked.length; i < length; i++) {
			if (entry_type_checked[i].checked) {
					var entry_type = entry_type_checked[i].value ;
					break;
				}
		}
		for (var j = 0, length = type_of_plan_checked.length; j < length; j++) {
			if (type_of_plan_checked[j].checked) {
					var type_of_plan = type_of_plan_checked[j].value ;
					break;
				}
		}
		

		$.ajax({
		type: "POST",
		url: "<?php echo site_url('research/research_ctrl/update_session') ?>",
		
		data: { research_name: research_name, 
				research_year: research_year, 
				type_of_ecology: type_of_ecology, 
				type_of_research:type_of_research, 
				dep_no:dep_no,
				user_id: user_id, 
				plot_width: plot_width, 
				plot_height: plot_height, 
				rows_rice:rows_rice, 
				rice_num:rice_num,
				rows_distance: rows_distance, 
				grove_distance: grove_distance, 
				rows_harvest: rows_harvest, 
				num_harvest:num_harvest, 
				length_harvest: length_harvest, 
				block_amount: block_amount, 
				repeat_amount:repeat_amount, 
				entry_type:entry_type,
				type_of_plan: type_of_plan
			 },
		success: function(data){
			$("#update_session").html(data);
		}
		
			
		});

	}
	
	var table = $('#seed_add').DataTable({
			displayLength: 25,
			responsive: true
		});
   // Handle click on "Select all" control
   $('#example-select-all').on('click', function(){
      // Get all rows with search applied
      var rows = table.rows({ 'search': 'applied' }).nodes();
      // Check/uncheck checkboxes for all rows in the table
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
   });

   // Handle click on checkbox to set state of "Select all" control
   $('#seed_add tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#example-select-all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
   });
</script>