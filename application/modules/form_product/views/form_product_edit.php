<?php  echo form_open('form_product/update_data');  ?>

<div class="row">
  <div class="col-xs-12">
    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">ผลผลิต</h3>
      </div>
      <!-- /.box-header --><br>
      <div class="box-body table-responsive no-padding"> <br>
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
                <div class="col-md-2">
                  <div align="center">ผลผลิต <br />
                    (กรัม/แปลงย่อย) </div>
                </div>
                <div class="col-md-1">
                  <div align="center">% ความชื้น </div>
                </div>
                <div class="col-md-2">
                  <div align="center">กรัม/แปลงย่อย <br />
                    ที่ความชื้น 14% </div>
                </div>
                <div class="col-md-2">
                  <div align="center">ผลผลิต<br />
                    (กก./ไร่) </div>
                </div>
                <div class="col-md-2">
                  <div align="center">ผลผลิตหลังปรับกอหาย <br />
                    (กก./ไร่)</div>
                </div>
              </div>
              <br />
              <?php for($i=0;$i<count($pedigree_plot[$repeat]);$i++){ ?>
              <input type="hidden" name="repeatedly[]" value="<?php echo $repeat_no ;?>" >
              <input type="hidden" name="id[]" value="<?php echo $get_data[$repeat][$i]['id'] ;?>" >
              <input name="lost_grove[]" id="lost_grove_<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" type="hidden" value="<?php echo @$get_lost_grove[$repeat][$i]['balance'] ;?>"  />
              <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
                  <div class="form-group">
                    <label>แปลง (Plot) : </label>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-1">
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
                <div class="col-xs-7 col-sm-7 col-md-1">
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
                <div class="col-xs-7 col-sm-7 col-md-1">
                  <div class="form-group">
                    <label><?php echo $pedigree_plot[$repeat][$i]['entry'] ;?> </label>
                    <input type="hidden" name="entry[]" value="<?php echo $pedigree_plot[$repeat][$i]['entry'] ;?>" >
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-1 col-hidden">
                  <div class="form-group">
                    <label>ผลผลิต(กรัม/plot)</label>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-2">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" name="product_gram_plot[]" id="product_gram_plot_<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" step="any" min="0" onchange="calculate(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)" value="<?php echo @$get_data[$repeat][$i]['product_gram_plot'] ;?>">
                    </div>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-1 col-hidden">
                  <div class="form-group">
                    <label>%ความชื้น </label>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-1">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" name="moisture[]" id="moisture_<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" step="any" min="0" onchange="calculate(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)" value="<?php echo @$get_data[$repeat][$i]['moisture'] ;?>">
                    </div>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-1 col-hidden">
                  <div class="form-group">
                    <label>ความชื้น 14% </label>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-2">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" name="moisture_14[]" id="moisture_14_<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" step="any" min="0" readonly="readonly" value="<?php echo @$get_data[$repeat][$i]['moisture_14'] ;?>">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-hidden">
                  <hr>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-1 col-hidden">
                  <div class="form-group">
                    <label>ผลผลิต(กรัม/plot)</label>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-2 col-md-offset-3">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" name="product_gram_plot2[]" id="product_gram_plot2_<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" step="any" min="0" onchange="calculate(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)" value="<?php echo @$get_data[$repeat][$i]['product_gram_plot2'] ;?>">
                    </div>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-1 col-hidden">
                  <div class="form-group">
                    <label>%ความชื้น </label>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-1">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" name="moisture2[]" id="moisture2_<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" step="any" min="0" onchange="calculate(<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>)" value="<?php echo @$get_data[$repeat][$i]['moisture2'] ;?>">
                    </div>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-1 col-hidden">
                  <div class="form-group">
                    <label>ความชื้น 14% </label>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-2">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" name="moisture2_14[]" id="moisture2_14_<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" step="any" min="0" readonly="readonly" value="<?php echo @$get_data[$repeat][$i]['moisture2_14'] ;?>">
                    </div>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-1 col-hidden">
                  <div class="form-group">
                    <label>ผลผลิต(กก./ไร่) </label>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-2">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" name="product_kg_rai[]" id="product_kg_rai_<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" step="any" min="0" readonly="readonly" value="<?php echo @$get_data[$repeat][$i]['product_kg_rai'] ;?>">
                    </div>
                  </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-1 col-hidden">
                  <div class="form-group">
                    <label> ผลผลิตหลังปรับกอหาย (กก./ไร่)</label>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-2">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" name="product_after_kg_rai[]" id="product_after_kg_rai_<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" step="any" min="0" readonly="readonly" value="<?php echo @$get_data[$repeat][$i]['product_after_kg_rai'] ;?>">
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
      </div>
    </div>
  </div>
</div>
<?php $area_harvest = $get_research['length_harvest']; ?>
<script>
		function calculate(x){
			var plot_no = x ;
			var product_gram_plot = 'product_gram_plot_' + plot_no.toString() ;
			var moisture = 'moisture_' + plot_no.toString() ;
			var moisture_14 = 'moisture_14_' + plot_no.toString() ;
			
			var product_gram_plot2 = 'product_gram_plot2_' + plot_no.toString() ;
			var moisture2 = 'moisture2_' + plot_no.toString() ;
			var moisture2_14 = 'moisture2_14_' + plot_no.toString() ;
			
			var product_kg_rai = 'product_kg_rai_' + plot_no.toString() ;
			var product_after_kg_rai = 'product_after_kg_rai_' + plot_no.toString() ;
			var lost_grove = 'lost_grove_' + plot_no.toString() ;

			var calculate1= ((100-(document.getElementById(moisture).value))/86)* (document.getElementById(product_gram_plot).value) ;
			var calculate1_2= ((100-(document.getElementById(moisture2).value))/86)* (document.getElementById(product_gram_plot2).value) ; 
			if(calculate1_2=="" || calculate1_2 ==0){
				var calculate2= ((calculate1*1600)/ <?php echo $area_harvest ?>  ) * (1/1000) ;
			}else{
				var calculate2= ((((calculate1+calculate1_2)/2)*1600)/ <?php echo $area_harvest ?>  ) * (1/1000) ;
			}
			
			var calculate3= (calculate2*<?php echo $get_research['rows_harvest']*$get_research['num_harvest'] ?>)/ (document.getElementById(lost_grove).value) ;
	
			if (calculate1!==calculate1)
				alert('Numbers Only Please!')
				document.getElementById(moisture_14).value = calculate1.toFixed(2);
				document.getElementById(moisture2_14).value = calculate1_2.toFixed(2);
				document.getElementById(product_kg_rai).value = calculate2.toFixed(2);
				document.getElementById(product_after_kg_rai).value = calculate3.toFixed(2);
			
		
		}
		</script> 
