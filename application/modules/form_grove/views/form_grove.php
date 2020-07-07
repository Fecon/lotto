<?php  echo form_open('form_grove/insert_data');  ?>

<div class="row">
  <div class="col-xs-12">
    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">แตกกอ</h3>
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
              <div class="row row-hidden bg-olive-active">
                <div class="col-md-1">แปลง (Plot) </div>
                <div class="col-md-1">ผังแปลง (Block) </div>
                <div class="col-md-1">เบอร์ (Entry) </div>
                <div class="col-md-1">1 </div>
                <div class="col-md-1">2 </div>
                <div class="col-md-1">3 </div>
                <div class="col-md-1">4 </div>
                <div class="col-md-1">5 </div>
                <div class="col-md-2"> ค่าเฉลี่ย (Average) </div>
              </div>
              <br />
              <?php for($i=0;$i<count($pedigree_plot[$repeat]);$i++){ ?>
              <input type="hidden" name="repeatedly[]" value="<?php echo $repeat_no ;?>" >
              <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>แปลง (Plot) : </label>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-1">
                  <div class="form-group">
                    <label><?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?> </label>
                    <input name="plot_no[]" id="plot_no" type="hidden" value="<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>"  />
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>ผังแปลง(Block) : </label>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-1">
                  <div class="form-group">
                    <div align="center">
                      <label><?php echo $pedigree_plot[$repeat][$i]['block'] ;?> </label>
                      <input type="hidden" name="block[]" value="<?php echo $pedigree_plot[$repeat][$i]['block'] ;?>" >
                    </div>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>เบอร์ (Entry) : </label>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-1">
                  <div class="form-group">
                    <label><?php echo $pedigree_plot[$repeat][$i]['entry'] ;?> </label>
                    <input type="hidden" name="entry[]" value="<?php echo $pedigree_plot[$repeat][$i]['entry'] ;?>" >
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>1 : </label>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-1">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" step="any" min="0"  onchange="averageBoxes(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)" id="no_1<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="no_1[]">
                    </div>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>2 : </label>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-1">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" step="any" min="0" onchange="averageBoxes(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)" id="no_2<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="no_2[]">
                    </div>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>3 : </label>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-1">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" step="any" min="0" onchange="averageBoxes(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)" id="no_3<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="no_3[]">
                    </div>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>4 : </label>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-1">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" step="any" min="0" onchange="averageBoxes(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)" id="no_4<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="no_4[]">
                    </div>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>5 : </label>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-1">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" step="any" min="0" onchange="averageBoxes(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)" id="no_5<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="no_5[]">
                    </div>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>ค่าเฉลี่ย (Average) : </label>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-2">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" step="any" min="0" readonly="readonly" id="average<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="average[]">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-hidden">
                  <hr>
                </div>
              </div>
              <?php } ?>
            </div>
            <!-- /.tab-pane -->
            <?php $repeat++; } ?>
          </div>
          <!-- /.tab-content --> 
        </div>
        <script>
		function averageBoxes(x){
			var plot_no = x ;
			var num1 = 'no_1' + plot_no.toString() ;
			var num2 = 'no_2' + plot_no.toString() ;
			var num3 = 'no_3' + plot_no.toString() ;
			var num4 = 'no_4' + plot_no.toString() ;
			var num5 = 'no_5' + plot_no.toString() ;
			var average = 'average' + plot_no.toString() ;
			var avg=(Math.abs(document.getElementById(num1).value)+Math.abs(document.getElementById(num2).value)+Math.abs(document.getElementById(num3).value)+Math.abs(document.getElementById(num4).value)+Math.abs(document.getElementById(num5).value))/5
		if (avg!==avg)
		alert('Numbers Only Please!')
		document.getElementById(average).value = avg.toFixed(2);
		}
		</script> 
      </div>
    </div>
  </div>
</div>
