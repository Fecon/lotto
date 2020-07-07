<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <i class="fa fa-eyedropper"></i> การทดสอบเมล็ดพันธุ์ </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
      <li class="active">การทดสอบเมล็ดพันธุ์</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content"> 
    
    <!-- Default box -->
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success"> 
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <div class="forms-list">
              <div class="row"> <br>
                <div class="col-md-3 col-sm-3 col-xs-3"> <a class="forms-list-name" href="<?php echo site_url('form_1000_weight/index/'.$research_id) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                  น้ำหนัก 1,000 เมล็ด <span class="forms-list-date"><strong>1,000</strong></span></a> </div>
                <div class="col-md-3 col-sm-3 col-xs-3"> <a class="forms-list-name" href="#" data-toggle="modal" data-target="#select_resistance" > <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                  ปฏิกิริยาความต้านทานโรคและแมลง <span class="forms-list-date"><i class="fa fa-bug fa-2x"></i></span></a> </div>
                <div class="col-md-3 col-sm-3 col-xs-3"> <a class="forms-list-name" href="#"  data-toggle="modal" data-target="#quality_physical"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                  คุณภาพเมล็ดทางกายภาพ <span class="forms-list-date"><i class="fa flaticon-atomic8 fa-2x"></i></span></a> </div>
                <div class="col-md-3 col-sm-3 col-xs-3"> <a class="forms-list-name" href="<?php echo site_url('form_quality_chemical/index/'.$research_id) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                  คุณภาพเมล็ดทางเคมี <span class="forms-list-date"><i class="fa flaticon-flasks4 fa-2x"></i></span></a> </div>
              </div>
              <br />
              <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3"> <a class="forms-list-name" href="<?php echo site_url('form_cook/index/'.$research_id) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                  คุณภาพการหุงต้มและรับประทาน <span class="forms-list-date"><i class="fa fa-fire fa-2x"></i></span></a> </div>
                <div class="col-md-3 col-sm-3 col-xs-3"> <a class="forms-list-name" href="<?php echo site_url('form_determinant/index/'.$research_id) ?>"> <img src="<?php echo base_url()?>assets/dist/img/blue-bg.jpg" class="forms-list-img" alt="forms Image"><br />
                  ลักษณะประจำพันธุ์สำหรับรับรองพันธุ์ <span class="forms-list-date"><i class="fa flaticon-spring20 fa-2x"></i></span></a> </div>
              </div>
            </div>
          </div>
          <!-- /.box-body --> 
        </div>
        <!-- /.box --> 
      </div>
    </div>
    <!-- /.box --> 
    
  </section>
  <!-- /.content --> 
</div>


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
