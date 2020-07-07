<?php
header("Content-type: application/vnd.ms-excel");
// header('Content-type: application/csv'); 
header("Content-Disposition: attachment; filename=ตรวจสอบความงอก ".@$pedigree[0]['designation'].".xls");
?>
<style>
td{
	text-align:center;
}
</style>
<div class="row">
  <div class="col-md-12"> 
    <!-- Horizontal Form -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">ตรวจสอบความงอก <?php echo @$pedigree[0]['designation'] ?></h3>
      </div>
      <!-- /.box-header --> 
      <!-- form start -->
      
      <div class="box-body">
        <div class="form-group">
                      <label for="" class="col-sm-2 control-label">ชนิดพืช : <?php echo @$get_data[0]['plant_type'] ?></label>
                      
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">เลขที่ตัวอย่าง : <?php echo @$pedigree[0]['designation'] ?></label>
                      
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">วันที่ตรวจสอบ : <input value="<?php echo @$get_data[0]['check_date'] ?>" type="date" ></label>
                      
                    </div>
                    <?php for($i = 1 ; $i<=$repeat ; $i++){ ?>
                    <div class="form-group">
                      <label for="" class="col-sm-3 control-label"><?php if($i==1){ echo 'น้ำหนักตัวอย่างที่ใช้ตรวจสอบ <br>';} ?> </label>

                      <label for="" class="col-sm-2 control-label">ซ้ำที่ <?php echo $i ?> : <?php echo $germination_repeat[$i-1]['weight'] ?>  </label>
                      
                    </div>
                    <?php } ?>
        
        <div class="box-footer">
          <table border="1" width="100%">
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
                <td><?php echo $germination_repeat[$i]['days'] ?></td>
                <td><input value="<?php echo $germination_repeat[$i]['date'] ?>" type="date" class="form-control" placeholder="" name="date[]" id="date<?php echo $i?>"></td>
                <td><?php echo $germination_repeat[$i]['data1'] ?></td>
                <td><?php echo $germination_repeat[$i]['data2'] ?></td>
                <td><?php echo $germination_repeat[$i]['data3'] ?></td>
                <td><?php echo $germination_repeat[$i]['data4'] ?></td>
                <td><?php echo $germination_repeat[$i]['total'] ?></td>
                <td><?php echo $germination_repeat[$i]['avg'] ?></td>
              </tr>
              <?php } ?>
              <tr>
                <th align="center"  colspan="2" >รวมต้นสมบูรณ์</th>
                <td><?php echo $germination_repeat[$i]['data1'] ?></td>
                <td><?php echo $germination_repeat[$i]['data2'] ?></td>
                <td><?php echo $germination_repeat[$i]['data3'] ?></td>
                <td><?php echo $germination_repeat[$i]['data4'] ?></td>
                <td><?php echo $germination_repeat[$i]['total'] ?></td>
                <td><?php echo $germination_repeat[$i]['avg'] ?></td>
              </tr>
              <?php $i++;?>
              <tr>
                <th align="center" colspan="2" >ต้นไม่สมบูรณ์</th>
                <td><?php echo $germination_repeat[$i]['data1'] ?></td>
                <td><?php echo $germination_repeat[$i]['data2'] ?></td>
                <td><?php echo $germination_repeat[$i]['data3'] ?></td>
                <td><?php echo $germination_repeat[$i]['data4'] ?></td>
                <td><?php echo $germination_repeat[$i]['total'] ?></td>
                <td><?php echo $germination_repeat[$i]['avg'] ?></td>
              </tr>
              <?php $i++;?>
              <tr>
                <th align="center" colspan="2" >เมล็ดสด / เมล็ดแข็ง</th>
                <td><?php echo $germination_repeat[$i]['data1'] ?></td>
                <td><?php echo $germination_repeat[$i]['data2'] ?></td>
                <td><?php echo $germination_repeat[$i]['data3'] ?></td>
                <td><?php echo $germination_repeat[$i]['data4'] ?></td>
                <td><?php echo $germination_repeat[$i]['total'] ?></td>
                <td><?php echo $germination_repeat[$i]['avg'] ?></td>
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
