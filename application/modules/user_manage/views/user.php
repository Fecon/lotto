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
    	<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                  <!-- USERS LIST -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">พนักงาน</h3>
                      <div class="box-tools pull-right">
                        <span class="label label-danger"><?php echo count($list_user); ?> คน</span>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <table class="table table-striped">
                        <tr>
                          <th class="text-center">Username</th>
                          <th class="text-center">Password</th>
                          <th></th>
                        </tr>
                        <?php foreach($list_user as $user){ ?>
                          <tr>
                            <td class="text-center">
                              <div class="col-xs-9">
                                <input class="form-control" type="text" value="<?php echo $user['username'] ?>" onclick="show_icon('<?php echo 'username_'.$user['id'] ?>')" onfocusout="hide_icon('<?php echo 'username_'.$user['id'] ?>')">
                              </div>
                              <div class="col-xs-3">
                                <button id="<?php echo 'username_'.$user['id'] ?>" class="btn btn-primary btn-sm hide-icon" type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                              </div>
                            </td>
                            <td class="text-center">
                              <div class="col-xs-9">
                                <input class="form-control" type="text" value="<?php echo $user['password'] ?>" onclick="show_icon('<?php echo 'password_'.$user['id'] ?>')" onfocusout="hide_icon('<?php echo 'password_'.$user['id'] ?>')">
                              </div>
                              <div class="col-xs-3">
                                <button id="<?php echo 'password_'.$user['id'] ?>" class="btn btn-primary btn-sm hide-icon" type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                              </div>
                            </td>
                            <td class="text-center"><a onclick="return confirm('ยืนยันการลบ?')" href="<?php echo site_url('user_manage/user_delete/'.$user['id']) ?>" ><i class="fa fa-times text-red" aria-hidden="true"></i></a></td>
                        </tr>
                        <?php } ?>
                      </table>
                    </div><!-- /.box-body -->
                    <!-- /.box-footer -->
                  </div><!--/.box -->
        </div>
    </div>
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
<?php echo form_open('user_manage/user_insert')?>
<div class="modal-body">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="blog blog-info">
        <div class="blog-body">
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
                <label class="control-label">รหัสผ่าน : </label>
              </div>
              <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <input type="password" class="form-control" name="password" required="required" />
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
