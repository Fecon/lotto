<div class="content-wrapper">
  <?php
    $attributes = array('class' => ''); 
    echo form_open('buy/buy_insert/'.$lotto[0]['id'], $attributes)?>
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
      <div class="col-md-6 col-sm-12 right-border">
        <h4 class="text-center">2 ตัว บน ล่าง</h4>
        <div class="row">
          <?php for ($i=0; $i < 4 ; $i++) { ?>
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
          <div class="col-xs-2 padding">
          <button id="Add2" type="button" class="btn btn-default add-row">เพิ่มแถว</button>
          </div>
          <br>
          <div class="col-xs-12 padding">
            <button type="button" id="save" class="btn btn-success btn-block btn-lg save" data-toggle="modal" data-target="#myModal"><i class="fa fa-save"></i> บันทึก</button>
          </div>
        </div>
      </div>
            
      <div class="col-md-6 col-sm-12">
        <h4 class="text-center">3 ตัว ตรง โต๊ด</h4>
        <div class="row">
          <?php for ($i=0; $i < 4 ; $i++) { ?>
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
          <div class="col-xs-2 padding">
              <button id="Add3" type="button" class="btn btn-default add-row">เพิ่มแถว</button>
          </div>
          <br>
          <div class="col-xs-12 padding">
            <button type="button" id="save" class="btn btn-success btn-block btn-lg save" data-toggle="modal" data-target="#myModal"><i class="fa fa-save"></i> บันทึก</button>
          </div>
        </div>
      </div>
    </div>
  </section>

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
            <div class="col-md-3 col-sm-6 col-xs-6">
              <div class="form-group">
                <label class="sr-only" >งวด</label>
                <input disabled type="date" name="lotto_id" class="form-control input-sm" id="datepicker"
                  value="<?php echo $lotto[0]['name']; ?>">
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
              <div class="form-group">
                <label class="sr-only">ตัวแทน</label>
                <select class="form-control input-sm" name="agent_id" id="agent" required >
                  <option value="">เลือกตัวแทน</option>
                  <?php foreach($list_agent as $agent){ ?>
                  <option value="<?php echo $agent['id'] ?>"><?php echo $agent['name'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-xs-6">
              <h3>เลข 2 ตัว</h3>
              <div class="row">
                <div class="col-xs-6">
                  <div id="preview_2digi" class="preview"></div>
                </div>
                <div class="col-xs-6">
                  <div id="preview2_2digi" class="preview"></div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <div id="preview2_2digi_bottom" class="preview"></div>
                </div>
              </div>
              
            </div>
            <div class="col-md-3 col-md-offset-3 col-xs-6">
              <h3>เลข 3 ตัว</h3>
              <div id="preview_3digi" class="preview"></div>
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
        console.log(set_digi2.length);

        if(cp_set_digi2.length < 20){

        }else{
          var count_set2 = cp_set_digi2.length/2
          for (var n = 0; n < cp_set_digi2.length; n++) {
            cp_set_digi2[n]
          }
        }
        

        for (var i = 0; i < cp_set_digi2.length; i++) {

          console.log(i + ' '+ cp_set_digi2[i]);

          if(i > 9 ){
              
            set2_digi2.push(cp_set_digi2[i]);
            set_digi2.splice(i, (cp_set_digi2.length-9));

          }else if(cp_set_digi2.length >= 20){




          }
        }

        console.log(set_digi2);

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
      
      var preview2_2digi_bottom = "<hr>" + digi2_top + " X " + digi2_bottom;
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
    var set_digi3 = "";

    for (var j = 0; j < digi3.length; j++) {
      if (digi3[j].value != "") {
        set_digi3 += digi3[j].value + "<br>";
      }
    }

    if (set_digi3.length != "") {
      set_digi3 += "<hr>" + digi3_top + " X " + digi3_tod;
      document.getElementById('preview_3digi').innerHTML = set_digi3;

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

  $(".row.form-2digi.digi-2").keyup(function () {
    if (this.value.length == this.maxLength) {
      $(this)
        .blur()
        .parent()
        .next()
        .children('.row.form-2digi.digi-2:enabled:first')
        .focus();
    }
  });

  $(".form-2digi.digi-2").keyup(function () {
    if (this.value.length == this.maxLength) {
      $(this)
        .blur()
        .parent()
        .next()
        .children('.form-2digi.digi-2')
        .focus();
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

  $(".form-3digi.digi-3").keyup(function () {
    if (this.value.length == this.maxLength) {
      $(this)
        .blur()
        .parent()
        .next()
        .children('.form-3digi.digi-3')
        .focus();
    }
  });

</script>
