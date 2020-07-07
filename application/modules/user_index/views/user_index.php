<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            หน้าแรก
            <small><?php echo $user_data['dep_name'] ;  ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#" class="active"><i class="fa fa-home"></i> หน้าแรก</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
                              <div class="box-body no-padding block-menu">
                    <div class="forms-list">
                      <div class="row">
                        <br>
                        
                        <div class="col-md-3 col-sm-6 col-xs-6">
                          <a class="forms-list-name" href="<?php echo site_url('dashboard') ?>">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              ภาพรวม
                              <span class="forms-list-date"><i class="fa fa-bar-chart fa-2x"></i></span></a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                          <a class="forms-list-name" href="<?php echo site_url('research/user_research') ?>">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              การทดลอง
                              <span class="forms-list-date"><i class="fa flaticon-flasks4 fa-2x"></i></span></a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                          <a class="forms-list-name" href="<?php echo site_url('pedigree') ?>">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              พันธุ์ / สายพันธุ์
                              <span class="forms-list-date"><i class="fa flaticon-spring20 fa-2x"></i></span></a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                          <a class="forms-list-name" href="<?php echo site_url('department') ?>">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              ศูนย์วิจัย
                              <span class="forms-list-date"><i class="fa fa-university fa-2x"></i></span></a>
                        </div>
                        
                        </div>
                        <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                          <a class="forms-list-name" href="<?php echo site_url('report') ?>">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              ส่งออกข้อมูลวิเคราะห์
                              <span class="forms-list-date"><i class="fa fa-download fa-2x" aria-hidden="true"></i></span></a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                          <a class="forms-list-name" href="<?php echo site_url('form_record') ?>">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              บันทึกข้อความ
                              <span class="forms-list-date"><i class="fa fa-pencil-square-o fa-2x"></i></span></a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                          <a class="forms-list-name" href="<?php echo site_url('user_manage/user_edit/'.$user_data['user_id']) ?>">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              ข้อมูลส่วนตัว
                              <span class="forms-list-date"><i class="fa fa-gears fa-2x"></i></span></a>
                        </div>

                      </div>
                    </div>
                    </div><!-- /.box-body -->
          
        </section>
        <!-- /.content -->
      </div>
  <script>
    $('#profile').on('shown.bs.modal', function () {
      $('#profile').focus()
    });
</script>

<!-- Modal -->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ข้อมูลส่วนตัว</h4>
      </div>
      <div class="modal-body">
      <div class="forms-list">
          <div class="row">
                        <br>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                          <a class="forms-list-name" href="<?php echo site_url('form_quality_physical') ?>">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              แก้ไขข้อมูลส่วนตัว
                              <span class="forms-list-date"><i class="fa fa-wrench fa-2x"></i></span></a>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                          <a class="forms-list-name" href="#">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              เปลี่ยนรูปประจำตัว
                              <span class="forms-list-date"><i class="fa fa-picture-o fa-2x"></i></span></a>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                          <a class="forms-list-name" href="#">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              เปลี่ยนรหัสผ่าน
                              <span class="forms-list-date"><i class="fa fa-key fa-2x"></i></span></a>
                        </div>
                        </div>
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>