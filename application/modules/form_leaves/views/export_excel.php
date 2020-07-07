<?php

header("Content-type: application/vnd.ms-excel");
// header('Content-type: application/csv'); 
header("Content-Disposition: attachment; filename=ใบม้วน ใบตาย.xls");

?>

<div class="row">
<div class="col-xs-12">
  <div class="box box-danger">
    <div class="box-header">
      <h3 class="box-title">ใบม้วน ใบตาย  &nbsp;&nbsp; ครั้งที่ <?php echo $term ?></h3>
    </div>
    <!-- /.box-header --><br>

          <?php $repeat=0;
					for($repeat_no=1;$repeat_no<=count($pedigree_plot);$repeat_no++){ ?>

ซ้ำที่ <?php echo $repeat_no ;?>
                <table class="table table-hover" border="1">
                  <thead class="bg-olive-active">
                    <tr>
                      <th width="10%">แปลง <br />
                        (Plot) </th>
                      <th width="10%">บล๊อก <br />
                        (Block)</th>
                      <th width="10%">เบอร์ <br />
                        (Entry)</th>
                      <th align="center">ใบม้วน </th>
                      <th align="center">ใบตาย</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for($i=0;$i<count($pedigree_plot[$repeat]);$i++){ ?>
                    <tr>
                      <td><?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>
                        <input type="hidden" name="plot_no[]" value="<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" ></td>
                      <td><?php echo $pedigree_plot[$repeat][$i]['block'] ;?>
                        <input type="hidden" name="block[]" value="<?php echo $pedigree_plot[$repeat][$i]['block'] ;?>" ></td>
                      <td><?php echo $pedigree_plot[$repeat][$i]['entry'] ;?>
                        <input type="hidden" name="entry[]" value="<?php echo $pedigree_plot[$repeat][$i]['entry'] ;?>" ></td>
                      <td><div class="row">
                          <div class="col-md-7 col-xs-12">
                            <?php echo $get_data[$repeat][$i]['dead_leaves'] ;?>
                          </div>
                        </div></td>
                      <td><div class="row">
                          <div class="col-md-7 col-xs-12">
                            <?php echo $get_data[$repeat][$i]['roll_leaves'] ;?>
                          </div>
                        </div></td>
                    </tr>
                    <?php }
					$repeat++;  ?>
                  </tbody>
                </table>

            <br>
            <br>

          <!-- /.tab-pane -->
          <?php } ?>

  </div>
</div>
