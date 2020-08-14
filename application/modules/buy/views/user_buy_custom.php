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
  <section class="content" style="position:relative; top:-15px;">
    
      <!-- Custom key -->
      <?php echo form_open('buy/buy_insert_custom/'.$lotto[0]['id'].'/custom')?>
      <div class="row">
        <div class="col-md-6 col-sm-12 right-border">
          <h4 class="text-center">2 ตัว บน ล่าง</h4>
          <div class="row">
            <?php for ($i=0; $i < 6 ; $i++) { ?>
            <div class="col-xs-4 padding form-group form-2digi">
              <input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' autocomplete='off' name='2digi[]' class='form-control input-lg form-2digi digi-2-custom input-custom' placeholder='เลข'>
            </div>
            <div class="col-xs-4 padding form-group form-2digi">
                <input type="tel" name="2digi_top[]" class="digi-2top-custom form-control input-lg input-custom" autocomplete='off' placeholder="บน">
            </div>
            <div class="col-xs-4 padding form-group form-2digi">
                <input type="tel" name="2digi_bottom[]" class="digi-2bottom-custom form-control input-lg input-custom" autocomplete='off' placeholder="ล่าง">
            </div>
            <?php } ?>
            <div id="add2topCustom"></div>
          </div>
          <div class="row">
            <div class="col-xs-12 padding text-center">
              <button type="button" id="saveCustom" class="btn btn-success btn-lg btn-block save-custom" data-toggle="modal"
                data-target="#myModalCustom"><i class="fa fa-save"></i> บันทึก</button>
            </div>
<!--             <div class="col-xs-4 padding text-center">
            <button id="Add2Custom" type="button" class="btn btn-default add-row"><i class="fa fa-plus" aria-hidden="true"></i>
              เพิ่มแถว</button>
            </div> -->
          </div>

        </div>
              
        <div class="col-md-6 col-sm-12">
          <h4 class="text-center">3 ตัว ตรง โต๊ด</h4>
          <div class="row">
          <?php for ($i=0; $i < 6 ; $i++) { ?>
            <div class="col-xs-4 padding  form-group form-2digi">
              <input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' autocomplete='off' name='3digi[]' class='form-control input-lg form-3digi digi-3-custom input-custom' placeholder='เลข'>
            </div>
            <div class="col-xs-4 padding  form-group form-2digi">
              <input type="tel" name="3digi_top[]" class="form-control input-lg digi-3top-custom input-custom" autocomplete='off' placeholder="ตรง">
            </div>
            <div class="col-xs-4 padding  form-group form-2digi">
            <input type="tel" name="3digi_tod[]" class="form-control input-lg digi-3tod-custom input-custom" autocomplete='off' placeholder="โต๊ด">
            </div>
            <?php } ?>
            <div id="add3topCustom"></div>
          </div>

          <div class="row">
            <div class="col-xs-12 padding text-center">
              <button type="button" id="saveCustom2" class="btn btn-success btn-lg btn-block save-custom" data-toggle="modal"
                data-target="#myModalCustom"><i class="fa fa-save"></i> บันทึก</button>
            </div>
<!--             <div class="col-xs-4 padding text-center">
            <button id="Add3Custom" type="button" class="btn btn-default add-row"><i class="fa fa-plus" aria-hidden="true"></i>
              เพิ่มแถว</button>
            </div> -->
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModalCustom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">ตัวแทน : <span class="text-green" id="agent_preview_custom"></span></h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label class="sr-only" >งวด</label>
                  <input disabled type="date" name="lotto_id" class="form-control input-sm" id="datepicker_custom" required
                    value="<?php echo $lotto[0]['name']; ?>">
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label class="sr-only" >ตัวแทน</label>
                  <select class="form-control input-sm" name="agent_id" id="agent_custom" required >
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
              <div class="col-md-6">
                <h3 id="header_2digi_custom" class="preview"></h3>
                <div id="preview_2digi_custom" class="preview"></div>
              </div>
              <div class="col-md-6">
                <h3 id="header_3digi_custom" class="preview"></h3>
                <div id="preview_3digi_custom" class="preview"></div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <div class="row">
              <div class="col-md-2 col-md-offset-5 col-xs-6">
                <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">ยกเลิก</button>
              </div>
              <div class="col-md-5 col-xs-6">
                <button type="submit" id="confirm_custom" class="btn btn-success btn-lg btn-block" disabled><i
                    class="fa fa-check"></i> ยืนยัน</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php echo form_close(); ?>
  </section>

</div>

