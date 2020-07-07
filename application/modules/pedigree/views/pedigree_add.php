<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            พันธุ์ข้าว
          </h1>
          <ol class="breadcrumb">
          </ol>
        </section><br>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="row">
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">เพิ่มพันธุ์/สายพันธุ์ในการทดลอง</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php $attributes = array('class' => 'form-horizontal');
				echo form_open('pedigree/insert_pedigree',$attributes);?>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Source :</label>
                      <div class="col-sm-10">
                        <input type="text" name="source" class="form-control" id="" placeholder="" required="required">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Cross : </label>
                      <div class="col-sm-10">
                        <input type="text" name="cross_name" class="form-control" id="" placeholder="" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Designation : </label>
                      <div class="col-sm-10">
                        <input type="text" name="designation" class="form-control" id="" placeholder="" required="required">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Seed Source : </label>
                      <div class="col-sm-10">
                        <input type="text" name="seed_source" class="form-control" id="" placeholder="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Traits : </label>
                      <div class="col-sm-10">
                        <input type="text" name="traits" class="form-control" id="" placeholder="">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label"> </label>
                      <div class="col-sm-10" align="right">
                      	<button type="submit" class="btn btn-primary" style=" width:200px;">บันทึก</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="<?php echo site_url('pedigree') ?>" >
                        <button type="button" class="btn btn-danger" style=" width:200px;">ย้อนกลับ</button>
                        </a>
                      </div>
                    </div>
                    
                    
                    
                    
                  </div><!-- /.box-body -->
                  <!-- /.box-footer -->
                <?php echo form_close();?>
              </div><!-- /.box -->
              </div>
          </div>
          </section>
          </div>
          
          
