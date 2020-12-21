<!DOCTYPE html>
<html>
<head>
   <title><?php echo $file_name; ?></title>
   <meta charset="UTF-8" />

<style>
  #table td{
    font-family: "THSarabun";
    width:25% !important;
    max-width:25% !important;
   }
  }
  body{
      font-family: "THSarabun";
      font-size: 16pt !important;
   }
   table, table td {
     border: solid black;
   }
   table {
     border-width: 1px 1px 0 0;
   }
   table th {
     border-width: 0 0 1px 1px;
     font-size: 16pt !important;
   }
   table td {
     border-width: 0 0 1px 1px;
     font-size: 16pt !important;
   }
   table tr {
      page-break-before: avoid;
   }
   .noborder{
   border: 0px !important;
   background: none !important;
   }
   tr:nth-child(even) {
     background-color: #f2f2f2;
    }

  .bg-red {
/*    background-color: red !important;
    color: #FFF*/
  }

  .bg-yellow {
    background-color: #ffc300 !important;
    color: #000
  }

  .bg-green {
    background-color: #019d49 !important;
    color: #FFF
  }

  .td-hide {
    display:none;
  }
</style>

</head>

<body>
<?php 
  function ceil100($number)
  {
    return ceil( $number / 100 ) * 100;
  }
