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
                <span id="total_sent"></span>
              </div>
              <div class="col-md-3">
                <label>ยอดรวมหัก % :</label>
                <span id="total_net"></span>
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
                      <span id="2digi_top"></span> 
                    </th>
                  </tr>
                  <tr>
                    <th class="text-center">ยอดรวมหัก %</th>
                    <th colspan="2" class="text-center">
                      <span id="2top_net"></span> 
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
                      <span id="2digi_bottom"></span> 
                    </th>
                  </tr>
                  <tr>
                    <th class="text-center">ยอดรวมหัก %</th>
                    <th colspan="2" class="text-center">
                      <span id="2bottom_net"></span>                      
                    </th>
                  </tr>
                </table>
                <table class="table table-striped buyTable" id="2digi_bottomTable">
                  <thead>
                    <tr>
                      <th class="text-center text-small">เลข</th>
                      <th class="text-center text-small">จำนวนเงิน</th>
                      <th class="text-center text-small">เกินมา</th>
                    </tr>
                  </thead>
                  <tbody id="2digi_bottom_tr">
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
                      <span id="3digi_top"></span>
                    </th>
                  </tr>
                  <tr>
                    <th class="text-center">ยอดรวมหัก %</th>
                    <th colspan="2" class="text-center">
                      <span id="3top_net"></span>
                    </th>
                  </tr>
                </table>
                <table class="table table-striped buyTable" id="3digi_topTable">
                  <thead>
                    <tr>
                      <th class="text-center text-small">เลข</th>
                      <th class="text-center text-small">จำนวนเงิน</th>
                      <th class="text-center text-small">เกินมา</th>
                    </tr>
                  </thead>
                  <tbody id="3digi_top_tr">
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
                      <span id="3digi_tod"></span>
                    </th>
                  </tr>
                  <tr>
                    <th class="text-center">ยอดรวมหัก %</th>
                    <th colspan="2" class="text-center">
                      <span id="3tod_net"></span>
                    </th>
                  </tr>
                </table>
                <table class="table table-striped buyTable" id="3digi_todTable">
                  <thead>
                    <tr>
                      <th class="text-center text-small">เลข</th>
                      <th class="text-center text-small">จำนวนเงิน</th>
                      <th class="text-center text-small">เกินมา</th>
                    </tr>
                  </thead>
                  <tbody id="3digi_tod_tr">
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
      if(num>0){
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
      }else{
        return 0;
      }
      
    }

    
    function sortFunction(x, y) {
      return y.sent - x.sent;
    }

    load_data();

    var today = new Date();
    today.setHours(0,0,0,0);
    var lottoDate = new Date('<?php echo $lotto['name']; ?>');
    lottoDate.setHours(0,0,0,0);

    if(today<=lottoDate){
      setInterval(function(){load_data(); }, 20000);
    }

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
          document.getElementById('total_net').innerHTML      = formatNumber(Math.round(total_net));

          document.getElementById('2digi_top').innerHTML      = formatNumber(result.agent_sent['2digi']['top']);
          document.getElementById('2digi_bottom').innerHTML   = formatNumber(result.agent_sent['2digi']['bottom']);
          document.getElementById('3digi_top').innerHTML      = formatNumber(result.agent_sent['3digi']['top']);
          document.getElementById('3digi_tod').innerHTML      = formatNumber(result.agent_sent['3digi']['bottom']);

          document.getElementById('2top_net').innerHTML       = formatNumber(sent_2top_net);
          document.getElementById('2bottom_net').innerHTML    = formatNumber(sent_2bottom_net);
          document.getElementById('3top_net').innerHTML       = formatNumber(sent_3top_net);
          document.getElementById('3tod_net').innerHTML       = formatNumber(sent_3tod_net);

          var config_3 = <?php echo $config[3]['value'] ?> ;
          var config_4 = <?php echo $config[4]['value'] ?> ;
          var config_5 = <?php echo $config[5]['value'] ?> ;
          var config_6 = <?php echo $config[6]['value'] ?> ;
          var config_7 = <?php echo $config[7]['value'] ?> ;
          var config_8 = <?php echo $config[8]['value'] ?> ;
          var config_9 = <?php echo $config[9]['value'] ?> ;
          var config_10 = <?php echo $config[10]['value'] ?> ;
          var config_11 = <?php echo $config[11]['value'] ?> ;

          // Start 2 Top //
          var number_2top = result.number_2top;
          var result_2top = [];

          for(let i in number_2top){
            number_2top[i]['sent'] = parseInt(number_2top[i]['sent'])
            result_2top.push(number_2top[i]);
          }
      
          var arr_2top = result_2top.sort(sortFunction);
        
          if(arr_2top!= '') {
              $("#2digi_top_tr").empty();
              $.each(arr_2top, function(key, val) {

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

                  let sent_over = '';
                  if(val['sent'] >= config_3){
                    sent_over =  formatNumber(val["sent"] - config_3) ; 
                  }

                  var tr_2top = "<tr>";
                  tr_2top = tr_2top + "<td class='text-center'>" + val["number"] + "</td>";
                  tr_2top = tr_2top + "<td class='text-center "+ bgClass +"'>" + formatNumber(val["sent"]) + "</td>";
                  tr_2top = tr_2top + "<td class='text-center "+ bgClass2 +"'>" + sent_over + "</td>";
                  tr_2top = tr_2top + "</tr>";
                  $('#2digi_topTable').append(tr_2top);
              });
          }

          // End 2 Top //

          // Start 2 Bottom //
          var number_2bottom = result.number_2bottom;
          var result_2bottom = [];

          for(let i in number_2bottom){
            number_2bottom[i]['sent'] = parseInt(number_2bottom[i]['sent'])
            result_2bottom.push(number_2bottom[i]);
          }
      
          var arr_2bottom = result_2bottom.sort(sortFunction);
        
          if(arr_2bottom!= '') {
              $("#2digi_bottom_tr").empty();
              $.each(arr_2bottom, function(key, val) {

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

                  let sent2bottom_over = '';
                  if(val['sent'] >= config_3){
                    sent2bottom_over =  formatNumber(val["sent"] - config_3) ; 
                  }

                  var tr_2bottom = "<tr>";
                  tr_2bottom = tr_2bottom + "<td class='text-center'>" + val["number"] + "</td>";
                  tr_2bottom = tr_2bottom + "<td class='text-center "+ bgClass +"'>" + formatNumber(val["sent"]) + "</td>";
                  tr_2bottom = tr_2bottom + "<td class='text-center "+ bgClass2 +"'>" + sent2bottom_over + "</td>";
                  tr_2bottom = tr_2bottom + "</tr>";
                  $('#2digi_bottomTable').append(tr_2bottom);
              });
          }

          // End 2 Bottom //

          // Start 3 Top //
          var number_3top = result.number_3top;
          var result_3top = [];

          for(let i in number_3top){
            number_3top[i]['sent'] = parseInt(number_3top[i]['sent'])
            result_3top.push(number_3top[i]);
          }
      
          var arr_3top = result_3top.sort(sortFunction);
        
          if(arr_3top!= '') {
              $("#3digi_top_tr").empty();
              $.each(arr_3top, function(key, val) {

                  let bgClass = '' ;
                  let bgClass2 = '' ;

                  if(val['sent'] >= config_6) {
                    bgClass = 'bg-red';
                    bgClass2 = 'bg-red';
                  }else if(val['sent'] > config_7) {
                    bgClass = 'bg-yellow';
                    bgClass2 = '';
                  }else if(val['sent'] > config_8) {
                    bgClass = 'bg-green';
                    bgClass2 = '';
                  }

                  let sent3top_over = '';
                  if(val['sent'] >= config_6){
                    sent3top_over =  formatNumber(val["sent"] - config_6) ; 
                  }

                  var tr_3top = "<tr>";
                  tr_3top = tr_3top + "<td class='text-center'>" + val["number"] + "</td>";
                  tr_3top = tr_3top + "<td class='text-center "+ bgClass +"'>" + formatNumber(val["sent"]) + "</td>";
                  tr_3top = tr_3top + "<td class='text-center "+ bgClass2 +"'>" + sent3top_over + "</td>";
                  tr_3top = tr_3top + "</tr>";
                  $('#3digi_topTable').append(tr_3top);
              });
          }

          // End 3 Top //

          // Start 3 Tod //
          var number_3tod = result.number_3tod;
          var result_3tod = [];

          for(let i in number_3tod){
            number_3tod[i]['sent'] = parseInt(number_3tod[i]['sent'])
            result_3tod.push(number_3tod[i]);
          }
      
          var arr_3tod = result_3tod.sort(sortFunction);
        
          if(arr_3tod!= '') {
              $("#3digi_tod_tr").empty();
              $.each(arr_3tod, function(key, val) {

                  let bgClass = '' ;
                  let bgClass2 = '' ;

                  if(val['sent'] >= config_9) {
                    bgClass = 'bg-red';
                    bgClass2 = 'bg-red';
                  }else if(val['sent'] > config_10) {
                    bgClass = 'bg-yellow';
                    bgClass2 = '';
                  }else if(val['sent'] > config_11) {
                    bgClass = 'bg-green';
                    bgClass2 = '';
                  }

                  let sent3tod_over = '';
                  if(val['sent'] >= config_9){
                    sent3tod_over =  formatNumber(val["sent"] - config_9) ; 
                  }

                  var tr_3tod = "<tr>";
                  tr_3tod = tr_3tod + "<td class='text-center'>" + val["number"] + "</td>";
                  tr_3tod = tr_3tod + "<td class='text-center "+ bgClass +"'>" + formatNumber(val["sent"]) + "</td>";
                  tr_3tod = tr_3tod + "<td class='text-center "+ bgClass2 +"'>" + sent3tod_over + "</td>";
                  tr_3tod = tr_3tod + "</tr>";
                  $('#3digi_todTable').append(tr_3tod);
              });
          }

          // End 3 Tod //
          
         }
      })
     }
});
</script>

