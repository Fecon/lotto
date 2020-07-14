<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="form-inline">
      <div class="form-group">
        <label>งวด</label>
        <input disabled type="date" class="form-control input-lg" id="datepicker" value="<?php echo $lotto[0]['name']; ?>">
      </div>
      <div class="form-group">
        <label>ตัวแทน</label>
        <select class="form-control input-lg" name="agent_id">
          <?php foreach($list_agent as $agent){ ?>
          <option value="<?php echo $agent['id'] ?>"><?php echo $agent['name'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
  </section>
  <hr>
  <!-- Main content -->
  <section class="content">
    <?php echo form_open('lotto/rn_insert/'.$lotto[0]['id'])?>
      <div class="row">
        <div class="col-md-3">
          <h4>2 ตัว</h4>
          <?php for ($i=0; $i < 7 ; $i++) { ?>
                    <div class="row">
                      <div class="col-xs-10">
                        <div class="form-group">
                          <input type="text" maxlength="2" onkeypress="return isNumber(event)" name="2digi[]" class="form-control input-lg" placeholder="" value="">
                        </div>
                      </div>
                    </div>
            <?php } ?>
            <div id="add2top"></div>

            <div class="form-group">
              <button id="Add2" type="button" class="btn btn-default btn-lg"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มแถว</button>
            </div>
            <div class="form-group">
            <div class="row">
              <div class="col-md-5">
                  <input type="number" class="form-control input-lg" placeholder="บน">
              </div>
              <div class="col-md-1">
                  <label>X</label>
              </div>
              <div class="col-md-5">
                  <input type="number" class="form-control input-lg" placeholder="ล่าง">
              </div>
            </div>
            </div>
        </div>

        <div class="col-md-6">
          <div class="row">
            <div class="col-xs-6">

            </div>

          </div>
          <?php for ($i=0; $i < 7 ; $i++) { ?>
                    <div class="row">
                      <div class="col-xs-4">
                        <div class="form-group">
                          <input type="text" maxlength="3" onkeypress="return isNumber(event)" name="3digi[]" class="form-control input-lg" placeholder="">
                        </div>
                      </div>
                    </div>
            <?php } ?>
            <div id="add3top"></div>
            <div class="form-group">
                <button id="Add3" type="button" class="btn btn-default btn-lg"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มแถว</button>
            </div>
        </div>
      </div>
      <div class="row text-center">
        <button type="submit" id="Add2" class="btn btn-success btn-lg">บันทึก</button>
      </div>
    <?php echo form_close(); ?>
  </section>
  <!-- /.content -->
  </div>

  <script>
  $(document).ready(function() {
    $("#Add2").on("click", function() {
        $("#add2top").append("<div class='row'>"
        + "<div class='col-xs-4'>"
        + "<div class='form-group'>"
        +	"<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='form-control input-lg'>"
        +	"</div>"
        +	"</div>"
        +	"</div>");
    });
    $("#Add3").on("click", function() {
        $("#add3top").append("<div class='row'>"
        + "<div class='col-xs-4'>"
        + "<div class='form-group'>"
        +	"<input type='text' maxlength='3' onkeypress='return isNumber(event)' name='3digi[]' class='form-control input-lg' placeholder=''>"
        +	"</div>"
        +	"</div>"
        + "<div class='col-xs-4'>"
        +	"<div class='form-group'>"
        +	"<input type='number' name='3pay[]' class='form-control input-lg' placeholder=''>"
        +	"</div>"
        +	"</div>"
        + "<div class='col-xs-4'>"
        +	"<div class='form-group'>"
        +	"<input type='number' name='3pay2[]' class='form-control input-lg' placeholder=''>"
        +	"</div>"
        +	"</div>"
        +	"</div>");
    });

    $("#Remove").on("click", function() {
        $("#add2top").children().last().remove();
    });
  });


  </script>
