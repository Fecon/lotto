<?php
  $user_data = $this->session->userdata('user_data');

  if(!isset($user_data)){
    redirect('login');
  }
?>

<style>
input[type=text] {
  text-align: left !important;
}
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <i class="ion ion-ios-people"></i> ผู้ใช้งานระบบ </h1><br />
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
      <li class="active">ผู้ใช้งานระบบ</li>
    </ol>
    <div align="right"><a
                          href="<?php echo site_url('user_manage/disable_all/0') ?>"><button type="button"
                            class="btn btn-danger">ระงับพนักงานทั้งหมด</button></a>
                          <a
                          href="<?php echo site_url('user_manage/disable_all/1') ?>"><button type="button"
                            class="btn btn-success">ยกเลิกการระงับ</button></a>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMd"><i
          class="fa fa-plus"></i> เพิ่มผู้ใช้งาน</button>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">


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

              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">พนักงาน</h3>
                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?php echo count($list_user); ?> คน</span>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tr>
                      <th class="text-center">ชื่อ</th>
                      <th class="text-center">Username</th>
                      <th class="text-center">Password</th>
                      <th>ระดับ</th>
                      <th>สถานะ</th>
                      <th></th>
                    </tr>
                    <?php foreach($list_user as $user){ ?>
                    <?php echo form_open('user_manage/user_update/'.$user['id']); ?>
                    <tr
                    <?php 
                      if($user['id']==1 && $user_data['id']!=1){
                        echo "class='hide-icon'";
                      }
                    ?>
                    >
                      <td class="text-center">
                        <div class="col-xs-9">
                          <input class="form-control input-lg" name="name" type="text"
                            value="<?php echo $user['name'] ?>"
                            onclick="show_icon('<?php echo 'name_'.$user['id'] ?>')"
                            onfocusout="hide_icon('<?php echo 'name_'.$user['id'] ?>')">
                        </div>
                        <div class="col-xs-3">
                          <button id="<?php echo 'name_'.$user['id'] ?>" class="btn btn-success btn-lg hide-icon"
                            type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="col-xs-9">
                          <input class="form-control input-lg" name="username" type="text"
                            value="<?php echo $user['username'] ?>"
                            onclick="show_icon('<?php echo 'username_'.$user['id'] ?>')"
                            onfocusout="hide_icon('<?php echo 'username_'.$user['id'] ?>')">
                        </div>
                        <div class="col-xs-3">
                          <button id="<?php echo 'username_'.$user['id'] ?>" class="btn btn-success btn-lg hide-icon"
                            type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="col-xs-9">
                          <input class="form-control input-lg" name="password" type="text"
                            value="<?php echo $user['password'] ?>"
                            onclick="show_icon('<?php echo 'password_'.$user['id'] ?>')"
                            onfocusout="hide_icon('<?php echo 'password_'.$user['id'] ?>')">
                        </div>
                        <div class="col-xs-3">
                          <button id="<?php echo 'password_'.$user['id'] ?>" class="btn btn-success btn-lg hide-icon"
                            type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                        </div>
                      </td>
                      <td class="text-left">
                        <?php 
                            if($user['user_role']==1){
                              echo "<span class='text-primary'>Admin</span>";
                            }else{
                              echo "<span>Employee</span>";
                            }
                        ?>
                      </td>
                      <td class="text-left">
                        <?php 
                            if($user['status']==1){
                              echo "<span class='text-success'>ปกติ</span>";
                            }else{
                              echo "<span class='text-danger'>ระงับ</span>";
                            }
                        ?>
                      </td>
                      <td class="text-left">
                        <?php if($user['id']!=1){

                                if($user['status']==1){ ?>
                                  <a
                              href="<?php echo site_url('user_manage/disable/'.$user['id']) ?>"><button type="button"
                                class="btn btn-warning">ระงับผู้ใช้งาน</button></a>

                            <?php 
                                }else{ ?>
                                  <a
                              href="<?php echo site_url('user_manage/disable/'.$user['id']) ?>"><button type="button"
                                class="btn btn-success">เปิดผู้ใช้งาน</button></a>
                            <?php 
                                }
                              } 
                            ?>

                        
                      </td>
                      <td class="text-center">
                        <?php if($user['id']!=1){ ?>
                        <a onclick="return confirm('ยืนยันการลบ?')"
                          href="<?php echo site_url('user_manage/user_delete/'.$user['id']) ?>"><i
                            class="fa fa-times text-red" aria-hidden="true"></i></a>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php echo form_close(); ?>
                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </section>
</div>


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
                      <label class="control-label">ชื่อ: </label>
                    </div>
                    <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                      <input type="text" class="form-control input-lg" name="name" value="" required="required" />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                      <label class="control-label">Username: </label>
                    </div>
                    <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                      <input type="text" class="form-control input-lg" name="username" value="" required="required" />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                      <label class="control-label">รหัสผ่าน : </label>
                    </div>
                    <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                      <input type="password" class="form-control input-lg" name="password" required="required" />
                    </div>
                  </div>
                </div>
                <br>
                <div class="form-group" align="center">
                  <div class="row">
                    <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"><i class="fa fa-times"></i>
                      ยกเลิก</button>
                    <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> บันทึก</button>
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
