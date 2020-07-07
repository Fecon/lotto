<?php
header("Content-type: application/vnd.ms-excel");
// header('Content-type: application/csv'); 
header("Content-Disposition: attachment; filename=คุณภาพเมล็ดทางเคมี.xls");
?>
<style>
td{
	text-align:center;
}
</style>
<div class="row">
  <div class="col-xs-12">
    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">คุณภาพเมล็ดทางเคมี </h3>
      </div>
      <div class="box-body table-responsive"><br>
        <table border="1">
          <thead>
          <th>#</th>
            <th>Designation</th>
            <th>ศูนย์วิจัย</th>
            <th>Amylose(%)</th>
            <th>Alkali 1.4%</th>
            <th>Alkali 1.7%</th>
            <th>Aroma </th>
            <th>Chaliness</th>
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
              <td><?php echo $get_data[$i]['amylose'] ;?></td>
              <td><?php echo $get_data[$i]['alkali_14'] ;?></td>
              <td><?php echo $get_data[$i]['alkali_17'] ;?></td>
              <td><?php echo $get_data[$i]['chaliness'] ;?></td>
              <td><?php if($get_data[$i]['aroma']==1){
								echo '+' ; 
						}elseif($get_data[$i]['aroma']==0){
								echo '-';
						} ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
