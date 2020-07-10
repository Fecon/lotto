<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <i class="fa fa-cogs"></i> ตั้งค่าทั่วไป  </h1><br />
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
      <li class="active"> ตั้งค่า</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- row -->

    <div class="row">
<div id="content" class="col-md-10 col-md-offset-1 col-sm-12">

  <div>
    <!-- Detail -->
    <div class="row">
    	<div class="col-md-6 col-sm-12 col-xs-12">
          <!-- USERS LIST -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">อัตราจ่าย</h3>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
              <br>
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">2 ตัว บน ล่าง</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" id="inputEmail3" placeholder="บาท">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">3 ตัวตรง</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" id="inputEmail3" placeholder="บาท">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">3 ตัวโต๊ด</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" id="inputEmail3" placeholder="บาท">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-5 col-sm-6">
                    <button type="submit" class="btn btn-success">บันทึก</button>
                  </div>
                </div>
              </form>
            </div><!-- /.box-body -->
            <!-- /.box-footer -->
          </div><!--/.box -->
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">

          <!-- USERS LIST -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">สีพื้นหลังรายงาน</h3>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
                <br>
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-6 control-label"><span class="label label-danger">สีแดง</span> มากกว่าเท่ากับ</label>
                    <div class="col-sm-4">
                      <input type="number" class="form-control" id="inputEmail3" placeholder="บาท">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-6 control-label"><span class="label label-warning">สีเหลือง</span> มากกว่า</label></label>
                    <div class="col-sm-4">
                      <input type="number" class="form-control" id="inputEmail3" placeholder="บาท">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-6 control-label"><span class="label label-success">สีเขียว</span> มากกว่า</label></label></label>
                    <div class="col-sm-4">
                      <input type="number" class="form-control" id="inputEmail3" placeholder="บาท">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-6">
                      <button type="submit" class="btn btn-success">บันทึก</button>
                    </div>
                  </div>
                </form>
              </div>
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
  <h4 class="modal-title text-info" id="myModalLabel5">เพิ่มข้อมูลตัวแทน</h4>
</div>
<?php echo form_open_multipart('agent_manage/agent_insert')?>
<div class="modal-body">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="blog blog-info">
        <div class="blog-body">
          <div class="form-group">
            <div class="row">
              <div class=" col-lg-2 col-md-2 col-sm-4 col-xs-2" align="right">
                <label class="control-label">ชื่อ: </label>
              </div>
              <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <input type="text" class="form-control" name="name" value=""  required="required" />
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class=" col-lg-2 col-md-2 col-sm-4 col-xs-2" align="right">
                <label class="control-label">เปอร์เซ็น: </label>
              </div>
              <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <input type="text" class="form-control" name="percent" value=""  required="required" />
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class=" col-lg-2 col-md-2 col-sm-4 col-xs-2" align="right">
                <label class="control-label">ผู้ดูแล : </label>
              </div>
              <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <select class="form-control" name="user_id">
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
