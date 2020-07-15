<style>
  .right-border{
    border-right: 1px solid;
  }
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="row">
      <div class="col-xs-9">
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
  </div>

      <div class="col-xs-3 text-right">
        <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> บันทึก</button>
      </div>
    </div>
  </section>
  <hr>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6 right-border">
        <h4 class="text-center">2 ตัว</h4>
        <div class="row">
        <?php for ($i=0; $i < 5 ; $i++) { ?>
            <div class="col-xs-3 form-group form-2digi">
              <input type='text' maxlength='2' onkeypress='return isNumber(event)' name="2digi[]" class="form-control input-lg form-2digi digi-2">
            </div>
            <div class="col-xs-3 form-group form-2digi">
              <input type='text' maxlength='2' onkeypress='return isNumber(event)' name="2digi[]" class="form-control input-lg form-2digi digi-2">
            </div>
            <div class="col-xs-3 form-group form-2digi">
              <input type='text' maxlength='2' onkeypress='return isNumber(event)' name="2digi[]" class="form-control input-lg form-2digi digi-2">
            </div>
            <div class="col-xs-3 form-group form-2digi">
              <input type='text' maxlength='2' onkeypress='return isNumber(event)' name="2digi[]" class="form-control input-lg form-2digi digi-2">
            </div>
        <?php } ?>
        </div>
        <div class="row" id="add2top"></div>
        <div class="form-group">
          <button id="Add2" type="button" class="btn btn-default btn-lg"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มแถว</button>
        </div>

        <div class="row">
          <div class="col-xs-3">
            <div class="form-group">
              <input type="number" name="2digi[]" class="form-control input-lg" placeholder="บน">
            </div>
          </div>
          <div class="col-xs-1">
            <strong>X</strong>
          </div>
          <div class="col-xs-3">
            <div class="form-group">
              <input type="number" name="2digi[]" class="form-control input-lg" placeholder="ล่าง">
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <h4 class="text-center">3 ตัว</h4>
        <div class="row">
        <?php for ($i=0; $i < 5 ; $i++) { ?>
            <div class="col-xs-3 form-group form-3digi">
              <input type='text' maxlength='3' onkeypress='return isNumber(event)' name="3digi[]" class="form-control input-lg form-3digi digi-3">
            </div>
            <div class="col-xs-3 form-group form-3digi">
              <input type='text' maxlength='3' onkeypress='return isNumber(event)' name="3digi[]" class="form-control input-lg form-3digi digi-3">
            </div>
            <div class="col-xs-3 form-group form-3digi">
              <input type='text' maxlength='3' onkeypress='return isNumber(event)' name="3digi[]" class="form-control input-lg form-3digi digi-3">
            </div>
            <div class="col-xs-3 form-group form-3digi">
              <input type='text' maxlength='3' onkeypress='return isNumber(event)' name="3digi[]" class="form-control input-lg form-3digi digi-3">
            </div>
        <?php } ?>
        </div>
        <div class="row" id="add3top"></div>
        <div class="form-group">
          <button id="Add3" type="button" class="btn btn-default btn-lg"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มแถว</button>
        </div>

        <div class="row">
          <div class="col-xs-3">
            <div class="form-group">
              <input type="number" name="2digi[]" class="form-control input-lg" placeholder="ตรง">
            </div>
          </div>
          <div class="col-xs-1">
            <strong>X</strong>
          </div>
          <div class="col-xs-3">
            <div class="form-group">
              <input type="number" name="2digi[]" class="form-control input-lg" placeholder="โต๊ด">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
  </div>

  <script>
  $(document).ready(function() {

    $("#Add2").on("click", function() {
        $("#add2top").append("<div class='col-xs-3 form-group form-2digi'>"
        +	"<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='form-control input-lg form-2digi digi-2'>"
        +	"</div>"
        +	"<div class='col-xs-3 form-group form-2digi'>"
        +	"<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='form-control input-lg form-2digi digi-2'>"
        +	"</div>"
        +	"<div class='col-xs-3 form-group form-2digi'>"
        +	"<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='form-control input-lg form-2digi digi-2'>"
        +	"</div>"
        +	"<div class='col-xs-3 form-group form-2digi'>"
        +	"<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='form-control input-lg form-2digi digi-2'>"
        +	"</div>");
    });

    $("#Add3").on("click", function() {
        $("#add3top").append("<div class='col-xs-3 form-group form-3digi'>"
        +	"<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='3digi[]' class='form-control input-lg form-3digi digi-3'>"
        +	"</div>"
        +	"<div class='col-xs-3 form-group form-3digi'>"
        +	"<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='3digi[]' class='form-control input-lg form-3digi digi-3'>"
        +	"</div>"
        +	"<div class='col-xs-3 form-group form-3digi'>"
        +	"<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='3digi[]' class='form-control input-lg form-3digi digi-3'>"
        +	"</div>"
        +	"<div class='col-xs-3 form-group form-3digi'>"
        +	"<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='3digi[]' class='form-control input-lg form-3digi digi-3'>"
        +	"</div>");
    });

    $("#Remove").on("click", function() {
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
