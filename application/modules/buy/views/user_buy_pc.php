<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <?php
        $result = $this->session->flashdata('insert_buy_numbers');
        if($result=='done'){ ?>
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Success!</strong> เพิ่มรายการสำเร็จ. </div>
    <?php }elseif($result=='fail'){?>
    <div class="alert alert-danger no-margin">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Error!</strong> กรุณาลองใหม่อีกครั้ง. </div>
    <br>
    <?php } ?>
  
  </section>

  <!-- Main content -->
  <section class="content" style="position:relative; top:-30px;">
  <div class="row">
      
    <!-- History -->
    <div class="col-md-6">
    <br>
    <?php
      $attributes = array('class' => ''); 
      echo form_open('buy/input_pc', $attributes);
    ?>
      <div class="row">
        <div class="col-md-4 col-md-offset-2 col-sm-6 col-xs-6">
          <div class="form-group">
            <label class="sr-only" >งวด</label>
            <select name="lotto_id" class="form-control" style="width: 100%;">
              <?php foreach ($list_lotto as $key => $lotto_opt) { 
                  $date = new DateTime($lotto_opt['name']);
                    $date_display = $date->format('d/m/Y');
              ?>
              <option value="<?php echo $lotto_opt['id']; ?>"><?php echo $date_display; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6">
          <div class="form-group">
            <label class="sr-only">ตัวแทน</label>
            <select class="form-control" name="agent_id" id="agent" required onchange="this.form.submit()">
              <?php if(count($list_agent)>1){
                      echo '<option value="">เลือกตัวแทน</option>';
              } ?>
              <?php foreach($list_agent as $agent){ ?>
              <option value="<?php echo $agent['id'] ?>"
              <?php
                  if(isset($agentInfo[0])){
                    if($agent['id']==$agentInfo[0]['id']){
                        echo ' selected ';
                    }
                  }
              ?>
              ><?php echo $agent['name'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <?php echo form_close(); ?>
      <div class="row">
        <div class="col-md-6 col-sm-12 right-border">
          <h4 class="text-center">2 ตัว บน ล่าง</h4>
          <div class="row">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="text-center">2 ตัว</th>
                  <th class="text-center">บน</th>
                  <th class="text-center">ล่าง</th>
                  <!-- <th width="100" class="text-center"></th> -->
                </tr>
              </thead>
              <tbody>
              <?php  foreach ($buy_2digi as $key => $value) { ?>
                <tr>
                  <td class="text-center padding"><?php echo $value['number'] ?></td>
                  <td class="text-center padding"><?php echo $value['top'] ?></td>
                  <td class="text-center padding"><?php echo $value['bottom'] ?></td>
                </tr>
              <?php if(isset($buy_2digi[$key+1]['set_number'])){
                  if($value['set_number']!=$buy_2digi[$key+1]['set_number']){
                    echo '<tr><td colspan="3"><br></tr>';
                  }
                } 
              } ?>
              </tbody>
              <?php 
              /*
              foreach ($buy_2digi as $key => $value) { ?>
              <?php echo form_open('buy/buy_update/'.$value['id'].'/input_pc'); ?>
              <tr>
                <td class="text-center padding">
                <input type='number' maxlength='2' minlength='2' value="<?php echo $value['number'] ?>" onkeypress='return isNumber(event)' autocomplete='off' name='number' class='form-control input-history'>
                </td>
                <td class="text-center padding">
                <input type='number' min="0" value="<?php echo $value['top'] ?>" autocomplete='off' name='top' class='form-control input-history'>
                </td>
                <td class="text-center padding">
                <input type='number' min="0" value="<?php echo $value['bottom'] ?>" autocomplete='off' name='bottom' class='form-control input-history'>
                </td>
                <td class="text-center padding">
                <button class="btn btn-success" type="submit"><i class="fa fa-check" ></i></button>
                &nbsp;&nbsp;&nbsp;
                <a onclick="return confirm('ยืนยันการลบ?')" href="<?php echo site_url('buy/buy_delete/'.$value['id'].'/input_pc') ?>">
                <i class="fa fa-times text-red" aria-hidden="true"></i></a>
                </td>
              </tr>
              <?php echo form_close(); ?>
              <?php
                if(isset($buy_2digi[$key+1]['set_number'])){
                  if($value['set_number']!=$buy_2digi[$key+1]['set_number']){
                    echo '<tr><td colspan="4"><br></tr>';
                  }
                } 
              } */
              ?>
            </table>
          </div>
        </div>
              
        <div class="col-md-6 col-sm-12">
          <h4 class="text-center">3 ตัว ตรง โต๊ด</h4>
          <div class="row">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="text-center">3 ตัว</th>
                  <th class="text-center">ตรง</th>
                  <th class="text-center">โต๊ด</th>
                  <!-- <th width="100" class="text-center"></th> -->
                </tr>
              </thead>
              <tbody>
              <?php  foreach ($buy_3digi as $key => $value) { ?>
                <tr>
                  <td class="text-center padding"><?php echo $value['number'] ?></td>
                  <td class="text-center padding"><?php echo $value['top'] ?></td>
                  <td class="text-center padding"><?php echo $value['bottom'] ?></td>
                </tr>
              <?php if(isset($buy_3digi[$key+1]['set_number'])){
                  if($value['set_number']!=$buy_3digi[$key+1]['set_number']){
                    echo '<tr><td colspan="3"><br></tr>';
                  }
                } 
              } ?>
              </tbody>

              <?php /*
              foreach ($buy_3digi as $key => $value) { ?>
                <?php echo form_open('buy/buy_update/'.$value['id'].'/input_pc'); ?>
              <tr>
                <td class="text-center padding">
                <input type='number' maxlength='3' minlength='3' value="<?php echo $value['number'] ?>" onkeypress='return isNumber(event)' autocomplete='off' name='number' class='form-control input-history'>
                </td>
                <td class="text-center padding">
                <input type='number' min="0" value="<?php echo $value['top'] ?>" autocomplete='off' name='top' class='form-control input-history'>
                </td>
                <td class="text-center padding">
                <input type='number' min="0" value="<?php echo $value['bottom'] ?>" autocomplete='off' name='bottom' class='form-control input-history'>
                </td>
                <td class="text-center padding">
                <button class="btn btn-success" type="submit"><i class="fa fa-check" ></i></button>
                &nbsp;&nbsp;&nbsp;
                <a onclick="return confirm('ยืนยันการลบ?')" href="<?php echo site_url('buy/buy_delete/'.$value['id'].'/input_pc') ?>">
                <i class="fa fa-times text-red" aria-hidden="true"></i></a>
                </td>
              </tr>
              <?php echo form_close(); ?>
              <?php
                if(isset($buy_3digi[$key+1]['set_number'])){
                  if($value['set_number']!=$buy_3digi[$key+1]['set_number']){
                    echo '<tr><td colspan="4"><br></tr>';
                  }
                } 
              }*/
              ?>
            </table>

          </div>

        </div>
      </div>
    </div>

    <!-- Input -->
    <div class="col-md-6 col-sm-12">

      <!-- Normal key -->
      <?php
        $attributes = array('class' => ''); 
        echo form_open('buy/buy_insert/'.$lotto[0]['id'].'/input_pc', $attributes);
      ?>
      <div class="row row-sapce-top">
        <div class="col-md-6 col-sm-12 right-border">
          <h4 class="text-center">2 ตัว บน ล่าง</h4>
          <div class="row">
            <?php for ($i=0; $i < 6 ; $i++) { ?>
            <div class="col-xs-2 padding form-group form-2digi">
              <input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' autocomplete='off' name='2digi[]' class='form-control input-lg form-2digi digi-2'>
            </div>
            <div class="col-xs-2 padding form-group form-2digi">
              <input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' autocomplete='off' name='2digi[]' class='form-control input-lg form-2digi digi-2'>
            </div>
            <div class="col-xs-2 padding form-group form-2digi">
              <input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' autocomplete='off' name='2digi[]' class='form-control input-lg form-2digi digi-2'>
            </div>
            <div class="col-xs-2 padding form-group form-2digi">
              <input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' autocomplete='off' name='2digi[]' class='form-control input-lg form-2digi digi-2'>
            </div>
            <div class="col-xs-2 padding form-group form-2digi">
              <input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' autocomplete='off' name='2digi[]' class='form-control input-lg form-2digi digi-2'>
            </div>
            <div class="col-xs-2 padding form-group form-2digi">
              <input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' autocomplete='off' name='2digi[]' class='form-control input-lg form-2digi digi-2'>
            </div>
            <?php } ?>
            <div id="add2top"></div>
          </div>
          
          <div class="row">
            <div class="col-xs-4 padding">
              <div class="form-group">
                <input type="tel" id="2digi_top" name="2digi_top" class="form-control input-lg" autocomplete='off' placeholder="บน">
              </div>
            </div>
            <div class="col-xs-1 text-center">
              <strong style="position:relative; top:15px; left:-4px;">X</strong>
            </div>
            <div class="col-xs-4 padding">
              <div class="form-group">
                <input type="tel" id="2digi_bottom" name="2digi_bottom" class="form-control input-lg" autocomplete='off' placeholder="ล่าง">
              </div>
            </div>
            
            <br>
            <div class="col-xs-12 padding">
              <button type="button" id="save" class="btn btn-success btn-block btn-lg save" data-toggle="modal" data-target="#myModal"><i class="fa fa-save"></i> บันทึก</button>
            </div>
<!--             <div class="col-xs-4 padding text-center">
            <button id="Add2" type="button" class="btn btn-default add-row"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มแถว</button>
            </div> -->
          </div>
        </div>
              
        <div class="col-md-6 col-sm-12">
          <h4 class="text-center">3 ตัว ตรง โต๊ด</h4>
          <div class="row">
            <?php for ($i=0; $i < 6 ; $i++) { ?>
            <div class="col-xs-2 padding form-group form-3digi">
              <input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' autocomplete='off' name="3digi[]"
                class="form-control input-lg form-3digi digi-3">
            </div>
            <div class="col-xs-2 padding form-group form-3digi">
              <input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' autocomplete='off' name="3digi[]"
                class="form-control input-lg form-3digi digi-3">
            </div>
            <div class="col-xs-2 padding form-group form-3digi">
              <input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' autocomplete='off' name="3digi[]"
                class="form-control input-lg form-3digi digi-3">
            </div>
            <div class="col-xs-2 padding form-group form-3digi">
              <input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' autocomplete='off' name="3digi[]"
                class="form-control input-lg form-3digi digi-3">
            </div>
            <div class="col-xs-2 padding form-group form-3digi">
              <input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' autocomplete='off' name="3digi[]"
                class="form-control input-lg form-3digi digi-3">
            </div>
            <div class="col-xs-2 padding form-group form-3digi">
              <input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' autocomplete='off' name="3digi[]"
                class="form-control input-lg form-3digi digi-3">
            </div>
            <?php } ?>
            <div id="add3top"></div>
          </div>

          <div class="row">
            <div class="col-xs-4 padding">
              <div class="form-group">
                <input type="tel" id="3digi_top" name="3digi_top" class="form-control input-lg" autocomplete='off' placeholder="ตรง">
              </div>
            </div>
            <div class="col-xs-1 text-center">
              <strong style="position:relative; top:15px; left:-4px;">X</strong>
            </div>
            <div class="col-xs-4 padding">
              <div class="form-group">
                <input type="tel" id="3digi_tod" name="3digi_tod" class="form-control input-lg" autocomplete='off' placeholder="โต๊ด">
              </div>
            </div>
            
            <br>
            <div class="col-xs-12 padding">
              <button type="button" id="save2" class="btn btn-success btn-block btn-lg save" data-toggle="modal" data-target="#myModal"><i class="fa fa-save"></i> บันทึก</button>
            </div>
<!--             <div class="col-xs-4 padding text-center">
                <button id="Add3" type="button" class="btn btn-default add-row"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มแถว</button>
            </div> -->
          </div>
        </div>
      </div>
          
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">ตัวแทน : <span class="text-green" id="agent_preview"></span></h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label class="sr-only" >งวด</label>
                    <input disabled type="date" name="lotto_id" class="form-control input-sm" id="datepicker"
                      value="<?php echo $lotto[0]['name']; ?>">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label class="sr-only">ตัวแทน</label>
                    <select class="form-control input-sm" name="agent_id" id="agent" required >
                      <?php if(count($list_agent)>1){
                        echo '<option value="">เลือกตัวแทน</option>';
                      } ?>
                      <?php foreach($list_agent as $agent){ ?>
                      <option value="<?php echo $agent['id'] ?>"><?php echo $agent['name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-xs-6">
                  <h3 id="header_2digi" class="preview"></h3>
                  <div class="row">
                    <div class="col-md-3 col-xs-6">
                      <div id="preview_2digi" class="preview"></div>
                    </div>
                    <div class="col-md-3col-xs-6">
                      <div id="preview2_2digi" class="preview"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <div id="preview2_2digi_bottom" class="preview"></div>
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-6 col-xs-6">
                  <h3 id="header_3digi" class="preview"></h3>
                  <div class="row">
                    <div class="col-xs-6">
                      <div id="preview_3digi" class="preview"></div>
                    </div>
                    <div class="col-xs-6">
                      <div id="preview2_3digi" class="preview"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <div id="preview2_3digi_bottom" class="preview"></div>
                    </div>
                  </div>

                </div>
              </div>

            </div>
            <div class="modal-footer">
              <div class="row">
                <div class="col-md-2 col-md-offset-5 col-xs-6">
                  <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">ยกเลิก</button>
                </div>
                <div class="col-md-5 col-xs-6">
                  <button type="submit" id="confirm" class="btn btn-success btn-lg btn-block" disabled><i
                      class="fa fa-check"></i> ยืนยัน</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php echo form_close(); ?>
      <!-- END Normal key -->

  </div>
    
  </section>

  <!-- /.content -->
</div>

<script>
  $(".save").click(function () {

    var agent        = document.getElementById('agent');
    var digi2        = document.getElementsByClassName('digi-2');
    var digi2_top    = document.getElementById('2digi_top').value;
    var digi2_bottom = document.getElementById('2digi_bottom').value;
    var set_digi2    = [];

    for (var m = 0; m < digi2.length; m++) {
      if (digi2[m].value != "") {
        set_digi2.push(digi2[m].value);
      }
    }


    if (set_digi2.length != "") {
      var cp_set_digi2 =  [...set_digi2];

      if(cp_set_digi2.length > 10){
        var set2_digi2 = [];
        var count_2digi = cp_set_digi2.length;

        for (var i = 0; i < count_2digi; i++) {
          if(count_2digi > 10 && count_2digi < 20){
            if(i > 9 ){
              set2_digi2.push(cp_set_digi2[i]);
              set_digi2.splice(i, (count_2digi-9));
            }

          }else if(count_2digi >= 20){
            if(i >= count_2digi/2) {
              set2_digi2.push(cp_set_digi2[i]);
              set_digi2.splice(i, (count_2digi - Math.floor(count_2digi/2)));
            }
          }

        }

        
        var preview_2digi_right = "";
        for (let index_right = 0; index_right < set2_digi2.length; index_right++) {
          preview_2digi_right += set2_digi2[index_right] + "<br>";
        }
        
        document.getElementById('preview2_2digi').innerHTML = preview_2digi_right;
      }

      var preview_2digi_left = "";
      for (let index_left = 0; index_left < set_digi2.length; index_left++) {
        preview_2digi_left += set_digi2[index_left] + "<br>";
      }
      
      var header_2digi = "<h3>เลข 2 ตัว</h3>";
      var preview2_2digi_bottom = "<hr>" + digi2_top + " X " + digi2_bottom;
      document.getElementById('header_2digi').innerHTML = header_2digi;
      document.getElementById('preview_2digi').innerHTML = preview_2digi_left;
      document.getElementById('preview2_2digi_bottom').innerHTML = preview2_2digi_bottom;

      if(digi2_top != "" || digi2_bottom != ""){
        document.getElementById("confirm").disabled = false;
      }else{
        document.getElementById("confirm").disabled = true;
      }
      
    }


    var digi3 = document.getElementsByClassName('digi-3');
    var digi3_top = document.getElementById('3digi_top').value;
    var digi3_tod = document.getElementById('3digi_tod').value;
    var set_digi3 = [];

    for (var j = 0; j < digi3.length; j++) {
      if (digi3[j].value != "") {
        set_digi3.push(digi3[j].value);
      }
    }

    if (set_digi3.length != "") {
      var cp_set_digi3 =  [...set_digi3];

      if(cp_set_digi3.length > 10){
        var set2_digi3 = [];
        var count_3digi = cp_set_digi3.length;

        for (var k = 0; k < count_3digi; k++) {
          if(count_3digi > 10 && count_3digi < 20){
            if(k > 9 ){
              set2_digi3.push(cp_set_digi3[k]);
              set_digi3.splice(k, (count_3digi-9));
            }

          }else if(count_3digi >= 20){
            if(k >= count_3digi/2) {
              set2_digi3.push(cp_set_digi3[k]);
              set_digi3.splice(k, (count_3digi - Math.floor(count_3digi/2)));
            }
          }

        }

        var preview_3digi_right = "";
        for (let index_3right = 0; index_3right < set2_digi3.length; index_3right++) {
          preview_3digi_right += set2_digi3[index_3right] + "<br>";
        }

        document.getElementById('preview2_3digi').innerHTML = preview_3digi_right;
        
      }

      var preview_3digi_left = "";
      for (let index_3left = 0; index_3left < set_digi3.length; index_3left++) {
        preview_3digi_left += set_digi3[index_3left] + "<br>";
      }

      var header_3digi = "<h3>เลข 3 ตัว</h3>";
      var preview2_3digi_bottom = "<hr>" + digi3_top + " X " + digi3_tod;
      document.getElementById('header_3digi').innerHTML = header_3digi;
      document.getElementById('preview_3digi').innerHTML = preview_3digi_left;
      document.getElementById('preview2_3digi_bottom').innerHTML = preview2_3digi_bottom;


      if(digi3_top != "" || digi3_tod != ""){
        document.getElementById("confirm").disabled = false;
      }else{
        document.getElementById("confirm").disabled = true;
      }
    }

    document.getElementById('agent_preview').innerHTML = agent[agent.selectedIndex].text;


  });

  $(document).ready(function () {

    $("#Add2").on("click", function () {
      $("#add2top").append("<div class='col-xs-2 padding form-group form-2digi'>" +
        "<input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' autocomplete='off' name='2digi[]' class='form-control input-lg form-2digi digi-2'>" +
        "</div>" +
        "<div class='col-xs-2 padding form-group form-2digi'>" +
        "<input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' autocomplete='off' name='2digi[]' class='form-control input-lg form-2digi digi-2'>" +
        "</div>" +
        "<div class='col-xs-2 padding form-group form-2digi'>" +
        "<input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' autocomplete='off' name='2digi[]' class='form-control input-lg form-2digi digi-2'>" +
        "</div>" +
        "<div class='col-xs-2 padding form-group form-2digi'>" +
        "<input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' autocomplete='off' name='2digi[]' class='form-control input-lg form-2digi digi-2'>" +
        "</div>" +
        "<div class='col-xs-2 padding form-group form-2digi'>" +
        "<input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' autocomplete='off' name='2digi[]' class='form-control input-lg form-2digi digi-2'>" +
        "</div>" +
        "<div class='col-xs-2 padding form-group form-2digi'>" +
        "<input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' autocomplete='off' name='2digi[]' class='form-control input-lg form-2digi digi-2'>" +
        "</div>");
    });

    $("#Add3").on("click", function () {
      $("#add3top").append("<div class='col-xs-2 padding form-group form-3digi'>" +
        "<input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' autocomplete='off' name='3digi[]' class='form-control input-lg form-3digi digi-3'>" +
        "</div>" +
        "<div class='col-xs-2 padding form-group form-3digi'>" +
        "<input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' autocomplete='off' name='3digi[]' class='form-control input-lg form-3digi digi-3'>" +
        "</div>" +
        "<div class='col-xs-2 padding form-group form-3digi'>" +
        "<input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' autocomplete='off' name='3digi[]' class='form-control input-lg form-3digi digi-3'>" +
        "</div>" +
        "<div class='col-xs-2 padding form-group form-3digi'>" +
        "<input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' autocomplete='off' name='3digi[]' class='form-control input-lg form-3digi digi-3'>" +
        "</div>" +
        "<div class='col-xs-2 padding form-group form-3digi'>" +
        "<input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' autocomplete='off' name='3digi[]' class='form-control input-lg form-3digi digi-3'>" +
        "</div>" +
        "<div class='col-xs-2 padding form-group form-3digi'>" +
        "<input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' autocomplete='off' name='3digi[]' class='form-control input-lg form-3digi digi-3'>" +
        "</div>");
    });

    $("#Remove").on("click", function () {
      $("#add2top").children().last().remove();
    });
  });

  $(".row.form-2digi.digi-2").keyup(function (e) {
    if (this.value.length == this.maxLength) {
      $(this)
        .blur()
        .parent()
        .next()
        .children('.row.form-2digi.digi-2:enabled:first')
        .focus();
    }
  });

  $(".form-2digi.digi-2").keyup(function (e) {
    if (this.value.length == this.maxLength) {
      $(this)
        .blur()
        .parent()
        .next()
        .children('.form-2digi.digi-2')
        .focus();
    }
    if (e.which == 13) {
        e.preventDefault();
        // Get all focusable elements on the page
        document.getElementById("2digi_top").focus();
    }
  });

  $("#2digi_top").keyup(function (e) {
    if (e.which == 13) {
        e.preventDefault();
        // Get all focusable elements on the page
        document.getElementById("2digi_bottom").focus();
    }
  });

  $("#2digi_bottom").keyup(function (e) {
    if (e.which == 13) {
        e.preventDefault();
        // Get all focusable elements on the page
        document.getElementById("save").click();
    }
  });

  $("#3digi_top").keyup(function (e) {
    if (e.which == 13) {
        e.preventDefault();
        // Get all focusable elements on the page
        document.getElementById("3digi_tod").focus();
    }
  });

  $("#3digi_tod").keyup(function (e) {
    if (e.which == 13) {
        e.preventDefault();
        // Get all focusable elements on the page
        document.getElementById("save2").click();
    }
  });

  $(".row.form-3digi.digi-3").keyup(function () {
    if (this.value.length == this.maxLength) {
      $(this)
        .blur()
        .parent()
        .next()
        .children('.row.form-3digi.digi-3:enabled:first')
        .focus();
    }
  });

  $(".form-3digi.digi-3").keyup(function (e) {
    if (this.value.length == this.maxLength) {
      $(this)
        .blur()
        .parent()
        .next()
        .children('.form-3digi.digi-3')
        .focus();
    }
    if (e.which == 13) {
        e.preventDefault();
        // Get all focusable elements on the page
        document.getElementById("3digi_top").focus();
    }
  });

</script>