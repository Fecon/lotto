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

  body{
      font-family: "THSarabun";
      font-size: 12pt !important;
   }
   table, table td {
     border: solid black;
   }
   table {
     border-width: 1px 1px 0 0;
     border-color: #999999;
   }
   table th {
     border-width: 0 0 1px 1px;
     font-size: 16pt !important;
     border-color: #999999;
   }
   table td {
     border-width: 0 0 1px 1px;
     font-size: 16pt !important;
     border-color: #999999;
   }
   table tr {
      page-break-before: avoid;
   }
   tr:nth-child(even) {
     background-color: #f2f2f2;
    }

</style>

</head>

<body>
<?php 
  function ceil100($number)
  {
    return ceil( $number / 100 ) * 100;
  }

  $month_arr=array(
      "1"=>"มกราคม",
      "2"=>"กุมภาพันธ์",
      "3"=>"มีนาคม",
      "4"=>"เมษายน",
      "5"=>"พฤษภาคม",
      "6"=>"มิถุนายน", 
      "7"=>"กรกฎาคม",
      "8"=>"สิงหาคม",
      "9"=>"กันยายน",
      "10"=>"ตุลาคม",
      "11"=>"พฤศจิกายน",
      "12"=>"ธันวาคม"                 
  );
 

?>
  <!-- Main content -->

        <?php 
            // Set Variable //
            $sum_2top = 0;
            foreach ($number_2top as $key => $value) { 
              if($value['sent'] >= $config[3]['value']){
                $sum_2top += ceil100($value['sent'] - $config[3]['value'] ) ; 
              }
            }
            
            $sum_2bottom = 0;
            foreach ($number_2bottom as $key => $value) { 
              if($value['sent'] >= $config[3]['value']){
                $sum_2bottom += ceil100($value['sent'] - $config[3]['value'] ) ; 
              }
            }

            $sum_3top = 0;
            foreach ($number_3top as $key => $value) { 
              if($value['sent'] >= $config[6]['value']){
                $sum_3top += ceil100($value['sent'] - $config[6]['value'] ) ; 
              }
            }

            $sum_3tod = 0;
            foreach ($number_3tod as $key => $value) { 
              if($value['sent'] >= $config[9]['value']){
                $sum_3tod += ceil100($value['sent'] - $config[9]['value'] ) ; 
              }
            }

            $total_sent = $sum_2top + $sum_2bottom + $sum_3top + $sum_3tod ;
            $total_net  = $total_sent * 0.75;

        ?>
        <table width="100%" cellspacing="1" cellpadding="1" style="border:none !important;table-layout:fixed;">
          <tr>
            <td style="border:none !important;">
              <strong style="font-size: 14pt;">งวดประจำวันที่ <?php  $date = new DateTime($lottoInfo['name']);
                                
                                echo $date->format('d')." ".$month_arr[$date->format('n')]." ".($date->format('Y')+543);
                         ?>
              </strong>
            </td>

            <td style="border:none !important;">
              <strong style="font-size: 14pt;">ยอดรวมทั้งหมด = <?php echo number_format($total_sent);?>
              </strong>
            </td>

            <td style="border:none !important;">
              <strong style="font-size: 14pt;">ยอดรวมทั้งหมดหัก 25% = <?php echo number_format($total_net);?>
              </strong>
            </td>
          </tr>
        </table>
        <table id="table" width="100%" cellspacing="1" cellpadding="1" style="border:none !important;table-layout:fixed">
        <tr>
              <td valign="top" style="max-width:620px !important;border:none !important;">

                <table width="90%">
                  <tr>
                    <td colspan="2" align="center"><strong>2 ตัวบน</strong></td>
                  </tr>
                  <tr>
                    <td style="width:50% !important;" align="center">ยอดรวม</td>
                    <td align="center"><span id="sum_2top"></span>
                      <?php 
                        echo number_format($sum_2top);
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td align="center">ยอดรวมหัก 25%</td>
                    <td align="center">
                      <?php 
                        echo number_format($sum_2top*0.75);
                      ?>
                    </td>
                  </tr>
                </table>
                <table width="90%">
                  <thead>
                    <tr>
                      <td style="width:50% !important;" align="center"><strong>เลข</strong></td>
                      <td align="center"><strong>จำนวนเงิน</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                          foreach ($number_2top as $key => $value) { 
                    ?>
                    <tr>
                      <td align="center">
                        <span><?php echo $value['number'] ?></span>
                      </td>
                      <td align="center" >
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
              
                <table width="90%">
                  <tr>
                    <td colspan="2" align="center"><strong>2 ตัวล่าง</strong></td>
                  </tr>
                  <tr>
                    <td style="width:50% !important;" align="center">ยอดรวม</td>
                    <td align="center">
                      <?php 
                        echo number_format($sum_2bottom);
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td align="center">ยอดรวมหัก 25%</td>
                    <td align="center">
                      <?php 
                        echo number_format($sum_2bottom*0.75);
                      ?>
                    </td>
                  </tr>
                </table>
                <table width="90%">
                  <thead>
                    <tr>
                      <td style="width:50% !important;" align="center"><strong>เลข</strong></td>
                      <td align="center"><strong>จำนวนเงิน</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                          foreach ($number_2bottom as $key => $value) { 
                    ?>
                    <tr>
                      <td align="center" class="text-center ">
                        <span><?php echo $value['number'] ?></span>
                      </td>
                      <td align="center" >
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
              
                <table width="90%">
                  <tr>
                    <td colspan="2" align="center"><strong>3 ตัวตรง</strong></td>
                  </tr>
                  <tr>
                    <td style="width:50% !important;" align="center">ยอดรวม</td>
                    <td align="center"><span id="sum_3top"></span>
                      <?php 
                        echo number_format($sum_3top);
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td align="center">ยอดรวมหัก 25%</td>
                    <td  align="center">
                      <?php 
                        echo number_format($sum_3top*0.75);
                      ?>
                    </td>
                  </tr>
                </table>
                <table width="90%">
                  <thead>
                    <tr>
                      <td style="width:50% !important;" align="center"><strong>เลข</strong></td>
                      <td align="center"><strong>จำนวนเงิน</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                          foreach ($number_3top as $key => $value) { 
                    ?>
                    <tr>
                      <td align="center">
                        <span><?php echo $value['number'] ?></span>
                      </td>
                      <td align="center" >
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

                <table width="90%">
                  <tr>
                    <td colspan="2" align="center"><strong>3 ตัวโต๊ด</strong></td>
                  </tr>
                  <tr>
                    <td style="width:50% !important;" align="center">ยอดรวม</td>
                    <td align="center">
                      <?php 
                        echo number_format($sum_3tod);
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td align="center">ยอดรวมหัก 25%</td>
                    <td align="center">
                      <?php 
                        echo number_format($sum_3tod*0.75);
                      ?>
                    </td>
                  </tr>
                </table>
                <table width="90%">
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
                    ?>
                    <tr>
                      <td align="center" class="text-center ">
                        <span><?php echo $value['number'] ?></span>
                      </td>
                      <td align="center" >
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
