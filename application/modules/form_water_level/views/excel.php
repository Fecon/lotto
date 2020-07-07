<?php $repeat=0;
					for($repeat_no=1;$repeat_no<=count($pedigree_plot);$repeat_no++){ ?>
                 ซ้ำที่ <?php echo $repeat_no ;?>
                  <table class="table table-hover">
                  <thead>
                    <tr>
                      <th width="10%">แปลง <br />(Plot)</th>
                      <th width="10%">บล๊อก <br />(Block)</th>
                      <th width="10%">เบอร์ <br />(Entry)</th>
                      <th>ครั้งที่ 1 : <?php echo date('d/m/Y') ?></th>
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
                            <div class="col-xs-7"><input type="number" name="water_level[]" class="form-control"  value="<?php echo @$water_level[$repeat][$i]['value'] ;?>">
                          </div>
                          <input type="hidden" name="id[]" value="<?php echo $water_level[$repeat][$i]['id'] ;?>" >
                          <input type="hidden" name="repeat[]" value="<?php echo $repeat_no ;?>" >
                      </td>
                    </tr>
                    <?php }
					$repeat++;  ?>
                    
                    </tbody>
                  </table>
                   <br><br>
                  <?php } ?>