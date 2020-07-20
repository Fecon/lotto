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
            <?php echo form_open('dashboard/summary/')?>
            <div class="row">
               <div class="col-md-5">
                  <div class="form-group">
                     <label>ตัวแทน</label>
                     <select name="agent_id" class="form-control select2" style="width: 100%;">
                        <option value="0" selected="selected">ทั้งหมด</option>
                        <?php foreach ($list_agent as $key => $agent) { ?>
                        <option value="<?php echo $agent['id']; ?>"><?php echo $agent['name']; ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="form-group">
                     <label>งวดประจำวันที่</label>
                     <select name="lotto_id" class="form-control select2" style="width: 100%;">
                        <?php foreach ($list_lotto as $key => $lotto) { 
                           	$date = new DateTime($lotto['name']);
							$date_display = $date->format('d/m/Y');
						?>
                        <option value="<?php echo $lotto['id']; ?>"><?php echo $date_display; ?></option>
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
            <?php echo form_close(); ?>
            <br>
            <div class="box box-info">
               <div class="box-body">
                  <br>
                  <div class="row">
                     <div class="col-md-8">
                        <dl class="dl-horizontal">
                           <dt>ชื่อตัวแทน</dt>
                           <dd>
                           	<?php 
	                           	if(isset($agentInfo)){
	                           		echo $agentInfo['name'] ;
	                           	}else{
	                           		echo "ทั้งหมด";
	                           	}
                           	?></dd>
                           <dt>ยอดส่ง</dt>
                           <dd>10,000</dd>
                        </dl>
                     </div>
                     <div class="col-md-2">
                        <dl class="dl-horizontal">
                           <dt>ยอดส่ง 2 ตัวบนล่าง</dt>
                           <dd>5,000</dd>
                           <dt>ยอดส่ง 3 ตัวตรง</dt>
                           <dd>2,000</dd>
                           <dt>ยอดส่ง 3 ตัวโต๊ด</dt>
                           <dd>3,000</dd>
                        </dl>
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
                                 <span><?php echo $lottoInfo['2bottom'] ?></span>
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
                                 <span><?php echo $lottoInfo['2top'] ?></span>
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
                                 <span><?php echo $lottoInfo['3top'] ?></span>
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
                                 <span><?php echo $lottoInfo['3_1'].", ".$lottoInfo['3_2'].", ".$lottoInfo['3_3'].", ".$lottoInfo['3_4'].", ".$lottoInfo['3_5'].", ".$lottoInfo['3_6'] ; ?></span>
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