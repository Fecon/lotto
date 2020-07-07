<?php 
  $this->load->module('research');
  $research_id = $this->uri->segment(3);
  $get_research = $this->Research_model->get_research_detail($research_id); 
  $pedigree_selected = $this->Research_model->get_research_pedigree($research_id);
  $resistance_bug = $this->Research_model->get_resistance_bug($research_id);
?>
<div class="row">
        <div class="col-md-7">
              <div class="box box-info">
            <div class="box-header with-border"> <i class="fa fa-text-width"></i>
                  <h3 class="box-title">ข้อมูลทั่วไป</h3>
                  <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
                </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <dl class="dl-horizontal">
                <dt>ชื่อ</dt>
                <dd><?php echo $get_research['research_name'] ?></dd>
                <dt>ระยะเวลา</dt>
                <dd> </dd>
                <dt>ผู้ดำเนินการ</dt>
                <dd><?php echo $get_research['name'] ?></dd>
                <dt>สถานที่ทำการทดลอง</dt>
                <dd><?php echo $get_research['dep_name'] ?></dd>
              </dl>
              <div class="row">
                <div class="col-md-12" align="center">
                  <a href="<?php echo site_url('form_record/index/'.$get_research['research_id']) ?>">
                      <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o"></i> บันทึกข้อความ</button>
                  </a>
                </div>
              </div>
                </div>
            <!-- /.box-body --> 
          </div>
              <!-- /.box --> 
            </div>
        <div class="col-md-5">
              <div class="box box-info">
            <div class="box-header with-border"> <i class="fa fa-text-width"></i>
                  <h3 class="box-title">ข้อมูลแปลง</h3>
                  <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
                </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <div class="row">
                <div class="col-md-12">
                      <dl class="dl-horizontal">
                    <dt>ขนาดแปลงปลูก</dt>
                    <dd><?php echo $get_research['plot_width'] ?>     X   <?php echo $get_research['plot_height'] ?>   เมตร            (    <?php echo $get_research['plot_height']*$get_research['plot_width'] ; ?>       ตารางเมตร               ) </dd>
                    <dt>จำนวนแถวปักดำ</dt>
                    <dd><?php echo $get_research['rows_rice'] ?> แถว </dd>
                    <dt>แถวละ</dt>
                    <dd><?php echo $get_research['rice_num'] ?> ต้น</dd>
                    <dt>ระยะห่างระหว่างแถว</dt>
                    <dd><?php echo $get_research['rows_distance'] ?> ชม. </dd>
                    <dt> ระยะระหว่างกอ </dt>
                    <dd><?php echo $get_research['grove_distance'] ?> ชม. </dd>
                  </dl>
                    </div>
              </div>
                  <div class="row">
                <div class="col-md-6" align="center">
                    <a href="<?php echo site_url('research/view_entry/'.$research_id) ?>">
                      <button class="btn btn-block btn-danger">แผนผังสุ่ม</button>
                    </a>
                    </div>
                    <div class="col-md-6" align="center">
                      <a href="<?php echo site_url('research/form_date/'.$research_id) ?>"><button type="button" class="btn btn-block btn-info">วันที่ปฏิบัติงาน</button></a>
                    </div>
              </div>
              
                  <br>
                  <div class="row">
                  <div class="col-md-6" align="center">
                      <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#testing">การทดสอบพันธุ์ / สายพันธุ์</button>
                    </div>
                <div class="col-md-6" align="center">
                <a href="<?php echo site_url('research/list_pedigree/'.$research_id) ?>">
                      <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal">รายชื่อพันธุ์/สายพันธุ์</button>
                      </a>
                    </div>
              </div>
                </div>
            <!-- /.box-body --> 
          </div>
              <!-- /.box --> 
            </div>
        <!-- ./col --> 
      </div><!-- /.row -->
      
        <script>
  	$('#testing').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	});
	
    $('#quality_physical').on('shown.bs.modal', function () {
      $('#myInput').focus()
    });

	$('#check_pure_seed').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	});
	
	$('#germination_analyze').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	});
	
	$('#hulling').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	});
	
	$('#germination').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	});
	
	$('#quality_physical_list').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	});
	
	
	</script>
    
    <!-- TESTING -->
