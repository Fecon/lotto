<?php $this->load->view('research/permission') ; ?>

<link href="<?php echo base_url()?>assets/plugins/bootstrap-fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url()?>assets/plugins/bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/plugins/bootstrap-fileinput/js/locales/th.js" type="text/javascript"></script>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            คุณภาพการหุงต้มและรับประทาน
            <small><?php echo count($get_data) ?> </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('research/seed_test_index/'.$research_id) ; ?>"><i class="fa fa-dashboard"></i> การทดสอบเมล็ดพันธุ์</a></li>
            <li class="active">คุณภาพการหุงต้มและรับประทาน</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <a href="<?php echo site_url('research/seed_test_index/'.$research_id) ?>" class="btn btn-primary btn-block margin-bottom">กลับไปยังการทดสอบเมล็ดพันธุ์</a>
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Folders</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="<?php echo site_url('form_cook/record_list/'.$research_id) ?>"><i class="fa fa-inbox"></i> กล่องข้อความ <span class="label label-primary pull-right"><?php echo count($get_data) ?></span></a></li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
              
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">บันทึกคุณภาพการหุงต้มและรับประทานใหม่</h3>
                </div><!-- /.box-header -->
                <?php 
					$attribute = array('enctype' => 'multipart/form-data'  );
					echo form_open_multipart('form_cook/record_insert' , $attribute);
				?>
                
                <div class="box-body">
                
                  <div class="form-group">
                    <input class="form-control" placeholder="ชื่อเรื่อง :" name="title" required="required">
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="คำอธิบาย :" name="subtitle">
                  </div>
                  <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px" name="description">
                     
                    </textarea>
                  </div>
                  <div class="form-group">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> ไฟล์แนบ
                      <input id="file-th" class="file"  name="userfile[]" type="file" multiple >
                    </div>
                    <p class="help-block">สูงสุด 100MB / ไฟล์ <br />
					<small>( ไฟล์ที่อนุญาต gif , jpg , png , doc , docx , xls , xlsx , ppt , pptx , spss , pdf )</small></p>
                    <div id="selectedFiles"></div>
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                  	<input type="hidden" name="research_id" value="<?php echo $research_id ?>" >
                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> บันทึก</button>
                  </div>
                </div><!-- /.box-footer -->
                <?php echo form_close(); ?>
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
     <script>
    $('#file-th').fileinput({
        language: 'th',
    });
	</script> 