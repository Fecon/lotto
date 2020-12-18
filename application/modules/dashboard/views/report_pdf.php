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
   .noborder{
   border: 0px !important;
   background: none !important;
   }

  .bg-red {
    background-color: red !important;
    color: #FFF
  }

  .bg-yellow {
    background-color: #ffc300 !important;
    color: #000
  }

  .bg-green {
    background-color: #019d49 !important;
    color: #FFF
  }

  .text-small {
    font-size:0.75em;
  }

  .td-hide {
    display:none;
  }
</style>

</head>

<body>

<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
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

        <div class="box box-info">
          <div class="box-body">
            <br>
            <div class="row">
              <div class="col-md-12">
                <label>ชื่อตัวแทน : </label>
                <span><?php 
                        if(isset($agentInfo)){
                          echo $agentInfo['name'] ;
                        }else{
                          echo "ทั้งหมด";
                        }
                      ?></span>
              </div>
              <div class="col-md-4">
                <label>ยอดรวมทั้งหมดที่ส่งมา</label>
                <span><?php 
                        echo number_format($total_sent);
                      ?></span>
              </div>
              <div class="col-md-3">
                <label>ยอดรวมหัก % :</label>
                <span><?php echo number_format($total_sent - $percent_total); ?></span>
              </div>
            </div>
            <div class="row">
            <table width="100%" style="border:0 0 0 0">
            <tr>
            <td width="25%" valign="top" style="border-width: 0 0 0 0;"> 
              <div class="col-md-3 col-sm-6">
                <table class="table table-striped" width="100%">
                  <tr>
                    <th colspan="3" class="text-center">2 ตัวบน</th>
                  </tr>
                  <tr>
                    <th class="text-center">ยอดรวม</th>
                    <th colspan="2" class="text-center">
                      <?php 
                        echo number_format($agent_sent['2digi']['top']);
                      ?>
                    </th>
                  </tr>
                  <tr>
                    <th class="text-center">ยอดรวมหัก %</th>
                    <th colspan="2" class="text-center">
                      <?php 
                        echo number_format($agent_sent['2digi']['top'] - $percent_2top);
                      ?>
                    </th>
                  </tr>
                </table>
                <table class="table table-striped buyTable" width="100%">
                  <thead>
                    <tr>
                      <th class="text-center text-small">เลข</th>
                      <th class="text-center text-small">จำนวนเงิน</th>
                      <th class="text-center text-small">เกินมา</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($number_2top as $key => $value) { 
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
                      <td align="center" class="text-center <?php echo $bgClass ; ?>">
                        <span><?php echo number_format($value['sent']) ?></span>
                      </td>
                      <td align="center" class="text-center <?php echo $bgClass2 ; ?>">
                        <span>
                          <?php 
                            if($value['sent'] >= $config[3]['value']){
                              echo number_format($value['sent'] - $config[3]['value']) ; 
                            }
                          ?></span>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>

              </td>
              <td width="25%" valign="top" style="border-width: 0 0 0 0;">

              <div class="col-md-3 col-sm-6">
                <table class="table table-striped" width="100%">
                  <tr>
                    <th colspan="3" class="text-center">2 ตัวล่าง</th>
                  </tr>
                  <tr>
                    <th class="text-center">ยอดรวม</th>
                    <th colspan="2" class="text-center">
                      <?php 
                        echo number_format($agent_sent['2digi']['bottom']);
                      ?>
                    </th>
                  </tr>
                  <tr>
                    <th class="text-center">ยอดรวมหัก %</th>
                    <th colspan="2" class="text-center">
                      <?php 
                        echo number_format($agent_sent['2digi']['bottom'] - $percent_2bottom);
                      ?>
                    </th>
                  </tr>
                </table>
                <table class="table table-striped buyTable" width="100%">
                  <thead>
                    <tr>
                      <th class="text-center text-small">เลข</th>
                      <th class="text-center text-small">จำนวนเงิน</th>
                      <th class="text-center text-small">เกินมา</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($number_2bottom as $key => $value) { 
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
                      <td align="center" class="text-center <?php echo $bgClass ; ?>">
                        <span><?php echo number_format($value['sent']) ?></span>
                      </td>
                      <td align="center" class="text-center <?php echo $bgClass2 ; ?>">
                        <span>
                          <?php 
                            if($value['sent'] >= $config[3]['value']){
                              echo number_format($value['sent'] - $config[3]['value']) ; 
                            }
                          ?></span>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>

              </td>
              <td width="25%" valign="top" style="border-width: 0 0 0 0;">

              <div class="col-md-3 col-sm-6">
                <table class="table table-striped" width="100%">
                  <tr>
                    <th colspan="3" class="text-center">3 ตัวตรง</th>
                  </tr>
                  <tr>
                    <th class="text-center">ยอดรวม</th>
                    <th colspan="2" class="text-center">
                      <?php 
                        echo number_format($agent_sent['3digi']['top']);
                      ?>
                    </th>
                  </tr>
                  <tr>
                    <th class="text-center">ยอดรวมหัก %</th>
                    <th colspan="2" class="text-center">
                      <?php 
                        echo number_format($agent_sent['3digi']['top'] - $percent_3top);
                      ?>
                    </th>
                  </tr>
                </table>
                <table class="table table-striped buyTable" width="100%">
                  <thead>
                    <tr>
                      <th class="text-center text-small">เลข</th>
                      <th class="text-center text-small">จำนวนเงิน</th>
                      <th class="text-center text-small">เกินมา</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($number_3top as $key => $value) { 
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
                      <td align="center" class="text-center <?php echo $bgClass ; ?>">
                        <span><?php echo number_format($value['sent']) ?></span>
                      </td>
                      <td align="center" class="text-center <?php echo $bgClass2 ; ?>">
                        <span>
                          <?php 
                            if($value['sent'] >= $config[6]['value']){
                              echo number_format($value['sent'] - $config[6]['value']) ; 
                            }
                          ?>
                        </span>
                      </td>
                    </tr>
                    <?php } ?>
                  <tbody>
                </table>
              </div>

              </td>
              <td width="25%" valign="top" style="border-width: 0 0 0 0;">

              <div class="col-md-3 col-sm-6">
                <table class="table table-striped" width="100%">
                  <tr>
                    <th colspan="3" class="text-center">3 ตัวโต๊ด</th>
                  </tr>
                  <tr>
                    <th class="text-center">ยอดรวม</th>
                    <th colspan="2" class="text-center">
                      <?php 
                        echo number_format($agent_sent['3digi']['bottom']);
                      ?>
                    </th>
                  </tr>
                  <tr>
                    <th class="text-center">ยอดรวมหัก %</th>
                    <th colspan="2" class="text-center">
                      <?php 
                        echo number_format($agent_sent['3digi']['bottom'] - $percent_3tod);
                      ?>
                    </th>
                  </tr>
                </table>
                <table class="table table-striped buyTable" width="100%">
                  <thead>
                    <tr>
                      <th class="text-center text-small">เลข</th>
                      <th class="text-center text-small">จำนวนเงิน</th>
                      <th class="text-center text-small">เกินมา</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($number_3tod as $key => $value) { 
                            if($value['sent'] >= $config[9]['value']) {
                              $bgClass  = 'bg-red';
                              $bgClass2 = 'bg-red';
                            
                    ?>
                    <tr class="<?php echo $hideTd ?>">
                      <td align="center" class="text-center ">
                        <span><?php echo $value['number'] ?></span>
                      </td>
                      <td align="center" class="text-center <?php echo $bgClass ; ?>">
                        <span><?php echo number_format($value['sent']) ?></span>
                      </td>
                      <td align="center" class="text-center <?php echo $bgClass2 ; ?>">
                        <span>
                          <?php 
                            if($value['sent'] >= $config[9]['value']){
                              echo number_format($value['sent'] - $config[9]['value']) ; 
                            }
                          ?></span>
                      </td>
                    </tr>
                    <?php    }
                            } ?>
                  </tbody>
                </table>
              </div>
              </td>
              </tr>
            </table>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
</body>
</html>
