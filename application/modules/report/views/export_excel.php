<?php
header("Content-type: application/vnd.ms-excel");
// header('Content-type: application/csv'); 
header("Content-Disposition: attachment; filename=ส่งออกข้อมูลวิเคราะห์.xls");
?>
<style>
td{
	text-align:center;
}
</style>
<table border="1">
  <thead class="bg-olive-active">
    <tr>
      <th width="10%">Rep</th>
      <?php if($get_data[0]['block']!=0){ ?>
      <th width="10%">Block</th>
      <?php } ?>
      <th width="10%">Entry</th>
      <th>ผลผลิต</th>
      <th>วันออกดอก</th>
      <th>ความสูง</th>
      <th>รวงต่อกอ</th>
      <th>ระดับน้ำในแปลง</th>
      <th>ใบม้วน</th>
      <th>ใบตาย</th>
      <th>กอหาย</th>
      <th>ต้นต่อกอ</th>
      <th>ต้นที่ไม่ออกรวงต่อกอ</th>
      <th>เมล็ดดีต่อรวง</th>
      <th>เมล็ดลีบต่อรวง</th>
      
    </tr>
  </thead>
  <tbody>
    <?php for($i=0;$i<count($get_data);$i++){ ?>
    <tr>
      <td><?php echo $get_data[$i]['repeat'];?></td> 
      <?php if($get_data[0]['block']!=0){ ?>
      <td><?php echo $get_data[$i]['block']  ;?></td>
      <?php } ?>
      <td><?php echo $get_data[$i]['entry'] ;?></td>
      <td><?php echo number_format($get_data[$i]['gy'] ,2) ;?></td>
      <td><?php echo number_format($get_data[$i]['dtf'] ,2) ;?></td>
      <td><?php echo number_format($get_data[$i]['ht'] ,2) ;?></td>
      <td><?php echo number_format($get_data[$i]['awn_grove'] ,2) ;?></td>
      <td><?php echo number_format($get_data[$i]['water_level'] ,2) ;?></td>
      <td><?php echo number_format($get_data[$i]['roll_leaves'] ,2) ;?></td>
      <td><?php echo number_format($get_data[$i]['dead_leaves'] ,2) ;?></td>
      <td><?php echo number_format($get_data[$i]['lost_grove'] ,2) ;?></td>
      <td><?php echo number_format($get_data[$i]['tree_grove'] ,2) ;?></td>
      <td><?php echo number_format($get_data[$i]['no_grain'] ,2) ;?></td>
      <td><?php echo number_format($get_data[$i]['seed_good'] ,2) ;?></td>
      <td><?php echo number_format($get_data[$i]['seed_grove'] ,2) ;?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
