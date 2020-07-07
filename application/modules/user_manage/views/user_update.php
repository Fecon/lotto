<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <i class="ion ion-ios-people"></i> ผู้ใช้งานระบบ  </h1><br />
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('user_index');?>"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
      <li class="active">ผู้ใช้งานระบบ</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content"> 
    <div class="">

				<!-- Container fluid Starts -->
				<div class="container-fluid">
					
					<!-- Spacer Starts -->
					<div class="spacer">

						<!-- Row start -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-sx-12">
								<div class="current-profile">
									<div class="user-bg"></div>
									<div class="user-pic" style="background:">&nbsp;</div>
									<div class="user-details">
										<h4 class="user-name"><?php echo $get_profile[0]['name'] ?></h4>
										<h5 class="description"><?php echo $get_profile[0]['email'] ?></h5>
									</div>
									<div class="social-list">
										<div class="row">
											<div class="col-md-12">
												<div class="row">
                                                <?php foreach($get_project_user as $value_project_user){ ?>
													<div class="col-md-4 col-sm-4 col-xs-4 center-align-text">
														<h3><?php echo $value_project_user['project_name'] ?></h3>
													</div>
                                                <?php }?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->
                        	<?php 
							$result = $this->uri->segment(4);
							if($result=='success'){ ?>
											<div class="alert alert-success">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<strong>Success!</strong> แก้ไขข้อมูลสำเร็จ.
											</div>
                            <?php }elseif($result=='fail'){?>
                                            <div class="alert alert-danger no-margin">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<strong>Error!</strong> กรุณาลองใหม่อีกครั้ง.
											</div>
                            <?php }elseif($result=='newpassword_incorrect'){?>
                                            <div class="alert alert-danger no-margin">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<strong>Error!</strong> รหัสผ่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง.
											</div><br />              
                            <?php }?>
						<!-- Row start -->
                        <?php $arr = array("class" => "form-horizontal");
								echo form_open_multipart('admin_user_manage/edit_user',$arr); ?>
                        <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="blog blog-info">
        <div class="blog-header">
          <h5 class="blog-title">ข้อมูลผู้ใช้งาน</h5>
        </div>
        <div class="blog-body">
          <div class="form-group">
            <div class="row">
              <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                <label class="control-label">ชื่อ - นามสกุล : </label>
              </div>
              <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <input type="text" class="form-control" name="user_name" value="<?php echo $get_profile[0]['user_name'] ?>"  required="required" />
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                <label class="control-label">Username : </label>
              </div>
              <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <input type="text" class="form-control" name="user_nickname" value="<?php echo $get_profile[0]['user_nickname'] ?>"  required="required" />
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                <label class="control-label">E-mail : </label>
              </div>
              <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <input type="text" class="form-control" name="user_email" value="<?php echo $get_profile[0]['user_email'] ?>" required="required" />
              </div>
            </div>
          </div>
          <div class="form-group">
                <div class="row">
                    <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                    <label class="control-label">รหัสผ่านใหม่ : </label>
                    </div>
                    <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <input type="password" class="form-control" name="new_password1" />
                    </div>
                    <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-4" align="left">
                    <label class="control-label">* ว่างไว้ถ้าไม่ต้องการเปลี่ยน </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                    <label class="control-label">ยืนยันรหัสผ่านใหม่ : </label>
                    </div>
                    <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <input type="password" class="form-control" name="new_password2" />
                    </div>
                    
                </div>
            </div>
          <div class="form-group">
            <div class="row">
              <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                <label class="control-label">กลุ่มผู้ใช้งาน : </label>
              </div>
              <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <select class="form-control" name="user_level" id="user_level"  required="required" >
                <option value="<?php echo $get_profile[0]['user_level'] ?>" >
                	<?php if($get_profile[0]['user_level']==1){	
																	echo 'ผู้ดูแลระบบ';
														}elseif($get_profile[0]['user_level']==2){
																	echo 'ลูกค้า';
														}
														?>
                        </option>
                        <option disabled="disabled">----------------------</option>
                  <option value="1">ผู้ดูแลระบบ</option>
                  <option value="2">ลูกค้า</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group" id="div_user_level1">
            <div class="row">
              <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                <label class="control-label">คู่ธุรกิจ : </label>
              </div>
              <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <select class="form-control" name="business" id="business">
                <?php if($get_profile[0]['business_id']!=1){ ?>
                <option value="<?php echo $get_profile[0]['business_id'] ?>" ><?php echo $get_profile[0]['business_name'] ?></option>
                        <option disabled="disabled">----------------------</option>
                  <?php } ?>
                  <?php foreach($get_business as $business){ ?>
                  <option value="<?php echo $business['business_id'] ?>"><?php echo $business['business_name'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group" id="div_user_level2">
            <?php foreach ($get_project_business as $value_project_business) {?>
            <div class="row" id="business_id<?php echo $value_project_business['business_id'] ?>">
              <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                <label class="control-label">โปรเจค : </label>
              </div>
              <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <div class="row">
                  <?php foreach($value_project_business['project'] as $value_project){?>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="input-group">
                      <div class="squared-check">
                        <input type="checkbox" name="project[]"
                        <?php 
							if(!empty($value_project['user'])){ echo ' checked="checked" '; }
						?>
                         value="<?php echo $value_project['project_id'] ?>" id="<?php echo $value_project['project_id'] ?>">
                        <label for="<?php echo $value_project['project_id'] ?>"></label>
                        <div class="cb-label"><?php echo $value_project['project_name'] ?></div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
          <div class="form-group">
                <div class="row">
                    <div class=" col-lg-2 col-md-2 col-sm-2 col-xs-2" align="right">
                    <label class="control-label">รูปภาพ : </label>
                    </div>
                    <div class=" col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <img  class="img-thumbnail" src="<?php echo base_url('assets/img/user/'.$get_profile[0]['user_img'])?>" alt="User" width="200" />
						<br /><br />
								<p>
													<input type="file" name="userfile" />
												</p>
                    </div>
                </div><br />
                
            </div>
          <br>
          <div class="form-group" align="center">
            <div class="row">
            	<input type="hidden" name="user_id" value="<?php echo $get_profile[0]['user_id'] ?>" />
                <input type="hidden" name="user_img" value="<?php echo $get_profile[0]['user_img'] ?>" />
              <a href="<?php echo site_url('admin_user_manage/index') ?>">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> ยกเลิก</button></a>
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> บันทึก</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
  			
<script type="text/javascript">
$(document).ready(function(){
    $("#user_level").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="2"){
                $("#div_user_level1").show();
                $("#div_user_level2").show();
            }
            else{
				$("#div_user_level1").hide();
				$("#div_user_level2").hide();
            }
        });
    }).change();
	
	$("#business").change(function(){
        $(this).find("option:selected").each(function(){
			<?php foreach($get_business as $business_value){ ?>
            if($(this).attr("value")=="<?php echo $business_value['business_id'] ?>"){
                $("#business_id<?php echo $business_value['business_id'] ?>").show();
            }
            else{
				$("#business_id<?php echo $business_value['business_id'] ?>").hide();
            }
			<?php } ?>
			
        });
    }).change();
	
});
</script>
  
  
						
						<!-- Row end -->

					</div>
					<!-- Spacer Ends -->

				</div>
				<!-- Container fluid ends -->

			</div>
    
    
    <!-- /.row --> 
    
  </section>
  <!-- /.content --> 
  </div>

