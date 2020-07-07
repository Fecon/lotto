<?php  
$arr = array("class" => "form-horizontal");
echo form_open('form_germination/update_data',$arr);  
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
            <input type="text" class="form-control" id="" name="plant_type" placeholder="" value="<?php echo $get_data[0]['plant_type'] ?>">
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
              <input type="date" class="form-control" name="check_date" required  value="<?php echo $get_data[0]['check_date'] ?>">
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
            <input type="text" class="form-control" name="weight[]" id="" placeholder="" value="<?php echo $germination_repeat[$i-1]['weight'] ?>">
          </div>
        </div>
        <?php } ?>
        <div class="row">
          <div class="col-sm-12">
            <input type="hidden" name="id" value="<?php echo $get_data[0]['id'] ?>">
            <input type="hidden" name="repeat" value="<?php echo $repeat?>">
            <br />
          </div>
        </div>
        <div class="box-footer">
          <table  id="example2" class="table table-bordered table-hover"   >
            <thead>
              <tr align="center">
                <th  align="center" colspan="2" ><center>
                    วันนับ
                  </center></th>
                <th align="center" colspan="5"><center>
                    ความงอก
                  </center></th>
                <th align="center" rowspan="2"><center>
                    เฉลี่ย %
                  </center>
                </th>
              <tr >
                <td align="center">จำนวนวัน </td>
                <td align="center">วันที่ </td>
                <td align="center">I</td>
                <td align="center">II</td>
                <td align="center">III</td>
                <td align="center">IV</td>
                <td align="center">รวม</td>
              </tr>
            </thead>
            <tbody>
              <?php for($i = 0 ; $i< $repeat ; $i++){ ?>
              <tr>
                <td><input value="<?php echo $germination_repeat[$i]['days'] ?>" type="number" min="0" step="any" class="form-control" placeholder="" name="days[]" id="days<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['date'] ?>" type="date" class="form-control" placeholder="" name="date[]" id="date<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['data1'] ?>" type="number"  step="any" class="form-control" placeholder="" onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)" name="data1[]" id="data1<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['data2'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="data2[]" id="data2<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['data3'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="data3[]" id="data3<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['data4'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="data4[]" id="data4<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['total'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="total[]" id="total<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['avg'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="avg[]" id="avg<?php echo $i?>">
                  <input type="hidden" name="type[]" value="1"></td>
              </tr>
              <?php } ?>
              <tr>
                <th align="center"  colspan="2" >รวมต้นสมบูรณ์</th>
                <td><input value="<?php echo $germination_repeat[$i]['data1'] ?>" type="number"  step="any" class="form-control" placeholder="" onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="data1[]" id="data1<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['data2'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="data2[]" id="data2<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['data3'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="data3[]" id="data3<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['data4'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="data4[]" id="data4<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['total'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="total[]" id="total<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['avg'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="avg[]" id="avg<?php echo $i?>">
                  <input type="hidden" name="type[]" value="2">
                  <input type="hidden" name="weight[]" id="weight<?php echo $i ?>">
                  <input type="hidden" name="days[]" id="days<?php echo $i ?>">
                  <input type="hidden" name="date[]" id="date<?php echo $i ?>"></td>
              </tr>
              <?php $i++;?>
              <tr>
                <th align="center" colspan="2" >ต้นไม่สมบูรณ์</th>
                <td><input value="<?php echo $germination_repeat[$i]['data1'] ?>" type="number"  step="any" class="form-control" placeholder="" onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)" name="data1[]" id="data1<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['data2'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="data2[]" id="data2<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['data3'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="data3[]" id="data3<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['data4'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="data4[]" id="data4<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['total'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="total[]" id="total<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['avg'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="avg[]" id="avg<?php echo $i?>">
                  <input type="hidden" name="type[]" value="2">
                  <input type="hidden" name="weight[]" id="weight<?php echo $i ?>">
                  <input type="hidden" name="days[]" id="days<?php echo $i ?>">
                  <input type="hidden" name="date[]" id="date<?php echo $i ?>"></td>
              </tr>
              <?php $i++;?>
              <tr>
                <th align="center" colspan="2" >เมล็ดสด / เมล็ดแข็ง</th>
                <td><input value="<?php echo $germination_repeat[$i]['data1'] ?>" type="number"  step="any" class="form-control" placeholder="" onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)" name="data1[]" id="data1<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['data2'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="data2[]" id="data2<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['data3'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="data3[]" id="data3<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['data4'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="data4[]" id="data4<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['total'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="total[]" id="total<?php echo $i?>"></td>
                <td><input value="<?php echo $germination_repeat[$i]['avg'] ?>" type="number"  step="any" class="form-control" placeholder=""  onkeyup="averageBoxes(<?php echo $i?>)" onchange="averageBoxes(<?php echo $i?>)"  name="avg[]" id="avg<?php echo $i?>">
                  <input type="hidden" name="type[]" value="2">
                  <input type="hidden" name="weight[]" id="weight<?php echo $i ?>">
                  <input type="hidden" name="days[]" id="days<?php echo $i ?>">
                  <input type="hidden" name="date[]" id="date<?php echo $i ?>"></td>
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
		function averageBoxes(x){
			var data1 = 'data1' + x.toString() ;
			var data2 = 'data2' + x.toString() ;
			var data3 = 'data3' + x.toString() ;
			var data4 = 'data4' + x.toString() ;
			var total = 'total' + x.toString() ;
			var average = 'avg' + x.toString() ;
			var total_value =(Math.abs(document.getElementById(data1).value)+Math.abs(document.getElementById(data2).value)+Math.abs(document.getElementById(data3).value)+Math.abs(document.getElementById(data4).value));
			var avg = total_value/4 ;
		if (avg!==avg)
		alert('Numbers Only Please!')
		document.getElementById(total).value = total_value.toFixed(2);
		document.getElementById(average).value = avg.toFixed(2); 
		}
</script>