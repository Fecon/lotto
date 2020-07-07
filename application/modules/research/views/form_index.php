<!-- fullCalendar 2.2.5-->
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/fullcalendar/fullcalendar.print.css" media="print">

<?php $this->load->view('research/permission') ; ?>

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> หน้าแรกการทดลอง </h1>
    <ol class="breadcrumb  row-hidden">
      <li><a  href="<?php echo site_url('research') ?>" class="btn btn-social-icon btn-linkedin" style="color:#FFF; border-color:#FFF;"><i class="fa fa-list"></i></a></li>
    </ol>
  </section>
  <br>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('research') ?>">หน้าแรก</a></li>
    <li><a href="<?php echo site_url('research/form_index/'.$research_id) ?>">การทดลอง</a></li>
  </ol>
  
  <!-- Main content -->
  <section class="content">
    <?php if($get_research['status']==2){ ?>
    <div class="callout callout-danger">
      <h4><i class="icon fa fa-ban"></i> การทดลองนี้ถูกปิดแล้ว!</h4>
      <small>หากต้องการแก้ไขข้อมูลกรุณาติดต่อผู้ดูแลระบบเท่านั้น</small> </div>
    <?php } ?>
    <?php if(isset($user_data['check_entry'])){ ?>
    <div class="callout callout-danger">
      <h4><i class="icon fa fa-ban"></i> คำเตือน! กรุณากำหนด Entry ก่อนบันทึกผลการทดลอง </h4>
      <div class="row" align="center"><br />
        <!--
        <a href="<?php echo site_url('research/research_ctrl/research_create_plot/'.$research_id) ?>">
        <button class="btn btn-lg btn-default">กำหนด Entry</button>
        </a>
        --> 
        <a href="<?php echo site_url('research/set_entry/'.$research_id) ?>">
        <button class="btn btn-lg btn-default">กำหนด Entry</button>
        </a> </div>
    </div>
    <?php } ?>
    <?php $this->load->view('form_template/form-header') ?>
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">แบบฟอร์มการทดลอง</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <div class="forms-list">
          <div class="row"> <br>
            <div class="col-md-2 col-sm-4 col-xs-4"> <a class="forms-list-name" data-toggle="modal" data-target="#water_lv"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
              ระดับน้ำในแปลง <span class="forms-list-date"><i class="fa fa-tint fa-2x"></i></span></a> </div>
            <div class="col-md-2 col-sm-4 col-xs-4"> <a class="forms-list-name" href="<?php echo site_url('form_lost_grove/index/'.$research_id) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
              กอหาย <span class="forms-list-date"><i class="fa flaticon-plant15 fa-2x"></i></span></a> </div>
            <div class="col-md-2 col-sm-4 col-xs-4"> <a class="forms-list-name" href="<?php echo site_url('form_disease/index/'.$research_id) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
              ศัตรูพืช <span class="forms-list-date"><i class="fa flaticon-shape fa-2x"></i></span></a> </div>
            <div class="col-md-2 col-sm-4 col-xs-4"> <a class="forms-list-name" data-toggle="modal" data-target="#leaves"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
              ใบม้วน ใบตาย <span class="forms-list-date"><i class="fa fa-leaf fa-2x"></i></span></a> </div>
            <div class="col-md-2 col-sm-4 col-xs-4 col-xs-4"> <a class="forms-list-name" href="<?php echo site_url('form_bloom/index/'.$research_id) ?>" > <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
              วันออกดอก <span class="forms-list-date"><i class="fa flaticon-flower49 fa-2x"></i></span></a> </div>
            <div class="col-md-2 col-sm-4 col-xs-4 col-xs-4"> <a class="forms-list-name" href="<?php echo site_url('form_high/index/'.$research_id) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
              ความสูง <span class="forms-list-date"><i class="fa flaticon-text-height-adjustment fa-2x"></i></span></a> </div>
          </div>
          <div class="row">
            <div class="col-md-2 col-sm-4 col-xs-4"> <a class="forms-list-name" href="<?php echo site_url('form_awn_grove/index/'.$research_id) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
              จำนวนรวงต่อกอ <span class="forms-list-date"><i class="fa flaticon-plant-leaf fa-2x"></i></span></a> </div>
            <div class="col-md-2 col-sm-4 col-xs-4"> <a class="forms-list-name" href="<?php echo site_url('form_tree_grove/index/'.$research_id) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
              จำนวนต้นต่อกอ <span class="forms-list-date"><i class="fa flaticon-twig1 fa-2x"></i></span></a> </div>
            <div class="col-md-2 col-sm-4 col-xs-4"> <a class="forms-list-name" href="<?php echo site_url('form_no_grain/index/'.$research_id) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
              จำนวนต้นที่ไม่ออกรวง <span class="forms-list-date"><i class="fa flaticon-nature-19 fa-2x"></i></span></a> </div>
            <div class="col-md-2 col-sm-4 col-xs-4"> <a class="forms-list-name" href="<?php echo site_url('form_seed_good/index/'.$research_id) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
              จำนวนเมล็ดดีต่อรวง <span class="forms-list-date"><i class="fa flaticon-food-1 fa-2x"></i></span></a> </div>
            <div class="col-md-2 col-sm-4 col-xs-4"> <a class="forms-list-name" href="<?php echo site_url('form_seed_grove/index/'.$research_id) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
              จำนวนเมล็ดลีบต่อรวง <span class="forms-list-date"><i class="fa flaticon-food-1 fa-2x"></i></span></a> </div>
            <div class="col-md-2 col-sm-4 col-xs-4"> <a class="forms-list-name" href="<?php echo site_url('form_product/index/'.$research_id) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
              ผลผลิต <span class="forms-list-date"><i class="fa flaticon-leaf64 fa-2x"></i></span></a> </div>
          </div>
          <div class="row">
            <div class="col-md-2 col-sm-4 col-xs-4"> <a class="forms-list-name" href="<?php echo site_url('form_record/index/'.$research_id) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
              บันทึกข้อความ <span class="forms-list-date"><i class="fa fa-pencil-square-o fa-2x"></i></span></a> </div>
          </div>
        </div>
      </div>
      <!-- /.box-body --> 
    </div>
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">ปฏิทินการทดลอง</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
        <!-- /.box-tools --> 
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-4">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h4 class="box-title">แบบการทดลอง</h4>
              </div>
              <div class="box-body"> 
                <!-- the events -->
                <ul class="todo-list">
                  <li> 
                    <!-- drag handle --> 
                    <span class="handle"> <i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i> </span> 
                    <!-- checkbox -->
                    <input type="checkbox" value="" name="" class="flat-red"  checked>
                    <!-- todo text --> 
                    <span class="text"><a class="forms-list-name" data-toggle="modal" data-target="#water_lv">ระดับน้ำในแปลง</a></span> 
                    <!-- Emphasis label --> 
                    <!-- General tools such as edit or delete-->
                    <div class="tools"> <i class="fa fa-edit"></i> </div>
                  </li>
                  <li> <span class="handle"> <i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i> </span>
                    <input type="checkbox" value="" name="" class="flat-blue" checked>
                    <span class="text"><a class="forms-list-name" href="<?php echo site_url('form_lost_grove/index/'.$research_id) ?>">กอหายและพันธุ์ปน</a></span>
                    <div class="tools"> <i class="fa fa-edit"></i> </div>
                  </li>
                  <li> <span class="handle"> <i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i> </span>
                    <input type="checkbox" value="" name="" class="flat-green" checked>
                    <span class="text"><a class="forms-list-name" data-toggle="modal" data-target="#leaves">ศัตรูพืช</a></span>
                    <div class="tools"> <i class="fa fa-edit"></i> </div>
                  </li>
                  <li> <span class="handle"> <i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i> </span>
                    <input type="checkbox" value="" name=""  class="flat-aero" checked>
                    <span class="text"><a class="forms-list-name" href="<?php echo site_url('form_bloom/index/'.$research_id) ?>" >ใบม้วน ใบตาย</a></span>
                    <div class="tools"> <i class="fa fa-edit"></i> </div>
                  </li>
                  <li> <span class="handle"> <i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i> </span>
                    <input type="checkbox" value="" name=""  class="flat-grey" checked>
                    <span class="text"><a class="forms-list-name" href="<?php echo site_url('form_bloom/index/'.$research_id) ?>" >วันออกดอก</a></span>
                    <div class="tools"> <i class="fa fa-edit"></i> </div>
                  </li>
                  <li> <span class="handle"> <i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i> </span>
                    <input type="checkbox" value="" name="" class="flat-yellow" checked>
                    <span class="text"><a class="forms-list-name" href="<?php echo site_url('form_high/index/'.$research_id) ?>">ความสูง</a></span>
                    <div class="tools"> <i class="fa fa-edit"></i> </div>
                  </li>
                  <li> <span class="handle"> <i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i> </span>
                    <input type="checkbox" value="" name="" class="flat-blue" checked>
                    <span class="text"><a class="forms-list-name" href="<?php echo site_url('form_grove/index/'.$research_id) ?>">แตกกอ</a></span>
                    <div class="tools"> <i class="fa fa-edit"></i> </div>
                  </li>
                  <li> 
                    <!-- drag handle --> 
                    <span class="handle"> <i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i> </span> 
                    <!-- checkbox -->
                    <input type="checkbox" value="" name="" class="flat-pink" checked>
                    <!-- todo text --> 
                    <span class="text"><a class="forms-list-name" href="<?php echo site_url('form_tree_grove/index/'.$research_id) ?>">จำนวนต้นต่อกอ</a></span> 
                    <!-- Emphasis label --> 
                    <!-- General tools such as edit or delete-->
                    <div class="tools"> <i class="fa fa-edit"></i> </div>
                  </li>
                  <li> <span class="handle"> <i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i> </span>
                    <input type="checkbox" value="" name="" class="flat-orange" checked>
                    <span class="text"><a class="forms-list-name" href="<?php echo site_url('form_awn_grove/index/'.$research_id) ?>">จำนวนรวงต่อกอ</a></span>
                    <div class="tools"> <i class="fa fa-edit"></i> </div>
                  </li>
                  <li> <span class="handle"> <i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i> </span>
                    <input type="checkbox" value="" name="" class="flat-purple" checked>
                    <span class="text"><a class="forms-list-name" href="<?php echo site_url('form_no_grain/index/'.$research_id) ?>">จำนวนต้นที่ไม่ออกรวง</a></span>
                    <div class="tools"> <i class="fa fa-edit"></i> </div>
                  </li>
                  <li> <span class="handle"> <i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i> </span>
                    <input type="checkbox" value="" name=""  class="flat-yellow" checked>
                    <span class="text"><a class="forms-list-name" href="<?php echo site_url('form_seed_grove/index/'.$research_id) ?>">จำนวนเมล็ดต่อรวง</a></span>
                    <div class="tools"> <i class="fa fa-edit"></i> </div>
                  </li>
                  <li> <span class="handle"> <i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i> </span>
                    <input type="checkbox" value="" name="" class="flat-green" checked>
                    <span class="text"><a class="forms-list-name" href="<?php echo site_url('form_seed_good/index/'.$research_id) ?>">จำนวนเมล็ดดีต่อรวง</a></span>
                    <div class="tools"> <i class="fa fa-edit"></i> </div>
                  </li>
                  <li> <span class="handle"> <i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i> </span>
                    <input type="checkbox" value="" name=""  class="flat-red" checked>
                    <span class="text"><a class="forms-list-name" href="<?php echo site_url('form_product/index/'.$research_id) ?>">ผลผลิต</a></span>
                    <div class="tools"> <i class="fa fa-edit"></i> </div>
                  </li>
                </ul>
              </div>
              <!-- /.box-body --> 
              
            </div>
            <!-- /. box -->
            <?php if($get_research['status']==1){ ?>
            <div class="row" style="position:relative;top:140px;">
              <div class="box-body no-padding">
                <div class="row">
                  <div class="col-xs-12 col-md-12" align="center">
                    <button type="button" id="closeResearchBtn" class="btn btn-sm btn-danger permission" data-toggle="modal" data-target="#closeResearch"> ปิดการทดลอง</button>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="box box-danger">
              <div class="box-body no-padding"> 
                <!-- THE CALENDAR -->
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div id="calendar"></div>
                  </div>
                </div>
                <br>
              </div>
              <!-- /.box-body --> 
            </div>
            <div class="box box-primary">
              <div class="box-body no-padding">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-comment"></i> บันทึกข้อความ</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body pad"> <?php echo form_open('research/research_ctrl/comment_update'); ?>
                    <textarea class="form-control" name="research_comment" rows="3" placeholder="Enter ..."><?php echo @$get_research['comment'] ?></textarea>
                    <br>
                    <div class="row">
                      <div class="col-xs-12 col-md-12" align="center">
                        <input type="hidden" name="research_id" value="<?php echo $research_id ?>" />
                        <button type="submit" class="btn btn-block btn-primary"> บันทึก</button>
                      </div>
                    </div>
                    <?php echo form_close(); ?> </div>
                </div>
              </div>
            </div>
            
            <!--
            <div class="box box-warning">
              <div class="box-body no-padding"> <br>
                <div class="row">
                  <div class="col-md-12"> 

                    <ul class="timeline">

                      <li class="time-label"> <span class="bg-red"> 10 ก.ค. 2558 </span> </li>

                      <li> <i class="fa fa-comments-o bg-blue"></i>
                        <div class="timeline-item"> <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                          <h3 class="timeline-header"><a href="#">ศรัณย์ สิทธิพรหม</a> บันทึกข้อความ การทดลอง : <span style="color:#F63">ระดับน้ำในแปลง</span></h3>
                          <div class="timeline-body">- ระดับน้ำอยู่ในเกณฑ์ปกติ  ตรวจสอบครั้งถัดไปวันที่ 18 ก.ค. 58 </div>
                        </div>
                      </li>

                      <li class="time-label"> <span class="bg-green"> 30 ก.ค. 2558 </span> </li>

                      <li> <i class="fa fa-comments-o bg-purple"></i>
                        <div class="timeline-item"> <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>
                          <h3 class="timeline-header"><a href="#">ศรัณย์ สิทธิพรหม</a> บันทึกข้อความ การทดลอง : <span style="color:#690">ศัตรูพืช</span></h3>
                          <div class="timeline-body">- พบรอยการแทะของหนูในแปลงทดลอง </div>
                        </div>
                      </li>

                      <li> <i class="fa fa-comments-o bg-maroon"></i>
                        <div class="timeline-item"> <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
                          <h3 class="timeline-header no-border"><a href="#">ศรัณย์ สิทธิพรหม</a> ได้บันทึกการทดลอง : <span style="color:#999">ใบม้วน ใบตาย</span> </h3>
                        </div>
                      </li>
      
                      <li> <i class="fa fa-clock-o bg-gray"></i> </li>
                    </ul>
                  </div>
       
                </div>
              </div>
            </div>
            --> 
            
            <!-- /. box --> 
          </div>
          <!-- /.col --> 
        </div>
      </div>
      <!-- /.box-body --> 
    </div>
    <!-- /.row --> 
    
  </section>
  <!-- /.content --> 
</div>

<!-- Modal -->
<div class="modal fade" id="water_lv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ครั้งที่วัดระดับน้ำในแปลง</h4>
      </div>
      <div class="modal-body">
        <div class="row"> <br>
          <?php foreach($water_lv_time as $value_water_time){ ?>
          <div class="col-md-3 col-sm-4 col-xs-4"> <a class="forms-list-name" href="<?php echo site_url('form_water_level/edit_view/'.$research_id.'/'.$value_water_time['keep_date_id']) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
            <?php 
			    $date = date_create_from_format('Y-m-d', $value_water_time['keep_date']);
				echo date_format($date, 'd/m/Y'); ?>
            <span class="forms-list-date" style="font-size:2em; position:relative;margin-top:-7px;margin-left:-45px; text-align:center; z-index:100;">
            <?php 
			   echo $value_water_time['terms'] ?>
            </span></a> </div>
          <?php } ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <a href="<?php echo site_url('form_water_level/index/'.$research_id) ?>">
        <button type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มครั้งต่อไป</button>
        </a> </div>
    </div>
  </div>
</div>
<div class="modal fade" id="leaves" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ครั้งที่บันทึกใบม้วน ใบตาย</h4>
      </div>
      <div class="modal-body">
        <div class="row"> <br>
          <?php foreach($leaves_time as $value_leaves_time){ ?>
          <div class="col-md-3 col-sm-4 col-xs-4"> <a class="forms-list-name" href="<?php echo site_url('form_leaves/edit_view/'.$research_id.'/'.$value_leaves_time['keep_date_id']) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
            <?php 
			    $date = date_create_from_format('Y-m-d', $value_leaves_time['keep_date']);
				echo date_format($date, 'd/m/Y'); ?>
            <span class="forms-list-date" style="font-size:2em; position:relative;margin-top:-7px; margin-left:-45px; text-align:center; z-index:100;">
            <?php 
			   echo $value_leaves_time['terms'] ?>
            </span></a> </div>
          <?php } ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <a href="<?php echo site_url('form_leaves/index/'.$research_id) ?>">
        <button type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มครั้งต่อไป</button>
        </a> </div>
    </div>
  </div>
</div>

<!-- ปิดการทดลอง -->
<div class="modal fade" id="closeResearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ยืนยันการปิดการทดลอง</h4>
      </div>
      <div class="modal-body" align="center"> <?php echo form_open('research/research_ctrl/close_research'); ?>
        <input type="hidden" name="research_id" value="<?php echo $research_id ?>" />
        <button type="submit" class="btn btn-danger" onclick="return confirm('หากปิดการทดลองแล้วจะไม่สามารถบันทึกข้อมูลได้อีกครั้ง ยืนยันการปิดใช่หรือไม่?');">ปิดการทดลอง</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <?php echo form_close(); ?> </div>
      <div class="modal-footer"> </div>
    </div>
  </div>
</div>

<!-- fullCalendar 2.2.5 --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script> 
<script src="<?php echo base_url()?>assets/plugins/fullcalendar/fullcalendar.min.js"></script> 
<script>
/* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
          },
          //Random default events
          events: [
            {
              title: 'ซ่อมข้าว 1',
              start: "2013,08,11",
              backgroundColor: "#f56954", //red
              borderColor: "#f56954", //red
			  url: "form1.html"
            },
            {
              title: 'ใส่ปุ๋ย 1',
              start: "2013,07,22",
              backgroundColor: "#f39c12", //yellow
              borderColor: "#f39c12" //yellow
            },
            {
              title: 'ใส่ปุ๋ย 2',
              start: "2013,09,14",
              backgroundColor: "#f39c12", //yellow
              borderColor: "#f39c12" //yellow
            },
            {
              title: 'กำจัดวัชพืช 1',
              start: "2013,08,27",
              backgroundColor: "#00c0ef", //Info (aqua)
              borderColor: "#00c0ef" //Info (aqua)
            },
			{
              title: 'กำจัดวัชพืช 2',
              start: "2013,09,22",
              backgroundColor: "#00c0ef", //Info (aqua)
              borderColor: "#00c0ef" //Info (aqua)
            }
          ],
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar !!!
          drop: function (date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }

          }
        });

        /* ADDING EVENTS */
        var currColor = "#3c8dbc"; //Red by default
        //Color chooser button
        var colorChooser = $("#color-chooser-btn");
        $("#color-chooser > li > a").click(function (e) {
          e.preventDefault();
          //Save color
          currColor = $(this).css("color");
          //Add color effect to button
          $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
        });
        $("#add-new-event").click(function (e) {
          e.preventDefault();
          //Get value and make sure it is not null
          var val = $("#new-event").val();
          if (val.length == 0) {
            return;
          }

          //Create events
          var event = $("<div />");
          event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
          event.html(val);
          $('#external-events').prepend(event);

          //Add draggable funtionality
          ini_events(event);

          //Remove event from text input
          $("#new-event").val("");
        });
</script> 
<script>
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').focus()
    });
</script> 
