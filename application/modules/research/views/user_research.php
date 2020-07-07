<?php
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
?>
<style>
.block-with-text {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;  
}
</style>
<?php } ?>
<style>
.block-text {
    text-overflow: ellipsis;
}
</style>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
    <h1> <i class="fa fa-eyedropper"></i> จัดการการทดลอง </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
      <li class="active">การทดลอง</li>
    </ol>
  </section><br>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
            <h3 class="box-title"></h3>
            <?php if($user_data['user_role'] == 1 || $user_data['user_role'] == 2 || $user_data['user_role'] == 3 ){ ?>
            <div class="box-tools">
              <div class="input-group" style="width: 150px;"><br />
                <a href="<?php echo site_url('research/research_create') ?>">
                <button class="btn btn-flat btn-primary"><i class="fa fa-plus"></i> เพิ่มการทดลอง</button>
                </a> </div>
            </div><br /><br /><br />
            <?php } ?>
          </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                <div class="row">
                <div class="col-md-12">
                  <h3 align="center" style="text-decoration:underline;">ศูนย์วิจัยข้าวขอนแก่น</h3><br>
                    <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>ชื่อการทดลอง</th>
                      <th>ระยะเวลา</th>
                      <th>ปี</th>
                      <th>สถานะ</th>
                      <th>ศูนย์วิจัย</th>
                      <th>จัดการ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td><a href="<?php echo site_url('research/form_index') ?>">ชุดข้าวแหนียวไวต่อช่วงแสงทนแล้ง (Obs.1) จำนวน 40 พันธุ์/สายพันธุ์ (39+1 Ck)</a></td>
                      <td>1 ก.ค. 58 - 31 ธ.ค. 58</td>
                      <td>2558</td>
                      <td><span class="label label-warning">กำลังดำเนินการ</span></td>
                      <td>ปทุมธานี</td>
                      <th>  <i class="fa fa-eye"></i> &nbsp;&nbsp;
                      		<i class="fa fa-wrench"></i> &nbsp;&nbsp;
                            </th>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td><a href="<?php echo site_url('research/form_index') ?>">ชุดข้าวแหนียวไวต่อช่วงแสงทนแล้ง (Obs.1) จำนวน 40 พันธุ์/สายพันธุ์ (39+1 Ck)</a></td>
                      <td>1 ก.ค. 58 - 31 ธ.ค. 58</td>
                      <td>2558</td>
                      <td><span class="label label-warning">กำลังดำเนินการ</span></td>
                      <td>ปทุมธานี</td>
                      <th>  <i class="fa fa-eye"></i> &nbsp;&nbsp;
                      		<i class="fa fa-wrench"></i> &nbsp;&nbsp;
                            </th>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td><a href="<?php echo site_url('research/form_index') ?>">ชุดข้าวแหนียวไวต่อช่วงแสงทนแล้ง (Obs.1) จำนวน 40 พันธุ์/สายพันธุ์ (39+1 Ck)</a></td>
                      <td>1 ก.ค. 58 - 31 ธ.ค. 58</td>
                      <td>2558</td>
                      <td><span class="label label-warning">กำลังดำเนินการ</span></td>
                      <td>คลองหลวง</td>
                      <th>  <i class="fa fa-eye"></i> &nbsp;&nbsp;
                      		<i class="fa fa-wrench"></i> &nbsp;&nbsp;
                            </th>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td><a href="<?php echo site_url('research/form_index') ?>">ชุดข้าวแหนียวไวต่อช่วงแสงทนแล้ง (Obs.1) จำนวน 40 พันธุ์/สายพันธุ์ (39+1 Ck)</a></td>
                      <td>1 ก.ค. 58 - 31 ธ.ค. 58</td>
                      <td>2558</td>
                      <td><span class="label label-warning">กำลังดำเนินการ</span></td>
                      <td>คลองหลวง</td>
                      <th>  <i class="fa fa-eye"></i> &nbsp;&nbsp;
                      		<i class="fa fa-wrench"></i> &nbsp;&nbsp;
                            </th>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td><a href="<?php echo site_url('research/form_index') ?>">ชุดข้าวแหนียวไวต่อช่วงแสงทนแล้ง (Obs.1) จำนวน 40 พันธุ์/สายพันธุ์ (39+1 Ck)</a></td>
                      <td>1 ก.ค. 58 - 31 ธ.ค. 58</td>
                      <td>2558</td>
                      <td><span class="label label-warning">กำลังดำเนินการ</span></td>
                      <td>ราชบุรี</td>
                      <th>  <i class="fa fa-eye"></i> &nbsp;&nbsp;
                      		<i class="fa fa-wrench"></i> &nbsp;&nbsp;
                            </th>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td><a href="<?php echo site_url('research/form_index') ?>">ชุดข้าวแหนียวไวต่อช่วงแสงทนแล้ง (Obs.1) จำนวน 40 พันธุ์/สายพันธุ์ (39+1 Ck)</a></td>
                      <td>1 ก.ค. 58 - 31 ธ.ค. 58</td>
                      <td>2558</td>
                      <td><span class="label label-warning">กำลังดำเนินการ</span></td>
                      <td>ราชบุรี</td>
                      <th>  <i class="fa fa-eye"></i> &nbsp;&nbsp;
                      		<i class="fa fa-wrench"></i> &nbsp;&nbsp;
                            </th>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td><a href="<?php echo site_url('research/form_index') ?>">ชุดข้าวแหนียวไวต่อช่วงแสงทนแล้ง (Obs.1) จำนวน 40 พันธุ์/สายพันธุ์ (39+1 Ck)</a></td>
                      <td>1 ก.ค. 58 - 31 ธ.ค. 58</td>
                      <td>2558</td>
                      <td><span class="label label-warning">กำลังดำเนินการ</span></td>
                      <td>สุพรรณบุรี</td>
                      <th>  <i class="fa fa-eye"></i> &nbsp;&nbsp;
                      		<i class="fa fa-wrench"></i> &nbsp;&nbsp;
                            </th>
                    </tr>
                    </tbody>
                  </table>
                  <hr>
