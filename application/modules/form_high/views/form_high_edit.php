<?php  echo form_open('form_high/update_data');  ?>

<div class="row">
  <div class="col-xs-12">
    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">ความสูง</h3>
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
                <div class="col-md-5" align="center">กอที่ </div>
                <div class="col-md-1">ค่าเฉลี่ย (Average) </div>
              </div>
              <br />
              <?php for($i=0;$i<count($pedigree_plot[$repeat]);$i++){ ?>
              <input type="hidden" name="repeatedly[]" value="<?php echo $repeat_no ;?>" >
              <input type="hidden" name="id[]" value="<?php echo $get_data[$repeat][$i]['id'] ;?>" >
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
                    <label><?php echo $pedigree_plot[$repeat][$i]['block'] ;?> </label>
                    <input type="hidden" name="block[]" value="<?php echo $pedigree_plot[$repeat][$i]['block'] ;?>" >
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
                      <input type="number" class="form-control" step="any" onchange="averageBoxes(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)" id="no_1<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="no_1[]" value="<?php echo $get_data[$repeat][$i]['no_1'] ;?>" placeholder="1" data-toggle="tooltip" data-placement="left" title="1" >
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
                      <input type="number" class="form-control" step="any" onchange="averageBoxes(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)" id="no_2<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="no_2[]" value="<?php echo $get_data[$repeat][$i]['no_2'] ;?>" placeholder="2"  data-toggle="tooltip" data-placement="left" title="2" >
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
                      <input type="number" class="form-control" step="any" onchange="averageBoxes(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)" id="no_3<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="no_3[]" value="<?php echo $get_data[$repeat][$i]['no_3'] ;?>" placeholder="3" >
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
                      <input type="number" class="form-control" step="any" onchange="averageBoxes(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)" id="no_4<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="no_4[]" value="<?php echo $get_data[$repeat][$i]['no_4'] ;?>" placeholder="4" >
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
                      <input type="number" class="form-control" step="any" onchange="averageBoxes(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)" id="no_5<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="no_5[]" value="<?php echo $get_data[$repeat][$i]['no_5'] ;?>" placeholder="5" >
                    </div>
                  </div>
                </div>
                </div>
                <div class="row">
                 <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>6 : </label>
                  </div>
                </div>
                
                <div class="col-xs-7 col-sm-7 col-md-1 col-md-offset-3">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" step="any" onchange="averageBoxes(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)" 
                      id="no_6<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="no_6[]" value="<?php echo $get_data[$repeat][$i]['no_6'] ;?>" placeholder="6" >
                    </div>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>7 : </label>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-1">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" step="any" onchange="averageBoxes(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)" 
                      id="no_7<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="no_7[]" value="<?php echo $get_data[$repeat][$i]['no_7'] ;?>" placeholder="7" >
                    </div>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>8 : </label>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-1">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" step="any" onchange="averageBoxes(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)" 
                      id="no_8<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="no_8[]" value="<?php echo $get_data[$repeat][$i]['no_8'] ;?>" placeholder="8" >
                    </div>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>9 : </label>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-1">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" step="any" onchange="averageBoxes(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)" 
                      id="no_9<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="no_9[]" value="<?php echo $get_data[$repeat][$i]['no_9'] ;?>" placeholder="9" >
                    </div>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>10 : </label>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-1">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" step="any" onchange="averageBoxes(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)" 
                      id="no_10<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="no_10[]" value="<?php echo $get_data[$repeat][$i]['no_10'] ;?>" placeholder="10" >
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
                      <input type="number" class="form-control" step="any" readonly="readonly" id="average<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="average[]" value="<?php echo $get_data[$repeat][$i]['average'] ;?>" >
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
			var count = 0 ;
			var num1 = 'no_1' + plot_no.toString() ;
			var num2 = 'no_2' + plot_no.toString() ;
			var num3 = 'no_3' + plot_no.toString() ;
			var num4 = 'no_4' + plot_no.toString() ;
			var num5 = 'no_5' + plot_no.toString() ;
			var num6 = 'no_6' + plot_no.toString() ;
			var num7 = 'no_7' + plot_no.toString() ;
			var num8 = 'no_8' + plot_no.toString() ;
			var num9 = 'no_9' + plot_no.toString() ;
			var num10 = 'no_10' + plot_no.toString() ;
			var average = 'average' + plot_no.toString() ;

			var num = [document.getElementById(num1).value , document.getElementById(num2).value , document.getElementById(num3).value , document.getElementById(num4).value , document.getElementById(num5).value , document.getElementById(num6).value , document.getElementById(num7).value , document.getElementById(num8).value , document.getElementById(num9).value , document.getElementById(num10).value ] ;
			
			for (i = 0; i < 10; i++) { 
				if(num[i]==''||num[i]==0){
					count=count;
				}else{
					count++;
				}
			}
	
			var avg=(Math.abs(document.getElementById(num1).value)+Math.abs(document.getElementById(num2).value)+Math.abs(document.getElementById(num3).value)+Math.abs(document.getElementById(num4).value)+Math.abs(document.getElementById(num5).value)+Math.abs(document.getElementById(num6).value)+Math.abs(document.getElementById(num7).value)+Math.abs(document.getElementById(num8).value)+Math.abs(document.getElementById(num9).value)+Math.abs(document.getElementById(num10).value))/count
		if (avg!==avg)
		alert('กรุณากรอกค่าที่ถูกต้อง!')
		document.getElementById(average).value = avg.toFixed(2);
		}
		</script> 
        <script type="text/javascript">
			$(function () {
				$("[rel='tooltip']").tooltip();
			});
		</script>
      </div>
    </div>
  </div>
</div>
