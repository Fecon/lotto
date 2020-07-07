<?php

header("Content-type: application/vnd.ms-excel");
// header('Content-type: application/csv'); 
header("Content-Disposition: attachment; filename=ผลผลิต.xls");

?>
<div class="row">
<div class="col-xs-12">
<div class="box box-danger">
<div class="box-header">
  <h3 class="box-title">ผลผลิต</h3>
</div>
<!-- /.box-header --><br>
<div class="box-body table-responsive no-padding"><br>
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
                        <th> <div class="row" align="center">
                            <div class="col-md-2 col-sm-4 col-xs-4 ">ผลผลิต (กรัม/แปลงย่อย)</div>
                          </div></th>
                          <th> <div class="row" align="center">
                            <div class="col-md-2 col-md-offset-2  col-sm-4 col-xs-4">% ความชื้น</div>
                          </div></th>
                          <th> <div class="row" align="center">
                            <div class="col-md-2 col-md-offset-2  col-sm-4 col-xs-4">กรัม/แปลงย่อย ที่ความชื้น 14%</div>
                          </div></th>
                          <th> <div class="row" align="center">
                            <div class="col-md-2 col-md-offset-2  col-sm-4 col-xs-4">ผลผลิต(กก./ไร่)</div>
                          </div></th>
                          <th> <div class="row" align="center">
                            <div class="col-md-2 col-md-offset-2  col-sm-4 col-xs-4">ผลผลิตหลังปรับกอหาย (กก./ไร่)</div>
                          </div></th>
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
                              <?php echo $get_data[$repeat][$i]['product_gram_plot'] ;?>
                            </div>
                          </div></td>
                        <td><div class="row">
                            <div class="col-md-7 col-xs-12">
                              <?php echo @$get_data[$repeat][$i]['moisture'] ;?>
                            </div>
                          </div></td>
                          <td><div class="row">
                            <div class="col-md-7 col-xs-12">
                              <?php echo @$get_data[$repeat][$i]['moisture_14'] ;?>
                            </div>
                          </div></td>
                        <td><div class="row">
                            <div class="col-md-7 col-xs-12">
                              <?php echo @$get_data[$repeat][$i]['product_kg_rai'] ;?>
                            </div>
                          </div></td>
                          <td><div class="row">
                            <div class="col-md-7 col-xs-12">
                              <?php echo @$get_data[$repeat][$i]['product_after_kg_rai'] ;?>
                            </div>
                          </div></td>

                      </tr>
                      <?php }
					$repeat++;  ?>
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

