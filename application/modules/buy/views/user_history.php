<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
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
            <option value="<?php echo $lotto['id']; ?>"><?php echo $date_display; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="form-group">
          <label class="sr-only">ตัวแทน</label>
          <select class="form-control input-sm" name="agent_id" id="agent" required onchange="this.form.submit()">
            <option value="">เลือกตัวแทน</option>
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
              <th class="text-center">บน x ล่าง</th>
            </tr>
            <?php foreach ($buy_2digi as $key => $value) { ?>
            <tr>
              <td class="text-center"><?php echo $value['number'] ?></td>
              <td class="text-center"><?php echo $value['top'].' x '.$value['bottom'] ?></td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </div>
            
      <div class="col-md-6 col-sm-12">
        <h4 class="text-center">3 ตัว ตรง โต๊ด</h4>
        <div class="row">
          <table class="table table-striped">
            <tr>
              <th class="text-center">3 ตัว</th>
              <th class="text-center">ตรง x โต๊ด</th>
            </tr>
            <?php foreach ($buy_3digi as $key => $value) { ?>
            <tr>
              <td class="text-center"><?php echo $value['number'] ?></td>
              <td class="text-center"><?php echo $value['top'].' x '.$value['bottom'] ?></td>
            </tr>
            <?php } ?>
          </table>

        </div>

      </div>
    </div>
  </section>

  <!-- /.content -->
</div>
