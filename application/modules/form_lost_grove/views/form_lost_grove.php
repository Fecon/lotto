<?php  echo form_open('form_lost_grove/insert_data');  ?>

<div class="row">
  <div class="col-xs-12">
    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">กอหาย</h3>
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
                          (Plot)</th>
                        <th width="10%">บล๊อก <br />
                          (Block)</th>
                        <th width="10%">เบอร์ <br />
                          (Entry)</th>
                        <th colspan="3"> <div class="row" align="center">
                            <div class="col-md-2 col-sm-4 col-xs-4 ">หลังปักดำ</div>
                            <div class="col-md-2 col-md-offset-2  col-sm-4 col-xs-4">แตกกอถึงออกดอก</div>
                            <div class="col-md-2 col-md-offset-2  col-sm-4 col-xs-4">คงเหลือ</div>
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
                              <input type="number" name="lost_grove[]" onchange="diffBoxes(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)"  min="0" id="lost_grove<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" value="0" class="form-control">
                            </div>
                          </div></td>
                        <td><div class="row">
                            <div class="col-md-7 col-xs-12">
                              <input type="number" name="mixed_breed[]" onchange="diffBoxes(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)"  min="0" id="mixed_breed<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" value="0" class="form-control">
                            </div>
                          </div></td>
                        <td><div class="row">
                            <div class="col-md-7 col-xs-12">
                              <input type="number" name="balance[]" value="<?php echo $get_research['rows_harvest']*$get_research['num_harvest'] ?>" id="balance<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" class="form-control">
                            </div>
                            <input type="hidden" name="repeatedly[]" value="<?php echo $repeat_no ;?>" >
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
<script>
		function diffBoxes(x){
			var plot_no = x ;
			var lost_grove = 'lost_grove' + plot_no.toString() ;
			var mixed_breed = 'mixed_breed' + plot_no.toString() ;
			var balance = 'balance' + plot_no.toString() ;
			var diff = <?php echo $get_research['rows_harvest']*$get_research['num_harvest'] ?> - (Math.abs(document.getElementById(lost_grove).value)+Math.abs(document.getElementById(mixed_breed).value))
		if (diff!==diff)
		alert('Numbers Only Please!')
		document.getElementById(balance).value = diff;
		}
		</script>