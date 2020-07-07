<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">
<style>
th {
	text-align: center;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1> ส่งออกข้อมูลวิเคราะห์ </h1>
  
</section><br />

<section class="content-header">
<br />
<div class="box box-success">
<?php $attributes = array('target' => '_blank', 'id' => 'myform');
		echo form_open('report/export',$attributes); ?>
                <div class="box-header with-border">
                  <h3 class="box-title">เลือกข้อมูลวิเคราะห์</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php echo form_open('pedigree') ?>
                  <div class="row">
        <div class="col-md-2">
          <div class="form-group">
            <label>ปี</label>
            <select class="form-control" name="year" id="year" style="width: 100%;" onchange="filter_research()" required>
              <option value="" >เลือก...</option>
              <?php for($i=(date('Y')+543) ; $i >= 2549;$i--){ ?>
              <option value="<?php echo $i ; ?>"><?php echo $i ; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-2">
          <div class="form-group">
            <label>ประเภทการทดลอง</label>
            <select class="form-control" name="type_of_research" id="type_of_research" onchange="filter_research()" >
              <option value="" >เลือก...</option>
              <?php foreach($type_of_research as $value_tor){
							echo '<option value="'.$value_tor['tor_id'].'">'.$value_tor['tor_name'].'</option>';
					} ?>
            </select>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-2">
          <div class="form-group">
            <label>สถานที่การทดลอง</label>
            <select class="form-control" name="department" id="department" style="width: 100%;" onchange="filter_research()" required>
            	<option value="" >เลือก...</option>
              <?php foreach($get_department as $department){ ?>
              <option value="<?php echo $department['dep_no'] ?>"><?php echo $department['dep_name'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-6">
                  <div class="form-group">
                    <label>ชื่อโครงการ</label>
                    <select class="form-control" name="research" id="research" required>
                    <option disabled selected>เลือก...</option>
            		</select>
                  </div><!-- /.form-group -->
                  <!-- /.form-group -->
                </div>
        <div class="col-md-2 col-md-offset-5 col-sm-12 col-xs-12">
<div class="form-group"><label>&nbsp;</label>

                      <button type="submit" class="btn btn-primary btn-flat"  style="width: 100%;"><i class="fa fa-download" aria-hidden="true"></i> ดาวน์โหลด</button>
                      
                    </div>
                    </div>

                  </div>
                  <?php echo form_close(); ?>
                </div>
              </div><!-- /.box -->

</section>

<!-- Main content -->
<section class="content">
          <!-- /.row -->

        </section>
</div>
<script>

function filter_research() {
  var year = document.getElementById("year").value;
  var tor = document.getElementById("type_of_research").value;
  var department = document.getElementById("department").value;
  $.ajax({
  					url:"<?php echo site_url('report/filter_research');?>/"+year+"/"+tor+"/"+department,
  					type:"POST",                                        					
           			data: $('form').serialize(),
  					dataType:"json",
  					success:function(res) {	
              var cou = 0;
              $("#research").html("");
				
						  $(res).each(function(cou) {
              
              var tag = "<option value='"+res[cou].id+"'>"+res[cou].name+"</option>";
              $(tag).appendTo("#research");
                                                });
					   },
					   error:function(err) {
						  alert("error");
					   }                                      
				  });
}

</script>