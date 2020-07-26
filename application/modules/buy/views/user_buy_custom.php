<div class="content-wrapper">
  <?php echo form_open('buy/buy_insert_custom/'.$lotto[0]['id'])?>
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
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="form-group">
          <label class="sr-only" >งวด</label>
          <input disabled type="date" name="lotto_id" class="form-control input-sm" id="datepicker"
            value="<?php echo $lotto[0]['name']; ?>">
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="form-group">
          <label class="sr-only" >ตัวแทน</label>
          <select class="form-control input-sm" name="agent_id" id="agent">
            <?php foreach($list_agent as $agent){ ?>
            <option value="<?php echo $agent['id'] ?>"><?php echo $agent['name'] ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content" style="position:relative; top:-15px;">
    <div class="row">
      <div class="col-md-6 col-sm-12 right-border">
        <h4 class="text-center">2 ตัว บน ล่าง</h4>
        <div class="row">
          <?php for ($i=0; $i < 4 ; $i++) { ?>
          <div class="col-xs-4 padding form-group form-2digi">
            <input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='form-control input-lg form-2digi digi-2' placeholder='เลข'>
          </div>
          <div class="col-xs-4 padding form-group form-2digi">
              <input type="tel" name="2digi_top[]" class="digi-2top form-control input-lg" placeholder="บน">
          </div>
          <div class="col-xs-4 padding form-group form-2digi">
              <input type="tel" name="2digi_bottom[]" class="digi-2bottom form-control input-lg" placeholder="ล่าง">
          </div>
          <?php } ?>
          <div id="add2top"></div>
        </div>
        <div class="row">
          <div class="col-xs-8 padding text-center">
            <button type="button" id="save" class="btn btn-success btn-lg btn-block save" data-toggle="modal"
              data-target="#myModal"><i class="fa fa-save"></i> บันทึก</button>
          </div>
          <div class="col-xs-4 padding text-center">
          <button id="Add2" type="button" class="btn btn-default add-row"><i class="fa fa-plus" aria-hidden="true"></i>
            เพิ่มแถว</button>
          </div>
        </div>

      </div>
            
      <div class="col-md-6 col-sm-12">
        <h4 class="text-center">3 ตัว ตรง โต๊ด</h4>
        <div class="row">
        <?php for ($i=0; $i < 4 ; $i++) { ?>
          <div class="col-xs-4 padding  form-group form-2digi">
            <input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' name='3digi[]' class='form-control input-lg form-3digi digi-3' placeholder='เลข'>
          </div>
          <div class="col-xs-4 padding  form-group form-2digi">
            <input type="tel" name="3digi_top[]" class="form-control input-lg digi-3top" placeholder="ตรง">
          </div>
          <div class="col-xs-4 padding  form-group form-2digi">
          <input type="tel" name="3digi_tod[]" class="form-control input-lg digi-3tod" placeholder="โต๊ด">
          </div>
          <?php } ?>
          <div id="add3top"></div>
        </div>

        <div class="row">
          <div class="col-xs-8 padding text-center">
            <button type="button" id="save" class="btn btn-success btn-lg btn-block save" data-toggle="modal"
              data-target="#myModal"><i class="fa fa-save"></i> บันทึก</button>
          </div>
          <div class="col-xs-4 padding text-center">
          <button id="Add3" type="button" class="btn btn-default add-row"><i class="fa fa-plus" aria-hidden="true"></i>
            เพิ่มแถว</button>
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
            <div class="col-md-6">
              <h3>เลข 2 ตัว</h3>
              <div id="preview_2digi" class="preview"></div>
            </div>
            <div class="col-md-6">
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
    var agent         = document.getElementById('agent');
    var digi2         = document.getElementsByClassName('digi-2');
    var digi2_top     = document.getElementsByClassName('digi-2top');
    var digi2_bottom  = document.getElementsByClassName('digi-2bottom');
    var set_digi2     = "";

    for (var i = 0; i < digi2.length; i++) {
      if (digi2[i].value != "") {
        set_digi2 += digi2[i].value + "	&nbsp; | &nbsp;" + digi2_top[i].value + " x " + digi2_bottom[i].value + "<br>";
      }
    }

    if (set_digi2.length != "") {
      document.getElementById('preview_2digi').innerHTML = set_digi2;
      document.getElementById("confirm").disabled = false;
    }


    var digi3     = document.getElementsByClassName('digi-3');
    var digi3_top = document.getElementsByClassName('digi-3top');
    var digi3_tod = document.getElementsByClassName('digi-3tod');
    var set_digi3 = "";

    for (var j = 0; j < digi3.length; j++) {
      if (digi3[j].value != "") {
        set_digi3 += digi3[j].value + "	&nbsp; | &nbsp;" + digi3_top[j].value + " x " + digi3_tod[j].value + "<br>";
      }
    }

    if (set_digi3.length != "") {
      document.getElementById('preview_3digi').innerHTML = set_digi3;
      document.getElementById("confirm").disabled = false;
    }

    document.getElementById('agent_preview').innerHTML = agent[agent.selectedIndex].text;


  });

  $(document).ready(function () {

    $("#Add2").on("click", function () {
      $("#add2top").append("<div class='col-xs-4 padding form-group form-2digi'>" +
        "<input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='form-control input-lg form-2digi digi-2' placeholder='เลข'>" +
        "</div>" +
        "<div class='col-xs-4 padding form-group form-2digi'>" +
        "<input type='tel' name='2digi_top[]' class='digi-2top form-control input-lg' placeholder='บน'>" +
        "</div>" +
        "<div class='col-xs-4 padding form-group form-2digi'>" +
        "<input type='tel' name='2digi_bottom[]' class='digi-2bottom form-control input-lg' placeholder='ล่าง'>" +
        "</div>");
    });

    $("#Add3").on("click", function () {
      $("#add3top").append("<div class='col-xs-3 form-group form-3digi'>" +
        "<input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' name='3digi[]' class='form-control input-lg form-3digi digi-3'>" +
        "</div>" +
        "<div class='col-xs-3 form-group form-3digi'>" +
        "<input type='tel' id='3digi_top' name='3digi_top[]' class='form-control input-lg' placeholder='ตรง'>" +
        "</div>" +
        "<div class='col-xs-1'><strong>X</strong></div>" +
        "<div class='col-xs-3 form-group form-3digi'>" +
        "<input type='tel' id='3digi_tod' name='3digi_tod[]' class='form-control input-lg' placeholder='โต้ด'>" +
        "</div>");
    });

    $("#Remove").on("click", function () {
      $("#add2top").children().last().remove();
    });
  });

</script>