<div class="modal fade" id="testing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">การทดสอบเมล็ดพันธุ์</h4>
      </div>
      <div class="modal-body">
      <div class="forms-list">
          <div class="row">
                        <br>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <a class="forms-list-name" href="<?php echo site_url('form_1000_weight/index/'.$research_id) ?>">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              น้ำหนัก 1,000 เมล็ด
                              <span class="forms-list-date"><strong>1,000</strong></span></a>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <a class="forms-list-name" href="#" data-toggle="modal" data-target="#select_resistance" >
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              ปฏิกิริยาความต้านทานโรคและแมลง
                              <span class="forms-list-date"><i class="fa fa-bug fa-2x"></i></span></a>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <a class="forms-list-name" href="#"  data-toggle="modal" data-target="#quality_physical">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              คุณภาพเมล็ดทางกายภาพ
                              <span class="forms-list-date"><i class="fa flaticon-atomic8 fa-2x"></i></span></a>
                        </div>
                        </div>
                                  <div class="row">
                        <br>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <a class="forms-list-name" href="<?php echo site_url('form_quality_chemical/index/'.$research_id) ?>">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              คุณภาพเมล็ดทางเคมี
                              <span class="forms-list-date"><i class="fa flaticon-flasks4 fa-2x"></i></span></a>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <a class="forms-list-name" href="<?php echo site_url('form_cook/index/'.$research_id) ?>">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              คุณภาพการหุงต้มและรับประทาน
                              <span class="forms-list-date"><i class="fa fa-fire fa-2x"></i></span></a>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <a class="forms-list-name" href="<?php echo site_url('form_determinant/index/'.$research_id) ?>">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              ลักษณะประจำพันธุ์สำหรับรับรองพันธุ์
                              <span class="forms-list-date"><i class="fa flaticon-spring20 fa-2x"></i></span></a>
                        </div>
                        </div>
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="quality_physical" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">คุณภาพเมล็ดทางกายภาพ</h4>
      </div>
      <div class="modal-body">
      <div class="forms-list">
          <div class="row">
                        <br>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <a class="forms-list-name" href="<?php echo site_url('form_quality_physical/index/'.$research_id) ?>">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              คุณภาพเมล็ดทางกายภาพ
                              <span class="forms-list-date"><i class="fa flaticon-atomic8 fa-2x"></i></span></a>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <a class="forms-list-name" href="" data-toggle="modal" data-target="#check_pure_seed">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              ตรวจสอบความบริสุทธุิ์ของเมล็ดพันธุ์
                              <span class="forms-list-date"><i class="fa flaticon-seed9 fa-2x"></i></span></a>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <a class="forms-list-name" data-toggle="modal" data-target="#germination">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              ตรวจสอบความงอก
                              <span class="forms-list-date"><i class="fa flaticon-garden137 fa-2x"></i></span></a>
                        </div>
                        </div>
                                  <div class="row">
                        <br>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <a class="forms-list-name" data-toggle="modal" data-target="#hulling">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              คุณภาพการสี
                              <span class="forms-list-date"><i class="fa flaticon-leaves69 fa-2x"></i></span></a>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <a class="forms-list-name" data-toggle="modal" data-target="#germination_analyze">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              ผลการวิเคราะห์ความงอก
                              <span class="forms-list-date"><i class="fa flaticon-garden140 fa-2x"></i></span></a>
                        </div>
                        </div>
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- ตรวจสอบความบริสุทธุิ์ของเมล้ดพันธุ์ -->
<!-- Modal -->
<div class="modal fade" id="check_pure_seed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ตรวจสอบความบริสุทธุิ์ของเมล็ดพันธุ์</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
          <div class="col-md-12">
          	<table id="seed_list" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>เลขที่ตัวอย่าง</th>
                        <th>วันที่ตรวจสอบ</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                for($num_seed = 0;$num_seed<count($pedigree_selected);$num_seed++){ ?>
                    <tr>
                        <td><?php echo $num_seed+1 ?></td>
                        <td><a href="<?php echo site_url('form_pure_seed/index/'.$research_id.'/'.$pedigree_selected[$num_seed]['pedigree_id'] ) ?>"><?php echo $pedigree_selected[$num_seed]['designation'] ?></a></td>
                        <td>-</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
          </div> 
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- ตรวจสอบความงอก -->
<!-- Modal -->
<div class="modal fade" id="germination" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ตรวจสอบความงอก</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
          <div class="col-md-12">
          	<table id="seed_list" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>เลขที่ตัวอย่าง</th>
                        <th>วันที่ตรวจสอบ</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                for($num_seed = 0;$num_seed<count($pedigree_selected);$num_seed++){ ?>
                    <tr>
                        <td><?php echo $num_seed+1 ?></td>
                        <td><a href="<?php echo site_url('form_germination/index/'.$research_id.'/'.$pedigree_selected[$num_seed]['pedigree_id'] ) ?>"><?php echo $pedigree_selected[$num_seed]['designation'] ?></a></td>
                        <td>-</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
          </div> 
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- คุณภาพการสี -->
<!-- Modal -->
<div class="modal fade" id="hulling" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">คุณภาพการสี</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
          <div class="col-md-12">
          	<table id="seed_list" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>เลขที่ตัวอย่าง</th>
                        <th>วันที่ตรวจสอบ</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                for($num_seed = 0;$num_seed<count($pedigree_selected);$num_seed++){ ?>
                    <tr>
                        <td><?php echo $num_seed+1 ?></td>
                        <td><a href="<?php echo site_url('form_hulling/index/'.$research_id.'/'.$pedigree_selected[$num_seed]['pedigree_id'] ) ?>"><?php echo $pedigree_selected[$num_seed]['designation'] ?></a></td>
                        <td>-</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
          </div> 
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- ผลการวิเคราะห์ความงอก -->
<!-- Modal -->
<div class="modal fade" id="germination_analyze" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ผลการวิเคราะห์ความงอก</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
          <div class="col-md-12">
          	<table id="seed_list" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>เลขที่ตัวอย่าง</th>
                        <th>วันที่ตรวจสอบ</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                for($num_seed = 0;$num_seed<count($pedigree_selected);$num_seed++){ ?>
                    <tr>
                        <td><?php echo $num_seed+1 ?></td>
                        <td><a href="<?php echo site_url('form_germination_analyze/index/'.$research_id.'/'.$pedigree_selected[$num_seed]['pedigree_id'] ) ?>"><?php echo $pedigree_selected[$num_seed]['designation'] ?></a></td>
                        <td>-</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
          </div> 
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="select_resistance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ปฏิกิริยาความต้านทานโรคและแมลง</h4>
      </div>
      <div class="modal-body">
      <div class="forms-list">
          <div class="row">
                        <br>
                        <?php foreach($resistance_bug as $bug){ ?>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <a class="forms-list-name" href="<?php echo site_url('form_resistance_bug/index/'.$research_id.'/'.$bug['id']) ?>">
                              <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                              <?php echo $bug['short_name'];?>
                              <span class="forms-list-date">
                              <?php if($bug['type']==1){
								  		echo '<i class="fa flaticon-nature-19 fa-2x"></i>';
							  		}else{
										echo '<i class="fa flaticon-shape-1 fa-2x"></i>';
									}?>
                              
                              </span></a>
                        </div>
                        <?php } ?>
                        
                        </div>
                                  
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
