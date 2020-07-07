<?php  
$arr = array("class" => "form-horizontal");
echo form_open('form_hulling/update_data',$arr);  
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
              <input type="date" class="form-control" name="check_date" value="<?php echo $get_data[0]['check_date'] ?>" required>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <table id="seed_list" class="table table-hover table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th rowspan="2"><div align="center">% ความชื้น</div></th>
                <th colspan="2"><div align="center">ข้าวกล้อง</div></th>
                <th colspan="2"><div align="center">ข้าวสาร</div></th>
                <th colspan="2"><div align="center">ข้าวเต็มเมล็ดและต้นข้าว</div></th>
                <th colspan="2"><div align="center">แกลบ</div></th>
                <th colspan="2"><div align="center">รำ</div></th>
              </tr>
              <tr>
                <th>นน.</th>
                <th>%</th>
                <th>นน.</th>
                <th>%</th>
                <th>นน.</th>
                <th>%</th>
                <th>นน.</th>
                <th>%</th>
                <th>นน.</th>
                <th>%</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                	<input type="hidden" name="id" value="<?php echo $get_data[0]['id'] ?>" >
                    <input type="hidden" name="pedigree_id" value="<?php echo $pedigree[0]['pedigree_id'] ?>" >
                <td><input type="number"  step="any" class="form-control" placeholder="" value="<?php echo $get_data[0]['data1'] ?>" name="data1"></td>
                <td><input type="number"  step="any" class="form-control" placeholder="" value="<?php echo $get_data[0]['data2'] ?>" name="data2"></td>
                <td><input type="number"  step="any" class="form-control" placeholder="" value="<?php echo $get_data[0]['data3'] ?>" name="data3"></td>
                <td><input type="number"  step="any" class="form-control" placeholder="" value="<?php echo $get_data[0]['data4'] ?>" name="data4"></td>
                <td><input type="number"  step="any" class="form-control" placeholder="" value="<?php echo $get_data[0]['data5'] ?>" name="data5"></td>
                <td><input type="number"  step="any" class="form-control" placeholder="" value="<?php echo $get_data[0]['data6'] ?>" name="data6"></td>
                <td><input type="number"  step="any" class="form-control" placeholder="" value="<?php echo $get_data[0]['data7'] ?>" name="data7"></td>
                <td><input type="number"  step="any" class="form-control" placeholder="" value="<?php echo $get_data[0]['data8'] ?>" name="data8"></td>
                <td><input type="number"  step="any" class="form-control" placeholder="" value="<?php echo $get_data[0]['data9'] ?>" name="data9" ></td>
                <td><input type="number"  step="any" class="form-control" placeholder="" value="<?php echo $get_data[0]['data10'] ?>" name="data10" ></td>
                <td><input type="number"  step="any" class="form-control" placeholder="" value="<?php echo $get_data[0]['data11'] ?>" name="data11" ></td>
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
