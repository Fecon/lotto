<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <?php echo html_entity_decode($department[0]['dep_name']) ?> </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
      <li><a href="<?php echo site_url('department') ?>">ศูนย์วิจัย</a></li>
      <li class="active"><?php echo html_entity_decode($department[0]['dep_name']) ?></li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content"> 
    
    <!-- Default box -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">ข้อมูลทั่วไป</a></li>
        <li><a href="#tab_2" data-toggle="tab">งานวิจัย</a></li>
        <?php if($user_data['user_role'] == 1 || $user_data['user_role'] == 2 ){ ?>
        <li class="pull-right"><a href="<?php echo site_url('department/edit_view/'.$department[0]['dep_id']) ?>" class="text-muted"><i class="fa fa-wrench" aria-hidden="true"></i></a></li>
        <?php } ?>
        
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          <div class="row">
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>ชื่อ :</dt>
                <dd><?php echo html_entity_decode($department[0]['dep_name']) ?></dd>
                <br>
                <dt>จังหวัด :</dt>
                <dd><?php echo html_entity_decode($department[0]['dep_province']) ?></dd>
                <br>
                <dt>ภาค :</dt>
                <dd><?php echo html_entity_decode($department[0]['GEO_NAME']) ?></dd>
                <br>
                <dt>ที่ตั้ง :</dt>
                <dd><?php echo html_entity_decode($department[0]['dep_address']) ?></dd>
                <br>
                <dt>เบอร์โทร :</dt>
                <dd><?php echo html_entity_decode($department[0]['dep_tel']) ?></dd>
                <br>
                <dt>อีเมล์ :</dt>
                <dd><?php echo html_entity_decode($department[0]['dep_email']) ?></dd>
                <br>
                <dt>แผนที่ :</dt>
                <dd>
                  <iframe src="<?php echo $department[0]['dep_link'] ?>" width="640" height="480"></iframe>
                  </iframe>
                </dd>
              </dl>
            </div>
          </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ชื่อ</th>
                  <th>ผู้ดำเนินการ</th>
                  <th>ปี</th>
                  <th>สถานะ</th>
                </tr>
              </thead>
              <tbody>
                <?php if(isset($department[0]['research'])){
							foreach($department[0]['research'] as $key => $research){?>
                <tr>
                  <td><?php echo $key+1 ; ?></td>
                  <td><?php echo html_entity_decode($research['research_name']) ; ?></td>
                  <td><?php echo $research['name'] ; ?></td>
                  <td><?php echo substr($research['research_create_date'] ,0,4)+543 ; ?></td>
                  <td><?php if($research['status']==1){ 
					  				echo '<span class="label label-warning">กำลังดำเนินการ</span>';
					  			}elseif($research['status']==2){
									echo '<span class="label label-success">เสร็จสิ้นแล้ว</span>';
								}?></td>
                </tr>
                <?php } 
					} 
					?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box --> 
    
  </section>
  <!-- /.content --> 
</div>
<!-- /.content-wrapper -->