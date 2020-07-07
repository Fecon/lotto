<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> รายชื่อพันธุ์/สายพันธุ์ </h1>
    <ol class="breadcrumb  row-hidden">
          <li><a  href="<?php echo site_url('research/form_index/'.$research_id) ?>" ><button class="btn btn-primary"><i class="fa fa-th"></i> การทดลอง</button></a></li>
        </ol>
  </section>
  <br>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-7 col-xs-12"> 
        <!-- Default box -->
        <div class="box box-primary">
          <div class="box-header"> <i class="ion ion-clipboard"></i>
            <h3 class="box-title">Entry</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-lg-2 col-xs-3">
              <div align="center">No.
                <hr style="border-color:#390" />
              </div>
              <ul class="todo-list">
                <?php  for($i=1  ; $i<count($pedigree_selected)+1 ; $i++) { ?>
                <li> <span class="text text-blue"><?php echo $i  ?></span> </li>
                <?php } ?>
              </ul>
            </div>
            <div class="col-lg-10 col-xs-9">
              <div align="center">Designation
                <hr style="border-color:#390"  />
              </div>
              <ul class="todo-list">
                <?php  foreach($pedigree_selected as $value) { ?>
                <li> 
                  <!-- drag handle --> 
                  <span class="handle">  </span> 
                  <!-- checkbox --> 
                  
                  <input type="hidden" value="<?php echo $value['rp_id']  ?>" name="rp_id[]">
                  <!-- todo text --> 
                  <span class="text"><?php echo $value['designation']  ?></span> 
                  <!-- General tools such as edit or delete-->
                  <div class="tools"> <i class="fa fa-link"></i> </div>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <!-- /.box-body --> </div>
        <!-- /.box --> 
      </div>
    </div>
  </section>
  <!-- /.content --> 
</div>
<!-- /.content-wrapper --> 