<?php
header("Content-type: application/vnd.ms-excel");
// header('Content-type: application/csv'); 
header("Content-Disposition: attachment; filename=คุณภาพการสี ".@$pedigree[0]['designation'].".xls");
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
        <h3 class="box-title">คุณภาพการสี <?php echo @$pedigree[0]['designation'] ?></h3>
      </div>
      <!-- /.box-header --> 
      <!-- form start -->
      
      <div class="box-body">
        
        <div class="box-footer">
          <table border="1">
            <thead>
              <tr>
                <th valign="middle" width="25%" rowspan="2"><div align="center">ตัวอย่าง</div></th>
                <th rowspan="2"><div align="center">% ความชื่น</div></th>
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
                <td><?php echo $pedigree[0]['designation'] ?></td>
                <td><?php echo $get_data[0]['data1'] ?></td>
                <td><?php echo $get_data[0]['data2'] ?></td>
                <td><?php echo $get_data[0]['data3'] ?></td>
                <td><?php echo $get_data[0]['data4'] ?></td>
                <td><?php echo $get_data[0]['data5'] ?></td>
                <td><?php echo $get_data[0]['data6'] ?></td>
                <td><?php echo $get_data[0]['data7'] ?></td>
                <td><?php echo $get_data[0]['data8'] ?></td>
                <td><?php echo $get_data[0]['data9'] ?></td>
                <td><?php echo $get_data[0]['data10'] ?></td>
                <td><?php echo $get_data[0]['data11'] ?></td>
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
