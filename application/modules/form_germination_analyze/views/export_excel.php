<?php
header("Content-type: application/vnd.ms-excel");
// header('Content-type: application/csv'); 
header("Content-Disposition: attachment; filename=ผลการวิเคราะห์ความงอก ".@$pedigree[0]['designation'].".xls");
?>
<style>
td {
	text-align: center;
}
</style>
<div class="row">
  <div class="col-md-12"> 
    <!-- Horizontal Form -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">ผลการวิเคราะห์ความงอก <?php echo @$pedigree[0]['designation'] ?></h3>
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
          <label for="" class="col-sm-2 control-label">วันที่ตรวจสอบ :
            <input value="<?php echo @$get_data[0]['check_date'] ?>" type="date" >
          </label>
        </div>
        <?php for($i = 1 ; $i<=$repeat ; $i++){ ?>
        <div class="form-group">
          <label for="" class="col-sm-3 control-label">
            <?php if($i==1){ echo 'น้ำหนักตัวอย่างที่ใช้ตรวจสอบ <br>';} ?>
          </label>
          <label for="" class="col-sm-2 control-label">ซ้ำที่ <?php echo $i ?> : <?php echo $germination_repeat[$i-1]['weight'] ?> </label>
        </div>
        <?php } ?>
        <div class="box-footer">
          <table border="1">
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
                <td><?php echo $germination_repeat[$i-1]['data1'] ?></td>
                <td><?php echo $germination_repeat[$i-1]['data2'] ?></td>
                <td><?php echo $germination_repeat[$i-1]['data3'] ?></td>
                <td><?php echo $germination_repeat[$i-1]['data4'] ?></td>
                <td><?php echo $germination_repeat[$i-1]['data5'] ?></td>
                <td><?php echo $germination_repeat[$i-1]['data6'] ?></td>
              </tr>
              <?php } ?>
              <tr>
                <td colspan="3" align="center">เฉลี่ย</td>
                <td><?php echo $get_data[0]['avg_data3'] ?></td>
                <td><?php echo $get_data[0]['avg_data4'] ?></td>
                <td><?php echo $get_data[0]['avg_data5'] ?></td>
                <td><?php echo $get_data[0]['avg_data6'] ?></td>
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
