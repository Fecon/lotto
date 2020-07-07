<?php

header("Content-type: application/vnd.ms-excel");
// header('Content-type: application/csv'); 
header("Content-Disposition: attachment; filename=ศัตรูพืช.xls");

?>
<div class="row">
<div class="col-xs-12">
<div class="box box-danger">
<div class="box-header">
  <h3 class="box-title">ศัตรูพืช</h3>
</div>
<!-- /.box-header --><br>

            <?php $repeat=0;
					for($repeat_no=1;$repeat_no<=count($pedigree_plot);$repeat_no++){ ?>
ซ้ำที่ <?php echo $repeat_no ;?>

                  <table class="table table-hover" border="1" >
                    <thead class="bg-olive-active">
                      <tr>
                        <th width="10%">แปลง <br />
                          (Plot)</th>
                        <th width="10%">บล๊อก <br />
                          (Block)</th>
                        <th width="10%">เบอร์ <br />
                          (Entry)</th>
                        	<th>โรค ( % )</th>
       
                          <th>แมลง  ( % )</th>
        
                          <th>สัตว์  ( % )</th>

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
                        <td>
                        <table width="100%" border="1">
                        <?php foreach($get_data[$repeat][$i]['disease_data'] as $key => $disease_data ){ ?>
                        <tr>
                        <td width="50%">
                        <?php echo $disease_data['disease_name'] ?>
                        </td>
                        <td width="50%">
                        <?php echo $disease_data['value_disease'] ?>
                        </td>
                        </tr>
                        <?php } ?>
                        </table>
                        </td>
                        <td>
                        <table width="100%" border="1">
                        <?php foreach($get_data[$repeat][$i]['insect_data'] as $key => $insect_data ){ ?>
                        <tr>
                        <td width="50%">
                        <?php echo $insect_data['insect_name'] ?>
                        </td>
                        <td width="50%">
                        <?php echo $insect_data['value_insect'] ?>
                        </td>
                        </tr>
                        <?php } ?>
                        </table>
                        </td>
                          <td>
                          <table width="100%" border="1">
                        <?php foreach($get_data[$repeat][$i]['animal_data'] as $key => $animal_data ){ ?>
                        <tr>
                        <td width="50%">
                        <?php echo $animal_data['animal_name'] ?>
                        </td>
                        <td width="50%">
                        <?php echo $animal_data['value_animal'] ?>
                        </td>
                        </tr>
                        <?php } ?>
                        </table>
                        </td>

                      </tr>
                      <?php }
					$repeat++;  ?>
                    </tbody>
                  </table>

            <!-- /.tab-pane -->
            <?php } ?>


</div>
</div>
</div>