?>
  <!-- Main content -->

        <?php 
            // Set Variable //
              $sent_2digi         = $agent_sent['2digi']['top'] + $agent_sent['2digi']['bottom'];
              $sent_2digi_display = number_format($sent_2digi);
              $sent_3top         = $agent_sent['3digi']['top'];
              $sent_3top_display = number_format($sent_3top);
              $sent_3tod         = $agent_sent['3digi']['bottom'];
              $sent_3tod_display = number_format($sent_3tod);
              $total_sent       = $sent_2digi+$sent_3top+$sent_3tod;
        ?>

        <table id="table" width="100%" cellspacing="1" cellpadding="1" style="border:none !important;table-layout:fixed">
        <tr>
              <td valign="top" style="max-width:620px !important;border:none !important;">

                <table width="100%">
                  <tr>
                    <td colspan="3" align="center"><strong>2 ตัวบน</strong></td>
                  </tr>
                  <tr>
                    <td style="width:50% !important;" align="center"><strong>ยอดรวม</strong></td>
                    <td colspan="2" align="center"><span id="sum_2top"></span>
                      <?php 
                        $sum_2top = 0;
                        foreach ($number_2top as $key => $value) { 
                          if($value['sent'] >= $config[3]['value']){
                            $sum_2top += ceil100($value['sent'] - $config[3]['value'] ) ; 
                          }
                        }
                        echo number_format($sum_2top);
                      ?>
                    </td>
                  </tr>
                </table>
                <table width="100%">
                  <thead>
                    <tr>
                      <td style="width:50% !important;" align="center"><strong>เลข</strong></td>
                      <td align="center"><strong>จำนวนเงิน</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                          foreach ($number_2top as $key => $value) { 
                            $hideTd = 'td-hide';
                            if($value['sent'] >= $config[3]['value']) {
                              $bgClass  = 'bg-red';
                              $bgClass2 = 'bg-red';
                              $hideTd   = '';
                            }elseif($value['sent'] > $config[4]['value']) {
                              $bgClass  = 'bg-yellow';
                              $bgClass2 = '';
                            }elseif($value['sent'] > $config[5]['value']) {
                              $bgClass  = 'bg-green';
                              $bgClass2 = '';
                            }else{
                              $bgClass  = '';
                              $bgClass2 = '';
                            }
                    ?>
                    <tr class="<?php echo $hideTd ?>">
                      <td align="center" class="text-center ">
                        <span><?php echo $value['number'] ?></span>
                      </td>
                      <td align="center" class="text-center <?php echo $bgClass2 ; ?>">
                        <span>
                          <?php 
                            if($value['sent'] >= $config[3]['value']){
                              echo number_format(ceil100($value['sent'] - $config[3]['value'])) ; 
                            }
                          ?></span>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
          

              </td>
              
              <td valign="top" style="max-width:620px !important;border:none !important;" >
              
                <table width="100%">
                  <tr>
                    <td colspan="3" align="center"><strong>2 ตัวล่าง</strong></td>
                  </tr>
                  <tr>
                    <td style="width:50% !important;" align="center"><strong>ยอดรวม</strong></td>
                    <td colspan="2" align="center">
                      <?php 
                        $sum_2bottom = 0;
                        foreach ($number_2bottom as $key => $value) { 
                          if($value['sent'] >= $config[3]['value']){
                            $sum_2bottom += ceil100($value['sent'] - $config[3]['value'] ) ; 
                          }
                        }
                        echo number_format($sum_2bottom);
                      ?>
                    </td>
                  </tr>
                </table>
                <table width="100%">
                  <thead>
                    <tr>
                      <td style="width:50% !important;" align="center"><strong>เลข</strong></td>
                      <td align="center"><strong>จำนวนเงิน</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                          foreach ($number_2bottom as $key => $value) { 
                            $hideTd = 'td-hide';
                            if($value['sent'] >= $config[3]['value']) {
                              $bgClass  = 'bg-red';
                              $bgClass2 = 'bg-red';
                              $hideTd   = '';
                            }elseif($value['sent'] > $config[4]['value']) {
                              $bgClass  = 'bg-yellow';
                              $bgClass2 = '';
                            }elseif($value['sent'] > $config[5]['value']) {
                              $bgClass  = 'bg-green';
                              $bgClass2 = '';
                            }else{
                              $bgClass  = '';
                              $bgClass2 = '';
                            }
                    ?>
                    <tr class="<?php echo $hideTd ?>">
                      <td align="center" class="text-center ">
                        <span><?php echo $value['number'] ?></span>
                      </td>
                      <td align="center" class="text-center <?php echo $bgClass2 ; ?>">
                        <span>
                          <?php 
                            if($value['sent'] >= $config[3]['value']){
                              echo number_format(ceil100($value['sent'] - $config[3]['value'])) ; 
                            }
                          ?></span>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
         

              </td>
              
              <td valign="top" style="max-width:620px !important;border:none !important;" >
              
                <table width="100%">
                  <tr>
                    <td colspan="3" align="center"><strong>3 ตัวตรง</strong></td>
                  </tr>
                  <tr>
                    <td style="width:50% !important;" align="center"><strong>ยอดรวม</strong></td>
                    <td colspan="2" align="center"><span id="sum_3top"></span>
                      <?php 
                        $sum_3top = 0;
                        foreach ($number_3top as $key => $value) { 
                          if($value['sent'] >= $config[6]['value']){
                            $sum_3top += ceil100($value['sent'] - $config[6]['value'] ) ; 
                          }
                        }
                        echo number_format($sum_3top);
                      ?>
                    </td>
                  </tr>
                </table>
                <table width="100%">
                  <thead>
                    <tr>
                      <td style="width:50% !important;" align="center"><strong>เลข</strong></td>
                      <td align="center"><strong>จำนวนเงิน</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                          foreach ($number_3top as $key => $value) { 
                            $hideTd = 'td-hide';
                            if($value['sent'] >= $config[6]['value']) {
                              $bgClass  = 'bg-red';
                              $bgClass2 = 'bg-red';
                              $hideTd   = '';
                            }elseif($value['sent'] > $config[7]['value']) {
                              $bgClass  = 'bg-yellow';
                              $bgClass2 = '';
                            }elseif($value['sent'] > $config[8]['value']) {
                              $bgClass  = 'bg-green';
                              $bgClass2 = '';
                            }else{
                              $bgClass  = '';
                              $bgClass2 = '';
                            }
                    ?>
                    <tr class="<?php echo $hideTd ?>">
                      <td align="center" class="text-center ">
                        <span><?php echo $value['number'] ?></span>
                      </td>
                      <td align="center" class="text-center <?php echo $bgClass2 ; ?>">
                        <span>
                          <?php 
                            if($value['sent'] >= $config[6]['value']){
                              echo number_format(ceil100($value['sent'] - $config[6]['value'])) ;  
                            }
                          ?>
                        </span>
                      </td>
                    </tr>
                    <?php } ?>
                  <tbody>
                </table>


              </td>
              
              <td valign="top" style="max-width:620px !important;border:none !important;" >

                <table width="100%">
                  <tr>
                    <td colspan="3" align="center"><strong>3 ตัวโต๊ด</strong></td>
                  </tr>
                  <tr>
                    <td style="width:50% !important;" align="center"><strong>ยอดรวม</strong></td>
                    <td colspan="2" align="center">
                      <?php 
                        $sum_3tod = 0;
                        foreach ($number_3tod as $key => $value) { 
                          if($value['sent'] >= $config[9]['value']){
                            $sum_3tod += ceil100($value['sent'] - $config[9]['value'] ) ; 
                          }
                        }
                        echo number_format($sum_3tod);
                      ?>
                    </td>
                  </tr>
                </table>
                <table width="100%">
                  <thead>
                    <tr>
                      <td style="width:50% !important;" align="center"><strong>เลข</strong></td>
                      <td align="center"><strong>จำนวนเงิน</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                          foreach ($number_3tod as $key => $value) { 
                            if($value['sent'] >= $config[9]['value']) {
                              $bgClass  = 'bg-red';
                              $bgClass2 = 'bg-red';
                            
                    ?>
                    <tr class="<?php echo $hideTd ?>">
                      <td align="center" class="text-center ">
                        <span><?php echo $value['number'] ?></span>
                      </td>
                      <td align="center" class="text-center <?php echo $bgClass2 ; ?>">
                        <span>
                          <?php 
                            if($value['sent'] >= $config[9]['value']){
                              echo number_format(ceil100($value['sent'] - $config[9]['value'])) ; 
                            }
                          ?></span>
                      </td>
                    </tr>
                    <?php    }
                            } ?>
                  </tbody>
                </table>

              </td>
              </tr>
              </table>
</body>
</html>
