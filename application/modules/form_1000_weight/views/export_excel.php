<?php
header("Content-type: application/vnd.ms-excel");
// header('Content-type: application/csv'); 
header("Content-Disposition: attachment; filename=น้ำหนัก 1000 เมล็ด.xls");
?>

<div class="row">
  <div class="col-xs-12">
    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">น้ำหนัก 1000 เมล็ด</h3>
      </div>
      <!-- /.box-header --><br>
      <table border="1">
        <thead class="bg-olive-active">
          <tr>
            <th>Designation</th>
            <th> 1</th>
            <th> 2</th>
            <th> 3</th>
            <th> 4</th>
            <th> 5</th>
            <th> ค่าเฉลี่ย</th>
          </tr>
        </thead>
        <tbody>
          <?php for($i=0;$i<count($pedigree_selected);$i++){ ?>
          <tr>
            <td><label><?php echo $pedigree_selected[$i]['designation'] ;?> </label></td>
            <td><?php echo @$get_data[$i]['no_1'] ?></td>
            <td><?php echo @$get_data[$i]['no_2'] ;?></td>
            <td><?php echo @$get_data[$i]['no_3'] ;?></td>
            <td><?php echo @$get_data[$i]['no_4'] ;?></td>
            <td><?php echo @$get_data[$i]['no_5'] ;?></td>
            <td><?php echo @$get_data[$i]['average'] ;?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
