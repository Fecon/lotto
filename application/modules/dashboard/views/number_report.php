<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
  <?php
        $result = $this->session->flashdata('update_buy');
        if($result=='done'){ ?>
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Success!</strong> แก้ไขรายการสำเร็จ. </div>
    <?php }elseif($result=='fail'){?>
    <div class="alert alert-danger no-margin">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Error!</strong> กรุณาลองใหม่อีกครั้ง. </div>
    <br>
    <?php } ?>

    <?php
      $attributes = array('class' => ''); 
      echo form_open('buy/history/', $attributes);
    ?>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="form-group">
          <label class="sr-only" >งวด</label>
          <select name="lotto_id" class="form-control input-sm" style="width: 100%;">
            <?php foreach ($list_lotto as $key => $lotto) { 
                $date = new DateTime($lotto['name']);
                $date_display = $date->format('d/m/Y');
            ?>
            <option value="<?php echo $lotto['id']; ?>"
              <?php
                  if($lotto['id']==$lotto_id){
                    echo ' selected ';
                  }
              ?>
            ><?php echo $date_display; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>
    <div class="row">
      <h4 class="text-center">2 ตัว บน ล่าง</h4>
      <div class="col-md-3 col-sm-12 right-border">
        <div class="row">
          <table class="table table-striped">
            <tr>
              <th class="text-center">2 ตัว</th>
              <th class="text-center">บน</th>
              <th class="text-center">ล่าง</th>
              
            </tr>
            <?php 
            foreach ($set1 as $key => $value) { ?>
            <tr>
              <td class="text-center text-primary">
              <?php echo $value['number'] ?>
              </td>
              <td class="text-center text-success">
              <?php if ($value['top']!='' && $value['top']!=0) {
                echo $value['top'];
              } else{
                echo "<span class='text-danger'>0</span>";
              } ?>
              </td>
              <td class="text-center text-success">
                <?php if ($value['bottom']!='' && $value['bottom']!=0) {
                echo $value['bottom'];
              } else{
                echo "<span class='text-danger'>0</span>";
              } ?>
              </td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </div>
      <div class="col-md-3 col-sm-12 right-border">
        <div class="row">
          <table class="table table-striped">
            <tr>
              <th class="text-center">2 ตัว</th>
              <th class="text-center">บน</th>
              <th class="text-center">ล่าง</th>
              
            </tr>
            <?php 
            foreach ($set2 as $key => $value) { ?>
            <tr>
              <td class="text-center text-primary">
              <?php echo $value['number'] ?>
              </td>
              <td class="text-center text-success">
              <?php if ($value['top']!='' && $value['top']!=0) {
                echo $value['top'];
              } else{
                echo "<span class='text-danger'>0</span>";
              } ?>
              </td>
              <td class="text-center text-success">
                <?php if ($value['bottom']!='' && $value['bottom']!=0) {
                echo $value['bottom'];
              } else{
                echo "<span class='text-danger'>0</span>";
              } ?>
              </td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </div>
      <div class="col-md-3 col-sm-12 right-border">
        <div class="row">
          <table class="table table-striped">
            <tr>
              <th class="text-center">2 ตัว</th>
              <th class="text-center">บน</th>
              <th class="text-center">ล่าง</th>
              
            </tr>
            <?php 
            foreach ($set3 as $key => $value) { ?>
            <tr>
              <td class="text-center text-primary">
              <?php echo $value['number'] ?>
              </td>
              <td class="text-center text-success">
              <?php if ($value['top']!='' && $value['top']!=0) {
                echo $value['top'];
              } else{
                echo "<span class='text-danger'>0</span>";
              } ?>
              </td>
              <td class="text-center text-success">
                <?php if ($value['bottom']!='' && $value['bottom']!=0) {
                echo $value['bottom'];
              } else{
                echo "<span class='text-danger'>0</span>";
              } ?>
              </td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </div>
      <div class="col-md-3 col-sm-12 right-border">
        <div class="row">
          <table class="table table-striped">
            <tr>
              <th class="text-center">2 ตัว</th>
              <th class="text-center">บน</th>
              <th class="text-center">ล่าง</th>
            </tr>
            <?php 
            foreach ($set4 as $key => $value) { ?>
            <tr>
              <td class="text-center text-primary">
              <?php echo $value['number'] ?>
              </td>
              <td class="text-center text-success">
              <?php if ($value['top']!='' && $value['top']!=0) {
                echo $value['top'];
              } else{
                echo "<span class='text-danger'>0</span>";
              } ?>
              </td>
              <td class="text-center text-success">
                <?php if ($value['bottom']!='' && $value['bottom']!=0) {
                echo $value['bottom'];
              } else{
                echo "<span class='text-danger'>0</span>";
              } ?>
              </td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </div>

    </div>
  </section>

  <!-- /.content -->
</div>