<script>
  
  $(".save-custom").click(function () {
    var agent_custom         = document.getElementById('agent_custom');
    var digi2_custom         = document.getElementsByClassName('digi-2-custom');
    var digi2_top_custom     = document.getElementsByClassName('digi-2top-custom');
    var digi2_bottom_custom  = document.getElementsByClassName('digi-2bottom-custom');
    var set_digi2_custom     = "";

    for (var i = 0; i < digi2_custom.length; i++) {
      if (digi2_custom[i].value != "") {
        set_digi2_custom += digi2_custom[i].value + "	&nbsp; | &nbsp;" + digi2_top_custom[i].value + " x " + digi2_bottom_custom[i].value + "<br>";
      }
    }

    if (set_digi2_custom.length != "") {
      var header_2digi_custom = "<h3>เลข 2 ตัว</h3>";
      document.getElementById('header_2digi_custom').innerHTML = header_2digi_custom;
      document.getElementById('preview_2digi_custom').innerHTML = set_digi2_custom;
      document.getElementById("confirm_custom").disabled = false;
    }


    var digi3_custom     = document.getElementsByClassName('digi-3-custom');
    var digi3_top_custom = document.getElementsByClassName('digi-3top-custom');
    var digi3_tod_custom = document.getElementsByClassName('digi-3tod-custom');
    var set_digi3_custom = "";

    for (var j = 0; j < digi3_custom.length; j++) {
      if (digi3_custom[j].value != "") {
        set_digi3_custom += digi3_custom[j].value + "	&nbsp; | &nbsp;" + digi3_top_custom[j].value + " x " + digi3_tod_custom[j].value + "<br>";
      }
    }

    if (set_digi3_custom.length != "") {
      var header_3digi_custom = "<h3>เลข 3 ตัว</h3>";
      document.getElementById('header_3digi_custom').innerHTML = header_3digi_custom;
      document.getElementById('preview_3digi_custom').innerHTML = set_digi3_custom;
      document.getElementById("confirm_custom").disabled = false;
    }

    document.getElementById('agent_preview_custom').innerHTML = agent_custom[agent_custom.selectedIndex].text;


  });

  $(document).ready(function () {

    $("#Add2Custom").on("click", function () {
      $("#add2topCustom").append("<div class='col-xs-4 padding form-group form-2digi'>" +
        "<input type='tel' maxlength='2' minlength='2' onkeypress='return isNumber(event)' autocomplete='off' name='2digi[]' class='form-control input-lg form-2digi digi-2-custom' placeholder='เลข'>" +
        "</div>" +
        "<div class='col-xs-4 padding form-group form-2digi'>" +
        "<input type='tel' name='2digi_top[]' class='digi-2top-custom form-control input-lg' autocomplete='off' placeholder='บน'>" +
        "</div>" +
        "<div class='col-xs-4 padding form-group form-2digi'>" +
        "<input type='tel' name='2digi_bottom[]' class='digi-2bottom-custom form-control input-lg' autocomplete='off' placeholder='ล่าง'>" +
        "</div>");
    });

    $("#Add3Custom").on("click", function () {
      $("#add3topCustom").append("<div class='col-xs-4 padding form-group form-3digi'>" +
      "<input type='tel' maxlength='3' minlength='3' onkeypress='return isNumber(event)' autocomplete='off' name='3digi[]' class='form-control input-lg form-2digi digi-3-custom' placeholder='เลข'>" +
        "</div>" +
        "<div class='col-xs-4 padding form-group form-3digi'>" +
        "<input type='tel' id='3digi_top' name='3digi_top[]' class='digi-3top-custom form-control input-lg' autocomplete='off' placeholder='ตรง'>" +
        "</div>" +
        "<div class='col-xs-4 padding form-group form-3digi'>" +
        "<input type='tel' id='3digi_tod' name='3digi_tod[]' class='digi-3tod-custom form-control input-lg' autocomplete='off' placeholder='โต้ด'>" +
        "</div>");
    });

  });

  
  // $(".input-custom").keyup(function(e) {
  //   if (e.which == 13) {
  //       e.preventDefault();
  //       $(this)
  //       .blur()
  //       .parent()
  //       .next()
  //       .children('.input-custom')
  //       .focus();
  //   }
  // });

  $(".digi-2bottom-custom").keyup(function (e) {
    if (e.which == 13) {
        e.preventDefault();
        // Get all focusable elements on the page
        document.getElementById("saveCustom").click();
    }
  });

  $(".digi-3tod-custom").keyup(function (e) {
    if (e.which == 13) {
        e.preventDefault();
        // Get all focusable elements on the page
        document.getElementById("saveCustom2").click();
    }
  });


</script>
