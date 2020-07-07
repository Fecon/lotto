<?php
header("Content-type: application/vnd.ms-excel");
// header('Content-type: application/csv'); 
header("Content-Disposition: attachment; filename=คุณภาพเมล็ดทางกายภาพ.xls");
?>

<div class="row">
  <div class="col-xs-12">
    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">คุณภาพเมล็ดทางกายภาพ </h3>
      </div>
      <div class="box-body table-responsive"><br>
        <table border="1">
          <thead>
          <th>#</th>
            <th>Designation</th>
            <th>ศูนย์วิจัย</th>
            <th>สีเปลือกข้าว <br />(Hull color)</th>
            <th>ข้าวปน <br />(Off type)</th>
            <th>Width <br />(mm.)</th>
            <th>Length<br /> (mm.) </th>
            <th>Shape <br />(mm.)</th>
              </thead>
          <tbody>
            <?php $no=1 ;for($i=0;$i<count($get_data);$i++){ ?>
            <tr>
              <td><?php if(isset($get_data[$i-1])){
							if($get_data[$i]['pedigree_id'] != $get_data[$i-1]['pedigree_id']){ 
								echo $no ;
								$no++;
							}
					  	}
					  	if($i==0){ echo  $no; $no++; }?></td>
              <td><?php if(isset($get_data[$i-1])){
							if($get_data[$i]['pedigree_id'] != $get_data[$i-1]['pedigree_id']){
								echo $get_data[$i]['designation'] ;
							}
					  	}
					  if($i==0){ echo  "<label>".$get_data[$i]['designation']." </label>"; }?></td>
              <td><?php echo $get_data[$i]['dep_no'] ; ?></td>
              <td><?php echo $get_data[$i]['hull_color'] ;?></td>
              <td><?php echo $get_data[$i]['off_type'] ;?></td>
              <td><?php echo $get_data[$i]['width'] ;?></td>
              <td><?php echo $get_data[$i]['length'] ;?></td>
              <td><?php echo $get_data[$i]['shape'] ;?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
