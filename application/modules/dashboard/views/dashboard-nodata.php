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

            <br>
            <div class="box box-danger">
               <div class="box-body">
                  <div class="row">
                     <div class="col-md-10 col-md-offset-1">

                        <table class="table table-striped">
                           <tr>
                              <th class="text-center">
                              ชื่อตัวแทน : 
 
                              </th>
                              <th class="text-center"></th>
                              <th class="text-center"></th>
                           </tr>
                           <tr>
                              <th class="text-center">ยอดส่งรวม : 

                              </th>
                              <th class="text-center"></th>
                              <th class="text-center"></th>
                           </tr>
                           <tr>
                              <th class="text-center"> 
                              <th class="text-center"></th>
                              <th class="text-center"></th>
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
                                 <span></span>
                              </td>
                              <td class="text-center">
                              <span></span>
                              </td>
                              <td class="text-center">
                              <span></span>
                              </td>
                           </tr>
                           <tr>
                              <td class="text-center">
                                 <label>2 ตัวบน :</label >
                                 <span></span>
                              </td>
                              <td class="text-center">
                              <span></span>
                              </td>
                              <td class="text-center">
                              <span></span>
                              </td>
                           </tr>
                           <tr>
                              <td class="text-center">
                                 <label>3 ตัวตรง :</label >
                                 <span></span>
                              </td>
                              <td class="text-center">
                              <span></span>
                              </td>
                              <td class="text-center">
                              <span></span>
                              </td>
                           </tr>
                           <tr>
                              <td class="text-center">
                                 <label>3 ตัวโต๊ด :</label >
                                 <span></span>
                              </td>
                              <td class="text-center">
                              <span></span>
                              </td>
                              <td class="text-center">
                              <span></span>
                              </td>
                           </tr>
                           <tr>
                              <td colspan="2" class="text-right">
                                 <label>ยอดรวมถูก เป็นเงิน</label >
                              </td>
                              <td class="text-center">
                              <span></span>
                              </td>
                           </tr>
                           <tr>
                              <td colspan="2" class="text-right">
                                 <label>ยอดรวมสุทธิ</label >
                              </td>
                              <td class="text-center">
                                <span></span>
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