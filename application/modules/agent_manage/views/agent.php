<style>
  input[type=number] {
    text-align: center !important;
  }

  input[type=text] {
    text-align: left !important;
  }

  td 
  {
      text-align: center; 
      vertical-align: middle;
  }

</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <i class="ion ion-ios-people"></i> ตัวแทน </h1><br />
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
      <li class="active">รายชื่อตัวแทน</li>
    </ol>
    <div align="right">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMd"><i
          class="fa fa-plus"></i> เพิ่มตัวแทน</button>
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
          <strong>Success!</strong> เพิ่มตัวแทนสำเร็จ. </div>
        <?php }elseif($result=='fail'){?>
        <div class="alert alert-danger no-margin">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Error!</strong> กรุณาลองใหม่อีกครั้ง. </div>
        <?php }elseif($result=='repeat'){?>
        <div class="alert alert-danger no-margin">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Error!</strong> ชื่อตัวแทนนี้มีแล้ว </div>
        <?php } ?>
        <br>

        <div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">ตัวแทน</h3>
                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?php echo count($list_agent); ?> คน</span>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tr>
                      <th class="text-center">#</th>
                      <th width="35%" class="text-center">ชื่อ</th>
                      <th width="20%" class="text-center">%</th>
                      <th width="35%" class="text-center">ผู้ดูแล</th>
                      <th class="text-center"></th>
                    </tr>
                    <?php 
                      foreach($list_agent as $key => $agent){ 
                    ?>
                    <?php echo form_open('agent_manage/agent_update/'.$agent['id'])?>
                    <tr>
                      <td class="text-center"><span style="position: relative;top:15px;"><?php echo $key+1; ?></span></td>
                      <td class="text-center">
                        <div class="col-xs-9">
                          <input class="form-control input-lg" name="name" type="text"
                            value="<?php echo $agent['name'] ?>"
                            onclick="show_icon('<?php echo 'name_'.$agent['id'] ?>')"
                            onfocusout="hide_icon('<?php echo 'name_'.$agent['id'] ?>')">
                        </div>
                        <div class="col-xs-3">
                          <button id="<?php echo 'name_'.$agent['id'] ?>" class="btn btn-success btn-lg hide-icon"
                            type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="col-xs-9">
                          <input class="form-control input-lg" name="percent" type="number"
                            value="<?php echo $agent['percent'] ?>"
                            onclick="show_icon('<?php echo 'percent_'.$agent['id'] ?>')"
                            onfocusout="hide_icon('<?php echo 'percent_'.$agent['id'] ?>')">
                        </div>
                        <div class="col-xs-3">
                          <button id="<?php echo 'percent_'.$agent['id'] ?>" class="btn btn-success btn-lg hide-icon"
                            type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                        </div>
                      </td>
                      <td class="text-center">
                        <div class="col-xs-9">
                          <select class="form-control input-lg" name="user_id"
                            onfocus="show_icon('<?php echo 'user_'.$agent['id'] ?>')"
                            onfocusout="hide_icon('<?php echo 'user_'.$agent['id'] ?>')">
                            <?php foreach($list_user as $user){ ?>
                            <option <?php if ($user['id']==$agent['user_id']) {
                                    echo " selected ";
                                  } ?> value="<?php echo $user['id'] ?>">
                              <?php echo $user['username'] ?>

                            </option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="col-xs-3">
                          <button id="<?php echo 'user_'.$agent['id'] ?>" class="btn btn-success btn-lg hide-icon"
                            type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                        </div>
                      </td>
                      <td class="text-center"><a onclick="return confirm('ยืนยันการลบ?')"
                          href="<?php echo site_url('agent_manage/agent_delete/'.$agent['id']) ?>"><i
                            class="fa fa-times text-red" aria-hidden="true"></i></a></td>
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
  <!-- /.content -->
</div>


<!-- Modal -->
<div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-info" id="myModalLabel5">เพิ่มข้อมูลตัวแทน</h4>
      </div>
      <?php echo form_open('agent_manage/agent_insert')?>
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
                      <label class="control-label">เปอร์เซ็น: </label>
                    </div>
                    <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                      <input type="text" class="form-control input-lg" name="percent" value="" required="required" />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                      <label class="control-label">ผู้ดูแล : </label>
                    </div>
                    <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                      <select class="form-control input-lg" name="user_id">
                        <?php foreach($list_user as $user){ ?>
                        <option value="<?php echo $user['id'] ?>"><?php echo $user['username'] ?></option>
                        <?php } ?>
                      </select>
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
