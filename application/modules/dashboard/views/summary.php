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
         สรุปยอดรวม
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
               <div class="col-md-4 col-md-offset-3">
                  <div class="form-group text-right">
                     <label>&nbsp;</label>
                     <br>
                     <a target="_blank" href="<?php echo site_url('dashboard/summary_pdf'); ?>"><button type="button" class="btn btn-default"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Export PDF</button></a>
                  </div>
               </div>
            </div>
            <?php echo form_close(); ?>
            <br>
            <div class="box box-danger">
               <div class="box-body">
                  <div class="row">
                     <div class="col-md-10 col-md-offset-1">
                        <table class="table table-striped">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>ชื่อตัวแทน</th>
                                 <th class="text-right">ยอดส่ง</th>
                                 <th class="text-right">%</th>
                                 <th class="text-right">ยอดรวมถูก</th>
                                 <th class="text-right">ยอดสุทธิ</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                              $sum_sent      = 0;
                              $sum_percent   = 0;
                              $sum_pay       = 0;
                              $sum_net       = 0;
                              foreach ($summary as $key => $agent) { ?>
                              
                              <tr>
                                 <td><?php echo $key+1; ?></td>
                                 <td><?php echo $agent['name']; ?></td>
                                 <td class="text-right">
                                    <?php 
                                       $agent['sent'] = $agent['top']+$agent['bottom'];
                                       $sum_sent = $sum_sent + $agent['sent'];
                                       echo number_format($agent['sent']); 
                                    ?>
                                 </td>
                                 <td class="text-right">
                                    <?php   
                                       $agent['percent_price'] = ($agent['top']+$agent['bottom']) * ($agent['percent']/100) ;
                                       $sum_percent = $sum_percent + $agent['percent_price'];
                                       echo number_format($agent['percent_price']); 
                                    ?></td>
                                 <td class="text-right">
                                    <?php 
                                       $agent['total_pay'];
                                       $sum_pay =+ $sum_pay + $agent['total_pay'];
                                       echo number_format($agent['total_pay']); 
                                    ?></td>
                                 <td class="text-right">
                                    <?php 
                                          $agent['total_net'] = ($agent['percent_price']+$agent['total_pay'])- $agent['sent'];
                                          $sum_net = $sum_net + $agent['total_net'];
                                          if($agent['total_net']<0){
                                             echo '<span class="text-danger">';
                                          }else{
                                             echo '<span class="text-success">';
                                          }
                                             echo number_format($agent['total_net']) ; 
                                             echo "</span>";
                                    ?>
                                 </td>
                              </tr>

                              <?php } ?>
                           </tbody>
                           <tfoot>
                              <tr>
                                 <td colspan="2" class="text-center "><strong>รวม</strong></td>
                                 <td class="text-right"><strong><?php echo number_format($sum_sent); ?></strong></td>
                                 <td class="text-right"><strong><?php echo number_format($sum_percent); ?></strong></td>
                                 <td class="text-right"><strong><?php echo number_format($sum_pay); ?></strong></td>
                                 <td class="text-right"><strong>
                                       <?php 
                                          if($sum_net<0){
                                             echo '<span class="text-danger">';
                                          }else{
                                             echo '<span class="text-success">';
                                          }
                                             echo number_format($sum_net) ; 
                                             echo "</span>";
                                       ?></strong></td>
                              </tr>
                           </tfoot>

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