<div class="text-green"><h4>การทดลองที่เสร็จแล้ว</h4></div>
                  <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>ชื่อการทดลอง</th>
                      <th>ระยะเวลา</th>
                      <th>ปี</th>
                      <th>สถานะ</th>
                      <th>ศูนย์วิจัย</th>
                      <th>จัดการ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td><a href="<?php echo site_url('research/form_index') ?>">ชุดข้าวแหนียวไวต่อช่วงแสงทนแล้ง (Obs.1) จำนวน 40 พันธุ์/สายพันธุ์ (39+1 Ck)</a></td>
                      <td>1 ก.ค. 58 - 31 ธ.ค. 58</td>
                      <td>2558</td>
                      <td><span class="label label-success">เสร็จแล้ว</span></td>
                      <td>ปทุมธานี</td>
                      <th>  <i class="fa fa-eye"></i> &nbsp;&nbsp;
                      		<i class="fa fa-wrench"></i> &nbsp;&nbsp;
                            </th>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td><a href="<?php echo site_url('research/form_index') ?>">ชุดข้าวแหนียวไวต่อช่วงแสงทนแล้ง (Obs.1) จำนวน 40 พันธุ์/สายพันธุ์ (39+1 Ck)</a></td>
                      <td>1 ก.ค. 58 - 31 ธ.ค. 58</td>
                      <td>2558</td>
                      <td><span class="label label-success">เสร็จแล้ว</span></td>
                      <td>ปทุมธานี</td>
                      <th>  <i class="fa fa-eye"></i> &nbsp;&nbsp;
                      		<i class="fa fa-wrench"></i> &nbsp;&nbsp;
                            </th>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td><a href="<?php echo site_url('research/form_index') ?>">ชุดข้าวแหนียวไวต่อช่วงแสงทนแล้ง (Obs.1) จำนวน 40 พันธุ์/สายพันธุ์ (39+1 Ck)</a></td>
                      <td>1 ก.ค. 58 - 31 ธ.ค. 58</td>
                      <td>2558</td>
                      <td><span class="label label-success">เสร็จแล้ว</span></td>
                      <td>คลองหลวง</td>
                      <th>  <i class="fa fa-eye"></i> &nbsp;&nbsp;
                      		<i class="fa fa-wrench"></i> &nbsp;&nbsp;
                            </th>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td><a href="<?php echo site_url('research/form_index') ?>">ชุดข้าวแหนียวไวต่อช่วงแสงทนแล้ง (Obs.1) จำนวน 40 พันธุ์/สายพันธุ์ (39+1 Ck)</a></td>
                      <td>1 ก.ค. 58 - 31 ธ.ค. 58</td>
                      <td>2558</td>
                      <td><span class="label label-success">เสร็จแล้ว</span></td>
                      <td>คลองหลวง</td>
                      <th>  <i class="fa fa-eye"></i> &nbsp;&nbsp;
                      		<i class="fa fa-wrench"></i> &nbsp;&nbsp;
                            </th>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td><a href="<?php echo site_url('research/form_index') ?>">ชุดข้าวแหนียวไวต่อช่วงแสงทนแล้ง (Obs.1) จำนวน 40 พันธุ์/สายพันธุ์ (39+1 Ck)</a></td>
                      <td>1 ก.ค. 58 - 31 ธ.ค. 58</td>
                      <td>2558</td>
                      <td><span class="label label-success">เสร็จแล้ว</span></td>
                      <td>ราชบุรี</td>
                      <th>  <i class="fa fa-eye"></i> &nbsp;&nbsp;
                      		<i class="fa fa-wrench"></i> &nbsp;&nbsp;
                            </th>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td><a href="<?php echo site_url('research/form_index') ?>">ชุดข้าวแหนียวไวต่อช่วงแสงทนแล้ง (Obs.1) จำนวน 40 พันธุ์/สายพันธุ์ (39+1 Ck)</a></td>
                      <td>1 ก.ค. 58 - 31 ธ.ค. 58</td>
                      <td>2558</td>
                      <td><span class="label label-success">เสร็จแล้ว</span></td>
                      <td>ราชบุรี</td>
                      <th>  <i class="fa fa-eye"></i> &nbsp;&nbsp;
                      		<i class="fa fa-wrench"></i> &nbsp;&nbsp;
                            </th>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td><a href="<?php echo site_url('research/form_index') ?>">ชุดข้าวแหนียวไวต่อช่วงแสงทนแล้ง (Obs.1) จำนวน 40 พันธุ์/สายพันธุ์ (39+1 Ck)</a></td>
                      <td>1 ก.ค. 58 - 31 ธ.ค. 58</td>
                      <td>2558</td>
                      <td><span class="label label-success">เสร็จแล้ว</span></td>
                      <td>สุพรรณบุรี</td>
                      <th>  <i class="fa fa-eye"></i> &nbsp;&nbsp;
                      		<i class="fa fa-wrench"></i> &nbsp;&nbsp;
                            </th>
                    </tr>
                    </tbody>
                  </table>
                  </div>
                  </div>                
                
                
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div>