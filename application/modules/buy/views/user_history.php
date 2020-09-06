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
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="form-group">
          <label class="sr-only">ตัวแทน</label>
          <select class="form-control input-sm" name="agent_id" id="agent" required onchange="this.form.submit()">
            <?php if(count($list_agent)>1){
                    echo '<option value="">เลือกตัวแทน</option>';
            } ?>
            <?php foreach($list_agent as $agent){ ?>
            <option value="<?php echo $agent['id'] ?>"
            <?php
                if(isset($agentInfo[0])){
                  if($agent['id']==$agentInfo[0]['id']){
                      echo ' selected ';
                  }
                }
            ?>
            ><?php echo $agent['name'] ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>
    <div class="row">
      <div class="col-md-6 col-sm-12 right-border">
        <h4 class="text-center">2 ตัว บน ล่าง</h4>
        <div class="row">
          <table class="table table-striped">
            <tr>
              <th class="text-center">2 ตัว</th>
              <th class="text-center">บน</th>
              <th class="text-center">ล่าง</th>
              <th width="100" class="text-center"></th>
            </tr>
            <?php 
            foreach ($buy_2digi as $key => $value) { ?>
            <?php echo form_open('buy/buy_update/'.$value['id'].'/history'); ?>
            <tr>
              <td class="text-center">
              <input type='number' maxlength='2' minlength='2' value="<?php echo $value['number'] ?>" onkeypress='return isNumber(event)' autocomplete='off' name='number' class='form-control'>
              </td>
              <td class="text-center">
              <input type='number' min="0" value="<?php echo $value['top'] ?>" autocomplete='off' name='top' class='form-control'>
              </td>
              <td class="text-center">
              <input type='number' min="0" value="<?php echo $value['bottom'] ?>" autocomplete='off' name='bottom' class='form-control'>
              </td>
              <td class="text-center">
              <input type='hidden' value="<?php echo $value['agent_id'] ?>" name='agent_id' class='form-control'>
              <button class="btn btn-success" type="submit"><i class="fa fa-check" ></i></button>
              &nbsp;&nbsp;&nbsp;
              <a onclick="return confirm('ยืนยันการลบ?')" href="<?php echo site_url('buy/buy_delete/'.$value['id'].'/history') ?>">
              <i class="fa fa-times text-red" aria-hidden="true"></i></a>
              </td>
            </tr>
            <?php echo form_close(); ?>
            <?php
              if(isset($buy_2digi[$key+1]['set_number'])){
                if($value['set_number']!=$buy_2digi[$key+1]['set_number']){
                  echo '<tr><td colspan="4"><br></tr>';
                }
              } 
            }
            ?>
          </table>
        </div>
      </div>
            
      <div class="col-md-6 col-sm-12">
        <h4 class="text-center">3 ตัว ตรง โต๊ด</h4>
        <div class="row">
          <table class="table table-striped">
            <tr>
              <th class="text-center">3 ตัว</th>
              <th class="text-center">ตรง</th>
              <th class="text-center">โต๊ด</th>
              <th width="100" class="text-center"></th>
            </tr>
            <?php foreach ($buy_3digi as $key => $value) { ?>
              <?php echo form_open('buy/buy_update/'.$value['id'].'/history'); ?>
            <tr>
              <td class="text-center">
              <input type='number' maxlength='3' minlength='3' value="<?php echo $value['number'] ?>" onkeypress='return isNumber(event)' autocomplete='off' name='number' class='form-control'>
              </td>
              <td class="text-center">
              <input type='number' min="0" value="<?php echo $value['top'] ?>" autocomplete='off' name='top' class='form-control'>
              </td>
              <td class="text-center">
              <input type='number' min="0" value="<?php echo $value['bottom'] ?>" autocomplete='off' name='bottom' class='form-control'>
              </td>
              <td class="text-center">
              <button class="btn btn-success" type="submit"><i class="fa fa-check" ></i></button>
              &nbsp;&nbsp;&nbsp;
              <a onclick="return confirm('ยืนยันการลบ?')" href="<?php echo site_url('buy/buy_delete/'.$value['id'].'/history') ?>">
              <i class="fa fa-times text-red" aria-hidden="true"></i></a>
              </td>
            </tr>
            <?php echo form_close(); ?>
            <?php
              if(isset($buy_3digi[$key+1]['set_number'])){
                if($value['set_number']!=$buy_3digi[$key+1]['set_number']){
                  echo '<tr><td colspan="4"><br></tr>';
                }
              } 
            }
            ?>
          </table>

        </div>

      </div>
    </div>
  </section>

  <!-- /.content -->
</div>
