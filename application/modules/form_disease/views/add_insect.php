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
    <h1> โรค </h1>
    <ol class="breadcrumb  row-hidden">
      <li><a  href="<?php echo site_url('form_disease/index/'.$research_id) ?>" class="btn btn-social-icon btn-linkedin" style="color:#FFF; border-color:#FFF;"><i class="fa fa-list"></i></a></li>
    </ol>
  </section>
  <br>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('research') ?>">หน้าแรก</a></li>
    <li><a href="<?php echo site_url('form_disease/index/'.$research_id) ?>">ศัตรูพืช</a></li>
    <li><a href="#">เพิ่มตัวเลือก</a></li>
  </ol>
  <!-- Main content -->
  <section class="content"> 
    <!-- Default box -->
    <div class="row">
      <div class="col-md-12"> 
        <!-- Horizontal Form -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">รายชื่อแมลง</h3>
            <div align="right">
              <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#modalMd"><i class="fa fa-plus"></i> เพิ่มข้อมูลแมลง</button>
            </div>
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
                      <th>ชื่อ</th>
                      <th>สถานะ</th>
                      <th>จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
				$num = 1;
                foreach($get_pest_insect as $value) { ?>
                    <tr>
                      <td><?php echo $num ?></td>
                      <td><a href="#"><?php echo $value['insect_name']; ?></a></td>
                      <td align="center"><?php if($value['insect_status']==1){
						  			echo '<span class="label label-success">Active</span>' ;
								}else{
									echo '<span class="label label-danger">Inactive</span>' ;
								}?></td>
                      <td style="width:20%" align="center"><a href="<?php echo site_url('form_disease/update_insect/'.$value['insect_id'].'/'.$value['insect_status'].'/'.$research_id) ?>"> <i class="fa fa-refresh" aria-hidden="true"></i> </a> &nbsp;&nbsp; <a href="<?php echo site_url('form_disease/del_insect/'.$value['insect_id'].'/'.$research_id) ?>" onclick="return confirm('ยืนยันการลบ ใช่หรือไม่ ?')"> <i class="fa fa-times" aria-hidden="true"></i> </a></td>
                    </tr>
                    <?php $num++;} ?>
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
<!-- DataTables -->

<div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-info" id="myModalLabel5">เพิ่มข้อมูลโรค</h4>
      </div>
      <?php echo form_open('form_disease/insert_insect')?>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="blog blog-info">
              <div class="blog-body">
                <div class="form-group">
                  <div class="row">
                    <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                      <label class="control-label">ชื่อแมลง : </label>
                    </div>
                    <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                      <input type="text" class="form-control" name="name" value=""  required="required" />
                    </div>
                  </div>
                </div>
                <br>
                <div class="form-group" align="center">
                  <div class="row">
                    <input type="hidden" class="form-control" name="research_id" value="<?php echo $research_id ?>" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> ยกเลิก</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> บันทึก</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php echo form_close(); ?> </div>
  </div>
</div>
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script>
      $(function () {
        $("#seed_list").DataTable();
      });
	  
    </script> 
<script>
$("#toggle").click(function(){
    var $target = $('.target'),
        $toggle = $(this);

    $target.slideToggle( 500, function () {
		$toggle.html(($target.is(':visible') ? '<i class="fa fa-caret-up" aria-hidden="true"></i>' : '<i class="fa fa-caret-down" aria-hidden="true"></i>'));
    });
});
</script> 
