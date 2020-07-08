<style>
input[type=text] {
  border: none !important;
  background: none;
}
.hide-icon{
  display: none;
}
.on-right{
  float: right;
}
</style>
<script>
function show_icon(id){
  document.getElementById(id).style.display = "block";
}
function hide_icon(id){
  document.getElementById(id).style.display = "none";
}

</script>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <i class="fa fa-calendar"></i> งวด  </h1><br />
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
      <li class="active">งวดประจำเดือน</li>
    </ol>
    <div align="right">
            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#modalMd"><i class="fa fa-plus"></i> เพิ่มงวด</button>
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
            <strong>Success!</strong> เพิ่มงวดสำเร็จ. </div>
          <?php }elseif($result=='fail'){?>
          <div class="alert alert-danger no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Error!</strong> กรุณาลองใหม่อีกครั้ง. </div>
          <?php } ?>
          <br>

  <div>
    <!-- Detail -->
    <div class="row">
    	<div class="col-md-8 col-sm-12 col-xs-12">
                  <!-- USERS LIST -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <table class="table table-striped">
                        <tr>
                          <th class="text-center" rowspan="2">ประจำวันที่</th>
                          <th class="text-center" colspan="5">เลขที่ออก</th>
                        </tr>
                        <tr>
                          <th class="text-center">2 ตัวบน</th>
                          <th class="text-center">2 ตัวล่าง</th>
                          <th class="text-center">3 ตัวตรง</th>
                          <th></th>
                          <th></th>
                        </tr>
                        <?php foreach($list_lotto as $lotto){ ?>
                          <tr>
                            <td>
                              <div class="col-xs-9">
                                <input class="form-control" type="text" value="<?php echo $lotto['name'] ?>" onclick="show_icon('<?php echo 'name_'.$lotto['id'] ?>')" onfocusout="hide_icon('<?php echo 'name_'.$lotto['id'] ?>')">
                              </div>
                              <div class="col-xs-3">
                                <button id="<?php echo 'name_'.$lotto['id'] ?>" class="btn btn-primary btn-sm hide-icon" type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                              </div>
                            </td>
                            <td>
                              <div class="col-xs-9">
                                <input class="form-control" type="text" value="<?php echo $lotto['2top'] ?>" onclick="show_icon('<?php echo '2top_'.$lotto['id'] ?>')" onfocusout="hide_icon('<?php echo '2top_'.$lotto['id'] ?>')">
                              </div>
                              <div class="col-xs-3">
                                <button id="<?php echo '2top_'.$lotto['id'] ?>" class="btn btn-primary btn-sm hide-icon" type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                              </div>
                            </td>
                            <td>
                              <div class="col-xs-9">
                                <input class="form-control" type="text" value="<?php echo $lotto['2bottom'] ?>" onclick="show_icon('<?php echo '2bottom_'.$lotto['id'] ?>')" onfocusout="hide_icon('<?php echo '2bottom_'.$lotto['id'] ?>')">
                              </div>
                              <div class="col-xs-3">
                                <button id="<?php echo '2bottom_'.$lotto['id'] ?>" class="btn btn-primary btn-sm hide-icon" type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                              </div>
                            </td>
                            <td>
                              <div class="col-xs-9">
                                <input class="form-control" type="text" value="<?php echo $lotto['3top'] ?>" onclick="show_icon('<?php echo '3top_'.$lotto['id'] ?>')" onfocusout="hide_icon('<?php echo '3top_'.$lotto['id'] ?>')">
                              </div>
                              <div class="col-xs-3">
                                <button id="<?php echo '3top_'.$lotto['id'] ?>" class="btn btn-primary btn-sm hide-icon" type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                              </div>
                            </td>
                            <td><a  href="<?php echo site_url('lotto/reserve_number/'.$lotto['id']) ?>" ><button class="btn btn-primary">เลขอั้น</button></a></td>
                            <td><a onclick="return confirm('ยืนยันการลบ?')" href="<?php echo site_url('lotto/lotto_delete/'.$lotto['id']) ?>" ><i class="fa fa-times text-red" aria-hidden="true"></i></a></td>
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
  <h4 class="modal-title text-info" id="myModalLabel5">เพิ่มงวด</h4>
</div>
<?php echo form_open('lotto/lotto_insert')?>
<div class="modal-body">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="blog blog-info">
        <div class="blog-body">
          <div class="form-group">
            <div class="row">
              <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-3" align="right">
                <label class="control-label">งวดประจำวันที่: </label>
              </div>
              <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <input type="text" class="form-control" name="name" value=""  required="required" />
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
