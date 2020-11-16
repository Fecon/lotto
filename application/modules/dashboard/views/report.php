<style>
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
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      ยอดรวม
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <?php echo form_open('dashboard/report/')?>
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label>ตัวแทน</label>
              <select name="agent_id" class="form-control select2" style="width: 100%;" onchange="this.form.submit()">
                <option value="0">ทั้งหมด</option>
                <?php foreach ($list_agent as $key => $agent) { ?>
                <option value="<?php echo $agent['id']; ?>" <?php
                            if(isset($agentInfo)){
                                if($agent['id']==$agentInfo['id']){
                                  echo ' selected ';
                                }
                            }
                          ?>><?php echo $agent['name']; ?></option>
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
          <?php echo form_close(); ?>
        </div>
        <br>
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
            <br>
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <table class="table table-striped">
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
                <table class="table table-striped buyTable">
                  <thead>
                    <tr>
                      <th class="text-center text-small">เลข</th>
                      <th class="text-center text-small">จำนวนเงิน</th>
                      <th class="text-center text-small">เกินมา</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($number_2top as $key => $value) { 
                            if($value['sent'] >= $config[3]['value']) {
                              $bgClass = 'bg-red';
                              $bgClass2 = 'bg-red';
                            }elseif($value['sent'] > $config[4]['value']) {
                              $bgClass = 'bg-yellow';
                              $bgClass2 = '';
                            }elseif($value['sent'] > $config[5]['value']) {
                              $bgClass = 'bg-green';
                              $bgClass2 = '';
                            }else{
                              $bgClass = '';
                              $bgClass2 = '';
                            }
                    ?>
                    <tr class="">
                      <td class="text-center ">
                        <span><?php echo $value['number'] ?></span>
                      </td>
                      <td class="text-center <?php echo $bgClass ; ?>">
                        <span><?php echo number_format($value['sent']) ?></span>
                      </td>
                      <td class="text-center <?php echo $bgClass2 ; ?>">
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

              <div class="col-md-3 col-sm-6">
                <table class="table table-striped">
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
                <table class="table table-striped buyTable">
                  <thead>
                    <tr>
                      <th class="text-center text-small">เลข</th>
                      <th class="text-center text-small">จำนวนเงิน</th>
                      <th class="text-center text-small">เกินมา</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($number_2bottom as $key => $value) { 
                            if($value['sent'] >= $config[3]['value']) {
                              $bgClass = 'bg-red';
                              $bgClass2 = 'bg-red';
                            }elseif($value['sent'] > $config[4]['value']) {
                              $bgClass = 'bg-yellow';
                              $bgClass2 = '';
                            }elseif($value['sent'] > $config[5]['value']) {
                              $bgClass = 'bg-green';
                              $bgClass2 = '';
                            }else{
                              $bgClass = '';
                              $bgClass2 = '';
                            }
                    ?>
                    <tr class="">
                      <td class="text-center ">
                        <span><?php echo $value['number'] ?></span>
                      </td>
                      <td class="text-center <?php echo $bgClass ; ?>">
                        <span><?php echo number_format($value['sent']) ?></span>
                      </td>
                      <td class="text-center <?php echo $bgClass2 ; ?>">
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

              <div class="col-md-3 col-sm-6">
                <table class="table table-striped">
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
                <table class="table table-striped buyTable">
                  <thead>
                    <tr>
                      <th class="text-center text-small">เลข</th>
                      <th class="text-center text-small">จำนวนเงิน</th>
                      <th class="text-center text-small">เกินมา</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($number_3top as $key => $value) { 
                            if($value['sent'] >= $config[6]['value']) {
                              $bgClass = 'bg-red';
                              $bgClass2 = 'bg-red';
                            }elseif($value['sent'] > $config[7]['value']) {
                              $bgClass = 'bg-yellow';
                              $bgClass2 = '';
                            }elseif($value['sent'] > $config[8]['value']) {
                              $bgClass = 'bg-green';
                              $bgClass2 = '';
                            }else{
                              $bgClass = '';
                              $bgClass2 = '';
                            }
                    ?>
                    <tr class="">
                      <td class="text-center ">
                        <span><?php echo $value['number'] ?></span>
                      </td>
                      <td class="text-center <?php echo $bgClass ; ?>">
                        <span><?php echo number_format($value['sent']) ?></span>
                      </td>
                      <td class="text-center <?php echo $bgClass2 ; ?>">
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

              <div class="col-md-3 col-sm-6">
                <table class="table table-striped">
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
                        echo number_format($agent_sent['3digi']['bottom'] - $percent_2tod);
                      ?>
                    </th>
                  </tr>
                </table>
                <table class="table table-striped buyTable">
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
                              $bgClass = 'bg-red';
                              $bgClass2 = 'bg-red';
                            }elseif($value['sent'] > $config[10]['value']) {
                              $bgClass = 'bg-yellow';
                              $bgClass2 = '';
                            }elseif($value['sent'] > $config[11]['value']) {
                              $bgClass = 'bg-green';
                              $bgClass2 = '';
                            }else{
                              $bgClass = '';
                              $bgClass2 = '';
                            }
                    ?>
                    <tr class="">
                      <td class="text-center ">
                        <span><?php echo $value['number'] ?></span>
                      </td>
                      <td class="text-center <?php echo $bgClass ; ?>">
                        <span><?php echo number_format($value['sent']) ?></span>
                      </td>
                      <td class="text-center <?php echo $bgClass2 ; ?>">
                        <span>
                          <?php 
                            if($value['sent'] >= $config[9]['value']){
                              echo number_format($value['sent'] - $config[9]['value']) ; 
                            }
                          ?></span>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
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

<script>
  $(document).ready(function () {
    $('.buyTable').DataTable({
      "paging": false,
      "info": false,
      "searching": false,
      "order": [
        [1, "desc"]
      ]
    });
  });
</script>
