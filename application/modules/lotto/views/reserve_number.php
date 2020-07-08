<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      เลขอั้น
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
		<h4>
      อัตราจ่ายเลขอั้น งวด <?php echo $lotto[0]['name']; ?>
    </h4>
		<form>
      <div class="row">

				<div class="col-md-5 col-sm-5">
					<h4>2 ตัว บน ล่าง <button type="button" id="Add2" class="btn"><i class="fa fa-plus" aria-hidden="true"></i></button></h4>
					<div class="row">
						<div class="col-xs-4 text-center">
						    <label>เลข</label>
						</div>
						<div class="col-xs-6 text-center">
						    <label>จ่าย</label>
						</div>
					</div>
					<?php for ($i=0; $i < 9 ; $i++) { ?>
					<div class="row">
						<div class="col-xs-4">
							<div class="form-group">
						    <input type="number" min="0" max="99" name="number[]" class="form-control" placeholder="">
						  </div>
						</div>
						<div class="col-xs-6">
						  <div class="form-group">
						    <input type="number" name="pay[]" class="form-control" placeholder="">
						  </div>
						</div>
					</div>
					<?php } ?>
						<div id="add2top"></div>
				</div>

				<div class="col-md-7 col-sm-7">
					<h4>3 ตัว ตรง โต๊ด <button type="button" id="Add3" class="btn"><i class="fa fa-plus" aria-hidden="true"></i></button></h4>
					<div class="row">
						<div class="col-xs-4 text-center">
						    <label>เลข</label>
						</div>
						<div class="col-xs-4 text-center">
						    <label>ตรงจ่าย</label>
						</div>
						<div class="col-xs-4 text-center">
						    <label>โต๊ดจ่าย</label>
						</div>
					</div>
					<?php for ($i=0; $i < 9 ; $i++) { ?>
					<div class="row">
						<div class="col-xs-4">
							<div class="form-group">
						    <input type="number" min="0" max="99" name="number[]" class="form-control" placeholder="">
						  </div>
						</div>
						<div class="col-xs-4">
						  <div class="form-group">
						    <input type="number" name="pay[]" class="form-control" placeholder="">
						  </div>
						</div>
						<div class="col-xs-4">
						  <div class="form-group">
						    <input type="number" name="pay2[]" class="form-control" placeholder="">
						  </div>
						</div>
					</div>
					<?php } ?>
						<div id="add3top"></div>
				</div>
      </div>
		</form>
  </section>
  <!-- /.content -->
</div>

<script>
$(document).ready(function() {
    $("#Add2").on("click", function() {
        $("#add2top").append("<div class='row'>"
				+ "<div class='col-xs-4'>"
				+ "<div class='form-group'>"
				+	"<input type='number' min='0' max='99' name='number[]' class='form-control' placeholder=''>"
				+	"</div>"
				+	"</div>"
				+ "<div class='col-xs-6'>"
				+	"<div class='form-group'>"
				+	"<input type='number' name='pay[]' class='form-control' placeholder='บาท'>"
				+	"</div>"
				+	"</div>"
				+	"</div>");
    });
		$("#Add3").on("click", function() {
        $("#add3top").append("<div class='row'>"
				+ "<div class='col-xs-4'>"
				+ "<div class='form-group'>"
				+	"<input type='number' min='0' max='99' name='number[]' class='form-control' placeholder=''>"
				+	"</div>"
				+	"</div>"
				+ "<div class='col-xs-4'>"
				+	"<div class='form-group'>"
				+	"<input type='number' name='pay[]' class='form-control' placeholder=''>"
				+	"</div>"
				+	"</div>"
				+ "<div class='col-xs-4'>"
				+	"<div class='form-group'>"
				+	"<input type='number' name='pay2[]' class='form-control' placeholder=''>"
				+	"</div>"
				+	"</div>"
				+	"</div>");
    });

    $("#Remove").on("click", function() {
        $("#add2top").children().last().remove();
    });
});


</script>
