<style>
  .preview {
    font-size: 1.5em;
  }

  .right-border {
    border-right: 1px solid;
  }

  #pad-number {
    /*width:100%;*/
    font-size: 50px;
    background-color: #2d2d2d;
  }

  #pad-bottom {
    width: 100%;
  }

  #pad-confirm {
    width: 100%;
    height: 55px;
    display: block;
  }

  input[type=text] {
    border: 1px solid #d8d5d5 !important;
  }

  .nav-tabs li a {
    font-size: 1.5em;
  }
</style>

<div class="content-wrapper">
  <?php echo form_open('buy/buy_insert/')?>
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

    <div class="row">
      <div class="col-md-3 col-sm-4">
        <div class="form-group">
          <label>งวด</label>
          <input disabled type="text" name="lotto_id" class="form-control input-lg" value="ไม่มีการตั้งค่างวด">
        </div>
      </div>
      <div class="col-md-2 col-sm-4">
        <div class="form-group">
          <label>ตัวแทน</label>
          <select class="form-control input-lg" name="agent_id" id="agent">
            <?php foreach($list_agent as $agent){ ?>
            <option value="<?php echo $agent['id'] ?>"><?php echo $agent['name'] ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6 col-sm-12 right-border">
        <h4 class="text-center">2 ตัว บน ล่าง</h4>
        <div class="row">
          <?php for ($i=0; $i < 5 ; $i++) { ?>
          <div class="col-xs-3 form-group form-2digi">
            <input type='tel' maxlength='2' minlength='2' minlength='2' onkeypress='return isNumber(event)' name="2digi[]"
              class="form-control input-lg form-2digi digi-2">
          </div>
          <div class="col-xs-3 form-group form-2digi">
            <input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' name="2digi[]"
              class="form-control input-lg form-2digi digi-2">
          </div>
          <div class="col-xs-3 form-group form-2digi">
            <input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' name="2digi[]"
              class="form-control input-lg form-2digi digi-2">
          </div>
          <div class="col-xs-3 form-group form-2digi">
            <input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' name="2digi[]"
              class="form-control input-lg form-2digi digi-2">
          </div>
          <?php } ?>
        </div>
        <div class="row" id="add2top"></div>
        <div class="form-group">
          <button id="Add2" type="button" class="btn btn-default btn-lg"><i class="fa fa-plus" aria-hidden="true"></i>
            เพิ่มแถว</button>
        </div>
        <div class="row">
          <div class="col-xs-3">
            <div class="form-group">
              <input type="number" id="2digi_top" name="2digi_top" class="form-control input-lg" placeholder="บน">
            </div>
          </div>
          <div class="col-xs-1">
            <strong>X</strong>
          </div>
          <div class="col-xs-3">
            <div class="form-group">
              <input type="number" id="2digi_bottom" name="2digi_bottom" class="form-control input-lg"
                placeholder="ล่าง">
            </div>
          </div>
        </div>
      </div>
            
      <div class="col-md-6 col-sm-12">
        <h4 class="text-center">3 ตัว ตรง โต๊ด</h4>
        <div class="row">
          <?php for ($i=0; $i < 5 ; $i++) { ?>
          <div class="col-xs-3 form-group form-3digi">
            <input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' name="3digi[]"
              class="form-control input-lg form-3digi digi-3">
          </div>
          <div class="col-xs-3 form-group form-3digi">
            <input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' name="3digi[]"
              class="form-control input-lg form-3digi digi-3">
          </div>
          <div class="col-xs-3 form-group form-3digi">
            <input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' name="3digi[]"
              class="form-control input-lg form-3digi digi-3">
          </div>
          <div class="col-xs-3 form-group form-3digi">
            <input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' name="3digi[]"
              class="form-control input-lg form-3digi digi-3">
          </div>
          <?php } ?>
        </div>
        <div class="row" id="add3top"></div>
        <div class="form-group">
          <button id="Add3" type="button" class="btn btn-default btn-lg"><i class="fa fa-plus" aria-hidden="true"></i>
            เพิ่มแถว</button>
        </div>
        <div class="row">
          <div class="col-xs-3">
            <div class="form-group">
              <input type="number" id="3digi_top" name="3digi_top" class="form-control input-lg" placeholder="ตรง">
            </div>
          </div>
          <div class="col-xs-1">
            <strong>X</strong>
          </div>
          <div class="col-xs-3">
            <div class="form-group">
              <input type="number" id="3digi_tod" name="3digi_tod" class="form-control input-lg" placeholder="โต๊ด">
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-xs-12 text-center">
        <button type="button" disabled class="btn btn-success btn-lg btn-block"><i class="fa fa-save"></i> บันทึก</button>
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
            <div class="col-md-3">
              <h3>เลข 2 ตัว</h3>
              <div id="preview_2digi" class="preview"></div>
            </div>
            <div class="col-md-3 col-md-offset-3">
              <h3>เลข 3 ตัว</h3>
              <div id="preview_3digi" class="preview"></div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <div class="row">
            <div class="col-md-2 col-md-offset-5">
              <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">ยกเลิก</button>
            </div>
            <div class="col-md-5">
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
  $("#save").click(function () {
    var agent = document.getElementById('agent');
    var digi2 = document.getElementsByClassName('digi-2');
    var digi2_top = document.getElementById('2digi_top').value;
    var digi2_bottom = document.getElementById('2digi_bottom').value;
    var set_digi2 = "";

    for (var i = 0; i < digi2.length; i++) {
      if (digi2[i].value != "") {
        set_digi2 += digi2[i].value + "<br>";
      }
    }

    if (set_digi2.length != "") {
      set_digi2 += "<hr>" + digi2_top + " X " + digi2_bottom;
      document.getElementById('preview_2digi').innerHTML = set_digi2;
      document.getElementById("confirm").disabled = false;
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
      document.getElementById("confirm").disabled = false;
    }

    document.getElementById('agent_preview').innerHTML = agent[agent.selectedIndex].text;


  });

  $(document).ready(function () {

    $("#Add2").on("click", function () {
      $("#add2top").append("<div class='col-xs-3 form-group form-2digi'>" +
        "<input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='form-control input-lg form-2digi digi-2'>" +
        "</div>" +
        "<div class='col-xs-3 form-group form-2digi'>" +
        "<input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='form-control input-lg form-2digi digi-2'>" +
        "</div>" +
        "<div class='col-xs-3 form-group form-2digi'>" +
        "<input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='form-control input-lg form-2digi digi-2'>" +
        "</div>" +
        "<div class='col-xs-3 form-group form-2digi'>" +
        "<input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='form-control input-lg form-2digi digi-2'>" +
        "</div>");
    });

    $("#Add3").on("click", function () {
      $("#add3top").append("<div class='col-xs-3 form-group form-3digi'>" +
        "<input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' name='3digi[]' class='form-control input-lg form-3digi digi-3'>" +
        "</div>" +
        "<div class='col-xs-3 form-group form-3digi'>" +
        "<input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' name='3digi[]' class='form-control input-lg form-3digi digi-3'>" +
        "</div>" +
        "<div class='col-xs-3 form-group form-3digi'>" +
        "<input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' name='3digi[]' class='form-control input-lg form-3digi digi-3'>" +
        "</div>" +
        "<div class='col-xs-3 form-group form-3digi'>" +
        "<input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' name='3digi[]' class='form-control input-lg form-3digi digi-3'>" +
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

  $('#pad-number td a').on('tab click', function () {
    var focusID = focus.closest('.list-item').attr('product_id');
    var order = parseInt(focus.find('.item-order').html());
    if (order == 0) {
      var order_name = focus.find('.item-name').text().trim();
      // add order to side bar
      addOrder(focusID, order_name);
    }
  });
</script>
