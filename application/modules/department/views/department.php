<!-- jvectormap -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> ศูนย์วิจัยข้าวทั่วประเทศ </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
      <li class="active">ศูนย์วิจัย</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
  
  <!-- Default box -->
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">ตำแหน่งศูนย์วิจัยข้าว</h3>
    </div>
    <div class="box-body no-padding">
      <div class="row">
        <div class="col-md-8 col-sm-8">
          <div class="pad"> 
            <!-- Map will be created here -->
            <div id="map" style="height: 600px;"></div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-4">
          <?php foreach($geo_all as $geography){ ?>
          <!-- GEO LIST -->
          <div class="box box-primary collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"> <?php echo $geography['GEO_NAME'] ?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
              <!-- /.box-tools --> 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php foreach($geography['department_list'] as $department_list){ ?>
                <li class="item">
                  <div class="product-img"> <a href="<?php echo site_url('department/detail/'.$department_list['dep_id']) ?>"><img src="<?php echo base_url('assets/dist/img/rice_icon.png'); ?>"></a> </div>
                  <div class="product-info"> <a href="<?php echo site_url('department/detail/'.$department_list['dep_id']) ?>" class="product-title"><?php echo $department_list['dep_name'] ?> <span class="label label-success pull-right"><?php echo $department_list['dep_shotname_en'] ?></span></a> <span class="product-description">
                    <?php 
						  	if(isset($department_list['research'][0])){
								echo anchor('research/form_index/'.$department_list['research'][0]['research_id'],$department_list['research'][0]['research_name'],array('target'=>'_blank')) ;
							}
						  ?>
                    </span> </div>
                </li>
                <!-- /.item -->
                <?php } ?>
              </ul>
            </div>
            <!-- /.box-body --> 
            
          </div>
          <!-- /.box -->
          <?php } ?>
        </div>
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
  </div>
  <!-- /.box-body -->
  <div class="box-footer"> </div>
  <!-- /.box-footer--> 
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>
<?php $segment1 = $this->uri->segment(1) ; ?>
<?php if($segment1=='department'){?>
<!-- jvectormap --> 
<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> 
<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-th-mill.js"></script> 
<script>
	var markers = [
    <?php foreach($department_all as $dept_all){
				echo '{latLng: ['.$dept_all['dep_la_location'].', '.$dept_all['dep_long_location'].'], name: "'.$dept_all['dep_name'].'", weburl : "../index.php"},' ;
			} ?>
];
	$('#map').vectorMap({
		map: 'th_mill',
		normalizeFunction: 'polynomial',
		hoverOpacity: 0.7,
		hoverColor: false,
		backgroundColor: 'transparent',
		regionStyle: {
		  initial: {
			fill: 'rgba(210, 214, 222, 1)',
			"fill-opacity": 1,
			stroke: 'none',
			"stroke-width": 0,
			"stroke-opacity": 1
		  },
		  hover: {
			"fill-opacity": 0.7,
			cursor: 'pointer'
		  },
		  selected: {
			fill: 'yellow'
		  },
		  selectedHover: {
		  }
		},
		
		markerStyle: {
		  initial: {
			fill: '#00a65a',
			stroke: '#111'
		  }
		},

		markers: markers,

  });
  
    </script>
<?php } ?>
