<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> พันธุ์ข้าว </h1>
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
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">ข้อมูลพันธุ์/สายพันธุ์</h3>
          </div>
          <!-- /.box-header --> 
          <!-- form start -->
          
          <div class="box-body form-horizontal">
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Source :</label>
              <div class="col-sm-10">
                <input type="text" name="source" class="form-control" id="" readonly placeholder="" required="required" value="<?php echo $pedigree_detail[0]['source'] ?>"  >
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Cross : </label>
              <div class="col-sm-10">
                <input type="text" name="cross_name" class="form-control" id="" readonly placeholder="" value="<?php echo $pedigree_detail[0]['cross_name'] ?>"  >
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Designation : </label>
              <div class="col-sm-10">
                <input type="text" name="designation" class="form-control" id="" readonly placeholder="" required="required" value="<?php echo $pedigree_detail[0]['designation'] ?>" >
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Seed Source : </label>
              <div class="col-sm-10">
                <input type="text" name="seed_source" class="form-control" id="" readonly placeholder="" value="<?php echo $pedigree_detail[0]['seed_source'] ?>" >
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Traits : </label>
              <div class="col-sm-10">
                <input type="text" name="traits" class="form-control" id="" readonly placeholder="" value="<?php echo $pedigree_detail[0]['traits'] ?>" >
              </div>
            </div>
          </div>
          <!-- /.box-body --> 
          <!-- /.box-footer --> 
        </div>
        <!-- /.box --> 
      </div>
    </div>
  </section>
</div>
