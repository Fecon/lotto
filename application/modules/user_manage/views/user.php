<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <i class="ion ion-ios-people"></i> ผู้ใช้งานระบบ  </h1><br />
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
      <li class="active">ผู้ใช้งานระบบ</li>
    </ol>
    <div align="right">
            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#modalMd"><i class="fa fa-plus"></i> เพิ่มผู้ใช้งาน</button>
            </div>
  </section>
  
  <!-- Main content -->
  <section class="content"> 
    
    <!-- row -->
    
    <div class="row">
<div id="content" class="col-lg-12 col-sm-12"> 
          <?php 
              $result = $this->session->flashdata('insert_user');
              if($result=='done'){ ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Success!</strong> เพิ่มผู้ใช้งานสำเร็จ. </div>
          <?php }elseif($result=='fail'){?>
          <div class="alert alert-danger no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Error!</strong> กรุณาลองใหม่อีกครั้ง. </div>
          <?php }elseif($result=='repeat'){?>
          <div class="alert alert-danger no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Error!</strong> ชื่อผู้ใช้งานนี้มีแล้ว </div>
          <?php } ?>
          <br>
 
  <div> 
    <!-- Detail -->
    <div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12">
                  <!-- USERS LIST -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">ผู้ดูแลระบบ</h3>
                      <div class="box-tools pull-right">
                        <span class="label label-danger"><?php echo count($list_admin); ?> คน</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                      <?php foreach($list_admin as $user){ ?>
                        <li><a class="users-list-name" href="<?php echo site_url('user_manage/user_edit/'.$user['user_id']); ?>">
                          <img src="<?php echo base_url('assets/files/users/'.$user['user_image']) ?>"  width="" alt="User Image"><br />
                          <?php echo $user['name'] ?></a>
                          <span class="users-list-date"><?php echo $user['dep_no'] ?></span>
                        </li>
                       <?php } ?> 
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <!-- /.box-footer -->
                  </div><!--/.box -->
        </div>
    </div>
    
    <div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12">
                  <!-- USERS LIST -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">ผู้ดูแลส่วนภูมิภาค</h3>
                      <div class="box-tools pull-right">
                        <span class="label label-primary"><?php echo count($list_admin_geo); ?> คน</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        <?php foreach($list_admin_geo as $user){ ?>
                        <li><a class="users-list-name" href="<?php echo site_url('user_manage/user_edit/'.$user['user_id']); ?>">
                          <img src="<?php echo base_url('assets/files/users/'.$user['user_image']) ?>"  width="" alt="User Image"><br />
                          <?php echo $user['name'] ?></a>
                          <span class="users-list-date"><?php echo $user['dep_no'] ?></span>
                        </li>
                       <?php } ?>
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <!-- /.box-footer -->
                  </div><!--/.box -->
        </div>
    </div>
    
    <div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12">
                  <!-- USERS LIST -->
                  <div class="box box-success">
                    <div class="box-header with-border">
                      <h3 class="box-title">นักวิจัย &nbsp;
                      <!--
                      <div style="float:right; position:relative; top:-8px;"><select class="form-control" style="width: 100%;" name="dep_zone" >
                      <?php foreach($department_all as $dept_all){ ?>
                      <optgroup label="<?php echo $dept_all['GEO_NAME'] ; ?>">
                      	<?php foreach($dept_all['department_list'] as $dept){ ?>
                      <option value="<?php echo $dept['dep_no'] ; ?>"><?php echo $dept['dep_name'] ; ?></option>
                      	 <?php } ?>
                      </optgroup>
                      <?php } ?>
                    </select>
                    </div>
                    --></h3>
                      
                      <div class="box-tools pull-right">
                        <span class="label label-success"><?php echo count($list_researcher); ?> คน</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        <?php foreach($list_researcher as $user){ ?>
                        <li>
                          <a class="users-list-name" href="<?php echo site_url('user_manage/user_edit/'.$user['user_id']); ?>">
                          <img src="<?php echo base_url('assets/files/users/'.$user['user_image']) ?>"  width="" alt="User Image"><br />
                          <?php echo $user['name'] ?></a>
                          <span class="users-list-date"><?php echo $user['dep_no'] ?></span>
                        </li>
                       <?php } ?>
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <!-- /.box-footer -->
                  </div><!--/.box -->
        </div>
    </div>
    
    <div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12">
                  <!-- USERS LIST -->
                  <div class="box box-success">
                    <div class="box-header with-border">
                      <h3 class="box-title">เจ้าหน้าที่ &nbsp;
                      <!--
                      <div style="float:right; position:relative; top:-8px;"><select class="form-control" style="width: 100%;" name="dep_zone" >
                      <?php foreach($department_all as $dept_all){ ?>
                      <optgroup label="<?php echo $dept_all['GEO_NAME'] ; ?>">
                      	<?php foreach($dept_all['department_list'] as $dept){ ?>
                      <option value="<?php echo $dept['dep_no'] ; ?>"><?php echo $dept['dep_name'] ; ?></option>
                      	 <?php } ?>
                      </optgroup>
                      <?php } ?>
                    </select>
                    </div>
                    --></h3>
                      
                      <div class="box-tools pull-right">
                        <span class="label label-success"><?php echo count($list_officer); ?> คน</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        <?php foreach($list_officer as $officer){ ?>
                        <li>
                          <a class="users-list-name" href="<?php echo site_url('user_manage/user_edit/'.$officer['user_id']); ?>">
                          <img src="<?php echo base_url('assets/files/users/'.$officer['user_image']) ?>"  width="" alt="User Image"><br />
                          <?php echo $officer['name'] ?></a>
                          <span class="users-list-date"><?php echo $officer['dep_no'] ?></span>
                        </li>
                       <?php } ?>
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <!-- /.box-footer -->
                  </div><!--/.box -->
        </div>
    </div>
    <!-- Detail --> 
  </div>
