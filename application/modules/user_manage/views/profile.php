
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <i class="ion ion-ios-people"></i> ผู้ใช้งานระบบ </h1>
    <br />
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('user_index');?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
      <li class="active">ผู้ใช้งานระบบ</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content"> 
    
    <!-- row -->
    
    <div class="row">
      <div id="content" class="col-lg-12 col-sm-12"> 
        <!-- content starts -->
        
        <div class="spacer">
          <?php 
							$result = $this->session->flashdata('update_user');
							if($result=='done'){ ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Success!</strong> แก้ไขข้อมูลสำเร็จ. </div>
          <?php }elseif($result=='fail'){?>
          <div class="alert alert-danger no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Error!</strong> กรุณาลองใหม่อีกครั้ง. </div>
          <?php }elseif($result=='password_incorrect'){?>
          <div class="alert alert-danger no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Error!</strong> รหัสผ่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง. </div>
          <br />
          <?php }
          $imagecheck = $this->session->flashdata('imagecheck');
          if($imagecheck=='image_error'){?>
          <div class="alert alert-danger no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Error!</strong> การอัพโหลดภาพล้มเหลว </div>
          <br />
          <?php }?>
          <!-- Row start -->
          <?php 
		  $arr = array("class" => "form-horizontal");
		  echo form_open_multipart('user_manage/user_update',$arr ); ?>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">ข้อมูลผู้ใช้งาน</h3>
                </div>
                <div class="box-body no-padding"><br />
                  <div class="form-group">
                    <div class="row">
                      <div class=" col-lg-2 col-md-2 col-sm-4 col-xs-4" align="right">
                        <label class="control-label">ชื่อ-นามสกุล : </label>
                      </div>
                      <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <input type="text" class="form-control" name="name" value="<?php echo $get_profile[0]['name'] ?>"  required="required" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class=" col-lg-2 col-md-2 col-sm-4 col-xs-4" align="right">
                        <label class="control-label">Username : </label>
                      </div>
                      <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <input type="text" class="form-control" name="username" readonly="readonly" value="<?php echo $get_profile[0]['username'] ?>"  required="required" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class=" col-lg-2 col-md-2 col-sm-4 col-xs-4" align="right">
                        <label class="control-label">E-mail : </label>
                      </div>
                      <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <input type="text" class="form-control" name="email" value="<?php echo $get_profile[0]['email'] ?>" required="required" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class=" col-lg-2 col-md-2 col-sm-4 col-xs-4" align="right">
                        <label class="control-label">เบอร์โทร : </label>
                      </div>
                      <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <input type="text" class="form-control" name="mobile" value="<?php echo $get_profile[0]['mobile'] ?>" required="required" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class=" col-lg-2 col-md-2 col-sm-4 col-xs-4" align="right"> </div>
                      <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <hr style=" border-color:#030;" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class=" col-lg-2 col-md-2 col-sm-4 col-xs-4" align="right">
                        <label class="control-label">รหัสผ่านใหม่ : </label>
                      </div>
                      <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <input type="password" class="form-control" name="password" id="password" />
                      </div>
                      <div class=" col-lg-4 col-md-4 col-sm-6 col-xs-6 col-sm-offset-4 col-xs-offset-4" align="left">
                        <label class="control-label">* ว่างไว้ถ้าไม่ต้องการเปลี่ยน </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class=" col-lg-2 col-md-2 col-sm-4 col-xs-4" align="right">
                        <label class="control-label">ยืนยันรหัสผ่าน : </label>
                      </div>
                      <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" />
                        <span id='message'></span> </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class=" col-lg-2 col-md-2 col-sm-4 col-xs-4" align="right"> </div>
                      <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <hr style="border-color:#030;" />
                      </div>
                    </div>
                  </div>
                  <?php if($user_data['user_role'] == 1 ){ ?>
                  <div class="form-group">
                    <div class="row">
                      <div class=" col-lg-2 col-md-2 col-sm-4 col-xs-4" align="right">
                        <label class="control-label">กลุ่มผู้ใช้งาน : </label>
                      </div>
                      <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <select class="form-control" name="user_role" id="user_role"  required="required" >
                          <option value="<?php echo $get_profile[0]['user_role'] ?>" >
                          <?php if($get_profile[0]['user_role']==1){	
									echo 'ผู้ดูแลระบบ';
								}elseif($get_profile[0]['user_role']==2){
									echo 'ผู้ดูแลระบบส่วนภาค';
								}elseif($get_profile[0]['user_role']==3){
									echo 'นักวิจัย';
								}elseif($get_profile[0]['user_role']==4){
                  echo 'เจ้าหน้าที่';
                }
							?>
                          </option>
                          <option disabled="disabled">----------------------</option>
                          <option value="1">ผู้ดูแลระบบ</option>
                          <option value="2">ผู้ดูแลระบบส่วนภาค</option>
                          <option value="3">นักวิจัย</option>
                          <option value="4">เจ้าหน้าที่</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <?php if($user_data['user_role'] == 1 ){
							$disabled = '';
					  	}else{
							$disabled = 'disabled';
					  	}
				  ?>
                  <div class="form-group">
                    <div class="row">
                      <div class=" col-lg-2 col-md-2 col-sm-4 col-xs-4" align="right">
                        <label class="control-label">ศูนย์วิจัย : </label>
                      </div>
                      <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <select class="form-control" style="width: 100%;" name="dep_no"  <?php  echo $disabled ; ?> >
                          <?php foreach($department_all as $dept_all){ ?>
                          <optgroup label="<?php echo $dept_all['GEO_NAME'] ; ?>">
                          <?php foreach($dept_all['department_list'] as $dept){ ?>
                          <option <?php if($get_profile[0]['dep_no']==$dept['dep_no']){echo 'selected';} ?> value="<?php echo $dept['dep_no'] ; ?>"><?php echo $dept['dep_name'] ; ?></option>
                          <?php } ?>
                          </optgroup>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class=" col-lg-2 col-md-2 col-sm-4 col-xs-4" align="right"> </div>
                      <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <hr style="border-color:#030;" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class=" col-lg-2 col-md-2 col-sm-4 col-xs-4" align="right">
                        <label class="control-label">รูปภาพ : </label>
                      </div>
                      <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6"> <img src="<?php echo base_url('assets/files/users/'.$get_profile[0]['user_image']) ?>"  width="200" alt="User Image"> <br />
                        <br />
                        <p>
                          <input type="file" name="userfile" />
                        </p>
                      </div>
                    </div>
                    <br />
                  </div>
                  <br>
                  <div class="form-group" align="center">
                    <div class="row">
                      <input type="hidden" name="user_id" value="<?php echo $get_profile[0]['user_id'] ?>" />
                      <input type="hidden" name="user_image" value="<?php echo $get_profile[0]['user_image'] ?>" />
                      <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> บันทึก</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php echo form_close(); ?> 
          <script type="text/javascript">
$(document).ready(function(){
	$('#confirm_password').on('keyup', function () {
		if ($(this).val() == $('#password').val()) {
			$('#message').html('รหัสถูกถูกต้อง').css('color', 'green');
		} else $('#message').html('รหัสผ่านไม่ตรงกัน').css('color', 'red');
	});
});
</script> 
          
          <!-- Row end --> 
          
        </div>
      </div>
    </div>
    <!-- /.row --> 
    
    <!-- /.row --> 
    
  </section>
  <!-- /.content --> 
</div>
