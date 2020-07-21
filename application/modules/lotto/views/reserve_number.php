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
			อัตราจ่ายเลขอั้น งวด <input disabled type="date" id="datepicker" value="<?php echo $lotto[0]['name']; ?>">
		</h4>
		<?php echo form_open('lotto/rn_insert/'.$lotto[0]['id'])?>
		<div class="row">

			<div class="col-md-5 col-sm-5">
				<div class="row">
					<div class="col-xs-6">
						<h4>2 ตัว บน ล่าง </h4>
					</div>
					<div class="col-xs-4 text-right">
						<button id="Add2" type="button" class="btn btn-default"><i class="fa fa-plus"
								aria-hidden="true"></i> เพิ่มแถว</button>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4 text-center">
						<label>เลข</label>
					</div>
					<div class="col-xs-6 text-center">
						<label>จ่าย</label>
					</div>
				</div>
				<?php if(!empty($reserve_number2)){
                  foreach ($reserve_number2 as $key => $number2) { ?>
				<div class="row">
					<div class="col-xs-4">
						<div class="form-group">
							<input type="text" maxlength="2" onkeypress="return isNumber(event)" name="2digi[]"
								class="form-control input-lg" placeholder="" value="<?php echo $number2['number'] ?>">
						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<input type="number" name="2pay[]" class="form-control input-lg" placeholder=""
								value="<?php echo $number2['pay'] ?>">
						</div>
					</div>
				</div>
				<?php   }
                } else{
                    for ($i=0; $i < 7 ; $i++) { ?>
				<div class="row">
					<div class="col-xs-4">
						<div class="form-group">
							<input type="text" maxlength="2" onkeypress="return isNumber(event)" name="2digi[]"
								class="form-control input-lg" placeholder="" value="">
						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<input type="number" name="2pay[]" class="form-control input-lg" placeholder="">
						</div>
					</div>
				</div>
				<?php   }
                }
              ?>
				<div id="add2top"></div>
			</div>

			<div class="col-md-7 col-sm-7">
				<div class="row">
					<div class="col-xs-6">
						<h4>3 ตัว ตรง โต๊ด </h4>
					</div>
					<div class="col-xs-6 text-right">
						<button id="Add3" type="button" class="btn btn-default"><i class="fa fa-plus"
								aria-hidden="true"></i> เพิ่มแถว</button>
					</div>
				</div>
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
				<?php if(!empty($reserve_number3)){
                  foreach ($reserve_number3 as $key => $number3) { ?>
				<div class="row">
					<div class="col-xs-4">
						<div class="form-group">
							<input type="text" maxlength="3" onkeypress="return isNumber(event)" name="3digi[]"
								class="form-control input-lg" placeholder="" value="<?php echo $number3['number'] ?>">
						</div>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<input type="number" name="3pay[]" class="form-control input-lg" placeholder=""
								value="<?php echo $number3['pay'] ?>">
						</div>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<input type="number" name="3pay2[]" class="form-control input-lg" placeholder=""
								value="<?php echo $number3['pay2'] ?>">
						</div>
					</div>
				</div>
				<?php   }
                } else{
          					 for ($i=0; $i < 7 ; $i++) { ?>
				<div class="row">
					<div class="col-xs-4">
						<div class="form-group">
							<input type="text" maxlength="3" onkeypress="return isNumber(event)" name="3digi[]"
								class="form-control input-lg" placeholder="">
						</div>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<input type="number" name="3pay[]" class="form-control input-lg" placeholder="">
						</div>
					</div>
					<div class="col-xs-4">
						<div class="form-group">
							<input type="number" name="3pay2[]" class="form-control input-lg" placeholder="">
						</div>
					</div>
				</div>
				<?php }
                } ?>
				<div id="add3top"></div>
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
	$(document).ready(function () {
		$("#Add2").on("click", function () {
			$("#add2top").append("<div class='row'>" +
				"<div class='col-xs-4'>" +
				"<div class='form-group'>" +
				"<input type='text' maxlength='2' onkeypress='return isNumber(event)' name='2digi[]' class='form-control input-lg'>" +
				"</div>" +
				"</div>" +
				"<div class='col-xs-6'>" +
				"<div class='form-group'>" +
				"<input type='number' name='2pay[]' class='form-control input-lg' placeholder=''>" +
				"</div>" +
				"</div>" +
				"</div>");
		});
		$("#Add3").on("click", function () {
			$("#add3top").append("<div class='row'>" +
				"<div class='col-xs-4'>" +
				"<div class='form-group'>" +
				"<input type='text' maxlength='3' onkeypress='return isNumber(event)' name='3digi[]' class='form-control input-lg' placeholder=''>" +
				"</div>" +
				"</div>" +
				"<div class='col-xs-4'>" +
				"<div class='form-group'>" +
				"<input type='number' name='3pay[]' class='form-control input-lg' placeholder=''>" +
				"</div>" +
				"</div>" +
				"<div class='col-xs-4'>" +
				"<div class='form-group'>" +
				"<input type='number' name='3pay2[]' class='form-control input-lg' placeholder=''>" +
				"</div>" +
				"</div>" +
				"</div>");
		});

		$("#Remove").on("click", function () {
			$("#add2top").children().last().remove();
		});
	});
</script>
