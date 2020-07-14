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
<div id="content" class="col-md-12 col-sm-12">

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
              <?php
                $attributes = array('class' => 'form-horizontal');
                echo form_open('config_controller/config_update/',$attributes)
              ?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">2 ตัว บน ล่าง</label>
                  <div class="col-sm-4">
                    <input type="number" name="2_pay" class="form-control input-lg" id="inputEmail3" placeholder="บาท" value="<?php echo $config[0]['value'];?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">3 ตัวตรง</label>
                  <div class="col-sm-4">
                    <input type="number" name="3_pay" class="form-control input-lg" id="inputEmail3" placeholder="บาท" value="<?php echo $config[1]['value'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">3 ตัวโต๊ด</label>
                  <div class="col-sm-4">
                    <input type="number" name="3_pay2" class="form-control input-lg" id="inputEmail3" placeholder="บาท" value="<?php echo $config[2]['value'];?>">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-5 col-sm-6">
                    <button type="submit" class="btn btn-success btn-lg">บันทึก</button>
                  </div>
                </div>
              <?php echo form_close(); ?>
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
                <?php
                  $attributes = array('class' => 'form-horizontal');
                  echo form_open('config_controller/config_update/',$attributes)
                ?>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-6 control-label"><span class="label label-danger">สีแดง</span> มากกว่าเท่ากับ</label>
                    <div class="col-sm-4">
                      <input type="number" name="red" class="form-control input-lg" id="inputEmail3" placeholder="บาท" value="<?php echo $config[3]['value'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-6 control-label"><span class="label label-warning">สีเหลือง</span> มากกว่า</label></label>
                    <div class="col-sm-4">
                      <input type="number" name="yellow" class="form-control input-lg" id="inputEmail3" placeholder="บาท" value="<?php echo $config[4]['value'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-6 control-label"><span class="label label-success">สีเขียว</span> มากกว่า</label></label></label>
                    <div class="col-sm-4">
                      <input type="number" name="green" class="form-control input-lg" id="inputEmail3" placeholder="บาท" value="<?php echo $config[5]['value'];?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-6">
                      <button type="submit" class="btn btn-success btn-lg">บันทึก</button>
                    </div>
                  </div>
                <?php echo form_close(); ?>
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
