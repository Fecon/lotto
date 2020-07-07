<?php

header("Content-type: application/vnd.ms-excel");
// header('Content-type: application/csv'); 
header("Content-Disposition: attachment; filename=วันออกดอก.xls");

?>

<div class="row">
<div class="col-xs-12">
<div class="box box-danger">
<div class="box-header">
  <h3 class="box-title">วันออกดอก </h3>
</div>
<!-- /.box-header --><br>
<div class="box-body table-responsive no-padding">
<br>
<div class="nav-tabs-custom">
  
          <div class="tab-content">
            <?php $repeat=0;
					for($repeat_no=1;$repeat_no<=count($pedigree_plot);$repeat_no++){ ?>
            <div class="tab-pane <?php if($repeat_no==1){ echo 'active'; } ?>" id="tab_<?php echo $repeat_no ?>">
              <div class="row">
                <div class="col-xs-12">

                  <table class="table table-hover">
                    <thead class="bg-olive-active">
                      <tr>
                        <th width="10%">แปลง <br />
                          (Plot)</th>
                        <th width="10%">บล๊อก <br />
                          (Block)</th>
                        <th width="10%">เบอร์ <br />
                          (Entry)</th>
                          
        <th><div class="col-md-2">รวงแรก </div></th>
        <th><div class="col-md-2">วันออกดอก 50% </div></th>
        <th><div class="col-md-2">วันออกดอก 75% </div></th>
        <th><div class="col-md-2">จำนวนวันออกดอก </div></th>
        </tr>
        </thead>
                    <tbody>
     <tbody>
                      <?php for($i=0;$i<count($pedigree_plot[$repeat]);$i++){ ?>
                      <tr>
                        <td><?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?></td>
                        <td><?php echo $pedigree_plot[$repeat][$i]['block'] ;?></td>
                        <td><?php echo $pedigree_plot[$repeat][$i]['entry'] ;?></td>
                          
        
        <td>
        <?php echo @$get_data[$repeat][$i]['grain'] ;?>
        </td>
        <td>
        <?php echo @$get_data[$repeat][$i]['bloom50'] ;?>
        </td>
        <td>
        <?php echo @$get_data[$repeat][$i]['bloom75'] ;?>
        </td>
        <td>
        <?php echo @$get_data[$repeat][$i]['day'] ;?>
        </td>

                      </tr>
                      <?php }
					$repeat++;  ?>
                    <tr>
                    <td colspan="7"></td>
                     </tr>
                    </tbody>
                  </table>
                  </div>
              </div>
              <br>
              <br>
            </div>
            <!-- /.tab-pane -->
            <?php } ?>
            <!-- /.tab-pane --> 
            <!-- /.tab-pane --> 
          </div>
          <!-- /.tab-content --> 
        </div>
      </div>
      
      

</div>
</div>
</div>

