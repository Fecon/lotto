<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<?php  echo form_open('form_bloom/insert_data');  ?>

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
        <div class="col-md-2">รวงแรก </div>
        <div class="col-md-2">วันออกดอก 50% </div>
        <div class="col-md-2">วันออกดอก 75% </div>
        <div class="col-md-2">จำนวนวันออกดอก </div>
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
            <label>รวงแรก </label>
          </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-2">
          <div class="form-group">
            <div class="input-group date">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input type="text" class="form-control pull-right" id="grain<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="grain[]">
            </div>
          </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
          <div class="form-group">
            <label>วันออกดอก 50% </label>
          </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-2">
          <div class="form-group">
            <div class="input-group date">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input type="text" class="form-control pull-right" id="bloom50_<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="bloom50[]">
            </div>
          </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
          <div class="form-group">
            <label>วันออกดอก 75% </label>
          </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-2">
          <div class="form-group">
            <div class="input-group date">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input type="text" class="form-control pull-right" id="bloom75_<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" name="bloom75[]">
            </div>
          </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-2 col-hidden">
          <div class="form-group">
            <label>จำนวนวันออกดอก </label>
          </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-2">
          <div class="form-group">
            <div class="input-group">
     <input type="hidden" id="date<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" value="<?php echo @$research_date[0]['research_date_value'] ;?>" >
              <input type="number" readonly="readonly" id="days<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" class="form-control pull-right" name="day[]">
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-hidden">
          <hr>
        </div>
      </div>
<script>

$(function () {
	//Date picker
    $('#grain<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>').datepicker({
		format: 'dd/mm/yyyy',
      autoclose: true
    });
	$('#bloom50_<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>').datepicker({
		format: 'dd/mm/yyyy',
      autoclose: true
    });
	$('#bloom75_<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>').datepicker({
		format: 'dd/mm/yyyy',
      autoclose: true
    });
	$('#date<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>').datepicker({
		format: 'dd/mm/yyyy',
      autoclose: true
    })
  });

</script>

 <script>
$(document).ready(function() {
  
$( "#startdate,#enddate" ).datepicker({
changeMonth: true,
changeYear: true,
firstDay: 1,
dateFormat: 'dd/mm/yy',
})

$( "#grain<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" ).datepicker({ dateFormat: 'dd-mm-yy' });
$( "#bloom75_<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>" ).datepicker({ dateFormat: 'dd-mm-yy' });

$('#bloom75_<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>').change(function() {
    var start = $('#date<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>').datepicker('getDate');
    var end   = $('#bloom75_<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>').datepicker('getDate');

if (start<end) {
    var days   = (end - start)/1000/60/60/24;
$('#days<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>').val(days);
}
else {
  alert ("You cant come back before you have been!");
  $('#grain<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>').val("");
  $('#bloom75_<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>').val("");
    $('#days<?php echo $pedigree_plot[$repeat][$i]['plot_no'] ;?>').val("");
}
}); //end change function
}); //end ready
</script>
      <?php } ?>
    </div>
    <!-- /.tab-pane -->
    <?php $repeat++; } ?>
    
    <!-- /.tab-pane --> 
    <!-- /.tab-pane --> 
  </div>
  <!-- /.tab-content --> 
</div>
<script type="text/javascript">
    $(window).load(function(){
        $('#modalMd').modal('show');
    });
</script>
<?php 
  if(empty($research_date)||empty($research_date[0]['research_date_value'])){
?>
      <!-- Right sidebar ends -->
<div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
<div class="modal-dialog modal-danger">
<div class="modal-content">
<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">คำเตือน!</h4>
                  </div>

<div class="modal-body" align="center">
  <p style="font-size:2.0em;">ยังไม่มีข้อมูลวันตกกล้า !!!</p>
</div>
<div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">ปิด</button>
                    <a href="<?php echo site_url('research/form_date/'.$research_id) ;?>"><button type="button" class="btn btn-outline">เพิ่มวันตกกล้า</button></a>
                  </div>

</div>
</div>
</div>
<?php } ?>
