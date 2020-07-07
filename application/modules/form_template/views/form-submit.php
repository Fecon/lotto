<?php 
  $controller = $this->uri->segment(1);
  $research_id = $this->uri->segment(3); 
  $sub_id = $this->uri->segment(4); 
?>

<div class="form-submit">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 btn-back"> <a href="<?php echo site_url('research/form_index/'.$research_id) ?>">
      <button type="button" class="btn btn-primary btn-block btn-flat btn-lg" style="border-color:#FFF;"><i class="fa fa-angle-double-left"></i> ย้อนกลับ</button>
      </a> </div>
    <div class="col-xs-12 col-sm-12  col-md-offset-3 col-md-3 btn-back">
    <!--
      <button type="button" class="btn btn-primary btn-flat btn-nobg"><i class="fa fa-print"></i> พิมพ์ </button>
      -->
      <a href="<?php echo site_url($controller.'/excel/'.$research_id.'/'.$sub_id) ?>">
      <button type="button" class="btn btn-primary btn-flat btn-nobg"><i class="fa fa-file-excel-o"></i> ส่งออกเป็นExcel </button>
      </a> </div>
    <div class="col-xs-12 col-sm-12 col-md-2 col-md-offset-2">
      <input type="hidden" name="research_id" value="<?php echo $research_id ;?>" >
      <button type="submit" id="submit" class="btn btn-primary btn-block btn-flat btn-lg" style="border-color:#FFF;"><i class="fa fa-floppy-o"></i> บันทึก</button>
    </div>
  </div>
</div>
<?php echo form_close(); ?>