</div>
  
            
    </div>
    <!-- /.row -->
    
    
    <!-- /.row --> 
    
  </section>
  <!-- /.content --> 
  </div>


<!-- Right sidebar ends -->
<div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title text-info" id="myModalLabel5">เพิ่มข้อมูลผู้ใช้งาน</h4>
</div>
<?php echo form_open_multipart('user_manage/user_insert')?>
<div class="modal-body">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="blog blog-info">
        <div class="blog-body">
          <div class="form-group">
            <div class="row">
              <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                <label class="control-label">ชื่อ - นามสกุล : </label>
              </div>
              <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <input type="text" class="form-control" name="name" value=""  required="required" />
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                <label class="control-label">Username: </label>
              </div>
              <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <input type="text" class="form-control" name="username" value=""  required="required" />
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                <label class="control-label">หน่วยงาน : </label>
              </div>
              <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <select class="form-control" style="width: 100%;" name="dep_no"  required="required"  >

                      <?php foreach($department_all as $dept_all){ ?>
                      <optgroup label="<?php echo $dept_all['GEO_NAME'] ; ?>">
                        <?php foreach($dept_all['department_list'] as $dept){ ?>
                      <option value="<?php echo $dept['dep_no'] ; ?>"><?php echo $dept['dep_name'] ; ?></option>
                         <?php } ?>
                      </optgroup>
                      <?php } ?>
                    </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                <label class="control-label">เบอร์โทร : </label>
              </div>
              <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <input type="text" class="form-control" name="mobile" value="" required="required" />
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                <label class="control-label">E-mail : </label>
              </div>
              <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <input type="text" class="form-control" name="email" value="" required="required" />
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                <label class="control-label">รหัสผ่าน : </label>
              </div>
              <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <input type="password" class="form-control" name="password" required="required" />
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
            <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                <label class="control-label">กลุ่มผู้ใช้งาน : </label>
              </div>
              <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <select class="form-control" name="user_role" id="user_role"  required="required" >
                  <option value="1">ผู้ดูแลระบบ</option>
                  <option value="2">ผู้ดูแลระบบส่วนภาค</option>
                  <option value="3">นักวิจัย</option>
                  <option value="4">เจ้าหน้าที่</option>
                </select>
              </div>
            </div>
          </div>
          
          
          <div class="form-group">
            <div class="row">
              <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                <label class="control-label">รูปภาพ : </label>
              </div>
              <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <p>
                  <input type="file" name="userfile" />
                </p>
              </div>
            </div>
          </div>
          <br>
          <div class="form-group" align="center">
            <div class="row">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> ยกเลิก</button>
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> บันทึก</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo form_close(); ?> 
</div>
</div>
</div>

<!-- Modal --> 
