<style>
  .digi-2 {
    max-width: 18% !important;
  }
  .digi-3 {
    max-width: 18% !important;
  }
</style>
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
    <div class="row">
      <div class="col-md-6">
        <h4 class="text-center">2 ตัว</h4>
        <div class="row">
          <div class="col-xs-12">
            <?php for ($i=0; $i < 5 ; $i++) { ?>
            <div class="form-group form-2digi">
              <input type="text" maxlength="2" onkeypress="return isNumber(event)" name="2digi[]" class="input-lg form-2digi digi-2">
              <input type="text" maxlength="2" onkeypress="return isNumber(event)" name="2digi[]" class="input-lg form-2digi digi-2">
              <input type="text" maxlength="2" onkeypress="return isNumber(event)" name="2digi[]" class="input-lg form-2digi digi-2">
              <input type="text" maxlength="2" onkeypress="return isNumber(event)" name="2digi[]" class="input-lg form-2digi digi-2">
              <input type="text" maxlength="2" onkeypress="return isNumber(event)" name="2digi[]" class="input-lg form-2digi digi-2">
            </div>
            <?php } ?>
            <div id="add2top"></div>

            <div class="form-group">
              <button id="Add2" type="button" class="btn btn-default btn-lg"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มแถว</button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <h4 class="text-center">3 ตัว</h4>
        <div class="row">
          <div class="col-xs-12">
            <?php for ($i=0; $i < 5 ; $i++) { ?>
            <div class="form-group form-3digi">
              <input type="text" maxlength="3" onkeypress="return isNumber(event)" name="3digi[]" class="input-lg form-3digi digi-3">
              <input type="text" maxlength="3" onkeypress="return isNumber(event)" name="3digi[]" class="input-lg form-3digi digi-3">
              <input type="text" maxlength="3" onkeypress="return isNumber(event)" name="3digi[]" class="input-lg form-3digi digi-3">
              <input type="text" maxlength="3" onkeypress="return isNumber(event)" name="3digi[]" class="input-lg form-3digi digi-3">
              <input type="text" maxlength="3" onkeypress="return isNumber(event)" name="3digi[]" class="input-lg form-3digi digi-3">
            </div>
            <?php } ?>
            <div id="add3top"></div>
            <div class="form-group">
                <button id="Add3" type="button" class="btn btn-default btn-lg"><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มแถว</button>
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
        $("#add2top").append("<div class='form-group form-2digi'>"
        +	"<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='input-lg form-2digi digi-2'>"
        + "<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='input-lg form-2digi digi-2'>"
        + "<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='input-lg form-2digi digi-2'>"
        + "<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='input-lg form-2digi digi-2'>"
        + "<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='input-lg form-2digi digi-2'>"
        +	"</div>");
    });

    $("#Add3").on("click", function() {
      $("#add3top").append("<div class='form-group form-3digi'>"
        + "<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='input-lg form-3digi digi-3'>"
        + "<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='input-lg form-3digi digi-3'>"
        + "<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='input-lg form-3digi digi-3'>"
        + "<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='input-lg form-3digi digi-3'>"
        + "<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='input-lg form-3digi digi-3'>"
        + "</div>");
    });

    $("#Remove").on("click", function() {
        $("#add2top").children().last().remove();
    });
  });

  $(".form-2digi.digi-2").keyup(function () {
   if (this.value.length == this.maxLength) {
     $(this)
      .blur()
      .parent()
      .next()
      .children('.form-2digi.digi-2:enabled:first')
      .focus();
   }
  });

  $(".digi-2").keyup(function () {
   if (this.value.length == this.maxLength) {
     $(this)
      .next('.digi-2')
      .focus();
   }
  });

  $(".form-3digi.digi-3").keyup(function () {
   if (this.value.length == this.maxLength) {
     $(this)
      .blur()
      .parent()
      .next()
      .children('.form-3digi.digi-3:enabled:first')
      .focus();
   }
  });

  $(".digi-3").keyup(function () {
      if (this.value.length == this.maxLength) {
        $(this).next('.digi-3').focus();
      }
  });

  </script>
