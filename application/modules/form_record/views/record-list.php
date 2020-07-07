<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           บันทึกการทดลอง
            <small><?php echo count($get_data) ?> ข้อความ</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url('research/form_index/'.$research_id) ; ?>"><i class="fa fa-dashboard"></i> การทดลอง</a></li>
            <li class="active">บันทึกการทดลอง</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <a href="<?php echo site_url('form_record/index/'.$research_id) ?>" class="btn btn-primary btn-block margin-bottom">ลงบันทึกการทดลอง</a>
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Folders</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="<?php echo site_url('form_record/record_list/'.$research_id) ?>"><i class="fa fa-inbox"></i> บันทึกการทดลอง <span class="label label-primary pull-right"><?php echo count($get_data) ?></span></a></li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">บันทึกการทดลอง</h3>
                  <!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <div class="mailbox-messages"><br />

                    <table id="record_list" class="table table-hover table-striped">
                      <thead>
                <tr>
                  <th>#</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($get_data as $key => $value){ ?>
                      	<tr>
                          <td><?php echo $key+1 ?></td>
                          <td class="mailbox-name"><a href="<?php echo site_url('form_record/record_edit/'.$research_id.'/'.$value['id']) ?>"><?php echo $value['name'] ?></a></td>
                          <td class="mailbox-subject"><b><?php echo $value['title'] ?></b> - <?php echo $value['subtitle'] ?></td>
                          <td class="mailbox-attachment"><?php  if(!empty($value['attachment'])){ echo '<i class="fa fa-paperclip"></i>';}  ?></td>
                          <td class="mailbox-date"><?php echo $value['timestamp'] ?></td>
                          <td class="mailbox-attachment"><a href="<?php echo site_url('form_record/record_delete/'.$research_id.'/'.$value['id']) ?>" onclick="return confirm('ยืนยันการลบ ใช่หรือไม่ ?')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->

                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                  
                </div>
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        
      <br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />

      </div>
      <!-- DataTables --> 
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script>
      $(function () {
        $("#record_list").DataTable();
      });
    </script> 