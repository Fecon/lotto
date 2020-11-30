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
              <select name="agent_id" id="agent_id" class="form-control select2" style="width: 100%;" onchange="this.form.submit()">
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
              <select name="lotto_id" id="lotto_id" class="form-control select2" style="width: 100%;">
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
              $sent_3top          = $agent_sent['3digi']['top'];
              $sent_3top_display  = number_format($sent_3top);
              $sent_3tod          = $agent_sent['3digi']['bottom'];
              $sent_3tod_display  = number_format($sent_3tod);
              $total_sent         = $sent_2digi+$sent_3top+$sent_3tod;
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
                <span id="total_sent"><?php 
                        echo number_format($total_sent);
                      ?></span>
              </div>
              <div class="col-md-3">
                <label>ยอดรวมหัก % :</label>
                <span id="total_net"><?php echo number_format($total_sent - $percent_total); ?></span>
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
                      <span id="2digi_top">
                        <?php 
                          echo number_format($agent_sent['2digi']['top']);
                        ?>
                      </span> 
                    </th>
                  </tr>
                  <tr>
                    <th class="text-center">ยอดรวมหัก %</th>
                    <th colspan="2" class="text-center">
                      <span id="2top_net">
                        <?php 
                          echo number_format($agent_sent['2digi']['top'] - $percent_2top);
                        ?>
                      </span> 
                    </th>
                  </tr>
                </table>
                <table class="table table-striped buyTable" id="2digi_topTable">
                  <thead>
                    <tr>
                      <th class="text-center text-small">เลข</th>
                      <th class="text-center text-small">จำนวนเงิน</th>
                      <th class="text-center text-small">เกินมา</th>
                    </tr>
                  </thead>
                  <tbody id="2digi_top_tr">
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
                      <span id="2digi_bottom">
                        <?php 
                          echo number_format($agent_sent['2digi']['bottom']);
                        ?>
                      </span> 
                    </th>
                  </tr>
                  <tr>
                    <th class="text-center">ยอดรวมหัก %</th>
                    <th colspan="2" class="text-center">
                      <span id="2bottom_net">
                        <?php 
                          echo number_format($agent_sent['2digi']['bottom'] - $percent_2bottom);
                        ?>
                      </span>
                      
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
                        <span id=""><?php echo number_format($value['sent']) ?></span>
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
                      <span id="3digi_top">
                        <?php 
                          echo number_format($agent_sent['3digi']['top']);
                        ?>
                      </span>
                    </th>
                  </tr>
                  <tr>
                    <th class="text-center">ยอดรวมหัก %</th>
                    <th colspan="2" class="text-center">
                      <span id="3top_net">
                        <?php 
                          echo number_format($agent_sent['3digi']['top'] - $percent_3top);
                        ?>
                      </span>
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
                      <span id="3digi_tod">
                        <?php 
                          echo number_format($agent_sent['3digi']['bottom']);
                        ?>
                      </span>
                    </th>
                  </tr>
                  <tr>
                    <th class="text-center">ยอดรวมหัก %</th>
                    <th colspan="2" class="text-center">
                      <span id="3tod_net">
                        <?php 
                          echo number_format($agent_sent['3digi']['bottom'] - $percent_3tod);
                        ?>
                      </span>
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

    function formatNumber(num) {
      return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

    // load_data();
    setInterval(function(){load_data(); }, 10000);

    function load_data(query)
     {
        $.ajax({
         url:'<?php echo site_url('dashboard/report_api');?>',
         method:"POST",
         data:{agent_id:$("#agent_id").val() , lotto_id:$("#lotto_id").val() , query:query},
         success:function(data){

          var result = JSON.parse(data);

          var sent_2digi          = parseInt(result.agent_sent['2digi']['top']) + parseInt(result.agent_sent['2digi']['bottom']);
          var sent_3top           = parseInt(result.agent_sent['3digi']['top']);
          var sent_3tod           = parseInt(result.agent_sent['3digi']['bottom']);
          var total_sent          = sent_2digi + sent_3top + sent_3tod;
          var total_net           = total_sent - result.percent_total;

          var sent_2top_net       = parseInt(result.agent_sent['2digi']['top']) - parseInt(result.percent_2top);
          var sent_2bottom_net    = parseInt(result.agent_sent['2digi']['bottom']) - parseInt(result.percent_2bottom);
          var sent_3top_net       = parseInt(result.agent_sent['3digi']['top']) - parseInt(result.percent_3top);
          var sent_3tod_net       = parseInt(result.agent_sent['3digi']['bottom']) - parseInt(result.percent_3tod);

          

          document.getElementById('total_sent').innerHTML     = formatNumber(total_sent);
          document.getElementById('total_net').innerHTML      = formatNumber(total_net);

          document.getElementById('2digi_top').innerHTML      = formatNumber(result.agent_sent['2digi']['top']);
          document.getElementById('2digi_bottom').innerHTML   = formatNumber(result.agent_sent['2digi']['bottom']);
          document.getElementById('3digi_top').innerHTML      = formatNumber(result.agent_sent['3digi']['top']);
          document.getElementById('3digi_tod').innerHTML      = formatNumber(result.agent_sent['3digi']['bottom']);

          document.getElementById('2top_net').innerHTML       = formatNumber(sent_2top_net);
          document.getElementById('2bottom_net').innerHTML    = formatNumber(sent_2bottom_net);
          document.getElementById('3top_net').innerHTML       = formatNumber(sent_3top_net);
          document.getElementById('3tod_net').innerHTML       = formatNumber(sent_3tod_net);
          // $('#result').html(data);
          // console.log(result.agent_sent['2digi']);
          var config_3 = <?php echo $config[3]['value'] ?> ;
          var config_4 = <?php echo $config[4]['value'] ?> ;
          var config_5 = <?php echo $config[5]['value'] ?> ;
          var config_6 = <?php echo $config[6]['value'] ?> ;
          var config_7 = <?php echo $config[7]['value'] ?> ;
          var config_8 = <?php echo $config[8]['value'] ?> ;
          var config_9 = <?php echo $config[9]['value'] ?> ;
          var config_10 = <?php echo $config[10]['value'] ?> ;
          var config_11 = <?php echo $config[11]['value'] ?> ;

          console.log(result.number_2top);



          if(result.number_2top!= '') {

              //$("#myTable tbody tr:not(:first-child)").remove();
              $("#2digi_top_tr").empty();
              $.each(result.number_2top, function(key, val) {

                  let bgClass = '' ;
                  let bgClass2 = '' ;

                  if(val['sent'] >= config_3) {
                    bgClass = 'bg-red';
                    bgClass2 = 'bg-red';
                  }else if(val['sent'] > config_4) {
                    bgClass = 'bg-yellow';
                    bgClass2 = '';
                  }else if(val['sent'] > config_5) {
                    bgClass = 'bg-green';
                    bgClass2 = '';
                  }

                  var tr = "<tr>";
                  tr = tr + "<td class='text-center'>" + val["number"] + "</td>";
                  tr = tr + "<td class='text-center "+ bgClass +"'>" + formatNumber(val["sent"]) + "</td>";
                  tr = tr + "<td class='text-center "+ bgClass2 +"'>" + formatNumber(parseInt(val["sent"]-config_3)) + "</td>";
                  tr = tr + "</tr>";
                  $('#2digi_topTable > tbody:last').append(tr);
              });
          }
          
         }
      })
     }
});
</script>

