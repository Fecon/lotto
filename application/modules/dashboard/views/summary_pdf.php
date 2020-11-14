<!DOCTYPE html>
<html>
<head>
   <title><?php echo $file_name; ?></title>
   <meta charset="UTF-8" />
   <style>
   body{
      font-family: "THSarabun";
      font-size: 20px;
   }
   table, table td {
     border: solid black;
   }
   table {
     border-width: 1px 1px 0 0;
   }
   table td {
     border-width: 0 0 1px 1px;
     height: 32px;
   }
   </style>
</head>

<body>

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
      <table width="100%" class="table table-striped">
         <thead>
            <tr>
               <td align="center">#</td>
               <td align="center">ชื่อตัวแทน</th>
               <td align="center">ยอดส่ง</td>
               <td align="center">%</td>
               <td align="center">ยอดรวมถูก</td>
               <td align="center">ยอดสุทธิ</td>
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
               <td align="center"><?php echo $key+1; ?></td>
               <td><?php echo $agent['name']; ?></td>
               <td align="right">
                  <?php 
                     $agent['sent'] = $agent['top']+$agent['bottom'];
                     $sum_sent = $sum_sent + $agent['sent'];
                     echo number_format($agent['sent']); 
                  ?>
               </td>
               <td align="right">
                  <?php   
                     $agent['percent_price'] = ($agent['top']+$agent['bottom']) * ($agent['percent']/100) ;
                     $sum_percent = $sum_percent + $agent['percent_price'];
                     echo number_format($agent['percent_price']); 
                  ?></td>
               <td align="right">
                  <?php 
                     $agent['total_pay'];
                     $sum_pay =+ $sum_pay + $agent['total_pay'];
                     echo number_format($agent['total_pay']); 
                  ?></td>
               <td align="right">
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
               <td align="center" colspan="2"><strong>รวม</strong></td>
               <td align="right"><strong><?php echo number_format($sum_sent); ?></strong></td>
               <td align="right"><strong><?php echo number_format($sum_percent); ?></strong></td>
               <td align="right"><strong><?php echo number_format($sum_pay); ?></strong></td>
               <td align="right"><strong>
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
   </section>
   <!-- /.content -->
</div>
</body>
</html>
