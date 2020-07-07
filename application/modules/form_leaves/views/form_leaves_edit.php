<?php  echo form_open('form_leaves/update_data');  ?>
<input type="hidden" name="keep_time_id" value="<?php echo $keep_time_id ;?>" >
<div class="row">
  <div class="col-xs-12">
  
    <div class="box box-danger">
    <div class="row">
    <div class="col-xs-12 col-md-7">
      <div class="box-header">
        <h3 class="box-title">ใบม้วน ใบตาย  &nbsp;&nbsp; ครั้งที่ <?php echo $term ?></h3><br />
			
      </div>
      </div>
      <div class="col-xs-12 col-md-2">
      <div class="box-header" align="right">
      <h5>วันที่ตรวจสอบ:</h5>
                </div>
                  <!-- /.box-tools -->
                </div>
      <div class="col-xs-12 col-md-3">
      <div class="box-header with-border">
                  <input type="date" name="keep_date" id="keep_date" class="form-control" value="<?php echo $get_time[0]['keep_date'] ?>">
                  <!-- /.box-tools -->
                </div>
                  <!-- /.box-tools -->
                </div>
                </div>
                
                

              
      <!-- /.box-header --><br>
      <div class="box-body table-responsive no-padding"><br>
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <?php for($repeat_no=1;$repeat_no<=count($pedigree_plot);$repeat_no++){ ?>
            <li <?php if($repeat_no==1){ echo 'class="active"'; } ?>><a href="#tab_<?php echo $repeat_no ?>" data-toggle="tab">ซ้ำที่ <?php echo $repeat_no ?></a></li>
            <?php } ?>
          </ul>
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
                          (Plot) </th>
                        <th width="10%">บล๊อก <br />
                          (Block)</th>
                        <th width="10%">เบอร์ <br />
                          (Entry)</th>
                        <th colspan="2"><div class="row" align="center">
                            <div class="col-md-12">ครั้งที่ 1 วันที่ <?php echo date('d/m/Y')?></div>
                          </div>
                          <div class="row" align="center">
                            <div class="col-md-3 col-sm-5 col-xs-5 ">ใบม้วน</div>
                            <div class="col-md-3 col-md-offset-3  col-sm-5 col-xs-5">ใบตาย</div>
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
                              <input type="number" name="dead_leaves[]" class="form-control" value="<?php echo $get_data[$repeat][$i]['dead_leaves'] ;?>">
                            </div>
                          </div></td>
                        <td><div class="row">
                            <div class="col-md-7 col-xs-12">
                              <input type="number" name="roll_leaves[]" class="form-control" value="<?php echo $get_data[$repeat][$i]['roll_leaves'] ;?>">
                            </div>
                            <input type="hidden" name="repeatedly[]" value="<?php echo $repeat_no ;?>" >
                            <input type="hidden" name="id[]" value="<?php echo $get_data[$repeat][$i]['id'] ;?>" >
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
      <!-- /.box-body --> 
    </div>
    <!-- /.box --> 
  </div>
</div>
<!-- /.box -->