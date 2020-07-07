<?php

header("Content-type: application/vnd.ms-excel");
// header('Content-type: application/csv'); 
header("Content-Disposition: attachment; filename=ระดับน้ำในแปลง ครั้งที่ ".$term.".xls");

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ระดับน้ำในแปลง </title>
</head>

<body>
<?php echo $get_research['research_name'] ?>
<br>
แบบบันทึกระดับน้ำในแปลง ครั้งที่ <?php echo $term ?> : <?php echo $date_time ?><br>
<br>

<?php $repeat=0;
					for($repeat_no=1;$repeat_no<=count($pedigree_plot);$repeat_no++){ ?>
                 ซ้ำที่ <?php echo $repeat_no ;?>
                  <table class="table table-hover" border="1">
                  <thead>
                    <tr>
                      <th width="10%">แปลง <br />(Plot)</th>
                      <th width="10%">บล๊อก <br />(Block)</th>
                      <th width="10%">เบอร์ <br />(Entry)</th>
                      <th> ครั้งที่ <?php echo $term ?> : <?php echo $date_time ?></th>
                    </tr>
                   </thead>
                   <tbody>
                   <?php for($i=0;$i<count($pedigree_plot[$repeat]);$i++){ ?>
                    <tr>
                      <td><?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?></td>
                      <td><?php echo $pedigree_plot[$repeat][$i]['block'] ;?></td>
                      <td><?php echo $pedigree_plot[$repeat][$i]['entry'] ;?></td>
                      <td><?php echo @$water_level[$repeat][$i]['value'] ;?></td>
                    </tr>
                    <?php }
					$repeat++;  ?>
                    
                    </tbody>
                  </table>
                   <br><br>
                  <?php } ?>
</body>
</html>
