<style>
a.tooltips {
	position: relative;
	display: inline;
}
a.tooltips span {
	position: absolute;
	width: 260px;
	color: #FFFFFF;
	background: #000000;
	height: 30px;
	line-height: 30px;
	text-align: center;
	visibility: hidden;
	border-radius: 6px;
}
a.tooltips span:after {
	content: '';
	position: absolute;
	top: 100%;
	left: 50%;
	margin-left: -8px;
	width: 0;
	height: 0;
	border-top: 8px solid #000000;
	border-right: 8px solid transparent;
	border-left: 8px solid transparent;
}
a:hover.tooltips span {
	font-size: 14px;
	visibility: visible;
	opacity: 1;
	bottom: 65px;
	left: 50%;
	margin-left: -130px;
	z-index: 999;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> การสุ่มEntry </h1>
    <ol class="breadcrumb">
    </ol>
  </section>
  <br>
  
  <!-- Main content -->
  <section class="content"> 
    <!-- Default box -->
    <div class="row">
      <div class="col-md-12"> 
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">สรุปแผนผังสุ่ม</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body"> <?php echo form_open('research/research_ctrl/update_research_pedigree_plot_once') ?>
            <h3 class="box-title text-center"> 
              <!--<a  href="<?php echo site_url('research') ?>" ><button class="btn btn-success btn-lg"><i class="fa fa-check"></i> ยืนยันการสร้างการทดลอง </button></a>-->
              <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-check"></i> ยืนยันผังการทดลอง </button>
              <br />
              <br />
            </h3>
            <div class="row">
              <?php for($repeat=0;$repeat<count($pedigree_plot);$repeat++){ ?>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <?php for($i=0;$i<count($pedigree_plot[$repeat]);$i++){ ?>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="info-box"> <span class="info-box-icon 
								<?php 
								if($research_detail['block_amount']!=0){
									$block_amount = $research_detail['block_amount'] ;
								}else{
									$block_amount = 1 ;
								}
								$chk = $i % ($block_amount*2) ;
									if ($repeat % 2 == 0) {
										if ($chk==0 || $chk<$block_amount) {
									  		echo "bg-green" ;
										}else{
											echo "bg-olive" ;
										}
										
									}else{
										if ($chk==0 || $chk<$block_amount) {
									  		echo "bg-blue" ;
										}else{
											echo "bg-light-blue";
										}	
									}
								?>
                                " style="font-size:2.5em;"> <a class="tooltips" href="#" style="color:#FFF;"><?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?> <span><?php echo $pedigree_plot[$repeat][$i]['designation'] ;?></span></a> </span>
                      <div class="info-box-content">
                        <table class="table table-bordered table-hover table-striped">
                          <thead>
                            <tr>
                              <td><div align="center">Block</div></td>
                              <td ><div align="center">Entry</div></td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td align="center"><?php echo $pedigree_plot[$repeat][$i]['block'] ;?></td>
                              <td align="center" ><input type="hidden" name="plot_no[]"  value="<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" >
                                <input type="hidden" name="block[]"  value="<?php echo $pedigree_plot[$repeat][$i]['block'] ;?>" >
                                <input type="number" class="form-control" name="entry[]"  value="<?php echo $pedigree_plot[$repeat][$i]['entry'] ;?>" min="1" max="<?php echo $research_detail['pedigree_amount'] ?>"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.info-box-content --> 
                    </div>
                    <!-- /.info-box --> 
                  </div>
                </div>
                <?php } ?>
              </div>
              <!-- /.col -->
              <?php } ?>
            </div>
          </div>
          <!-- /.box-body --> 
          <?php echo form_close(); ?>
          <div class="box-footer"> <a href="<?php echo site_url('research/research_edit/'.$research_id) ?>">
            <button type="button" class="btn btn-default">ย้อนกลับ</button>
            </a> </div>
          <!-- /.box-footer --> 
          
        </div>
        <!-- /.box --> 
      </div>
    </div>
    <!-- /.box --> 
    
  </section>
  <!-- /.content --> 
</div>
<!-- /.content-wrapper --> 
