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
            <?php echo form_open('dashboard/index/')?>
            <div class="row">
               <div class="col-md-3">
                  <div class="form-group">
                     <label>ตัวแทน</label>
                     <select name="agent_id" class="form-control select2" style="width: 100%;" onchange="this.form.submit()">
                        <option value="0">ทั้งหมด</option>
                        <?php foreach ($list_agent as $key => $agent) { ?>
                        <option value="<?php echo $agent['id']; ?>"
                        <?php
                           if(isset($agentInfo)){
                              if($agent['id']==$agentInfo['id']){
                                 echo ' selected ';
                              }
                           }
                        ?>
                        ><?php echo $agent['name']; ?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group">
                     <label>งวดประจำวันที่</label>
                     <select name="lotto_id" class="form-control select2" style="width: 100%;">
                        <?php foreach ($list_lotto as $key => $lotto) { 
                           	$date = new DateTime($lotto['name']);
                              $date_display = $date->format('d/m/Y');
                        ?>
                        <option value="<?php echo $lotto['id']; ?>"
                           <?php
                                 if($lotto['id']==$lotto_id){
                                   echo ' selected ';
                                 }
                             ?>
                        ><?php echo $date_display; ?></option>
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
               <div class="col-md-4">
                  <div class="form-group text-right">
                     <label>&nbsp;</label>
                     <br>
                     <a href="<?php echo site_url('dashboard/export_pdf'); ?>"><button type="button" class="btn btn-default"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Export PDF</button></a>
                  </div>
               </div>
            </div>
            <?php echo form_close(); ?>
            <br>
            <div class="box box-danger">
               <div class="box-body">
                  <div class="row">
                     <div class="col-md-10 col-md-offset-1">
                        <?php 
                           // Set Variable //
                           if(!isset($agentInfo)){
                              $sent_2digi         = $agent_sent['2digi']['top'] + $agent_sent['2digi']['bottom'];
                              $sent_2digi_display = number_format($sent_2digi);
                              $sent_3top         = $agent_sent['3digi']['top'];
                              $sent_3top_display = number_format($sent_3top);
                              $sent_3tod         = $agent_sent['3digi']['bottom'];
                              $sent_3tod_display = number_format($sent_3tod);
                              $total_sent       = $sent_2digi+$sent_3top+$sent_3tod;
                           }

                        ?>
                        <table class="table table-striped">
                           <tr>
                              <th class="text-center">
                              ชื่อตัวแทน : 
                              <?php 
	                           	if(isset($agentInfo)){
	                           		echo $agentInfo['name'] ;
	                           	}else{
	                           		echo "ทั้งหมด";
	                           	}
                           	?>
                              </th>
                              <?php 
                                 if(isset($agentInfo)){
                                    echo '<th class="text-center"></th>';
                                    echo '<th class="text-center"></th>';
                                 }else{
                                    
                                    echo '<th class="text-center">ยอดส่ง 2 ตัว บน ล่าง</th>';
                                    echo "<th class='text-center'>$sent_2digi_display</th>";
                                 }
                              ?>
                           </tr>
                           <tr>
                              <th class="text-center">ยอดส่งรวม : 
                              <?php 
	                           	if(isset($agentInfo)){
	                           		echo number_format($agent_sent['bottom']+$agent_sent['top'])  ; 
	                           	}else{
                                    echo number_format($total_sent);
                                 }
                           	?>
                              </th>
                              <?php 

                                 if(isset($agentInfo)){
                                    echo '<th class="text-center"></th>';
                                    echo '<th class="text-center"></th>';
                                 }else{
                                    
                                    echo '<th class="text-center">ยอดส่ง 3 ตัวตรง</th>';
                                    echo "<th class='text-center'>$sent_3top_display</th>";
                                 }
                              ?>
                           </tr>
                           <tr>
                              <th class="text-center"> 
                              <?php 
	                           	if(isset($agentInfo)){
                                    echo "เปอร์เซ็นต์ ( ".$agentInfo['percent']."% ) : " ;
                                    $agent_percent = ($agent_sent['bottom']+$agent_sent['top'])*($agentInfo['percent']/100) ;
                                    echo number_format($agent_percent)  ; 
	                           	}else{
                                    echo "เปอร์เซ็นต์ : ".number_format($percent_total);
                                 }
                           	?>
                              </th>
                              <?php 
                                 if(isset($agentInfo)){
                                    echo '<th class="text-center"></th>';
                                    echo '<th class="text-center"></th>';
                                 }else{
                                    
                                    echo '<th class="text-center">ยอดส่ง 3 ตัวโต๊ด</th>';
                                    echo "<th class='text-center'>$sent_3tod_display</th>";
                                 }
                              ?>
                           </tr>
                           <tr>
                              <th colspan="2"><br><br></th>
                           </tr>
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
                                 <span><?php echo number_format($sum['2bottom']['bottom']) ; ?></span>
                              </td>
                              <td class="text-center">
                                 <span><?php echo number_format($sum['2bottom']['pay2']) ; ?></span>
                              </td>
                           </tr>
                           <tr>
                              <td class="text-center">
                                 <label>2 ตัวบน :</label >
                                 <span><?php echo $lottoInfo['2top'] ?></span>
                              </td>
                              <td class="text-center">
                                 <span><?php echo number_format($sum['2top']['top']) ; ?></span>
                              </td>
                              <td class="text-center">
                                 <span><?php echo number_format($sum['2top']['pay']) ; ?></span>
                              </td>
                           </tr>
                           <tr>
                              <td class="text-center">
                                 <label>3 ตัวตรง :</label >
                                 <span><?php echo $lottoInfo['3top'] ?></span>
                              </td>
                              <td class="text-center">
                                 <span><?php echo number_format($sum['3top']['top']) ; ?></span>
                              </td>
                              <td class="text-center">
                                 <span><?php echo number_format($sum['3top']['pay']) ; ?></span>
                              </td>
                           </tr>
                           <tr>
                              <td class="text-center">
                                 <label>3 ตัวโต๊ด :</label >
                                 <span class="text-black"><?php echo $sum['3tod']['number'] ; ?></span>
                              </td>
                              <td class="text-center">
                                 <span><?php echo number_format($sum['3tod']['bottom']) ; ?></span>
                              </td>
                              <td class="text-center">
                                 <span><?php echo number_format($sum['3tod']['pay2']) ; ?></span>
                              </td>
                           </tr>
                           <tr>
                              <td colspan="2" class="text-right">
                                 <label>ยอดรวมถูก เป็นเงิน</label >
                              </td>
                              <td class="text-center">
                                 <span>
                                 <?php $total = $sum['3tod']['pay2'] + $sum['3top']['pay'] + $sum['2top']['pay'] + $sum['2bottom']['pay2'] ;
                                    echo number_format($total) ; 
                                 ?></span>
                              </td>
                           </tr>
                           <tr>
                              <td colspan="2" class="text-right">
                                 <label>ยอดรวมสุทธิ</label >
                              </td>
                              <td class="text-center">
                                 <?php 
                                    if(isset($agentInfo)){
                                       $total_net = $total + $agent_percent - ($agent_sent['bottom']+$agent_sent['top'])  ;
                                    }else{
                                       $total_net = $total + $percent_total - $total_sent  ;
                                    }

                                    if($total_net<0){
                                       echo '<span class="text-danger">';
                                    }else{
                                       echo '<span class="text-success">+';
                                    }
                                       echo number_format($total_net) ; 
                                       echo "</span>";
                                 ?>
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