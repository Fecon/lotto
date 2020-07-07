<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">

<style>
th {
	text-align: center;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> พันธุ์ข้าว </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('pedigree/add_pedigree') ?>">
        <button class="btn btn-block btn-primary"><i class="fa fa-plus"></i> เพิ่มพันธุ์/สายพันธุ์</button>
        </a></li>
    </ol>
  </section>
  <br />
  <section class="content-header"> <?php echo form_open('pedigree') ?>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-4">
          <div class="has-feedback">
            <input type="text" name="search" class="form-control" placeholder="Search Designation" required >
            <span class="glyphicon glyphicon-search form-control-feedback"></span> </div>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6">
          <div class="btn-group">
            <input type="hidden" name="search_type" value="1">
            <button type="submit" class="btn btn-primary btn-flat">ค้นหา</button>
            <button type="button" id='toggle' class="btn btn-primary btn-flat dropdown-toggle"> <span class="caret"></span> </button>
          </div>
        </div>
        <div class="col-md-1 col-sm-6 col-xs-6" align="right">
          <div class="btn-group"> <a href="<?php echo site_url('pedigree') ?>">
            <button type="button" class="btn btn-danger btn-flat">ล้างคำค้นหา</button>
            </a> </div>
        </div>
      </div>
    </div>
    <?php echo form_close() ?>
    <div class="row target" id="search_div" style="display:none;"> <?php echo form_open('pedigree/search_research') ?>
      <div class="col-md-12">
        <hr style="color:#660; border:solid 1px;" />
        <h4 style="text-decoration:underline;">ค้นหาตามการทดลอง</h4>
        <br />
        <div class="col-md-2">
          <div class="form-group">
            <select class="form-control" name="sign" required>
              <option value="1">มากกว่า</option>
              <option value="2">น้อยกว่า</option>
              <option value="3">เท่ากับ</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <div class="has-feedback">
              <input type="number" name="search" step="any" class="form-control" placeholder="Data values" required>
              <span class="glyphicon glyphicon-search form-control-feedback"></span> </div>
          </div>
        </div>
      </div>
      <br />
      <br />
      <div class="col-md-12">
        <div class="col-md-2">
          <div class="form-group">
            <label>ปี</label>
            <select class="form-control" name="year" style="width: 100%;">
              <option value="" >ทุกปี</option>
              <?php for($i=(date('Y')+543) ; $i >= 2549;$i--){ ?>
              <option value="<?php echo $i ; ?>"><?php echo $i ; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-3">
          <div class="form-group">
            <label>ประเภทการทดลอง</label>
            <select class="form-control" name="type_of_research" id="type_of_research">
              <option value="" >ทุกประเภท</option>
              <?php foreach($type_of_research as $value_tor){
							echo '<option value="'.$value_tor['tor_id'].'">'.$value_tor['tor_name'].'</option>';
					} ?>
            </select>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-3">
          <div class="form-group">
            <label>สถานที่การทดลอง</label>
            <select class="form-control" name="department" style="width: 100%;">
              <option value="" >ทุกศูนย์</option>
              <?php foreach($get_department as $department){ ?>
              <option value="<?php echo $department['dep_no'] ?>"><?php echo $department['dep_name'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>การทดลอง</label>
            <select class="form-control" name="form_research" style="width: 100%;" required >
              <option value="">เลือก...</option>
              <option value="form_bloom">วันออกดอก</option>
              <option value="form_high">ความสูง</option>
              <option value="form_tree_grove">จำนวนต้นต่อกอ</option>
              <option value="form_awn_grove">จำนวนรวงต่อกอ</option>
              <option value="form_seed_good">จำนวนเมล็ดดีต่อรวง</option>
              <option value="form_product">ผลผลิต</option>
            </select>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <label>&nbsp;</label>
            <input type="hidden" name="search_type" value="2">
            <button type="submit" class="btn btn-primary btn-flat">ค้นหา</button>
          </div>
        </div>
      </div>
      <?php echo form_close() ?> <?php echo form_open('pedigree') ?>
      <div class="col-md-12" style="display:none;">
        <hr style="color:#360; border:solid 1px;" />
        <h4 style="text-decoration:underline;">ค้นหาตามการทดสอบ</h4>
        <br />
        <div class="col-md-2">
          <div class="form-group">
            <select class="form-control" name="sign" required>
              <option value="1">มากกว่า</option>
              <option value="2">น้อยกว่า</option>
              <option value="3">เท่ากับ</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <div class="has-feedback">
              <input type="text" name="search" class="form-control" placeholder="Data values" required>
              <span class="glyphicon glyphicon-search form-control-feedback"></span> </div>
          </div>
        </div>
      </div>
      <div class="col-md-12" style="display:none;">
        <div class="col-md-5">
          <div class="form-group">
            <label>การทดสอบพันธุ์ / สายพันธุ์</label>
            <select class="form-control" style="width: 100%;" id="test_type" name="test_type" onchange="select_type()">
              <option disabled selected>เลือก...</option>
              <option value="1">ปฏิกิริยาความต้านทานโรคและแมลง</option>
              <option value="2">คุณภาพเมล็ดทางกายภาพ</option>
              <option value="3">คุณภาพเมล็ดทางเคมี</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>&nbsp;</label>
            <select class="form-control" id="test_subtype" name="test_subtype" style="width: 100%;" onchange="select_column()">
              <option disabled selected>เลือก...</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>&nbsp;</label>
            <select class="form-control" id="column" name="column" style="width: 100%;">
              <option disabled selected>เลือก...</option>
            </select>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <label>&nbsp;</label>
            <input type="hidden" name="search_type" value="3">
            <button type="submit" class="btn btn-primary btn-flat">ค้นหา</button>
          </div>
        </div>
      </div>
      <?php echo form_close() ?> </div>
  </section>
  <br>
  
  <!-- Main content -->
  <section class="content"> 
    <!-- Default box -->
    <div class="row">
      <div class="col-md-12"> 
        <!-- Horizontal Form -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">รายชื่อพันธุ์/สายพันธุ์</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body"> 
            <!-- /.box-tools -->
            
            <div class="row">
              <div class="col-md-12">
                <table id="seed_list" class="table table-hover table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Designation</th>
                      <th>Source</th>
                      <th>Cross</th>
                      <th>Traits</th>
                      <th>Seed source</th>
                      <th>Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
				$num_seed = 1;
                foreach($get_pedigree as $value) { ?>
                    <tr>
                      <td><?php echo $num_seed ?></td>
                      <td><a href="<?php echo site_url('pedigree/index/'.$value['pedigree_id']."/research") ?>"><?php echo $value['designation']; ?></a></td>
                      <td><?php echo $value['source']; ?></td>
                      <td style="width:20%;word-break: break-all;"><?php echo $value['cross_name']; ?></td>
                      <td><?php echo $value['traits']; ?></td>
                      <td><?php echo $value['seed_source']; ?></td>
                      <td><div align="center"><a href="<?php echo site_url('pedigree/index/'.$value['pedigree_id']) ?>"><i class="fa fa-wrench"></i></a></div></td>
                    </tr>
                    <?php $num_seed++;} ?>
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
  </section>
</div>
<?php
	if (isset($pedigree_research)) {
?>
<div id="pedigree_research" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header blue-bg">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">รายชื่อการทดลอง</h4>
      </div>
      <?php $attributes = array('class' => 'form-horizontal');
				echo form_open('#',$attributes);?>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <table id="research_list" class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ชื่อการทดลอง</th>
                  <th>ปี</th>
                  <th>ศูนย์วิจัย</th>
                </tr>
              </thead>
              <tbody>
              <?php if(!empty($pedigree_research)){
					foreach($pedigree_research as $key => $value_research) { ?>
                <tr>
                  <td><?php echo $key+1 ?></td>
                  <td><a href="<?php echo site_url('research/form_index/'.$value_research['research_id']) ?>"><?php echo $value_research['research_name'] ?></a></td>
                  <td align="center"><?php echo $value_research['research_year']; ?></td>
                  <td align="center"><?php echo $value_research['dep_shotname_th'] ?></td>
                </tr>
                <?php }
			  }else{ 
              		echo '<tr><td></td><td align="center">ไม่มีข้อมูลการทดลอง</td><td></td><td></td></tr>';
			  }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves" data-dismiss="modal" style=" width:200px;">ปิด</button>
      </div>
      <?php echo form_close(); ?> </div>
  </div>
</div>
<?php  }  ?>
<?php
	if (isset($pedigree_detail)) {
?>
<div id="myModal" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header blue-bg">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">แก้ไขพันธุ์/สายพันธุ์</h4>
      </div>
      <?php $attributes = array('class' => 'form-horizontal');
			echo form_open('pedigree/update_pedigree',$attributes);?>
      <div class="modal-body">
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">Source :</label>
          <div class="col-sm-10">
            <input type="text" name="source" class="form-control" id="" placeholder="" required="required" value="<?php echo $pedigree_detail[0]['source'] ?>"  >
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">Cross : </label>
          <div class="col-sm-10">
            <input type="text" name="cross_name" class="form-control" id="" placeholder="" value="<?php echo $pedigree_detail[0]['cross_name'] ?>"  >
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">Designation : </label>
          <div class="col-sm-10">
            <input type="text" name="designation" class="form-control" id="" placeholder="" required="required" value="<?php echo $pedigree_detail[0]['designation'] ?>" >
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">Seed Source : </label>
          <div class="col-sm-10">
            <input type="text" name="seed_source" class="form-control" id="" placeholder="" value="<?php echo $pedigree_detail[0]['seed_source'] ?>" >
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">Traits : </label>
          <div class="col-sm-10">
            <input type="text" name="traits" class="form-control" id="" placeholder="" value="<?php echo $pedigree_detail[0]['traits'] ?>" >
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="pedigree_id" value="<?php echo $pedigree_detail[0]['pedigree_id'] ?>"  >
          <button type="button" class="btn btn-default waves" data-dismiss="modal" style=" width:200px;">ยกเลิก</button>
          <button type="submit" class="btn btn-primary" style=" width:200px;">บันทึก</button>
        </div>
        <?php echo form_close(); ?> </div>
    </div>
  </div>
</div>
<?php  }  ?>

<!-- DataTables --> 

<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script> 

<script>
function select_type() {
  var type = document.getElementById("test_type").value;
  $.ajax({
  					url:"<?php echo site_url('pedigree/select_test_type');?>/"+type,
  					type:"POST",                                        					
            data:{},
  					dataType:"json",
  					success:function(res) {	
              var cou = 0;
              $("#test_subtype").html("");
			  $("#column").html("");
				
						  $(res).each(function(cou) {
              
              var tag = "<option value='"+res[cou].id+"'>"+res[cou].name+"</option>";
              $(tag).appendTo("#test_subtype");
                                                });
					   },
					   error:function(err) {
						  alert("error");
					   }                                      
				  });
}
function select_column() {
  var type = document.getElementById("test_subtype").value;
  var maintype = document.getElementById("test_type").value;
  $.ajax({
  					url:"<?php echo site_url('pedigree/select_column');?>/"+maintype+"/"+type,
  					type:"POST",                                        					
            data:{},
  					dataType:"json",
  					success:function(res) {	
              var cou = 0;
              $("#column").html("");
				
						  $(res).each(function(cou) {
              
              var tag = "<option value='"+res[cou].id+"'>"+res[cou].name+"</option>";
              $(tag).appendTo("#column");
                                                });
					   },
					   error:function(err) {
						  alert("error");
					   }                                      
				  });
}


$(function () {
	$("#seed_list").DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }
        ]
    });
	$("#research_list").DataTable();
});
	  

$("#toggle").click(function(){
    var $target = $('.target'),
        $toggle = $(this);

    $target.slideToggle( 500, function () {
		$toggle.html(($target.is(':visible') ? '<i class="fa fa-caret-up" aria-hidden="true"></i>' : '<i class="fa fa-caret-down" aria-hidden="true"></i>'));
    });
});

    $(document).ready(function(){
        $("#myModal").modal('show');
		$("#pedigree_research").modal('show');
    });
</script> 
