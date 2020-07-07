<?php  
$arr = array("class" => "form-horizontal");
echo form_open('form_pure_seed/insert_data',$arr);  
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
            <input type="number"  step="any" class="form-control" id="" name="weight_seed<?php echo $i ?>" placeholder="">
          </div>
        </div>
        <?php } ?>
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">ผู้ตรวจสอบ </label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="" placeholder="ชื่อ-นามสกุล" name="checker_name">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12"> <br />
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <table id="seed_list" class="table table-hover table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th valign="middle" width="20%" rowspan="2"><div align="center">องค์ประกอบของเมล็ดพันธุ์</div></th>
                  <?php for($i = 1 ; $i<=$repeat ; $i++){ ?>
                  <th colspan="2"><div align="center">ซ้ำที่ <?php echo $i ?></div></th>
                  <?php } ?>
                  <th rowspan="2"><div align="center">เฉลี่ย</div></th>
                </tr>
                <tr>
                  <?php for($i = 1 ; $i<=$repeat ; $i++){ ?>
                  <th>น้ำหนัก(กรัม)</th>
                  <th>เปอร์เซ็น</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td align="center">เมล็ดพันธุ์บริสุทธิ์</td>
                  <?php for($i = 1 ; $i<=$repeat ; $i++){ ?>
                  <td><input type="number" step="any" class="form-control" id="" placeholder="" name="weight_pure_seed<?php echo $i ?>"></td>
                  <td><input type="number" step="any" class="form-control percent_pure" onkeyup="averageBoxes2()" id="percent_pure_seed<?php echo $i ?>" placeholder="" name="percent_pure_seed<?php echo $i ?>"></td>
                  <?php } ?>
                  <td><input type="text" readonly class="form-control" onchange="averageBoxes()"  id="avg_pure_seed" placeholder="" name="avg_pure_seed"></td>
                </tr>
                <tr>
                  <td align="center">เมล็ดพืชอื่น</td>
                  <?php for($i = 1 ; $i<=$repeat ; $i++){ ?>
                  <td><input type="number" step="any" class="form-control" id="" placeholder="" name="weight_other_seed<?php echo $i ?>"></td>
                  <td><input type="number" step="any" class="form-control percent_other" onkeyup="averageBoxes3()" id="percent_other_seed<?php echo $i ?>" placeholder="" name="percent_other_seed<?php echo $i ?>"></td>
                  <?php } ?>
                  <td><input type="text" readonly class="form-control" onchange="averageBoxes()"  id="avg_other_seed" placeholder="" name="avg_other_seed"></td>
                </tr>
                <tr>
                  <td align="center">สิ่งเจือปน</td>
                  <?php for($i = 1 ; $i<=$repeat ; $i++){ ?>
                  <td><input type="number" step="any" class="form-control" id="" placeholder="" name="weight_contamination<?php echo $i ?>"></td>
                  <td><input type="number" step="any" class="form-control percent_contamination" onkeyup="averageBoxes4()" id="percent_contamination<?php echo $i ?>" placeholder="" name="percent_contamination<?php echo $i ?>"></td>
                  <?php } ?>
                  <td><input type="text" readonly class="form-control" onchange="averageBoxes()"  id="avg_contamination" placeholder="" name="avg_contamination"></td>
                </tr>
                <tr>
                  <td align="center">รวม</td>
                  <?php for($i = 1 ; $i<=$repeat ; $i++){ ?>
                  <td><input type="number" step="any" class="form-control" id="" placeholder="" name="weight_total<?php echo $i ?>"></td>
                  <td><input type="number" step="any" class="form-control" id="" placeholder="" name="percent_total<?php echo $i ?>"></td>
                  <?php } ?>
                  <td><input type="text" readonly class="form-control" id="avg_total" placeholder="" name="avg_total"></td>
                </tr>
              </tbody>
            </table>
            <br />
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">เมล็ดพืชอื่นที่พบ</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="" name="other_seed" placeholder=""></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-2 control-label">ชนิดของสิ่งที่เจอปน</label>
          <div class="col-sm-10">
            <textarea class="form-control" id=""  name="contamination" placeholder=""></textarea>
          </div>
        </div>
        <input type="hidden" name="repeat" value="<?php echo $repeat?>">
      </div>
      <!-- /.box-body --> 
      <!-- /.box-footer --> 
      
    </div>
    <!-- /.box --> 
  </div>
</div>
<!-- /.box --> 
<script>
		function averageBoxes1(){
			
		}
		
		function averageBoxes2(){
			var elems = document.getElementsByClassName('percent_pure');

			var myLength = elems.length,
			total = 0;
			
			for (var i = 0; i < myLength; ++i) {
			  total += parseInt(elems[i].value) || 0;
			}
			var avg1 = total/myLength ;
			
			document.getElementById('avg_pure_seed').value = avg1.toFixed(2);
			
			var num1 = 'avg_pure_seed' ;
			var num2 = 'avg_other_seed'  ;
			var num3 = 'avg_contamination' ;
			var average = 'avg_total' ;
			var avg=(Math.abs(document.getElementById(num1).value)+Math.abs(document.getElementById(num2).value)+Math.abs(document.getElementById(num3).value))/3
			if (avg!==avg)
			alert('Numbers Only Please!')
			document.getElementById(average).value = avg.toFixed(2);
		}
		function averageBoxes3(){
			var elems = document.getElementsByClassName('percent_other');

			var myLength = elems.length,
			total = 0;
			
			for (var i = 0; i < myLength; ++i) {
			  total += parseInt(elems[i].value) || 0;
			}
			var avg1 = total/myLength ;
			
			document.getElementById('avg_other_seed').value = avg1.toFixed(2);
			
			var num1 = 'avg_pure_seed' ;
			var num2 = 'avg_other_seed'  ;
			var num3 = 'avg_contamination' ;
			var average = 'avg_total' ;
			var avg=(Math.abs(document.getElementById(num1).value)+Math.abs(document.getElementById(num2).value)+Math.abs(document.getElementById(num3).value))/3
			if (avg!==avg)
			alert('Numbers Only Please!')
			document.getElementById(average).value = avg.toFixed(2);
		}
		function averageBoxes4(){
			var elems = document.getElementsByClassName('percent_contamination');

			var myLength = elems.length,
			total = 0;
			
			for (var i = 0; i < myLength; ++i) {
			  total += parseInt(elems[i].value) || 0;
			}
			var avg1 = total/myLength ;
			
			document.getElementById('avg_contamination').value = avg1.toFixed(2);
			
			var num1 = 'avg_pure_seed' ;
			var num2 = 'avg_other_seed'  ;
			var num3 = 'avg_contamination' ;
			var average = 'avg_total' ;
			var avg=(Math.abs(document.getElementById(num1).value)+Math.abs(document.getElementById(num2).value)+Math.abs(document.getElementById(num3).value))/3
			if (avg!==avg)
			alert('Numbers Only Please!')
			document.getElementById(average).value = avg.toFixed(2);
		}
</script>