<?php  echo form_open('form_1000_weight/update_data');  ?>

<div class="row">
  <div class="col-xs-12">
    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">น้ำหนัก 1000 เมล็ด</h3>
      </div>
      <!-- /.box-header --><br>
      <div class="box-body table-responsive"><br>
        <div class="row">
          <div class="col-xs-12">
            <div class="row row-hidden bg-olive-active">
              <div class="col-md-1"># </div>
              <div class="col-md-3" align="center">Designation </div>
              <div class="col-md-1">1 </div>
              <div class="col-md-1">2 </div>
              <div class="col-md-1">3 </div>
              <div class="col-md-1">4 </div>
              <div class="col-md-1">5 </div>
              <div class="col-md-2"> ค่าเฉลี่ย (Average) </div>
            </div>
            <br />
            <?php for($i=0;$i<count($pedigree_selected);$i++){ ?>
            <div class="row">
            	<div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                <div class="form-group">
                  <label>ลำดับที่ </label>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-1">
                <div class="form-group">
                  <label><?php echo $i+1 ;?> </label>
                </div>
              </div>
              
              <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                <div class="form-group">
                  <label>Designation : </label>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-3">
                <div class="form-group">
                  <label><?php echo $pedigree_selected[$i]['designation'] ;?> </label>
                  <input type="hidden" name="id[]" value="<?php echo $get_data[$i]['id'] ;?>">
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
                    <input type="number" class="form-control" step="any" min="0"  onchange="averageBoxes(<?php echo $pedigree_selected[$i]['rp_id'] ;?>)" id="no_1<?php echo $pedigree_selected[$i]['rp_id'] ;?>" name="no_1[]" value="<?php echo $get_data[$i]['no_1'] ?>" >
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
                    <input type="number" class="form-control" step="any" min="0" onchange="averageBoxes(<?php echo $pedigree_selected[$i]['rp_id'] ;?>)" id="no_2<?php echo $pedigree_selected[$i]['rp_id'] ;?>" name="no_2[]" value="<?php echo $get_data[$i]['no_2'] ?>" >
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
                    <input type="number" class="form-control" step="any" min="0" onchange="averageBoxes(<?php echo $pedigree_selected[$i]['rp_id'] ;?>)" id="no_3<?php echo $pedigree_selected[$i]['rp_id'] ;?>" name="no_3[]" value="<?php echo $get_data[$i]['no_3'] ?>" >
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
                    <input type="number" class="form-control" step="any" min="0" onchange="averageBoxes(<?php echo $pedigree_selected[$i]['rp_id'] ;?>)" id="no_4<?php echo $pedigree_selected[$i]['rp_id'] ;?>" name="no_4[]" value="<?php echo $get_data[$i]['no_4'] ?>" >
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
                    <input type="number" class="form-control" step="any" min="0" onchange="averageBoxes(<?php echo $pedigree_selected[$i]['rp_id'] ;?>)" id="no_5<?php echo $pedigree_selected[$i]['rp_id'] ;?>" name="no_5[]" value="<?php echo $get_data[$i]['no_5'] ?>" >
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
                    <input type="number" class="form-control" step="any" min="0" readonly="readonly" id="average<?php echo $pedigree_selected[$i]['rp_id'] ;?>" name="average[]" value="<?php echo $get_data[$i]['average'] ?>" >
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-hidden">
                <hr>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
		function averageBoxes(x){
			var rp_id = x ;
			var num1 = 'no_1' + rp_id.toString() ;
			var num2 = 'no_2' + rp_id.toString() ;
			var num3 = 'no_3' + rp_id.toString() ;
			var num4 = 'no_4' + rp_id.toString() ;
			var num5 = 'no_5' + rp_id.toString() ;
			var average = 'average' + rp_id.toString() ;
			var avg=(Math.abs(document.getElementById(num1).value)+Math.abs(document.getElementById(num2).value)+Math.abs(document.getElementById(num3).value)+Math.abs(document.getElementById(num4).value)+Math.abs(document.getElementById(num5).value))/5
		if (avg!==avg)
		alert('Numbers Only Please!')
		document.getElementById(average).value = avg.toFixed(2);
		}
		</script>