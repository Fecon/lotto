<?php
	$user_data = $this->session->userdata('user_data');
	if(!isset($user_data)){
		redirect('login');
	}
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            สรุปยอด
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
							<div class="col-md-10 col-md-offset-1">
								<div class="row">
									<div class="col-md-5">
										<div class="form-group">
			                <label>ตัวแทน</label>
			                <select class="form-control select2" style="width: 100%;">
			                  <option selected="selected">ทั้งหมด</option>
												<?php foreach ($list_agent as $key => $agent) { ?>
													<option value="<?php echo $agent['id']; ?>"><?php echo $agent['name']; ?></option>
												<?php } ?>
			                </select>
			              </div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
			                <label>งวดประจำวันที่</label>
			                <select class="form-control select2" style="width: 100%;">
												<?php foreach ($list_lotto as $key => $lotto) { ?>
													<option value="<?php echo $lotto['id']; ?>"><?php echo $lotto['name']; ?></option>
												<?php } ?>
			                </select>
			              </div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label>&nbsp;</label>
											<br>
			                <button type="submit" class="btn btn-success">ยืนยัน</button>
			              </div>
									</div>
								</div>
								<br>
								<div class="box box-info">
									<div class="box-body">
										<br>
										<div class="row">
									    <div class="col-md-2">
					                <label>ชื่อตัวแทน</label >
					                <span>เฌอ</span>
											</div>
											<div class="col-md-2">
												<label>ยอดส่ง</label >
												<span>25,000</span>
											</div>
											<div class="col-md-2">
												<label>เปอร์เซ็น</label >
												<span>30</span>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-12">
												<table class="table table-striped">
													<tr>
														<th class="text-center">เลข</th>
														<th class="text-center">ซื้อมา</th>
														<th class="text-center">เป็นเงิน</th>
													</tr>
												  <tr>
														<td class="text-center">
															<label>2 ตัวล่าง :</label >
															<span>58</span>
														</td>
														<td class="text-center">
															<span>100</span>
														</td>
														<td class="text-center">
															<span>2,000</span>
														</td>
													</tr>
													<tr>
														<td class="text-center">
															<label>2 ตัวบน :</label >
															<span>64</span>
														</td>
														<td class="text-center">
															<span>200</span>
														</td>
														<td class="text-center">
															<span>4,000</span>
														</td>
													</tr>
													<tr>
														<td class="text-center">
															<label>3 ตัวตรง :</label >
															<span>456</span>
														</td>
														<td class="text-center">
															<span>100</span>
														</td>
														<td class="text-center">
															<span>4,000</span>
														</td>
													</tr>
													<tr>
														<td class="text-center">
															<label>3 ตัวโต๊ด :</label >
															<span>456</span>
														</td>
														<td class="text-center">
															<span>100</span>
														</td>
														<td class="text-center">
															<span>4,000</span>
														</td>
													</tr>
													<tr>
														<td colspan="2" class="text-right">
															<label>ยอดรวมถูก เป็นเงิน</label >
														</td>
														<td class="text-center">
															<span>5,000</span>
														</td>
													</tr>
													<tr>
														<td colspan="2" class="text-right">
															<label>ยอดรวมสุทธิ</label >
														</td>
														<td class="text-center">
															<span class="text-success">+ 9,000</span>
														</td>
													</tr>
												</table>
											</div>
										</div>
									</div>
		            </div>
							</div>
            </div>
        </section>
        <!-- /.content -->
      </div>
