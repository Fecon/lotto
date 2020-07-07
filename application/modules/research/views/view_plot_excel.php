<?php

header("Content-type: application/vnd.ms-excel");
// header('Content-type: application/csv'); 
header("Content-Disposition: attachment; filename=แผนผังสุ่ม.xls");

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<h3>แผนผังสุ่ม</h3>
<table>
  <tr>
    <?php for($repeat=0;$repeat<count($pedigree_plot);$repeat++){ ?>
    <td><table border="1">
        <thead>
          <tr>
            <th>plot_no</th>
            <th>block</th>
            <th>entry</th>
          </tr>
        </thead>
        <tbody>
          <?php for($i=0;$i<count($pedigree_plot[$repeat]);$i++){ ?>
          <tr>
            <td><?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?></td>
            <td><?php echo $pedigree_plot[$repeat][$i]['block'] ;?></td>
            <td><?php echo $pedigree_plot[$repeat][$i]['entry'] ;?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table></td>
    <td>&nbsp;</td>
    <?php } ?>
  </tr>
</table>
</body>
</html>
