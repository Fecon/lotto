<?php
  $user_data = $this->session->userdata('user_data');
  if(!isset($user_data)){
    redirect('login');
  }
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            ยอดรวม
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label>ตัวแทน</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">ทั้งหมด</option>
                        <?php foreach ($list_agent as $key => $agent) { ?>
                          <option value="<?php echo $agent['id']; ?>"><?php echo $agent['name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label>งวดประจำวันที่</label>
                      <select class="form-control select2" style="width: 100%;">
                        <?php foreach ($list_lotto as $key => $lotto) { ?>
                          <option value="<?php echo $lotto['id']; ?>"><?php echo $lotto['name']; ?></option>
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
                </div>
                <br>
                <div class="box box-info">
                  <div class="box-body">
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                          <label>ชื่อตัวแทน</label >
                          <span>เฌอ</span>
                      </div>
                      <div class="col-md-12">
                        <label>ยอดรวมทั้งหมดที่ส่งมา</label >
                        <span>250,000</span>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-3">
                        <table class="table table-striped">
                          <tr>
                            <th colspan="2" class="text-center">2 ตัวบน</th>
                          </tr>
                          <tr>
                            <th colspan="2" class="text-center">25,250</th>
                          </tr>
                          <tr>
                            <th class="text-center">เลข</th>
                            <th class="text-center">จำนวนเงิน</th>
                          </tr>
                          <?php for ($i=10; $i < 15 ; $i++) {  ?>
                          <tr>
                            <td class="text-center">
                              <span><?php echo rand(10,100) ?></span>
                            </td>
                            <td class="text-center" style="background-color: red; color: #FFF">
                              <span><?php echo 10000-($i*$i) ; ?></span>
                            </td>
                          </tr>
                        <?php } ?>

                        <?php for ($i=10; $i < 13 ; $i++) {  ?>
                          <tr>
                            <td class="text-center">
                              <span><?php echo rand(10,100) ?></span>
                            </td>
                            <td class="text-center" style="background-color: #ffc300; color: #000">
                              <span><?php echo 5000-($i*$i) ; ?></span>
                            </td>
                          </tr>
                        <?php } ?>

                        <?php for ($i=10; $i < 13 ; $i++) {  ?>
                          <tr>
                            <td class="text-center">
                              <span><?php echo rand(10,100) ?></span>
                            </td>
                            <td class="text-center" style="background-color: #019d49; color: #FFF">
                              <span><?php echo 2000-($i*$i) ; ?></span>
                            </td>
                          </tr>
                        <?php } ?>

                        </table>
                      </div>

                      <div class="col-md-3">
                        <table class="table table-striped">
                          <tr>
                            <th colspan="2" class="text-center">2 ตัวล่าง</th>
                          </tr>
                          <tr>
                            <th colspan="2" class="text-center">37,125</th>
                          </tr>
                          <tr>
                            <th class="text-center">เลข</th>
                            <th class="text-center">จำนวนเงิน</th>
                          </tr>
                          <?php for ($i=10; $i < 12 ; $i++) {  ?>
                          <tr>
                            <td class="text-center">
                              <span><?php echo rand(10,100) ?></span>
                            </td>
                            <td class="text-center" style="background-color: red; color: #FFF">
                              <span><?php echo 10000-($i*$i) ; ?></span>
                            </td>
                          </tr>
                        <?php } ?>

                        <?php for ($i=10; $i < 15 ; $i++) {  ?>
                          <tr>
                            <td class="text-center">
                              <span><?php echo rand(10,100) ?></span>
                            </td>
                            <td class="text-center" style="background-color: #ffc300; color: #000">
                              <span><?php echo 5000-($i*$i) ; ?></span>
                            </td>
                          </tr>
                        <?php } ?>

                        <?php for ($i=10; $i < 15 ; $i++) {  ?>
                          <tr>
                            <td class="text-center">
                              <span><?php echo rand(10,100) ?></span>
                            </td>
                            <td class="text-center" style="background-color: #019d49; color: #FFF">
                              <span><?php echo 2000-($i*$i) ; ?></span>
                            </td>
                          </tr>
                        <?php } ?>

                        </table>
                      </div>

                      <div class="col-md-3">
                        <table class="table table-striped">
                          <tr>
                            <th colspan="2" class="text-center">3 ตัวตรง</th>
                          </tr>
                          <tr>
                            <th colspan="2" class="text-center">42,185</th>
                          </tr>
                          <tr>
                            <th class="text-center">เลข</th>
                            <th class="text-center">จำนวนเงิน</th>
                          </tr>
                          <?php for ($i=10; $i < 13 ; $i++) {  ?>
                          <tr>
                            <td class="text-center">
                              <span><?php echo rand(100,999) ?></span>
                            </td>
                            <td class="text-center" style="background-color: red; color: #FFF">
                              <span><?php echo 10000-($i*$i) ; ?></span>
                            </td>
                          </tr>
                        <?php } ?>

                        <?php for ($i=10; $i < 13 ; $i++) {  ?>
                          <tr>
                            <td class="text-center">
                              <span><?php echo rand(100,999) ?></span>
                            </td>
                            <td class="text-center" style="background-color: #ffc300; color: #000">
                              <span><?php echo 5000-($i*$i) ; ?></span>
                            </td>
                          </tr>
                        <?php } ?>

                        <?php for ($i=10; $i < 12 ; $i++) {  ?>
                          <tr>
                            <td class="text-center">
                              <span><?php echo rand(100,999) ?></span>
                            </td>
                            <td class="text-center" style="background-color: #019d49; color: #FFF">
                              <span><?php echo 2000-($i*$i) ; ?></span>
                            </td>
                          </tr>
                        <?php } ?>

                        </table>
                      </div>

                      <div class="col-md-3">
                        <table class="table table-striped">
                          <tr>
                            <th colspan="2" class="text-center">3 ตัวโต๊ด</th>
                          </tr>
                          <tr>
                            <th colspan="2" class="text-center">48,185</th>
                          </tr>
                          <tr>
                            <th class="text-center">เลข</th>
                            <th class="text-center">จำนวนเงิน</th>
                          </tr>
                          <?php for ($i=10; $i < 16 ; $i++) {  ?>
                          <tr>
                            <td class="text-center">
                              <span><?php echo rand(100,999) ?></span>
                            </td>
                            <td class="text-center" style="background-color: red; color: #FFF">
                              <span><?php echo 10000-($i*$i) ; ?></span>
                            </td>
                          </tr>
                        <?php } ?>

                        <?php for ($i=10; $i < 15 ; $i++) {  ?>
                          <tr>
                            <td class="text-center">
                              <span><?php echo rand(100,999) ?></span>
                            </td>
                            <td class="text-center" style="background-color: #ffc300; color: #000">
                              <span><?php echo 5000-($i*$i) ; ?></span>
                            </td>
                          </tr>
                        <?php } ?>

                        <?php for ($i=10; $i < 15 ; $i++) {  ?>
                          <tr>
                            <td class="text-center">
                              <span><?php echo rand(100,999) ?></span>
                            </td>
                            <td class="text-center" style="background-color: #019d49; color: #FFF">
                              <span><?php echo 2000-($i*$i) ; ?></span>
                            </td>
                          </tr>
                        <?php } ?>

                        </table>
                      </div>

                       

                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
        <!-- /.content -->
      </div>
