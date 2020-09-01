<style>
  .col-height{
      height: 48px;
      font-size: 1.1em;
  }
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
           <label>งวดประจำวันที่</label>
           <select name="lotto_id" class="form-control select2" style="width: 100%;">
              <?php foreach ($list_lotto as $key => $lotto) { 
                  $date = new DateTime($lotto['name']);
                    $date_display = $date->format('d/m/Y');
              ?>
              <option value="<?php echo $lotto['id']; ?>"><?php echo $date_display; ?></option>
              <?php } ?>
           </select>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
           <label>&nbsp;</label>
           <br>
           <button type="submit" class="btn btn-success">ยืนยัน</button>
        </div>
      </div>
      <div class="col-md-7">
        <div class="form-group text-right">
           <label>&nbsp;</label>
           <br>
           <a href="<?php echo site_url('dashboard'); ?>"><button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> กลับไปหน้าแรก</button></a>
        </div>
      </div>
    </div>
    
    <br>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-danger">
      <div class="box-body">
        <br>
        <div class="row">
          <?php 
            foreach($list_agent as $key => $agent){ 
          ?>
          <div class="col-md-2 col-sm-2 col-xs-2 col-height">
            <a target="_blank" rel="noopener noreferrer" href="<?php echo site_url('dashboard/pdf/'.$lotto['id'].'/'.$agent['id']); ?>"><?php echo $agent['name']; ?></a>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
