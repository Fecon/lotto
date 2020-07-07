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
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1"> <?php echo form_open('department/update_department') ?>
          <div class="row">
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>ชื่อศูนย์วิจัย :</dt>
                <dd>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="dep_name" value="<?php echo $department[0]['dep_name'] ?>" required="required">
                  </div>
                </dd>
                <br>
                <dt>ตัวย่อ (EN) :</dt>
                <dd>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="dep_no" value="<?php echo $department[0]['dep_no'] ?>" required="required">
                  </div>
                </dd>
                <br>
                <dt>จังหวัด :</dt>
                <dd>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="dep_province" value="<?php echo $department[0]['dep_province'] ?>">
                  </div>
                </dd>
                <br>
                <dt>ภาค :</dt>
                <dd>
                  <div class="form-group col-md-4">
                    <select class="form-control" style="width: 100%;" name="dep_zone" required="required">
                      <option value="<?php echo $department[0]['dep_zone'] ?>"><?php echo $department[0]['GEO_NAME'] ?></option>
                      <optgroup label="เลือกใหม่...">
                      <option value="1">ภาคกลาง</option>
                      <option value="2">ภาคเหนือ</option>
                      <option value="3">ภาคตะวันออกเฉียงเหนือ</option>
                      <option value="4">ภาคใต้</option>
                      </optgroup>
                    </select>
                  </div>
                </dd>
                <br>
                <dt>ที่ตั้ง :</dt>
                <dd>
                  <div class="form-group col-md-8">
                    <textarea rows="3" class="form-control" name="dep_address"><?php echo $department[0]['dep_address'] ?></textarea>
                  </div>
                </dd>
                <br>
                <dt>เบอร์โทร :</dt>
                <dd>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="dep_tel" value="<?php echo $department[0]['dep_tel'] ?>">
                  </div>
                </dd>
                <br>
                <dt>อีเมล์ :</dt>
                <dd>
                  <div class="form-group col-md-4">
                    <input type="email" class="form-control" name="dep_email" value="<?php echo $department[0]['dep_email'] ?>">
                  </div>
                </dd>
                <br>
                <dt>แผนที่ :</dt>
                <dd>
                  <div class="form-group col-md-8">
                    <input type="text" class="form-control" name="dep_link" value="<?php echo $department[0]['dep_link'] ?>" placeholder="Ex. https://www.google.com/maps/d/u/0/embed?mid=1bmE-243XuHbfEcwohDUyEeNE5cY">
                    (ลิงค์จากการฝังแผนที่ใน Google Maps)</div>
                </dd>
                <dt>&nbsp;</dt>
                <dd>
                  <div class="form-group col-md-8" align="center">
                  <input type="hidden" class="form-control" name="dep_id" value="<?php echo $department[0]['dep_id'] ?>">
                    <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-floppy-o" aria-hidden="true"></i> บันทึก</button>
                  </div>
                </dd>
              </dl>
            </div>
          </div>
          <?php echo form_close(); ?> </div>
        <!-- /.tab-pane --> 
        
      </div>
    </div>
    <!-- /.box --> 
    
  </section>
  <!-- /.content --> 
</div>
<!-- /.content-wrapper -->