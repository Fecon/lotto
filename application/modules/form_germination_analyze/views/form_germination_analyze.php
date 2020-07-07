<?php  
$arr = array("class" => "form-horizontal");
echo form_open('form_germination_analyze/insert_data',$arr);  
?>

<div class="row">
  <div class="col-md-12"> 
    <!-- Horizontal Form -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">รายละเอียด</h3>
      </div>
      <!-- /.box-header --> 
      <!-- form start -->
      
      <div class="box-body">
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">ชนิดพืช</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="" name="plant_type" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">เลขที่ตัวอย่าง</label>
          <div class="col-sm-10">
            <input type="hidden" name="pedigree_id" value="<?php echo $pedigree[0]['pedigree_id'] ?>" >
            <input type="text" class="form-control" name="pedigree_name" placeholder="" value="<?php echo $pedigree[0]['designation'] ?>" readonly >
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">วันที่ตรวจสอบ </label>
          <div class="col-sm-2">
            <div class="input-group">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input type="date" class="form-control" name="check_date" required>
            </div>
          </div>
        </div>
        <?php for($i = 1 ; $i<=$repeat ; $i++){ ?>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">
            <?php if($i==1){ echo 'น้ำหนักตัวอย่างที่ใช้ตรวจสอบ';} ?>
          </label>
          <label for="" class="col-sm-2 control-label">ซ้ำที่ <?php echo $i ?> </label>
          <div class="col-sm-2">
            <input type="number"  step="any" class="form-control" id="" name="weight[]" placeholder="">
          </div>
        </div>
        <?php } ?>
        <div class="row">
          <div class="col-sm-12">
            <input type="hidden" name="repeat" value="<?php echo $repeat?>">
            <br />
          </div>
        </div>
        <div class="box-footer">
          <table id="seed_list" class="table table-hover table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th valign="middle" width="20%" rowspan="2"><div align="center">ซ้ำที่</div></th>
                <th colspan="3"><div align="center">ต้นอ่อนปกติ</div></th>
                <th rowspan="2"><div align="center">ต้นอ่อนผิดปกติ</div></th>
                <th rowspan="2"><div align="center">เมล็ดแข็ง / พักตัว</div></th>
                <th rowspan="2"><div align="center">เมล็ดเน่า / ตาย</div></th>
              </tr>
              <tr>
                <th>นับครั้งแรก</th>
                <th>นับครั้งสุดท้าย</th>
                <th>รวม</th>
              </tr>
            </thead>
            <tbody>
              <?php for($i = 1 ; $i<=$repeat ; $i++){ ?>
              <tr>
                <td align="center"><?php echo $i ; ?></td>
                <td><input type="number"  step="any" class="form-control" placeholder="" onkeyup="averageBoxes3(<?php echo $i?>)" onchange="averageBoxes3(<?php echo $i?>)" name="data1[]" id="data1<?php echo $i?>"></td>
                <td><input type="number"  step="any" class="form-control" placeholder="" onkeyup="averageBoxes3(<?php echo $i?>)" onchange="averageBoxes3(<?php echo $i?>)" name="data2[]" id="data2<?php echo $i?>"></td>
                <td><input type="number"  step="any" class="form-control data3" placeholder=""  onkeyup="averageBoxes3(<?php echo $i?>)" onchange="averageBoxes3(<?php echo $i?>)"  name="data3[]" id="data3<?php echo $i?>"  readonly></td>
                <td><input type="number"  step="any" class="form-control data4" placeholder=""  onkeyup="averageBoxes4(<?php echo $i?>)" onchange="averageBoxes4(<?php echo $i?>)"  name="data4[]" id="data4<?php echo $i?>"></td>
                <td><input type="number"  step="any" class="form-control data5" placeholder=""  onkeyup="averageBoxes5(<?php echo $i?>)" onchange="averageBoxes5(<?php echo $i?>)"  name="data5[]" id="data5<?php echo $i?>"></td>
                <td><input type="number"  step="any" class="form-control data6" placeholder=""  onkeyup="averageBoxes6(<?php echo $i?>)" onchange="averageBoxes6(<?php echo $i?>)"  name="data6[]" id="data6<?php echo $i?>"></td>
              </tr>
              <?php } ?>
              <tr>
                <td colspan="3" align="center">เฉลี่ย</td>
                <td><input type="text" class="form-control" name="avg_data3" id="avg_data3" placeholder="" readonly ></td>
                <td><input type="text" class="form-control" name="avg_data4" id="avg_data4" placeholder="" readonly></td>
                <td><input type="text" class="form-control" name="avg_data5" id="avg_data5" placeholder="" readonly></td>
                <td><input type="text" class="form-control" name="avg_data6" id="avg_data6" placeholder="" readonly></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.box-body --> 
      <!-- /.box-footer --> 
      
    </div>
    <!-- /.box --> 
  </div>
</div>
<!-- /.box --> 
<script>
		function averageBoxes3(x){
			var elems = document.getElementsByClassName('data3');
			var myLength = elems.length,
			total = 0;
			for (var i = 0; i < myLength; ++i) {
			  total += parseInt(elems[i].value) || 0;
			}
			var avg1 = total/myLength ;
			document.getElementById('avg_data3').value = avg1.toFixed(2);
			
			var num1 = 'data1' + x.toString() ;
			var num2 = 'data2' + x.toString() ;
			var num3 = 'data3' + x.toString() ;
			var total=(Math.abs(document.getElementById(num1).value)+Math.abs(document.getElementById(num2).value))
			if (total!==total)
			alert('Numbers Only Please!')
			document.getElementById(num3).value = total.toFixed(2);
		}
		function averageBoxes4(x){
			var elems = document.getElementsByClassName('data4');
			var myLength = elems.length,
			total = 0;
			for (var i = 0; i < myLength; ++i) {
			  total += parseInt(elems[i].value) || 0;
			}
			var avg1 = total/myLength ;
			document.getElementById('avg_data4').value = avg1.toFixed(2);
		}
		function averageBoxes5(x){
			var elems = document.getElementsByClassName('data5');
			var myLength = elems.length,
			total = 0;
			for (var i = 0; i < myLength; ++i) {
			  total += parseInt(elems[i].value) || 0;
			}
			var avg1 = total/myLength ;
			document.getElementById('avg_data5').value = avg1.toFixed(2);
		}
		function averageBoxes6(x){
			var elems = document.getElementsByClassName('data6');
			var myLength = elems.length,
			total = 0;
			for (var i = 0; i < myLength; ++i) {
			  total += parseInt(elems[i].value) || 0;
			}
			var avg1 = total/myLength ;
			document.getElementById('avg_data6').value = avg1.toFixed(2);
		}
</script>